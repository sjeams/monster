<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */

namespace app\modules\wap\controllers;

use yii;
use app\libs\Method;
use app\modules\cn\models\User;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\content\models\ContentTag;
use app\modules\content\models\Livesdkid;
use app\modules\question\models\LibraryQuestion;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\QuestionsStatistics;

class WapController extends ToeflController
{
    public $enableCsrfValidation = false;
    public $layout = 'not';

    /**
     * 分享课程页面
     * @Yanni
     */
    public function actionCourseShare()
    {
        $model    = new Content();
        $dataType = Yii::$app->request->get('data-type', 'arr');
        $courseId = Yii::$app->request->get('courseId', 7775);
        $sign     = $model->findOne($courseId);
        if (!$sign) {
            die('<script>alert("商品ID不存在");history.go(-1);</script>');
        }
        if ($sign->pid == 0) {
            $data = Content::find()->where("pid=$courseId")->one();
            if ($data) {
                $this->redirect('/share_course.html?courseId=' . $data['id']);
            } else {
                die('<script>alert("商品缺少详情");history.go(-1);</script>');
            }
        } else {
            $data     = $model->getClass(['fields' => 'answer，price,originalPrice,duration,commencement,performance,alternatives,article,description', 'where' => "c.id=$courseId", 'pageSize' => 1]);
            $parent   = $model->getClass(['fields' => 'description,listeningFile,trainer', 'where' => "c.id=$sign->pid"]);
            $tagModel = new ContentTag();
            $tag      = $tagModel->getAllTag($courseId);
            $count    = $parent[0]['viewCount'];
            Content::updateAll(['viewCount' => ($count + 1)], "id=$sign->pid");
            $endTime = strtotime($data[0]['article']);
            if ($endTime < time()) {
                $surplusTime = '已结束';
            } else {
                $surplusTime = $endTime - time();
            }
            $modelM             = new Method();
            $surplusTime        = $modelM->gmstrftimeB($surplusTime);
            $data[0]['article'] = $surplusTime;
            $pid                = $sign->pid;
            $modelu             = new UserComment();
            $comment            = $modelu->getUserComment($pid, 1, 5);
            $audition           = Livesdkid::find()->asArray()->where("contentId={$courseId}")->one();
        }

//        var_dump($discuss);die;
        $this->title       = $data[0]['name'] . '|GRE培训课程|GRE在线课程|GRE网课|GRE培训_雷哥GRE培训官网';
        $this->keywords    = 'GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE培训课程，GRE在线课程，GRE网课，GRE视频课程，GRE考试辅导等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';
        return $this->exitData(['id' => $courseId, 'pid' => $pid, 'count' => $count, 'tag' => $tag, 'data' => $data[0], 'parent' => $parent[0], 'comment' => $comment, 'audition' => $audition], $dataType, "app-courseDetails", 2);
    }

