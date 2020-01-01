<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;
class Jump extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%jump}}';
    }

    // 查询来源最新跳转图 
    public static function getJump($belong){
        $jump = Jump::find()->select('image,type,content,belong')->asArray()->orderBy('id desc')->where("belong=$belong")->one();//跳转图
        return $jump;
    }

    // 查询课程活动跳转图 --查询所有
    public static function getCourseJump($belong){
        $jump = Jump::find()->select('image,type,content,belong')->asArray()->orderBy('id desc')->where("belong=$belong")->All();//跳转图
        return $jump;
    }

}
