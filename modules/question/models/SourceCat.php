<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
class SourceCat extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%source_cat}}';
    }

    public function getSource($catId){
        $sql = "select s.* from {{%source_cat}} sc left JOIN {{%question_source}} s on sc.sourceId=s.id where sc.catId=$catId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
