<link rel="stylesheet" href="/cn/css/gre_word.css">
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
        <div class="tm"><img src="/cn/images/gre_De/de_img.png" alt=""></div>
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
                        <div class="progress relative inm"><span class="ani" style="width: <?php echo $percentum ?>%"></span></div>
                        <strong style="font-size: 14px;padding-right: 5px;"><?php echo $percentum ?>%</strong>
                    </div>
                </div>
                <div class="check_radio fr">
                    <label for="all">
<!--                        <a href="/words/phrase---><?php //echo $phrase['id'] ?><!--.html">-->
                        <input type="radio" id="all" onclick="if (this.checked){window.location='/words/phrase-<?php echo $phrase['id'] ?>.html'}" name="checkItem" <?php if(!isset($_GET['type'])){ ?> checked="checked"  <?php } ?>>
                        <span>全部</span>
<!--                        </a>-->
                    </label>
                    <label for="break">
<!--                        <a href="/words/phrase---><?php //echo $phrase['id'] ?><!---2.html">-->
                        <input type="radio" id="break" onclick="if (this.checked){window.location='/words/phrase-<?php echo $phrase['id'] ?>-2.html'}" name="checkItem" <?php if(isset($_GET['type']) && $_GET['type']==2){ ?> checked="checked"  <?php } ?>>
                        <span>中断</span>
<!--                        </a>-->
                    </label>
                    <label for="over">
<!--                        <a href="/words/phrase---><?php //echo $phrase['id'] ?><!---1.html">-->
                        <input type="radio" id="over" onclick="if (this.checked){window.location='/words/phrase-<?php echo $phrase['id'] ?>-1.html'}" name="checkItem" <?php if(isset($_GET['type']) && $_GET['type']==1){ ?> checked="checked"  <?php } ?>>
                        <span>已学</span>
<!--                        </a>-->
                    </label>
                    <label for="nothing">
<!--                        <a href="/words/phrase---><?php //echo $phrase['id'] ?><!---3.html">-->
                        <input type="radio" id="nothing" onclick="if (this.checked){window.location='/words/phrase-<?php echo $phrase['id'] ?>-3.html'}" name="checkItem" <?php if(isset($_GET['type']) && $_GET['type']==3){ ?> checked="checked"  <?php } ?>>
                        <span>未学</span>
<!--                        </a>-->
                    </label>
                </div>
            </div>
        </div>
        <div class="bg_f pd_lr65">
            <div class="location">
                <a href="/words.html">首页</a>
                <em> ></em>
                <span class="cur_ls"><?php echo $phrase['name'] ?></span>
            </div>
            <ul class="wordItem_list ws_second clearfix">
                <?php
                foreach($data['data'] as $v) {
                    if (isset($v['speed']) && $v['speed'] == 1) {
                        ?>
                        <li>
                            <a href="/word_detail/<?php echo $phrase['id'] ?>-<?php echo $v['id'] ?>.html">
                            <div class="word_tag over"><span>已学</span></div>
                            <div class="word_num">
                                <p class="num_text"><?php echo $v['name'] ?></p>
                                <p class="countNum_text">模糊：<?php echo isset($v['mohu'])?$v['mohu']:0 ?></p>
                            </div>
                            </a>
                        </li>
                        <?php
                    } elseif(isset($v['speed']) && $v['speed'] == 2) {
                        ?>
                        <li>
                            <a href="/word_review/<?php echo $phrase['id'] ?>-<?php echo $v['id'] ?>.html">
                                <div class="word_tag over"><span>已完成</span></div>
                                <div class="word_num">
                                    <p class="num_text"><?php echo $v['name'] ?></p>
                                    <p class="countNum_text">模糊：<?php echo isset($v['mohu'])?$v['mohu']:0 ?></p>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    elseif (isset($v['speed']) && $v['speed'] == 3) {
                        ?>
                        <li>
                            <a href="/word_detail/<?php echo $phrase['id'] ?>-<?php echo $v['id'] ?>.html">
                            <div class="word_tag break"><span>中断</span></div>
                            <div class="word_num">
                                <p class="num_text"><?php echo $v['name'] ?></p>
                                <p class="countNum_text"><?php echo $v['answer'] ?>/<?php echo $v['wordNum'] ?></p>
                            </div>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <a href="/word_detail/<?php echo $phrase['id'] ?>-<?php echo $v['id'] ?>.html">
                            <div class="word_tag nothing"><span>未学</span></div>
                            <div class="word_num">
                                <p class="num_text"><?php echo $v['name'] ?></p>
                                <p class="countNum_text"><?php echo $v['wordNum'] ?>词</p>
                            </div>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
<!--                <li>-->
<!--                    <div class="word_tag over"><span>已学</span></div>-->
<!--                    <div class="word_num">-->
<!--                        <p class="num_text">第一组</p>-->
<!--                        <p class="countNum_text">模糊：5</p>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="word_tag nothing"><span>未学</span></div>-->
<!--                    <div class="word_num">-->
<!--                        <p class="num_text">第一组</p>-->
<!--                        <p class="countNum_text">50词</p>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="word_tag break"><span>中断</span></div>-->
<!--                    <div class="word_num">-->
<!--                        <p class="num_text">第一组</p>-->
<!--                        <p class="countNum_text">12/50</p>-->
<!--                    </div>-->
<!--                </li>-->
            </ul>
            <div class="pageSize_wrap tm">
                <?php echo $data['pageStr']?>
            </div>
        </div>
    </div>
</section>