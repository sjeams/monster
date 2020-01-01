<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn//css/gre_word.css">
<body>
<!--单词简介-->
<section id="word_intra">
    <div class="w12">
        <div class="deIntra_wrap">
            <p class="de_text">
                <span class="green_strong">再要你命3000</span>：和大家分享GRE词汇备考神器—再要你命3000，收录了GRE考试中
                最常做主考的3000多个单词，即网上流传的电子版“要你命三千”。书中给出了每个单词
                常考的中英文释义，配有例句，增加了派生词汇每一个GRE考生必备词汇资料，建议大家
                按照分好的list循序渐进地进行学习，更加牢固地掌握每个单词。
            </p>
        </div>
        <div class="tm"><img src="/cn//images/gre_De/de_img.png" alt=""></div>
    </div>
</section>
<!--单词题组-->
<section id="wordItem">
    <div class="w12">
        <div class="user_data bg_f pd_lr65">
            <p>词汇总数：<strong><?php echo $totalWord['total'] ?></strong>(分为<?php echo $totalWord['groupNum'] ?>组,<?php echo $totalWord['bagNum'] ?>个词包)</p>
            <div class="radio_k clearfix">
                <div class="fl">
                    <span>您的进度：</span>
                    <div class="progress_wrap inm">
                        <div class="progress relative inm"><span class="ani"></span></div>
                        <strong style="font-size: 14px;padding-right: 5px;"><?php echo $percentum ?>%</strong>
                    </div>
                </div>
<!--                <div class="check_radio fr">-->
<!--                    <label for="all">-->
<!--                        <input type="radio" id="all" name="checkItem">-->
<!--                        <span>全部</span>-->
<!--                    </label>-->
<!--                    <label for="break">-->
<!--                        <input type="radio" id="break" name="checkItem">-->
<!--                        <span>中断</span>-->
<!--                    </label>-->
<!--                    <label for="over">-->
<!--                        <input type="radio" id="over" name="checkItem">-->
<!--                        <span>已学</span>-->
<!--                    </label>-->
<!--                    <label for="nothing">-->
<!--                        <input type="radio" id="nothing" name="checkItem">-->
<!--                        <span>未学</span>-->
<!--                    </label>-->
<!--                </div>-->
            </div>
        </div>
        <div class="bg_f pd_lr65">
            <ul class="wordItem_list clearfix">
                <?php
                foreach($data['data'] as $v) {
                    ?>
                    <li>
                        <div class="word_tag <?php if($v['speed']==2){ echo 'over'; } elseif($v['speed']==3){ echo 'nothing'; }else{ echo 'nothing'; } ?>"><span><?php if($v['speed']==2){ echo '已学'; } elseif($v['speed']==3){ echo '中断'; }else{ echo '未开始'; } ?></span></div>
                        <div class="word_num">
                            <a href="/words/phrase-<?php echo $v['id']?>.html">
                            <p class="num_text"><?php echo $v['name'] ?></p>
                            <p class="countNum_text"><?php echo $v['bagNum'] ?>个词包</p>
                            </a>
                        </div>
                    </li>
                    <?php
                }
                ?>
<!--                <li>-->
<!--                    <div class="word_tag nothing"><span>未学</span></div>-->
<!--                    <div class="word_num">-->
<!--                        <p class="num_text">第一组</p>-->
<!--                        <p class="countNum_text">50词</p>-->
<!--                    </div>-->
<!--                </li>-->
            </ul>
            <div class="pageSize_wrap tm">
                <ul class="pageSize inm clearfix">
                    <?php echo $data['pageStr']?>
                </ul>
            </div>
            <script type="text/javascript">
                $('.iPage').click(function(){
                    $(this).siblings().removeClass('on');
                    $(this).addClass('on');
                    var page = $('.pageSize_wrap').find('.on').html();
                    location.href ="/words/"+page+".html";
                })

                $('.prev').click(function(){
                    var page = $('.pageSize_wrap').find('.on').html();
                    if(page == 1){
                        return false;
                    }else{
                        page = parseInt(page)-1;
                    }
                    location.href ="/words/"+page+".html";
                })

                $('.next').click(function(){
                    var page = $('.pageSize_wrap').find('.on').html();
                    if(page == <?php echo $data['totalPage']?>){
                        return false;
                    }else{
                        page = parseInt(page)+1;
                    }
                    location.href ="/words/"+page+".html";
                })
            </script>
        </div>
    </div>
</section>