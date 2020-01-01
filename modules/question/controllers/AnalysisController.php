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
use app\modules\cn\models\UserComment;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\QuestionAnalysis;
use yii;
use app\libs\App1Control;
class AnalysisController extends App1Control {
    public $enableCsrfValidation = false;

    /**
     * 分类列表展示
     * @return string
     * @Obelisk
     */
    public function actionIndex()
    {
        $questionId = Yii::$app->request->get('id');
        $type = Yii::$app->request->get('type');
        $publish = Yii::$app->request->get('publish');
        $username = Yii::$app->request->get('username');
        $nickname = Yii::$app->request->get('nickname');
        $beginTime = Yii::$app->request->get('beginTime');
        $endTime = Yii::$app->request->get('endTime');
        $page = Yii::$app->request->get('page',1);
        $where="1=1";
        if($questionId){
            $where .= " AND ua.questionId = {$questionId}";
        }
        if($publish){
            $where .= " AND ua.publish = {$publish}";
        }
        if($type){
            $where .= " AND ua.type = {$type}";
        }
        if($username){
            $where .= " and u.userName = '{$username}'";
        }
        if($nickname){
            $where .= " and u.nickname = '{$nickname}'";
        }
        if($beginTime){
            $beginTime = strtotime($beginTime);
            $where .= " and ua.createTime >= $beginTime";
        }
        if($endTime){
            $endTime = strtotime($endTime)+86399;
            $where .= " and ua.createTime <= $endTime";
        }
        $model = new QuestionAnalysis();
        $data = $model->getAnalysis($where,$page,10);
        $url = Yii::$app->request->getUrl();
        Yii::$app->session->set('analysisUrl',$url);
        return $this->render('index',['content' => $data['data'],'page' => $data['pageStr'],'block' => $this->block,'count'=>$data['count']]);
    }

    /**
     * 发表解析
     * @return string
     * by yanni
     */

    public function actionPublish(){
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $id = Yii::$app->request->get('id');
        $sign = QuestionAnalysis::find()->asArray()->where("id={$id}")->one();
        if($sign['publish']==1){
            $res = QuestionAnalysis::updateAll(['publish'=>2],"id=$id");
        } else{
            if($sign['reward']!=1){
                uc_user_edit_integral1($sign['uid'],'解析奖励',1,100);
            }
            $res = QuestionAnalysis::updateAll(['publish'=>1,'reward'=>1],"id=$id");
        }
        if($res){
            die('<script>alert("操作成功");history.go(-1);</script>');
        } else {
            die('<script>alert("操作失败");history.go(-1);</script>');
        }
    }
    /**
     * 查看解析
     * @return string
     * by yanni
     */

    public function actionUpdate(){
        if($_POST){
            include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            $type = Yii::$app->request->post('type');//1-允许发表 2-禁止发表 3-转为评论
            $sign = QuestionAnalysis::find()->asArray()->where("id={$id}")->one();
            if($type ==1){
                if($sign['publish'] !=1){//未发表
                    if($sign['reward']!=1){
                        uc_user_edit_integral1($sign['uid'],'解析奖励',1,100);
                    }
                    QuestionAnalysis::updateAll(['publish'=>1,'reward'=>1,'analysisContent'=>$content, 'createTime' => time()],"id=$id");
                }
                $code = 1;
            }elseif($type ==2){
                 QuestionAnalysis::updateAll(['publish'=>2,'analysisContent'=>$content, 'createTime' => time()],"id=$id");
                 $code =1;
            }elseif($type == 3){//评论
                $questionId = $sign['questionId'];
                $model = new UserComment();
                $model->questionId = $questionId;
                $model->pid = 0;
                $model->uid = $sign['uid'];
                $model->content = $content;
                $model->type = 1;
//                $model->createTime = $sign['createTime'];
                $model->createTime = time();
                $model->save();
                $res = $model->save();
                if($res){
                    QuestionAnalysis::deleteAll("id=$id");
                }
                $code = $res?1:2;
            }else{
                $code =1;
                QuestionAnalysis::updateAll(['analysisContent'=>$content],"id=$id");
            }
            if($code ==1){
                $url = Yii::$app->session->get('analysisUrl');
                return $this->redirect($url);
            }else{
                echo "<script>alert('操作失败');setTimeout(function(){history.go(-1);},1000)</script>";die;
            }
        }else{
            $id = Yii::$app->request->get('id');
            $url = Yii::$app->request->get('url');
            $data = QuestionAnalysis::find()->asArray()->where("id=$id")->one();
            return $this->render('update',array('data'=> $data,'url'=>$url));
        }
    }
    /**
     * 删除解析
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = QuestionAnalysis::findOne($id)->delete();
        if($res){
            $re = ['code'=>1,'message'=>'删除成功'];
        } else{
            $re = ['code'=>1,'message'=>'删除失败'];
        }
        die(json_encode($re));
    }
    /**
     * 解析发表
     * cy
     */
    public function actionUpdatePublish(){
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $ids = Yii::$app->request->post('ids');
        $type = Yii::$app->request->post('type');//1-发表 2-取消发表
        $ids = explode(',',$ids);
        foreach($ids as $k => $v){
            $sign = QuestionAnalysis::find()->asArray()->where("id={$v}")->one();
            if($type ==1){
                if($sign['reward']!=1){
                    uc_user_edit_integral1($sign['uid'],'解析奖励',1,100);
                }
            }
            QuestionAnalysis::updateAll(['publish'=>$type],"id=$v");
        }
        die(json_encode(['code'=>1,'message'=>'success']));
    }
}
