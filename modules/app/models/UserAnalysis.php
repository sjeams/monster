<?php 
namespace app\modules\app\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class UserAnalysis extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_analysis}}';
    }

    //获取解析发表人
    public function getPublishUser($questionId){
        $sql = "SELECT un.analysisContent,un.audio,u.nickname,un.createTime from {{%user_analysis}} un left join {{%user}} u on un.uid=u.uid where questionId=$questionId and type=1 and publish=1 ";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    //获取音频解析
    public function getAudioPublishUser($questionId){
        $sql = "SELECT un.id,un.audio,u.userName,un.price from {{%user_analysis}} un left join {{%user}} u on un.uid=u.uid where questionId=$questionId and type=2 and publish=1 ";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        if($data){
            $purchase = AudioPurchase::find()->asArray()->where("analysisId={$data['id']}")->one();
            if($purchase){
                $data['purchase'] = 1;
            } else{
                $data['purchase'] = 2;
            }
            $data['purchaseNum'] = AudioPurchase::find()->select("id")->where("analysisId={$data['id']}")->count();
        }
        return $data;
    }
}
