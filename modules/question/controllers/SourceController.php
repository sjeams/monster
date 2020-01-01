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
class SourceController extends App1Control {
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
        $catId = Yii::$app->request->get('cat',0);
        $pageSize = 10;
        $model = new QuestionSource();
        $data = $model->getSource($page,$pageSize,$catId);
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
            $catId = Yii::$app->request->post('catId');
            $model = new QuestionSource();
            $model->name = $data['name'];
            $model->alias = $data['alias'];
            $model->sort = $data['sort'];
            $model->save();
            $re = Yii::$app->db->createCommand()->insert('{{%source_cat}}',['sourceId'=>$model->primaryKey,'catId'=>$catId])->execute();
            if($re){
                return $this->redirect('/question/source/index');
            }else{
                die('<script>alert("失败，请重试");history.go(-1);</script>');
            }
        }else{
            $cat = QuestionCat::find()->asArray()->all();
            return $this->render('add',['cat'=>$cat]);
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
            $catId = Yii::$app->request->post('catId');
            $originalCat = Yii::$app->request->post('originalCat');
            $model = new QuestionSource();
            $res = $model->findOne($id);
            $res->name = $data['name'];
            $res->alias = $data['alias'];
            $res->sort = $data['sort'];
            $r = $res->save();
            if($originalCat != $catId){
                SourceCat::updateAll(['catId'=>$catId],"sourceId=$id and catId={$originalCat}");
            }
            $page = Yii::$app->session->get('page');
            $this->redirect("/question/source/index?page=$page&cat=$catId");
        }else{
            $id = Yii::$app->request->get('id');
            $catId = Yii::$app->request->get('catId');
            Yii::$app->session->set('page',Yii::$app->request->get('page'));
            $data = QuestionSource::find()->asArray()->where("id=$id")->one();
            $cat = QuestionCat::find()->asArray()->all();
            return $this->render('update',array('data'=> $data,'id'=>$id,'cat'=>$cat,'catId'=>$catId));
        }
    }
    /**
     * 删除來源
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res =SourceCat::deleteAll('sourceId='.$id);
        $r = QuestionSource::deleteAll('id='.$id);
        if($res || $r){
            $re = ['code'=>1,'message'=>'删除成功'];
        } else{
            $re = ['code'=>1,'message'=>'删除失败'];
        }
        die(json_encode($re));
    }

}