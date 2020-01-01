<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:12
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\Course;

use Yii;
use yii\data\Pagination;

class CurriculumController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 课程设置
     * by cy
     */
    public function actionIndex(){
        $name = Yii::$app->request->get('name');
        $rid = Yii::$app->request->get('rid');
        $where = ' type = 1';
        if($name){
            $where .= " and name like '%".$name."%'";
        }
        if($rid){
            $where .= " and representativeid={$rid}";
        }
        $where .= " order by sort desc";
        if($_POST){
            $ids = Yii::$app->request->post("id");
            $sort = Yii::$app->request->post("sort");
            foreach($ids as $k => $v){
                Course::updateAll(['sort'=>$sort[$k]],"id = $v");
            }
        }
        $count = Course::find()->select("id")->where($where)->count();
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $teachers = Course::find()->where($where)->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['content'=>$teachers,'page'=>$page]);
    }

    public function actionAdd(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            if($id){
                $course = Course::findOne($id);
            }else{
                $course = new Course();
            }
            $course->name = $content['name'];
            $course->contentid = $content['courseIds'];
            $course->representativeid = $content['courseId'];
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
                $teacher = Course::findOne($id);
                return $this->render('add',['data'=>$teacher]);
            }else{
                return $this->render('add');
            }
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = Course::deleteAll("id = $id");
        if($res){
            echo "<script>alert('删除成功。');setTimeout(function(){location.href='index'},1000)</script>";
        }else{
            echo "<script>alert('删除失败');setTimeout(function (){location.href='index'},1000)</script>";
        }
    }

}