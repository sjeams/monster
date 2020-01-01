<?php

/**
 * toefl API
 * Created by PhpStorm.
 * User: obelisk
 */

namespace app\modules\cn\controllers;


use app\libs\Method;
use app\libs\Pager;
use app\modules\cn\models\Category;
use app\modules\cn\models\MockExam;
use app\modules\cn\models\MockRecord;
use app\modules\cn\models\MockResult;
use app\modules\cn\models\Question;
use app\modules\cn\models\QuestionReward;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\StrangeWord;
use app\modules\cn\models\ReportErrors;
use app\modules\cn\models\ContentErrors;

use app\modules\cn\models\SynchroLog;
use app\modules\cn\models\TeacherCollection;
use app\modules\cn\models\TeachercolumnComment;
use app\modules\cn\models\TeacherContent;
use app\modules\cn\models\Teachers;
use app\modules\cn\models\User;
use app\modules\cn\models\UserAnalysis;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserEvaluation;
use app\modules\cn\models\UserRecord;
use app\modules\cn\models\UserFollow;
use app\modules\cn\models\UserSearch;
use app\modules\content\models\Teacher;
use app\modules\content\models\Video;
use app\modules\content\models\Livesdkid;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionAnalysis;
use app\modules\question\models\Questions;
use app\modules\cn\models\UserBankMark;
use app\modules\content\models\ContentTag;
use app\modules\user\models\UserFollowTopic;
use Behat\Gherkin\Loader\YamlFileLoader;
use yii;

use app\libs\ToeflApiControl;

use app\libs\VerificationCode;

use app\libs\Sms;

use app\modules\cn\models\Content;

use app\modules\cn\models\UserAnswer;

use app\modules\cn\models\UserDiscuss;

use app\modules\cn\models\UserNote;

use app\modules\cn\models\UserCollection;

use app\modules\cn\models\Login;

