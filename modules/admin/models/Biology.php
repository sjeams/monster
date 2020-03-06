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
    public static function getBiologyList($page=1,$pageSize=20){
        

        $data['data'] = Biology::find()->select("*,name as key")->offset($page*$pageSize)->limit($pageSize)->asarray()->All();
        $data ['total'] = Biology::find()->select("id")->asarray()->count();
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

    /**
     * 
     * @sjeam
     */
     public static function updateBiologyAll(){
   
        return $data;
    }


}
