<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/23
 * Time: 16:07
 */

namespace app\modules\cn\models;

use yii\db\ActiveRecord;

class UserRecord extends  ActiveRecord{
    public static function tableName(){
        return '{{%user_evaluation_record}}';
    }
}