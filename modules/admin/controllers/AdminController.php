<?php
/**
 * 全局首页
 * Created by PhpStorm.
 * User: sjeam
 */
namespace app\modules\admin\controllers;

use yii;
use app\libs\ApiControl;
class AdminController extends ApiControl {

    public $enableCsrfValidation = false;

    public $layout = 'not';

    public function actionIndex()
    {
       return $this->render("index");
    // return  $this->renderPartial("AdminMeanu");
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
   //  public function actionMeanuTree()
   //  {

   //    $blockData = Yii::$app->request->post();
   //    var_dump( $blockData);die;
   //     return $this->render("meanuTree");
   //  // return  $this->renderPartial("AdminMeanu");
   //  }
   

}