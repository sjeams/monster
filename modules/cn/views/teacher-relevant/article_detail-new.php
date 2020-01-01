
<link rel="stylesheet" href="/cn/css/teacherZL.css?v=1.0.2"/>
<script type="text/javascript" src="/cn/js/teacherZL.js"></script>
<div class="teacher-box">
    <div class="art-nav">
        <ul>
            <li><a href="/">首页</a></li>
            <li>&gt;</li>
            <li><a href="/teacher_article.html">
                    <?php if ($article['type'] == 1)
                        echo "经验技巧";
                    else
                        echo "要点解读";
                    ?></span></a></li>
            <li>&gt;</li>
            <li><a href="#">正文</a></li>
        </ul>
    </div>
     <div class="teacher-left">
         <div class="art-content">
             <h2><?php echo $article['title'];?></h2>
             <div class="art-small">

                 <div class="view_data clearfix">
                     <div class="fl">
                         <div class="xiaobian_tx">
                             <a href="/teacher/<?php echo $teacher['id'];?>.html"><img src="<?php echo $teacher['image'];?>" alt="老师头像"/></a>
                         </div>
                         <span class="xiaob_name"><a href="/teacher/<?php echo $teacher['id'];?>.html"><?php echo $teacher['name'];?></a></span>
                         <span><?php echo $article['createTime'];?></span>
                     </div>
                     <div class="fr" style="margin-right: 15px;">
                         <span>阅读（<?php echo $article['view'];?>）</span>
                     </div>
                 </div>


                 <!--<span><?php echo $article['createTime'];?></span>
                 <b>|</b>
                 <a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a>
                 <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=0a13f29f-a6de-4905-9fd0-2a39d906a0ef&amp;style=10&amp;bgcolor=Orange&amp;ssc=false&amp;pophcol=1"></script>
                 <p style="float: right;">
                     <img src="/cn/images/teacher/teacher-eye.png" alt="阅读图标">
                     <span>阅读 <?php echo $article['view'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                     <img src="/cn/images/teacher/teacher-pinglun.png" alt="评论图标">
                     <span>评论 <?php echo $article['comments'];?></span>
                 </p>-->
             </div>
             <div class="art-zaiyao">
                 摘要：<?php echo $article['introduce'];?>
             </div>
             <div class="more-fonts">
                 <?php echo $article['content'];?>
                 <!--                    新增-->
                 <div class="tag-share">
                     <div class="fl">
                         <img src="/cn/images/common-tag.png" alt="标签图标"/>
                         <?php foreach($article['label'] as $k => $v){
                             echo "<span class='bg'>".$v."</span>";
                         }?>
                     </div>
                     <div class="fr flex-container">
                         <div class="r-control" onclick="collectArt02(this,<?php echo $article['id'];?>)">
                              <span class="collect-icon <?php if (!empty($art_collecte)) {
                                  echo 'on';
                              } ?>"></span>
