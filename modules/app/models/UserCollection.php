<?php
namespace app\modules\app\models;
use yii\db\ActiveRecord;
class UserCollection extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%question_collection}}';
    }
    /**
     * 获取用户文章收藏信息
     * 文章相关信息
     * cy
     */
    public static function getUserCollectContent($uid,$limit){
        $sql = "select c.id,c.title,c.image,u.nickname as userName,from_unixtime(qc.createTime,'%m-%d %H-%i') as createTime,c.viewCount from x2_question_collection qc inner join x2_content c on c.id = qc.contentId inner join x2_user u on u.id = c.userId where qc.uid = $uid order by qc.id desc $limit";
        $contents = \Yii::$app->db->createCommand($sql)->queryAll();
        return $contents;
    }
}