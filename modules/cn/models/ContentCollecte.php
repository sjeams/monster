<?php 
namespace app\modules\cn\models;

use yii\db\ActiveRecord;

class ContentCollecte extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%content_collection}}';
    }

}
