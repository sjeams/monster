<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\cn\models;

use yii\db\ActiveRecord;

class Teachers extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%teachers}}';
    }
}