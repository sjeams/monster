<?php
/**
 * 内容接口类
 * @return string
 * @Obelisk
 */
namespace app\modules\question\controllers;


use app\libs\Method;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\QuestionLibrary;
use app\modules\question\models\Questions;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionsTest;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use yii;
use app\libs\ApiControl;

class ApiController extends ApiControl {
    public $enableCsrfValidation = false;

    /**
     * 切换分类
     * @Obelisk
     */
    public function actionChangeCat(){
        $id = Yii::$app->request->post('id');
        $type = QuestionType::find()->asArray()->where("catId=$id")->all();
        $know = QuestionKnow::find()->asArray()->where("catId=$id")->all();
        $source = SourceCat::find()->asArray()->where("catId=$id")->all();
        $str = Method::arrGoStr($source,'sourceId');
        $source = QuestionSource::find()->asArray()->where("id in ($str)")->all();
        die(json_encode(['type' => $type,'know' => $know,'source' => $source]));
    }

    /**
 * 切换分类
 * @Obelisk
 */
    public function actionQuestionAdd(){
        $model = new Questions();
        $model->catId = Yii::$app->request->post('catId');
        $model->sourceId = Yii::$app->request->post('sourceId');
        $model->typeId = Yii::$app->request->post('typeId');
        $model->knowId = Yii::$app->request->post('knowId');
        $model->readStem = Yii::$app->request->post('readStem');
        $model->readArticle = Yii::$app->request->post('readArticle');
        $model->stem = Yii::$app->request->post('stem');
        $model->answer = Yii::$app->request->post('answer');
        $model->details = Yii::$app->request->post('details');
        $model->quantityA = Yii::$app->request->post('quantityA');
        $model->quantityB = Yii::$app->request->post('quantityB');
        $model->optionA = Yii::$app->request->post('optionA');
        $model->optionB = Yii::$app->request->post('optionB');
        $model->optionC = Yii::$app->request->post('optionC');
        $model->levelId = Yii::$app->request->post('levelId');
        $model->inputUser = Yii::$app->session->get('adminId');
        $model->createTime = time();
        $model->updateTime = time();
        if (empty(Yii::$app->session->get('adminId'))){
            die(json_encode(['code' => 0,'message' => '请将数据填写完整']));
        }
        $re = $model->save();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }
    /**
     * 保存测试题
     * @Obelisk
     */
    public function actionQuestionTestAdd(){
        $model = new QuestionsTest();
        $model->catId = Yii::$app->request->post('catId');
        $model->set = Yii::$app->request->post('set');
        $model->typeId = Yii::$app->request->post('typeId');
        $model->knowId = Yii::$app->request->post('knowId');
        $model->readStem = Yii::$app->request->post('readStem');
        $model->readArticle = Yii::$app->request->post('readArticle');
        $model->stem = Yii::$app->request->post('stem');
        $model->answer = Yii::$app->request->post('answer');
        $model->details = Yii::$app->request->post('details');
        $model->quantityA = Yii::$app->request->post('quantityA');
        $model->quantityB = Yii::$app->request->post('quantityB');
        $model->optionA = Yii::$app->request->post('optionA');
        $model->optionB = Yii::$app->request->post('optionB');
        $model->optionC = Yii::$app->request->post('optionC');
        $model->levelId = Yii::$app->request->post('levelId');
        $model->inputUser = Yii::$app->session->get('adminId');
        $model->createTime = time();
        $model->updateTime = time();
        if (empty(Yii::$app->session->get('adminId'))){
            die(json_encode(['code' => 0,'message' => '请将数据填写完整']));
        }
        $re = $model->save();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }
    /**
     * 保存单项分类
     * by  yanni
     */
    public function actionSectionsAdd(){
        $model = new QuestionCat();
        $model->name = Yii::$app->request->post('sectionName');
        $re = $model->save();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }
    /**
     * 保存难度分类
     * by  yanni
     */
    public function actionLevelAdd(){
        $model = new QuestionLevel();
        $model->name = Yii::$app->request->post('levelName');
        $re = $model->save();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }
    /**
     * 保存知识点
     * by  yanni
     */
    public function actionKnowAdd(){
        $data['catId'] = Yii::$app->request->post('catId');
        $data['name'] = Yii::$app->request->post('knowName');
        $re = Yii::$app->db->createCommand()->insert('{{%question_know}}',$data)->execute();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }
    /**
     * 保存来源
     * by  yanni
     */
    public function actionSourceAdd(){
        $alias = Yii::$app->request->post('alias');
        $sourceName = Yii::$app->request->post('sourceName');
        $catId = Yii::$app->request->post('catId');
        $model = new QuestionSource();
        $model->name = $sourceName;
        $model->alias = $alias;
        $model->save();
        $re = Yii::$app->db->createCommand()->insert('{{%source_cat}}',['sourceId'=>$model->primaryKey,'catId'=>$catId])->execute();
        if($re){
            die(json_encode(['code' => 1,'message' => '保存成功']));
        }else{
            die(json_encode(['code' => 0,'message' => '保存失败']));
        }
    }

    /**
     * 更新题库
     * @Obelisk
     */
    public function actionLibraryUpdate(){
        set_time_limit(0);
        $type = Yii::$app->request->get('type');
        $model = new Questions();
        if($type==1){
            $model->updateSection();
        }else{
            $model->updateKnow();
        }
        var_dump($type);
        die(json_encode(['type' => $type]));


    }
    public function actionLibraryDelete(){
        $tiku = QuestionLibrary::find()->asArray()->where("catId=3 and type=2")->all();
        $tikuStr = '';
        foreach($tiku as $v){
            $tikuStr .=$v['id'].",";
        }
        $tikuStr = rtrim($tikuStr, ",") ;
//        LibraryQuestion::deleteAll("libId in($tikuStr)");
//        QuestionLibrary::deleteAll("catId=3 and type=2");
    }
//    /**
//     * 添加题库
//     * by  yanni
//     */
//    public function actionAddLibrary(){
//        $type = Yii::$app->request->get('type');
//        $sectionId = Yii::$app->request->get('sectionId');
//        $sourceId = Yii::$app->request->get('sourceId');
//        $model = new Questions();
//        $model->addQuestionBank($sectionId,$sourceId,$type);
//
//    }

}
