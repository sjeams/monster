<?php
namespace app\modules\cn\models;
use app\libs\Method;
//use app\modules\user\models\Content;
use yii\db\ActiveRecord;
use app\libs\GoodsPager;
class UserComment extends ActiveRecord {
    public $cateData;

    public static function tableName(){
        return '{{%user_comment}}';
    }

    //获取内容评论
    public function getUserComment($contentId,$page,$pageSize){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT uc.*,u.userName,u.nickname,u.image,uc.fane as fine from {{%user_comment}} uc LEFT JOIN {{%user}} u on uc.uid=u.uid where uc.contentId=$contentId and uc.type=1";
        $sql .= ' ORDER BY uc.createTime desc';
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        if($data){
            foreach($data as $k => $v){
                if(!$v['fane'])$data[$k]['fane'] = 0;
                $childres = \Yii::$app->db->createCommand("select uc.*,u.nickname,u.image,uc.fane as fine from x2_user_comment uc left join x2_user u on u.uid = uc.uid where uc.pid={$v['contentId']} and uc.type=2 order by uc.id asc ")->queryAll();
                $data[$k]['childres'] = $childres?$childres:null;
            }
        }
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    /**
     * @param $contentId
     * @param $page
     * @param $pageSize
     * @return array
     * app 文章评论（结构统一）
     * by  yanni
     */
    public function appUserComment($contentId,$page,$pageSize){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT uc.*,u.userName,u.nickname,u.image,uc.fane as fine from {{%user_comment}} uc LEFT JOIN {{%user}} u on uc.uid=u.uid where uc.contentId=$contentId and uc.type=1";
        $sql .= ' ORDER BY uc.createTime desc';
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        UserComment::updateAll(['status'=>0],"contentId={$contentId}");
        if($data){
            foreach($data as $k => $v){
                if(!$v['fine'])$data[$k]['fine'] = 0;
                $childres = \Yii::$app->db->createCommand("select uc.*,u.nickname,u.image,uc.fane as fine from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']} and uc.type=2 order by uc.id asc")->queryAll();
                $data[$k]['reply'] = $childres?$childres:null;
            }
        }
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }
    //获取题目讨论
    public function getQuestionComment($questionId,$page,$pageSize){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "SELECT uc.id,uc.questionId,uc.uid,uc.content,uc.createTime,u.userName,u.nickname,u.image,uc.fane,uc.fane as fine from {{%user_comment}} uc LEFT JOIN {{%user}} u on uc.uid=u.uid where uc.questionId=$questionId and uc.type=1";
        $sql .= ' ORDER BY uc.createTime desc';
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=> $v){
            $sql = "SELECT uc.id,uc.pid,uc.questionId,uc.uid,uc.content,uc.createTime,u.userName,u.nickname,u.image,uc.replyName,uc.replyUid,uc.fane as fine from {{%user_comment}} uc LEFT JOIN {{%user}} u on uc.uid=u.uid where uc.questionId=$questionId and uc.type=2 and pid={$v['id']}";
            $sql .= ' ORDER BY uc.createTime desc';
            $reply = \Yii::$app->db->createCommand($sql)->queryAll();
            $data[$k]['reply'] = $reply;
        }
        UserComment::updateAll(['status'=>0],"questionId={$questionId}");
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }


    /**
     * @param $commentId
     * @return array|bool
     * 通过ID  直接获取评论
     * by yanni
     */
    public function getCommentById($commentId){
        $sql = "SELECT uc.*,u.userName,u.nickname,u.image from {{%user_comment}} uc LEFT JOIN {{%user}} u on uc.uid=u.uid where uc.id=$commentId";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        return $data;
    }

    /**
     * @param $page
     * @param $pageSize
     * @param $uid
     * @param $type
     * @return array
     * 个人中心：用户发表的评论
     * by  yanni
     */
    public function getByUidComment($page,$pageSize,$uid,$type){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        if($type==1){   //用户题目评论
            $sql  = "select uc.questionId,uc.content,uc.createTime,u.image as userImage from x2_user_comment as uc LEFT JOIN x2_user as u on uc.uid=u.uid where uc.uid=$uid and uc.questionId!='' and uc.type=1 order by uc.createTime desc $limit";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            foreach($data as $k=>$v){
                $data[$k]['title'] = Question::find()->asArray()->select(['stem'])->where("id={$v['questionId']}")->one()['stem'];
                $data[$k]['createTime'] = Method::gmstrftimeC(date('Y-m-d H:i:s',$v['createTime']));
            }
        } else{    //用户文章评论
            $sql  = "select uc.contentId,uc.content,uc.createTime,u.image as userImage from x2_user_comment as uc LEFT JOIN x2_user as u on uc.uid=u.uid where uc.uid=$uid and uc.contentId!=0 and uc.type=1 order by uc.createTime desc $limit";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            foreach($data as $k=>$v){
                $data[$k]['title'] = Content::find()->asArray()->select(['name'])->where("id={$v['contentId']}")->one()['name'];
                $data[$k]['createTime'] = Method::gmstrftimeC(date('Y-m-d H:i:s',$v['createTime']));
            }
        }
        return $data;
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     * Design: By Ferre
     * 最多讨论题目
     */
    public function mostCommit()
    {
        //limit 20
        $res = \Yii::$app->db->createCommand("select count(u.questionId) as ucid,q.id,q.catId,q.sourceId,q.stem from {{%questions}} as q left join {{%user_comment}} as u on q.id=u.questionId group by q.id order by ucid desc limit 20")->queryAll();
        return $res;
    }

    /**
     * @param $page
     * @param $pageSize
     * @param $uid
     * @param $type
     * @return array
     * 个人中心：回复用户消息
     * by  yanni
     */
    public function getReplyUser($page,$pageSize,$uid,$type){
        $limit = "limit ".($page-1)*$pageSize.",$pageSize";
        if($type ==1){  //题目评论：回复用户的
            $sql  = "select uc.questionId,uc.content,uc.createTime,u.image as userImage,u.nickname as uName from x2_user_comment as uc LEFT JOIN x2_user as u on uc.uid=u.uid where uc.replyUid=$uid and uc.questionId!='' and uc.type=2 order by uc.createTime desc $limit";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            foreach($data as $k=>$v){
                $data[$k]['title'] = Question::find()->asArray()->select(['stem'])->where("id={$v['questionId']}")->one()['stem'];
                $data[$k]['createTime'] = Method::gmstrftimeC(date('Y-m-d H:i:s',$v['createTime']));
            }
            \Yii::$app->db->createCommand("update x2_user_comment set status = 0 where `type`=2 and replyUid = $uid and questionId !=''")->execute();//修改查看状态
        } else{   //文章评论：回复用户的
            $sql  = "select uc.contentId,uc.content,uc.createTime,u.image as userImage,u.nickname as uName from x2_user_comment as uc LEFT JOIN x2_user as u on uc.uid=u.uid where uc.replyUid=$uid and uc.contentId!=0 and uc.type=2 order by uc.createTime desc $limit";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
            foreach($data as $k=>$v){
                $data[$k]['title'] = Content::find()->asArray()->select(['name'])->where("id={$v['contentId']}")->one()['name'];
                $data[$k]['createTime'] = Method::gmstrftimeC(date('Y-m-d H:i:s',$v['createTime']));
            }
            \Yii::$app->db->createCommand("update x2_user_comment set status = 0 where `type`=2 and replyUid = $uid and contentId !=0")->execute();//修改查看状态
        }
        return $data;
    }
}
