<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台</title>
    <meta name="keywords" content="GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2">
    <meta name="description" content="雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析">
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
    <link rel="stylesheet" href="/cn/css/gre_MoldDe.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/gre_exam_time.js"></script>
<!--    <title>休息十分钟</title>-->
</head>
<body>
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">
                    <a href="/"><img src="/cn/images/mold/gre-logo.png" alt="logo"/></a>
                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div" style="width:102px;">
                        <a href="<?php echo $access;?>" class="b-w continue">
                            <span class="tool_name">Continue</span>
                            <img src="/cn/images/mold/gre-jianwhite.png" alt="图标"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix an-title">
                <div class="clearfix fl test_title">
                    <?php echo $mockName;?> <span></span> Section <?php echo $sectionSite['site'];?> of <?php echo $sectionSite['totalCount'];?>
                </div>
                <div class="clearfix time_handel fr">
                    <span class="test_time fr thirtySeconds">00:10:00</span>
                    <!--                    <div class="hide_time tm fr"><span>Hide  Time</span></div>-->
                </div>
            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
           <div class="subMain">
               <div class="dx_wrap">
                   <div class="exit_hint" style="padding-bottom: 250px;">
                       You may now take a 10-minute (standard time) break. <br>
                       The test will automatically continue when the pause time expires.<br>
                       If you do not wish to pause, select <b>Continue</b> now.
                   </div>
               </div>
           </div>
        </div>
    </div>
</section>
</body>
<script type="text/javascript">
    $(function () {
        secondsDJS(600);//10分钟
    });
</script>
</html>