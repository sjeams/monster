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
    <link rel="stylesheet" href="/cn/css/gre_MoldDe.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
<!--    <title>做题详情-quit</title>-->
</head>
<body>
<input type="hidden" value="<?php echo $type;?>" id="type"/>
<input type="hidden" value="<?php echo $uid;?>" id="uid"/>
<input type="hidden" value="<?php echo $id;?>" id="questionid"/>
<input type="hidden" value="<?php echo $hastime;?>" id="hastime"/>
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">
                    <a href="/"><img src="/cn/images/common-mt/gre-logo.png" alt="logo"/></a>
                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div" style="width:102px;margin-right: 20px">
                        <a class="b-w" href="/cn/evaluation/write?id=<?php echo $id;?>&type=<?php echo $type;?>">
                            <span class="tool_name">Return</span>
                           <img src="/cn/images/common-mt/gre-jianwhite02.png" alt="图标"/>
                        </a>
                    </div>
                    <div class="tool_div diffW" onclick="quitTest()">
                        <span class="tool_name">Quit Test</span>
                        <img src="/cn/images/common-mt/gre-micon01.png" alt="图标"/>
                    </div>
                </div>
            </div>
            <div class="clearfix an-title">
                <div class="clearfix fl test_title">
                    测评精选－0<?php echo $type;?> <span></span> Section <?php echo $catid;?> of 3
                </div>
                <h1 class="cur_tit fr centerFont">Question <?php echo $site;?> of <?php echo $total;?> </h1>
            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
            <div class="subMain">
                <div class="dx_wrap">
                    <div class="exit_hint" style="padding-bottom: 250px;">
                        In this practice test, if you quit the test your answers will be saved and you will be saved and you will be
                        able to restart the test at the point you left off
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    function quitTest() {
        var uid=$("#uid").val();
        var type=$("#type").val();
        var questionid=$("#questionid").val();
        var hastime=$("#hastime").val();
        $.ajax({
            url:"/cn/api/quit-save",
            type:"post",
            data:{
                uid:uid,
                questionid:questionid,
                type:type,
                hastime:hastime
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    window.location.href="/evaluation.html";
                }else{
                    alert(data.message);
                }
            }
        });
    }
</script>
</html>