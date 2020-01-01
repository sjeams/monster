
<link rel="stylesheet" href="/cn/css/teacherZL.css?v=1.1"/>
<script type="text/javascript" src="/cn/js/teacherZL.js"></script>
<div class="teacher-banner">
    <a href="/teacher.html">
        <img src="/cn/images/teacher/teacher-banner.png" alt="banner图"/>
    </a>
</div>
<div class="teacher-box">
     <div class="teacher-left">
          <div class="t-index-box">
              <div class="t-index-hd">
                  <ul>
                      <li data-cat="">全部</li>
                      <li data-cat="">经验技巧</li>
                      <li data-cat="">要点解读</li>
                  </ul>
              </div>
              <div class="t-index-bd">
                  <!--这是对应上面li的一个ul-->

                  <ul>
                      <li>
                          <div class="content-list">
                              <ul>
                                <?php
                                    foreach($contentall as $key=>$value){
                                ?>

                                  <li>
                                      <div class="cl-left">
                                          <a href="/teacher_article/<?php echo $value['id']; ?>.html">
                                              <img src="<?php echo $value['image'] ?>" alt="图片"/>
                                          </a>
                                      </div>
                                      <div class="cl-right">
                                          <h4 class="ellipsis"><a href="/teacher_article/<?php echo $value['id']; ?>.html"><?php echo $value['title'] ?></a></h4>
                                          <p class="ellipsis"><?php echo $value['introduce'] ?></p>
                                          <!--                                            新版-->
                                             <div class="consult_view clearfix">
                                                 <div class="fl">
                                                     <div class="xiaobian_tx">
                                                         <a href="/teacher/<?php echo $value['teacherId']; ?>.html">
                                                              <img src="<?php echo $value['teacherimage']; ?>" alt="老师头像"/>
                                                         </a>
                                                      </div>
                                                     <span class="xiaob_name">
                                                         <a href="/teacher/<?php echo $value['teacherId']; ?>.html">
                                                     <?php echo $value['teachername']; ?>
                                                         </a>
                                                     </span>
                                                     <span><?php echo $value['createTime'];?></span>
                                                     <span class="view_line">|</span>
                                                     <span>阅读（<?php echo $value['view'];?>）</span>
                                                  </div>
                                                  <span class="fr an-inImg">
                                                      <a href="/teacher_article/<?php echo $value['id']; ?>.html">
                                                             <img src="/cn/images/common-plicon.png" alt="评论图标"/>
                                                          评论 <?php echo $value['comments']; ?></a>
                                                  </span>
                                                  <span class="fr an-inImg" style="margin-right: 10px;" onclick="indexZan(this,'',<?php echo $value['id']; ?>)">
                                                        <a href="javascript:void(0);">
                                                            <img src="/cn/images/common-zan.png" alt="评论图标"/>
                                                              点赞 <b><?php echo $value['fine']; ?></b>
                                                        </a>
                                                 </span>
                                            </div>
<!--                                                  旧版-->
                                       <!--<div class="cl-r-teacher flex-container-left">
                                             <div class="small-thumb">
                                                  <a href="/teacher/<?php echo $value['teacherId']; ?>.html">
                                                     <img src="<?php echo $value['teacherimage']; ?>" alt="老师头像"/>
                                                 </a>
                                             </div>
                                            <p>
                                                 <a href="/teacher/<?php echo $value['teacherId']; ?>.html"><?php echo $value['teachername']; ?></a>
                                             </p>
                                             <img src="/cn/images/teacher/teacher-shuqian.png" alt="图标"/>
                                              <span>
                                                 <?php if ($value['type'] == 1)
                                                     echo "经验技巧";
                                                 else
                                                      echo "要点解读";
                                                ?>
                                             </span>
                                             <div class="clearfixd"></div>
                                          </div>
                                          <div class="cl-r-controls">
                                              <p>
                                                 <img src="/cn/images/teacher/teacher-eye.png" alt="阅读图标"/>
                                                <span>阅读 <?php echo $value['view']; ?></span>
                                              </p>
                                             <p style="cursor: pointer;"
                                                 onclick="indexZan(this,'',<?php echo $value['id']; ?>)" class="zanBtn">
                                                 <img src="/cn/images/teacher/teacher-dianzan.png" alt="点赞图标"/>
                                                  <span>点赞 <b><?php echo $value['fine']; ?></b></span>
                                             </p>
                                             <p>
                                                 <img src="/cn/images/teacher/teacher-pinglun.png" alt="评论图标"/>
                                                 <span>评论 <?php echo $value['comments']; ?></span>
                                              </p>
                                             <p><?php echo $value['createTime']; ?></p>
                                         </div>-->

                                      </div>
                                      <div class="clearfixd"></div>
                                  </li>
                                    <?php }?>
                              </ul>
                          </div>
                          <!--分页-->
                          <div class="content-page flex-container-center">
                              <ul>
                                  <?php
                                  echo \yii\widgets\LinkPager::widget([
                                      'pagination' => $pageall,
                                  ])?>
                              </ul>
                          </div>
                      </li>
                  </ul>

                <?php foreach($catecontent as $kk => $vv){
                    ?>
                  <ul>
                      <li>
                          <div class="content-list">
                              <ul>
                                  <?php foreach($vv as $kc => $vc){
                                  ?>
                                  <li>
                                      <div class="cl-left">
                                          <a href="/teacher_article/<?php echo $vc['id']; ?>.html">
                                              <img src="<?php echo $vc['image'];?>" alt="图片1"/>
                                          </a>
                                      </div>
                                      <div class="cl-right">
                                          <h4 class="ellipsis"><a href="/teacher_article/<?php echo $vc['id']; ?>.html"><?php echo $vc['title'];?></a></h4>
                                          <p class="ellipsis"><?php echo $vc['introduce'];?></p>
                                          <!--                                            新版-->
                                          <div class="consult_view clearfix">
                                              <div class="fl">
                                                  <div class="xiaobian_tx">
                                                      <a href="/teacher/<?php echo $vc['teacherId']; ?>.html">
                                                          <img src="<?php echo $vc['teacherimage']; ?>" alt="老师头像"/>
                                                      </a>
                                                  </div>
                                                  <span class="xiaob_name">
                                                         <a href="/teacher/<?php echo $vc['teacherId']; ?>.html">
                                                     <?php echo $vc['teachername']; ?>
                                                         </a>
                                                     </span>
                                                  <span><?php echo $vc['createTime'];?></span>
                                                  <span class="view_line">|</span>
                                                  <span>阅读（110）</span>
                                              </div>
                                              <span class="fr an-inImg">
                                                      <a href="/teacher_article/<?php echo $vc['id']; ?>.html">
                                                             <img src="/cn/images/common-plicon.png" alt="评论图标"/>
                                                          评论 <?php echo $vc['comments']; ?></a>
                                                  </span>
                                              <span class="fr an-inImg" style="margin-right: 10px;" onclick="indexZan(this,'',<?php echo $vc['id']; ?>)">
                                                        <a href="javascript:void(0);">
                                                            <img src="/cn/images/common-zan.png" alt="评论图标"/>
                                                              点赞 <b><?php echo $vc['fine']; ?></b>
                                                        </a>
                                                 </span>
                                          </div>
                                          <!--<div class="cl-r-teacher flex-container-left">
                                              <div class="small-thumb">
                                                  <a href="/teacher/<?php echo $vc['teacherId'];?>.html">
                                                      <img src="<?php echo $vc['teacherimage'];?>" alt="老师头像"/>
                                                  </a>
                                              </div>
                                              <p><a href="/teacher/<?php echo $vc['teacherId']; ?>.html"><?php echo $vc['teachername'];?></a></p>
                                              <img src="/cn/images/teacher/teacher-shuqian.png" alt="图标"/>
                                              <span>
                                                  <?php if ($vc['type'] == 1)
                                                      echo "经验技巧";
                                                  else
                                                      echo "要点解读";
                                                  ?></span>
                                              <div class="clearfixd"></div>
                                          </div>
                                          <div class="cl-r-controls">
                                              <p>
                                                  <img src="/cn/images/teacher/teacher-eye.png" alt="阅读图标"/>
                                                  <span>阅读 <?php echo $vc['view'];?></span>
                                              </p>
                                              <p style="cursor: pointer;" onclick="indexZan(this, <?php echo $vc['id'];?>,1)" class="zanBtn">
                                                  <img src="/cn/images/teacher/teacher-dianzan.png" alt="点赞图标"/>
                                                  <span>点赞 <b><?php echo $vc['fine'];?></b></span>
                                              </p>
                                             <p>
                                                 <img src="/cn/images/teacher/teacher-pinglun.png" alt="评论图标"/>
                                                 <span>评论 <?php echo $vc['comments'];?></span>
                                             </p>
                                              <p><?php echo $vc['createTime'];?></p>
                                          </div>-->
                                      </div>
                                      <div class="clearfixd"></div>
                                  </li>
                                  <?php };?>
                              </ul>
                          </div>
                          <!--分页-->
                          <div class="content-page flex-container-center">
                              <ul>
                                  <?php
                                  echo \yii\widgets\LinkPager::widget([
                                      'pagination' => $pages[$kk],
                                  ])?>
                              </ul>
                          </div>
                      </li>
                  </ul>
                <?php }?>
                  <!--这是对应上面li的第二个ul-->
              </div>
          </div>
         <script type="text/javascript">
             jQuery(".t-index-box").slide({titCell:".t-index-hd li",mainCell:".t-index-bd",trigger:"mouseover",nextCell:"nextT",prevCell:"prevT"});
         </script>
     </div>
     <div class="teacher-right">
         <div class="famousTeacher">
             <h4 class="common-h4">名师在线
                 <a href="/cn/teachers/index">More</a>
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

