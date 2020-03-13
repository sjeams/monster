<?php
// 境界
namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class BiologyNature extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology_nature}}';
    }

    /**
     * 查询境界列表
     */
    public static function getValueList(){
      $data = BiologyNature::find()->select('*,id as key,name as text')->asarray()->All();
      return $data;
    }
}
