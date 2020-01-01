<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\cn\models\Category;
use yii;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\content\models\ContentTag;
use app\modules\content\models\Livesdkid;

class CourseController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =3;
    }
    /**
     * GRE课程页
     * by  yanni
     */
    public function actionIndex(){
//        $type = Yii::$app->request->get("type");
//        if($type == 'test'){
            $content = new Content();//gre课程id 482
            $childreIds = Category::find()->where("pid = 482")->select("id,name")->asArray()->all();
            $courses = [];
            foreach($childreIds as $k =>$v){
                $course = $content::getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance,alternatives,article,description','category' => $v['id'],'page'=>1,'order'=>' c.sort asc,c.id DESC','pageSize' => 5]);
                foreach($course as $o => $t){//试听
                    $contentId = $t['id'];
                    $auditionKey = Livesdkid::find()->where("contentId = $contentId")->asArray()->one()['auditionKey'];
                    $course[$o]['auditionKey'] = $auditionKey;
                }
                $cous = ['catName'=>$v['name'],'courses'=>$course];
                $courses[$k] = $cous;
            }
//        }
        $this->title = 'GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords = 'GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('course',['course'=>$courses]);
    }

    public function actionDetail(){
        $model = new Content();
        $dataType = Yii::$app->request->get('data-type','arr');
        $id = Yii::$app->request->get('id');
        $sign = $model->findOne($id);
        if(!$sign){
            die('<script>alert("商品ID不存在");history.go(-1);</script>');
        }
        if($sign->pid == 0){
            $data = Content::find()->where("pid=$id")->one();
            if($data){
                $this->redirect('/course/'.$data['id'].'.html');
            }else{
                die('<script>alert("商品缺少详情");history.go(-1);</script>');
            }
        }else{
            $data =  $model->getClass(['fields' => 'answer,price,originalPrice,duration,commencement,performance,alternatives,article,description,price,keywords','where' =>"c.id=$id",'pageSize' => 1]);
            $parent =  $model->getClass(['fields' => 'description,listeningFile,trainer','where' =>"c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag = $tagModel->getAllTag($id);
            $count = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count+1)],"id=$sign->pid");
            $endTime = strtotime($data[0]['article']);
            if($endTime < time()){
                $surplusTime = '已结束';
            } else {
                $surplusTime = $endTime-time();
            }
            $modelM = new Method();
            $surplusTime = $modelM->gmstrftimeB($surplusTime);
            $data[0]['article'] = $surplusTime;
            $pid = $sign->pid;
            $modelu = new UserComment();
            $comment = $modelu->getUserComment($pid,1,20);
            $audition = Livesdkid::find()->asArray()->where("contentId={$id}")->one();
        }

//        var_dump($discuss);die;
        $this->title = $data[0]['name'].'|GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords = $data[0]['price'];
        $this->description = $data[0]['keywords'];
        return $this->exitData(['id' => $id,'pid' => $pid,'count' => $count,'tag' => $tag,'data' => $data[0],'parent' => $parent[0],'comment'=>$comment,'audition'=>$audition],$dataType,"gre_course",2);
    }

    public function actionCaseDetail(){
        $id = Yii::$app->request->get('id');
        $model = new Content();
        $data = $model->getClass(['where' => 'c.pid=0 and c.id='.$id,'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description,price,keywords']);
        $lower = Content::find()->asArray()->select(['id','name'])->where("id<$id and catId=531")->orderBy("id desc")->one();
        $upper = Content::find()->asArray()->select(['id','name'])->where("id>$id and catId=531")->orderBy("id asc")->one();
        $this->title = $data[0]['name'].'|GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords = $data[0]['price'];
        $this->description = $data[0]['keywords'];
        return $this->render('case_details',['data'=>$data[0],'lower'=>$lower,'upper'=>$upper]);
    }

}