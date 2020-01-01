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
use yii;
use app\libs\App1Control;
class LevelsController extends App1Control {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page',1);
        if(!$page){
            $page = 1;
        }
        $pageSize = 10;
        $model = new QuestionLevel();
        $data = $model->getLevels($page,$pageSize);
        return $this->render('index',['content' => $data['data'],'page' => $data['pageStr'],'block' => $this->block]);
    }

    /**
     * 添加分类与其基本信息
     * @return string
     * @Obelisk
     */
    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $re = Yii::$app->db->createCommand()->insert('{{%question_level}}',$data)->execute();
            if($re){
                return $this->redirect('/question/levels/index');
            }else{
                die('<script>alert("失败，请重试");history.go(-1);</script>');
            }
        }else{
            return $this->render('add');
        }
    }


    /**
     * 修改分类
     * @return string
     * @Obelisk
     */

    public function actionUpdate(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $id = Yii::$app->request->post('id');
            QuestionLevel::updateAll($data,"id=$id");
            $page = Yii::$app->session->get('page');
            $this->redirect("/question/levels/index?page=$page");
        }else{
            $id = Yii::$app->request->get('id');
            Yii::$app->session->set('page',Yii::$app->request->get('page'));
            $data = QuestionLevel::find()->asArray()->where("id=$id")->one();
            return $this->render('update',array('data'=> $data,'id'=>$id));
        }
    }

}