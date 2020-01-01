<link rel="stylesheet" href="/cn/css/xiaobian.css"/>
<body>
<div class="xb-auto">
    <div class="xb-person an-flex">
        <div class="xb-p-l">
            <img src="<?php echo $editorUser['image']; ?>" alt="小编头像"/>
        </div>
        <div class="xb-p-c">
             <h4 onclick="guanZhu(<?php echo $editorUser['id'] ?>)">
                 <span><?php echo $editorUser['nickname'] ?></span>
                 <b>+关注</b>
             </h4>
            <p>
                <?php if($editorUser['id']==20422){
                    echo "GRE备考贴心小助手小G君，带来各种你想要的GRE备考活动资讯和GRE备考资料，助力你的GRE330+";
                }  elseif($editorUser['id']==20424){
                    echo "你的GRE贴心小助手R妹~关于GRE方方面面的问题都可以咨询我，我们甚至可以一起吹牛打屁学习GRE！";
                } elseif($editorUser['id']==20423){
                    echo "Hi~ 我是小E哥！一个集知识与帅气于一身的雷哥GRE学习小助手，以后有什么GRE学习备考方面的问题也可以来咨询我哦~";
                } elseif($editorUser['id']==20425){
                    echo "不定期发布更新GRE最新考试资讯、GRE真题机经、雷哥GRE官方活动";
                } else{
                    echo "不定期发布GRE在线题库最新资讯、GRE题库最新功能更新、GRE模考功能更新、GRE备考APP";
                }
                ?>
            </p>
        </div>
        <div class="xb-p-r an-flex">
            <div class="xb-w">
                <p><?php echo $data['count'] ?></p>
                <span>文章数</span>
            </div>
            <div class="xb-w">
                <p><?php echo $articleView ?></p>
                <span>浏览数</span>
            </div>
            <div class="xb-w" id="gz-Num">
                <p><?php echo $follow ?></p>
                <span>关注数</span>
            </div>
        </div>
    </div>
    <div class="xb-content">
        <div class="xb-c-left fl">
            <div class="xb-c-l-list">
                <ul class="consult_list">
                    <?php
                    foreach($data['data'] as $v) {
                        ?>
                        <li data-id="<?php echo $v['id']; ?>">
<!--                            <a href="/information/--><?php //echo $v['id']; ?><!--.html">-->
                                <div class="clearfix">
                                    <div class="consult_img fl">
                                        <a href="/information/<?php echo $v['id']; ?>.html">
                                            <img src="https://gre.viplgw.cn<?php echo $v['image'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="consult_text fr">
                                        <p class="ellipsis consult_tit">
                                            <a href="/information/<?php echo $v['id']; ?>.html">
                                            <?php echo $v['name'] ?>
                                            </a>
                                        </p>

                                        <p class="ellipsis-3 consult_de"><?php echo $v['answer'] ?></p>

                                        <div class="consult_view clearfix">
                                            <div class="fl">
                                                <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?><!--8小时前--></span>
                                                <span class="view_line">|</span>
                                                <span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                    <span class="fr an-inImg">
                                        <a href="/information/<?php echo $v['id']; ?>.html">
                                        <img src="/cn/images/common-plicon.png" alt="评论图标"/>
                                        评论
                                        </a>
                                    </span>
                                    <span class="fr an-inImg" style="margin-right: 20px;">
                                        <a href="javascript:void(0);" onclick="clickZanCom(this)">
                                            <img src="/cn/images/common-zan.png" alt="评论图标"/>
                                            点赞 <b><?php echo $v['fabulous'] ?></b>
                                        </a>
                                     </span>
                                        </div>

                                    </div>
                                </div>
<!--                            </a>-->
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!--分页-->
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
                    location.href ="/copyreader-<?php echo $_GET['editorId'] ?>.html?page="+page;
                })

                $('.prev').click(function(){
                    var page = $('.pageSize').find('.on').html();
                    if(page == 1){
                        return false;
                    }else{
                        page = parseInt(page)-1;
                    }
                    location.href ="/copyreader-<?php echo $_GET['editorId'] ?>.html?page="+page;
                });

                $('.next').click(function(){
                    var page = $('.pageSize').find('.on').html();
                    if(page == <?php echo $data['total']?>){
                        return false;
                    }else{
                        page = parseInt(page)+1;
                    }
                    location.href ="/copyreader-<?php echo $_GET['editorId'] ?>.html?page="+page;
                })
            </script>
        </div>
        <div class="xb-c-right fr">
            <h4>热门文章推荐</h4>
            <ul>
                <?php
                $hots = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' =>"537",'order'=>'viewCount desc','pageSize' => 5]);
                foreach($hots as $v) {
                    ?>
                    <li>
                        <div class="us-left">
                            <a href="/beikao/d-537-<?php echo $v['id'] ?>.html">
                                <img src="<?php echo $v['image'] ?>"
                                     alt="图片">
                            </a>
                        </div>
                        <div class="us-right">
                            <p class="ellipsis-2">
                                <a href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                            </p>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                            <span class="fr">阅读：<?php echo $v['viewCount'] ?></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
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
    function guanZhu(authorId) {
        var oldN=$("#gz-Num").find("p").html();
        $.ajax({
            url:"/cn/api/user-follow",
            type:"get",
            data:{
                authorId:authorId
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    $.tipsBox({
                        obj: $("#gz-Num"),
                        str:"+1",
                        callback: function () {
                            $("#gz-Num").find("p").html(parseInt(oldN)+1);
                        }
                    });
                    niceIn($(o));

                }else if(data.message=="请登录"){
                    loginHref();
                }else{
                    alert(data.message);
                }
            }
        });
    }
</script>