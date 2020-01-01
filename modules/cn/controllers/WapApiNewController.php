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
use app\modules\cn\models\Course;
use app\modules\cn\models\Teachers;
use app\modules\content\models\Livesdkid;
use app\modules\cn\models\Login;
use app\modules\cn\models\QuestionCat;
use app\modules\cn\models\QuestionLevel;
use app\modules\cn\models\QuestionLibrary;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\SourceCat;
use app\modules\cn\models\SynchroLog;
use app\modules\cn\models\TeacherCollection;
use app\modules\cn\models\TeachercolumnComment;
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

class WapApiNewController extends ToeflApiControl
{

    public $enableCsrfValidation = false;

    /**
     * 登录
     * cy
     */
    public function actionLogin()
    {
        $user       = new User();
        $request    = Yii::$app->request;
        $uid        = $request->post("uid");
        $phone      = $request->post("phone");
        $password   = md5($request->post("password"));
        $username   = $request->post("username");
        $email      = $request->post("email");
        $loginsdata = $user->find()->where("uid = $uid ")->one();
        if (empty($loginsdata['id'])) {
            $where = '';
            if (!empty($email)) {
                $where .= empty($where) ? "email='$email'" : " or email='$email'";
            }
            if (!empty($username)) {
                $where .= empty($where) ? "userName='$username'" : " or userName='$username'";
            }
            if (!empty($phone)) {
                $where .= empty($where) ? "phone='$phone'" : " or phone='$phone'";
            }
            $loginsdata = $user->find()->where("$where")->one();
            if (empty($loginsdata['id'])) {
                $login        = new User();
                $login->phone = $phone;

                $login->userPass = $password;

                $login->email = $email;

                $login->createTime = time();

                $login->userName = $username;
                $login->uid      = $uid;
                $login->save();
                $loginsdata = $user->find()->where("$where")->asArray()->one();
            } else {
                if ($phone != $loginsdata['phone']) {
                    User::updateAll(['phone' => $phone], "id={$loginsdata['id']}");
                }
                if ($email != $loginsdata['email']) {
                    User::updateAll(['email' => "$email"], "id={$loginsdata['id']}");
                }
                if ($username != $loginsdata['userName']) {
                    User::updateAll(['userName' => "$username"], "id={$loginsdata['id']}");
                }
                if ($uid != $loginsdata['uid']) {
                    User::updateAll(['uid' => "$uid"], "id={$loginsdata['id']}");
                }
                $loginsdata = $user->find()->where("id={$loginsdata['id']}")->asArray()->one();
            }
        } else {
            if ($phone != $loginsdata['phone']) {
                User::updateAll(['phone' => $phone], "id={$loginsdata['id']}");
            }
            if ($email != $loginsdata['email']) {
                User::updateAll(['email' => "$email"], "id={$loginsdata['id']}");
            }
            if ($username != $loginsdata['userName']) {
                User::updateAll(['userName' => "$username"], "id={$loginsdata['id']}");
            }
            $loginsdata = $user->find()->where("id={$loginsdata['id']}")->asArray()->one();
        }
        $session = Yii::$app->session;
        $session->set("userId", $loginsdata['id']);
        $session->set("userData", $loginsdata);
        $data = ['code' => 1, 'message' => 'success', 'loginsdata' => $loginsdata];
        die(json_encode($data));
    }

    /**
     * 个人中心
     * cy
     */
    public function actionPersonal()
    {
        $uid           = Yii::$app->request->get("uid");
        $questionTotal = UserAnswer::find()->select("id")->asArray()->where("uid = $uid")->count();//做题总数
        if ($questionTotal == 0) {
            $correctRate = 0;
        } else {
            $correctNum  = UserAnswer::find()->select("id")->asArray()->where("uid = $uid and correct = 1")->count();//正确总数
            $correctRate = ceil(($correctNum / $questionTotal) * 100);//正确率
        }
        $user       = User::find()->asArray()->where("uid = $uid")->one();
        $createTime = $user['createTime'];
        $days       = ceil((time() - $createTime) / 86400);
        $data       = ['user' => $user, 'questionTotal' => $questionTotal, 'correctRate' => $correctRate, 'days' => $days];
        die(json_encode($data));
    }

    /**
     *
     * 个人资料
     * cy
     */
    public function actionPersonalData()
    {
        $uid  = Yii::$app->request->get("uid");
        $user = User::find()->where("uid = $uid")->asArray()->one();
        die(json_encode(['data' => $user]));
    }

    /**
     * 修改用户密码
     * @Obelisk
     */

    public function actionChangeUserPass()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/ucenter/ucenter.php');
        $model = new Login();

        $uid         = Yii::$app->request->post("uid");
        $oldPassword = Yii::$app->request->post('oldPassword');

//        $userData = $model::find()->where("uid = $uid")->asArray()->one();

        $newPassword = Yii::$app->request->post('newPassword');

//        $sign = uc_user_edit($userData->userName,$oldPassword,$newPassword,'','');
        $sign = uc_user_edit_by_uid($uid, $oldPassword, $newPassword, '', '');

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
        include_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/ucenter/ucenter.php');
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
                setcookie('loginData', json_encode($userData), time() + 3600 * 24 * 30, '/');

                $res['code'] = 1;

                $res['message'] = '保存成功';
//                uc_user_edit($userData->userName,'','',$email,'',1);
                uc_user_edit_by_uid($uid, '', '', $email, '', 1);

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

