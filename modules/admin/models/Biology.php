<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
class Biology extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology}}';
    }

    /**
     * 获取所有模块
     * @sjeam
     */
    public static function getBiologyList(){
        $data = Biology::find()->select("*,name as key")->asarray()->All();
        // $data=  AdminInit::getChildren($adminIint);
        return $data;
    }

    /**
     * 获取弹出树
     * @sjeam
     */
    public static function getAdminMenusTree(){
        $data = AdminInit::find()->select("id,title as text,pid,url")->asarray()->All();
        // $data=  AdminInit::getTree($adminIint);
        return $data;
    }

}
