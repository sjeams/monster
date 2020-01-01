<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\cn\models;

use yii\db\ActiveRecord;

class TeacherCollection extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%teacher_collection}}';
    }
}