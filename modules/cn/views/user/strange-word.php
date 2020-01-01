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
                    <li class="on">
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
                <!--生词本-->
                <div class="collection_wrap">
                        <div class="tagRow_content">
                            <div class="tagRow clearfix">
                                <div class="tagTit">收藏时间：</div>
                                <div class="tagList">
                                    <a href="/user/t-0/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (empty($_GET['time'])){ ?>class="on" <?php } ?>>全部</>
                                    <a href="/user/t-day/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'day'){ ?>class="on" <?php } ?>>今日</a>
                                    <a href="/user/t-week/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'week'){ ?>class="on" <?php } ?>>一周</a>
                                    <a href="/user/t-month/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month'){ ?>class="on" <?php } ?>>一个月</a>
                                    <a href="/user/t-month1/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month1'){ ?>class="on" <?php } ?>>三个月</a>
                                    <a href="/user/t-month2/s-<?php echo isset($_GET['sort']) ? $_GET['sort'] : 0 ?>.html"
                                       <?php if (isset($_GET['time']) && $_GET['time'] == 'month2'){ ?>class="on" <?php } ?>>三个月以上</a>
                                </div>
                            </div>
                            <div class="tagRow clearfix">
                                <div class="tagTit">排列顺序：</div>
                                <div class="tagList">
                                    <a href="/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-0.html"
                                       <?php if (empty($_GET['sort'])){ ?>class="on" <?php } ?>>按时间顺序</a>
                                    <a href="/user/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>/s-1.html"
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
                            }
                            else {
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
