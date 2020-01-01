<?php use app\libs\Method;  ?>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_result.css?v=1">
<script src="/cn/js/jquery-1.12.2.min.js"></script>
<script src="/cn/js/round.js"></script>
<title>做题结果</title>
<!--悬浮框-->
<section id="flex_list_wrap" class="bg_f">
    <div class="w12">
        <ul class="pageSize_wrap clearfix">
            <?php
            foreach ($data as $k => $v) {
                ?>
                <li <?php if ($v['correct'] != 1){ ?>class="on" <?php } ?> ><a
                        data-src="#num<?php echo $k + 1 ?>"><?php echo $k + 1 ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>
<!--内容-->
<div id="fixedTc" class="tc"></div>
<section id="result_wrap">
    <div class="w12 bg_f">

        <div class="result_content">
            <!--当前地址栏-->
            <div class="location_address">
                <a href="/practice.html" target="_blank">做题</a><b>></b>
                <a href="/practice/sectionId-<?php echo $library['catId'] ?>/source-0/know-0/page-1/type-0.html" target="_blank"><?php echo $section ?></a><b>></b>
<!--                <span class="cur_address">--><?php //echo $source['name'] ?><!-----><?php //echo $source['alias'] . "-" . $_GET['libId'] ?><!--</span>-->
                <span class="cur_address"><?php echo  $library['name'] ?></span>
            </div>
            <!--做题情况-->
            <div class="test_situation_Wrap">
                <p class="situation_en">做题情况</p>
                <div class="clearfix situation">
                    <!--正确率-->
                    <div class="situation_data_wrap fl tm">
                        <div class="situation_data inm">
                            <div class="inm data_text" style="margin-right: 25px;">
                                <p class="dt_name">正确率</p>
                                <p class="dt_de" style="text-align: center;">（<?php echo $correctNum ?>
                                    /<?php echo $userStatistic['totalNum'] ?>）</p>
                            </div>
                            <div class="inm">
                                <!--环形进度svg容器-->
                                <div id="container" class="relative bar_container"></div>
                            </div>
                        </div>
                    </div>
                    <!--Pace 诊断-->
                    <div class="situation_data_wrap fl tm" style="background: #5991d7">
                        <div class="situation_data inm">
                            <div class="inm data_text" style="margin-right: 10px;">
                                <p class="dt_name">Pace 诊断</p>
                                <p class="dt_de ellipsis-3"><?php echo @$pace['Pace_msg'] ?></p>
                            </div>
                            <div class="inm">
                                <!--环形进度svg容器-->
                                <div id="container2" class="relative bar_container"></div>
                            </div>
                        </div>
                    </div>
                    <!--竞争力-->
                    <div class="situation_data_wrap fl tm" style="background: #9b75c9">
                        <div class="situation_data inm">
                            <div class="inm data_text" style="margin-right: 7px;">
                                <p class="dt_name">竞争力</p>
                                <p class="dt_de ellipsis-3">共有<?php echo @$compete['total']; ?>
                                    人答题，您打败了<?php echo @round($compete['transcendNum'] / $compete['total'] * 100); ?>
                                    %的人，再接再厉！</p>
                            </div>
                            <div class="inm">
                                <!--环形进度svg容器-->
                                <div id="container3" class="relative bar_container"></div>
                            </div>
                        </div>
                    </div>
                    <!--耗时-->
                    <div class="time_use fl clearfix tm">
                        <div class="time_box_data fl">
                            <div class="tm time_box"><span
                                        class="inm time_text"><?php echo  Method::secToTime(@$userStatistic['totalTime']) ?></span></div>
                            <p class="time_name">总耗时</p>
                        </div>
                        <div class="time_box_data fl">
                            <div class="tm time_box"><span
                                        class="inm time_text"><?php if(@$userStatistic['doNum']!=0){ echo Method::secToTime(@round($userStatistic['totalTime'] / $userStatistic['doNum'])); } ?>
                                    </span></div>
                            <p class="time_name">平均每题耗时</p>
                        </div>
                    </div>
                    <!--按钮-->
                    <div class="sbn_btn fr clearfix">
                        <?php
                        if(@$userStatistic['doNum'] >=$userStatistic['totalNum']) {
                            ?>
                            <a class="sbn_wrap" onclick="examQuit();" href="javascript:void (0);" style="margin-bottom: 10px;">
                                <img src="/cn/images/gre_result/sbn_1.png" alt="">
                                <span class="sbn_name">重新做题</span>
                            </a>
                            <a class="sbn_wrap" href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank">
                                <img src="/cn/images/gre_result/sbn_2.png" alt="">
                                <span class="sbn_name">名师解析</span>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="sbn_wrap" href="/practice/<?php echo @$userStatistic['libraryId'] ?>.html"
                               target="_blank" style="margin-bottom: 10px;">
                                <img src="/cn/images/gre_result/sbn_3.png" alt="">
                                <span class="sbn_name">继续做题</span>
                            </a>
                            <a class="sbn_wrap" onclick="examQuit();" href="javascript:void (0);" style="margin-bottom: 10px;">
                                <img src="/cn/images/gre_result/sbn_1.png" alt="">
                                <span class="sbn_name">重新做题</span>
                            </a>
                            <a class="sbn_wrap" href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank">
                                <img src="/cn/images/gre_result/sbn_2.png" alt="">
                                <span class="sbn_name">名师解析</span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!--题目序号&定位-->
                <div class="result_pageSize clearfix">
                    <span class="pageSize_name fl">做题详情</span>
                    <ul class="pageSize_wrap clearfix fl">
                        <?php
                        foreach ($data as $k => $v) {
                            ?>
                            <li <?php if ($v['correct'] != 1){ ?>class="on" <?php } ?> ><a
                                        data-src="#num<?php echo $k + 1 ?>"><?php echo $k + 1 ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!--题目列表-->
                <ul class="result_list">
                    <?php
                    foreach ($data as $k => $v) {
                        if ($v['correct'] != 1) {
                            ?>
                            <li id="num<?php echo $k + 1 ?>">
                                <div class="clearfix">
                                    <div class="num_wrap fl"><span
                                                class="topic_num error_num inm"><?php echo $k + 1 ?></span></div>
                                    <div class="test_de fr">
                                        <p class="ellipsis topic_de topic_text"><?php echo $v['question']['stem'] ?></p>

                                        <div class="topic_text answer_wrap">
                                            <div class="flexRow">
                                                <span>我的答案：<b class="xzAnswer error_answer"><?php echo $v['answer'] ?></b></span>
                                            </div>
                                            <div class="flexRow">
                                                <span>正确答案：<b class="xzAnswer"><?php echo $v['question']['answer'] ?></b></span>
                                            </div>

                                        </div>
                                        <div class="clearfix">
                                            <div class="topic_data clearfix fl">
                                                <span>本题耗时<?php echo Method::secToTime($v['useTime']) ?></span>
                                                <span>平均耗时为<?php echo $v['averageTime'] ?></span>
                                                <span><?php echo $v['doneNum'] ?>人做过此题</span>
                                                <span>平均正确率为<?php echo @$v['correctRate'] ?>%</span>
                                            </div>
                                            <div class="user_handle fr">
                                                <a class="u_btn" href="/question/<?php echo $v['questionId'] ?>.html" target="_blank">
                                                    <img src="/cn/images/gre_result/show_sbn.png" alt="">
                                                    <span>查看解析</span>
                                                </a>
                                                <a class="u_btn <?php if ($v['collection'] == 1) {
                                                    echo 'on';
                                                } ?> ub_sc" onclick="collect(<?php echo $v['questionId'] ?>,this)"
                                                   href="javascript:void (0)" target="_blank">
                                                    <i class="sc_icon inm"></i>
                                                    <span>收藏</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        } else { ?>
                            <li id="num<?php echo $k + 1 ?>">
                                <div class="clearfix">
                                    <div class="num_wrap fl"><span class="topic_num inm"><?php echo $k + 1 ?></span>
                                    </div>
                                    <div class="test_de fr">
                                        <p class="ellipsis topic_de topic_text"><?php echo $v['question']['stem'] ?></p>

                                        <div class="topic_text answer_wrap">
                                            <div class="flexRow">
                                                <span>我的答案：<b class="xzAnswer right_answer"><?php echo $v['answer'] ?></b></span>
                                            </div>
                                            <div class="flexRow">
                                                <span>正确答案：<b class="xzAnswer"><?php echo $v['question']['answer'] ?></b></span>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="topic_data clearfix fl">
                                                <span>本题耗时<?php echo Method::secToTime($v['useTime']) ?></span>
                                                <span>平均耗时为<?php echo $v['averageTime'] ?></span>
                                                <span><?php echo $v['doneNum'] ?>人做过此题</span>
                                                <span>平均正确率为<?php echo @$v['correctRate'] ?>%</span>
                                            </div>
                                            <div class="user_handle fr">
                                                <a class="u_btn" href="/question/<?php echo $v['questionId'] ?>.html" target="_blank">
                                                    <img src="/cn/images/gre_result/show_sbn.png" alt="">
                                                    <span>查看解析</span>
                                                </a>
                                                <a class="u_btn <?php if ($v['collection'] == 1) {
                                                    echo 'on';
                                                } ?> ub_sc" onclick="collect(<?php echo $v['questionId'] ?>,this)"
                                                   href="javascript:void (0)" target="_blank">
                                                    <i class="sc_icon inm"></i>
                                                    <span>收藏</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</section>
<!--公共quit 弹窗-->
<section class="quit_wrap">
    <div class="tit">Quit <b onclick="quitClose();" class="quitclose">X</b></div>
    <div class="content">重新做题将清除之前的记录,是否重新做题；</div>
    <div class="mt10 mb20 tm"><a class="continue" href="/cn/paper-page/again-make?libId=<?php echo $_GET['libId'] ?>" id="quityes">Yes</a><a class="continue" onclick="quitClose();" id="quitno">No</a></div>
</section>
<script>
    $(function () {
        //        环形进度
        var bar = new ProgressBar.Circle(container, {
            color: '#48ecdd',
            strokeWidth: 7,
            trailWidth: 7,
            easing: 'bounce',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {color: '#4bf1dd', width: 7},
            to: {color: '#3ad5dd', width: 7},
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
                circle.setText("<?php echo @$userStatistic['correctRate'] . '%'; ?>");
//                var value = Math.round(circle.value() * 100);
//                if (value === 0) {
//                circle.setText("--");
//                } else {
//                    circle.setText(value + "%");
//                }

            }
        });
        var bar2 = new ProgressBar.Circle(container2, {
            color: '#48ecdd',
            strokeWidth: 7,
            trailWidth: 7,
            easing: 'bounce',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {color: '#2f83e5', width: 7},
            to: {color: '#2993e2', width: 7},
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
                circle.setText('<?php echo @$pace['Pace'] ?>');
//                var value = Math.round(circle.value() * 100);
//                if (value === 0) {
//                    circle.setText(value + "%");
//                } else {
//                    circle.setText(value + "%");
//                }

            }
        });
        var bar3 = new ProgressBar.Circle(container3, {
            color: '#48ecdd',
            strokeWidth: 7,
            trailWidth: 7,
            easing: 'bounce',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {color: '#b05de6', width: 7},
            to: {color: '#b05de6', width: 7},
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText(value + "%");
                } else {
                    circle.setText(value + "%");
                }

            }
        });
        bar.text.style.fontSize = '18px';
        bar.text.style.color = '#3db0d1';
        bar.animate(<?php echo @$userStatistic['correctRate'] / 100; ?>);
        bar2.text.style.fontSize = '24px';
        bar2.text.style.color = '#3db0d1';
        bar2.animate(<?php echo @$pace['Pace_s'] / 100 ?>);
        bar3.text.style.fontSize = '18px';
        bar3.text.style.color = '#3db0d1';
        bar3.animate(<?php echo @round($compete['transcendNum'] / $compete['total'],2); ?>);
//        滚动条事件
        $(window).scroll(function () {
            var top = $(window).scrollTop();
            if (top >= 480) {
                $('#flex_list_wrap').slideDown()
            } else {
                $('#flex_list_wrap').slideUp()
            }
        });
        $('.pageSize_wrap a').click(function () {
            var id = $(this).attr('data-src').replace('#', '');
            var top=$('#' + id + '')[0].offsetTop;
            $('#' + id + '').addClass('shadown').siblings().removeClass('shadown');
            $("html,body").animate({scrollTop:top-90},200);
//            console.log($('#' + id + '')[0].offsetTop);
        })
    });
    //    收藏题目
    function collect(questionId,o) {
        $.ajax({
            url: "/cn/api/user-question-collection",
            dataType: "json",
            data: {
                questionId: questionId, //问题ID
            },
            type: "POST",
            success: function (req) {
                $('#fixedTc').html(req.message).show();
                setTimeout(function () {
                    $('#fixedTc').hide();
                }, 3000);
                if(req.code==1){
                    $(o).addClass('on');
                }
                if(req.code==2){
                    $(o).removeClass('on');
                }

            }
        })
    }
    //        公共Quit弹窗打开&关闭
    function examQuit() {
        $('.quit_wrap').fadeIn();
    }

    function quitClose() {
        $('.quit_wrap').hide();
    }
</script>
