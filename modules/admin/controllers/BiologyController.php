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
      // $sortField=Yii::$app->request->post('sortField');
      // $sortOrder=Yii::$app->request->post('sortOrder');
      $data= Biology::getBiologyList($pageIndex,$pageSize);
      echo json_encode($data);
    }

    // 生物技能
    public function actionApiSkill()
    {
      $data= BiologySkill::getSkillList();
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
    
   //  生物详情弹窗
   public function actionBiologyStateall()
   {  
      $data= BiologyState:: getBiologyStateall();
      echo json_encode($data);
   }
 
}