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
    <link rel="stylesheet" href="/cn/css/evaluation.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
</head>
<body>
<div class="evaluation-top">
     <div class="eva-in">
         <div class="eva-left">
             <h2>GRE  ONLINE智能测评</h2>
             <p>根据你的GRE基础情况，选择适合你的测评题目 <br/>
                 测评后，自动显示测评分数报告及详细复习计划！</p>
         </div>
         <div class="eva-right">
             <img src="/cn/images/evaluation/test-top.png" alt="图标"/>
         </div>
     </div>
</div>
<div class="evaluation-center">
    <input type="hidden" id = "uid" value = "<?php echo $uid; ?>" />
    <ul>
        <li>
            <h4>雷哥GRE ONLINE智能测评初级测评</h4>
            <span>
                （未考过GRE） <br/>
                测试
                完后可查看做题结果
            </span>
            <div class="grey_div">
                <p>测试时间：30分钟</p>
                <p>题目来源：精选真题</p>
            </div>
            <input type="hidden" id = "isDo" value="<?php if(isset($one[0]))echo $one[0]; ?>" />
            <input type="hidden" id = "doId" value="<?php if(isset($one[1])) echo $one[1]; ?>" />
            <a href="javascript:void(0);" onclick="testTi()">立即测评</a>

        <li>
            <h4>雷哥GRE ONLINE智能测评中级测评</h4>
            <span>
                （备考过GRE/考过GRE不理想） <br/>
               测试完后可查看做题结果
            </span>
            <div class="grey_div">
                <p>测试时间：30分钟</p>
                <p>题目来源：精选真题</p>
            </div>
            <input type="hidden" id = "isDo02" value="<?php if(isset($two[0])) echo $two[0]; ?>" />
            <input type="hidden" id = "doId02" value="<?php if(isset($two[1])) echo $two[1]; ?>" />
            <a href="javascript:void(0);" onclick="testTi02()">立即测评</a>
        </li>
    </ul>
</div>
<div class="bot-bolang">
    <div class="bl-bg01 swing01"></div>
    <div class="bl-bg02 swing02"></div>
    <div class="bl-bg03 swing03"></div>
</div>

</body>
<script type="text/javascript">
    function testTi(){
        var uid=$("#uid").val();
        var isDo=$("#isDo").val();
        var id=$("#doId").val();
        if(!uid){
            loginHref();
            return false;
        }
        if(isDo==1){
//            alert("你已经做过这个测评，不能再做了哦！");
//            window.location.href="/cn/evaluation/result?uid="+uid+"&type=1";
            window.location.href="/evaluation_result/1-"+uid+".html";
            return false;
        }
        window.location.href="/cn/evaluation/prompt?type=1&doId="+id;
//        window.location.href="/evaluation_write/1-"+id+".html";
    }
    function testTi02(){
        var uid=$("#uid").val();
        var isDo02=$("#isDo02").val();
        var id=$("#doId02").val();
        if(!uid){
            loginHref();
            return false;
        }
        if(isDo02==1){
//            alert("你已经做过这个测评，不能再做了哦！");
//            window.location.href="/cn/evaluation/result?uid="+uid+"&type=2";
            window.location.href="/evaluation_result/2-"+uid+".html";
            return false;
        }
        window.location.href="/cn/evaluation/prompt?type=2&doId="+id;
//        window.location.href="/evaluation_write/2-"+id+".html";
    }
</script>
</html>