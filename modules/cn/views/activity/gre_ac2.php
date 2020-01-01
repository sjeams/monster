<link rel="stylesheet" href="/cn/css/gre_ac2.css?v=1">
<?php
$res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '564', 'order' => ' RAND()', 'page' => 1, 'pageSize' => 1]);
foreach ($res as $v) {
    ?>
    <section><a href="<?php echo $v['answer'] ?>" target="_blank"
                style="background: url('https://gre.viplgw.cn/<?php echo $v['image'] ?> ')no-repeat center;background-size:auto 100%;display:block;width: 100%;height: 400px"></a>
    </section>
    <?php
}
?>
<section>
    <div class="w12">
        <div class="tm tit_head">
            <div class="loader-inner inm line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <span class="inm gre_tit">GRE活动</span>
            <div class="loader-inner inm line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="relative tab_check_wrap" id="page_li">
            <ul class="tab_check flex-container-center clearfix">
                <li class="on" data-type="439"><span>全部活动</span><img class="b1_crow"
                                                                     src="/cn/images/gre_ac2/gre_crow_b1.png" alt="">
                </li>
                <li data-type="440"><span>公开课</span><img class="b1_crow" src="/cn/images/gre_ac2/gre_crow_b1.png"
                                                         alt=""></li>
                <li data-type="441"><span>刷题团</span><img class="b1_crow" src="/cn/images/gre_ac2/gre_crow_b1.png"
                                                         alt=""></li>
                <li data-type="442"><span>单词团</span><img class="b1_crow" src="/cn/images/gre_ac2/gre_crow_b1.png"
                                                         alt=""></li>
            </ul>
            <img class="ac_pr ani" src="/cn/images/gre_ac2/ac_p1.png" alt="">
            <img class="ac_pl ani" src="/cn/images/gre_ac2/ac_p2.png" alt="">
        </div>
        <div class="tab_item_wrap">
            <div class="tim_wrap">
                <ul class="tab_item clearfix">
                    <?php
                    foreach ($data532['data'] as $v) {
                        ?>
                        <li>
                            <div class="tab_item_img">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <img src="https://open.viplgw.cn/<?php echo $v['image'] ?>" alt="">
                                </a>
                                <div class="item_tag_wrap ani">
                                    <p class="item_tag_name"><?php echo $v['catName'] ?></p>
                                    <?php $surplus = ceil((strtotime($v['commencement']) - time()) / 86400) ?>
                                    <p class="item_tag_status"><?php if ($surplus > 0) { ?>进行中<?php } else { ?>已结束<?php } ?></p>
                                </div>
                            </div>
                            <div class="tab_item_info">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <p class="tab_info_de ellipsis-2"><?php echo $v['name'] ?></p>
                                </a>
                                <div class="clearfix">
                                    <div class="tm view_wrap fl">
                                        <p class="view_num"><?php echo $v['numbering'] ?></p>

                                        <p class="view_name">报名人数</p>
                                    </div>
                                    <div class="tm view_wrap fr">
                                        <p class="view_num"><?php if ($surplus > 0) {
                                                echo $surplus;
                                            } else {
                                                echo 0;
                                            } ?></p>

                                        <p class="view_name">剩余天数</p>
                                    </div>
                                </div>
                                <p class="tab_item_date">开始时间：<?php echo $v['cnName'] ?></p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="pageSize_wrap tm">
                    <ul class="pageSize inm clearfix" id="pageSize">
                        <?php echo $data532['pageStr'] ?>
                    </ul>
                </div>
            </div>
            <div class="tim_wrap">
                <ul class="tab_item clearfix">
                    <?php
                    foreach ($data533['data'] as $v) {
                        ?>
                        <li>
                            <div class="tab_item_img">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <img src="https://open.viplgw.cn/<?php echo $v['image'] ?>" alt="">
                                </a>
                                <div class="item_tag_wrap ani">
                                    <p class="item_tag_name">公开课</p>
                                    <?php $surplus = ceil((strtotime($v['commencement']) - time()) / 86400) ?>
                                    <p class="item_tag_status"><?php if ($surplus > 0) { ?>进行中<?php } else { ?>已结束<?php } ?></p>
                                </div>
                            </div>
                            <div class="tab_item_info">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <p class="tab_info_de ellipsis-2"><?php echo $v['name'] ?></p>
                                </a>
                                <div class="clearfix">
                                    <div class="tm view_wrap fl">
                                        <p class="view_num"><?php echo $v['numbering'] ?></p>

                                        <p class="view_name">报名人数</p>
                                    </div>
                                    <div class="tm view_wrap fr">
                                        <p class="view_num"><?php if ($surplus > 0) {
                                                echo $surplus;
                                            } else {
                                                echo 0;
                                            } ?></p>

                                        <p class="view_name">剩余天数</p>
                                    </div>
                                </div>
                                <p class="tab_item_date">开始时间：<?php echo $v['cnName'] ?></p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="pageSize_wrap tm">
                    <ul class="pageSize inm clearfix" id="pageSize1">
                        <?php echo $data533['pageStr'] ?>
                    </ul>
                </div>
            </div>
            <div class="tim_wrap">
                <ul class="tab_item clearfix">
                    <?php
                    foreach ($data535['data'] as $v) {
                        ?>
                        <li>
                            <div class="tab_item_img">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <img src="https://open.viplgw.cn/<?php echo $v['image'] ?>" alt="">
                                </a>
                                <div class="item_tag_wrap ani">
                                    <p class="item_tag_name">刷题团</p>
                                    <?php $surplus = ceil((strtotime($v['commencement']) - time()) / 86400) ?>
                                    <p class="item_tag_status"><?php if ($surplus > 0) { ?>进行中<?php } else { ?>已结束<?php } ?></p>
                                </div>
                            </div>
                            <div class="tab_item_info">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <p class="tab_info_de ellipsis-2"><?php echo $v['name'] ?></p>
                                </a>
                                <div class="clearfix">
                                    <div class="tm view_wrap fl">
                                        <p class="view_num"><?php echo $v['numbering'] ?></p>
                                        <p class="view_name">报名人数</p>
                                    </div>
                                    <div class="tm view_wrap fr">
                                        <p class="view_num"><?php if ($surplus > 0) {
                                                echo $surplus;
                                            } else {
                                                echo 0;
                                            } ?></p>

                                        <p class="view_name">剩余天数</p>
                                    </div>
                                </div>
                                <p class="tab_item_date">开始时间：<?php echo $v['cnName'] ?></p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="pageSize_wrap tm">
                    <ul class="pageSize inm clearfix" id="pageSize2">
                        <?php echo $data535['pageStr'] ?>
                    </ul>
                </div>
            </div>
            <div class="tim_wrap">
                <ul class="tab_item clearfix">
                    <?php
                    foreach ($data534['data'] as $v) {
                        ?>
                        <li>
                            <div class="tab_item_img">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <img src="https://open.viplgw.cn/<?php echo $v['image'] ?>" alt="">
                                </a>
                                <div class="item_tag_wrap ani">
                                    <p class="item_tag_name">单词团</p>
                                    <?php $surplus = ceil((strtotime($v['commencement']) - time()) / 86400) ?>
                                    <p class="item_tag_status"><?php if ($surplus > 0) { ?>进行中<?php } else { ?>已结束<?php } ?></p>
                                </div>
                            </div>
                            <div class="tab_item_info">
                                <a href="/activity/a-<?php echo $v['id'] ?>.html">
                                    <p class="tab_info_de ellipsis-2"><?php echo $v['name'] ?></p>
                                </a>
                                <div class="clearfix">
                                    <div class="tm view_wrap fl">
                                        <p class="view_num"><?php echo $v['numbering'] ?></p>

                                        <p class="view_name">报名人数</p>
                                    </div>
                                    <div class="tm view_wrap fr">
                                        <p class="view_num"><?php if ($surplus > 0) {
                                                echo $surplus;
                                            } else {
                                                echo 0;
                                            } ?></p>

                                        <p class="view_name">剩余天数</p>
                                    </div>
                                </div>
                                <p class="tab_item_date">开始时间：<?php echo $v['cnName'] ?></p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="pageSize_wrap tm">
                    <ul class="pageSize inm clearfix" id="pageSize3">
                        <?php echo $data534['pageStr'] ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        init();
        $('.tab_check li').click(function () {
            var num = $(this).index();
            $(this).addClass('on').siblings('li').removeClass('on');
            $('.tim_wrap').eq(num).show().siblings('.tim_wrap').hide();
        });
        $('.iPage').click(function () {
            var catId = $('.tab_check li.on').attr('data-type');
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var page = $('#pageSize').find('.on').html();
            if (catId == 533) {
                page = $('#pageSize1').find('.on').html();
            }
            if (catId == 534) {
                page = $('#pageSize2').find('.on').html();
            }
            if (catId == 535) {
                page = $('#pageSize3').find('.on').html();
            }
            location.href = "/activity/" + catId + "-" + page + ".html#page_li";
        });

        $('.prev').click(function () {
            var catId = $('.tab_check li.on').attr('data-type');
            var page = $('#pageSize').find('.on').html();
            if (catId == 533) {
                page = $('#pageSize1').find('.on').html();
                if (page == 1) {
                    return false;
                } else {
                    page = parseInt(page) - 1;
                }
            }
            if (catId == 534) {
                page = $('#pageSize2').find('.on').html();
                if (page == 1) {
                    return false;
                } else {
                    page = parseInt(page) - 1;
                }
            }
            if (catId == 535) {
                page = $('#pageSize3').find('.on').html();
                if (page == 1) {
                    return false;
                } else {
                    page = parseInt(page) - 1;
                }
            }
            location.href = "/activity/" + catId + "-" + page + ".html#page_li";
        });

        $('.next').click(function () {
            var catId = $('.tab_check li.on').attr('data-type');
            var page = $('#pageSize').find('.on').html();
            if (catId == 533) {
                if (page == <?php echo $data533['total']?>) {
                    return false;
                } else {
                    page = parseInt(page) + 1;
                }
            }
            if (catId == 534) {
                if (page == <?php echo $data534['total']?>) {
                    return false;
                } else {
                    page = parseInt(page) + 1;
                }
            }
            if (catId == 535) {
                if (page == <?php echo $data535['total']?>) {
                    return false;
                } else {
                    page = parseInt(page) + 1;
                }
            }
            location.href = "/activity/" + catId + "-" + page + ".html#page_li";
        });
    });

    function init() {
        var num = $('.tab_check li.on').index();
        $('.tim_wrap').eq(num).show().siblings('.tim_wrap').hide();
    }

</script>

</html>
