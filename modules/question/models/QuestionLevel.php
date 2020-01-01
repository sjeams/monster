<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionLevel extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_level}}';
    }

    public function getLevels($page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select * from {{%question_level}}";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }
}
