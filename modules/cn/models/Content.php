<?php 
namespace app\modules\cn\models;
use app\modules\cn\models\UserDiscuss;
use app\modules\content\models\CategoryContent;
use app\modules\content\models\ContentExtend;
use app\modules\content\models\ExtendData;
use app\modules\user\models\UserSpeed;
use yii\db\ActiveRecord;
use app\libs\GoodsPager;
use app\libs\Pager;
use yii;
class Content extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%content}}';
    }
    public static function getBook($catId,$category='',$type='',$order='',$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "Select c.*,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as buyNum,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7611fcaa334c360593cb15bfdd72dc70') as answer,(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='61f13913003193ea19e7e1271bca2752') as originalPrice FROM {{%content}} c WHERE c.catId=$catId AND pid =0 ";
        if($category){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($category))  ";
        }
        if($type){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($type))  ";
        }
        $sql .= $order;
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    /**
     * toefl调用内容
     * @param $select 包含where条件，查询字段，分页，排序
     * @return array
     * @Obelisk
     */
    public static function getClass($select){
        $where = "1=1";
        $where .= isset($select['where'])?" AND ".$select['where']:'';
        $seField = "";
        $fields = isset($select['fields'])?$select['fields']:'';
        //原价
        if(strstr($fields,'originalPrice')){
            $seField .= ",(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='61f13913003193ea19e7e1271bca2752') as originalPrice";
        }
        //vip总监
        if(strstr($fields,'vip')){
            $seField .= ",(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='63948cf4e1234694cfa02048a77ad754') as vip";
        }
        //总监老师
        if(strstr($fields,'majordomo')){
            $seField .= ",(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='ab6df6ee04cfccc7f6ff9aadf0f46a8d') as majordomo";
        }
        //A级培训师
        if(strstr($fields,'A')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='3aa42936f977b9ef0b1717c646c5f91c') as A";
        }
        //描述
        if(strstr($fields,'description')){
            $seField .= ",(SELECT  CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='32cc8e6f27caf3fdf26e8cfd4e7b4433') as description";
        }
        //培训师
        if(strstr($fields,'trainer')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='784b0cdb89d960e484f35f8872b7b7ea') as trainer";

        }
        //课程时长
        if(strstr($fields,'duration')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='c8cc4bd99d4fcfcdfd5673bd635b5bcd') as duration";
        }
        //连接地址
        if(strstr($fields,'url')){
            $seField .= ",(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='43f8278a38a3539a7cfcdff67e5af92c') as url";
        }
        //开课日期
        if(strstr($fields,'commencement')){
            $seField .= ",(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='90f1d6d0fea6f171e8b82d9cbefee283') as commencement";
        }
        //性价比
        if(strstr($fields,'performance')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='32cc8e6f27caf3fdf26e8cfd4e7b44f9') as performance";
        }
        //主讲课程
        if(strstr($fields,'speak')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as speak";
        }
        //价格
        if(strstr($fields,'price')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price";
        }
        //关键词
        if(strstr($fields,'keywords')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7746eb2f665116392b0cc1223d1844e3') as keywords";
        }
        //答案
        if(strstr($fields,'answer')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7611fcaa334c360593cb15bfdd72dc70') as answer";
        }
        //备选项
        if(strstr($fields,'alternatives')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as alternatives";
        }
