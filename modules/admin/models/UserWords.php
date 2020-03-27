<?php

namespace app\modules\admin\models;
use app\modules\admin\models\User;
use yii\db\ActiveRecord;

class UserWords extends ActiveRecord
{
    public static function tableName(){
        return '{{%user_words}}';
    }


    // 根据征服世界随机生物id
    public static function BiologyRand($num=1,$userid=1){  //默认管理员，数量为1
        $wordId= UserWords::find()->select('wordId')->where("userid =$userid and complete = 1")->asarray()->All();
        // $wordId=  implode(',',array_column($wordId, 'wordId'));
        //  var_dump($wordId);die;     
        $biologyid = (new \yii\db\Query())
        ->select("a.name,a.*")
        ->from("x2_biology AS a")
        ->leftJoin("x2_words AS b","a.wordId = b.id")
        // ->where(  ['in', 'wordId', $wordId ])
        // ->where(['or' , ['wordId' =>'1'] ,['wordId' => $wordId]] )    // 先满足后面的条件
        ->where(['a.id' =>'1'] ) 
        // ->andWhere()
        ->limit($num)
        ->orderBy("rand()")
        ->All();
        return $biologyid;
    }
    
    // 生物生成随机属性
    public static function BiologyExtendRand($biology,$userid=1){
        $change =  User :: BiologyChange();//评分加成
        $score =intval($biology['score']);
        // $change =  User :: BiologyChange();//评分加成
        $skill = User::SkillRand($biology); // 随机生成技能
        $lodnum= !empty($biology['skill']) ? count(explode(',',$biology['skill'])) : 0; // 技能个数
        $newnum= !empty($skill) ? count(explode(',',$skill)) : 0; // 技能个数
     
        if($change<$score){ // 评分增幅
            $extend = rand($change-$newnum*10,$score-$lodnum*10);
        } else{
            $extend = $score-$lodnum*10;
        }

        // 修改属性
        $biology = User :: BiologyPower($biology,$extend); // 随机 基础属性 力敏智
        $biology['skill'] = $skill;
        $biology['score'] =  $newnum*10 + $biology['power']+  $biology['agile']+ $biology['intelligence'] ;  //属性最大值为80/10 ,评分满值为340
        $biology['scoreGrade'] = Biology :: getValueList($score);// 根据评分修改品质
        $biology['userid'] = $userid;
  

        // 固定 属性刷新
        $biology['skill'] = $skill;
        
        var_dump($biology);die;
        // // 训练
        // $biology =  User :: BiologyTrainRand($biology);
        // var_dump($biology);die;
   
    }
    



}
