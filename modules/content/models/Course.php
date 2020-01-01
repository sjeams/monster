<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Course extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%set_course}}';
    }

}