use UploadFile;


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
class ApiController extends ToeflApiControl
{
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }

    public $enableCsrfValidation = false;


    /**
     * 用户评论接口
     * by yanni
     */
    public function actionUserComment(){
        $uid = Yii::$app->session->get('uid');
        $contentId = Yii::$app->request->post('contentId');
        $content = Yii::$app->request->post('content');
        $commentImage = Yii::$app->request->post('commentImage');
        if(!$uid){
            die(json_encode(['code' => 99,'message'=>'请登录']));
        }
        if($content && $contentId){
            $prent = Content::find()->asArray()->select(['pid'])->where("id={$contentId}")->one();
            if($prent['pid']!=0){
                $contentId = $prent['pid'];
            }
            $model = new UserComment();
            $model->contentId = $contentId;
            $model->uid = $uid;
            $model->content = $content;
            $model->type = 1;
            $model->createTime = time();
            $model->commentImage = $commentImage;
            $r = $model->save();
            if($r>0){
                $data = $model->getCommentById($model->primaryKey);
                $res = ['code' => 1,'message'=>'评论成功','data'=>$data];
            } else {
                $res = ['code' => 0,'message'=>'评论失败'];
            }
        }else{
            $res = ['code' => 0,'message'=>'评论不能为空'];
        }
        die(json_encode($res));
    }

    /**
     * 加载评论
     * by yanni
     */
    public function actionLoadComment(){
        $contentId = Yii::$app->request->post('contentId');
        $page = Yii::$app->request->post('page');
        $modelu = new UserComment();
        $comment = $modelu->getUserComment($contentId,$page,5);
        foreach($comment['data'] as $k=>$v){
            $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
        }
        die(json_encode($comment));
    }
    /**
     * 用户回复接口
     * by yanni
     */
    public function actionUserReply(){
        $uid = Yii::$app->session->get('uid');
        $contentId = Yii::$app->request->post('contentId');
        $content = Yii::$app->request->post('content');
        $replyName = Yii::$app->request->post('replyName');
        $commentId = Yii::$app->request->post('commentId');
        $commentImage = Yii::$app->request->post('commentImage');
        $replyUid = Yii::$app->request->post('replyUid');
        if(!$uid){
            die(json_encode(['code' => 0,'message'=>'请登录']));
        }
        if($content && $contentId && $commentId && $replyName){
            $prent = Content::find()->asArray()->select(['pid'])->where("id={$contentId}")->one();
            if($prent['pid']!=0){
                $contentId = $prent['pid'];
            }
            $model = new UserComment();
            $model->contentId = $contentId;
            $model->pid = $commentId;
            $model->uid = $uid;
            $model->content = $content;
            $model->type = 2;
            $model->createTime = time();
            $model->replyName = $replyName;
            $model->replyUid = $replyUid;
            $model->commentImage = $commentImage;
            $r = $model->save();
            if($r>0){
                $data = $model->getCommentById($model->primaryKey);
                $res = ['code' => 1,'message'=>'回复成功','data'=>$data];
            } else {
                $res = ['code' => 0,'message'=>'回复失败'];
            }
        }else{
            $res = ['code' => 2,'message'=>'回复不能为空'];
        }
        die(json_encode($res));
    }
    /**
     * 用户题目评论接口
     * by yanni
     */
    public function actionQuestionComment(){
        $uid = Yii::$app->session->get('uid');
        $questionId = Yii::$app->request->post('questionId');
        $content = Yii::$app->request->post('content');
        $commentImage = Yii::$app->request->post('commentImage');
        if(!$uid){
            die(json_encode(['code' => 99,'message'=>'请登录']));
        }
        if($content && $questionId){
            $model = new UserComment();
            $model->questionId = $questionId;
            $model->uid = $uid;
            $model->content = $content;
            $model->type = 1;
            $model->createTime = time();
            $model->commentImage = $commentImage;
            $r = $model->save();
            if($r>0){
                $data = $model->getCommentById($model->primaryKey);
                $res = ['code' => 1,'data'=>$data,'message'=>'评论成功'];
            } else {
                $res = ['code' => 0,'message'=>'评论失败'];
            }
        }else{
            $res = ['code' => 0,'message'=>'评论不能为空'];
        }
        die(json_encode($res));
    }

    /**
     * 加载题目评论
     * by yanni
     */
    public function actionLoadQuestionComment(){
        $questionId = Yii::$app->request->post('questionId');
        $page = Yii::$app->request->post('page',1);
        $modelu = new UserComment();
        $comment = $modelu->getQuestionComment($questionId,$page,5);
        foreach($comment['data'] as $k=>$v){
            $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
        }
        die(json_encode($comment));
    }
    /**
     * 用户回复接口
     * by yanni
     */
    public function actionQuestionReply(){
        $uid = Yii::$app->session->get('uid');
        $questionId = Yii::$app->request->post('questionId');
        $content = Yii::$app->request->post('content');
        $replyName = Yii::$app->request->post('replyName');
        $replyUid = Yii::$app->request->post('replyUid');
        $commentId = Yii::$app->request->post('commentId');
        if(!$uid){
            die(json_encode(['code' => 0,'message'=>'请登录']));
        }
        if($content && $questionId && $commentId && $replyName){
            $model = new UserComment();
            $model->questionId = $questionId;
            $model->pid = $commentId;
            $model->uid = $uid;
            $model->content = $content;
            $model->type = 2;
            $model->createTime = time();
            $model->replyUid = $replyUid;
            $model->replyName = $replyName;
            $r = $model->save();
            if($r>0){
                $data = $model->getCommentById($model->primaryKey);
                $res = ['code' => 1,'data'=>$data,'message'=>'回复成功'];
            } else {
                $res = ['code' => 0,'message'=>'回复失败'];
            }
        }else{
            $res = ['code' => 2,'message'=>'回复不能为空'];
        }
        die(json_encode($res));
    }
    /**
     * 总调度
     * @Obelisk
     */
    public function actionUnifyLogin(){
        $session = Yii::$app->session;
        $logins = new Login();
        $uid = Yii::$app->request->get('uid');
        $username = Yii::$app->request->get('username');
        $phone = Yii::$app->request->get('phone');
        $password = Yii::$app->request->get('password');
        $email =Yii::$app->request->get('email');
        $loginsdata = $logins->find()->where("uid=$uid")->one();
        if(empty($loginsdata['id'])){
            $where = '';
            if(!empty($email) ){
                $where .= empty($where)?"email='$email'":" or email='$email'";
            }
            if(!empty($username) ){
                $where .= empty($where)?"userName='$username'":" or userName='$username'";
            }
            if(!empty($phone) ){
                $where .= empty($where)?"phone='$phone'":" or phone='$phone'";
            }
            $loginsdata = $logins->find()->where("$where")->one();
            if (empty($loginsdata['id'])) {
                $login = new Login();
                $login->phone = $phone;

                $login->userPass = $password;

                $login->email = $email;

                $login->createTime = time();

                $login->userName = $username;
                $login->uid = $uid;
                $login->save();
                $loginsdata = $logins->find()->where("$where")->one();
            }else{
                if($phone != $loginsdata['phone']){
                    Login::updateAll(['phone' => $phone],"id={$loginsdata['id']}");
                }
                if($email != $loginsdata['email']){
                    Login::updateAll(['email' => "$email"],"id={$loginsdata['id']}");
                }
                if($username != $loginsdata['userName']){
                    Login::updateAll(['userName' => "$username"],"id={$loginsdata['id']}");
                }
                if($uid != $loginsdata['uid']){
                    Login::updateAll(['uid' => "$uid"],"id={$loginsdata['id']}");
                }
                $loginsdata = $logins->find()->where("id={$loginsdata['id']}")->one();
            }
        }else{
            if($phone != $loginsdata['phone']){
                Login::updateAll(['phone' => $phone],"id={$loginsdata['id']}");
            }
            if($email != $loginsdata['email']){
                Login::updateAll(['email' => "$email"],"id={$loginsdata['id']}");
            }
            if($username != $loginsdata['userName']){
                Login::updateAll(['userName' => "$username"],"id={$loginsdata['id']}");
            }
            $loginsdata = $logins->find()->where("id={$loginsdata['id']}")->one();
        }
        $session->set('userId', $loginsdata['id']);
        $session->set('uid', $uid);
        $session->set('userData', $loginsdata);
    }
    /**
     * 注销账户
     * @return string
     * */

    public function actionLoginOut()

    {

        $session = Yii::$app->session;

        $session->remove('userData');

        $session->remove('userId');

        $session->remove('uid');

        $session->remove('level');
        setcookie('loginuserid','', time() - 3600,'/');
        setcookie('loginlevel','', time() - 3600,'/');
        setcookie('loginUid','', time() - 3600,'/');
        setcookie('loginData','', time() - 3600,'/');
        $loginOut = uc_user_synlogout();
        $session->set('loginOut',$loginOut);
        die(json_encode(['code' => 1]));

    }

    /**
     * 发送邮箱
     * @Obelisk
     */

    public function actionSendMail()
    {

        $session = Yii::$app->session;

        $emailCode = mt_rand(100000, 999999);

        $email = Yii::$app->request->post('email');
//        $email = 'yanxuel@foxmail.com';
        $session->set($email . 'phoneCode', $emailCode);

        $session->set('phoneTime', time());

        $mail = Yii::$app->mailer->compose();

        $mail->setTo($email);

        $mail->setSubject("【GRE】邮件验证码");

        $mail->setHtmlBody('

            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

            <div style="width: 800px;margin: 0 auto;margin-bottom: 10px">

                 <img src="https://gre.viplgw.cn/cn/images/head_logo.png" alt="logo">

            </div>

            <div style="width: 830px;border: 1px #dcdcdc solid;margin: 0 auto;overflow: hidden">

                 <p style="font-weight: bold;font-size: 18px;margin-left: 20px;color: #34388e;font-family: 微软雅黑;">亲爱的用户 ：</p>

                <span style="margin-left: 20px;font-family: 微软雅黑;">

            你好！你正在使用GRE，网址<a href="https://gre.viplgw.cn/">gre.viplgw.cn</a>。你的验证码为：【<span style="color:#ff913e;">' . $emailCode . '</span>】。（有效期为：此邮件发出后48小时）
                </span>
                <p style="margin-left: 20px;font-family: 微软雅黑;">
                添加微信公众号：<span style="color:green;font-weight:bold">小申托福在线</span>，获取出国留学最新信息~
                </p>
            <div style="width: 100%;background: #e8e8e8;padding:5px 20px;font-size:12px;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 30px;color: #808080;font-family: 微软雅黑;">

            温馨提示：请你注意保护你的邮箱，避免邮件被他人盗用哟！

            </div>

            </div>

            <div style="font-size: 12px;width: 800px;margin: 0 auto;text-align: right;color: #808080;">


        </div>

        ');    //发布可以带html标签的文本
        if ($mail->send()) {

            $res['code'] = 1;

            $res['message'] = '邮件发送成功！';

        } else {

            $res['code'] = 0;

            $res['message'] = '邮件发送失败！';

        }

        die(json_encode($res));

    }
    /**
     * 短信接口
     * @Obelisk
     */

    public function actionPhoneCode()

    {

        $session = Yii::$app->session;

        $sms = new Sms();

        $phoneNum = Yii::$app->request->post('phoneNum');
        $type = Yii::$app->request->post('type');
        if (!empty($phoneNum)) {

            $phoneCode = mt_rand(100000, 999999);

            $session->set($phoneNum . 'phoneCode', $phoneCode);

            $session->set('phoneTime', time());
            if($type==1){
                $content = '验证码：' . $phoneCode . '（10分钟有效），您正在通过手机免费获取留学评估报告！';
            } elseif($type==2){
                $content = '验证码：' . $phoneCode . '（10分钟有效），您正在通过GRE手机验证！';
            } else {
                $content = '【小申托福在线】【SmartApply留学商城】验证码：' . $phoneCode . '（10分钟有效），您正在通过手机注册SmartApply留学商城免费会员！关注微信:toeflgo，获取更多信息；若有gmat/toefl/留学等问题，请咨询管理员QQ/微信2649471578
';
            }
            $sms->send($phoneNum, $content, $ext = '', $stime = '', $rrid = '');

            $res['code'] = 1;

            $res['message'] = '短信发送成功！';

        } else {

            $res['code'] = 0;

            $res['message'] = '发送失败!手机号码为空！';

        }

        die(json_encode($res));

    }
    /**
     * 加入生词本
     * @yanni
     */
    public function actionAddStrangeWord(){
        $uid = Yii::$app->session->get('uid');
        $word = Yii::$app->request->post('word');
        $wordId = Yii::$app->request->post('wordId');
        if($wordId){
            if($uid){
//                $word = Words::find()->asArray()->where("word='{$word}'")->one();
                $model = new StrangeWord();
                $model->uid = $uid;
                $model->wordId = $wordId;
                $model->word = $word;
                $model->createTime = time();
                $r = $model->save();
                if($r>0){
                    $res = ['code' => 1,'message'=>'加入生词本成功'];
                } else {
                    $res = ['code' => 0,'message'=>'加入生词本失败'];
                }
            }else{
                $res = ['code' => 0,'message'=>'请登录'];
            }

        } else {
            $res = ['code' => 0,'message'=>'没有单词ID'];
        }
        die(json_encode($res));
    }
    /**
     * 生词删除
     * @yanni
     */
    public function actionDeleteStrangeWord(){
        $uid = Yii::$app->session->get('uid');
        $wordId = Yii::$app->request->post('wordId');
        if($wordId){
            if($uid){
//                $word = Words::find()->asArray()->where("word='{$word}'")->one();
               $r = StrangeWord::deleteAll("uid={$uid} and id ={$wordId}");
                if($r>0){
                    $res = ['code' => 1,'message'=>'删除成功'];
                } else {
                    $res = ['code' => 0,'message'=>'删除失败'];
                }
            }else{
                $res = ['code' => 0,'message'=>'请登录'];
            }

        } else {
            $res = ['code' => 0,'message'=>'没有单词ID'];
        }
        die(json_encode($res));
    }
    /**
     * 切换标签
     * BY yanni
     */
    public function actionChangeClass(){
        $tagStr = Yii::$app->request->post('tagStr');
        $pid = Yii::$app->request->post('pid');
        $model = new Content();
        $data = $model->getClassDetails($tagStr,$pid);
        die(json_encode($data));
    }
    /**
     * 立即购买
     * by yanni
     */
    public function actionBuyNow(){
        $model = new Content();
        $goodsId = Yii::$app->request->post('id');
        $num = Yii::$app->request->post('num');
        $goods = $model->getGoods($goodsId);
        $totalMoney = $goods[0]['price']*$num;
        $goods[0]['num'] = $num;
        $data = ['typeUrl' => 'greUrl','type' => 6,'totalMoney' => $totalMoney,'goods' =>$goods];
        $re = ['code' => 1,'data' => serialize($data)];
        die(json_encode($re));
    }

    /**
     * 做题提交答案
     * by yanni
     */
    public function actionSubAnswer(){
        $questionId = Yii::$app->request->post('questionId');
        $libId = Yii::$app->request->post('libId');
        $answer = Yii::$app->request->post('answer');
        $useTime = Yii::$app->request->post('useTime');
        $whether = Yii::$app->request->post('whether');
        $uid = Yii::$app->session->get('uid');
        if($uid){
            UserAnswer::deleteAll("uid={$uid} and libId={$libId} and questionId={$questionId}");
            $model = new UserAnswer();
            $model->uid = $uid;
            $model->questionId = $questionId;
            $model->libId = $libId;
            $model->answer = $answer;
            $model->useTime = $useTime;
            $model->createTime = time();
            $model->correct = $whether;
            $model->answerType = 1;
            $r = $model->save();
            if($r>0){
                $result = QuestionsStatistics::find()->asArray()->where("uid={$uid} and libraryId={$libId}")->one();
                $correct = UserAnswer::find()->select("id")->where("uid={$uid} and libId={$libId} and correct=1")->count();
                $upArr['doNum'] = $result['doNum']+1;
                $upArr['totalTime'] = $result['totalTime']+$useTime;
                $upArr['interruptTime'] = time();
                $upArr['correctRate'] = ceil(($correct/$upArr['doNum'])*100);
                if($upArr['doNum']>=$result['totalNum']){
                    $upArr['endTime'] = time();
                    $upArr['state'] = 1;
                }
                QuestionsStatistics::updateAll($upArr,"uid={$uid} and libraryId={$libId}");
                $checkReward = QuestionReward::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$questionId}")->one();
                if(empty($checkReward)){
                    uc_user_edit_integral1($uid,'GRE做题',1,2);
                    $rewardModel = new QuestionReward();
                    $rewardModel->uid = $uid;
                    $rewardModel->questionId = $questionId;
                    $rewardModel->createTime = time();
                    $rewardModel->save();
                }
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}");
                $res = ['code' => 1,'message'=>'提交成功'];
            } else {
                $res = ['code' => 0,'message'=>'提交失败'];
            }
        } else{
            $res = ['code' => 0,'message'=>'请登录'];
        }
        die(json_encode($res));
    }
    /**
     * 题目收藏
     * by yanni
     */
    public function actionUserQuestionCollection(){
        $questionId = Yii::$app->request->post('questionId');
        $uid = Yii::$app->session->get('uid');
        if($uid){
            $userCollection = UserCollection::find()->asArray()->where("uid={$uid} and questionId={$questionId}")->one();
            if($userCollection){
                UserCollection::deleteAll("id={$userCollection['id']}");
                $res = ['code' => 2,'message'=>'取消收藏成功'];
            } else{
                $model = new UserCollection();
                $model->uid = $uid;
                $model->questionId = $questionId;
                $model->createTime = time();
                $model->save();
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                $res = ['code' => 1,'message'=>'收藏成功'];
            }
        } else{
            $res = ['code' => 99,'message'=>'请登录'];
        }
        die(json_encode($res));
    }

    /**
     * @Author: Ferre
     * @create: 2019/9/10 16:38
     * 大首页-案例列表
     */
    public function actionGetCaseLst(){
        $page = Yii::$app->request->post('page');
        $data = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description','category' => '531','page'=>$page,'pageSize' => 6]);
        die(json_encode($data));
    }

    /**
     * 获取案例
     * by yanni
     */
    public function actionGetCase(){
        $data = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description','category' => '531','page'=>1,'pageSize' => 16]);
        die(json_encode($data));
    }

    /**
     * 外部获取GRE资讯和公开课
     * by yanni
     */
    public function actionGetOpenInformation(){
        $res = file_get_contents("https://open.viplgw.cn/cn/api/gre-all");
        $res = json_decode($res,true);
        $data['open'] = $res;
        $data['information'] = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','page'=>1,'pageSize' => 6]);
        die(json_encode($data));
    }

    /**
     * @Author: Ferre
     * @create: 2019/9/10 17:10
     * 大首页-资讯和公开课列表
     */
    public function actionGetOpenInformationLst()
    {
        $page = Yii::$app->request->post('page');
        $pageSize = Yii::$app->request->post('pageSize', 6);
        $res  = file_get_contents("https://open.viplgw.cn/cn/api/gre-all");
        $res  = json_decode($res,true);
        $data['open'] = $res;
        $data['information'] = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','page'=>$page,'pageSize' => $pageSize]);
        die(json_encode($data));
    }



    /**
     * 用户添加笔记
     * by yanni
     */
    public function actionAddQuestionNote()
    {
        $uid = Yii::$app->session->get('uid');
        $type = Yii::$app->request->post('type',1);
        $questionId = Yii::$app->request->post('questionId');
        $content = Yii::$app->request->post('content');
        if(!$uid){
            die(json_encode(['code' => 99,'message'=>'请登录']));
        }
        if($type==2){
            $noteId = Yii::$app->request->post('noteId');
            $res = UserNote::updateAll(['noteContent'=>$content],"id={$noteId} and uid={$uid}");
            if($res>0){
                $data = UserNote::find()->asArray()->where("id=$noteId")->one();
                $res = ['code' => 1,'data'=>$data,'message'=>'编辑成功'];
            } else{
                $res = ['code' => 0,'message'=>'编辑失败'];
            }
        } else{
            if($content && $questionId){
                $model = new UserNote();
                $model->questionId = $questionId;
                $model->noteContent = $content;
                $model->uid = $uid;
                $model->createTime = time();
                $r = $model->save();
                if($r>0){
                    $data = UserNote::find()->asArray()->where("id=$model->primaryKey")->one();
                    SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                    $res = ['code' => 1,'data'=>$data,'message'=>'添加成功'];
                } else {
                    $res = ['code' => 0,'message'=>'添加失败'];
                }
            }else{
                $res = ['code' => 0,'message'=>'评论不能为空'];
            }
        }
        die(json_encode($res));
    }
    /**
     * 修改用户资料
     * @Obelisk
     */

    public function actionChangeUserInfo()
    {

        $model = new Login();

        $session = Yii::$app->session;

        $userId = $session->get('userId');
        $uid = $session->get('uid');

        $phoneCode = Yii::$app->request->post('phoneCode', '');

        $phone = Yii::$app->request->post('phone', '');

        $nickname = Yii::$app->request->post('nickname', '');

        $school = Yii::$app->request->post('school');

        $major = Yii::$app->request->post('major');

        $grade = Yii::$app->request->post('grade');

        $sign = Login::find()->where("id!=$userId AND nickname='$nickname'")->one();

        if ($sign) {

            die(json_encode(['code' => 0, 'message' => '昵称已经被使用']));

        }
        $userInfo = [];
        if ($nickname) {
            $status = uc_user_checknickname($nickname);
            if($status != 1){
                $res['code'] = 0;
                $res['message'] = '该昵称已被占用';
                die(json_encode($res));
            } else{
                uc_user_nickname_edit($nickname,$uid);
            }
            $userInfo['nickname'] = $nickname;
        }
        if ($phone) {
            $userInfo['phone'] = $phone;
        }
        if ($school) {
            $userInfo['school'] = $school;
        }
        if ($major) {
            $userInfo['major'] = $major;
        }
        if ($grade) {
            $userInfo['grade'] = $grade;
        }
        if ($phone) {

            $signPhone = Login::find()->where("id=$userId AND phone='$phone'")->one();

            if (!$signPhone) {

                $status = uc_user_checkphone($phone);
                if ($status == -7) {

                    die(json_encode(['code' => 0, 'message' => '该手机已被其他用户绑定']));

                }

                $checkTime = $model->checkTime();

                if ($checkTime) {

                    $checkCode = $model->checkCode($phone, $phoneCode);

                    if ($checkCode) {

                        $model->updateAll($userInfo, "id=$userId");

                        $userData = $model->find()->asArray()->where("id=$userId")->one();

                        Yii::$app->session->set('userData', $userData);
                        setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');

                        $res['code'] = 1;

                        $res['message'] = '保存成功';
                        uc_user_edit($userData->userName,'','','',$phone,1);

                    } else {

                        $res['code'] = 0;

                        $res['message'] = '验证码错误';

                    }

                } else {

                    $res['code'] = 0;

                    $res['message'] = '验证码过期';

                }

            } else {

                $model->updateAll($userInfo, "id=$userId");

                $userData = $model->find()->asArray()->where("id=$userId")->one();

                Yii::$app->session->set('userData', $userData);
                setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');
                $res['code'] = 1;

                $res['message'] = '保存成功';

            }

        } else {

            $model->updateAll($userInfo, "uid=$uid");

            $userData = $model->find()->asArray()->where("id=$userId")->one();

            Yii::$app->session->set('userData', $userData);
            setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');

            $res['code'] = 1;

            $res['message'] = '保存成功';

        }

        die(json_encode($res));

    }

    /**
     * 修改用户邮箱
     * @Obelisk
     */

    public function actionChangeUserEmail()
    {

        $model = new Login();

        $session = Yii::$app->session;

        $userId = $session->get('userId');

        $emailCode = Yii::$app->request->post('emailCode');

        $email = Yii::$app->request->post('email');

        $sign = uc_user_checkemail($email);

        if ($sign == -6) {

            die(json_encode(['code' => 0, 'message' => '该邮箱已被使用']));

        }

        $checkTime = $model->checkTime();

        if ($checkTime) {

            $checkCode = $model->checkCode($email, $emailCode);

            if ($checkCode) {

                $model->updateAll(['email' => $email], "id=$userId");

                $userData = $model->findOne($userId);

                Yii::$app->session->set('userData', $userData);
                setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');

                $res['code'] = 1;

                $res['message'] = '保存成功';
                uc_user_edit($userData->userName,'','',$email,'',1);

            } else {

                $res['code'] = 0;

                $res['message'] = '验证码错误';

            }

        } else {

            $res['code'] = 0;

            $res['message'] = '验证码过期';

        }

        die(json_encode($res));

    }

    /**
     * 修改用户密码
     * @Obelisk
     */

    public function actionChangeUserPass()
    {

        $model = new Login();

        $session = Yii::$app->session;

        $userId = $session->get('userId');

        $oldPassword = Yii::$app->request->post('oldPassword');

        $userData = $model->findOne($userId);

        $newPassword = Yii::$app->request->post('newPassword');

        $sign = uc_user_edit($userData->userName,$oldPassword,$newPassword,'','');

        if ($sign == -1) {

            die(json_encode(['code' => 0, 'message' => '旧密码不正确']));

        } else {

            $model->updateAll(['userPass' => md5($newPassword)], "id=$userId");

            $userData = $model->findOne($userId);

            Yii::$app->session->set('userData', $userData);

            $res['code'] = 1;

            $res['message'] = '保存成功';

        }

        die(json_encode($res));

    }

    /**
     * 添加解析
     * by  yanni
     */
    public function actionAddAnalysis(){
        $uid = Yii::$app->session->get('uid');
        $aContent = Yii::$app->request->get('aContent','');
        $questionId = Yii::$app->request->get('questionId');
        $audio = Yii::$app->request->get('audio','');
        $type = Yii::$app->request->get('type','1');
        $price = Yii::$app->request->get('price','0');
        if(!$uid){
            die(json_encode(['code' => 99,'message'=>'请登录']));
        }
        if($questionId){
            if($type==2){
                $model = new UserAnalysis();
                $model->questionId = $questionId;
                $model->uid = $uid;
                $model->analysisContent = $aContent;
                $model->type = 2;
                $model->publish = 2;
                $model->audio = $audio;
                $model->price = $price;
                $model->createTime = time();
                $r = $model->save();
            } else{
                $model = new UserAnalysis();
                $model->questionId = $questionId;
                $model->uid = $uid;
                $model->analysisContent = $aContent;
                $model->type = 1;
                $model->publish = 2;
                $model->createTime = time();
                $r = $model->save();
            }
            if($r>0){
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                $res = ['code' => 1,'message'=>'提交成功，请等待审核'];
            } else {
                $res = ['code' => 0,'message'=>'提交失败'];
            }
        }else{
            $res = ['code' => 0,'message'=>'问题不存在'];
        }
        die(json_encode($res));
    }

    /**
     * 获取下一题ID
     * by  yanni
     */
    public function actionGetNextQuestion(){
        $questionId = Yii::$app->request->post('questionId');
        $answer = Yii::$app->request->post('answer');
        $useTime = Yii::$app->request->post('useTime');
        $whether = Yii::$app->request->post('whether');
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>3,'message'=>'未登录，是否前往登录']));
        }
        $questionIdStr = Yii::$app->session->get('questionIdStr');
        if($questionIdStr){
            $questionIdStr .= ",".$questionId;
            Yii::$app->session->set('questionIdStr',$questionIdStr);
        } else{
            $questionIdStr = $questionId;
            Yii::$app->session->set('questionIdStr',$questionIdStr);
        }
        UserAnswer::deleteAll("uid={$uid} and questionId={$questionId} and answerType=2");
        $model = new UserAnswer();
        $model->uid = $uid;
        $model->questionId = $questionId;
        $model->answer = $answer;
        $model->useTime = $useTime;
        $model->createTime = time();
        $model->correct = $whether;
        $model->answerType = 2;
        $r = $model->save();
        if($r>0){
            $checkReward = QuestionReward::find()->asArray()->select(['id'])->where("uid={$uid} and questionId={$questionId}")->one();
            if(empty($checkReward)){
                uc_user_edit_integral1($uid,'GRE做题',1,2);
                $rewardModel = new QuestionReward();
                $rewardModel->uid = $uid;
                $rewardModel->questionId = $questionId;
                $rewardModel->createTime = time();
                $rewardModel->save();
            }
            $questionData = Question::find()->asArray()->where("id={$questionId}")->one();
            $question = Question::find()->asArray()->select(['id'])->where("catId={$questionData['catId']} and sourceId={$questionData['sourceId']} and id>{$questionData['id']}")->orderBy("id asc")->one();
            if($question){
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                $res = ['code' => 1,'message'=>'获取成功','id'=>$question['id']];
            } else {
                $question = Question::find()->asArray()->select(['id'])->where("id not in({$questionIdStr})")->orderBy("id asc")->one();
                if($question){
                    SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                    $res = ['code' => 1,'message'=>'获取成功','id'=>$question['id']];
                } else {
                    $res = ['code' => 0,'message'=>'获取失败',];
                }
            }
        } else {
            $res = ['code' => 0,'message'=>'答案提交失败'];
        }

        die(json_encode($res));
    }

    /**
     * 音频解析购买
     * BY yanni
     */
    public function actionAudioPurchase(){
        $uid = Yii::$app->session->get('uid');
        $analysisId = Yii::$app->request->post('analysisId');
        $analysis = QuestionAnalysis::find()->asArray()->where("id={$analysisId}")->one();
        $integral = uc_user_integral1($uid);
        if($integral['integral']>=$analysis['price']){
            uc_user_edit_integral1($uid,'购买音频解析',2,$analysis['price']);
            $res = ['code'=>1,'message'=>'购买成功'];
        } else{
            $res = ['code'=>0,'message'=>'购买失败，是否前往充值'];
        }
        die(json_encode($res));
    }

    /**
     * 上传头像
     * BY yanni
     */
    public function actionUpImage()
    {

        $session = Yii::$app->session;

        $userId = $session->get('userId');

        $userData = $session->get('userData');

        $image = Yii::$app->request->post('image');

        $sign = Login::updateAll(['image' => $image], "id=$userId");

        if ($sign) {

            $userData['image'] = $image;

            $session->set('userData', $userData);
            setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');

            $res['code'] = 1;

            $res['message'] = '更换成功';

        } else {

            $res['code'] = 0;

            $res['message'] = '更换失败，请重试';

        }

        die(json_encode($res));
    }
    /**
     * 课程信息获取接口
     * by cy
     */
    public function actionGetCourseMsg()
    {
        $idStr = Yii::$app->request->post('idStr');
        if(!$idStr){
            die(json_encode(['code'=>0,'message'=>'非法操作']));
        } else{
            $idArr = explode(',',$idStr);
            $data = array();
            foreach($idArr as $k=>$v){
                $res = Content::getClass(['where' => 'c.id='.$v,'fields' => 'description','page'=>1,'pageSize' => 1]);
                if($res[0]['pid']!=0){
                    $parent = Content::getClass(['where' => 'c.id='.$res[0]['pid'],'fields' => 'description','page'=>1,'pageSize' => 1]);
                    $data[$k]['content'] = $parent[0]['description'];
                } else {
                    $data[$k]['content'] = $res[0]['description'];
                }
                $data[$k]['name'] = $res[0]['name'];
                $data[$k]['id'] = $res[0]['id'];
                $data[$k]['view'] = $res[0]['viewCount'];
                $data[$k]['image'] = $res[0]['image'];
            }
            die(json_encode($data));
        }
    }
    /**
     * 获取直播信息
     * @Obelisk
     */
    public function actionGetLive(){
        $contentId = Yii::$app->request->post('contentId');
        $data = Content::getClass(['fields' => 'commencement,duration',"where" => "c.id=$contentId"]);
        $live = Livesdkid::find()->asArray()->where("contentId = $contentId")->one();
        $data = $data[0];
        $data['sdk'] = $live['livesdkid'];
        $data['webKey'] = $live['webKey'];
        $data['auditionKey'] = $live['auditionKey'];
        $data['sdkType'] = $live['sdkType'];
        die(json_encode($data));
    }
    public function actionIsLive(){
        $contentId = Yii::$app->request->post('contentId');
        $live = Livesdkid::find()->asArray()->where("contentId = $contentId")->one();
        if($live){
            $data = ['code' => 1];
        }else{
            $data = ['code' => 0];
        }
        die(json_encode($data));
    }

    /**
     * 获取视频列表
     * by  obelisk
     */
    public function actionGetSdk(){
        $contentId = Yii::$app->request->post('contentId');
        $video = Video::find()->asArray()->where("cid=$contentId")->orderBy("createTime ASC")->all();
        die(json_encode($video));
    }

    /**
     * 获取视频信息
     * by  obelisk
     */
    public function actionGetVideo(){
        $videoId = Yii::$app->request->post('videoId');
        $video = Video::find()->asArray()->where("id=$videoId")->one();
        if(!$video){
            die(json_encode(['code' => 0]));
        }
        $content = Content::getClass(['fields' => "duration,commencement",'where'=>"c.id={$video['cid']}"]);
        $live = Livesdkid::find()->asArray()->where("contentId = {$video['cid']}")->one();
        $data['sdk'] = $video['sdk'];
        $data['pwd'] = $video['pwd'];
        $data['name'] = $video['name'];
        $data['image'] = $content[0]['image'];
        $data['duration'] = $content[0]['duration'];
        $data['commencement'] = $content[0]['commencement'];
        $data['sdkType'] = $live['sdkType'];
        $data['liveId'] = $video['liveId'];
        die(json_encode($data));
    }
    /*
     * 点赞
     * cy 名师
     */
    public function actionAddFine(){
        $teacherid = Yii::$app->request->post("teacherid");
        $contentid = Yii::$app->request->post("contentid");
        if($teacherid){//为老师点赞
            $fine = Teachers::find()->select("fine")->where("id = $teacherid")->asArray()->one()['fine'];
            $table = new Teachers();
            $id = $teacherid;
        }
        if($contentid){//为老师文章点赞
            $fine = TeacherContent::find()->asArray()->select("fine")->where("id = $contentid")->one()['fine'];
            $table = new TeacherContent();
            $id = $contentid;
        }
        $fine += 1;
        $res = $table::updateAll(['fine'=>$fine],"id = $id");
        if($res){
            $data = array('code'=>1,'message'=>'success');
        }else{
            $data = array('code'=>0,'message'=>'fail');
        }
        die(json_encode($data));
    }

    /*
     * 评论
     * cy 名师系列
     * type  1-评论 2-回复
     */
    public function actionAddComment(){
        $userid = Yii::$app->request->post("userid");
        $comment = Yii::$app->request->post('comment');
        $teacherid = Yii::$app->request->post("teacherid");
        $contentid = Yii::$app->request->post("contentid");
        $type = Yii::$app->request->post("type",1);
        if($type == 2){
            $pid = Yii::$app->request->post("pid");
            $fpid = Yii::$app->request->post("fpid");
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
                $page = new Pager($pidcount,1,5);
                $page = $page->GetPagerContent();
            }
            $comments = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid = 0")->orderBy("id desc")->limit(5)->all();
            foreach($comments as $k =>$v){
                $comments[$k]['key'] =$pidcount-$k;
                $uid = $v['userId'];
                $user = User::find()->asArray()->select("id,image,nickname")->where("uid = $uid")->one();
                $comments[$k]['userimage'] = $user['image'];
                $comments[$k]['usernickname'] = $user['nickname'];
                $datas = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid != 0 and fpid = {$v['id']}")->orderBy("id asc")->all();
                if(!empty($datas)){
                    foreach($datas as $ki => $ko){
                        $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                        $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                        $datas[$ki]['p_userimage'] = $p_user["image"];
                        $datas[$ki]["p_usernickname"] = $p_user["nickname"];
                        $self = User::find()->asArray()->select("id,image,nickname")->where("uid = {$ko['userId']}")->one();
                        $datas[$ki]['userimage'] = $self['image'];
                        $datas[$ki]['usernickname'] = $self['nickname'];
                    }
                }
                $comments[$k]["reply"] = $datas;
            }
            $data = array('code'=>1,'message'=>'success','comments'=>$comments,'page'=>$page,'totalcount'=>$pidcount);

        }else{
            $data = array('code'=>0,'messgae'=>'fail');
        }
        die(json_encode($data));
    }
    /**
     * 获取分页评论
     * 名师系列 cy
     * type 1-名师 2-文章
     */
    public function actionReadTeacherComment(){
        $page = Yii::$app->request->post("page");
        $teacherId = Yii::$app->request->post("teacherId");
        $contentId = Yii::$app->request->post("contentId");
        $type = Yii::$app->request->post("type",1);
        $fpage = ($page-1)*5;
        if($type == 1){
            $field = "teacherId";
            $value = $teacherId;
        }else{
            $field = "contentId";
            $value = $contentId;
        }
        $pidcount = TeachercolumnComment::find()->select("id")->where("$field = $value and pid = 0")->orderBy("id desc")->asArray()->count();
        $data = TeachercolumnComment::find()->where("$field = $value and pid = 0")->orderBy("id desc")->asArray()->offset($fpage)->limit(5)->all();
        foreach($data as $k => $v){
            $data[$k]["key"] = $pidcount-($fpage+$k);
            $userid = $v['userId'];
            $user = User::find()->asArray()->select(['image','nickname'])->where("uid = $userid")->one();
            $data[$k]['userimage'] = $user['image'];
            $data[$k]['nickname'] = $user['nickname'];
            $datas = TeachercolumnComment::find()->asArray()->where("$field = $value and pid != 0 and fpid = {$v['id']}")->orderBy("id asc")->all();
            if(!empty($datas)){
                foreach($datas as $ki => $ko){
                    $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                    $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                    $datas[$ki]['p_userimage'] = $p_user["image"];//被回复人信息
                    $datas[$ki]["p_usernickname"] = $p_user["nickname"];
                    $self = User::find()->asArray()->select("id,image,nickname")->where("uid = {$ko['userId']}")->one();
                    $datas[$ki]['userimage'] = $self['image'];//回复者信息
                    $datas[$ki]['usernickname'] = $self['nickname'];
                }
            }
            $data[$k]['reply'] = $datas;
        }
        die(json_encode($data));
    }
    /*
     * 名师收藏、取消收藏
     * cy
     */
    public function actionCollection(){
        $userid = Yii::$app->request->post('userid');
        $teacherid = Yii::$app->request->post("teacherid");
        $collection = Yii::$app->request->post("collection");
        $time = date('Y-m-d H:i:s ',time());
        if($collection == 1){
            $model = new TeacherCollection();
            $model->userId = $userid;
            $model->teacherId = $teacherid;
            $model->createTime = $time;
            $res = $model->save();
        }else{
            $res = TeacherCollection::deleteAll("userId = $userid and teacherId = $teacherid");
        }
        if($res){
            $data = array('code'=>1,'message'=>'success');
        }else{
            $data = array('code'=>0,'messgae'=>'fail');
        }
        die(json_encode($data));
    }
    /*
     * 用户打赏雷豆
     * cy 名师-文章
     */
    public function actionSendIntegral(){
        $uid = Yii::$app->request->post("uid");
        $leidou = Yii::$app->request->post("leidou");
        $contentid  = Yii::$app->request->post("contentid");
        $time = date('Y-m-d H:i:s ',time());
        $integral = uc_user_integral1($uid)['integral'];
        if($integral < $leidou){
            $data = array('code'=>0,'message'=>'打赏失败（雷豆数不足）');
        }else{
            uc_user_edit_integral1($uid,'用户打赏文章',2,$leidou);
            Yii::$app->db->createCommand("INSERT INTO x2_teacher_article_integral(`userId`,`contentId`,`integral`,`createTime`)  VALUE($uid,$contentid,$leidou,'".$time."')")->execute();
            $data = array('code'=>1,'message'=>"打赏成功");
        }
        die(json_encode($data));
    }
    /**
     * 用户报错
     */
    public function actionReportErrors(){
        $uid = Yii::$app->session->get("uid");
        $questionId = Yii::$app->request->get("questionId");
        $errorsType = Yii::$app->request->get("errorType");
        $error = Yii::$app->request->get("errorContent");
        if($uid){
            $model = new ReportErrors();
            $model->questionId = $questionId;
            $model->errorsType = $errorsType;
            $model->errorsContent = $error;
            $model->createTime = time();
            $model->uid = $uid;
            $model->source = "PC";
            $r = $model->save();
            if($r>0){
                $res = ['code' => 1,'message'=>'提交成功，感谢反馈！！！'];
            } else{
                $res = ['code' => 0,'message'=>'提交失败'];
            }
        } else {
            $res = ['code' => 2,'message'=>'未登录'];
        }
        die(json_encode($res));
    }
    /*
     * 测评 quit w/save
     *cy
     */
    public function actionQuitSave(){
        $uid = Yii::$app->request->post("uid");
        $questionid = Yii::$app->request->post("questionid");
        $type = Yii::$app->request->post("type");
        $hastime = Yii::$app->request->post("hastime");
        $date = date('Y-m-d H:i:s',time());
        $evaluation = UserEvaluation::find()->where("uid = $uid and questionId = $questionid and type = $type  and do = 0")->one();
        if(empty($evaluation)){
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->questionId = $questionid;
            $model->type = $type;
            $model->createTime = $date;
            $model->hasTime = $hastime;
            $res = $model->save();
            if($res){
                $data = ['code'=>1,'message'=>'success'];
            }else{
                $data = ['code'=>0,'message'=>'fail'];
            }
        }else{
            $data = ['code'=>1,'message'=>'success'];
        }
        die(json_encode($data));
    }
    /**
     * 完成测评
     * cy
     */
    public function actionEvaluationOver(){
        $uid = Yii::$app->request->post("uid");
        $questionid = Yii::$app->request->post("questionid");
        $type = Yii::$app->request->post("type");
        $mark = Yii::$app->request->post("mark");
        $hastime = Yii::$app->request->post("hastime");
        $answer = Yii::$app->request->post("answer");
        $oldtime = Yii::$app->request->post("oldtime");
        $date = date('Y-m-d H:i:s',time());
        $evaluation = UserEvaluation::find()->where("uid = $uid and questionId = $questionid and type = $type  and do = 0")->one();
        $correct = UserEvaluation::checkAnswer($questionid,$answer)?1:0;
        if(empty($evaluation)){
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->questionId = $questionid;
            $model->type = $type;
            $model->answer = $answer;
            $model->useTime = $oldtime - $hastime;
            $model->hasTime = $hastime;
            $model->createTime = $date;
            $model->mark = $mark;
            $model->do = 1;
            $model->correct = $correct;
            $res = $model->save();
        }else{
            $evaluation->answer = $answer;
            $evaluation->useTime = $evaluation->hasTime - $hastime;
            $evaluation->hasTime = $hastime;
            $evaluation->createTime = $date;
            $evaluation->correct = $correct;
            $evaluation->mark = $mark;
            $evaluation->do = 1;
            $res = $evaluation->save();
        }
        if($res){
            uc_user_edit_integral1($uid,'GRE用户测评',1,2);
            $record = new UserRecord();
            $record->uid = $uid;
            $record->type = $type;
            $record->over = 1;
            $record->createTime = date('Y-m-d H:i:s');
            $result = UserEvaluation::correctRate($uid,$type,'zt');
            $record->correctRate = $result[0];//测评正确率
            $record->verbal = $result[1];//阅读成绩
            $record->quant = $result[2];//数学成绩
            $record->verbalRate = $result[3];//语文正确率
            $record->quantRate = $result[4];//数学正确率
            $result = $record->save();
            if($result){
                $data = ['code'=>1,'message'=>'success','uid'=>$uid,'type'=>$type];
            }else{
                $data = ['code'=>0,'message'=>'fail'];
            }
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }
    /**
     * 中途终止测评退出
     * cy  exit section
     */
    public function  actionExitSection(){
        $uid = Yii::$app->request->post("uid");
        $type = Yii::$app->request->post("type");
        $model = new UserRecord();
        $model->uid= $uid;
        $model->type = $type;
        $model->over = 1;
        $model->createTime = date('Y-m-d H:i:s');
        $result = UserEvaluation::correctRate($uid,$type,'zt');
        $model->correctRate = $result[0];//测评正确率
        $model->verbal = $result[1];//阅读成绩
        $model->quant = $result[2];//数学成绩
        $model->verbalRate = $result[3];//语文正确率
        $model->quantRate = $result[4];//数学正确率
        $res = $model->save();
        if($res){
            $data = ['code'=>1,'message'=>'success'];
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }
    /**
     * 测评题目 标记 Mark
     * cy
     */
    public function actionDoMark(){
        $uid = Yii::$app->request->post("uid");
        $type = Yii::$app->request->post("type");
        $mark = Yii::$app->request->post("mark");
        $questionid = Yii::$app->request->post("questionid");
        $record = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $questionid")->one();
        $time = date('Y-m-d H:i:s',time());
        if(empty($record)){
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->type = $type;
            $model->questionId = $questionid;
            $model->mark = $mark;
            $model->createTime = $time;
            $res = $model->save();
        }else{
            $record->mark = $mark;
            $record->createTime = $time;
            $res =$record->save();
        }
        if($res){
            $data = ['code'=>1,'message'=>'success'];
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }

//    /**
//     * 上传内容分配用户
//     * yanni
//     */
//    public function actionContentDis(){
//        $userArr = [20422,20423,20424,20425,20426];
//        $data = Content::find()->asArray()->all();
//        foreach($data as $v){
//            $rand_keys = array_rand ($userArr, 1);
//            Content::updateAll(['userId'=>$userArr[$rand_keys]],"id={$v['id']}");
//        }
//    }

    /**
     * 单词获取ger问题
     * @Obelisk
     */
    public function actionGetGreQuestion(){
        $words = Yii::$app->request->get('words');
        $question = Question::find()->asArray()->where("((catId=1 AND knowId=1) or (catId=2 AND knowId=18)) AND (details like '% $words' or details like '$words %' or details like '% $words %')")->one();
        if($question){
            $arr = [];
            $arr['question'] = $question['details'];
            $arr['article'] = $question['readArticle'];
            $arr['questionanswer'] = $question['answer'];
            $pModel = new UserAnalysis();
            $analysis = $pModel->getPublishUser($question['id']);
            $arr['analysis'] = $analysis['analysisContent'];
            $select = Method::getTextHtmlArr($question['optionA']);
            foreach($select as $k=> $v){
                $arr['qslctarr'][$k] = [
                    'name' => chr(ord('A') + intval($k)),
                    'select' => $v,
                ];
            }
            $arr['optionA'] = $question['optionA'];
            die(json_encode(['code' => 1,'question' => $arr]));
        }else{
            die(json_encode(['code' => 0]));
        }
    }

    /**
     * 关注小编接口
     * by  yanni
     */
    public function actionUserFollow(){
        $authorId = Yii::$app->request->get('authorId');
        $uid = Yii::$app->session->get('uid');
        if($uid){
            $inspect = UserFollow::find()->asArray()->where("uid={$uid} and followUser={$authorId}")->one();
            if($inspect){
                UserFollow::deleteAll("uid = {$uid} and followUser = {$authorId}");
                $res = ['code' => 1,'message'=>'你已取消关注'];
            } else {
                $model = new UserFollow();
                $model->uid = $uid;
                $model->followUser = $authorId;
                $model->createTime = time();
                $re = $model->save();
                if($re>0){
                    $res = ['code' => 1,'message'=>'关注成功'];
                } else {
                    $res = ['code' => 0,'message'=>'关注失败'];
                }
            }
        } else {
            $res = ['code' => 0,'message'=>'请登录'];
        }
        die(json_encode($res));
    }

    /**
     * 内容点赞
     * by  yanni
     */
    public function actionContentFabulous(){
        $contentId = Yii::$app->request->get('contentId');
        $data = Content::findOne($contentId);
        $re = Content::updateAll(['fabulous'=>$data->fabulous+1],"id={$contentId}");
            if($re>0){
                $res = ['code' => 1,'message'=>'点赞成功'];
            } else {
                $res = ['code' => 0,'message'=>'点赞失败'];
            }
        die(json_encode($res));
    }
    /**
     * 评论点赞
     * by  yanni
     */
    public function actionCommentFabulous(){
        $commentId = Yii::$app->request->get('commentId');
        $data = UserComment::findOne($commentId);
        $re = UserComment::updateAll(['fane'=>$data->fane+1],"id={$commentId}");
        if($re>0){
            $res = ['code' => 1,'message'=>'点赞成功'];
        } else {
            $res = ['code' => 0,'message'=>'点赞失败'];
        }
        die(json_encode($res));
    }
    /**
     * 评论点赞 名师、名师专栏
     * cy
     */
    public function actionAddFineTeacher(){
        $commentId = Yii::$app->request->post("commentId");
        $data = TeachercolumnComment::find()->where("id = $commentId")->one();
        if(is_null($data->fine)){
            $data->fine = 1;
        }else{
            $data->fine= ($data->fine+1);
        }
        $res = $data->save();
        if($res){
            $return = ['code'=>1,'message'=>'success','fine'=>$data->fine];
        }else{
            $return = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($return));
    }
    /**
     * 内容文章收藏
     * by yanni
     */
    public function actionUserContentCollection(){
        $contentId = Yii::$app->request->post('contentId');
        $uid = Yii::$app->session->get('uid');
        $tea_artId = Yii::$app->request->post("tea_artId");//老师文章Id
        if($uid){
            if($contentId){
                $userCollection = UserCollection::find()->asArray()->where("uid={$uid} and contentId={$contentId}")->one();
            }
            if($tea_artId){//老师文章收藏 cy
                $userCollection = UserCollection::find()->asArray()->where("uid = $uid and tea_artId = $tea_artId")->one();
            }
            if($userCollection){
                UserCollection::deleteAll("id={$userCollection['id']}");
                $res = ['code' => 2,'message'=>'取消收藏成功'];
            } else{
                $model = new UserCollection();
                $model->uid = $uid;
                $model->createTime = time();
                $model->contentId = $contentId;
                $model->tea_artId = $tea_artId;
                $model->save();
                $res = ['code' => 1,'message'=>'收藏成功'];
            }
        } else{
            $res = ['code' => 0,'message'=>'请登录'];
        }
        die(json_encode($res));
    }
    /**
     * 内容文章报错
     */
    public function actionContentErrors(){
        $uid = Yii::$app->session->get("uid");
        $contentId = Yii::$app->request->get("contentId");
        $typeStr = Yii::$app->request->get("typeStr");
        $error = Yii::$app->request->get("errorContent");
        $tea_artId = Yii::$app->request->get("tea_artId");//老师文章Id cy
        if($uid){
            $model = new ContentErrors();
            $model->contentId = $contentId;
            $model->typeStr = $typeStr;
            $model->errorDescribe = $error;
            $model->uid = $uid;
            $model->tea_artId = $tea_artId;
            $model->createTime = time();
            $r = $model->save();
            if($r>0){
                $res = ['code' => 1,'message'=>'提交成功，感谢反馈！！！'];
            } else{
                $res = ['code' => 0,'message'=>'提交失败'];
            }
        } else {
            $res = ['code' => 2,'message'=>'未登录'];
        }
        die(json_encode($res));
    }
    /**
     * gre 模考退出保存
     * cy quit save
     */
    public function actionQuit(){
        $questionId = Yii::$app->request->post("questionId");
        $sectionId = Yii::$app->request->post("sectionId");
        $mockExamId = Yii::$app->request->post("mockExamId");
        $hastime = Yii::$app->request->post("hastime");
        $uid = Yii::$app->session->get("uid");
        $data = MockRecord::find()->where("uid = $uid and questionId = $questionId and mockExamId = $mockExamId and sectionId = $sectionId")->one();
        if($data){
            $data->do = 0;
            $res = $data->save();
        }else{
            $model = new MockRecord();
            $model->uid = $uid;
            $model->questionId = $questionId;
            $model->sectionId = $sectionId;
            $model->mockExamId = $mockExamId;
            $model->do = 0;
            $res = $model->save();
        }
        if($res){
            $msg = ['code'=>1,'message'=>'success'];
        }else{
            $msg = ['code'=>0,'message'=>'fail'];
        }
        MockResult::updateAll(['hasTime'=>$hastime],"uid = $uid and mockExamId = $mockExamId and status = 0");
        die(json_encode($msg));
    }
    /**
     * GRE模考mark
     * cy
     */
    public function actionMark(){
        $uid = Yii::$app->session->get("uid");
        $sectionId = Yii::$app->request->post("sectionId");
        $mockExamId = Yii::$app->request->post("mockExamId");
        $questionId = Yii::$app->request->post("questionId");
        $mark = Yii::$app->request->post("mark");//0-取消标记 1-标记
        if($mark == 1){
            $date = time();
            $sql = "insert into x2_user_mock_mark(`uid`,`sectionId`,`mockExamId`,`createTime`,`questionId`) value($uid,$sectionId,$mockExamId,$date,$questionId)";
            $result = Yii::$app->db->createCommand($sql)->execute();
        }else{
            $result = Yii::$app->db->createCommand("delete from x2_user_mock_mark where uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId and questionId = $questionId")->execute();
        }
        if($result){
            $data = ['code'=>1,'message'=>'success'];
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }
    /**
     * gre 模考 下一题
     * cy
     */
    public function actionNextMock(){
        $request = Yii::$app->request;
        $mockExam = new MockExam();
        $uid = Yii::$app->session->get("uid");
        $questionId = $request->post("questionId");
        $sectionId = $request->post("sectionId");
        $mockExamId = $request->post("mockExamId");
        $answer = $request->post("answer");
        $usetime = $request->post("usetime");
        $hastime = $request->post("hastime");
        $nextId = $request->post("nextId");
        $ques = Questions::find()->where("id = $questionId")->one();
        $quesType = $ques->typeId;
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if($quesType == 2 || $quesType == 3 || $quesType == 7 || $quesType ==10){
            $answers = explode(',',$answer);
            foreach($answers as $k => $v ){
                $answers[$k] = trim($v);
            }
            $answer = implode(',',$answers);
        }
        if( $quesType ==10) {
            $answer = trim($answer);
        }
        if( $quesType == 7 ) {
            $answer = trim($answer);
        }
        $do = 1;//1-已做  -1 已做但答案未选全
        if($quesType != 7 && $quesType != 2 && $quesType != 3 && $quesType != 10) {
            $answer = addslashes($answer);
            if($answer){
                $data = Questions::find()->where("id = $questionId and answer = '{$answer}'")->one();
                if($data)$correct = 1;else $correct = 0;
                if($quesType == 4 && strlen($answer) < 2){
                    $do = -1;
                }
            }else{
                $do = -1;
                $correct = 0;
            }
        }elseif($quesType == 2 ||$quesType == 3){
            $correctAnswer = Questions::find()->where("id = $questionId")->asArray()->one()['answer'];
            $correctAnswer = trim(strip_tags($correctAnswer));
            if($answer == $correctAnswer){
                $correct = 1;
            }else{
                $correct = 0;
                foreach(explode(',',$answer) as $k => $v){
                    if(empty($v)){$do = -1;break;}
                }
            }
        }elseif($quesType == 10){//填空题 去掉单位比较
            $ques = Questions::find()->where("id = $questionId")->asArray()->one();
            $correct_answer = $ques['answer'];
            $correct_answer = $mockExam->strToNum($correct_answer);
            $user_answer = $mockExam->strToNum($answer);
            if($correct_answer == $user_answer){
                $correct = 1;
            }else{
                $correct = 0;
            }
        }else{//句子点选题型比较  纯字符比较
            $correctAnswer = Questions::find()->where("id = $questionId")->asArray()->one()['answer'];
            $correctAnswer = strip_tags($correctAnswer);
            $answer1 = preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$correctAnswer);
            $answer2 = preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$answer);
            if($answer1 == $answer2){
                $correct = 1;
            }else{
                $correct = 0;
            }
            if(!$answer) {
                $do = -1;
            }
        }
        $mockRecord = new MockRecord();
        $data = $mockRecord::find()->where("uid = $uid and sectionId = $sectionId and questionId = $questionId")->one();
        $date = time();
        if($data){
            $data->answer = $answer;
            $data->do = $do;
            $data->useTime = $usetime;
            $data->correct = $correct;
            $data->createTime = $date;
            $res = $data->save();
        }else{
            $mockRecord->uid = $uid;
            $mockRecord->sectionId = $sectionId;
            $mockRecord->questionId = $questionId;
            $mockRecord->mockExamId = $mockExamId;
            $mockRecord->answer = $answer;
            $mockRecord->useTime = $usetime;
            $mockRecord->correct = $correct;
            $mockRecord->do = $do;
            $mockRecord->createTime = $date;
            $res = $mockRecord->save();
        }
        if($res){
            if($nextId == 0){//当前section最后一题
                $isEnd = $mockExam->isEnd($sectionId,$mockExamId);
                if($isEnd){//最后一个section 即已完成该模考的所有题型
                    $type = $mockExam::find()->where("id = $mockExamId")->asArray()->one()['type'];
                    $correctMsg = $mockRecord->getCorrectRate($uid,$mockExamId,$type);
                    $mockResult = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->one();
                    $date = time();
                    $mockResult->score = $correctMsg['mockScore'];
                    $mockResult->verbalScore = $type == 3?$correctMsg['verScore']:0;
                    $mockResult->quantScore = $type == 3?$correctMsg['quanScore']:0;
                    $mockResult->correctRate = $correctMsg['correctRate'];
                    $mockResult->type = $type;
                    $mockResult->sectionMsg = $correctMsg['secMsg'];
                    $mockResult->correctMsg = $correctMsg['correctMsg'];
                    $mockResult->endTime = $date;
                    $mockResult->useTime = $correctMsg['useTime'];
                    $mockResult->status = 1;
                    $mockResult->sectionId = 0;
                    $result = $mockResult->save();
                    if($result){
                        $msg = ['code'=>1,'message'=>'success','over'=>1,'url'=>"/cn/mock-exam/result?mockExamId=$mockExamId"];
                    }else{
                        $msg = ['code'=>0,'message'=>'fail'];
                    }
                    die(json_encode($msg));
                }else{
                    $nextSection = $mockExam->getSectionMsg($sectionId,$mockExamId);
                    $seId = $nextSection['sectionId'];
                    $site = $mockRecord->getSectionSite($seId,$mockExamId)['site'];
                    if($site == 3 ){
                        $minute = 10;
                    }else{
                        $minute = 1;
                    }
                }
                MockResult::updateAll(['hasTime'=>$hastime],"uid = $uid and mockExamId = $mockExamId and status = 0");
                $msg = ['code'=>1,'message'=>'success','over'=>0,'minute'=>$minute,'currSec'=>$sectionId,'url'=>"/cn/mock-exam/end-section?currSec=$sectionId&minute=$minute"];
            }else{
                $qid = $nextId;
                $seId = $sectionId;
                MockResult::updateAll(['hasTime'=>$hastime],"uid = $uid and mockExamId = $mockExamId and status = 0");
                $msg = ['code'=>1,'message'=>'success','over'=>-1,'url'=>"/mockTopic/$mockExamId-$seId-$qid.html"];//还在当前section中
            }

        }else{
            $msg = ['code'=>0,'message'=>"fail"];
        }
        die(json_encode($msg));
    }
    /**
     * 模考时间为0时的接口
     * section exit 接口  退出该section测试
     * cy
     */
    public function actionTimeOut(){
        $uid = Yii::$app->session->get("uid");
        $sectionId = Yii::$app->request->post("sectionId");
        $mockExamId= Yii::$app->request->post("mockExamId");
        $questionId = Yii::$app->request->post("questionId");
        $mockExam = new MockExam();
        $mockRecord = new MockRecord();
        $data = $mockRecord::find()->where("uid = $uid and sectionId = $sectionId and questionId = $questionId")->one();
        $date = time();
        if($data){
            $data->hasTime = 0;
            $data->correct = 0;
            $data->do = -1;
            $data->createTime = $date;
            $res = $data->save();
        }else{
            $mockRecord->uid = $uid;
            $mockRecord->sectionId = $sectionId;
            $mockRecord->questionId = $questionId;
            $mockRecord->mockExamId = $mockExamId;
            $mockRecord->hasTime = 0;
            $mockRecord->correct = 0;
            $mockRecord->do = -1;
            $mockRecord->createTime = $date;
            $res = $mockRecord->save();
        }
        if($res){
//            MockRecord::deleteAll("uid = $uid and sectionId = $sectionId and do = 0");
            $isEnd = $mockExam->isEnd($sectionId,$mockExamId);
            if($isEnd){//最后一个section 即已完成该模考的所有题型
                $type = $mockExam::find()->where("id = $mockExamId")->asArray()->one()['type'];
                $correctMsg = $mockRecord->getCorrectRate($uid,$mockExamId,$type);
                $result = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->one();
                if($result){
                    $mockResult = $result;
                }else{
                    $mockResult = new MockResult();
                }
                $date = time();
                $mockResult->uid = $uid;
                $mockResult->mockExamId = $mockExamId;
                $mockResult->score = $correctMsg['mockScore'];
                $mockResult->verbalScore = $type == 3?$correctMsg['verScore']:0;
                $mockResult->quantScore = $type == 3?$correctMsg['quanScore']:0;
                $mockResult->correctRate = $correctMsg['correctRate'];
                $mockResult->type = $type;
                $mockResult->sectionMsg = $correctMsg['secMsg'];
                $mockResult->correctMsg = $correctMsg['correctMsg'];
                $mockResult->endTime = $date;
                $mockResult->useTime = $correctMsg['useTime'];
                $mockResult->hasTime = 0;
                $mockResult->status = 1;
                $result = $mockResult->save();
                if($result){
                    $msg = ['code'=>1,'message'=>'success','over'=>1];
                }else{
                    $msg = ['code'=>0,'message'=>'fail'];
                }
                die(json_encode($msg));
            }else{
                $nextSection = $mockExam->getSectionMsg($sectionId,$mockExamId);
                $seId = $nextSection['sectionId'];
                $type = $mockRecord->getSectionSite($seId,$mockExamId)['site'];
                if($type == 3 ){
                    $minute = 10;
                }else{
                    $minute = 1;
                }
//                MockResult::updateAll(['sectionId'=>$seId,'hasTime'=>$time],"uid = $uid and mockExamId = $mockExamId and status =0");
            }
            $msg = ['code'=>1,'message'=>'success','over'=>0,'minute'=>$minute,'currSec'=>$sectionId];
        }else{
            $msg = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($msg));
    }
    /**
     * gre 模考获取不同类型的题目信息
     * cy
     */
    public function actionSelectTopic(){
        $uid = Yii::$app->session->get("uid");
        $sectionId = Yii::$app->request->post("sectionId");
        $access = Yii::$app->request->post("access");//0-全部 1-错题 2-耗时最长
        $questionId = Yii::$app->request->post("questionId");
        $mockRecord = new MockRecord();
        $quesiton = $mockRecord->getTopic($uid,$sectionId,$access,$questionId);
        //评论
        $comment = new UserComment();
        $comment = $comment->getQuestionComment($questionId,1,5);
        foreach($comment['data'] as $k=>$v) {
            $comment['data'][$k]['reply'] = Yii::$app->db->createCommand("select uc.*,u.userName,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
        }
        $data = ['question'=>$quesiton,'comment'=>$comment];
        die(json_encode($data));
    }

    /**
     * GRE题库做题标记
     * by yanni
     */
    public function actionMakeMark(){
        $uid = Yii::$app->session->get("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'请登录']));
        }
        $libId = Yii::$app->request->post("libId");
        $questionId = Yii::$app->request->post("questionId");
        $mark = UserBankMark::find()->asArray()->where("uid={$uid} and libId={$libId} and questionId={$questionId}")->one();
        if(empty($mark)){
            $data['uid'] = $uid;
            $data['libId'] = $libId;
            $data['questionId'] = $questionId;
            $data['createTime'] = time();
            $r = Yii::$app->db->createCommand()->insert('{{%user_bank_mark}}', $data)->execute();
            if($r){
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                $data = ['code'=>1,'message'=>'标记成功'];
            } else{
                $data = ['code'=>0,'message'=>'标记失败'];
            }
        }else{
            $r = UserBankMark::deleteAll("uid={$uid} and libId ={$libId} and questionId={$questionId}");
            if($r){
                SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
                $data = ['code'=>1,'message'=>'成功取消标记'];
            } else{
                $data = ['code'=>0,'message'=>'取消失败'];
            }
        }
        die(json_encode($data));
    }
    /**
     * App上传图片Upload a picture
     * @Obelisk
     */

    public function actionUploadPicture()
    {

        $file = $_FILES['upload'];

        $session = Yii::$app->session;

        $uid = $session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 0,'message'=>'请登录']));
        }
        $upload = new UploadFile();

        $upload->int_max_size = 3145728;

        $upload->arr_allow_exts = array('jpg', 'gif', 'png', 'jpeg');

        $upload->str_save_path = Yii::$app->params['upImage'];

        $arr_rs = $upload->upload($file);

        if ($arr_rs['int_code'] == 1) {

            $filePath = '/' . Yii::$app->params['upImage'] . $arr_rs['arr_data']['arr_data'][0]['savename'];

            $res['code'] = 1;

            $res['message'] = '上传成功';

            $res['data'] = $filePath;
        } else {

            $res['code'] = 0;

            $res['message'] = '上传失败，请重试';

        }

        die(json_encode($res));

    }
    /**
     * GRE首页接口
     * 申友调用
     * cy
     */
    public function actionGreIndex(){
        $numQuestions = UserAnswer::find()->select("id")->asArray()->groupBy("uid")->count();//做题人数
        $numSearchs = UserSearch::find()->asArray()->where("id=1")->one();//搜题人数
        $viewNum = 0;//学习人数
        $sign = Content::find()->asArray()->where("catId=568")->all();
        foreach($sign as $value){
            $viewNum = $viewNum+$value['viewCount'];
        }
        //直播课程
        $course = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'alternatives,commencement,trainer', 'category' => '482', 'order' => ' c.sort asc,c.id DESC', 'page' => 1, 'pageSize' => 20]);
        //GRE备考
        //一周热门
        $hots = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
        //词汇
        $words['imageMessage'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '538', 'page' => 1, 'pageSize' => 1, 'order' => 'alternatives desc']);
        $words['contents'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '538', 'page' => 1, 'pageSize' => 14, 'order' => 'alternatives desc']);
        //阅读
        $read['imageMessage'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '540', 'page' => 1, 'pageSize' => 1, 'order' => 'alternatives desc']);
        $read['contents'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '540', 'page' => 1, 'pageSize' => 14, 'order' => 'alternatives desc']);
        //填空
        $blank['imageMessage'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '539', 'page' => 1, 'pageSize' => 1, 'order' => 'alternatives desc']);
        $blank['contents'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '539', 'page' => 1, 'pageSize' => 14, 'order' => 'alternatives desc']);
        //数学
        $math['imageMessage'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '541', 'page' => 1, 'pageSize' => 1, 'order' => 'alternatives desc']);
        $math['contents'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '541', 'page' => 1, 'pageSize' => 14, 'order' => 'alternatives desc']);
        //写作
        $write['imageMessage'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '542', 'page' => 1, 'pageSize' => 1, 'order' => 'alternatives desc']);
        $write['contents'] = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '542', 'page' => 1, 'pageSize' => 14, 'order' => 'alternatives desc']);
        //GRE题库
        $newQuestions = Question::find()->asArray()->orderBy('createTime desc')->limit(20)->all();
        foreach($newQuestions as $k=>$v){
            $qmodel = new Questions();
            if($v['catId'] && $v['sourceId']){
                $newQuestions[$k]['section'] = $qmodel->getSection($v['catId']);
                $newQuestions[$k]['source'] = $qmodel->getSource($v['sourceId']);
            }
        }
        $data = ['code'=>1,'message'=>'success','data'=>['numQuestions'=>$numQuestions,'numSearchs'=>$numSearchs,'viewNum'=>$viewNum,'course'=>$course,'hot'=>$hots,'word'=>$words,'read'=>$read,'blank'=>$blank,'math'=>$math,'write'=>$write,'newQuestions'=>$newQuestions]];
        die(json_encode($data));
    }

    /**
     * 用户做题正确率
     * by  yanni
     */
    public function actionUserCorrectRate(){
        $uid = Yii::$app->request->post('uid');
        $model = new UserAnswer();
        $data = $model->getQuestionsCorrectRate($uid);
        die(json_encode($data));
    }

    /**
     * GRE学员案例分页接口
     * by  yanni
     */
    public function actionCasePage(){
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',6);
        $data = Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives,article,listeningFile,cnName,numbering','category' => '531','page'=>$page,'pageSize' => $pageSize,'pageStr'=>1]);
        die(json_encode($data));
    }

    /**
     * 吐槽邀请用户列表
     */
    public function actionInviteUsersList(){
        $page = Yii::$app->request->post('page',1);
        $pageSize = Yii::$app->request->post('pageSize',10);
        $model = new User();
        $data = $model->getUserByAccuracyRate($page,$pageSize);
        die(json_encode(['code'=>1,'data'=>$data]));
    }
    /**
     *  课程详情
     * by  yanni
     */
    public function actionWebCourseDetail(){
        $courseId = Yii::$app->request->get('courseId');
        $model = new Content();
        $sign = $model->findOne($courseId);
        if(!$sign){
            die(json_encode(['code' => 0,'message'=>'商品已下架']));
        }
        if($sign->pid == 0){
            $data =  $model->getClass(['fields' => 'answer,price,originalPrice,duration,commencement,performance,alternatives,article,description','where' =>"c.pid=$courseId",'pageSize' => 1]);
            if(empty($data)){
                die(json_encode(['code' => 0,'message'=>'没有课程详情']));
            }
            $pid = $courseId;
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$courseId"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($data[0]['id']);
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$courseId");
        }else{
            $data =  $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance,alternatives,article,description','where' =>"c.id=$courseId",'pageSize' => 1]);
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($courseId);
            $pid = $sign->pid;
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$sign->pid");
        }
        $endTime = strtotime($data[0]['article']);
        if($endTime < time()){
            $surplusTime = '已结束';
        } else {
            $surplusTime = $endTime-time();
        }
        $modelu = new UserComment();
        $comment = $modelu->getUserComment($pid,1,5);
        $modelM = new Method();
        $surplusTime = $modelM->gmstrftimeB($surplusTime);
        $data[0]['article'] = $surplusTime;
        $audition = Livesdkid::find()->asArray()->where("contentId={$courseId}")->one();
        $res = ['courseId' => $courseId,'pid' => $pid,'count' => $count,'tag' => $tag,'comment'=>$comment,'data' => $data[0],'parent' => $parent[0],'audition'=>$audition];
        die(json_encode(['code'=>1,'data'=>$res,'message'=>'请求成功']));

    }

    /**
     * 更新题目难度
     * by  yanni
     */
    public function actionUpdateLevel(){
        set_time_limit(0);
        $catId = Yii::$app->request->get('catId',1);
        $questions = Yii::$app->db->createCommand("select * from (SELECT ua.questionId,count(ua.uid) as doNum FROM `x2_user_answer` as ua LEFT JOIN x2_questions as q on ua.questionId=q.id where q.catId=$catId GROUP BY ua.questionId) AS res WHERE res.doNum>=50")->queryAll();
        $n = 0;
        foreach($questions as $k=>$v){
            $totalNum = Yii::$app->db->createCommand("select count(ua1.uid) as totalNum from x2_user_answer as ua1 where ua1.questionId={$v['questionId']}")->queryOne();
            $crrectNum = Yii::$app->db->createCommand("select count(ua.uid) as correctNum from x2_user_answer as ua where ua.questionId={$v['questionId']} and correct=1")->queryOne();
            $correctRate = round($crrectNum['correctNum']/$totalNum['totalNum'],4)*100;
            $level = '';
            if($catId==1){
                if($correctRate>=91 && $correctRate<=100){
                    $level = 1;
                } else if($correctRate>=81 && $correctRate<=90){
                    $level = 2;
                } else {
                    $level = 3;
                }
            } elseif($catId==2) {
                if($correctRate>=91 && $correctRate<=100){
                    $level = 6;
                } else if($correctRate>=81 && $correctRate<=90){
                    $level = 7;
                } else {
                    $level = 8;
                }
            } elseif($catId==3){
                if($correctRate>=91 && $correctRate<=100) {
                    $level = 11;
                } else {
                    $level = 12;
                }
            }
            Question::updateAll(['newLevel'=>$level],['id'=>$v['questionId']]);
            $n++;
            echo $n ."--".$v['questionId']."--".$correctRate."--".$level."<br>";
        }
    }

    /**
     * 定时获取GRE用户正确率
     */
    public function actionGreRight(){
        $date = date("Y-m-d");
        $time = strtotime("$date -3 month");
        $sql = "SELECT u.userName,u.nickname,u.uid,u.id as userId,count(ua.id) AS doNum,count(ua.correct = 2 OR NULL) AS falseNum,count(ua.correct = 2 OR NULL) / count(ua.id) AS t FROM x2_user AS u LEFT JOIN x2_user_answer AS ua ON u.uid = ua.uid WHERE ua.uid != '' AND u.uid != '' AND ua.createTime > $time GROUP BY u.uid ORDER BY t DESC";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $uid = [];
        $info = [];
        foreach ($data as $k => $v){
            if($v['t']>=0.7){
                $uid[]=$v['uid'];
                $info[$v['uid']] = [
                    'nickname' => $v['nickname'],
                    'accuracy' => round($v['t'],2),
                    'username' => $v['userName'],
                    'userid' => $v['userId'],
                ];
            }
        }
        $fileName = 'files/cache/questionAccuracy.txt';
        $data = [];
        $data['uid'] = $uid;
        $data['info'] = $info;
        $myFile = fopen ($fileName,"w") or die("Unable to open file!");
        fwrite($myFile, serialize($data));
        fclose($myFile);
    }

