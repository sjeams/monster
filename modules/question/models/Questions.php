<?php 
namespace app\modules\question\models;
use app\libs\Method;
use app\modules\cn\models\PushMessage;
use app\modules\cn\models\Question;
use app\modules\cn\models\UserAnalysis;
use yii\db\ActiveRecord;
class Questions extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%questions}}';
    }

    /**
     * 修改单项题库
     * @Obelisk
     */
    public function updateSection(){
        $cat = QuestionCat::find()->asArray()->all();
        $source = QuestionSource::find()->asArray()->all();
        foreach($cat as $v) {
            \Yii::$app->session->remove('updateSign');
            foreach ($source as $val) {
                \Yii::$app->session->remove('updateSign');
                $data = Questions::find()->asArray()->where("catId = {$v['id']} AND sourceId = {$val['id']} AND id>8100")->all();
                $library = QuestionLibrary::find()->asArray()->where(['catId' => $v['id'], 'sourceId' => $val['id'], 'type' => 1])->all();
                $num = count($library);
                $type = 0;
                foreach ($data as $k => $value) {
                    $type = 1;
                    $sign = \Yii::$app->session->get('updateSign');
                    if (!$sign) {
                        if (isset($library[$num])) {
                            $libId = $library[$num]['id'];
                            LibraryQuestion::deleteAll("libId=$libId");
                        } else {
                            $model = new QuestionLibrary();
                            $model->catId = $v['id'];
                            $model->sourceId = $val['id'];
                            $model->name = $val['alias'] . ':test' . ($num + 1);
                            $model->knowId = '';
                            $model->type = 1;
                            $model->save();
                            $libId = $model->primaryKey;
                        }
                        \Yii::$app->session->set('updateSign', 1);
                        \Yii::$app->session->set('libId', $libId);
                    }
                    $libId = \Yii::$app->session->get('libId');
                    $model = new LibraryQuestion();
                    $model->libId = $libId;
                    $model->questionId = $value['id'];
                    $model->save();
                    if (($k + 1) % 20 == 0) {
                        $num++;
                        \Yii::$app->session->remove('updateSign');
                        $type = 0;
                    }
                }
                if ($type == 1) {
                    $num++;
                }
            }
        }
    }

    public function getQuestions($where,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select q.*,u.userName from {{%questions}} q LEFT JOIN {{%user}} u on q.inputUser=u.id where $where";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= ' order by q.id desc';
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr,'count'=>$count];
    }

    /**
     * @param $where
     * @param $page
     * @param $pageSize
     * @return array
     * 添加解析选择判断
     * cy
     */
    public function getQuestionsNew($where,$page,$pageSize,$analysis=0){
        if($analysis ==1){//有解析
            $having = ' having pub > 0 ';
        }elseif($analysis ==2){//无解析
            $having = ' having pub < 1 ' ;
        }else{
            $having = '';
        }
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select q.*,u.userName,count(if(uan.publish=1,true,null)) as pub from {{%questions}} q LEFT JOIN {{%user}} u on q.inputUser=u.id LEFT JOIN x2_user_analysis uan on uan.questionId = q.id  where $where group by q.id $having";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= ' order by q.id desc';
        $sql .= $limit;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k => $v){
            $re = UserAnalysis::find()->where("questionId = {$v['id']} and publish = 1")->one();
            if($re){
                $ana = 1;//1-有解析 2-无解析
            }else{
                $ana = 2;
            }
            $data[$k]['analysis'] = $ana;
        }
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr,'count'=>$count];
    }
