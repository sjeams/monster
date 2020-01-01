<?php
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class WordsLowSentence extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%words_low_sentence}}';
    }
}