<!--                             <img src="/cn/images/common-collect.png" alt="图标"/>-->
                             收藏
                         </div>
                         <div class="share_1 bdsharebuttonbox r-control">
                             <a class="bds_more bshareDiv" style="display: block;" data-cmd="more" href="javascript:void(0);">
                                 <em class="inm"><img src="/cn/images/common-shareicon.png" alt=""></em>
                                 <span class="inm">分享</span>
                             </a>
                             <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=0a13f29f-a6de-4905-9fd0-2a39d906a0ef&amp;style=10&amp;bgcolor=Orange&amp;ssc=false&amp;pophcol=1"></script>
                         </div>
                         <div class="r-control" onclick="errorMask()">
                             <img src="/cn/images/common-error.png" alt="图标"/>
                             报错
                         </div>
                     </div>
                     <div class="clearfixd"></div>
                 </div>
             </div>
             <div class="appreciate">
                  <div class="packet" onclick="ds_ld(this)">
                      <img src="/cn/images/teacher/teacher-hongbao.png" alt="图标"/>
                      赞赏
                  </div>
                 <p>已有<?php echo $reward;?>人赞赏</p>
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
                 <div><b>（评论数：<em id="replyCount" style="font-style: normal;"><?php echo $article['comments'];?></em>）</b></div>
             </div>
             <!--总评论发表框-->
             <div class="common-pub an-flex">
                 <div class="left-tx">
                     <img src="<?php if(isset($user['image']) && $user['image']) echo $user['image']; else echo '/cn/images/teacher/details_defaultImg.png';?>" alt="用户头像"/>
                 </div>
                 <div class="right-user">
                     <h4>
                         <span><?php if(isset($user['nickname']) && $user['nickname']) echo $user['nickname']; else echo '游客';?></span>
                     </h4>
                     <textarea class="common-area" placeholder="我来说两句"></textarea>
                     <input type="button" value="提交" class="common-sub" onclick="commentNew(this)"/>
                 </div>
             </div>
             <!--评论列表-->
             <div class="comment-list">
                 <ul>
                     <?php foreach($artcomments as $k => $v){?>
                         <li class="an-flex" data-id="<?php echo $v['id'] ?>">
                             <div class="left-tx">
                                 <img src="<?php if($v['userimage']) echo $v['userimage']; else echo '/cn/images/teacher/details_defaultImg.png' ?>" alt="用户头像"/>
                             </div>
                             <div class="right-user">
                                 <h4>
                                     <span><?php echo $v['usernickname']; ?></span>
<!--                                     <em>--><?php //echo $v['key']; ?><!--楼</em>-->
                                 </h4>
                                 <p>
                                     <?php echo $v['comment']; ?>
                                 </p>
                                 <div class="bot-control">
                                     <b><?php echo $v['createTime']; ?></b>
                                     <a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">
                                         <img src="/cn/images/common-zan.png" alt="点赞图标"/>
                                         <span>点赞 <b><?php echo $v['fine']?$v['fine']:0 ?></b></span>
                                     </a>
                                     <a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>
                                 </div>
                                 <!--里层回复框-->
                                 <div class="in-replyK an-flex">
<!--                                     <input type="text"/>-->
<!--                                     <input type="button" value="发送" onclick="reply(this)"/>-->
<!--                                     <input class="reply_name2" type="hidden" value="--><?php //echo $v['nickname'] ?><!--">-->
                                     <textarea></textarea>
                                     <div class="in-reply-btn">
                                         <input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>
                                         <input type="button" value="回复" class="sure" onclick="reply(this)"/>
                                         <input class="reply_name2" type="hidden" value="<?php echo $v['nickname'] ?>">
                                     </div>
                                 </div>
                                 <!--里层回复展示样式-->
                                 <?php
                                 if (count($v['reply']) > 0) {
                                     ?>
                                     <div class="inReply-box">
                                         <div class="in-reply-list">
                                             <ul>
                                                 <?php
                                                 foreach ($v['reply'] as $key => $va) {
                                                     ?>
                                                     <li>
                                                         <div class="an-flex list-auto">
                                                             <div class="left-tx special-w">
                                                                 <img src="<?php echo $va['userimage']?$va['userimage']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                                             </div>
                                                             <div class="right-user diffW-r">
                                                                 <div class="inr-font">
                                                                     <span class="blue"><?php echo $va['usernickname'] ?></span>
                                                                     <b>：@回复<?php echo $va['p_usernickname'] ?></b>
                                                                     <span class="font-g"><?php echo $va['comment'] ?></span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="bot-control">
                                                             <span class="time"><?php echo $va['createTime']; ?></span>
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
                     <?php echo $page;?>
                 </ul>
             </div>

         </div>

     </div>
     <div class="teacher-right">
         <div class="am-author">
             <h4 class="common-h4">本文作者</h4>
             <a href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank" class="right-top">
                     <img src="/cn/images/teacher/teacher-yuyue.png" alt="预约图标"> 预约咨询</a>
             <div class="author-teacher">
                 <div class="a-t-left">
                     <a href="/teacher/<?php echo $teacher['id'];?>.html"><img src="<?php echo $teacher['image'];?>" alt="老师头像"/></a>
                 </div>
                 <div class="a-t-right">
                     <h4><a href="/teacher/<?php echo $teacher['id'];?>.html"><?php echo $teacher['name'];?></a></h4>
                     <p><?php echo $teacher['introduce'];?></p>
                 </div>
                 <div class="clearfixd"></div>
                 <div class="person-jianjie ellipsis-4">
                     <b>个人简介：</b>
                     <span>
                         <?php echo $teacher['detail'];?>
                     </span>
                 </div>
                 <div class="grey-controls">
                     <ul>
                         <li>
                             <p><?php echo $teacher['artcount'];?></p>
                             <span>文章数</span>
                         </li>
                         <li>
                             <p><?php echo $teacher['welcome'];?>%</p>
                             <span>受欢迎度</span>
                         </li>
                         <li>
                             <p><?php echo $teacher['comments'];?></p>
                             <span>评价数</span>
                         </li>
                     </ul>
                 </div>
                 <div class="pr-discWhite" style="width:100%;border: 1px #cccccc solid;">
                     <ul>
                         <li onclick="indexZan(this,<?php echo $teacher['id'];?>)">
                             <img src="/cn/images/teacher/teacher-zan.png" alt="赞图标">
                             <b class="numA"><?php echo $teacher['fine'];?></b>
                             <span class="dis">赞</span>
                         </li>
                         <li onclick="indexZan02(this)">
<!--                             <div class="collect"></div>-->
<!--                             <img src="/cn/images/teacher/teacher-greyZan.png" alt="图标" height="21">-->
                             <strong class="<?php if($userCollection==1){ echo 'red';}?>"></strong>
                             <b class="numA"><?php echo $teacher['collections'];?></b>
                             <input type="hidden" id="userCollection" value="<?php echo $userCollection?>"/>
                             <input type="hidden" id="teacherid" value="<?php echo $teacher['id'];?>"/>
                             <input type="hidden" id="contentid" value="<?php echo $article['id'];?>"/>
                             <input type="hidden" id="userid" value="<?php if(!empty($user)) echo $user['uid'];?>" />
                             <input type="hidden" id="art_collecte" value="<?php echo $art_collecte;?>" />
                             <?php if($userCollection==1)
                             {
                                 ?>
                                 <span class="dis">取消收藏</span>
                                 <?php
                             }else{
                                 ?>
                                 <span class="dis">收藏</span>
                                 <?php
                             }
                             ?>
                         </li>
                     </ul>
                 </div>
                 <div class="comeOn-kongj">
                     <a href="/teacher/<?php echo $teacher['id'];?>.html">进入个人空间</a>
                 </div>
             </div>
         </div>
         <div class="hot-article">
             <h4 class="common-h4">热门文章推荐</h4>
             <ul>
                 <?php foreach($hotarticles as $kk => $vv){
                     if( $kk < 5 && $vv['hot'] == 1){
                     ?>
                 <li>
                     <div class="ha-left">
                         <a href="/teacher_article/<?php echo $vv['id'];?>.html">
                             <img src="<?php echo $vv['image'];?>" alt="图标"/>
                         </a>
                     </div>
                     <div class="ha-right">
                         <h4 class="ellipsis-2">
                             <a href="/teacher_article/<?php echo $vv['id'];?>.html"><?php echo $vv['title'];?></a>
                         </h4>
                         <p>
                             <span><?php echo $vv['createTime'];?></span>
                             <b>阅读：<?php echo $vv['view'];?></b>
                         </p>
                     </div>
                     <div class="clearfixd"></div>
                 </li>
                 <?php }};?>
             </ul>
         </div>
         <div class="examination">
             <h4 class="common-h4">GRE百科</h4>
             <ul>
                 <?php
                 foreach($baike as $v) {
                     ?>
                     <li>
                         <a href="/beikao/d-544-<?php echo $v['id'] ?>.html">
                             <img src="<?php echo $v['image'] ?>" alt="图片"/>

                             <p><?php echo $v['name'] ?></p>
                         </a>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>
         <div class="hotTopic">
             <h4 class="common-h4">热门话题</h4>
             <ul>
                 <li class="flex-container-center">GRE模考</li>
                 <li class="flex-container-center">GRE备考<br/>资讯</li>
                 <li class="flex-container-center">GRE</li>
                 <li class="flex-container-center">GRE考试</li>
                 <li class="flex-container-center">GRE报名</li>
                 <li class="flex-container-center">GRE课程</li>
                 <li class="flex-container-center">GRE资料</li>
             </ul>
         </div>
     </div>
     <div class="clearfixd"></div>
</div>
<!--{*打赏*}-->
<section id="ds_wrap">
    <div class="ds_ld_wrap tm">
        <div class="bg_f ds_step1 relative">
            <div class="close_ds ani"><img src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/ai_close.png" alt=""></div>
            <div><img src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/ds_ld.png" alt=""></div>
            <p class="ls_hint inm" style="padding-top: 7px;">解答简直不要太棒！我要打赏雷豆</p>
            <ul class="sel_ld flex-container">
                <li class="on">
                    <div class="dsld_val">10</div>
                    <img class="on_sel" src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/sel_ld.png" alt="">
                </li>
                <li>
                    <div class="dsld_val">50</div>
                    <img class="on_sel" src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/sel_ld.png" alt="">
                </li>
                <li>
                    <div class="dsld_val">100</div>
                    <img class="on_sel" src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/sel_ld.png" alt="">
                </li>
                <li>
                    <div class="dsld_val">200</div>
                    <img class="on_sel" src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/sel_ld.png" alt="">
                </li>
                <li>
                    <div class="dsld_val">300</div>
                    <img class="on_sel" src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/sel_ld.png" alt="">
                </li>
                <li>
                    <div style="display: none" class="dsld_val"></div>
                    <input id="other_ld" type="text" placeholder="其他" onkeyup="value=value.replace(/[^\d]/g,'')"/>
                </li>
            </ul>
            <div>
                <span class="ds_btn" onclick="giveAReward(<?php echo $article['id'];?>)">打&nbsp;&nbsp;赏</span>
                <p class="ld_hint">您的雷豆总数：<span><?php echo $user['integral'];?></span></p>
            </div>
        </div>
        <div class="ds_cg_t1" style="display: none;cursor:pointer;"><img src="https://gmat.viplgw.cn/app/web_core/styles/images/ai/ds_cg_t1.png" alt=""></div>
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
            <input type="button" value="提交" onclick="subError02(<?php echo $article['id'];?>)"/>
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
    $(function () {
        //关闭打赏弹窗
        $('.close_ds').click(function () {
            $('#ds_wrap').hide();
        });
        //选择打赏数目
        $('.sel_ld li').click(function () {
            $(this).addClass('on').siblings('li').removeClass('on')
        });
//        输入其他雷豆数量
        $('#other_ld').bind("input propertychange", function () {
            $(this).prev('.dsld_val').html($(this).val());
        });
    });
    //打赏弹窗
    function ds_ld(o) {
        $('#ds_wrap').show();
    }
    function errorMask() {
        $(".error_mask").fadeIn();
    }
    function closeErrorMask() {
        $(".error_mask").fadeOut();
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
        var contentId = $('#contentid').val();
        var replyCount=parseInt($('#replyCount').html());
        var curLength=parseInt($('.comment-list>ul>li').length);
        var userImg=$(o).parents('.right-user').siblings("div.left-tx").find('img').attr("src");
        var userid=$("#userid").val();
        var teacherid=$("#teacherid").val();
        if(!content){
            alert("请输入评论内容");
            return false;
        }
        $.ajax({
            url: "/cn/api/add-comment",
            dataType: "json",
            data: {
                userid:userid,
                comment:content,
                teacherid:teacherid,
                contentid:contentId,
                type:1 //1评论 2回复
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
//                    alert(req.message);
                    var da=req.comments;
                    for(var i=0;i<da.length;i++){
                        str+='<li class="an-flex" data-id="'+da[i].id+'">' +
                            '<div class="left-tx">' +
                            '<img src="'+userImg+'" alt="用户头像"/>'+
                            '</div>' +
                            '<div class="right-user">' +
                            '<h4>' +
                            '<span>'+da[i].usernickname+'</span>' +
//                            '<em>'+da[i].key+'楼</em>' +
                            '</h4>' +
                            '<p>' +
                            da[i].comment +
                            '</p>' +
                            '<div class="bot-control">' +
                            '<b>'+ da[i].createTime + '</b>' +
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
                            '</div>';
                        if(da[i].reply.length>0){
                            str+='<!--里层回复展示样式-->' +
                                '<div class="inReply-box"><div class="in-reply-list"><ul>';
                            for(var tb=0;tb<da[i].reply.length;tb++){
                                str+='<li>' +
                                    '<div class="an-flex list-auto"><div class="left-tx special-w">'+
                                    '<img src="';
                                if(da[i].reply[tb].userimage){
                                    str+=da[i].reply[tb].userimage;
                                }else{
                                    str+='/cn/images/details_defaultImg.png';
                                }
                                str+='" alt="用户头像"/>'+
                                    '</div>' +
                                    '<div class="right-user diffW-r">' +
                                    '<div class="inr-font">' +
                                    '<span class="blue">'+da[i].reply[tb].usernickname+'</span><b>：回复@'+da[i].reply[tb].p_usernickname+'&nbsp;</b>' +
                                    '<span class="font-g">'+da[i].reply[tb].comment+'</span>' +
                                    '</div>' +
                                    '</div></div>' +
                                    '<div class="bot-control">' +
                                    '<span class="time">' + da[i].reply[tb].createTime+ '</span>' +
                                    '<a href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>' +
                                    '</div>' +
                                    '</li>';
                            }
                            str+='</ul></div></div>';

                        }
                        str+= '</div>' +
                            '</li>';
                    }
                    $('.comment-list>ul').html(str);
                    $('.common-area').val("");
                    $('#replyCount').html(replyCount+1);
                    $(".pageSize ul").html(req.page);
                    pageClick();
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
        var contentId = $('#contentid').val();
        var commentId = wrapper.attr('data-id');
        var replyName = wrapper.find('.reply_name2').val();
        var otherWrap = wrapper.find('.inReply-box').find(".in-reply-list").find("ul");
        var lc_reply = wrapper.find('.inReply-box');
        var comment_name=$(".common-pub").find('.right-user').find('span').html();
        var userImg=$(".common-pub").find("div.left-tx").find('img').attr("src");
        var userid=$("#userid").val();
        var teacherid=$("#teacherid").val();
        var pid=0;
        var pfLen=$(o).parents(".in-replyK").siblings(".in-replyK").length;
        if(pfLen>0){
            pid=$(o).siblings(".reply_name2").attr("data-pid");
        }else{
            pid=commentId;
        }
        if(!content){
            alert("请输入评论内容");
            return false;
        }
        $.ajax({
            url: "/cn/api/add-comment",
            dataType: "json",
            data: {
                userid:userid,
                comment:content,
                teacherid:teacherid,
                contentid:contentId,
                type:2, //1评论 2回复
                pid:pid,
                fpid:commentId
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
//                alert(req.message);
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
        var contentId = $('#contentid').val();
        var teacherId=$("#teacherid").val();
        $.ajax({
            url:"/cn/api/read-teacher-comment",//老师评论加载
            type:"post",
            data:{
                contentId:contentId,
                teacherId:teacherId,
                page:page,
                type:2 //（1-名师 2-文章）
            },
            dataType:"json",
            success:function (data) {
                var da=data;
                for(var i=0;i<da.length;i++){
                    var imgStr='';
                    if(da[i].userimage){
                        imgStr=da[i].userimage;
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
//                        '<em>'+da[i].key+'楼</em>' +
                        '</h4>' +
                        '<p>' +
                        da[i].comment +
                        '</p>' +
                        '<div class="bot-control">' +
                        '<b>'+(da[i].createTime)+'</b>' +
                        '<a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">' +
                        '<img src="/cn/images/common-zan.png" alt="点赞图标"/>' +
                        '<span>点赞 <b>'+(da[i].fine?da[i].fine:0)+'</b></span>' +
                        '</a>' +
                        '<a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>' +
                        '</div>' +
                        '<!--里层回复框-->' +
                        '<div class="in-replyK an-flex">' +
//                        '<input type="text"/>' +
//                        '<input type="button" value="发送" onclick="reply(this)"/>' +
//                        '<input class="reply_name2" type="hidden" value="'+da[i].nickname+'">' +
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
                                '<span class="blue">'+da[i].reply[j].usernickname+'</span><b>：回复@'+da[i].reply[j].p_usernickname+'&nbsp;</b>' +
                                '<span class="font-g">'+da[i].reply[j].comment+'</span>' +
                                '</div>' +
                                '</div></div>' +
                                '<div class="bot-control">' +
                                '<span class="time">'+ da[i].reply[j].createTime+'</span>' +
                                '<a  href="javascript:void(0);" class="reply" onclick="showThree(this,'+da[i].reply[j].id+')">回复</a>\n' +
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
            url:"/cn/api/add-fine-teacher",
            type:"post",
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
    /**
     * 收藏文章
     */
    function collectArt02(o,id) {
        $.ajax({
            url:"/cn/api/user-content-collection",
            type:"post",
            data:{
                tea_artId:id
            },
            dataType:"json",
            success:function (data) {
                alert(data.message);
                if(data.message=="请登录"){
                    loginHref();
                }else if(data.code==1){
                    $(o).find("span.collect-icon").addClass("on");
                }else if(data.code==2){
                    $(o).find("span.collect-icon").removeClass("on");
                }
            }
        });
    }
    /**
     * 提交报错文章
     */
    function subError02(tea_artId) {
        var typeStr=$(".error_sort ul li input:checked");
        var typeSs='';
        typeStr.each(function () {
            typeSs+=$(this).attr("data-type")+",";
        });
        var errorContent=$(".error_text textarea").val();
        var id=$("#contentId").val();
        if(!typeStr ||!errorContent){
            alert("请将报错信息填写完整哦！");
            return false;
        }
        $.ajax({
            url:"/cn/api/content-errors",
            type:"get",
            data:{
                contentId:id,
                typeStr:typeSs.substr(0,typeSs.length-1),
                errorContent:errorContent,
                tea_artId:tea_artId //文章id
            },
            dataType:"json",
            success:function (data) {
                alert(data.message);
                if(data.code==1){
                    closeErrorMask();
                    $(".error_text textarea").val("");
                    $(".error_sort ul li input:checked").attr("checked",false);
                }
            }
        });
    }
</script>
