<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class UserNote extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_note}}';
    }

}
