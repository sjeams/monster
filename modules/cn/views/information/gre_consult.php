<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/gre_consult.css">
<body>
<section id="consult" class="bg_f">
    <div class="w12">
        <div class="clearfix beikao-content consult_teamp wrapper">
            <div class="consult_left fl content">
                <!--banner-->
                <div class="slide_wrapper relative">
                    <div class="hd">
                        <ul class="slide_page"></ul>
                    </div>
                    <div class="bd">
                        <ul class="banner_box">
                            <?php
                            $res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'url','category' => '555','page'=>1,'pageSize' => 5]);
                            foreach($res as $v) {
                                ?>
                                <li>
                                    <a href="<?php echo $v['url'] ?>">
                                        <div class="slide_list">
                                            <img src="<?php echo $v['image'] ?>" alt="">
                                            <p class="slide_tit"><?php echo $v['name'] ?></p>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <script>
                    $(".slide_wrapper").slide({
                        titCell: '.hd .slide_page',
                        mainCell: ".bd .banner_box",
                        effect: "leftLoop",
                        autoPlay: true,
                        autoPage: '<li></li>'
                    });
                </script>
                <!--list-->
                <div>
                    <ul class="consult_list">
                        <?php
                        foreach($data['data'] as $v) {
                            ?>
                            <li data-id="<?php echo $v['id'] ?>">
<!--                                <a href="/information/--><?php //echo $v['id'] ?><!--.html">-->
                                    <div class="clearfix">
                                        <div class="consult_img fl">
                                            <a href="/information/<?php echo $v['id'] ?>.html">
                                            <img src="<?php echo $v['image'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="consult_text fr">
                                            <p class="ellipsis consult_tit">
                                                <a href="/information/<?php echo $v['id'] ?>.html">
                                                <?php echo $v['name'] ?>
                                                </a>
                                            </p>

                                            <p class="ellipsis-3 consult_de"><?php echo $v['answer'] ?></p>

<!--                                            <div class="consult_view clearfix">-->
<!--                                                <div class="fl">-->
<!--                                                    <span>--><?php //echo $v['alternatives'] ?><!--</span>-->
<!--                                                    <em class="view_line">|</em>-->
<!--                                                    <span>关注度：--><?php //echo $v['viewCount'] ?><!--</span>-->
<!--                                                </div>-->
<!--                                                <span class="fr">评论：--><?php //echo $v['num'] ?><!--</span>-->
<!--                                            </div>-->
<!--                                            新版修改 start-->
                                            <div class="consult_view clearfix">
                                                <div class="fl">

                                                    <div class="xiaobian_tx">
                                                        <a href="/copyreader-<?php echo $v['userId']?>.html">
                                                        <img src="<?php echo $v['editUser']['image'] ?>" alt="小编头像"/>
                                                        </a>
                                                    </div>

                                                    <span class="xiaob_name">
                                                         <a href="/copyreader-<?php echo $v['userId']?>.html">
                                                        <?php echo $v['editUser']['nickname'] ?>
                                                         </a>
                                                    </span>
<!--                                                   1天内的展示多少小时前 1天后的展示4-28这种类型-->
                                                    <span><?php echo $v['alternatives'] ?></span>
                                                    <span class="view_line">|</span>
                                                    <span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                                </div>
                                                <span class="fr an-inImg">
                                                    <a href="/information/<?php echo $v['id'] ?>.html">
                                                    <img src="/cn/images/common-plicon.png" alt="评论图标"/>
                                                    评论 <?php echo $v['num'] ?>
                                                    </a>
                                                </span>
                                                <span class="fr an-inImg" style="margin-right: 10px;">
                                                    <a href="javascript:void(0);" onclick="clickZanCom(this)">
                                                         <img src="/cn/images/common-zan.png" alt="评论图标"/>
                                                        点赞 <b><?php echo $v['fabulous'] ?></b></span>
                                                    </a>
                                            </div>
<!--                                            新版修改 end-->
                                        </div>
                                    </div>
<!--                                </a>-->
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="pageSize tm">
                        <ul>
                            <?php echo $data['pageStr'] ?>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $('.iPage').click(function(){
                            $(this).siblings().removeClass('on');
                            $(this).addClass('on');
                            var page = $('.pageSize').find('.on').html();
                            location.href ="/information/list-"+page+".html";
                        })

                        $('.prev').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == 1){
                                return false;
                            }else{
                                page = parseInt(page)-1;
                            }
                            location.href ="/information/list-"+page+".html";
                        })

                        $('.next').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == <?php echo $data['total']?>){
                                return false;
                            }else{
                                page = parseInt(page)+1;
                            }
                            location.href ="/information/list-"+page+".html";
                        })
                    </script>
                </div>
            </div>
            <?php use app\commands\front\RightWidget; ?>
            <?php RightWidget::begin(); ?>
            <?php RightWidget::end(); ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    function clickZanCom(o) {
        var contentId=$(o).parents("li").attr("data-id");
        var num=$(o).find("b").html();
        $.ajax({
            url:"/cn/api/content-fabulous",
            type:"get",
            data:{
                contentId:contentId
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    //                    点赞动画效果
                    $.tipsBox({
                        obj: $(o),
                        str:"+1",
                        callback: function () {
                            $(o).find("b").html(parseInt(num)+1);
                        }
                    });
                    niceIn($(o));
                }else{
                    alert(data.message);
                }
            }
        });
    }
</script>
