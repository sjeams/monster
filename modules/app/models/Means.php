<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;

use app\modules\app\models\UserMeans;
use yii;
class Means extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%means}}';
    }

    public static function getMeans(){
        $userId = Yii::$app->session->get('userId');
        $means = Means::find()->select('id,content,chat')->asArray()->where("belong=1")->one();//微信资料
        if($means&&$userId){
            $sign = UserMeans::find()->select('id')->asArray()->where("meansId={$means['id']} AND userid=$userId")->one();
            if($sign){
                $means = null;
            }
        }else{
            $means = null;
        }
        return $means;
    }

}
