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
<!--    <title>做题详情-定项（单选）</title>-->
</head>
<body>
<input type="hidden" value="<?php echo $content['levelId'];?>" id="type"/>
<input type="hidden" value="<?php echo $uid;?>" id="uid"/>
<input type="hidden" value="<?php echo $content['id'];?>" id="questionid"/>
<input type="hidden" id="useTime"/>
<input type="hidden" id="oldTime" value="<?php echo $hastime;?>"/>
<input type="hidden" id="topicType" data-int="false" value="2"><!--    题型-->
<!--公共计算器-->
<div id="CalWrapper" class="cal-wrapper hide" tabindex="-1">
    <div class="cal">
        <div id="CalBar" class="cal-topbar">&nbsp&nbspcalculator <span id="CalCancel" class="cal-cancel">X</span></div>
        <div id="CalInput" class="cal-input" end='1' mem='0'>0</div>
        <div id="CalBtnWrapper" class="cal-btn-wrapper">
            <a href="javascript:;" class="cal-btn CalBtn">MR</a>
            <a href="javascript:;" class="cal-btn CalBtn">MC</a>
            <a href="javascript:;" class="cal-btn CalBtn">M+</a>
            <a href="javascript:;" class="cal-btn CalBtn">(</a>
            <a href="javascript:;" class="cal-btn CalBtn">)</a>
            <a href="javascript:;" class="cal-btn CalBtn">7</a>
            <a href="javascript:;" class="cal-btn CalBtn">8</a>
            <a href="javascript:;" class="cal-btn CalBtn">9</a>
            <a href="javascript:;" class="cal-btn CalBtn">÷</a>
            <a href="javascript:;" class="cal-btn CalBtn">C</a>
            <a href="javascript:;" class="cal-btn CalBtn">4</a>
            <a href="javascript:;" class="cal-btn CalBtn">5</a>
            <a href="javascript:;" class="cal-btn CalBtn">6</a>
            <a href="javascript:;" class="cal-btn CalBtn">x</a>
            <a href="javascript:;" class="cal-btn CalBtn">CE</a>
            <a href="javascript:;" class="cal-btn CalBtn">1</a>
            <a href="javascript:;" class="cal-btn CalBtn">2</a>
            <a href="javascript:;" class="cal-btn CalBtn">3</a>
            <a href="javascript:;" class="cal-btn CalBtn">-</a>
            <a href="javascript:;" class="cal-btn CalBtn">√</a>
            <a href="javascript:;" class="cal-btn CalBtn">±</a>
            <a href="javascript:;" class="cal-btn CalBtn">0</a>
            <a href="javascript:;" class="cal-btn CalBtn">.</a>
            <a href="javascript:;" class="cal-btn CalBtn">+</a>
            <a href="javascript:;" class="cal-btn CalBtn">=</a>
        </div>
        <div class="cal-bottom">Transfer Display</div>
    </div>
</div>
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
<!--                        <a class="b-w" href="/cn/evaluation/quit?type=--><?php //echo $content['levelId'];?><!--&id=--><?php //echo $content['id'];?><!--&site=--><?php //echo $content['site'];?><!--&total=--><?php //echo $content['total']?><!--&catid=--><?php //echo $content['catId'];?><!--"><span class="tool_name">Quit w/Save</span>-->
<!--                            <img src="/cn/images/common-mt/gre-micon02.png" alt="图标"/>-->
<!---->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="tool_div" style="position: relative">-->
<!--                        <span class="tool_name">Mark</span>-->
<!--                        <div class="group_check">-->
<!--                            <input type="checkbox" name="rad" id="rad03" --><?php //if($mark==1){ echo 'checked';}?><!--/>-->
<!--                            <label for="rad03"></label>-->
<!--                        </div>-->
<!--                        <!--<img src="/cn/images/common-mt/gre-micon03.png" alt="图标"/>-->
<!--                    </div>-->
<!--                    <div class="tool_div">-->
<!--                        <a class="b-w" href="/cn/evaluation/review?type=--><?php //echo $content['levelId'];?><!--&uid=--><?php //echo $uid;?><!--&id=--><?php //echo $content['id'];?><!--&site=--><?php //echo $content['site'];?><!--&total=--><?php //echo $content['total']?><!--&catid=--><?php //echo $content['catId'];?><!--">-->
<!--                            <span class="tool_name">Review</span>-->
<!--                           <img src="/cn/images/common-mt/gre-micon04.png" alt="图标"/>-->
<!--                        </a>-->
<!--                    </div>-->
                    <div class="tool_div" onclick="calBtn();">
                        <span class="tool_name">Cale</span>
                        <img src="/cn/images/common-mt/gre-micon07.png" alt="图标"/>
                    </div>
                    <div class="tool_div" style="margin-right: 20px" onclick="helpA(this)">
                        <span class="tool_name">Help</span>
                        <img src="/cn/images/common-mt/gre-micon05.png" alt="图标"/>
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
               <div class="dx_wrap">
                   <div class="dx_topic">
                       <?php echo $content['details'];?>
                   </div>
                   <?php if($content["quantityA"]){?>
                   <div class="dx_topic">
                       <div>
                           <h4>Quantity A</h4>
                           <p><?php echo $content['quantityA'];?></p>
                       </div>
                       <div>
                           <h4>Quantity B</h4>
                           <p><?php echo $content['quantityB'];?></p>
                       </div>
                   </div>
                   <?php } ?>
                   <!--单选-->
                   <div class="tm">
                       <div class="form_radio">
                           <?php foreach($content['options'] as $k => $v){?>
                               <label class="label_row" for="radio<?php echo $k?>">
                                   <input type="radio" class="input_check" name="answer" id="radio<?php echo $k?>">
                                   <span class="check_box"></span>
                                   <span><?php echo $v; ?></span>
                               </label>
                           <?php } ?>
                       </div>
                   </div>

               </div>
               <div class="hint">Click on your choice.</div>
           </div>
        </div>
    </div>
</section>
</body>
</html>
