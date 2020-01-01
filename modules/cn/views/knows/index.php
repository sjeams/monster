<link rel="stylesheet" href="/cn/css/know/knowledge.css">
<link rel="stylesheet" href="/cn/css/font-awesome.css">
<div class="compuBanner">
    <!--轮播-->
    <div class="compuSlide">
        <div class="compuSlide-bd">
            <ul>
                <li style="background: url('/cn/images/know_topImg.png') no-repeat center;">

                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        <!--jQuery(".compuSlide").slide({mainCell:".compuSlide-bd ul",autoPlay:true,mouseOverStop:false});-->
    </script>
    <!--图片上面的按钮-->
    <div class="group-btn">
        <ul>
            <li>
                <a target="blank" href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes">
<!--                    {*<img src="/app/web_core/styles/images/know_phoneIcon.png" alt="图标"/>*}-->
<!--                    {*<span>预约申请</span>*}-->
                </a>
            </li>
            <li>
                <a target="blank" href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes">
<!--                    {*<img src="/app/web_core/styles/images/know_personIcon.png" alt="图标"/>*}-->
<!--                    {*<span>留学咨询</span>*}-->
                </a>
            </li>
        </ul>
    </div>
    <div class="inCompuls">
        <div class="foreshow">
            <h4>近期公开课预告</h4>
            <p>5月32号 18:34-23:34</p>
            <div class="headImg">
                <img src="/cn/images/amanda.jpg" alt="老师照片">
            </div>
            <div class="info">
                <ul>
                    <li>GMAT数学易错题解析</li>
                    <li>主讲：Amanda</li>
                    <li><a href="#">立即报名</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="compulsory">
    <div class="compulsoryToggle">
        <div class="compulsoryHd hd">
            <div class="bigTitle">
                <div class="title-left">
                    <img src="/cn/images/know_leftImg.png" alt="左边图标"/>
                </div>
                <div class="title-right">
                    <h1>必考知识点</h1>
                    <span>已有<span><span id="totalNum"></span>条</span>必考知识点</span>
                </div>
                <div style="clear: both"></div>
            </div>
            <ul>
                <?php
                foreach($catKnows as $v) {
                    ?>
                    <li>
                        <a href="/know/<?php echo $v['id'] ?>.html">
                            <h2><?php echo $v['name'] ?></h2>
                            <span>共<span class="sortNum"><?php echo $v['knowNum'] ?></span>知识点，<span><?php echo $v['viewNum'] ?></span>人已学习</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="compulsoryBd">
            <ul>
                <li>
                    <p><?php echo $catDetail['description'] ?></p>
                    <div class="con-con">
                        <ul>
                            <?php
                            foreach($data as $v) {
                                ?>
                                <li>
                                    <h4><?php echo $v['name'] ?></h4>
                                    <ol>
                                        <?php
                                        foreach($v['content'] as $va) {
                                            ?>
                                            <li>
                                                <a href="/knowDetail/d-<?php echo $va['id'] ?>-<?php echo isset($_GET['knowId'])?$_GET['knowId']:'569' ?>.html"><?php echo $va['name'] ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ol>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div style="clear: both"></div>
</div>
<script type="text/javascript">
    $(function(){
        var knowsid = <?php echo isset($_GET['knowId'])?$_GET['knowId']:569 ?>;
        if(knowsid==569){
            $(".compulsoryHd ul li").eq(0).addClass("on").siblings().removeClass("on");
        }
        else if(knowsid==570){
            $(".compulsoryHd ul li").eq(1).addClass("on").siblings().removeClass("on");
        }
        else if(knowsid==571){
            $(".compulsoryHd ul li").eq(2).addClass("on").siblings().removeClass("on");
        }
        else if(knowsid==572){
            $(".compulsoryHd ul li").eq(3).addClass("on").siblings().removeClass("on");
        }
//        计算知识点的总数量
        var num=0;
        $(".sortNum").each(function(){
            num+=parseInt($(this).html());
        });
        $("#totalNum").html(num);
    });
</script>
