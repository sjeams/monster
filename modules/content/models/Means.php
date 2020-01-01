<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Means extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%means}}';
    }

}
