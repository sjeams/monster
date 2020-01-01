<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class UserWords extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%user_words}}';
    }
}