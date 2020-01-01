<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
class QuestionType extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_type}}';
    }


}
