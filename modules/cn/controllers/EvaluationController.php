<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/23
 * Time: 14:44
 */
namespace app\modules\cn\controllers;

use app\libs\Method;
use app\libs\ToeflController;
use app\modules\cn\models\User;
use app\modules\cn\models\UserEvaluation;
use app\modules\cn\models\UserRecord;
use Yii;

class EvaluationController extends ToeflController{
    public $layout = 'cn';
    public $enableCsrfValidation = false;
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
    /**
     * GRE测评首页
     *
     */
    public function actionIndex(){
        $uid = Yii::$app->session->get("uid");
        if($uid){
            $model = new UserRecord();
            $types = array(1,2);// 1-初级 2-中级
            foreach($types as $k => $v){
                $type = $model::find()->where("uid = $uid and type = $v and over = 1")->one();
                if(empty($type) || !$type){
                    $do = 0;
                    $doid = UserEvaluation::find()->where("uid = $uid and type = $v and do = 0")->orderBy("id desc")->asArray()->one()['questionId'];
                    if(!$doid) $doid = 0;
                }else{
                    $do = 1;//是否做过该套测评  1-已做 0-未做
                    $doid = 0; //上次做到的测评题id  未做即为0
                }
                $arr[] = [$do,$doid];
            }
            $one = $arr[0];// 初级
            $two = $arr[1];// 中级
        }else{
            $one = array();
            $two =arraY();
        }
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->render('evaluation',['one'=>$one,'two'=>$two,'uid'=>$uid]);
    }

