<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\StrangeWord;
use app\modules\cn\models\WordsSentence;
use app\modules\user\models\UserSpeed;
use yii;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\cn\models\UserWords;
use app\modules\cn\models\Words;
use app\modules\cn\models\Voc;

class WordsController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =9;
    }
    /**
     * GRE单词页
     * by  yanni
     */
    public function actionIndex(){
//        var_dump("首页");die;
        $page = Yii::$app->request->get('page',1);
        $model = new Content();
        $data = $model->getWordList(470,$page,15);
        $totalWord = $model->getTotalWord(470);
        $uid = Yii::$app->session->get('uid');
        $qnum = 0;
        if($uid){
            $sign = UserSpeed::find()->asArray()->where("userId={$uid}")->all();
            foreach($sign as $v){
                if($v['answer']=='complete'){
                    $qnum = $qnum + 10;
                } else {
                    $qnum = $qnum + $v['answer'];
                }
            }
        }
        $percentum = ceil(($qnum/$totalWord['total'])*100);
        $this->title = '再要你命三千|GRE词汇红宝书|GRE词汇书推荐|GRE培训_雷哥GRE培训官网';
        $this->keywords = '再要你命三千,GRE词汇,红宝书,GRE词汇书推荐,GRE培训,GRE是什么考试,gre词汇精选,gre高频词汇,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供再要你命三千、GRE红宝书、GRE高频词汇、GRE词汇书推荐、GRE单词书推荐';
        return $this->render('gre_wordIndex',['data'=>$data,'totalWord'=>$totalWord,'percentum'=>$percentum]);
    }
    public function actionBagList(){
        $phraseId = Yii::$app->request->get('phraseId',1);
        $type = Yii::$app->request->get('type');
        $page = Yii::$app->request->get('page',1);
        $model = new Content();
        $phrase = $model->find()->asArray()->where("id={$phraseId}")->one();
        $data = $model->getContentList($phraseId,$type,$page,15);
        $totalWord = $model->getTotalWord(470);
        $uid = Yii::$app->session->get('uid');
        $qnum = 0;
        if($uid){
            $sign = UserSpeed::find()->asArray()->where("userId={$uid}")->all();
            foreach($sign as $v){
                if($v['answer']=='complete'){
                    $qnum = $qnum + 10;
                } else {
                    $qnum = $qnum + $v['answer'];
                }
            }
        }
        $percentum = ceil(($qnum/$totalWord['total'])*100);
        $this->title = '再要你命三千|GRE词汇红宝书|GRE词汇书推荐|GRE培训_雷哥GRE培训官网';
        $this->keywords = '再要你命三千,GRE词汇,红宝书,GRE词汇书推荐,GRE培训,GRE是什么考试,gre词汇精选,gre高频词汇,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供再要你命三千、GRE红宝书、GRE高频词汇、GRE词汇书推荐、GRE单词书推荐';
        return $this->render('gre_wordSecond',['data'=>$data,'totalWord'=>$totalWord,'phrase'=>$phrase,'percentum'=>$percentum]);
    }
    /**
     * GRE单词测试开始
     * by  yanni
     */
    public function actionWordStart(){
        $phraseId = Yii::$app->request->get('phraseId',1);
        $bagId = Yii::$app->request->get('bagId',1);
        if($phraseId && $bagId){
            return $this->redirect("/word_detail/".$phraseId."-".$bagId.".html");
        }
    }
    /**
     * GRE词汇认识
     * by  yanni
     */
    public function actionWordDetail(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $phraseId = Yii::$app->request->get('phraseId',1);
        $bagId = Yii::$app->request->get('bagId',1);
        $speed= \Yii::$app->db->createCommand("select pid,contentId,answer From {{%user_speed}}  WHERE userId=$uid and belong=$bagId")->queryOne();
        $phrase =  \Yii::$app->db->createCommand("select * From {{%content}}  WHERE id=$phraseId")->queryOne();
        $bag = \Yii::$app->db->createCommand("select * From {{%content}}  WHERE id=$bagId")->queryOne();
        $model = new Content();
        $totalNum = $model->find()->select("id")->where("pid={$bagId}")->count();
        if($speed){
            $data = $model->find()->asArray()->where("id={$speed['contentId']}")->one();
            $speedNum = $speed['answer'];
        } else{
            $data = $model->find()->asArray()->where("pid={$bagId}")->orderBy("id asc")->one();
            $answerModel = new UserSpeed();
            $answerModel->userId=$uid;
            $answerModel->contentId=$data['id'];
            $answerModel->answer=1;
            $answerModel->pid=$phraseId;
            $answerModel->belong=$bagId;
            $answerModel->createTime=time();
            $answerModel->save();
            $speedNum = 1;
        }
        $word = Words::find()->asArray()->where("word='{$data['name']}'")->one();
        $word['bagId'] = $data['pid'];
        $word['wordId'] = $data['id'];
        $wordSentence = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
        $tag = UserWords::find()->asArray()->where("wordId={$data['id']} and uid={$uid}")->one();
        $wordBook = StrangeWord::find()->asArray()->where("wordId={$data['id']} and uid={$uid}")->one();
        $this->title = '再要你命三千|GRE词汇红宝书|GRE词汇书推荐|GRE培训_雷哥GRE培训官网';
        $this->keywords = '再要你命三千,GRE词汇,红宝书,GRE词汇书推荐,GRE培训,GRE是什么考试,gre词汇精选,gre高频词汇,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供再要你命三千、GRE红宝书、GRE高频词汇、GRE词汇书推荐、GRE单词书推荐';
        return $this->render('gre_wordStudy',['word'=>$word,'phrase'=>$phrase,'bag'=>$bag['name'],'totalNum'=>$totalNum,'speedNum'=>$speedNum,'tag'=>$tag,'wordBook'=>$wordBook,'wordSentence'=>$wordSentence]);
    }
    /**
     * GRE单词复习页
     * by  yanni
     */
    public function actionWordReview(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die("请登录");
        }
        $phraseId = Yii::$app->request->get('phraseId');
        $bagId = Yii::$app->request->get('bagId');
        $model = new Content();
        $phrase = $model->find()->asArray()->where("id={$phraseId}")->one();
        $bag = $model->find()->asArray()->where("id={$bagId}")->one();
        $words = $model->find()->asArray()->where(" pid={$bagId}")->all();
        foreach($words as $k=>$v){
            $words[$k]['detail'] = Words::find()->asArray()->where("word='{$v['name']}'")->one();
        }
        $knowArr=[];
        $vagueArr = [];
        $knowWords = UserWords::find()->asArray()->where("bagId={$bagId} and uid={$uid} and userState!=1")->all();//认识
        foreach($knowWords as $v){
            $knowArr[]=$v['wordId'];
        }
        $vagueWords = UserWords::find()->asArray()->where("bagId={$bagId} and uid={$uid} and userState=1")->all();//模糊
        foreach($vagueWords as $a){
            $vagueArr[]=$a['wordId'];
        }
        $this->title = '再要你命三千|GRE词汇红宝书|GRE词汇书推荐|GRE培训_雷哥GRE培训官网';
        $this->keywords = '再要你命三千,GRE词汇,红宝书,GRE词汇书推荐,GRE培训,GRE是什么考试,gre词汇精选,gre高频词汇,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供再要你命三千、GRE红宝书、GRE高频词汇、GRE词汇书推荐、GRE单词书推荐';
        return $this->render('gre_wordTest',['phrase'=>$phrase,'bag'=>$bag,'words'=>$words,'knowArr'=>$knowArr,'vagueArr'=>$vagueArr]);
    }
    /**
     * GRE完成复习
     * by  yanni
     */
    public function actionComplete(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $bagId = Yii::$app->request->get('bagId');
        $upSpeed = UserSpeed::updateAll(['answer'=>"complete"],"userId={$uid} and belong={$bagId}");
        if($upSpeed){
            $res = ['code'=>1,'message'=>'提交成功'];
        } else {
            $res = ['code'=>0,'message'=>'提交失败'];
        }
        die(json_encode($res));
    }
    /**
     * 单词做模糊标记
     * by  yanni
     */
    public function actionTagWord(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $phraseId = Yii::$app->request->get('phraseId');
        $bagId = Yii::$app->request->get('bagId');
        $wordId = Yii::$app->request->get('wordId');
        $tag = Yii::$app->request->get('tag');
        $userTag = UserWords::find()->asArray()->where("wordId={$wordId} and uid={$uid}")->one();
        if($userTag){
            $model = new UserWords();
            $r = $model->findOne($userTag['id']);
            $r->seeTime = time();
            $r->userState = $tag;
            $res = $r->save();
            if($res>0){
                $data = ['code'=>1];
            } else {
                $data = ['code'=>2,'message'=>'已经标记'];
            }
        } else{
            $model = new UserWords();
            $model->uid = $uid;
            $model->wordId = $wordId;
            $model->seeTime = time();
            $model->bagId = $bagId;
            $model->phraseId = $phraseId;
            $model->userState = $tag;
            $res = $model->save();
            if($res){
                $data = ['code'=>1];
            } else {
                $data = ['code'=>0,'message'=>'失败'];
            }
        }
        die(json_encode($data));
    }
    /**
     * ajax获取模糊词汇
     * by  yanni
     */
    public function actionGetmohu(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $bagId = Yii::$app->request->get('bagId');
        $vagueNum =  UserWords::find()->select("id")->asArray()->where("bagId={$bagId} and uid={$uid} and userState=1")->count();
        $vagueWords = UserWords::find()->asArray()->where("bagId={$bagId} and uid={$uid} and userState=1")->orderBy("id asc")->one();//模糊
        $data = Content::find()->asArray()->where("id={$vagueWords['wordId']}")->one();
        $word = Words::find()->asArray()->where("word='{$data['name']}'")->one();
        $word['bagId'] = $data['pid'];
        $word['wordId'] = $data['id'];
        $word['vagueNum'] = $vagueNum;
        $word['wordSentence'] = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
        $res = ['code'=>1,'message'=>'获取成功','word'=>$word];
        die(json_encode($res));
    }
    /**
     * ajax获取下一个模糊词汇
     * by  yanni
     */
    public function actionGetTagWord(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $wordId = Yii::$app->request->get('wordId',4221);
        $bagId = Yii::$app->request->get('bagId',4217);
        $tag = Yii::$app->request->get('tag',1);
        $data = UserWords::find()->asArray()->where("wordId={$wordId} and uid={$uid}")->one();
        $lowerWord = UserWords::find()->asArray()->where("bagId={$bagId} and uid={$uid} and id>{$data['id']} and userState={$tag}")->orderBy(" id asc")->one();
        if($lowerWord){
            $lowerData = Content::find()->asArray()->where("id={$lowerWord['wordId']}")->one();
            $word = Words::find()->asArray()->where("word='{$lowerData['name']}'")->one();
            $word['bagId'] = $lowerData['pid'];
            $word['wordId'] = $lowerData['id'];
            $word['wordSentence'] = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
            $res = ['code'=>1,'message'=>'获取成功','word'=>$word];
        } else {
            $res = ['code'=>0,'message'=>'模糊单词看完前往复习'];
        }
        die(json_encode($res));
    }
    /**
     * ajax获取上一个模糊词汇
     * by  yanni
     */
    public function actionUpperTagWord(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $wordId = Yii::$app->request->get('wordId');
        $bagId = Yii::$app->request->get('bagId');
        $tag = Yii::$app->request->get('tag');
        $data = UserWords::find()->asArray()->where("wordId={$wordId} and uid={$uid}")->one();
        $upperWord = UserWords::find()->asArray()->where("bagId={$bagId} and uid={$uid} and id<{$data['id']} and userState={$tag}")->orderBy(" id desc")->one();
        if($upperWord){
            $upperData = Content::find()->asArray()->where("id={$upperWord['wordId']}")->one();
            $word = Words::find()->asArray()->where("word='{$upperData['name']}'")->one();
            $word['bagId'] = $upperData['pid'];
            $word['wordId'] = $upperData['id'];
            $word['wordSentence'] = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
            $res = ['code'=>1,'message'=>'获取成功','word'=>$word];
        } else {
            $res = ['code'=>0,'message'=>'没有上一个了'];
        }
        die(json_encode($res));
    }
    /**
     * ajax获取下一个词汇
     * by  yanni
     */
    public function actionGetLowerWord(){
        $userId = Yii::$app->session->get('uid');
        if(!$userId){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $wordId = Yii::$app->request->get('wordId');
        $bagId = Yii::$app->request->get('bagId');
        $model = new Content();
        $data = $model->find()->asArray()->where("id={$wordId}")->one();
        $lowerWord = $model->find()->asArray()->where("pid={$bagId} and id>{$data['id']}")->orderBy(" id asc")->one();
        if($lowerWord){
            $word = Words::find()->asArray()->where("word='{$lowerWord['name']}'")->one();
            $word['bagId'] = $lowerWord['pid'];
            $word['wordId'] = $lowerWord['id'];
            $word['wordSentence'] = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
            $speed= \Yii::$app->db->createCommand("select answer From {{%user_speed}}  WHERE userId=$userId and belong=$bagId")->queryOne();
            $answer = $speed['answer']+1;
            $upSpeed = UserSpeed::updateAll(['contentId' => "{$lowerWord['id']}",'answer'=>"{$answer}"],"contentId={$data['id']}");
            $tag = UserWords::find()->asArray()->where("wordId={$lowerWord['id']} and uid={$userId}")->one();
            $wordBook = StrangeWord::find()->asArray()->where("wordId={$lowerWord['id']} and uid={$userId}")->one();
            if($upSpeed){
                $res = ['code'=>1,'message'=>'获取成功','word'=>$word,'tag'=>$tag,'wordBook'=>$wordBook];
            } else {
                $res = ['code'=>0,'message'=>'获取失败'];
            }
        } else {
            $res = ['code'=>2,'message'=>'词包看完前往复习'];
        }
        die(json_encode($res));
    }
    /**
     * ajax获取上一个词汇
     * by  yanni
     */
    public function actionGetUpperWord(){
        $userId = Yii::$app->session->get('uid');
        if(!$userId){
            die(json_encode(['code'=>0,'message'=>'请登录']));
        }
        $wordId = Yii::$app->request->get('wordId');
        $bagId = Yii::$app->request->get('bagId');
        $model = new Content();
        $data = $model->find()->asArray()->where("id={$wordId}")->one();
        $upperWord = $model->find()->asArray()->where("pid={$bagId} and id<{$data['id']}")->orderBy(" id desc")->one();
        if($upperWord){
            $word = Words::find()->asArray()->where("word='{$upperWord['name']}'")->one();
            $word['bagId'] = $upperWord['pid'];
            $word['wordId'] = $upperWord['id'];
            $word['wordSentence'] = WordsSentence::find()->asArray()->where("wordsId={$word['id']}")->all();
            $speed= \Yii::$app->db->createCommand("select answer From {{%user_speed}}  WHERE userId=$userId and belong=$bagId")->queryOne();
            $answer = $speed['answer']-1;
            $upSpeed = UserSpeed::updateAll(['contentId' => "{$upperWord['id']}",'answer'=>"{$answer}"],"contentId={$data['id']}");
            $tag = UserWords::find()->asArray()->where("wordId={$upperWord['id']} and uid={$userId}")->one();
            $wordBook = StrangeWord::find()->asArray()->where("wordId={$upperWord['id']} and uid={$userId}")->one();
            if($upSpeed){
                $res = ['code'=>1,'message'=>'获取成功','word'=>$word,'tag'=>$tag,'wordBook'=>$wordBook];
            } else {
                $res = ['code'=>0,'message'=>'获取失败'];
            }
        } else {
            $res = ['code'=>2,'message'=>'没有上一个了'];
        }
        die(json_encode($res));
    }

    /**
     * ajax获取词包
     * by  yanni
     */
    public function actionAjaxGetBag(){
        $groupId = Yii::$app->request->post('groupId',4213);
        $model = new Content();
        $data = $model->find()->asArray()->where("pid={$groupId}")->all();
        foreach($data as $k=>$v){
            $data[$k]['wordNum'] = Content::find()->select("id")->asArray()->where("pid={$v['id']}")->count();
        }
        die(json_encode($data));
    }
}