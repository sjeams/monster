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
use app\modules\cn\models\PushMessage;
use app\modules\cn\models\Question;
use app\modules\cn\models\ReportErrors;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionCat;
use app\modules\question\models\QuestionSource;
use app\modules\question\models\QuestionType;
use app\modules\question\models\SourceCat;
use app\modules\question\models\QuestionLevel;
use app\modules\question\models\Questions;
use app\modules\user\models\User;
use yii;
use app\libs\App1Control;
class ReportErrorsController extends App1Control {
    function init(){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
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
        $examine = Yii::$app->request->get('examine',0);
        if($examine > 0 && $examine < 3){
            $where = " where re.examine = $examine";
        }elseif($examine == 3){
            $where = " where re.examine !=1 and re.examine != 2";
        }else{
            $where = ' where 1=1';
        }
        $pageSize = 20;
        $model = new ReportErrors();
        $data = $model->getReportErrors($where,$page,$pageSize);
        foreach($data['data'] as $k=>$v){
           $data['data'][$k]['user'] = User::find()->asArray()->select('username')->where("uid={$v['uid']}")->one()['username'];
        }
        return $this->render('index',['content' => $data['data'],'page' => $data['pageStr'],'block' => $this->block,'total'=>$data['count']]);
    }

    /**
     * 审核
     * @return string
     * @Obelisk
     */

    public function actionExamine(){
        $examine = Yii::$app->request->get('examine');
        if($examine){
            $id = Yii::$app->request->get('id');
            $sign = ReportErrors::find()->asArray()->where("id={$id}")->one();
            if($sign['reward']==1){
                $data['examine'] = $examine;
            } else{
                uc_user_edit_integral1($sign['uid'], '题目纠错',1, 10);
                $model = new Questions();
                $model->pushReward($sign['questionId'],$sign['uid']);
                $data['examine'] = $examine;
                $data['reward'] = 1;
            }
            $r = ReportErrors::updateAll($data,"id=$id");

            if($r>0){
                $url = Yii::$app->session->get('url');
                return $this->redirect("$url");
            } else{
                die('<script>alert("操作失败");history.go(-1);</script>');
            }
        } else{
            $id = Yii::$app->request->get('id');
            $url = strstr(Yii::$app->request->getUrl(),'url=');
            Yii::$app->session->set('url',substr($url,4));
            $res = ReportErrors::find()->asArray()->where("id={$id}")->one();
            return $this->render('examine',['data' => $res]);
        }
    }


//    /**
//     * 批量审核加积分
//     * @return string
//     * yanni
//     */
//
//    public function actionPlusIntegral(){
//        $res = ReportErrors::find()->asArray()->where("examine=1 and reward=0")->all();
//        foreach($res as $k=>$v){
//            uc_user_edit_integral1($v['uid'], '题目纠错',1, 10);
//            $data['reward'] = 1;
//            $r = ReportErrors::updateAll($data,"id={$v['id']}");
//            if($r){
//                echo "成功<br>";
//            } else{
//                echo "失败<br>";
//            }
//        }
//    }
    /**
     * 删除
     * @return string
     * @Obelisk
     */

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = ReportErrors::findOne($id)->delete();
        if($res){
            $re = ['code'=>1,'message'=>'删除成功'];
        } else{
            $re = ['code'=>1,'message'=>'删除失败'];
        }
        die(json_encode($re));
    }

}