<?php $userData = Yii::$app->session->get('userData') ?>
<?php $level = Yii::$app->session->get('level') ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_userCenter/gre_userCenter.css?v=1.0">
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
                    <li>
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
                    <li class="on">
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
                <!--已购课程-->
                <div class="orderStatu_Wrap">
                    <div class="slideTxtBox">
                        <div class="ldManger_tab_check hd">
                            <a href="/user/order-0.html"
                               data-value="0" <?php if (empty($_GET['type'])) { ?> class="on"<?php } ?>>全部订单</a>
                            <a href="/user/order-1.html"
                               data-value="1" <?php if (isset($_GET['type']) && $_GET['type'] == 1) { ?> class="on"<?php } ?>>直播课程</a>
                            <a href="/user/order-2.html"
                               data-value="2" <?php if (isset($_GET['type']) && $_GET['type'] == 2) { ?> class="on"<?php } ?>>视频课程</a>
                        </div>
                        <div class="bd">
                            <div class="orderItem_wrap">

                                <?php
                                foreach ($curriculum['data'] as $v) {
                                    ?>
                                    <div class="orderItem_list">
                                        <div class="orderStatu_data">
                                            <span>订单号：<?php echo $v['orderNumber'] ?></span>
                                            <?php
                                            if ($v['status'] == 3) {
                                                ?>
                                                <span>购买日期：<?php echo date('Y-m-d H:i:s', $v['payTime']) ?></span>
                                                <span>有效期：<?php echo date('Y-m-d H:i:s', $v['endTime2']) ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span>购买日期：未付款 <em class="str_pink">（已下订单，请在30分钟之内付款）</em></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="clearfix orderInfo_de">
                                            <div class="orderStatu_courseImg int"><img
                                                        src="<?php echo $v['detail']['image'] ?>" alt=""></div>
                                            <div class="orderInfo_md inb">
                                                <div class="orderInfo_titwrap">
                                                    <span
                                                            class="ellipsis order_courseName inm"><?php echo $v['detail']['name'] ?></span>
                                                    <span
                                                            class="order_num inm"><em>x</em><em><?php echo $v['num'] ?></em></span>
                                                </div>
                                                <div class="order_info">
                                                    <dl class="orderInfo_item int">
                                                        <dt>主讲老师：雷哥网名师团</dt>
                                                        <dt>开课日期： <?php echo $v['detail']['commencement'] ?></dt>
                                                    </dl>
                                                    <dl class="orderInfo_item int">
                                                        <dt>课程时长： <?php echo $v['detail']['duration'] ?></dt>
                                                        <dt>性价比： <?php echo $v['detail']['performance'] ?></dt>
                                                    </dl>
                                                    <dl class="orderInfo_item int">
                                                        <dt>原价： <?php echo $v['price'] ?></dt>
                                                        <dt class="str_green">实付： <?php echo $v['payable'] ?></dt>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="orderInfo_handle inb clearfix">
                                                <a class="orderHandle_btn"
                                                   href="/course/<?php echo $v['detail']['id'] ?>.html"
                                                   target="_blank">查看详情</a>
                                                <?php
                                                if ($v['status'] == 1) {
                                                    ?>
                                                    <a class="orderHandle_btn"
                                                       href="https://order.viplgw.cn/payType/<?php echo $v['id'] ?>.html"
                                                       target="_blank">立即付款</a>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($v['startTime'] <= time() && $v['endTime'] >= time() && $v['status'] == 3) {
                                                    ?>
                                                    <a class="orderHandle_btn"
                                                       href="https://order.viplgw.cn/pay/video/index?contentId=<?php echo $v['detail']['id'] ?>"
                                                       target="_blank">进入直播教室</a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!--进入视频界面入口-->
                                        <?php
                                        if ($v['video'] && $v['status'] == 3) {
                                            ?>
                                            <div class="showVideo">
                                                <!--                                                    <h4>录播视频</h4>-->
                                                <!--                                                    <div style="clear: both"></div>-->
                                                <!--                                                    <div style="width: 100%;border: 1px #ece8e8 solid;margin: 10px 0;"></div>-->
                                                <?php
                                                foreach ($v['video'] as $va) {
                                                    ?>
                                                    <span class="sort"><?php echo $va['type']; ?></span>
                                                    <div style="float: left;width: 788px;">
                                                        <?php foreach ($va['data'] as $h => $r) {
                                                            ?>
                                                            <a href="https://order.viplgw.cn/pay/video/video?id=<?php echo $v['ogid'] ?>&videoId=<?php echo $r['id'] ?>&type=1"
                                                               target="_blank">
                                                                <button type="button"><?php echo $r['name'] ?></button>
                                                                <img src="/cn/images/gre-play.png" alt="图标"/>
                                                            </a>
                                                            <?php
                                                        } ?>
                                                    </div>
                                                    <!--                                                    分割线-->
                                                    <div style="clear: both;"></div>
                                                    <div class="xian_cour"></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="pageSize tm" style="padding-top: 45px;padding-bottom: 15px;">
                                    <ul>
                                        <?php echo $curriculum['pageStr'] ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).on('click', '.iPage', function () {

                        $(this).addClass('on').siblings().removeClass('on');
                        var type = $('.ldManger_tab_check a.on').attr('data-value');
                        var page = $('.pageSize li.on').html();

                        switch (type) {
                            case '0':
                                location.href = "/user/order-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/order-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/order-2.html?page=" + page;
                                break;
                        }
                    });
                    $(document).on('click', '.prev', function () {
                        var page = $('.pageSize li.on').html();
                        var type = $('.ldManger_tab_check a.on').attr('data-value');
                        if (page == 1) {
                            return false;
                        } else {
                            page = parseInt(page) - 1;
                        }
                        switch (type) {
                            case '0':
                                location.href = "/user/order-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/order-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/order-2.html?page=" + page;
                                break;
                        }
                    });
                    $(document).on('click', '.next', function () {
                        var page = $('.pageSize li.on').html();
                        var type = $('.ldManger_tab_check a.on').attr('data-value');
                        if (page == 7) {
                            return false;
                        } else {
                            page = parseInt(page) + 1;
                        }
                        switch (type) {
                            case '0':
                                location.href = "/user/order-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/order-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/order-2.html?page=" + page;
                                break;
                        }
                    });

                    function removeSub(obj, orderId) {
                        var box = $(obj).parents('.orderInfo_de');
                        $.ajax({
                            url: "https://order.viplgw.cn/pay/api/delete-order",
                            dataType: "json",
                            data: {orderId: orderId},
                            type: "POST",
                            success: function (req) {
                                alert(req.message);
                                if (req.code == 1) {
                                    location.reload();
                                }
                            }
                        })
                    }
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
