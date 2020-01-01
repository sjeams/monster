<?php
/**
 * Created by PhpStorm.
 * User: by cy
 * Date: 2018/3/30
 * Time: 11:37
 */
namespace app\modules\cn\controllers;

use app\libs\Method;
use app\libs\ToeflApiControl;
use app\modules\cn\models\Category;
use app\modules\cn\models\ContentCollecte;
use app\modules\cn\models\Content;
use app\modules\cn\models\Login;
use app\modules\cn\models\QuestionCat;
use app\modules\cn\models\QuestionLevel;
use app\modules\cn\models\QuestionLibrary;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\SourceCat;
use app\modules\cn\models\SynchroLog;
use app\modules\cn\models\TeacherContent;
use app\modules\cn\models\User;
use app\modules\cn\models\UserAnalysis;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\UserCollection;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\Video;
use app\modules\content\models\ContentTag;
use app\modules\content\models\Teacher;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\Questions;
use app\modules\question\models\QuestionSource;
use Yii;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
class WapApiController extends ToeflApiControl{

    public  $enableCsrfValidation = false;

    /**
     * 登录
     * cy
     */
    public function actionLogin(){
        $user = new User();
        $request = Yii::$app->request;
        $uid = $request->post("uid");
        $phone = $request->post("phone");
        $password = md5($request->post("password"));
        $username = $request->post("username");
        $email = $request->post("email");
        $loginsdata = $user->find()->where("uid = $uid ")->one();
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
            $loginsdata = $user->find()->where("$where")->one();
            if (empty($loginsdata['id'])) {
                $login = new User();
                $login->phone = $phone;

                $login->userPass = $password;

                $login->email = $email;

                $login->createTime = time();

                $login->userName = $username;
                $login->uid = $uid;
                $login->save();
                $loginsdata = $user->find()->where("$where")->asArray()->one();
            }else{
                if($phone != $loginsdata['phone']){
                    User::updateAll(['phone' => $phone],"id={$loginsdata['id']}");
                }
                if($email != $loginsdata['email']){
                    User::updateAll(['email' => "$email"],"id={$loginsdata['id']}");
                }
                if($username != $loginsdata['userName']){
                    User::updateAll(['userName' => "$username"],"id={$loginsdata['id']}");
                }
                if($uid != $loginsdata['uid']){
                    User::updateAll(['uid' => "$uid"],"id={$loginsdata['id']}");
                }
                $loginsdata = $user->find()->where("id={$loginsdata['id']}")->asArray()->one();
            }
        }else{
            if($phone != $loginsdata['phone']){
                User::updateAll(['phone' => $phone],"id={$loginsdata['id']}");
            }
            if($email != $loginsdata['email']){
                User::updateAll(['email' => "$email"],"id={$loginsdata['id']}");
            }
            if($username != $loginsdata['userName']){
                User::updateAll(['userName' => "$username"],"id={$loginsdata['id']}");
            }
            $loginsdata = $user->find()->where("id={$loginsdata['id']}")->asArray()->one();
        }
        $session = Yii::$app->session;
        $session->set("userId",$loginsdata['id']);
        $session->set("userData",$loginsdata);
        $data = ['code'=>1,'message'=>'success','loginsdata'=>$loginsdata];
        die(json_encode($data));
    }

    /**
     * 个人中心
     * cy
     */
    public function actionPersonal(){
        $uid = Yii::$app->request->get("uid");
        $questionTotal = UserAnswer::find()->select("id")->asArray()->where("uid = $uid")->count();//做题总数
        if($questionTotal == 0){
            $correctRate = 0;
        }else{
            $correctNum = UserAnswer::find()->select("id")->asArray()->where("uid = $uid and correct = 1")->count();//正确总数
            $correctRate = ceil(($correctNum/$questionTotal)*100);//正确率
        }
        $user = User::find()->asArray()->where("uid = $uid")->one();
        $createTime = $user['createTime'];
        $days = ceil((time() - $createTime)/86400);
        $data = ['user'=>$user,'questionTotal'=>$questionTotal,'correctRate'=>$correctRate,'days'=>$days];
        die(json_encode($data));
    }
    /**
     *
     * 个人资料
     * cy
     */
    public function actionPersonalData(){
        $uid = Yii::$app->request->get("uid");
        $user = User::find()->where("uid = $uid")->asArray()->one();
        die(json_encode(['data'=>$user]));
    }
    /**
     * 修改用户密码
     * @Obelisk
     */

    public function actionChangeUserPass()
    {
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $model = new Login();

        $uid = Yii::$app->request->post("uid");
        $oldPassword = Yii::$app->request->post('oldPassword');

//        $userData = $model::find()->where("uid = $uid")->asArray()->one();

        $newPassword = Yii::$app->request->post('newPassword');

//        $sign = uc_user_edit($userData->userName,$oldPassword,$newPassword,'','');
        $sign = uc_user_edit_by_uid($uid,$oldPassword,$newPassword,'','');

        if ($sign == -1) {

            die(json_encode(['code' => 0, 'message' => '旧密码不正确']));

        } else {

            $model->updateAll(['userPass' => md5($newPassword)], "uid=$uid");

            $userData = $model::find()->where("uid = $uid")->asArray()->one();

            Yii::$app->session->set('userData', $userData);

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
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $model = new Login();


        $uid = Yii::$app->request->post("uid");

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

                $model->updateAll(['email' => $email], "uid=$uid");

                $userData = $model->findOne($uid);

                Yii::$app->session->set('userData', $userData);
                setcookie('loginData',json_encode($userData), time()+3600*24*30,'/');

                $res['code'] = 1;

                $res['message'] = '保存成功';
//                uc_user_edit($userData->userName,'','',$email,'',1);
                uc_user_edit_by_uid($uid,'','',$email,'',1);

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
     * 修改用户昵称
     * @Obelisk
     */

    public function actionChangeUserName()
    {

        $model = new Login();

        $uid = Yii::$app->request->post("uid");
        $nickname = Yii::$app->request->post('nickname', '');

        $sign = Login::find()->where("uid!=$uid AND nickname='$nickname'")->one();

        if ($sign) {

            die(json_encode(['code' => 0, 'message' => '昵称已经被使用']));

        }
        $userInfo = [];
        if ($nickname) {
            $userInfo['nickname'] = $nickname;
        }

        $result = $model->updateAll($userInfo, "uid=$uid");
        if($result){
            $res['code'] = 1;
            $res['message'] = '保存成功';
        }else{
            $res['code'] = 0;
            $res['message'] = '保存失败';
        }
        die(json_encode($res));
    }
    /**
     * 修改用户电话
     * @Obelisk
     */

    public function actionChangeUserPhone()
    {
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $model = new Login();

        $uid = Yii::$app->request->post("uid");

        $phoneCode = Yii::$app->request->post('phoneCode', '');

        $phone = Yii::$app->request->post('phone', '');

        if ($phone) {

            $signPhone = Login::find()->where("uid=$uid AND phone='$phone'")->one();

            if (!$signPhone) {

                $status = uc_user_checkphone($phone);
                if ($status == -7) {

                    die(json_encode(['code' => 0, 'message' => '该手机已被其他用户绑定']));

                }

                $checkTime = $model->checkTime();

                if ($checkTime) {

                    $checkCode = $model->checkCode($phone, $phoneCode);

                    if ($checkCode) {

                        $model->updateAll(['phone'=>$phone], "uid=$uid");

                        $res['code'] = 1;

                        $res['message'] = '保存成功';
                        uc_user_edit_by_uid($uid,'','','',$phone,1);

                    } else {

                        $res['code'] = 0;

                        $res['message'] = '验证码错误';

                    }

                } else {

                    $res['code'] = 0;

                    $res['message'] = '验证码过期';

                }

            } else {

                $model->updateAll(['phone'=>$phone], "uid=$uid");

                $res['code'] = 1;

                $res['message'] = '保存成功';

            }

        } else {

            $res['code'] = 0;

            $res['message'] = '您未输入电话号码';

        }
        die(json_encode($res));

    }
    /**
     * 雷豆接口
     * cy
     */
    public function actionLeidou(){
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
        $uid = Yii::$app->request->post("uid");
        $user = uc_user_integral1($uid);
        $user["income"] = uc_user_integral1($uid,""," and type = 1")['details'];
        $user["out"] = uc_user_integral1($uid,""," and type = 2")['details'];
        die(json_encode($user));
    }
    /**
     * 个人中心 做题记录
     * cy
     */
    public function actionMakeRecord(){
        $uid = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category",0);
        $sourceId = Yii::$app->request->get("source",0);
        $levelId = Yii::$app->request->get("level",0);
        $time = Yii::$app->request->get("time");
        $where = " ua.uid = $uid ";
        if($category){
            $where .= " and q.catId = {$category} ";
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($time=='day'){  //一天内
            $dayAgo = time()-(60*60*24);
            $where .= " and ua.createTime>$dayAgo";
        } elseif ($time=='week'){   //一周内
            $weekAgo = time()-(60*60*24*7);
            $where .= " and ua.createTime>$weekAgo";
        } elseif ($time=='month'){   //一月内
            $monthAgo = time()-(60*60*24*30);
            $where .= " and ua.createTime>$monthAgo";
        } elseif($time=='month1'){   //三月内
            $month1Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime>$month1Ago";
        } elseif($time=='month2') {  //超过三月
            $month2Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime<$month2Ago";
        }
        $usermodel = new User();
        $data = $usermodel->getDoneQuestionsRecord($where,1,100,'','ORDER BY ua.createTime desc');//数据
        foreach($data['data'] as $k=>$v){
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
        }
        $sources = QuestionSource::find()->asArray()->all();
        $cats = QuestionCat::find()->asArray()->all();
        $levels = QuestionLevel::find()->asArray()->all();
        $return = ['data'=>$data['data'],'categorys'=>$cats,'sources'=>$sources,'levels'=>$levels,'catId'=>$category,'sourceId'=>$sourceId,'levelId'=>$levelId,'time'=>$time];
        die(json_encode($return));
    }
    /**
     * 个人中心 收藏题目
     * cy
     */
    public function actionCollecteRecord(){
        $uid = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category",0);
        $sourceId = Yii::$app->request->get("source",0);
        $levelId = Yii::$app->request->get("level",0);
        $time = Yii::$app->request->get("time");
        $where = " qc.uid = $uid ";
        if($category){
            $where .= " and q.catId = {$category} ";
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($time=='day'){  //一天内
            $dayAgo = time()-(60*60*24);
            $where .= " and qc.createTime>$dayAgo";
        } elseif ($time=='week'){   //一周内
            $weekAgo = time()-(60*60*24*7);
            $where .= " and qc.createTime>$weekAgo";
        } elseif ($time=='month'){   //一月内
            $monthAgo = time()-(60*60*24*30);
            $where .= " and qc.createTime>$monthAgo";
        } elseif($time=='month1'){   //三月内
            $month1Ago = time()-(60*60*24*90);
            $where .= " and qc.createTime>$month1Ago";
        } elseif($time=='month2') {  //超过三月
            $month2Ago = time()-(60*60*24*90);
            $where .= " and qc.createTime<$month2Ago";
        }
        $user = new User();
        $data = $user->getUserQuestionCollection($where,1,100);
        foreach($data['data'] as $k=>$v){
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
            $result = UserAnswer::find()->where("uid = $uid and questionId = {$v['id']}")->asArray()->one();
            if(empty($result)){
                $data['data'][$k]['user_answer'] = '';
            }else{
                $data['data'][$k]['user_answer'] = $result['answer'];
            }
        }
        $sources = QuestionSource::find()->asArray()->all();
        $cats = QuestionCat::find()->asArray()->all();
        $levels = QuestionLevel::find()->asArray()->all();
        $return = ['data'=>$data["data"],'categorys'=>$cats,'sources'=>$sources,'levels'=>$levels,'catId'=>$category,'sourceId'=>$sourceId,'levelId'=>$levelId,'time'=>$time];
        die(json_encode($return));
    }

    /**
     * 个人中心 错题记录
     * cy
     */
    public function actionErrorRecord(){
        $uid = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category",0);
        $sourceId = Yii::$app->request->get("source",0);
        $levelId = Yii::$app->request->get("level",0);
        $time = Yii::$app->request->get("time");
        $where = " ua.uid = $uid ";
        if($category){
            $where .= " and q.catId = {$category} ";
        }
        if($sourceId){
            $where .= " and q.sourceId={$sourceId}";
        }
        if($levelId){
            $where .= " and q.levelId={$levelId}";
        }
        if($time=='day'){  //一天内
            $dayAgo = time()-(60*60*24);
            $where .= " and ua.createTime>$dayAgo";
        } elseif ($time=='week'){   //一周内
            $weekAgo = time()-(60*60*24*7);
            $where .= " and ua.createTime>$weekAgo";
        } elseif ($time=='month'){   //一月内
            $monthAgo = time()-(60*60*24*30);
            $where .= " and ua.createTime>$monthAgo";
        } elseif($time=='month1'){   //三月内
            $month1Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime>$month1Ago";
        } elseif($time=='month2') {  //超过三月
            $month2Ago = time()-(60*60*24*90);
            $where .= " and ua.createTime<$month2Ago";
        }
        $usermodel = new User();
        $data = $usermodel->getDoneQuestionsRecord($where,1,100,'2','ORDER BY ua.createTime desc');//数据
        foreach($data['data'] as $k=>$v){
            $qmodel = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source'] = $qmodel->getSource($v['sourceId']);
        }
        $sources = QuestionSource::find()->asArray()->all();
        $cats = QuestionCat::find()->asArray()->all();
        $levels = QuestionLevel::find()->asArray()->all();
        $return = ['data'=>$data['data'],'categorys'=>$cats,'sources'=>$sources,'levels'=>$levels,'catId'=>$category,'sourceId'=>$sourceId,'levelId'=>$levelId,'time'=>$time];
        die(json_encode($return));
    }

    /**
     * GRE首页接口
     */
    public function actionIndex(){
        $content = new Content();
        //轮播图内容
        $carousel = $content->getClass(['fields'=>'url','category'=>551]);
        //直播课程内容
        $activity = $content->getClass(['where' => 'c.pid=0', 'fields' => 'alternatives,commencement,trainer', 'category' => '482','order'=>' c.sort asc,c.id DESC', 'page' => 1, 'pageSize' => 4]);
        //GRE备考
        $oneweek = $content->getClass(['where' => 'c.pid=0 and hot=2','fields' => 'answer,alternatives','category' => '537','order'=>'alternatives DESC','page'=>1,'pageSize' => 4]);//一周热门
        $words = $content->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '538','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//词汇
        $read = $content->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '540','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//阅读
        $blank = $content->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '539','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//填空
        $math = $content->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '541','page'=>1,'pageSize' => 7,'order'=>'alternatives DESC']);//数学
        $write = $content->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '542','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//写作
        //老师
        $teachers = Teacher::find()->asArray()->all();
        foreach($teachers as $k => $v){
            $teachers[$k]['label'] = explode(',',$v['label']);
            $course = $v['course'];
            $course = explode("\r",$course);
            foreach($course as $kk=>$vv){
                $arr = explode(',',$vv);
                if(count($arr) == 2){
                    $course[$kk] = $arr;
                }else{
                    $course[$kk] = array('','');
                }
            }
            $teachers[$k]['course'] = $course;
        }
        $contents = ['carousel'=>$carousel,'activity'=>$activity,'oneweek'=>$oneweek,'words'=>$words,'read'=>$read,'blank'=>$blank,'math'=>$math,'write'=>$write,'teachers'=>$teachers];
        die(json_encode($contents));
    }

    /**
     * GRE咨询首页接口
     * by cy
     */
    public function actionConsult(){
        $model = new Content();
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',10);
        //咨询轮播图
        $carousel = $model->getClass(['where' => 'c.pid=0','fields' => 'url','category' => '555','page'=>1,'pageSize' => 5]);
        //内容
        $data = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','page'=>$page,'pageSize' => $pageSize,'pageStr'=>$page]);
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
        }
        $contents = ['carousel'=>$carousel,'data'=>$data,'page'=>$page];
        die(json_encode($contents));
    }
    /**
     * GRE咨询详情接口
     * cy
     */
    public function actionConsultDetail(){
        $contentid = Yii::$app->request->get('contentid');
        $page = Yii::$app->request->get('page',1);
        $content = new Content();
        $data = $content->getClass(['fields' => 'answer,alternatives,description','where' =>"c.id=$contentid"]);
        $comment = new UserComment();
        $usercomment = $comment->getUserComment($contentid,$page,50);
        $data[0]['description'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data[0]['description']);
        $contents = ['data'=>$data,'userComment'=>$usercomment];
        die(json_encode($contents));
    }
    /**
     * GRE备考首页接口
     * cy
     */
    public function actionBeikao(){
        $model = new Content();
        //备考轮播图
        $carousel = $model->getClass(['fields'=>'url','category'=>554]);
        //GRE备考
        $oneweek = $model->getClass(['where' => 'c.pid=0 and hot=2','fields' => 'answer,alternatives','category' => '537','order'=>'alternatives DESC','page'=>1,'pageSize' => 4]);//一周热门
        $words = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '538','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//词汇
        $read = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '540','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//阅读
        $blank = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '539','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//填空
        $math = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '541','page'=>1,'pageSize' => 7,'order'=>'alternatives DESC']);//数学
        $write = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '542','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);//写作
        $contents = ['carousel'=>$carousel,'oneweek'=>$oneweek,'words'=>$words,'read'=>$read,'blank'=>$blank,'math'=>$math,'write'=>$write];
        die(json_encode($contents));

    }
    /**
     * 文章详情页接口(GRE备考)
     * by cy
     */
    public function actionArticleDetail(){
        $contentid = Yii::$app->request->get('contentid');
        $uid = Yii::$app->request->get("uid");
        $page = Yii::$app->request->get('page',1);
//        $catid = Yii::$app->request->post('catid');
//        $class = Category::find()->asArray()->where("id = ".$catid)->one();//分类信息
        $model = new Content();
        $data = $model->getClass(['fields' => 'answer,alternatives,description','where' =>"c.id=$contentid"]);
        $comment = new UserComment();
        $userComment = $comment->getUserComment($contentid,$page,50);//文章评论
        foreach($userComment['data'] as $key => $value){
            $reply= Yii::$app->db->createCommand("select uc.*,u.userName,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid=".$value['id'])->queryAll();//单条评论的回复信息
            $userComment['data'][$key]['reply'] = $reply;
            $userComment['data'][$key]['countreply'] = count($reply);
        }
        $hotarticle = $model->getClass(['where' => 'c.pid=0 and hot=2','fields' => 'answer,alternatives','category' => '537','page'=>1,'pageSize' => 4]);//热门文章
        $data[0]['description'] =  str_replace('src="/','src="https://gre.viplgw.cn/',$data[0]['description']);
        $data[0]['description'] = strip_tags($data[0]['description'],'<img>,<p></p>');
        foreach($userComment['data'] as $k => $v){//评论点赞
            $fine = $v['fane'];
            if(is_null($fine)){
                $fine = rand(5,25);
                UserComment::updateAll(['fane'=>$fine],"id = {$v['id']}");
                $userComment['data'][$k]['fine'] = $fine;
            }
        }
        foreach($data as $kk => $vv){
            $fine = $vv["fabulous"];
            if(is_null($fine)){
                $fine = 0;
            }
            $cfine = UserComment::find()->select("fane")->where("contentId = $contentid")->asArray()->all();
            if(empty($cfine)){
                $sumfine = 0;
            }else{
                foreach($cfine as $key=>$u){
                    $finearr[]=$u['fane'];
                }
                $sumfine = array_sum($finearr);
            }
            $all = $fine+$sumfine;
            $data[$kk]['fine'] = $all;
        }
        //是否收藏文章
        if($uid){
            $res = ContentCollecte::find()->where("uid = $uid and contentId = $contentid" )->one();
            if($res){
                $collecte = 1;
            }else{
                $collecte = 0;
            }
        }else{
            $collecte = 0;
        }
        $contents = ['data'=>$data,'userComment'=>$userComment,'hotarticle'=>$hotarticle,'collecte'=>$collecte];
        die(json_encode($contents));
    }
    /**
     * 文章篇评论
     * cy
     */
    public function actionArticleComment(){
        $uid = Yii::$app->request->post('uid');
        $contentId = Yii::$app->request->post('contentId');
        $content = Yii::$app->request->post('content');
        if(!$uid){
            die(json_encode(['code' => 0,'message'=>'请登录']));
        }
        if($content && $contentId){
            $model = new UserComment();
            $model->contentId = $contentId;
            $model->uid = $uid;
            $model->content = $content;
            $model->type = 1;
            $model->createTime = time();
            $r = $model->save();
            if($r>0){
                $res = ['code' => 1,'message'=>'评论成功','id'=>$model->primaryKey];
            } else {
                $res = ['code' => 0,'message'=>'评论失败'];
            }
        }else{
            $res = ['code' => 0,'message'=>'评论不能为空'];
        }
        die(json_encode($res));
    }
    /**
     * 备考文章点赞
     * cy  type=> 1-文章点赞 2-评论点赞
     */
    public function actionAddFine(){
        $contentId = Yii::$app->request->post("contentId");
        $type = Yii::$app->request->post("type");
        $commentId = Yii::$app->request->post("commentId");
        $oldfine = Yii::$app->request->post("fine");
        $content = new Content();
        $conte = $content::find()->where("id = $contentId")->one();
        if($type == 1){
            $fine = $conte['fabulous'];
            if(is_null($fine)){
                $fine = 1;
            }else{
                $fine += 1;
            }
            $res = $content::updateAll(['fabulous'=>$fine],"id=$contentId");
        }else{
            $comment = new UserComment();
            $fine = $oldfine + 1;
            $res = $comment::updateAll(['fane'=>$fine],"id = $commentId and contentId = $contentId");
        }
        if($res){
            $fines = UserComment::find()->select("fane")->where("contentId = $contentId")->asArray()->all();
            if(empty($fines)){
                $all = 0;
            }else{
                foreach($fines as $f=>$t){
                    $finearr[]=$t['fane'];
                }
                $all = array_sum($finearr);
            }
            $allfine = $all + $conte->fabulous;
            if($type == 1){
                $data = ['code'=>1,'message'=>'success','fine'=>$allfine];
            }else{
                $data = ['code'=>1,'message'=>'success','fine'=>$fine,'allfine'=>$allfine];
            }
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }
    /**
     * 文章收藏
     * cy
     */
    public function actionContentCollection(){
        $uid = Yii::$app->request->post("uid");
        $contentId = Yii::$app->request->post("contentId");
        $collecte = Yii::$app->request->post("collecte");
        $createTime = date('Y-m-d H:i:s',time());
        $collection = new ContentCollecte();
        if($collecte == 1){//收藏
            $collection->uid = $uid;
            $collection->contentId = $contentId;
            $collection->createTime = $createTime;
            $res = $collection->save();
        }else{//取消收藏
            $res = $collection::deleteAll("uid = $uid and contentId = $contentId");
        }
        if($res){
            $data = ['code'=>1,'message'=>'success'];
        }else{
            $data = ['code'=>0,'message'=>'fail'];
        }
        die(json_encode($data));
    }

    /**
     * GRE活动首页接口
     * cy
     */
    public function actionActivity(){
    $data = file_get_contents("https://open.viplgw.cn/cn/api/gre-class");
    $data = json_decode($data,true);
    foreach($data['all']['data'] as $key => $value){
        $surplus = ceil((strtotime($value['commencement'])-time())/86400);
        if($surplus > 0){
            $str = '进行中';
        }else{
            $str = '已结束';
            $surplus = 0;
        }
        $data['all']['data'][$key]['status'] = $str;
        $data['all']['data'][$key]['days'] = $surplus;
    }
    $model = new Content();
    $carousel = $model->getClass(['category'=>564,'fields'=>'url']);//广告图
    $contents = ['carousel'=>$carousel,'data'=>$data];
    die(json_encode($contents));
    }
    /**
     * GRE活动记录详情接口
     * cy
     */
    public function actionActivityDetail(){
        $contentid = Yii::$app->request->get('contentid');
        $data = Method::post("https://open.viplgw.cn/cn/api/gre-detail",['id' => $contentid]);
        $data = json_decode($data,true);
        if(isset($data['code'])){
            die('<script>alert("商品缺少详情");history.go(-1);</script>');
        }
        $endTime = strtotime($data['parent']['commencement']);
        if ($endTime < time()) {
            $surplusTime = '已结束';
        } else {
            $surplusTime = $endTime - time();
//            $modelM = new Method();
//            $surplusTime = $modelM->gmstrftimeB($surplusTime);//转换成时间
        }
        $data['parent']['commencement'] = $surplusTime;
        $pid = $data['data']['pid'];
        $url = "https://open.viplgw.cn/";
        $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
        $content = preg_replace($pregRule, '<img src="'.$url.'${1}" style="max-width:100%">', $data['parent']['sentenceNumber']);
        $data['parent']['sentenceNumber'] = $content;
        $contents = ['id'=>$contentid,'pid'=>$pid,'data'=>$data, 'parent' => $data['parent'],'category'=>$data['category']];
        die(json_encode($contents));
    }

    /**
     * GRE课程首页接口
     * cy
     */
    public function actionCourse(){
        $model = new Content();
        //近期开班
        $kaiban = $model->getClass(['where' => 'c.pid!=0','fields' => 'answer,alternatives','category' => '566','page'=>1,'order'=>' c.id DESC','pageSize' => 20]);
        //短期提分课程
        $shortcourse = $model->getClass(['where' => 'c.pid=0','category' => '482','page'=>1,'order'=>' c.sort asc,c.id DESC','pageSize' => 20]);
        //短期提分名师内容
        $shortteacher1 = $model->getClass(['where' => 'c.pid=0','category' => '530','page'=>1,'pageSize' => 4]);//信息照片信息
        $shortteacher2  = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives,article,url','category' => '530','page'=>1,'pageSize' => 4]);//详细信息
        //短期提分学院案例
        $shortstudent = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives,article,listeningFile,cnName,numbering','category' => '531','page'=>1,'pageSize' => 6]);
        $contents = ['beikao'=>$kaiban,'shortcourse'=>$shortcourse,'shortteacher1'=>$shortteacher1,'shortteacher2'=>$shortteacher2,'shortstudent'=>$shortstudent];
        die(json_encode($contents));
    }

    /**
     * GRE课程详情接口
     * cy
     */
    public function actionCourseDetail(){
        $contentid = Yii::$app->request->get("contentid");
        $type = Yii::$app->request->get('type');
        if(!$type) $type = 1; //1-课程介绍 2-授课名师 3-学习资料 4-用户评价 默认为1
        $model = new Content();
        $sign = $model->findOne($contentid);
        if($sign->pid == 0){
            $data = Content::find()->where("pid = $contentid")->one();
            if($data){
                $this->redirect("https://gre.viplgw.cn/cn/wap-api/course-detail?contentid={$data['id']}");
            }else{
                die('<script>alert("商品缺少详情");history.go(-1);</script>');
            }
        }else{
            $data =  $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance，alternatives,article','where' =>"c.id=$contentid",'pageSize' => 1]);
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($contentid);
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$sign->pid");
            $endTime = strtotime($data[0]['article']);
            if($endTime < time()){
                $surplusTime = '已结束';
            } else {
                $surplusTime = $endTime-time();
            }
//            $modelM = new Method();
//            $surplusTime = $modelM->gmstrftimeB($surplusTime);
            $data[0]['article'] = $surplusTime;
            $pid = $sign->pid;
            $modelu = new UserComment();
            $comment = $modelu->getUserComment($contentid,1,5);
        }
        $parent[0]['description'] = str_replace('src="/','src="https://gre.viplgw.cn/',$parent[0]['description']);
        $contents = ['id'=>$contentid,'pid'=>$pid,'count'=>$count,'tag'=>$tag,'data'=>$data[0],'parent'=>$parent[0],'comment'=>$comment,'type'=>$type];
        die(json_encode($contents));
    }

    /**
     * 搜题接口 分类搜索
     * cy
     */
    public function actionSearchType(){
        $request = Yii::$app->request;
        $uid = $request->get("uid");
        $category = $request->get("category",0);//分类
        $source = $request->get("source",0);
        $level = $request->get("level",0);
        $dotype = $request->get("dotype",1);//1-全部 2-做过 3-正确 4-错误
        $where = " 1= 1 ";
        if($dotype == 1){
            $str = "x2_questions";
        } else{
            $str = "q";
        }
        if($category){
            $where .= " and {$str}.catId = {$category}";
        }
        if($source){
            $where .= " and {$str}.sourceId = {$source}";
        }
        if($level){
            $where .= " and {$str}.levelId = $level";
        }
        if($dotype == 1){
            $data = Questions::find()->limit(100)->where($where)->asArray()->all();
        }else{
            $where .=" and ua.uid = {$uid}";
            if($dotype == 3){
                $where .= " and ua.correct = 1";
            }elseif($dotype == 4){
                $where .= " and ua.correct = 2";
            }
            $model = new User();
            $data = $model->getDoneQuestionsRecord($where,1,30,'',' order by ua.createTime desc');
            $data = $data['data'];
        }
        foreach($data as $k => $v){
            $qmodel = new Questions();
            $data[$k]['section'] = $qmodel->getSection($v['catId']);
            $data[$k]['source'] = $qmodel->getSource($v['sourceId']);
        }
        if($category == 0){
            $sources = QuestionSource::find()->asArray()->all();
        }else{
            $sql = "select qs.* from x2_source_cat sc left join x2_question_source qs on sc.sourceId = qs.id  where catId = $category";
            $sources = Yii::$app->db->createCommand($sql)->queryAll();
        }
        $cats = QuestionCat::find()->asArray()->all();
        $levels = QuestionLevel::find()->asArray()->all();
        $return = ['data'=>$data,'categorys'=>$cats,'sources'=>$sources,'levels'=>$levels,'catId'=>$category,'sourceId'=>$source,'levelId'=>$level];
        die(json_encode($return));
    }

    /**
     * 搜题 -题目
     * cy
     */
    public function actionSearchTitle(){
        $title = Yii::$app->request->get("title");
        $data = Questions::find()->where("stem like '%{$title}%'")->limit(30)->asArray()->all();
        foreach($data as $k => $v){
            $question = new Questions();
            $data[$k]['section'] = $question->getSection($v['catId']);
            $data[$k]['source'] = $question->getSource($v['sourceId']);
        }
        die(json_encode($data));
    }
    /**
     * 题目详情
     * cy  type =》进入来源 1-搜题页面 2-收藏页面 3-做题记录页面 4-错题记录页面
     */
    public function actionQuestionDetail(){
        $request = Yii::$app->request;
        $uid = $request->get("uid");
        $questionId = $request->get("questionId");
        $type = $request->get("type",1);
        $where = " uid = $uid and questionId = $questionId";
        $question = new Questions();
        $user = new User();
        if(!$uid && $type == 1 ){//搜题页面进入
            $data = $question::find()->where("id = $questionId")->asArray()->one();
        }else{
            $result = UserAnswer::find()->where($where)->one();//是否已做过该题
            if($result){
                $data = $user->getQuestionDetail($uid,$questionId);

            }else{
                $data = $question::find()->where("id = $questionId")->asArray()->one();
            }
        }
        if($uid){
            //shoucang
            $sql ="select * from x2_question_collection where uid = $uid and questionId = $questionId";
            $res = Yii::$app->db->createCommand($sql)->queryOne();
        }
        //分割选项
        if($data['optionA'])
            $data['optionsA'] = Method::getTextHtmlArr($data['optionA']);
        if($data['optionB'])
            $data['optionsB'] = Method::getTextHtmlArr($data['optionB']);
        if($data['optionC'])
            $data['optionsC'] = Method::getTextHtmlArr($data['optionC']);
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        $typeId = $data['typeId'];
        if($typeId == 7){
            $articles = explode('.',$data['readArticle']);
            foreach($articles as $k =>$v){
                $articles[$k] = $v.'.';
            }
            $data['articles']= $articles;
        }
        if($data['details']){
            $data['details'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data['details']);
        }
        if($data['readArticle']){
            $data['readArticle'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data['readArticle']);
        }
        if($data['quantityA']){
            $data['quantityA'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data['quantityA']);
        }
        if($data['quantityB']){
            $data['quantityB'] = str_replace('src="/','src="https://gre.viplgw.cn/',$data['quantityB']);
        }
        $data['collect'] = (isset($res) && $res)?1:0;
        $data['section'] = $question->getSection($data['catId']);
        $data['source'] = $question->getSource($data['sourceId']);
        $analysis = UserAnalysis::find()->where("questionId = $questionId")->asArray()->all();
        $data["analysis"] = $analysis;
        die(json_encode($data));
    }
    /*
     * GRE做题（首页）
     * cy
     */
    public function actionMake(){
        $uid = Yii::$app->request->get("uid");
        $sectionId = Yii::$app->request->get('sectionId',1);    //单项ID
        $type = Yii::$app->request->get("type",0);//0-题目单项 1-填空、阅读、数学考点
        if($type == 0){
            $sections = QuestionCat::find()->asArray()->all();  //单项分类
            $sourceModel = new SourceCat();
            $comes =  $sourceModel->getSource($sectionId);  //来源
            $tpe = 1;
            $field = 'sourceId';
        }else{
            $comes = QuestionKnow::find()->asArray()->where("catId=$sectionId")->all();//知识点
            $tpe = 2;
            $field = "knowId";
            $sections = '';
        }
        foreach($comes as $key => $value){
            $sid = $value['id'];
            $questions = QuestionLibrary::find()->asArray()->where("catId = $sectionId and type = $tpe and $field = $sid")->all();//题库信息
            $totalNum = 0;
            $totalDoNum = 0;
            foreach($questions as $k => $v){
                $total = LibraryQuestion::find()->select("id")->asArray()->where("libId = {$v['id']}")->count();//每个题库的题数
                if($uid){
                    $data = QuestionsStatistics::find()->asArray()->where("libraryId= {$v['id']}  and uid = $uid")->one();
                    if(!is_null($data['doNum'])) $totalDo = $data['doNum'];else $totalDo = 0;
                }else{
                    $totalDo = 0;
                }
                $totalNum += $total;
                $totalDoNum += $totalDo;
            }
            $comes[$key]['totalNum'] = $totalNum;
            $comes[$key]['totalDoNum'] = $totalDoNum;
            if($totalNum == 0){
                unset($comes[$key]);//去除没有题的题库来源
            }
        }
        $data = ['sections'=>$sections,'comes'=>$comes,'sectionId'=>$sectionId];
        die(json_encode($data));
    }
    /**
     * GRE 做题（来源页）
     * cy
     */
    public function actionMakeSource(){
        $uid = Yii::$app->request->get("uid");
        $sectionId = Yii::$app->request->get("sectionId",1);//1-填空 2-阅读 3-数学
        $sourceId = Yii::$app->request->get("sourceId",1);//来源id 题目单项进入
        $knowId = Yii::$app->request->get("knowId",0);//知识考点id 考点进入
        if($sourceId > 0){//题库信息
            $questions = QuestionLibrary::find()->where("catId = $sectionId and type = 1 and sourceId = $sourceId")->asArray()->all();
        }else{
            $questions = QuestionLibrary::find()->where("catId = $sectionId and type = 2 and knowId = $knowId")->asArray()->all();
        }
        $tikudoNum = 0;
        $averageTime = 0;
        $correctRate = 0;

        foreach($questions as $key => $value){
            $amodel = new UserAnswer();
            $totalNum = LibraryQuestion::find()->select("id")->asArray()->where("libId= {$value['id']}")->count();//题库题数
            if($uid){
                $result= $amodel->getUserCompleteState($value['id'],$uid);  //获取当前用户题库做题情况
                if($result){
                    $rate = $result['correctRate'];
                    $time = Method::secToTime($result['totalTime']);
                }else{
                    $rate = 0;
                    $time = 0;
                }
                $data = QuestionsStatistics::find()->where("uid = $uid and libraryId = {$value['id']}")->one();
                if(!is_null($data['doNum'])) $doNum = $data['doNum'];else $doNum = 0;
                if(!is_null($data['state'])) $state = $data['state'];else $state = 0;//state 题库完成情况 1-已完成 0-未完成
            }else{
                $doNum = 0;
                $state = 0;
                $rate = 0;
                $time = 0;
            }
            $do_questions = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$value['id']} and state=1")->groupBy("uid")->count();   //完成人数
            $tikudoNum += $do_questions;//题库完成人数
            $questions[$key]['totalNum'] = $totalNum;
            $questions[$key]['doNum'] = $doNum;//用户单个题库的完成数量
            $questions[$key]['state'] = $state;
            $questions[$key]['correctRate'] = $rate?$rate:0;
            $questions[$key]['averageTime'] = $time?$time:0;
            $time = $amodel->getLibraryAverageTime($value['id'],$uid);
            $averageTime = $averageTime+$time;
            $correct = $amodel->getLibraryCorrectRate($value['id']);   //题库正确率
            $correctRate = $correctRate+$correct;

        }
        if($questions){
            $correctRate = round($correctRate/count($questions));
            if(!$uid){
                $averageTime = round($averageTime/count($questions));
            }
        }
        if(!$averageTime){$averageTime =0;}else{$averageTime = Method::secToTime($averageTime);}
        $data = ['doOver'=>$tikudoNum,'correctRate'=>$correctRate,'time'=>$averageTime,'questions'=>$questions];
        die(json_encode($data));
    }
    /**
     * GRE 做题
     * 进入题库（题目页）获取题目信息
     * cy
     */
    public function actionGoMake(){
        $uid = Yii::$app->request->get("uid");
        $libraryId = Yii::$app->request->get("libraryId");
        $isDone = UserAnswer::find()->asArray()->where("uid = $uid and libId = $libraryId")->all();//用户已经做过的题
        $count = count($isDone);
        $where = " libId = $libraryId ";
        if($count == 1){
            $where .= " and questionId != {$isDone[0]['questionId']}";
        }
        if($count > 1){
            $ids = '';
            foreach($isDone as $k => $v){
                $questionId = $v['questionId'];
                $ids .=','.$questionId;
            }
            $ids = trim($ids,',');
            $where .= " and questionId not in ({$ids})";
        }
        $totalcount = LibraryQuestion::find()->select("id")->where("libId = $libraryId")->count();
        if($count >= $totalcount){
            $data = ['code'=>0,'message'=>'您已做完该题库的题'];
        }else{
            $dataId = LibraryQuestion::find()->asArray()->where($where)->one();
            $currentSite = $count+1;
            $question = Questions::find()->where("id = {$dataId['questionId']}")->asArray()->one();
            if($question['optionA'])
                $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
            if($question['optionB'])
                $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
            if($question['optionC'])
                $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
            if($question['typeId'] == 7){//句子点选
                $articles = explode('.',strip_tags($question['readArticle']));
                foreach($articles as $kk => $vv) {
                    $articles[$kk] = $vv.'.';
                }
                $question['readStems'] = $articles;
            }
            if($question['details']){
                $question['details'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['details']);
            }
            if($question['readArticle']){
                $question['readArticle'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['readArticle']);
            }
            if($question['quantityA']){
                $question['quantityA'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['quantityA']);
            }
            if($question['quantityB']){
                $question['quantityB'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['quantityB']);
            }
            $result =UserCollection::find()->where("uid = $uid and questionId = {$dataId['questionId']}")->one();
            $question['collect'] = $result?1:0;
            $analysis = UserAnalysis::find()->where("questionId = {$dataId['questionId']}")->asArray()->all();
            $question['analysis'] = $analysis;
            $data = ['code'=>1,'question'=>$question,'currentSite'=>$currentSite,'totalCount'=>$totalcount];
        }
        die(json_encode($data));
    }
    /**
     * GRE 做题（题目页）提交答案
     * cy
     */
     public function actionMakeTopic(){
         $request = Yii::$app->request;
         $uid = $request->post("uid");
         $questionId = $request->post("questionId");
         $libraryId = $request->post("libraryId");
         $answer = $request->post("answer");
         $useTime = $request->post("useTime");
         //验证答案正确否
         $result = Questions::find()->where("id = $questionId and answer = '{$answer}'")->one();
         $correct = $result?1:0;
         $isDone = UserAnswer::find()->where("uid = $uid and questionId = $questionId and libId = $libraryId and answerType =1")->one();
         if(empty($isDone)){
             $model = new UserAnswer();
             $model->uid = $uid;
             $model->questionId = $questionId;
             $model->libId = $libraryId;
             $model->useTime = $useTime;
             $model->correct = $correct;
             $model->answer = $answer;
             $model->answerType = 1;
             $model->createTime = time();
             $res = $model->save();
         }else{
             $isDone->useTime = $useTime;
             $isDone->correct = $correct;
             $isDone->answer = $answer;
             $isDone->createTime = time();
             $res = $isDone->save();
         }
         if($res){
             $totalNum = LibraryQuestion::find()->select("id")->where("libId = $libraryId")->count();
             $doNum = UserAnswer::find()->select("id")->where("uid = $uid and libId = $libraryId")->count();
             $correctNum = UserAnswer::find()->select("id")->where("uid = $uid and libId = $libraryId and correct = 1")->count();
             $result = QuestionsStatistics::find()->where("uid = $uid and libraryId = $libraryId")->one();
             if($result){
                 $result->doNum = $doNum;
                 $result->totalTime = $useTime + $result->totalTime;
                 if($doNum == $totalNum){//做完
                     $result->endTime = time();
                     $result->state = 1;
                     $result->correctRate = ceil(100*($correctNum/$doNum));
                 }
                 $result->save();
             }else{
                 $statistic = new QuestionsStatistics();
                 $statistic->uid = $uid;
                 $statistic->libraryId = $libraryId;
                 $statistic->doNum = $doNum;
                 $statistic->totalNum = $totalNum;
                 $statistic->totalTime = $useTime;
                 $statistic->startTime = time();
                 if($doNum == $totalNum){//做完
                     $statistic->endTime = time();
                     $statistic->state = 1;
                     $statistic->correctRate = ceil(100*($correctNum/$doNum));
                 }else{
                     $statistic->state = 0;
                     $statistic->correctRate = 0;
                 }
                 $statistic->save();
             }
             SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
             $data = ['code'=>1,'message'=>'success','url'=>"/cn/wap-api/go-make?uid={$uid}&libraryId=$libraryId"];
         }else{
             $data = ['code'=>0,'message'=>'fail'];
         }
        die(json_encode($data));
     }
     /**
      * GRE 做题结果页
      * cy
      */
     public function actionMakeResult(){
         $uid = Yii::$app->request->get("uid");
         $libraryId = Yii::$app->request->get("libraryId");
         $questions = LibraryQuestion::find()->where("libId = $libraryId")->asArray()->all();
         $site = 1;
         $useTime = 0;
         $doNum = 0;
         $doCorrect = 0;
         foreach($questions as $k => $v){
            $questions[$k]['site'] = $site;
            $result = UserAnswer::find()->where("uid = $uid and libId = $libraryId and questionId = {$v['questionId']}")->asArray()->one();
            if($result){
                $questions[$k]['isDo'] = 1;
                $doNum += 1;
                $useTime += $result['useTime'];
                $answer = $result['answer'];
                $is_correct = Questions::find()->where("id = {$result['questionId']} and answer = '{$answer}'")->one();
                $correct = $is_correct?1:0;
                $questions[$k]['correct'] = $correct;
                $doCorrect += $correct;
            }else{
                $questions[$k]['isDo'] = 0;
            }
            $site += 1;
         }
         $totalCount = count($questions);
         if($useTime == 0){
             $averageTime = 0;
         }else{
             $averageTime = ceil($useTime/$totalCount);
         }
         if($doCorrect == 0){
             $correctRate = 0;
         }else{
             $correctRate = ceil(($doCorrect/$totalCount)*100);
         }
         //题库
         $name = QuestionLibrary::find()->where("id = $libraryId")->asArray()->one()['name'];
         $data = ['questions'=>$questions,'doCorrect'=>$doCorrect,'totalCount'=>$totalCount,'doNum'=>$doNum,'corretRate'=>$correctRate,'totalTime'=>$useTime,'averageTime'=>$averageTime,'name'=>$name,'uid'=>$uid,'libraryId'=>$libraryId];
         die(json_encode($data));
     }
     /**
      *GRE 做题 重新做题
      * cy
      */
     public function actionDoAgain(){
         $uid = Yii::$app->request->post("uid");
         $libraryId = Yii::$app->request->post("libraryId");
         UserAnswer::deleteAll("uid = $uid and libId = $libraryId");
         QuestionsStatistics::updateAll(['doNum'=>0,'state'=>0],"uid = $uid and libraryId = $libraryId");
         SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
         $data= ['code'=>1,'message'=>'success','url'=>"/cn/wap-api/go-make?uid={$uid}&libraryId=$libraryId"];
         die(json_encode($data));
     }
     /**
      * GRE 做题 模考详情页
      * cy
      */
     public function actionMokaiDetail(){
         $uid = Yii::$app->request->get("uid");
         $libraryId = Yii::$app->request->get("libraryId");
         $questionId = Yii::$app->request->get("questionId");
         $question = Questions::find()->where("id = $questionId")->asArray()->one();
         $user_answer = UserAnswer::find()->where("uid = $uid and questionId = $questionId and libId = $libraryId")->asArray()->one();
         if(!empty($user_answer)){
             $question['user_do'] = 1;
             $question['user_answer'] = $user_answer['answer'];
             $question['user_answer_correct'] = $user_answer['correct'];
         }else{
             $question['user_do'] = 0;
         }
         $analysis = UserAnalysis::find()->where("questionId = $questionId")->asArray()->all();
         $question['analysis'] = $analysis;
         if($question['optionA'])
             $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
         if($question['optionB'])
             $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
         if($question['optionC'])
             $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
         if($question['typeId'] == 7){//句子点选
             $articles = explode('.',strip_tags($question['readArticle']));
             foreach($articles as $kk => $vv){
                 $articles[$kk] = $vv.'.';
             }
             $question['articles'] = $articles;
         }
         if($question['details']){
             $question['details'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['details']);
         }
         if($question['readArticle']){
             $question['readArticle'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['readArticle']);
         }
         if($question['quantityA']){
             $question['quantityA'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['quantityA']);
         }
         if($question['quantityB']){
             $question['quantityB'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['quantityB']);
         }
         $result =UserCollection::find()->where("uid = $uid and questionId = $questionId")->one();
         $question['collect'] = $result?1:0;
         $questions = LibraryQuestion::find()->where("libId = $libraryId")->asArray()->all();
         $site = 1;
         foreach($questions as $k => $v){
             if($v['questionId'] == $questionId) $currentSite = $site;
             $questions[$k]['site'] = $site;
             $result = UserAnswer::find()->where("uid = $uid and libId = $libraryId and questionId = {$v['questionId']}")->asArray()->one();
             if($result){
                 $questions[$k]['isDo'] = 1;
                 $answer = $result['answer'];
                 $is_correct = Questions::find()->where("id = {$result['questionId']} and answer = '{$answer}'")->one();
                 $correct = $is_correct?1:0;
                 $questions[$k]['correct'] = $correct;
             }else{
                 $questions[$k]['isDo'] = 0;
             }
             $site += 1;
         }
         $data = ['currentSite'=>$currentSite,'totalNum'=>count($questions),'questionStatus'=>$questions,'question'=>$question];
         die(json_encode($data));
     }
     /**
      * 用户中心  我的订单
      * cy
      */
     public function actionMyOrder(){
         $uid = Yii::$app->request->get("uid");
         $data = Method::post("https://order.viplgw.cn/pay/api/gre-order",['uid' => $uid,'pageSize' => 30,'page' => 1]);
         $data = json_decode($data,true);
         $model = new Content();
         foreach($data['data'] as $k=>$v){
             $sign = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$v['contentId']}",'pageSize' => 1]);
             $data['data'][$k]['detail'] =  (count($sign) > 0)?$sign[0]:'';
         }
         //status 1-未付款 3-已付款
         $isPay = [];
         $notPay = [];
         foreach($data['data'] as $kk => $vv){
             if($vv['status'] == 3){
                 $isPay[] = $vv;
             }
             if($vv['status'] == 1){
                 $notPay[] = $vv;
             }
         }
         $data['isPay'] = $isPay;
         $data['notPay'] = $notPay;
         die(json_encode($data));
    }
    /*
     * 订单详情
     * cy
     */
    public function actionOrderDetail(){
        $uid = Yii::$app->request->get("uid");
        $id = Yii::$app->request->get("id");
        $data = Method::post("https://order.viplgw.cn/pay/api/gre-order",['uid' => $uid,'pageSize' => 30,'page' => 1,]);
        $data = json_decode($data,true);
        foreach($data['data'] as $k => $v){
            if($v['id'] == $id) $data = $v;
        }
        $model = new Content();
        $sign = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$data['contentId']}",'pageSize' => 1]);
        $data['detail'] =  (count($sign) > 0)?$sign[0]:'';
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
        $uid = Yii::$app->request->post('uid');
        if(!$uid){
            $re = ['code' => 2];
            die(json_encode($re));
        }
        $goods = $model->getGoods($goodsId);
        $totalMoney = $goods[0]['price']*$num;
        $goods[0]['num'] = $num;
        $data = ['typeUrl' => 'greUrl','type' => 6,'totalMoney' => $totalMoney,'goods' =>$goods];
        $re = ['code' => 1,'data' => serialize($data)];
        die(json_encode($re));
    }
    /**
     * 题目收藏
     * by yanni
     */
    public function actionUserQuestionCollection(){
        $questionId = Yii::$app->request->post('questionId');
        $uid = Yii::$app->request->post('uid');
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
            $res = ['code' => 0,'message'=>'请登录'];
        }
        die(json_encode($res));
    }

    /**
     * 上传图片
     * @Obelisk
     */

    public function actionAppImage()
    {
        $file = $_FILES['upload'];
        $uid = Yii::$app->request->post("uid");

        $upload = new \UploadFile();

        $upload->int_max_size = 3145728;

        $upload->arr_allow_exts = array('jpg', 'gif', 'png', 'jpeg');

        $upload->str_save_path = Yii::$app->params['upImage'];

        $arr_rs = $upload->upload($file);

        if ($arr_rs['int_code'] == 1) {
            $filePath = '/' . Yii::$app->params['upImage'] . $arr_rs['arr_data']['arr_data'][0]['savename'];
            $res['code'] = 1;

            $res['message'] = '上传成功';

            $res['image'] = $filePath;
            User::updateAll(['image'=>$filePath],"uid = $uid");

        } else {

            $res['code'] = 0;

            $res['message'] = '上传失败，请重试';

        }

        die(json_encode($res));
    }
    /**
     * 名师详情
     * cy
     */
    public function actionTeacherDetail(){
        $id = Yii::$app->request->get("teacherid");
        $teacher = Teacher::find()->where("id = $id")->asArray()->one();
        $teacher['label'] = explode(',',$teacher['label']);
        $course = explode("\r",$teacher['course']);
        foreach($course as $kk=>$vv){
            $arr = explode(',',$vv);
            if(count($arr) == 2){
                $course[$kk] = $arr;
            }else{
                $course[$kk] = array('','');
            }
        }
        $teacher['articles'] = TeacherContent::find()->select("title,view,fine,image,label")->where("teacherId = $id")->asArray()->all();
        $teacher['course'] = $course;
        die(json_encode($teacher));
    }
}
