<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class AudioPurchase extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%audio_purchase}}';
    }

}