<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class WordsSentence extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%words_sentence}}';
    }
}