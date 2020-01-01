<link rel="stylesheet" href="/cn/css/teacherZL.css?v=1.0.1"/>
<script type="text/javascript" src="/cn/js/teacherZL.js"></script>
<div class="person-info">
     <div class="person-i-left">
         <div class="person-thumb">
             <img src="<?php echo $teacher['image']; ?>" alt="老师头像"/>
         </div>
         <p>
             <img src="/cn/images/teacher/teacher-love.png" alt="图标"/>
             关注人数：<?php echo $teacher['collections']; ?>
         </p>
     </div>
     <div class="person-i-center">
         <h4>
             <?php echo $teacher['name']; ?>
             <a href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank">
                 <img src="/cn/images/teacher/teacher-yuyueW.png" alt="预约图标"/>
                 预约咨询</a>
         </h4>
          <div class="color-group">
              <?php foreach($teacher['label'] as $k => $v)
              {
                  echo "<span>".$v."</span>";
              }?>
          </div>
         <div class="black-info">
             <?php echo $teacher['introduce']; ?>
         </div>
     </div>
     <div class="person-i-right">
         <div class="pr-white">
             <ul>
                 <li>
                     <p><?php echo $teacher['articles']; ?></p>
                     <span>文章数</span>
                 </li>
                 <li>
                     <p><?php echo $teacher['welcome'];?>%</p>
                     <span>受欢迎度</span>
                 </li>
                 <li>
                     <p><?php echo $teacher['comments']; ?></p>
                     <span>评价数</span>
                 </li>
             </ul>
         </div>
         <div class="pr-discWhite">
             <ul>
                 <li onclick="indexZan(this,<?php echo $teacher['id']; ?>)">
                     <img src="/cn/images/teacher/teacher-zan.png" alt="赞图标"/>
                     <b class="numA"><?php echo $teacher['fine']; ?></b>
                     <span class="dis">赞</span>
                 </li>
                 <li onclick="indexZan02(this)">
                      <strong class="<?php if($userCollection==1){ echo 'red';}?>"></strong>
<!--                     <img src="/cn/images/teacher/teacher-greyZan.png" alt="图标" height="21"/>-->
                     <b class="numA"><?php echo $teacher['collections']; ?></b>
                     <input type="hidden"id="userCollection" value="<?php echo $userCollection;?>"/>
                     <input type="hidden" id="teacherid" value="<?php echo $teacher['id'];?>"/>
                     <input type="hidden" id="userid" value="<?php if(!empty($user)) echo $user['uid'];?>" />
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
     </div>
     <div class="clearfixd"></div>
