<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionLibrary;
use app\modules\question\models\Questions;
use app\modules\cn\models\Question;
use yii;
use app\libs\Method;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\cn\models\QuestionCat;
use app\modules\cn\models\SourceCat;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\SynchroLog;
use app\modules\cn\models\Category;


class PaperPageController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'not';
    /**
     * GRE开始做题
     * by  yanni
     */
    public function actionIndex(){
        $libId = Yii::$app->request->get('libId',1);
//        $qId = Yii::$app->request->get('qId');
        $uid = Yii::$app->session->get('uid');
        if($uid){
            $do_questions = UserAnswer::find()->asArray()->where("uid={$uid} and libId={$libId}")->groupBy("questionId")->all();  //用户已做题
            $queStr = '';
            if($do_questions){
                foreach($do_questions as $v){
                    $queStr .= $v['questionId'].",";
                }
            } else{
                $questionsStat = QuestionsStatistics::find()->asArray()->where("uid={$uid} and libraryId={$libId}")->one();
                if(!$questionsStat) {
                    $data['uid'] = $uid;
                    $data['libraryId'] = $libId;
                    $data['totalNum'] = LibraryQuestion::find()->select("id")->where("libId=$libId")->count();
                    $data['startTime'] = time();
                    $data['interruptTime'] = time();
                    Yii::$app->db->createCommand()->insert('{{%questions_statistics}}', $data)->execute();
                }
            }
            if(!empty($queStr)){
                $queStr = substr($queStr, 0, -1);
                $nextQuestion = LibraryQuestion::find()->asArray()->where("libId={$libId} and questionId not in ({$queStr})")->one();
            } else{
                $nextQuestion = LibraryQuestion::find()->asArray()->where("libId={$libId}")->one();
            }
//            if($qId){
//                $nextQuestion['questionId'] = $qId;
//                $data['answer'] = UserAnswer::find()->asArray()->where("uid={$uid} and questionId={$qId}")->one();
//            }
            if($nextQuestion){
                $questionData = Questions::find()->asArray()->where("id = {$nextQuestion['questionId']}")->one();
                $qmodel = new Questions();
                $section = $qmodel->getSection($questionData['catId']);
                $source = $qmodel->getSource($questionData['sourceId']);
                //TODO 优化难度练习的题库显示
                $lib_data = QuestionLibrary::find()->asArray()->where("id={$libId}")->one();
                if(!empty($lib_data['level'])){
                    $queString = $section . "&nbsp;" .$lib_data['name']."-".$questionData['id'];
                }else{
                    $queString = $section . "&nbsp;" .$source['name']."-".$questionData['id'];
                }
                $result =QuestionsStatistics::find()->asArray()->where("uid={$uid} and libraryId={$libId}")->one();
                $result['totalNum'] =LibraryQuestion::find()->select("id")->asArray()->where("libId={$libId}")->count();
                if($questionData['optionA']){
                    $questionData['optionA'] = Method::getTextHtmlArr($questionData['optionA']);
                }
                if($questionData['optionB']){
                    $questionData['optionB'] = Method::getTextHtmlArr($questionData['optionB']);
                }
                if($questionData['optionC']){
                    $questionData['optionC'] = Method::getTextHtmlArr($questionData['optionC']);
                }
//                $data['questionData'] = $questionData;
//                $data['queString'] = $queString;
//                $data['result'] = $result;
                switch($questionData['typeId']) {
                    case 1:
                        return $this->render('gre_dk',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 2:
                        return $this->render('gre_2k',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 3:
                        return $this->render('gre_3k',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 4:
                        return $this->render('gre_6select2',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 5:
                        return $this->render('gre_5select1',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 6:
                        return $this->render('gre_read_dx',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 7://句子点选
                        $questionData['readArticle'] = rtrim(strip_tags($questionData['readArticle']),".");
                        $questionData['readArticle'] = explode(".",$questionData['readArticle']);
                        return $this->render('gre_read_click',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 8:
                        return $this->render('gre_radioDe',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 9:
                        return $this->render('gre_checkDe',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    case 10:
                        return $this->render('gre_tkDe',['questionData'=>$questionData,'queString'=>$queString,'result'=>$result]);
                        break;
                    default:
                        echo '<script>alert("其他题型")</script>';
                }
            } else {
                header("location:/practice/result-".$libId.".html");die;   //结果页
            }
        } else {
            header("location:https://login.viplgw.cn/cn/index?source=22&url=".Yii::$app->request->hostInfo.Yii::$app->request->getUrl());die;
        }
    }

//    /**
//     * GRE做题回顾
//     * by  yanni
//     */
//    public function actionReview(){
//        $libId= Yii::$app->request->get('libId');
//        $uid= Yii::$app->session->get('uid');
//        $do_questions = UserAnswer::find()->asArray()->select(['questionId'])->where("uid={$uid} and libId={$libId}")->groupBy("questionId")->all();  //用户已做题
////        var_dump($do_questions);die;
////        var_dump($uid);die;
//        $libDetail = QuestionLibrary::find()->asArray()->where("id={$libId}")->one();        //题库详情
//        $total_questions = LibraryQuestion::find()->asArray()->select(['questionId'])->where("libId={$libId}")->all();        //全部题目
//        foreach($total_questions as $k=>$v){
//            $total_questions[$k]['status'] = 2;  //默认未做状态
//            foreach($do_questions as $va){
//                if($v['questionId']==$va['questionId']){
//                    $total_questions[$k]['status'] = 1;   //  已做状态
//                }
//            }
//        }
//        return $this->renderPartial('gre_Review',['data'=>$total_questions,'totalCount'=>count($total_questions),'doCount'=>count($do_questions),'libId'=>$libId,'libName'=>$libDetail['name']]);
//    }
    /**
     * GRE重新做题
     * by  yanni
     */
    public function actionAgainMake(){
        $libId = Yii::$app->request->get('libId',1);
        $uid = Yii::$app->session->get('uid');
        $res = UserAnswer::deleteAll("uid={$uid} and libId={$libId} and answerType=1");
        if($res){
            $upArr['doNum'] = 0;
            $upArr['totalTime'] = 0;
            $upArr['startTime'] = time();
            $upArr['interruptTime'] = time();
            $upArr['state'] = 0;
            $upArr['correctRate'] = 0;
            QuestionsStatistics::updateAll($upArr,"uid={$uid} and libraryId={$libId}");
            SynchroLog::updateAll(['lastTime'=>time()],"uid={$uid}"); //最后操作时间
            header("location:/practice/".$libId.".html");die;   //开始做题
        } else {
            die('<script>alert("清除记录失败");history.go(-1);</script>');
        }
    }
    /**
     * GRE重新做题
     * by  yanni
     */
    public function actionHelp(){
        return $this->render('gre_help');
    }
}