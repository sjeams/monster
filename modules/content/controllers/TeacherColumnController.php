<?php
/**
 * Created by PhpStorm.
 * User: cy
 * Date: 2018/4/9
 * Time: 16:12
 */
namespace app\modules\content\controllers;

use app\libs\ApiControl;
use app\modules\content\models\TeacherColumn;
use Yii;
use yii\data\Pagination;

class TeacherColumnController extends ApiControl {
    public $enableCsrfValidation = false;
    /**
     * 名师专栏首页
     * by cy
     */
    public function actionIndex(){
        $nameid = Yii::$app->request->get('nameid');
        $label = Yii::$app->request->get('type');
        $hot = Yii::$app->request->get('hot');
        $where = ' 1 = 1';
        if($nameid > 0){
            $where .= " and teacherId = $nameid";
        }
        if($label > 0){
            $where .= " and type = $label ";
        }
        if($hot == 1 || $hot == -1){
            $where .= " and hot = $hot ";
        }
        $teachers = Yii::$app->db->createCommand("SELECT id,name FROM x2_teachers")->queryAll();
        $count = TeacherColumn::find()->select("id")->where($where)->count();
        $page = new Pagination(['totalCount'=>$count,'pageSize'=>10]);
        $columns = TeacherColumn::find()->where($where)->offset($page->offset)->limit($page->limit)->orderBy('id DESC')->asArray()->all();
        foreach($columns as $k=>$v){
            $id = $v['teacherId'];
            $columns[$k]['teachername']= '';
            foreach($teachers as $kk => $vv){
                if($id == $vv['id']){
                    $columns[$k]['teachername']=$vv['name'];
                }
            }
        }
        $teacherUrl = Yii::$app->request->getUrl();
        Yii::$app->session->set('teacherUrl',$teacherUrl);
        return $this->render('index',['content'=>$columns,'page'=>$page,'teachers'=>$teachers,'total'=>$count]);
    }

    public function actionAdd(){
        $teachers = Yii::$app->db->createCommand("SELECT id,name FROM x2_teachers")->queryAll();
        if($_POST){
            $id = Yii::$app->request->post('id');
            $content = Yii::$app->request->post('content');
            if($id){
                $column = TeacherColumn::findOne($id);
            }else{
                $column = new TeacherColumn();
            }
            $column->teacherId = $content['nameid'];
            $column->title = $content['title'];
            $column->introduce = $content['introduce'];
            $column->content = $content['detail'];
            $column->type = $content['type'];
            $column->hot = $content['hot'];
            $column->image = $content['image'];
            $column->label = $content['label'];
            $column->keywords = $content['keywords'];
            $column->description = $content['description'];
            $column->view = $content['view'];
            $time = time();
            $column->createTime = date('Y-m-d H:i:s',$time);
            $res = $column->save();
            if($res == 1){
                $teacherUrl = Yii::$app->session->get('teacherUrl');
                echo "<script>alert('操作成功');setTimeout(function(){location.href='$teacherUrl'},1000)</script>";
            }else{
                echo "<script>alert('操作失败');setTimeout(function(){history.go(-1)},1000)</script>";
            }
        }else{
            $id = Yii::$app->request->get('id');
            if($id){
                $column = TeacherColumn::findOne($id);
                return $this->render('add',['data'=>$column,'teachers'=>$teachers,'id'=>$id]);
            }else{
                return $this->render('add',['teachers'=>$teachers,'id'=>$id]);
            }
        }
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $res = TeacherColumn::deleteAll("id = $id");
        if($res){
            $teacherUrl = Yii::$app->session->get('teacherUrl');
            echo "<script>alert('删除成功。');setTimeout(function(){location.href='$teacherUrl'},1000)</script>";
        }else{
            echo "<script>alert('删除失败');setTimeout(function (){history.go(-1)},1000)</script>";
        }
    }

}