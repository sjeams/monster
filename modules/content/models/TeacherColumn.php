<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:36
 */
namespace app\modules\content\models;

use yii\db\ActiveRecord;

class TeacherColumn extends ActiveRecord{
    public static function tableName(){
        return '{{%teacher_content}}';
    }
}