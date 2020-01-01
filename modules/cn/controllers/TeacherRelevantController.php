<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/13
 * Time: 11:27
 */
namespace app\modules\cn\controllers;

use app\libs\Pager;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\cn\models\TeacherCollection;
use app\modules\cn\models\TeachercolumnComment;
use app\modules\cn\models\TeacherContent;
use app\modules\cn\models\Teachers;
use app\modules\cn\models\User;
use app\modules\cn\models\UserCollection;
use Yii;
use yii\data\Pagination;

class TeacherRelevantController extends ToeflController{
    public $layout = 'cn';
    public $enableCsrfValidation = false;
    function init (){
        parent::init();
        $this->type = 10;
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
    /*
     * 名师专栏首页
     */
    public function actionIndex(){
        $this->title = '新GRE备考指导_GRE300分考试技巧_GRE复习备考攻略_雷哥GRE培训官网';
        $this->keywords = '如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学，雷哥培训';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';

        $model = new TeacherContent();
        $all = $model->find()->orderBy("createTime desc");
        $jingyan = $model->find()->where("type = 1")->orderBy("createTime desc");
        $yaodian = $model->find()->where("type = 2")->orderBy("createTime desc");
        $contents = array($all,$jingyan,$yaodian);
        //数量
        $allCount = $model->find()->select("id")->orderBy("createTime desc")->count();
        $jingyanCount = $model->find()->select("id")->where("type = 1")->orderBy("createTime desc")->count();
        $yaodianCount = $model->find()->select("id")->where("type = 2")->orderBy("createTime desc")->count();
        $counts = array($allCount,$jingyanCount,$yaodianCount);
        foreach($contents as $kk=>$vv){
            if($kk == 0){
                $pageparam = 'pf';
            }elseif($kk == 1){
                $pageparam = 'ps';
            }else{
                $pageparam = 'pt';
            }
            $page = new Pagination(['totalCount'=>$counts[$kk],'pageSize'=>10,'pageParam'=>$pageparam]);
            $pages[] = $page;
            $content = $vv->offset($page->offset)->limit($page->limit)->asArray()->all();
            foreach($content as $k=>$v){
                $teacherid = $v['teacherId'];
                $contentid = $v['id'];
                $tmsg = Teachers::find()->asArray()->where("id = $teacherid")->one();
                $content[$k]['teachername'] = $tmsg['name'];
                $content[$k]['teacherimage'] = $tmsg['image'];
                $content[$k]['createTime'] = $this->actionTimeStr(strtotime($v['createTime']));
                $cts = TeachercolumnComment::find()->asArray()->select("count(id) as coun")->where("contentid = $contentid")->one()['coun'];
                $content[$k]['comments'] = $cts;
            }
            $contents[$kk] = $content;
        }
        $contentall =$contents[0];
        $pageall = $pages[0];
        array_shift($contents);
        array_shift($pages);
        //名师在线内容
        $teacheronline = Teachers::find()->asArray()->all();
        //GRE百科
        $baike = Content::getClass(['category'=>'544','pageSize'=>9]);
        return $this->render('index',['contentall'=>$contentall,'catecontent'=>$contents,'pageall'=>$pageall,'pages'=>$pages,'teacheronline'=>$teacheronline,'baike'=>$baike]);
    }
    public function actionTimeStr($timeStamp){
        $front = time()-$timeStamp;
        if($front<86400){
            $timeStamp = floor($front/3600)."小时前";
            if($front<3600){
                $timeStamp = floor($front/60)."分钟前";
                if($front<60){
                    $timeStamp = $front."秒前";
                }
            }
        } else{
            $timeStamp = date("Y-m-d",$timeStamp);
        }
        return $timeStamp;
    }

    public function actionArticleDetail(){
        $id = Yii::$app->request->get('id');
        $article = TeacherContent::find()->asArray()->where("id = $id")->one();
        $this->title = $article['title'].'-雷哥GRE';
        $this->description = $article['introduce'];
        $cont = !empty($article['keywords'])?$article['keywords']:$article['label'];
        $this->keywords = $cont;
        //阅读数
        $view = $article['view']+1;
        TeacherContent::updateAll(['view'=>$view],"id = $id");
        //文章
        $teacherid = $article['teacherId'];
        $articles = TeacherContent::find()->asArray()->where("teacherId = $teacherid")->all();
        $artcount = count($articles);
        //文章标签
        $article['label'] = explode(',',$article['label']);
        //热门文章
        $hotarticles = TeacherContent::find()->asArray()->where("hot = 1")->orderBy("createTime desc")->all();
        //打赏人数
        $con_model = new TeacherContent();
        $reward = $con_model->getReward($id);
        //老师评价数
        $comments = TeachercolumnComment::find()->asArray()->where("teacherId = $id ")->orderBy("id desc")->all();
        $count = count($comments);
        //老师信息
        $teacherid = $article['teacherId'];
        $teacher = Teachers::find()->asArray()->where("id = $teacherid")->one();
        //收藏人数
        $collection = new TeacherCollection();
        $collectes = $collection::find()->select("count(id) as cou")->asArray()->one();
        $collecte = $collection::find()->select("count(id) as cou")->asArray()->where("teacherId = $teacherid")->one();
        if($collectes['cou'] == 0){
            $teacher['welcome'] = 0;
        }else{
            $welcome = ceil(($collecte['cou']/$collectes['cou'])*100);
            $teacher['welcome'] = $welcome;
        }
        //文章评论
        $pidcount = TeachercolumnComment::find()->asArray()->where("contentId = $id and pid = 0")->orderBy("id desc")->count();
        if($pidcount < 6){
            $page = '';
        }else{
            $page = new Pager($pidcount,1,5);
            $page = $page->GetPagerContent();
        }
        $artcomments = TeachercolumnComment::find()->asArray()->where("contentId = $id and pid = 0")->orderBy("id desc")->limit(5)->all();
        foreach($artcomments as $kk => $vv){
            $artcomments[$kk]['key'] = $pidcount-$kk;
            $userid = $vv["userId"];
            $userinfo = User::find()->asArray()->select(['image','nickname'])->where("uid = $userid")->one();
            $artcomments[$kk]['userimage'] = $userinfo['image'];
            $artcomments[$kk]['usernickname'] = $userinfo['nickname'];
            $datas = TeachercolumnComment::find()->asArray()->where("contentId = $id and pid != 0 and fpid = {$vv['id']}")->orderBy("id asc")->all();
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
            $artcomments[$kk]["reply"] = $datas;
        }
        $uid = Yii::$app->session->get('uid');
        $user = array();
        if($uid){
            $user = User::find()->asArray()->select(['id','image','nickname','uid'])->where("uid = $uid")->one();
            $coll = $collection::find()->where("userId = $uid and teacherId = $teacherid")->asArray()->one();
            if(!empty($coll)){
                $userCollection = 1;//老师收藏状态
            }else{
                $userCollection = 0;
            }
            //雷豆数获取
            $integral = uc_user_integral1($uid)['integral'];
            if(!$integral) $integral = 0;
            $user['integral'] = $integral;
            //用户是否收藏该文章
            $iscollecte = UserCollection::find()->where("uid = $uid and tea_artId = $id")->one();
            if(empty($iscollecte)){
                $art_collecte = 0;
            }else{
                $art_collecte = 1;
            }
        }else{
            $userCollection = 0;
            $art_collecte = 0;
        }
        $teacher['collections'] = $collecte['cou'];
        $teacher['comments'] =$count;
        $teacher['artcount'] = $artcount;
        $article['comments'] = $pidcount;
        //GRE百科
        $baike = Content::getClass(['category'=>'544','pageSize'=>9]);
        return $this->render('article_detail-new',['article'=>$article,'teacher'=>$teacher,'hotarticles'=>$hotarticles,'artcomments'=>$artcomments,'user'=>$user,'userCollection'=>$userCollection,'reward'=>$reward,'baike'=>$baike,'page'=>$page,'art_collecte'=>$art_collecte]);
    }
}
