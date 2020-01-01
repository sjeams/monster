<?php $userData = Yii::$app->session->get('userData'); ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_course.css?v=1">
<section id="course">
    <div class="w12">
        <div class="bg_f course_info">
            <div class="location">
                <a href="/">首页</a>
                <em>></em>
                <a href="/activity.html">GRE活动</a>
                <em>></em>
                <span class="cur_cation"><?php echo $category ?></span>
            </div>
            <div class="clearfix">
                <div class="w12" style="display: none" id="pid" data-value="<?php echo $pid;?>"></div>
                <div class="data_left fl">
                    <div class="course_img"><img src="https://open.viplgw.cn/<?php echo $data['image'] ?>" alt=""></div>
                    <div class="course_share bdsharebuttonbox">
                        <span class="share_data">共<strong><?php echo $data['viewCount'] ?></strong>次浏览</span>
                            <img src="/cn/images/share_icon.png" alt="">
                            <a class="bds_more" data-cmd="more" href="javascript:void(0);">分享</a>
                    </div>
                </div>
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
                <div class="data_right fl">
                    <p class="course_name ellipsis"><?php echo $parent['name'] ?></p>
                    <p class="course_de ellipsis"><?php echo isset($parent['name'])?$parent['name']:'' ?></p>
                    <div class="course_star clearfix">
                        <div class="inm fl">
                            <img src="/cn/images/count_p.png" alt="">
                            <span class="star_name">报名人数：<?php echo isset($parent['numbering'])?$parent['numbering']:'0' ?></span>
                        </div>
                        <div class="inm fr">
                            <img src="/cn/images/cr_time.png" alt="">
                            <span class="star_name">距离报名结束：<?php echo isset($parent['commencement'])?$parent['commencement']:'' ?></span>
                        </div>
                    </div>
                    <div class="price_wrap">
                        <div>
                            <span class="p_name">促销价</span>
                            <span class="np_num"><em style="font-size: 18px">￥</em><?php echo isset($data['price'])?$data['price']:'' ?></span>
                        </div>

                    </div>
                    <div class="cr_info">
                        <div class="info_row">
                            <span class="row_name">课程时长</span>
                            <span class="row_data"><?php echo isset($parent['problemComplement'])?$parent['problemComplement']:''  ?></span>
                        </div>
                        <div class="info_row">
                            <span class="row_name">开课日期</span>
                            <span class="row_data"><?php echo isset($parent['cnName'])?$parent['cnName']:'' ?></span>
                        </div>
<!--                        <div class="info_row">-->
<!--                            <span class="row_name">性 &nbsp;价 比</span>-->
<!--                            <span class="row_data">--><?php //echo isset($parent['performance'])?$parent['performance']:'' ?><!--</span>-->
<!--                        </div>-->
                    </div>
                    <div class="handle_cr">
                        <a class="inm" href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes">立即报名</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg_f">
            <ul class="cTag_wrap clearfix">
                <li class="on">课程介绍</li>
                <li>授课名师</li>
            </ul>
            <div class="cTeam_wrap">
                <div class="item_team">
                    <?php echo isset($parent['sentenceNumber'])?$parent['sentenceNumber']:'' ?>
                </div>
                <div class="item_team">
                    <?php echo isset($parent['answer'])?$parent['answer']:'' ?>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" id="contentId" value="<?php echo $data['id'] ?>">
</section>
<script>
    $(function () {
        /**
         *价格切换
         */
        $('.teacherTag').click(function(){
            var tagStr = "";
            var tagId= $(this).attr('data-value');
            var pid = $('#pid').attr('data-value');
            var tagObg = $(this).find('.on');
            $(tagObg).each(function(){
                var ss = $(this).attr('data-value');
                tagStr += (ss+",");
            });
            tagStr += tagId;
            $.post("/cn/api/change-class",{tagStr:tagStr,pid:pid},function(re){
                if(re.id == undefined){
                    alert("缺货中、、、、");
                }else{
                    window.location.href="/course/"+re.id+".html";
                }
            },'json')
        });
        $('.teacherTag').each(function (a,b) {
            var arr=['#EA0000','#2894FF','#408080','#EAC100','#73BF00','#EA0000','#BF0060'];
            $(this).css({background:arr[a]})
        });
        $('.cTag_wrap li').click(function () {
            var num=$(this).index();
            $(this).addClass('on').siblings('li').removeClass('on');
            $('.cTeam_wrap .item_team').eq(num).show().siblings().hide();
        });
    });

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
        if(content==''){
            alert('评论不能为空！！！');
            return false;
        }else {
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
                    }

                }

            });
        }

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
        var comment_name = wrapper.find('.reply_name2').val();
        if(content==''){
            alert('评论不能为空！！！');
            return false;
        }else{
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
                    if (req.code == 1 && otherWrap.length < 1) {
                        str = '<div class="other_reply">' + str2 + '</div>';
                        lc_reply.prepend(str);
                        otherWrap.prepend(str);
                    } else {
                        str = str2;
                        otherWrap.prepend(str);
                    }

                }

            });
        }

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

</script>