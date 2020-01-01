<?php $userData = Yii::$app->session->get('userData') ?>
<?php $level = Yii::$app->session->get('level') ?>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/gre_userCenter/gre_userCenter.css">
<link rel="stylesheet" href="/cn/css/font-awesome.css">
<link rel="stylesheet" href="/cn/css/gre_userCenter/iconfont.css">
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1454030_tocidpns03.css">
<script src="/cn/js/jquery-1.12.2.min.js"></script>
<script src="/cn/js/jquery.SuperSlide.2.1.3.js"></script>
<!--模考-->
<link rel="stylesheet" href="/cn/css/mold_records.css">
<link rel="stylesheet" href="/cn/css/foundation-datepicker.min.css">
<link rel="stylesheet" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<script src="/cn/js/foundation-datepicker.min.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div id="fixedTc" class="tc"></div>
<section id="userCenter">
    <div class="w12">
        <!--个人中心-公共头部-->
        <?php use app\commands\front\UserWidget; ?>
        <?php UserWidget::begin(); ?>
        <?php UserWidget::end(); ?>
        <div class="w12 clearfix">
            <!--个人中心-左边-->
            <div class="centerLeft fl bg_f">
                <ul class="centerLeft_nav">
                    <li>
                        <a href="/user/se-0/so-0/l-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon_tit iconfont icon-shoucang"></i>
                                </div>
                                <span class="link_name">收藏题目</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/plan.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon-jihua iconfont icon_tit"></i>
                                </div>
                                <span class="link_name">学习计划</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/se-0/so-0/l-0/st-0/t-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-jilu"></i>
                                </div>
                                <span class="link_name">做题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/se-0/so-0/l-0/t-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 22px;" class="icon_tit iconfont icon-cuoti"></i>
                                </div>
                                <span class="link_name">错题记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li class="on">
                        <a href="/mock_record.html">
                            <div>
                                <div class="inm icon_tit_wrap"><i class="icon_tit iconfont">&#xe660;</i></div>
                                <span class="link_name">模考记录</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/t-0/s-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 19px;" class="icon_tit iconfont icon-danci"></i>
                                </div>
                                <span class="link_name">生词本</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/order-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i class="icon_tit iconfont icon-yigoumai"></i>
                                </div>
                                <span class="link_name">已购课程</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/lei-0.html">
                            <div>
                                <div class="inm icon_tit_wrap">
                                    <i style="font-size: 20px;" class="icon_tit iconfont icon-dou-copy"></i>
                                </div>
                                <span class="link_name">雷豆管理</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/invitation.html">
                            <div>
                                <div class="inm icon_tit_wrap"><i class="icon_tit iconfont icon-yaoqing"></i></div>
                                <span class="link_name">邀请好友</span>
                                <i class="icon_angle iconfont icon-duobianxingkaobei"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="centerRight fr bg_f">
                <div class="record-con">
                        <div class="record_purple">
                            <ul>
                                <li class="<?php if($time == 0) echo 'on';?>"><a href="/mock_record/time-0.html">全部</a></li>
                                <li class="<?php if($time == 1) echo 'on';?>"><a href="/mock_record/time-1.html">今天</a></li>
                                <li class="<?php if($time == 2) echo 'on';?>"><a href="/mock_record/time-2.html">昨天</a></li>
                                <li class="<?php if($time == 3) echo 'on';?>"><a href="/mock_record/time-3.html">本周</a></li>
                                <li class="<?php if($time == 4) echo 'on';?>"><a href="/mock_record/time-4.html">上周</a></li>
                                <li class="<?php if($time == 5) echo 'on';?>"><a href="/mock_record/time-5.html">本月</a></li>
                                <li class="<?php if($time == 6) echo 'on';?>"><a href="/mock_record/time-6.html">上月</a></li>
                            </ul>
                            <div class="right_rili">
                                <span>选择时间</span>
                                <img src="/cn/images/mold-riliicon01.png" alt="图标" class="image01"/>
                                <input type="text" class="span2 bg01" value="<?php if(isset($ff) && $ff) echo $ff;?>" id="dpd1"/>
                                <b>至</b>
                                <img src="/cn/images/mold-riliicon02.png" alt="图标" class="image02"/>
                                <input type="text" class="span2 bg02" value="<?php if(isset($ee) && $ee) echo $ee;?>" id="dpd2">
                                <input type="button" value="确定" class="btn" onclick="timeSaiX()"/>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="re_tishi">
                            <span>提示：</span>各位同学做过的所有已完成和中断的模考记录均会显示在这里，已完成的模考套题可直接查看模考结果，未完成中断的模考必须要重新模考才能看到完整模考结果哦~
                        </div>
                        <div class="record_list">
                            <ul>
                                <?php foreach($mockExam as $kk => $vv){
                                    ?>
                                <li>
                                    <h4>
                                        <a href="javascript:void(0);"><?php echo $vv['mockName'];if($vv['mockType'] == 1)echo '（语文）';elseif($vv['mockType'] == 2) echo '（数学）';else echo '（全套）';?></a>
                                        <input type="button" value="删除" class="pos default"
                                               data-link="/cn/user/delete-mock?mockExamId=<?php echo $vv['mockExamId'];?>" onclick="deleteMoldR(this)"/>
                                    </h4>
                                    <div class="re_bot_info">
                                        <div class="info_left">
                                            <p>
                                                <b><?php echo $vv['correct'];?>/<?php echo $vv['total'];?>题</b>
                                                <?php if($vv['status'] == 1){?>
                                                <b>耗时<?php echo $vv['times'];?></b>
                                                <b>正确率<?php echo $vv['correctRate'];?>%</b>
                                                <?php }?>
                                            </p>
                                            <span>
                                 开始时间：<?php echo $vv['firstTime'];?>
                            <br/>完成时间：<?php echo $vv['endTime'];?>
                        </span>
                                        </div>
                                        <div class="info_right">
                                            <div>
                                                <?php if($vv['status'] == 1){?>
                                                    <a href="javascript:void(0);">
                                                    <input type="button" value="重新模考" class="default"
                                                           data-link="/cn/user/again-mock?mockExamId=<?php echo $vv['mockExamId'];?>" onclick="moldReload(this)"/>
                                                    </a>
                                                    <a href="/mockResult/<?php echo $vv['mockExamId'];?>.html">
                                                        <input type="button" value="查看结果" class="default purple"/>
                                                    </a>
                                                <?php }else{?>
                                                    <a href="/cn/mock-exam/explain?mockExamId=<?php echo $vv['mockExamId'];?>&type=<?php echo $vv['mockType'];?>">
                                                        <input type="button" value="继续模考" class="default blue"/>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }?>
                            </ul>
                        </div>
                        <div class="record_page">
                            <ul>
                                <?php echo yii\widgets\LinkPager::widget([
                                        'pagination'=>$mockPage
                                ])?>
                            </ul>
                        </div>
                    </div>
                <script>
                    var nowTemp = new Date();
                    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                    var checkin = $('#dpd1').fdatepicker({
                        format: 'yyyy-mm-dd',
                        onRender: function (date) {
//            return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function (ev) {
                        if (ev.date.valueOf() > checkout.date.valueOf()) {
                            var newDate = new Date(ev.date)
                            newDate.setDate(newDate.getDate() + 1);
                            checkout.update(newDate);
                        }
                        checkin.hide();
                        $('#dpd2')[0].focus();
                    }).data('datepicker');
                    var checkout = $('#dpd2').fdatepicker({
                        format: 'yyyy-mm-dd',
                        onRender: function (date) {
//            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function (ev) {
                        checkout.hide();
                    }).data('datepicker');
                </script>
        </div>
    </div>
</section>
<script type="text/javascript">
    function deleteMoldR(o) {
        if(confirm("确定删除模考记录？")){
            window.location.href=$(o).attr("data-link");
        }
    }
    function moldReload(o) {
        if(confirm("是否重新模考？重新模考之后，之前的记录是会被清除的哦！")){
            window.location.href=$(o).attr("data-link");
        }
    }
    function timeSaiX() {
        var startTime=$("#dpd1").val();
        var endTime=$("#dpd2").val();
        if(!startTime && !endTime){
            alert("请至少选择一个时间");
            return false;
        }else{
            var dateS = new Date(startTime.replace(/-/g, '/'));
            var dateE = new Date(endTime.replace(/-/g, '/'));
            var time1 = dateS.getTime();
            var time2 = dateE.getTime();
            if(!time1){
                time1=0;
            }
            if(!time2){
                time2=0;
            }
            window.location.href="/mock_record/"+time1+"-"+time2+".html";
        }
    }
</script>
