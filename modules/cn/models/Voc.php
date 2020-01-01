<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class Voc extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%voc}}';
    }
}