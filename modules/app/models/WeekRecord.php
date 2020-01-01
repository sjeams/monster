<?php
namespace app\modules\app\models;
use yii\db\ActiveRecord;
use yii;
use app\libs\GoodsPager;
use app\libs\Pager;
class WeekRecord extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%week_record}}';
    }

    /**
     * 周报处理
     * sjeam
     */ 
     public function handleWeekMsg($userId,$uid)
     {
         $my_bean = Yii::$app->db->createCommand("select integral from db_ucenter.uc_members where uid=$uid")->queryOne();   //总雷豆
         $time    = time();
         if (date('w') == 0){    //周末 解决周末week=0的bug
             $now_week = mktime(0,0,0,date('m'),date('d')-6,date('y'));  //这周一
             $last_week = mktime(0,0,0,date('m'),date('d')-13,date('Y'));    //上周一
         }else{  //周一到周六
             $now_week = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('y'));
             $last_week = mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
         }
         $week_record = Yii::$app->db->createCommand("select * from x2_week_record where uid=$uid")->queryOne(); //我的周报
         if (empty($week_record)){   //新增周报-初始数据 Tip:每人只有一份周报,每次在该基础上更新
             $res = Yii::$app->db->createCommand("insert into x2_week_record(`uid`,`questionNum`,`beanNum`,`mybean`,`createTime`,`updateTime`) value($uid,0,0,{$my_bean['integral']},$time,$time)")->execute();
         }
         $week_record_new = Yii::$app->db->createCommand("select * from x2_week_record where uid=$uid")->queryOne(); //我的周报 新      
         if(!empty($week_record) && $week_record['updateTime'] > $last_week && $week_record['updateTime'] < $now_week){  //更新时间>上周一 <本周一
             WeekRecord::saveWeekRecord($uid, $last_week,$now_week,$my_bean,$time,$week_record,$userId,1);
         }elseif (!empty($week_record_new) && $week_record_new['createTime'] == $week_record_new['updateTime']){
             //题库数据生成 雷豆表数据$last_week
             $last_question =   Yii::$app->db->createCommand("select id from x2_user_answer where uid=$uid and createTime>=$last_week")->queryAll();
             if (empty($last_question)) return;  //无答题
             WeekRecord::saveWeekRecord($uid, $last_week,$now_week,$my_bean,$time,$week_record,$userId,0);
         }
     }
 
    /**
      * 新增信息
      * sjeam
      */
     public function saveWeekRecord($uid, $last_week,$now_week,$my_bean,$time,$week_record,$userId,$sign)
     {
        // 获取用户中心 gre做题 数
         $bean_record =  Yii::$app->db->createCommand("select * from db_ucenter.uc_integral where uid=$uid and createTime>$last_week and createTime<$now_week and type=1 and behavior='GRE做题'")->queryAll();   //上周/做题数 & 总体获得雷豆数量
         $questionNum = $beanNum = 0;
         foreach ($bean_record as $k => $v){
             $questionNum = 1 + $questionNum;
             $beanNum     = $v['integral'] + $beanNum;
         }
         $res = Yii::$app->db->createCommand("UPDATE `x2_week_record` SET `questionNum`=$questionNum, `beanNum`=$beanNum, `mybean`={$my_bean['integral']}, `updateTime`=$time WHERE (`uid`=$uid)")->execute(); //更新周报
         $message_content = '\''.'报告主人！您上周的<span class="msg_blue">【刷题战报】<\/span> 已生成，请查阅~<button class="msg_lookUp" onclick="lookUp('.$week_record['id'].')">立即查阅<\/button>'.'\'';
         $old_message = Yii::$app->db->createCommand("select * from x2_push_message where uid=$uid and source=4")->queryOne();
         if ($sign == 1 || ($sign == 0 && empty($old_message))){
             $res = Yii::$app->db->createCommand("insert into x2_push_message(`title`,`source`,`content`,`uid`,`status`,`createTime`,`pushUser`) value('系统消息',4,$message_content,$uid,0,$time,'后台自动推送')")->execute();
         }
     }
}
