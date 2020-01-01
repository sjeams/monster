<?php
namespace app\modules\question\models;
use app\libs\Method;
use yii\db\ActiveRecord;
class MockExam extends ActiveRecord {
    public $cateData;

    public static function tableName()
    {
        return '{{%mock_exam}}';
    }

    /**
     * @param $page
     * @param $pageSize
     * @return array
     * @throws \yii\db\Exception
     * Design: By Ferre
     */
    public function getMock($page,$pageSize)
    {
        $limit   = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql     = "select m.id,m.name,q.name as qname from {{%mock_exam}} m left join {{%question_cat}} q on q.id=m.type";
        $count   = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql    .= $limit;
        $data    = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }


    /**
     * @param $id
     * @param $page
     * @param $pageSize
     * @return array
     * @throws \yii\db\Exception
     * Design: By FerregetStemData
     * 模考题目
     */
    public function getSectionQuestions($id, $page, $pageSize)
    {
        $limit   = " limit ".($page-1)*$pageSize.",".$pageSize;
        if (\Yii::$app->session->get('mock_search')){
            $name    = \Yii::$app->session->get('mock_search');
            if (is_numeric($name)){
                $where = "q.id=$name";
            }else{
                $where = "q.stem like '%$name%'";
            }
            $sql     = "select q.id,q.stem from {{%section_question}} sq left join {{%questions}} q on q.id=sq.questionId where sq.sectionId=$id and $where";
            \Yii::$app->session->remove('mock_search');
        }else{
            $sql     = "select q.id,q.stem from {{%section_question}} sq left join {{%questions}} q on q.id=sq.questionId where sq.sectionId=$id";
        }
        $count   = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql    .= $limit;
        $data    = \Yii::$app->db->createCommand($sql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'pageStr'=>$pageStr];
    }

    /**
     * @param $name
     * @return mixed
     * Design: By Ferre
     * 首页查询关于标题的section单项
     */
    public function getStemData($name)
    {
        if (is_numeric($name)){
            $where = "q.id=$name";
        }else{
            $where = "q.stem like '%$name%'";
        }
        $data = \Yii::$app->db->createCommand("select se.id,se.mockExamId,s.createTime from {{%section_question}} s left join {{%questions}} q on q.id=s.questionId left join {{%section}} se on se.id=s.sectionId where $where")->queryAll();
        \Yii::$app->session->set('mock_search', $name);  //设置查询条件
        return $data;
    }

    /**
     * @param $id
     * @return array
     * @throws \yii\db\Exception
     * Design: By Ferre
     * 问题详情
     */
    public function getQuestion($id)
    {
        $sql    = "select id,stem,details,answer,createTime,updateTime from {{%questions}} where id=$id";
        $data   = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    /**
     * @param $detail
     * @return array
     * @throws \yii\db\Exception
     * Design: By Ferre
     * 题目搜索
     */
    public function getSearchQuestion($detail)
    {
        if (is_numeric($detail)){
            $sql  = "select id,stem,createTime from {{%questions}} where id=$detail";
        }else{
            $sql  = "select id,stem,createTime from {{%questions}} where stem like '%{$detail}%'";
        }
        $data    = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

}
