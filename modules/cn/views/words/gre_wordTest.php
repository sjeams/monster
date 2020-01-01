<link rel="stylesheet" href="/cn/css/gre_word.css">
<?php $p = ceil(count($words) / 6); ?>
<section id="wordStudy">
    <div class="w12">
        <div class="studyInfo slideBox relative">
            <!--完成弹窗-->
            <div id="complete">
                <div class="complete_wrap bg_f tm">
                    <div class="complete_img"><img src="/cn/images/gre_De/complete_img.png" alt=""></div>
                    <h1 class="complete_zh">恭喜你已经完成本组学习！</h1>
                    <p class="complete_data">共学习了50个单词，模糊单词5个</p>
                    <div>
                        <a class="cm_btn fx_yx inm" href="javascript:void (0);">复习一下</a>
                        <a class="cm_btn inm" href="javascript:void (0);">返回列表</a>
                        <a class="cm_btn next_item inm" href="javascript:void (0);">到下一组</a>
                    </div>
                </div>
                <div class="exit_tc bg_f relative tm">
                    <div class="close_exit ani"><img src="/cn/images/gre_De/w_close.png" alt=""></div>
                    <p class="exit_hint">确认退出此次练习？</p>
                    <div>
                        <a class="cm_btn user_sure inm" href="javascript:void (0);">确认</a>
                        <a class="cm_btn jx_lx inm" href="javascript:void (0);">继续练习</a>
                    </div>
                </div>
            </div>
            <div class="word_head flex-container">
                <div class="small_w"><span class="cur_item">第二组</span></div>
                <div class="hd"><span class="cur_num pageState">1/<?php echo $p ?></span></div>
                <div id="study">
                    <a class="overStudy_btn" href="javascript:void (0);">结束复习</a>
                </div>
            </div>
            <div class="word_de_wrap relative bg_f">
                <a title="上一个" class="w_crow ani prev" href="javascript:void (0);"></a>
                <a title="下一个" class="w_crow ani next" href="javascript:void (0);"></a>
                <div style="display: none;">
                    <?php
                    for ($i = 0; $i < $p; $i++) {
                        ?>
                        <ul class="wordTest clearfix">
                            <?php foreach ($words as $k => $v) {
                                if ($k >= $i * 6 && $k < (($i + 1) * 6)) {
                                    ?>
                                    <li>
                                        <div>
                                            <div class="cur_wordTest">
                                                <b class="cur_word <?php if (in_array($v['id'], $vagueArr)) { ?>error <?php } ?>"><?php echo $v['name'] ?></b>
                                                <span class="yb_en"><?php echo isset($v['detail']['phonetic_us']) ? $v['detail']['phonetic_us'] : '' ?></span>
                                            </div>
                                            <div>
                                                <input class="user_js_int" type="text">
                                            </div>
                                            <dl class="mc_js">
                                                <dt><?php echo isset($v['detail']['translate']) ? $v['detail']['translate'] : '' ?></dt>
                                            </dl>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="bd">
                    <div class="wordTest_wrap">
                        <?php
                        for ($i = 0; $i < $p; $i++) {
                            ?>
                            <div class="wordTest clearfix">
                                <div class="wt_list clearfix">
                                    <?php foreach ($words as $k => $v) {
                                        if ($k >= $i * 6 && $k < ($i + 1) * 6) {
                                            ?>
                                            <div class="wordTest_child">
                                                <div class="cur_wordTest">
                                                    <b class="cur_word <?php if (in_array($v['id'], $vagueArr)) { ?>error <?php } ?>"><?php echo $v['name'] ?></b>
                                                    <span
                                                        class="yb_en"><?php echo isset($v['detail']['phonetic_us']) ? $v['detail']['phonetic_us'] : '' ?></span>
                                                </div>
                                                <div>
                                                    <input class="user_js_int" type="text">
                                                </div>
                                                <dl class="mc_js">
                                                    <dt><?php echo isset($v['detail']['translate']) ? $v['detail']['translate'] : '' ?></dt>
                                                </dl>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!--                                <div class="tm" style="padding-bottom: 45px;">-->
                                <!--                                    <a class="cm_btn lx_submit inm" href="javascript:void (0);">提交</a>-->
                                <!--                                </div>-->
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="bagId" value="<?php echo $_GET['bagId'] ?>">
<script>
    $(function () {
//        滑动效果
        $(".slideBox").slide({mainCell: ".bd .wordTest_wrap", effect: "leftLoop", autoPage: true, pnLoop: false});
//        结束复习按钮
        $('.overStudy_btn').click(function () {
            $('#complete').fadeIn();
            $('.exit_tc').show();
        });
        $('.user_sure').click(function () {
            var bagId = $('#bagId').val();
            $.ajax({
                url: '/cn/words/complete', // 跳转到 action
                type: 'get',
                data: {bagId: bagId},
                cache: false,
                dataType: 'json',
                success: function (data) {
                    location.href='/words.html';
                }
            })
        });
//        关闭弹窗继续复习
        $('.close_exit,.jx_lx,.fx_yx').click(function () {
            $('#complete').hide();
            $('.complete_wrap').hide();
            $('.exit_tc').hide();
        });
        $('.lx_submit').click(function () {
            $('#complete').fadeIn();
            $('.complete_wrap').show();
            $('.exit_tc').hide();
        });
        $(".user_js_int").bind("input propertychange", function () {
            var obj = $(this).parents('.wordTest_child');
            var intVal = $(this).val();
            clearTimeout(serachtimer);
            var serachtimer = setTimeout(function () {
                obj.find('.mc_js').show();
            }, 1000)
        });
    })
</script>