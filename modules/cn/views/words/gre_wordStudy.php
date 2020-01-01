<link rel="stylesheet" href="/cn/css/gre_word.css">
<section id="wordStudy">
    <div class="w12">
        <div class="studyInfo relative">
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
                <div class="alert_tc bg_f relative tm">
                    <div class="close_exit ani"><img src="/cn/images/gre_De/w_close.png" alt=""></div>
                    <p class="alert_hint"></p>
                    <div>
                        <a class="cm_btn alert_link user_over inm" href="javascript:void (0);">确认</a>
                        <a class="cm_btn jx_lx inm" href="javascript:void (0);">继续练习</a>
                    </div>
                </div>
                <div class="exit_tc bg_f relative tm">
                    <div class="close_exit ani"><img src="/cn/images/gre_De/w_close.png" alt=""></div>
                    <p class="exit_hint">确认退出此次练习？</p>
                    <div>
                        <a class="cm_btn user_over inm" href="javascript:void (0);">确认</a>
                        <a class="cm_btn jx_lx inm" href="javascript:void (0);">继续练习</a>
                    </div>
                </div>
            </div>
<!--            导航栏-->
            <div class="word_head flex-container">
                <div class="small_w"><span class="cur_item"><?php echo $phrase['name'] ?></span></div>
                <span class="cur_num"><strong class="dom_num"><?php echo $speedNum ?></strong>/<?php echo $totalNum ?></span>
                <span class="mhcur_num" style="display: none;"><strong class="mudom_num">1</strong>/<strong class="mh_count"></strong></span>
                <div id="study">
                    <label class="label_row" for="check1">
                        <input type="radio" value="1" class="input_check" checked="checked" name="radio" id="check1">
                        <span class="check_box"></span>
                        <span>全部</span>
                    </label>
                    <label class="label_row" for="check2">
                        <input type="radio" value="2" class="input_check" name="radio" id="check2">
                        <span class="check_box"></span>
                        <span>模糊</span>
                    </label>
                    <a class="overStudy_btn" href="javascript:void (0);">结束学习</a>
                </div>
            </div>
