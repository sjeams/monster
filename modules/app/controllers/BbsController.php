<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 13:48
 */
namespace app\modules\app\controllers;

use app\libs\Method;
use app\libs\Pager;
use app\libs\AppApiControl;
use app\modules\cn\models\Category;
use app\modules\cn\models\Collect;

use app\modules\cn\models\Login;
use app\modules\cn\models\MockExam;
use app\modules\cn\models\MockRecord;
use app\modules\cn\models\MockResult;
use app\modules\cn\models\Question;
use app\modules\cn\models\QuestionLevel;
use app\modules\cn\models\QuestionReward;
use app\modules\cn\models\SharRewards;
use app\modules\cn\models\SynchroLog;
use app\modules\cn\models\TeachercolumnComment;
use app\modules\cn\models\UpdateLog;
use app\modules\cn\models\UserAnalysis;
use app\modules\cn\models\UserCollection;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserNote;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\QuestionCat;
use app\modules\cn\models\UserFollow;
use app\modules\cn\models\UserSurvey;

use app\modules\cn\models\TeacherCollection;
use app\modules\cn\models\ReportErrors;
use app\modules\cn\models\UserSign;
use app\modules\cn\models\UserBankMark;
use app\modules\cn\models\SourceCat;
use app\modules\cn\models\UserAnswer;



use app\modules\app\models\Content;
use app\modules\app\models\Course;


use app\modules\question\models\Questions;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionLibrary;
use app\modules\question\models\QuestionSource;

use app\modules\content\models\Teacher;
use app\modules\content\models\ContentTag;
use app\modules\content\models\Livesdkid;
use app\modules\content\models\Video;

use app\modules\app\models\Means;
use app\modules\app\models\Jump;
use app\modules\app\models\Teachers;
use app\modules\app\models\User;
use app\modules\app\models\PushMessage;

use Yii;
use UploadFile;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');

class BbsController extends AppApiControl{
    
     function init(){
        // Yii::$app->session->set('uid',30186);
        // Yii::$app->session->set('userId',40888);
        parent::init();
         include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
    public $enableCsrfValidation = false;

    /**
     * 资讯页面
     */
     public function actionAppInformation(){
        $data = Content::getClass(['category' =>"544",'pageSize' => 9]);
        $res = ['code'=>1,'data'=>$data,'message'=>'请求成功'];
        die(json_encode($res));
    }

    /**
     * 资讯分页
     * by  yanni
     */
     public function actionInformationPage(){
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',10);
        $uid = Yii::$app->session->get('uid');
        $information = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','order'=>'alternatives DESC','page'=>$page,'pageSize' => $pageSize,'pageStr'=>1]);
        foreach($information['data'] as $k=>$v){
            $information['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
            $user = User::find()->asArray()->select(['id','nickname','image'])->where("id={$v['userId']}")->one();
            if($uid){
                $inspect = UserFollow::find()->asArray()->where("uid={$uid} and followUser={$user['id']}")->one();   //查看用户是否关注小编
                if($inspect){
                    $user['follow'] = 1;
                } else{
                    $user['follow'] = 2;
                }
            } else{
                $user['follow'] = 2;
            }
            $information['data'][$k]['editUser'] = $user;
            $information[$k]['alternatives'] = Method::gmstrftimeC($information[$k]['alternatives']);
        }
        $res = ['code'=>1,'data'=>$information,'message'=>'请求成功'];
        die(json_encode($res));
    }

    /**
     * 资讯详情接口
     */
    public function actionInformationDetail(){
        $id = Yii::$app->request->get('id');
        $uid = Yii::$app->session->get('uid');
        $commentPageSize = Yii::$app->request->get('commentPageSize',50);
        $model = new Content();
        $data =  $model->getClass(['fields' => 'answer,alternatives,description,cnName','where' =>"c.id=$id"]);
        Content::updateAll(['viewCount'=>$data[0]['viewCount']+1],'id='.$id);
        $modelu = new UserComment();
        $comment = $modelu->appUserComment($id,1,$commentPageSize);
        $collection = '';
        $follow = '';
        if($uid) {
            $sign = UserCollection::find()->asArray()->select(['id'])->where("uid={$uid} and contentId={$id}")->one();   //用户是否收藏
            if($sign){
                $collection =1;
            }
            $f = UserFollow::find()->asArray()->where("uid={$uid} and followUser={$data[0]['userId']}")->one();             //是否关注用户
            if($f){
                $follow = 1;
            }
        }
        $user = User::find()->asArray()->select(['id','nickname','image'])->where("id={$data[0]['userId']}")->one();
        $data[0]['editUser'] = $user;
        $data[0]['editUser']['follow'] = $follow;
        $data[0]['alternatives'] = Method::gmstrftimeC($data[0]['alternatives']);
        $data[0]['description'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data[0]['description']);
        $hot = Content::getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 4]);   //热门备考文章
        foreach($hot as $k=>$v){
            $aUser = User::find()->asArray()->select(['nickname','image'])->where("id={$v['userId']}")->one();
            $hot[$k]['editUser']=$aUser;
        }
        $res = ['code'=>1,'data'=>['detail'=>$data[0],'comment'=>$comment,'collection'=>$collection,'hot'=>$hot],'message'=>'请求成功'];
        die(json_encode($res));
    }

