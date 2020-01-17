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

    public function actionAdminUpdate()
    {
       return $this->render("AdminUpdate");
    // return  $this->renderPartial("AdminMeanu");
    }
    public function actionMeanuAdd()
    {
       return $this->render("meanuAdd");
    // return  $this->renderPartial("AdminMeanu");
    }
    public function actionMeanuTree()
    {

      $blockData = Yii::$app->request->post();
      var_dump( $blockData);die;
       return $this->render("meanuTree");
    // return  $this->renderPartial("AdminMeanu");
    }
   

}