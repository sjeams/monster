<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="GRE题库,GRE真题,GRE机经,GRE题目解析,GRE填空,GRE阅读,GRE逻辑,GRE数学,GRE做题数据分析,错题练习">
    <meta name="description" content="雷哥GRE在线练习题库提供GRE历年真题练习、题目解析、题目讨论，包含verbal语文和quant数学单项练习、考点练习、错题练习，做题练习报告与数据分析，让你高效备考">
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
    <script src="/cn/js/gre_testDe_common.js?v=1"></script>
    <title> <?php echo $questionData['stem'] ?>_GRE在线做题_GRE真题练习_GRE免费做题_做题报告分析_雷哥GRE在线题库</title>
</head>
<body>
<!--遮罩层-->
<div class="log_reg_zzc"></div>
<!--纠错-->
<div class="wrong">
    <div class="wrongTitle">
        报告题目错误
        <i class="fa fa-close" onclick="closeW()"></i>
    </div>
    <div class="wrongContent">
        <h5>请选择错误类型：</h5>
        <select name="">
            <option value="答案错误">答案错误</option>
            <option value="格式有错误">格式有错误</option>
            <option value="题目内容有错误">题目内容有错误</option>
            <option value="其它">其它</option>
        </select>
        <h5>请描述一下这个错误：</h5>
        <textarea class="errorContent" name="" cols="30" rows="10" onfocus="this.value=''"></textarea>
        <br><input type="button" value="确认提交" onclick="ConfirmProblem()">
        <a href="javascript:closeW();">取消</a>
    </div>
</div>
<!--公共quit 弹窗-->
<section class="quit_wrap">
    <div class="tit">Quit <b onclick="quitClose();" class="quitclose">X</b></div>
    <div class="content">Are you sure you want to quit?</div>
    <div class="mt10 mb20 tm">
        <a class="continue" onclick="quitReback()" id="quityes">yes</a>
        <a class="continue" onclick="quitClose();" id="quitno">no</a>
    </div>
</section>
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
<!--内容-->
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="fl">
                    <div><a href="/"><img style="margin-top: -5px;width: 150px" src="/cn/images/gre-logo.png" alt=""></a></div>
                    <div class="topic_name"><?php echo $queString ?></div>
                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div" onclick="wrongTopic(this)"><span class="tool_name" style="line-height: 40px;">纠错</span></div>
                    <div id="ExamQuit" onclick="examQuit();" class="tool_div"><span
                                class="tool_name">Quit<br>w/Save</span></div>
                    <div class="tool_div" onclick="calBtn();">
                        <span class="tool_name">Calc</span>
                        <img src="/cn//images/gre_De/jsq.png" alt="">
                    </div>
                    <div class="tool_div">
                        <a style="display: block;" href="gre_help.html" target="_blank">
                        <span class="tool_name">Help</span>
                        <img src="/cn/images/gre_De/help.png" alt="">
                        </a>
                    </div>
                    <div class="tool_div nextQuestion" onclick="nextQuestion(this);">
                        <span class="tool_name">Next</span>
                        <img src="/cn/images/gre_De/next_cr.png" alt="">
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="clearfix time_handel fr"><span class="test_time fr">00:00:00</span>
                    <div class="hide_time tm fr" onclick="shTime(this);"><span>Hide  Time</span></div>
                </div>
                <h1 class="cur_tit fr">Question <?php echo (isset($result['doNum']) ? $result['doNum'] : 0) + 1 ?>
                    of <?php echo $result['totalNum'] ?></h1>
            </div>
        </div>
        <!--内容-->
        <div class="topic_content bg_f">
            <div class="subMain">
            <div class="dx_wrap">
                <div class="dx_topic"><?php echo $questionData['details'] ?></div>
                <!--                Quantity 版块-->
                <?php
                if ($questionData['quantityA'] && $questionData['quantityB']) {
                    ?>
                    <div class="quantityWap">
                        <div class="int quantityItem">
                            <p class="tm quantityTit">Quantity A</p>

                            <div class="quantity"><?php echo $questionData['quantityA'] ?></div>
                        </div>
                        <div class="int quantityItem">
                            <p class="tm quantityTit">Quantity B</p>

                            <div class="quantity"><?php echo $questionData['quantityB'] ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!--单选-->
                <div class="tm">
                    <div class="form_radio">
                        <?php
                        foreach ($questionData['optionA'] as $k => $v) {
                            ?>
                            <label class="label_row" for="radio<?php echo $k + 1 ?>">
                                <input type="radio" class="input_check" name="answer" id="radio<?php echo $k + 1 ?>">
                                <span class="check_box"></span>
                                <span><?php echo $v ?></span>
                            </label>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="process-bot-tips">
                <div class="hint">Click on your choice(s).</div>
            </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="topicType" data-int="false" value="2"><!--    题型-->
    <input type="hidden" id="useTime" value="">
    <input type="hidden" id="trueAnswer" value="<?php echo $questionData['answer'] ?>">
    <input type="hidden" id="questionId" value="<?php echo $questionData['id'] ?>">
    <input type="hidden" id="libId" value="<?php echo $_GET['libId'] ?>">
</section>
</body>
</html>
