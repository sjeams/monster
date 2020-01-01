<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:12
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\Teacher;
use Yii;
use yii\data\Pagination;

class TeacherController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 名师首页
     * by cy
     */
    public function actionIndex(){
        $name = Yii::$app->request->get('name');
        $label = Yii::$app->request->get('label');
        $where = ' 1 = 1';
        if($name){
            $where .= " and name like '%".$name."%'";
        }
        if($label){
            $where .= " and label like '%".$label."%'";
        }
        $where .= " order by sort desc";
        if($_POST){
            $ids = Yii::$app->request->post("id");
            $sort = Yii::$app->request->post("sort");
            foreach($ids as $k => $v){
                Teacher::updateAll(['sort'=>$sort[$k]],"id = $v");
            }
        }
        $count = Teacher::find()->select("id")->where($where)->count();
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $teacher = Teacher::find()->where($where)->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['content'=>$teacher,'page'=>$page]);
    }

    public function actionAdd(){
        if($_POST){
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            if($id){
                $teacher = Teacher::findOne($id);
            }else{
                $teacher = new Teacher();
            }
            $teacher->name = $content['name'];
            $teacher->image = $content['image'];
            $teacher->introduce = $content['introduce'];
            $teacher->detail = $content['detail'];
            $teacher->course = $content['course'];
            $teacher->label = $content['label'];
            $teacher->description = $content['description'];
            $teacher->keywords = $content['keywords'];
            $time = time();
            $teacher->createTime = date('Y-m-d H:i:s',$time);
            $res = $teacher->save();
            if($res == 1){
                if(!$id){
                    $teacher->sort = $teacher->id;
                    $teacher->save();
                }
                echo "<script>alert('操作成功');setTimeout(function(){location.href='index'},1000)</script>";
            }else{
                echo "<script>alert('操作失败');setTimeout(function(){history.go(-1)},1000)</script>";
            }
        }else{
            $id = Yii::$app->request->get('id');
            if($id){
                $teacher = Teacher::findOne($id);
                return $this->render('add',['data'=>$teacher]);
            }else{
                return $this->render('add');
            }
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = Teacher::deleteAll("id = $id");
        if($res){
            echo "<script>alert('删除成功。');setTimeout(function(){location.href='index'},1000)</script>";
        }else{
            echo "<script>alert('删除失败');setTimeout(function (){location.href='index'},1000)</script>";
        }
    }

}