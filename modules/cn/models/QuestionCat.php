<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionCat extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_cat}}';
    }
    public function getSections($page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select * from {{%question_cat}}";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }
}
