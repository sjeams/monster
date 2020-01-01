<?php 
namespace app\modules\app\models;
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
     * 系统消息 
     * by sjeam
     */
    public function getMyMessage($page,$pageSize,$uid){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select id,title,content,status,createTime from x2_push_message where uid=$uid order by createTime desc $limit";
        $data =\Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['createTime'] = Method::gmstrftimeC(date("Y-m-d H:i:s",$v['createTime']));
        }
        self::updateAll(['status'=>0],"uid = $uid");//修改查看状态
        return $data;
    }


    /**
     * @Author: Ferre
     * @create: 2019/8/23 11:52
     * @param $data
     * 不同消息体的处理
     */
     public static function handleNoticeType($data)
     {
         $list = [];
         foreach ($data as $key => $row) {
             $list[$key]['content'] = $row['content'];
             if ($row['source'] == 1) {
                 $list[$key]['title'] = '后台管理员推送';
             }
             if ($row['source'] == 2) {
                 $list[$key]['title'] = '文章报错奖励推送';
             }
             if ($row['source'] == 3) {
                 $list[$key]['title'] = '题目报错奖励推送';
             }
             if ($row['source'] == 4) {
                // $list[$key]['content'] = '亲爱的同学，上周的刷题战报《' . $row['content'] . '》已经生成，请注意查看消息！';
                $list[$key]['title'] = '刷题战报';
            }
             $list[$key]['time'] = $row['createTime'];
             $list[$key]['id'] = $row['id'];
             $list[$key]['type'] = $row['source'];
         }
         return $list;
     }
}
