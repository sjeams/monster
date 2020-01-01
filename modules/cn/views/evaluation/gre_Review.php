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
<!--    <title>review</title>-->
</head>
<body>
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">
                    <a href="/"><img src="/cn/images/common-mt/gre-logo.png" alt="logo"/></a>
                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tm fr tool_list clearfix">
                        <div class="tool_div" style="width:102px;margin-right: 20px">
                            <a class="b-w" href="/cn/evaluation/write?id=<?php echo $id;?>&type=<?php echo $type;?>">
                                <span class="tool_name">Return</span>
                                <img src="/cn/images/common-mt/gre-jianwhite02.png" alt="图标"/>
                            </a>
                        </div>
                        <div class="tool_div grey" style="width: 143px" id="gotoBtn">
                            <span class="tool_name">Go To Question</span>
                            <b class="goTo"></b>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clearfix an-title">
                <div class="clearfix fl test_title">
                    测评精选－0<?php echo $type;?> <span></span> Section <?php echo $catid;?> of 3
                </div>
                <h1 class="cur_tit fr centerFont">Question <?php echo $site;?> of <?php echo $total;?></h1>
            </div>
            </div>
        <!--内容-->
        <div class="topic_content bg_f">
            <div class="subMain">
                <div class="dx_wrap">
                    <div class="exit_hint">
                        <div class="hint_con">
                            Following is the list of questions in this section. The question you were on last is highlighted when you
                            enter Review. The Status column shows if a question is Answered, Not Answered, Incomplete, or Not
                            Encountered. A question shows as Incomplete if it requires you to select a specified number of answer
                            choices and you have selected more or fewer than that number. Questions you have marked are indicated
                            with a √   .
                            <br><br>
                            To review a specific question from the list, select the question to highlight it, then select <b>Go to Question</b> at
                            the top of the screen.
                            <br><br>
                            To leave <b>Review</b> and return to where you were in the test, select <b>Return</b>.
                        </div>
                        <div class="hint_table">
                            <div class="hint_border">
                                <table>
                                    <tr>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Marked</th>
                                    </tr>
                                    <?php foreach($contents as $key=>$vv){
                                        if($key < 10 ){?>
                                            <tr data-id="<?php echo $vv['type'].'-'.$vv['questionId'];?>">
                                                <td><?php echo ($key+1);?></td>
                                                <td>
                                                    <?php if($vv['do'] ==1 ){
                                                        if($vv['correct'] == 1){
                                                            echo 'Answered';
                                                        }else{
                                                            echo 'Incomplete';
                                                        }
                                                    }else{
                                                        echo 'Not Answered';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php if($vv['mark'] == 1) echo "√";?></td>
                                            </tr>
                                        <?php }}?>
                                </table>
                            </div>
                            <div class="hint_border">
                                <table>
                                    <tr>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Marked</th>
                                    </tr>
                                    <?php foreach($contents as $key=>$vv){
                                        if($key >= 10 ){?>
                                            <tr data-id="<?php echo $vv['type'].'-'.$vv['questionId'];?>">
                                                <td><?php echo ($key+1);?></td>
                                                <td>
                                                    <?php if($vv['do'] ==1 ){
                                                        if($vv['correct'] == 1){
                                                            echo 'Answered';
                                                        }else{
                                                            echo 'Incomplete';
                                                        }
                                                    }else{
                                                        echo 'Not Answered';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php if($vv['mark'] == 1) echo "√";?></td>
                                            </tr>
                                        <?php }} ?>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</div>
</section>
</body>
<script type="text/javascript">
    $(function () {
        $(".hint_table table tr").click(function () {
            var id=$(this).attr("data-id");
            $("#gotoBtn").removeClass("grey").click(function () {
                window.location.href="/evaluation_write/"+id+".html";
            });
            $(this).addClass("blue").siblings().removeClass("blue").parents(".hint_border").siblings(".hint_border").find("tr").removeClass("blue");
        });
    });
</script>
</html>