<link rel="stylesheet" href="/cn/css/beikao.css">
<link rel="stylesheet" href="/cn/css/common.css?v=1.1.2">
<script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.3.js"></script>
<div class="beikao-banner">
    <?php
    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '563','page'=>1,'pageSize' => 1]);
    foreach($data as $v) {
        ?>
        <a href="<?php echo $v['answer'] ?>">
            <img src="<?php echo $v['image'] ?>" alt="banner"/>
        </a>
        <?php
    }
    ?>
</div>
<div class="beikao-content wrapper">
    <div class="beikao-left content">
        <div class="theiaStickySidebar">
            <div class="qh_dcontent">
                <div class="qh_dhd">
                    <ul>
                        <li class="<?php if((isset($_GET['catId'])?$_GET['catId']:537)==537 || !isset($_GET['catId'])){ echo 'on';}?>" ><a href="/beikao-537.html">全部</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='hot'){ echo 'on'; } ?>"><a href="/beikao-hot.html">一周热门</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='538'){ echo 'on'; } ?>"><a href="/beikao-538.html">词汇</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='540'){ echo 'on'; } ?>"><a href="/beikao-540.html">阅读</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='539'){ echo 'on'; } ?>"><a href="/beikao-539.html">填空</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='541'){ echo 'on'; } ?>"><a href="/beikao-541.html">数学</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='542'){ echo 'on'; } ?>"><a href="/beikao-542.html">写作</a></li>
                        <li class="<?php if(isset($_GET['catId']) && $_GET['catId']=='594'){ echo 'on'; } ?>"><a href="/beikao-594.html">备考Tips</a></li>
                    </ul>
                </div>
                <div class="qh_dbd">
<!--                    全部-->
                    <ul>
                        <li>
                            <div class="dbd_content">
                                <ul class="consult_list">
                                    <?php
                                    foreach($content['data'] as $v) {
                                    ?>
                                    <li data-id="<?php echo $v['id'] ?>">
                                        <?php
                                        if(isset($_GET['catId']) && $_GET['catId']=='hot'){
                                            $url = "/beikao/d-537-". $v['id'].".html";
                                        } else{
                                            $catId = isset($_GET['catId'])?$_GET['catId']:537;
                                            $url = "/beikao/d-".$catId ."-". $v['id'].".html";
                                        }
                                        ?>
<!--                                        <a href="--><?php //echo $url ?><!--">-->
                                            <div class="clearfix">
                                                <div class="consult_img fl">
                                                    <a href="<?php echo $url ?>">
                                                        <img src="<?php echo $v['image'] ?>" alt="资讯左侧图片"/>
                                                    </a>
                                                </div>
                                                <div class="consult_text fr">
                                                    <p class="ellipsis consult_tit">
                                                        <a href="<?php echo $url ?>">
                                                        <?php echo $v['name'] ?>
                                                        </a>
                                                    </p>
                                                    <p class="ellipsis-3 consult_de"><?php echo $v['answer'] ?></p>
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
                                                    <!--        1天内的展示多少小时前 1天后的展示4-28这种类型-->
                                                            <span><?php echo $v['alternatives'] ?></span>
                                                            <span class="view_line">|</span>
                                                            <span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                                        </div>
                                                        <span class="fr an-inImg">
                                                            <a href="<?php echo $url ?>">
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
                                                </div>
                                            </div>
<!--                                        </a>-->
                                    </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="pageSize tm">
                                    <ul>
                                       <?php echo $content['pageStr'] ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                $('.iPage').click(function(){
                    $(this).siblings().removeClass('on');
                    $(this).addClass('on');
                    var page = $('.pageSize').find('.on').html();
                    location.href ="/beikao-<?php echo isset($_GET['catId'])?$_GET['catId']:537 ?>.html?page="+page;
                })

                $('.prev').click(function(){
                    var page = $('.pageSize').find('.on').html();
                    if(page == 1){
                        return false;
                    }else{
                        page = parseInt(page)-1;
                    }
                    location.href ="/beikao-<?php echo isset($_GET['catId'])?$_GET['catId']:537 ?>.html?page="+page;;
                });

                $('.next').click(function(){
                    var page = $('.pageSize').find('.on').html();
                    if(page == <?php echo $content['total']?>){
                        return false;
                    }else{
                        page = parseInt(page)+1;
                    }
                    location.href ="/beikao-<?php echo isset($_GET['catId'])?$_GET['catId']:537 ?>.html?page="+page;;
                })
            </script>
            <script type="text/javascript">
                jQuery(".qh_dcontent").slide({titCell:".qh_dhd li",mainCell:".qh_dbd",trigger:"click"});
            </script>
        </div>
    </div>
    <?php use app\commands\front\RightWidget; ?>
    <?php RightWidget::begin(); ?>
    <?php RightWidget::end(); ?>
    <div class="clearfix"></div>
</div>
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

