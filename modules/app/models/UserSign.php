<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;
use yii;
class UserSign extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_sign}}';
    }

    public static function isSign(){
        $userid = Yii::$app->session->get('userId',9999999999);
        // $sign = UserSign::find()->select('id')->where("date_format(from_unixtime(createTime),'%Y-%m-%d') = date_format(now(),'%Y-%m-%d') AND userid=$userid")->one();
        $sign = UserSign::find()->select('id')->where("createDay = date_format(now(),'%Y-%m-%d') AND userid=$userid")->one();
        if($sign){
            $isSign = true;
        }else{
            $isSign = false;
        }
        return $isSign;
    }

    /**
     * 用户打卡
     */
    public static function userSign(){
        $userid = Yii::$app->session->get('userId');
        // $sign = UserSign::find()->select('id')->where("date_format(from_unixtime(createTime),'%Y-%m-%d') = date_format(now(),'%Y-%m-%d') AND userid=$userid")->one();
        $sign = UserSign::find()->select('id')->where("createDay = date_format(now(),'%Y-%m-%d') AND userid=$userid")->one();
        if(!$sign){
            $model = new UserSign();
            $model->userid = $userid;
            $model->createTime = time();
            $model->save();
        }
 
    }

    /**
     * 用户本月打卡状态
     */
     public static function userSignMonth(){
        $userid = Yii::$app->session->get('userId');
        $sign = UserSign::find()->select('createDay')->where("createDay = date_format(now(),'%Y-%m') AND userid=$userid order by createTime asc")->asArray()->All();
        $date['signTime'] = array_column($sign,'createDay');
        $date['signTotal'] = count(UserSign::find()->select('id')->where("userid=$userid")->asArray()->All());
        return $date;
    }

}