        $uid      = Yii::$app->request->post("uid");
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
        if ($result) {
            $res['code']    = 1;
            $res['message'] = '保存成功';
        } else {
            $res['code']    = 0;
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
        include_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/ucenter/ucenter.php');
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

                        $model->updateAll(['phone' => $phone], "uid=$uid");

                        $res['code'] = 1;

                        $res['message'] = '保存成功';
                        uc_user_edit_by_uid($uid, '', '', '', $phone, 1);

                    } else {

                        $res['code'] = 0;

                        $res['message'] = '验证码错误';

                    }

                } else {

                    $res['code'] = 0;

                    $res['message'] = '验证码过期';

                }

            } else {

                $model->updateAll(['phone' => $phone], "uid=$uid");

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
    public function actionLeidou()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/ucenter/ucenter.php');
        $uid            = Yii::$app->request->post("uid");
        $user           = uc_user_integral1($uid);
        $user["income"] = uc_user_integral1($uid, " limit 0,20", " and type = 1")['details'];
        $user["out"]    = uc_user_integral1($uid, " limit 0,20", " and type = 2")['details'];
        die(json_encode($user));
    }

    /**
     * 个人中心 做题记录
     * cy
     */
    public function actionMakeRecord()
    {
        $uid      = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category", 0);
        $sourceId = Yii::$app->request->get("source", 0);
        $levelId  = Yii::$app->request->get("level", 0);
        $time     = Yii::$app->request->get("time");
        $where    = " ua.uid = $uid ";
        if ($category) {
            $where .= " and q.catId = {$category} ";
        }
        if ($sourceId) {
            $where .= " and q.sourceId={$sourceId}";
        }
        if ($levelId) {
            $where .= " and q.levelId={$levelId}";
        }
        if ($time == 'day') {  //一天内
            $dayAgo = time() - (60 * 60 * 24);
            $where  .= " and ua.createTime>$dayAgo";
        } elseif ($time == 'week') {   //一周内
            $weekAgo = time() - (60 * 60 * 24 * 7);
            $where   .= " and ua.createTime>$weekAgo";
        } elseif ($time == 'month') {   //一月内
            $monthAgo = time() - (60 * 60 * 24 * 30);
            $where    .= " and ua.createTime>$monthAgo";
        } elseif ($time == 'month1') {   //三月内
            $month1Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and ua.createTime>$month1Ago";
        } elseif ($time == 'month2') {  //超过三月
            $month2Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and ua.createTime<$month2Ago";
        }
        $usermodel = new User();
        $data      = $usermodel->getDoneQuestionsRecord($where, 1, 100, '', 'ORDER BY ua.createTime desc');//数据
        foreach ($data['data'] as $k => $v) {
            $qmodel                      = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source']  = $qmodel->getSource($v['sourceId']);
        }
        $sources = QuestionSource::find()->asArray()->all();
        foreach($sources as $k => $v){
            $catName = Yii::$app->db->createCommand("select qc.name from x2_source_cat sc inner join x2_question_cat qc on qc.id = sc.catId where sc.sourceId = {$v['id']}")->queryOne()['name'];
            $sources[$k]['name'] = $v['name']."(".$catName.")";
        }
        $cats    = QuestionCat::find()->asArray()->all();
        $levels  = QuestionLevel::find()->asArray()->all();
        $return  = ['data' => $data['data'], 'categorys' => $cats, 'sources' => $sources, 'levels' => $levels, 'catId' => $category, 'sourceId' => $sourceId, 'levelId' => $levelId, 'time' => $time];
        die(json_encode($return));
    }

    /**
     * 个人中心 收藏题目
     * cy
     */
    public function actionCollecteRecord()
    {
        $uid      = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category", 0);
        $sourceId = Yii::$app->request->get("source", 0);
        $levelId  = Yii::$app->request->get("level", 0);
        $time     = Yii::$app->request->get("time");
        $where    = " qc.uid = $uid ";
        if ($category) {
            $where .= " and q.catId = {$category} ";
        }
        if ($sourceId) {
            $where .= " and q.sourceId={$sourceId}";
        }
        if ($levelId) {
            $where .= " and q.levelId={$levelId}";
        }
        if ($time == 'day') {  //一天内
            $dayAgo = time() - (60 * 60 * 24);
            $where  .= " and qc.createTime>$dayAgo";
        } elseif ($time == 'week') {   //一周内
            $weekAgo = time() - (60 * 60 * 24 * 7);
            $where   .= " and qc.createTime>$weekAgo";
        } elseif ($time == 'month') {   //一月内
            $monthAgo = time() - (60 * 60 * 24 * 30);
            $where    .= " and qc.createTime>$monthAgo";
        } elseif ($time == 'month1') {   //三月内
            $month1Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and qc.createTime>$month1Ago";
        } elseif ($time == 'month2') {  //超过三月
            $month2Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and qc.createTime<$month2Ago";
        }
        $user = new User();
        $data = $user->getUserQuestionCollection($where, 1, 100);
        foreach ($data['data'] as $k => $v) {
            $qmodel                      = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source']  = $qmodel->getSource($v['sourceId']);
            $result                      = UserAnswer::find()->where("uid = $uid and questionId = {$v['id']}")->asArray()->one();
            if (empty($result)) {
                $data['data'][$k]['user_answer'] = '';
            } else {
                $data['data'][$k]['user_answer'] = $result['answer'];
            }
        }
        $sources = QuestionSource::find()->asArray()->all();
        $cats    = QuestionCat::find()->asArray()->all();
        $levels  = QuestionLevel::find()->asArray()->all();
        $return  = ['data' => $data["data"], 'categorys' => $cats, 'sources' => $sources, 'levels' => $levels, 'catId' => $category, 'sourceId' => $sourceId, 'levelId' => $levelId, 'time' => $time];
        die(json_encode($return));
    }

    /**
     * 个人中心 错题记录
     * cy
     */
    public function actionErrorRecord()
    {
        $uid      = Yii::$app->request->get("uid");
        $category = Yii::$app->request->get("category", 0);
        $sourceId = Yii::$app->request->get("source", 0);
        $levelId  = Yii::$app->request->get("level", 0);
        $time     = Yii::$app->request->get("time");
        $where    = " ua.uid = $uid ";
        if ($category) {
            $where .= " and q.catId = {$category} ";
        }
        if ($sourceId) {
            $where .= " and q.sourceId={$sourceId}";
        }
        if ($levelId) {
            $where .= " and q.levelId={$levelId}";
        }
        if ($time == 'day') {  //一天内
            $dayAgo = time() - (60 * 60 * 24);
            $where  .= " and ua.createTime>$dayAgo";
        } elseif ($time == 'week') {   //一周内
            $weekAgo = time() - (60 * 60 * 24 * 7);
            $where   .= " and ua.createTime>$weekAgo";
        } elseif ($time == 'month') {   //一月内
            $monthAgo = time() - (60 * 60 * 24 * 30);
            $where    .= " and ua.createTime>$monthAgo";
        } elseif ($time == 'month1') {   //三月内
            $month1Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and ua.createTime>$month1Ago";
        } elseif ($time == 'month2') {  //超过三月
            $month2Ago = time() - (60 * 60 * 24 * 90);
            $where     .= " and ua.createTime<$month2Ago";
        }
        $usermodel = new User();
        $data      = $usermodel->getDoneQuestionsRecord($where, 1, 100, '2', 'ORDER BY ua.createTime desc');//数据
        foreach ($data['data'] as $k => $v) {
            $qmodel                      = new Questions();
            $data['data'][$k]['section'] = $qmodel->getSection($v['catId']);
            $data['data'][$k]['source']  = $qmodel->getSource($v['sourceId']);
        }
        $sources = QuestionSource::find()->asArray()->all();
        $cats    = QuestionCat::find()->asArray()->all();
        $levels  = QuestionLevel::find()->asArray()->all();
        $return  = ['data' => $data['data'], 'categorys' => $cats, 'sources' => $sources, 'levels' => $levels, 'catId' => $category, 'sourceId' => $sourceId, 'levelId' => $levelId, 'time' => $time];
        die(json_encode($return));
    }

    /**
     * GRE首页接口
     * wap改版
     * cy
     */
    public function actionIndex()
    {
        //轮播图内容
        $banner = Content::getClass(['where' => 'c.pid=0', 'fields' => 'url', 'category' => '595', 'page' => 1, 'pageSize' => 5]);   //banner 图片
        $uid = Yii::$app->request->post('uid');
        //题目类型数据
        $quesType = [['typeStr' => '题目单项'], ['typeStr' => '题目考点']];
        foreach ($quesType as $k => $v) {
            if ($v['typeStr'] == '题目单项') {
                $type = 1;
            } else {
                $type = 2;
            }
            $sections = QuestionCat::find()->asArray()->all();
            foreach ($sections as $f => $d) {
                $sectionId      = $d['id'];
                if($type == 2){//1-考点 2-单项
                    $object = QuestionKnow::find()->where("catId = $sectionId")->limit(4)->asArray()->all();
                }else{
                    $object = Yii::$app->db->createCommand("select s.* from x2_source_cat sc left JOIN x2_question_source s on sc.sourceId=s.id where sc.catId=$sectionId order by s.sort desc limit 0,4")->queryAll();
                }
                foreach($object as $g => $t){
                    $id = $t['id'];
                    if($type == 2){
                        $where = " and knowId = $id ";
                    }else{
                        $where = " and sourceId = $id";
                    }
                    $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$sectionId} and type= $type $where")->all();  //题库题目
                    $totalNum       = 0;
                    $doNum     = 0;
                    foreach ($totalQuestions as $w => $q) {
                        $qmodel       = new \app\modules\question\models\QuestionLibrary();
                        $totalSubject = $qmodel->getLibraryQuestionNum($q['id']);   //所以题目
                        $totalNum     = $totalNum + $totalSubject;
                        if($uid){
                            $num = UserAnswer::find()->where("uid = $uid and libId = {$q['id']}")->count();
                            $doNum += $num;
                        }
                    }
                    $object[$g]['totalNum'] = $totalNum;
                    $object[$g]['doNum'] = $doNum;
                }
                $sections[$f]['object']= $object;
            }
            $quesType[$k]['data'] = $sections;
        }
        //热门课程
        $hotCourse = [
            ['label' => '330分冲刺课', 'id' => 7778],
            ['label' => '325分冲刺课', 'id' => 7776],
            ['label' => '零基础进阶课', 'id' => 8362],
            ['label' => '经典课', 'id' => 7772],
            ['label' => '一对一VIP课', 'id' => 7755],
            ['label' => '封闭班', 'id' => 8295],
        ];
        $model     = new Content();
        foreach ($hotCourse as $r => $t) {
            $data                        = $model->getClass(['fields' => 'answer,price,originalPrice,duration,commencement,alternatives', 'where' => "c.id={$t['id']}", 'pageSize' => 1]);
            $hotCourse[$r]['id']         = $data[0]['id'];
            $hotCourse[$r]['image']      = $data[0]['image'];
            $hotCourse[$r]['title']      = $data[0]['title'];
            $hotCourse[$r]['courseTime'] = $data[0]['commencement'];
            $hotCourse[$r]['price']      = $data[0]['price'];
            $hotCourse[$r]['buyPeople']  = $data[0]['alternatives'];
        }
        //热门咨询-543 GRE百科-544  名师专栏-0   备考心经 -537
        $hotInfo = [
            ['id' => 543, 'cate' => '热门资讯'],
            ['id' => 544, 'cate' => 'GRE百科'],
            ['id' => 0, 'cate' => '名师专栏'],
            ['id' => 537, 'cate' => '备考心经'],
        ];
        foreach ($hotInfo as $e => $q) {
            if ($q['id'] > 0) {//不是名师专栏
                $content = Content::find()->select('id,title,image,viewCount as view,createTime')->where("catId = {$q['id']}")->asArray()->orderBy('createTime desc')->limit(5)->all();
            } else {
                $content = TeacherContent::find()->select('id,title,image,view,createTime')->asArray()->orderBy('createTime desc ')->limit(5)->all();
            }
            $hotInfo[$e]['content'] = $content;
        }
        //真题机经下载
        $questions = file_get_contents('https://bbs.viplgw.cn/cn/wap-api/real-question');
        $questions = json_decode($questions, true)['data'];
        //专家名师
        $teachers = Teacher::find()->select('id,image,name,introduce,numberLessons')->asArray()->orderBy('sort desc')->limit(5)->all();
        //高分案例
        $examples = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '531', 'page' => 1, 'pageSize' => 5, 'pageStr' => 1]);
        $data     = $examples['data'];
        foreach ($data as $d => $c) {
            $dates        = explode('-', explode(' ', $c['createTime'])[0]);
            $date         = intval($dates[1]) . '月' . intval($dates[2]) . '日';
            $highScores[] = ['id' => $c['id'], 'image' => $c['image'], 'title' => $c['title'], 'name' => $c['answer'], 'date' => $date];
        }
        $return = ['banner' => $banner, 'questType' => $quesType, 'hotCourse' => $hotCourse, 'hotInfo' => $hotInfo, 'questions' => $questions, 'teachers' => $teachers, 'examples' => $highScores];
        die(json_encode(['code' => 1, 'message' => 'success', 'data' => $return]));
    }

    /**
     * GRE咨询首页接口
     * by cy
     */
    public function actionConsult()
    {
        $model    = new Content();
        $page     = Yii::$app->request->get('page', 1);
        $pageSize = Yii::$app->request->get('pageSize', 10);
        //咨询轮播图
        $carousel = $model->getClass(['where' => 'c.pid=0', 'fields' => 'url', 'category' => '555', 'page' => 1, 'pageSize' => 5]);
        //内容
        $data = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '543', 'page' => $page, 'pageSize' => $pageSize, 'pageStr' => $page]);
        foreach ($data['data'] as $k => $v) {
            $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
        }
        $contents = ['carousel' => $carousel, 'data' => $data, 'page' => $page];
        die(json_encode($contents));
    }

    /**
     * GRE咨询详情接口
     * cy
     */
    public function actionConsultDetail()
    {
        $contentid              = Yii::$app->request->get('contentid');
        $page                   = Yii::$app->request->get('page', 1);
        $content                = new Content();
        $data                   = $content->getClass(['fields' => 'answer,alternatives,description', 'where' => "c.id=$contentid"]);
        $comment                = new UserComment();
        $usercomment            = $comment->getUserComment($contentid, $page, 50);
        $data[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data[0]['description']);
        $contents               = ['data' => $data, 'userComment' => $usercomment];
        die(json_encode($contents));
    }

    /**
     * GRE备考首页接口
     * cy
     */
    public function actionBeikao()
    {
        $model = new Content();
        //备考轮播图
        $carousel = $model->getClass(['fields' => 'url', 'category' => 554]);
        //GRE备考
        $oneweek  = $model->getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'order' => 'alternatives DESC', 'page' => 1, 'pageSize' => 4]);//一周热门
        $words    = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '538', 'page' => 1, 'pageSize' => 7, 'order' => ' alternatives DESC']);//词汇
        $read     = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '540', 'page' => 1, 'pageSize' => 7, 'order' => ' alternatives DESC']);//阅读
        $blank    = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '539', 'page' => 1, 'pageSize' => 7, 'order' => ' alternatives DESC']);//填空
        $math     = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '541', 'page' => 1, 'pageSize' => 7, 'order' => 'alternatives DESC']);//数学
        $write    = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '542', 'page' => 1, 'pageSize' => 7, 'order' => ' alternatives DESC']);//写作
        $contents = ['carousel' => $carousel, 'oneweek' => $oneweek, 'words' => $words, 'read' => $read, 'blank' => $blank, 'math' => $math, 'write' => $write];
        die(json_encode($contents));

    }

    /**
     * 文章详情页接口(GRE备考)
     * by cy
     */
    public function actionArticleDetail()
    {
        $contentid = Yii::$app->request->get('contentid');
        $uid       = Yii::$app->request->get("uid");
        $page      = Yii::$app->request->get('page', 1);
//        $catid = Yii::$app->request->post('catid');
//        $class = Category::find()->asArray()->where("id = ".$catid)->one();//分类信息
        $model       = new Content();
        $data        = $model->getClass(['fields' => 'answer,alternatives,description', 'where' => "c.id=$contentid"]);
        $comment     = new UserComment();
        $userComment = $comment->getUserComment($contentid, $page, 50);//文章评论
        foreach ($userComment['data'] as $key => $value) {
            $reply                                   = Yii::$app->db->createCommand("select uc.*,u.userName,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid=" . $value['id'])->queryAll();//单条评论的回复信息
            $userComment['data'][$key]['reply']      = $reply;
            $userComment['data'][$key]['countreply'] = count($reply);
        }
        $hotarticle             = $model->getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 4]);//热门文章
        $data[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data[0]['description']);
        $data[0]['description'] = strip_tags($data[0]['description'], '<img>,<p></p>');
        foreach ($userComment['data'] as $k => $v) {//评论点赞
            $fine = $v['fane'];
            if (is_null($fine)) {
                $fine = rand(5, 25);
                UserComment::updateAll(['fane' => $fine], "id = {$v['id']}");
                $userComment['data'][$k]['fine'] = $fine;
            }
        }
        foreach ($data as $kk => $vv) {
            $fine = $vv["fabulous"];
            if (is_null($fine)) {
                $fine = 0;
            }
            $cfine = UserComment::find()->select("fane")->where("contentId = $contentid")->asArray()->all();
            if (empty($cfine)) {
                $sumfine = 0;
            } else {
                foreach ($cfine as $key => $u) {
                    $finearr[] = $u['fane'];
                }
                $sumfine = array_sum($finearr);
            }
            $all               = $fine + $sumfine;
            $data[$kk]['fine'] = $all;
        }
        //是否收藏文章
        if ($uid) {
            $res = ContentCollecte::find()->where("uid = $uid and contentId = $contentid")->one();
            if ($res) {
                $collecte = 1;
            } else {
                $collecte = 0;
            }
        } else {
            $collecte = 0;
        }
        $viewCount = $data[0]['viewCount'];
        if(!$viewCount){
            $viewCount = 1;
        }else{
            $viewCount += 1;
        }
        Content::updateAll(['viewCount'=>$viewCount],"id = $contentid");
        $contents = ['data' => $data, 'userComment' => $userComment, 'hotarticle' => $hotarticle, 'collecte' => $collecte];
        die(json_encode($contents));
    }

    /**
     * 文章篇评论
     * cy
     */
    public function actionArticleComment()
    {
        $uid       = Yii::$app->request->post('uid');
        $contentId = Yii::$app->request->post('contentId');
        $content   = Yii::$app->request->post('content');
        if (!$uid) {
            die(json_encode(['code' => 0, 'message' => '请登录']));
        }
        if ($content && $contentId) {
            $model             = new UserComment();
            $model->contentId  = $contentId;
            $model->uid        = $uid;
            $model->content    = $content;
            $model->type       = 1;
            $model->createTime = time();
            $r                 = $model->save();
            if ($r > 0) {
                $res = ['code' => 1, 'message' => '评论成功', 'id' => $model->primaryKey];
            } else {
                $res = ['code' => 0, 'message' => '评论失败'];
            }
        } else {
            $res = ['code' => 0, 'message' => '评论不能为空'];
        }
        die(json_encode($res));
    }

    /**
     * 备考文章点赞
     * cy  type=> 1-文章点赞 2-评论点赞
     */
    public function actionAddFine()
    {
        $contentId = Yii::$app->request->post("contentId");
        $type      = Yii::$app->request->post("type");
        $commentId = Yii::$app->request->post("commentId");
        $oldfine   = Yii::$app->request->post("fine");
        $content   = new Content();
        $conte     = $content::find()->where("id = $contentId")->one();
        if ($type == 1) {
            $fine = $conte['fabulous'];
            if (is_null($fine)) {
                $fine = 1;
            } else {
                $fine += 1;
            }
            $res = $content::updateAll(['fabulous' => $fine], "id=$contentId");
        } else {
            $comment = new UserComment();
            $fine    = $oldfine + 1;
            $res     = $comment::updateAll(['fane' => $fine], "id = $commentId and contentId = $contentId");
        }
        if ($res) {
            $fines = UserComment::find()->select("fane")->where("contentId = $contentId")->asArray()->all();
            if (empty($fines)) {
                $all = 0;
            } else {
                foreach ($fines as $f => $t) {
                    $finearr[] = $t['fane'];
                }
                $all = array_sum($finearr);
            }
            $allfine = $all + $conte->fabulous;
            if ($type == 1) {
                $data = ['code' => 1, 'message' => 'success', 'fine' => $allfine];
            } else {
                $data = ['code' => 1, 'message' => 'success', 'fine' => $fine, 'allfine' => $allfine];
            }
        } else {
            $data = ['code' => 0, 'message' => 'fail'];
        }
        die(json_encode($data));
    }
    /**
     * 点赞
     * cy 名师专栏
     */
    public function actionAddTeacherFine(){
        $teacherid = Yii::$app->request->post("teacherid");
        $contentid = Yii::$app->request->post("contentId");
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
            $data = array('code'=>1,'message'=>'success','fine'=>$fine);
        }else{
            $data = array('code'=>0,'message'=>'fail');
        }
        die(json_encode($data));
    }

    /**
     * 文章收藏
     * cy
     */
    public function actionContentCollection()
    {
        $uid        = Yii::$app->request->post("uid");
        $contentId  = Yii::$app->request->post("contentId");
        $collecte   = Yii::$app->request->post("collecte");
        $createTime = date('Y-m-d H:i:s', time());
        $collection = new ContentCollecte();
        if ($collecte == 1) {//收藏
            $collection->uid        = $uid;
            $collection->contentId  = $contentId;
            $collection->createTime = $createTime;
            $res                    = $collection->save();
        } else {//取消收藏
            $res = $collection::deleteAll("uid = $uid and contentId = $contentId");
        }
        if ($res) {
            $data = ['code' => 1, 'message' => 'success'];
        } else {
            $data = ['code' => 0, 'message' => 'fail'];
        }
        die(json_encode($data));
    }

    /**
     * GRE活动首页接口
     * cy
     */
    public function actionActivity()
    {
        $data = file_get_contents("https://open.viplgw.cn/cn/api/gre-class");
        $data = json_decode($data, true);
        foreach ($data['all']['data'] as $key => $value) {
            $surplus = ceil((strtotime($value['commencement']) - time()) / 86400);
            if ($surplus > 0) {
                $str = '进行中';
            } else {
                $str     = '已结束';
                $surplus = 0;
            }
            $data['all']['data'][$key]['status'] = $str;
            $data['all']['data'][$key]['days']   = $surplus;
        }
        $model    = new Content();
        $carousel = $model->getClass(['category' => 564, 'fields' => 'url']);//广告图
        $contents = ['carousel' => $carousel, 'data' => $data];
        die(json_encode($contents));
    }

    /**
     * @Author: Ferre
     * @create: 2019/9/2 14:52
     * @throws \yii\db\Exception
     * 用户注册+快速登录
     */
    public function actionWapRegister()
    {
        $registerStr = Yii::$app->request->post('registerStr');
        $pass        = Yii::$app->request->post('pass');
        $type        = Yii::$app->request->post('type');//1 手机验证、 2 邮箱验证
        // 用户输入验证码
        $code        = Yii::$app->request->post('code');
        // 返回的验证码，带手机邮箱拼接的
        $phoneCode   = Yii::$app->request->post('phoneCode');
        $source      = Yii::$app->request->post('source'); //gre 为22
        // $registerStr ='18181941463';
        $data = Method::curl_post("https://login.viplgw.cn/cn/wap-api/register",['registerStr' => $registerStr,
            'pass' =>$pass,
            'type' =>$type,
            'code' =>$code,
            'phoneCode' =>$phoneCode,
            'source' =>$source]);
        $data = json_decode($data,'true');
        if ($data['code'] == 1){    //已注册 返回用户信息
            $uc_data = Yii::$app->db->createCommand("select * from db_ucenter.uc_members where uid={$data['uid']}")->queryOne();
            Method::confim_user($uc_data);
            $user_data = User::find()->where("uid={$data['uid']}")->asArray()->one();
            $data['nickname'] = $user_data['nickname'];
            $data['username'] = $user_data['userName'];
            $data['email']    = $user_data['email'];
            $data['phone']    = $user_data['phone'];
            $data['id']       = $user_data['id'];
        }
        die(json_encode($data));
    }

    /**
     * @Author: Ferre
     * @create: 2019/8/30 16:48
     * GRE-wap新登录方法
     */
    public function actionWapLogin()
    {
        $phone     = Yii::$app->request->post('phone');
        $code      = Yii::$app->request->post('code');// 用户输入验证码
        $phoneCode = Yii::$app->request->post('phoneCode');// 返回的验证码，带手机邮箱拼接的
        $source    = Yii::$app->request->post('source'); //gamtwap 为1
        $data      = Method::post("https://login.viplgw.cn/cn/wap-api/front-phone-login",
            [
                'phone'     => $phone,
                'code'      => $code,
                'phoneCode' => $phoneCode,
                'source'    => $source
            ]);
        $data = json_decode($data,'true');
        if ($data['code'] == 1){    //已注册 返回用户信息
            $user_data        = User::find()->where(['uid' => $data['uid']])->one();
            $data['nickname'] = $user_data['nickname'];
            $data['username'] = $user_data['userName'];
            $data['email']    = $user_data['email'];
            $data['phone']    = $user_data['phone'];
            $data['uid']      = $user_data['uid'];
        }
        die(json_encode($data));
    }

    /**
     * GRE活动记录详情接口
     * cy
     */
    public function actionActivityDetail()
    {
        $contentid = Yii::$app->request->get('contentid');
        $data      = Method::post("https://open.viplgw.cn/cn/api/gre-detail", ['id' => $contentid]);
        $data      = json_decode($data, true);
        if (isset($data['code'])) {
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
        $data['parent']['commencement']   = $surplusTime;
        $pid                              = $data['data']['pid'];
        $url                              = "https://open.viplgw.cn/";
        $pregRule                         = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
        $content                          = preg_replace($pregRule, '<img src="' . $url . '${1}" style="max-width:100%">', $data['parent']['sentenceNumber']);
        $data['parent']['sentenceNumber'] = $content;
        $contents                         = ['id' => $contentid, 'pid' => $pid, 'data' => $data, 'parent' => $data['parent'], 'category' => $data['category']];
        die(json_encode($contents));
    }

    /**
     * GRE课程首页接口
     * cy
     */
    public function actionCourse()
    {
        $model = new Content();
        //近期开班
        $kaiban = $model->getClass(['where' => 'c.pid!=0', 'fields' => 'answer,alternatives', 'category' => '566', 'page' => 1, 'order' => ' c.id DESC', 'pageSize' => 20]);
        //短期提分课程
        $shortcourse = $model->getClass(['where' => 'c.pid=0', 'category' => '482', 'page' => 1, 'order' => ' c.sort asc,c.id DESC', 'pageSize' => 20]);
        //短期提分名师内容
        $shortteacher1 = $model->getClass(['where' => 'c.pid=0', 'category' => '530', 'page' => 1, 'pageSize' => 4]);//信息照片信息
        $shortteacher2 = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives,article,url', 'category' => '530', 'page' => 1, 'pageSize' => 4]);//详细信息
        //短期提分学院案例
        $shortstudent = $model->getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering', 'category' => '531', 'page' => 1, 'pageSize' => 6]);
        $contents     = ['beikao' => $kaiban, 'shortcourse' => $shortcourse, 'shortteacher1' => $shortteacher1, 'shortteacher2' => $shortteacher2, 'shortstudent' => $shortstudent];
        die(json_encode($contents));
    }

    /**
     * GRE课程详情接口
     * cy
     */
    public function actionCourseDetail1()
    {
        $contentid = Yii::$app->request->get("contentid");
        $type      = Yii::$app->request->get('type');
        if (!$type) $type = 1; //1-课程介绍 2-授课名师 3-学习资料 4-用户评价 默认为1
        $model = new Content();
        $sign  = $model->findOne($contentid);
        if ($sign->pid == 0) {
            $data = Content::find()->where("pid = $contentid")->one();
            if ($data) {
                $this->redirect("/cn/wap-api/course-detail?contentid={$data['id']}");
            } else {
                die('<script>alert("商品缺少详情");history.go(-1);</script>');
            }
        } else {
            $data     = $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance，alternatives,article', 'where' => "c.id=$contentid", 'pageSize' => 1]);
            $parent   = $model->getClass(['fields' => 'description,listeningFile,trainer', 'where' => "c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag      = $tagModel->getAllTag($contentid);
            $count    = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count + 1)], "id=$sign->pid");
            $endTime = strtotime($data[0]['article']);
            if ($endTime < time()) {
                $surplusTime = '已结束';
            } else {
                $surplusTime = $endTime - time();
            }
//            $modelM = new Method();
//            $surplusTime = $modelM->gmstrftimeB($surplusTime);
            $data[0]['article'] = $surplusTime;
            $pid                = $sign->pid;
            $modelu             = new UserComment();
            $comment            = $modelu->getUserComment($contentid, 1, 5);
        }
        $parent[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $parent[0]['description']);
        $contents                 = ['id' => $contentid, 'pid' => $pid, 'count' => $count, 'tag' => $tag, 'data' => $data[0], 'parent' => $parent[0], 'comment' => $comment, 'type' => $type];
        die(json_encode($contents));
    }

    /**
     * 搜题接口 分类搜索
     * cy
     */
    public function actionSearchType()
    {
        $request  = Yii::$app->request;
        $uid      = $request->get("uid");
        $category = $request->get("category", 0);//分类
        $source   = $request->get("source", 0);
        $level    = $request->get("level", 0);
        $dotype   = $request->get("dotype", 1);//1-全部 2-做过 3-正确 4-错误
        $where    = " 1= 1 ";
        if ($dotype == 1) {
            $str = "x2_questions";
        } else {
            $str = "q";
        }
        if ($category) {
            $where .= " and {$str}.catId = {$category}";
        }
        if ($source) {
            $where .= " and {$str}.sourceId = {$source}";
        }
        if ($level) {
            $where .= " and {$str}.levelId = $level";
        }
        if ($dotype == 1) {
            $data = Questions::find()->limit(100)->where($where)->asArray()->all();
        } else {
            $where .= " and ua.uid = {$uid}";
            if ($dotype == 3) {
                $where .= " and ua.correct = 1";
            } elseif ($dotype == 4) {
                $where .= " and ua.correct = 2";
            }
            $model = new User();
            $data  = $model->getDoneQuestionsRecord($where, 1, 30, '', ' order by ua.createTime desc');
            $data  = $data['data'];
        }
        foreach ($data as $k => $v) {
            $qmodel              = new Questions();
            $data[$k]['section'] = $qmodel->getSection($v['catId']);
            $data[$k]['source']  = $qmodel->getSource($v['sourceId']);
        }
        if ($category == 0) {
            $sources = QuestionSource::find()->asArray()->all();
        } else {
            $sql     = "select qs.* from x2_source_cat sc left join x2_question_source qs on sc.sourceId = qs.id  where catId = $category";
            $sources = Yii::$app->db->createCommand($sql)->queryAll();
        }
        $cats   = QuestionCat::find()->asArray()->all();
        $levels = QuestionLevel::find()->asArray()->all();
        $return = ['data' => $data, 'categorys' => $cats, 'sources' => $sources, 'levels' => $levels, 'catId' => $category, 'sourceId' => $source, 'levelId' => $level];
        die(json_encode($return));
    }

    /**
     * 搜题 -题目
     * cy
     */
    public function actionSearchTitle()
    {
        $title = Yii::$app->request->get("title");
        $data  = Questions::find()->where("stem like '%{$title}%'")->limit(30)->asArray()->all();
        foreach ($data as $k => $v) {
            $question            = new Questions();
            $data[$k]['section'] = $question->getSection($v['catId']);
            $data[$k]['source']  = $question->getSource($v['sourceId']);
        }
        die(json_encode($data));
    }

    /**
     * 题目详情
     * cy  type =》进入来源 1-搜题页面 2-收藏页面 3-做题记录页面 4-错题记录页面
     */
    public function actionQuestionDetail()
    {
        $request    = Yii::$app->request;
        $uid        = $request->get("uid");
        $questionId = $request->get("questionId");
        $type       = $request->get("type", 1);
        $where      = " uid = $uid and questionId = $questionId";
        $question   = new Questions();
        $user       = new User();
        if (!$uid && $type == 1) {//搜题页面进入
            $data = $question::find()->where("id = $questionId")->asArray()->one();
        } else {
            $result = UserAnswer::find()->where($where)->one();//是否已做过该题
            if ($result) {
                $data = $user->getQuestionDetail($uid, $questionId);

            } else {
                $data = $question::find()->where("id = $questionId")->asArray()->one();
            }
        }
        if ($uid) {
            //shoucang
            $sql = "select * from x2_question_collection where uid = $uid and questionId = $questionId";
            $res = Yii::$app->db->createCommand($sql)->queryOne();
        }
        //分割选项
        if ($data['optionA']){
            $data['optionA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['optionA']);
            $data['optionsA'] = Method::getTextHtmlArr($data['optionA']);
        }
        if ($data['optionB']){
            $data['optionB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['optionB']);
            $data['optionsB'] = Method::getTextHtmlArr($data['optionB']);
        }
        if ($data['optionC']){
            $data['optionC'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['optionC']);
            $data['optionsC'] = Method::getTextHtmlArr($data['optionC']);
        }
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        $typeId = $data['typeId'];
        if ($typeId == 7) {
            $articles = explode('.', $data['readArticle']);
            foreach ($articles as $k => $v) {
                $articles[$k] = $v . '.';
            }
            $data['articles'] = $articles;
        }
        if ($data['details']) {
            $data['details'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['details']);
        }
        if ($data['readArticle']) {
            $data['readArticle'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['readArticle']);
        }
        if ($data['quantityA']) {
            $data['quantityA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['quantityA']);
        }
        if ($data['quantityB']) {
            $data['quantityB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data['quantityB']);
        }
        $data['collect']  = (isset($res) && $res) ? 1 : 0;
        $data['section']  = $question->getSection($data['catId']);
        $data['source']   = $question->getSource($data['sourceId']);
        $analysis         = UserAnalysis::find()->where("questionId = $questionId and publish = 1")->asArray()->all();
        $data["analysis"] = $analysis;
        die(json_encode($data));
    }

    /*
     * GRE做题（首页）
     * cy
     */
    public function actionMake()
    {
        $uid       = Yii::$app->request->get("uid");
        $sectionId = Yii::$app->request->get('sectionId', 1);    //单项ID
        $type      = Yii::$app->request->get("type", 0);//0-题目单项 1-填空、阅读、数学考点
        if ($type == 0) {
            $sections    = QuestionCat::find()->asArray()->all();  //单项分类
            $sourceModel = new SourceCat();
            $comes       = $sourceModel->getSource($sectionId);  //来源
            $tpe         = 1;
            $field       = 'sourceId';
        } else {
            $comes    = QuestionKnow::find()->asArray()->where("catId=$sectionId")->all();//知识点
            $tpe      = 2;
            $field    = "knowId";
            $sections = '';
        }
        foreach ($comes as $key => $value) {
            $sid        = $value['id'];
            $questions  = QuestionLibrary::find()->asArray()->where("catId = $sectionId and type = $tpe and $field = $sid")->all();//题库信息
            $totalNum   = 0;
            $totalDoNum = 0;
            foreach ($questions as $k => $v) {
                $total = LibraryQuestion::find()->select("id")->asArray()->where("libId = {$v['id']}")->count();//每个题库的题数
                if ($uid) {
                    $data = QuestionsStatistics::find()->asArray()->where("libraryId= {$v['id']}  and uid = $uid")->one();
                    if (!is_null($data['doNum'])) $totalDo = $data['doNum']; else $totalDo = 0;
                } else {
                    $totalDo = 0;
                }
                $totalNum   += $total;
                $totalDoNum += $totalDo;
            }
            $comes[$key]['totalNum']   = $totalNum;
            $comes[$key]['totalDoNum'] = $totalDoNum;
            if ($totalNum == 0) {
                unset($comes[$key]);//去除没有题的题库来源
            }
        }
        $data = ['sections' => $sections, 'comes' => $comes, 'sectionId' => $sectionId];
        die(json_encode($data));
    }

    /**
     * GRE 做题（来源页）
     * cy
     */
    public function actionMakeSource()
    {
        $uid       = Yii::$app->request->get("uid");
        $sectionId = Yii::$app->request->get("sectionId", 1);//1-填空 2-阅读 3-数学
        $sourceId  = Yii::$app->request->get("sourceId", 1);//来源id 题目单项进入
        $knowId    = Yii::$app->request->get("knowId", 0);//知识考点id 考点进入
        if ($sourceId > 0) {//题库信息
            $questions = QuestionLibrary::find()->where("catId = $sectionId and type = 1 and sourceId = $sourceId")->asArray()->all();
        } else {
            $questions = QuestionLibrary::find()->where("catId = $sectionId and type = 2 and knowId = $knowId")->asArray()->all();
        }
        $tikudoNum   = 0;
        $averageTime = 0;
        $correctRate = 0;

        foreach ($questions as $key => $value) {
            $amodel   = new UserAnswer();
            $totalNum = LibraryQuestion::find()->select("id")->asArray()->where("libId= {$value['id']}")->count();//题库题数
            if ($uid) {
                $result = $amodel->getUserCompleteState($value['id'], $uid);  //获取当前用户题库做题情况
                if ($result) {
                    $rate = $result['correctRate'];
                    $time = Method::secToTime($result['totalTime']);
                } else {
                    $rate = 0;
                    $time = 0;
                }
                $data = QuestionsStatistics::find()->where("uid = $uid and libraryId = {$value['id']}")->one();
                if (!is_null($data['doNum'])) $doNum = $data['doNum']; else $doNum = 0;
                if (!is_null($data['state'])) $state = $data['state']; else $state = 0;//state 题库完成情况 1-已完成 0-未完成
            } else {
                $doNum = 0;
                $state = 0;
                $rate  = 0;
                $time  = 0;
            }
            $do_questions                   = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$value['id']} and state=1")->groupBy("uid")->count();   //完成人数
            $tikudoNum                      += $do_questions;//题库完成人数
            $questions[$key]['totalNum']    = $totalNum;
            $questions[$key]['doNum']       = $doNum;//用户单个题库的完成数量
            $questions[$key]['state']       = $state;
            $questions[$key]['correctRate'] = $rate ? $rate : 0;
            $questions[$key]['averageTime'] = $time ? $time : 0;
            $time                           = $amodel->getLibraryAverageTime($value['id'], $uid);
            $averageTime                    = $averageTime + $time;
            $correct                        = $amodel->getLibraryCorrectRate($value['id']);   //题库正确率
            $correctRate                    = $correctRate + $correct;

        }
        if ($questions) {
            $correctRate = round($correctRate / count($questions));
            if (!$uid) {
                $averageTime = round($averageTime / count($questions));
            }
        }
        if (!$averageTime) {
            $averageTime = 0;
        } else {
            $averageTime = Method::secToTime($averageTime);
        }
        $data = ['doOver' => $tikudoNum, 'correctRate' => $correctRate, 'time' => $averageTime, 'questions' => $questions];
        die(json_encode(['code' => 1, 'message' => 1, 'data' => $data]));
    }

    /**
     * GRE 做题
     * 进入题库（题目页）获取题目信息
     * cy
     * wap改版
     */
    public function actionGoMake()
    {
        $uid = Yii::$app->request->get("uid");
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '未登录']));
        }
        $libraryId = Yii::$app->request->get("libraryId");
        $isDone    = UserAnswer::find()->asArray()->where("uid = $uid and libId = $libraryId")->all();//用户已经做过的题
        $count     = count($isDone);
        $where     = " libId = $libraryId ";
        if ($count == 1) {
            $where .= " and questionId != {$isDone[0]['questionId']}";
        }
        if ($count > 1) {
            $ids = '';
            foreach ($isDone as $k => $v) {
                $questionId = $v['questionId'];
                $ids        .= ',' . $questionId;
            }
            $ids   = trim($ids, ',');
            $where .= " and questionId not in ({$ids})";
        }
        $totalcount = LibraryQuestion::find()->select("id")->where("libId = $libraryId")->count();
        if ($count >= $totalcount) {
            $data = ['code' => 0, 'message' => '您已做完该题库的题'];
        } else {
            $dataId      = LibraryQuestion::find()->asArray()->where($where)->orderBy('id asc')->one();
            $currentSite = $count + 1;
            $question    = self::questionData($dataId['questionId'], $uid);
            $data        = ['code' => 1, 'question' => $question, 'currentSite' => $currentSite, 'totalCount' => $totalcount];
        }
        die(json_encode($data));
    }

    /**
     * wap改版
     * 问题数据格式化
     * cy
     *
     */
    public static function questionData($questionId, $uid)
    {
        $question = Questions::find()->where("id = {$questionId}")->asArray()->one();
        if ($question['optionA']){
            $question['optionA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionA']);
            $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
        }
        if ($question['optionB']){
            $question['optionB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionB']);
            $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
        }
        if ($question['optionC']){
            $question['optionC'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionC']);
            $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
        }
        if ($question['typeId'] == 7) {//句子点选
            $articles = explode('.', strip_tags($question['readArticle']));
            foreach ($articles as $kk => $vv) {
                $articles[$kk] = $vv . '.';
            }
            $question['readStems'] = $articles;
        }
        if ($question['details']) {
            $question['details'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['details']);
        }
        if ($question['readArticle']) {
            $question['readArticle'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['readArticle']);
        }
        if ($question['quantityA']) {
            $question['quantityA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['quantityA']);
        }
        if ($question['quantityB']) {
            $question['quantityB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['quantityB']);
        }
        $result               = UserCollection::find()->where("uid = $uid and questionId = {$questionId}")->one();
        $question['collect']  = $result ? 1 : 0;
        $model                = new UserAnalysis();
        $analysis             = $model->getPublishUser($questionId);
        $question['analysis'] = $analysis;
        //问题讨论
        $model_comment       = new UserComment();
        $comment             = $model_comment->getQuestionComment($questionId, 1, 5);
        $question['comment'] = ['commentData' => $comment['data'], 'totalPage' => $comment['totalPage'], 'currPage' => 1];
        return $question;
    }

    /**
     * wap改版
     * cy
     * 题目讨论
     * 分页数据
     *
     */
    public function actionQuestionCommentPage()
    {
        $uid = Yii::$app->request->post('uid');
        if (!$uid) {
            $data = ['code' => 99, 'message' => '未登录', 'UID' => $uid];
        } else {
            $questionId = Yii::$app->request->post('questionId', 0);
            $page       = Yii::$app->request->post('page', 1);
            $model      = new UserComment();
            $comment    = $model->getQuestionComment($questionId, $page, 5);
            $data       = ['code' => 1, 'message' => 'success', 'data' => ['commentData' => $comment['data'], 'totalPage' => $comment['totalPage'], 'currPage' => $page]];
        }
        die(json_encode($data));
    }

    /**
     * GRE 做题（题目页）提交答案
     * cy
     */
    public function actionMakeTopic()
    {
        $request    = Yii::$app->request;
        $uid        = $request->post("uid");
        $questionId = $request->post("questionId");
        $libraryId  = $request->post("libraryId");
        $answer     = $request->post("answer");
        $useTime    = $request->post("useTime");
        //验证答案正确否
        $result  = Questions::find()->where("id = $questionId and answer = '{$answer}'")->one();
        $correct = $result ? 1 : 0;
            $isDone  = UserAnswer::find()->where("uid = $uid and questionId = $questionId and libId = $libraryId and answerType =1")->one();
        if (empty($isDone)) {
            $model             = new UserAnswer();
            $model->uid        = $uid;
            $model->questionId = $questionId;
            $model->libId      = $libraryId;
            $model->useTime    = $useTime;
            $model->correct    = $correct;
            $model->answer     = $answer;
            $model->answerType = 1;
            $model->createTime = time();
            $res               = $model->save();
        } else {
            $isDone->useTime    = $useTime;
            $isDone->correct    = $correct;
            $isDone->answer     = $answer;
            $isDone->createTime = time();
            $res                = $isDone->save();
        }
        if ($res) {
            $totalNum   = LibraryQuestion::find()->select("id")->where("libId = $libraryId")->count();
            $doNum      = UserAnswer::find()->select("id")->where("uid = $uid and libId = $libraryId")->count();
            $correctNum = UserAnswer::find()->select("id")->where("uid = $uid and libId = $libraryId and correct = 1")->count();
            $result     = QuestionsStatistics::find()->where("uid = $uid and libraryId = $libraryId")->one();
            if ($result) {
                $result->doNum     = $doNum;
                $result->totalTime = $useTime + $result->totalTime;
                if ($doNum == $totalNum) {//做完
                    $result->endTime     = time();
                    $result->state       = 1;
                    $result->correctRate = ceil(100 * ($correctNum / $doNum));
                }
                $result->save();
            } else {
                $statistic            = new QuestionsStatistics();
                $statistic->uid       = $uid;
                $statistic->libraryId = $libraryId;
                $statistic->doNum     = $doNum;
                $statistic->totalNum  = $totalNum;
                $statistic->totalTime = $useTime;
                $statistic->startTime = time();
                if ($doNum == $totalNum) {//做完
                    $statistic->endTime     = time();
                    $statistic->state       = 1;
                    $statistic->correctRate = ceil(100 * ($correctNum / $doNum));
                } else {
                    $statistic->state       = 0;
                    $statistic->correctRate = 0;
                }
                $statistic->save();
            }
            SynchroLog::updateAll(['lastTime' => time()], "uid={$uid}"); //最后操作时间
            $data = ['code' => 1, 'message' => 'success', 'url' => "/cn/wap-api/go-make?uid={$uid}&libraryId=$libraryId"];
        } else {
            $data = ['code' => 0, 'message' => 'fail'];
        }
        die(json_encode($data));
    }

    /**
     * GRE 做题结果页
     * cy
     * wap改版
     */
    public function actionMakeResult()
    {
        $uid = Yii::$app->request->get("uid", 0);
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '未登录', 'uid' => $uid]));
        }
        $libraryId = Yii::$app->request->get("libraryId", 0);
        if (!$libraryId) {
            die(json_encode(['code' => 0, 'message' => '题库id错误']));
        }
        $totalCount = LibraryQuestion::find()->where("libId = $libraryId")->count();
        $useTime    = UserAnswer::find()->where("uid = $uid and libId = $libraryId")->sum('useTime');
        if ($useTime == 0) {
            $averageTime = 0;
        } else {
            $averageTime = ceil($useTime / $totalCount);
        }
        $doCorrect = UserAnswer::find()->where("libId = $libraryId and uid = $uid and correct = 1")->count();
        if (!$doCorrect) {
            $correctRate = 0;
        } else {
            $correctRate = ceil(($doCorrect / $totalCount) * 100);
        }
        $doNum = UserAnswer::find()->where("uid = $uid and libId = $libraryId")->count();
        //题库
        $name = QuestionLibrary::find()->where("id = $libraryId")->asArray()->one()['name'];
        //诊断
        $model        = new QuestionsStatistics();
        $pace         = $model->getPace($totalCount, $useTime);
        $totalTimeStr = self::timeToStr($useTime);
        $averTimeStr  = self::timeToStr($averageTime);
        //竞争力
        $compete = $model->getCompete($uid, $libraryId, $correctRate);
        $data    = ['doCorrect' => $doCorrect, 'totalCount' => $totalCount, 'doNum' => $doNum, 'correctRate' => $correctRate . '%', 'totalTime' => $useTime, 'totalTimeStr' => $totalTimeStr, 'averTimeStr' => $averTimeStr, 'averageTime' => $averageTime, 'name' => $name, 'uid' => $uid, 'libraryId' => $libraryId, 'paceLevel' => $pace['Pace'], 'pace_msg' => $pace['Pace_msg'], 'beatPeople' => $compete['total'], 'beat' => round($compete['transcendNum'] / $compete['total'] * 100) . '%'];
        die(json_encode($data));
    }

    /**
     * 时间转换
     * cy
     */
    public function timeToStr($second)
    {
        if ($second == 0) {
            return '0s';
        } else {
            $hour   = floor($second / 3600);
            $minute = floor(($second - ($hour * 3600)) / 60);
            $sec    = $second - ($hour * 3600) - $minute * 60;
            if ($hour > 0) {
                $h = $hour . 'h';
            } else {
                $h = '';
            }
            if ($minute > 0) {
                $m = $minute . 'm';
            } else {
                $m = '';
            }
            if ($sec > 0) {
                $s = $sec . 's';
            } else {
                $s = '0s';
            }
            $str = $h . $m . $s;
            return $str;
        }
    }

    /**
     * wap改版
     * 结果详情页
     * cy
     */
    public function actionResultDetail()
    {
        $uid = Yii::$app->request->post('uid', 0);
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '未登录']));
        }
        $libraryId = Yii::$app->request->post('libraryId', 0);
        if (!$libraryId) {
            die(json_encode(['code' => 0, 'message' => '题库id错误']));
        }
        $questionId = Yii::$app->request->post('questionId', 0);
        $questions  = LibraryQuestion::find()->where("libId = $libraryId")->orderBy("id asc")->asArray()->all();
        $site       = 1;
        $currentSite = 1;
        foreach ($questions as $k => $v) {
            $questions[$k]['site'] = $site;
            if($v['questionId'] == $questionId) $currentSite = $site;
            $result                = UserAnswer::find()->where("uid = $uid and libId = $libraryId and questionId = {$v['questionId']}")->asArray()->one();
            if ($result) {
                $questions[$k]['isDo']    = 1;
                $correct                  = $result['correct'] == 1 ? 1 : 0;//1-正确 0-错误
                $questions[$k]['correct'] = $correct;
            } else {
                $questions[$k]['isDo'] = 0;
            }
            $site += 1;
        }
        if ($questionId < 1) {
            $questionId = $questions[0]['questionId'];
        }
        $question = self::questionData($questionId, $uid);
        $answer   = UserAnswer::find()->where("questionId = $questionId and uid = $uid and libId = $libraryId")->asArray()->one();
        if ($answer) {
            $correct    = $answer['correct'] == 1 ? 1 : 0;
            $userAnswer = $answer['answer'];
        } else {
            $correct    = 0;
            $userAnswer = '';
        }
        $question['userAnswer']    = $userAnswer;
        $question['answerCorrect'] = $correct;
        $data                      = ['code' => 1, 'message' => 'success', 'data' => ['currentSite'=>$currentSite,'quesData' => $questions, 'question' => $question]];
        die(json_encode($data));
    }

    /**
     *GRE 做题 重新做题
     * cy
     */
    public function actionDoAgain()
    {
        $uid       = Yii::$app->request->post("uid");
        $libraryId = Yii::$app->request->post("libraryId");
        UserAnswer::deleteAll("uid = $uid and libId = $libraryId");
        QuestionsStatistics::updateAll(['doNum' => 0, 'state' => 0], "uid = $uid and libraryId = $libraryId");
        SynchroLog::updateAll(['lastTime' => time()], "uid={$uid}"); //最后操作时间
        $data = ['code' => 1, 'message' => 'success', 'url' => "/cn/wap-api/go-make?uid={$uid}&libraryId=$libraryId"];
        die(json_encode($data));
    }

    /**
     * GRE 做题 模考详情页
     * cy
     */
    public function actionMokaiDetail()
    {
        $uid         = Yii::$app->request->get("uid");
        $libraryId   = Yii::$app->request->get("libraryId");
        $questionId  = Yii::$app->request->get("questionId");
        $question    = Questions::find()->where("id = $questionId")->asArray()->one();
        $user_answer = UserAnswer::find()->where("uid = $uid and questionId = $questionId and libId = $libraryId")->asArray()->one();
        if (!empty($user_answer)) {
            $question['user_do']             = 1;
            $question['user_answer']         = $user_answer['answer'];
            $question['user_answer_correct'] = $user_answer['correct'];
        } else {
            $question['user_do'] = 0;
        }
        $analysis             = UserAnalysis::find()->where("questionId = $questionId")->asArray()->all();
        $question['analysis'] = $analysis;
        if ($question['optionA']){
            $question['optionA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionA']);
            $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
        }
        if ($question['optionB']){
            $question['optionB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionB']);
            $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
        }
        if ($question['optionC']){
            $question['optionC'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['optionC']);
            $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
        }
        if ($question['typeId'] == 7) {//句子点选
            $articles = explode('.', strip_tags($question['readArticle']));
            foreach ($articles as $kk => $vv) {
                $articles[$kk] = $vv . '.';
            }
            $question['articles'] = $articles;
        }
        if ($question['details']) {
            $question['details'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['details']);
        }
        if ($question['readArticle']) {
            $question['readArticle'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['readArticle']);
        }
        if ($question['quantityA']) {
            $question['quantityA'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['quantityA']);
        }
        if ($question['quantityB']) {
            $question['quantityB'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $question['quantityB']);
        }
        $result              = UserCollection::find()->where("uid = $uid and questionId = $questionId")->one();
        $question['collect'] = $result ? 1 : 0;
        $questions           = LibraryQuestion::find()->where("libId = $libraryId")->asArray()->all();
        $site                = 1;
        foreach ($questions as $k => $v) {
            if ($v['questionId'] == $questionId) $currentSite = $site;
            $questions[$k]['site'] = $site;
            $result                = UserAnswer::find()->where("uid = $uid and libId = $libraryId and questionId = {$v['questionId']}")->asArray()->one();
            if ($result) {
                $questions[$k]['isDo']    = 1;
                $answer                   = $result['answer'];
                $is_correct               = Questions::find()->where("id = {$result['questionId']} and answer = '{$answer}'")->one();
                $correct                  = $is_correct ? 1 : 0;
                $questions[$k]['correct'] = $correct;
            } else {
                $questions[$k]['isDo'] = 0;
            }
            $site += 1;
        }
        $data = ['currentSite' => $currentSite, 'totalNum' => count($questions), 'questionStatus' => $questions, 'question' => $question];
        die(json_encode($data));
    }

    /**
     * 用户中心  我的订单
     * cy
     */
    public function actionMyOrder()
    {
        $uid   = Yii::$app->request->get("uid");
        $data  = Method::post("http://order.viplgw.cn/pay/api/gre-order", ['uid' => $uid, 'pageSize' => 30, 'page' => 1]);
        $data  = json_decode($data, true);
        $model = new Content();
        foreach ($data['data'] as $k => $v) {
            $sign                       = $model->getClass(['fields' => 'duration,commencement,performance', 'where' => "c.id={$v['contentId']}", 'pageSize' => 1]);
            $data['data'][$k]['detail'] = (count($sign) > 0) ? $sign[0] : '';
        }
        //status 1-未付款 3-已付款
        $isPay  = [];
        $notPay = [];
        foreach ($data['data'] as $kk => $vv) {
            if ($vv['status'] == 3) {
                $isPay[] = $vv;
            }
            if ($vv['status'] == 1) {
                $notPay[] = $vv;
            }
        }
        $data['isPay']  = $isPay;
        $data['notPay'] = $notPay;
        die(json_encode($data));

    }


    /*
     * 订单详情
     * cy
     */
    public function actionOrderDetail()
    {
        $uid  = Yii::$app->request->get("uid");
        $id   = Yii::$app->request->get("id");
        $data = Method::post("http://order.viplgw.cn/pay/api/gre-order", ['uid' => $uid, 'pageSize' => 30, 'page' => 1,]);
        $data = json_decode($data, true);
        foreach ($data['data'] as $k => $v) {
            if ($v['id'] == $id) $data = $v;
        }
        $model          = new Content();
        $sign           = $model->getClass(['fields' => 'duration,commencement,performance', 'where' => "c.id={$data['contentId']}", 'pageSize' => 1]);
        $data['detail'] = (count($sign) > 0) ? $sign[0] : '';
        die(json_encode($data));
    }

    /**
     * 立即购买
     * by yanni
     */
    public function actionBuyNow()
    {
        $model   = new Content();
        $goodsId = Yii::$app->request->post('id');
        $num     = Yii::$app->request->post('num');
        $uid     = Yii::$app->request->post('uid');
        if (!$uid) {
            $re = ['code' => 2];
            die(json_encode($re));
        }
        $goods           = $model->getGoods($goodsId);
        $totalMoney      = $goods[0]['price'] * $num;
        $goods[0]['num'] = $num;
        $data            = ['typeUrl' => 'greUrl', 'type' => 6, 'totalMoney' => $totalMoney, 'goods' => $goods];
        $re              = ['code' => 1, 'data' => serialize($data)];
        die(json_encode($re));
    }

    /**
     * 题目收藏
     * by yanni
     */
    public function actionUserQuestionCollection()
    {
        $questionId = Yii::$app->request->post('questionId');
        $uid        = Yii::$app->request->post('uid');
        if ($uid) {
            $userCollection = UserCollection::find()->asArray()->where("uid={$uid} and questionId={$questionId}")->one();
            if ($userCollection) {
                UserCollection::deleteAll("id={$userCollection['id']}");
                $res = ['code' => 2, 'message' => '取消收藏成功'];
            } else {
                $model             = new UserCollection();
                $model->uid        = $uid;
                $model->questionId = $questionId;
                $model->createTime = time();
                $model->save();
                SynchroLog::updateAll(['lastTime' => time()], "uid={$uid}"); //最后操作时间
                $res = ['code' => 1, 'message' => '收藏成功'];
            }
        } else {
            $res = ['code' => 0, 'message' => '请登录'];
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
        $uid  = Yii::$app->request->post("uid");

        $upload = new \UploadFile();

        $upload->int_max_size = 3145728;

        $upload->arr_allow_exts = array('jpg', 'gif', 'png', 'jpeg');

        $upload->str_save_path = Yii::$app->params['upImage'];

        $arr_rs = $upload->upload($file);

        if ($arr_rs['int_code'] == 1) {
            $filePath    = '/' . Yii::$app->params['upImage'] . $arr_rs['arr_data']['arr_data'][0]['savename'];
            $res['code'] = 1;

            $res['message'] = '上传成功';

            $res['image'] = $filePath;
            User::updateAll(['image' => $filePath], "uid = $uid");

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
    public function actionTeacherDetail()
    {
        $id               = Yii::$app->request->get("teacherid");
        $teacher          = Teacher::find()->where("id = $id")->asArray()->one();
        $teacher['label'] = explode(',', $teacher['label']);
        $course           = explode("\r", $teacher['course']);
        foreach ($course as $kk => $vv) {
            $arr = explode(',', $vv);
            if (count($arr) == 2) {
                $course[$kk] = $arr;
            } else {
                $course[$kk] = array('', '');
            }
        }
        $teacher['articles'] = TeacherContent::find()->select("title,view,fine,image,label")->where("teacherId = $id")->asArray()->all();
        $teacher['course']   = $course;
        die(json_encode($teacher));
    }

    /**
     * wap改版
     * cy
     * 单项练习\考点练习进入
     * 一级
     */
    public function actionPractice()
    {
        $uid      = Yii::$app->request->post('uid',0);
        $type     = Yii::$app->request->post('type',0);//1-单项练习  2-考点练习
        $catId    = Yii::$app->request->post('catId',0);//填空 阅读 数学
        $sections = QuestionCat::find()->asArray()->all();  //单项分类
        if ($type == 1) {
            $sourceModel = new SourceCat();
            $sources     = $sourceModel->getSource($catId);  //来源
        } else {//获取考点题型
            $sources = QuestionKnow::find()->asArray()->where(['catId' => $catId])->all();
        }
        foreach ($sources as $k => $v) {
            if ($type == 1) {
                $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$catId} and type=$type and sourceId={$v['id']}")->all();  //单项题库
            } else {
                $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$catId} and type=$type and knowId={$v['id']}")->all();  //题库题目
            }
            $totalNum = 0;
            foreach ($totalQuestions as $kd => $vd) {
                $qmodel       = new \app\modules\question\models\QuestionLibrary();
                $totalSubject = $qmodel->getLibraryQuestionNum($vd['id']);   //所有题目
                $totalNum     = $totalNum + $totalSubject;
            }
            if ($uid) {
                $wheres = "ua.uid=$uid and answerType=1";
                if ($catId) {
                    $wheres .= " AND q.catId=$catId";
                }
                if($type == 1){
                    $wheres .= " AND q.sourceId={$v['id']}";
                }else{
                    $wheres .= " AND q.knowId={$v['id']}";
                }

                $answeModel    = new UserAnswer();
                $userAnswerNum = $answeModel->getUserAnswerCount($wheres);
            } else {
                $userAnswerNum = 0;
            }
            $sources[$k]['total'] = $totalNum;
            $sources[$k]['do']    = $userAnswerNum;
        }
        die(json_encode(['code' => 1, 'message' => 'success', 'data' => ['type' => $type, 'catId' => $catId, 'uid' => $uid, 'section' => $sections, 'source' => $sources]]));
    }

    /**
     * wap改版
     * cy
     * 单项练习
     * 二级
     */
    public function actionPracticeChildSection()
    {
        $uid       = Yii::$app->request->post('uid');
        $catId     = Yii::$app->request->post('catId', 1);//填空 阅读 数学
        $sourceId  = Yii::$app->request->post('source', 0);//来源
        $page      = Yii::$app->request->post('page', 1);
        $where     = " catId={$catId} and type=1 and sourceId={$sourceId}";
        $qmodel    = new \app\modules\question\models\QuestionLibrary();
        $data      = $qmodel->getQuestionLibrary($where, $page, 10);
        $questions = $data['data'];
        $quesData  = self::questionShare($questions, $uid);
        die(json_encode(['code' => 1, 'message' => 'success', 'data' => $quesData, 'uid' => $uid, 'catId' => $catId, 'source' => $sourceId, 'totalPage' => $data['totalPage'], 'total' => $data['count']]));
    }

    /**
     * 数据优化
     * 单项、考点
     * wap改版
     */
    public static function questionShare($questions, $uid)
    {
        $quesData = [];
        foreach ($questions as $k => $v) {
            $amodel         = new UserAnswer();
            $qmodel         = new \app\modules\question\models\QuestionLibrary();
            $quesNum        = $qmodel->getLibraryQuestionNum($v['id']);    //题库题目数量
            $do             = $qmodel->getLibraryDoQuestionTotalUser($v['id']);   //做题人数
            $doQuesNumTotal = $do * 2 * 3 + 123;   //做题人数
            $myState        = $amodel->getUserCompleteState($v['id'], $uid);  //获取当前用户题库做题情况;
            $myDo           = isset($myState['doNum']) ? $myState['doNum'] : 0;
            if ($myDo >= $quesNum) {
                $status = 2;//0-未开始 1-中断 2-完成
            } else {
                $status = empty($myState['doNum']) ? 0 : 1;
            }
            $quesData[] = ['id' => $v['id'], 'catId' => $v['catId'], 'courseId' => $v['sourceId'], 'name' => $v['name'], 'myDo' => $myDo, 'quesNum' => $quesNum, 'peopleDo' => $doQuesNumTotal, 'status' => $status];
        }
        return $quesData;
    }

    /**
     * wap改版
     * 考点练习
     * 二级
     * cy
     */
    public function actionPracticeChildKnow()
    {
        $uid         = Yii::$app->request->post('uid');
        $catId       = Yii::$app->request->post('catId', 1);
        $knowId      = Yii::$app->request->post('knowId', 1);
        $page        = Yii::$app->request->post('page', 1);
        $sourceId    = Yii::$app->request->post('source', 0);
        $sourceModel = new SourceCat();
        $sources     = $sourceModel->getSource($catId);  //来源
        $where     = " catId={$catId} and type=2 and knowId={$knowId} ";
        if ($sourceId) {
            $where .= " and  sourceId=$sourceId";
        }else{
            $sourceIds = $sourceModel->getSourceId($catId);
            if($sourceIds){
                $where .= " and sourceId in ($sourceIds)";
            }
        }
        $qmodel    = new \app\modules\question\models\QuestionLibrary();
        $data      = $qmodel->getQuestionLibrary($where, $page, 10);
        $questions = $data['data'];
        $quesData  = self::questionShare($questions, $uid);
        die(json_encode(['code' => 1, 'message' => 'success', 'data' => ['questions' => $quesData, 'source' => $sources, 'total' => $data['count'], 'totalPage' => $data['totalPage']]]));
    }

    /**
     * wap改版
     * 题目详情页面
     * 发表解析
     * cy
     */
    public function actionAddAnalysis()
    {
        $uid        = Yii::$app->request->post('uid');
        $aContent   = Yii::$app->request->post('aContent', '');
        $questionId = Yii::$app->request->post('questionId');
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '请登录']));
        }
        if ($questionId) {
            $model                  = new UserAnalysis();
            $model->questionId      = $questionId;
            $model->uid             = $uid;
            $model->analysisContent = $aContent;
            $model->type            = 1;
            $model->publish         = 2;
            $model->createTime      = time();
            $r                      = $model->save();
            if ($r > 0) {
                SynchroLog::updateAll(['lastTime' => time()], "uid={$uid}"); //最后操作时间
                $res = ['code' => 1, 'message' => '提交成功，请等待审核'];
            } else {
                $res = ['code' => 0, 'message' => '提交失败'];
            }
        } else {
            $res = ['code' => 0, 'message' => '问题不存在'];
        }
        die(json_encode($res));
    }

    /**
     * 用户题目评论接口
     * by yanni
     */
    public function actionQuestionComment()
    {
        $uid        = Yii::$app->request->post('uid');
        $questionId = Yii::$app->request->post('questionId');
        $content    = Yii::$app->request->post('content');
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '请登录']));
        }
        if ($content && $questionId) {
            $model               = new UserComment();
            $model->questionId   = $questionId;
            $model->uid          = $uid;
            $model->content      = $content;
            $model->type         = 1;
            $model->createTime   = time();
            $model->commentImage = '';
            $r                   = $model->save();
            if ($r > 0) {
                $data = $model->getCommentById($model->primaryKey);
                $res  = ['code' => 1, 'data' => $data, 'message' => '评论成功'];
            } else {
                $res = ['code' => 0, 'message' => '评论失败'];
            }
        } else {
            $res = ['code' => 0, 'message' => '评论不能为空'];
        }
        die(json_encode($res));
    }

    /**
     * 用户回复接口
     * by yanni
     */
    public function actionQuestionReply()
    {
        $uid        = Yii::$app->request->post('uid');
        $questionId = Yii::$app->request->post('questionId');
        $content    = Yii::$app->request->post('content');
        $replyName  = Yii::$app->request->post('replyName');
        $replyUid   = Yii::$app->request->post('replyUid');
        $commentId  = Yii::$app->request->post('commentId');
        if (!$uid) {
            die(json_encode(['code' => 0, 'message' => '请登录']));
        }
        if ($content && $questionId && $commentId && $replyName) {
            $model             = new UserComment();
            $model->questionId = $questionId;
            $model->pid        = $commentId;
            $model->uid        = $uid;
            $model->content    = $content;
            $model->type       = 2;
            $model->createTime = time();
            $model->replyUid   = $replyUid;
            $model->replyName  = $replyName;
            $r                 = $model->save();
            if ($r > 0) {
                $data = $model->getCommentById($model->primaryKey);
                $res  = ['code' => 1, 'data' => $data, 'message' => '回复成功'];
            } else {
                $res = ['code' => 0, 'message' => '回复失败'];
            }
        } else {
            $res = ['code' => 2, 'message' => '回复不能为空'];
        }
        die(json_encode($res));
    }

    /**
     * 热门咨询
     * more
     * //热门咨询-543 GRE百科-544  名师专栏-0   备考心经 -537
     * wap改版
     */

    public function actionHotInfoMore()
    {
        //热门咨询-543 GRE百科-544  名师专栏-0   备考心经 -537
        $hotInfo  = [
            ['id' => 543, 'cate' => '热门资讯'],
            ['id' => 544, 'cate' => 'GRE百科'],
            ['id' => 0, 'cate' => '名师专栏'],
            ['id' => 537, 'cate' => '备考心经'],
        ];
        $id       = Yii::$app->request->post('id', 543);
        $page     = Yii::$app->request->post('page', 1);
        $pageSize = 10;
        $offset   = ($page - 1) * $pageSize;
        if ($id > 0) {//不是名师专栏
            $content = Content::find()->select('id,title,image,viewCount as view,createTime')->where("catId = {$id}")->asArray()->orderBy('createTime desc')->offset($offset)->limit($pageSize)->all();
        } else {
            $content = TeacherContent::find()->select('id,title,image,view,createTime')->asArray()->orderBy('createTime desc ')->offset($offset)->limit($pageSize)->all();
        }
        $data = ['code' => 1, 'message' => 'success', 'data' => ['hotNav' => $hotInfo, 'content' => $content, 'id' => $id]];
        die(json_encode($data));
    }

    /**
     * 文章详情页接口(GRE备考)
     * by cy
     * wap改版
     * 热门咨询-543 GRE百科-544  名师专栏-0   备考心经 -537]
     * 老师文章详情
     */
    public function actionArticleDetailNew()
    {
        $contentid   = Yii::$app->request->post('contentid',0);
        $uid         = Yii::$app->request->post("uid");
        $data        = TeacherContent::find()->select("id,teacherId,title,view as viewCount,fine as fabulous,image,label,keywords,hot,introduce as answer,content as description,createTime,createTime as alternatives")->asArray()->where("id = $contentid")->all();
        $artcomments = TeachercolumnComment::find()->select('*,fine as fane')->asArray()->where("contentId = $contentid and pid = 0")->orderBy("id desc")->limit(20)->all();
        foreach ($artcomments as $kk => $vv) {
            $userid                       = $vv["userId"];
            $userinfo                     = User::find()->asArray()->select(['image', 'nickname', 'userName'])->where("uid = $userid")->one();
            $artcomments[$kk]['image']    = $userinfo['image'];
            $artcomments[$kk]['nickname'] = $userinfo['nickname'];
            $artcomments[$kk]['userName'] = $userinfo['userName'];
            $datas                        = TeachercolumnComment::find()->asArray()->where("contentId = $contentid and pid != 0 and fpid = {$vv['id']}")->orderBy("id asc")->all();
            if (!empty($datas)) {
                foreach ($datas as $ki => $ko) {
                    $pid_user                 = TeachercolumnComment::find()->select('*,fine as fane')->where("id = {$ko['pid']}")->one()['userId'];
                    $p_user                   = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $pid_user")->one();
                    $datas[$ki]['replyImage'] = $p_user["image"];
                    $datas[$ki]["replyName"]  = $p_user["nickname"] ? $p_user["nickname"] : $p_user['userName'];
                    $self                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = {$ko['userId']}")->one();
                    $datas[$ki]['image']      = $self['image'];
                    $datas[$ki]['nickname']   = $self['nickname'];
                    $datas[$ki]['userName']   = $self['userName'];
                }
            }
            $artcomments[$kk]["reply"]      = $datas;
            $artcomments[$kk]["countreply"] = count($datas);
        }
        $commentCount           = TeachercolumnComment::find()->select('id')->asArray()->where("contentId = $contentid and pid = 0")->count();
        $userComment            = ['data' => $artcomments, 'count' => $commentCount];
        $model                  = new Content();
        $hotarticle             = $model->getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 4]);//热门文章
        $data[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data[0]['description']);
        $data[0]['description'] = strip_tags($data[0]['description'], '<img>,<p></p>');
        foreach ($userComment['data'] as $k => $v) {//评论点赞
            $fine = $v['fane'];
            if (is_null($fine)) {
                $fine = rand(5, 25);
                UserComment::updateAll(['fane' => $fine], "id = {$v['id']}");
                $userComment['data'][$k]['fine'] = $fine;
            }
            $userComment['data'][$k]['content'] = $v['comment'];
            $userComment['data'][$k]['createTime'] = strtotime($v['createTime']);
        }
        foreach ($data as $kk => $vv) {
            $fine = $vv["fabulous"];
            if (is_null($fine)) {
                $fine = 0;
            }
            $cfine = TeachercolumnComment::find()->select("fine as fane")->where("contentId = $contentid")->asArray()->all();
            if (empty($cfine)) {
                $sumfine = 0;
            } else {
                foreach ($cfine as $key => $u) {
                    $finearr[] = $u['fane'];
                }
                $sumfine = array_sum($finearr);
            }
            $all               = $fine + $sumfine;
            $data[$kk]['fine'] = $all;
        }
        //是否收藏文章
        if ($uid) {
            $res = UserCollection::find()->where("uid = $uid and tea_artId = $contentid")->one();
            if ($res) {
                $collecte = 1;
            } else {
                $collecte = 0;
            }
        } else {
            $collecte = 0;
        }

        $viewCount = $data[0]['viewCount'];
        if(!$viewCount){
            $viewCount = 1;
        }else{
            $viewCount += 1;
        }
        TeacherContent::updateAll(['view'=>$viewCount],"id = $contentid");
        $contents = ['data' => $data, 'userComment' => $userComment, 'hotarticle' => $hotarticle, 'collecte' => $collecte];
        die(json_encode(['code' => 1, 'message' => 'success', 'data' => $contents]));
    }

    /**
     * 内容文章收藏
     * by yanni
     */
    public function actionUserContentCollection(){
        $contentId = Yii::$app->request->post('contentId');
        $uid = Yii::$app->request->post('uid');
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
                $res = ['code' => 1,'message'=>'取消收藏成功'];
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
     * 真题机经
     * more
     * wap改版
     */

    public function actionRealQuestionMore()
    {
        $page  = Yii::$app->request->post('page', 1);
        $catId = Yii::$app->request->post('catId', 42);// 42-GRE备考  43-机经真题
        if ($catId != 42) $catId = 43;
        $questions = file_get_contents("https://bbs.viplgw.cn/cn/wap-api/real-problem-more?page=$page&catId=$catId");
        die($questions);
    }

    /**
     * 高分案例
     * more
     * cy
     * wap改版
     */
    public function actionHighScoreMore()
    {
        //高分案例
        $page       = Yii::$app->request->post('page', 1);
        $examples   = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '531', 'page' => $page, 'pageSize' => 10, 'pageStr' => 1]);
        $data       = $examples['data'];
        $highScores = [];
        foreach ($data as $d => $c) {
            $dates        = explode('-', explode(' ', $c['createTime'])[0]);
            $date         = intval($dates[1]) . '月' . intval($dates[2]) . '日';
            $highScores[] = ['id' => $c['id'], 'image' => $c['image'], 'title' => $c['title'], 'name' => $c['answer'], 'date' => $date];
        }
        $data = ['code' => 1, 'message' => 'success', 'data' => ['total' => $examples['count'], 'totalPage' => $examples['total'], 'data' => $highScores]];
        die(json_encode($data));
    }

    /**
     * 高分案例
     * 案例详情
     * cy
     * wap改版
     */
    public function actionHighScoreDetail()
    {
        $id    = Yii::$app->request->post('id', 0);
        $model = new Content();
        $data  = $model->getClass(['where' => 'c.pid=0 and c.id=' . $id, 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description']);
        $other = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0 and c.id !=' . $id, 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering', 'category' => '531', 'page' => 1, 'pageSize' => 5, 'pageStr' => 1]);
        $data[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $data[0]['description']);
        $data  = ['code' => 1, 'message' => 'success', 'data' => ['score' => $data[0], 'others' => $other['data']]];
        die(json_encode($data));
    }

    /**
     * 专家名师
     * more
     * wap改版
     */
    public function actionTeachersMore()
    {
        $page     = Yii::$app->request->post('page', 1);
        $pageSize = 10;
        $offset   = ($page - 1) * $pageSize;
        //专家名师
        $teachers = Teacher::find()->select('id,image,name,introduce,numberLessons')->asArray()->orderBy('sort desc')->offset($offset)->limit($pageSize)->all();
        $count    = Teacher::find()->count();
        $data     = ['code' => 1, 'message' => 'success', 'data' => ['teacher' => $teachers, 'total' => $count]];
        die(json_encode($data));
    }

    /**
     * 专家名师
     * wap改版
     * 名师详情
     * cy
     */
    public function actionTeacherDetailNew()
    {
        $teacherId  = Yii::$app->request->post('teacherId');
        $teacherObj = Teacher::findOne($teacherId);
        //欢迎度
        //收藏人数
        $collectes = TeacherCollection::find()->asArray()->count();
        $collecte  = TeacherCollection::find()->asArray()->where("teacherId = $teacherId")->count();
        if ($collectes == 0) {
            $welcome = 0;
        } else {
            $welcome = ceil(($collecte / $collectes) * 100);
        }
        //高分学员数量
        $highStudent = Content::find()->where("catId = 531")->count();
        //老师评价数
        $pidcount = TeachercolumnComment::find()->select("id")->asArray()->where("teacherId = $teacherId and pid = 0")->orderBy("id desc")->count();
        //高分学员
        $examples = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '531', 'page' => 1, 'pageSize' => 5, 'pageStr' => 1]);
        $data     = $examples['data'];
        foreach ($data as $d => $c) {
            $dates        = explode('-', explode(' ', $c['createTime'])[0]);
            $date         = intval($dates[1]) . '月' . intval($dates[2]) . '日';
            $highScores[] = ['id' => $c['id'], 'image' => $c['image'], 'title' => $c['title'], 'name' => $c['answer'], 'date' => $date];
        }
        //老师评价
        $comments = TeachercolumnComment::find()->asArray()->where("teacherId = $teacherId and pid = 0")->orderBy("id desc")->limit(5)->all();
        foreach ($comments as $key => $value) {
            $userid                     = $value['userId'];
            $user                       = User::find()->asArray()->select(['image', 'nickname', 'userName'])->where("uid = $userid")->one();
            $comments[$key]['image']    = $user['image'];
            $comments[$key]['nickname'] = $user['nickname'];
            $comments[$key]['userName'] = $user['userName'];
            $comments[$key]['site']     = ($pidcount - $key);
            $datas                      = TeachercolumnComment::find()->asArray()->where("teacherId = $teacherId and pid != 0 and fpid ={$value['id']}")->orderBy("id asc")->all();
            if (!empty($datas)) {
                foreach ($datas as $ki => $ko) {
                    $pid_user                 = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                    $p_user                   = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $pid_user")->one();
                    $datas[$ki]['replyImage'] = $p_user["image"];
                    $datas[$ki]["replyName"]  = $p_user["nickname"] ? $p_user["nickname"] : $p_user["userName"];
                    $self                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = {$ko['userId']}")->one();
                    $datas[$ki]['image']      = $self['image'];
                    $datas[$ki]['nickname']   = $self['nickname'];
                    $datas[$ki]['userName']   = $self['userName'];
                }
            }
            $comments[$key]['replyCount'] = count($datas);
            $comments[$key]["reply"] = $datas;
        }

        $teacher = ['id' => $teacherId, 'name' => $teacherObj->name,'image'=>$teacherObj->image, 'introduce' => $teacherObj->introduce, 'detail' => $teacherObj->detail, 'label' => $teacherObj->label, 'welcome' => $welcome . '%', 'highScoreTotal' => $highStudent, 'commentTotal' => $pidcount, 'highScore' => $highScores, 'comment' => $comments];
        $data    = ['code' => 1, 'message' => 'message', 'data' => $teacher];
        die(json_encode($data));
    }

    /**
     * 专家名师
     * 老师详情
     * 数据分页 高分案例、评论
     * cy
     * wap改版
     */
    public function actionTeacherDetailPage()
    {
        $type      = Yii::$app->request->post('type', 1);//1-高分 2-评论
        $page      = Yii::$app->request->post('page', 1);
        $teacherId = Yii::$app->request->post('teacherId', 0);
        $pageSize  = 5;
        if ($type == 1) {
            $highScores = [];
            //高分学员
            $examples = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '531', 'page' => $page, 'pageSize' => $pageSize, 'pageStr' => 1]);
            $data     = $examples['data'];
            foreach ($data as $d => $c) {
                $dates        = explode('-', explode(' ', $c['createTime'])[0]);
                $date         = intval($dates[1]) . '月' . intval($dates[2]) . '日';
                $highScores[] = ['id' => $c['id'], 'image' => $c['image'], 'title' => $c['title'], 'name' => $c['answer'], 'date' => $date];
            }
            $data = ['code' => 1, 'message' => 'success', 'data' => $highScores];
        } else {
            if ($teacherId < 1) {
                die(json_encode(['code' => 0, 'message' => '老师参数错误']));
            }
            $offset = $pageSize * ($page - 1);
            //老师评价
            $comments = TeachercolumnComment::find()->asArray()->where("teacherId = $teacherId and pid = 0")->orderBy("id desc")->offset($offset)->limit($pageSize)->all();
            foreach ($comments as $key => $value) {
                $userid                     = $value['userId'];
                $user                       = User::find()->asArray()->select(['image', 'nickname', 'userName'])->where("uid = $userid")->one();
                $comments[$key]['image']    = $user['image'];
                $comments[$key]['nickname'] = $user['nickname'];
                $comments[$key]['userName'] = $user['userName'];
                $datas                      = TeachercolumnComment::find()->asArray()->where("teacherId = $teacherId and pid != 0 and fpid = {$value['id']}")->orderBy("id asc")->all();
                if (!empty($datas)) {
                    foreach ($datas as $ki => $ko) {
                        $pid_user                 = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                        $p_user                   = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $pid_user")->one();
                        $datas[$ki]['replyImage'] = $p_user["image"];
                        $datas[$ki]["replyName"]  = $p_user["nickname"] ? $p_user["nickname"] : $p_user["userName"];
                        $self                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = {$ko['userId']}")->one();
                        $datas[$ki]['image']      = $self['image'];
                        $datas[$ki]['nickname']   = $self['nickname'];
                        $datas[$ki]['userName']   = $self['userName'];
                    }
                }
                $comments[$key]['replyCount'] = count($datas);
                $comments[$key]["reply"] = $datas;
            }
            $data = ['code' => 1, 'message' => 'success', 'data' => $comments];
        }
        die(json_encode($data));
    }

    /**
     * 名师详情
     * 老师评论
     * 二级
     * cy
     * wap改版
     */
    public function actionTeacherCommentOne(){
        $commentId = Yii::$app->request->post('commentId',0);
        $comment = TeachercolumnComment::find()->asArray()->where("id = $commentId")->one();
        $userid                     = $comment['userId'];
        $user                       = User::find()->asArray()->select(['image', 'nickname', 'userName'])->where("uid = $userid")->one();
        $comment['image']    = $user['image'];
        $comment['nickname'] = $user['nickname'];
        $comment['userName'] = $user['userName'];
        $datas                      = TeachercolumnComment::find()->asArray()->where(" pid != 0 and fpid = {$comment['id']}")->orderBy("id asc")->all();
        if (!empty($datas)) {
            foreach ($datas as $ki => $ko) {
                $pid_user                 = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                $p_user                   = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $pid_user")->one();
                $datas[$ki]['replyImage'] = $p_user["image"];
                $datas[$ki]["replyName"]  = $p_user["nickname"] ? $p_user["nickname"] : $p_user["userName"];
                $self                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = {$ko['userId']}")->one();
                $datas[$ki]['image']      = $self['image'];
                $datas[$ki]['nickname']   = $self['nickname'];
                $datas[$ki]['userName']   = $self['userName'];
            }
        }
        $comment['replyCount'] = count($datas);
        $comment["reply"] = $datas;
        $data = ['code'=>1,'message'=>'success','data'=>$comment];
        die(json_encode($data));
    }
    /**
     * 评论点赞 名师、名师专栏
     * cy
     */
    public function actionAddFineTeacher()
    {
        $commentId = Yii::$app->request->post("commentId");
        $data      = TeachercolumnComment::find()->where("id = $commentId")->one();
        if (is_null($data->fine)) {
            $data->fine = 1;
        } else {
            $data->fine = ($data->fine + 1);
        }
        $res = $data->save();
        if ($res) {
            $return = ['code' => 1, 'message' => 'success', 'fine' => $data->fine];
        } else {
            $return = ['code' => 0, 'message' => 'fail'];
        }
        die(json_encode($return));
    }

    /**
     * 评论
     * cy 名师系列
     * type  1-评论 2-回复
     */

    public function actionAddComment()
    {
        $userid    = Yii::$app->request->post("uid");
        $comment   = Yii::$app->request->post('comment');
        $teacherid = Yii::$app->request->post("teacherId");
        $contentid = Yii::$app->request->post("contentId");
        $type      = Yii::$app->request->post("type", 1);
        if ($type == 2) {
            $pid  = Yii::$app->request->post("pid");//父级id
            $fpid = Yii::$app->request->post("fpid");//顶级id
        } else {
            $pid  = 0;
            $fpid = 0;
        }
        if ($teacherid) {
            $access = 1;//老师
            $teaid  = $teacherid;
            $conid  = 0;
        }
        if ($contentid) {
            $teaid  = 0;
            $access = 2;//文章
            $conid  = $contentid;
        }
        $time              = date('Y-m-d H:i:s ', time());
        $model             = new TeachercolumnComment();
        $model->userId     = $userid;
        $model->teacherId  = $teaid;
        $model->contentId  = $conid;
        $model->comment    = $comment;
        $model->type       = $type;
        $model->createTime = $time;
        $model->pid        = $pid;
        $model->fpid       = $fpid;
        $res               = $model->save();
        if ($res) {
            if ($access == 1) {
                $str = "teacherId";
                $sid = $teacherid;
            } else {
                $str = "contentId";
                $sid = $contentid;
            }
            $pidcount = TeachercolumnComment::find()->select("id")->asArray()->where("$str = $sid and pid = 0")->orderBy("id desc")->count();

            $comments = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid = 0")->orderBy("id desc")->limit(5)->all();
            foreach ($comments as $k => $v) {
                $comments[$k]['key']      = $pidcount - $k;
                $uid                      = $v['userId'];
                $user                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $uid")->one();
                $comments[$k]['image']    = $user['image'];
                $comments[$k]['nickname'] = $user['nickname'];
                $comments[$k]['userName'] = $user['userName'];
                $datas                    = TeachercolumnComment::find()->asArray()->where("$str = $sid and pid != 0 and fpid = {$v['id']}")->orderBy("id asc")->all();
                if (!empty($datas)) {
                    foreach ($datas as $ki => $ko) {
                        $pid_user                 = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                        $p_user                   = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = $pid_user")->one();
                        $datas[$ki]['replyImage'] = $p_user["image"];
                        $datas[$ki]["replyName"]  = $p_user["nickname"] ? $p_user['nickname'] : $p_user['userName'];
                        $self                     = User::find()->asArray()->select("id,image,nickname,userName")->where("uid = {$ko['userId']}")->one();
                        $datas[$ki]['uimage']     = $self['image'];
                        $datas[$ki]['nickname']   = $self['nickname'];
                        $datas[$ki]['userName']   = $self['userName'];
                    }
                }
                $comments[$k]["reply"] = $datas;
            }
            $data = array('code' => 1, 'message' => '评论成功', 'comments' => $comments, 'totalcount' => $pidcount);

        } else {
            $data = array('code' => 0, 'message' => '评论失败');
        }
        die(json_encode($data));
    }

    /**
     * 热门课程
     * more
     * wap改版
     * cy
     */
    public function actionHotCourseMore()
    {
        $type = Yii::$app->request->post('type', 1); //1-热门课 2-冲刺课 3-封闭课 4-单项课
        if ($type == 1) {
            $pid = 8028;
        } elseif ($type == 2) {
            $pid = 8064;
        } elseif ($type == 3) {
            $pid = 8211;
        } else {
            $pid = 8049;
        }
        $course = Content::getWapCourse($pid);
        $data   = ['code' => 1, 'message' => 'success', 'data' => $course];
        die(json_encode($data));
    }

    /**
     * 热门课程
     * 课程详情
     * wap改版
     * cy
     */

    public function actionCourseDetail(){
        $contentid = Yii::$app->request->post("contentid");
        $type      = Yii::$app->request->post('type');
        if (!$type) $type = 1; //1-课程介绍 2-授课名师 3-学习资料 4-用户评价 默认为1
        $model = new Content();
        $sign  = $model->findOne($contentid);
        if ($sign->pid == 0) {
            $data = Content::find()->where("pid = $contentid")->one();
            if ($data) {
                $contentid = $data['id'];
            } else {
                $data = ['code' => 0, 'message' => '商品缺少详情'];
                die(json_encode($data));
            }
        }
        $data     = $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance，alternatives,article', 'where' => "c.id=$contentid", 'pageSize' => 1]);
        $parent   = $model->getClass(['fields' => 'description,listeningFile,trainer', 'where' => "c.id=$sign->pid"]);
        $tagModel = new ContentTag();
        $tag      = $tagModel->getWapTag($contentid);
        $count    = $parent[0]['viewCount'];
        Content::updateAll(['viewCount' => ($count + 1)], "id=$sign->pid");
        $endTime = strtotime($data[0]['article']);
        if ($endTime < time()) {
            $surplusTime = '已结束';
        } else {
            $surplusTime = $endTime - time();
        }
        $data[0]['article']       = $surplusTime;
        $pid                      = $sign->pid;
        $modelu                   = new UserComment();
        $comment                  = $modelu->getUserComment($contentid, 1, 5);
        $audition                 = Livesdkid::find()->asArray()->where("contentId={$contentid}")->one();
        $parent[0]['description'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $parent[0]['description']);
        $parent[0]['trainer'] = str_replace('src="/', 'src="https://gre.viplgw.cn/', $parent[0]['trainer']);
        $contents                 = ['id' => $contentid, 'pid' => $pid, 'count' => $count, 'tag' => $tag, 'data' => $data[0], 'parent' => $parent[0], 'comment' => $comment, 'audition' => $audition, 'type' => $type];
        $data                     = ['code' => 1, 'message' => 'success', 'data' => $contents];
        die(json_encode($data));
    }
    /**
     * 免费试听
     * wap改版
     * cy
     */
    public function actionFreeListen(){
        $model = new Course();
        $auditionCourse = $model->auditionCourse();
        $data = ['code'=>1,'message'=>'success','data'=>$auditionCourse];
        die(json_encode($data));
    }
    /**
     * appGRE订单（已购课程）
     * by  yanni
     * wap改版 不分类型  全部获取
     */
    public function actionMyOrderNew(){
        $uid = Yii::$app->request->post('uid');
        if(!$uid){
            die(json_encode( ['code'=>99,'message'=>'请登录']));
        }
        $page = Yii::$app->request->post('page',1);
        $model = new Content();
        $data = Method::post("http://order.viplgw.cn/pay/api/gre-order",['uid' => $uid,'idStr' => '','pageSize' => 20,'page' => $page]);
        $data = json_decode($data,true);
        $user = User::find()->asArray()->select(['username','nickname'])->where("uid=$uid")->one();
        if($user['nickname']==''){
            $nickname = $user['username'];
        } else{
            $nickname = $user['nickname'];
        }
        $arrData = array();
        foreach($data['data'] as $k=>$v){
            $videos = [];
            $sign = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$v['contentId']}",'pageSize' => 1]);
            $detail = '';
            $detail['duration'] = $sign[0]['duration'];
            $detail['commencement'] = $sign[0]['commencement'];
            $detail['performance'] = $sign[0]['performance'];
            $detail['name'] = $sign[0]['name'];
            $detail['image'] = $sign[0]['image'];
            $arrData[$k]['detail'] =  $detail;
            $arrData[$k]['id'] = $v['id'];
            $arrData[$k]['orderNumber'] = $v['orderNumber'];
            $arrData[$k]['totalMoney'] = $v['totalMoney'];
            $arrData[$k]['freight'] = $v['freight'];
            $arrData[$k]['status'] = $v['status'];
            $arrData[$k]['createTime'] = $v['createTime'];
            $arrData[$k]['expireTime'] = $v['endTime2'];
            $arrData[$k]['payTime'] = $v['payTime'];
            $arrData[$k]['price'] = $v['price'];
            $arrData[$k]['contentId'] = $v['contentId'];
            $arrData[$k]['num'] = $v['num'];
            $arrData[$k]['nickname'] = $nickname;
            $arrData[$k]['consignee'] = $v['consignee'];
            if($v['startTime']<=time() && $v['endTime2']>=time()) {
                $sdk = Livesdkid::find()->asArray()->select(['livesdkid','clientKey','auditionKey','classroom','sdkType'])->where("contentId={$v['contentId']}")->one();
                if($v['endTime']<time()){
                    $sdk['livesdkid'] = '';
                }
                $arrData[$k]['Livesdkid'] =  $sdk;
                $types = Video::find()->select("type,typeSort")->asArray()->where("cid={$v['contentId']} and grade='".$v['grade']."'")->groupBy("type")->orderBy("typeSort asc")->all();
                foreach($types as $j => $t){
                    $video = Video::find()->asArray()->select(['id','name','sdk','pwd','liveId'])->where("cid={$v['contentId']} and grade='".$v['grade']."' and type = '".$t['type']."'")->orderBy("sort desc")->all();
                    $videos[] = ['type'=>$t['type'],'typeSort'=>$t['typeSort'],'data'=>$video];
                }
                $arrData[$k]['video'] = $videos;
            }
        }
        die(json_encode(['code'=>1,'message'=>'success','data'=>$arrData]));
    }
    /**
     * app订单详情（已购课程）
     * by  yanni
     */
    public function actionPayOrderDetail()
    {
        $uid = Yii::$app->request->post('uid');
        $orderId = Yii::$app->request->post('orderId');
        if (!$uid) {
            die(json_encode(['code' => 99, 'message' => '请登录']));
        }
        $order = Method::post("http://order.viplgw.cn/pay/api/select-order",['orderId' => $orderId]);
        $order = json_decode($order,true);
        $model = new Content();
        $data = $model->getClass(['fields' => 'duration,commencement,performance','where' =>"c.id={$order['contentId']}",'pageSize' => 1]);
        $order['duration'] = $data[0]['duration'];
        $order['commencement'] = $data[0]['commencement'];
        $order['performance'] = $data[0]['performance'];
        $order['name'] = $data[0]['name'];
        $order['image'] = $data[0]['image'];
        die(json_encode(['code' => 1, 'data' => $order]));
    }
    /**
     * 用户评论接口
     * by yanni
     */
    public function actionUserComment(){
        $uid = Yii::$app->request->post('uid');
        $contentId = Yii::$app->request->post('contentId');
        $content = Yii::$app->request->post('content');
//        $commentImage = Yii::$app->request->post('commentImage');
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
//            $model->commentImage = $commentImage;
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
}
