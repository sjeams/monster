<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class PushMessage extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%push_message}}';
    }

    /**
     * @param $page
     * @param $pageSize
     * @param $uid
     * @return array
     * 我的消息
     * by  sjeam
     */
    public function getMyMessage($page,$pageSize,$uid){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select * from x2_push_message where uid=$uid order by createTime desc $limit";
        // $sql = "select id,title,content,status,createTime from x2_push_message where uid=$uid order by createTime desc $limit";
        $data =\Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['createTime'] = Method::gmstrftimeC(date("Y-m-d H:i:s",$v['createTime']));
        }
        self::updateAll(['status'=>0],"uid = $uid");//修改查看状态
        return $data;
    }
}
