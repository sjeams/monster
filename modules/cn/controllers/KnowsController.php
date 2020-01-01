<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\content\models\Category;
use yii;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;

class KnowsController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =9;
    }
    /**
     * GRE必考知识点
     * by  yanni
     */
    public function actionIndex(){
        $knowId = Yii::$app->request->get('knowId',569);
        $catDetail = Category::find()->asArray()->where("id={$knowId}")->one();
        $category = Category::find()->asArray()->where("pid ={$knowId}")->all();
        foreach($category as $k=>$v){
            $model = new Content();
            $category[$k]['content'] = $model->getKnowList($v['id']);
        }
        $catKnows = Category::find()->asArray()->where("pid =568")->all();
        $knowNum = 0;
        $viewNum = 0;
        foreach($catKnows as $k=>$v){
            $child = Category::find()->asArray()->where("pid ={$v['id']}")->all();
            foreach($child as $val){
                $model = new Content();
                $sign = $model->getKnowList($val['id']);
                $knowNum = $knowNum+count($sign);
                foreach($sign as $value){
                    $viewNum = $viewNum+$value['viewCount'];
                }
            }
            $catKnows[$k]['knowNum']=$knowNum;
            $catKnows[$k]['viewNum']=$viewNum;
            $knowNum = 0;
            $viewNum = 0;
        }
        $this->title = '雷哥GRE知识库_GRE备考攻略|GRE考试内容|GRE填空|GRE阅读|GRE词汇|GRE培训_雷哥GRE培训官网';
        $this->keywords = '如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学，雷哥培训';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('index',['data'=>$category,'catKnows'=>$catKnows,'catDetail'=>$catDetail]);
    }

    public function actionDetail(){
        $contentId = Yii::$app->request->get('contentId');
        $catId = Yii::$app->request->get('catId');
        $model = new Content();
        $data = $model->getClass(['where' => 'c.id='.$contentId,'fields' => 'description,price,keywords']);
        $relevant = $model->getClass(['where' => 'c.pid=0 and c.id!='.$contentId,'fields' => 'description','category'=>$catId]);
        Content::updateAll(['viewCount' => $data[0]['viewCount']+1],"id={$contentId}");
        $this->title = $data[0]['name'].'雷哥GRE知识库_GRE备考攻略|GRE考试内容|GRE填空|GRE阅读|GRE词汇|GRE培训_雷哥GRE培训官网';
        $this->keywords = $data[0]['price'];
        $this->description = $data[0]['keywords'];
        return $this->render('learn',['data'=>$data[0],'relevant'=>$relevant]);
    }
}