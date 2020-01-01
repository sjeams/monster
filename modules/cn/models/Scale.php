<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class Scale extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%scale}}';
    }
    /*
     * 获取成绩
     * cy
     */
    public function getScore($correctRate,$type){
        if($correctRate == 0){
            return 130;
        }else{
            $data = $this::find()->where("correctRate = $correctRate and type = $type")->orderBy("id desc")->asArray()->one();
            if(!$data){
                $data = $this::find()->where("correctRate < $correctRate and type = $type")->orderBy("id asc")->asArray()->one();
            }
            return $data['scale'];
        }
    }

}
