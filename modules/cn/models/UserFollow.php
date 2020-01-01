<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class UserFollow extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%user_follow}}';
    }
}