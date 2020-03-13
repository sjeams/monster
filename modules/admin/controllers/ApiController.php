<?php

/**
 * 全局首页---树形接口
 * Created by PhpStorm.
 * User: sjeam
 */
namespace app\modules\admin\controllers;

use yii;
use app\libs\ApiControl;

use app\modules\admin\models\AdminInit;
use app\modules\admin\models\Biology;
class ApiController extends ApiControl {

    public $enableCsrfValidation = false;

    public function actionInit(){
      // // 清除缓存
      // $clearInfo=array('clearInfo'=>array(
      //     "clearUrl"=>"/admin/api/clear",  //定义清除接口
      // ));
      // //首页
      // $homeInfo=array('homeInfo'=>array(
      //   "title"=>"首页", 
      //   "icon"=>"fa fa-home", 
      //   "href"=>"/layuimini/page/welcome-1.html?mpi=m-p-i-0", 
      // ));
      // //logo
      // $logoInfo=array('logoInfo'=>array(
      //   "title"=>"LayuiMini", 
      //   "image"=>"/layuimini/images/logo.png", 
      //   "href"=>"/layuimini/page/welcome-1.html?mpi=m-p-i-0", 
      // ));
      //列表
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
    //菜单列表-首页
    public function actionAdmin(){
      //树状列表
      $data= AdminInit::getAdminMenus();  //后台界面菜单
      $count =count($data);
      echo json_encode($data,true);
    }
    //菜单快速修改
    public function actionMeanuUpdate(){
      // header('content-type:application/json ;charset=utf-8;');
      $data=Yii::$app->request->post('data');
      $data= json_decode($data,JSON_UNESCAPED_UNICODE);
      AdminInit::updateMeanAll($data);
      echo json_encode(true);
    } 
    //菜单弹窗新增--和修改
    public function actionMeanuAdd(){
    $data = Yii::$app->request->post('data');
    $data= json_decode($data)[0];
    if(!empty($data->id)){ //修改
      $adminInt =  AdminInit::find()->where("id=$data->id")->one();
    }else{ //新增
      $adminInt = new AdminInit();
      unset($data->id);
      !empty($data->pid)? $data->pid :$data->pid=0; //默认为最顶级
    }
      foreach($data as $key=>$v){
        $adminInt->$key =$v;
      }
      $adminInt->createTime=time();
      $res= $adminInt->save();
      echo json_encode($res);
    }
    //菜单删除
    public function actionMeanuDelete(){
      $id = Yii::$app->request->post('id');
      $adminInt =  AdminInit::find()->where("pid=$id")->asarray()->one();
      // var_dump($adminInt);die;
      $res =0;
      if(empty($adminInt)){
        $findOne =  AdminInit::find()->where("id=$id")->one();
     
        $res =$findOne->delete();
      }
      // var_dump($res);die;
      return $res;
    }
    //菜单弹出树 -- 和首页列表树
    public function actionMeanuTree(){
      $meanuInfo= AdminInit::getAdminMenusTree();  //后台界面菜单
      // var_dump( $meanuInfo);die;
      echo json_encode($meanuInfo);
    }
    //菜单弹出树
    public function actionMeanuFindone(){
      $id =  Yii::$app->request->post('id');
      $meanuInfo=  AdminInit::find()->where("id=$id")->asarray()->One();
      echo json_encode($meanuInfo);
    }




    // 生物管理---数据操作接口
    // 增-改(批量修改)
    public function actionBiologyAdd()
    {
      $data = Yii::$app->request->post('data');  
      $data = json_decode($data);
      // var_dump($data);die;
      foreach($data as $v){
        if($v->_state=='modified'){ //改
          $model = Biology::find()->where("id=$v->id")->One();
          $model->name=$v->name;
          $model->biology=$v->biology;
          $model->state=$v->state;
          $model->power=$v->power;
          $model->agile=$v->agile;
          $model->intelligence=$v->intelligence;
          $model->wuXing=$v->wuXing;
          $model->skill=$v->skill;
          $model->wordId=$v->wordId;
          $model->descript=$v->descript;
          $model->sex=$v->sex;
          $model->yiXing=$v->yiXing;
          $model->save();
          // $result = Biology::updateAll($v,['id'=>$v->id]);
        }else if($v->_state=='added') { // 增
          unset($v->key);
          unset($v->_id);
          unset($v->_uid);
          unset($v->_state);
          Yii::$app->db->createCommand()->insert('x2_biology',$v)->execute();
          // $model = new Biology();
        } 
      }
      echo true;
    }
    // 删
    public function actionBiologyDelete()
    {
      $data = json_decode(Yii::$app->request->post('data'));
      foreach($data as $v){
        // var_dump($v);die;
        if(isset($v->id)){
          //删除主键
          Biology::deleteAll(['id'=>$v->id]);
        }
      }
      echo true;
    }
    //改(单个修改)
    public function actionBiologyUpdateone()
    {
      $id = Yii::$app->request->get('id');  
      $data = Biology::find()->where("id=$id")->asarray()->One();
      echo json_encode($data);
    }


    // 弹窗修改(单个修改)
    public function actionBiologyUpdate()
    {
      $data = Yii::$app->request->post('data');  
      $data = json_decode($data);
      foreach($data as $v){
        $result = Biology::updateAll((array)$v,['id'=>$v->id]);
      }
      echo true;
    }



    // 经验修改与升级
    public function actionExperience(){
      $exp = Yii::$app->request->post('exp');
      $grade=1;
      $exp=160;
      // ，每级叠加经验150
      $sum=0;
      for($i=1;$i<=130;$i++) {
          $sum+= $i*150;
          if($sum>=$exp){
            $res['newGrade'] =$i;
            $res['newExp'] = $i*150;
            $res['nowExp']= $sum-$exp;
            break;
          }
      }
      echo "等级 : ".$res['newGrade'];
      echo "<br>";
      echo "exp : ".$res['nowExp']."/".$res['newExp'];
      echo $res;
      // var_dump($res);die;
    }

}