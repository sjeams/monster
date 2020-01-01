<?php
/**
 * Created by PhpStorm.
 * User: sjeam
 * Date:2019年11月7日 17:22:37
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\Active;
use app\modules\app\models\Course;
use app\modules\app\models\Content;
use app\modules\app\models\User;




use Yii;
use yii\data\Pagination;

class ActiveController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 刷题设置
     * by sjeam
     */
    public function actionIndex(){
        $type= Yii::$app->request->get('type',1);
        $where = "id!=''"; 
        // 消息推送 下拉
        if($type==1){
            $contentList = Course::getCourse(null,null,1);   //提分课所有课程  0 分页  1  全部
        }else{
            $contentList = Content::getTopicactionList(null,null,1)['data'];  //刷题所有课程  0 分页  1  全部
        }

        $where .= " order by sort desc,createTime desc";
        if($_POST){
            $ids = Yii::$app->request->post("id");
            $sort = Yii::$app->request->post("sort");
            foreach($ids as $k => $v){
                Active::updateAll(['sort'=>$sort[$k]],"id = $v");
            }
        }
        $count = Active::find()->select("id")->where($where)->count();
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $teacher = Active::find()->where($where)->offset($page->offset)->limit($page->limit)->all();

        // var_dump($teacher);die;
        return $this->render('index',['content'=>$teacher,'page'=>$page,'contentList'=>$contentList]);
    }

    public function actionAdd(){
            $userid = Yii::$app->request->post('userid');
            $type = Yii::$app->request->post('type');
            $noticeId = Yii::$app->request->post('noticeId');

             if($noticeId){
                 if($userid){
                    $userinfo=explode(',',$userid);
                    // var_dump($userinfo);die;
                    foreach($userinfo as $userid){
                        // 只发送存在的用户
                        $user = User::find()->where("id =$userid")->asarray()->One(); 
                        if($user){
                            $course = new Active();
                            $course->uid =  $user['uid'];
                            $course->type = $type;
                            $course->noticeId = $noticeId;
                            $course->createTime = time();
                            $course->isLook = 1;
                            $res = $course->save();
                        }
                    }
                 }else{
                    $userinfo = User::find()->where("uid !=0")->asarray()->All(); 
                    $userinfo= array_column($userinfo,'uid');
                    // var_dump($userinfo);die;
                    foreach($userinfo as $uid){
                        $course = new Active();
                        $course->uid = $uid;
                        $course->type = $type;
                        $course->noticeId = $noticeId;
                        $course->createTime = time();
                        $course->isLook = 1;
                        $res = $course->save(); 
                    }
                 }
                 die(json_encode(['code'=>1,'message'=>'success']));
            }
    }

    public function actionDelete(){
        $id = Yii::$app->request->post('id');
        $res = Active::deleteAll("id = $id");
        die(json_encode(['code'=>1,'message'=>'success']));
    }

}