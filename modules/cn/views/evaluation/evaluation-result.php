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
    <link rel="stylesheet" href="/cn/css/evaluation-result.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
</head>
<body>
<div class="record-test">
    <div class="flex-center">
        <div class="record-t-left">
            <img src="/cn/images/evaluation/test-rPerson.png" alt="图标"/>
        </div>
        <div class="record-t-right">
            <div class="title-s an-flex">
                <h2><?php echo $nickname;?><span>你好，以下是你的测评得分(<?php if($type == 1)echo '初级测评';else echo '中级测评';?>)：</span></h2>
                <!--            总分-->
                <div class="totalScore">
                    <?php echo $totalsca;?>分
                </div>
            </div>
            <div class="t-purple">
                <ul>
                    <li>
                        <div class="circle">
                            <div class="pie_left"><div class="left"></div></div>
                            <div class="pie_right"><div class="right"></div></div>
                            <div class="mask"><span><?php echo $correctRates[0];?></span>%</div>
                        </div>
                        <p>测评正确率</p>
                    </li>
                    <li>
                        <div class="circle">
                            <div class="pie_left"><div class="left"></div></div>
                            <div class="pie_right"><div class="right"></div></div>
                            <div class="mask"><span><?php echo $correctRates[1];?></span>%</div>
                            <input type="hidden" id="verbal" value="<?php echo $correctRates[3];?>" />
                        </div>
                        <p>Verbal正确率</p>
                    </li>
                    <li>
                        <div class="circle">
                            <div class="pie_left"><div class="left"></div></div>
                            <div class="pie_right"><div class="right"></div></div>
                            <div class="mask"><span><?php echo $correctRates[2];?></span>%</div>
                            <input type="hidden" id="verbal" value="<?php echo $correctRates[4];?>" />
                        </div>
                        <p>Quant正确率</p>
                    </li>
                </ul>
            </div>
            <div class="record-jibai">
                <img src="/cn/images/evaluation/test-rJian.png" alt="图标"/>
                你击败了<?php echo $beatcount;?>人
            </div>

        </div>
    </div>
    <div class="record-result-con">
        <ul>
            <?php foreach($datas as $yy => $vva) { ?>
                <li>
                    <div class="r-c-left" id="<?php echo $yy;?>">
                        <h4>
                            <?php if($yy == 0) echo "填空";elseif($yy == 1) echo '阅读'; elseif($yy == 2) echo '数学';?>
                        </h4>
                        <span>正确个数：<?php echo $counts[$yy]['correct']; ?>/<?php echo $counts[$yy]['total']; ?></span>
                    </div>
                    <div class="r-c-right">
                        <input type="hidden" id="<?php echo $yy;?>">
                        <ul>
                            <?php foreach($vva as $k => $v){?>
                                <li>
                                    <!--                                    <div class="purple_mask">-->
                                    <!--                                        <a href="#">查看题目详情</a>-->
                                    <!--                                    </div>-->
                                    <div class="bot_info">
                                        <div class="info_num <?php if ($v['correct'] == 0) echo 'red'; ?> ">
                                            <?php echo($k + 1); ?>
                                        </div>
                                        <div class="info_English">
                                            <?php if ($v['typeId'] == 7) { ?>
                                                <p>点选句子</p>
                                            <?php } else { ?>
                                                <p>我的答案：<?php echo $v['useranswer']; ?></p>
                                                <p>正确答案：<?php echo $v['correctanswer']; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--                                底部遮挡线-->
                                    <div class="bot_zd_xian"></div>
                                    <!--                                题目详情下拉-->
                                    <div class="timu_details">
                                        <?php if ($v['typeId'] == 1) { ?>
                                            <!--                                    单空-->
                                            <div class="dx_wrap">
                                                <div class="dx_topic">
                                                    <?php echo $v['details']; ?>
                                                </div>
                                                <div class="tm dk_select_wrap">
                                                    <ul class="dk_select">
                                                        <?php
                                                        /**
                                                         * 数字转字母 （类似于Excel列标）
                                                         * @param Int $index 索引值
                                                         * @param Int $start 字母起始值
                                                         * @return String 返回字母
                                                         */
                                                        function IntToChr($index, $start = 65)
                                                        {
                                                            $str = '';
                                                            if (floor($index / 26) > 0) {
                                                                $str .= IntToChr(floor($index / 26) - 1);
                                                            }
                                                            return $str . chr($index % 26 + $start);
                                                        }

                                                        ?>
                                                        <?php foreach ($v['options'] as $key => $value) {
                                                            echo "<li class=";
                                                            if (IntToChr($key) == $v['correctanswer']) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswer'] != $v['correctanswer'] && IntToChr($key) == $v['useranswer']) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 2) { ?>
                                            <!--                                    双空-->
                                            <div class="dx_wrap">
                                                <div class="dx_topic">
                                                    <?php echo $v['details']; ?>
                                                </div>
                                                <div class="tm dk_select_wrap double_set">
                                                    <ul class="dk_select">
                                                        <?php foreach ($v['optionsA'] as $key => $value) {
                                                            echo "<li class=";
                                                            if (IntToChr($key) == $v['correctanswers'][0]) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswers'][0] != $v['correctanswers'][0] && IntToChr($key) == $v['useranswers'][0]) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                    <ul class="dk_select">
                                                        <?php foreach ($v['optionsB'] as $key => $value) {
                                                            $ke = $key + count($v['optionsA']);
                                                            echo "<li class=";
                                                            if (IntToChr($ke) == $v['correctanswers'][1]) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswers'][1] != $v['correctanswers'][1] && IntToChr($ke) == $v['useranswers'][1]) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 3) { ?>
                                            <!--                                    三空-->
                                            <div class="dx_wrap">
                                                <div class="dx_topic">
                                                    <?php echo $v['details']; ?>
                                                </div>
                                                <div class="tm dk_select_wrap">
                                                    <ul class="dk_select">
                                                        <?php foreach ($v['optionsA'] as $key => $value) {
                                                            echo "<li class=";
                                                            if (IntToChr($key) == $v['correctanswers'][0]) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswers'][0] != $v['correctanswers'][0] && IntToChr($key) == $v['useranswers'][0]) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                    <ul class="dk_select">
                                                        <?php foreach ($v['optionsB'] as $key => $value) {
                                                            $ke = $key + count($v['optionsA']);
                                                            echo "<li class=";
                                                            if (IntToChr($ke) == $v['correctanswer'][1]) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswers'][1] != $v['correctanswers'][1] && IntToChr($ke) == $v['useranswers'][1]) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                    <ul class="dk_select">
                                                        <?php foreach ($v['optionsC'] as $key => $value) {
                                                            $ke = $key + count($v['optionsA']) + count($v['optionsB']);
                                                            echo "<li class=";
                                                            if (IntToChr($ke) == $v['correctanswers'][2]) {
                                                                echo "'green'";
                                                            }
                                                            if ($v['useranswers'][2] != $v['correctanswers'][2] && IntToChr($ke) == $v['useranswers'][2]) {
                                                                echo "'red'";
                                                            }
                                                            echo ">" . $value . " </li>";
                                                        } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 5) { ?>
                                            <!--                                    阅读5选1-->
                                            <div class="dx_wrap">
                                                <div class="read_left fl">
                                                    <div class="read_topic_left scroll_wrap" id="exam_message">
                                                        <?php echo $v['readArticle']; ?>
                                                    </div>
                                                </div>
                                                <div class="read_right fr">
                                                    <div class="read_topic_right scroll_wrap">
                                                        <div class="tm read_right_hint">Consider each of the choices
                                                            separately and select all that apply.
                                                        </div>
                                                        <div class="r_read_tg">
                                                            <?php echo $v['details']; ?>
                                                        </div>
                                                        <!--选项-->
                                                        <div class="form_radio">
                                                            <?php foreach ($v['options'] as $key => $value) { ?>
                                                                <label class="label_row
                                                    <?php
                                                                if (IntToChr($key) == $v['correctanswer']) {
                                                                    echo 'green';
                                                                }
                                                                if (IntToChr($key) == $v['useranswer'] && $v['correctanswer'] != $v['useranswer']) {
                                                                    echo 'red';
                                                                }
                                                                ?>
                                                     " for="radio1">
                                                                    <!--                                                            <input type="radio" class="input_check" name="answer" id="radio1">-->
                                                                    <span class="check_box"></span>
                                                                    <span><?php echo $value ?></span>
                                                                </label>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfixd"></div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 4 || $v['typeId'] == 9) { ?>
                                            <!--                                    6选2 、不定项（多选）-->
                                            <div class="dx_wrap">
                                                <div class="onlyFont">
                                                    <?php echo $v['details']; ?>
                                                </div>
                                                <!--6选2-->
                                                <div class="tm">
                                                    <div class="form_check">
                                                        <?php foreach ($v['options'] as $key => $value) { ?>
                                                            <label class="label_row
                                                        <?php
                                                            foreach ($v['correctanswers'] as $ky => $kv) {
                                                                if (IntToChr($key) == $kv) {
                                                                    echo "green ";
                                                                }
                                                            }
                                                            foreach ($v['useranswers'] as $kyy => $kvv) {
                                                                if (IntToChr($key) == $kvv) {
                                                                    foreach ($v['correctanswers'] as $kj => $kn) {
                                                                        if ($kvv != $kn) {
                                                                            echo 'red ';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                  " for="check1">
                                                                <!--                                                            <input type="checkbox" class="input_check" id="check1">-->
                                                                <span class="check_box"></span>
                                                                <span><?php echo $value ?></span>
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 8) { ?>
                                            <!--                                        定项（单选）-->
                                            <div class="dx_wrap">
                                                <div class="dx_topic"><?php echo $v['details']; ?></div>
                                                <?php if ($v["quantityA"]) { ?>
                                                    <div class="dx_topic">
                                                        <div>
                                                            <h4>Quantity A</h4>
                                                            <p><?php echo $v['quantityA']; ?></p>
                                                        </div>
                                                        <div>
                                                            <h4>Quantity B</h4>
                                                            <p><?php echo $v['quantityB']; ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!--单选-->
                                                <div class="tm">
                                                    <div class="form_radio">
                                                        <?php foreach ($v['options'] as $key => $value) { ?>
                                                            <label class="label_row
                                                    <?php
                                                            if (IntToChr($key) == $v['correctanswer']) {
                                                                echo 'green ';
                                                            }
                                                            if (IntToChr($key) == $v['useranswer'] && $v['correctanswer'] != $v['useranswer']) {
                                                                echo 'red ';
                                                            }
                                                            ?>
                                                    " for="radio2">
                                                                <!--                                                            <input type="radio" class="input_check" name="answer" id="radio2">-->
                                                                <span class="check_box"></span>
                                                                <span><?php echo $value ?></span>
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 7) { ?>
                                            <!--                                    阅读点选-->
                                            <div class="dx_wrap">
                                                <div class="onlyFont" id="exam_message">
                                                    <!--提取编辑器HTML-->
                                                    <?php
                                                    foreach ($v['readArticles'] as $ki => $kl) {
                                                        ?>

                                                        <span class="
                                                           <?php
                                                        if ($v['correctanswer'] == trim($kl . '.')) {
                                                            echo "green";
                                                        }
                                                        if ($v['useranswer'] == trim($kl . '.') && $v['correctanswer'] != $v['useranswer']) {
                                                            echo "red";
                                                        }
                                                        ?>
                                                    "><?php echo $kl . '.'; ?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 6) { ?>
                                            <!--                                 (数学)   阅读多选-->
                                            <div class="dx_wrap">
                                                <div class="read_left fl">
                                                    <div class="read_topic_left scroll_wrap" id="exam_message">
                                                        <?php echo $v['readArticle']; ?>
                                                    </div>
                                                </div>
                                                <div class="read_right fr">
                                                    <div class="read_topic_right scroll_wrap">
                                                        <div class="tm read_right_hint">Consider each of the choices
                                                            separately and select all that apply.
                                                        </div>
                                                        <div class="r_read_tg">
                                                            <?php echo $v['details']; ?>
                                                        </div>
                                                        <!--选项-->
                                                        <div class="form_check">
                                                            <?php foreach ($v['options'] as $key => $value) { ?>
                                                                <label class="label_row
                                                            <?php
                                                                foreach ($v['correctanswers'] as $ky => $kv) {
                                                                    if (IntToChr($key) == $kv) {
                                                                        echo "green ";
                                                                    }
                                                                }
                                                                foreach ($v['useranswers'] as $kyy => $kvv) {
                                                                    if (IntToChr($key) == $kvv) {
                                                                        foreach ($v['correctanswers'] as $kj => $kn) {
                                                                            if ($kvv != $kn) {
                                                                                echo 'red ';
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            " for="check2">
                                                                    <!--                                                                    <input type="checkbox" class="input_check" id="check2">-->
                                                                    <span class="check_box"></span>
                                                                    <span><?php echo $value ?></span>
                                                                </label>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="clearfixd"></div>
                                            </div>
                                        <?php } elseif ($v['typeId'] == 10) { ?>
                                            <!--                                    填空-->
                                            <div class="dx_wrap">
                                                <div class="onlyFont">
                                                    <?php echo $v['details']; ?>
                                                    <p class="china">
                                                    <span class="<?php if ($v['useranswer'] == $v['correctanswer']) {
                                                        echo 'green';
                                                    } else {
                                                        echo 'red';
                                                    }; ?>">
                                                        你的答案：<b><?php echo $v['useranswer']; ?></b>
                                                    </span>
                                                        <span class="green">
                                                        正确答案: <b><?php echo $v['correctanswer']; ?></b>
                                                    </span>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <input type="hidden" id="<?php echo $yy;?>">
                        <div class="r-c-r-grey" >
                            <?php if($yy == 0 ){ ?>
                                一般V160+对于填空的正确率要求>80%。第一个section正确率越高，下一个section进入hard模式几率越高，那么160+的
                                高分概率就越大
                            <?php } elseif($yy == 1 ){ ?>
                                一般V160+要求RC正确率达到70%以上。阅读正确率瓶颈一般会处在正确率50%-60%左右，要想快速提高正确率，需要练习
                                长难句，学习回文定位、快速获取文章结构等做题方法。
                            <?php }elseif($yy == 2 ){ ?>
                                一般Q168+要求QUANT正确率达到95%以上。QUANT正确率比较容易提升，建议熟悉数学词汇，熟悉数学题型，加强
                                题意理解，提高正确率。
                            <?php } ?>
                        </div>
                    </div>
                    <div style="clear: both" ></div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!--复习计划-->
<div class="reviewPlan">
    <h2><span>你的复习计划</span></h2>
    <div class="review-auto">
        <div class="common-title">
            基础阶段：2周
        </div>
        <div class="review-jianyi01">
            <ul>
                <li>
                    <div class="purple-left">
                        词汇
                    </div>
                    <div class="purple-right">
                        词汇对于GRE考试非常重要，GRE是各类出国考试中对单词量要求最高的考试。红宝书、再要你命3000（见复习资料包），红宝书约
                        7000单词，加上“再要你命3000”，约10000单词量，你需要按照自己的复习时间分配每日新背单词数量与复习旧单词数量；如果
                        对数学词汇不熟，建议先看看数学词汇，之后在做题中记住背过的单词：数学词汇（见复习资料包）：每天背一个表格，总共9个表格
                        ，背完再巩固下，半个月内完成；如果（在上课期间或者备考阶段，甚至考试期间）词汇成为了考试的难点，这与学习的方法是无关
                        的。换而言之，GRE考试是逻辑思维考试，考察的是理解以上的思维能力测试。如若在第一步理解上出现问题而无法进行逻辑思维的
                        训练，那么对中后期的学习及备考会有非常不必要的消极影响。

                    </div>
                </li>
                <li>
                    <div class="purple-left">
                        长难句
                    </div>
                    <div class="purple-right">
                        分析长难句对阅读和填空都有帮助，尤其是阅读速度慢的同学需要在课前多加练习。参考杨鹏《GRE&GMAT阅读难句教程》(见复习
                        资料包），最好每天分析 5-10 句长难句，分清主干和修饰部分，吃透句子成分和结构，分析时先要自己思考，再看后面的解析，坚持
                        一段时间之后，你会发现你的阅读能力会有很大的提升。长难句训练不应只作为一项预习工作，应该在整个备考过程中每天坚持，培养
                        对句子分析的敏锐力，需长期积累。

                    </div>
                </li>
                <li>
                    <div class="purple-left">
                        数学
                    </div>
                    <div class="purple-right">
                        每天做 10 道 OG的数学题，争取一个月内完成数学章。如果正确率在90% 以上，那么之后无需准备数学，考前再做模考的数学题即可
                        ； 如果题目看不懂，需加强背诵数学词汇和题意理解。如果正确率在90% 以下，需加强数学知识点的巩固，可以看看陈向东的《数学
                        高分突破》（见复习资料包）。
                    </div>
                </li>
            </ul>
        </div>
        <div class="common-title">
            提升阶段4-6周
        </div>
        <div class="review-jianyi02">
            <ul>
                <li>
                    <div class="jiany-num">1</div>
                    <div class="jiany-info">
                        上方法课，系统学习各科目各考点做题方法和技巧，或者看OG上对各考点的解释；
                    </div>
                </li>
                <li>
                    <div class="jiany-num">2</div>
                    <div class="jiany-info">
                        填空与阅读，做OG和真题。每天每部分至少20道题目，并对错题进行总结分析；
                    </div>
                </li>
                <li>
                    <div class="jiany-num">3</div>
                    <div class="jiany-info">
                        作文，熟悉issue和argument题库，熟悉Issue高频题表和Issue提纲大全，把每篇文章的提纲和范文都分析一遍，以及官方题库范文精讲。每周根据
                        范文提纲issue练习1-2篇，argument每周一个题目，找出主要的逻辑错误。然后对照逻辑错误，准备一套语言套路去论述主要的逻辑错误。
                    </div>
                </li>
                <li>
                    <div class="jiany-num">4</div>
                    <div class="jiany-info">
                        查遗补缺，定时定量训练。计时做题，题目可以从雷哥GRE题库上查找。每天每部分做2个小组为佳，注意分析错题原因并总结方法；
                    </div>
                </li>
                <li>
                    <div class="jiany-num">5</div>
                    <div class="jiany-info">
                        熟悉做题过程中遇到的生词。
                    </div>
                </li>
            </ul>
        </div>
        <div class="common-title">
            冲刺阶段2-4周
        </div>
        <div class="review-jianyi02">
            <ul>
                <li>
                    <div class="jiany-num">1</div>
                    <div class="jiany-info">
                        这期间要求的是做过的真题每一个题目都要弄明白错误选项的错误原因；
                    </div>
                </li>
                <li>
                    <div class="jiany-num">2</div>
                    <div class="jiany-info">
                        模考，整套整套的去做，调整pace。每天在雷哥GRE做一套模考。针对自己模拟考中的各部分正确率来决定单项复习哪一块。如果填空的正确率不
                        到80%，需要在模考后额外做出20个填空的题目，注意以真题为主。阅读的正确率达不到70%，需要在模考后额外做出4篇阅读和5个逻辑单题。数
                        学正确率保证95%以上，继续练习真题即可。作文issue准备6-8篇，argument准备模板及语言话术4-6个。
                    </div>
                </li>
                <li>
                    <div class="jiany-num">3</div>
                    <div class="jiany-info">
                        pace很重要，必须保证pace情况下的正确率。
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div></div>
</body>
<script type="text/javascript">
    $(function () {
        $('.circle').each(function(index, el) {
            var num = $(this).find('span').text() * 3.6;
            if (num<=180) {
                $(this).find('.right').css('transform', "rotate(" + num + "deg)");
                $(this).find('.left').css('transform', "rotate(0deg)");
            } else {
                $(this).find('.right').css('transform', "rotate(180deg)");
                $(this).find('.left').css('transform', "rotate(" + (num - 180) + "deg)");
            }
        });
        $(".r-c-right>ul>li").bind({
            "mouseenter":function () {
                var top=this.offsetTop+71;
                $(this).addClass("on").find("div.timu_details").slideDown().css("top",top+"px").end().find("div.bot_zd_xian").show();
            },
            "mouseleave":function () {
                $(this).removeClass("on").find("div.timu_details").hide().end().find("div.bot_zd_xian").hide();
            }
        });
    });
</script>
</html>