<?php
// 境界
namespace app\modules\admin\models;
use yii\db\ActiveRecord;

class BiologyBiology extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology_biology}}';
    }

    /**
     * 查询境界列表
     */
    public static function getValueList(){
      $data = BiologyBiology::find()->select('id,name as text')->asarray()->All();
      return $data;
    }
}
