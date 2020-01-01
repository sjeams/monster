<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Content;
use app\modules\cn\models\MockExam;
use app\modules\cn\models\MockRecord;
use app\modules\cn\models\MockResult;
use app\modules\cn\models\User;
use app\modules\content\models\Video;
use yii;
use app\libs\ToeflController;
use app\modules\cn\models\UserCollection;
use app\modules\question\models\Questions;
use app\modules\question\models\QuestionSource;
use app\modules\cn\models\QuestionLevel;
use app\modules\user\models\UserSpeed;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\Login;
use app\modules\cn\models\Words;
use app\libs\GoodsPager;
use app\libs\Method;

class UserController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $this->title = '个人中心_雷哥GRE在线做题平台';
        $this->keywords = 'GRE做题记录，GRE模考记录，GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,';
        $this->description = '雷哥GRE在线个人中心，记录做题记录、错题记录、模考记录等学习记录';
    }

    /**
     * GRE个人中心
     * by  yanni
     */
    public function actionIndex(){
//        var_dump("首页");die;
        return $this->render('index');
    }
    /**
     * GRE搜索页
     * by  yanni
     */
    public function actionIndex_old(){
//        var_dump("首页");die;
        $this->title = '个人中心_雷哥GRE在线做题平台';
        $this->keywords = 'GRE做题记录，GRE模考记录，GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,';
        $this->description = '雷哥GRE在线个人中心，记录做题记录、错题记录、模考记录等学习记录';
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $center = Yii::$app->request->get('center',1);
        $userModel = new User();
        switch($center) {
            case 1:   //收藏题目
                $sectionId = Yii::$app->request->get('sectionId');
                $sourceId = Yii::$app->request->get('sourceId');
                $levelId = Yii::$app->request->get('levelId');
                $where = " qc.uid=$uid";
                if($sectionId){
                    $where .= " and q.catId={$sectionId}";
                    $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
                } else {
                    $sources = QuestionSource::find()->asArray()->all();
                }
                if($sourceId){
                    $where .= " and q.sourceId={$sourceId}";
                }
                if($levelId){
                    $where .= " and q.levelId={$levelId}";
                }
                $data = $userModel->getUserQuestionCollection($where,$page,10);
                foreach($data['data'] as $k=>$v){
                    $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
                    $amodel = new UserAnswer();
                    $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
                    $qmodel = new Questions();
                    $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
                    $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
                }
                $arrData['questionCollection'] = $data;
                $arrData['sources'] = $sources;
                $arrData['levels'] = QuestionLevel::find()->asArray()->all();
                break;
            case 2:  //做题记录
                $sectionId = Yii::$app->request->get('sectionId');
                $sourceId = Yii::$app->request->get('sourceId');
                $levelId = Yii::$app->request->get('levelId');
                $state = Yii::$app->request->get('state');
                $time = Yii::$app->request->get('time');
                $where = " ua.uid=$uid";
                if($sectionId){
                    $where .= " and q.catId={$sectionId}";
                    $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
                } else {
                    $sources = QuestionSource::find()->asArray()->all();
                }
                if($sourceId){
                    $where .= " and q.sourceId={$sourceId}";
                }
                if($levelId){
                    $where .= " and q.levelId={$levelId}";
                }
                if($state){    //做题情况  （正确1 错误2）
                    $where .= " and ua.correct=$state";
                }
                if($time=='day'){  //一天内
                    $dayAgo = time()-(60*60*24);
                    $where .= " and ua.createTime>$dayAgo";
                } elseif ($time=='week'){   //一周内
                    $weekAgo = time()-(60*60*24*7);
                    $where .= " and ua.createTime>$weekAgo";
                } elseif ($time=='month'){   //一月内
                    $monthAgo = time()-(60*60*24*30);
                    $where .= " and ua.createTime>$monthAgo";
                } elseif($time=='month1'){   //三月内
                    $month1Ago = time()-(60*60*24*90);
                    $where .= " and ua.createTime>$month1Ago";
                } elseif($time=='month2') {  //超过三月
                    $month2Ago = time()-(60*60*24*90);
                    $where .= " and ua.createTime<$month2Ago";
                }
                $data = $userModel->getDoneQuestionsRecord($where,$page,10,'','ORDER BY ua.createTime desc');
                foreach($data['data'] as $k=>$v){
                    $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
                    $amodel = new UserAnswer();
                    $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
                    $qmodel = new Questions();
                    $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
                    $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
                    $userColl = UserCollection::find()->asArray()->where("questionId={$v['id']} and uid={$uid}")->one();
                    if($userColl){
                        $data['data'][$k]['collection'] = 1;
                    } else {
                        $data['data'][$k]['collection'] = 2;
                    }
                }
//                var_dump($data);die;
                $arrData['doneRecord'] = $data;
                $arrData['sources'] = $sources;
                $arrData['levels'] = QuestionLevel::find()->asArray()->all();
                break;
            case 3:  //错题记录
                $sectionId = Yii::$app->request->get('sectionId');
                $sourceId = Yii::$app->request->get('sourceId');
                $levelId = Yii::$app->request->get('levelId');
                $time = Yii::$app->request->get('time');
                $where = " ua.uid=$uid";
                if($sectionId){
                    $where .= " and q.catId={$sectionId}";
                    $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
                } else {
                    $sources = QuestionSource::find()->asArray()->all();
                }
                if($sourceId){
                    $where .= " and q.sourceId={$sourceId}";
                }
                if($levelId){
                    $where .= " and q.levelId={$levelId}";
                }
                if($time=='day'){
                    $dayAgo = time()-(60*60*24);
                    $where .= " and ua.createTime>$dayAgo";
                } elseif ($time=='week'){
                    $weekAgo = time()-(60*60*24*7);
                    $where .= " and ua.createTime>$weekAgo";
                } elseif ($time=='month'){
                    $monthAgo = time()-(60*60*24*30);
                    $where .= " and ua.createTime>$monthAgo";
                } elseif($time=='month1'){
                    $month1Ago = time()-(60*60*24*90);
                    $where .= " and ua.createTime>$month1Ago";
                } elseif($time=='month2') {
                    $month2Ago = time()-(60*60*24*90);
                    $where .= " and ua.createTime<$month2Ago";
                }
                $data = $userModel->getDoneQuestionsRecord($where,$page,10,'2','ORDER BY ua.createTime desc');
                foreach($data['data'] as $k=>$v){
                    $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
                    $amodel = new UserAnswer();
                    $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
                    $qmodel = new Questions();
                    $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
                    $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
                    $userColl = UserCollection::find()->asArray()->where("questionId={$v['id']} and uid={$uid}")->one();
                    if($userColl){
                        $data['data'][$k]['collection'] = 1;
                    } else {
                        $data['data'][$k]['collection'] = 2;
                    }
                }
//                var_dump($data);die;
                $arrData['errorRecord'] = $data;
                $arrData['sources'] = $sources;
                $arrData['levels'] = QuestionLevel::find()->asArray()->all();
                break;
            case 4:  //生词本
                $sort = Yii::$app->request->get('sort');
                $time = Yii::$app->request->get('time');
                $where = " sw.uid=$uid";
                if($time=='day'){
                    $dayAgo = time()-(60*60*24);
                    $where .= " and sw.createTime>$dayAgo";
                } elseif ($time=='week'){
                    $weekAgo = time()-(60*60*24*7);
                    $where .= " and sw.createTime>$weekAgo";
                } elseif ($time=='month'){
                    $monthAgo = time()-(60*60*24*30);
                    $where .= " and sw.createTime>$monthAgo";
                } elseif($time=='month1'){
                    $month1Ago = time()-(60*60*24*90);
                    $where .= " and sw.createTime>$month1Ago";
                } elseif($time=='month2') {
                    $month2Ago = time()-(60*60*24*90);
                    $where .= " and sw.createTime<$month2Ago";
                }
                if($sort==1){
                    $order = " order by convert(c.name USING gbk) asc";
                } else {
                    $order = " ORDER BY sw.createTime desc";
                }
                $data = $userModel->getUsersTrangeWords($where,$page,10,$order);
                foreach($data['data'] as $k=>$v){
                    $data['data'][$k]['word'] = Words::find()->asArray()->where("word='{$v['name']}'")->one();
                }
                $arrData['strangeWords'] = $data;
                break;
            case 5:  //已购课程
                $type = Yii::$app->request->get('type');
                $model = new Content();
                if($type==1){
                    $strArr = $model->getCurriculumIdArr(4329);
                } elseif($type==2){
                    $strArr = $model->getCurriculumIdArr(4330);
                } else {
                    $strArr ='';
                }
                $str ='';
                if($strArr) {
                    foreach ($strArr as $v) {
                        $str .= $v['contentId'] . ',';
                    }
                    $str = rtrim($str, ",");
                }
                $data = Method::post("https://order.viplgw.cn/pay/api/gre-order",['uid' => $uid,'idStr' => $str,'pageSize' => 5,'page' => $page]);
                $data = json_decode($data,true);
                foreach($data['data'] as $k=>$v){
                    $sign = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$v['contentId']}",'pageSize' => 1]);
                    $data['data'][$k]['detail'] =  $sign[0];
                    if($v['startTime']<=time() && $v['endTime2']>=time()) {
                        $video = Video::find()->asArray()->where("cid={$v['contentId']} and grade='".$v['grade']."'")->all();
                        $data['data'][$k]['video'] = $video;
                    }
                }
//                var_dump($data);die;
                $arrData['curriculum'] = $data;
                break;
            case 6:  //雷豆管理
                $type = Yii::$app->request->get('type');
                $where = '';
                if($type == 1){
                    $where .= 'AND type=1';
                }
                if($type == 2){
                    $where .= 'AND type=2';
                }
                $pageSize = 10;
                $limit = (($page-1)*$pageSize).",$pageSize";
                $data = uc_user_integral1($uid,"limit $limit",$where);
                if(!is_array($data['details'])){
                    $data['details'] = [];
                }
                $pageModel = new GoodsPager($data['count'],$page,10,5);
                $data['pageStr'] = $pageModel->GetPagerContent();
                $arrData['leiDou'] = $data;
//                var_dump($data);die;
                break;
            case 7:  //邀请好友
                break;
            case 8: //模考记录
                $time = Yii::$app->request->get("time",0);
                $where = " uid = $uid ";
                //1-今天 2-昨天 3-本周 4-上周 5-本月 6-上月
                if($time == 1){
                    $date = date("Y-m-d");
                    $tp = strtotime($date);
                    $where .= " and endTime > $tp";
                }elseif($time == 2){
                    $tp1 = strtotime("-1 day");
                    $date2 = date("Y-m-d");
                    $tp2 = strtotime($date2);
                    $where .= " and endTime >$tp1 and endTime < $tp2 ";
                }elseif($time == 3){
                    $week = date("w");
                    if($week == 0)$week = 6;else $week -= 1;
                    $tp = strtotime("-$week day");
                    $where .= " and endTime > $tp";
                }elseif($time == 4){
                    $week = date("w");
                    if($week == 0)$week = 6;else $week -= 1;
                    $week1 = $week + 7;
                    $tp1 = strtotime("-$week1 day");
                    $tp2 = strtotime("-$week day");
                    $where .= " and endTime >$tp1 and endTime < $tp2 ";
                }elseif($time == 5){
                    $day = date("j")-1;
                    $tp = strtotime("-$day day");
                    $where .= " and endTime > $tp";
                }elseif($time == 6){
                    $day = date("j")-1;
                    $day1 = $day + 30;
                    $tp1 = strtotime("-$day1 day");
                    $tp2 = strtotime("-$day day");
                    $where .= " and endTime >$tp1 and endTime < $tp2 ";
                }
                $first = Yii::$app->request->get("first");
                $end = Yii::$app->request->get("end");
                if($first){
                    $first = $first/1000;
                    $ff = date("Y-m-d");
                }
                if($end){
                    $end = $end/1000;
                    $ee = date("Y-m-d");
                }
                if($first && $end){
                    $where .= " and endTime > $first and endTime < $end";
                }
                if($first && !$end){
                    $where .= " and endTime > $first";
                }
                if(!$first && $end){
                    $where .= " and endTime < $end";
                }
                $where .= " order by endTime desc";
                $mockCount = MockResult::find()->select("id")->where($where)->count();
                $page = new yii\data\Pagination(['totalCount'=>$mockCount,'pageSize'=>10]);
                $mock_result = MockResult::find()->where($where)->offset($page->offset)->limit($page->limit)->asArray()->all();
                foreach($mock_result as $k => $v){
                    $mockExamId = $v['mockExamId'];
                    $mockExam = new  MockExam();
                    $mockName = $mockExam->getName($mockExamId);
                    $firsttime = date('Y-m-d H:i:s',$v['createTime']);
                    $endtime = date('Y-m-d H:i:s',$v['endTime']);
                    $correctMsg = unserialize($v['correctMsg']);
                    $type = $mockExam::find()->where("id= $mockExamId")->asArray()->one()['type'];
                    if($type == 1){
                        $correctCount = $correctMsg['verbal']['correct'];
                        $total = 40;
                    }elseif($type == 2){
                        $correctCount = $correctMsg['quant']['correct'];
                        $total = 40;
                    }else{
                        $correctCount = $correctMsg['all']['correct'];
                        $total = 80;
                    }
                    $status = $v['status'];
                    if($status == 0){
                        $correctCount = MockRecord::find()->select("id")->where("uid = $uid and mockExamId = $mockExamId and correct = 1")->count();
                    }
                    $usetime = $v['useTime'];
                    $minute = floor($usetime/60);
                    $seconds = floor($usetime-60*$minute);
                    $times = $minute.'m'.$seconds.'s';
                    $mock = ['mockName'=>$mockName,'correct'=>$correctCount,'total'=>$total,'times'=>$times,'correctRate'=>$v['correctRate'],'firstTime'=>$firsttime,'endTime'=>$endtime,'mockExamId'=>$mockExamId,'status'=>$v['status'],'mockType'=>$v['type']];
                    $mocks[] = $mock;
                }
                $arrData['mockExam'] = $mocks;
                $arrData['mockPage'] = $page;
                $arrData['time'] = $time;
                $arrData['ff'] = $ff;
                $arrData['ee'] = $ee;
                $this->title = '个人中心_雷哥GRE在线做题平台';
                $this->keywords = 'GRE做题记录，GRE模考记录，GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题';
                $this->description = '雷哥GRE在线个人中心，记录做题记录、错题记录、模考记录等学习记录';
                break;

            default: //个人设置
        }
        $arrData['questionTotal'] = UserAnswer::find()->select("id")->asArray()->where("uid={$uid}")->count();   //做题总数
        $arrData['correctNum'] = UserAnswer::find()->select("id")->asArray()->where("uid={$uid} and correct=1")->count();  //正确总数
        $woreNum = 0;
        $sign = UserSpeed::find()->asArray()->where("userId={$uid}")->all();
        foreach($sign as $v){
            if($v['answer']=='complete'){
                $woreNum = $woreNum + 10;
            } else {
                $woreNum = $woreNum + $v['answer'];
            }
        }
        $arrData['wordNum'] =$woreNum;
        return $this->render('index');
    }
    /**
     * GRE收藏
     * by  yanni
     */
    public function actionCollection(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $userModel = new User();
        $sectionId = Yii::$app->request->get('sectionId');
        $sourceId = Yii::$app->request->get('sourceId');
        $levelId = Yii::$app->request->get('levelId');
        $where = " qc.uid=$uid";
        if($sectionId){
            $where .= " and q.catId={$sectionId}";
            $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
        } else {
            $sources = QuestionSource::find()->asArray()->all();
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        $data = $userModel->getUserQuestionCollection($where,$page,10);
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
            $amodel = new UserAnswer();
            $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
        }
        $arrData['questionCollection'] = $data;
        $arrData['sources'] = $sources;
        $arrData['levels'] = QuestionLevel::find()->asArray()->all();
        return $this->render('collection',$arrData);
    }

    /**
     * GRE模考记录
     * by  yanni
     */
    public function actionMockRecord(){
        $uid = Yii::$app->session->get('uid');
        $time = Yii::$app->request->get("time",0);
        $where = " uid = $uid ";
        //1-今天 2-昨天 3-本周 4-上周 5-本月 6-上月
        if($time == 1){
            $date = date("Y-m-d");
            $tp = strtotime($date);
            $where .= " and endTime > $tp";
        }elseif($time == 2){
            $tp1 = strtotime("-1 day");
            $date2 = date("Y-m-d");
            $tp2 = strtotime($date2);
            $where .= " and endTime >$tp1 and endTime < $tp2 ";
        }elseif($time == 3){
            $week = date("w");
            if($week == 0)$week = 6;else $week -= 1;
            $tp = strtotime("-$week day");
            $where .= " and endTime > $tp";
        }elseif($time == 4){
            $week = date("w");
            if($week == 0)$week = 6;else $week -= 1;
            $week1 = $week + 7;
            $tp1 = strtotime("-$week1 day");
            $tp2 = strtotime("-$week day");
            $where .= " and endTime >$tp1 and endTime < $tp2 ";
        }elseif($time == 5){
            $day = date("j")-1;
            $tp = strtotime("-$day day");
            $where .= " and endTime > $tp";
        }elseif($time == 6){
            $day = date("j")-1;
            $day1 = $day + 30;
            $tp1 = strtotime("-$day1 day");
            $tp2 = strtotime("-$day day");
            $where .= " and endTime >$tp1 and endTime < $tp2 ";
        }
        $first = Yii::$app->request->get("first");
        $end = Yii::$app->request->get("end");
        if($first){
            $first = $first/1000;
            $ff = date("Y-m-d");
        }
        if($end){
            $end = $end/1000;
            $ee = date("Y-m-d");
        }
        if($first && $end){
            $where .= " and endTime > $first and endTime < $end";
        }
        if($first && !$end){
            $where .= " and endTime > $first";
        }
        if(!$first && $end){
            $where .= " and endTime < $end";
        }
        $where .= " order by endTime desc";
        $mockCount = MockResult::find()->select("id")->where($where)->count();
        $page = new yii\data\Pagination(['totalCount'=>$mockCount,'pageSize'=>10]);
        $mock_result = MockResult::find()->where($where)->offset($page->offset)->limit($page->limit)->asArray()->all();
        foreach($mock_result as $k => $v){
            $mockExamId = $v['mockExamId'];
            $mockExam = new  MockExam();
            $mockName = $mockExam->getName($mockExamId);
            $firsttime = date('Y-m-d H:i:s',$v['createTime']);
            $endtime = date('Y-m-d H:i:s',$v['endTime']);
            $correctMsg = unserialize($v['correctMsg']);
            $type = $mockExam::find()->where("id= $mockExamId")->asArray()->one()['type'];
            if($type == 1){
                $correctCount = $correctMsg['verbal']['correct'];
                $total = 40;
            }elseif($type == 2){
                $correctCount = $correctMsg['quant']['correct'];
                $total = 40;
            }else{
                $correctCount = $correctMsg['all']['correct'];
                $total = 80;
            }
            $status = $v['status'];
            if($status == 0){
                $correctCount = MockRecord::find()->select("id")->where("uid = $uid and mockExamId = $mockExamId and correct = 1")->count();
            }
            $usetime = $v['useTime'];
            $minute = floor($usetime/60);
            $seconds = floor($usetime-60*$minute);
            $times = $minute.'m'.$seconds.'s';
            $mock = ['mockName'=>$mockName,'correct'=>$correctCount,'total'=>$total,'times'=>$times,'correctRate'=>$v['correctRate'],'firstTime'=>$firsttime,'endTime'=>$endtime,'mockExamId'=>$mockExamId,'status'=>$v['status'],'mockType'=>$v['type']];
            $mocks[] = $mock;
        }
        $arrData['mockExam'] = $mocks;
        $arrData['mockPage'] = $page;
        $arrData['time'] = $time;
        $arrData['ff'] = $ff;
        $arrData['ee'] = $ee;
        $this->title = '个人中心_雷哥GRE在线做题平台';
        $this->keywords = 'GRE做题记录，GRE模考记录，GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题';
        $this->description = '雷哥GRE在线个人中心，记录做题记录、错题记录、模考记录等学习记录';
        return $this->render('mock-record',$arrData);
    }
    /**
     * GRE错题记录
     * by  yanni
     */
    public function actionErrorQuestion(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $sectionId = Yii::$app->request->get('sectionId');
        $sourceId = Yii::$app->request->get('sourceId');
        $levelId = Yii::$app->request->get('levelId');
        $time = Yii::$app->request->get('time');
        $where = " ua.uid=$uid";
        if($sectionId){
            $where .= " and q.catId={$sectionId}";
            $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
        } else {
            $sources = QuestionSource::find()->asArray()->all();
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($time=='day'){
            $dayAgo = time()-(60*60*24);
            $where .= " and ua.createTime>$dayAgo";
        } elseif ($time=='week'){
            $weekAgo = time()-(60*60*24*7);
            $where .= " and ua.createTime>$weekAgo";
        } elseif ($time=='month'){
            $monthAgo = time()-(60*60*24*30);
            $where .= " and ua.createTime>$monthAgo";
        } elseif($time=='month1'){
            $month1Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime>$month1Ago";
        } elseif($time=='month2') {
            $month2Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime<$month2Ago";
        }
        $userModel = new User();
        $data = $userModel->getDoneQuestionsRecord($where,$page,10,'2','ORDER BY ua.createTime desc');
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
            $amodel = new UserAnswer();
            $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
            $userColl = UserCollection::find()->asArray()->where("questionId={$v['id']} and uid={$uid}")->one();
            if($userColl){
                $data['data'][$k]['collection'] = 1;
            } else {
                $data['data'][$k]['collection'] = 2;
            }
        }
//                var_dump($data);die;
        $arrData['errorRecord'] = $data;
        $arrData['sources'] = $sources;
        $arrData['levels'] = QuestionLevel::find()->asArray()->all();
        return $this->render('error-question',$arrData);
    }
    /**
     * GRE做题记录
     * by  yanni
     */
    public function actionQuestionList(){
        $uid = Yii::$app->session->get('uid');
        $sectionId = Yii::$app->request->get('sectionId');
        $sourceId = Yii::$app->request->get('sourceId');
        $levelId = Yii::$app->request->get('levelId');
        $state = Yii::$app->request->get('state');
        $time = Yii::$app->request->get('time');
        $page = Yii::$app->request->get('page',1);
        $where = " ua.uid=$uid";
        if($sectionId){
            $where .= " and q.catId={$sectionId}";
            $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId}")->queryAll();
        } else {
            $sources = QuestionSource::find()->asArray()->all();
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($state){    //做题情况  （正确1 错误2）
            $where .= " and ua.correct=$state";
        }
        if($time=='day'){  //一天内
            $dayAgo = time()-(60*60*24);
            $where .= " and ua.createTime>$dayAgo";
        } elseif ($time=='week'){   //一周内
            $weekAgo = time()-(60*60*24*7);
            $where .= " and ua.createTime>$weekAgo";
        } elseif ($time=='month'){   //一月内
            $monthAgo = time()-(60*60*24*30);
            $where .= " and ua.createTime>$monthAgo";
        } elseif($time=='month1'){   //三月内
            $month1Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime>$month1Ago";
        } elseif($time=='month2') {  //超过三月
            $month2Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime<$month2Ago";
        }
        $userModel = new User();
        $data = $userModel->getDoneQuestionsRecord($where,$page,10,'','ORDER BY ua.createTime desc');
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
            $amodel = new UserAnswer();
            $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
            $userColl = UserCollection::find()->asArray()->where("questionId={$v['id']} and uid={$uid}")->one();
            if($userColl){
                $data['data'][$k]['collection'] = 1;
            } else {
                $data['data'][$k]['collection'] = 2;
            }
        }
