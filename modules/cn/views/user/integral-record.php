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
                    <li class="on">
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
                <!--雷豆管理-->
                <div class="ldManger_wrap">
                    <div class="ldManger_top">
                        <div class="tm ld_str_wrap inm">
                            <h1 class="ld_count"><?php echo $leiDou['integral'] ?></h1>
                            <p class="ld_str">雷豆总数</p>
                        </div>
                        <div class="ld_handle inm">
                            <a class="inm recharge_btn" href="https://order.viplgw.cn/pay/order/integral?url=https://gre.viplgw.cn/user/lei-0.html" target="_blank">立即充值</a>
                            <a class="inm how_use" href="#" target="_blank">如何使用雷豆? 如何获得雷豆?</a>
                        </div>
                    </div>
                    <div class="ldManger_tab_wrap slideTxtBox">
                        <div class="ldManger_tab_check hd">
                            <a href="/user/lei-0.html" data-value="0"
                               class="change  <?php if (empty($_GET['type'])) {
                                   echo "on";
                               } ?>">雷豆明细</a>
                            <a href="/user/lei-1.html" data-value="1"
                               class="change <?php echo isset($_GET['type']) && $_GET['type'] == 1 ? 'on' : '' ?>">收入雷豆</a>
                            <a href="/user/lei-2.html" data-value="2"
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
                                location.href = "/user/lei-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/lei-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/lei-2.html?page=" + page;
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
                                location.href = "/user/lei-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/lei-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/lei-2.html?page=" + page;
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
                                location.href = "/user/lei-0.html?page=" + page;
                                break;
                            case '1':
                                location.href = "/user/lei-1.html?page=" + page;
                                break;
                            case '2':
                                location.href = "/user/lei-2.html?page=" + page;
                                break;
                        }
                    })
                </script>
        </div>
    </div>
</section>
<script type="text/javascript">
    function deleteMoldR(o) {
        if(confirm("确定删除模考记录？")){
            window.location.href=$(o).attr("data-link");
        }
    }
    function moldReload(o) {
        if(confirm("是否重新模考？重新模考之后，之前的记录是会被清除的哦！")){
            window.location.href=$(o).attr("data-link");
        }
    }
    function timeSaiX() {
        var startTime=$("#dpd1").val();
        var endTime=$("#dpd2").val();
        if(!startTime && !endTime){
            alert("请至少选择一个时间");
            return false;
        }else{
            var dateS = new Date(startTime.replace(/-/g, '/'));
            var dateE = new Date(endTime.replace(/-/g, '/'));
            var time1 = dateS.getTime();
            var time2 = dateE.getTime();
            if(!time1){
                time1=0;
            }
            if(!time2){
                time2=0;
            }
            window.location.href="/user/"+time1+"-"+time2+".html?center=8";
        }
    }
</script>
