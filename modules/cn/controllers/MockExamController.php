<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21
 * Time: 11:00
 */
namespace app\modules\cn\controllers;

use app\libs\Method;
use app\libs\ToeflController;
use app\modules\cn\models\MockExam;
use app\modules\cn\models\MockRecord;
use app\modules\cn\models\MockResult;
use app\modules\cn\models\Scale;
use app\modules\cn\models\Score;
use app\modules\cn\models\User;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserNote;
use app\modules\question\models\Questions;
use Yii;

class MockExamController extends ToeflController {
    public $layout = 'cn';
    public $enableCsrfValidation = false;

    public function init(){
        parent::init();
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            echo "<script>alert('您未登录！'),setTimeout(function(){history.go(-1);},1000)</script>";die;
        }
    }

    //页面初始化判断
    public function judge($sectionId,$mockExamId,$minute = null){
        $uid = \Yii::$app->session->get("uid");
        $data = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId and sectionId = $sectionId")->one();
        if(!$data){
            $result = MockResult::find()->where("uid and $uid and mockExamId = $mockExamId and status = 1")->one();
            if($result){
                 echo "<script>alert('您已完成该模考');setTimeout(function(){location.href='/mockResult/$mockExamId.html'},100)</script>";
            }else{
                if(is_null($minute)){
                    echo "<script>alert('您只能在当前section操作');setTimeout(function(){location.href='/mockTopic/$mockExamId.html'},100)</script>";
                }else{
                    echo "<script>alert('您只能在当前section操作');setTimeout(function(){location.href='/cn/mock-exam/rest?sectionId=$sectionId&minute=$minute'},200)</script>";
                }
            }
        }else{
            return true;
        }
    }

    public function actionMockExam(){
        $uid = Yii::$app->session->get('uid');
        $type = Yii::$app->request->get("type",0);
        $access = Yii::$app->request->get("access",0);
        $mock = new MockExam();
        $mocks = $mock->getMockData($type,$access);
        //右侧信息
        $datas = $mock->getMockResult();
        //是否已经做过该套题
        foreach($mocks as $key => $value){
            foreach($value as $k => $v){
                $mockExamId = $v['id'];
                if($uid){
                    $result = $mock->getDoResult($uid,$mockExamId);
                    $mocks[$key][$k]['isDo'] = $result;//2-完成 1-未做完 0 未开始
                }else{
                    $mocks[$key][$k]['isDo'] = 0;
                }
                //平均得分
                $aversge = $mock->getAverage($mockExamId);
                $mocks[$key][$k]['average'] = $aversge;
            }

        }
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->render('mold_index',['mocks'=>$mocks,'datas'=>$datas,'uid'=>$uid,'type'=>$type,'access'=>$access]);
    }
    /**
     * 说明页面
     * cy  type 1-语文 2-数学 3-全套
     */
    public function actionExplain(){
        $type = Yii::$app->request->get("type");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $uid = Yii::$app->session->get("uid");
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_declare',['uid'=>$uid,'mockExamId'=>$mockExamId,'type'=>$type]);
    }
    /**
     * 做题页面 进入section
     * cy
     */
    public function actionMakeTopic(){
        $uid = Yii::$app->session->get("uid");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $mockRecord = new MockRecord();
        $mockExam = new MockExam();
        //判断用户是否是第一次进入
        $result = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->one();
        if($result){
            $hastime = $result['hasTime'];//剩余时间
            $sectionId = $result['sectionId'];
            $questionId = $mockRecord::find()->where("uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId and do = 0 ")->orderBy("id desc")->asArray()->one()['questionId'];//最近未做的题
            if(!$questionId){
                $questionId = $mockRecord::find()->where("uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId and do = 1 ")->orderBy("id desc")->asArray()->one()['questionId'];//最近完成的题
                if(!$questionId){
                    $questionId = $mockExam->getFirstTest($mockExamId,$sectionId)[1];//当前section第一道题
                }
            }
            //当前题目位置 及题目数量以及下一题信息
            $timu = $mockRecord->getSite($questionId,$sectionId,'Done');
            $type = $mockExam->getType($mockExamId,$sectionId);
        }else{
            $questionMsg = $mockExam->getFirstTest($mockExamId);
            $questionId = $questionMsg[1];
            $sectionId = $questionMsg[0];
            $timu = $mockRecord->getSite($questionId,$sectionId,'first');
            $type = $mockExam->getType($mockExamId,$sectionId);//模考类型 1-语文 2-数学
            if($type == 1){
                $hastime = 1800;
            }else{
                $hastime = 2100;
            }
            $mockResult = new MockResult();
            $mockResult->uid = $uid;
            $mockResult->mockExamId = $mockExamId;
            $mockResult->sectionId = $sectionId;
            $mockResult->createTime = time();
            $mockResult->type = $type;
            $mockResult->status = 0;
            $mockResult->hasTime = $hastime;
            $mockResult->save();
        }
        //判断当前section是否正确
        $res = $this->judge($sectionId,$mockExamId);
        if(!$res){die;}
        //判断是否标记
        $ismark = $mockRecord->isMark($uid,$sectionId,$mockExamId,$questionId);
        //当前section位置及section总数
        $sectionMsg = $mockRecord->getSectionSite($sectionId,$mockExamId);
        $question = Questions::find()->where("id = $questionId")->asArray()->one();
        $mockName = $mockExam->getName($mockExamId);
        $data = $this->topicInit($question);
        $typeId = $data['type'];
        $question = $data['question'];
        $times = $this->getMinute($hastime);
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('make-topic',['mark'=>$ismark,'mockName'=>$mockName,'sectionMsg'=>$sectionMsg,'timu'=>$timu[0],'hastime'=>$hastime,'content'=>$question,'nextId'=>$timu[1],'sectionId'=>$sectionId,'mockExamId'=>$mockExamId,'times'=>$times,'type'=>$typeId,'mockType'=>$type]);
    }
    /**
     * 进入某道题
     * cy
     */
    public function actionDesignation(){
        $questionId = Yii::$app->request->get("questionId");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $sectionId = Yii::$app->request->get("sectionId");
        $uid = Yii::$app->session->get("uid");
        $access=Yii::$app->request->get('type','zuoti');
        //判断当前section是否正确
        $res = $this->judge($sectionId,$mockExamId);
        if(!$res){die;}
        $mockRecord = new MockRecord();
        $mockExam = new MockExam();
        $type = $mockExam->getType($mockExamId,$sectionId);
        if($access == "zuoti"){
            $hastime = MockResult::find()->where("mockExamId = $mockExamId and sectionId = $sectionId and uid = $uid")->asArray()->one()['hasTime'];
        }else{
            $hastime = Yii::$app->request->get("hastime");
        }
        $times = $this->getMinute($hastime);
        $question = Questions::find()->where("id = $questionId")->asArray()->one();

        //当前题目位置 及题目数量以及下一题信息
        $timu = $mockRecord->getSite($questionId,$sectionId,'Done');
        //当前section位置及section总数
        $sectionMsg = $mockRecord->getSectionSite($sectionId,$mockExamId);
        //判断是否标记
        $ismark = $mockRecord->isMark($uid,$sectionId,$mockExamId,$questionId);
        $mockName = $mockExam->getName($mockExamId);
        $data = $this->topicInit($question);
        $question = $data['question'];
        $typeId = $data ['type'];//获取用户是否做过该题的相关信息
        $record = MockRecord::find()->where("uid = $uid and sectionId = $sectionId  and questionId = $questionId")->asArray()->one();
        if($record){
            //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
            $answer = $record['answer'];
            if($typeId == 2 || $typeId == 3 ){
                $answer = explode(',',$answer);
            }
            if($typeId == 4||$typeId ==6 || $typeId == 9){
                $answer = str_split($answer);
            }
            $question['userAnswer'] = $answer;
        }
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('make-topic',['mark'=>$ismark,'mockName'=>$mockName,'sectionMsg'=>$sectionMsg,'timu'=>$timu[0],'hastime'=>$hastime,'content'=>$question,'nextId'=>$timu[1],'sectionId'=>$sectionId,'mockExamId'=>$mockExamId,'times'=>$times,'type'=>$typeId,'mockType'=>$type]);
    }
    /**
     * exit section
     * cy
     */
    public function actionExitSection(){
        $uid = Yii::$app->session->get("uid");
        $questionId = Yii::$app->request->get("questionId");
        $hastime = Yii::$app->request->get("hastime");
        $sectionId = Yii::$app->request->get("sectionId");
        $mock = new MockExam();
        $mockExamId = $mock->getMockExamId($sectionId);
        //判断当前section是否正确
        $this->judge($sectionId,$mockExamId);
        $this->atlerHastime($uid,$mockExamId,$sectionId,$questionId,$hastime);
        $mockName = $mock->getName($mockExamId);
        $mockRecord = new MockRecord();
        $timu = $mockRecord->getSite($questionId,$sectionId,'Done');
        $sectionSite = $mockRecord->getSectionSite($sectionId,$mockExamId);
        $access = $mockExamId.'-'.$sectionId.'-'.$questionId;
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_exit',['access'=>$access,'mockName'=>$mockName,'sectionSite'=>$sectionSite,'timu'=>$timu[0],'mockExamId'=>$mockExamId,'sectionId'=>$sectionId,'questionId'=>$questionId]);
    }
    /**
     * quit save
     * cy
     *
     */
    public function actionQuitSave(){
        $uid = Yii::$app->session->get("uid");
        $questionId = Yii::$app->request->get("questionId");
        $hastime = Yii::$app->request->get("hastime");
        $sectionId = Yii::$app->request->get("sectionId");
        $mock = new MockExam();
        $mockExamId = $mock->getMockExamId($sectionId);
        //判断当前section是否正确
        $this->judge($sectionId,$mockExamId);
        $this->atlerHastime($uid,$mockExamId,$sectionId,$questionId,$hastime);
        $mockName = $mock->getName($mockExamId);
        $mockRecord = new MockRecord();
        $timu = $mockRecord->getSite($questionId,$sectionId,'Done');
        $sectionSite = $mockRecord->getSectionSite($sectionId,$mockExamId);
        $access = $mockExamId.'-'.$sectionId.'-'.$questionId;
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_quit',['access'=>$access,'mockName'=>$mockName,'sectionSite'=>$sectionSite,'timu'=>$timu[0],'mockExamId'=>$mockExamId,'sectionId'=>$sectionId,'questionId'=>$questionId,'hastime'=>$hastime]);
    }
    /**
     * section review
     * cy
     */
    public function actionReview(){
        $uid = Yii::$app->session->get("uid");
        $sectionId = Yii::$app->request->get("sectionId");
        $type = Yii::$app->request->get("type",'zuoti');
        $mock = new MockExam();
        $mockExamId = $mock->getMockExamId($sectionId);
        //判断当前section是否正确
        $this->judge($sectionId,$mockExamId);
        if($type == 'zuoti'){
            $hastime = Yii::$app->request->get("hastime");
            $questionId = Yii::$app->request->get("questionId");
            $this->atlerHastime($uid,$mockExamId,$sectionId,$questionId,$hastime);
            $access = '/mockTopic/'.$mockExamId.'-'.$sectionId.'-'.$questionId.'.html';
        }else{
            $minute = Yii::$app->request->get("minute");
            $access = "/cn/mock-exam/end-section?currSec=$sectionId&minute=$minute";
        }
        $mockName = $mock->getName($mockExamId);
        $mockRecord = new MockRecord();
        $timu = ['site'=>20,'totalCount'=>20];
        $sectionSite = $mockRecord->getSectionSite($sectionId,$mockExamId);
        $data = $mock->getSectionTimu($sectionId);
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_Review',['access'=>$access,'mockName'=>$mockName,'sectionSite'=>$sectionSite,'timu'=>$timu,'data'=>$data,'sectionId'=>$sectionId,'mockExamId'=>$mockExamId,'type'=>$type]);
    }
    /**
     * help gre 模考
     * cy
     *
     */
    public function actionHelp(){
        $acc = Yii::$app->request->get("acc");
        if($acc != 'declare'){
            $uid = Yii::$app->session->get("uid");
            $questionId = Yii::$app->request->get("questionId");
            $hastime = Yii::$app->request->get("hastime");
            $sectionId = Yii::$app->request->get("sectionId");
            $mock = new MockExam();
            $mockExamId = $mock->getMockExamId($sectionId);
            $this->atlerHastime($uid,$mockExamId,$sectionId,$questionId,$hastime);
            $access = '/mockTopic/'.$mockExamId.'-'.$sectionId.'-'.$questionId.'.html';
            $times = $this->getMinute($hastime);
        }else{
            $type = Yii::$app->request->get("type");
            $mockExamId = Yii::$app->request->get("mockExamId");
            $access = "/cn/mock-exam/explain?mockExamId=$mockExamId&type=$type.html";
        }
        $times = isset($times)?$times:[];
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_help',['access'=>$access,'times'=>$times]);
    }
    /**
     * 获取题的信息（初始化）
     * cy
     */
    public function topicInit($question){
        if($question['optionA']){
            $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
        }
        if($question['optionB']){
            $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
        }
        if($question['optionC']){
            $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
        }
        $typeId = $question['typeId'];
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if($typeId == 5 || $typeId == 6 || $typeId == 7){
            $question['details'] = Method::getTextHtmlArr($question['details'])[0];
            $article = $question['readArticle'];
            if($typeId != 7){
                $question['readArticle'] = $article;
            }else{
                $article = strip_tags($question['readArticle']);
                $articles = explode('.',$article);
                foreach($articles as $kk => $vv){
                    $articles[$kk] = trim(str_replace('&nbsp;','',$vv.'.'));
                }
                $question['readArticle'] = $articles;
            }
        }
        return ['question'=>$question,'type'=>$typeId];
    }
    /**
     * hastime修改
     * cy
     */
    public function atlerHastime($uid,$mockExamId,$sectionId,$questionId,$hastime){
         MockResult::updateAll(['hasTime'=>$hastime],"uid = $uid and mockExamId = $mockExamId and sectionId =$sectionId");
        $data = MockRecord::find()->where("uid = $uid and sectionId = $sectionId and questionId = $questionId and mockExamId = $mockExamId")->one();
        if($data){
            $data->createTime = date("Y-m-d H:i:s",time());
            $data->save();
        }else{
            $model = new MockRecord();
            $model->uid= $uid;
            $model->questionId = $questionId;
            $model->sectionId = $sectionId;
            $model->mockExamId = $mockExamId;
            $model->do = 0;
            $model->createTime = date("Y-m-d H:i:s",time());
            $model->save();
        }
    }
    /**
     * 秒数转换成分钟数
     */
    public function getMinute($time){
        $minutes = floor($time/60);
        $seconds = floor($time-(60*$minutes));
        if($minutes < 10) $minutes = '0'.$minutes;
        if($seconds < 10 ) $seconds = '0'.$seconds;
        $times = [$minutes,$seconds];
        return $times;
    }
    /**
     * section结束页面
     * cy
     */
    public function actionEndSection(){
        $uid = Yii::$app->session->get("uid");
        $currSec = Yii::$app->request->get("currSec");
        $minute = Yii::$app->request->get("minute");
        $mockExam =new MockExam();
        $mockRecord = new MockRecord();
        $mockExamId = $mockExam->getMockExamId($currSec);
        $sectionMsg = $mockRecord->getSectionSite($currSec,$mockExamId);
        $mockName = $mockExam->getName($mockExamId);
        //获取当前section最后一道题和剩余时间
        $data = $mockExam->getLastTopic($mockExamId,$currSec,$uid);
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_section',['mockExamId'=>$mockExamId,'sectionId'=>$currSec,'sectionSite'=>$sectionMsg,'mockName'=>$mockName,'questionId'=>$data['questionId'],'hastime'=>$data['hastime'],'minute'=>$minute]);
    }
    /**
     * 进入下一个section
     * cy
     */
    public function actionNextSection(){
        $sectionId = Yii::$app->request->get("sectionId");
        $minute = Yii::$app->request->get("minute");
        $mockExam = new MockExam();
        $mockExamId = $mockExam->getMockExamId($sectionId);
        //判断当前section是否正确
        $this->judge($sectionId,$mockExamId,$minute);
        $mockName = $mockExam->getName($mockExamId);
        $mockRecord = new MockRecord();
        $sectionSite = $mockRecord->getSectionSite($sectionId,$mockExamId);
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial('gre_nextsection',['sectionId'=>$sectionId,'minute'=>$minute,'mockName'=>$mockName,'sectionSite'=>$sectionSite]);
    }

    /**
     * 休息页面
     * cy
     */
    public function actionRest(){
        $uid = Yii::$app->session->get("uid");
        $minute = Yii::$app->request->get("minute");
        $sectionId = Yii::$app->request->get("sectionId");
        $mockExam = new MockExam();
        $mockExamId = $mockExam->getMockExamId($sectionId);
        //获取下一个section及第一道题目信息
        $nextSec = $mockExam->getSectionMsg($sectionId,$mockExamId);
        $next_sectionId = $nextSec['sectionId'];
        //判断当前section是否正确
//        $this->judge($next_sectionId,$mockExamId,$minute);
        $type = $mockExam->getType($mockExamId,$next_sectionId);
        if($type == 1){
            $time = 1800;
        }else{
            $time = 2100;
        }
        MockResult::updateAll(['sectionId'=>$next_sectionId,'hasTime'=>$time],"uid = $uid and mockExamId = $mockExamId and status =0");
        $mockName = $mockExam->getName($mockExamId);
        $mockRecord = new MockRecord();
        $next_sectionMsg = $mockRecord->getSectionSite($next_sectionId,$mockExamId);
        if($minute == 1){
            $html = 'gre_restOneMin';
        }else{
            $html = 'gre_restTenMin';
        }
        $access = "/mockTopic/".$mockExamId.'-'.$next_sectionId.'-'.$nextSec['questionId'].'.html';
        $this->title = '雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->renderPartial($html,['access'=>$access,'sectionId'=>$sectionId,'mockName'=>$mockName,'sectionSite'=>$next_sectionMsg]);
    }
    /**
     *模考结果页
     *cy
     */
    public function actionResult(){
        $mockExamId = Yii::$app->request->get("mockExamId");
        $sectionId = Yii::$app->request->get("sectionId",0);
        $access = Yii::$app->request->get("access",0);
        $questionId = Yii::$app->request->get("questionId",0);
        $direction = Yii::$app->request->get("direction");
        $uid = Yii::$app->session->get('uid');
        if($direction == 'help'){//模考退出保存入口进入
            $this->getMockExamMsg($uid,$mockExamId);
        }
        $data = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->asArray()->one();
        if(!$data){
            die("No message");
        }else{
            $type = MockExam::find()->where("id= $mockExamId")->asArray()->one()['type'];
            $correctMsg = unserialize($data['correctMsg']);
            $mockExam = new MockExam();
            $mockName = $mockExam->getName($mockExamId);
            //竞争力
            $correctRate = $data['correctRate']?$data['correctRate']:0;
            $mockResult = new MockResult();
            $totalCount = $mockResult->find()->select("id")->where("type  = $type")->count();
            $beatCount = $mockResult->find()->select("id")->where("type = $type and correctRate < $correctRate")->count();
            if($beatCount == 0){
                $beatRate = 0;
            }else{
                $beatRate  = ceil((10000*($beatCount/$totalCount)))/100;
            }
            //模考section信息、题目信息
            $sections = $mockExam->getSections($mockExamId);
            foreach($sections as $k => $v){
                if($type < 3){
                    $v['type'] = $type;
                    $sections[$k]['type'] = $type;
                }
                if($v['type'] == 1){
                    $sections[$k]['category'] = 'verbal';
                }else{
                    $sections[$k]['category'] = 'quant';
                }
                $sections[$k]['site'] = 'Section'.($k+1);
            }
            if($sectionId == 0){
                $sectionId = $sections[0]['id'];
            }
            //secction 下的题目信息
            if($access == 0){//acc  11-当前section已做的题  1-已做的错题 0||null 所有题 其他便是较长的题
                $acc = 11;
            }else{
                $acc = $access;
            }
            if($sectionId > $data['sectionId'] && $data['status'] != 1){
                echo "<script>alert('您还未开始做该section内的题');setTimeout(function(){history.go(-1);},300)</script>";
                die;
            }
            $question_data = $mockExam->getSectionTimu($sectionId,$acc);
            foreach($question_data as $k => $v){
                $qid = $v['questionId'];
                $sid = $v['sectionId'];
                $record = MockRecord::find()->where("uid = $uid and sectionId = $sid  and questionId = $qid")->asArray()->one();
                $correct = $record['correct'];
                if($correct == 1){
                    $question_data[$k]['correct'] = 1;//1-正确 0 -错误 -1 -未做
                }else{
                    if($record){
                        $question_data[$k]['correct'] = 0;
                    }else{
                        $question_data[$k]['correct'] = -1;
                    }
                }
            }
            if($questionId == 0){
                if(count($question_data) > 0){
                    $questionId = $question_data[0]['questionId'];
                }else{
                    if($access != 11){
                        echo "<script>alert('没有相关信息');setTimeout(function(){location.href='/mockResult/$mockExamId-$sectionId-0-0.html';},300)</script>";
                        die;
                    }
                }
            }
            $mockRecord = new MockRecord();
            $question =$mockRecord->getTopicDetail($uid,$questionId);
            $question['collecte'] =$mockExam->getCollecte($uid,$questionId);
            $typeId = $question['typeId'];
            if($typeId == 7){
                $question['answer'] = trim(strip_tags($question['answer'].'.'));
            }
            //评论
            $comment = new UserComment();
            $comment = $comment->getQuestionComment($questionId,1,5);
            foreach($comment['data'] as $k=>$v){
                $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
            }
            //笔记
            $note = UserNote::find()->where("uid =$uid and questionId = $questionId")->asArray()->all();
            $question['note'] = $note;
            $question['useTime'] = $this->changeSecond($question['useTime']);
            $question['averTime'] = $this->changeSecond($question['averTime']);
        }
        //时间转换
        if($type == 3){
            $data['averTime'] = $this->changeSecond(ceil(100*($data['useTime']/80))/100);
        }else{
            $data['averTime'] = $this->changeSecond(ceil(100*($data['useTime']/40))/100);
        }
        $data['useTime'] = $this->changeSecond($data['useTime']);
        $user = User::find()->where("uid = $uid ")->asArray()->one();
        $this->title = '模考报告_雷哥GRE模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台';
        $this->keywords = 'GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2，GRE模考报告';
        $this->description = '雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析';
        return $this->render('mold_result',['data'=>$data,'correctMsg'=>$correctMsg,'type'=>$type,'mockName'=>$mockName,'beatRate'=>$beatRate,'totalCount'=>$totalCount,'mockExamId'=>$mockExamId,'sections'=>$sections,'sectionId'=>$sectionId,'access'=>$access,'questionId'=>$questionId,'question_data'=>$question_data,'question'=>$question,'comment'=>$comment,'typeId'=>$typeId,'user'=>$user]);
    }
    /**
     * 重新做题
     * cy
     */
    public function actionDoAgain(){
        $uid = Yii::$app->session->get("uid");
        $mockExamId = Yii::$app->request->get("mockExamId");
        $res = MockResult::deleteAll("uid = $uid and mockExamId = $mockExamId");
        if($res){
            $re = MockRecord::deleteAll("uid = $uid and mockExamId = $mockExamId");
            if($re ){
                $this->redirect("/mockTopic/$mockExamId.html");
            }else{
                echo "<script>alert('操作失败');setTimeout(function(){history.go(-1)},1000)</script>";
            }
        }else{
            echo "<script>alert('操作失败');setTimeout(function(){history.go(-1)},1000)</script>";
        }
    }
    /**
     * 时间字符型转换
     * cy
     */
    public function changeSecond($usetime){
        $minute = floor($usetime/60);
        $seconds = $usetime-60*$minute;
        if($minute > 0){
            $times = $minute.'m'.$seconds.'s';
        }else{
            $times = $seconds.'s';
        }
        return $times;
    }
    /**
     * 获取用户mock数据信息
     * cy
     */
    public function getMockExamMsg($uid,$mockExamId){
        $mockExam = new MockExam();
        $mockRecord = new MockRecord();
        $type = $mockExam::find()->where("id = $mockExamId")->asArray()->one()['type'];
        $correctMsg = $mockRecord->getCorrectRate($uid,$mockExamId,$type);
        $mockResult = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->one();
        $mockResult->correctRate = $type == 3?0:$correctMsg['correctRate'];
        $mockResult->type = $type;
        $mockResult->sectionMsg = $correctMsg['secMsg'];
        $mockResult->correctMsg = $correctMsg['correctMsg'];
        $mockResult->useTime = $correctMsg['useTime'];
        $mockResult->endTime = time();
        $mockResult->save();
    }
    /**
     * 模考结果分享页面
     * cy
     * app
     */
    public function actionResultShare(){
        $uid = Yii::$app->session->get('uid');
        $mockId = Yii::$app->request->get('mockId');
        $data = MockResult::find()->where("uid = $uid and mockExamId = $mockId")->asArray()->one();
        $type = MockExam::find()->where("id= $mockId")->asArray()->one()['type'];
        $correctMsg = unserialize($data['correctMsg']);
        $mockExam = new MockExam();
        $mockName = $mockExam->getName($mockId);
        //竞争力
        $correctRate = $data['correctRate']?$data['correctRate']:0;
        $mockResult = new MockResult();
        $totalCount = $mockResult->find()->select("id")->where("type  = $type")->count();
        $beatCount = $mockResult->find()->select("id")->where("type = $type and correctRate < $correctRate")->count();
        if($beatCount == 0){
            $beatRate = 0;
        }else{
            $beatRate  = ceil((10000*($beatCount/$totalCount)))/100;
        }
        //时间转换
        if($type == 3){
            $data['averTime'] = $this->changeSecond(ceil(100*($data['useTime']/80))/100);
        }else{
            $data['averTime'] = $this->changeSecond(ceil(100*($data['useTime']/40))/100);
        }
        return $this->renderPartial('result-share',['type'=>$type,'data'=>$data,'correctMsg'=>$correctMsg,'beatRate'=>$beatRate,'totalCount'=>$totalCount]);
    }
}