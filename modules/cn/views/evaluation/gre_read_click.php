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
    <script src="/cn/js/gre_evaluation_common.js?v=1"></script>
<!--    <title>做题详情-阅读点选</title>-->
</head>
<body>
<input type="hidden" value="<?php echo $content['levelId'];?>" id="type"/>
<input type="hidden" value="<?php echo $uid;?>" id="uid"/>
<input type="hidden" value="<?php echo $content['id'];?>" id="questionid"/>
<input type="hidden" id="useTime"/>
<input type="hidden" id="oldTime" value="<?php echo $hastime;?>"/>
<input type="hidden" id="topicType" data-int="false" value="5"><!--    题型-->
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">
                    <a href="/"><img src="/cn/images/common-mt/gre-logo.png" alt="logo"/></a>
                    <input type="hidden" id = "catId" value = "<?php echo $content['catId']; ?>" />
                    <input type="hidden" id = "knowId" value = "<?php echo $content['knowId']; ?>" />

                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div diffW" onclick="exitSectionA(this)" data-site="<?php echo $content['site'];?>"
                         data-total="<?php echo $content['total']?>" data-catid="<?php echo $content['catId'];?>">
                        <span class="tool_name">Exit Section</span>
                        <img src="/cn/images/common-mt/gre-micon01.png" alt="图标"/>
                    </div>
                    <div class="tool_div diffW" style="margin-right: 20px" onclick="quitSave(this)" data-site="<?php echo $content['site'];?>"
                         data-total="<?php echo $content['total']?>" data-catid="<?php echo $content['catId'];?>">
                        <span class="tool_name">Quit w/Save</span>
                        <img src="/cn/images/common-mt/gre-micon02.png" alt="图标"/>
                    </div>
<!--                    <div class="tool_div diffW" style="margin-right: 20px">-->
<!--                        <a class="b-w"  href="/cn/evaluation/quit?type=--><?php //echo $content['levelId'];?><!--&id=--><?php //echo $content['id'];?><!--&site=--><?php //echo $content['site'];?><!--&total=--><?php //echo $content['total']?><!--&catid=--><?php //echo $content['catId'];?><!--"><span class="tool_name">Quit w/Save</span>-->
<!--                            <img src="/cn/images/common-mt/gre-micon02.png" alt="图标"/>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="tool_div" style="position: relative">-->
<!--                        <span class="tool_name">Mark</span>-->
<!--                        <div class="group_check">-->
<!--                            <input type="checkbox" name="rad" id="rad03" --><?php //if($mark==1){ echo 'checked';}?><!--/>-->
<!--                            <label for="rad03"></label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="tool_div">-->
<!--                        <a class="b-w" href="/cn/evaluation/review?type=--><?php //echo $content['levelId'];?><!--&uid=--><?php //echo $uid;?><!--&id=--><?php //echo $content['id'];?><!--&site=--><?php //echo $content['site'];?><!--&total=--><?php //echo $content['total']?><!--&catid=--><?php //echo $content['catId'];?><!--"><span class="tool_name">Review</span>-->
<!--                            <img src="/cn/images/common-mt/gre-micon04.png" alt="图标"/>-->
<!--                        </a>-->
<!--                    </div>-->
                    <div class="tool_div" style="margin-right: 20px">
                        <a href="/cn/evaluation/help?type=<?php echo $content['levelId'];?>&id=<?php echo $content['id'];?>&hastime=<?php echo $hastime;?>" class="b-w">
                            <span class="tool_name">Help</span>
                            <img src="/cn/images/common-mt/gre-micon05.png" alt="图标"/>
                        </a>
                    </div>
                    <div class="tool_div" id="nextQ-btn">
                        <input type="hidden" id='nextid' value="<?php echo $content['nextid'];?>">
                        <?php if($content['nextid']==0){?>
                            <span class="tool_name">提交</span>
                            <span class="tool_name">√</span>
                        <?php }else{?>
                            <span class="tool_name">Next</span>
                            <b class="next"></b>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="clearfix an-title">
                <input type="hidden" id="uid" value="<?php echo $uid;?>">
                <div class="clearfix fl test_title">
                    测评精选－0<?php echo $content['levelId'];?> <span></span> Section <?php echo $content['catId'];?> of 3
                </div>
                <div class="clearfix time_handel fr">
                    <span class="test_time fr">00:<?php echo $times[0];?>:<?php echo $times[1];?></span>
                    <div class="hide_time tm fr"><span>Hide  Time</span></div>
                </div>
                <h1 class="cur_tit fr centerFont">Question <?php echo $content['site'];?> of <?php echo $content['total'];?></h1>
            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
            <div class="subMain">
                <div class="read_left fl">
<!--                    <div class="test_passage">Questions 1,2,3 are based on this passage</div>-->
                    <div class="read_topic_left scroll_wrap" id="exam_message">
                        <!--提取编辑器HTML-->
                        <?php foreach($content['readArticles'] as $k =>$v ){?>
                           <span><?php if(!empty($v))echo $v.'.';?></span>
                        <?php }?>
                    </div>
                </div>
                <div class="read_right scroll_wrap fr">
                    <div class="read_topic_right">
                        <?php echo $content['details'];?>
                    </div>
                </div><div class="clearfixd"></div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    $(function () {
//        点选句子样式控制
        $('#exam_message span').click(function () {
                $(this).addClass('sent-black').siblings('span').removeClass('sent-black');
            }
        )
    })
</script>
</html>