//    /**
//     * 修改用户答题表对错
//     * by  yanni
//     */
//    public function actionUpdateUserAnswerAll(){
//        set_time_limit(0);
//        $typeId = Yii::$app->request->get('typeId',4);
//        $sql ="SELECT q.answer AS qanswer,ua.answer AS uanswer,ua.correct,ua.questionId,ua.id FROM `x2_user_answer` AS ua LEFT JOIN x2_questions AS q ON ua.questionId = q.id WHERE q.typeId = $typeId AND q.answer = ua.answer AND correct = 2";
//        $data = Yii::$app->db->createCommand($sql)->queryAll();
//        $n=0;
//        foreach($data as $k=>$v){
//            UserAnswer::updateAll(['correct'=>1],['id'=>$v['id']]);
//            $n++;
//            echo $n ."<br>";
//        }
//        die;
//    }
    /**
     * 单词商城
     * 课程数据获取
     * cy
     */
    public function actionWordsAppStore(){
        $childreIds = Category::find()->where("pid = 482")->select("id,name")->asArray()->all();
        $courses = [];
        $content = new Content();
        $ids = Yii::$app->request->get('ids');
        if($ids){
            $idArr = explode('-',$ids);
        }else{
            $idArr = [];
        }
        foreach($childreIds as $k =>$v){
            $course = $content::getClass(['fields' => 'price','category' => $v['id'],'page'=>1,'order'=>' c.sort asc,c.id DESC','pageSize' => 10]);
            foreach($course as $l => $t){
                $cour = ['id'=>$t['id'],'name'=>$t['title'],'image'=>$t['image'],'buy'=>$t['viewCount'],'price'=>$t['price'],'sdk'=>''];
                if($idArr){
                    if(!in_array($cour,$courses) && in_array($t['id'],$idArr)) {
                        $courses[] = $cour;
                    }
                }else{
                    if(!in_array($cour,$courses)){
                        $courses[] = $cour;
                    }
                }
            }
        }
        die(json_encode($courses));
    }
    public function actionWordsAppStoreDetail(){
        $courseId = Yii::$app->request->get('id',7755);
        $model = new Content();
        $sign = $model->findOne($courseId);
        if(!$sign){
            die(json_encode([]));
        }
        if($sign->pid == 0){
            $data =  $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance,alternatives,article,description','where' =>"c.pid=$courseId",'order'=>'c.id asc','pageSize' => 1]);
            if(empty($data)){
                die(json_encode(['code' => 0,'message'=>'没有课程详情']));
            }
            $pid = $courseId;
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$courseId"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($data[0]['id']);
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$courseId");
        }else{
            $data =  $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance,alternatives,article,description','where' =>"c.id=$courseId",'pageSize' => 1]);
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($courseId);
            $pid = $sign->pid;
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$sign->pid");
        }
        $endTime = strtotime($data[0]['article']);
        if($endTime < time()){
            $surplusTime = '已结束';
        } else {
            $surplusTime = $endTime-time();
        }
        $modelM = new Method();
        $surplusTime = $modelM->gmstrftimeB($surplusTime);
        $data[0]['article'] = $surplusTime;
        $data[0]['place'] = \Yii::$app->params['coursePlace'][$data[0]['id']%3];
        $modelu = new UserComment();
        $comment = $modelu->getUserComment($pid,1,20);
        $audition = Livesdkid::find()->asArray()->where("contentId={$courseId}")->one();
        $res = ['courseId' => $courseId,'pid' => $pid,'count' => $count,'tag' => [],'data' => $data[0],'parent' => $parent[0],'comment'=>$comment,'audition'=>$audition];
        $return = [];
        $return['contentId'] = $data[0]['id'];
        $return['title'] = $data[0]['name'];
        $return['image'] = $data[0]['image'];
        $return['catName'] = $data[0]['catName'];
        $return['price'] = $data[0]['price'];
        $return['hour'] = $data[0]['duration'];
        $return['buy'] = $data[0]['alternatives'];
        $return['teacher'] = '雷哥GRE名师团队';
        $return['details'] = $parent[0]['description'];
        $comment = $comment['data'];
        $reply = [];
        foreach($comment as $k => $v){
            $reply[] = ['nickname'=>$v['nickname'],'content'=>$v['content'],'createTime'=>$v['createTime']];
        }
        $return['reply'] = $reply;
        die(json_encode($return));

    }
    /**
     * gre wap 课程数据
     * video
     * 录播
     * cy
     */
    public function actionWapCourseVideo(){
        $id = Yii::$app->request->get('id');
        $video = Video::find()->asArray()->where("id=$id")->one();
        $list = Video::find()->asArray()->select(['id','name','sdk','pwd','liveId'])->where("cid={$video['cid']} and grade='".$video['grade']."' and type = '".$video['type']."'")->all();
        $data = ['video'=>$video,'list'=>$list];
        die(json_encode($data));
    }
    /**
     * gre wap 课程数据
     * 直播
     * cy
     * live
     */
    public function actionWapCourseLive(){
        $contentId = Yii::$app->request->get('contentId');
        $live = Livesdkid::find()->asArray()->select(['livesdkid','clientKey','auditionKey','classroom','sdkType'])->where("contentId=$contentId")->one();
        die(json_encode($live));
    }
    /**
     * 单词商城
     * 课程
     * 直播 录播
     * cy
     */
    public function actionWordsStoreCourseData(){
        $cid = Yii::$app->request->get('cid');
        $grade = Yii::$app->request->get('grade');
        //直播内容
        $live = Livesdkid::find()->asArray()->select(['livesdkid','clientKey','auditionKey','classroom','sdkType'])->where("contentId={$cid}")->one();
        //录播内容
        $video = Video::find()->asArray()->select(['name','sdk','pwd','liveId'])->where("cid={$cid} and grade='".$grade."'")->orderBy("sort desc")->all();
        $data = ['live'=>$live,'video'=>$video];
        die(json_encode($data));
    }
    /**
     * 题库数据生成
     * 阅读&逻辑分类题库替换
     * cy
     * 1个库里面，放4篇文章：1长文章（4道题目以上）+1中文章（3题左右）+1短文章（2题左右）+1 逻辑单题
     */
    public function actionLibraryReplace(){
        $type = Yii::$app->request->get('type',0);//1-单项 2-考点 3-难度
        //获取文章题库集
        $questionData = Question::getQuestionArticleData($type);
        die(json_encode($questionData));
    }
}
