<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>雷哥GREONLINE智能测评_GRE模考评估_雷哥GRE在线</title>
    <meta name="keywords" content="雷哥GRE，greonline，GRE模考，GRE题库，GRE真题，GRE填空真题">
    <meta name="description" content="雷哥GREONLINE智能测评，根据你的GRE基础情况，选择适合你的测评题目，测评后自动显示测评分数报告及详细复习计划！">

    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
    <!-- <meta name="description" content=""> -->
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    <!-- ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏-->
    <!-- ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面-->
    <!-- ================================================== -->
    <meta name="renderer" content="webkit">
    <!-- Mobile Specific Metas
   ================================================== -->
    <!-- !!!注意 minimal-ui 是IOS7.1的新属性，最小化浏览器UI -->
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/evaluation-tishi.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
</head>
<body>
<div class="tishi-bg">
     <div class="tishi-in">
         <div class="tishi-top">
             <div class="t-t-l">
                 <img src="/cn/images/evaluation/test-logo.png" alt="logo"/>
             </div>
             <div class="t-t-c">
                 GRE ONLINE智能测评初级测评
             </div>
             <div class="t-t-r">
                 <a href="/evaluation.html"><img src="/cn/images/evaluation/test-close.png" alt="关闭图标"/></a>
             </div>
         </div>
         <div class="tishi-con">
             <div class="t-c-center">
                  <h4>此次测评内容</h4>
                 <div class="t-c-border">
                     <ul>
                         <li>
                             <span>•</span>
                             填空3-4题，阅读一篇，数学6题。
                         </li>
                         <li>
                             <span>•</span>
                             本套测试题限时30分钟，请准时完成题目！
                         </li>
                     </ul>
                 </div>
                 <h4>测评要求</h4>
                 <div class="t-c-border">
                     <ul>
                         <li>
                             <span>•</span>
                             关闭QQ等其它可能骚扰你的软件；
                         </li>
                         <li>
                             <span>•</span>
                             禁止使用网络工具查询答案；
                         </li>
                         <li>
                             <span>•</span>
                             请一次性将测评题目完成，建议不要中断；
                         </li>
                         <li>
                             <span>•</span>
                             若超过测评限时，将直接跳转至测评结果页面。
                         </li>
                     </ul>
                 </div>
                 <input type="hidden" id = "type" value="<?php echo $type;?>" />
                 <input type="hidden" id = "questionid" value="<?php echo $doId;?>" />
                 <a href="/evaluation_write/<?php echo $type; ?>-<?php echo $doId; ?>.html" class="come_cp">立即测评</a>
             </div>
         </div>
     </div>
</div>
</body>

</html>