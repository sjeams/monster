<?php $userData = Yii::$app->session->get('userData') ?>
<?php $level = Yii::$app->session->get('level') ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_userCenter/gre_userCenter.css">
<link rel="stylesheet" href="/cn/css/font-awesome.css">
<link rel="stylesheet" href="/cn/css/gre_userCenter/iconfont.css">
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1454030_tocidpns03.css">
<script src="/cn/js/jquery-1.12.2.min.js"></script>
<script src="/cn/js/jquery.SuperSlide.2.1.3.js"></script>
<!--模考-->
<link rel="stylesheet" href="/cn/css/mold_records.css">
<link rel="stylesheet" href="/cn/css/foundation-datepicker.min.css">
<link rel="stylesheet" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<script src="/cn/js/foundation-datepicker.min.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div id="fixedTc" class="tc"></div>
<section id="userCenter">
    <div class="w12">
        <!--个人中心-公共头部-->
        <?php use app\commands\front\UserWidget; ?>
        <?php UserWidget::begin(); ?>
        <?php UserWidget::end(); ?>
        <div class="w12 clearfix">
            <!--个人中心-左边-->
            <div class="centerLeft fl bg_f">
                <ul class="centerLeft_nav">
                    <li class="on">
                        <a href="/user/se-0/so-0/l-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon_tit iconfont icon-shoucang"></i>
                                </div>
                                <span class="link_name">收藏题目</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/plan.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon-jihua iconfont icon_tit"></i>
                                </div>
                                <span class="link_name">学习计划</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/se-0/so-0/l-0/st-0/t-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-jilu"></i>
                                </div>
                                <span class="link_name">做题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/se-0/so-0/l-0/t-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon_tit iconfont icon-cuoti"></i>
                                </div>
                                <span class="link_name">错题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/mock_record.html">
                            <div>
                                <div class="inm icon_tit_wrap"><i class="icon_tit iconfont">&#xe660;</i></div>
                                <span class="link_name">模考记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/t-0/s-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 19px;" class="icon_tit iconfont icon-danci"></i>
                                </div>
                                <span class="link_name">生词本</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/order-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-yigoumai"></i>
                                </div>
                                <span class="link_name">已购课程</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/lei-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 20px;" class="icon_tit iconfont icon-dou-copy"></i>
                                </div>
                                <span class="link_name">雷豆管理</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/invitation.html">
                            <div>
                                <div class="inm icon_tit_wrap"><i class="icon_tit iconfont icon-yaoqing"></i></div>
                                <span class="link_name">邀请好友</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="centerRight fr bg_f">
                <!--收藏-->
                <div class="collection_wrap">
                    <div class="tagRow_content">
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目单项：</div>
                            <div class="tagList">
                                <a href="/user/se-0/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                   <?php if (empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                                <a href="/user/se-1/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1){ ?>class="on" <?php } ?>>填空</a>
                                <a href="/user/se-2/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 2){ ?>class="on" <?php } ?>>阅读</a>
                                <a href="/user/se-3/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 3){ ?>class="on" <?php } ?>>数学</a>
                            </div>
                        </div>
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目来源：</div>
                            <div class="tagList">
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                   <?php if (empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                                <?php
                                foreach ($sources as $v) {
                                    ?>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo $v['id'] ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html"
                                       <?php if (isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['alias'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目难度：</div>
                            <div class="tagList">
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-0.html"
                                   <?php if (empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                                <?php
                                foreach ($levels as $v) {
                                    ?>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo $v['id'] ?>.html"
                                       <?php if (isset($_GET['levelId']) && $_GET['levelId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <dl class="problem_list">
                            <?php
                            foreach ($questionCollection['data'] as $v) {
                                ?>
                                <dt class="flex-container">
                                    <div class="collection_text">
                                        <div class="pn_wrap clearfix">
                                            <a class="ellipsis fl problem_name"
                                               href="/question/<?php echo $v['id'] ?>.html"
                                               target="_blank">【<?php echo $v['section'] ?> <?php echo $v['source']['alias'] ?>
                                                -<?php echo $v['id'] ?>】</a>
                                            <div class="problem_data fr clearfix">
                                                <div class="pd_row"><img src="/cn/images/searchproblem/user_s1.png"
                                                                         alt="">
                                                    <span><?php echo $v['doNum'] ?>人已做</span></div>
                                                <div class="pd_row"><img src="/cn/images/searchproblem/zx_1.png"
                                                                         alt="">
                                                    <span> <?php echo $v['correctRate'] ?>%正确率</span></div>
                                            </div>
                                        </div>
                                        <div class="ellipsis-2 problem_de"><?php echo $v['stem'] ?></div>
                                    </div>
                                    <div class="cancel_collection">
                                        <a class="cancel_btn" onclick="collect(<?php echo $v['id'] ?>,this)"
                                           href="javascript:void (0);">取消收藏</a>
                                    </div>
                                </dt>
                                <?php
                            }
                            ?>
                        </dl>
                        <div class="pageSize tm" style="padding:40px 0;">
                            <ul>
                                <?php echo $data['pageStr'] ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    //    收藏题目
                    function collect(questionId, o) {
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
                                location.reload();

                            }
                        })
                    }

                    $(document).on('click', '.iPage', function () {

                        $(this).addClass('on').siblings().removeClass('on');

                        var page = $('.pageSize li.on').html();
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html?page=" + page;
                    });
                    $(document).on('click', '.prev', function () {

                        var page = $('.pageSize li.on').html();
                        if (page == 1) {
                            return false;
                        } else {
                            page = parseInt(page) - 1;
                        }
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html?page=" + page;
                    });
                    $(document).on('click', '.next', function () {
                        var page = $('.pageSize li.on').html();
                        if (page == 7) {
                            return false;
                        } else {
                            page = parseInt(page) + 1;
                        }
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>.html?page=" + page;
                    })
                </script>
            </div>
        </div>
</section>
<script type="text/javascript">
    function deleteMoldR(o) {
        if (confirm("确定删除模考记录？")) {
            window.location.href = $(o).attr("data-link");
        }
    }

    function moldReload(o) {
        if (confirm("是否重新模考？重新模考之后，之前的记录是会被清除的哦！")) {
            window.location.href = $(o).attr("data-link");
        }
    }

    function timeSaiX() {
        var startTime = $("#dpd1").val();
        var endTime = $("#dpd2").val();
        if (!startTime && !endTime) {
            alert("请至少选择一个时间");
            return false;
        } else {
            var dateS = new Date(startTime.replace(/-/g, '/'));
            var dateE = new Date(endTime.replace(/-/g, '/'));
            var time1 = dateS.getTime();
            var time2 = dateE.getTime();
            if (!time1) {
                time1 = 0;
            }
            if (!time2) {
                time2 = 0;
            }
            window.location.href = "/user/" + time1 + "-" + time2 + ".html?center=8";
        }
    }
</script>
