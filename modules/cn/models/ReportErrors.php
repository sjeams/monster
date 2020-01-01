<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class ReportErrors extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%report_errors}}';
    }

    public function getReportErrors($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select re.*,q.stem from {{%report_errors}} as re LEFT JOIN {{%questions}} as q on re.questionId=q.id $where order by re.id desc";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr,'count'=>$count];
    }
}
