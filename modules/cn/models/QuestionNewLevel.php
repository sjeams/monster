<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionNewLevel extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_new_level}}';
    }

    public function getSource($catId){
        $sql = "select sc.id,sc.catId,sc.name from {{%question_new_level}} sc left JOIN {{%question_cat}} s on sc.catId=s.id where sc.catId=$catId order by sc.id desc";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

}
