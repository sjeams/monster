<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;
class UserMeans extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_means}}';
    }

}