    /**
     * 分享题库做题结果页
     * by yanni
     */
    public function actionBankResults()
    {
        $libId         = Yii::$app->request->get('libId', 0);
        $uid           = Yii::$app->request->get('uid', 0);
        $allPerseon    = Yii::$app->request->get('allPerseon');
        $beatPerson    = Yii::$app->request->get('beatPerson');
        $model         = new QuestionsStatistics();
        $userStatistic = $model->find()->asArray()->where("uid={$uid} and libraryId={$libId}")->one();  //用户做题状态
        $totalNum      = LibraryQuestion::find()->select("id")->asArray()->where("libId={$libId}")->count();   //题库总数
        if ($beatPerson && $allPerseon) {
            $overstep = ['total' => $allPerseon, 'transcendNum' => $beatPerson];
        } else {
            $overstep = $model->getCompete($uid, $libId, $userStatistic['correctRate']);       //总共多少人做题   和超过多少人
        }
        $compete['probability']  = round($overstep['transcendNum'] / $overstep['total'], 2);                 //竞争力
        $compete['userNum']      = $overstep['total'];
        $compete['transcendNum'] = $overstep['transcendNum'];        //做题总人数
        $data['pace']            = $model->getPace($userStatistic['totalNum'], $userStatistic['totalTime']);          //pace诊断
        $aModel                  = new UserAnswer();
        $data['correctNum']      = $aModel->find()->select("id")->asArray()->where("uid={$uid} and libId={$libId} and correct=1 and answerType=1")->count();   //用户题库正确数量
        $data['totalNum']        = $totalNum;
        $data['correctRate']     = $userStatistic['correctRate'] ? $userStatistic['correctRate'] : 0;
        $data['totalUse']        = Method::secToTime($userStatistic['totalTime']);
        if ($userStatistic['totalTime'] == 0 || $userStatistic['doNum'] == 0) {
            $meanTime = 0;
        } else {
            $meanTime = round($userStatistic['totalTime'] / $userStatistic['doNum']);
        }
        $data['meanTime'] = Method::secToTime($meanTime);
        $data['compete']  = $compete;
        return $this->render('share_question_result', $data);
    }

    /**
     * 分享文章
     * by、yanni
     */
    public function actionArticleShare()
    {
        $id    = Yii::$app->request->get('id', 8319);
        $model = new Content();
        $data  = $model->getClass(['fields' => 'answer,alternatives,description,cnName', 'where' => "c.id=$id"]);
        Content::updateAll(['viewCount' => $data[0]['viewCount'] + 1], 'id=' . $id);
        $user                    = User::find()->asArray()->select(['id', 'nickname', 'image'])->where("id={$data[0]['userId']}")->one();
        $data[0]['editUser']     = $user;
        $data[0]['alternatives'] = Method::gmstrftimeC($data[0]['alternatives']);
        $hot                     = Content::getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 4]);   //热门备考文章
        foreach ($hot as $k => $v) {
            $aUser               = User::find()->asArray()->select(['nickname', 'image'])->where("id={$v['userId']}")->one();
            $hot[$k]['editUser'] = $aUser;
        }
        return $this->render('app-articleDetails1', ['data' => $data[0], 'hot' => $hot]);
    }

    /**
     * 分享社区帖子
     * by、yanni
     */
    public function actionArticleShare1()
    {
        $id   = Yii::$app->request->get('id', 2218);
        $data = file_get_contents("https://bbs.viplgw.cn/cn/api/post-detail?postId=$id");
        $data = json_decode($data, true);
        $res  = $data['data'];
        return $this->render('app-articleDetails2', ['data' => $res['detail'], 'hot' => $res['hot'], 'commentNum' => count($res['comment'])]);
    }

    /**
     * 分享吐槽
     * by yanni
     */
    public function actionShareGossip()
    {
        $id   = Yii::$app->request->get('id', 2415);
        $data = Method::post("https://bbs.viplgw.cn/cn/app-api/app-gossip-details", ['gossipId' => $id]);
        $data = json_decode($data, true);
        $res  = $data['data'];
        if (empty($res)) {
            echo "Error";
            die;
        }
        return $this->render('share_gossip', ['data' => $res['detail'], 'comment' => $res['comment']]);
    }

    /**
     * 分享备考故事
     * by  yanni
     */
    public function actionShareDetail3()
    {
        $id   = Yii::$app->request->get('id', 7829);
        $data = Content::getClass(['where' => 'c.id=' . $id, 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering,description']);
        if (empty($data)) {
            echo "Error";
            die;
        }
        $hots = Content::getClass(['where' => 'c.pid=0 and c.hot=2', 'fields' => 'answer,article', 'category' => '531', 'orderBy' => '', 'page' => 1, 'pageSize' => 4]);
        Content::updateAll(['viewCount' => $data[0]['viewCount'] + 1], 'id=' . $id);
        return $this->render('share-articleDetails3', ['data' => $data[0], 'hots' => $hots]);
    }




}