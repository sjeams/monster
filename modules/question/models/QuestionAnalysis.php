<?php 
namespace app\modules\question\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionAnalysis extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_analysis}}';
    }

    public function getAnalysis($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select ua.*,u.userName,u.nickname from {{%user_analysis}} ua inner join {{%user}} u ON ua.uid=u.uid where $where ORDER BY id desc";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr,'count'=>$count];
    }
}
