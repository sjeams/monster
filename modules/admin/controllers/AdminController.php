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

    public $layout = false;
    public function actionAdminMeanu()
    {
       return $this->render("AdminMeanu");
    // return  $this->renderPartial("AdminMeanu");
    }


}