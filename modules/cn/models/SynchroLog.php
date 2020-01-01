<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class SynchroLog extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%synchro_log}}';
    }

}
