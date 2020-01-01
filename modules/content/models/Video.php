<?php
namespace app\modules\content\models;
use yii\db\ActiveRecord;
class Video extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%video}}';
    }



}
