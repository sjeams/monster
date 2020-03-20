<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class UserWords extends ActiveRecord
{
    public static function tableName(){
        return '{{%user_words}}';
    }
}
