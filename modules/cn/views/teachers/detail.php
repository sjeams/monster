<link rel="stylesheet" href="/cn/css/teacherZL.css?v=1"/>
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
                 <ul>
                     <?php foreach($students as $ks=>$vs){
                         ?>
                     <li>
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
                     </li>
                     <?php } ?>
                 </ul>
             </div>
         </div>
         <div class="teacher-evaluation" id="pingjia">
             <div class="d-common-title">
                 <h4>
                     <img src="/cn/images/teacher/teacher-pingjia.png" alt="图标"/>
                     <span>老师评价</span>
                 </h4>
                 <a href="javascript:void(0);" style="cursor: default;">评论数：<span id="commitNum"><?php echo $teacher['comments']; ?></span></a>
             </div>
             <div class="pingjia-con">
                 <ul id="new_ul">
                     <?php foreach($comments as $kc => $vc){
                         ?>
                         <li class="flex-container-left">
                             <div class="pj-left">
                                 <div class="l-user">
                                     <img src="<?php if(!empty($vc['userimage'])) echo $vc['userimage'];else echo '/cn/images/teacher/details_defaultImg.png';?>" alt="用户头像"/>
                                 </div>
                                 <p class="ellipsis"><?php echo $vc['nickname']; ?></p>
                             </div>
                             <div class="pj-right">
                                 <p>
                                     <?php echo $vc['comment']; ?>
                                 </p>
                                 <span><?php echo $vc['site']; ?>楼&nbsp;&nbsp;|&nbsp;&nbsp;  <?php echo $vc['createTime']; ?> </span>
                             </div>
                             <div class="clearfixd"></div>
                         </li>
                     <?php
                    }?>
                 </ul>

             </div>
             <div class="pingjia-text">
                 <div class="pj-left">
                     <div class="l-user">
                         <img src="<?php if( isset($user['image']) && $user['image']) echo $user['image']; else echo '/cn/images/teacher/details_defaultImg.png';?>" alt="用户头像"/>
                     </div>
                     <p class="ellipsis"><?php if(isset($user['nickname']) && $user['nickname']) echo $user['nickname']; else echo '游客';?></p>
                 </div>
                 <div class="text-right">
                     <textarea placeholder="我来说两句"></textarea>
                     <input type="button" value="提&nbsp;&nbsp;交" onclick="comment('<?php echo $teacher['id'];?>','',this,'true')"/>
                 </div>
                 <div class="clearfixd"></div>
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
                     ?>
                     <li>
                         <div class="ha-left">
                             <a href="/teacher_article/<?php echo $sv['id'];?>.html">
                                 <img src="<?php echo $sv['image']?>" alt="图标"/>
                             </a>
                         </div>
                         <div class="ha-right">
                             <h4 class="ellipsis-2">
                                 <a href="/teacher_article/<?php echo $sv['id'];?>.html"><?php echo $sv['title']; ?></a>
                             </h4>
                             <p>
                                 <span><?php echo $sv['createTime']; ?></span>
                                 <b>阅读：<?php echo $sv['view']; ?></b>
                             </p>
                         </div>
                         <div class="clearfixd"></div>
                     </li>
                     <?php
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
