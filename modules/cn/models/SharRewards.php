<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class SharRewards extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%shar_rewards}}';
    }

}