</div>
<div class="teacher-box">
     <div class="teacher-left">
          <div class="self-introduction">
               <div class="d-common-title">
                   <h4>
                       <img src="/cn/images/teacher/teacher-person.png" alt="图标"/>
                       <span>个人介绍</span>
                   </h4>
               </div>
              <p>
                  <?php echo $teacher['detail']; ?>
              </p>
          </div>
         <div class="teacher-zhuanlan">
             <div class="d-common-title" style="padding: 11px 0 0 20px">
                 <h4>
                     <img src="/cn/images/teacher/teacher-zhuanlan.png" alt="图标"/>
                     <span><?php echo $teacher['name']; ?>的专栏</span>
                 </h4>
                 <a href="/teacher_article.html" style="right: 18px">More</a>
             </div>
             <div class="content-list">
                 <ul>
                     <?php foreach($articles as $ka => $kv){
                         ?>
                         <li>
                             <div class="cl-left">
                                 <a href="/teacher_article/<?php echo $kv['id']; ?>.html">
                                     <img src="<?php echo $kv['image']; ?>" alt="图片"/>
                                 </a>
                             </div>
                             <div class="cl-right">
                                 <h4 class="ellipsis"><a href="/teacher_article/<?php echo $kv['id']; ?>.html"><?php echo $kv['title']; ?></a></h4>
                                 <p class="ellipsis"><?php echo $kv['introduce']; ?></p>
                                 <div class="cl-r-teacher flex-container-left">
                                     <div class="small-thumb">
                                         <a href="javascript:void(0);"><img src="<?php echo $teacher['image']; ?>" alt="老师头像"/></a>
                                     </div>
                                     <p><a href="javascript:void(0);"><?php echo $teacher['name']; ?></a></p>
                                     <img src="/cn/images/teacher/teacher-shuqian.png" alt="图标"/>
                                     <span>
                                         <?php
                                            if($kv['type'] == 1) echo "经验技巧";
                                            else echo "要点解读";
                                         ?>
                                     </span>
                                     <div class="clearfixd"></div>
                                 </div>
                                 <div class="cl-r-controls">
                                     <p>
                                         <img src="/cn/images/teacher/teacher-eye.png" alt="阅读图标"/>
                                         <span>阅读 <?php echo $kv['view']; ?></span>
                                     </p>
                                     <p>
                                         <img src="/cn/images/teacher/teacher-dianzan.png" alt="点赞图标"/>
                                         <span>点赞 <?php echo $kv['fine']; ?></span>
                                     </p>
                                     <p><?php echo $kv['createTime']; ?></p>
                                 </div>
                             </div>
                             <div class="clearfixd"></div>
                         </li>
                     <?php
                     }
                     ?>
                 </ul>
             </div>
         </div>
         <div class="high-score">
             <div class="d-common-title">
                 <h4>
                     <img src="/cn/images/teacher/teacher-high.png" alt="图标"/>
                     <span>高分学员</span>
                 </h4>
