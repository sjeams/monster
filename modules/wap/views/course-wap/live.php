<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/9
 * Time: 16:47
 */

?>
<!doctype html>
<html xmlns:gs="http://www.gensee.com/ec">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title>直播</title>
    <link href="/cn/wapvideo/css/mobile_live.css?t=2" rel="stylesheet" type="text/css">
    <link href="/cn/wapvideo/css/audio.css" rel="stylesheet" type="text/css">
    <link href="/cn/wapvideo/css/live_audio.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="webPlayer" class="web">
    <div class="page-title">
        <div class="go-back">
            <img src="/cn/wapvideo/images/video_left.png">
        </div>
        <div class="title-text">{x2;$liveDetails['title']}</div>
        <div class="close-teacher">关闭头像</div>
    </div>
    <div id="topHalf">
        <input type="hidden" id="username" value="{x2;$nickname}"/>
        <input type="hidden" id="sdkID" value="{x2;$live_token['LIVESDKID']}">
        <input type="hidden" id="sdkpwd" value="{x2;$live_token['pwd_students']}">
        <input type="hidden" id="orderid" value="{x2;$order['order_id']}">
        <!--老师头像视频-->
        <div class="gmat-live-teacher">
            <div id="video-box" class="video-container">
                <!--插入Video Widget -->
                <gs:video-live id="videoComponent" site="bjsy.gensee.com" ctx="training" ownerid="{x2;$live_token['LIVESDKID']}" uid="{x2;$userinfo['uid']}" uname="{x2;$order['consignee']}" authcode="{x2;$live_token['pwd_students']}" bar="false" gsver="1" />
            </div>
        </div>
        <!--ppt教案视频-->
        <div class="gmat-live-doc">
            <div id="doc-box" class="document-container">
                <!--插入Doc Widget-->
                <gs:doc id="docComponent" site="bjsy.gensee.com" ctx="training" ownerid="{x2;$live_token['LIVESDKID']}" gsver="1"  fullscreen="true"/>
            </div>
        </div>
        <!--状态栏-->
        <div class="gmat-live-status">
            <div class="tool_area status_bar" id="toolArea">
                <p id="play_status">未开始</p>
                <a href="javascript:void(0);" id="wifi_a"></a>
                <!--视频(全屏/缩小)-->
                <a class="video_scaling" id="videoScaling"></a>
            </div>
        </div>
    </div>
    <div id="chatQaBox" class="section-bottom">
        <div class="tabs border-box">
            <ul class="display-box">
                <li class="flex onchat">
                    <a>
                        <span>发言区</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="slider-container">
            <!-- 聊天区域 -->
            <div class="chat-container slider-box">
                <div class="slider-bd chat-bd allow-roll">
                    <ul id="chat_body" class="msg-list">

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 聊天输入buttom -->
    <div class="slider-ft" id="textarea-box">
        <div class="display-box chat_input_area">
            <div class="chat-edit-area flex border-box">
                <div id="chat-area" class="chat-edit allow-roll" contenteditable="true"></div>
                <a id="emotion_a" class="btn-phiz">
                    <i></i>
                </a>
            </div>
            <button id="chat_btn" class="submit-btn" type="button">
                发送
            </button>
            <div id="emotion_list" class="phiz-box">
                <ul class="phiz-list">
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.smile.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.goodbye.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.laugh.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.cry.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.angerly.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.nod.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.lh.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.question.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/emotion.bs.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/rose.up.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/rose.down.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/chat.gift.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.quickly.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.slowly.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.agreed.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.against.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.applaud.png" /></a></li>
                    <li><a href="javascript:;"><img src="/cn/wapvideo/images/emotion/feedback.think.png" /></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--优选网络-->
    <div id="net_box" class="net_box">
        <div class="call_the_roll display-box">
            <span class="flex">优选网络</span>
            <a id="net_close">
                <i></i>
            </a>
        </div>
        <div class="net_list">
            <ul class="border-box allow-roll" id="net_list">
                <li class="on"><em><i></i></em>电信</li>
                <li><em><i></i></em>电信</li>
            </ul>
            <a href="javascript:void(0);" class="net_submit" id="net_btn">确定</a>
        </div>
    </div>
    <!--签到-->
    <div id="rollcall-box" class="sign_in">
        <div class="call_the_roll display-box">
            <span class="flex" id="rollcall_title">点名开始咯</span>
            <a id="rollcall_close">
                <i></i>
            </a>
        </div>
        <div id="rollcall_body">
            <div class="call_the_roll_c">
                <div class="time_item">
                    <strong class="minute_show">00</strong>
                    <strong>:</strong>
                    <strong class="second_show">00</strong>
                </div>
            </div>
            <a class="sign_in_set" id="rollcall-submit">签到</a>
        </div>
        <div class="call_the_roll_c" id="rollcall_msg">
            <p class="err">您错过了当次点名</p>
        </div>
    </div>
