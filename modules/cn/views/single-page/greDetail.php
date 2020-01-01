<?php $userData = Yii::$app->session->get('userData'); ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_consult.css?v=1.0.1">
<script>window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "",
            "bdMini": "2",
            "bdPic": "",
            "bdStyle": "0",
            "bdSize": "16"
        }, "share": {
            'bdCustomStyle': '0'
        }
    };
    with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'https://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
<body>
<section id="consultDe" class="bg_f">
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
        <div class="clearfix consult_teamp wrapper">
            <div class="conde_left fl content">
                <!--当前地址-->
                <div class="location">
                    <a href="/beikao.html">备考首页</a>
                    <em>></em>
                    <a href="/beikao/<?php echo $class['id'] ?>.html"><?php if($class['id'] == 537){ echo '备考文章'; }else{ echo $class['name']; } ?></a>
                    <em>></em>
                    <span class="cur_cation ellipsis inm"><?php echo $data['name'] ?></span>
                </div>
                <!--咨询文章-->
                <input type="hidden" id="contentId" value="<?php echo $data['id'] ?>">
                <div class="conde_wrapper">
                    <h1 class="conde_tit"><?php echo $data['name'] ?></h1>

                    <div class="view_data clearfix">
                        <div class="fl">
                            <span><?php echo $data['alternatives']?></span>
                            <em class="view_line">|</em>
                            <span>关注度：<?php echo $data['viewCount']?></span>
                        </div>
                        <div class="fr share_1 bdsharebuttonbox" style="margin-right: 15px;">
                            <a class="bds_more" styl e="display: block;" data-cmd="more" href="javascript:void(0);">
                                <em class="inm" style="margin-right: 5px"><img src="/cn/images/share_1.png" alt=""></em>
                                <span class="inm">分享</span>
                            </a>
                        </div>
                    </div>
<!--                    修改 新增-->
<!--                    <div class="view_data clearfix">-->
<!--                        <div class="fl">-->
<!--                            <div class="xiaobian_tx">-->
<!--                                <img src="" alt="头像"/>-->
<!--                            </div>-->
<!--                            <span class="xiaob_name">Amanda</span>-->
<!--                            <span>--><?php //echo $data['alternatives']?><!--</span>-->
<!--                        </div>-->
<!--                        <div class="fr" style="margin-right: 15px;">-->
<!--                            <span>阅读（--><?php //echo $data['viewCount']?><!--）</span>-->
<!--                        </div>-->
<!--                    </div>-->


                    <div class="conde_html">
                        <?php echo $data['description']?>
                        <!--                    新增-->
