<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/23
 * Time: 16:07
 */

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class UserEvaluation extends  ActiveRecord{
    public static function tableName(){
        return '{{%user_evaluation}}';
    }
    /**
     * 获取测试题目内容
     */
    public function getDetail($id,$type){
        $contents = \Yii::$app->db->createCommand("select * from x2_questions_test where levelId = $type order by catId,id asc ")->queryAll();
        $count = count($contents);
        if($id == 0){
            $content = $contents[0];
            $content['site'] = 1;
            $content['total'] = $count;
            if( 2 <= $count)
                $content['nextid'] = $contents[1]['id'];
            else
                $content['nextid'] = 0;
        }else{
            foreach($contents as $k => $v){
                if($v['id'] == $id){
                    $content = $v;
                    $site = $k + 1;
                    $content['site'] = $site;
                    $content['total'] = $count;
                    if($site >= $count){
                        $content['nextid'] = 0;
                    }else{
                        $content['nextid'] = $contents[$site]['id'];
                    }
                }
            }
        }
        return $content;
    }
    /**
     * 验证用户回答是否正确
     */
    public function checkAnswer($questionid,$answer){
        $sql = "select answer from x2_questions_test where id = $questionid";
        $ques_answer = \Yii::$app->db->createCommand($sql)->queryOne()['answer'];
        if($answer == $ques_answer){
            return true;
        }else{
            return false;
        }
    }
    /**
     * pc测评
     * 获取测评题详细信息 + 正确数、总数
     * cy
     */
    public function getContent($uid,$type){
        $catid = array(1,2,3);//1-填空 2-阅读 3-数学
        foreach($catid as $k => $cid){
            $sql = "select distinct(ue.questionId),ue.uid,ue.answer as useranswer,ue.correct,ue.questionId,qt.catId,qt.answer as correctanswer,qt.details,qt.quantityA,qt.quantityB,qt.optionA,qt.optionB,qt.optionC,qt.readArticle,qt.typeId,qc.name from x2_user_evaluation ue  left join x2_questions_test qt on ue.questionId = qt.id left join x2_question_cat qc on qc.id = qt.catId where ue.uid = $uid and ue.type = $type and qt.catId = $cid";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            $datas[$k] = $data;
        }
        return $datas;
    }
    /**
     * 测评正确率
     */
    public function correctRate($uid,$type,$access){
        $total = \Yii::$app->db->createCommand("select count(id) total from x2_user_evaluation where uid = $uid and type = $type")->queryOne()['total'];//做题总数
        if($total == 0){
            return array(0,0,0);
        }
        $correctcount = \Yii::$app->db->createCommand("select count(id) correct from x2_user_evaluation where uid = $uid and type = $type and correct = 1")->queryOne()['correct'];//做正确的数量
        $correct = ceil(($correctcount/$total)*100);//测评正确率
        //数学正确题数
        $math = \Yii::$app->db->createCommand("select count(ue.id) as math from x2_user_evaluation ue left join x2_questions_test qt on ue.questionId = qt.id where qt.catId = 3 and ue.correct = 1 and ue.uid = $uid and ue.type =$type")->queryOne()['math'];
        //数学总题数
        $mathtotal = \Yii::$app->db->createCommand("select count(ue.id) as mathtotal from x2_user_evaluation ue left join x2_questions_test qt on ue.questionId = qt.id where qt.catId = 3 and ue.uid = $uid and ue.type =$type")->queryOne()['mathtotal'];
        //数学正确率
        if($mathtotal == 0){
            $mathcorrect = 0;
        }else{
            $mathcorrect = ceil(($math/$mathtotal)*100);
        }
        //语文正确率
        $nomath = $correctcount - $math;//语文正确题数
        $nomathtotal = $total - $mathtotal;//语文总题数
        if($nomathtotal == 0){
            $nomathcorrect = 0;
        }else{
            $nomathcorrect = ceil(($nomath/$nomathtotal)*100);
        }
        $mrate = $mathcorrect == 0?1:$mathcorrect;
        $vrate = $nomathcorrect == 0?1:$nomathcorrect;
        //数学对应的分数
        $quant_scale = \Yii::$app->db->createCommand("select scale from x2_scale where type = 2 and correctRate = $mrate order by id desc")->queryOne()['scale'];
        //语文对应的分数
        $verbal_scale = \Yii::$app->db->createCommand("select scale from x2_scale where type = 1 and correctRate = $vrate order by id desc")->queryOne()['scale'];
        if(!$quant_scale){//当前正确率，没有匹配度到相应的分数 默认匹配小于该正确率的第一个分数
            $quant_scale = \Yii::$app->db->createCommand("select scale from x2_scale where type = 2 and correctRate < $mrate order by id asc")->queryOne()['scale'];
        }
        if(!$verbal_scale){
            $verbal_scale = \Yii::$app->db->createCommand("select scale from x2_scale where type = 1 and correctRate < $vrate order by id asc")->queryOne()['scale'];
        }
        if($access == 'zt'){
            $correct_scale = [$correct,$verbal_scale,$quant_scale,$vrate,$mrate];
            return $correct_scale;
        }else{
            //判断语文数学的成绩是否存在
            $record = UserRecord::find()->where("type = $type and uid = $uid")->asArray()->one();
            if($record['verbal']){
                $verbal = $record['verbal'];
            }else{
                $verbal = $verbal_scale;
            }
            if($record['quant']){
                $quant = $record['quant'];
            }else{
                $quant = $quant_scale;
            }
            UserRecord::updateAll(['quant'=>$quant,'verbal'=>$verbal,'verbalRate'=>$nomathcorrect,'quantRate'=>$mathcorrect],"uid = $uid and type = $type");
            $corrects = array($correct,$nomathcorrect,$mathcorrect,$verbal,$quant);
            return $corrects;
        }
    }

    /**
     * 查询某个测评类的正确数
     * cy
     */
    public function correctCount($uid,$type){
        $catid = array(1,2,3);//1-填空 2-阅读 3-数学
        foreach($catid as $k => $v){
            $total = \Yii::$app->db->createCommand("select distinct(questionId) from x2_user_evaluation ue left join x2_questions_test qt on ue.questionId = qt.id  where uid = $uid and type = $type and qt.catId = $v")->queryAll();
            $correct = \Yii::$app->db->createCommand("select * from x2_user_evaluation ue left join x2_questions_test qt on ue.questionId = qt.id  where uid = $uid and type = $type and correct = 1 and qt.catId = $v")->queryAll();
            $totalcount = count($total);
            $correctcount = count($correct);
            $counts[$k] = ['correct'=>$correctcount,'total'=>$totalcount];
        }
        return $counts;
    }
    /**gre小程序测评
     * 获取测评题详细信息 + 正确数、总数
     * cy
     */
    public function getContent2($uid,$type,$access=''){
        $catid = array(1,2,3);//1-填空 2-阅读 3-数学
        $site = 1;
        if($access == 'result'){//测评结果首页进入
            foreach($catid as $k => $cid){
                $sql = "select distinct(ue.questionId),qc.name,ue.uid,ue.correct from x2_user_evaluation ue  left join x2_questions_test qt on ue.questionId = qt.id left join x2_question_cat qc on qc.id = qt.catId where ue.uid = $uid and ue.type = $type and qt.catId = $cid";
                $data = \Yii::$app->db->createCommand($sql)->queryAll();
                foreach($data as $l => $o){
                    $data[$l]['site'] = $site;//当前题目位置
                    $site++;
                }
                if($cid == 1){
                    $message = ['catName'=>'填空','quids'=>$data,'text'=>' 一般V160+对于填空的正确率要求>80%。第一个section正确率越高，下一个section进入hard模式几率越高，那么160+的高分概率就越大'];
                }elseif($cid == 2){
                    $message = ['catName'=>'阅读','quids'=>$data,'text'=>'一般V160+要求RC正确率达到70%以上。阅读正确率瓶颈一般会处在正确率50%-60%左右，要想快速提高正确率，需要练习长难句，学习回文定位、快速获取文章结构等做题方法。'];
                }else{
                    $message = ['catName'=>'数学','quids'=>$data,'text'=>'一般Q168+要求QUANT正确率达到95%以上。QUANT正确率比较容易提升，建议熟悉数学词汇，熟悉数学题型，加强 题意理解，提高正确率。'];
                }
                $datas[$k] = $message;
            }
        }elseif($access == 'question'){//测评结果页  点击题目id进入
            $datas =[];
            foreach($catid as $k => $cid){
                $sql = "select distinct(ue.questionId),ue.correct from x2_user_evaluation ue  left join x2_questions_test qt on ue.questionId = qt.id left join x2_question_cat qc on qc.id = qt.catId where ue.uid = $uid and ue.type = $type and qt.catId = $cid";
                $data = \Yii::$app->db->createCommand($sql)->queryAll();
                foreach($data as $l => $o){
                    $o['site'] = $site;//当前题目位置
                    $datas[]=$o;
                    $site++;
                }
            }
        }
        return $datas;
    }
    /**
     * gre 测评小程序
     * cy
     * 根据题目id获取题目信息
     */
    public function getQuesDetail($uid,$type){
        $sql = "select ue.questionId,ue.uid,qt.catId,qt.typeId,qc.name,qt.answer as correctAnswer,ue.answer as userAnswer,ue.correct,qt.details,qt.quantityA,qt.quantityB,qt.optionA,qt.optionB,qt.optionC,qt.readArticle from x2_user_evaluation ue  left join x2_questions_test qt on ue.questionId = qt.id left join x2_question_cat qc on qc.id = qt.catId where ue.uid = $uid and qt.levelId = $type";
        $questions = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($questions as $k => $v){
            $questions[$k]['userAnswer'] = trim($v['userAnswer']);
            $questions[$k]['correctAnswer'] = trim($v['correctAnswer']);
            if($v['quantityA'] || $v['quantityB']){
                $questions[$k]['quantityA'] = strip_tags($v['quantityA']);
                $questions[$k]['quantityB'] = strip_tags($v['quantityB']);
            }
            //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
            $typeId = $v['typeId'];
            if($typeId == 2 || $typeId == 3 || $typeId == 6 ||$typeId == 9 ||$typeId == 4  ){
                $useranswer = str_split($v['userAnswer']);
                $correctanswer = str_split($v['correctAnswer']);
                $questions[$k]['userAnswers'] = $useranswer;
                $questions[$k]['correctAnswers'] = $correctanswer;
            }
            if($typeId == 5 || $typeId == 6 || $typeId == 7){
                $questions[$k]['details'] = Method::getTextHtmlArr($v['details'])[0];
            }
            if($typeId == 7){
                $readArticle = Method::getTextHtmlArr($v['readArticle'])[0];
                $articles =  explode('.',$readArticle);
                foreach($articles as $e => $w){
                    $articles[$e] = trim($w.'.');
                }
                $questions[$k]['readArticles'] = $articles;
            }
            $optionA = $v['optionA'];
            if($optionA){
                $optionsA = Method::getTextHtmlArr($optionA);
                foreach($optionsA as $l => $t){
                    $optionsA[$l] = strip_tags($t);
                }
                $questions[$k]['optionsA'] = $this->evaluationFormat($optionsA,$v['correctAnswer'],$v['userAnswer'],$typeId);
            }else{
                $questions[$k]['optionsA'] = array();
            };
            $optionB = $v['optionB'];
            if($optionB){
                $optionsB = Method::getTextHtmlArr($optionB);
                foreach($optionsB as $l => $t){
                    $optionsB[$l] = strip_tags($t);
                }
                $questions[$k]['optionsB'] = $this->evaluationFormat($optionsB,$v['correctAnswer'],$v['userAnswer'],$typeId,$count = count($optionsA));
            }else{
                $questions[$k]['optionsB'] = array();
            }
            $optionC = $v['optionC'];
            if($optionC){
                $optionsC = Method::getTextHtmlArr($optionC);
                foreach($optionsC as $l => $t){
                    $optionsC[$l] = strip_tags($t);
                }
                $count = count($optionsA) + count($optionsB);
                $questions[$k]['optionsC'] = $this->evaluationFormat($optionsC,$v['correctAnswer'],$v['userAnswer'],$typeId,$count);
            }else{
                $questions[$k]['optionsC'] = array();
            }
        }
        return $questions;
    }
    /**
     * 选项格式转换
     * GRE测评小程序
     * cy
     */
    public function evaluationFormat($answers,$correctAnswer,$userAnswer,$type,$count=0){
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if(is_array($answers)){// 2,3,4,6,9
            $arr = ['A','B','C','D','E','F','G','H','I','J','K'];
            foreach($answers as $k => $v){
                foreach($arr as $d => $t){
                    if($count == 0){
                        if($k == $d){
                            $answer = ['name'=>$v,'checked'=>'false','answer'=>$arr[$d]];
                        }
                    }else{
                        if($d == ($k + $count)){
                            $answer = ['name'=>$v,'checked'=>'false','answer'=>$arr[$d]];
                        }
                    }
                }
                $ans[$k] = $answer;
            }
            if($type == 2 || $type ==3 || $type == 4 || $type == 6 || $type == 9){
                foreach($ans as $k => $r) {
                    if(strpos($correctAnswer,$r['answer']) === false){
                        $ans[$k]['correctAnswer'] = '';
                    }else{
                        $ans[$k]['correctAnswer'] = $r['answer'];
                    }
                    if(strpos($userAnswer,$r['answer']) === false){
                        $ans[$k]['userAnswer'] = '';
                    }else{
                        $ans[$k]['userAnswer'] = $r['answer'];
                    }
                }
            }
           return $ans;
        }else{
            return $answers;
        }
    }
}