    /**
     * 内容评论分页接口
     */
    public function actionContentPage(){
        $id = Yii::$app->request->get('id');
        $page  = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',50);
        if(!$id){
            die(json_encode(['code'=>0,'data'=>[],'message'=>'请传入需要获取内容评论的ID']));
        }
        $modelu = new UserComment();
        $comment = $modelu->appUserComment($id,$page,$pageSize);
        $res = ['code'=>1,'data'=>$comment,'message'=>'请求成功'];
        die(json_encode($res));
    }


    /*
     * 评论
     * cy 名师系列
     * type  1-评论 2-回复
     */
     public function actionAddComment(){
        $userid = Yii::$app->session->get("uid");
        if(!$userid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $comment = Yii::$app->request->post('comment');
        $teacherid = Yii::$app->request->post("teacherid");
        $contentid = Yii::$app->request->post("contentid");
        $type = Yii::$app->request->post("type",1);
        if($type == 2){
            $pid = Yii::$app->request->post("pid");//回复的顶级评论id
            $fpid = Yii::$app->request->post("fpid");//回复内容ID
        }else{
            $pid = 0;
            $fpid = 0;
        }
        if($teacherid){
            $access = 1;//老师
            $teaid = $teacherid;
            $conid = 0;
        }
        if($contentid){
            $teaid = 0;
            $access = 2;//文章
            $conid = $contentid;
        }
        $time = date('Y-m-d H:i:s ',time());
        $model = new TeachercolumnComment();
        $model->userId = $userid;
        $model->teacherId = $teaid;
        $model->contentId = $conid;
        $model->comment = $comment;
        $model->type = $type;
        $model->createTime = $time;
        $model->pid = $pid;
        $model->fpid = $fpid;
        $res = $model->save();
        if($res){
            if($access == 1){
                $str = "teacherId";
                $sid = $teacherid;
            }else{
                $str = "contentId";
                $sid = $contentid;
            }
            $pidcount = TeachercolumnComment::find()->select("id")->asArray()->where("$str = $sid and pid = 0")->orderBy("id desc")->count();
            if($pidcount < 6){
                $page = '';
            }else{
                $page = new Pager($pidcount,1,50);  //分页2018-10-8
                $page = $page->GetPagerContent();
            }
            $comments = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid = 0")->orderBy("id desc")->all();
            foreach($comments as $k =>$v){
                $comments[$k]['key'] =$pidcount-$k;
                $uid = $v['userId'];
                $user = User::find()->asArray()->select("id,userName,image,nickname")->where("uid = $uid")->one();
                $comments[$k]['userimage'] = $user['image'];
                if(!empty($user['nickname'])){
                    $comments[$k]['usernickname'] = $user['nickname'];
                } else{
                    $comments[$k]['usernickname'] = $user['userName'];
                }
                $datas = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid != 0 and fpid = {$v['id']}")->orderBy("id asc")->all();
                if(!empty($datas)){
                    foreach($datas as $ki => $ko){
                        $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                        $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                        $datas[$ki]['p_userimage'] = $p_user["image"];
                        $datas[$ki]["p_usernickname"] = $p_user["nickname"];
                        $self = User::find()->asArray()->select("id,image,nickname")->where("uid = {$ko['userId']}")->one();
                        $datas[$ki]['userimage'] = $self['image'];
                        if(!empty($user['nickname'])){
                            $datas[$ki]['usernickname'] = $self['nickname'];
                        } else{
                            $datas[$ki]['usernickname'] = $self['userName'];
                        }
                    }
                }
                $comments[$k]["reply"] = $datas;
            }
            if($pid){
                $reply = TeachercolumnComment::find()->asArray()->where("pid={$pid} and type=2")->orderBy("id desc")->all();
                if(!empty($reply)){
                    foreach($reply as $ki => $ko){
                        $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                        $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                        $reply[$ki]['p_userimage'] = $p_user["image"];
                        $reply[$ki]["p_usernickname"] = $p_user["nickname"];
                        $self = User::find()->asArray()->select("id,image,nickname")->where("uid = {$ko['userId']}")->one();
                        $reply[$ki]['userimage'] = $self['image'];
                        if(!empty($user['nickname'])){
                            $reply[$ki]['usernickname'] = $self['nickname'];
                        } else{
                            $reply[$ki]['usernickname'] = $self['userName'];
                        }
                    }
                }
            } else{
                $reply='';
            }
            $data = array('code'=>1,'message'=>'success','data'=>['comments'=>$comments,'reply'=>$reply,'page'=>$page,'totalcount'=>$pidcount]);

        }else{
            $data = array('code'=>0,'messgae'=>'评论回复失败');
        }
        die(json_encode($data));
    }


    /**
     * 备考故事：学员案例
     * by  yanni
     */
     public function actionStudentCase(){
        $banner = Content::find()->asarray()->where('catId =597')->All();  // 备考故事轮播图片
        $page = Yii::$app->request->post('page',1);
        $pageSize = Yii::$app->request->post('pageSize',10);
        $data = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '531','page'=>$page,'pageSize' => $pageSize]);
        $arr = array();
        foreach($data as $k=>$v){
            $arr[$k]['id'] = $v['id'];
            $arr[$k]['title'] = $v['name'];
            $arr[$k]['image'] = $v['image'];
            $arr[$k]['name'] = $v['answer'];
            $arr[$k]['timeDate'] = $v['article'];
            $arr[$k]['viewCount'] = $v['viewCount'];
        }
        die(json_encode(['code'=>1,'data'=>$arr,'banner'=>$banner]));
    }

    /**
     * 故事详情：案例详情
     * by  yanni
     */
    public function actionCaseDetail(){
        $uid = Yii::$app->session->get('uid');
        $id = Yii::$app->request->post('id');
        $data = Content::getClass(['where' => 'c.id='.$id,'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description']);
        if(empty($data)){
            die(json_encode(['code'=>0,'message'=>'参数错误']));
        }
        $detail['id'] = $data[0]['id'];
        $detail['name'] = $data[0]['answer'];
        $detail['basics'] = $data[0]['alternatives'];
        $detail['timeDate'] = $data[0]['article'];
        $detail['classType'] = $data[0]['listeningFile'];
        $detail['number'] = $data[0]['cnName'];
        $detail['score'] = $data[0]['numbering'];
        $detail['details'] = $data[0]['description'];
        $detail['title'] = $data[0]['name'];
        $detail['fine'] = $data[0]['fabulous'];
        if($uid) {
            $sign = UserCollection::find()->asArray()->select(['id'])->where("uid={$uid} and contentId={$id}")->one();   //用户是否收藏
            if($sign){
                $detail['collection'] =1;
            } else{
                $detail['collection'] =0;
            }
        } else{
            $detail['collection'] =0;
        }
        $sign = $data = Content::getClass(['where' => 'c.pid=0 and c.hot=2','fields' => 'answer,article','category' => '531','orderBy'=>'','page'=>1,'pageSize' => 4]);
        $hots = array();
        foreach($sign as $k=>$v){
            $hots[$k]['id'] = $v['id'];
            $hots[$k]['title'] = $v['name'];
            $hots[$k]['image'] = $v['image'];
            $hots[$k]['name'] = $v['answer'];
            $hots[$k]['timeDate'] = $v['article'];
            $hots[$k]['viewCount'] = $v['viewCount'];
        }
        Content::updateAll(['viewCount'=>$data[0]['viewCount']+1],'id='.$id);
        $modelu = new UserComment();
        $comment = $modelu->appUserComment($id,1,50);
        die(json_encode(['code'=>1,'data'=>['detail'=>$detail,'hots'=>$hots,'comment'=>$comment['data']]]));
    }

}