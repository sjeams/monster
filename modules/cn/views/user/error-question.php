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
                    <li class="on">
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
                    <li>
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
                <!--错题记录-->
                <div class="collection_wrap">
                    <div class="tagRow_content">
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目单项：</div>
                            <div class="tagList">
                                <a href="/user/se-0/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                                <a href="/user/se-1/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 1){ ?>class="on" <?php } ?>>填空</a>
                                <a href="/user/se-2/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 2){ ?>class="on" <?php } ?>>阅读</a>
                                <a href="/user/se-3/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (isset($_GET['sectionId']) && $_GET['sectionId'] == 3){ ?>class="on" <?php } ?>>数学</a>
                            </div>
                        </div>
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目来源：</div>
                            <div class="tagList">
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-0/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                                <?php
                                foreach ($sources as $v) {
                                    ?>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo $v['id'] ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                       <?php if (isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['alias'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tagRow clearfix">
                            <div class="tagTit">题目难度：</div>
                            <div class="tagList">
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-0/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                   <?php if (empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                                <?php
                                foreach ($levels as $v) {
                                    ?>
                                    <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo $v['id'] ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html"
                                       <?php if (isset($_GET['levelId']) && $_GET['levelId'] == $v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tagRow clearfix">
                            <div class="tagTit">做题时间：</div>
                            <div class="tagList">
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-0.html"
                                   <?php if (empty($_GET['time'])){ ?>class="on" <?php } ?>>全部</a>
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-day.html"
                                   <?php if (isset($_GET['time']) && $_GET['time'] == 'day'){ ?>class="on" <?php } ?>>今日</a>
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-week.html"
                                   <?php if (isset($_GET['time']) && $_GET['time'] == 'week'){ ?>class="on" <?php } ?>>一周</a>
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month.html"
                                   <?php if (isset($_GET['time']) && $_GET['time'] == 'month'){ ?>class="on" <?php } ?>
                                ">一个月</a>
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month1.html"
                                   <?php if (isset($_GET['time']) && $_GET['time'] == 'month1'){ ?>class="on" <?php } ?>>三个月</a>
                                <a href="/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-month2.html"
                                   <?php if (isset($_GET['time']) && $_GET['time'] == 'month2'){ ?>class="on" <?php } ?>>三个月以上</a>
                            </div>
                        </div>
                        <!--                            <div class="errorTest_wrap">-->
                        <!--                                <a class="inm errorTest_btn" href="#" target="_blank">-->
                        <!--                                    <img src="/cn/images/gre_testCenter/book_1.png" alt="">-->
                        <!--                                    <span class="inm" style="padding-left: 5px;">错题练习</span>-->
                        <!--                                </a>-->
                        <!--                                <span class="inm errorTest_hint">（点击进入错题库，集中进行错题练习）</span>-->
                        <!--                            </div>-->
                    </div>
                    <div>
                        <dl class="problem_list">
                            <?php
                            foreach ($errorRecord['data'] as $v) {
                                ?>
                                <dt class="flex-container">
                                    <div class="collection_text">
                                        <div class="pn_wrap clearfix">
                                            <a class="ellipsis fl problem_name"
                                               href="/question/<?php echo $v['id'] ?>.html"
                                               target="_blank">【<?php echo $v['section'] ?> <?php echo $v['source']['alias'] ?>
                                                -<?php echo $v['id'] ?>】</a>

                                            <div class="problem_data fr clearfix">
                                                <div class="pd_row"><img src="/cn/images/searchproblem/user_s1.png"
                                                                         alt="">
                                                    <span><?php echo $v['doNum'] ?>人已做</span></div>
                                                <div class="pd_row"><img src="/cn/images/searchproblem/zx_1.png"
                                                                         alt="">
                                                    <span> <?php echo $v['correctRate'] ?>%正确率</span></div>
                                            </div>
                                        </div>
                                        <div class="ellipsis-2 problem_de"><?php echo $v['stem'] ?></div>

                                        <div class="testOver_data">
                                            <span>我的答案：<strong
                                                        class="str_pink"><?php echo $v['answer']; ?></strong></span>
                                            <span>正确答案：<strong
                                                        class="str_green"><?php echo $v['qanswer']; ?></strong></span>
                                            <span>用时<?php echo $v['useTime'] ?>s</span>
                                        </div>
                                    </div>
                                    <div class="cancel_collection">
                                        <?php
                                        if ($v['collection'] == 1) {
                                            ?>
                                            <a class="cancel_btn cancel_sc"
                                               onclick="collect(<?php echo $v['id'] ?>,this)"
                                               href="javascript:void (0);">取消收藏</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="cancel_btn add_sc"
                                               onclick="collect(<?php echo $v['id'] ?>,this)"
                                               href="javascript:void (0);">添加收藏</a>
                                            <?php
                                        }
                                        ?>
                                        <a class="cancel_btn" href="/question/<?php echo $v['id'] ?>.html">查看详情</a>
                                    </div>
                                </dt>
                                <?php
                            }
                            ?>
                        </dl>
                        <div class="pageSize tm" style="padding:40px 0;">
                            <ul>
                                <?php echo $errorRecord['pageStr'] ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    //    收藏题目
                    function collect(questionId, o) {
                        $.ajax({
                            url: "/cn/api/user-question-collection",
                            dataType: "json",
                            data: {
                                questionId: questionId, //问题ID
                            },
                            type: "POST",
                            success: function (req) {
                                $('#fixedTc').html(req.message).show();
                                var time = setTimeout(function () {
                                    $('#fixedTc').hide();
                                }, 3000);
                                location.reload();
                            }
                        })
                    }

                    $(document).on('click', '.iPage', function () {
                        $(this).addClass('on').siblings().removeClass('on');

                        var page = $('.pageSize li.on').html();
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html?page=" + page;
                    });
                    $(document).on('click', '.prev', function () {

                        var page = $('.pageSize li.on').html();
                        if (page == 1) {
                            return false;
                        } else {
                            page = parseInt(page) - 1;
                        }
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html?page=" + page;
                    });
                    $(document).on('click', '.next', function () {

                        var page = $('.pageSize li.on').html();
                        if (page == 7) {
                            return false;
                        } else {
                            page = parseInt(page) + 1;
                        }
                        location.href = "/user/se-<?php echo isset($_GET['sectionId']) ? $_GET['sectionId'] : 0 ?>/so-<?php echo isset($_GET['sourceId']) ? $_GET['sourceId'] : 0 ?>/l-<?php echo isset($_GET['levelId']) ? $_GET['levelId'] : 0 ?>/t-<?php echo isset($_GET['time']) ? $_GET['time'] : 0 ?>.html?page=" + page;
                    })
                </script>
                <script>
                    //实例化编辑器
                    var o_ueditorupload = UE.getEditor('j_ueditorupload',
                        {
                            autoHeightEnabled: false
                        });
                    o_ueditorupload.ready(function () {

                        o_ueditorupload.hide();//隐藏编辑器

                        //监听图片上传
                        o_ueditorupload.addListener('beforeInsertImage', function (t, arg) {
                            $.post('/cn/api/up-image', {image: arg[0].src}, function (re) {
                                if (re.code == 1) {
                                    $('#headImage').attr('src', arg[0].src);
                                    $('.whiteDiv img').attr('src', arg[0].src);
//                                $('.navImage').attr('src',arg[0].src);
                                } else {
                                    alert(re.message)
                                }
                            }, 'json')

                        });

                        /* 文件上传监听
                         * 需要在ueditor.all.min.js文件中找到
                         * d.execCommand("insertHtml",l)
                         * 之后插入d.fireEvent('afterUpfile',b)
                         */
//                        o_ueditorupload.addListener('afterUpfile', function (t, arg)
//                        {
//                            $('.imageFile').val(arg[0].url);
//                        });
                    });

                    //                    弹出图片上传的对话框
                    function upImage() {
                        var myImage = o_ueditorupload.getDialog("insertimage");
                        myImage.open();
                    }

                    //                弹出文件上传的对话框
                    //                    function upFiles()
                    //                    {
                    //                        var myFiles = o_ueditorupload.getDialog("attachment");
                    //                        myFiles.open();
                    //                    }

                </script>
                <script type="text/plain" id="j_ueditorupload"></script>
                <script>
                    function slideBox(o) {
                        var _this = $(o);
                        if (_this.hasClass('on')) {
                            _this.removeClass('on');
                            _this.find('span').html('修改');
                            _this.find('i').removeClass('icon-angle-up').addClass('icon-angle-down');
                            _this.parents('.setItem').find('.edtInfo_wrap').slideUp();

                        } else {
                            _this.addClass('on');
                            _this.find('span').html('收起');
                            _this.find('i').removeClass('icon-angle-down').addClass('icon-angle-up');
                            _this.parents('.setItem').find('.edtInfo_wrap').slideDown();
                        }
                    }

                    //倒计时函数
                    function clickDX(e, timeN, str) {
                        var phoneReg = /^[1][3,4,5,7,8][0-9]{9}$/;
                        var emailReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
                        var _that = $(e);
                        var defalutVal = $(e).val();
                        var timeNum = timeN;
                        //$(e).removeAttr("onclick");
                        if (str == 1) {
                            var phone = $('.phone:input').val();
                            if (phone == "") {
                                alert('手机号格式不正确(不能小于11位)!');
                                return false;
                            }
                            if (!phoneReg.test(phone)) {
                                alert('手机号格式不正确(不能小于11位)!');
                                return false;
                            } else {
                                $.post('/cn/api/phone-code', {phoneNum: phone}, function (re) {
                                    alert(re.message);
                                }, 'json')
                            }

                        } else {
                            var mail = $('.email:input').val();
                            if (mail == "") {
                                alert('请输入正确的邮箱格式');
                                return false;
                            }
                            if (!emailReg.test(mail)) {
                                return false;
                            } else {
                                $.post('/cn/api/send-mail', {email: mail}, function (re) {
                                    alert(re.message);
                                }, 'json')
                            }

                        }
                        $(e).attr("disabled", true);
                        _that.unbind("click").val(timeNum + "秒后重发");
                        var timer = setInterval(function () {
                            _that.val(timeNum + "秒后重发");
                            timeNum--;
                            if (timeNum < 0) {
                                clearInterval(timer);
                                $(e).removeAttr("disabled");
                                _that.val(defalutVal);
                                if (str == 1) {     //1表示手机短信验证
                                    _that.bind("click", e, phoneCode);
                                }

                            }
                        }, 1000);
                    }

                    /**
                     * 修改用户信息
                     * @returns {boolean}
                     */
                    function changeUserInfo() {
                        var nickname = $('.nickname').val();
                        if (nickname == '') {
                            alert('请输入昵称');
                            return false;
                        }
                        var phone = $('.changePhone').val();
                        var phoneCode = $('.changePhoneCode').val();
                        var school = $('.school').val();
                        var major = $('.major').val();
                        var grade = $('.grade').val();
                        $.post('/cn/api/change-user-info', {
                            nickname: nickname,
                            phone: phone,
                            phoneCode: phoneCode,
                            school: school,
                            major: major,
                            grade: grade
                        }, function (re) {
                            if (re.code == 1) {
                                $('.navNickname').html(nickname);
                            }
                            alert(re.message);
                        }, 'json')
                    }

                    /**
                     * 修改用户邮箱
                     * @returns {boolean}
                     */
                    function changeUserEmail() {
                        var email = $('.changeEmail').val();
                        if (email == '') {
                            alert('请输入邮箱');
                            return false;
                        }
                        var emailCode = $('.changeEmailCode').val();
                        if (emailCode == '') {
                            alert('请输入邮箱验证码');
                            return false;
                        }
                        $.post('/cn/api/change-user-email', {email: email, emailCode: emailCode}, function (re) {
                            if (re.code == 1) {
                                $('.navEmail').html(email);
                            }
                            alert(re.message);
                        }, 'json')
                    }

                    /**
                     * 修改用户密码
                     * @returns {boolean}
                     */
                    function changeUserPass() {
                        var oldPassword = $('.oldPassword').val();
                        if (oldPassword == '') {
                            alert('请输入当前密码');
                            return false;
                        }
                        var newPassword = $('.newPassword').val();
                        var newPassword2 = $('.newPassword2').val();
                        if (newPassword == '' || newPassword2 == '') {
                            alert('请输入新密码');
                            return false;
                        }
                        if (newPassword != newPassword2) {
                            alert('两次新密码不一致');
                            return false;
                        }
                        $.post('/cn/api/change-user-pass', {
                            oldPassword: oldPassword,
                            newPassword: newPassword
                        }, function (re) {
                            alert(re.message);
                        }, 'json')
                    }

                </script>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function deleteMoldR(o) {
        if (confirm("确定删除模考记录？")) {
            window.location.href = $(o).attr("data-link");
        }
    }

    function moldReload(o) {
        if (confirm("是否重新模考？重新模考之后，之前的记录是会被清除的哦！")) {
            window.location.href = $(o).attr("data-link");
        }
    }

    function timeSaiX() {
        var startTime = $("#dpd1").val();
        var endTime = $("#dpd2").val();
        if (!startTime && !endTime) {
            alert("请至少选择一个时间");
            return false;
        } else {
            var dateS = new Date(startTime.replace(/-/g, '/'));
            var dateE = new Date(endTime.replace(/-/g, '/'));
            var time1 = dateS.getTime();
            var time2 = dateE.getTime();
            if (!time1) {
                time1 = 0;
            }
            if (!time2) {
                time2 = 0;
            }
            window.location.href = "/user/" + time1 + "-" + time2 + ".html?center=8";
        }
    }
</script>
