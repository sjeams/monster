<?php
namespace app\modules\cn\models;

use app\libs\Method;
use app\modules\question\models\Questions;
use yii\db\ActiveRecord;

class MockRecord extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%user_mock_record}}';
    }
    /*
     * 获取当前题目在题库中的位置及题目总数量
     * cy
     */
    public function getSite($questionId,$sectionId,$access = 'first'){
        $sql = " select * from x2_section_question where sectionId = $sectionId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        if($access == 'first'){
            $site = 1;
            $nextId = $data[1]['questionId'];
        }else{
            $site = 0;
            foreach($data as $key => $value){
                if($value['questionId'] == $questionId){
                    $site = $key + 1;
                }
                if($site < count($data)){
                    $nextId = $data[$site]["questionId"];
                }else{
                    $nextId = 0;
                }
            }
        }
        return [['site'=>$site,'totalCount'=>count($data)],$nextId];
    }
    /*
     * 获取当前section位置及section总数
     * cy
     */
    public function getSectionSite($sectionId,$mockExamId){
        $sql = "select * from x2_section where mockExamId = $mockExamId";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = count($result);
        foreach($result as $k => $v){
            if($v['id'] == $sectionId) $site = $k + 1;
        }
        return ['site'=>$site,'totalCount'=>$count];
    }
    /**
     * 标记状态
     * cy
     */
    public function isMark($uid,$sectionId,$mockExamId,$questionId){
        $sql = "select * from x2_user_mock_mark where uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId and questionId = $questionId";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        if($result){
            $mark = 1;
        }else{
            $mark = 0;
        }
        return $mark;
    }
    /**
     * 获取用户已做、未做的题库题
     * cy
     */
    public function getIsDone($uid,$mockExamId){
        $count = $this::find()->select("id")->where("uid = $uid and mockExamkId = $mockExamId")->asArray()->count();
       return $count;
    }
    /*
     * 模考正确率即对应的成绩相关信息
     * cy type //1-语文 2-数学 3-全套
     */
    public function getCorrectRate($uid,$mockExamId,$type){
        $scale = new Scale();
        $sql = "select * from x2_section where mockExamId = $mockExamId";
        $sections = \Yii::$app->db->createCommand($sql)->queryAll();
        if($type == 3){//全套题型时随机去掉一个section
            $typeSecs = [$sections[0],$sections[2],$sections[4]];
            $delete = rand(0,(count($typeSecs)-1));
            $dele_sectionId = $typeSecs[$delete]['id'];
            $verCount = 0;
            $verSecs = 0;
            $quaCount = 0;
            $quanSecs = 0;
        }else{
            $crtCount = 0;
        }
        $blankCount = 0;
        $readCount = 0;
        $usetime = 0;
        $blankTotal = 0;
        $blankDo = 0;
        $readDo = 0;
        $quantDo = 0;
        $secDo = 0;
        $delVer = 0;
        $delQuan = 0;
        $verdel = 1;
        foreach($sections as $key =>$value){
//            if($type == 3 && $value['id'] == $dele_sectionId)break;
            $sql = "select * from x2_user_mock_record mr left join x2_questions q on q.id = mr.questionId where mr.uid = $uid and mr.sectionId = {$value['id']} and mr.mockExamId = $mockExamId and mr.correct = 1";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            $sql1 = "select * from x2_section_question sq left join x2_questions q on q.id = sq.questionId where sq.sectionId = {$value['id']} and q.catId =1";
            $blankTo = count(\Yii::$app->db->createCommand($sql1)->queryAll());

            $sq = "select * from x2_user_mock_record mr left join x2_questions q on q.id = mr.questionId where mr.uid = $uid and mr.sectionId = {$value['id']} and mr.mockExamId = $mockExamId ";
            $doData = \Yii::$app->db->createCommand($sq)->queryAll();
            $dos = MockRecord::find()->select("id")->where("uid = $uid and sectionId = {$value['id']}")->count();
            $blankTotal += $blankTo;
            $corrects = count($data);
            if($type == 3){
                if($value['type'] == 1){
                    $verCount += $corrects;
                    $verSecs += 1;
                    foreach($data as $k => $v){
                        if($v['catId'] == 1){//1-填空 2-阅读
                            $blankCount += 1;
                        } else{
                            $readCount += 1;
                        }
                        if($value['id'] == $dele_sectionId){
                            $delVer += 1;
                            $verdel = 1;
                        }
                    }
                    foreach($doData as $k => $v){
                        if($v['catId'] == 1){//1-填空 2-阅读
                            $blankDo += 1;
                        } else{
                            $readDo += 1;
                        }
                    }
                    $secDo += $dos;
                }else{
                    foreach($data as $k => $v){
                        if($value['id'] == $dele_sectionId){
                            $delQuan += 1;
                            $verdel = 2;
                        }
                    }
                    $quaCount += $corrects;
                    $quanSecs += 1;
                    $quantDo += $dos;
                    $secDo += $dos;
                }
            }else{
                if($type ==1){//语文
                    foreach($data as $k => $v){
                        if($v['catId'] == 1){//1-填空 2-阅读
                            $blankCount += 1;
                        } else{
                            $readCount += 1;
                        }
                    }
                    foreach($doData as $k => $v){
                        if($v['catId'] == 1){//1-填空 2-阅读
                            $blankDo += 1;
                        } else{
                            $readDo += 1;
                        }
                    }
                }
                $crtCount += $corrects;
                $secDo += $dos;
            }
            $tpe = $type < 3?$type:$value['type'];
            $sectionRate = ceil(100*($corrects/20));
            $sectionScore = $scale->getScore($sectionRate,$tpe);
            $secarr[] = ['sectionId'=>$value['id'],'total'=>20,'correctTotal'=>$corrects,'correctRate'=>$sectionRate,'type'=>$tpe,'score'=>$sectionScore];
            $times = $this::find()->select("sum(useTime) as times")->where("sectionId = {$value['id']} and uid = $uid")->asArray()->one()['times'];
            if(!$times) $times = 0;
            $usetime += $times;
        }
        if(!isset($dele_sectionId))$dele_sectionId = 0;
        $do = MockRecord::find()->select("id")->where("uid = $uid and mockExamId = $mockExamId ")->count();
        $secMsg = serialize($secarr);
        if($blankCount == 0){
            $blankRate = 0;
        }else{
            $blankRate = ceil(100*($blankCount/$blankTotal));
        }
        if($type == 3){
            $readTotal = 20*$verSecs - $blankTotal;
        }else{
            $readTotal = (40-$blankTotal);
        }
        $readRate = ceil(100*($readCount/$readTotal));
        if($type == 3){
            $verTotal = 20*$verSecs;
            $quanTotal = 20*$quanSecs;
            $verRate = ceil(100*($verCount/$verTotal));//全套下的语文正确率
            $quanRate = ceil(100*($quaCount/$quanTotal));//全套下的数学正确率
            $verScore = $scale->getScore($verRate,1);
            $quanScore = $scale->getScore($quanRate,2);
//            $mockScore = $verScore+$quanScore;
            $correctCount = $verCount+$quaCount;
            $correctRate = ceil(100*($correctCount/100));//全套正确率
            $delVerCount = $verCount - $delVer;
            $delQuanCOunt = $quaCount - $delQuan;
            if($verdel == 1){
                $verDeCount = $verTotal - 20;
                $quaDeCount = $quanTotal;
            }else{
                $verDeCount = $verTotal;
                $quaDeCount = $quanTotal - 20;
            }
            $vs = ceil(100*($delVerCount/$verDeCount));
            $qs = ceil(100*($delQuanCOunt/$quaDeCount));
            $vsScorce = $scale->getScore($vs,1);
            $qsScorce = $scale->getScore($qs,2);
            $mockScore = $vsScorce + $qsScorce;
            $correctMsg = ['verbal'=>['correct'=>$verCount,'total'=>$verTotal,'correctRate'=>$verRate,'secDo'=>($blankDo+$readDo)],'blank'=>['correct'=>$blankCount,'total'=>$blankTotal,'correctRate'=>$blankRate,'do'=>$blankDo],'read'=>['correct'=>$readCount,'total'=>$readTotal,'correctRate'=>$readRate,'do'=>$readDo],'quant'=>['correct'=>$quaCount,'total'=>$quanTotal,'correctRate'=>$quanRate,'do'=>$quantDo],'all'=>['correct'=>$correctCount,'total'=>100,'correctRate'=>$correctRate,'do'=>$do],'delete_sectionId'=>$dele_sectionId];
            $correctMsg = serialize($correctMsg);
            $data = ['secMsg'=>$secMsg,'mockScore'=>$mockScore,'verScore'=>$vsScorce,'quanScore'=>$qsScorce,'correctMsg'=>$correctMsg,'useTime'=>$usetime,'correctRate'=>$correctRate];
        }else{
            $total = 40;
            $correctRate = ceil(($crtCount/$total)*100);//模考正确率
            $mockScore = $scale->getScore($correctRate,$type);
            if($type == 1){
                $correctMsg = ['blank'=>['correct'=>$blankCount,'total'=>$blankTotal,'correctRate'=>$blankRate,'do'=>$blankDo],'read'=>['correct'=>$readCount,'total'=>$readTotal,'correctRate'=>$readRate,'do'=>$readDo],'verbal'=>['correct'=>$crtCount,'total'=>$total,'correctRate'=>$correctRate,'do'=>$do]];
            }else{
                $correctMsg = ['quant'=>['correct'=>$crtCount,'total'=>$total,'correctRate'=>$correctRate,'do'=>$do]];
            }
            $correctMsg = serialize($correctMsg);
            $data = ['secMsg'=>$secMsg,'mockScore'=>$mockScore,'correctMsg'=>$correctMsg,'correctRate'=>$correctRate,'useTime'=>$usetime];
        }
        return $data;
    }

    /**
     * 获取某道题的详细信息
     * cy
     */
    public  function getTopicDetail($uid,$questionId){
        $sql ="select q.*,umr.answer as userAnswer,umr.useTime,umr.correct,umr.mockExamId,umr.sectionId  from x2_questions q left join x2_user_mock_record umr on q.id = umr.questionId where q.id = $questionId and umr.uid = $uid";
        $question = \Yii::$app->db->createCommand($sql)->queryOne();
        if(empty($question)){
            $question = Questions::find()->where(" id = $questionId ")->asArray()->one();
            $question['useTime'] = 0;
        }
        $analysis = UserAnalysis::find()->where("questionId = $questionId and reward = 1")->asArray()->all();
        foreach($analysis as $k => $v){
            $analysis_uid = $v['uid'];
            $user = User::find()->where("uid = $analysis_uid")->asArray()->one();
            $analysis[$k]['nickname'] = $user['nickname'];
            $analysis[$k]['image'] = $user['image'];
        }
        if($question['optionA']){
            $optionsA = Method::getTextHtmlArr($question['optionA']);
            foreach($optionsA as $k => $v){
                $question['optionsA'][] = $this->addHost($v);
            }
        }
        if($question['optionB']){
            $optionsB = Method::getTextHtmlArr($question['optionB']);
            foreach($optionsB as $k => $v){
                $question['optionsB'][] = $this->addHost($v);
            }
        }
        if($question['optionC']){
            $optionsC = Method::getTextHtmlArr($question['optionC']);
            foreach($optionsC as $k => $v){
                $question['optionsC'][] = $this->addHost($v);
            }
        }

        $question['stem'] = $this->addHost($question['stem']);
        $question['details'] = $this->addHost($question['details']);
        $question['quantityA'] = $this->addHost($question['quantityA']);
        $question['quantityB'] = $this->addHost($question['quantityB']);
//        $question['quantityA'] = strip_tags($question['quantityA'],'<img>');
//        $question['quantityB'] = strip_tags($question['quantityB'],'<img>');
        $typeId = $question['typeId'];
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if($typeId == 5 || $typeId == 6 || $typeId == 7){
            $question['details'] = Method::getTextHtmlArr($question['details'])[0];
//            $article = Method::getTextHtmlArr($question['readArticle'])[0];
//            if($typeId != 7){
//                $question['readArticle'] = $article;
//            }else{
//                $articles = explode('.',$article);
//                foreach($articles as $kk => $vv){
//                    $articles[$kk] = trim(str_replace('&nbsp;','',$vv.'.'));
//                }
//                $question['readArticles'] = $articles;
//            }
        }
        if($typeId == 2 || $typeId == 3 ){
            $question['answers'] = explode(',',$question['answer']);
            $question['userAnswers'] = explode(',',isset($question['userAnswer'])?$question['userAnswer']:'');
            foreach($question['answers'] as $k =>$v){
                $question['answers'][$k] = trim($v);
            }
            foreach($question['userAnswers'] as $kk =>$kv){
                $question['userAnswers'][$kk] = trim($kv);
            }
        }elseif($typeId == 4||$typeId ==6 || $typeId == 9){
            $question['answers'] = str_split($question['answer']);
            $question['userAnswers'] = str_split($question['userAnswer']);
            foreach($question['answers'] as $k =>$v){
                $question['answers'][$k] = trim($v);
            }
            foreach($question['userAnswers'] as $kk =>$kv){
                $question['userAnswers'][$kk] = trim($kv);
            }
        }
        //平均耗时
        $msg = $this::find()->select("sum(useTime) as times,count(useTime) as totalCount")->where("questionId = $questionId")->asArray()->one();
        $correctCount = $this::find()->select("id")->where("questionId = $questionId and correct = 1")->count();
        if($msg['times'] == 0){
            $averTime = 0;
        }else{
            $averTime = ceil($msg['times']/$msg['totalCount']);
        }
        //平均正确率
        if($correctCount == 0){
            $averRate = 0;
        }else{
            $averRate = ceil(100*($correctCount/$msg['totalCount']));
        }
        $question['averTime'] = $averTime;
        $question['averRate'] = $averRate;
        //网友解析
        $question['analysis'] = $analysis;
        return $question;
    }
    /**
     * 图片加域名
     * cy
     */
    public function addHost($data){
        $data = str_replace('src="/','src="https://gre.viplgw.cn/',$data);
        return $data;
    }

    /**
     * 获取不同情况下的section题目信息
     * cy
     */
    public function getTopic($uid,$sectionId,$access,$questionId){
        if($questionId){
            $qid = $questionId;
        }else{
            $sql = "select * from x2_section s left join x2_uer_mock_record umr on s.questionId = umr.questionId";
            if($access == 1){
                $sql .= " where umr.correct = 0";
            }
            if($access == 2){
                $sql .= " where max(umr.useTime) ";
            }
            $sql .= " and umr.uid = $uid and s.id = $sectionId";
            $questions = \Yii::$app->db->createCommand($sql)->queryAll();
            $qid = $questions[0]['questionId'];
        }
        $question = $this->getTopicDetail($uid,$qid);
        return $question;
    }
}