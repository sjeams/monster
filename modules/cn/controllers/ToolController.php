<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/17
 * Time: 16:28
 */

namespace app\modules\cn\controllers;


use app\libs\ToeflController;

class ToolController extends ToeflController
{
    public $layout = 'cn';
    public $enableCsrfValidation = false;

    public function actionIndex(){
        $this->title = '雷哥GRE APP下载_GRE模考软件下载 _ 雷哥网';
        $this->keywords = 'GRE APP模考,GRE模考软件,GRE APP下载,GRE真题,GRE题库,GRE历年真题,雷哥GRE在线课程，模考软件下载,GRE在线练习';
        $this->description = '雷哥GRE APP题库是雷哥网开发一套完整GRE做题平台,包括OG、Magoosh、Kaplan、GRE历年真题在内的上万道题目,各大APP应用市场均可下载.雷哥GRE还包括GRE在线培训课程/GRE网络课程/GRE视频课程,助力GRE考生快速上330';
        return $this->render('index');
    }

    /**
     * 下载地址
     * @Obelisk
     */
    public function actionDownload(){
        $number = file_get_contents("files/cache/gretool.txt");
        $number++;
        $filePath = "files/cache/gretool.txt";
        $fp = fopen("$filePath", "w");
        fwrite($fp,$number);
        fclose($fp);
        return $this->renderPartial('download');
    }
}