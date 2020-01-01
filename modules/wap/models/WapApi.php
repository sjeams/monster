<?php
namespace app\modules\wap\models;
use yii\db\ActiveRecord;
use app\modules\cn\models\Content;
use app\modules\app\models\Teachers;
use yii;
use app\libs\Method;
class WapApi extends ActiveRecord {
    public static function tableName(){

    }

    public static function dealBrush($data,$uid,$orderUrl){
        $datas = array();
        foreach ($data as $k=>&$v){
            strtotime($v['cnName']) < time() ? $v['status']= 3 : ( strtotime($v['duration']) > time() ? $v['status']=2 : $v['status']=1 );
            if($v['status']==2){
                $v['type'] = Yii::$app->params['brushImg'][$v['answer']];
                $v['time'] = date('m月d日', strtotime($v['duration'] )). '-'.date('m月d日', strtotime($v['cnName'] ));
                $v['sign'] = 0;
                if($uid){
                    $status = self::getOrderStatus($orderUrl,$v['id'],$uid,6);
                    $v['sign'] = $status['sign'];
                }
                $datas[] = $v;
            }
        }
        unset($v);
        $datas = array_slice($datas,0,3);
        return $datas;
    }
    /**
     * 查看报名及总数
     */
    public static function getOrderStatus($orderUrl,$id,$uid,$orderBelong=6){
        $sign = Method::post($orderUrl."/pay/order/brush-is-sign",['contentid' => $id,'orderBelong'=>$orderBelong,'uid'=>$uid]);
        $res['sign'] = 0;
        if($sign) $res['sign'] = 1;
        $totalNum = Method::post($orderUrl."/pay/order/brush-order-num",['contentid' => $id,'orderBelong'=>$orderBelong]);
        $res['num'] = $totalNum;
        return $res;
    }

    /**
     *获取活动详情
     */
    public static function getActiveDetail($id,$fields,$orderUrl,$uid){
        $sign = Content::findOne($id);
        if(!$sign){
            echo json_encode(['code' => 0,'message'=>'没有课程详情']);die;
        }
        $data = Content::getClass(['fields' => $fields, 'where' => "c.id = $id"]);
        $goods = $data[0];
        $goods['price'] = $goods['price']?$goods['price']:0;
        //订单数量
        if($uid){
            $status = self::getOrderStatus($orderUrl,$id,$uid,6);
            $goods['sign'] = $status['sign'];
            $goods['numbering'] = $status['num']+$goods['orderNum'];
            $goods['numbering'] = $goods['numbering']?$goods['numbering']:0;
        }else{
            $goods['sign'] = 0;
        }
        return $goods;
    }

    public static function dealDetail($data,$url){
        $data['time'] =  date('m月d日', strtotime($data['duration'] )). '-'.date('m月d日', strtotime($data['cnName'] ));
        $data['article'] = str_replace('/files/attach', $url.'/files/attach', $data['article']);
        $info['parent'] = $data;

        if($data['teacher']){
            $info['teacher']['teacherImg'] = $data['teacher']['image'];
            $info['teacher']['teacherName'] = $data['teacher']['name'];
            $info['teacher']['teacherInfo'] = $data['teacher']['detail'];
            $info['teacher']['teacherLabel'] = $data['teacher']['label'];
        }else{
            $info['teacher'] = array();
        }
        unset( $info['parent']['teacher']);
        return $info;
    }
}
