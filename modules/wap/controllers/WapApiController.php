<?php
namespace app\modules\wap\controllers;

use yii;
use app\libs\Method;
use app\modules\wap\models\WapApi;
use app\modules\cn\models\Content;
use app\modules\app\models\Teachers;
use app\libs\ToeflController;

class WapApiController extends ToeflController
{
    public $enableCsrfValidation = false;
    public $orderUrl = "https://order.viplgw.cn";
    public $imgUrl = "https://gre.viplgw.cn";
    function init(){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
//        $request_url = @apache_request_headers()['Origin'];
//        if (empty($request_url)){
//            $request_url = 'https://mgre.viplgw.cn';
//        }
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials:true');
        header('Access-Control-Allow-Headers: X-Requested-With');
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        header("Content-type: text/html; charset=utf-8");
    }

    /**
     * 刷题团、进行中的
     */
    public function actionBrushGroup(){
        $uid = Yii::$app->request->post('uid','');
        $brushing = Content::getClass(['where' => "c.catid = 596", 'fields' => 'duration,cnName,answer','order'=>'cnName DESC']);
        $data = WapApi::dealBrush($brushing,$uid,$this->orderUrl);
        die(json_encode(['code'=>1,'message'=>'success','data'=>$data]));
    }

    /**
     * 活动详情
     */
    public function actionActiveDetail(){
        $uid = Yii::$app->request->post('uid');
        $id = Yii::$app->request->post('id');
        $fields = "duration,cnName,answer,A,price,article,orderNum";
        $info = WapApi::getActiveDetail($id,$fields,$this->orderUrl,$uid);
        if($info['A']){
            //老师信息
            $teacherlist = Teachers::getTeachers($info['A']);
            isset($teacherlist[0]) ?$info['teacher'] = $teacherlist[0]:$teacher=null;
        }

        $url = $this->imgUrl;
        $data = WapApi::dealDetail($info,$url);
        $data['parent']['sign'] = 0;
        if($uid){
            $sign = WapApi::getOrderStatus($this->orderUrl,$id,$uid,6);
            $data['parent']['sign'] = $sign['sign'];
        }
        die(json_encode(['code'=>1,'message'=>'success','data'=>$data]));
    }
    /**
     * 订单详情
     */
    public function actionOrderDetail(){
        $id = Yii::$app->request->post('id');
        $uid = Yii::$app->request->post('uid');
        $orderBelong = Yii::$app->request->post('orderBelong',6);
        if(!$uid) die(json_encode(['code'=>0,'message'=>'请先登录']));

        $fields = "price";
        $goodsInfo = WapApi::getActiveDetail($id,$fields);
        $goods['image'] = $goodsInfo['image'];
        $goods['title'] = $goodsInfo['title'];
        $goods['id'] = $goodsInfo['id'];
        $goods['price'] = $goodsInfo['price'];

        $sign = WapApi::getOrderStatus($this->orderUrl,$id,$uid,6);
        if($sign['sign']==1){
            die(json_encode(['code'=>0,'message'=>'你已购买']));
        }
        $user_leidou = uc_user_integral1($uid)['integral'];
        die(json_encode(['code'=>1,'message'=>'success','data'=>$goods,'integral'=>$user_leidou]));
    }
    /**
     * 提交订单
     */
    public function actionPayOrder(){
        $id = Yii::$app->request->post('id');
        $integral = Yii::$app->request->post('integral',0);
        $consignee = Yii::$app->request->post('consignee','');
        $orderBelong = Yii::$app->request->post('orderBelong',6);
        $uid = Yii::$app->request->post('uid');
        if(!$uid) die(json_encode(['code'=>0,'message'=>'请先登录']));
        $model   = new Content();
        $goods  = $model->getGoods($id);
        $totalMoney  = $goods[0]['price'] * 1;
        $totalMoney = $totalMoney?$totalMoney:0;
        $goods[0]['num'] = 1;
        $data = ['typeUrl' => 'greUrl', 'type' => $orderBelong, 'totalMoney' => $totalMoney, 'goods' => $goods];
        $order = serialize($data);

        $integral = $integral?$integral:0;
        if($integral<0||$integral>$goods['price']*100){
            die(json_encode(['code' => 0,'message' => '雷豆抵扣有误']));
        }
        die(json_encode(['code' => 1,'message' => 'success','data'=>['uid'=>$uid,'payType'=>1,'type'=>1,'integral'=>$integral,'orderData'=>$order,'consignees'=>$consignee]]));

    }

}