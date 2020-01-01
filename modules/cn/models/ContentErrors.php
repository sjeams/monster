<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class ContentErrors extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%content_error}}';
    }

    public function getArticleErrors($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select ce.*,c.name from {{%content_error}} as ce LEFT JOIN {{%content}} as c on ce.contentId=c.id $where order by ce.id desc";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }
}
