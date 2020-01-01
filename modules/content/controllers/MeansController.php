<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:12
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\Means;

use Yii;
use yii\data\Pagination;

class MeansController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 资料领取
     * by sjeam
     */
    public function actionIndex(){
        $content = Yii::$app->request->get('content');
        $id = Yii::$app->request->get('id');
    
        $where = "id!=''"; 
        if($content){
            $where .= " and content like '%".$content."%'";
        }
        if($id){
            $id=intval($id);
            $where .= " and id={$id}";
        }
        $order = "sort desc, createTime desc";
        if($_POST){
            $ids = Yii::$app->request->post("id");
            $sort = Yii::$app->request->post("sort");
            foreach($ids as $k => $v){
                Means::updateAll(['sort'=>$sort[$k]],"id = $v");
            }
        }
    
        $count = Means::find()->select("id")->where($where)->count();
     
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $teachers = Means::find()->where($where)->offset($page->offset)->orderBy($order)->limit($page->limit)->all();
        return $this->render('index',['content'=>$teachers,'page'=>$page]);
    }

    public function actionAdd(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            if($id){ //修改
                $course = Means::findOne($id);
            }else{  // 添加
                $course = new Means();
                $course->createTime = time();
            }
            $course->content = $content['content'];
            $course->chat = $content['chat'];
            $course->belong = $content['belong'];
            $course->sort = $content['sort'];
            $res = $course->save();
            if($res == 1){
                if(!$id){
                    $course->sort = $course->id;
                    $course->save();
                }
                echo "<script>alert('操作成功');setTimeout(function(){location.href='index'},1000)</script>";
            }else{
                echo "<script>alert('操作失败');setTimeout(function(){history.go(-1)},1000)</script>";
            }
        }else{
            $id = Yii::$app->request->get('id');
            if($id){
                $teacher = Means::findOne($id);
                return $this->render('add',['data'=>$teacher]);
            }else{
                return $this->render('add');
            }
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = Means::deleteAll("id = $id");
        if($res){
            echo "<script>alert('删除成功。');setTimeout(function(){location.href='index'},1000)</script>";
        }else{
            echo "<script>alert('删除失败');setTimeout(function (){location.href='index'},1000)</script>";
        }
    }

}