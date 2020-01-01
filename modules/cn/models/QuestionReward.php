<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Method;
class QuestionReward extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%question_reward}}';
    }

}
