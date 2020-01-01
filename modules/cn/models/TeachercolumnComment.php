<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\cn\models;

use yii\db\ActiveRecord;
use app\libs\Method;
use app\libs\Pager;
class TeachercolumnComment extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%teachercolumn_comment}}';
    }

    /**
     * @param $teacher
     * @param $page
     * @param $pageSize
     * @return array
     * 讲师评价/分页
     * by yanni
     */
    public function getTeacherComment($teacher,$page,$pageSize){
        $limit =  " limit ".(($page-1)*$pageSize).",$pageSize";
        $sql = "select tc.*,u.image,u.userName,u.nickname from x2_teachercolumn_comment as tc LEFT JOIN x2_user as u on tc.userId=u.uid where tc.teacherId=$teacher and pid=0";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $datas = TeachercolumnComment::find()->asArray()->where("teacherId = $teacher and pid != 0 and fpid = {$v['id']}")->orderBy("id asc")->all();
            $data[$k]['userimage'] = $v['image'];
            if(!empty($v['nickname'])){
                $data[$k]['usernickname'] = $v['nickname'];
            } else{
                $data[$k]['usernickname'] = $v['userName'];
            }
            if(!empty($datas)){
                foreach($datas as $ki => $ko){
                    $pid_user = TeachercolumnComment::find()->where("id = {$ko['pid']}")->one()['userId'];
                    $p_user = User::find()->asArray()->select("id,image,nickname")->where("uid = $pid_user")->one();
                    $datas[$ki]['p_userimage'] = $p_user["image"];
                    $datas[$ki]["p_usernickname"] = $p_user["nickname"];
                    $self = User::find()->asArray()->select("id,userName,image,nickname")->where("uid = {$ko['userId']}")->one();
                    $datas[$ki]['userimage'] = $self['image'];
                    if(!empty($self['nickname'])){
                        $datas[$ki]['usernickname'] = $self['nickname'];
                    } else{
                        $datas[$ki]['usernickname'] = $self['userName'];
                    }

                }
            }
            $data[$k]["reply"] = $datas;
        }
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        $total = ceil($count/$pageSize);
        return ['data'=>$data,'pageStr'=>$pageStr,'total'=>$total];
    }
}