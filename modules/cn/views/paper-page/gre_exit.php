<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
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
    <link rel="stylesheet" href="/cn/css/gre_testDe.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <title>做题详情-退出</title>
</head>
<body>
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">陈琦36套-阅读 &nbsp;&nbsp;RC-e2hqsj</div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div">
                        <span class="tool_name return">Return</span>
                    </div>
                    <div class="tool_div">
                        <span class="tool_name">Exit<br>Set</span>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="clearfix time_handel fr">
                    <span class="test_time fr">00:00:00</span>
                    <div class="hide_time tm fr"><span>Hide  Time</span></div>
                </div>
                <h1 class="cur_tit fr">Question 3 of 8</h1>
            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
            <div class="dx_wrap">
                <div class="exit_hint">If you click <b>Exit Set</b>,you will see your resul. Or,click <b>Return</b> to
                    return to the previous question in this
                    practice set.
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    $(function () {
        $('.hide_time').click(function () {
            $(this).toggleClass('on');
            if($(this).hasClass('on')){
                $('.test_time').hide();
                $(this).html('<span>Show Time</span>');
            }else {
                $('.test_time').show();
                $(this).html('<span>Hide Time</span>');
            }
        })
    })
</script>
</html>