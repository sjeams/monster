
<link rel="stylesheet" href="/cn/css/teacherZL.css?v=1"/>
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
                 <span><?php echo $article['createTime'];?></span>
                 <b>|</b>
                 <!--<img src="images/teacher/teacher-fenxiang.png" alt="分享图标"/>-->
                 <!--<span>分享</span>-->
                 <a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a>
                 <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=0a13f29f-a6de-4905-9fd0-2a39d906a0ef&amp;style=10&amp;bgcolor=Orange&amp;ssc=false&amp;pophcol=1"></script>
                 <p style="float: right;">
                     <img src="/cn/images/teacher/teacher-eye.png" alt="阅读图标">
                     <span>阅读 <?php echo $article['view'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                     <img src="/cn/images/teacher/teacher-pinglun.png" alt="评论图标">
                     <span>评论 <?php echo $article['comments'];?></span>
                 </p>
             </div>
             <div class="art-zaiyao">
                 摘要：<?php echo $article['introduce'];?>
             </div>
             <div class="more-fonts">
                 <?php echo $article['content'];?>
             </div>
             <div class="appreciate">
                  <div class="packet" onclick="ds_ld(this)">
                      <img src="/cn/images/teacher/teacher-hongbao.png" alt="图标"/>
                      赞赏
                  </div>
                 <p>已有<?php echo $reward;?>人赞赏</p>
             </div>
         </div>
         <div class="teacher-evaluation" id="pingjia">
             <div class="d-common-title">
                 <h4>
                     <img src="/cn/images/teacher/teacher-webPJ.png" alt="图标"/>
                     <span>网友评论</span>
                 </h4>
                 <a href="javascript:void(0);" style="cursor: default;">评论数：<span id="commitNum"><?php echo $article['comments'];?></span></a>
             </div>
             <div class="pingjia-con">
                 <ul id="new_ul">
                     <?php foreach($artcomments as $k => $v){?>
                     <li class="flex-container-left">
                         <div class="pj-left">
                             <div class="l-user">
                                 <img src="<?php if($v['userimage']) echo $v['userimage']; else echo '/cn/images/teacher/details_defaultImg.png' ?>" alt="用户头像"/>
                             </div>
                             <p class="ellipsis"><?php echo $v['usernickname']; ?></p>
                         </div>
                         <div class="pj-right">
                             <p>
                                 <?php echo $v['comment']; ?>
                             </p>
                             <span><b id="num"><?php echo $v['key']; ?>楼</b>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $v['createTime']; ?> </span>
                         </div>
                         <div class="clearfixd"></div>
                     </li>
                     <?php }?>
                 </ul>
             </div>
             <div class="pingjia-text">
                 <div class="pj-left">
                     <div class="l-user">
                         <img src="<?php if(isset($user['image']) && $user['image']) echo $user['image']; else echo '/cn/images/teacher/details_defaultImg.png';?>" alt="用户头像"/>
                     </div>
                     <p class="ellipsis"><?php if(isset($user['nickname']) && $user['nickname']) echo $user['nickname']; else echo '游客';?></p>
                 </div>
                 <div class="text-right">
                     <textarea placeholder="我来说两句"></textarea>
                     <input type="button" value="提&nbsp;&nbsp;交" onclick="comment('',<?php echo $article['id'];?>,this,'true')"/>
                 </div>
                 <div class="clearfixd"></div>
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
                     if($vv['hot'] == 1){
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
</script>
