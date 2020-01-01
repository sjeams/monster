<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class QuestionsStatistics extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%questions_statistics}}';
    }


    //计算竞争力
    public function getCompete($uid,$libId,$correctRate){
        if($correctRate==''){
            $correctRate = 0;
        }
        $total = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$libId}")->count();
        $transcendNum = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$libId} and correctRate<{$correctRate}")->count();
        $res = round($transcendNum/$total);
        return ['total'=>$total,'transcendNum'=>$transcendNum];
    }

    //计算
    public function getPace($totalNum,$totalTime){
        $totalTime = intval($totalTime);
        $totalNum = intval($totalNum);
        if($totalNum ==0 || $totalTime ==0){
            $ageTime = 0;
        }else{
            $ageTime = round($totalTime/$totalNum);
        }
        if ($ageTime < 40) {
            $reg['Pace'] = 'Ｄ';
            $reg['Pace_msg'] = '小心哦，你做题的时间太快啦，即使做过的题目也最好在看一下，不要蒙哦~';
            $reg['Pace_s'] = '65';
        } elseif ($ageTime < 90) {
            $reg['Pace'] = 'A';
            $reg['Pace_msg'] = '非常棒，做题速度已经赶上330+的节奏啦~';
            $reg['Pace_s'] = '95';
        } elseif ($ageTime < 120) {
            $reg['Pace'] = 'B';
            $reg['Pace_msg'] = '不错哟，再稍稍加快点节奏预见想象中的330+';
            $reg['Pace_s'] = '85';
        } elseif ($ageTime < 150) {
            $reg['Pace'] = 'C';
            $reg['Pace_msg'] = '不稳定噢，革命尚未成功，同志需更加努力呀~';
            $reg['Pace_s'] = '75';
        } elseif ($ageTime < 180) {
            $reg['Pace'] = 'D';
            $reg['Pace_msg'] = '有点难过，亲，做题要集中精力，遇到难题要学会快速决策哦~';
            $reg['Pace_s'] = '65';
        } elseif ($ageTime < 210) {
            $reg['Pace'] = 'E';
            $reg['Pace_msg'] = '伤心过度，亲，你离330+还有一万五千公里，呼哧呼哧~';
            $reg['Pace_s'] = '55';
        } else {
            $reg['Pace'] = 'F';
            $reg['Pace_msg'] = '不想活啦，亲，你一定是边做题边在睡大觉~';
            $reg['Pace_s'] = '25';
        }
        return $reg;
    }
}
