<?php

/**
 * toefl API
 * Created by PhpStorm.
 * User: obelisk
 */

namespace app\modules\cn\controllers;



use app\libs\Method;
use app\modules\cn\models\Login;
use app\modules\cn\models\User;
use app\modules\cn\models\UserEvaluation;
use app\modules\cn\models\UserRecord;
use yii;

use app\libs\ToeflApiControl;



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
class MiniApiController extends ToeflApiControl
{
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }

    public $enableCsrfValidation = false;



    /**
     * 总调度
     * @Obelisk
     */
    public function actionUnifyLogin(){
        $session = Yii::$app->session;
        $logins = new Login();
        $uid = Yii::$app->request->post('uid');
        $username = Yii::$app->request->post('username');
        $phone = Yii::$app->request->post('phone');
        $password = Yii::$app->request->post('password');
        $email =Yii::$app->request->post('email');
        $nickname =Yii::$app->request->post('nickname');
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
                if($username != $loginsdata['userName'] && $username){
                    Login::updateAll(['userName' => "$username"],"id={$loginsdata['id']}");
                }
                if(!empty($nickname) && $nickname != $loginsdata['nickname']){
                    Login::updateAll(['nickname' => "$nickname"],"id={$loginsdata['id']}");
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
            if(!empty($nickname) && $nickname != $loginsdata['nickname']){
                Login::updateAll(['nickname' => "$nickname"],"id={$loginsdata['id']}");
            }
            $loginsdata = $logins->find()->where("id={$loginsdata['id']}")->one();
        }
        $session->set('userId', $loginsdata['id']);
        $session->set('userData', $loginsdata);
//        $session->set('uid', $uid);
        $data = ['code'=>1,'session_uid'=>$session->get('uid'),'get_uid'=>$uid];
        die(json_encode($data));
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
     * gre 测评
     * 测评首cy
     */
    public function actionEvaluationIndex(){
        $uid = Yii::$app->request->post("uid");
        if($uid){
            $model = new UserRecord();
            $types = array(1,2);
            foreach($types as $k => $v){
                $type = $model::find()->where("uid = $uid and type = $v and over = 1")->one();
                if(empty($type) || !$type){
                    UserEvaluation::deleteAll("uid= $uid and type = $v ");
                    $do = 0;
                    $doid = 0;
                }else{
                    $do = 1;//是否做过该套测评  1-已做 0-未做
                    $doid = 0; //上次做到的测评题id  未做即为0
                }
                $arr[] = ['do'=>$do,'doId'=>$doid];
            }
            $one = $arr[0];//初级
            $two = $arr[1];//中级
            $data = ['code'=>1,'message'=>'success','data'=>['one'=>$one,'two'=>$two]];
        }else{
            $one = array('do'=>0,'doId'=>0);
            $two =arraY('do'=>0,'doId'=>0);
            $data = ['code'=>99,'message'=>'未登录','data'=>['one'=>$one,'two'=>$two]];
        }
        die(json_encode($data));
    }
    /**
     * gre 测评
     * 做题页面进入
     * cy
     */
    public function actionEvaluationDo(){
        $uid = Yii::$app->request->post("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $questionid = Yii::$app->request->post("questionId");
        $type = Yii::$app->request->post("type");//1-初级 2-中级
        if($type < 1){
            die(json_encode(['code'=>0,'message'=>'参数错误']));
        }
        if(!$questionid) $questionid = 0;
        $model = new UserEvaluation();
        $content = $model->getDetail($questionid,$type);
        if($questionid == 0){
            $hastime = 1800;
        }else{
            $hastime = UserEvaluation::find()->where("uid = $uid and type = $type ")->orderBy("id desc")->asArray()->all()[0]['hasTime'];
        }
        $times = $this->getMinute($hastime);
        $knowId = $content['typeId'];
        $optionA = $content['optionA'];
        if($optionA){
            $optionsA = Method::getTextHtmlArr($optionA);
            foreach($optionsA as $l => $t){
                $optionsA[$l] = strip_tags($t);
            }
            $content['optionsA'] = $optionsA;
        }else{
            $content['optionsA'] = array();
        }
        $optionB = $content['optionB'];
        if($optionA){
            $optionsB = Method::getTextHtmlArr($optionB);
            foreach($optionsB as $l => $t){
                $optionsB[$l] = strip_tags($t);
            }
            $content['optionsB'] = $optionsB;
        }else{
            $content['optionsB'] = array();
        }
        $optionC = $content['optionC'];
        if($optionC){
            $optionsC = Method::getTextHtmlArr($optionC);
            foreach($optionsC as $l => $t){
                $optionsC[$l] = strip_tags($t);
            }
            $content['optionsC'] = $optionsC;
        }else{
            $content['optionsC'] = array();
        }
        if($content['quantityA'] || $content['quantityB']){
            $content['quantityA'] = strip_tags($content['quantityA']);
            $content['quantityB'] = strip_tags($content['quantityB']);
        }
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if($knowId == 5 || $knowId == 6){
            $content['readArticles'] = Method::getTextHtmlArr($content['readArticle'])[0];
            $content['details'] = Method::getTextHtmlArr($content['details'])[0];
        }
        if($knowId == 7){
            $readArticle = Method::getTextHtmlArr($content['readArticle'])[0];
            $articles =  explode('.',$readArticle);
            foreach($articles as $k => $v){
                $articles[$k] = trim($v.'.');
            }
            $content['readArticles'] =$articles;
            $content['details'] = Method::getTextHtmlArr($content['details'])[0];
        }
        $data = ['code'=>1,'message'=>'success','data'=>['hastime'=>$hastime,'times'=>$times,'question'=>$content]];
        die(json_encode($data));
    }
//    /**
//     * gre 测评
//     * 剩余时间修改
//     * cy
//     */
//    public function actionHasTime(){
//        $uid = Yii::$app->request->post("uid");
//        $questionId = Yii::$app->request->post("questionId");
//        $hastime = Yii::$app->request->post("hastime");//剩余时间
//        $type = Yii::$app->request->post("type",1);//1-初级 2-中级
//        if(!$uid){
//            die(json_encode(['code'=>99,'message'=>'未登录']));
//        }
//        if($type < 1 || !$questionId){
//            die(json_encode(['code'=>0,'message'=>'参数错误']));
//        }
//        $data = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $questionId")->one();
//        if($data){
//            $data->hasTime = $hastime;
//            $data->save();
//        }else{
//            $model = new UserEvaluation();
//            $model->uid = $uid;
//            $model->type = $type;
//            $model->questionId = $questionId;
//            $model->hasTime = $hastime;
//            $model->createTime = date('Y-m-d H:i:s');
//            $model->save();
//        }
//        $data = ['code'=>1,'message'=>'success','data'=>['questionId'=>$questionId,'type'=>$type]];
//        die(json_encode($data));
//    }
    /**
     * gre 测评
     * 中途终止测评退出
     * 倒计时结束
     * cy  exit section
     */
//    public function  actionExitSection(){
//        $uid = Yii::$app->request->post("uid");
//        if(!$uid){
//            die(json_encode(['code'=>99,'message'=>'未登录']));
//        }
//        $type = Yii::$app->request->post("type");
//        if($type < 1){
//            die(json_encode(['code'=>0,'message'=>'参数错误']));
//        }
//        $model = new UserRecord();
//        $model->uid= $uid;
//        $model->type = $type;
//        $model->over = 1;
//        $model->createTime = date('Y-m-d H:i:s');
//        $result = UserEvaluation::correctRate($uid,$type,'zt');
//        $model->correctRate = $result[0];//测评正确率
//        $model->verbal = $result[1];//阅读成绩
//        $model->quant = $result[2];//数学成绩
//        $model->verbalRate = $result[3];//语文正确率
//        $model->quantRate = $result[4];//数学正确率
//        $res = $model->save();
//        if($res){
//            $data = ['code'=>1,'message'=>'success','data'=>['type'=>$type]];
//        }else{
//            $data = ['code'=>0,'message'=>'fail'];
//        }
//        die(json_encode($data));
//    }
    /**
     * gre测评
     * 测评 quit w/save
     *cy
     */
//    public function actionQuitSave(){
//        $uid = Yii::$app->request->post("uid");
//        if(!$uid){
//            die(json_encode(['code'=>99,'message'=>'未登录']));
//        }
//        $questionid = Yii::$app->request->post("questionId");
//        $type = Yii::$app->request->post("type");
//        if(!$questionid || $type < 1){
//            die(json_encode(['code'=>0,'message'=>'参数错误']));
//        }
//        $hastime = Yii::$app->request->post("hastime");
//        $date = date('Y-m-d H:i:s',time());
//        $evaluation = UserEvaluation::find()->where("uid = $uid and questionId = $questionid and type = $type  and do = 0")->one();
//        if(empty($evaluation)){
//            $model = new UserEvaluation();
//            $model->uid = $uid;
//            $model->questionId = $questionid;
//            $model->type = $type;
//            $model->createTime = $date;
//            $model->hasTime = $hastime;
//            $res = $model->save();
//            if($res){
//                $data = ['code'=>1,'message'=>'success'];
//            }else{
//                $data = ['code'=>0,'message'=>'记录保存失败'];
//            }
//        }else{
//            $data = ['code'=>1,'message'=>'success'];
//        }
//        die(json_encode($data));
//    }
    /**
     * gre测评
     * 下一题
     * cy
     */
    public function actionEvaluationNext(){
        $model = new UserEvaluation();
        $uid = Yii::$app->request->post("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $questionid = Yii::$app->request->post("questionId");
        $type = Yii::$app->request->post('type');
        $hastime = Yii::$app->request->post("hastime");
        $answer = Yii::$app->request->post("answer");
        $oldtime = Yii::$app->request->post("oldtime");
        $evaluation = UserEvaluation::find()->where("uid = $uid and questionId = $questionid")->one();
        $date = date('Y-m-d H:i:s',time());
        $answer_result = $model->checkAnswer($questionid,$answer);
        if($answer_result){
            $correct = 1;
        }else{
            $correct = 0;
        }
        if($evaluation){
            $evaluation->answer = $answer;
            $evaluation->useTime = $evaluation->hasTime - $hastime;
            $evaluation->hasTime = $hastime;
            $evaluation->createTime = $date;
            $evaluation->do = 1;
            $evaluation->correct = $correct;
            $res = $evaluation->save();
        }else{
            $model->uid = $uid;
            $model->questionId = $questionid;
            $model->type = $type;
            $model->answer = $answer;
            $model->useTime = $oldtime - $hastime;
            $model->hasTime = $hastime;
            $model->createTime = $date;
            $model->do = 1;
            $model->correct = $correct;
            $res = $model->save();
        }
        if($res){
            uc_user_edit_integral1($uid,'GRE用户测评',1,2);
            $data = ['code'=>1,'message'=>'success','data'=>['id'=>$questionid,'type'=>$type,'hastime'=>$hastime]];
        }else{
            $data = ['code'=>0,'message'=>'数据保存失败'];
        }
        die(json_encode($data));
    }
    /**
     * 完成测评
     * cy
     */
    public function actionEvaluationOver(){
        $uid = Yii::$app->request->post("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $questionid = Yii::$app->request->post("questionId");
        $type = Yii::$app->request->post("type");
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
            $model->do = 1;
            $model->correct = $correct;
            $res = $model->save();
        }else{
            $evaluation->answer = $answer;
            $evaluation->useTime = $evaluation->hasTime - $hastime;
            $evaluation->hasTime = $hastime;
            $evaluation->createTime = $date;
            $evaluation->correct = $correct;
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
                $data = ['code'=>1,'message'=>'success','data'=>['type'=>$type]];
            }else{
                $data = ['code'=>0,'message'=>'测评结果记录失败'];
            }
        }else{
            $data = ['code'=>0,'message'=>'测评题记录失败'];
        }
        die(json_encode($data));
    }
    /**
     * gre测评
     * @return string
     * 测评结果 cy
     */
    public function actionEvaluationResult(){
        $uid = Yii::$app->request->post("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $type = Yii::$app->request->post("type");
        $user = User::find()->asArray()->where("uid = $uid")->one();
        $nickname = $user['nickname']?$user['nickname']:$user['userName'];
        $model = new UserEvaluation();
        $datas = $model->getContent2($uid,$type,'result');//题目信息
        $counts = $model->correctCount($uid,$type);//各个类型的正确数、总数
        $correct = 0;
        $total = 12;
        foreach($counts as $h => $o){
            $correct += $o['correct'];//正确个数
        }
        $record = UserRecord::find()->where("type = $type and uid = $uid")->one();
        if(is_null($record['verbal']) || is_null($record['quant']) || is_null($record['verbalRate']) || is_null($record['quantRate'])){
            $correctRates = $model->correctRate($uid,$type,'result');//各个类型的正确率
            $ceRate = $correctRates[0];//测评正确率
            $totalscale = $correctRates[3] + $correctRates[4];//测评分数
        }else{
            $ceRate = $record['correctRate'];
            $totalscale = $record['verbal'] + $record['quant'];
        }
        //打败人数
        $beatcount = UserRecord::find()->select("count(id) as coun")->where("type = $type and correctRate < $ceRate")->asArray()->one()['coun'];
        if(!$beatcount)$beatcount = 0;
        $data = ['code'=>1,'message'=>'succcess','data'=>['nickname'=>$nickname,'totalScore'=>$totalscale,'correct'=>$correct,'total'=>$total,'correctRate'=>$ceRate,'beatPeople'=>$beatcount,'question'=>$datas]];
        die(json_encode($data));
    }

    /**
     * gre 测评
     * 测评结果页  题目详情
     * cy
     */
    public function actionEvaluationQuestion(){
        $uid = Yii::$app->request->post("uid");
        if(!$uid){
            die(json_encode(['code'=>99,'message'=>'未登录']));
        }
        $type = Yii::$app->request->post("type");
        if( $type < 1){
            die(json_encode(['code'=>0,'message'=>'参数错误']));
        }
        $model = new UserEvaluation();
        $datas = $model->getContent2($uid,$type,'question');//题目信息
        $questions = $model->getQuesDetail($uid,$type);
        $contents = [];
        $typeIds = [];
        $details = [];
        $readArticles = [];
        foreach($questions as $k =>$v){
            $typeIds[$k] = $v['typeId'];
            $details[$k] = strip_tags($v['details'],'<img>');
//            if($v['typeId'] == 7){
//                $articles = explode('.',strip_tags($v['readArticle']));
//                $readArticles[$k] = $articles;
//            }else{
//            }
            $readArticles[$k] = strip_tags($v['readArticle'],'<img>');
            $contents = ['typeIds'=>$typeIds,'details'=>$details,'readArticle'=>$readArticles];
        }
        $data = ['code'=>1,'massage'=>'success','data'=>['quesData'=>$datas,'contents'=>$contents,'questions'=>$questions]];
        die(json_encode($data));
    }

    /**
     * 秒数转换成分钟数
     */
    public function getMinute($time){
        $minutes = floor($time/60);
        $seconds = floor($time-(60*$minutes));
        if($minutes < 10) $minutes = '0'.$minutes;
        if($seconds < 10 ) $seconds = '0'.$seconds;
        $times = [$minutes,$seconds];
        return $times;
    }
}