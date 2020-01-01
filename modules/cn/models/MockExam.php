<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\cn\models;

use yii\db\ActiveRecord;
use Yii;

class MockExam extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%mock_exam}}';
    }

    /**
     * 遍历读取模考分类题目信息
     * cy
     * access 1-Magoosh  2-精选
     */
    public function getMockData($type,$access){
        $typeIds = [1,2,3];//1-语文 2-数学 3-全套
        foreach($typeIds as $k => $typeId){
            if($type == $typeId){
                $data = $this::find()->where("type = $type and sourceId = $access")->asArray()->all();
            }else{
                $data = $this::find()->where("type = $typeId and sourceId = 2")->asArray()->all();
            }
            $mocks[$k] = $data;
        }
        return $mocks;
    }
    /**
     * 最新学员模考结果信息
     * cy
     */
    public function getMockResult(){
        $typeIds = [3,1,2];//1-语文 2-书序 3-全套
        foreach($typeIds as $k =>$v){
            $data = \Yii::$app->db->createCommand("select * from x2_user_mock_result where type = $v and status = 1 order by score desc limit 0,9")->queryAll();
            foreach($data as $key => $value){
                $mockExamId = $value['mockExamId'];
                $uid = $value['uid'];
                $data[$key]['userName'] = User::find()->where("uid = $uid")->asArray()->one()['nickname'];
                $data[$key]['mockExam'] = \Yii::$app->db->createCommand("select name from x2_mock_exam where id = $mockExamId")->queryOne()['name'];
            }
            $datas[]= $data;
        }
        return $datas;
    }
    /**
     * 学员是否做过该套题
     */
    public function getDoResult($uid,$mockExamId){
        $sql = " select * from x2_user_mock_result where uid = $uid and mockExamId = $mockExamId ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        if($result){
            $status = $result['status'];
            if($status == 1){
                return 2;//完成
            }else{
                return 1;//中断
            }
        }else{
            return 0;//未做
        }
    }
    /**
     * 获取默认模考初始化的题目id
     * cy
     */
    public function getFirstTest($mockExamId,$sectionId = null){
        if(is_null($sectionId)){
            $sql = "select id from x2_section where mockExamId = $mockExamId order by id asc";
            $sectionId = \Yii::$app->db->createCommand($sql)->queryOne()['id'];
        }
        $sq = "select questionId from x2_section_question where sectionId = $sectionId order by id asc";
        $questionId = \Yii::$app->db->createCommand($sq)->queryOne()['questionId'];
        return [$sectionId,$questionId];
    }
    /**
     * 获取当前section题型 1-语文 2-数学
     * cy
     */
    public function getType($mockExamId,$sectionId){
        $result = $this::find()->where("id = $mockExamId")->one();
        if($result->type == 3){//全套
            $sql = " select * from x2_section where id = $sectionId ";
            $data = Yii::$app->db->createCommand($sql)->queryOne();
            return $data['type'];
        }else{
            return $result->type;
        }
    }
    /**
     * 获取当前mockExam名称
     * cy
     */
    public function getName($mockExamId){
        $mock = $this::find()->where("id = $mockExamId")->one();
        return $mock->name;
    }
    /**
     * 由sectionId获取mockExamId
     * cy
     */
    public function getMockExamId($sectionId){
        $sql = "select mockExamId from x2_section where id = $sectionId";
        $mock = Yii::$app->db->createCommand($sql)->queryOne()['mockExamId'];
        return $mock;
    }
    /**
     * 判断当前section是不是最后一个
     * cy
     */
    public function isEnd($sectionId,$mockExamId){
        $sql = "select * from x2_section where mockExamId = $mockExamId order by id desc";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        if($data['id'] == $sectionId){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 获取下一个section及第一道题目信息
     * cy
     */
    public function getSectionMsg($sectionId,$mockExamId){
        $sql = "select * from x2_section where mockExamId = $mockExamId and id > $sectionId order by id asc";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        $nextId = $result['id'];
        $sq = " select * from x2_section_question where sectionId = $nextId order by id asc";
        $questionId = Yii::$app->db->createCommand($sq)->queryOne()['questionId'];
        return ['sectionId'=>$nextId,'questionId'=>$questionId];
    }
    /**
     * 获取当前mock下的section信息
     * cy
     */
    public function getSections($mockExamId){
        $sql = "select * from x2_section where mockExamId = $mockExamId";
//        if($type != 3 ){
//        }else{
//            $data = MockResult::find()->where("uid = $uid and mockExamId = $mockExamId")->one();
//            $correctMsg = unserialize($data->correctMsg);
//            $deleteId = $correctMsg['delete_sectionId'];
//            $sql = "select * from x2_section where mockExamId = $mockExamId and id != $deleteId";
//        }
        $sections = Yii::$app->db->createCommand($sql)->queryAll();
        return $sections;
    }
    /**
     * 获取当前section内的题目相关信息
     * cy
     */
    public function getSectionTimu($sectionId,$access = null){
        $uid = Yii::$app->session->get("uid");
        if($access == null || $access == 0){//当前section下的所有题
            $sql = "select * from x2_section_question where sectionId = $sectionId order by id asc";
        }elseif($access == 11){//已做的题
            $sql =" select * from x2_user_mock_record um  left join x2_section_question sq on sq.questionId = um.questionId where um.uid = $uid  and um.sectionId = $sectionId and sq.sectionId = $sectionId order by sq.id asc";
        }else{
            if($access == 1){//错题
                $sql =" select * from x2_user_mock_record um  left join x2_section_question sq on sq.questionId = um.questionId where um.uid = $uid  and um.sectionId = $sectionId and sq.sectionId = $sectionId and um.correct = 0 order by sq.id asc";
            }else{//耗时较长的题
                $sql =" select * from x2_user_mock_record um  left join x2_section_question sq on sq.questionId = um.questionId where um.uid = $uid  and um.sectionId = $sectionId and sq.sectionId = $sectionId and um.useTime > 90 order by sq.id asc";
            }
        }
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $uid = Yii::$app->session->get("uid");
        foreach($data as $key => $value){
            $id = $value['questionId'];
            $mockExamId = $this->getMockExamId($sectionId);
            $mockRecord = new MockRecord();
            $mark = $mockRecord->isMark($uid,$sectionId,$mockExamId,$id);
            $sql = "select * from x2_user_mock_record where uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId and questionId = $id ";
            $answer = Yii::$app->db->createCommand($sql)->queryOne();
            $data[$key]['mark'] = $mark;
            $data[$key]['status'] = $answer['do']?$answer['do']:0; //1-已做 -1未完 0 -未做
            $data[$key]['site'] = $key+1;
            $data[$key]['id'] = intval($data[$key]['id']);
            $data[$key]['questionId'] = intval($data[$key]['questionId']);
        }
        return $data;
    }
    /**
     * 模考的平均得分
     * cy
     */
    public function getAverage($mockExamId){
        $totalSocre = Yii::$app->db->createCommand("select sum(score) as total from x2_user_mock_result where mockExamId = $mockExamId and status = 1")->queryOne()['total'];
        $peoples = Yii::$app->db->createCommand("select count(id) peoples from x2_user_mock_result where mockExamId = $mockExamId and status = 1")->queryOne()['peoples'];
        if($peoples == 0){
            $average = 0;
        }else{
            $average = ceil($totalSocre/$peoples);
        }
        return $average;
    }
    /**
     * 获取当前section最后一道题目信息
     * cy
     */
    public function getLastTopic($mockExamId,$sectionId,$uid){
        $sql = "select * from x2_section_question where  sectionId = $sectionId order by id desc";
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        $hastime = MockResult::find()->where("uid = $uid and sectionId = $sectionId and mockExamId = $mockExamId")->asArray()->one()['hasTime'];
        $questionId = $data['questionId'];
        return ['questionId'=>$questionId,'hastime'=>$hastime];
    }
    /**
     * 题目收藏
     * cy
     *
     */
    public function getCollecte($uid,$questionId){
        $sql = "select * from x2_question_collection where questionId = $questionId and uid = $uid";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * 获取字符串中的数字
     * @param string $str
     * @return string
     */
    function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(is_numeric($str[$i])){
                $result.=$str[$i];
            }
        }
        return $result;
    }
    /**
     * 去掉字符串前后的字符
     * cy
     * $120 => 120    12/14 percent => 12/14
     */
    public function strToNum($str = ''){
        $str = trim($str);
        if(empty($str)) return '';
        //头部字符
        $char = substr($str,0,1);
        if(!is_numeric($char)){
            $str = substr($str,1);
            $str = $this->strToNum($str);
        }
        //尾部字符
        $char_end = substr($str,-1,1);
        if(!is_numeric($char_end)){
            $str = substr($str,0,strlen($str)-1);
            $str = $this->strToNum($str);
        }
        return $str;
    }

}