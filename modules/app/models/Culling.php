<?php
namespace app\modules\app\models;
use yii\db\ActiveRecord;
use app\modules\app\models\Content;
use yii;
class Culling extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%culling}}';
    }

    // 更新 查看时间 和状态
    public static function updateLook($uid,$id){
        $see = Culling:: find()->where("id=$id and uid=$uid")->one();
        if(!empty($see)){
            // 资讯最新发布时间不为空，更新 查看条数， 并且修改状态
            $see->isLook=0;
            $see->save();
        }
    }

}
