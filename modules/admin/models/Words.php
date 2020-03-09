<?php
// 境界
namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class Words extends ActiveRecord
{
    public static function tableName(){
        return '{{%words}}';
    }

    /**
     * 查询境界列表
     */
    public static function getValueList(){
      $data = Words::find()->select('*,id as key,name as text')->asarray()->All();
      return $data;
    }
}