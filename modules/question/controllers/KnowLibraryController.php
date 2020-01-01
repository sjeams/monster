<?php
/**
 * 分类管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\question\controllers;


use app\libs\Method;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\Questions;
use app\modules\cn\models\User;
use app\modules\question\models\QuestionLibrary;
use yii;
use app\libs\App1Control;
class KnowLibraryController extends App1Control {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * by  yanni
     */
    public function actionIndex()
    {
        $catId = Yii::$app->request->get('catId');
        $knowId = Yii::$app->request->get('knowId');
        $cats = QuestionCat::find()->asArray()->all();
        $knows = [];
        $where = " ql.type=2";
        if($catId){
            $where .= " AND ql.catId = {$catId}";
            $knows = QuestionKnow::find()->asArray()->where("catId={$catId}")->all();
        }
        if($knowId){
            $where .= " AND ql.knowId = {$knowId}";
        }
        $model = new QuestionLibrary();
        $queLib = $model->getAllSectionLibrary($where);
        return $this->render('index',['cats'=>$cats,'queLib'=>$queLib,'knows'=>$knows,'block' => $this->block]);
    }
    /**
     * 修改考点题库
     * @return string
     * by  yanni
     */

    public function actionUpdate(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $id = Yii::$app->request->post('id');
            QuestionLibrary::updateAll($data,"id=$id");
            $url = Yii::$app->session->get('url');
            $this->redirect("$url");
        }else{
            $id = Yii::$app->request->get('id');
            $url = strstr(Yii::$app->request->getUrl(),'url=');
            Yii::$app->session->set('url',substr($url,4));
            $sectionArr = QuestionCat::find()->asArray()->all();
            $data = QuestionLibrary::find()->asArray()->where("id=$id")->one();
            $model = new SourceCat();
            $source = $model->getSource($data['catId']);
            return $this->render('updateText',array('data'=> $data,'id'=>$id,'sectionArr'=>$sectionArr,'source'=>$source));
        }
    }
}