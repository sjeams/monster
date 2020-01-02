<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
class AdminInit extends ActiveRecord
{
    public static function tableName(){
        return '{{%admin_init}}';
    }

    /**
     * 获取所有模块
     * @sjeam
     */
    public static function getAdminIint(){
        $adminIint = AdminInit::find()->asarray()->All();
        $data=  AdminInit::getChildren($adminIint);
        return $data;
    }
    /**
     * 无限递归分类
     * @sjeam
     */
     public static function getChildren($list,$pid=0){
        $arr=array();
        foreach ($list as $key =>$value){
            if($value['pid']==$pid){
                $value['child']=AdminInit::getChildren($list,$value['id']);
                if($value['pid']==0){
                     $arr[$value['name']]=$value['child'];
                }elseif($value['pid']==1){
                     $arr[$value['name']]=$value;
                }else{
                    if(empty($value['child'])){
                        unset($value['child']);
                    }
                     $arr[]=$value;
                }
            }
        }
        return $arr;
 
     }
    // public static function getChildren($list,$pid=0){
    //    $arr=array();
    //    foreach ($list as $key =>$value){
    //        if($value['pid']==$pid){
    //            $value['child']=AdminInit::getChildren($list,$value['id']);
    //            $arr[]=$value;
    //        }
    //    }
    //    return $arr;

    // }

}
