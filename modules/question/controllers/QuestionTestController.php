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
use app\modules\question\models\QuestionsTest;
use app\modules\cn\models\User;
use yii;
use app\libs\App1Control;
class QuestionTestController extends App1Control {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page',1);
        $questionId = Yii::$app->request->get('questionId');
        $catId = Yii::$app->request->get('catId');
        $knowId = Yii::$app->request->get('knowId');
        $set = Yii::$app->request->get('set');
        $keyWord = Yii::$app->request->get('keyWord');
        $userName = Yii::$app->request->get('userName');

        $cats = QuestionCat::find()->asArray()->all();
        $knows = [];
        $where="1=1";
        if($questionId){
            $where .= " AND q.id = {$questionId}";
        }
        if($catId){
            $where .= " AND q.catId = {$catId}";
            $knows = QuestionKnow::find()->asArray()->where("catId={$catId}")->all();
        }
        if($set){
            $where .= " AND q.set = '{$set}'";
        }
        if($knowId){
            $where .= " AND q.knowId = {$knowId}";
        }
        if($keyWord){
            $where .= " AND q.stem like '%{$keyWord}%'";
        }

        if($userName){
            $userlist = User::find()->select('id')->where(" userName like '%{$userName}%'")->asArray()->all();
            $userlist ? $inputid=implode(array_column($userlist,'id'),',' ):$inputid='0';
            $where .= " AND q.inputUser in ($inputid)";
        }

        if(!$page){
            $page = 1;
        }
        $pageSize = 10;
        $model = new QuestionsTest();
        $data = $model->getQuestionsTest($where,$page,$pageSize);
//        var_dump($data);die;
        foreach($data['data'] as $k=>$v){
            $cat = QuestionCat::find()->asArray()->where("id={$v['catId']}")->one();
            $type = QuestionType::find()->asArray()->where("id={$v['typeId']}")->one();
            $know = QuestionKnow::find()->asArray()->where("id={$v['knowId']}")->one();
//            $source = QuestionSource::find()->asArray()->where("id={$v['sourceId']}")->one();
            $level = QuestionLevel::find()->asArray()->where("id={$v['levelId']}")->one();
            $data['data'][$k]['cat'] = $cat['name'];
            $data['data'][$k]['type'] = $type['name'];
            $data['data'][$k]['know'] = $know['name'];
//            $data['data'][$k]['source'] = $source['name'];
            $data['data'][$k]['level'] = $level['name'];
        }
        return $this->render('index',['content' => $data['data'],'page' => $data['pageStr'],'count'=>$data['count'],'pageSize'=>$pageSize,'cats'=>$cats,'knows'=>$knows,'block' => $this->block]);
    }

    /**
     * 添加分类与其基本信息
     * @return string
     * @Obelisk
     */
    public function actionAdd(){
        if($_POST){
            $data = Yii::$app->request->post('data');
            $data['inputUser'] = Yii::$app->session->get('adminId');
            $data['createTime'] = time();
            $data['updateTime'] = time();
            $re = Yii::$app->db->createCommand()->insert('{{%questions_test}}',$data)->execute();
            if($re){
                $url = Yii::$app->session->get('url');
                return $this->redirect("$url");
            }else{
                die('<script>alert("失败，请重试");history.go(-1);</script>');
            }
        }else{
            $url = strstr(Yii::$app->request->getUrl(),'url=');
            Yii::$app->session->set('url',substr($url,4));
            $cat = QuestionCat::find()->asArray()->all();
            $level = QuestionLevel::find()->asArray()->all();
            return $this->render('add',['cat' => $cat,'level' => $level]);
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
            $data['updateTime'] = time();
            QuestionsTest::updateAll($data,"id=$id");
            $url = Yii::$app->session->get('url');
            $this->redirect("$url");
        }else{
            $id = Yii::$app->request->get('id');
            $url = strstr(Yii::$app->request->getUrl(),'url=');
            Yii::$app->session->set('url',substr($url,4));
            $model = new QuestionsTest();
            $data = $model->find()->asArray()->where("id=$id")->one();
            $cat = QuestionCat::find()->asArray()->all();
            $level = QuestionLevel::find()->asArray()->all();
            $type = QuestionType::find()->asArray()->where("catId={$data['catId']}")->all();
            $know = QuestionKnow::find()->asArray()->where("catId={$data['catId']}")->all();
            return $this->render('update',array('data'=> $data,'cat' => $cat,'level' => $level,'id' => $id,'type' => $type,'know' => $know));
        }
    }
    /**
     * 删除题目
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = QuestionsTest::findOne($id)->delete();
        if($res){
            $re = ['code'=>1,'message'=>'删除成功'];
        } else{
            $re = ['code'=>1,'message'=>'删除失败'];
        }
        die(json_encode($re));
    }

}