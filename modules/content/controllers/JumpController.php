<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:12
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\Jump;

use Yii;
use yii\data\Pagination;

class JumpController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 课程设置
     * by cy
     */
    public function actionIndex(){
        $content = Yii::$app->request->get('content');
        $id = Yii::$app->request->get('id');
        $type = Yii::$app->request->get('type');
        $belong = Yii::$app->request->get('belong');
        $where = "id!=''"; 
        if($content){
            $where .= " and content like '%".$content."%'";
        }
        if($id){
            $id=intval($id);
            $where .= " and id={$id}";
        }
        if($type){
            $where .= " and type={$type}";
        }
        if($belong){
            $where .= " and belong={$belong}";
        }


        $where .= " order by sort desc";
        if($_POST){
            $ids = Yii::$app->request->post("id");
            $sort = Yii::$app->request->post("sort");
            foreach($ids as $k => $v){
                Jump::updateAll(['sort'=>$sort[$k]],"id = $v");
            }
        }
        $count = Jump::find()->select("id")->where($where)->count();
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $teachers = Jump::find()->where($where)->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['content'=>$teachers,'page'=>$page]);
    }

    public function actionAdd(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            if($id){
                $course = Jump::findOne($id);
            }else{
                $course = new Jump();
            }
            $course->content = $content['content'];
            $course->type = $content['type'];
            $course->image = $content['image'];
            $course->belong = $content['belong'];
            $course->sort = $content['sort'];
            $course->type = 1;
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
                $teacher = Jump::findOne($id);
                return $this->render('add',['data'=>$teacher]);
            }else{
                return $this->render('add');
            }
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = Jump::deleteAll("id = $id");
        if($res){
            echo "<script>alert('删除成功。');setTimeout(function(){location.href='index'},1000)</script>";
        }else{
            echo "<script>alert('删除失败');setTimeout(function (){location.href='index'},1000)</script>";
        }
    }

}