</div>
<!-- SDK弹窗 -->
<div class="SDK-big-box">
    <div class="SDK-min-box">
        <div class="SDK-top">
            <div class="SDK-img-box">
                <img src="/cn/wapvideo/images/video_pic.png">
            </div>
        </div>
        <div class="SDK-input">
            <div class="SDK-input-img">
                <img src="/cn/wapvideo/images/video_pass.png">
            </div>
            <div contenteditable="true" class="pass-input" placeholder="请输入密码"></div>
        </div>
        <div class="SDK-bottom">
            <div class="SDK-cancel">取消</div>
            <div class="SDK-sure">确定</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://static.gensee.com/webcast/static/sdk/js/gssdk-1.2.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/utils.js?t=2"></script>
<script type="text/javascript" src="/cn/wapvideo/js/TouchSlide.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/jquery.cookie.js"></script>
<script type="text/javascript">
    var uid=$('#videoComponent').attr('uid');
    //根据组获得通讯通道
    var channel = GS.createChannel();
    //设置区块高度
    var winWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    var winHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
    var video_height = parseInt((9 * winWidth)/16);
    $(function(){
        //禁止touchmove
        var selScrollable = '.allow-roll';//允许touch的样式
        $(document).bind('touchmove',function(e){
            e.preventDefault();
        });
        $('body').on('touchstart', selScrollable, function(e) {
            if (e.currentTarget.scrollTop === 0) {
                e.currentTarget.scrollTop = 1;
            } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
                e.currentTarget.scrollTop -= 1;
            }
        });
        $('body').on('touchmove', selScrollable, function(e) {
            if(jQuery(this)[0].scrollHeight > jQuery(this).innerHeight()) {
                e.stopPropagation();
            }
        });

        winWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        winHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
        video_height = parseInt((9 * winWidth)/16);

        $("#topHalf").height(video_height);
        $('#net_box').height(winHeight-video_height);
        $('#rollcall-box').height(winHeight-video_height);
        var headerHeight = $('.status_bar').height();
        var tabsHeight=$('.tabs').height();
        $('#doc-box,#docComponent').height(winHeight-video_height-headerHeight-tabsHeight);
        $('.chat-bd,.qa_list_content').height(winHeight-video_height-headerHeight-tabsHeight-$('#textarea-box').height());
        $('#chat-area').width(winWidth-118);

        //显示隐藏标签
        $('#emotion_a').on('click',function(){
            $('#emotion_list').toggle();
        });
        //点击标签插入到聊天输入框
        $("#emotion_list a").on("click", function(e){
            $('#chat-area').append($(this).find('img')[0].outerHTML);
        });

        //设置网路选中
        $('#net_list').on('click','li',function(){
            if(!$(this).hasClass('on')){
                $('#net_list li.on').removeClass();
                $(this).addClass('on');
            }
        });
        //关闭优选网络
        $('#net_close').on('click',function(){
            $('#net_box').removeClass('on').fadeOut();
        });

        //关闭点名界面
        $('#rollcall_close').on('click',function(){
            $('#rollcall-box').fadeOut();
        });

    });
    $(function(){
        $("#docComponent").css("height",$("#doc-box").height())
        $("iframe body").css("overflow","hidden")
    })
    // 手机旋转操作
    $(window).on("orientationchange",function(){
        if(window.orientation == 0 || window.orientation == 180){
            $('#videoScaling').removeClass('shrink');
            $('#toolArea').css({
                "position": 'relative',
                "bottom": 0
            });
            $("#videoScaling").show();
        } else {
            $('#videoScaling').addClass('shrink');
            $('#toolArea').css({
                "position": 'absolute',
                "bottom": 0
            });
            $("#videoScaling").hide();
        }

    });
    // 视频按钮(全屏/缩小)
    $("#videoScaling").on('click', function(){
        if($(this).hasClass('shrink')){
            $('#videoScaling').removeClass('shrink');
            $("#topHalf").css({
                "width": '100%',
                "height": video_height
            });
            $('#toolArea').css({
                "position": 'relative',
                "bottom": 0
            });
            // $("#videoScaling").show();
        } else{
            $('#videoScaling').addClass('shrink');
            $("#topHalf").css({
                "width": '100%',
                "height": winHeight - 35
            });
            $('#toolArea').css({
                "position": 'relative',
                "bottom": 0
            });
            // $("#videoScaling").hide();
        }

    });

    //直播状态监听
    channel.bind("onStart", function (event) {
        console.log(event);
        $('#play_status').html("播放中");
    });
    channel.bind("onPause", function (event) {
        console.log(event);
        $('#play_status').html("已暂停");

    });
    channel.bind("onPlay", function (event) {
        console.log(event);
        $('#play_status').html("播放中");
    });
    channel.bind("onStop", function (event) {
        console.log(event);
        $('#play_status').html("已结束");
    });

    //收到系统消息
    channel.bind("onMessage", function (event) {
        console.log(event);
        $('#chat_body').append('<li class="system">'+
            '<div class="msg-info">'+
            '<span>系统消息</span>'+
            '<em>'+((typeof event.data.time!=="undefined")?Util.formatTime(event.data.time*1000):Util.formatTime(new Date().getTime()))+'</em>'+
            '</div>'+
            '<div class="msg-content" style="width:'+(winWidth-20)+'px">'+
            event.data.content+
            '</div>'+
            '</li>');
        $('#chat_body').scrollTo();
    });
    //收到公聊消息
    channel.bind("onPublicChat ", function (event) {
        console.log(event);
        $('#chat_body').append('<li data-chat-id="'+event.data.id+'" data-senderUid="'+event.data.senderUid+'"><div class="msg-info"><span>'+event.data.sender+'</span><em>'+Util.formatTime(new Date().getTime())+'</em></div><div class="msg-content" style="width:'+(winWidth-20)+'px">'+emotion2Local(event.data.richtext)+'</div></li>');
        $('#chat_body').scrollTo();
    });
    //收到私聊消息
    channel.bind("onPriChat", function (event) {
        console.log(event);
        $('#chat_body').append('<li class="privatechat" data-chat-id="'+event.data.id+'" data-senderUid="'+event.data.senderUid+'"><div class="msg-info"><span>'+event.data.sender+'对我说</span><em>'+Util.formatTime(new Date().getTime())+'</em></div><div class="msg-content" style="width:'+(winWidth-20)+'px">'+emotion2Local(event.data.richtext)+'</div></li>');
        $('#chat_body').scrollTo();
    });

    function qaid_in(qaid_old,id){
        if(qaid_old.length==0){
            return false;
        }else{
            for(var i in qaid_old){
                if(qaid_old[i]==id){
                    return true;
                }
            }
            return false;
        }
    };
    function createQaEle2(qa,inold){
        if(qa.answer){
            if($('#qa-'+qa.id)[0]){
                return '';
            }
        }else{
            if($('#qa-'+qa.id)[0]){
                return '';
            }
        }
        return qa;
    }

    //获取优选网络信息
    channel.bind("onNetSettings", function (event) {
        console.log(event);
        var txt='';
        for(var i=0;i<event.data.list.length;i++){
            txt+='<li'+(event.data.list[i].selected==true?' class="on"':'')+'><em><i></i></em>'+event.data.list[i].label+'</li>';
        }
        $('#net_list').html(txt);
        $('#net_box').addClass('on').fadeIn();
    });
    //被踢出
    channel.bind("onKickOut", function (event) {
        console.log(event);
        alert("您已经被踢出");
    });

    //SDK状态通知 
    channel.bind("onStatus", function (event) {
        console.log(event);
        alert("SDK状态通知 "+event.data.type+" "+event.data.explain);
    });

    //SDK加载完毕，所有API生效
    channel.bind("onDataReady", function (event) {
        console.log(event);

        setTimeout(function(){sdkgo();},0);
    });

    function sdkgo(){
        //触摸切换功能
        TouchSlide({
            slideCell: "#chatQaBox",
            titCell: ".tabs li",
            mainCell: ".slider-container",
            defaultIndex: window.tabDefaultIndex,
            startFun:function(i,c){
                if($('#textarea-box')[0]){
                    if($('.tabs li').eq(i).hasClass('onchat') || $('.tabs li').eq(i).hasClass('onqa')){
                        $('.slider-ft').css('visibility','visible').addClass('show');
                    }else{
                        $('.slider-ft').css('visibility','hidden').removeClass('show');
                    }
                    if($('#emotion_list').css('display')!='none'){
                        $('#emotion_list').hide();
                    }
                    $('#chat-area').html('');
                }
            },
            endFun:function(i,c){
                if($('#textarea-box')[0]){
                    if($('.tabs li').eq(i).hasClass('onchat')){
                        $('.slider-ft').attr('data-type','chat');
                        $('#emotion_a').css('display','block');
                    }else if($('.tabs li').eq(i).hasClass('onqa')){
                        $('.slider-ft').attr('data-type','qa');
                        $('#emotion_a').hide();
                    }else{
                        $('.slider-ft').removeAttr('data-type');
                    }
                    if($('.qa_list_content').find('li').length>0){
                        jQuery('.qa_list_content ul').scrollTo();
                    }
                    if($('.chat-bd').find('li').length>0){
                        jQuery('.chat-bd ul').scrollTo();
                    }
                }
            }
        });




        //发送聊天
        $('#chat_btn').on('click',function(){
            if($('#emotion_list').css('display')!='none'){
                $('#emotion_list').hide();
            }
            var type=$('#textarea-box').attr('data-type');
            var html = $.trim($("#chat-area").html().replace(/ /ig,' ').replace(/\s+/g,' '));
            if(Util.isEmpty(html) || html ==="<br>" || html ==="<br/>"){
                alert("请输入聊天内容");
                return;
            }else{
                var richtext = emotionNormalize(html, false);
                var text = emotionNormalize(html, true).replace(/<br>/gi,'').replace(/[\r\n]/g,"").replace(/<\/?.+?>/g,"");
                $('#chat_body').append('<li class="mine"><div class="msg-info"><div><span>用户名</span></div><em>'+Util.formatTime(new Date().getTime())+'</em></div><div class="msg-content" style="width:'+(winWidth-20)+'px">'+html+'</div></li>');
                $('#chat_body').scrollTo();

                channel.send("submitChat", {
                    "content" : text,
                    "richtext" : richtext,
                    "security" : "high"
                },function(data){
                    console.log(data);
                    $("#chat-area").html('');
                });
            }
        });



        //获取优选网络
        $('#wifi_a').on('click',function(){
            channel.send("requireNetSettings", {
            });
        });


        //提交优选网络
        $('#net_btn').on('click',function(){
            if($('#net_list li.on').length>0){
                var label=$('#net_list li.on').text();
                //提交优选网络选择信息
                channel.send("submitNetChoice", {
                    "label":label
                });
                $('#net_close').trigger('click');
            }else{
                alert("请选择一个网络");
            }
        });


        //收到点名通知
        var rolltime;
        channel.bind("onRollcall", function (event) {
            console.log(event);
            $('#rollcall_body').show();
            $('#rollcall_msg').hide();
            $('#rollcall_close').hide();
            $('#rollcall-box').attr('data-id',event.data.id).fadeIn();
            startRollcallCountdown(event.data.timeout);
        });

        //提交点名
        $('#rollcall-submit').on('click',function(){
            if(rolltime){
                clearTimeout(rolltime);
            }
            var id=$('#rollcall-box').attr('data-id');
            //提交点名
            channel.send("submitRollcall", {
                "id":id
            });

            $('#rollcall_close').show();
            $('#rollcall_body').hide();
            $('#rollcall_msg p').removeClass().addClass('succ').html('签到成功');
            $('#rollcall_msg').show();
        });
        //倒计时展示
        function setRollcallTime(dtime){
            var m;
            if(dtime<60){
                m='00';
            }else{
                m=parseInt(dtime/60);
                m=m<10?'0'+""+m:m;
            }
            var t;
            if(dtime<60){
                t=dtime;
            }else{
                t=dtime-60*parseInt(dtime/60);
            }
            t=t<10?'0'+""+t:t;
            $('.minute_show').html(m);
            $('.second_show').html(t);
        }
        //点名倒计时
        function startRollcallCountdown(sec){
            if($(".rollcall_area").is(":hidden"))return;//已报到
            setRollcallTime(sec);
            if(sec>0){
                rolltime=setTimeout(function(){
                    startRollcallCountdown(sec-1);
                }, 1000);
            }else{
                $('#rollcall_close').show();
                $('#rollcall_body').hide();
                $('#rollcall_msg p').removeClass().addClass('err').html('您错过了当次点名');
                $('#rollcall_msg').show();
            }
        }
    }

    //API错误通知
    channel.bind("onAPIError", function (event) {
        console.log(event);
    });

    function isPortrait(){
        if(window.orientation==0 && window.innerWidth>window.innerHeight){
            return false;
        }else{
            return window.orientation==180||window.orientation==0||window.orientation==undefined;
        }
    }
    function bodyOrientationChange() {
        setTimeout(function () {
            winWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            winHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
            video_height = parseInt((9 * winWidth)/16);

            console.log(winWidth);
            if(isPortrait()){//竖屏使用16：9比例高度
                $("#topHalf").height(video_height);
                $('#doc-box').height(winHeight-video_height-tabsHeight);
                $('.msg-content,.qa_txt').width(winWidth-20);
                $('.chat-bd,.qa_list_content').height(winHeight-video_height-tabsHeight);
                $('.chapter-list-container').height(winHeight-video_height-tabsHeight-$('.chapter-hd').height());
            }else{//横屏直接铺满视频
                $("#topHalf").height(winHeight);
            }
        }, 100);
    }
    function createOrientationChangeProxy(fn, scope) {
        return function () {
            clearTimeout(scope.orientationChangedTimeout);
            var args = Array.prototype.slice.call(arguments, 0);
            scope.orientationChangedTimeout = setTimeout($.proxy(function () {

                var ori = window.orientation;
                if (ori != scope.lastOrientation) {
                    fn.apply(scope, args); // 这里才是真正执行回调函数
                }
                scope.lastOrientation = ori;
            }, scope), 500);
        };
    }
    //横竖屏翻转监听
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", createOrientationChangeProxy(function () {
        bodyOrientationChange();
    }, window), false);
    //加载输入密码弹窗
    $(function(){
        if($.cookie($("#sdkID").val() + $("#sdkpwd").val())){ //判断是否存在有效的cookie SDK值，存在，不加载弹窗，不存在加载弹窗
            // console.log(111)
        } else {
            $(".SDK-big-box").show()
        }
    })
    //取消输入密码，返回上一页个人中心
    $(".SDK-cancel").click(function(){
        $(".SDK-big-box").hide()
        window.location.href = `http://192.168.31.47:8080/#/my_class`
    })
    //确定密码，请求比较密码是否正确（cookie中不存在SDK密码的情况下，验证SDK密码）
    $(".SDK-sure").click(function(){
        if($(".pass-input").text() == ''){ //密码框为空
            alert("请输入密码")
        } else {
            if($(".pass-input").text() === $("#sdkpwd").val()){
                //将SDK密码存入cookie
                $.cookie($("#sdkID").val()+ $(".pass-input").text() ,$(".pass-input").text(),{ expires: 30 });
                $(".SDK-big-box").hide()
            } else {
                alert('密码错误，请重新输入')
            }
        }
    })
    //点击返回按钮，返回到上一页
    $(".go-back").click(function(){
        window.location.href = `http://192.168.31.47:8080/#/my_class`
    })
    //点击关闭或打开老师视频
    $(".close-teacher").click(function(){
        if($(".gmat-live-teacher").css("display") == "none"){
            $(this).text("关闭头像")
            $(".gmat-live-teacher").show()
        } else {
            $(this).text("打开头像")
            $(".gmat-live-teacher").hide()
        }
    })
</script>
</body>
</html>




