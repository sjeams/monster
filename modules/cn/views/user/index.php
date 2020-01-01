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
                <!--个人设置-->
                <div class="collection_wrap" style="min-height: 468px;">
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">个人资料</div>
                                <div class="hadInfo inm"><?php echo $userData['userName'] ?></div>
                                <input class="saveData inm" onclick="upImage()" type="button" value="上传头像">
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">昵称:</span>
                                <input class="edtInt nickname" type="text" value="<?php echo $userData['nickname'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">电话:</span>
                                <input class="edtInt phone changePhone" type="text"
                                       value="<?php echo $userData['phone'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">验证码:</span>
                                <input class="edtInt code changePhoneCode" type="text" value="">
                                <input class="sendCode" type="button" onclick="clickDX(this,60,1);" value="获取验证码">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">学校:</span>
                                <input class="edtInt school" type="text" value="<?php echo $userData['school'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">专业:</span>
                                <input class="edtInt major" type="text" value="<?php echo $userData['major'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">年级:</span>
                                <input class="edtInt grade" type="text" value="<?php echo $userData['grade'] ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserInfo()" type="button" value="保存">
                            </div>
                        </div>
                    </div>
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">登录邮箱</div>
                                <div class="hadInfo navEmail inm"><?php echo !empty($userData['email']) ? $userData['email'] : '未绑定邮箱' ?></div>
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">当前邮箱:</span>
                                <input class="edtInt navEmail" type="text" disabled
                                       value="<?php echo !empty($userData['email']) ? $userData['email'] : '未绑定邮箱' ?>">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">新邮箱:</span>
                                <input class="edtInt email changeEmail" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">验证码:</span>
                                <input class="edtInt code changeEmailCode" type="text" value="">
                                <input class="sendCode" type="button" onclick="clickDX(this,60,2);" value="获取验证码">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserEmail()" type="button" value="保存">
                            </div>
                        </div>

                    </div>
                    <div class="setItem">
                        <div class="flex-container setBox">
                            <div class="setTit_wrap">
                                <div class="setTit inm">密码</div>
                                <div class="hadInfo inm">************</div>
                            </div>
                            <div class="rightBtn" onclick="slideBox(this)">
                                <span>修改</span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </div>
                        <div class="edtInfo_wrap">
                            <div class="edtRow">
                                <span class="edtName inm">旧密码:</span>
                                <input class="edtInt oldPassword" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">新密码:</span>
                                <input class="edtInt newPassword" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm">确认密码:</span>
                                <input class="edtInt newPassword2" type="text" value="">
                                <span class="ediHint">昵称不能为空！</span>
                            </div>
                            <div class="edtRow">
                                <span class="edtName inm"></span>
                                <input class="saveData" onclick="changeUserPass()" type="button" value="保存">
                            </div>
                        </div>
                    </div>
                </div>
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
            window.location.href="/user/"+time1+"-"+time2+".html?center=8";
        }
    }
</script>
