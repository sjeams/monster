<?php

namespace app\models;

use yii\db\ActiveRecord;

class SectionQuestion extends ActiveRecord
{
    public static function tableName(){
        return '{{%section_question}}';
    }
}
