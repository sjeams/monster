<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionSource extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_source}}';
    }

    public function getSource($page,$pageSize,$catId=0){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        if($catId >0){
            $sql = "select qs.*,sc.catId from x2_question_source qs inner JOIN x2_source_cat sc on sc.sourceId=qs.id where sc.catId = $catId order BY qs.sort desc";
        }else{
            $sql = "select qs.*,sc.catId from {{%source_cat}} sc LEFT JOIN {{%question_source}} qs on sc.sourceId=qs.id GROUP BY sc.sourceId";
        }
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }
}
