<?php
/**
 * 全局首页
 * Created by PhpStorm.
 * User: obelisk
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\admin\controllers;

use yii;
use app\libs\ApiControl;

use app\modules\admin\models\AdminInit;
class ApiController extends ApiControl {

    public $enableCsrfValidation = false;

    public function actionInit(){
      // 清除缓存
      $clearInfo=array('clearInfo'=>array(
          "clearUrl"=>"/admin/api/clear",  //定义清除接口
      ));

      
      //首页
      $homeInfo=array('homeInfo'=>array(
        "title"=>"首页", 
        "icon"=>"fa fa-home", 
        "href"=>"/layuimini/page/welcome-1.html?mpi=m-p-i-0", 
      ));
      //logo
      $logoInfo=array('logoInfo'=>array(
        "title"=>"LayuiMini", 
        "image"=>"/layuimini/images/logo.png", 
        "href"=>"/layuimini/page/welcome-1.html?mpi=m-p-i-0", 
      ));
      //列表
      // $menuInfo=array('menuInfo'=>array(
      //   'currency'=>array(
      //       "title"=>"常规管理", 
      //       "icon"=>"fa fa-address-book", 
      //       "child"=> array(),
      //   ),
      //   'component'=>array(
      //       "title"=>"组件管理", 
      //       "icon"=>"fa fa-lemon-o", 
      //       "child"=> array(),      
      //   ),
      //   'other'=>array(
      //     "title"=>"其它管理", 
      //     "icon"=>"fa fa-slideshare", 
      //     "child"=> array(),      
      //   ),
      // ));
      $menuInfo= AdminInit::getAdminIint();  //后台界面菜单
      // var_dump($menuInfo['menuInfo']['currency']['child'][0]['child']);die;
      // print_r(json_encode($menuInfo['menuInfo']['currency']['child'][0]['child']));die;
      $data= array_merge($clearInfo,$homeInfo,$logoInfo,$menuInfo);
      echo json_encode($data);
    }
        

    //清理缓存
    public function actionClear(){

      $data=array('code'=>1,'msg'=>'服务端清理缓存成功');
      echo json_encode($data);
    }
  
}