//    /**
//     * 添加单个题库
//     * @Obelisk
//     */
//    public function addQuestionBank($sectionId,$sourceId,$type)
//    {
//        $source = QuestionSource::find()->asArray()->where(['id' => $sourceId])->one();
//        \Yii::$app->session->remove('updateSign');
//        $data = Questions::find()->asArray()->where(['catId' => $sectionId, 'sourceId' => $sourceId])->all();
//        $num = 0;
//        foreach ($data as $k => $value) {
//            $sign = \Yii::$app->session->get('updateSign');
//            if (!$sign) {
//                $model = new QuestionLibrary();
//                $model->catId = $sectionId;
//                $model->sourceId = $sourceId;
//                $model->name = $source['alias'] . ':test' . ($num + 1);
//                $model->knowId = '';
//                $model->type = $type;
//                $model->save();
//                $libId = $model->primaryKey;
//                \Yii::$app->session->set('updateSign', 1);
//                \Yii::$app->session->set('libId', $libId);
//            }
//            $libId = \Yii::$app->session->get('libId');
//            $model = new LibraryQuestion();
//            $model->libId = $libId;
//            $model->questionId = $value['id'];
//            $model->save();
//            if (($k + 1) % 20 == 0) {
//                $num++;
//                \Yii::$app->session->remove('updateSign');
//            }
//            echo $source['alias'] . ':test' . ($num + 1) ."--(".count($data).")<br>";
//        }
//    }
    /**
     * 修改序号题库
     * @Obelisk
     */
    public function updateKnow()
    {
        $cat = QuestionCat::find()->asArray()->all();
        $know = QuestionKnow::find()->asArray()->all();
        foreach ($cat as $v) {
            \Yii::$app->session->remove('updateSign');
            foreach ($know as $val) {
                    \Yii::$app->session->remove('updateSign');
                    $source = SourceCat::find()->asArray()->where("catId={$v['id']}")->all();
                    foreach($source as $valu){
                            $data = Questions::find()->asArray()->where("catId={$v['id']} AND knowId={$val['id']} AND sourceId={$valu['sourceId']} AND id>8100")->all();
                            $library = QuestionLibrary::find()->asArray()->where(['catId' => $v['id'], 'knowId' => $val['id'],'sourceId' => $valu['sourceId'], 'type' => 2])->all();
                            $num = count($library);
                            $type = 0;
                            foreach ($data as $k => $value) {
                                $type = 1;
                                $sign = \Yii::$app->session->get('updateSign');
                                if (!$sign) {
                                    if (isset($library[$num])) {
                                        $libId = $library[$num]['id'];
                                        LibraryQuestion::deleteAll("libId=$libId");
                                    } else {
                                        $model = new QuestionLibrary();
                                        $model->catId = $v['id'];
                                        $model->sourceId = $valu['sourceId'];
                                        $model->name = $val['name'] . ':test' . ($num + 1);
                                        $model->knowId = $val['id'];
                                        $model->type = 2;
                                        $model->createTime = time();
                                        $model->save();
                                        $libId = $model->primaryKey;
                                    }
                                    \Yii::$app->session->set('updateSign', 1);
                                    \Yii::$app->session->set('libId', $libId);
                                }
                                $libId = \Yii::$app->session->get('libId');
                                $model = new LibraryQuestion();
                                $model->libId = $libId;
                                $model->questionId = $value['id'];
                                $model->save();
                                if (($k + 1) % 10 == 0) {
                                    $num++;
                                    \Yii::$app->session->remove('updateSign');
                                    $type = 0;
                                }
                            }
                            if ($type == 1) {
                                $num++;
                            }
                            foreach ($library as $k => $value) {
                                if ($k >= $num) {
                                    LibraryQuestion::deleteAll("libId={$value['id']}");
                                    QuestionLibrary::deleteAll("id={$value['id']}");
                                }
                            }

                    }
                }
        }
    }
    public function getSection($catId){
        $data = QuestionCat::find()->asArray()->where("id={$catId}")->one();
        return $data['name'];
    }
    /**
     * 获取单项名
     * @Obelisk
     */
    public function getSource($catId){
        $data = QuestionSource::find()->asArray()->where("id={$catId}")->one();
        return $data;
    }
    /**
     * 获取单项名
     * @Obelisk
     */
    public function getLevel($catId){
        $data = QuestionLevel::find()->asArray()->where("id={$catId}")->one();
        return $data;
    }

    /**
     * @param $questionId
     * @param $uid
     * 推送奖励消息
     * by  yanni
     */
    public function pushReward($questionId,$uid){
        $question = Question::find()->asArray()->select(['stem','sourceId','knowId'])->where("id={$questionId}")->one();
        $source = QuestionSource::find()->asArray()->select(['name'])->where("id={$question['sourceId']}")->one()['name'];
        $know = QuestionKnow::find()->asArray()->select(['name'])->where("id={$question['knowId']}")->one()['name'];
        $txt = "亲爱的同学，你对问题“".$know."-".$source."-".$questionId.":".$question['stem']."”提出的bug已通过，赠送你10雷豆，继续努力吧";
        $model = new PushMessage();
        $model->title = "系统消息";
        $model->content = $txt;
        $model->uid = $uid;
        $model->createTime = time();
        $model->pushUser = "后台自动推送";
        $model->source = 1;
        $model->save();
    }

}
