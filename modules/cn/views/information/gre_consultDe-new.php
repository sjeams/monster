<?php $userData = Yii::$app->session->get('userData'); ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_consult.css?v=1.0.0"">
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
            $res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '562','order'=>' RAND()','page'=>1,'pageSize' => 1]);
            foreach($res as $v) {
                ?>
                <a href="<?php echo $v['answer'] ?>"><img src="<?php echo $v['image'] ?>" alt=""></a>
                <?php
            }
            ?>
        </div>
        <div class="clearfix beikao-content consult_teamp wrapper">
            <div class="conde_left fl content">
                <!--当前地址-->
                <div class="location">
                    <a href="/">首页</a>
                    <em>></em>
                    <a href="/information.html">GRE资讯</a>
                    <em>></em>
                    <span class="cur_cation ellipsis inm"><?php echo $data['name'] ?></span>
                </div>
                <!--咨询文章-->
                <div class="conde_wrapper">
                    <input type="hidden" id="contentId" value="<?php echo $data['id'] ?>">
                    <h1 class="conde_tit"><?php echo $data['name'] ?></h1>

<!--                    <div class="view_data clearfix">-->
<!--                        <div class="fl">-->
<!--                            <span>--><?php //echo $data['alternatives'] ?><!--</span>-->
<!--                            <em class="view_line">|</em>-->
<!--                            <span>关注度：--><?php //echo $data['viewCount'] ?><!--</span>-->
<!--                        </div>-->
<!--                        <div class="fr share_1 bdsharebuttonbox" style="margin-right: 15px;">-->
<!--                            <a class="bds_more" style="display: block;" data-cmd="more" href="javascript:void(0);">-->
<!--                                <em class="inm" style="margin-right: 5px"><img src="/cn/images/share_1.png" alt=""></em>-->
<!--                                <span class="inm">分享</span>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="view_data clearfix">
                        <div class="fl">
                            <a href="/copyreader-<?php echo $data['userId'] ?>.html">
                            <div class="xiaobian_tx">
                                <img src="<?php echo $data['editUser']['image']?>" alt="头像"/>
                            </div>
                            </a>
                            <span class="xiaob_name"><?php echo $data['editUser']['nickname']?></span>
                            <span><?php echo $data['alternatives']?></span>
                        </div>
                        <div class="fr" style="margin-right: 15px;">
                            <span>阅读（<?php echo $data['viewCount']?>）</span>
                        </div>
                    </div>

                    <div class="conde_html">
                        <?php echo $data['description'] ?>
                        <!--                    新增-->
                        <div class="tag-share">
                            <div class="fl">
                                <img src="/cn/images/common-tag.png" alt="标签图标"/>
                                <?php
                                $label = explode(',', $data['cnName']);
                                foreach($label as $v) {
                                    ?>
                                    <span class="bg"><?php echo $v ?></span>
                                    <?php
                                }
                                ?>
<!--                                <span class="bg">GRE考试物品</span>-->
<!--                                <span class="bg">GRE考试时间</span>-->
                            </div>
                            <div class="fr flex-container">
                                <div class="r-control"  onclick="collectArt(this,<?php echo $data['id']?>)">
                                <span class="collect-icon <?php if (!empty($content['collection'])) {
                                    echo 'on';
                                } ?>"></span>
