<?php
// 境界
namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class BiologyState extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology_state}}';
    }

    /**
     * 查询境界列表
     */
    public static function getBiologyStateall(){
      $data = BiologyState::find()->select('id,name as text')->asarray()->All();
      return $data;
    }
}
