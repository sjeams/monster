<?php 
namespace app\modules\cn\models;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\QuestionSource;
use yii\db\ActiveRecord;
use app\libs\Method;
use app\libs\Pager;
class Question extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%questions}}';
    }

    public function getQuestions($where,$type,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $uid = \Yii::$app->session->get('uid');
        if($type==1){
            if($uid){
                $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.id,q.answer as qanswer,q.stem from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where and ua.uid={$uid} order by q.catId asc";
            } else {
                die('<script>alert("请登录");history.go(-1);</script>');
            }
        } elseif($type==2){
            if($uid){
                $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.id,q.answer as qanswer,q.stem from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where and ua.uid={$uid} and ua.correct=1 order by q.catId asc";
            } else {
                die('<script>alert("请登录");history.go(-1);</script>');
            }
        } elseif($type==3){
            if($uid){
                $sql = "SELECT ua.*,q.details,q.catId,q.sourceId,q.id,q.answer as qanswer,q.stem from {{%user_answer}} ua left join {{%questions}} q on ua.questionId=q.id where $where and ua.uid={$uid} and ua.correct=2 order by q.catId asc";
            } else{
                die('<script>alert("请登录");history.go(-1);</script>');
            }
        } else {
            $sql = "select * from {{%questions}} as q where $where order by q.catId asc";
        }
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $limit;
//        echo $sql;die;
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        $total = ceil($count/$pageSize);
        return ['data'=>$data,'pageStr'=>$pageStr,'total'=>$total];
    }
    /**
     * gre  做题
     * 题目详情数据处理
     * yanni
     */
    public function questionText($question,$uid,$libId){
        //备选项转换成数组
        if($question['optionA']){
            $question['optionsA'] = Method::getTextHtmlArr($question['optionA']);
        }
        if($question['optionB']){
            $question['optionsB'] = Method::getTextHtmlArr($question['optionB']);
        }
        if($question['optionC']){
            $question['optionsC'] = Method::getTextHtmlArr($question['optionC']);
        }
        $question['answer'] = trim($question['answer']);
        $typeId = $question['typeId'];
        //1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提
        if($typeId == 5 || $typeId == 6 || $typeId == 7){
            $question['details'] = Method::getTextHtmlArr($question['details'])[0];
            $article = Method::getTextHtmlArr($question['readArticle'])[0];
            if($typeId != 7){
                $question['readArticle'] = $article;
            }else{
                $question['readArticle'] = rtrim(strip_tags($question['readArticle']),".");
                $question['readArticle'] = explode(".",$question['readArticle']);
            }
        }
        $question['details'] = str_replace('src="/','src="https://gre.viplgw.cn/',$question['details']);
        $pModel = new UserAnalysis();
        $question['analysis'] = $pModel->getPublishUser($question['id']);
        $question['commentCount'] = UserComment::find()->asArray()->where("questionId={$question['id']}")->count();
        if($uid){
            if($libId){
                $user_answer = UserAnswer::find()->asArray()->where("questionId={$question['id']} and uid={$uid} and libId={$libId} and answerType=1")->one();
            } else{
                $user_answer = UserAnswer::find()->asArray()->where("questionId={$question['id']} and uid={$uid} and answerType=1")->one();
            }
            $question['user_answer'] = isset($user_answer['answer'])?trim($user_answer['answer']):'';
            $question['note'] = UserNote::find()->asArray()->where("uid={$uid} and questionId={$question['id']}")->all();
        }
        return ['question'=>$question,'type'=>$typeId];
    }
    /**
     * 获取用户题目收藏数据
     * cy
     */
    public function getCollectQuestion($where,$limit){
        $sql = "select qc.questionId from x2_question_collection qc inner join x2_questions q on qc.questionId = q.id  $where ";
        $totalPage = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql = "select qc.questionId,qt.name as sectionName,qs.name as sourceName,q.catId,q.sourceId,q.levelId,q.details,qc.createTime,q.stem from x2_question_collection qc inner join x2_questions q on qc.questionId = q.id inner join x2_question_cat qt on qt.id = q.catId inner join x2_question_source qs on qs.id = q.sourceId $where order by qc.id desc  $limit";
        $questions = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($questions as $k => $t){
            $questionId = $t['questionId'];
            $total = UserAnswer::find()->select("id")->where("questionId = $questionId")->count();//做题人数
            $times = UserAnswer::find()->select("count(useTime) as times")->where("questionId = $questionId")->asArray()->one()['times'];//做题时间
//            $createTime = date("m-d H:i",$t['createTime']);//收藏时间
//            $questions[$k]['createTime'] = $createTime;
            if($total == 0 || $times ==0){
                $averTime = 0;
            }else{
                $averTime = floor($times/$total);//平均用时
            }
            $questions[$k]['useTime'] = $averTime;
            $questions[$k]['doNum'] = $total;//做题人数
        }
        return ['questions'=>$questions,'totalPage'=>$totalPage];
    }
    /**
     * 获取用户笔记信息、
     * cy
     */
    public static function getUserNotes($uid,$cat,$limit){
        if($cat > 0){
            $where = " where un.uid = $uid and q.catId = $cat";
        }else{
            $where = " where un.uid = $uid";
        }
        $sql =" select un.questionId,qt.name as catName,qs.name as sourceName,from_unixtime(un.createTime,'%m-%d %H-%i') as createTime,q.details,q.stem,un.noteContent from x2_user_note un inner join x2_questions q on un.questionId = q.id inner join x2_question_cat qt on qt.id = q.catId inner join x2_question_source qs on qs.id = sourceId $where order by un.id desc $limit";
        $questions = \Yii::$app->db->createCommand($sql)->queryAll();
        return $questions;
    }

    /**
     * @param $uid
     * @return mixed
     * 今日做题数量
     * by  yanni
     */
    public function getDayQuestion($uid){
        $dayTime = date("Y-m-d",time());
        $sql = " select COUNT(id) as dayNum from x2_user_answer where from_unixtime(createTime, '%Y-%m-%d')='$dayTime' and uid=$uid";
        $dayNum = \Yii::$app->db->createCommand($sql)->queryOne()['dayNum'];
        return $dayNum;
    }
    /**
     * 获取问题集合
     * 1长文章（4道题目以上）+1中文章（3题）+1短文章（2题）+1 逻辑单题
     * cy
     * 1-单项 2-考点 3-难度
     */
    public static function getQuestionArticleData($type){
        //获取当前类型的阅读题库数据
        if($type ==3){
            $levels = QuestionNewLevel::find()->where('catId = 2')->orderBy("id desc")->asArray()->all();
            foreach($levels as $k => $v){
                $levelId = $v['id'];
                //长文章
                $long = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,newLevel,sourceId,knowId')->where("catId =2 and newLevel = $levelId")->asArray()->groupBy("readArticle")->having('total > 3')->orderBy(" id asc")->all();
                //中文章
                $middle = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,newLevel,sourceId,knowId')->where("catId =2 and newLevel = $levelId")->asArray()->groupBy("readArticle")->having('total = 3')->orderBy(" id asc")->all();
                //中文章
                $short = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,newLevel,sourceId,knowId')->where("catId =2 and newLevel = $levelId")->asArray()->groupBy("readArticle")->having('total = 2')->orderBy(" id asc")->all();
                //逻辑单题
                $one = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,newLevel,sourceId,knowId')->where("catId =2 and newLevel = $levelId")->asArray()->groupBy("readArticle")->having('total = 1')->orderBy(" id asc")->all();
                $levels[$k]['long'] = $long;
                $levels[$k]['middle'] = $middle;
                $levels[$k]['short'] = $short;
                $levels[$k]['one'] = $one;
                $levels[$k]['insertSite'] = 0;//记录当前等级插入的位置
            }
            $libraryData = QuestionLibrary::find()->where("catId = 2 and level > 0 ")->orderBy('level desc')->asArray()->all();
            foreach($libraryData as $r => $t){
                $libId = $t['id'];
                foreach($levels as $o => $p){
                    if($t['level'] == $p['id']){
                        $site = $p['insertSite'];
                        if(isset($p['long'][$site]) && isset($p['middle'][$site]) && isset($p['short'][$site]) && isset($p['one'][$site])){
                            $questionIds = $p['long'][$site]['quesStr'].','.$p['middle'][$site]['quesStr'].','.$p['short'][$site]['quesStr'].','.$p['one'][$site]['quesStr'];
                            $ids = explode(',',$questionIds);
                            //删除老题库数据
                            LibraryQuestion::deleteAll("libId = $libId");
                            foreach($ids as $key => $val){
                                $model = new LibraryQuestion();
                                $model->libId = $libId;
                                $model->questionId = $val;
                                $model->save();
                            }
                            $site++;
                            $levels[$o]['insertSite'] = $site;
                        }else{
                            $data = ['code'=>0,'message'=>'更新'.$t['name'].'(难度题库-'.$p['name'].')：题库截止，内容不够（题库id：'.$libId.'）'];
                            return $data;
                        }
                    }
                }
            }
            $data = ['code'=>1,'message'=>"难度题库：更新成功"];
        }elseif($type ==2){//type  1-单项  2-考点
            //知识点数据
            $know = QuestionKnow::find()->where('catId = 2')->asArray()->orderBy('id asc')->all();
            //来源获取
            $source = \Yii::$app->db->createCommand("select qs.* from x2_source_cat sc inner join x2_question_source qs on qs.id = sc.sourceId where sc.catId =2 order by qs.sort desc ")->queryAll();
            $data = [];
            foreach($know as $k => $v){
                $know[$k]['source'] = $source;
                //获取知识点下不同来源的文章数据
                $knowId = $v['id'];
                foreach($source as $key => $val){
                    $site = 0;
                    $sourceId = $val['id'];
                    //长文章
                    $long = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId and knowId = $knowId")->asArray()->groupBy("readArticle")->having('total > 3')->orderBy(" id asc")->all();
                    //中文章
                    $middle = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId and knowId = $knowId")->asArray()->groupBy("readArticle")->having('total = 3')->orderBy(" id asc")->all();
                    //短文章
                    $short = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId and knowId = $knowId")->asArray()->groupBy("readArticle")->having('total = 2')->orderBy(" id asc")->all();
                    //逻辑单题
                    $one = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId and knowId = $knowId")->asArray()->groupBy("readArticle")->having('total = 1')->orderBy(" id asc")->all();
                    $article['long'] = $long;
                    $article['middle'] = $middle;
                    $article['short'] = $short;
                    $article['one'] = $one;
                    $libraryData = QuestionLibrary::find()->where("catId = 2 and type = 2 and knowId = $knowId and sourceId = $sourceId ")->orderBy("id asc")->asArray()->all();
                    foreach($libraryData as $r => $w){
                        $libId = $w['id'];
                        if(isset($article['long'][$site]) && isset($article['middle'][$site]) && isset($article['short'][$site]) && isset($article['one'][$site])){
                            $questionIds = $article['long'][$site]['quesStr'].','.$article['middle'][$site]['quesStr'].','.$article['short'][$site]['quesStr'].','.$article['one'][$site]['quesStr'];
                            $ids = explode(',',$questionIds);
                            //删除老题库数据
                            LibraryQuestion::deleteAll("libId = $libId");
                            foreach($ids as $ke => $va){
                                $model = new LibraryQuestion();
                                $model->libId = $libId;
                                $model->questionId = $va;
                                $model->save();
                            }
                            $site++;
                        }else{
                            $data[] = ['知识点'=>$v['name'],'来源'=>$val['name'],'message'=>'原题库数量：'.count($libraryData).',新生成题库数量：'.$site.',长文章：'.count($article['long']).',中文章：'.count($article['middle']).',短文章：'.count($article['short']).',一道题文章'.count($article['one'])];
                            break;
                        }
                    }
                }
            }
        }elseif($type ==1){
            //来源获取
            $data = [];
            $source = \Yii::$app->db->createCommand("select qs.* from x2_source_cat sc inner join x2_question_source qs on qs.id = sc.sourceId where sc.catId =2 order by qs.sort desc ")->queryAll();
            foreach($source as $k => $v){
                $sourceId = $v['id'];
                //长文章
                $long = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId")->asArray()->groupBy("readArticle")->having('total > 3')->orderBy(" id asc")->all();
                //中文章
                $middle = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId")->asArray()->groupBy("readArticle")->having('total = 3')->orderBy(" id asc")->all();
                //短文章
                $short = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId")->asArray()->groupBy("readArticle")->having('total = 2')->orderBy(" id asc")->all();
                //逻辑单题
                $one = Question::find()->select('id,group_concat(id) as quesStr,count(id) as total,catId,sourceId,knowId')->where("catId =2 and sourceId = $sourceId")->asArray()->groupBy("readArticle")->having('total = 1')->orderBy(" id asc")->all();
                $article['long'] = $long;
                $article['middle'] = $middle;
                $article['short'] = $short;
                $article['one'] = $one;
                $libraryData = QuestionLibrary::find()->where("catId = 2 and type = 1 and sourceId = $sourceId")->orderBy('id asc')->asArray()->all();
                $site = 0;
                foreach($libraryData as $r => $t){
                    $libId = $t['id'];
                    if(isset($article['long'][$site]) && isset($article['middle'][$site]) && isset($article['short'][$site]) && isset($article['one'][$site])){
                        $questionIds = $article['long'][$site]['quesStr'].','.$article['middle'][$site]['quesStr'].','.$article['short'][$site]['quesStr'].','.$article['one'][$site]['quesStr'];
                        $ids = explode(',',$questionIds);
                        //删除老题库数据
                        LibraryQuestion::deleteAll("libId = $libId");
                        foreach($ids as $key => $va){
                            $model = new LibraryQuestion();
                            $model->libId = $libId;
                            $model->questionId = $va;
                            $model->save();
                        }
                        $site++;
                    }else{
                        $data[] = ['来源'=>$v['name'],'message'=>'原题库数量：'.count($libraryData).',新生成题库数量：'.$site.',长文章：'.count($article['long']).',中文章：'.count($article['middle']).',短文章：'.count($article['short']).',一道题文章'.count($article['one'])];
                        break;
                    }
                }
//                $data = ['code'=>1,'message'=>'单项题库：更新成功'];
            }
        }else{
            $data = ['code'=>0,'message'=>"没有对应的题库更新"];
        }
        return  $data;
    }
}
