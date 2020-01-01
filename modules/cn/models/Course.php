<?php 
namespace app\modules\cn\models;
use app\modules\cn\models\Content;
use yii\db\ActiveRecord;
class Course extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%set_course}}';
    }


    //获取抢先课程代表课
    public function getCourse(){
        $deputyCourse = Course::find()->asArray()->where("type!=2")->orderBy("sort desc")->all();
        foreach($deputyCourse as $k=>$v){
            $sign = Content::findOne($v['representativeid']);
            if($sign->pid == 0){
                $courseContent = Content::getClass(['fields' => 'alternatives,commencement,performance,duration,price','where' =>"c.pid=".$v['representativeid']]);   // 查找课程全部子内容
            } else {
                $courseContent = Content::getClass(['fields' => 'alternatives,commencement,performance,duration,price','where' =>"c.id=".$v['representativeid']]);
            }
            $courseContent[0]['place'] = \Yii::$app->params['coursePlace'][$courseContent[0]['id']%3];
            $deputyCourse[$k]['courseContent'] = $courseContent[0];                //课程内容
        }
        return $deputyCourse;
    }
    //获取抢先课程列表
    public function getListCourse($courseId){
        $course = Course::find()->asArray()->where("id={$courseId}")->one();
        $sign = Content::find()->asArray()->where("id in({$course['contentid']})")->all();
        foreach($sign as $k=>$v){
            if ($v['pid'] == 0) {
                $courseContent = Content::getClass(['fields' => 'alternatives,commencement,performance,duration,price', 'where' => "c.pid=" . $v['id']]);   // 查找课程全部子内容
            } else {
                $courseContent = Content::getClass(['fields' => 'alternatives,commencement,performance,duration,price', 'where' => "c.id=" . $v['id']]);
            }
            $courseContent[0]['place'] = \Yii::$app->params['coursePlace'][$courseContent[0]['id']%3];
            $sign[$k]['extend'] = $courseContent[0];
        }
        return $sign;
    }

    public function auditionCourse(){
        $data['blank'] = [
            'name'=>'填空试听',
            'url'=>'m49GmiJg7u',
            'time'=>'半个小时',
            'teacherImage'=>'/files/attach/images/20180417/1523955220836230.jpg',
            'teacherName'=>'Bella',
            'teacherInfo'=>'最懂你填空的零差评老师，灵活的授课方式深受学生的喜爱',
            'teacherDetail'=>'Bella老师对GRE填空有深入的研究和见解，拥有多年授课经验。授课风格轻松活泼，深入浅出。常年的英语工作环境，接触过不同国家的外籍人士及留学人士，对海外国家的文化有独到见解。擅长根据学生的个人特点，制定个性化的留学考试复习方案。深受学生好评!'
        ];
        $data['read'] = [
            'name'=>'阅读试听',
            'url'=>'IBnNbdpB4A',
            'time'=>'半个小时',
            'teacherImage'=>'/files/attach/images/20180417/1523947836891313.png',
            'teacherName'=>'sharron',
            'teacherInfo'=>'阅读逻辑分析大神，从事GRE教学多年，教学经验丰富',
            'teacherDetail'=>'GRE高分获得者，英国名校Bath University商学院硕士
对GRE阅读题有着敏锐准确的理解力，善于形象地解读文章逻辑链，并根据题目类型特点各个击破；善于以考官的思维方式、从出题人的角度对学生进行有针对性的辅导提升。
教学案例：王同学一战330，刘同学325—335'
        ];
        $data['quant'] = [
            'name'=>'数学试听',
            'url'=>'y0Oa87bwTs',
            'time'=>'半个小时',
            'teacherImage'=>'/files/attach/images/20180709/1531101522530433.jpg',
            'teacherName'=>'Helen',
            'teacherInfo'=>'数学满分训练师，有丰富的GRE数学教学经验',
            'teacherDetail'=>'GRE数学满分获得者~BEC中高级，毕业于985院校 金融学专业，GRE数学名师，性格开朗大方授课耐心，凭借着自身对于数学的热爱及长期实践，总结了一套成熟且实用的GRE数学论，擅长因材施教，能够根据学生的不同基础制定不同的学习计划帮助学生有效提分，备受学生好评。'
        ];
        $data['composition'] = [
            'name'=>'作文试听',
            'url'=>'laPqRCZ0Uq',
            'time'=>'半个小时',
            'teacherImage'=>'/files/attach/images/20180705/1530770968882419.jpg',
            'teacherName'=>'Regina',
            'teacherInfo'=>'写作逻辑洞悉大师，对考试重难点把握精准',
            'teacherDetail'=>'重点大学毕业，为人开朗随和，治学态度严谨，深刻了解GRE写作考情，善于用最直接的方法探寻出题思维的本质，对考试重难点把握精准，强调思维方式与知识相结合，教学风格诙谐幽默，深受学员喜爱。'
        ];
        return $data;
    }

}
