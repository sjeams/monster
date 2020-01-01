<?php
namespace app\modules\app\models;


use yii;
use yii\db\ActiveRecord;
use app\libs\GoodsPager;
use app\libs\Method;

use app\modules\question\models\Questions;
use app\modules\app\models\UserAnswer;
use app\modules\app\models\UserCollection;
use app\modules\app\models\QuestionsStatistics;
use app\modules\app\models\UserNote;
use app\modules\app\models\UserAnalysis;
use app\modules\app\models\UserBankMark;



class User extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%user}}';
    }

    //获取用户收藏题目
    public function getUserQuestionCollection($where,$page,$pageSize){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT q.*,qc.createTime as cTime from {{%question_collection}} qc left join {{%questions}} q on qc.questionId=q.id where $where and qc.questionId >0 and !isnull(qc.questionId) ";
        $sql .= ' ORDER BY qc.createTime desc';
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    //获取用户做题记录
    public function getDoneQuestionsRecord($where,$page,$pageSize,$type,$order='ORDER BY ua.createTime desc'){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.id,q.stem,q.answer as qanswer from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where";
        if($type==1){
            $sql .= ' and correct=1';
        } elseif($type==2){
            $sql .= ' and correct!=1';
        } else {
            $sql .= '';
        }
        $sql .=" $order";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['details'] = str_replace('<p><br></p>', '', $data[$k]['details']);
            if($v['details']==''){
                $data[$k]['details'] = $v['stem'];
            }
        }
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    /**
     * @param $where
     * @param $sectionId
     * @param string $order
     * @return array
     * 获取错题记录小库
     * by  yanni、
     */
    public function getErrorRecord($where,$sectionId,$order='ORDER BY ua.createTime desc'){
//        $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.id,q.answer as qanswer from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where";
        $sql = "SELECT count(q.id) as totalNum from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where";
        $sql .= ' and correct!=1';
        $sql .=" $order";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        $sectionClass = '全部';    //错题单项名
        if($sectionId){
            $sign = \Yii::$app->db->createCommand("select name from x2_question_cat where id=$sectionId")->queryOne();
            $sectionClass = $sign['name'];
        }
        $numKey =  0;
        $c_questions_xk = array();
        for($i=0;$i<$data['totalNum'];$i++){
            if(($i+1)%20==0 || ($i+1)==$data['totalNum']){
                $c = $i+1;
                $startNum = $numKey*20+1;
                $c_questions_xk[$numKey]['sectionname'] = $sectionClass."错题集(".$startNum ."-".$c.")";
                $numKey++;
            }
        }
        return $c_questions_xk;
    }
    /**
     * @param $where
     * @param $sectionId
     * @param string $order
     * @return array
     * 获取错题小库详情
     * by  yanni、
     */
    public function getErrorRecordDetail($where,$order='ORDER BY ua.createTime desc',$limit){
        $limit = "limit ".($limit-1)*20 .",20";
        $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.stem,q.id,q.answer as qanswer from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where";
        $sql .= ' and correct!=1';
        $sql .=" $order";
        $sql .=" $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){    //错题小库数组
            if($v['details']==''){
                $v['details'] = $v['stem'];
            }
            $data[$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
            $qmodel = new Questions();
            $data[$k]['sectionName'] = $qmodel->getSection($v['catId']);
            $data[$k]['sourceName'] = $qmodel->getSource($v['sourceId'])['name'];
        }
        return $data;
    }
    //获取陌生单词
    public function getUserStrangeWords($where,$page,$pageSize,$order){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT sw.*,c.name from {{%content}} c left join {{%strange_word}} sw on sw.wordId=c.id where $where";
        $sql .= $order;
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }
    //单条题录记录 cy
    public function getQuestionDetail($uid,$id){
        $sql = "select ua.answer as useranswer,ua.correct,q.* from x2_user_answer ua left join x2_questions q on ua.questionId = q.id where ua.uid = $uid and questionId = $id";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        return $data;
    }
    //用户同步
    public function SyncRecord($url,$uid)
    {
        $appRecord = file_get_contents("https://gre.viplgw.cn".$url);
        $appRecord = json_decode($appRecord, true);
        $answer = $appRecord['userAnswer'];
        $collection = $appRecord['userCollection'];
        $state = $appRecord['userState'];
        $note = $appRecord['userNote'];
        $analysis = $appRecord['userAnalysis'];
        $mark = $appRecord['userMark'];
        foreach($answer as $k=>$v){    //修改答案表
            if($v['is_change'] == 1){
                $sign = UserAnswer::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$v['questionId']} and libId={$v['libId']} and answerType={$v['answerType']}")->one();
                if(!empty($sign)){
                    UserAnswer::updateAll(['answer' => $v['answer'],'useTime'=>$v['useTime'],'createTime'=>$v['createTime'],'correct'=>$v['correct']], "id={$sign['id']}");
                } else{
                    $model = new UserAnswer();
                    $model->uid = $uid;
                    $model->questionId = $v['questionId'];
                    $model->libId = $v['libId'];
                    $model->answer = $v['answer'];
                    $model->useTime = $v['useTime'];
                    $model->createTime = $v['createTime'];
                    $model->correct = $v['correct'];
                    $model->answerType = $v['answerType'];
                    $model->save();
                    uc_user_edit_integral1($uid,'GRE做题',1,2);   //奖励雷豆
                }
            }
            if($v['is_change'] == 2){
                UserAnswer::deleteAll("uid = $uid and questionId={$v['questionId']} and libId={$v['libId']} and answerType={$v['answerType']}");
            }
        }
        foreach($collection as $k=>$v){   //修改收藏
            if($v['is_change'] == 1){
                $sign = UserCollection::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$v['questionId']}")->one();
                if(!empty($sign)){
                    UserCollection::updateAll(['createTime'=>$v['createTime']], "id={$sign['id']}");
                } else{
                    $model = new UserCollection();
                    $model->uid = $uid;
                    $model->questionId = $v['questionId'];
                    $model->createTime = $v['createTime'];
                    $model->save();
                }
            }
            if($v['is_change'] == 2){
                UserCollection::deleteAll("uid = $uid and questionId={$v['questionId']}");
            }
        }
        foreach($state as $k=>$v){    //   修改状态表
            if($v['is_change'] == 1){
                $sign = QuestionsStatistics::find()->asArray()->select(['id'])->where("uid={$uid} and libraryId={$v['libraryId']} and interruptTime<{$v['interruptTime']}")->one();
                if(!empty($sign)){
                    QuestionsStatistics::updateAll(['doNum'=>$v['doNum'],'totalNum'=>$v['totalNum'],'totalTime'=>$v['totalTime'],'startTime'=>$v['startTime'],'endTime'=>$v['endTime'],'interruptTime'=>$v['interruptTime'],'state'=>$v['state'],'correctRate'=>$v['correctRate']], "id={$sign['id']}");
                } else{
                    $model = new QuestionsStatistics();
                    $model->uid = $uid;
                    $model->libraryId = $v['libraryId'];
                    $model->doNum = $v['doNum'];
                    $model->totalNum = $v['totalNum'];
                    $model->totalTime = $v['totalTime'];
                    $model->startTime = $v['startTime'];
                    $model->interruptTime = $v['interruptTime'];
                    $model->endTime = $v['endTime'];
                    $model->state = $v['state'];
                    $model->correctRate = $v['correctRate'];
                    $model->save();
                }
            }
            if($v['is_change'] == 2){
                QuestionsStatistics::deleteAll("uid = $uid and libraryId={$v['libraryId']} and interruptTime<{$v['interruptTime']}");
            }
        }
        foreach($note as $k=>$v){    // 修改笔记
            if($v['is_change'] == 1){
                $sign = UserNote::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$v['questionId']} and createTime={$v['createTime']}")->one();
                if(!empty($sign)){
                    UserNote::updateAll(['noteContent'=>$v['noteContent']], "id={$sign['id']}");
                } else{
                    $model = new UserNote();
                    $model->uid = $uid;
                    $model->noteContent = $v['noteContent'];
                    $model->questionId = $v['questionId'];
                    $model->createTime = $v['createTime'];
                    $model->save();
                }
            }
            if($v['is_change'] == 2){
                UserNote::deleteAll("uid = $uid and questionId={$v['questionId']} and createTime={$v['createTime']}");
            }
        }
        foreach($analysis as $k=>$v){   //修改解析表
            if($v['is_change'] == 1){
                $sign = UserAnalysis::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$v['questionId']} and createTime={$v['createTime']}")->one();
                if(!empty($sign)){
                    UserAnalysis::updateAll(['analysisContent'=>$v['analysisContent'],'createTime'=>$v['createTime']], "id={$sign['id']}");
                } else{
                    $model = new UserAnalysis();
                    $model->uid = $uid;
                    $model->noteContent = $v['analysisContent'];
                    $model->questionId = $v['questionId'];
                    $model->type = $v['type'];
                    $model->publish = $v['publish'];
                    $model->createTime = $v['createTime'];
                    $model->rewart = $v['rewart'];
                    $model->save();
                }
            }
            if($v['is_change'] == 2){
                UserAnalysis::deleteAll("uid = $uid and questionId={$v['questionId']} and createTime={$v['createTime']}");
            }
        }
        foreach($mark as $k=>$v){      //  修改标记
            if($v['is_change'] == 1){
                $sign = UserBankMark::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$v['questionId']} and libId={$v['libId']}")->one();
                if(!empty($sign)){
                    UserBankMark::updateAll(['createTime'=>$v['createTime']], "id={$sign['id']}");
                } else{
                    $model = new UserBankMark();
                    $model->uid = $uid;
                    $model->questionId = $v['questionId'];
                    $model->libId = $v['libId'];
                    $model->createTime = $v['createTime'];
                    $model->save();
                }
            }
            if($v['is_change'] == 2){
                UserBankMark::deleteAll("uid = $uid and questionId={$v['questionId']} and libId={$v['libId']}");
            }
        }
        $answers = UserAnswer::find()->asArray()->where("uid={$uid}")->all();
        $collections = UserCollection::find()->asArray()->where("uid={$uid} and questionId!=''")->all();
        $states = QuestionsStatistics::find()->asArray()->where("uid={$uid}")->all();
        $notes = UserNote::find()->asArray()->where("uid={$uid}")->all();
        $analysiss = UserAnalysis::find()->asArray()->where("uid={$uid}")->all();
        $marks = UserBankMark::find()->asArray()->where("uid={$uid}")->all();
        $res = json_encode(['userAnswer' => $answers,'userCollection' => $collections,'userState'=>$states,'userNote'=>$notes,'userAnalysis'=>$analysiss,'userMark'=>$marks]);
        $filePath = "files/upload/record/".time().".txt";
        $myFile = fopen ($filePath,"w") or die("Unable to open file!");
        fwrite($myFile, $res);
        fclose($myFile);
        return $filePath;
    }

    /**
     * @param $page
     * @param $pageSize
     * @return array
     * 按做题正确最高的获取用户
     * by  yanni
     */
    public function getUserByAccuracyRate($page,$pageSize){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $time = time()-(86400*30*3);
        $sql = "SELECT (SELECT count(ua3.id) FROM x2_user_answer AS ua3 WHERE ua3.uid = ua1.uid and ua3.correct=1 and ua3.createTime >= $time)/(SELECT count(ua2.id) FROM x2_user_answer AS ua2 WHERE ua2.uid = ua1.uid and ua2.createTime >= $time)*100 as correctRate,ua1.* FROM (SELECT u.userName,u.nickname,u.uid,count(ua.uid) as do FROM x2_user AS u LEFT JOIN x2_user_answer AS ua ON u.uid = ua.uid
 WHERE ua.uid != '' GROUP BY u.uid) AS ua1 where ua1.do>100 having correctRate >= 50 order by correctRate desc $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }




    // 新增app调用接口-----------------


    /**
     * 添加行为积分
     * by sjeam
    */
    public static function addBehavior($behavior,$uid,$type=1,$belong=2){ // gamt belong=1 GRE belong 2
        switch ($behavior) {
            case 1://评论 和回复
            $behavior = 'reply';
            $intergral = Yii::$app->params['behavior']['reply']['integral'];
            break;
            case 2://吐槽
            $behavior = 'addGossip';
            $intergral = Yii::$app->params['behavior']['addGossip']['integral'];
            break;
            case 3: //打卡
            $behavior = 'userSign';
            $intergral = Yii::$app->params['behavior']['userSign']['integral'];
            break;
            case 4: //注册
            $behavior = 'register';
            $intergral = Yii::$app->params['behavior']['register']['integral'];
            break;
            case 5: //登录
            $behavior = 'login';
            $intergral = Yii::$app->params['behavior']['login']['integral'];
            break;
            case 6: //购买
            $behavior = 'buyCourse';
            $intergral = Yii::$app->params['behavior']['buyCourse']['integral'];
            break;
            case 7: //分享
            $behavior = 'share';
            $intergral = Yii::$app->params['behavior']['share']['integral'];
            break;
            case 8: //报错
            $behavior = 'feedBack';
            $intergral = Yii::$app->params['behavior']['feedBack']['integral'];
            break;
          
        }
        $date = Method::curl_post(Yii::$app->params['loginUrl'].'/cn/ssl-app-api/add-behavior',['behavior' => $behavior,'uid' =>$uid,'type' =>$type,'belong' =>$belong]);
        // print_r($date);die;
        // 评论 添加行为积分
        $isAdd = json_decode($date,true);
        $isAdd== false ? $intergral = 0:$intergral;
        return $intergral;
    }

    // // vip 状态  0 未购买 1 vip  2 已过期  
    // public static function getIsVip(){
    //     $userId = Yii::$app->session->get('userId');
    //     $isvip = User:: getUser($userId)['isvip'];
    //     $vip_endtime = User:: getUser($userId)['vip_endtime'];
    //     if($isvip==1&&$vip_endtime<time() ){ $isvip=2; }
    //     return  $isvip;
    // }

    // /**
    //  * 获取用户信息
    //  */
    //  public static function getUser($userId){
    //     $data = User::find()->asArray()->where("userid=$userId")->one();
    //     return $data;
    // }

    // 称号等级和奖励
    // by  sjeam
    public static function getBehaviorClass(){
        $behavior=array(
            array('class'=>'青铜学水','leidou'=>100, 'give'=>'价值50元优惠券；GRE资料包+入群资格'),
            array('class'=>'白银学沫','leidou'=>300, 'give'=>'价值100元优惠券；付费活动免费参加1期'),
            array('class'=>'黄金学渣','leidou'=>500, 'give'=>'价值200元优惠券；官方考情解析资料'),
            array('class'=>'铂金学痞','leidou'=>1400,'give'=>'价值300元优惠券；视频解析免费看'),
            array('class'=>'钻石学霸','leidou'=>3000,'give'=>'价值400元优惠券；价值1000元录播课免费看'),
            array('class'=>'星耀学神','leidou'=>4500,'give'=>'价值500元优惠券；价值2000元直播课免费参与'),
            array('class'=>'王者学魔','leidou'=>8000,'give'=>'价值800元优惠券；雷哥网终身免费会员'),
        );
        return $behavior;
    }


    /**
     * 获取积分
     * @return int
     */
     public static function userIntegral(){
        $uid = Yii::$app->session->get('uid');
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        if($uid){
            $intergral = uc_user_integral2($uid)['integral'];//获取当前积分
        }else{
            $intergral = 0;
        }
        return $intergral;
    }

    /**
    * 获取行为称号
    */
    public static function userBehavior($uid=null){
        if(!$uid){
            $uid = Yii::$app->session->get('uid');
        }
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        if($uid){
            $behavior = uc_user_behavior($uid)['behavior'];
        }else{
            $behavior = 0;
        }
        //行为积分对应称号
        if($behavior<10){
            $behaviorName = '青铜学水';
            $last = 10-$behavior;
            $level = 0;
        }elseif($behavior<30&&$behavior>=10){
            $behaviorName = '青铜学水';
            $last = 30-$behavior;
            $level = 1;
        }elseif($behavior<50&&$behavior>=30){
            $behaviorName = '白银学沫';
            $last = 50-$behavior;
            $level = 2;
        }elseif($behavior<140&&$behavior>=50){
            $behaviorName = '黄金学渣';
            $last = 140-$behavior;
            $level = 3;
        }elseif($behavior<300&&$behavior>=140){
            $behaviorName = '铂金学痞';
            $last = 300-$behavior;
            $level = 4;
        }elseif($behavior<450&&$behavior>=300){
            $behaviorName = '钻石学霸';
            $last = 450-$behavior;
            $level = 5;
        }elseif($behavior<800&&$behavior>=450){
            $behaviorName = '星耀学神';
            $last = 800-$behavior;
            $level = 6;
        }else{
            $level = 7;
            $behaviorName = '王者学魔';
            $last = 0;
        }
        return ['behaviorName' => $behaviorName,'behavior' => $behavior,'last' => $last,'level' => $level];
    }
    
}