<!--                                    <img src="/cn/images/common-collect.png" alt="图标"/>-->
                                    收藏
                                </div>
                                <div class="share_1 bdsharebuttonbox r-control">
                                    <a class="bds_more" style="display: block;" data-cmd="more" href="javascript:void(0);">
                                        <em class="inm"><img src="/cn/images/common-shareicon.png" alt=""></em>
                                        <span class="inm">分享</span>
                                    </a>
                                </div>
                                <div class="r-control" onclick="errorMask()">
                                    <img src="/cn/images/common-error.png" alt="图标"/>
                                    报错
                                </div>
                            </div>
                            <div class="clearfixd"></div>
                        </div>

                    </div>
                </div>
                <!-- 备考详情banner -->
                <div class="articleDetailBannerImg">
                    <img src="/cn/images/articleDetailImg/aritice_bn.png" onClick="openArticleBannerModal()">
                </div>
                <!--新版评论-->
                <div class="new-comment">
                    <div class="comment-title an-flex">
                        <div>
                            <img src="/cn/images/epl_reply.png" alt="评论标题图标"/>
                            <span>网友评论</span>
                        </div>
                        <div><b>（评论数：<em id="replyCount" style="font-style: normal;"><?php echo $comment['count'] ?></em>）</b></div>
                    </div>
                    <!--总评论发表框-->
                    <div class="common-pub an-flex">
                        <div class="left-tx">
                            <img src="<?php echo $userData['image']?$userData['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                        </div>
                        <div class="right-user">
                            <h4>
                                <span><?php echo $userData['uid']?$userData['nickname']:'游客'?></span>
                            </h4>
                            <textarea class="common-area" placeholder="我来说两句"></textarea>
                            <input type="button" value="提交" class="common-sub" onclick="commentNew(this)"/>
                        </div>
                    </div>
                    <!--评论列表-->
                    <div class="comment-list">
                        <ul>
                            <?php
                            foreach ($comment['data'] as $k => $v) {
                                ?>
                                <li class="an-flex" data-id="<?php echo $v['id'] ?>">
                                    <div class="left-tx">
                                        <img src="<?php echo $v['image']?$v['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                    </div>
                                    <div class="right-user">
                                        <h4>
                                            <span><?php echo $v['nickname'] ?></span>
<!--                                            <em>--><?php //echo $comment['count'] - $k ?><!--楼</em>-->
                                        </h4>
                                        <p>
                                            <?php echo $v['content'] ?>
                                        </p>
                                        <div class="bot-control">
                                            <b><?php echo date("Y-m-d H:i:s", $v['createTime']); ?></b>
                                            <a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">
                                                <img src="/cn/images/common-zan.png" alt="点赞图标"/>
                                                <span>点赞 <b><?php echo $v['fane']?$v['fane']:0 ?></b></span>
                                            </a>
                                            <a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>
                                        </div>
                                        <!--里层回复框-->
                                        <div class="in-replyK an-flex">
<!--                                            <input type="text"/>-->
<!--                                            <input type="button" value="发送" onclick="reply(this)"/>-->
<!--                                            <input class="reply_name2" type="hidden" value="--><?php //echo $v['nickname'] ?><!--">-->
                                            <textarea></textarea>
                                            <div class="in-reply-btn">
                                                <input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>
                                                <input type="button" value="回复" class="sure" onclick="reply(this)"/>
                                                <input class="reply_name2" type="hidden" value="<?php echo $v['nickname'] ?>">
                                            </div>
                                        </div>
                                        <!--里层回复展示样式-->
                                        <?php
                                        $reply = Yii::$app->db->createCommand("select uc.*,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
                                        ?>
                                        <?php
                                        if (count($reply) > 0) {
                                            ?>
                                            <div class="inReply-box">
                                                <div class="in-reply-list">
                                                    <ul>
                                                        <?php
                                                        foreach ($reply as $key => $va) {
                                                            ?>
                                                            <li>
                                                                <div class="an-flex list-auto">
                                                                    <div class="left-tx special-w">
                                                                        <img src="<?php echo $va['image']?$va['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                                                    </div>
                                                                    <div class="right-user diffW-r">
                                                                        <div class="inr-font">
                                                                            <span class="blue"><?php echo $va['nickname'] ?></span>
                                                                            <b>：回复@<?php echo $va['replyName'] ?></b>
                                                                            <span class="font-g"><?php echo $va['content'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bot-control">
                                                                    <span class="time"><?php echo date("Y-m-d H:i:s", $va['createTime']); ?></span>
                                                                    <a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>
                                                                </div>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
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
                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0 and hot=2', 'fields' => 'answer,alternatives', 'category' => '537', 'page' => 1, 'pageSize' => 4]);
                        foreach ($data as $v) {
                            ?>
                            <li>
                                <div>
                                    <a href="/beikao/537-<?php echo $v['id'] ?>.html">
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
                    <input type="checkbox" name="check" id="sort01" data-type="错别字"/>
                </li>
                <li>
                    <label for="sort02">排版有误</label>
                    <input type="checkbox" name="check" id="sort02" data-type="排版有误"/>
                </li>
                <li>
                    <label for="sort03">描述错误</label>
                    <input type="checkbox" name="check" id="sort03" data-type="描述错误"/>
                </li>
                <li>
                    <label for="sort04">理解错误</label>
                    <input type="checkbox" name="check" id="sort04" data-type="理解错误"/>
                </li>
                <li>
                    <label for="sort05">抄袭文章</label>
                    <input type="checkbox" name="check" id="sort05" data-type="抄袭文章"/>
                </li>
                <li>
                    <label for="sort06">其它</label>
                    <input type="checkbox" name="check" id="sort06" data-type="其它"/>
                </li>
            </ul>
        </div>
        <div class="error_title">
            错误描述
        </div>
        <div class="error_text">
            <textarea></textarea>
            <input type="button" value="提交" onclick="subError()"/>
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
    function showThree(o){
        var wrapper = $(o).parents('.inReply-box').parents("li");
        var replyName = $(o).parents(".bot-control").siblings(".list-auto").find(".inr-font span.blue").html();
        wrapper.find('.reply_name2').val(replyName);
        wrapper.find('.in-replyK').find("textarea").val("").attr('placeholder', '回复@ ' + replyName + '');
        $(o).parents(".inReply-box").siblings(".in-replyK").slideDown();
    }
    //    评论
    function commentNew(o) {
        var str = '';
        var username = $(o).siblings('h4').find('span').html();
        var content = $('.common-area').val();
        var contentId = $('#contentId').val();
        var replyCount=parseInt($('#replyCount').html());
        var curLength=parseInt($('.comment-list>ul>li').length);
        var userImg=$(o).parents('.right-user').siblings("div.left-tx").find('img').attr("src");
        if(!content){
            alert("请输入评论内容");
            return false;
        }
        $.ajax({
            url: "/cn/api/user-comment",
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
                    str+='<li class="an-flex" data-id="'+req.id+'">' +
                        '<div class="left-tx">' +
                        '<img src="'+userImg+'" alt="用户头像"/>'+
                        '</div>' +
                        '<div class="right-user">' +
                        '<h4>' +
                        '<span>'+username+'</span>' +
                        //                        '<em>'+(replyCount+1)+'楼</em>' +
                        '</h4>' +
                        '<p>' +
                        content +
                        '</p>' +
                        '<div class="bot-control">' +
                        '<b>'+ getNowFormatDate() + '</b>' +
                        '<a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">' +
                        '<img src="/cn/images/common-zan.png" alt="点赞图标"/>' +
                        '<span>点赞 <b>0</b></span>' +
                        '</a>' +
                        '<a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>' +
                        '</div>' +
                        '<!--里层回复框-->' +
                        '<div class="in-replyK an-flex">' +
                        '<textarea></textarea>'+
                        '<div class="in-reply-btn">'+
                        '<input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>'+
                        '<input type="button" value="回复" class="sure" onclick="reply(this)"/>'+
                        '<input class="reply_name2" type="hidden" value="'+username+'">'+
                        '</div>'+
                        '</div>' +
                        '<!--里层回复展示样式-->' +
                        '<div class="inReply-box">' +
                        '</div>' +
                        '</div>' +
                        '</li>';
                    $('.comment-list>ul').prepend(str);
                    $('.common-area').val("");
                    $('#replyCount').html(replyCount+1);
                }

            }

        });
    }
    //    取消回复
    function quxiaoReply(o) {
        $(o).parents(".in-replyK").slideUp().find("textarea").val("");
    }
    //    回复
    function reply(o) {
        var str = '';
        var str2 = '';
        var wrapper = $(o).parents('li');
        var content = $(o).parent().siblings("textarea").val();
        var contentId = $('#contentId').val();
        var commentId = wrapper.attr('data-id');
        var replyName = wrapper.find('.reply_name2').val();
        var otherWrap = wrapper.find('.inReply-box').find(".in-reply-list").find("ul");
        var lc_reply = wrapper.find('.inReply-box');
        var comment_name=$(".common-pub").find('.right-user').find('span').html();
        var userImg=$(".common-pub").find("div.left-tx").find('img').attr("src");
        if(!content){
            alert("请输入评论内容");
            return false;
        }
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
                str2+='<li>' +
                    '<div class="an-flex list-auto"><div class="left-tx special-w">' +
                    '<img src="'+userImg+'" alt="用户头像"/>'+
                    '</div>' +
                    '<div class="right-user diffW-r">' +
                    '<div class="inr-font">' +
                    '<span class="blue">'+comment_name+'</span><b>：回复@'+replyName+'&nbsp;</b>' +
                    '<span class="font-g">'+content+'</span>' +
                    '</div>' +
                    '</div></div>' +
                    '<div class="bot-control">' +
                    '<span class="time">' + getNowFormatDate() + '</span>' +
                    '<a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>' +
                    '</div>' +
                    '</li>';
                alert(req.message);
                $(o).siblings("input[type='text']").val('');
                if (req.code==1&&otherWrap.length<1) {
                    str = '<div class="inReply-box" style="display: block;"><div class="in-reply-list"><ul>' + str2 + '</ul></div></div>';
                    $(o).parents(".in-replyK").after(str);
                }else {
                    str = str2;
                    otherWrap.append(str);
                }
                $(o).parent().siblings("textarea").val("");
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
        var h,m,s=0;
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        if(date.getHours()<10){
            h="0"+date.getHours();
        }else{
            h=date.getHours();
        }
        if(date.getMinutes()<10){
            m="0"+date.getMinutes();
        }else{
            m=date.getMinutes();
        }
        if(date.getSeconds()<10){
            s="0"+date.getSeconds();
        }else{
            s=date.getSeconds();
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + h + seperator2 + m + seperator2 +s;
        return currentdate;

    }
    function errorMask() {
        $(".error_mask").fadeIn();
    }
    function closeErrorMask() {
        $(".error_mask").fadeOut();
    }

    /**
     * 点击里层回复
     * @param o
     */
    function showReplyK(o) {
//        var ht=$(o).html();
//        if(ht=="回复"){
        var replyName2=$(o).parents(".bot-control").siblings("h4").find("span").html();
//            $(o).html("收起回复");
        $(o).parents(".bot-control").siblings(".in-replyK").slideDown()
            .find("textarea").attr("placeholder","").val("");
        $(o).parents(".bot-control").siblings(".in-replyK").find(".reply_name2").val(replyName2);
//            $(o).parents(".bot-control").siblings(".inReply-box").slideDown();
//        }else{
//            $(o).html("回复");
//            $(o).parents(".bot-control").siblings(".in-replyK").slideUp();
//            $(o).parents(".bot-control").siblings(".inReply-box").slideUp();
//        }
    }
</script>
<script type="text/javascript">
    $(function () {
        pageClick();
    });
    function pageClick() {
        $('.iPage').click(function(){
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var page = $('.pageSize').find('.on').html();
            pageStr(page);
        });

        $('.prev').click(function(){
            var page = $('.pageSize').find('.on').html();
            if(page == 1){
                return false;
            }else{
                page = parseInt(page)-1;
            }
            pageStr(page);
        });

        $('.next').click(function(){
            var page = $('.pageSize').find('.on').html();
            var len=$(".pageSize ul li").length;
            if(!page || page>=(len-2)){
                return false;
            }else{
                page = parseInt(page)+1;
            }
            pageStr(page);
        });
    }
    function pageStr(page) {
        var str='';
        var contentId = $('#contentId').val();
        $.ajax({
            url:"/cn/api/load-comment",
            type:"post",
            data:{
                contentId:contentId,
                page:page
            },
            dataType:"json",
            success:function (data) {
                var da=data.data;
                for(var i=0;i<da.length;i++){
                    var imgStr='';
                    if(da[i].image){
                        imgStr=da[i].image;
                    }else{
                        imgStr='/cn/images/details_defaultImg.png';
                    }
                    str+='<li class="an-flex" data-id="'+da[i].id+'">'+
                        '<div class="left-tx">' +
                        '<img src="'+imgStr+'" alt="用户头像"/>' +
                        '</div>' +
                        '<div class="right-user">' +
                        '<h4>' +
                        '<span>'+da[i].nickname+'</span>' +
                        //                        '<em>'+((data.count-i)-5*(page-1))+'楼</em>' +
                        '</h4>' +
                        '<p>' +
                        da[i].content +
                        '</p>' +
                        '<div class="bot-control">' +
                        '<b>'+formatDate(parseInt(da[i].createTime)*1000)+'</b>' +
                        '<a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">' +
                        '<img src="/cn/images/common-zan.png" alt="点赞图标"/>' +
                        '<span>点赞 <b>'+(da[i].fane?da[i].fane:0)+'</b></span>' +
                        '</a>' +
                        '<a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>' +
                        '</div>' +
                        '<!--里层回复框-->' +
                        '<div class="in-replyK an-flex">' +
                        '<textarea></textarea>'+
                        '<div class="in-reply-btn">'+
                        '<input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>'+
                        '<input type="button" value="回复" class="sure" onclick="reply(this)"/>'+
                        '<input class="reply_name2" type="hidden" value="'+da[i].nickname+'">'+
                        '</div>'+
                        '</div>' +
                        '<!--里层回复展示样式-->';
                    if(da[i].reply.length>0){
                        str+='<div class="inReply-box">' +
                            '<div class="in-reply-list">' +
                            '<ul>';
                        for(var j=0;j<da[i].reply.length;j++){
                            str+='<li>' +
                                '<div class="an-flex list-auto"><div class="left-tx special-w">' +
                                '<img src="';
                            if(da[i].reply[j].image){
                                str+=da[i].reply[j].image;
                            }else{
                                str+='/cn/images/details_defaultImg.png';
                            }
                            str+='"/>'+
                                '</div>' +
                                '<div class="right-user diffW-r">' +
                                '<div class="inr-font">' +
                                '<span class="blue">'+da[i].reply[j].nickname+'</span><b>：回复@'+da[i].reply[j].replyName+'&nbsp;</b>' +
                                '<span class="font-g">'+da[i].reply[j].content+'</span>' +
                                '</div>' +
                                '</div></div>' +
                                '<div class="bot-control">' +
                                '<span class="time">'+ formatDate(parseInt(da[i].reply[j].createTime)*1000)+'</span>' +
                                '<a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>\n' +
                                '</div>' +
                                '</li>';
                        }
                        str+='</ul>' +
                            '</div>' +
                            '</div>';
                    }
                    str+='</div>' +
                        '</li>';
                }
                $(".comment-list ul").html(str);
                $(".pageSize ul").html(data.pageStr);
                pageClick();
            }
        })
    }

    /**
     * 时间戳数字转化
     * @param m
     * @returns {string}
     */
    function add0(m){return m<10?'0'+m:m }
    function formatDate(needTime)
    {
        //needTime是整数，否则要parseInt转换
        var time = new Date(needTime);
        var y = time.getFullYear();
        var m = time.getMonth()+1;
        var d = time.getDate();
        var h = time.getHours();
        var mm = time.getMinutes();
        var s = time.getSeconds();
        return y+'-'+add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
    }
    function clickZanCom(o) {
        var commentId=$(o).parents("li").attr("data-id");
        var num=$(o).find("b").html();
        $.ajax({
            url:"/cn/api/comment-fabulous",
            type:"get",
            data:{
                commentId:commentId
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