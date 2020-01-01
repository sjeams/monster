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
use app\modules\cn\models\ReportErrors;
use app\modules\cn\models\UserAnalysis;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\UserCollection;
use app\modules\cn\models\UserNote;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\Questions;
use app\modules\user\models\UserComment;
use app\modules\cn\models\User;
use yii;
use app\libs\App1Control;
class QuestionController extends App1Control {
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
        $answer = Yii::$app->request->get('answer');
        $sourceId = Yii::$app->request->get('sourceId');
        $keyWord = Yii::$app->request->get('keyWord');
        $analysis = Yii::$app->request->get('analysis',0);
        $userName = Yii::$app->request->get('userName');

        $cats = QuestionCat::find()->asArray()->all();
        $knows = [];
        $sources =[];
        $where="1=1";
        if($questionId){
            $where .= " AND q.id = {$questionId}";
        }
        if($catId){
            $where .= " AND q.catId = {$catId}";
            $knows = QuestionKnow::find()->asArray()->where("catId={$catId}")->all();
            $smodel = new SourceCat();
            $sources = $smodel->getSource($catId);
        }
        if($answer){
            if($answer==1){
                $where .= " AND q.answer != ''";
            } elseif($answer==2){
                $where .= " AND q.answer = ''";
            }
        }
        if($sourceId){
            $where .= " AND q.sourceId = {$sourceId}";
        }
        if($knowId){
            $where .= " AND q.knowId = {$knowId}";
        }
        if($keyWord){
            $where .= " AND (q.stem like '%{$keyWord}%' or q.readStem like '%{$keyWord}%')";
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
        $model = new Questions();
        $data = $model->getQuestionsNew($where,$page,$pageSize,$analysis);
//        var_dump($data);die;
        foreach($data['data'] as $k=>$v){
            $cat = QuestionCat::find()->asArray()->where("id={$v['catId']}")->one();
            $type = QuestionType::find()->asArray()->where("id={$v['typeId']}")->one();
            $know = QuestionKnow::find()->asArray()->where("id={$v['knowId']}")->one();
            $source = QuestionSource::find()->asArray()->where("id={$v['sourceId']}")->one();
            $level = QuestionLevel::find()->asArray()->where("id={$v['levelId']}")->one();
            $data['data'][$k]['cat'] = $cat['name'];
            $data['data'][$k]['type'] = $type['name'];
            $data['data'][$k]['know'] = $know['name'];
            $data['data'][$k]['source'] = $source['name'];
            $data['data'][$k]['level'] = $level['name'];
        }
        $totalPage = ceil($data['count']/$pageSize);
        return $this->render('index',['content' => $data['data'],'page' => $data['pageStr'],'count'=>$data['count'],'pageSize'=>$pageSize,'cats'=>$cats,'knows'=>$knows,'sources'=>$sources,'block' => $this->block,'totalPage'=>$totalPage,'total'=>$data['count']]);
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
            $re = Yii::$app->db->createCommand()->insert('{{%questions}}',$data)->execute();
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
            if($data['quantityA']=='<p><br></p>'){
                $data['quantityA'] = '';
            }
            if($data['quantityB']=='<p><br></p>'){
                $data['quantityB'] = '';
            }
            $data['answer'] = strip_tags($data['answer']);
            Questions::updateAll($data,"id=$id");
            $url = Yii::$app->session->get('url');
            $this->redirect("$url");
        }else{
            $id = Yii::$app->request->get('id');
            $url = strstr(Yii::$app->request->getUrl(),'url=');
            Yii::$app->session->set('url',substr($url,4));
            $model = new Questions();
            $data = $model->find()->asArray()->where("id=$id")->one();
            $cat = QuestionCat::find()->asArray()->all();
            $level = QuestionLevel::find()->asArray()->all();
            $type = QuestionType::find()->asArray()->where("catId={$data['catId']}")->all();
            $know = QuestionKnow::find()->asArray()->where("catId={$data['catId']}")->all();
            $source = SourceCat::find()->asArray()->where("catId={$data['catId']}")->all();
            $str = Method::arrGoStr($source,'sourceId');
            $source = QuestionSource::find()->asArray()->where("id in ($str)")->all();
            return $this->render('update',array('data'=> $data,'cat' => $cat,'level' => $level,'id' => $id,'type' => $type,'know' => $know,'source' => $source));
        }
    }
    /**
     * 删除题目
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = Questions::findOne($id)->delete();
        if($res){
            LibraryQuestion::deleteAll('questionId='.$id);
            UserAnswer::deleteAll('questionId='.$id);
            UserComment::deleteAll('questionId='.$id);
            ReportErrors::deleteAll('questionId='.$id);
            UserAnalysis::deleteAll('questionId='.$id);
            UserCollection::deleteAll('questionId='.$id);
            UserNote::deleteAll('questionId='.$id);
            $re = ['code'=>1,'message'=>'删除成功'];
        } else{
            $re = ['code'=>1,'message'=>'删除失败'];
        }
        die(json_encode($re));
    }

}