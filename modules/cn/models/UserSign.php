<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class UserSign extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_sign}}';
    }

}
