<?php

namespace app\models;

use yii\db\ActiveRecord;

class MockExam extends ActiveRecord
{
    public static function tableName(){
        return '{{%mock_exam}}';
    }
}
