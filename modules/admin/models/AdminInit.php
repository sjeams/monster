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

    // public static function getChildrenList($list,$pid=0){
    //    $arr=array();
    //    foreach ($list as $key =>$value){
    //        if($value['pid']==$pid){
    //            $value['child']=AdminInit::getChildrenList($list,$value['id']);
    //            $arr[]=$value;
    //        }
    //    }
    //    return $arr;
    // }

    /**
     * 获取所有模块
     * @sjeam
     */
     public static function getAdminMenus(){
        $adminIint = AdminInit::find()->select("id as authorityId,name,title,icon,href,createTime,id,pid")->asarray()->All();
        $data=  AdminInit::getTree($adminIint);
        return $data;
    }
    //生成树方法
    public static function getTree($data,$pid=0,$level=0){
        static $res=array();
        static $key=0;
        foreach($data as $k=>$v){
            if($v['pid']==$pid){
                $key++;
                $v['parentId']=$level;  //$level 用于识别当前分类的级别
                // if($v['pid']==0){  $v['parentId']='-1';}else{ $v['parentId']=1; }
                $isMenu  = AdminInit::find()->where("pid = {$v['id']}")->asarray()->One();
                if($isMenu){  $v['isMenu']=0;}else{ $v['isMenu']=1;}
                $v['checked']= 0;
                // $v['menuIcon']=$v['icon'];
                // $v['authorityId']= $v['id'];
                $v['authorityId']=$key;
                
                $res[]=$v;
                AdminInit::getTree($data,$v['id'],$level+1);//将查询出的$v['id']，作为参数进行递归
                //level 加一
            }else{
                $v['isMenu']=0;
            }
        }
        return $res;
    }
}
