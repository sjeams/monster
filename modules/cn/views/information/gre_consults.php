<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/gre_consult.css">
<body>
<section id="consult" class="bg_f">
    <div class="w12">
        <div class="clearfix beikao-content consult_teamp">
            <div class="consult_left fl">
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
                            <li>
                                <a href="/information/<?php echo $v['id'] ?>.html">
                                    <div class="clearfix">
                                        <div class="consult_img fl"><img src="<?php echo $v['image'] ?>" alt=""></div>
                                        <div class="consult_text fr">
                                            <p class="ellipsis consult_tit"><?php echo $v['name'] ?></p>

                                            <p class="ellipsis-2 consult_de"><?php echo $v['answer'] ?></p>

                                            <div class="consult_view clearfix">
                                                <div class="fl">
                                                    <span>2017-10-12  14:00</span>
                                                    <em class="view_line">|</em>
                                                    <span>关注度：<?php echo $v['viewCount'] ?></span>
                                                </div>
                                                <span class="fr">评论：<?php echo $v['num'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
                            location.href ="/information/content-<?php echo $keyword ?>/"+page+".html";
                        });

                        $('.prev').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == 1){
                                return false;
                            }else{
                                page = parseInt(page)-1;
                            }
                            location.href ="/information/content-<?php echo $keyword ?>/"+page+".html";
                        });

                        $('.next').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == <?php echo $data['total']?>){
                                return false;
                            }else{
                                page = parseInt(page)+1;
                            }
                            location.href ="/information/content-<?php echo $keyword ?>/"+page+".html";
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