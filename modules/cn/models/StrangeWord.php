<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class StrangeWord extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%strange_word}}';
    }
}