<!--            内容-->
            <div class="word_de_wrap relative bg_f">
                <a class="w_crow ani prev" href="javascript:void (0);"></a>
                <a class="w_crow ani next" href="javascript:void (0);"></a>
                <div class="itemData">
                    <div class="all_item team_wrap">
                        <div class="wordInfo_head clearfix">
                            <div class="fl word_wrap">
                                <b class="cur_word"><?php echo isset($word['word']) ? $word['word'] : '' ?></b><span
                                        class="yb_en"><?php echo isset($word['phonetic_us']) ? $word['phonetic_us'] : '' ?></span>
                                <div class="inm sound_wrap uk_src" onclick="audioPlay(this)">
                                    <span class="sound_ch">英</span>
                                    <a class="sound_icon" href="javascript:void (0);"></a>
                                </div>
                                <div class="inm sound_wrap us_src" onclick="audioPlay(this)">
                                    <span class="sound_ch">美</span>
                                    <a class="sound_icon" href="javascript:void (0);"></a>
                                </div>
                            </div>
                            <div class="fr sc_wrap">
                                <div class="add_sc" onclick="addSc(this)">
                                    <i class="inm sc_icon <?php echo isset($wordBook)?'on':'' ?>"></i>
                                    <span class="inm">加入生词本</span>
                                </div>
                            </div>
                        </div>
                        <!--单词释义-->
                        <div>
                            <ul class="small_font word_sy">
                                <li>
                                    <p><?php echo $word['translate'] ?></p>
                                </li>
                            </ul>
                        </div>
                        <!--单词例句-->
                        <div>
                            <ul class="small_font word_example">
                                <?php
                                foreach ($wordSentence as $v) {
                                    ?>
                                    <li>
                                        <p><?php echo $v['english'] ?></p>

                                        <p><?php echo $v['chinese'] ?></p>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <div class="all_hd tm" style="padding: 45px 0 30px;">
                            <a class="lx_handle <?php if($tag['userState']==2){?> on <?php } ?>" onclick="addTag(this,2)" href="javascript:void (0);">认 识</a>
                            <a class="lx_handle <?php if($tag['userState']==1){?> on <?php } ?>" onclick="addTag(this,1)" href="javascript:void (0);">模 糊</a>
                        </div>
                    </div>
                    <div class="vague_item team_wrap">
                        <div class="wordInfo_head clearfix">
                            <div class="fl word_wrap">
                                <b class="cur_word"><?php echo isset($word['word']) ? $word['word'] : '' ?></b><span
                                        class="yb_en"><?php echo isset($word['phonetic_us']) ? $word['phonetic_us'] : '' ?></span>
                                <div class="inm sound_wrap uk_src" onclick="mhaudioPlay(this)">
                                    <span class="sound_ch">英</span>
                                    <a class="sound_icon" href="javascript:void (0);"></a>
                                </div>
                                <div class="inm sound_wrap us_src" onclick="mhaudioPlay(this)">
                                    <span class="sound_ch">美</span>
                                    <a class="sound_icon" href="javascript:void (0);"></a>
                                </div>
                            </div>
                            <div class="fr sc_wrap">
                                <div class="add_sc" onclick="addSc(this)">
                                    <i class="inm sc_icon"></i>
                                    <span class="inm">加入生词本</span>
                                </div>
                            </div>
                        </div>
                        <!--单词释义-->
                        <div>
                            <ul class="small_font word_sy">
                                <li>
                                    <p><?php echo $word['translate'] ?></p>
                                </li>
                            </ul>
                        </div>
                        <!--单词例句-->
                        <div>
                            <ul class="small_font word_example">
                                <?php
                                foreach ($wordSentence as $v) {
                                    ?>
                                    <li>
                                        <p><?php echo $v['english'] ?></p>

                                        <p><?php echo $v['chinese'] ?></p>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <div class="tm" style="padding: 45px 0 30px;">
                            <a class="lx_handle" onclick="addTag(this,2)" href="javascript:void (0);">认 识</a>
                        </div>
                    </div>

                </div>
                <div class="tr bc_btn_wrap">
                    <!--报错按钮-->
                    <a class="w_bc_btn" href="javascript:void (0);"><img src="/cn/images/gre_De/w_bc.png"
                                                                         alt=""><span>词条报错</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<input id="bagId" type="hidden" value="<?php echo $word['bagId'] ?>">
<input id="wordId" type="hidden" value="<?php echo $word['wordId'] ?>">
<input id="mh_wordId" type="hidden" value="">
<input id="phraseId" type="hidden" value="<?php echo $phrase['id'] ?>">
<audio class="us_audios" id="us_audios" onended="audioOver(this)" src="<?php echo $word['us_audio'] ?>"></audio>
<audio class="uk_audios" id="uk_audios" onended="audioOver(this)" src="<?php echo $word['uk_audio'] ?>"></audio>
<audio class="mhus_audios" id="mhus_audios" onended="audioOver(this)" src=""></audio>
<audio class="mhuk_audios" id="mhuk_audios" onended="audioOver(this)" src=""></audio>
</body>
<script>
    function addTag(o, tagId) {
        var _this=$(o);
        var phraseId = $('#phraseId').val();
        var wordId = $('#wordId').val();
        var bagId = $('#bagId').val();
        if(_this.hasClass('on')){
            return false;
        }else {
            $.ajax({
                url: '/cn/words/tag-word', // 跳转到 action
                type: 'get',
                data: {
                    phraseId: phraseId,
                    wordId: wordId,
                    bagId: bagId,
                    tag: tagId
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if(data.code==1){
                        $(o).addClass('on').siblings().removeClass('on');
                    }else {
                        alert(data.message);
                        return false;
                    }

                }
            })
        }

    }

    //   播放音频
    function audioPlay(o) {
        var _this = $(o);
        var uk_audio = $('.uk_audios')[0];
        var us_audio = $('.us_audios')[0];
        _this.find('.sound_icon').addClass('on');
        _this.siblings('.sound_wrap').find('.sound_icon').removeClass('on');
        if (_this.hasClass('uk_src')) {
            uk_audio.play();
            us_audio.load();
        } else {
            uk_audio.load();
            us_audio.play();
        }
    }
    //   播放模糊音频
    function mhaudioPlay(o) {
        var _this = $(o);
        var uk_audio = $('.mhuk_audios')[0];
        var us_audio = $('.mhus_audios')[0];
        _this.find('.sound_icon').addClass('on');
        _this.siblings('.sound_wrap').find('.sound_icon').removeClass('on');
        if (_this.hasClass('uk_src')) {
            uk_audio.play();
            us_audio.load();
        } else {
            uk_audio.load();
            us_audio.play();
        }
    }
    //    音频结束
    function audioOver(o) {
        var _this = $(o);
        if (_this.hasClass('us_audios')) {
            $('.us_src').find('.sound_icon').removeClass('on');
        } else {
            $('.uk_src').find('.sound_icon').removeClass('on');
        }
    }
    // 加入生词本
    function addSc(o) {
        var wordId;
        var word=$(o).parents('.wordInfo_head ').find('.cur_word').html();
        var radioVal=$('.input_check:radio:checked').val();
        if(radioVal==1){
            wordId=$('#wordId').val();
        }
        if (radioVal==2){
            wordId=$('#mh_wordId').val();
        }
        if($(o).find('.sc_icon').hasClass('on')){
         return false;
        }else {
            $.ajax({
                url: '/cn/api/add-strange-word',
                type: 'post',
                data: {
                    word:word,
                    wordId: wordId
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    alert(data.message);
                    if (data.code==1){
                        $(o).find('.sc_icon').addClass('on')
                    }
                }
            })
        }



    }

    $(function () {
//        结束事件
        $('.overStudy_btn').click(function () {
            $('#complete').fadeIn();
            $('.exit_tc').show();
        });
        $('.user_over').click(function () {
            location.href='/words.html';
        });
//        关闭弹窗
        $('.close_exit,.jx_lx,.fx_yx').click(function () {
            $('#complete').hide();
            $('.exit_tc,.alert_tc,.complete_wrap').hide();
        });

        $('.lx_submit').click(function () {
            $('#complete').fadeIn();
            $('.complete_wrap').show();
            $('.exit_tc').hide();
        });
//        单选事件
        $(".input_check:radio").click(function(){
            var num=$(this).val();
            var bagId = $('#bagId').val();
            var uk_audio = document.getElementById("uk_audios");
            var us_audio = document.getElementById("us_audios");
            var mhuk_audio = document.getElementById("mhuk_audios");
            var mhus_audio = document.getElementById("mhus_audios");
            $('.team_wrap').eq(num-1).fadeIn().siblings().hide();
            if (num==2){
                $.ajax({
                    url: '/cn/words/getmohu', // 跳转到 action
                    type: 'get',
                    data: {bagId: bagId},
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        var str = '';
                        var res = data.word;
                        var word_list = res.wordSentence;
                        if(data.code==1){
                            $('.mhcur_num').show();
                            $('.cur_num').hide();
                            $('.vague_item .word_example').empty();
                            $('#mh_wordId').val(res.wordId);
                            $('#bagId').val(res.bagId);
                            $('.mh_count').html(res.vagueNum);
                            $('.vague_item .cur_word').html(res.word);
                            $('.vague_item .yb_en').html(res.phonetic_us);
                            mhuk_audio.src = res.uk_audio;//修改音频src路径
                            mhus_audio.src = res.us_audio;//修改音频src路径
                            $('.vague_item .word_sy li').eq(0).html(res.translate);
                            $(word_list).each(function (a, b) {
                                str += '<li>' + word_list[a].english + '<p></p><p>' + word_list[a].chinese + '</p></li>';
                            });
                            $('.vague_item .word_example').html(str);
                            $('.mudom_num').html(1);
                        }else {
                            alert(data.message);
                            return false;
                        }

                    }
                });
            }
            if(num==1){
                $('.mhcur_num').hide();
                $('.cur_num').show();
            }

        });
//        下一个
        $('.w_crow.next').click(function () {
            var tag=1;
            var curNum = parseInt($('.dom_num').html());
            var mh_curNum = parseInt($('.mudom_num').html());
            var uk_audio = document.getElementById("uk_audios");
            var us_audio = document.getElementById("us_audios");
            var mhuk_audio = document.getElementById("mhuk_audios");
            var mhus_audio = document.getElementById("mhus_audios");
            var wordId = $('#wordId').val();
            var mh_wordId = $('#mh_wordId').val();
            var bagId = $('#bagId').val();
            var radioVal=$('.input_check:radio:checked').val();
            if(radioVal==1){
                $.ajax({
                    url: '/cn/words/get-lower-word', // 跳转到 action
                    type: 'get',
                    data: {
                        wordId: wordId,
                        bagId: bagId
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 2) {
                            $('.alert_hint').html(data.message);
                            var address='/word_review/<?php echo $_GET['phraseId'] ?>-<?php echo $_GET['bagId'] ?>.html';
                            $('.alert_link').attr('href',address);
                            $('#complete').fadeIn(); $('.alert_tc').show();
                            return false;
                        }
                        if (data.code == 1) {
                            var str = '';
                            var res = data.word;
                            var word_list = res.wordSentence;
                            $('.dom_num').html(curNum += 1);
                            $('.all_item .word_example').empty();
                            $('#wordId').val(res.wordId);
                            $('#bagId').val(res.bagId);
                            $('.all_item .cur_word').html(res.word);
                            $('.all_item .yb_en').html(res.phonetic_us);
                            uk_audio.src = res.uk_audio;
                            us_audio.src = res.us_audio;
                            $('.all_item .word_sy li').eq(0).html(res.translate);
                            $(word_list).each(function (a, b) {
                                str += '<li>' + word_list[a].english + '<p></p><p>' + word_list[a].chinese + '</p></li>';
                            });
                            $('.all_item .word_example').html(str);

                        }
                        if(data.wordBook==null){
                            $('.all_item .sc_icon').removeClass('on');

                        }else {
                            $('.all_item .sc_icon').addClass('on');
                        }
                        if(data.tag==null){
                            $('.all_hd .lx_handle').removeClass('on');
                        }
                        if(data.tag.userState==1){
                            $('.all_hd .lx_handle').eq(1).addClass('on').siblings().removeClass('on');
                        }
                        if(data.tag.userState==2){
                            $('.all_hd .lx_handle').eq(0).addClass('on').siblings().removeClass('on');
                        }

                    }
                });
            }
            if(radioVal==2){
                $.ajax({
                    url: '/cn/words/get-tag-word', // 跳转到 action
                    type: 'get',
                    data: {
                        wordId: mh_wordId,
                        bagId: bagId,
                        tag:tag
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code !=1) {
                            $('.alert_hint').html(data.message);
                            var address = '/word_review/4213-4217.html';
                            $('.alert_link').attr('href',address);
                            $('#complete').fadeIn(); $('.alert_tc').show();
                            return false;
                        }
                        if (data.code == 1) {
                            var str = '';
                            var res = data.word;
                            var word_list = res.wordSentence;
                            $('.mudom_num').html(mh_curNum += 1);
                            $('.vague_item .word_example').empty();
                            $('#mh_wordId').val(res.wordId);
                            $('#bagId').val(res.bagId);
                            $('.vague_item .cur_word').html(res.word);
                            $('.vague_item .yb_en').html(res.phonetic_us);
                            mhuk_audio.src = res.uk_audio;
                            mhus_audio.src = res.us_audio;
                            $('.vague_item .word_sy li').eq(0).html(res.translate);
                            $(word_list).each(function (a, b) {
                                str += '<li>' + word_list[a].english + '<p></p><p>' + word_list[a].chinese + '</p></li>';
                            });
                            $('.vague_item .word_example').html(str);

                        }
                        if(data.wordBook==null){
                            $('.vague_item .sc_icon').removeClass('on');

                        }else {
                            $('.vague_item .sc_icon').addClass('on');
                        }
                        if(data.tag==null){
                            $('.all_hd .lx_handle').removeClass('on');
                        }
                        if(data.tag.userState==1){
                            $('.all_hd .lx_handle').eq(0).addClass('on').siblings().removeClass('on');
                        }

                    }
                });
            }

        });
//        上一个
        $('.w_crow.prev').click(function () {
            var tag=1;
            var curNum = parseInt($('.dom_num').html());
            var mh_curNum = parseInt($('.mudom_num').html());
            var uk_audio = document.getElementById("uk_audios");
            var us_audio = document.getElementById("us_audios");
            var mhuk_audio = document.getElementById("mhuk_audios");
            var mhus_audio = document.getElementById("mhus_audios");
            var mh_wordId = $('#mh_wordId').val();
            var wordId = $('#wordId').val();
            var bagId = $('#bagId').val();
            var radioVal=$('.input_check:radio:checked').val();
            if(radioVal==1){
                $.ajax({
                    url: '/cn/words/get-upper-word', // 跳转到 action
                    type: 'get',
                    data: {
                        wordId: wordId,
                        bagId: bagId
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 2) {
                            $('.alert_hint').html(data.message);
                            $('#complete').fadeIn(); $('.alert_tc').show();
                            return false;
                        }
                        if (data.code == 1) {
                            var str = '';
                            var res = data.word;
                            var word_list = res.wordSentence;
                            $('.dom_num').html(curNum -= 1);
                            $('.all_item .word_example').empty();
                            $('#wordId').val(res.wordId);
                            $('#bagId').val(res.bagId);
                            $('.all_item .cur_word').html(res.word);
                            $('.all_item .yb_en').html(res.phonetic_us);
                            uk_audio.src = res.uk_audio;
                            us_audio.src = res.us_audio;
                            $('.all_item .word_sy li').eq(0).html(res.translate);
                            $(word_list).each(function (a, b) {
                                str += '<li>' + word_list[a].english + '<p></p><p>' + word_list[a].chinese + '</p></li>';
                            });
                            $('.all_item .word_example').html(str);

                        }
                        if(data.wordBook==null){
                            $('.all_item .sc_icon').removeClass('on');

                        }else {
                            $('.all_item .sc_icon').addClass('on');
                        }
                        if(data.tag==null){
                            $('.all_hd .lx_handle').removeClass('on');
                        }
                        if(data.tag.userState==1){
                            $('.all_hd .lx_handle').eq(1).addClass('on').siblings().removeClass('on');
                        }
                        if(data.tag.userState==2){
                            $('.all_hd .lx_handle').eq(0).addClass('on').siblings().removeClass('on');
                        }

                    }
                })
            }
            if(radioVal==2){
                $.ajax({
                    url: '/cn/words/upper-tag-word', // 跳转到 action
                    type: 'get',
                    data: {
                        wordId: mh_wordId,
                        bagId: bagId,
                        tag:tag
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code !=1) {
                            $('.alert_hint').html(data.message);
                            $('#complete').fadeIn(); $('.alert_tc').show();
                            return false;
                        }
                        if (data.code == 1) {
                            var str = '';
                            var res = data.word;
                            var word_list = res.wordSentence;
                            $('.mudom_num').html(mh_curNum -= 1);
                            $('.vague_item .word_example').empty();
                            $('#mh_wordId').val(res.wordId);
                            $('#bagId').val(res.bagId);
                            $('.vague_item .cur_word').html(res.word);
                            $('.vague_item .yb_en').html(res.phonetic_us);
                            mhuk_audio.src = res.uk_audio;
                            mhus_audio.src = res.us_audio;
                            $('.vague_item .word_sy li').eq(0).html(res.translate);
                            $(word_list).each(function (a, b) {
                                str += '<li>' + word_list[a].english + '<p></p><p>' + word_list[a].chinese + '</p></li>';
                            });
                            $('.vague_item .word_example').html(str);

                        }
                        if(data.wordBook==null){
                            $('.vague_item .sc_icon').removeClass('on');

                        }else {
                            $('.vague_item .sc_icon').addClass('on');
                        }
                        if(data.tag==null){
                            $('.all_hd .lx_handle').removeClass('on');
                        }
                        if(data.tag.userState==1){
                            $('.all_hd .lx_handle').eq(0).addClass('on').siblings().removeClass('on');
                        }

                    }
                });
            }


        })
    })
</script>
</html>