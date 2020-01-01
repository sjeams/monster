<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Jump extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%jump}}';
    }

}
