<?php
namespace app\modules\cn\models;
use app\modules\question\models\Questions;
use yii\db\ActiveRecord;
use app\libs\GoodsPager;
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
}