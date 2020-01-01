<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/13
 * Time: 11:27
 */
namespace app\modules\cn\controllers;

use app\libs\GoodsPager;
use app\libs\Pager;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\cn\models\TeacherCollection;
use app\modules\cn\models\TeachercolumnComment;
use app\modules\cn\models\TeacherContent;
use app\modules\cn\models\Teachers;
use app\modules\cn\models\User;
use Codeception\PHPUnit\Constraint\Page;
use Yii;
use yii\data\Pagination;

class TeachersController extends ToeflController{
    public $layout = 'cn';
    public $enableCsrfValidation = false;
    public function init(){
        parent::init();
        $this->type = 11;
    }
    /*
     * 名师首页
     */
    public function actionIndex(){
        $this->title = 'GRE老师_雷哥GRE名师_GRE辅导老师_雷哥GRE培训官网';
        $this->keywords = 'GRE老师,GRE名师,如何备考GRE,GRE备考攻略,GRE考试内容,GRE填空,GRE阅读,GRE词汇,GRE数学,GRE写作,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学，雷哥培训';
        $this->description = '雷哥GRE培训官网，提供GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        $model = new Teachers();
        $teachers = $model::find()->asArray()->orderBy("sort desc")->all();
        foreach($teachers as $k => $v){
                $label = $v['label'];
                $course = $v['course'];
                $teachers[$k]['label'] = explode(",",$label);
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
        return $this->render('index',['teachers'=>$teachers]);
    }
    public function actionDetail()
    {
        $id = Yii::$app->request->get("id");
        $teacher = Teachers::find()->where("id = $id")->asArray()->one();
        $this->title = $teacher['name'] . '_GRE老师_雷哥GRE名师_GRE辅导老师_雷哥GRE培训官网';
        $this->keywords = $teacher['label'] ;
        $this->description =$teacher['introduce'] ;

        $teacher['label'] = explode(',', $teacher['label']);
        $course = explode("\r", $teacher['course']);
        foreach ($course as $k => $v) {
            $arr = explode(',', $v);
            $course[$k] = $arr;
        }
        $teacher['course'] = $course;
        //收藏人数
        $collectes = TeacherCollection::find()->asArray()->select("count(id) as cou")->one();
        $collecte = TeacherCollection::find()->asArray()->select("count(id) as cou")->where("teacherId = $id")->one();
        if ($collectes['cou'] == 0) {
            $teacher['welcome'] = 0;
        } else {
            $welcome = ceil(($collecte['cou'] / $collectes['cou']) * 100);
            $teacher['welcome'] = $welcome;
        }
        $teacher['collections'] = $collecte['cou'];
        //文章数
        $articles = TeacherContent::find()->asArray()->where("teacherId = $id")->orderBy("createTime desc")->all();
        $teacher['articles'] = count($articles);
        //热门文章
        $hotarticles = TeacherContent::find()->asArray()->where("hot = 1")->orderBy("createTime desc")->all();
        //老师评价
        $pidcount = TeachercolumnComment::find()->select("id")->asArray()->where("teacherId = $id and pid = 0")->orderBy("id desc")->count();
        if ($pidcount < 6) {
            $page = '';
        } else {
            $page = new Pager($pidcount, 1, 5);
            $page = $page->GetPagerContent();
        }
        $comments = TeachercolumnComment::find()->asArray()->where("teacherId = $id and pid = 0")->orderBy("id desc")->limit(5)->all();
        $teacher['comments'] = $pidcount;
        foreach ($comments as $key => $value) {
            $userid = $value['userId'];
            $user = User::find()->asArray()->select(['image', 'nickname'])->where("uid = $userid")->one();
            $comments[$key]['userimage'] = $user['image'];
            $comments[$key]['nickname'] = $user['nickname'];
            $comments[$key]['site'] = ($pidcount - $key);
            $datas = TeachercolumnComment::find()->asArray()->where("teacherId = $id and pid != 0 and fpid = {$value['id']}")->orderBy("id asc")->all();
            if (!empty($datas)) {
                foreach ($datas as $ki => $ko) {
                    $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                    $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                    $datas[$ki]['p_userimage'] = $p_user["image"];
                    $datas[$ki]["p_usernickname"] = $p_user["nickname"];
                    $self = User::find()->asArray()->select("id,image,nickname")->where("uid = {$ko['userId']}")->one();
                    $datas[$ki]['userimage'] = $self['image'];
                    $datas[$ki]['usernickname'] = $self['nickname'];
                }
            }
            $comments[$key]["reply"] = $datas;
        }
        //名师在线内容
        $teacheronline = Teachers::find()->asArray()->all();
        //学院案例（高分学员）
        $model = new Content();
        $students = $model->getClass(['category' => '531', 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering', 'page' => 1, 'pageSize' => 6, 'pageStr' => 1]);
        //GRE百科
        $baike = $model->getClass(['category' => '544', 'pageSize' => 9]);
        $uid = Yii::$app->session->get('uid');
        $user = array();
        if ($uid) {
            $user = User::find()->asArray()->select(['id', 'image', 'nickname', 'uid'])->where("uid = $uid")->one();
            $collection = TeacherCollection::find()->asArray()->where("userId = $uid and teacherId = $id")->one();
            if (!empty($collection)) {
                $userCollection = 1;
            } else {
                $userCollection = 0;
            }
        } else {
            $userCollection = 0;
        }
        return $this->render('detail-new', ['teacher' => $teacher, 'comments' => $comments, 'articles' => $articles, 'teacheronline' => $teacheronline, 'students' => $students, 'user' => $user, 'userCollection' => $userCollection, 'hotarticles' => $hotarticles, 'baike' => $baike, 'page' => $page]);
    }

}