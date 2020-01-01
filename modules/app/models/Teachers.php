<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\app\models;

use yii\db\ActiveRecord;

class Teachers extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%teachers}}';
    }

    // app 刷题活动 获取教师头像
    public static function getOpenTeacherImage($res){
      
        // $teacher = new Teachers();
        foreach($res as$ky=> $value){
            //   $value['teacher']='Amanda,bella';
            $teahcerlist = Teachers::getTeachers($value['teacher']);
            isset($teahcerlist[0]) ? $res[$ky]['teacherImage']= $teahcerlist[0]['image'] : $res[$ky]['teacherImage']=null;
        }
        return $res;
    }

    // 刷题活动获取教师详情
    public static function getTeachers($teacher){
    
        if($teacher!=''){
            $list = explode(',',$teacher);
            $list = array_filter($list);
            foreach($list as $ky=>$v){
                $res[$ky] = Teachers::find()->asArray()->where(['like', 'name', $v])->one();
            }
            $res = array_filter($res);
        }else{
            $res =null ;
        }
        // var_dump($res);die;
        return $res;
    }


    
}