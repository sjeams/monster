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
                ''=>'cn/book/index',  //首页
                'book-<contentid:\d+>.html' => 'cn/book/detail',    //备考列表页
                // 'book/list.html' => 'cn/book/list',    //备考列表页
                // 'book/list-<type:\d+>.html' => 'cn/book/list',    //备考列表页
                // 'book/list-<type:\d+>-<page:\d+>-<pageSize:\d+>.html' => 'cn/book/list',    //备考列表页
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



