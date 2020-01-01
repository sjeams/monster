<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Question;
use app\modules\cn\models\QuestionLibrary;
use app\modules\cn\models\UserNote;
use app\modules\cn\models\UserSearch;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\Questions;
use app\modules\question\models\QuestionSource;
use app\modules\user\models\User;
use yii;
use app\libs\Method;
use app\libs\ToeflController;
use app\modules\cn\models\QuestionLevel;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\Content;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserCollection;
use app\modules\cn\models\UserAnalysis;
use app\modules\cn\models\QuestionCat;

class SearchController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =7;
    }
    /**
     * GRE搜索页
     * by  yanni
     */
    public function actionIndex(){
//        var_dump("首页");die;
        $sectionId = Yii::$app->request->get('sectionId');
        $sourceId = Yii::$app->request->get('sourceId');
        $levelId = Yii::$app->request->get('levelId');
        $type = Yii::$app->request->get('type');         //用户做过
        $keyWord = Yii::$app->request->get('words1');
        $keyWord = addslashes($keyWord);
        $page = Yii::$app->request->get('page',1);
        $where = "1=1";
        if($sectionId){
            $where .= " and q.catId={$sectionId}";
            $sources =\Yii::$app->db->createCommand("select * from {{%source_cat}} as sc left join {{%question_source}} as qs on sc.sourceId=qs.id where catId={$sectionId} order by qs.sort desc")->queryAll();
        } else {
            $sources = QuestionSource::find()->orderBy("sort desc")->asArray()->all();
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($keyWord){
            $where .= " and (q.stem like '%{$keyWord}%' or q.readStem like '%{$keyWord}%' or q.details like '%{$keyWord}%' or q.readArticle like '%{$keyWord}%')";
            $se = UserSearch::find()->asArray()->where("id=1")->one();
            UserSearch::updateAll(['viewCount'=>$se['viewCount']+1],"id=1");
        }
        $levels = QuestionLevel::find()->asArray()->all();
        $model = new Question();
        $data = $model->getQuestions($where,$type,$page,10);
        if($data){
            foreach($data['data'] as $k=>$v){
                $data['data'][$k]['doNum'] = UserAnswer::find()->select("id")->where("questionId={$v['id']}")->groupBy("uid")->count();
                $amodel = new UserAnswer();
                $data['data'][$k]['correctRate'] = $amodel->getCorrectRate($v['id']);
                $qmodel = new Questions();
                $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
                $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
            }
        } else {
            echo '<script>alert("请登录搜索您做过的题")</script>';
        }
        $newQuestions = Question::find()->asArray()->orderBy('createTime desc')->limit(20)->all();
        foreach($newQuestions as $k=>$v){
            $qmodel = new Questions();
            $newQuestions[$k]['section'] = $qmodel->getSection($v['catId']);
            $newQuestions[$k]['source'] = $qmodel->getSource($v['sourceId']);
        }
        $this->title = 'GRE真题机经搜索_gre真题题库_GRE真题题目解析_雷哥GRE题库';
        $this->keywords = 'GRE题库,GRE真题,GRE机经,GRE题目解析,GRE填空阅读逻辑数学,150真题,og,No题,XDF新东方,CQ陈琦,Princeton,Kaplan,Barron巴朗,Magoosh';
        $this->description = '雷哥GRE搜题题库提供GRE历年真题练习、题目解析、题目讨论，包含OG、150真题、历年大陆真题、NO题、陈虎平、陈琦、XDF新东方、magoosh等真题机经题目。';
        //获取题库数 题库题目数 平均做题数
        $tikuData = QuestionLibrary::getLibraryData();
        return $this->render('searchProblems',['data'=>$data,'sources'=>$sources,'levels'=>$levels,'newQuestions'=>$newQuestions,'library'=>$tikuData]);
    }

    /**
     * GRE题目详情
     * by  yanni
     */
    public function actionQuestionDetail(){
        $questionId = Yii::$app->request->get('questionId');
        $questionData = Question::find()->asArray()->where("id={$questionId}")->one();
        if($questionData['optionA']){
            $questionData['optionA'] = Method::getTextHtmlArr($questionData['optionA']);
        }
        if($questionData['optionB']){
            $questionData['optionB'] = Method::getTextHtmlArr($questionData['optionB']);
        }
        if($questionData['optionC']){
            $questionData['optionC'] = Method::getTextHtmlArr($questionData['optionC']);
        }
        if($questionData['typeId']==7){
            $questionData['readArticle'] = rtrim(strip_tags($questionData['readArticle']),".");
            $questionData['readArticle'] = explode(".",$questionData['readArticle']);
        }
        $readQue='';
        if($questionData['catId']==2){
            $where = addslashes($questionData['readStem']);
            $readQue = Question::find()->asArray()->where("readStem=\"$where\" and sourceId={$questionData['sourceId']}")->orderBy("id asc")->all();
        }
        $qmodel = new Questions();
        $questionData['section'] = QuestionCat::find()->asArray()->where("id={$questionData['catId']}")->one();
        $questionData['sourceName'] = $qmodel->getSource($questionData['sourceId']);
        $questionData['levelName'] = $qmodel->getLevel($questionData['levelId']);
        $amodel = new UserAnswer();
        $questionData['correctRate'] = $amodel->getCorrectRate($questionId);
        $questionData['averageTime'] = Method::secToTime($amodel->getAverageTime($questionId));
        $questionData['user'] = User::find()->asArray()->select(['userName','nickname'])->where("uid={$questionData['inputUser']}")->one();
        $questionData['audio'] = UserAnalysis::find()->asArray()->select(['audio'])->where("questionId={$questionId} and type=2 and publish=1")->one();
        $pModel = new UserAnalysis();
        $questionData['analysis'] = $pModel->getPublishUser($questionId);
        $questionData['audio'] = $pModel->getAudioPublishUser($questionId);


        $uid = Yii::$app->session->get('uid');
        $questionData['collection'] = '';
        if($uid){
            $questionData['collection'] = UserCollection::find()->asArray()->where("uid={$uid} and questionId={$questionId}")->one();
            $questionData['note'] = UserNote::find()->asArray()->where("uid={$uid} and questionId=$questionId")->all();
        }
        $modelu = new UserComment();
        $comment = $modelu->getQuestionComment($questionId,1,5);
        foreach($comment['data'] as $k=>$v){
            $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
        }
//        var_dump($comment);die;
        $newQuestions = Question::find()->asArray()->orderBy('createTime desc')->limit(20)->all();
        foreach($newQuestions as $k=>$v){
            $qmodel = new Questions();
            $newQuestions[$k]['section'] = $qmodel->getSection($v['catId']);
            $newQuestions[$k]['source'] = $qmodel->getSource($v['sourceId']);
            $newQuestions[$k]['know'] = QuestionKnow::find()->asArray()->where("id={$v['knowId']}")->one();
        }
        if(in_array("a",['1','61','9704','26440'])){  //上传音频解析权利
            $uploadRights = 1;
        } else{
            $uploadRights = 2;
        }
        $this->title = $questionData['stem'].'_GRE真题机经搜索_gre真题题库_GRE真题题目解析_雷哥GRE题库';
        $this->keywords = $questionData['stem'];
//            .'GRE题库,GRE真题,GRE机经,GRE题目解析,GRE填空阅读逻辑数学,150真题,og,No题,XDF新东方,CQ陈琦,Princeton,Kaplan,Barron巴朗,Magoosh';
        $this->description = $questionData['stem'];
//            .'雷哥GRE搜题题库提供GRE历年真题练习、题目解析、题目讨论，包含OG、150真题、历年大陆真题、NO题、陈虎平、陈琦、XDF新东方、magoosh等真题机经题目。';
        return $this->render('gre-topicDe',['questionData'=>$questionData,'comment'=>$comment,'newQuestions'=>$newQuestions,'uploadRights'=>$uploadRights,'readQue'=>$readQue]);
    }

    /**
     * GRE用户上传题目页
     * by  yanni
     */
    public function actionUserWrite(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $data['inputUser'] = Yii::$app->session->get('uid');
            $queId = Yii::$app->request->post('queId');
            $data['createTime'] = time();
            $data['updateTime'] = time();
            if($data['inputUser']){
                $re = Yii::$app->db->createCommand()->insert('{{%questions}}',$data)->execute();
                if($re){
                    echo '<script>alert("系统已收到您上传的试题,感谢支持");</script>';
                    if($queId){
                        return $this->redirect("/question/".$queId."html");
                    } else{
                        return $this->redirect("question_upload.html");
                    }
                }else{
                    die('<script>alert("失败，请重试");history.go(-1);</script>');
                }
            } else {
                echo '<script>alert("请登录");</script>';
                header("location:https://login.viplgw.cn/cn/index?source=22&url=http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            }
        }else{
            $cat = QuestionCat::find()->asArray()->all();
            $level = QuestionLevel::find()->asArray()->all();
            return $this->render('user_write',['cat' => $cat,'level' => $level]);
        }
    }
    /**
     * GRE题目讨论分页
     * by  yanni
     */
    public function actionQuestionCommentPage(){
        $questionId = Yii::$app->request->get('questionId');
        $page = Yii::$app->request->get('page');
        $modelu = new UserComment();
        $comment = $modelu->getQuestionComment($questionId,$page,5);
        foreach($comment['data'] as $k=>$v) {
            $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
        }
        die(json_encode($comment));
    }
}
