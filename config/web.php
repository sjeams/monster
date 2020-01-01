<?php
$params = require(__DIR__ . '/params.php');
$db     = require(__DIR__ . '/db.php');

Yii::$classMap['Method'] = '@app/libs/Method.php';
Yii::$classMap['UploadFile'] = '@app/libs/upload/UploadFile.php';
Yii::$classMap['AlipaySubmit'] = '@app/libs/yii2_alipay/AlipaySubmit.php';
Yii::$classMap['PHPExcel'] = '@app/libs/PHPExcel.php';
Yii::$classMap['PHPExcel_Writer_Excel5'] = '@app/libs/PHPExcel/Writer/Excel5.php';
Yii::$classMap['PHPExcel_Reader_Excel5'] = '@app/libs/PHPExcel/Reader/Excel5.php';
Yii::$classMap['PHPExcel_Reader_Excel2007'] = '@app/libs/PHPExcel/Reader/Excel2007.php';
Yii::$classMap['PHPExcel_IOFactory'] = '@app/libs/PHPExcel/IOFactory.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class'=>'app\modules\admin\AdminModule'
        ],
        'content' => [
            'class'=>'app\modules\content\ContentModule'
        ],
        'basic' => [
            'class'=>'app\modules\basic\BasicModule'
        ],
        'user' => [
            'class'=>'app\modules\user\UserModule'
        ],
        'cn' => [
            'class'=>'app\modules\cn\CnModule'
        ],
        'app' => [
            'class'=>'app\modules\app\AppModule'
        ],
        'question' => [
            'class'=>'app\modules\question\QuestionModule'
        ],
        'wap' => [
            'class'=>'app\modules\wap\WapModule'
        ],
    ],

    'components' => [
        'request' => [
            'cookieValidationKey' => '3ggkbEhqR-n2ASj19BJSpbdvpmbO4NwK',
        ],

    //    'cache' => [
            // 'class' => 'yii\caching\MemCache',
            // 'servers'=> [['host'=>'127.0.0.1','port'=>'11211']]
        // ],
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样
                'username' => '2565225484@qq.com',
                'password' => 'pfglhtsistrneaif',
                'port' => '25',
                'encryption' => 'tls',
            ],

            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['2565225484@qq.com'=>'雷哥网']
            ],

        ],

        'urlManager' => [
             'enablePrettyUrl' => true,
             'showScriptName' => false,
             //'suffix' => '.html',
             'rules' => [
                 ''=>'cn/index',  //首页
                 'copyreader-<editorId:\d+>.html' => 'cn/single-page/xiao-bian',    //小编个人中心
                 'beikao.html' => 'cn/single-page/index',    //备考单页
                 'beikao-<catId>.html' => 'cn/single-page/index',    //备考单页
                 'beikao/<catId:\d+>.html' => 'cn/single-page/for-ma-list',    //备考列表页
                 'beikao/<catId:\d+>-<page:\d+>.html' => 'cn/single-page/for-ma-list',    //备考列表页
                 'beikao/d-<catId:\d+>-<id:\d+>.html' => 'cn/single-page/for-ma',    //备考详情页
                 'beikao/d-<catId:\d+>-<id:\d+>-<page:\d+>.html' => 'cn/single-page/for-ma',    //备考详情页

                 'activity.html' => 'cn/activity/index',   //活动页
                 'activity/<catId:\d+>-<page:\d+>.html' => 'cn/activity/index',   //活动页
                 'activity/a-<id:\d+>.html' => 'cn/activity/detail',   //活动详情

                 'course.html' => 'cn/course/index',    //课程页
                 'course/<id:\d+>.html' => 'cn/course/detail',    //课程详情页
                 'case_detail/<id:\d+>.html' => '/cn/course/case-detail', #用户数据统计

                 'words.html' => 'cn/words/index',    //单词词组页
                 'words/<page:\d+>.html' => 'cn/words/index',    //词组页
                 'words/phrase-<phraseId:\d+>.html' => 'cn/words/bag-list',    //单词词包页
                 'words/phrase-<phraseId:\d+>-<type:\d+>.html' => 'cn/words/bag-list',    //单词词包页
                 'word_detail/<phraseId:\d+>-<bagId:\d+>.html' => 'cn/words/word-detail',    //单词详情
                 'word_review/<phraseId:\d+>-<bagId:\d+>.html' => 'cn/words/word-review',    //单词复习

                 'information.html' => 'cn/information/index',    //资讯页面
                 'information/list-<page:\d+>.html' => 'cn/information/index',    //资讯页面
                 'information/<id:\d+>.html' => 'cn/information/detail',    //资讯详情
                 'information/<id:\d+>-<page:\d+>.html' => 'cn/information/detail',    //资讯详情
                 'information/content-<content>.html' => 'cn/information/index',    //资讯搜索
                 'information/content-<content>/<page:\d+>.html' => 'cn/information/index',    //资讯搜索

                 'search.html' => 'cn/search/index',    //搜索页
                 'search/sectionId-<sectionId>/source-<sourceId>/level-<levelId>/select-<words>/type-<type>/page-<page>.html' => 'cn/search/index',    //搜索页
                 'question/<questionId:\d+>.html' => 'cn/search/question-detail',    //题目详情
                 'question_upload.html' => 'cn/search/user-write',    //题目详情

                 'practice.html' => 'cn/practice/index',    //做题页
//                 'practice1.html' => 'cn/practice/ferre',    //TODO by Ferre 数据生成方法
                 'practice/sectionId-<sectionId>/source-<sourceId>/know-<knowId>/page-<page>/type-<type>.html' => 'cn/practice/index',    //做题列表页
//                 'practice/sectionId-<sectionId>/level-<levelId>/page-<page>/type-<type>.html' => 'cn/practice/index',    //做题列表页 难度等级 TODO
                 'practice/<libId:\d+>.html' => 'cn/paper-page/index',    //做题页
                 'practice/result-<libId:\d+>.html' => 'cn/practice/question-result',    //做题结果页
//                 'practice/category-<catId:\d+>_center-<sonCat:\d+>.html' => 'cn/practice/index',    //做题页
//                 'practice/category-<catId:\d+>_center-<sonCat:\d+>_<page:\d+>.html' => 'cn/practice/index',    //做题页
//                 'practice/category-<catId:\d+>_center-<sonCat:\d+>_source-<sourceId:\d+>.html' => 'cn/practice/index',    //做题页
//                 'practice/category-<catId:\d+>_center-<sonCat:\d+>_source-<sourceId:\d+>_<page:\d+>.html' => 'cn/practice/index',    //做题页

                 'user.html' => 'cn/user/index',    //用户中心
                 'about.html' => 'cn/single-page/about',    //关于我们&免责声明
                 'user/se-<sectionId>/so-<sourceId>/l-<levelId>.html' => 'cn/user/collection',    //个人中心收藏题目列表
                 'user/se-<sectionId>/so-<sourceId>/l-<levelId>/t-<time>.html' => 'cn/user/error-question',    //个人中心错题列表
                 'user/se-<sectionId>/so-<sourceId>/l-<levelId>/st-<state>/t-<time>.html' => 'cn/user/question-list',    //个人中心做题列表
                 'user/t-<time>/s-<sort>.html' => 'cn/user/strange-word',    //个人中心生词本
                 'user/lei-<type>.html' => 'cn/user/integral-record',    //个人中心雷豆管理
                 'user/order-<type>.html' => 'cn/user/purchase-course',    //个人中心订单管理
                 'user/plan.html' => 'cn/user/plan',    //学习计划
                 'mock_record.html' => 'cn/user/mock-record',    //模考记录
                 'invitation.html' => 'cn/user/invitation',    //模考记录

                 'know.html' => 'cn/knows/index',    //必考知识点
                 'know/<knowId:\d+>.html' => 'cn/knows/index',    //必考知识点
                 'knowDetail/d-<contentId:\d+>-<catId:\d+>.html' => 'cn/knows/detail',    //必考知识点详情

                 'presentation.html'=>'cn/presentation/index',   //全科报告
                 'report/dx-<sectionId:\d+>.html'=>'cn/presentation/replenish-report', //单科报告
                 'teacher.html'=>'cn/teachers/index',   //名师首页
                 'practice/gre_help.html'=>'cn/paper-page/help',   //帮助页面
                 'teacher/<id:\d+>.html'=>'cn/teachers/detail',    //名师详情
                 'teacher_article.html'=>'cn/teacher-relevant/index',   //名师专栏首页
                 'teacher_article/<id:\d+>.html'=>'cn/teacher-relevant/article-detail',  //名师专栏详情
                 'evaluation.html'=>'cn/evaluation/index',    //测评首页
                 'evaluation_write/<type:\d+>-<id:\d+>.html'=>'cn/evaluation/write',   //测评做题页面
                 'evaluation_result/<type:\d+>-<uid:\d+>.html'=>'cn/evaluation/result',  //测评结果页
                 'mockExam/<type:\d>-<access:\d>.html'=>'cn/mock-exam/mock-exam',    //模考首页
                 'mockExam.html'=>'cn/mock-exam/mock-exam',    //模考首页
                 'mockTopic/<mockExamId:\d+>.html'=>'cn/mock-exam/make-topic',  //模考题页面
                 'mockTopic/<mockExamId:\d+>-<sectionId:\d+>-<questionId:\d+>.html'=>'cn/mock-exam/designation', //模考题页面 题目id进入
                 'mockResult/<mockExamId:\d+>.html'=>'/cn/mock-exam/result',  //模考结果页
                 'mockResult/<mockExamId:\d+>-<sectionId:\d+>-<access:\d>-<questionId:\d+>.html'=>'cn/mock-exam/result', //模考结果页
                 'mockShare/<mockId:\d+>.html' => '/cn/mock-exam/result-share',  //模考结果分享
                 'mock_record/time-<time:\d+>.html'=>'cn/user/mock-record', //用户模考记录时间选择
                 'mock_record/<first:\d+>-<end:\d+>.html'=>'/cn/user/mock-record',//用户模型考记录时间选择

                 '/share_course.html' => 'wap/wap/course-share',//分享课程
                 '/share_test_result.html' => 'wap/wap/bank-results',//分享做题结果
                 '/share_article.html' => 'wap/wap/article-share',//分享文章
                 '/share_article1.html' => 'wap/wap/article-share1',//分享社区帖子
                 '/share_gossip.html' => 'wap/wap/share-gossip',//分享吐槽
                 '/share_article2.html' => 'wap/wap/share-detail3',//分享吐槽

                 '/tool.html' => '/cn/tool/index',#工具页面
                 'userCount.html' => '/user/user-comment/user-count', #用户数据统计
             ],

         ],



        'log' => [

            'traceLevel' => YII_DEBUG ? 3 : 0,

            'targets' => [

                [

                    'class' => 'yii\log\FileTarget',

                    'levels' => ['error', 'warning'],

                ],

            ],

        ],

        'db' => $db,

    ],

    'params' => $params,

];



if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;



