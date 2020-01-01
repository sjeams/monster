<?php
namespace app\modules\question\models;
use yii\db\ActiveRecord;
use app\libs\GoodsPager;
use app\modules\cn\models\QuestionsStatistics;
class QuestionLibrary extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_library}}';
    }

    //获取题库
    public function  getQuestionLibrary($where,$page,$pageSize=10){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select * from {{%question_library}} where $where";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    //获取类型题库所有题
    public function getLibraryQue($sectionId,$sourceId){
        $sql = "select lq.*,ql.name from {{%library_question}} as lq LEFT JOIN {{%question_library}} as ql on lq.libId=ql.id where ql.catId=".$sectionId." GROUP BY lq.questionId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $str = '';
        foreach($data as $v){
            $str .= $v['questionId'].',';
        }
        return rtrim($str,',');
    }

    public function getLibraryQuestions($libId){
        $sql = "select lq.id,lq.questionId,q.stem,q.createTime,q.inputUser from {{%library_question}} as lq LEFT JOIN {{%questions}} as q on lq.questionId=q.id where lq.libId=".$libId ." order by lq.id asc";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    /**
     * @param $libId
     * @return int|mixed|string
     * by yanni 题库题目数量
     */
    public function getLibraryQuestionNum($libId){
        $cache = \Yii::$app->cache->get('getLibraryQuestionNum'.$libId);   //获取缓存
        if($cache){
            $data = $cache;
        } else {
            $data =  LibraryQuestion::find()->asArray()->where("libId={$libId}")->count();   //所有题目
            \Yii::$app->cache->set('getLibraryQuestionNum'.$libId, $data, 3600);//缓存一天
        }
        return $data;
    }

    /**
     * @param $libId
     * @return int|mixed|string
     * by yanni 题库做题总人数
     */
    public function getLibraryDoQuestionTotalUser($libId){
        $cache = \Yii::$app->cache->get('getLibraryDoQuestionTotalUser'.$libId);   //获取缓存
        if($cache){
            $data = $cache;
        } else {
            $data = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$libId}")->groupBy("uid")->count();   //做题人数
            \Yii::$app->cache->set('getLibraryDoQuestionTotalUser'.$libId, $data, 3600*24);//缓存一天
        }
        return $data;
    }

    /**
     * @param $libId
     * @return int|mixed|string
     * by yanni 题库完成总人数
     */
    public function getLibraryCompleteTotalUser($libId){
        $cache = \Yii::$app->cache->get('getLibraryCompleteTotalUser'.$libId);   //获取缓存
        if($cache){
            $data = $cache;
        } else {
            $data = QuestionsStatistics::find()->select("id")->asArray()->where("libraryId={$libId} and state=1")->groupBy("uid")->count();   //题库完成人数
            \Yii::$app->cache->set('getLibraryCompleteTotalUser'.$libId, $data, 3600*24);//缓存一天
        }
        return $data;
    }

    public function getAllSectionLibrary($where){
        $sql = "select ql.id,ql.name,ql.createTime,qc.name as cName,qs.name as sName,qk.name as kName from x2_question_library as ql LEFT JOIN x2_question_cat as qc on ql.catId=qc.id LEFT JOIN x2_question_source as qs on ql.sourceId=qs.id LEFT JOIN x2_question_know as qk on ql.knowId=qk.id where $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
