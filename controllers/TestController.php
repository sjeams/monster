<?php

namespace app\controllers;

use app\libs\Method;
use app\models\MockExam;
use app\models\Section;
use app\models\SectionQuestion;
use app\modules\cn\models\User;
use app\modules\question\models\QuestionKnow;
use app\modules\question\models\Questions;
use Yii;
use app\libs\ApiControl;


class TestController extends ApiControl
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $uid = Yii::$app->request->post('uid');
        $sign = User::find()->where("uid=$uid")->one();
        if($sign){
            echo '√';
        }else{
            echo '×';
        }
    }

    public function actionSslLogin(){
        $uid = Yii::$app->session->get('uid');
        $token = isset($_COOKIE['sslToken'])?$_COOKIE['sslToken']:false;
        $tokenOut = isset($_COOKIE['sslTokenOut'])?$_COOKIE['sslTokenOut']:false;
        if($tokenOut){
            if($uid){
                session_destroy();
            }
        }else{
            if(!$uid){
                if($token){
                    $date = Method::curl_post(Yii::$app->params['loginUrl'].'/cn/ssl-api/web-check',['token' => $token]);
                    $data = json_decode($date,true);
                    Method::confim_user($data);
                }
            }
        }
    }

    public function actionQuant()
    {
        set_time_limit(0);
        $where = [
//            [
//                'where' => 'sourceId=3',
//                'name' => 'Magoosh模考套题',
//            ],
            [
                'where' => '(sourceId=9 || sourceId=17)',
                'name' => '精选模考套题',
            ],
        ];
        foreach ($where as $value) {
            $types = 0;
            $s = [];
            $questionids = [];
            for ($i = 0; $i < 100;) {
                $questions = [];
                for ($j = 0; $j < 40; $j++) {
                    $know = QuestionKnow::find()->asArray()->where("catId=3")->all();
                    foreach ($know as $v) {
                        if (count($questionids) > 0) {
                            $str = implode(",", $questionids);
                            $where = "AND id not in ($str)";
                        } else {
                            $where = "";
                        }
                        $sql = "SELECT id FROM x2_questions WHERE catId=3 AND knowId={$v['id']} AND {$value['where']} $where  ORDER BY RAND()";
                        $data = Yii::$app->db->createCommand($sql)->queryOne();
                        if ($data) {
                            $questionids[] = $data['id'];
                            $questions[] = $data['id'];
                        } else {
                            continue;
                        }
                        if (count($questions) >= 20) {
                            break;
                        }
                    }
                    if (count($questions) >= 20) {
                        break;
                    }
                }
                if (count($questions) < 20) {
                    break;
                }
                $s[] = implode(",", $questions);
//                if ($types == 2) {
//                    $f = Yii::$app->session->get('section1');
//                    $s[] = [
//                        $f, implode(",", $questions)
//                    ];
//                    $types = 0;
//                } else {
//                    Yii::$app->session->set('section1', implode(",", $questions));
//                }
            }
                    Yii::$app->session->set('quant',$s);
//            foreach($s as $k => $v){
//                $model = new MockExam();
//                $model->name =  $value['name'].($k+1);
//                $model->type = 2;
//                $model->createTime = time();
//                $model->sourceId = 2;
//                $model->save();
//                $mockExamId = $model->primaryKey;
//                foreach($v as $val){
//                    $model = new Section();
//                    $model->mockExamId = $mockExamId;
//                    $model->createTime = time();
//                    $model->save();
//                    $sectionId = $model->primaryKey;
//                    $questionIds = explode(",",$val);
//                    foreach($questionIds as $va){
//                        $model = new SectionQuestion();
//                        $model->sectionId = $sectionId;
//                        $model->questionId = $va;
//                        $model->createTime = time();
//                        $model->save();
//                    }
//                }
//            }
        }
    }
    public function actionVerbal(){
        set_time_limit(0);
        $where = [
//            [
//                'where' => 'sourceId=30',
//                'where1' => 'sourceId=3',
//                'where2' => 'sourceId=3',
//                'name' => 'Magoosh模考套题',
//            ],
            [
                'where' => '(sourceId=19 || sourceId=20 || sourceId=22 || sourceId=23 || sourceId=24 || sourceId=25 || sourceId=26 || sourceId=27 || sourceId=28 || sourceId=29 || sourceId=2531)',
                'where1' => 'sourceId=16',
                'where2' => '(sourceId=2 || sourceId=4)',
                'name' => '精选模考套题',
            ],
        ];
        foreach($where as $value){
//        $m = $t[22][2];
//        unset($t[22][2]);
//        $t[22][2] = $data[88];
//        $sql = "SELECT * FROM (SELECT COUNT(questionid) as num,GROUP_CONCAT(questionid) as questionid,articletitle FROM x2_questions WHERE sectiontype=7 AND twoobjecttype=2 AND questionstatus=1 GROUP BY articletitle ORDER BY questionid ASC) as a WHERE a.num = 2";
//        $data1 = $this->db->fetchAll($sql);
//        $sql = "SELECT * FROM (SELECT COUNT(questionid) as num,GROUP_CONCAT(questionid) as questionid,articletitle FROM x2_questions WHERE sectiontype=7 AND twoobjecttype=2 AND questionstatus=1 GROUP BY articletitle ORDER BY questionid ASC) as a WHERE a.num = 8";
//        $data2 = $this->db->fetchAll($sql);
//        $t[23] = [$data1[0],$m,$data2[0]];
//        $t[24] = [$data[89],$data1[1],$data2[1]];
            $num2 = "";
            $num1 = "";
            $s = [];
            $types = 0;
            $num3 = '';
            $s = Yii::$app->session->get('s');
            $article = Yii::$app->session->get('article');
            $num2 = Yii::$app->session->get('num2');
            $num1 = Yii::$app->session->get('num1');
            for($i=0;$i<3000;$i++){
                reset($article); // 如果确定数组的指针指向第一个元素，可以不使用本语句
                $key1 = key($article);
                $b = $article[$key1];
                if($b['num']<4){
                    unset($article[$key1]);
                    continue;
                }
                $d = 0;
                foreach($article as $key => $v){
                    if($b['readStem'] != $v['readStem']){
                        $c = $v;
                        $key2 = $key;
                        $d = 1;
                    }
                }
                if(!$d){
                    break;
                }
                unset($article[$key1]);
                unset($article[$key2]);
                $sxnum = 10-$c['num']-$b['num'];
                if($num3){
                    $where = " AND id not in (".substr($num3,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=2 AND sourceId=18 $where  ORDER BY RAND() LIMIT $sxnum";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num3 .= ','.$questionid;
                $f = $questionid;
                $questionids = "";
                if($num2){
                    $where = " AND id not in (".substr($num2,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId in (1,2,3) AND {$value['where1']} $where  ORDER BY RAND() LIMIT 6";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<6){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num2 .= ','.$questionid;
                $questionids .= $questionid.',';
                $questionids .= $b['questionIds'].','.$f;
                if($num1){
                    $where = " AND id not in (".substr($num1,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId = 4 AND {$value['where2']} $where  ORDER BY RAND() LIMIT 4";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<4){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num1 .= ','.$questionid;
                $questionids .= ','.$questionid.',';
                $questionids .= $c['questionIds'];
                $s[] = $questionids;
            }
            Yii::$app->session->set('verbal',$s);
//            foreach($s as $k => $v){
//                $name = $value['name'];
//                $nameid = $k+1;
//                $questionids = $v['questionids'];
//                $num = 36;
//                $mktype = 'verbal';
//                $belong = 2;
//                $argsmd5 = $value['sign'];
//            }
        }

    }

    public function actionVerbal1(){
        set_time_limit(0);
        $where = [
            [
                'where' => 'sourceId=30',
                'where1' => 'sourceId=3',
                'where2' => 'sourceId=3',
                'name' => 'Magoosh模考套题',
            ],
//            [
//                'where' => '(sourceId=19 || sourceId=20 || sourceId=22 || sourceId=23 || sourceId=24 || sourceId=25 || sourceId=26 || sourceId=27 || sourceId=28 || sourceId=29 || sourceId=2531)',
//                'where1' => 'sourceId=16',
//                'where2' => '(sourceId=2 || sourceId=4)',
//                'name' => '精选模考套题',
//            ],
        ];
        foreach($where as $value){
            $sql = "SELECT * FROM (SELECT COUNT(id) as num,GROUP_CONCAT(id) as questionIds,readStem FROM x2_questions WHERE catId=2 AND {$value['where']} GROUP BY readStem ORDER BY id ASC) as a WHERE a.num >0 ORDER BY rand()";
            $article = Yii::$app->db->createCommand($sql)->queryAll();
            $num2 = "";
            $num1 = "";
            $s = [];
            $types = 0;
            for($i=0;$i<300;$i++){
                $questionids = "";
                if($num2){
                    $where = " AND id not in (".substr($num2,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId in (1,2,3) AND {$value['where1']} $where  ORDER BY RAND() LIMIT 6";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<6){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num2 .= ','.$questionid;
                $questionids .= $questionid.',';
                $tao = [];
                $noIn = [];
                while(count($article)>0){
                    $num = 0;
                    $tao = [];
                    $type = 0;
                    $useArticle = $article;
                    for($i=0;$i<10000;$i++){
                        $key = array_rand($useArticle);
                        if(!$key){
                            continue;
                        }
                        $b = $useArticle[$key];
                        if(!$b){
                            break;
                        }
                        $num += $b['num'];
                        if($num == 7){
                            $tao[] = $b;
                            $noIn[] = $b['readStem'];
                            unset($article[$key]);
                            $type = 1;
                            break;
                        }else if($num>7){
                            $num -= $b['num'];
                            unset($useArticle[$key]);
                        }else{
                            $tao[] = $b;
                            $noIn[] = $b['readStem'];
                            unset($article[$key]);
                            unset($useArticle[$key]);
                        }
                    }
                    break;
                }
                if(count($tao) == 0){
                    break;
                }
                $h = array_column($tao,'questionIds');
                $h = implode(",",$h);
                if(count(explode(",",$h))<7){
                    break;
                }
                $questionids .= $h;
                if($num1){
                    $where = " AND id not in (".substr($num1,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId = 4 AND {$value['where2']} $where  ORDER BY RAND() LIMIT 4";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<4){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num1 .= ','.$questionid;
                $questionids .= ','.$questionid.',';
                $tao = [];
                while(count($article)>0){
                    $num = 0;
                    $tao = [];
                    $type = 0;
                    $useArticle = $article;
                    for($i=0;$i<10000;$i++){
                        $key = array_rand($useArticle);
                        if(!$key){
                            continue;
                        }
                        $b = $useArticle[$key];
                        if(in_array($b['readStem'],$noIn)){
                            continue;
                        }
                        if(!$b){
                            break;
                        }
                        if($b['num'] >= 4){
                            continue;
                        }
                        $num += $b['num'];
                        if($num == 3){
                            $tao[] = $b;
                            unset($article[$key]);
                            $type = 1;
                            break;
                        }else if($num>3){
                            $num -= $b['num'];
                            unset($useArticle[$key]);
                        }else{
                            $tao[] = $b;
                            unset($article[$key]);
                            unset($useArticle[$key]);
                        }
                    }
                    break;
                }
                if(count($tao) == 0){
                    break;
                }
                $h = array_column($tao,'questionIds');
                $h = implode(",",$h);
                if(count(explode(",",$h))<3){
                    break;
                }
                $questionids .= $h;
                $s[] = $questionids;
//                $types++;
//                if($types == 2){
//                    $f = Yii::$app->session->get('section1');
//                    $s[] = [
//                        $f,$questionids
//                    ];
//                    $types = 0;
//                }else{
//                    Yii::$app->session->set('section1',$questionids);
//                }
            }
            Yii::$app->session->set('verbal',$s);die;
//            foreach($s as $k => $v){
//                $model = new MockExam();
//                $model->name =  $value['name'].($k+1);
//                $model->type = 1;
//                $model->createTime = time();
//                $model->sourceId = 1;
//                $model->save();
//                $mockExamId = $model->primaryKey;
//                foreach($v as $val){
//                    $model = new Section();
//                    $model->mockExamId = $mockExamId;
//                    $model->createTime = time();
//                    $model->save();
//                    $sectionId = $model->primaryKey;
//                    $questionIds = explode(",",$val);
//                    foreach($questionIds as $va){
//                        $model = new SectionQuestion();
//                        $model->sectionId = $sectionId;
//                        $model->questionId = $va;
//                        $model->createTime = time();
//                        $model->save();
//                    }
//                }
//            }
        }

    }

    public function actionVerbal3(){
        set_time_limit(0);
        $where = [
//            [
//                'where' => 'sourceId=30',
//                'where1' => 'sourceId=3',
//                'where2' => 'sourceId=3',
//                'name' => 'Magoosh模考套题',
//            ],
            [
                'where' => '(sourceId=19 || sourceId=20 || sourceId=22 || sourceId=23 || sourceId=24 || sourceId=25 || sourceId=26 || sourceId=27 || sourceId=28 || sourceId=29 || sourceId=2531)',
                'where1' => 'sourceId=16',
                'where2' => '(sourceId=2 || sourceId=4)',
                'name' => '精选模考套题',
            ],
        ];
        foreach($where as $value){
            $sql = "SELECT * FROM (SELECT COUNT(id) as num,GROUP_CONCAT(id) as questionIds,readStem FROM x2_questions WHERE catId=2 AND {$value['where']} GROUP BY readStem ORDER BY id ASC) as a WHERE a.num >0 ORDER BY rand()";
            $article = Yii::$app->db->createCommand($sql)->queryAll();
            foreach($article as $k => $v){
                if($v['num'] >= 6){
                    $l = ceil($v['num']/2);
                    $m = explode(",",$v['questionIds']);
                    $a = array_slice($m,0,$l);
                    $b = array_slice($m,$l);
                    unset($article[$k]);
                    $article[] = [
                        'num' => count($a),
                        'questionIds' => implode(",",$a),
                        'readStem' => $v['readStem'],
                    ];
                    $article[] = [
                        'num' => count($b),
                        'questionIds' => implode(",",$b),
                        'readStem' => $v['readStem'],
                    ];
                }
            }
            $num2 = "";
            $num1 = "";
            $s = [];
            $types = 0;
            for($i=0;$i<300;$i++){
                $questionids = "";
                if($num2){
                    $where = " AND id not in (".substr($num2,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId in (1,2,3) AND {$value['where1']} $where  ORDER BY RAND() LIMIT 6";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<6){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num2 .= ','.$questionid;
                $questionids .= $questionid.',';
                $tao = [];
                $noIn = [];
                while(count($article)>0){
                    $num = 0;
                    $tao = [];
                    $type = 0;
                    $useArticle = $article;
                    for($i=0;$i<10000;$i++){
                        $key = array_rand($useArticle);
                        if(!$key){
                            continue;
                        }
                        $b = $useArticle[$key];
                        if(!$b){
                            break;
                        }
                        if($b['num'] >=5){
                            continue;
                        }
                        $num += $b['num'];
                        if($num == 7){
                            $tao[] = $b;
                            $noIn[] = $b['readStem'];
                            unset($article[$key]);
                            $type = 1;
                            break;
                        }else if($num>7){
                            $num -= $b['num'];
                            unset($useArticle[$key]);
                        }else{
                            $tao[] = $b;
                            $noIn[] = $b['readStem'];
                            unset($article[$key]);
                            unset($useArticle[$key]);
                        }
                    }
                    break;
                }
                if(count($tao) == 0){
                    break;
                }
                $h = array_column($tao,'questionIds');
                $h = implode(",",$h);
                if(count(explode(",",$h))<7){
                    break;
                }
                $questionids .= $h;
                if($num1){
                    $where = " AND id not in (".substr($num1,1).")";
                }else{
                    $where = "";
                }
                $sql = "SELECT id FROM x2_questions WHERE catId=1 AND knowId = 4 AND {$value['where2']} $where  ORDER BY RAND() LIMIT 4";
                $data = Yii::$app->db->createCommand($sql)->queryAll();
                if(count($data)<4){
                    break;
                }
                $questionid = array_column($data,'id');
                $questionid = implode(",",$questionid);
                $num1 .= ','.$questionid;
                $questionids .= ','.$questionid.',';
                $tao = [];
                while(count($article)>0){
                    $num = 0;
                    $tao = [];
                    $type = 0;
                    $useArticle = $article;
                    for($i=0;$i<10000;$i++){
                        $key = array_rand($useArticle);
                        if(!$key){
                            continue;
                        }
                        $b = $useArticle[$key];
                        if(in_array($b['readStem'],$noIn)){
                            continue;
                        }
                        if(!$b){
                            break;
                        }
                        if($b['num'] >= 4){
                            continue;
                        }
                        $num += $b['num'];
                        if($num == 3){
                            $tao[] = $b;
                            unset($article[$key]);
                            $type = 1;
                            break;
                        }else if($num>3){
                            $num -= $b['num'];
                            unset($useArticle[$key]);
                        }else{
                            $tao[] = $b;
                            unset($article[$key]);
                            unset($useArticle[$key]);
                        }
                    }
                    break;
                }
                if(count($tao) == 0){
                    break;
                }
                $h = array_column($tao,'questionIds');
                $h = implode(",",$h);
                if(count(explode(",",$h))<3){
                    break;
                }
                $questionids .= $h;
                $s[] = $questionids;
//                $types++;
//                if($types == 2){
//                    $f = Yii::$app->session->get('section1');
//                    $s[] = [
//                        $f,$questionids
//                    ];
//                    $types = 0;
//                }else{
//                    Yii::$app->session->set('section1',$questionids);
//                }

                //普通模式
            }
            if(count($s)>=24){
                Yii::$app->session->set('s',$s);
                Yii::$app->session->set('article',$article);
                Yii::$app->session->set('num2',$num2);
                Yii::$app->session->set('num1',$num1);
                var_dump(111);die;
            }
//            foreach($s as $k => $v){
//                $model = new MockExam();
//                $model->name =  $value['name'].($k+1);
//                $model->type = 1;
//                $model->createTime = time();
//                $model->sourceId = 1;
//                $model->save();
//                $mockExamId = $model->primaryKey;
//                foreach($v as $val){
//                    $model = new Section();
//                    $model->mockExamId = $mockExamId;
//                    $model->createTime = time();
//                    $model->save();
//                    $sectionId = $model->primaryKey;
//                    $questionIds = explode(",",$val);
//                    foreach($questionIds as $va){
//                        $model = new SectionQuestion();
//                        $model->sectionId = $sectionId;
//                        $model->questionId = $va;
//                        $model->createTime = time();
//                        $model->save();
//                    }
//                }
//            }
        }

    }

    public function actionAll(){
        $verbal = Yii::$app->session->get('verbal');
        $quant = Yii::$app->session->get('quant');
        $h = [1,1,1,2,2,2];
        $s = [];
        foreach($h as $k => $v){
            $b = $h[$k];
            $m = [];
            for($i=0;$i<5;$i++){
                if($b == 1){
                    if(count($quant)>0){
                        $a = array_shift($quant);
                        $m[] = [
                            'questionid' => $a,
                            'type' => 2
                        ];
                    }else{
                        break;
                    }
                    $b=2;
                }else{
                    if(count($verbal)>0){
                        $a = array_shift($verbal);
                        $m[] = [
                            'questionid' => $a,
                            'type' => 1
                        ];
                    }else{
                        break;
                    }
                    $b=1;
                }
            }
            $s[] = $m;
        }
            foreach($s as $k => $v){
                $model = new MockExam();
                $model->name = '精选模考套题'.($k+1);
                $model->type = 3;
                $model->createTime = time();
                $model->sourceId = 2;
                $model->save();
                $mockExamId = $model->primaryKey;
                foreach($v as $val){
                    $model = new Section();
                    $model->mockExamId = $mockExamId;
                    $model->createTime = time();
                    $model->type = $val['type'];
                    $model->save();
                    $sectionId = $model->primaryKey;
                    $questionIds = explode(",",$val['questionid']);
                    foreach($questionIds as $va){
                        $model = new SectionQuestion();
                        $model->sectionId = $sectionId;
                        $model->questionId = $va;
                        $model->createTime = time();
                        $model->save();
                    }
                }
            }
    }

    public function actionTest1(){
        $sign = $this->isHTTPS();
        var_dump($sign);die;

    }

    public function actionDeleteRepeat(){
        $sql = "SELECT * from (SELECT COUNT(id) as num ,id,uid from x2_user WHERE uid != '' GROUP BY uid ORDER BY id ASC) a where a.num >1";
        $data =  Yii::$app->db->createCommand($sql)->queryAll();
        foreach($data as $v){
            $sql = "Delete from x2_user where id != {$v['id']} AND uid={$v['uid']}";
            Yii::$app->db->createCommand($sql)->execute();
        }
    }

    public function isHTTPS()
    {
        if (defined('HTTPS') && HTTPS) return true;
        if (!isset($_SERVER)) return FALSE;
        if (!isset($_SERVER['HTTPS'])) return FALSE;
        if ($_SERVER['HTTPS'] === 1) {  //Apache
            return TRUE;
        } elseif ($_SERVER['HTTPS'] === 'on') { //IIS
            return TRUE;
        } elseif ($_SERVER['SERVER_PORT'] == 443) { //其他
            return TRUE;
        }
        return FALSE;
    }

    public function actionAnswerShi(){
        set_time_limit(0);
        $data = Questions::find()->asArray()->all();
        foreach ($data as $v){
            $str = preg_replace("/[".chr(226).chr(128).chr(139)."]+/","", $v['answer']);
            Questions::updateAll(['answer' => $str],"id={$v['id']}");
        }
    }

    public function actionAddQuestion(){
        $str = "8443,8445,8446,8447,8448,8451,8455,8458,8459,8463,8465,8467,8471,8473,8475,8477,8482,8485,8486,8487";
        $arr = explode(",",$str);
        $sectionId = 178;
        if(count($arr) == 20){
            foreach ($arr as $v){
                $model = new SectionQuestion();
                $model->sectionId = $sectionId;
                $model->questionId = $v;
                $model->createTime = time();
                $model->save();
            }
        }else{
            echo count($arr);
        }
    }
}