//                var_dump($data);die;
        $arrData['doneRecord'] = $data;
        $arrData['sources'] = $sources;
        $arrData['levels'] = QuestionLevel::find()->asArray()->all();
        return $this->render('question-list',$arrData);
    }

    /**
     * GRE生词本
     * by  yanni
     */
    public function actionStrangeWord(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $sort = Yii::$app->request->get('sort');
        $time = Yii::$app->request->get('time');
        $where = " sw.uid=$uid";
        if($time=='day'){
            $dayAgo = time()-(60*60*24);
            $where .= " and sw.createTime>$dayAgo";
        } elseif ($time=='week'){
            $weekAgo = time()-(60*60*24*7);
            $where .= " and sw.createTime>$weekAgo";
        } elseif ($time=='month'){
            $monthAgo = time()-(60*60*24*30);
            $where .= " and sw.createTime>$monthAgo";
        } elseif($time=='month1'){
            $month1Ago = time()-(60*60*24*90);
            $where .= " and sw.createTime>$month1Ago";
        } elseif($time=='month2') {
            $month2Ago = time()-(60*60*24*90);
            $where .= " and sw.createTime<$month2Ago";
        }
        if($sort==1){
            $order = " order by convert(c.name USING gbk) asc";
        } else {
            $order = " ORDER BY sw.createTime desc";
        }
        $userModel = new User();
        $data = $userModel->getUsersTrangeWords($where,$page,10,$order);
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['word'] = Words::find()->asArray()->where("word='{$v['name']}'")->one();
        }
        $arrData['strangeWords'] = $data;
        return $this->render('strange-word',$arrData);
    }

    /**
     * GRE订单（已购课程）
     * by  yanni
     */
    public function actionPurchaseCourse(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $type = Yii::$app->request->get('type');
        $model = new Content();
        if($type==1){
            $strArr = $model->getCurriculumIdArr(4329);
        } elseif($type==2){
            $strArr = $model->getCurriculumIdArr(4330);
        } else {
            $strArr ='';
        }
        $str ='';
        if($strArr) {
            foreach ($strArr as $v) {
                $str .= $v['contentId'] . ',';
            }
            $str = rtrim($str, ",");
        }
        $data = Method::post("https://order.viplgw.cn/pay/api/gre-order",['uid' => $uid,'idStr' => $str,'pageSize' => 5,'page' => $page]);
        $data = json_decode($data,true);
        foreach($data['data'] as $k=>$v){
            $videos = [];
            $sign = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$v['contentId']}",'pageSize' => 1]);
            $data['data'][$k]['detail'] =  $sign[0];
            if($v['startTime']<=time() && $v['endTime2']>=time()) {
                $types = Video::find()->select("type")->asArray()->where("cid={$v['contentId']} and grade='".$v['grade']."'")->groupBy("type")->orderBy("typeSort asc")->all();
                foreach($types as $j => $t){
                    $video = Video::find()->asArray()->where("cid={$v['contentId']} and grade='".$v['grade']."' and type = '".$t['type']."'")->orderBy("sort asc")->all();
                    $videos[] = ['type'=>$t['type'],'data'=>$video];
                }
                $data['data'][$k]['video'] = $videos;
            }
        }
        $arrData['curriculum'] = $data;
        return $this->render('purchase-course',$arrData);
    }

    /**
     * GRE雷豆记录
     * by  yanni
     */
    public function actionIntegralRecord(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $type = Yii::$app->request->get('type');
        $where = '';
        if($type == 1){
            $where .= 'AND type=1';
        }
        if($type == 2){
            $where .= 'AND type=2';
        }
        $pageSize = 10;
        $limit = (($page-1)*$pageSize).",$pageSize";
        $data = uc_user_integral1($uid,"limit $limit",$where);
        if(!is_array($data['details'])){
            $data['details'] = [];
        }
        $pageModel = new GoodsPager($data['count'],$page,10,5);
        $data['pageStr'] = $pageModel->GetPagerContent();
        $arrData['leiDou'] = $data;
        return $this->render('integral-record',$arrData);
    }

    /**
     * GRE邀请好友
     * by  yanni
     */
    public function actionInvitation(){
        return $this->render('invitation');
    }
    /**
     * GRE模考删除 用户中心
     * cy
     */
    public function actionDeleteMock(){
        $uid = Yii::$app->session->get("uid");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $result = MockResult::deleteAll("mockExamId = $mockExamId and uid = $uid");
        if($result){
            MockRecord::deleteAll("uid = $uid and mockExamId = $mockExamId");
            echo "<script> window.location.href='/user.html?center=8'</script>";
        }else{
            echo "<script>alert('删除失败');history.go(-1);</script>";
        }
    }
    /**
     * GRE模考删除 用户中心
     * cy
     */
    public function actionAgainMock(){
        $uid = Yii::$app->session->get("uid");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $result = MockResult::deleteAll("mockExamId = $mockExamId and uid = $uid");
        $re = MockRecord::deleteAll("mockExamId = $mockExamId and uid = $uid");
        if($result && $re){
            $mockType = MockExam::find()->where("id = $mockExamId")->asArray()->one()['type'];
            echo "<script> window.location.href='/cn/mock-exam/explain?mockExamId=$mockExamId&type=$mockType'</script>";
        }else{
            echo "<script>alert('操作失败');history.go(-1);</script>";
        }
    }

    /**
     * GRE学习计划
     */
    public function actionPlan(){
        $user = Yii::$app->session->get("userData");
        $content = file_get_contents("http://crm.viplgw.cn/content/web-api/other-get-plan?uid={$user['uid']}&phone={$user['phone']}&useremail={$user['email']}");
        return $this->render('studyPlan',['content' => $content]);
    }
}