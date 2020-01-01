<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
class LibraryQuestion extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%library_question}}';
    }


}
