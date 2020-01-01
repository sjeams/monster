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
        <div class="centerTop bg_f tm">
            <div class="userInfo_wrap inm">
                <div class="userImg_1 inm"><img id="headImage"
                                                src="<?php echo isset($userData['image']) ? $userData['image'] : '/cn/images/gre_userCenter/test_user.png' ?>"
                                                alt=""></div>
                <div class="inm">
                    <p class="username ellipsis"><?php echo isset($userData['nickname']) ? $userData['nickname'] : $userData['userName'] ?></p>
                    <p class="userLevel"><i class="iconfont icon-level"></i><span><?php echo $level ?></span></p>
                    <a class="link_set" href="/user.html">个人设置</a>
                </div>
            </div>
            <div class="testItme_wrap inm">
                <div class="test_item">
                    <div class="inm tem_text">
                        <p class="item_tit">做题总数</p>
                        <p class="item_data"><?php echo $questionTotal ?></p>
                    </div>
                    <div class="inm">
                        <i class="iconfont icon icon-shunxulianxi-copy"></i>
                    </div>
                </div>
                <div class="test_item">
                    <div class="inm tem_text">
                        <p class="item_tit">正确率</p>
                        <p class="item_data"><?php echo round($correctNum / $questionTotal * 100); ?>%</p>
                    </div>
                    <div class="inm">
                        <i class="iconfont icon icon-shuju"></i>
                    </div>
                </div>
                <div class="test_item">
                    <div class="inm tem_text">
                        <p class="item_tit">单词记忆总数</p>
                        <p class="item_data"><?php echo $wordNum ?></p>
                    </div>
                    <div class="inm">
                        <i class="iconfont icon icon-danciben"></i>
                    </div>
                </div>
                <div class="test_item">
                    <div class="inm tem_text">
                        <p class="item_tit">复习天数</p>
                        <p class="item_data"><?php echo ceil((time() - $userData['createTime']) / 86400) ?>天</p>
                    </div>
                    <div class="inm">
                        <i class="iconfont icon icon-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="w12 clearfix">
            <!--个人中心-左边-->
            <div class="centerLeft fl bg_f">
                <ul class="centerLeft_nav">
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 1){ ?>class="on" <?php } ?>>
                        <a href="/user/se-0/so-0/l-0/c-1.html">
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
                                    <i class="icon_tit iconfont icon-jilu"></i>
                                </div>
                                <span class="link_name">做题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 2){ ?>class="on" <?php } ?>>
                        <a href="/user/se-0/so-0/l-0/st-0/t-0/c-2.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-jilu"></i>
                                </div>
                                <span class="link_name">做题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 3){ ?>class="on" <?php } ?>>
                        <a href="/user/se-0/so-0/l-0/t-0/c-3.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon_tit iconfont icon-cuoti"></i>
                                </div>
                                <span class="link_name">错题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 8){ ?>class="on" <?php } ?>>
                        <a href="/user.html?center=8">
                            <div>
                                <div class="inm icon_tit_wrap"><i class="icon_tit iconfont">&#xe660;</i></div>
                                <span class="link_name">模考记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 4){ ?>class="on" <?php } ?>>
                        <a href="/user/t-0/s-0/c-4.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 19px;" class="icon_tit iconfont icon-danci"></i>
                                </div>
                                <span class="link_name">生词本</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 5){ ?>class="on" <?php } ?>>
                        <a href="/user/order-0/c-5.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-yigoumai"></i>
                                </div>
                                <span class="link_name">已购课程</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 6){ ?>class="on" <?php } ?>>
                        <a href="/user/lei-0/c-6.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 20px;" class="icon_tit iconfont icon-dou-copy"></i>
                                </div>
                                <span class="link_name">雷豆管理</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['center']) && $_GET['center'] == 7){ ?>class="on" <?php } ?>>
                        <a href="/user.html?center=7">
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
                <!--个人中心-邀请-->
                <?php if (isset($_GET['center']) && $_GET['center'] == 7) { ?>
                    <div style="display: block" class="invit_wrap">
                        <div class="invit_content">
                            <h1 class="invit_ctit">邀请好友注册:</h1>

                            <p class="invit_ctext">
                                https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/
                            </p>

                            <div class="clearfix">
                                <div class="bdsharebuttonbox fr">
                                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                                    <a href="#" class="bds_more" data-cmd="more"></a>
                                </div>
                                <script>
                                    window._bd_share_config = {
                                        "common": {
                                            "bdSnsKey": {},
                                            "bdText": "",
                                            "bdMini": "2",
                                            "bdPic": "",
                                            "bdStyle": "0",
                                            "bdSize": "24"
                                        }, "share": {}
                                    };
                                    with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'https://bdimg.share.baidu.com/static/api/js/share.js?cdnversion=' + ~(-new Date() / 36e5)];
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 6) { ?>
                    <!--雷豆管理-->
                    <div class="ldManger_wrap">
                        <div class="ldManger_top">
                            <div class="tm ld_str_wrap inm">
                                <h1 class="ld_count"><?php echo $leiDou['integral'] ?></h1>
                                <p class="ld_str">雷豆总数</p>
                            </div>
                            <div class="ld_handle inm">
                                <a class="inm recharge_btn"
                                   href="https://order.viplgw.cn/pay/order/integral?url=https://gre.viplgw.cn/user/lei-0/c-6.html"
                                   target="_blank">立即充值</a>
                                <a class="inm how_use" href="#" target="_blank">如何使用雷豆? 如何获得雷豆?</a>
                            </div>
                        </div>
                        <div class="ldManger_tab_wrap slideTxtBox">
                            <div class="ldManger_tab_check hd">
                                <a href="/user/lei-0/c-6.html" data-value="0"
                                   class="change  <?php if (empty($_GET['type'])) {
                                       echo "on";
                                   } ?>">雷豆明细</a>
                                <a href="/user/lei-1/c-6.html" data-value="1"
                                   class="change <?php echo isset($_GET['type']) && $_GET['type'] == 1 ? 'on' : '' ?>">收入雷豆</a>
                                <a href="/user/lei-2/c-6.html" data-value="2"
                                   class="change <?php echo isset($_GET['type']) && $_GET['type'] == 2 ? 'on' : '' ?>">支出雷豆</a>
                            </div>
                            <div class="bd">
                                <div class="ldTable_item">
                                    <table class="ldTable tm" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="tl" width="280">来源/用途</th>
                                            <th>雷豆变化</th>
                                            <th width="180">日期</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($leiDou['details'] as $v) {
                                            ?>
                                            <tr>
                                                <td class="tl"><?php echo $v['behavior'] ?></td>
                                                <td><?php echo $v['type'] == 1 ? '+' : '-' ?>
                                                    <?php echo $v['integral'] ?></td>
                                                <td><?php echo date("Y-m-d H:i:s", $v['createTime']) ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                    <div class="pageSize tm" style="padding-top: 30px;">
                                        <ul>
                                            <?php echo $leiDou['pageStr'] ?>
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
                                    location.href = "/user/lei-0/c-6.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/lei-1/c-6.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/lei-2/c-6.html?page=" + page;
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
                                    location.href = "/user/lei-0/c-6.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/lei-1/c-6.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/lei-2/c-6.html?page=" + page;
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
                                    location.href = "/user/lei-0/c-6.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/lei-1/c-6.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/lei-2/c-6.html?page=" + page;
                                    break;
                            }
                        })
                    </script>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 5) { ?>
                    <!--已购课程-->
                    <div class="orderStatu_Wrap">
                        <div class="slideTxtBox">
                            <div class="ldManger_tab_check hd">
                                <a href="/user/order-0/c-5.html"
                                   data-value="0" <?php if (empty($_GET['type'])) { ?> class="on"<?php } ?>>全部订单</a>
                                <a href="/user/order-1/c-5.html"
                                   data-value="1" <?php if (isset($_GET['type']) && $_GET['type'] == 1) { ?> class="on"<?php } ?>>直播课程</a>
                                <a href="/user/order-2/c-5.html"
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
                                                            <dt>原价： <?php echo $v['totalMoney'] ?></dt>
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
                                                           href="https://order.viplgw.cn/pay/order?id=<?php echo $v['detail']['id'] ?>&num=<?php echo $v['num'] ?>&belong=6"
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
                                                    <h4>录播视频</h4>
                                                    <div style="clear: both"></div>
                                                    <div
                                                            style="width: 100%;border: 1px #ece8e8 solid;margin: 10px 0;"></div>
                                                    <?php
                                                    foreach ($v['video'] as $va) {
                                                        ?>
                                                        <a href="https://order.viplgw.cn/pay/video/video?id=<?php echo $v['ogid'] ?>&videoId=<?php echo $va['id'] ?>&type=2"
                                                           target="_blank">
                                                            <button type="button"><?php echo $va['name'] ?></button>
                                                        </a>
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
                                    location.href = "/user/order-0/c-5.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/order-1/c-5.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/order-2/c-5.html?page=" + page;
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
                                    location.href = "/user/order-0/c-5.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/order-1/c-5.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/order-2/c-5.html?page=" + page;
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
                                    location.href = "/user/order-0/c-5.html?page=" + page;
                                    break;
                                case '1':
                                    location.href = "/user/order-1/c-5.html?page=" + page;
                                    break;
                                case '2':
                                    location.href = "/user/order-2/c-5.html?page=" + page;
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
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 1) { ?>
                    <!--收藏-->
                    <div class="collection_wrap">
                        <div class="tagRow_content">
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目单项：</div>
                                <div class="tagList">
                                    <a href="/user/se-0/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                       <?php if (empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-1/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1){ ?>class="on" <?php } ?>>填空</a>
                                    <a href="/user/se-2/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 2){ ?>class="on" <?php } ?>>阅读</a>
                                    <a href="/user/se-3/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 3){ ?>class="on" <?php } ?>>数学</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目来源：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                       <?php if (empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($sources as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo $v['id'] ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html"
                                           <?php if (isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['alias'] ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目难度：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-0/c-1.html"
                                       <?php if (empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($levels as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo $v['id'] ?>/c-1.html"
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
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html?page=" + page;
                        });
                        $(document).on('click', '.prev', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 1) {
                                return false;
                            } else {
                                page = parseInt(page) - 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html?page=" + page;
                        });
                        $(document).on('click', '.next', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 7) {
                                return false;
                            } else {
                                page = parseInt(page) + 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/c-1.html?page=" + page;
                        })
                    </script>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 4) { ?>
                    <!--生词本-->
                    <div class="collection_wrap">
                        <div class="tagRow_content">
                            <div class="tagRow clearfix">
                                <div class="tagTit">收藏时间：</div>
                                <div class="tagList">
                                    <a href="/user/t-0/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (empty($_GET['time'])){ ?>class="on" <?php } ?>>全部</>
                                    <a href="/user/t-day/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'day'){ ?>class="on" <?php } ?>>今日</a>
                                    <a href="/user/t-week/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'week'){ ?>class="on" <?php } ?>>一周</a>
                                    <a href="/user/t-month/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month'){ ?>class="on" <?php } ?>>一个月</a>
                                    <a href="/user/t-month1/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month1'){ ?>class="on" <?php } ?>>三个月</a>
                                    <a href="/user/t-month2/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month2'){ ?>class="on" <?php } ?>>三个月以上</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">排列顺序：</div>
                                <div class="tagList">
                                    <a href="/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-0/c-4.html"
                                       <?php if (empty($_GET['sort'])){ ?>class="on" <?php } ?>>按时间顺序</a>
                                    <a href="/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-1/c-4.html"
                                       <?php if (isset($_GET['sort']) && $_GET['sort'] == 1){ ?>class="on" <?php } ?>>按字母顺序</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <dl class="strange_list">
                                <?php
                                foreach ($strangeWords['data'] as $v) {
                                    ?>
                                    <dt>
                                        <div class="flex-container">
                                            <a class="strange_word inm ellipsis"
                                               href="javascript:void (0);"><?php echo $v['word']['word'] ?></a>
                                            <span class="strange_mean inm ellipsis"><?php echo $v['word']['translate'] ?></span>
                                            <a class="strange_remove inm" onclick="delSc(this,<?php echo $v['id'] ?>)"
                                               href="javascript:void (0);">删除</a>
                                        </div>
                                    </dt>
                                    <?php
                                }
                                ?>
                            </dl>
                            <div class="pageSize tm" style="padding:40px 0;">
                                <ul>
                                    <?php echo $strangeWords['pageStr'] ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <script>
                        //                        删除生词
                        function delSc(el, wordId) {
                            var r = confirm("是否删除当前生词！！！");
                            if (r == true) {
                                $.ajax({
                                    url: "/cn/api/delete-strange-word",
                                    dataType: "json",
                                    data: {
                                        wordId: wordId
                                    },
                                    type: "POST",
                                    success: function (res) {
                                        location.reload();
                                    }
                                })
                            } else {
                                return false;
                            }

                        }

                        $(document).on('click', '.iPage', function () {

                            $(this).addClass('on').siblings().removeClass('on');

                            var page = $('.pageSize li.on').html();
                            location.href = "/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html?page=" + page;
                        });
                        $(document).on('click', '.prev', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 1) {
                                return false;
                            } else {
                                page = parseInt(page) - 1;
                            }
                            location.href = "/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html?page=" + page;
                        });
                        $(document).on('click', '.next', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 7) {
                                return false;
                            } else {
                                page = parseInt(page) + 1;
                            }
                            location.href = "/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>/c-4.html?page=" + page;
                        });
                    </script>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 3) { ?>
                    <!--错题记录-->
                    <div class="collection_wrap">
                        <div class="tagRow_content">
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目单项：</div>
                                <div class="tagList">
                                    <a href="/user/se-0/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-1/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1){ ?>class="on" <?php } ?>>填空</a>
                                    <a href="/user/se-2/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 2){ ?>class="on" <?php } ?>>阅读</a>
                                    <a href="/user/se-3/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 3){ ?>class="on" <?php } ?>>数学</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目来源：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($sources as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo $v['id'] ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                           <?php if (isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['alias'] ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目难度：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-0/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                       <?php if (empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($levels as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo $v['id'] ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html"
                                           <?php if (isset($_GET['levelId']) && $_GET['levelId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">做题时间：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-0/c-3.html"
                                       <?php if (empty($_GET['time'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-day/c-3.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'day'){ ?>class="on" <?php } ?>>今日</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-week/c-3.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'week'){ ?>class="on" <?php } ?>>一周</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month/c-3.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month'){ ?>class="on" <?php } ?>
                                    ">一个月</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month1/c-3.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month1'){ ?>class="on" <?php } ?>>三个月</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month2/c-3.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month2'){ ?>class="on" <?php } ?>>三个月以上</a>
                                </div>
                            </div>
                            <!--                            <div class="errorTest_wrap">-->
                            <!--                                <a class="inm errorTest_btn" href="#" target="_blank">-->
                            <!--                                    <img src="/cn/images/gre_testCenter/book_1.png" alt="">-->
                            <!--                                    <span class="inm" style="padding-left: 5px;">错题练习</span>-->
                            <!--                                </a>-->
                            <!--                                <span class="inm errorTest_hint">（点击进入错题库，集中进行错题练习）</span>-->
                            <!--                            </div>-->
                        </div>
                        <div>
                            <dl class="problem_list">
                                <?php
                                foreach ($errorRecord['data'] as $v) {
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

                                            <div class="testOver_data">
                                                <span>我的答案：<strong class="str_pink"><?php echo $v['answer']; ?></strong></span>
                                                <span>正确答案：<strong
                                                            class="str_green"><?php echo $v['qanswer']; ?></strong></span>
                                                <span>用时<?php echo $v['useTime'] ?>s</span>
                                            </div>
                                        </div>
                                        <div class="cancel_collection">
                                            <?php
                                            if ($v['collection'] == 1) {
                                                ?>
                                                <a class="cancel_btn cancel_sc"
                                                   onclick="collect(<?php echo $v['id'] ?>,this)"
                                                   href="javascript:void (0);">取消收藏</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="cancel_btn add_sc"
                                                   onclick="collect(<?php echo $v['id'] ?>,this)"
                                                   href="javascript:void (0);">添加收藏</a>
                                                <?php
                                            }
                                            ?>
                                            <a class="cancel_btn" href="/question/<?php echo $v['id'] ?>.html">查看详情</a>
                                        </div>
                                    </dt>
                                    <?php
                                }
                                ?>
                            </dl>
                            <div class="pageSize tm" style="padding:40px 0;">
                                <ul>
                                    <?php echo $errorRecord['pageStr'] ?>
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
                                    var time = setTimeout(function () {
                                        $('#fixedTc').hide();
                                    }, 3000);
                                    location.reload();
                                }
                            })
                        }

                        $(document).on('click', '.iPage', function () {

                            $(this).addClass('on').siblings().removeClass('on');

                            var page = $('.pageSize li.on').html();
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html?page=" + page;
                        });
                        $(document).on('click', '.prev', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 1) {
                                return false;
                            } else {
                                page = parseInt(page) - 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html?page=" + page;
                        });
                        $(document).on('click', '.next', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 7) {
                                return false;
                            } else {
                                page = parseInt(page) + 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-3.html?page=" + page;
                        })
                    </script>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 2) { ?>
                    <!--做题记录-->
                    <div class="collection_wrap">
                        <div class="tagRow_content">
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目单项：</div>
                                <div class="tagList">
                                    <a href="/user/se-0/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-1/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1){ ?>class="on" <?php } ?>>填空</a>
                                    <a href="/user/se-2/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 2){ ?>class="on" <?php } ?>>阅读</a>
                                    <a href="/user/se-3/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 3){ ?>class="on" <?php } ?>>数学</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目来源：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($sources as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo $v['id'] ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                           <?php if (isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['alias'] ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">题目难度：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-0/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                                    <?php
                                    foreach ($levels as $v) {
                                        ?>
                                        <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo $v['id'] ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                           <?php if (isset($_GET['levelId']) && $_GET['levelId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">做题情况：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-0/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (empty($_GET['state'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-1/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (isset($_GET['state']) && $_GET['state'] == 1){ ?>class="on" <?php } ?>>正确</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-2/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html"
                                       <?php if (isset($_GET['state']) && $_GET['state'] == 2){ ?>class="on" <?php } ?>>错误</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">做题时间：</div>
                                <div class="tagList">
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-0/c-2.html"
                                       <?php if (empty($_GET['time'])){ ?>class="on" <?php } ?>>全部</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-day/c-2.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'day'){ ?>class="on" <?php } ?>>今日</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-week/c-2.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'week'){ ?>class="on" <?php } ?>>一周</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-month/c-2.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month'){ ?>class="on" <?php } ?>
                                    ">一个月</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-month1/c-2.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month1'){ ?>class="on" <?php } ?>>三个月</a>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-month2/c-2.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month2'){ ?>class="on" <?php } ?>>三个月以上</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <dl class="problem_list">
                                <?php
                                foreach ($doneRecord['data'] as $v) {
                                    ?>
                                    <dt class="flex-container">
                                        <div class="collection_text">
                                            <div class="pn_wrap clearfix">
                                                <a class="ellipsis fl problem_name"
                                                   href="/question/<?php echo $v['id'] ?>.html"
                                                   target="_blank">【<?php echo $v['section'] ?> <?php echo $v['source']['alias'] ?>
                                                    -<?php echo $v['id'] ?>】</a>

                                                <div class="problem_data fr clearfix">
                                                    <div class="pd_row"><img src="/cn/images/gre_userCenter/user_s1.png"
                                                                             alt="">
                                                        <span><?php echo $v['doNum'] ?>人已做</span></div>
                                                    <div class="pd_row"><img src="/cn/images/gre_userCenter/zx_1.png"
                                                                             alt="">
                                                        <span><?php echo $v['correctRate'] ?>%正确率</span></div>
                                                </div>
                                            </div>
                                            <div class="ellipsis-2 problem_de"><?php echo $v['stem'] ?></div>

                                            <div class="testOver_data">
                                                <span>我的答案：<strong
                                                            class="str_pink answer_right"><?php echo $v['answer'] ?></strong></span>
                                                <span>正确答案：<strong
                                                            class="str_green"><?php echo $v['qanswer'] ?></strong></span>
                                                <span>用时<?php echo $v['useTime'] ?>s</span>
                                            </div>
                                        </div>
                                        <div class="cancel_collection">
                                            <?php
                                            if ($v['collection'] == 1) {
                                                ?>
                                                <a class="cancel_btn cancel_sc"
                                                   onclick="collect(<?php echo $v['id'] ?>,this)"
                                                   href="javascript:void (0);">取消收藏</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="cancel_btn add_sc"
                                                   onclick="collect(<?php echo $v['id'] ?>,this)"
                                                   href="javascript:void (0);">添加收藏</a>
                                                <?php
                                            }
                                            ?>
                                            <a class="cancel_btn" href="/question/<?php echo $v['id'] ?>.html">查看详情</a>
                                        </div>
                                    </dt>
                                    <?php
                                }
                                ?>
                            </dl>
                            <div class="pageSize tm" style="padding:40px 0;">
                                <ul>
                                    <?php echo $doneRecord['pageStr']; ?>
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
                                    var time = setTimeout(function () {
                                        $('#fixedTc').hide();
                                    }, 3000);
                                    location.reload();
                                }
                            })
                        }

                        $(document).on('click', '.iPage', function () {

                            $(this).addClass('on').siblings().removeClass('on');

                            var page = $('.pageSize li.on').html();
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html?page=" + page;
                        });
                        $(document).on('click', '.prev', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 1) {
                                return false;
                            } else {
                                page = parseInt(page) - 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html?page=" + page;
                        });
                        $(document).on('click', '.next', function () {

                            var page = $('.pageSize li.on').html();
                            if (page == 7) {
                                return false;
                            } else {
                                page = parseInt(page) + 1;
                            }
                            location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/st-<?php echo isset($_GET['state']) ? $_GET['state'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/c-2.html?page=" + page;
                        })
                    </script>
                    <?php
                } elseif (isset($_GET['center']) && $_GET['center'] == 8) { ?>
                    <div class="record-con">
                        <div class="record_purple">
                            <ul>
                                <li class="<?php if ($time == 0) echo 'on'; ?>"><a
                                            href="/user/time-0.html?center=8">全部</a></li>
                                <li class="<?php if ($time == 1) echo 'on'; ?>"><a
                                            href="/user/time-1.html?center=8">今天</a></li>
                                <li class="<?php if ($time == 2) echo 'on'; ?>"><a
                                            href="/user/time-2.html?center=8">昨天</a></li>
                                <li class="<?php if ($time == 3) echo 'on'; ?>"><a
                                            href="/user/time-3.html?center=8">本周</a></li>
                                <li class="<?php if ($time == 4) echo 'on'; ?>"><a
                                            href="/user/time-4.html?center=8">上周</a></li>
                                <li class="<?php if ($time == 5) echo 'on'; ?>"><a
                                            href="/user/time-5.html?center=8">本月</a></li>
                                <li class="<?php if ($time == 6) echo 'on'; ?>"><a
                                            href="/user/time-6.html?center=8">上月</a></li>
                            </ul>
                            <div class="right_rili">
                                <span>选择时间</span>
                                <img src="/cn/images/mold-riliicon01.png" alt="图标" class="image01"/>
                                <input type="text" class="span2 bg01" value="<?php if (isset($ff) && $ff) echo $ff; ?>"
                                       id="dpd1"/>
                                <b>至</b>
                                <img src="/cn/images/mold-riliicon02.png" alt="图标" class="image02"/>
                                <input type="text" class="span2 bg02" value="<?php if (isset($ee) && $ee) echo $ee; ?>"
                                       id="dpd2">
                                <input type="button" value="确定" class="btn" onclick="timeSaiX()"/>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="re_tishi">
                            <span>提示：</span>各位同学做过的所有已完成和中断的模考记录均会显示在这里，已完成的模考套题可直接查看模考结果，未完成中断的模考必须要重新模考才能看到完整模考结果哦~
                        </div>
                        <div class="record_list">
                            <ul>
                                <?php foreach ($mockExam as $kk => $vv) {
                                    ?>
                                    <li>
                                        <h4>
                                            <a href="javascript:void(0);"><?php echo $vv['mockName'];
                                                if ($vv['mockType'] == 1) echo '（语文）'; elseif ($vv['mockType'] == 2) echo '（数学）'; else echo '（全套）'; ?></a>
                                            <input type="button" value="删除" class="pos default"
                                                   data-link="/cn/user/delete-mock?mockExamId=<?php echo $vv['mockExamId']; ?>"
                                                   onclick="deleteMoldR(this)"/>
                                        </h4>
                                        <div class="re_bot_info">
                                            <div class="info_left">
                                                <p>
                                                    <b><?php echo $vv['correct']; ?>/<?php echo $vv['total']; ?>题</b>
                                                    <?php if ($vv['status'] == 1) { ?>
                                                        <b>耗时<?php echo $vv['times']; ?></b>
                                                        <b>正确率<?php echo $vv['correctRate']; ?>%</b>
                                                    <?php } ?>
                                                </p>
                                                <span>
                                 开始时间：<?php echo $vv['firstTime']; ?>
                            <br/>完成时间：<?php echo $vv['endTime']; ?>
                        </span>
                                            </div>
                                            <div class="info_right">
                                                <div>
                                                    <?php if ($vv['status'] == 1) { ?>
                                                        <a href="javascript:void(0);">
                                                            <input type="button" value="重新模考" class="default"
                                                                   data-link="/cn/user/again-mock?mockExamId=<?php echo $vv['mockExamId']; ?>"
                                                                   onclick="moldReload(this)"/>
                                                        </a>
                                                        <a href="/mockResult/<?php echo $vv['mockExamId']; ?>.html">
                                                            <input type="button" value="查看结果" class="default purple"/>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="/cn/mock-exam/explain?mockExamId=<?php echo $vv['mockExamId']; ?>&type=<?php echo $vv['mockType']; ?>">
                                                            <input type="button" value="继续模考" class="default blue"/>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="record_page">
                            <ul>
                                <?php echo yii\widgets\LinkPager::widget([
                                    'pagination' => $mockPage
                                ]) ?>
                            </ul>
                        </div>
                    </div>
                    <script>
                        var nowTemp = new Date();
                        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                        var checkin = $('#dpd1').fdatepicker({
                            format: 'yyyy-mm-dd',
                            onRender: function (date) {
//            return date.valueOf() < now.valueOf() ? 'disabled' : '';
                            }
                        }).on('changeDate', function (ev) {
                            if (ev.date.valueOf() > checkout.date.valueOf()) {
                                var newDate = new Date(ev.date)
                                newDate.setDate(newDate.getDate() + 1);
                                checkout.update(newDate);
                            }
                            checkin.hide();
                            $('#dpd2')[0].focus();
                        }).data('datepicker');
                        var checkout = $('#dpd2').fdatepicker({
                            format: 'yyyy-mm-dd',
                            onRender: function (date) {
//            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                            }
                        }).on('changeDate', function (ev) {
                            checkout.hide();
                        }).data('datepicker');
                    </script>
                    <?php
                }
                else { ?>
                <!--个人设置-->
                <div class="collection_wrap" style="min-height: 468px;">
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">个人资料</div>
                                <div class="hadInfo inm"><?php echo $userData['userName'] ?></div>
                                <input class="saveData inm" onclick="upImage()" type="button" value="上传头像">
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">昵称:</span>
                                <input class="edtInt nickname" type="text" value="<?php echo $userData['nickname'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">电话:</span>
                                <input class="edtInt phone changePhone" type="text"
                                       value="<?php echo $userData['phone'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">验证码:</span>
                                <input class="edtInt code changePhoneCode" type="text" value="">
                                <input class="sendCode" type="button" onclick="clickDX(this,60,1);" value="获取验证码">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">学校:</span>
                                <input class="edtInt school" type="text" value="<?php echo $userData['school'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">专业:</span>
                                <input class="edtInt major" type="text" value="<?php echo $userData['major'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">年级:</span>
                                <input class="edtInt grade" type="text" value="<?php echo $userData['grade'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserInfo()" type="button" value="保存">
                            </div>
                        </div>
                    </div>
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">登录邮箱</div>
                                <div class="hadInfo navEmail inm"><?php echo !empty($userData['email']) ? $userData['email'] : '未绑定邮箱' ?></div>
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">当前邮箱:</span>
                                <input class="edtInt navEmail" type="text" disabled
                                       value="<?php echo !empty($userData['email']) ? $userData['email'] : '未绑定邮箱' ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">新邮箱:</span>
                                <input class="edtInt email changeEmail" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">验证码:</span>
                                <input class="edtInt code changeEmailCode" type="text" value="">
                                <input class="sendCode" type="button" onclick="clickDX(this,60,2);" value="获取验证码">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserEmail()" type="button" value="保存">
                            </div>
                        </div>

                    </div>
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">密码</div>
                                <div class="hadInfo inm">************</div>
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">旧密码:</span>
                                <input class="edtInt oldPassword" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">新密码:</span>
                                <input class="edtInt newPassword" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">确认密码:</span>
                                <input class="edtInt newPassword2" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserPass()" type="button" value="保存">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //实例化编辑器
                    var o_ueditorupload = UE.getEditor('j_ueditorupload',
                        {
                            autoHeightEnabled: false
                        });
                    o_ueditorupload.ready(function () {

                        o_ueditorupload.hide();//隐藏编辑器

                        //监听图片上传
                        o_ueditorupload.addListener('beforeInsertImage', function (t, arg) {
                            $.post('/cn/api/up-image', {image: arg[0].src}, function (re) {
                                if (re.code == 1) {
                                    $('#headImage').attr('src', arg[0].src);
                                    $('.whiteDiv img').attr('src', arg[0].src);
//                                $('.navImage').attr('src',arg[0].src);
                                } else {
                                    alert(re.message)
                                }
                            }, 'json')

                        });

                        /* 文件上传监听
                         * 需要在ueditor.all.min.js文件中找到
                         * d.execCommand("insertHtml",l)
                         * 之后插入d.fireEvent('afterUpfile',b)
                         */
//                        o_ueditorupload.addListener('afterUpfile', function (t, arg)
//                        {
//                            $('.imageFile').val(arg[0].url);
//                        });
                    });

                    //                    弹出图片上传的对话框
                    function upImage() {
                        var myImage = o_ueditorupload.getDialog("insertimage");
                        myImage.open();
                    }

                    //                弹出文件上传的对话框
                    //                    function upFiles()
                    //                    {
                    //                        var myFiles = o_ueditorupload.getDialog("attachment");
                    //                        myFiles.open();
                    //                    }

                </script>
                <script type="text/plain" id="j_ueditorupload"></script>
                <script>
                    function slideBox(o) {
                        var _this = $(o);
                        if (_this.hasClass('on')) {
                            _this.removeClass('on');
                            _this.find('span').html('修改');
                            _this.find('i').removeClass('icon-angle-up').addClass('icon-angle-down');
                            _this.parents('.setItem').find('.edtInfo_wrap').slideUp();

                        } else {
                            _this.addClass('on');
                            _this.find('span').html('收起');
                            _this.find('i').removeClass('icon-angle-down').addClass('icon-angle-up');
                            _this.parents('.setItem').find('.edtInfo_wrap').slideDown();
                        }
                    }

                    //倒计时函数
                    function clickDX(e, timeN, str) {
                        var phoneReg = /^[1][3,4,5,7,8][0-9]{9}$/;
                        var emailReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
                        var _that = $(e);
                        var defalutVal = $(e).val();
                        var timeNum = timeN;
                        //$(e).removeAttr("onclick");
                        if (str == 1) {
                            var phone = $('.phone:input').val();
                            if (phone == "") {
                                alert('手机号格式不正确(不能小于11位)!');
                                return false;
                            }
                            if (!phoneReg.test(phone)) {
                                alert('手机号格式不正确(不能小于11位)!');
                                return false;
                            } else {
                                $.post('/cn/api/phone-code', {phoneNum: phone}, function (re) {
                                    alert(re.message);
                                }, 'json')
                            }

                        } else {
                            var mail = $('.email:input').val();
                            if (mail == "") {
                                alert('请输入正确的邮箱格式');
                                return false;
                            }
                            if (!emailReg.test(mail)) {
                                return false;
                            } else {
                                $.post('/cn/api/send-mail', {email: mail}, function (re) {
                                    alert(re.message);
                                }, 'json')
                            }

                        }
                        $(e).attr("disabled", true);
                        _that.unbind("click").val(timeNum + "秒后重发");
                        var timer = setInterval(function () {
                            _that.val(timeNum + "秒后重发");
                            timeNum--;
                            if (timeNum < 0) {
                                clearInterval(timer);
                                $(e).removeAttr("disabled");
                                _that.val(defalutVal);
                                if (str == 1) {     //1表示手机短信验证
                                    _that.bind("click", e, phoneCode);
                                }

                            }
                        }, 1000);
                    }

                    /**
                     * 修改用户信息
                     * @returns {boolean}
                     */
                    function changeUserInfo() {
                        var nickname = $('.nickname').val();
                        if (nickname == '') {
                            alert('请输入昵称');
                            return false;
                        }
                        var phone = $('.changePhone').val();
                        var phoneCode = $('.changePhoneCode').val();
                        var school = $('.school').val();
                        var major = $('.major').val();
                        var grade = $('.grade').val();
                        $.post('/cn/api/change-user-info', {
                            nickname: nickname,
                            phone: phone,
                            phoneCode: phoneCode,
                            school: school,
                            major: major,
                            grade: grade
                        }, function (re) {
                            if (re.code == 1) {
                                $('.navNickname').html(nickname);
                            }
                            alert(re.message);
                        }, 'json')
                    }

                    /**
                     * 修改用户邮箱
                     * @returns {boolean}
                     */
                    function changeUserEmail() {
                        var email = $('.changeEmail').val();
                        if (email == '') {
                            alert('请输入邮箱');
                            return false;
                        }
                        var emailCode = $('.changeEmailCode').val();
                        if (emailCode == '') {
                            alert('请输入邮箱验证码');
                            return false;
                        }
                        $.post('/cn/api/change-user-email', {email: email, emailCode: emailCode}, function (re) {
                            if (re.code == 1) {
                                $('.navEmail').html(email);
                            }
                            alert(re.message);
                        }, 'json')
                    }

                    /**
                     * 修改用户密码
                     * @returns {boolean}
                     */
                    function changeUserPass() {
                        var oldPassword = $('.oldPassword').val();
                        if (oldPassword == '') {
                            alert('请输入当前密码');
                            return false;
                        }
                        var newPassword = $('.newPassword').val();
                        var newPassword2 = $('.newPassword2').val();
                        if (newPassword == '' || newPassword2 == '') {
                            alert('请输入新密码');
                            return false;
                        }
                        if (newPassword != newPassword2) {
                            alert('两次新密码不一致');
                            return false;
                        }
                        $.post('/cn/api/change-user-pass', {
                            oldPassword: oldPassword,
                            newPassword: newPassword
                        }, function (re) {
                            alert(re.message);
                        }, 'json')
                    }

                </script>
            </div>
            <?php
            }
            ?>
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