    /**
     * 测评提示
     *
     */
    public function actionPrompt(){
        $type = Yii::$app->request->get("type");
        $doid = Yii::$app->request->get("doId");
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->renderPartial("evaluation-tishi",['doId'=>$doid,'type'=>$type]);
    }
    /**
     * @return string
     * 下一题
     */
    public function actionWrite(){
        $model = new UserEvaluation();
        if($_POST){
            $questionid = Yii::$app->request->post("id");
            $type = Yii::$app->request->post('type');
            $uid = Yii::$app->request->post("uid");
            $mark = Yii::$app->request->post("mark");
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
                $evaluation->mark = $mark;
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
                $model->mark = $mark;
                $model->do = 1;
                $model->correct = $correct;
                $res = $model->save();
            }
            if($res){
                uc_user_edit_integral1($uid,'GRE用户测评',1,2);
                $data = ['code'=>1,'message'=>'success','id'=>$questionid,'type'=>$type,'hastime'=>$hastime];
            }else{
                $data = ['code'=>0,'message'=>'fail'];
            }
            die(json_encode($data));
        }else{
            $uid = Yii::$app->session->get("uid");
            $questionid = Yii::$app->request->get("id");
            $type = Yii::$app->request->get("type");
            if(!$questionid) $questionid = 0;
            $content = $model->getDetail($questionid,$type);
            if($questionid == 0){
                $hastime = 1800;
            }else{
                $hastime = UserEvaluation::find()->where("uid = $uid and type = $type ")->orderBy("id desc")->asArray()->all()[0]['hasTime'];
            }
            $times = $this->getMinute($hastime);
//            $id = $content['id'];
//            $mark = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $id")->select("mark")->one()['mark'];
//            if(!$mark) $mark = 0;
            $knowId = $content['typeId'];
            $optionA = $content['optionA'];
            $optionB = $content['optionB'];
            $optionC = $content['optionC'];
            if($optionA){
                $optionsA = Method::getTextHtmlArr($optionA);
                $content['optionsA'] = $optionsA;
                $content['options'] = $optionsA;
            }else{
                $content['optionsA'] = array();
                $content['options'] = array();
            }
            if($optionB){
                $optionsB = Method::getTextHtmlArr($optionB);
                $content['optionsB'] = $optionsB;
            }else{
                $content['optionsB'] = array();
            }
            if($optionC){
                $optionsC = Method::getTextHtmlArr($optionC);
                $content['optionsC'] = $optionsC;
            }else{
                $content['optionsC'] = array();
            }
            //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
            if($knowId == 1){
                $html = 'gre_dk';
            }elseif($knowId == 2){
                $html = 'gre_2k';
            }elseif($knowId == 3){
                $html = 'gre_3k';
            }elseif($knowId == 4 ){
                $html = 'gre_6select2';
            }elseif($knowId == 5){
                $content['readArticles'] = Method::getTextHtmlArr($content['readArticle'])[0];
                $content['details'] = Method::getTextHtmlArr($content['details'])[0];
                $html = 'gre_5select1';
            }elseif($knowId == 6){
                $content['readArticles'] = Method::getTextHtmlArr($content['readArticle'])[0];
                $content['details'] = Method::getTextHtmlArr($content['details'])[0];
                $html = 'gre_read_dx';
            }elseif($knowId == 7){
                $html = 'gre_read_click';
                $readArticle = Method::getTextHtmlArr($content['readArticle'])[0];
                $articles =  explode('.',$readArticle);
                $content['readArticles'] =$articles;
                $content['details'] = Method::getTextHtmlArr($content['details'])[0];
            }elseif($knowId == 8){
                $html = 'gre_radioDe';
            }elseif($knowId == 9){
                $html = 'gre_checkDe';
            }elseif($knowId == 10) {
                $html = 'gre_tkDe';
            }
            $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
            $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
            $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

            return $this->renderPartial($html, ['content' => $content, 'uid' => $uid, 'hastime' => $hastime,'times'=>$times]);
        }
    }

    public function actionReview(){
        $uid = Yii::$app->request->get("uid");
        $type = Yii::$app->request->get("type");
        $id = Yii::$app->request->get("id");
        $site = Yii::$app->request->get("site");
        $total = Yii::$app->request->get("total");
        $catid = Yii::$app->request->get("catid");
        if(!$uid){
            $contents = array();
        }else{
            $contents = UserEvaluation::find()->asArray()->where("uid = $uid and type = $type")->all();
        }
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->renderPartial('gre_Review',['contents'=>$contents,'id'=>$id,'type'=>$type,'site'=>$site,'total'=>$total,'catid'=>$catid]);
    }

    /**
     * @return string
     * 测评结果 cy
     */
    public function actionResult(){
        $uid = Yii::$app->request->get("uid");
        $type = Yii::$app->request->get("type");
        $nickname = User::find()->asArray()->where("uid = $uid")->one()['nickname'];
        $model = new UserEvaluation();
        $datas = $model->getContent($uid,$type);//题目信息
        foreach($datas as $kk => $vv){
            foreach($vv as $k => $v){
                $optionA = $v['optionA'];
                $optionB = $v['optionB'];
                $optionC = $v['optionC'];
                if($optionA){
                    $optionsA = Method::getTextHtmlArr($optionA);
                    $datas[$kk][$k]['optionsA'] = $optionsA;
                    $datas[$kk][$k]['options'] = $optionsA;
                }else{
                    $datas[$kk][$k]['optionsA'] = array();
                    $datas[$kk][$k]['options'] = array();
                }
                if($optionB){
                    $optionsB = Method::getTextHtmlArr($optionB);
                    $datas[$kk][$k]['optionsB'] = $optionsB;
                }else{
                    $datas[$kk][$k]['optionsB'] = array();
                }
                if($optionC){
                    $optionsC = Method::getTextHtmlArr($optionC);
                    $datas[$kk][$k]['optionsC'] = $optionsC;
                }else{
                    $datas[$kk][$k]['optionsC'] = array();
                }

                //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
                $typeId = $v['typeId'];
                if($typeId == 2 || $typeId == 3 || $typeId == 6 ||$typeId == 9 ||$typeId == 4  ){
                    $useranswer = str_split($v['useranswer']);
                    $correctanswer = str_split($v['correctanswer']);
                    $datas[$kk][$k]['useranswers'] = $useranswer;
                    $datas[$kk][$k]['correctanswers'] = $correctanswer;
                }
                if($typeId == 5 || $typeId == 6 || $typeId == 7){
                    $datas[$kk][$k]['details'] = Method::getTextHtmlArr($v['details'])[0];
                }
                if($typeId == 7){
                    $readArticle = Method::getTextHtmlArr($v['readArticle'])[0];
                    $articles =  explode('.',$readArticle);
                    $datas[$kk][$k]['readArticles'] = $articles;
                }
            }
        }
        $counts = $model->correctCount($uid,$type);//各个类型的正确数、总数
        $record = UserRecord::find()->where("type = $type and uid = $uid")->one();
        if(is_null($record['verbal']) || is_null($record['quant']) || is_null($record['verbalRate']) || is_null($record['quantRate'])){
            $correctRates = $model->correctRate($uid,$type,'result');//各个类型的正确率
            $ceRate = $correctRates[0];
            $totalscale = $correctRates[3] + $correctRates[4];
        }else{
            $ceRate = $record['correctRate'];
            $totalscale = $record['verbal'] + $record['quant'];
            $correctRates = [$record['correctRate'],$record['verbalRate'],$record['quantRate'],$record['verbal'],$record['quant']];
        }
        $beatcount = UserRecord::find()->select("count(id) as coun")->where("type = $type and correctRate < $ceRate")->asArray()->one()['coun'];//打败人数
        if(!$beatcount)$beatcount = 0;
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->render('evaluation-result',['datas'=>$datas,'correctRates'=>$correctRates,'nickname'=>$nickname,'beatcount'=>$beatcount,'counts'=>$counts,'type'=>$type,'totalsca'=>$totalscale]);
    }

    public function actionExitSection(){
        $uid = Yii::$app->session->get("uid");
        $type = Yii::$app->request->get("type");
        $id = Yii::$app->request->get("id");
        $site = Yii::$app->request->get("site");
        $total = Yii::$app->request->get("total");
        $catid = Yii::$app->request->get("catid");
        $hastime = Yii::$app->request->get("hastime");
        $data = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $id")->one();
        if($data){
            $data->hasTime = $hastime;
            $data->save();
        }else{
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->type = $type;
            $model->questionId = $id;
            $model->hasTime = $hastime;
            $model->createTime = date('Y-m-d H:i:s');
            $model->save();
        }
        return $this->renderPartial('gre_exit',['type'=>$type,'id'=>$id,'uid'=>$uid,'site'=>$site,'total'=>$total,'catid'=>$catid]);
    }
    public function actionHelp(){
        $type = Yii::$app->request->get("type");
        $id = Yii::$app->request->get("id");
        $hastime = Yii::$app->request->get("hastime");
        $uid = Yii::$app->session->get("uid");
        $data = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $id")->one();
        if($data){
            $data->hasTime = $hastime;
            $data->save();
        }else{
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->type = $type;
            $model->questionId = $id;
            $model->hasTime = $hastime;
            $model->createTime = date('Y-m-d H:i:s');
            $model->save();
        }
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->renderPartial('gre_help',['type'=>$type,'id'=>$id,'hastime'=>$hastime]);
    }
    public function actionQuit(){
        $uid = Yii::$app->session->get("uid");
        $type = Yii::$app->request->get("type");
        $id = Yii::$app->request->get("id");
        $site = Yii::$app->request->get("site");
        $total = Yii::$app->request->get("total");
        $catid = Yii::$app->request->get("catid");
        $hastime = Yii::$app->request->get("hastime");
        $data = UserEvaluation::find()->where("uid = $uid and type = $type and questionId = $id")->one();
        if($data){
            $data->hasTime = $hastime;
            $data->save();
        }else{
            $model = new UserEvaluation();
            $model->uid = $uid;
            $model->type = $type;
            $model->questionId = $id;
            $model->hasTime = $hastime;
            $model->createTime = date('Y-m-d H:i:s');
            $model->save();
        }
        $this->title = '雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线';
        $this->keywords = '雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题';
        $this->description = '雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！';

        return $this->renderPartial('gre_quit',['type'=>$type,'id'=>$id,'uid'=>$uid,'site'=>$site,'total'=>$total,'catid'=>$catid,'hastime'=>$hastime]);
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