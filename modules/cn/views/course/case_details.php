
    <link rel="stylesheet" href="/cn/css/case_details.css?v=1">
    <link rel="stylesheet" href="/cn/css/reset_case.css">
<section class="details_wrap">
    <div class="w12">
        <div class="top_btn_wrap tm">
            <img src="/cn/images/background_word.png" alt="">
            <a class="top_btn" href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank">点击咨询</a>
        </div>
        <div class="banner_1 clearfix">
            <div class="pusher_info fl tm">
                <div class="mark_wrap relative tl">
                    <img class="crow_3 ani" src="/cn/images/crow_3.png" alt="">
                    <p class="pusher_name ellipsis-2 relative"><?php echo $data['name'] ?></p>
                    <p class="pusher_mark">姓名：<?php echo $data['answer'] ?></p>
                    <div class="data_info">
                        <p>分数：<?php echo $data['numbering'] ?></p>
                        <p>基础：<?php echo $data['alternatives'] ?></p>
                        <p>出分时间：<?php echo $data['article'] ?></p>
                        <p>班型：<?php echo $data['listeningFile'] ?></p>
                        <p>考试次数：<?php echo $data['cnName'] ?>次</p>
                    </div>
                </div>
            </div>
            <div class="slide-box relative tm fr">
                <ul class="banner-2">
                    <li>
                        <div class="up-img" style="line-height: 290px">
                            <a href="javascript:void(0)" class="swipebox" title="案例图片" style="display: inline-block">
                                <img class="scle" src="https://gre.viplgw.cn<?php echo $data['image'] ?>" alt="案例图片">
                            </a>
                        </div>
                    </li>
                    <!--<li><a href="#"><img src="images/b_t_1.jpg" alt=""></a></li>-->
                </ul>
            </div>
        </div>
        <div class="details_text">
            <?php echo $data['description'] ?>
        </div>
        <div class="page_wrap">
            <?php
            if(!empty($lower)) {
                ?>
                <p><a href="/case_detail/<?php echo $lower['id'] ?>.html">上一篇：<?php echo $lower['name'] ?></a></p>
                <?php
            }
            ?>
            <?php
            if(!empty($upper)) {
                ?>
                <p><a href="/case_detail/<?php echo $upper['id'] ?>.html">下一篇：<?php echo $upper['name'] ?></a></p>
                <?php
            }
            ?>
        </div>
    </div>
</section>