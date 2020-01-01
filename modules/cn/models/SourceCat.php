<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class SourceCat extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%source_cat}}';
    }

    public function getSource($catId){
        $sql = "select s.* from {{%source_cat}} sc left JOIN {{%question_source}} s on sc.sourceId=s.id where sc.catId=$catId order by s.sort desc";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    public function getSourceId($catId){
        $sql = "select group_concat(s.id) as ids from {{%source_cat}} sc left JOIN {{%question_source}} s on sc.sourceId=s.id where sc.catId=$catId order by s.sort desc";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        return $data['ids'];
    }
    public function getSourceAll(){
        $sql = "select * from {{%question_source}} order by id asc";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
