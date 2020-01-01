<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 11:55
 */
namespace app\modules\cn\models;

use yii\db\ActiveRecord;

class TeacherContent extends ActiveRecord{
    public $cateData;

    public static function tableName(){
        return '{{%teacher_content}}';
    }

    /**
     * @param $contentid
     * 获取文章打赏人数
     */
    public function getReward($contentid){
        $sql = "SELECT count(id) as reward FROM x2_teacher_article_integral WHERE contentId = $contentid";
        $reward = \Yii::$app->db->createCommand($sql)->queryOne();
        return $reward['reward'];
    }
}