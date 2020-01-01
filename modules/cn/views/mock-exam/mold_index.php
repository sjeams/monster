<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台</title>
    <meta name="keywords" content="GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2">
    <meta name="description" content="雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析">
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
    <link rel="stylesheet" href="/cn/css/mold-test.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.3.js"></script>
    <script type="text/javascript">
        $(function () {
            //        初始化宽度&位置
            $(".content-wrap .line-tab").each(function () {
                var w = $(this).parent(".content-wrap").find("a.on").innerWidth();
                var left = $(this).parent(".content-wrap").find("a.on").position().left;
                $(this).css({ "left": left+72+"px"}).width(w);
            })

        })
    </script>
</head>
<body>
<input type="hidden" value="<?php echo $uid;?>" id="uid">
<input type="hidden" value="<?php echo $type;?>" id="type">
<input type="hidden" value="<?php echo $access;?>" id="access">
<section class="banner-wrap">
    <img src="/cn/images/mold/mold-indexbanner.jpg" alt="banner"/>
</section>
<section style="padding: 50px 0">
    <div class="w12 clearfix">
        <div class="content-left fl">
            <!--语文-->
            <div class="content-wrap cw-1">
                <div class="tab-tit inb relative">
                    <p class="tm ani l-tit">语文套题<br>模考</p>
                    <a id="ch-1" href="/mockExam/1-2.html#ch-1" <?php if($type  != 1  || ($type == 1 && $access ==2)) echo "class='on'"; ?>>精选真题套题</a>
                    <a id="ch-2" href="/mockExam/1-1.html#ch-2" <?php if($type == 1 && $access == 1) echo "class='on'"; ?>>Magoosh</a>
                </div>
                <p class="relative line-tab" style="left: 152px; width: 65px;"><em class="ani triangle-3"></em></p>
                <div class="tab-list-wrap">
                    <ul class="tab-list clearfix" style="display: block">
                        <?php foreach($mocks[0] as $k => $v){?>
                        <li>
                            <a data-href="/cn/mock-exam/<?php if($v['isDo'] != 2){?>explain?type=1&mockExamId=<?php echo $v['id']?><?php }else{?>result?mockExamId=<?php echo $v['id'];}?>"
                               target="_blank" onclick="tzLink(this)">
                                <em class="small-h">模</em><span class="big-h"><?php echo $v['name']?></span></a>
                            <div class="ani hint">
                                平均得分<em class="color-4"><?php echo $v['average'];?></em>分<br><?php if($v['isDo'] == 2) echo '已完成';elseif($v['isDo'] == 1) echo '中断';else echo '未开始';?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!--数学-->
            <div class="content-wrap cw-2">
                <div class="tab-tit inb relative">
                    <p class="tm ani l-tit">数学套题<br>模考</p>
                    <a id="math-1" href="/mockExam/2-2.html#math-1" <?php if($type != 2  || ($type == 2 && $access ==2)) echo "class='on'"; ?>>精选真题套题</a>
                    <a id="math-2" href="/mockExam/2-1.html#math-2"  <?php if($type == 2 && $access == 1) echo "class='on'"; ?>>Magoosh</a>
                </div>
                <p class="relative line-tab" style="left: 152px; width: 65px;"><em class="ani triangle-3"></em></p>
                <div class="tab-list-wrap" id="shuxue">

                    <ul class="tab-list clearfix" style="display: block">
                        <?php foreach($mocks[1] as $k => $v){?>
                            <li>
                                <a data-href="/cn/mock-exam/<?php if($v['isDo'] != 2){?>explain?type=2&mockExamId=<?php echo $v['id']?><?php }else{?>result?mockExamId=<?php echo $v['id'];}?>"
                                   target="_blank" onclick="tzLink(this)">
                                    <em class="small-h">模</em><span class="big-h"><?php echo $v['name']?></span></a>
                                <div class="ani hint">
                                    平均得分<em class="color-4"><?php echo $v['average'];?></em>分<br><?php if($v['isDo'] == 2) echo '已完成';elseif($v['isDo'] == 1) echo '中断';else echo '未开始';?>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <!--全套-->
            <div class="content-wrap cw-3">
                <div class="tab-tit inb relative">
                    <p class="tm ani l-tit">全套<br>模考</p>
                    <a id="all-1" href="/mockExam/3-2.html#all-1" <?php if($type != 3 || ($type == 3 && $access ==2)) echo "class='on'"; ?>>精选真题套题</a>
                    <a id="all-2" href="/mockExam/3-1.html#all-2" <?php if($type == 3 && $access == 1) echo "class='on'"; ?>>Magoosh</a>
                </div>
                <p class="relative line-tab" style="left: 152px; width: 65px;"><em class="ani triangle-3"></em></p>
                <div class="tab-list-wrap" id="quantao">

                    <ul class="tab-list clearfix" style="display: block">
                        <?php foreach($mocks[2] as $k => $v){?>
                        <li>
                            <a data-href="/cn/mock-exam/<?php if($v['isDo'] != 2){?>explain?type=3&mockExamId=<?php echo $v['id']?><?php }else{?>result?mockExamId=<?php echo $v['id'];}?>"
                               target="_blank" onclick="tzLink(this)">
                                <em class="small-h">模</em><span class="big-h"><?php echo $v['name']?></span></a>
                            <div class="ani hint">
                                平均得分<em class="color-4"><?php echo $v['average'];?></em>分<br><?php if($v['isDo'] == 2) echo '已完成';elseif($v['isDo'] == 1) echo '中断';else echo '未开始';?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--右边部分-->
        <div class="content-right fr">
            <?php foreach($datas as $kk => $vv){?>
            <div class="cr-tit" style=" background: #496688;">
                <div class="triangle-1 ani"></div>
                <?php if($kk == 0)echo "最新全套模考排行";elseif($kk == 1) echo "最新verbal模考排行";else echo "最新Quant模考排行"; ?>
                <div class="triangle-2 ani"></div>
            </div>
            <div class="txtMarquee-top">
                <div class="bd">
                    <ul class="moldInfo_list">
                    <?php foreach($vv as $k => $v){?>
                        <li class="clone" style="height: 24px;">
                        <p class="mold-username inb ellipsis"><?php if(isset($v['userName'])) echo $v['userName'];?></p>
                        <div class="inb">
                            <p class="clearfix score-text">
                                <span class="mold_name inb ellipsis"><?php if(isset($v['userName'])) echo $v['mockExam'];?></span>
                                <span class="mold-score inb"><?php if(isset($v['userName'])) echo $v['score'].'分';?></span>
                            </p>
                        </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <?php } ?>

        </div>
        <!--右边 END-->
    </div>

</section>
<script>

//    $(".txtMarquee-top").slide({
//        mainCell: ".bd ul",
//        autoPlay: true,
//        effect: "topMarquee",
//        vis: 9,
//        opp: false,
//        interTime: 50
//    });
    $(function () {
//        $(".content-wrap .tab-tit a").click(function () {
//            var num = $(this).index();
//            var w2 = $(this).innerWidth();
//            var w3 = $(this).position().left;
//            var parent = $(this).parents(".content-wrap");
//            parent.find(".tab-list").eq(num - 1).show().siblings("ul.tab-list").hide();
//            $(this).addClass("on").siblings("a").removeClass("on");
//            parent.children(".line-tab").width(w2).stop(true).animate({left: w3+73});
//        });
//        平均得分取整
        $(".cw-3 .hint").each(function () {
                var str = $(this).children(".color-4").eq(0).html();
                var str_end = Math.round(str / 10) * 10;
                $(this).children(".color-4").eq(0).html(str_end)
            }
        );


    });
    function tzLink(o) {
        var uid=$("#uid").val();
        if(!uid){
            loginHref();
        }else{
            window.location.href=$(o).attr("data-href");
        }
    }

</script>
</body>
</html>