//文章
        if(strstr($fields,'article')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='b34abe997968ee9a0852814db839f75e') as article";
        }
        //听力文件
        if(strstr($fields,'listeningFile')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='99b3cc02b18ec45447bd9fd59f1cd655') as listeningFile";
        }
        //中午名称
        if(strstr($fields,'cnName')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='6d67cf3eba969f1515df48f6f43e740d') as cnName";
        }
        //句子编号
        if(strstr($fields,'sentenceNumber')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='60883c91048a952f7abe6c666b54648b') as sentenceNumber";
        }

        //段落编号
        if(strstr($fields,'numbering')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='28ec209ca256d8e34aea41d0bda50fc4') as numbering";
        }
        //订单数
        if(strstr($fields,'orderNum')){
            $seField .= ",(SELECT CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='99c2265aa8cd374b779c95ccbdb5ac2a') as orderNum";
        }
        //问题补充听力
        if(strstr($fields,'problemComplement')){
            $seField .= ",(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='e4dd05210147f22f9da9bdfcb1c0c562') as problemComplement";
        }
        if(isset($select['category'])){
            if(isset($select['type'])){
                $where .= " AND c.id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in(".$select['category'].") ) ";
            }else{
                $count = count(explode(",",$select['category']));
                $where .= " AND c.id in(select cc.contentId from {{%category_content}} cc where cc.catId in(".$select['category'].") group by cc.contentId having count(1)=$count ) ";
            }
        }
        $page = isset($select['page'])?$select['page']:1;