<!--                 <a href="/case/case.html">More</a>-->
             </div>
             <div class="high-con">
                 <ul id="caseList">
                     <?php foreach($students['data'] as $ks=>$vs){
                         ?>
                     <li>
                         <a href="/case_detail/<?php echo $vs['id'] ?>.html">
                         <div class="high-box">
<!--                             <a href="javascript:void(0);">-->
                                 <img src="<?php echo $vs['image']?>" alt="案例图片"/>
<!--                             </a>-->
                         </div>
                         <h4 class="ellipsis">
<!--                             <a href="#">-->
                                 <?php echo $vs['name']?>
<!--                             </a>-->
                         </h4>
                         <div class="case-info">
                             <span>姓名：<?php echo $vs['answer']?></span>
                             <span>基础：<?php echo $vs['alternatives']?></span>
                             <span>出分时间：<?php echo $vs['article']?></span>
                             <span>班型：<?php echo $vs['listeningFile']?></span>
                             <span>考试次数：<?php echo $vs['cnName']?>次</span>
                             <span>分数：<?php echo $vs['numbering']?></span>
                         </div>
                         </a>
                     </li>
                     <?php } ?>
                 </ul>
             </div>
             <div class="fenye2" style="margin:  40px 0;">
                 <ul>
                     <?php echo $students['pageStr'] ?>
                 </ul>
             </div>
         </div>
         <!--新版评论-->
         <div class="new-comment">
             <div class="comment-title an-flex">
                 <div>
                     <img src="/cn/images/epl_reply.png" alt="评论标题图标"/>
                     <span>网友评论</span>
                 </div>
                 <div><b>（评论数：<em id="replyCount" style="font-style: normal;"><?php echo $teacher['comments']; ?></em>）</b></div>
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
                     <?php foreach($comments as $kc => $vc){
                         ?>
                         <li class="an-flex" data-id="<?php echo $vc['id'] ?>">
                             <div class="left-tx">
                                 <img src="<?php if(!empty($vc['userimage'])) echo $vc['userimage'];else echo '/cn/images/teacher/details_defaultImg.png';?>" alt="用户头像"/>
                             </div>
                             <div class="right-user">
                                 <h4>
                                     <span><?php echo $vc['nickname']; ?></span>
<!--                                     <em>--><?php //echo $vc['site']; ?><!--楼</em>-->
                                 </h4>
                                 <p>
                                     <?php echo $vc['comment']; ?>
                                 </p>
                                 <div class="bot-control">
                                     <b><?php echo $vc['createTime']; ?></b>
                                     <a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">
                                         <img src="/cn/images/common-zan.png" alt="点赞图标"/>
                                         <span>点赞 <b><?php echo $vc['fine']?$vc['fine']:0?></b></span>
                                     </a>
                                     <a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>
                                 </div>
                                 <!--里层回复框-->
                                 <div class="in-replyK an-flex">
<!--                                     <input type="text"/>-->
<!--                                     <input type="button" value="发送" onclick="reply(this)"/>-->
<!--                                     <input class="reply_name2" type="hidden" value="回复用户名"/>-->
                                     <textarea></textarea>
                                     <div class="in-reply-btn">
                                         <input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>
                                         <input type="button" value="回复" class="sure" onclick="reply(this)"/>
                                         <input class="reply_name2" type="hidden" value="<?php echo $vc['nickname'] ?>">
                                     </div>
                                 </div>
                                 <!--里层回复展示样式-->
<!--                                 --><?php
                                 if (count($vc["reply"]) > 0) {
                                     ?>
                                     <div class="inReply-box">
                                         <div class="in-reply-list">
                                             <ul>
                                                 <?php
                                                 foreach ($vc["reply"] as $key => $va) {
                                                     ?>
                                                     <li>
                                                        <div class="an-flex list-auto">
                                                            <div class="left-tx special-w">
                                                                <img src="<?php echo $va['userimage']?$va['userimage']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                                            </div>
                                                            <div class="right-user diffW-r">
                                                                <div class="inr-font">
                                                                    <span class="blue"><?php echo $va['usernickname'] ?></span>
                                                                    <b>：回复@<?php echo $va['p_usernickname'] ?></b>
                                                                    <span class="font-g"><?php echo $va['comment'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="bot-control">
                                                             <span class="time"><?php echo  $va['createTime']; ?></span>
                                                             <a  href="javascript:void(0);" class="reply" onclick="showThree(this,<?php echo  $va['id'];?>)">回复</a>
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
         <div class="pingjia-btn">
             <a href="#pingjia">
                 <img src="/cn/images/teacher/teacher-edit.png" alt="图标"/>
                 留下您对该老师的评价
             </a>
         </div>
         <div class="famousTeacher">
              <h4 class="common-h4">名师在线
                  <a href="/teacher.html">More</a>
              </h4>
             <ul>
                 <?php foreach($teacheronline as $kk=>$to) {
                     if($kk < 3) {
                         ?>
                         <li>
                             <div class="famous-thumb">
                                 <a href="/teacher/<?php echo $to['id'] ?>.html"><img src="<?php echo $to['image'] ?>"
                                                                                      alt="老师头像"/></a>
                             </div>
                             <div class="famous-con">
                                 <h4 class="ellipsis"><a
                                             href="/teacher/<?php echo $to['id'] ?>.html"><?php echo $to['name'] ?></a>
                                 </h4>
                                 <p class="ellipsis"><?php echo $to['introduce'] ?></p>
                             </div>
                             <div class="clearfixd"></div>
                             <a href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes" target="_blank">
                                 <img src="/cn/images/teacher/teacher-yuyue.png" alt="预约图标"/> 预约咨询</a>
                         </li>
                         <?php
                     }
                    }?>
             </ul>
         </div>
         <div class="hot-article">
             <h4 class="common-h4">热门文章推荐</h4>
             <ul>
                 <?php foreach($hotarticles as $sk=>$sv){
                     if($sk < 5) {
                         ?>
                         <li>
                             <div class="ha-left">
                                 <a href="/teacher_article/<?php echo $sv['id']; ?>.html">
                                     <img src="<?php echo $sv['image'] ?>" alt="图标"/>
                                 </a>
                             </div>
                             <div class="ha-right">
                                 <h4 class="ellipsis-2">
                                     <a href="/teacher_article/<?php echo $sv['id']; ?>.html"><?php echo $sv['title']; ?></a>
                                 </h4>
                                 <p>
                                     <span><?php echo $sv['createTime']; ?></span>
                                     <b>阅读：<?php echo $sv['view']; ?></b>
                                 </p>
                             </div>
                             <div class="clearfixd"></div>
                         </li>
                         <?php
                     }
                 }?>
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

         <div class="gmatWeChat">
             <h4 class="common-h4">雷哥GRE微信</h4>
             <div class="weChat-two">
                 <img src="/cn/images/gre-wechat.jpg" alt="微信图" width="190">
                 <p>微信公众号：雷哥GRE</p>
                 <img src="/cn/images/gre_bloh.png" alt="二维码" width="190">
                 <p>微博：雷哥GRE在线</p>
             </div>
         </div>
     </div>
     <div class="clearfixd"></div>
</div>
<script type="text/javascript">
    var str;
    var page;
    $(document).on("click",".iPage",function(){
        $("#caseList").html("");
        str='';
        page = $(this).html();
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html"><div class="high-box">
                        <img src="${data.data[i].image}" alt="案例图片"/>
                        </div>
                        <h4 class="ellipsis">
                        ${data.data[i].name}
                        </h4>
                        <div class="case-info">
                        <span>姓名：${data.data[i].answer}</span>
                    <span>基础：${data.data[i].alternatives}</span>
                    <span>出分时间：${data.data[i].article}</span>
                    <span>班型：${data.data[i].listeningFile}</span>
                    <span>考试次数：${data.data[i].cnName}次</span>
                    <span>分数：${data.data[i].numbering}</span>
                    </div>
                    </a>
                    </li>`;
                };
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });
    $(document).on("click",".prev",function(){
        $("#caseList").html("");
        str='';
        var page = $('.pageSize').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html"><div class="high-box">
                        <img src="${data.data[i].image}" alt="案例图片"/>
                        </div>
                        <h4 class="ellipsis">
                        ${data.data[i].name}
                        </h4>
                        <div class="case-info">
                        <span>姓名：${data.data[i].answer}</span>
                    <span>基础：${data.data[i].alternatives}</span>
                    <span>出分时间：${data.data[i].article}</span>
                    <span>班型：${data.data[i].listeningFile}</span>
                    <span>考试次数：${data.data[i].cnName}次</span>
                    <span>分数：${data.data[i].numbering}</span>
                    </div>
                    </a>
                    </li>`
                };
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });

    $(document).on("click",".next",function(){
        $("#caseList").html("");
        str='';
        var page = $('.pageSize').find('.on').html();
        if(page == <?php echo $students['total']?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html"><div class="high-box">
                        <img src="${data.data[i].image}" alt="案例图片"/>
                        </div>
                        <h4 class="ellipsis">
                        ${data.data[i].name}
                        </h4>
                        <div class="case-info">
                        <span>姓名：${data.data[i].answer}</span>
                    <span>基础：${data.data[i].alternatives}</span>
                    <span>出分时间：${data.data[i].article}</span>
                    <span>班型：${data.data[i].listeningFile}</span>
                    <span>考试次数：${data.data[i].cnName}次</span>
                    <span>分数：${data.data[i].numbering}</span>
                    </div>
                    </a>
                    </li>`
                };
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });
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
        var contentId = $('#contentId').val();
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
                    '<a href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>' +
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
        var contentId = $('#contentId').val();
        var teacherId=$("#teacherid").val();
        $.ajax({
            url:"/cn/api/read-teacher-comment",//老师评论加载
            type:"post",
            data:{
                contentId:contentId,
                teacherId:teacherId,
                page:page,
                type:1 //（1-名师 2-文章）
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
                                '<a  href="javascript:void(0);" class="reply" onclick="showThree(this,'+da[i].reply[j].id+')">回复</a>' +
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
</script>
