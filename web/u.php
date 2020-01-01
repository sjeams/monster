$where = [
[
'where' => 'sourceId=3',
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
$types = 0;
$s = [];
$questionids = [];
for($i=0;$i<100;){
$questions = [];
for($j=0;$j<40;$j++){
$know = QuestionKnow::find()->asArray()->where("catId=3")->all();
foreach($know as $v){
if(count($questionids)>0){
$str = implode(",",$questionids);
$where = "AND id not in ($str)";
}else{
$where = "";
}
$sql = "SELECT id FROM x2_questions WHERE catId=3 AND knowId={$v['id']} AND {$value['where']} $where  ORDER BY RAND()";
$data = Yii::$app->db->createCommand($sql)->queryOne();
if($data){
$questionids[] = $data['id'];
$questions[] = $data['id'];
}else{
continue;
}
}
if(count($questions)>=20){
break;
}
}
if(count($questions)<20){
break;
}
$types++;
if($types == 2){
$f = Yii::$app->session->get('section1');
$s[] = [
$f,implode(",",$questions)
];
$types = 0;
}else{
Yii::$app->session->set('section1',implode(",",$questions));
}
}
var_dump($s);die;