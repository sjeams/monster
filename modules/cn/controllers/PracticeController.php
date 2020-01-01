<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\Method;
use app\modules\cn\models\Question;
use app\modules\cn\models\QuestionNewLevel;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionLibrary;
use app\modules\question\models\Questions;
use yii;
use app\libs\ToeflController;
use app\modules\cn\models\QuestionCat;
use app\modules\cn\models\SourceCat;
use app\modules\cn\models\Content;
use app\modules\cn\models\QuestionsStatistics;
use app\modules\cn\models\UserAnswer;
use app\modules\cn\models\Category;

class PracticeController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =7;
    }

    //TODO 等级新需求的数据生成方法
    public function actionLevelOpt()
    {


        //1、删除ql不存在等级的题库、2、遍历lq表对不存在的题库的题进行填补和新生成题库、3、对题库名称的更新
        $old_ql = QuestionLibrary::find()->asArray()->select('id,level')->where('level is not null')->all();
        foreach ($old_ql as $k => $v){  //删除不存在level_id的题库
            $tmp = QuestionNewLevel::find()->asArray()->select('id')->where(['id' => $v['level']])->one();
            if (empty($tmp)){
                $change_lib_id[] = $v['id'];
            }
        }

        if (empty($change_lib_id)) die('请勿重复导入题库');

        //找到lq表不存在题库的题，和q表对比level，
        $lib_data = LibraryQuestion::find()->asArray()->select('questionId,libId')->where(['in', 'libId', $change_lib_id])->all(); //需要重新入题库的题
        foreach ($lib_data as $k => $v){
            $tmps    = Question::find()->asArray()->select('id,newLevel')->where(['id' => $v['questionId']])->one();   //TODO 目前的方案是一个一个查找、更新、检查是否溢出题库
            $lib_one = QuestionLibrary::find()->asArray()->select('id,level')->where(['level' => $tmps['newLevel']])->orderBy('id desc')->limit(1)->one();//当前等级最后的题库,order by id
            $counts  = LibraryQuestion::find()->asArray()->select('id,libId')->where(['libId' => $lib_one['id']])->count(); //最后题库中的题目数量
//            var_dump($counts);echo '<br>';die;
            if ($counts == 20){  //创建新题库
                $ql_model = new QuestionLibrary();
                $level_data      = QuestionNewLevel::find()->asArray()->select('id,catId,name')->where(['id' => $tmps['newLevel']])->one();
                $ql_model->catId = $level_data['catId'];
                $ql_model->name  = $level_data['name'].':test';
                $ql_model->level = $level_data['id'];
                $ql_model->save();
                //创建对应关系
                $lb_model = new LibraryQuestion();
                $lb_model->libId      = Yii::$app->db->getLastInsertID();
                $lb_model->questionId = $v['questionId'];
                $lb_model->save();
            }else{  //最后的题库中新增
                if ($lib_one['level'] == 8){
//                    echo $lib_one['id'].'<br>';
                }
                $lb_model = new LibraryQuestion();
                $lb_model->libId      = $lib_one['id'];
                $lb_model->questionId = $v['questionId'];
                $lb_model->save();
            }
        }
        foreach ($change_lib_id as $k => $v){
            QuestionLibrary::deleteAll(['id' => $v]);
            LibraryQuestion::deleteAll(['libId' => $v]);
        }
    }

    public function actionUpdateLibName()
    {
        $new_level = QuestionNewLevel::find()->asArray()->all();
        foreach ($new_level as $k => $v){
            $tmp = QuestionLibrary::find()->asArray()->where(['catId' => $v['catId'], 'level' => $v['id']])->all();
            foreach ($tmp as $_k => $_v){
//                die(json_encode($tmp));die;
//                echo $_k.'<br/>';
                QuestionLibrary::updateAll(['name' => $v['name'].':'.'test'.($_k + 1)], ['id' => $_v['id']]);
            }
        }
    }

    public function actionFerre()
    {
        //TODO 当存在该题库时不生成
//        $dada = [1,2,3,4,5,6,7];
//        for($q = 0;$q < count($dada);$q = $q + 2){
//            $qq = array_slice($dada, $q, 2);
//            print_r($qq);
//            echo '<br>';
//        }
//        die;
//        $data = Yii::$app->db->createCommand('select id,newLevel from x2_questions WHERE newLevel is not null')->queryAll(); //难度等级的题目数据
        $ql_model     = new \app\modules\cn\models\QuestionLibrary();
        $new_level_id = Yii::$app->db->createCommand('select catId,id,name from x2_question_new_level')->queryAll();//get level id
        $wait_clock   = 20; //lib question num
        foreach($new_level_id as $k => $v){
            //TODO 存在时不生成该题库
            $exist_lib = QuestionLibrary::find()->asArray()->where(['catId' => $v['catId'], 'level' => $v['id']])->one();
            if(!empty($exist_lib)) break;

            $tmp_data = Yii::$app->db->createCommand("select catId,id from x2_questions where catId={$v['catId']} and newLevel={$v['id']}")->queryAll();
            //TODO tmp_data的检测
//            foreach($tmp_data as $tmp_k => $tmp_v){
//
//                var_dump($tmp_v);die;
//            }
            if(!empty($tmp_data)){
                $count_number = count($tmp_data);
                if(count($tmp_data) > $wait_clock){
                    $count_name = 1;
                    for($i = 0; $i < $count_number; $i = $i + $wait_clock){
                        $lib_data = array_slice($tmp_data, $i, $wait_clock);    //切割相当的数据入题库
                        $libId = $ql_model->libInsert($v['catId'], $v['name'].':test'.$count_name, $v['id']);   //TODO 新建题库
                        foreach($lib_data as $lib_k => $lib_v){
                            $lib_data[$lib_k]['catId'] = $libId;
                        }
                        $ql_model->libQuestionInsert($lib_data);    //切割$wait_clock条数据,新增关联表
                        $count_name ++;
                    }
                }else{//TODO 少于20标准题库
                    $libId = $ql_model->libInsert($v['catId'], $v['name'].':test1', $v['id']);   //TODO 新建题库
                    foreach($tmp_data as $lib_k => $lib_v){
                        $tmp_data[$lib_k]['catId'] = $libId;
                    }
                    $ql_model->libQuestionInsert($tmp_data);    //切割$wait_clock条数据,新增关联表
                }

            }
        }
    }


    /**
     * GRE做题练习页
     * by  yanni
     */
    public function actionIndex(){
        $sectionId = Yii::$app->request->get('sectionId',1);    //单项ID
        $type      = Yii::$app->request->get('type');
        $page      = Yii::$app->request->get('page',1);
        $uid       = Yii::$app->session->get('uid');
        $sections  = '';
        $sources   = '';
        $knows     = '';
        if($type ==1) {
            $knowId = Yii::$app->request->get('knowId');    //知识点ID
            $knows = QuestionKnow::find()->asArray()->where(['catId' => $sectionId])->all();

            if (!$knowId) {
                $knowId = $knows[0]['id'];
            }
            $sections    = QuestionCat::find()->asArray()->all();  //单项分类

            $sourceId       = Yii::$app->request->get('sourceId');    //知识点ID
            $sourceModel    = new SourceCat();
            $sources        =  $sourceModel->getSource($sectionId);  //来源
//            $sources        =  $sourceModel->getSourceAll();  //来源
            if (!$sourceId) $sourceId = $sources[0]['id'];
            $where          = " catId={$sectionId} and type=2 and knowId={$knowId} and sourceId=$sourceId";
            $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$sectionId} and type=2 and knowId={$knowId} and sourceId=$sourceId")->all();  //题库题目
        } else {

            $sourceId    = Yii::$app->request->get('sourceId');    //来源ID
            $sections    = QuestionCat::find()->asArray()->all();  //单项分类
            $sourceModel = new SourceCat();
            $sources     =  $sourceModel->getSource($sectionId);  //来源
            if(!$sourceId) $sourceId = $sources[0]['id'];
            $where       = " catId={$sectionId} and type=1 and sourceId={$sourceId}";
            $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$sectionId} and type=1 and sourceId={$sourceId}")->all();  //单项题库
        }

        if($type == 2){ //TODO 难度练习
            $levelId = Yii::$app->request->get('sourceId',1);    //TODO 兼容路由和前端，sourceId代表levelId
            if($levelId == 0){  //按照new_level的id排序，而非顺序
                $default_data = QuestionNewLevel::find(1)->asArray()->where("catId={$sectionId} order by id desc limit 1")->all();
                $levelId = $default_data[0]['id'];;
            }
            $sections    = QuestionCat::find()->asArray()->all();  //单项分类
            $sourceModel = new QuestionNewLevel();
            $sources     =  $sourceModel->getSource($sectionId);  //题目难度

            $where       = " catId={$sectionId} and level={$levelId}";    //level id
            $totalQuestions = QuestionLibrary::find()->asArray()->where("catId={$sectionId} and level={$levelId}")->all();  //单项题库
            $sourceId    = NULL;    //兼容$wheres查询已做题数
        }

        $averageTime = 0;
        $correctRate = 0;
        $totalNum    = 0;
        $totalDoNum  = 0;
        $do_tiku     = 0;
        foreach($totalQuestions as $k=>$v){
            $qmodel       = new QuestionLibrary();
            $totalSubject = $qmodel->getLibraryQuestionNum($v['id']);   //所以题目
            $totalNum     = $totalNum+$totalSubject;
            $do_questions =  $qmodel->getLibraryCompleteTotalUser($v['id']);   //完成人数
            $totalDoNum   = $totalDoNum + $do_questions;
            $amodel       = new UserAnswer();
            $time         = $amodel->getLibraryAverageTime($v['id'],$uid);
            $averageTime  = $averageTime+$time;
            $correct      = $amodel->getLibraryCorrectRate($v['id']);   //题库正确率
            if(!empty($correct)){
                $do_tiku  = $do_tiku+1;
                $correctRate = $correctRate+$correct;
            }
        }
        $qmodel = new QuestionLibrary();
        $data = $qmodel->getQuestionLibrary($where,$page,10);
        $questions = $data['data'];
        if($uid){
            $wheres = "ua.uid=$uid and answerType=1";
            if($sectionId){
                $wheres .= " AND q.catId=$sectionId";
            }
            if(isset($knowId)){
                $wheres .= " AND q.knowId=$knowId";
            }
            if(isset($sourceId)){
                $wheres .= " AND q.sourceId=$sourceId";
            }
            //TODO 兼容level条件
            if(isset($levelId)){
                $wheres .= " AND q.newLevel=$levelId";
            }
            $answeModel = new UserAnswer();
            $userAnswerNum = $answeModel->getUserAnswerCount($wheres);  //我的做题数
            $userAnswerRight = $answeModel->getUserAnswerCountRight($wheres);
            if ($userAnswerNum == 0){
                $user_correct = 0;
            }else{
                $user_correct = round($userAnswerRight/$userAnswerNum*100); //我的正确率
            }
        } else {
            $userAnswerNum = 0;
            $user_correct = 0;
        }
        foreach($questions as $k=>$v){
            $amodel = new UserAnswer();
            $qmodel = new QuestionLibrary();
            $questions[$k]['qNum'] = $qmodel->getLibraryQuestionNum($v['id']);    //题库题目数量
            $questions[$k]['dqNum'] = $qmodel->getLibraryDoQuestionTotalUser($v['id']);   //做题人数
            $questions[$k]['myState'] = $amodel->getUserCompleteState($v['id'],$uid);  //获取当前用户题库做题情况
            //ajax 实现
//            foreach($subject as $key=>$va){
//                $sign = Questions::find()->asArray()->where("id={$va['questionId']}")->one();
//                if($sign){
//                    $questions[$k]['question'][$key] = $sign;
//                    $userAnswer = UserAnswer::find()->where("questionId={$va['questionId']}")->groupBy("uid")->all();
//                    $questions[$k]['question'][$key]['doNum'] = count($userAnswer);
//                    $amodel = new UserAnswer();
//                    $questions[$k]['question'][$key]['averageTime'] = Method::secToTime($amodel->getAverageTime($va['questionId']));
//                    $questions[$k]['question'][$key]['correctRate'] = $amodel->getCorrectRate($va['questionId']);
//                    $qmodel = new Questions();
//                    $questions[$k]['question'][$key]['section'] = $qmodel->getSection($sign['catId']);
//                    $questions[$k]['question'][$key]['source'] = $qmodel->getSource($sign['sourceId']);
//                }
//            }
        }
        if($totalQuestions){
            if($do_tiku == 0){
                $correctRate = 0;
            }else{
                $correctRate = round($correctRate/$do_tiku);
            }
            if(!$uid){
                if($do_tiku == 0){
                    $averageTime = 0;
                }else{
                    $averageTime = round($averageTime/$do_tiku);
                }
            }
        }
        $amodel = new UserAnswer();
        $reviewRank = $amodel->getReviewRank(0,50);
        $newComment = $amodel->getNewComment(10);
        $this->title = 'GRE在线做题_GRE真题练习_GRE免费做题_做题报告分析_雷哥GRE在线题库';
        $this->keywords = 'GRE题库,GRE真题,GRE机经,GRE题目解析,GRE填空,GRE阅读,GRE逻辑,GRE数学,GRE做题数据分析,错题练习';
        $this->description = '雷哥GRE在线练习题库提供GRE历年真题练习、题目解析、题目讨论，包含verbal语文和quant数学单项练习、考点练习、错题练习，做题练习报告与数据分析，让你高效备考。';
        return $this->render('gre_testCenter',['sections'=>$sections,'sources'=>$sources,'knows'=>$knows,'questions'=>$questions,'totalNum'=>$totalNum,'totalDoNum'=>$totalDoNum,'userAnswerNum'=>$userAnswerNum,'correctRate'=>$correctRate,'averageTime'=>Method::secToTime($averageTime),'pageStr'=>$data['pageStr'],'total'=>$data['totalPage'],'newComment'=>$newComment,'reviewRank'=>$reviewRank, 'user_correct' => $user_correct]);
    }
    /**
     * 题库题目数据
     * ajax
     */
    public function actionLibQuestion(){
        $libId = Yii::$app->request->get("libId");
        if(!$libId) die(['code'=>0,'message'=>'参数错误']);
        $subject = LibraryQuestion::find()->asArray()->where("libId=$libId")->all();   //所有题目
        $question = [];
        foreach($subject as $key=>$va){
            $sign = Questions::find()->asArray()->where("id={$va['questionId']}")->one();
            if($sign){
                $question[$key] = $sign;
                $amodel = new UserAnswer();
                $question[$key]['doNum'] = $amodel->getDoQuestionUserTotalNum($va['questionId']);
                $question[$key]['averageTime'] = Method::secToTime($amodel->getAverageTime($va['questionId']));
                $question[$key]['correctRate'] = $amodel->getCorrectRate($va['questionId']);
                $qmodel = new Questions();
                $question[$key]['section'] = $qmodel->getSection($sign['catId']);
                if(!empty($sign['newLevel'])){  //TODO 难度练习的兼容
                    $lib_data = QuestionLibrary::find()->asArray()->where("id={$libId}")->one();
                    $question[$key]['source']['alias'] = $lib_data['name'];
                }else{
                    $question[$key]['source'] = $qmodel->getSource($sign['sourceId']);  //普通source
                }
            }
        }
        die(json_encode(['code'=>1,'message'=>'获取成功','question'=>$question]));
    }


    /**
     * 做题结果页
     * by  yanni
     */
    public function actionQuestionResult(){
        $libId = Yii::$app->request->get('libId');
        $uid = Yii::$app->session->get('uid');
        $model = new QuestionsStatistics();
        $userStatistic = $model->find()->asArray()->where("uid={$uid} and libraryId={$libId}")->one();
        $userStatistic['totalNum'] = LibraryQuestion::find()->select("id")->asArray()->where("libId={$libId}")->count();
        $qmodel = new Questions();
        $library = QuestionLibrary::find()->asArray()->where("id={$libId}")->one();
        $section = $qmodel->getSection($library['catId']);
        if($library['type']!=2){
            //优化yanni问题 TODO
            if(empty($library['type'])){
                $source = '';
            }else{
                $source = $qmodel->getSource($library['sourceId']);
            }
        } else{
            $source = '';
        }

        //TODO 优化
        if(!empty($userStatistic['correctRate'])){
            $compete  = $model->getCompete($uid,$libId,$userStatistic['correctRate']);
        }else{
            $compete = '';
        }
        if(!empty($userStatistic['totalTime'])){
            $pace = $model->getPace($userStatistic['totalNum'],$userStatistic['totalTime']);
        }else{
            $pace = '';
        }
        $aModel = new UserAnswer();
        $correctNum = $aModel->find()->select("id")->asArray()->where("uid={$uid} and libId={$libId} and correct=1 and answerType=1")->count();
        $data = $aModel->getUserAnswerData($libId,$uid);
        $this->title = 'GRE做题报告分析_GRE在线做题_GRE真题练习_GRE免费做题_做题报告分析_雷哥GRE在线题库';
        $this->keywords = 'GRE题库,GRE真题,GRE机经,GRE题目解析,GRE填空,GRE阅读,GRE逻辑,GRE数学,GRE做题数据分析,错题练习';
        $this->description = '雷哥GRE在线练习题库提供GRE历年真题练习、题目解析、题目讨论，包含verbal语文和quant数学单项练习、考点练习、错题练习，做题练习报告与数据分析，让你高效备考。';
        return $this->render('gre_result',['data'=>$data,'compete'=>$compete,'pace'=>$pace,'section'=>$section,'source'=>$source,'library'=>$library,'correctNum'=>$correctNum,'userStatistic'=>$userStatistic]);
    }
}
