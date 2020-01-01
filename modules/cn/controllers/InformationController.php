<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use yii;
use app\modules\cn\models\UserComment;
use app\libs\ToeflController;
use app\modules\cn\models\Content;
use app\modules\cn\models\UserCollection;
use app\modules\user\models\User;

class InformationController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    function init (){
        parent::init();
        $this->type =6;
    }
    /**
     * GRE资讯页
     * by  yanni
     */
    public function actionIndex(){
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',10);
        $keyword = Yii::$app->request->get('content');
        $model = new Content();
        $this->title = 'GRE考试报名流程|GRE报名官网|GRE考试时间|GRE机经预测|GRE是什么考试|GRE培训_雷哥GRE培训官网';
        $this->keywords = 'GRE考试报名流程,GRE报名官网,GRE考试时间,GRE机经预测,GRE真题下载,GRE培训课程,GRE培训,GRE是什么考试,GRE考试辅导,GRE在线课程,GRE网课,GRE机经真题,雷哥GRE培训中心,美国留学';
        $this->description = '雷哥GRE培训官网，提供GRE考试报名流程,GRE报名官网,GRE考试时间,GRE机经预测,GRE真题下载，GRE备考攻略，GRE备考知识，GRE备考经验，GRE填空阅读数学写作考试内容详解等GRE备考服务，帮助学生快速提分，早日考出满意的GRE成绩。';

        if($keyword){
            $data = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','where'=>" c.name like '%".$keyword."%'",'order'=>'alternatives DESC','page'=>$page,'pageSize' => $pageSize,'pageStr'=>1]);
            foreach($data['data'] as $k=>$v){
                $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
                $user = User::find()->asArray()->select(['nickname','image'])->where("id={$v['userId']}")->one();
                $data['data'][$k]['editUser'] = $user;
                $front = time()-strtotime($v['alternatives']);
                if($front<86400){
                    $data['data'][$k]['alternatives'] = floor($front/3600)."小时前";
                    if($front<3600){
                        $data['data'][$k]['alternatives'] = floor($front/60)."分钟前";
                        if($front<60){
                            $data['data'][$k]['alternatives'] = $front."秒前";
                        }
                    }
                } else{
                    $data['data'][$k]['alternatives'] = date("Y-m-d",strtotime($v['alternatives']));
                }
            }
            return $this->render('gre_consults',['data'=>$data,'keyword'=>$keyword]);
        }else{
            $data = $model->getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '543','order'=>'alternatives DESC','page'=>$page,'pageSize' => $pageSize,'pageStr'=>1]);
            foreach($data['data'] as $k=>$v){
                $data['data'][$k]['num'] = UserComment::find()->select("id")->asArray()->where("pid = 0 and contentId={$v['id']}")->count();
                $user = User::find()->asArray()->select(['nickname','image'])->where("id={$v['userId']}")->one();
                $data['data'][$k]['editUser'] = $user;
                $front = time()-strtotime($v['alternatives']);
                if($front<86400){
                    $data['data'][$k]['alternatives'] = floor($front/3600)."小时前";
                    if($front<3600){
                        $data['data'][$k]['alternatives'] = floor($front/60)."分钟前";
                        if($front<60){
                            $data['data'][$k]['alternatives'] = $front."秒前";
                        }
                    }
                } else{
                    $data['data'][$k]['alternatives'] = date("Y-m-d",strtotime($v['alternatives']));
                }
            }
            return $this->render('gre_consult',['data'=>$data]);
        }

    }

    public function actionDetail(){
        $id = Yii::$app->request->get('id');
        $page = Yii::$app->request->get('page',1);
        $uid = Yii::$app->session->get('uid');
        $model = new Content();
        $data =  $model->getClass(['fields' => 'answer,alternatives,description,cnName,price,keywords','where' =>"c.id=$id"]);
        Content::updateAll(['viewCount'=>$data[0]['viewCount']+1],'id='.$id);
        $modelu = new UserComment();
        $comment = $modelu->getUserComment($id,$page,5);
        $content['collection'] = '';
        if($uid) {
            $content['collection'] = UserCollection::find()->asArray()->where("uid={$uid} and contentId={$id}")->one();
        }
        $user = User::find()->asArray()->select(['nickname','image'])->where("id={$data[0]['userId']}")->one();
        $data[0]['editUser'] = $user;
        $front = time()-strtotime($data[0]['alternatives']);
        if($front<86400){
            $data[0]['alternatives'] = floor($front/3600)."小时前";
            if($front<3600){
                $data[0]['alternatives'] = floor($front/60)."分钟前";
                if($front<60){
                    $data[0]['alternatives'] = $front."秒前";
                }
            }
        } else{
            $data[0]['alternatives'] = date("Y-m-d",strtotime($data[0]['alternatives']));
        }
        $this->title = $data[0]['name'].'-雷哥GRE';
        $this->keywords = $data[0]['cnName'];
        $this->description = $data[0]['answer'];
        return $this->render('gre_consultDe-new',['data'=>$data[0],'comment'=>$comment,'content'=>$content]);
    }
}
