<?php 
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Active extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%culling}}';
    }

}
