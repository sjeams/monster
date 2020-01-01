<?php 
namespace app\modules\question\models;
use app\libs\Method;
use app\modules\cn\models\UserCollection;
use yii\db\ActiveRecord;
class QuestionsTest extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%questions_test}}';
    }

    public function getQuestionsTest($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select q.*,u.userName from {{%questions_test}} q LEFT JOIN {{%user}} u on q.inputUser=u.id where $where";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= ' order by q.id desc';
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr,'count'=>$count];
    }
}
