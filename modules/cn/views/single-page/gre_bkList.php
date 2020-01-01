<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_consult.css">
<section id="bk_list" class="bg_f">
    <div class="w12">
        <div class="ad_img">
            <?php
            $res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '563','order'=>' RAND()','page'=>1,'pageSize' => 1]);
            foreach($res as $v) {
                ?>
                <a href="<?php echo $v['answer'] ?>"><img src="<?php echo $v['image'] ?>" alt=""></a>
                <?php
            }
            ?>
        </div>
        <div class="clearfix consult_teamp">
            <div class="consult_left fl">
                <!--当前地址-->
                <div class="location">
                    <a href="/beikao.html">GRE备考</a>
                    <em>></em>
                    <span class="cur_cation ellipsis inm"><?php if($class['id'] == 537){ echo '备考文章'; }else{ echo $class['name']; } ?></span>
                </div>
                <!--list-->
                <div>
                    <ul class="consult_list">
                        <?php
                        foreach($data['data'] as $v) {
                            ?>
                            <li data-id="<?php echo $v['id'] ?>">
<!--                                <a href="/beikao/d---><?php //echo $class['id'] ?><!-----><?php //echo $v['id'] ?><!--.html">-->
                                    <div class="clearfix">
                                        <div class="consult_img fl">
                                            <a href="/beikao/d-<?php echo $class['id'] ?>-<?php echo $v['id'] ?>.html">
                                                <img src="<?php echo $v['image'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="consult_text fr">
                                            <p class="ellipsis consult_tit">
                                                <a href="/beikao/d-<?php echo $class['id'] ?>-<?php echo $v['id'] ?>.html">
                                                <?php echo $v['name'] ?>
                                                </a>
                                            </p>

                                            <p class="ellipsis-2 consult_de"><?php echo $v['answer'] ?></p>
<!--                                            新版-->
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

                                                    <span><?php echo $v['alternatives'] ?></span>
                                                    <span class="view_line">|</span>
                                                    <span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                                </div>
                                                <span class="fr an-inImg">
                                                     <a href="/beikao/d-<?php echo $class['id'] ?>-<?php echo $v['id'] ?>.html">
                                                            <img src="/cn/images/common-plicon.png" alt="评论图标"/>
                                                            评论 <?php echo $v['num'] ?>
                                                     </a>
                                                </span>
                                                <span class="fr an-inImg" style="margin-right: 10px;">
                                                    <a href="javascript:void(0);" onclick="clickZanCom(this)">
                                                            <img src="/cn/images/common-zan.png" alt="评论图标"/>
                                                            点赞 <b><?php echo $v['fabulous'] ?></b>
                                                     </a>
                                                </span>
                                            </div>
<!--                                            旧版-->
<!--                                            <div class="consult_view clearfix">-->
<!--                                                <div class="fl">-->
<!--                                                    <span>--><?php //echo $v['alternatives'] ?><!--</span>-->
<!--                                                    <em class="view_line">|</em>-->
<!--                                                    <span>关注度：--><?php //echo $v['viewCount'] ?><!--</span>-->
<!--                                                </div>-->
<!--                                                <span class="fr">评论：--><?php //echo $v['num'] ?><!--</span>-->
<!--                                            </div>-->
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
                            location.href ="/beikao/<?php echo $_GET['catId'] ?>-"+page+".html";
                        })

                        $('.prev').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == 1){
                                return false;
                            }else{
                                page = parseInt(page)-1;
                            }
                            location.href ="/beikao/<?php echo $_GET['catId'] ?>-"+page+".html";
                        });

                        $('.next').click(function(){
                            var page = $('.pageSize').find('.on').html();
                            if(page == <?php echo $data['total']?>){
                                return false;
                            }else{
                                page = parseInt(page)+1;
                            }
                            location.href ="/beikao/<?php echo $_GET['catId'] ?>-"+page+".html";
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