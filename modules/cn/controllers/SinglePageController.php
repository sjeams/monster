<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\UserComment;
use app\modules\cn\models\UserFollow;
use app\modules\content\models\Category;
use app\modules\user\models\User;
use yii;
use app\libs\ToeflController;
use app\modules\cn\models\UserCollection;
use app\modules\cn\models\Content;
use app\modules\content\models\ContentExtend;

class SinglePageController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =5;
    }
    /**
     * GRE备考页
     * by  yanni
     */
    public function actionIndex(){
        $catId = Yii::$app->request->get('catId',537);
        $page = Yii::$app->request->get('page',1);
        $model = new Content();
        if($catId=='hot'){
            $data =  $model->getClass(['fields' => 'answer,alternatives,description','where' =>"c.pid=0 and c.hot=2",'category' => 537,'page'=>$page,'order'=>'alternatives DESC','pageStr'=>1]);
        } else{
            $data =  $model->getClass(['fields' => 'answer,alternatives,description','where' =>"c.pid=0",'category' => $catId,'page'=>$page,'order'=>'alternatives DESC','pageStr'=>1]);
        }
        foreach($data['data'] as $k=>$v){
            $user = User::find()->asArray()->select(['nickname','image'])->where("id={$v['userId']}")->one();
            $data['data'][$k]['editUser'] = $user;
            $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
            $front = time()-strtotime($v['alternatives']);
            if($front<86400){
                $data['data'][$k]['alternatives'] = floor($front/3600)."小时前";
                if($front<3600){
                    $data['data'][$k]['alternatives'] = floor($front/60)."分钟前";
                    if($front<60){
                        $data['data'][$k]['alternatives'] = $front."秒前";
                    }
                }
            } else{
                $data['data'][$k]['alternatives'] = date("Y-m-d",strtotime($v['alternatives']));
            }
//            var_dump($data['data'][$k]['alternatives']);die;
        }
        $this->title = '如何备考GRE|GRE备考攻略|GRE考试内容|GRE填空|GRE阅读|GRE词汇|GRE培训_雷哥GRE培训官网';
        $this->keywords = '如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('beikao',['content'=>$data]);
    }

    /**
     * GRE备考列表页
     * by  yanni
     */
    public function actionForMaList(){
        $catId = Yii::$app->request->get('catId');
        $page = Yii::$app->request->get('page',1);
        $class = Category::find()->asArray()->where("id=".$catId)->one();
        $model = new Content();
        $data =  $model->getClass(['fields' => 'answer,alternatives,description','where' =>"c.pid=0",'category' => $catId,'page'=>$page,'order'=>'alternatives DESC','pageStr'=>1]);
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
            $user = User::find()->asArray()->select(['nickname','image'])->where("id={$v['userId']}")->one();
            $data['data'][$k]['editUser'] = $user;
            $front = time()-strtotime($v['alternatives']);
            if($front<86400){
                $data['data'][$k]['alternatives'] = floor($front/3600)."小时前";
                if($front<3600){
                    $data['data'][$k]['alternatives'] = floor($front/60)."分钟前";
                    if($front<60){
                        $data['data'][$k]['alternatives'] = $front."秒前";
                    }
                }
            } else{
                $data['data'][$k]['alternatives'] = date("Y-m-d",strtotime($v['alternatives']));
            }
        }
        $this->title = '如何备考GRE|GRE备考攻略|GRE考试内容|GRE填空|GRE阅读|GRE词汇|GRE培训_雷哥GRE培训官网';
        $this->keywords = '如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('gre_bkList',['data'=>$data,'class'=>$class]);
    }
    /**
     * GRE备考详情页
     * by  yanni
     */
    public function actionForMa(){
        $id = Yii::$app->request->get('id');
        $catId = Yii::$app->request->get('catId');
        $page = Yii::$app->request->get('page',1);
        $uid = Yii::$app->session->get('uid');
        $class = Category::find()->asArray()->where("id=".$catId)->one();
        $model = new Content();
        $data =  $model->getClass(['fields' => 'answer,alternatives,description,cnName,price,kwords','where' =>"c.id=$id"]);
        Content::updateAll(['viewCount'=>$data[0]['viewCount']+1],'id='.$id);
        $modelu = new UserComment();
        $comment = $modelu->getUserComment($id,$page,5);
        $content['collection'] = '';
        if($uid) {
            $content['collection'] = UserCollection::find()->asArray()->where("uid={$uid} and contentId={$id}")->one();
        }
        $user = User::find()->asArray()->select(['nickname','image'])->where("id={$data[0]['userId']}")->one();
        $data[0]['editUser'] = $user;
        $front = time()-strtotime($data[0]['alternatives']);
        if($front<86400){
            $data[0]['alternatives'] = floor($front/3600)."小时前";
            if($front<3600){
                $data[0]['alternatives'] = floor($front/60)."分钟前";
                if($front<60){
                    $data[0]['alternatives'] = $front."秒前";
                }
            }
        } else{
            $data[0]['alternatives'] = date("Y-m-d",strtotime($data[0]['alternatives']));
        }
        $this->title =  $data[0]['title'].'-雷哥GRE';
        $this->keywords = $data[0]['cnName'];
        $this->description = $data[0]['answer'];
        return $this->render('greDetail-new',['data'=>$data[0],'class'=>$class,'comment'=>$comment,'content'=>$content]);
    }
    public function actionAbout(){
        return $this->render('about');
    }
    /**
     * 小编个人中心
     * by  yanni
     */
    public function actionXiaoBian(){
        $page = Yii::$app->request->get('page',1);
        $userId = Yii::$app->request->get('editorId',20424);
        $editorUser = User::find()->asArray()->where("id={$userId}")->one();
        $follow = UserFollow::find()->select("id")->asArray()->where("followUser={$userId}")->count();
        $viewCounts = Content::find()->asArray()->select(['viewCount'])->where("userId={$userId} and catId in(537,543,544)")->all();
        $articleView = 0;
        foreach($viewCounts as $v){
            $articleView += $v['viewCount'];
        }
        $model = new Content();
        $data =  $model->getClass(['fields' => 'answer,alternatives','where' =>"c.userId=$userId and c.catId in(537,543,544)",'pageStr'=>1,'page'=>$page]);
        $this->title = '如何备考GRE|GRE备考攻略|GRE考试内容|GRE填空|GRE阅读|GRE词汇|GRE培训_雷哥GRE培训官网';
        $this->keywords = '如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->render('xiaobian',['data'=>$data,'editorUser'=>$editorUser,'follow'=>$follow,'articleView'=>$articleView]);
    }

//    public function actionBiaoQian(){
//        $biaoqian  = "GRE是什么,GRE词汇,GRE如何备考,GRE考试,GRE培训课,GRE网课哪个好,GRE网课,GRE线上课程,GRE真题,GRE填空真题,GRE阅读真题,GRE数学机经,GRE作文,GRE作文如何备考,GRE与GMAT,GRE培训课程哪家好,GRE备考资料,GRE复习资料推荐,GRE备考经验,GRE高分案例,GRE复习计划,GRE学习计划,GRE考试攻略";
//        $biaoqian = explode(',',$biaoqian);
//        $contents = Content::find()->asArray()->where("catId in(537,543,544)")->all();
//        foreach($contents as $val){
//            $num =  rand(5, 8);
//            $content = array_rand ($biaoqian, $num);
//            $str = '';
//            foreach($content as $v){
////            $str .=$v.",";
//                $str .=$biaoqian[$v].",";
//            }
//            $str = rtrim($str, ",") ;
//            ContentExtend::updateAll(['value' => $str],'contentId ='.$val['id'].' and catExtendId in(1330,1331,1332)');
////            var_dump($str);die;
//        }
//    }
}