<!--                        <div class="tag-share">-->
<!--                            <div class="fl">-->
<!--                                <img src="/cn/images/common-tag.png" alt="标签图标"/>-->
<!--                                <span class="bg">GRE考试</span>-->
<!--                                <span class="bg">GRE考试物品</span>-->
<!--                                <span class="bg">GRE考试时间</span>-->
<!--                            </div>-->
<!--                            <div class="fr flex-container">-->
<!--                                <div class="r-control">-->
<!--                                    <img src="/cn/images/common-collect.png" alt="图标"/>-->
<!--                                    收藏-->
<!--                                </div>-->
<!--                                <div class="share_1 bdsharebuttonbox r-control">-->
<!--                                    <a class="bds_more" style="display: block;" data-cmd="more" href="javascript:void(0);">-->
<!--                                        <em class="inm"><img src="/cn/images/common-shareicon.png" alt=""></em>-->
<!--                                        <span class="inm">分享</span>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <div class="r-control" onclick="errorMask()">-->
<!--                                    <img src="/cn/images/common-error.png" alt="图标"/>-->
<!--                                    报错-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="clearfixd"></div>-->
<!--                        </div>-->
                    </div>


                </div>
                <!-- 备考详情banner -->
                <div class="articleDetailBannerImg">
                    <img src="/cn/images/articleDetailImg/aritice_bn.png" onClick="openArticleBannerModal()">
                </div>
                <!--网友评论-->
                <div class="e-pal">
                    <div class="clearfix epl_tit_wrap">
                        <div class="fl">
                            <em><img src="/cn/images/epl_reply.png" alt=""></em>
                            <span class="epl_tit">网友评论</span>
                        </div>
                        <div class="fr" style="padding-top: 3px">
                            <span class="rp_num">评论数：<b id="replyCount"><?php echo $comment['count'] ?></b></span>
                        </div>
                    </div>
                    <div class="clearfix user_int">
                        <div class="userinfo fl">
                            <div class="user_img"><img src="<?php echo $userData['image']?$userData['image']:'/cn/images/details_defaultImg.png'?>" alt=""></div>
                            <p class="ellipsis user_name"><?php echo $userData['uid']?$userData['userName']:'游客'?></p>
                        </div>
                        <div class="epl_int_wrap fr">
                            <textarea id="epl_int" placeholder="我来说两句"></textarea>
                            <div class="tr">
                                <button class="epl_tj" onclick="comment(this)">提 交</button>
                            </div>
                        </div>
                    </div>
                    <div class="big_wrap">
                        <?php
                        foreach ($comment['data'] as $k => $v) {
                            ?>
                            <div class="clearfix reply_item" data-id="<?php echo $v['id'] ?>">
                                <div class="userinfo fl">
                                    <div class="user_img"><img src="<?php echo $v['image']?$v['image']:'/cn/images/details_defaultImg.png'?>" alt=""></div>
                                    <p class="ellipsis user_name"><?php echo $v['userName'] ?></p>
                                </div>
                                <div class="reply_wrap fr">
                                    <div class="reply_text">
                                        <?php echo $v['content'] ?>
                                    </div>
                                    <div class="reply_rank tr">
                                    <span class="rank_text">
                                    <span><?php echo $comment['count'] - $k ?>楼</span>
                                    <span>|</span>
                                    <span><?php echo date("Y-m-d H:i:s", $v['createTime']); ?></span>
                                        <?php
                                        $reply = Yii::$app->db->createCommand("select uc.*,u.userName,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
                                        ?>
                                    </span>
                                        <span class="answer_show" onclick="showFirst(this)">回复</span>
                                        <span class="answer_show"
                                              onclick="showSecond(this)">评论(<?php echo count($reply) ?>)</span>
                                    </div>
                                    <div class="toogle_wrap">
                                        <!--回复楼层-->
                                        <div class="lc_reply">
                                            <?php
                                            if (count($reply) > 0) {
                                                ?>
                                                <div class="other_reply">
                                                    <?php
                                                    foreach ($reply as $key => $va) {
                                                        ?>
                                                        <div class="clearfix reply2_item">
                                                            <div class="user_img2 fl"><img
                                                                        src="<?php echo $va['image'] ?>"
                                                                        alt=""></div>
                                                            <div class="reply2_wrap fr">
                                                                <div class="reply2_info_de">
                                                        <span class="reply2_info">
                                                            <em class="replyName rtm_name"><?php echo $va['userName'] ?></em>
                                                            <em class="blue">回复</em>
                                                            <em class="conmentName rtm_name"><?php echo $va['replyName'] ?></em>
                                                        </span>
                                                                    <span class="reply2_text"><?php echo $va['content'] ?></span>
                                                                </div>
                                                                <div class="reply_rank tr">
                                                                    <span class="rank_text"><span><?php echo date("Y-m-d H:i:s", $va['createTime']); ?></span></span>
                                                                    <span class="answer_show"
                                                                          onclick="showThree(this)">回复</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <!--回复输入框-->
                                        <div class="eint2_wrap">
                                            <textarea class="epl_int2" placeholder="写下你的评论..." name="" id="" cols="30"
                                                      rows="10"></textarea>
                                            <div class="tr eint2_handle">
                                                <input class="reply_name2" type="hidden"
                                                       value="<?php echo $v['userName'] ?>">
                                                <input class="eint2_chancle" type="button" value="取消">
                                                <input class="eint2_submit" type="button" onclick="reply(this)"
                                                       value="回复">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="pageSize tr" style="padding: 10px 0 30px;">
                        <ul>
                            <?php echo $comment['pageStr']?>
                        </ul>
                    </div>
                </div>
                <!--热门文章-->
                <div class="hot_article">
                    <h1 class="at_tit">热门文章</h1>
                    <ul class="hot_list clearfix">
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0 and hot=2','fields' => 'answer,alternatives','category' => '537','page'=>1,'pageSize' => 4]);
                        foreach($data as $v) {
                            ?>
                            <li>
                                <div>
                                    <a href="/beikao/d-537-<?php echo $v['id'] ?>.html">
                                        <em class="hot_bull"></em>
                                        <span class="art_name"><?php echo $v['name'] ?></span>
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php use app\commands\front\RightWidget; ?>
            <?php RightWidget::begin(); ?>
            <?php RightWidget::end(); ?>
        </div>
    </div>

</section>
<!--报错弹窗-->
<div class="error_mask">
    <div class="error_kuang">
        <div class="error_close" onclick="closeErrorMask()">
            <img src="/cn/images/error_close.png" alt="关闭图标"/>
        </div>
         <div class="error_title">
             纠错文章
         </div>
        <div class="error_sort">
            <ul>
                <li>
                    <label for="sort01">错别字</label>
                    <input type="checkbox" name="check" id="sort01"/>
                </li>
                <li>
                    <label for="sort02">排版有误</label>
                    <input type="checkbox" name="check" id="sort02"/>
                </li>
                <li>
                    <label for="sort03">描述错误</label>
                    <input type="checkbox" name="check" id="sort03"/>
                </li>
                <li>
                    <label for="sort04">理解错误</label>
                    <input type="checkbox" name="check" id="sort04"/>
                </li>
                <li>
                    <label for="sort05">抄袭文章</label>
                    <input type="checkbox" name="check" id="sort05"/>
                </li>
                <li>
                    <label for="sort06">其它</label>
                    <input type="checkbox" name="check" id="sort06"/>
                </li>
            </ul>
        </div>
        <div class="error_title">
            错误描述
        </div>
        <div class="error_text">
            <textarea></textarea>
            <input type="button" value="提交"/>
        </div>
    </div>
</div>
<!-- 文章详情banner弹窗 -->
<div class="article_banner_mask">
    <div class="article_banner_modal">
        <div class="modal_closebtn"><img src="/cn/images/articleDetailImg/close.png" alt="" onClick="closeArticleBannerModal()"></div>
        <div class="modal_box">
            <img src="/cn/images/articleDetailImg/new_code.jpg" alt="" class="QR_code">
        </div>
    </div>
</div>
<script>
    /**
     * 打开文章详情弹窗
     */
    function openArticleBannerModal(){
        $(".article_banner_mask").show()
    }
    /**
     * 关闭文章详情弹窗
     */
    function closeArticleBannerModal(){
        $(".article_banner_mask").hide()
    }
</script>
<script type="text/javascript">
    function showFirst(o) {
        var wrapper = $(o).parents('.reply_item ');
        var replyName = wrapper.find('.user_name').html();
//        wrapper.find('.toogle_wrap').slideToggle();
        wrapper.find('.reply_name2').val(replyName);
        wrapper.find('.epl_int2').attr('placeholder', '写下你的评论...');

    }
    function showSecond(o) {
        var wrapper = $(o).parents('.reply_wrap ');
        wrapper.find('.toogle_wrap').slideToggle();
    }
    function showThree(o) {
        var wrapper = $(o).parents('.reply_wrap  ');
        var childWrap = $(o).parents('.reply2_item');
        var replyName = childWrap.find('.replyName').html();
        wrapper.find('.reply_name2').val(replyName);
        wrapper.find('.epl_int2').attr('placeholder', '回复 ' + replyName + '');
    }
    //    评论
    function comment(o) {
        var str = '';
        var username = $(o).parents('.user_int').find('.user_name').html();
        var content = $('#epl_int').val();
        var contentId = $('#contentId').val();
        var replyCount=parseInt($('#replyCount').html());
        var curLength=parseInt($('.reply_item').length);
        $.ajax({
            url: "/cn/api/user-comment ",
            dataType: "json",
            data: {
                content: content,
                contentId: contentId
            },
            type: "POST",
            success: function (req) {
                if (req.code == 0) {
                    var r = confirm("您还未登录，是否跳转到登录页！");
                    if (r == true) {
                        location.href="https://login.viplgw.cn/cn/index?source=22&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"

                    }
                    else {
                        return false;
                    }
                }
                if (req.code == 1) {
                    alert(req.message);
                    str += '<div class="clearfix reply_item">' +
                        '<div class="userinfo fl">' +
                        '<div class="user_img"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                        '<p class="ellipsis user_name">' + username + '</p>' +
                        '</div>' +
                        '<div class="reply_wrap fr">' +
                        '<div class="reply_text">' + content + '</div>' +
                        '<div class="reply_rank tr">' +
                        '<span class="rank_text">' +
                        '<span>'+(curLength+1)+'楼</span>' +
                        '<span> | </span>' +
                        '<span>' + getNowFormatDate() + '</span>' +
                        '</span>' +
                        '<span class="answer_show" onclick="showFirst(this)">回复</span> ' +
                        '<span class="answer_show" onclick="showSecond(this)">评论(0)</span>' +
                        '</div>' +
                        '<div class="toogle_wrap" style="display: none;">' +
                        '<div class="lc_reply"></div>' +
                        '<div class="eint2_wrap">' +
                        '<textarea class="epl_int2" placeholder="写下你的评论..." name="" id="" cols="30" rows="10"></textarea>' +
                        '<div class="tr eint2_handle">' +
                        '<input class="reply_name2" type="hidden"  value="' + username + '">' +
                        '<input class="eint2_chancle" type="button" value="取消">' +
                        '<input class="eint2_submit" type="button" onclick="reply(this)" value="回复">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $('.big_wrap').prepend(str);
                    $('#epl_int').val('');
                    $('#replyCount').html(replyCount+1);
                }

            }

        });
    }
    //    回复
    function reply(o) {
        var str = '';
        var str2 = '';
        var wrapper = $(o).parents('.reply_item');
        var content = wrapper.find('.epl_int2').val();
        var contentId = $('#contentId').val();
        var commentId = wrapper.attr('data-id');
        var replyName = wrapper.find('.reply_name2').val();
        var otherWrap = wrapper.find('.other_reply');
        var lc_reply = wrapper.find('.lc_reply');
        var comment_name=wrapper.find('.reply_name2').val();
        $.ajax({
            url: "/cn/api/user-reply",
            dataType: "json",
            data: {
                content: content,
                contentId: contentId,
                commentId: commentId,
                replyName: replyName
            },
            type: "POST",
            success: function (req) {
                str2 = '<div class="clearfix reply2_item">' +
                    '<div class="user_img2 fl"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                    '<div class="reply2_wrap fr">' +
                    '<div class="reply2_info_de">' +
                    '<span class="reply2_info">' +
                    '<em class="replyName rtm_name">' + replyName + '</em>' +
                    '<em class="blue"> 回复 </em>' +
                    '<em class="conmentName rtm_name">' + comment_name + '</em>' +
                    '</span>' +
                    '<span class="reply2_text">' + content + '</span>' +
                    '</div>' +
                    '<div class="reply_rank tr">' +
                    '<span class="rank_text"><span>' + getNowFormatDate() + '</span></span>' +
                    '<span class="answer_show" onclick="showThree(this)">回复</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                alert(req.message);
                wrapper.find('.epl_int2').val('');
                if (req.code==1&&otherWrap.length<1) {
                    str = '<div class="other_reply">' + str2 + '</div>';
                    lc_reply.prepend(str);
                    otherWrap.prepend(str);
                }else {
                    str = str2;
                    otherWrap.prepend(str);
                }

            }

        });
    }
    //时间格式化
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
        return currentdate;

    }
    function errorMask() {
        $(".error_mask").fadeIn();
    }
    function closeErrorMask() {
        $(".error_mask").fadeOut();
    }
</script>