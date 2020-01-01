<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class UserBankMark extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_bank_mark}}';
    }

}
