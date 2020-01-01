<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\cn\models\UserAnswer;
use yii;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\content\models\ContentTag;

class PresentationController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =8;
    }
    /**
     * GRE做题报告
     * by  yanni
     */
    public function actionIndex(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die('<script>alert("请登录");location.href="https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/presentation.html";</script>');
        }
        $model = new UserAnswer();
        $replenish['correct'] = $model->getUserSectionCorrectRate($uid,1);
        $replenish['ageTime'] = $model->getUserSectionAverageTime($uid,1);
        $read['correct'] = $model->getUserSectionCorrectRate($uid,2);
        $read['ageTime'] = $model->getUserSectionAverageTime($uid,2);
        $quant['correct'] = $model->getUserSectionCorrectRate($uid,3);
        $quant['ageTime'] = $model->getUserSectionAverageTime($uid,3);
        $this->title = '全科报告';
        $this->keywords = 'GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('allReport',['quant'=>$quant,'read'=>$read,'replenish'=>$replenish]);
    }
    /**
     * GRE做题填空报告
     * by  yanni
     */
    public function actionReplenishReport(){
        $sectionId = Yii::$app->request->get('sectionId');
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            if($sectionId==1){
                die('<script>alert("请登录");location.href="https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/report/dx-1.html"</script>');
            } elseif($sectionId==2){
                die('<script>alert("请登录");location.href="https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/report/dx-2.html"</script>');
            }elseif($sectionId==3){
                die('<script>alert("请登录");location.href="https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/report/dx-3.html"</script>');
            }
        }
        $model = new UserAnswer();
        $data['correct'] = $model->getUserSectionCorrectRate($uid,$sectionId);
        $data['ageTime'] = $model->getUserSectionAverageTime($uid,$sectionId);
        $this->title = 'GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords = 'GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        if($sectionId==1){
            return $this->render('singleReport',['data'=>$data]);
        } elseif($sectionId==2){
            return $this->render('readReport',['data'=>$data]);
        } elseif($sectionId==3){
            return $this->render('quantReport',['data'=>$data]);
        } else{
            header("location:/presentation.html");die;   //结果页
        }
    }

    public function actionAjaxKnow(){
        $sectionId = Yii::$app->request->post('sectionId',1);
        $uid = Yii::$app->session->get('uid');
        $model = new UserAnswer();
        $data = $model->getUserSectionKnow($uid,$sectionId);
        die(json_encode($data));
    }

}