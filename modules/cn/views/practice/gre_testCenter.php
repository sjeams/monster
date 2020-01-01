<?php use app\libs\Method; ?>
<?php $uid = Yii::$app->session->get('uid'); ?>
<?php error_reporting(E_ALL || ~E_NOTICE); ?>
<link rel="stylesheet" href="/cn/css/gre_testCenter.css?v=1.01010101">
<script src="/cn/js/ResizeSensor.min.js"></script>
<script src="/cn/js/theia-sticky-sidebar.js"></script>
<!--        广告图-->
<div style="width: 100%;background-color: #f3f3f3;">
    <div class="do-banner w12">
        <?php
        $res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '567', 'order' => ' RAND()', 'page' => 1, 'pageSize' => 1]);
        foreach ($res as $v) {
            ?>
            <a href="<?php echo $v['answer'] ?>"><img src="<?php echo $v['image'] ?>" alt="banner"></a>
            <?php
        }
        ?>
        <img src="/cn/images/gre_closeB.png" alt="关闭图标" class="close-icon" onclick="hideBanner()"/>
    </div>
</div>
<section id="testCenter">
    <div class="w12 clearfix">
        <div class="leftParent fl bg_f clearfix">
            <!--一级切换-->
            <div class="parenBox_wrap relative tm">
                <div class="parenBox flex-container">
                    <a <?php if ((!isset($_GET['type']) || $_GET['type'] != 1) && $_GET['type'] != 2) {
                        echo 'class="on"';
                    } ?> href="/practice/sectionId-1/source-32/know-0/page-1/type-0.html">单项练习<span></span></a>
                    <a <?php if (isset($_GET['type']) && $_GET['type'] == 1) {
                        echo 'class="on"';
                    } ?> href="/practice/sectionId-1/source-0/know-0/page-1/type-1.html">考点练习<span></span></a>
                    <!--                    <a style="width: 140px;" -->
                    <?php //if(isset($_GET['type']) && $_GET['type']==1 && isset($_GET['sectionId']) && $_GET['sectionId']==1){ echo 'class="on"'; } ?><!-- href="/practice/sectionId-1/source-0/know-0/page-1/type-1.html">填空考点</a>-->
                    <!--                    <a style="width: 140px;" -->
                    <?php //if(isset($_GET['type']) && $_GET['type']==1 && isset($_GET['sectionId']) && $_GET['sectionId']==2){ echo 'class="on"'; } ?><!-- href="/practice/sectionId-2/source-0/know-0/page-1/type-1.html">阅读考点</a>-->
                    <!--                    <a style="width: 140px;" -->
                    <?php //if(isset($_GET['type']) && $_GET['type']==1 && isset($_GET['sectionId']) && $_GET['sectionId']==3){ echo 'class="on"'; } ?><!-- href="/practice/sectionId-3/source-0/know-0/page-1/type-1.html">数学考点</a>-->
                    <a <?php if (isset($_GET['type']) && $_GET['type'] == 2) {
                        echo 'class="on"';
                    } ?> href="/practice/sectionId-1/source-0/know-0/page-1/type-2.html">难度练习<span></span></a>
                </div>
                <!--                <p class="relative line-tab"><em class="ani triangle-3"></em></p>-->
            </div>
            <!--二级容器-->
            <div class="parenBox_item">
                <!--考点-->
                <?php
                if (isset($_GET['type']) && $_GET['type'] == 1) {
                    ?>
                    <div class="childWrap">
                        <div class="testDe">
                            <p><img src="/cn/images/new_gre/done_explan.png"/>&nbsp;&nbsp;<span>gre考试简介</span><span onclick="hide_tips(this)">收起</span></p>
                            <div class="new-gre-testDe">
                                <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1) { ?>
                                    <p><span>题型介绍：</span>
                                        GRE填空包括单空题、双空题、三空题和句子等价（六选二）四种题型，主要考察学生的词汇积累和逻辑推理能力。
                                    </p>

                                    <p><span>考试应用：</span>填空+阅读=Verbal
                                        部分，1-6题为填空题，7-13题为阅读理解题，14-17题为句子等价题（六选二），18-20题为阅读理解题。</p>
                                    <?php
                                } elseif (isset($_GET['sectionId']) && $_GET['sectionId'] == 2) {
                                    ?>
                                    <p><span>题型介绍：</span>
                                        GRE阅读包括长文章、短文章、逻辑单题，按题型分有五选一、不定项、点选句子三种题型。
                                    </p>

                                    <p><span>考试应用：</span>填空+阅读=Verbal
                                        部分，1-6题为填空题，7-13题为阅读理解题，14-17题为句子等价题（六选二），18-20题为阅读理解题。
                                    </p>
                                    <?php
                                } elseif (isset($_GET['sectionId']) && $_GET['sectionId'] == 3) {
                                    ?>
                                    <p><span>题型介绍：</span>
                                        GRE数学包括单选题、不定项以及填空三种题型，考察的知识点，大致相当于我国中学数学教学内容。
                                    </p>

                                    <p><span>考试应用：</span>GRE考试中数学有2个Section，每个Section20道题。
                                    </p>
                                    <?php
                                } else {
                                    ?>
                                    <p><span>题型介绍：</span>
                                        GRE填空包括单空题、双空题、三空题和句子等价（六选二）四种题型，主要考察学生的词汇积累和逻辑推理能力。
                                    </p>

                                    <p><span>考试应用：</span>填空+阅读=Verbal
                                        部分，1-6题为填空题，7-13题为阅读理解题，14-17题为句子等价题（六选二），18-20题为阅读理解题。</p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="three_box">
                            <span class="testDe_tit">考点类型：</span>
                            <div class="listWrap int">
                                <?php
                                if (isset($sections)) {
                                    foreach ($sections as $k => $v) {
                                        ?>
                                        <a href="/practice/sectionId-<?php echo $v['id']; ?>/source-0/know-0/page-1/type-1.html"
                                           <?php if ((isset($_GET['sectionId']) && $_GET['sectionId'] == $v['id']) || (!isset($_GET['sectionId']) && $k < 1)){ ?>class="on" <?php } ?>>
                                            <?php echo $v['name'] ?>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="three_box">
                            <span class="testDe_tit">题目类型：</span>
                            <div class="listWrap int">
                                <?php
                                foreach ($knows as $k => $v) {
                                    ?>
                                    <a href="/practice/sectionId-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 1 ?>/source-0/know-<?php echo $v['id'] ?>/page-1/type-1.html"
                                       <?php if ((isset($_GET['knowId']) && $_GET['knowId'] == $v['id']) || ($_GET['knowId'] == 0 && $k < 1)){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="three_box">
                            <span class="testDe_tit">题目来源：</span>
                            <div class="listWrap int">
                                <?php
                                if (isset($sources)) {
                                    foreach ($sources as $k => $v) {
                                        ?>
                                        <a href="/practice/sectionId-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 1 ?>/source-<?php echo $v['id']; ?>/know-<?php echo isset($_GET['knowId']) ? $_GET['knowId'] : 0 ?>/page-1/type-1.html"
                                           <?php if ((isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']) || ((!isset($_GET['sourceId']) || $_GET['sourceId'] == 0) && $k < 1)){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="testCenter_intra_wrap">
                            <ul class="userTest_wrap clearfix">
                                <li class="new-gre-test-li">
                                    <div class="new-gre-test-tips-wrap">
                                        <div class="new-gre-test-left"><img src="/cn/images/new_gre/done_book.png"></div>
                                        <div class="new-gre-test-right">
                                            <p>题目总数:<?php echo $totalNum ?></p>
                                            <p>完成人数:<?php echo $totalDoNum ?></p>
                                            <p>平均正确率:<?php echo $correctRate ?>%</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_one"><img src="/cn/images/new_gre/done_nub.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">做题数</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $userAnswerNum;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_two"><img src="/cn/images/new_gre/done_right.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">正确率</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $user_correct.'%';
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_three"><img src="/cn/images/new_gre/done_time.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name"><?php if ($uid) {
                                                    echo '我的耗时';
                                                } else {
                                                    echo '平均耗时';
                                                } ?></p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo !empty($averageTime) ? $averageTime : 0;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php if ($uid) {

                            } else { ?>
                                <div class="login-herf"><span onclick="userLogin()">登录</span>查看做题数据</div>
                            <?php } ?>
                        </div>
                        <div class="tableWrap">
                            <table class="testTab">
                                <thead>
                                <tr>
                                    <th width="170">题库编号</th>
                                    <th>题目总数</th>
                                    <th>做题人数</th>
                                    <th>完成情况</th>
                                    <th>我的正确率</th>
                                    <th>我的耗时</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="tm">
                                <?php
                                foreach ($questions as $k => $v) {
                                    ?>
                                    <tr>
                                        <td><span class="testDb_name"><?php echo $v['name'] ?></span></td>
                                        <td><?php echo $v['qNum'] ?></td>
                                        <td><?php echo $v['dqNum'] * 2 * 3 + 123 ?></td>
                                        <td>
                                            <span class="<?php if (isset($v['myState']['state']) && $v['myState']['state'] == 1) {
                                                echo 'ut_over';
                                            } else {
                                                echo 'ut_break';
                                            } ?>"><?php if (isset($v['myState']['state']) && $v['myState']['state'] == 1) {
                                                    echo "已完成";
                                                } else {
                                                    if (isset($v['myState']['doNum'])) {
                                                        echo $v['myState']['doNum'] . "/" . $v['qNum'];
                                                    } else {
                                                        echo '0/' . $v['qNum'];
                                                    }
                                                } ?></span></td>
                                        <td><?php echo isset($v['myState']['correctRate']) ? $v['myState']['correctRate'] : '0' ?>
                                            %
                                        </td>
                                        <td><?php echo isset($v['myState']['totalTime']) ? Method::secToTime($v['myState']['totalTime']) : '0' ?></td>
                                        <?php if (isset($v['myState']['state']) && $v['myState']['state'] == 1) {
                                            ?>
                                            <td><a class="show_result over_btn"
                                                   href="/practice/result-<?php echo $v['id'] ?>.html" target="_blank">已完成</a>
                                            </td>
                                            <?php
                                        } elseif (!empty($v['myState'])) {
                                            ?>
                                            <td><a class="show_result break_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">继续做题</a>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="show_result start_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">开始做题</a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <div class="testDb_btn">
                                                <input type="hidden" value="<?php echo $v['id'] ?>"/>
                                                <input type="hidden" value="1"/>
                                                <span class="testDb_de">题库详情</span>
                                                <i class="crow_ut inm"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hide_row">
                                        <td colspan="8">
                                            <div class="topic_wrap">
                                                <!--                                                --><?php
                                                //                                                foreach($v['question'] as $va){
                                                //                                                    ?>
                                                <!--                                                    <div class="clearfix topic_item">-->
                                                <!--                                                        <div class="testDb_list_left fl">-->
                                                <!--                                                            <div class="clearfix test_de_top">-->
                                                <!--                                                                <p class="testdb_list_name fl ellipsis ">【-->
                                                <?php //echo $va['section'] ?><!-- -->
                                                <?php //echo $va['source']['alias'] ?><!----->
                                                <?php //echo $va['id'] ?><!--】</p>-->
                                                <!---->
                                                <!--                                                                <div class="cur_data_wrap clearfix fr">-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/p_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>-->
                                                <?php //echo $va['doNum'] ?><!--人已做</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/zx_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>-->
                                                <?php //echo $va['correctRate'] ?><!--%正确率</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/time_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>平均耗时：-->
                                                <?php //echo !empty($va['averageTime'])?$va['averageTime']:0 ?><!--</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                </div>-->
                                                <!--                                                            </div>-->
                                                <!--                                                            <p class="test_de ellipsis-2">-->
                                                <?php //echo $va['stem'] ?><!--</p>-->
                                                <!--                                                        </div>-->
                                                <!--                                                        <div class="testDb_list_right fr">-->
                                                <!--                                                            <a class="r_de" href="/question/-->
                                                <?php //echo $va['id'] ?><!--.html" target="_blank">查看详情</a>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    --><?php
                                                //                                                }
                                                //                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pageSize_wrap tm">
                                <ul class="pageSize inm clearfix">
                                    <?php echo $pageStr ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif (isset($_GET['type']) && $_GET['type'] == 2) {
                    ?>

                    <!--题目单项介绍-->
                    <div class="childWrap">
                        <div class="testCenter_intra_wrap">
                            <div class="three_box">
                                <span class="testDe_tit">考点类型：</span>
                                <div class="listWrap int">
                                    <?php
                                    if (isset($sections)) {
                                        foreach ($sections as $k => $v) {
                                            ?>
                                            <a href="/practice/sectionId-<?php echo $v['id']; ?>/source-0/know-0/page-1/type-2.html"
                                               <?php if ((isset($_GET['sectionId']) && $_GET['sectionId'] == $v['id']) || (!isset($_GET['sectionId']) && $k < 1)){ ?>class="on" <?php } ?>>
                                                <?php echo $v['name'] ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="three_box">
                                <span class="testDe_tit int">难度类型：</span>
                                <div class="listWrap int">
                                    <?php
                                    if (isset($sources)) {
                                        foreach ($sources as $k => $v) {
                                            ?>
                                            <a href="/practice/sectionId-<?php echo $v['catId']; ?>/source-<?php echo $v['id']; ?>/know-0/page-1/type-2.html"
                                               <?php if ((isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']) || (empty($_GET['sourceId']) && $k < 1)){ ?>class="on" <?php } ?>>
                                                <?php echo $v['name'] ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <ul class="userTest_wrap clearfix">
                                <li class="new-gre-test-li">
                                    <div class="new-gre-test-tips-wrap">
                                        <div class="new-gre-test-left"><img src="/cn/images/new_gre/done_book.png"></div>
                                        <div class="new-gre-test-right">
                                            <p>题目总数：<?php echo $totalNum ?></p>
                                            <p>完成人数：<?php echo $totalDoNum ?></p>
                                            <p>平均正确率：<?php echo $correctRate ?>%</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_one"><img src="/cn/images/new_gre/done_nub.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">做题数</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $userAnswerNum;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_two"><img src="/cn/images/new_gre/done_right.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">正确率</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $user_correct.'%';
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_three"><img src="/cn/images/new_gre/done_time.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name"><?php if ($uid) {
                                                    echo '我的耗时';
                                                } else {
                                                    echo '平均耗时';
                                                } ?></p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo !empty($averageTime) ? $averageTime : 0;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php if ($uid) {

                            } else { ?>
                                <div class="login-herf"><span onclick="userLogin()">登录</span>查看做题数据</div>
                            <?php } ?>
                        </div>
                        <div class="tableWrap">
                            <table class="testTab">
                                <thead>
                                <tr>
                                    <th width="170">题库编号</th>
                                    <th>题目总数</th>
                                    <th>做题人数</th>
                                    <th>完成情况</th>
                                    <th>我的正确率</th>
                                    <th>我的耗时</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="tm">
                                <?php
                                foreach ($questions as $k => $v) {
                                    ?>
                                    <tr>
                                        <td><span class="testDb_name"><?php echo $v['name'] ?></span></td>
                                        <td><?php echo $v['qNum'] ?></td>
                                        <td><?php echo $v['dqNum'] * 2 * 3 + 123 ?></td>
                                        <td>
                                            <span class="<?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                                echo 'ut_over';
                                            } else {
                                                echo 'ut_break';
                                            } ?>"><?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                                    echo "已完成";
                                                } else {
                                                    if (isset($v['myState']['doNum'])) {
                                                        echo $v['myState']['doNum'] . "/" . $v['qNum'];
                                                    } else {
                                                        echo '0/' . $v['qNum'];
                                                    }
                                                } ?></span></td>
                                        <td><?php echo isset($v['myState']['correctRate']) ? $v['myState']['correctRate'] : '0' ?>
                                            %
                                        </td>
                                        <td><?php echo isset($v['myState']['totalTime']) ? Method::secToTime($v['myState']['totalTime']) : '0' ?></td>
                                        <?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                            ?>
                                            <td><a class="show_result over_btn"
                                                   href="/practice/result-<?php echo $v['id'] ?>.html" target="_blank">已完成</a>
                                            </td>
                                            <?php
                                        } elseif (!empty($v['myState'])) {
                                            ?>
                                            <td><a class="show_result break_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">继续做题</a>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="show_result start_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">开始做题</a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <div class="testDb_btn">
                                                <input type="hidden" value="<?php echo $v['id'] ?>" id="libId"/>
                                                <input type="hidden" value="0"/>
                                                <span class="testDb_de">题库详情</span>
                                                <i class="crow_ut inm"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hide_row">
                                        <td colspan="8">
                                            <div class="topic_wrap">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pageSize_wrap tm">
                                <ul class="pageSize inm clearfix">
                                    <?php echo $pageStr ?>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>
                    <!--题目单项介绍-->
                    <div class="childWrap">
                        <div class="testCenter_intra_wrap">
                            <div class="testDe">
                                <p><img src="/cn/images/new_gre/done_explan.png"/>&nbsp;&nbsp;<span>gre考试简介</span><span onclick="hide_tips(this)">收起</span></p>
                                <div class="new-gre-testDe">
                                    <p><span>题型介绍：</span>GRE考试有三个组成部分：verbal（语文） 简称 V；quantitative（数学）
                                        简称Q；article writing（写作） 简称AW。
                                    </p>
                                    <p><span>Verbal：</span>1个V包含20个选择题、10个填空题（选择式填空）和10个阅读题，要求30分钟完成。</p>
                                    <p><span>Quantitative：</span>1个Q包含选择题和填空题（填入数据），一共20题，要求35分钟完成。Quantitative考试的内容（从数学的难度上讲）大致和高一理科数学差不多。
                                    </p>
                                </div>
                            </div>
                            <div class="three_box">
                                <span class="testDe_tit">题目类型：</span>
                                <div class="listWrap int">
                                    <?php
                                    if (isset($sections)) {
                                        foreach ($sections as $k => $v) {
                                            ?>
                                            <a href="/practice/sectionId-<?php echo $v['id']; ?>/source-0/know-0/page-1/type-0.html"
                                               <?php if ((isset($_GET['sectionId']) && $_GET['sectionId'] == $v['id']) || (!isset($_GET['sectionId']) && $k < 1)){ ?>class="on" <?php } ?>>
                                                <?php echo $v['name'] ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="three_box">
                                <span class="testDe_tit int">题目来源：</span>
                                <div class="listWrap int">
                                    <?php
                                    if (isset($sources)) {
                                        foreach ($sources as $k => $v) {
                                            ?>
                                            <a href="/practice/sectionId-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 1 ?>/source-<?php echo $v['id']; ?>/know-0/page-1/type-0.html"
                                               <?php if ((isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']) || ((!isset($_GET['sourceId']) || $_GET['sourceId'] == 0) && $k < 1)){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <ul class="userTest_wrap clearfix">
                                <li class="new-gre-test-li">
                                    <div class="new-gre-test-tips-wrap">
                                        <div class="new-gre-test-left"><img src="/cn/images/new_gre/done_book.png"></div>
                                        <div class="new-gre-test-right">
                                            <p>题目总数：<?php echo $totalNum ?></p>
                                            <p>完成人数：<?php echo $totalDoNum ?></p>
                                            <p>平均正确率：<?php echo $correctRate ?>%</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_one"><img src="/cn/images/new_gre/done_nub.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">做题数</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $userAnswerNum;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_two"><img src="/cn/images/new_gre/done_right.png"></div>
                                        <div class="ut_right">
                                            <p class="ut_name">正确率</p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo $user_correct."%";
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ut_td">
                                        <div class="ut_left ut_left_three"><img src="/cn/images/new_gre/done_time.png" alt=""></div>
                                        <div class="ut_right">
                                            <p class="ut_name"><?php if ($uid) {
                                                    echo '我的耗时';
                                                } else {
                                                    echo '平均耗时';
                                                } ?></p>
                                            <p class="ut_de">
                                                <?php if ($uid) {
                                                    echo !empty($averageTime) ? $averageTime : 0;
                                                } else {
                                                    echo '--';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php if ($uid) {

                            } else { ?>
                                <div class="login-herf"><span onclick="userLogin()">登录</span>查看做题数据</div>
                            <?php } ?>
                        </div>
                        <div class="tableWrap">
                            <table class="testTab">
                                <thead>
                                <tr>
                                    <th width="170">题库编号</th>
                                    <th>题目总数</th>
                                    <th>做题人数</th>
                                    <th>完成情况</th>
                                    <th>我的正确率</th>
                                    <th>我的耗时</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="tm">
                                <?php
                                foreach ($questions as $k => $v) {
                                    ?>
                                    <tr>
                                        <td><span class="testDb_name"><?php echo $v['name'] ?></span></td>
                                        <td><?php echo $v['qNum'] ?></td>
                                        <td><?php echo $v['dqNum'] * 2 * 3 + 123 ?></td>
                                        <td>
                                            <span class="<?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                                echo 'ut_over';
                                            } else {
                                                echo 'ut_break';
                                            } ?>"><?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                                    echo "已完成";
                                                } else {
                                                    if (isset($v['myState']['doNum'])) {
                                                        echo $v['myState']['doNum'] . "/" . $v['qNum'];
                                                    } else {
                                                        echo '0/' . $v['qNum'];
                                                    }
                                                } ?></span></td>
                                        <td><?php echo isset($v['myState']['correctRate']) ? $v['myState']['correctRate'] : '0' ?>
                                            %
                                        </td>
                                        <td><?php echo isset($v['myState']['totalTime']) ? Method::secToTime($v['myState']['totalTime']) : '0' ?></td>
                                        <?php if (isset($v['myState']['doNum']) && $v['myState']['doNum'] >= $v['qNum']) {
                                            ?>
                                            <td><a class="show_result over_btn"
                                                   href="/practice/result-<?php echo $v['id'] ?>.html" target="_blank">已完成</a>
                                            </td>
                                            <?php
                                        } elseif (!empty($v['myState'])) {
                                            ?>
                                            <td><a class="show_result break_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">继续做题</a>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a class="show_result start_btn"
                                                   href="/practice/<?php echo $v['id'] ?>.html" target="_blank">开始做题</a>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <div class="testDb_btn">
                                                <input type="hidden" value="<?php echo $v['id'] ?>" id="libId"/>
                                                <input type="hidden" value="0"/>
                                                <span class="testDb_de">题库详情</span>
                                                <i class="crow_ut inm"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hide_row">
                                        <td colspan="8">
                                            <div class="topic_wrap">
                                                <!--                                                --><?php
                                                //                                                foreach($v['question'] as $va) {
                                                //                                                    ?>
                                                <!--                                                    <div class="clearfix topic_item">-->
                                                <!--                                                        <div class="testDb_list_left fl">-->
                                                <!--                                                            <div class="clearfix test_de_top">-->
                                                <!--                                                                <p class="testdb_list_name fl ellipsis ">-->
                                                <!--                                                                    【-->
                                                <?php //echo $va['section'] ?><!-- --><?php //echo $va['source']['alias'] ?>
                                                <!--                                                                    --->
                                                <?php //echo $va['id'] ?><!--】</p>-->
                                                <!---->
                                                <!--                                                                <div class="cur_data_wrap clearfix fr">-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/p_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>-->
                                                <?php //echo $va['doNum'] ?><!--人已做</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/zx_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>-->
                                                <?php //echo $va['correctRate'] ?><!--%正确率</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                    <div class="cur_data">-->
                                                <!--                                                                        <img src="/cn/images/gre_testCenter/time_icon.png"-->
                                                <!--                                                                             alt="">-->
                                                <!--                                                                        <span>平均耗时：-->
                                                <?php //echo !empty($va['averageTime'])?$va['averageTime']:0 ?><!--</span>-->
                                                <!--                                                                    </div>-->
                                                <!--                                                                </div>-->
                                                <!--                                                            </div>-->
                                                <!--                                                            <p class="test_de ellipsis-2">-->
                                                <?php //echo $va['stem'] ?><!--</p>-->
                                                <!--                                                        </div>-->
                                                <!--                                                        <div class="testDb_list_right fr">-->
                                                <!--                                                            <a class="r_de" href="/question/-->
                                                <?php //echo $va['id'] ?><!--.html" target="_blank">查看详情</a>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    --><?php
                                                //                                                }
                                                //                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="pageSize_wrap tm">
                                <ul class="pageSize inm clearfix">
                                    <?php echo $pageStr ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="do-con-right fr">
            <div class="reviewList">
                <div class="review_title">
                    <!-- <img src="https://gmat.viplgw.cn/app/web_core/styles/images/zuoti-phb.png" alt="图标"/> -->
                   <span>&nbsp;&nbsp;&nbsp;学习排行榜</span>
                </div>
                <div class="review_top">
                    <ul class="clearfix">
                        <?php
                        foreach ($reviewRank as $k => $v) {
                            if ($k < 3) {
                                ?>
                                <li class="clearfix">
                                    <div class="new-gre-l-left"><div class="l_circle"></div></div>
                                    <div class="new-gre-l-right">
                                        <div class="r_info new-gre-r-info">
                                            <h4><?php echo $v['nickname'] ?></h4>
                                        </div>
                                        <div class="r_correct new-gre-r-correct">
                                            <p>
                                                <?php echo $v['questionTotal'] ?>题
                                                &nbsp;&nbsp;&nbsp;
                                                <?php echo round($v['correctNum'] / $v['questionTotal'] * 100); ?>%正确率
                                            </p>
                                        </div>
                                        <!-- <div class="clearfixd"></div> -->
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="bottomUl">
                    <div class="ulBd">
                        <ul>
                            <?php
                            foreach ($reviewRank as $k => $v) {
                                if ($k > 2) {
                                    ?>
                                    <li class="clearfix">
                                        <span class="userN"><?php echo $v['nickname'] ?></span>
                                        <span class="rightText"><?php echo $v['questionTotal'] ?>题
                                <?php echo round($v['correctNum'] / $v['questionTotal'] * 100); ?>%正确率</span>
                                        <div class="clearfixd"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <script>
                    jQuery(".bottomUl").slide({
                        mainCell: ".ulBd ul",
                        autoPlay: true,
                        effect: "topMarquee",
                        vis: 8,
                        interTime: 50,
                        mouseOverStop: false
                    });
                </script>
            </div>
            <div class="new_discussion">
                <div class="discussion_title">
                    <!-- <img src="https://gmat.viplgw.cn/app/app/web_core/styles/images/zuoti-taolun.png" alt="图标"/> -->
                    <span>&nbsp;&nbsp;&nbsp;最新题目讨论</span>
                </div>
                <div class="dis_body">
                    <div class="dis_bd">
                        <ul>
                            <?php
                            foreach ($newComment as $k => $v) {
                                ?>
                                <li style="height: 59px;">
                                    <h4><a href="/question/<?php echo $v['questionId'] ?>.html" target="_blank"><span
                                                    class="size_8"><?php echo $v['nickname'] ?></span>参与了此题讨论：</a>
                                    </h4>

                                    <p>
                                        【<?php echo $v['section'] ?>
                                        -<?php echo $v['source']['alias'] . "-" . $v['questionId'] ?>】
                                        <?php echo $v['stem'] ?></p>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <script>
                    jQuery(".dis_body").slide({
                        mainCell: ".dis_bd ul",
                        autoPlay: true,
                        effect: "topMarquee",
                        vis: 5,
                        interTime: 50
                    });
                </script>
            </div>
        </div>
    </div>
</section>
<div id="fixedTc" class="tc"></div>
<script type="text/javascript">
    $('.iPage').click(function(){
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        var page = $('.pageSize_wrap').find('.on').html();
        location.href ="/practice/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:1 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/know-<?php echo isset($_GET['knowId'])?$_GET['knowId']:0 ?>/page-"+ page +"/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>.html";
    });

    $('.prev').click(function(){
        var page = $('.pageSize_wrap').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        location.href ="/practice/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:1 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/know-<?php echo isset($_GET['knowId'])?$_GET['knowId']:0 ?>/page-"+ page +"/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>.html";
    });

    $('.next').click(function(){
        var page = $('.pageSize_wrap').find('.on').html();
        if(page == <?php echo $total ?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        location.href ="/practice/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:1 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/know-<?php echo isset($_GET['knowId'])?$_GET['knowId']:0 ?>/page-"+ page +"/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>.html";
    })

    //题目导航提示收起与展开
    function hide_tips(_this){
        if($(_this).text() == '收起'){
            $(_this).text('展开')
            $(".new-gre-testDe").slideUp()
        } else {
            $(_this).text('收起')
            $(".new-gre-testDe").slideDown()
        }
    }
    //登录按钮
    function userLogin(){
        location.href="https://login.viplgw.cn/cn/index?source=2&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"
    }
</script>
<script>
    $(function () {
        $('.leftParent ,.do-con-right').theiaStickySidebar();
//        表格下拉
        $('.testDb_btn').click(function () {
            var _that = this;
            var tr = $(this).parents('tr');
            var hide_box = tr.next('tr.hide_row');
            hide_box.fadeToggle();

            hide_box.siblings("tr.hide_row").hide();
            tr.toggleClass('on').siblings("tr").removeClass("on");
            $(this).toggleClass('on').parents('tr').siblings("tr").find(".testDb_btn").removeClass("on");

            var result = '';
            var libId = $(this).find('input').eq(0).val();
            $.get("/cn/practice/lib-question", {libId: libId}, function (res) {
                result = JSON.parse(res).question;
                for (let item of result) {
                    $(_that).parent().parent().next().children('td').children('div').append(
                        `<div class="clearfix topic_item">
                                          <div class="testDb_list_left fl">
                                             <div class="clearfix test_de_top">
                                                      <p class="testdb_list_name fl ellipsis ">
                                              ${item.section} ${item.source.alias} ${item.id}</p>
                                                      <div class="cur_data_wrap clearfix fr">
                                                                 <div class="cur_data">
                                                                  <img src="/cn/images/gre_testCenter/p_icon.png" alt="" >
                                                                    <span>${item.doNum}人已做</span>
                                                                 </div>
                                                                  <div class="cur_data">
                                                                    <img src="/cn/images/gre_testCenter/zx_icon.png"  alt="">
                                                                  <span>${item.correctRate}%正确率</span>
                                                                    </div>
                                                                   <div class="cur_data">
                                                                  <img src="/cn/images/gre_testCenter/time_icon.png" alt="">
                                                                     <span>平均耗时：${item.averageTime ? item.averageTime : 0}</span>
                                                                           </div>
                                                                       </div>
                                                                            </div>
                                                                            <p class="test_de ellipsis-2">${item.stem}</p>
                                                                         </div>
                                                                      <div class="testDb_list_right fr">
                                                                   <a class="r_de" href="/question/${item.id}.html" target="_blank">查看详情</a>
                                                                        </div>
                           </div>
                        `
                    )
                }
            });
        });

        //        初始化宽度&位置
        $(".parenBox_wrap .line-tab").each(function () {
            var w = $(this).parent(".parenBox_wrap").find("a.on").innerWidth();
            var left = $(this).parent(".parenBox_wrap").find("a.on")[0].offsetLeft;
            $(this).css({"left": left + 3 + "px"});

        });
        $(".parenBox a").click(function () {
            var num = $(this).index();
            var w3 = $(this)[0].offsetLeft;
            var parent = $(this).parents(".parenBox_wrap");
            // parent.children(".line-tab").stop(true).animate({left: w3+3}, 300);
            $('.parenBox_item .childWrap').eq(num).fadeIn().siblings('div.childWrap').hide();
        });
        //        标签选择
        $('.parenBox a,.childBox a').click(function () {
            $(this).siblings('a').removeClass('on');
        });
        $('.three_box a').click(function () {
            $(this).addClass('on').siblings('a').removeClass('on');
        })
    });

    function hideBanner() {
        $(".do-banner").slideUp();
        sessionStorage.setItem("hideBanner",'true')
    }
    $(function(){
        if(sessionStorage.getItem("hideBanner")){
            $(".do-banner").hide()
        } else {
            $(".do-banner").show()
        }
    })
</script>
