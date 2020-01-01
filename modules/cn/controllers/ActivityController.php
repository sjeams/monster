<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\content\models\Category;
use app\modules\content\models\CategoryContent;
use yii\db\ActiveRecord;
use yii;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\content\models\ContentTag;

class ActivityController extends ToeflController
{
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =3;
    }

    /**
     * GRE活动页
     * by  yanni
     */
    public function actionIndex()
    {
//        var_dump("首页");die;
        $data = file_get_contents("https://open.viplgw.cn/cn/api/gre-class");
        $data = json_decode($data,true);
        $this->title = 'GRE名师公开课|GRE刷题团|GRE词汇团|GRE培训_雷哥GRE培训官网';
        $this->keywords = 'GRE名师公开课,GRE刷题团,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE名师公开课，GRE刷题团，GRE词汇团，GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('gre_ac2', ['data532' => $data['all'], 'data533' => $data['openClass'], 'data534' => $data['wordGroup'], 'data535' => $data['brushing']]);
    }

    public function actionDetail()
    {
        $dataType = Yii::$app->request->get('data-type','arr');
        $id = Yii::$app->request->get('id');
        $data = Method::post("https://open.viplgw.cn/cn/api/gre-detail",['id' => $id]);
        $data = json_decode($data,true);
        if(isset($data['code'])){
            die('<script>alert("商品缺少详情");history.go(-1);</script>');
        }
        $endTime = strtotime($data['parent']['commencement']);
        if ($endTime < time()) {
            $surplusTime = '已结束';
        } else {
            $surplusTime = $endTime - time();
            $modelM = new Method();
            $surplusTime = $modelM->gmstrftimeB($surplusTime);
        }
        $data['parent']['commencement'] = $surplusTime;
        $pid = $data['data']['pid'];
        $url = "https://open.viplgw.cn/";
        $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
        $content = preg_replace($pregRule, '<img src="'.$url.'${1}" style="max-width:100%">', $data['parent']['sentenceNumber']);
        $data['parent']['sentenceNumber'] = $content;



//        var_dump($discuss);die;
        $this->title = $data['data']['name'].'|GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords = $data['parent']['trainer']. 'GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = $data['parent']['questiontype'].'雷哥GRE培训官网，提供GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->exitData(['id' => $id, 'pid' => $pid,'data' => $data['data'], 'parent' => $data['parent'],'category'=>$data['category'],], $dataType, "gre_course", 2);
    }
}