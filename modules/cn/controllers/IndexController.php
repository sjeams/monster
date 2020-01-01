<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\Category;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserSearch;
use app\modules\cn\models\Question;
use app\modules\question\models\Questions;
use yii;
use app\libs\ToeflController;
use app\modules\cn\models\Content;

class IndexController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        // $this->type =1;
    }
    /**
     * 托福首页
     * @Obelisk
     */
    public function actionIndex(){
        var_dump(111);die;
        // $numQuestions = UserAnswer::find()->select("id")->asArray()->groupBy("uid")->count();
        // $numSearchs = UserSearch::find()->asArray()->where("id=1")->one();
        // $viewNum = 0;
        // $sign = Content::find()->asArray()->where("catId=568")->all();
        // foreach($sign as $value){
        //     $viewNum = $viewNum+$value['viewCount'];
        // }

        // $cache_new = \Yii::$app->cache->get('getIndexPageNewQues');   //获取缓存
        // if($cache_new){
        //     $newQuestions = $cache_new;
        // } else{
        //     $newQuestions = Question::find()->asArray()->orderBy('createTime desc')->limit(20)->all();
        //     foreach($newQuestions as $k=>$v){
        //         $qmodel = new Questions();
        //         if($v['catId'] && $v['sourceId']){
        //             $newQuestions[$k]['section'] = $qmodel->getSection($v['catId']);
        //             $newQuestions[$k]['source'] = $qmodel->getSource($v['sourceId']);
        //         }else{
        //             $newQuestions[$k]['section'] = '';
        //             $newQuestions[$k]['source'] = '';
        //         }
        //     }
        //     \Yii::$app->cache->set('getIndexPageNewQues', $newQuestions, 3600*24);//缓存一天
        // }

        // $cache_most = \Yii::$app->cache->get('getIndexPageMostQues');
        // if ($cache_most){
        //     $most_question = $cache_most;
        // }else{
        //     //讨论最多题目
        //     $model = new UserComment();
        //     $most_question = $model->mostCommit();
        //     foreach($most_question as $k=>$v){
        //         $qmodels = new Questions();
        //         if($v['catId'] && $v['sourceId']){
        //             $most_question[$k]['section'] = $qmodels->getSection($v['catId']);
        //             $most_question[$k]['source'] = $qmodels->getSource($v['sourceId']);
        //         }else{
        //             $most_question[$k]['section'] = '';
        //             $most_question[$k]['source'] = '';
        //         }
        //     }
        //     \Yii::$app->cache->set('getIndexPageMostQues', $most_question, 3600*24);//缓存一天
        // }
        // $this->title = 'GRE培训|GRE考试|GRE在线课程|GRE网课|GRE机经真题_雷哥GRE培训官网';
        // $this->keywords = 'GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        // $this->description = '雷哥GRE培训官网，提供最新gre考试资料，gre考试真题下载，更有gre课程培训、gre考试报名、gre培训辅导等特色服务。雷哥GRE通过PC、WAP和APP等互联网平台和工具，搭建GRE在线题库、GRE模考库和GRE知识库等，分析研究GRE用户的做题数据和学习轨迹，以人工智能为用户提供精准的留学GRE培训服务。';
        // $model = new Content();
        // //找出第一级栏目
        // $navigation = $model->getClass(['fields'=>'url','category'=>'587','order'=>'c.sort ASC','where'=>'c.pid = 0']);//线上id 587
        // foreach($navigation as $key=>$value){
        //     $da = $model->getClass(['fields'=>'url','order'=>'c.sort ASC','where'=>"c.pid = {$value['id']}"]);//线上id 587
        //     $navigation[$key]['childrens']=$da;
        // }
        // if(!$navigation) $navigation =array();
        // return $this->render('gre_index',['navigation'=>$navigation,'numQuestions'=>$numQuestions,'numSearchs'=>$numSearchs['viewCount'],'viewNum'=>$viewNum,'newQuestions'=>$newQuestions, 'most_question' => $most_question]);
    }
}
