<?php
/**
 * 生物管理
 * Created by PhpStorm.
 * User: sjeam
 */
namespace app\modules\admin\controllers;

use yii;
use app\libs\ApiControl;
use app\modules\admin\models\Biology;
use app\modules\admin\models\BiologySkill;
use app\modules\admin\models\BiologyState;
use app\modules\admin\models\Words;
use app\modules\admin\models\BiologyBiology;
use app\modules\admin\models\BiologyCharacter;
use app\modules\admin\models\BiologyNature;
use app\modules\admin\models\BiologyCreate;
use app\modules\admin\models\UserWords;



class BiologyCreateController extends ApiControl {

    public $enableCsrfValidation = false;

    public $layout = 'not';

    //生物创造页面
    public function actionIndex()
    {
       return $this->render("biologyCreate");
      // return  $this->renderPartial("AdminMeanu");
    }

    //  生物详情弹窗
   public function actionEmployeeWindow()
   {  
      return $this->render("EmployeeWindow");
   }
    
    // 数据加载--->
    // 生物列表
    public function actionApiIndex()
    {
      $pageIndex=Yii::$app->request->post('pageIndex',1);
      $pageSize=Yii::$app->request->post('pageSize',20);
      $sortField=Yii::$app->request->post('sortField');
      $sortOrder=Yii::$app->request->post('sortOrder');
      $key=Yii::$app->request->post('key');
      $type=Yii::$app->request->post('type');
      $where="1=1 ";
      if(!empty($type)){  $where.=" and type =$type "; }
      if(!empty($key)){  $where.=" and name like '%$key%' "; }
      if($sortField){ // 排序
        $where.="order by $sortField $sortOrder";
      }else{$where.="";}
      $data= BiologyCreate::getBiologyList($pageIndex,$pageSize,$where);
      echo json_encode($data);
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
          $model = BiologyCreate::find()->where("id=$v->id")->One();
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
          Yii::$app->db->createCommand()->insert('x2_biology_create',$v)->execute();
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
          BiologyCreate::deleteAll(['id'=>$v->id]);
        }
      }
      echo true;
    }
    //改(单个修改)
    public function actionBiologyUpdateone()
    {
      $id = Yii::$app->request->get('id');  
      $data = BiologyCreate::find()->where("id=$id")->asarray()->One();
      echo json_encode($data);
    }


    // 弹窗修改(单个修改)
    public function actionBiologyUpdate()
    {
      $data = Yii::$app->request->post('data');  
      $data = json_decode($data);
      foreach($data as $v){
        $result = BiologyCreate::updateAll((array)$v,['id'=>$v->id]);
      }
      echo true;
    }


    // 随机生物--征服世界id --默认为1
    // admin/biology-create/biology-rand
    public function actionBiologyRand()
    {
      $biology = UserWords :: BiologyRand()[0]; //默认管理员-数量1 --返回数组
      $biology = UserWords ::BiologyExtendRand($biology);
      var_dump($biologyid);die;
      // echo json_encode($biology);
    }





}