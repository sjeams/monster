<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
class BiologySkill extends ActiveRecord
{
    public static function tableName(){
        return '{{%biology_skill}}';
    }

    /**
     * 获取所有模块
     * @sjeam
     */
    public static function getSkillList(){
        $data = BiologySkill::find()->asarray()->All();
        // $data=  AdminInit::getChildren($adminIint);
        return $data;
    }

    /**
     * 获取弹出树
     * @sjeam
     */
    public static function getAdminMenusTree(){
        $data = BiologySkill::find()->select("id,title as text,pid,url")->asarray()->All();
        // $data=  AdminInit::getTree($adminIint);
        return $data;
    }

}
