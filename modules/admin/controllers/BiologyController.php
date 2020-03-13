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





class BiologyController extends ApiControl {

    public $enableCsrfValidation = false;

    public $layout = 'not';

    public function actionIndex()
    {
       return $this->render("biologyIndex");
      // return  $this->renderPartial("AdminMeanu");
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
      $where="1=1 ";
      if(!empty($key)){  $where.=" and name like '%$key%' "; }
      if($sortField){ // 排序
        $where.="order by $sortField $sortOrder";
      }else{$where.="";}
      $data= Biology::getBiologyList($pageIndex,$pageSize,$where);
      echo json_encode($data);
    }

    // 生物技能
    public function actionApiSkill()
    {
      // $pageIndex=Yii::$app->request->post('pageIndex',1);
      // $pageSize=Yii::$app->request->post('pageSize',20);
      $sortField=Yii::$app->request->post('sortField');
      $sortOrder=Yii::$app->request->post('sortOrder');
      $key=Yii::$app->request->post('key');
      $where="1=1 ";
      if(!empty($key)){  $where.=" and name like '%$key%' or words like'%$key%'"; }
      if($sortField){ // 排序
        $where.="order by $sortField $sortOrder";
      }
      $data= BiologySkill::getSkillList($where);
      echo json_encode($data);
    }

    //列表页
    public function actionAdminMeanu()
    {
       return $this->render("AdminMeanu");
    }

   //  修改页面
    public function actionAdminUpdate()
    {
       return $this->render("AdminUpdate");
    }
   //  添加页面
    public function actionMeanuAdd()
    {
       return $this->render("meanuAdd");
    }
   

   //  生物详情弹窗
   public function actionEmployeeWindow()
   {  
      return $this->render("EmployeeWindow");
   }
    

   //  生物境界弹窗
   public function actionBiologyStateall()
   {  
      $data= BiologyState:: getValueList();
      echo json_encode($data);
   }


    //  世界详情列表
    public function actionWordslist()
    {  
        $data= Words:: getValueList();
        echo json_encode($data);
    }

    //  世界详情弹窗
    public function actionWordsall()
    {  
        $pageIndex=Yii::$app->request->post('pageIndex',1);
        $pageSize=Yii::$app->request->post('pageSize',20);
        $sortField=Yii::$app->request->post('sortField');
        $sortOrder=Yii::$app->request->post('sortOrder');
        $key=Yii::$app->request->post('key');
        $where="1=1 ";
        if(!empty($key)){  $where.=" and name like '%$key%' or typeName like'%$key%'"; }
        if($sortField){ // 排序
          $where.="order by $sortField $sortOrder";
        }else{$where.="";}
        $data= Words:: getValueListtype($pageIndex,$pageSize,$where);
        echo json_encode($data);
    }
    //  种族详情弹窗
   public function actionBiologyall()
   {  
      $data= BiologyBiology:: getValueList(); 
      echo json_encode($data);
   }
     //  性格详情弹窗
     public function actionBiologyCharacterall()
     {  
        $data= BiologyCharacter:: getValueList(); 
        echo json_encode($data);
     }

   

    // 生物管理---生物生成属性
    public function actionBiologyExtend()
    {
      $data= BiologyNature:: getValueList(); 
      echo json_encode($data);
    }

}