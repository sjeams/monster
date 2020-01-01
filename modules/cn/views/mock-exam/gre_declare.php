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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/gre_MoldDe.css">
    <script src="../js/jquery-1.12.2.min.js"></script>
<!--    <title>模考说明页【数学、全套、语文】</title>-->
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
                   <!--数学/语文特有-->
                    <?php if($type < 3){?>
<!--                    <div class="tool_div diffW">-->
<!--                        <span class="tool_name">Exit Section</span>-->
<!--                        <img src="/cn/images/mold/gre-micon01.png" alt="图标"/>-->
<!--                    </div>-->
<!--                    <div class="tool_div diffW" style="margin-right: 20px">-->
<!--                        <a href="/mockExam.html" class="b-w">-->
<!--                            <span class="tool_name">Quit w/Save</span>-->
<!--                            <img src="/cn/images/mold/gre-micon02.png" alt="图标"/>-->
<!--                        </a>-->
<!--                    </div>-->
                    <!--数学/语文特有 end-->
                    <!--数学特有-->
                        <?php if($type == 2){?>
<!--                        <div class="tool_div">-->
<!--                            <span class="tool_name">Cale</span>-->
<!--                            <img src="/cn/images/mold/gre-micon07.png" alt="图标"/>-->
<!--                        </div>-->
                        <?php } ?>
                    <!--数学特有 end-->
                    <!--数学/语文特有-->
                    <div class="tool_div" style="margin-right: 20px">
                        <a href="/cn/mock-exam/help?acc=declare&type=<?php echo $type;?>&mockExamId=<?php echo $mockExamId;?>" class="b-w">
                            <span class="tool_name">Help</span>
                            <img src="/cn/images/mold/gre-micon05.png" alt="图标"/>
                        </a>
                    </div>
                    <?php } ?>
                    <!--数学/语文特有 end-->
                    <div class="tool_div" style="width:102px;">
                        <a href="/mockTopic/<?php echo $mockExamId;?>.html" class="b-w">
                            <span class="tool_name">Continue</span>
                            <img src="/cn/images/mold/gre-jianwhite.png" alt="图标"/>
                        </a>
                    </div>

                </div>
            </div>
            <div class="clearfix" style="height:47px;padding: 10px;box-sizing: border-box;">

            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
          <div class="subMain">
              <div class="declare-con">
                  <!--全套说明-->
                  <?php if($type == 3){?>
                      <h2>模考说明</h2>
                      <h4>真实考试时间说明：</h4>
                      <p>
                          · 两个语文部分，每部分20题，每部分时长30分钟。<br/>
                          · 两个数学部分，每部分20题，每部分时长35分钟。<br/>
                          · 第三个section会有一个10分钟的休息，其余各个部分之间有1分钟的间隔；同学们可以选择跳过休息；<br/>
                          · 全套模考结束，预计时间130分钟-143分钟，约2小时20分钟；<br/>
                          · 模考结束，自动出具模考分数及详细分析报告。
                      </p>
                      <h4>雷哥GRE全套模考流程与时间说明，共有4个部分：</h4>
                      <p>
                          新GRE考试总耗时约为3小时45分钟，外加考生中场休息时间，共有6个部分：<br/>
                          · 一个分析性写作部分，包含两项计时写作任务；<br/>
                          · 两个语文部分;<br/>
                          · 两个数学部分;<br/>
                          · 一个不计入总分的部分(语文或者数学，可能在考试过程中任何位置出现);<br/>
                          · 第三个section之后会有一个10分钟的休息，其余各个部分之间有1分钟的间隔;<br/>
                          · 进入真实考试界面之后，与模考界面基本类似，直接各种continue就行了。
                      </p>
                      <h4>雷哥GRE模考界面说明：</h4>
                      <p>
                          · 每个题目页面，会有答题说明；<br>
                          · 数学题目界面提供计算器；<br>
                          · 每个section内可使用review按钮返回复习检查；<br>
                          · 每个题目可收藏，收藏记录会保留；<br>
                          · 可随时退出模考，建议同学们一次性完成，练习pace；<br>
                          · 在考试过程中，请不要关闭浏览器、关机或者中断网络，这样做会导致部分记录无效。 如有这样的问题，<br>
                          &nbsp;&nbsp;请到"我的记录"->"模考记录"重新开始模考。
                      </p>
                  <?php }elseif($type == 2){?>
                      <!--数学说明-->
                      <h2>数学模考说明</h2>
                      <!--数学说明-->
                      <h4>雷哥GRE数学模考流程与时间说明，共有2个部分</h4>
                      <p>
                          · 两个数学部分，每部分20题，每部分时长35分钟。<br/>
                          · 两个section之间有1分钟的间隔；同学们可以选择跳过休息；<br/>
                          · 全套模考结束，预计时间70分钟，约1小时10分钟；<br/>
                          · 模考结束，自动出具模考分数及详细分析报告。

                      </p>
                      <h4>雷哥GRE模考界面说明：</h4>
                      <p>
                          · 每个题目页面，会有答题说明；<br/>
                          · 数学题目界面提供计算器；<br/>
                          · 每个section内可使用review按钮返回复习检查；<br/>
                          · 每个题目可收藏，收藏记录会保留；<br/>
                          · 可随时退出模考，建议同学们一次性完成，练习pace；<br/>
                          · 在考试过程中，请不要关闭浏览器、关机或者中断网络，这样做会导致部分记录无效。 如有这样的问题，<br/>
                          &nbsp;&nbsp;请到"我的记录"->"模考记录"重新开始模考。
                      </p>
                  <?php }else{?>
                      <!--语文说明-->
                      <h2>语文模考说明</h2>
                      <!--语文说明-->
                      <h4>雷哥GRE语文模考流程与时间说明，共有2个部分：</h4>
                      <p>
                          · 两个语文部分，每部分20题，每部分时长30分钟。<br/>
                          · 两个section之间有1分钟的间隔；同学们可以选择跳过休息；<br/>
                          · 全套模考结束，预计时间60分钟，约1小时；<br/>
                          · 模考结束，自动出具模考分数及详细分析报告。

                      </p>
                      <h4>雷哥GRE模考界面说明：</h4>
                      <p>
                          · 每个题目页面，会有答题说明；<br/>
                          · 每个section内可使用review按钮返回复习检查；<br/>
                          · 每个题目可收藏，收藏记录会保留；<br/>
                          · 可随时退出模考，建议同学们一次性完成，练习pace；<br/>
                          · 在考试过程中，请不要关闭浏览器、关机或者中断网络，这样做会导致部分记录无效。 如有这样的问题，<br/>
                          &nbsp;&nbsp;请到"我的记录"->"模考记录"重新开始模考。
                      </p>
                  <?php } ?>
              </div>
          </div>
        </div>
    </div>
</section>
</body>
</html>