//        $order = isset($select['order'])?$select['order']:'c.sort ASC,c.id DESC';
        $order = isset($select['order'])?$select['order']:'c.id DESC';
        $pageSize = isset($select['pageSize'])?$select['pageSize']:10;
        $limit = (($page-1)*$pageSize).",$pageSize";
        $sql = "select c.*,ca.name as catName$seField from {{%content}} c LEFT JOIN {{%category}} ca ON c.catId=ca.id where $where";
        if(isset($select['extend_category'])){
            $sql = " select * from ($sql) c WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in({$select['extend_category']}))  ";
        }
        if(isset($select['pageStr'])){
            $count = count(\Yii::$app->db->createCommand("$sql")->queryAll());
            $res = \Yii::$app->db->createCommand("$sql ORDER BY $order LIMIT ".$limit)->queryAll();
            $pageModel = new Pager($count,$page,$pageSize);
            $pageStr = $pageModel->GetPagerContent();
            $content['pageStr'] = $pageStr;
            $content['count'] = $count;
            $content['total'] = ceil($count/$pageSize);
            $content['data'] = $res;
        } else {
            $content = \Yii::$app->db->createCommand("$sql ORDER BY $order LIMIT ".$limit)->queryAll();
        }
        return $content;
    }

    public function getKnowList($knowId){
        $sql = "select c.*,ca.name as catName,(SELECT  CONCAT_WS('',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='32cc8e6f27caf3fdf26e8cfd4e7b4433') as description from {{%content}} c LEFT JOIN {{%category}} ca ON c.catId=ca.id where 1=1 AND c.pid=0 AND c.id in(select cc.contentId from {{%category_content}} cc where cc.catId in($knowId) group by cc.contentId having count(1)=1 )  ORDER BY c.id DESC";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getKnowledgeNum($arr){
        $where = '';
        if($arr['type']){
            $where .= " and uc.type={$arr['type']}";
        }
        if($arr['uid']){
            $where .= " and uc.uid={$arr['uid']}";
        }
        $sql = "select COUNT(DISTINCT c.id) as num from {{%content}} c LEFT JOIN {{%category}} ca ON c.catId=ca.id LEFT JOIN  x2_user_content as uc on c.id=uc.contentId  where 1=1 AND c.pid=0 AND c.id in(select cc.contentId from {{%category_content}} cc where cc.catId in({$arr['cid']}) group by cc.contentId having count(1)=1 ) $where" ;
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        return $data['num'];
    }
    /**
     *  获取单词词组
     *  by Yanni
     */
    public function getWordList($catId,$page,$pageSize){
        $uid = Yii::$app->session->get('uid');
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "select * From {{%content}}  WHERE catId={$catId} and pid=0 ";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
//        $sql .= 'ORDER BY CAST(sort as SIGNED) ASC';
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $k=>$v){
            $data[$k]['bagNum'] = Content::find()->select("id")->asArray()->where("pid={$v['id']}")->count();
        }
        foreach ($data as $k => $v) {
            if($uid) {
                $bag = Content::find()->asArray()->where("pid={$v['id']}")->all();
                if($bag){
                    $tag = 0;
                    $tag1 = 0;
                    foreach($bag as $va){
                        $answer = UserSpeed::find()->asArray()->where("belong={$va['id']} and userId={$uid}")->one();
                        if ($answer) {
                            if ($answer['answer'] == 'complete') {
                                $tag++;
                            }
                        }else {
                            $tag1++;
                        }
                    }
                    if($tag >= count($bag)){
                        $data[$k]['speed'] = 2;
                    } elseif($tag1 >= count($bag)){
                        $data[$k]['speed'] = 4;
                    } else{
                        $data[$k]['speed'] = 3;
                    }
                }
            } else {
                $data[$k]['speed'] = 4;
            }
            $data[$k]['bagNum'] = Content::find()->select("id")->asArray()->where("pid={$v['id']}")->count();
        }
        $pageModel = new Pager($count,$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }
    /**
     * 获取单词总数
     * @Yanni
     */
    public function getTotalWord($catId){
        $group = \Yii::$app->db->createCommand("select * From {{%content}}  WHERE catId={$catId} and pid=0 ")->queryAll();
        $bagNum=0;
        $wordNum=0;
        $groupNum = count($group);
        if($group){
            foreach($group as $v){
                $bag = Content::find()->asArray()->where("pid={$v['id']}")->all();
                $bagNum +=count($bag);
                if($bag){
                    foreach($bag as $va){
                        $words = Content::find()->select("id")->asArray()->where("pid={$va['id']}")->count();
                        $wordNum +=$words;
                    }
                }
            }
        }
        return ['total'=>$wordNum,'groupNum'=>$groupNum,'bagNum'=>$bagNum];
    }
    /**
     *
     * @Yanni
     */
    public function getContentList($phraseId,$type,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $uid = Yii::$app->session->get('uid');
        if($uid){
            if($type==1){          //完成
                $sql = "select c.* From {{%user_answer}} ua LEFT JOIN {{%content}} c on ua.belong=c.id WHERE ua.userId={$uid} and ua.pid={$phraseId} and ua.answer='complete'";
            } elseif($type==2){       //中断
                $sql = "select c.* From {{%user_answer}} ua LEFT JOIN {{%content}} c on ua.belong=c.id WHERE ua.userId={$uid} and ua.pid={$phraseId} and ua.answer!='complete'";
            } elseif($type==3){    //未做
                $sql = "select c.* From {{%content}} c LEFT JOIN {{%user_answer}} ua on c.id=ua.belong WHERE c.pid={$phraseId} and ISNULL(belong)";
            } else {
                $sql = "select * From {{%content}}  WHERE pid={$phraseId}";
            }
        }else{
            $sql = "select * From {{%content}}  WHERE pid={$phraseId}";
        }
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
//        $sql .= 'ORDER BY CAST(sort as SIGNED) ASC';
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $k => $v) {
            $wordNum = Content::find()->select("id")->asArray()->where("pid={$v['id']}")->count();
            if($uid) {
                $answer = UserSpeed::find()->asArray()->where("belong={$v['id']} and userId={$uid}")->one();
                if ($answer) {
                    if ($answer['answer'] == $wordNum) {
                        $data[$k]['mohu'] = UserWords::find()->select("id")->asArray()->where("bagId={$v['id']} and uid={$uid} and userState=1")->count();
                        $data[$k]['speed'] = 1;
                    } elseif($answer['answer']=='complete'){
                        $data[$k]['speed'] = 2;
                    } else {
                        $data[$k]['answer'] = $answer['answer'];
                        $data[$k]['speed'] = 3;
                    }
                }
            }
            $data[$k]['wordNum'] = $wordNum;
        }
//        var_dump($data);die;
        $pageModel = new GoodsPager($count,$page,$pageSize,10);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }
    /**
     *
     * @Obelisk
     */
    public function listSearch($category,$country='',$aim='',$order='',$page,$pageSize=8){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "Select c.*, (SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as buyNum,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7611fcaa334c360593cb15bfdd72dc70') as answer,(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='61f13913003193ea19e7e1271bca2752') as originalPrice FROM {{%content}} c WHERE c.catId=150 AND pid =0 ";
        if($category){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($category))  ";
        }
        if($country){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($country))  ";
        }
        if($aim){
            $sql = "select * from ($sql) aim WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($aim))  ";
        }
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $order;
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
//        $ages = array();
//        foreach ($data as $user) {
//            $ages[] = $user['price'];
//        }
//        array_multisort($ages, SORT_DESC, $data);
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    /**
     *
     * @Obelisk
     */
    public function courseSearch($catId,$category='',$type='',$order='',$page,$pageSize=8){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "Select c.*,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as buyNum,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7611fcaa334c360593cb15bfdd72dc70') as answer,(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='61f13913003193ea19e7e1271bca2752') as originalPrice FROM {{%content}} c WHERE c.catId=$catId AND pid =0 ";
        if($category){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($category))  ";
        }
        if($type){
            $sql = "select * from ($sql) country WHERE id in(select DISTINCT cc.contentId from {{%category_content}} cc where cc.catId in($type))  ";
        }
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $order;
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    /**
     *
     * @Obelisk
     */
    public function Search($content='',$order='',$page,$pageSize=8){
        $limit = " limit ".($page-1)*$pageSize.",$pageSize";
        $sql = "Select c.*,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='dc4793dfb52237db70b240038d086d98') as buyNum,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='7611fcaa334c360593cb15bfdd72dc70') as answer,(SELECT ce.value FROM {{%content_extend}} ce WHERE ce.contentId=c.id AND ce.code='61f13913003193ea19e7e1271bca2752') as originalPrice FROM {{%content}} c WHERE c.name like '%$content%' AND pid =0 ";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= $order;
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        $totalPage = ceil($count/$pageSize);
        return ['totalPage' => $totalPage,'data' => $data,'pageStr' => $pageStr,'count' => $count,'page' => $page];
    }

    /**
     * 通过标签获取课程Id
     * @Obelisk
     */
    public function getClassDetails($tagStr,$pid){
        $count = count(explode(",",$tagStr));
        $sql = "select c.id from {{%content}} c WHERE c.pid=$pid AND c.id in(select ct.contentId from {{%content_tag}} ct where ct.tagContentId in(".$tagStr.") group by ct.contentId having count(1)=$count ) ";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        return $data;
    }

    /**
     * 日历活动
     * @return array
     * @Obelisk
     */
    public static function getActive(){
        $date = date("Y-m");
        $firstday = date("Y-m-01",strtotime($date));
        $lastday = date("Y-m-d",strtotime("$firstday +2 month"));
        $sql = "select c.id,c.name,ce.value from {{%content}} c LEFT JOIN {{%content_extend}} ce ON c.id=ce.contentId WHERE ce.code='6d67cf3eba969f1515df48f6f43e740d' AND c.catId=218 AND ce.value >='$firstday' AND ce.value <='$lastday'";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $re = [];
        $date = [];
        foreach($data as $v){
            $re[ date("Y-m-d",strtotime($v['value']))] = $v;
            $date[] = date("Y-m-d",strtotime($v['value']));
        }
        return ['activity' => $re,'activityDate' => $date];
    }

    /**
     * 信息采集添加内容
     * @param $phone
     * @param $name
     * @param $extendVal
     * @Obelisk
     */
    public function addContent($catId,$image='',$name,$extendVal){
        $this->name = $name;
        $this->image = $image;
        $this->catId = $catId;
        $this->createTime = date('Y-m-d H:i:s');
        $this->save();
        $model = new CategoryContent();
        $model->contentId = $this->primaryKey;
        $model->catId = $catId;
        $model->save();
        $cateExtend = \Yii::$app->db->createCommand("select * from {{%category_extend}} WHERE catId=$catId AND belong='content' ORDER by id ASC")->queryAll();
        foreach($cateExtend as $k => $v){
            if(!isset($extendVal[$k])){
                $extendVal[$k] = "";
            }
            $contExtendModel = new ContentExtend();
            $contExtendModel->catExtendId = $v['id'];
            $contExtendModel->contentId = $this->primaryKey;
            $contExtendModel->name = $v['name'];
            $contExtendModel->title = $v['title'];
            $contExtendModel->image = $v['image'];
            $contExtendModel->description = $v['description'];
            $contExtendModel->type = $v['type'];
            $contExtendModel->userId = $v['userId'];
            $contExtendModel->createTime = $v['createTime'];
            $contExtendModel->inheritId = $v['inheritId'];
            $contExtendModel->canDelete = $v['canDelete'];
            $contExtendModel->code = $v['code'];
            $contExtendModel->typeValue = $v['typeValue'];
            if(!isset($extendValue[$k]{255})){
                $contExtendModel->value = $extendVal[$k];
            }
            $contExtendModel->save();
            if(isset($extendValue[$k]{255})){
                $dataModel = new ExtendData();
                $dataModel->extendId = $contExtendModel->primaryKey;
                $dataModel->value = $extendVal[$k];
                $dataModel->save();
            }
        }
    }
    /**
     * 获取购物车列表
     * by yanni
     *修改（sjeam）,默认直播 班次为空
     */
    public function getGoods($id){
        $sql = "select c.id as contentId,c.image,ca.name as catName,ca.id as catId,c.name as contentName,(SELECT CONCAT_WS(' ',ce.value,ed.value) From {{%content_extend}} ce left JOIN {{%extend_data}} ed ON ed.extendId=ce.id WHERE ce.contentId=c.id AND ce.code='0ac9d45187ea22acbadedef8f8ab0e54') as price from  {{%content}} c LEFT JOIN {{%category}} ca ON c.catId=ca.id WHERE c.id=$id";
        $goods = \Yii::$app->db->createCommand($sql)->queryAll();
        $sql = "select GROUP_CONCAT(c.name) as tag from {{%content_tag}} ct LEFT JOIN {{%content}} c ON c.id=ct.tagContentId WHERE ct.contentId=$id GROUP BY  ct.contentId";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        $goods[0]['tag'] = $data['tag'];
        //获取班次 最新班次
        $grade = Video::find()->where("cid = $id")->asArray()->orderBy('grade desc')->one()['grade'];
        // 直播课默认班次为空
        if($goods[0]['tag']=='直播课程'){
            $goods[0]['grade'] = null;
        }else{  
            $goods[0]['grade'] = $grade;
        }
        // var_dump($goods);die;
        return $goods;
    }
    /**
     * 获取直播课（录播课）
     * by yanni
     */
    public function getCurriculumIdArr($tagContentId){
        if($tagContentId){
            $where = ' ct.tagContentId='.$tagContentId;
        }  else {
            $where = '';
        }
        $sql = "select GROUP_CONCAT(ct.contentId) as contentId from {{%content_tag}} ct LEFT JOIN {{%content}} c ON c.id=ct.tagContentId WHERE $where GROUP BY  ct.contentId";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
    /**
     * 获取课程
     * wap改版
     * cy
     *
     */
    public static function getWapCourse($pid){
        $child = self::find()->select('id')->where("pid = $pid")->orderBy('sort desc')->asArray()->all();
        $course = [];
        foreach($child as $k => $v){
            $extendData = Yii::$app->db->createCommand("select ce.name,ce.value from {{%content_extend}} ce LEFT JOIN {{%extend_data}} ed ON ce.id=ed.extendId WHERE contentId = {$v['id']} and ce.name='连接地址'")->queryOne();
            $value = $extendData['value'];
            $courseId = preg_replace("/[^\d]/",'',$value);
            if($courseId){
                $data = self::getClass(['fields' => 'answer,price,originalPrice,duration,commencement,alternatives', 'where' => "c.id={$courseId}", 'pageSize' => 1]);
                $hot['id']         = $data[0]['id'];
                $hot['image']      = $data[0]['image'];
                $hot['title']      = $data[0]['title']?$data[0]['title']:$data[0]['name'];
                $hot['courseTime'] = $data[0]['commencement'];
                $hot['price']      = $data[0]['price'];
                $hot['buyPeople']  = $data[0]['alternatives'];
                $course[] = $hot;
            }
        }
        return $course;
    }
}
