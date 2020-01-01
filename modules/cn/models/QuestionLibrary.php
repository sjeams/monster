<?php
namespace app\modules\cn\models;
use app\modules\question\models\LibraryQuestion;
use app\modules\question\models\Questions;
use yii\db\ActiveRecord;
class QuestionLibrary extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_library}}';
    }


    /**
     * @param $cateid
     * @param $level
     * @throws \yii\db\Exception
     * By Ferre
     * 题库新增
     */
    public function libInsert($cateid, $name, $level)
    {
        $name = '\''.$name.'\'';
        $sql = "insert into x2_question_library(catId,name,level) values($cateid,$name,$level)";
//        \Yii::$app->db->createCommand()->insert('x2_question_library'. ['catId' => $cateid, 'name' => $name, 'level' => $level])->execute(); //难度等级的题目数据
        $re_num = \Yii::$app->db->createCommand($sql)->query(); //难度等级的题目数据
        $id_value = \Yii::$app->db->getLastInsertID();
        return $id_value;
    }

    /**
     * @param $lib_data
     * By Ferre
     * 关联表新增
     */
    public function libQuestionInsert($lib_data)
    {
        \Yii::$app->db->createCommand()->batchInsert('x2_library_question', ['libId', 'questionId'], $lib_data)->execute();
    }
    /**
     * 获取题库数据
     * 题库数 题库题目数 平均做题数
     * cy
     */
    public static function getLibraryData(){
//        $library = self::find()->count();
        $library = Questions::find()->count();
//        $libraryQues = LibraryQuestion::find()->groupBy("questionId")->count();
        $libraryQues = UserAnswer::find()->count();
        //平均每天做题人数
        $userDo = UserAnswer::find()->count();
        $dayDo = \Yii::$app->cache->get('dayDo');
        if(!$dayDo){
            $dayDo = \Yii::$app->db->createCommand("select count(*) as cou from (select id from x2_user_answer group by from_unixtime(createTime,'%Y-%m-%d')) as ua")->queryOne()['cou'];
            \Yii::$app->cache->set('dayDo',$dayDo,7200);
        }
        $averUser = floor($userDo/$dayDo);
        $data = ['library'=>$library,'libraryQues'=>$libraryQues,'averUser'=>$averUser,'userDo'=>$userDo,'dayDo'=>$dayDo];
        return $data;
    }
}
