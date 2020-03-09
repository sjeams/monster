<?php
// 境界
namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class BiologyCharacter extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology_character}}';
    }

    /**
     * 查询境界列表
     */
    public static function getValueList(){
      $data = BiologyCharacter::find()->select('*,id as key,name as text')->asarray()->All();
      return $data;
    }
}
