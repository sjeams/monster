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
class BiologyController extends ApiControl {

    public $enableCsrfValidation = false;

    public $layout = 'not';

    public function actionIndex()
    {
       return $this->render("biologyIndex");
    // return  $this->renderPartial("AdminMeanu");
    }

    // 生物列表
    public function actionApiIndex()
    {
      $data= Biology::getBiologyList();
      // var_dump($data);die;
      echo json_encode($data);
    }


    // 生物技能
    public function actionApiSkill()
    {
      $data= BiologySkill::getSkillList();
      // var_dump($data);die;
      echo json_encode($data);
    }


    



    public function actionAdminMeanu()
    {
       return $this->render("AdminMeanu");
    // return  $this->renderPartial("AdminMeanu");
    }

   //  修改页面
    public function actionAdminUpdate()
    {
       return $this->render("AdminUpdate");
    // return  $this->renderPartial("AdminMeanu");
    }
   //  添加页面
    public function actionMeanuAdd()
    {
       return $this->render("meanuAdd");
    // return  $this->renderPartial("AdminMeanu");
    }
   

}