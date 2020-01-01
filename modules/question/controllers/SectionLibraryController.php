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
use app\modules\cn\models\Question;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\User;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionLibrary;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\Questions;
use yii;
use app\libs\App1Control;
class SectionLibraryController extends App1Control {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        $cats = QuestionCat::find()->asArray()->all();
        $model = new QuestionLibrary();
        $queLib = $model->getAllSectionLibrary("ql.type=1");
        return $this->render('index',['cats'=>$cats,'queLib'=>$queLib,'block' => $this->block]);
    }

    /**
     * 添加分类与其基本信息
     * @return string
     * @Obelisk
     */
    public function actionAdd(){

        $sectionId = Yii::$app->request->get('catId');
        $sourceId = Yii::$app->request->get('sourceId');
        $libName = Yii::$app->request->get('libName');
        $stype = Yii::$app->request->get('stype');
        $model = new QuestionLibrary();
        $model->catId = $sectionId;
        $model->sourceId = $sourceId;
        $model->name = $libName;
        $model->type = 1;
        $model->createTime = time();
        $model->save();
        if($stype==1){
            header("location:/question/section-library/update?id=$model->primaryKey");die;
        } elseif($stype==2) {
            if ($sectionId == 1) {   //填空小库生成
                $queStr = $model->getLibraryQue(1, ' ');
                $que1_2 = Questions::find()->asArray()->where("catId=$sectionId and typeId=1 and id not in({$queStr})")->limit(2)->all();
                $que3_4 = Questions::find()->asArray()->where("catId=$sectionId and typeId=2 and id not in({$queStr})")->limit(2)->all();
                $questions = array_merge($que1_2, $que3_4);
                $que5_6 = Questions::find()->asArray()->where("catId=$sectionId and typeId=3 and id not in({$queStr})")->limit(2)->all();
                $questions = array_merge($questions, $que5_6);
                $que7_10 = Questions::find()->asArray()->where("catId=$sectionId and typeId=4 and id not in({$queStr})")->limit(4)->all();
                $questions = array_merge($questions, $que7_10);
                foreach ($questions as $v) {
                    $lmodel = new LibraryQuestion();
                    $lmodel->libId = $model->primaryKey;
                    $lmodel->questionId = $v['id'];
                    $lmodel->save();
                }
                echo '<script>alert("' . $libName . '添加成功");history.go(-1);</script>';
            } elseif ($sectionId == 2) {     //阅读小库生成
                $readNum = Yii::$app->request->get('readNum');
                $queStr = $model->getLibraryQue(2, ' ');
                if ($readNum == 3) {
                    $que_read = Questions::find()->asArray()->where("catId=$sectionId and typeId=1 and id not in({$queStr})")->groupBy("readStem")->limit(3)->all();
                } elseif ($readNum == 4) {
                    $que_read = Questions::find()->asArray()->where("catId=$sectionId and typeId=1 and id not in({$queStr})")->groupBy("readStem")->limit(4)->all();
                } else {
                    die('<script>alert("请选择题库文章数");history.go(-1);</script>');
                }
                foreach ($que_read as $v) {
                    $readQue = Question::find()->asArray()->where("readStem={$v['readStem']}")->all();
                    foreach ($readQue as $va) {
                        $lmodel = new LibraryQuestion();
                        $lmodel->libId = $model->primaryKey;
                        $lmodel->questionId = $va['id'];
                        $lmodel->save();
                    }
                }
                echo '<script>alert("' . $libName . '添加成功");history.go(-1);</script>';
            } elseif ($sectionId == 3) {          //数学小库生成
                $queStr = $model->getLibraryQue(3, ' ');
                $que_radio = Questions::find()->asArray()->where("catId=$sectionId and typeId=8 and id not in({$queStr})")->limit(2)->all();
                $que_mult = Questions::find()->asArray()->where("catId=$sectionId and typeId=9 and id not in({$queStr})")->limit(2)->all();
                $questions = array_merge($que_radio, $que_mult);
                $que_empty = Questions::find()->asArray()->where("catId=$sectionId and typeId=10 and id not in({$queStr})")->limit(2)->all();
                $questions = array_merge($questions, $que_empty);
                foreach ($questions as $v) {
                    $lmodel = new LibraryQuestion();
                    $lmodel->libId = $model->primaryKey;
                    $lmodel->questionId = $v['id'];
                    $lmodel->save();
                }
                echo '<script>alert("' . $libName . '添加成功");history.go(-1);</script>';
            } else {
                die('<script>alert("请选择单项");history.go(-1);</script>');
            }
        }
    }


    /**
     * 修改单项题库
     * @return string
     * @Obelisk
     */

    public function actionUpdate(){
        $id = Yii::$app->request->get('id');
        $cats = QuestionCat::find()->asArray()->all();
        $model = new QuestionLibrary();
        $questions = $model->getLibraryQuestions($id);
        foreach($questions as $k=>$v){
            if($v['inputUser']){
                $questions[$k]['user'] = User::find()->asArray()->select(['userName'])->where("uid={$v['inputUser']}")->one();
            }else{
                $questions[$k]['user']['userName'] = '' ;
            }
        }
        return $this->render('update',['cats'=>$cats,'questions'=>$questions,'block' => $this->block]);
    }



    /**
     * 修改单项题库 name
     * @return string
     * @sjeam
     */
     public function actionUpdateName(){
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');
        $model = QuestionLibrary::find()->where(['id'=>$id])->one();
        $model->name =$name;
        $res = $model->save();
        return $res; 
    }


    /**
     * ajax 查询题目
     * @return string
     * by yanni
     */
    public function actionAjaxQuestionSelect(){
        $questionId = Yii::$app->request->post('questionId');
        $sectionId = Yii::$app->request->post('sectionId');
        $sourceId = Yii::$app->request->post('sourceId');
        $where = "1=1";
        if($questionId){
            $where .= " and q.id={$questionId}";
        }
        if($sectionId){
            $where .= " and q.catId={$sectionId}";
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
//        var_dump($where);die;
        $data = \Yii::$app->db->createCommand("SELECT u.userName,q.stem,q.createTime,q.id from {{%questions}} q left join {{%user}} u on q.inputUser=u.uid where {$where}")->queryAll();
        die(json_encode($data));
    }

    /**
     * 手动添加
     * @return string
     * by yanni
     */
    public function actionManualAdd(){
        $questionId = Yii::$app->request->post('questionId');
        $libId = Yii::$app->request->post('libId');
        $sign =  QuestionLibrary::find()->asArray()->where("id={$libId}")->one();
        $modelq = new QuestionLibrary();
        $queStr = $modelq->getLibraryQue($sign['catId'], ' ');
        if(strpos($queStr,$questionId)===false){
            $model = new LibraryQuestion();
            $model->libId = $libId;
            $model->questionId = $questionId;
            $r = $model->save();
            if($r>0){
                $model = new QuestionLibrary();
                $questions = $model->getLibraryQuestions($libId);
                foreach($questions as $k=>$v){
                    $questions[$k]['user'] = User::find()->asArray()->select(['userName'])->where("uid={$v['inputUser']}")->one();
                    $questions[$k]['createTime'] = date("Y-m-d H:i:s", $v['createTime']);
                }
                $res = ['code'=>1,'message'=>'添加成功','data'=>$questions];
            } else {
                $res = ['code'=>0,'message'=>'添加失败'];
            }
        } else{
            $res = ['code'=>2,'message'=>'当前单项题库已存在此题'];
        }
        die(json_encode($res));
    }
    /**
     * 取消题库
     * @return string
     * by yanni
     */
    public function actionCancelQuestion(){
        $id = Yii::$app->request->post('id');
        $sign = LibraryQuestion::deleteAll("id={$id}");
        if($sign){
            $res = ['code'=>1,'message'=>'取消成功'];
        } else{
            $res = ['code'=>0,'message'=>'取消失败'];
        }
        die(json_encode($res));
    }

}