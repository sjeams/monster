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
    <title>录播</title>
    <link href="/cn/wapvideo/css/mobile_vod.css" rel="stylesheet" type="text/css">
    <link href="/cn/wapvideo/css/audio.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="webPlayer" class="web">
    <div class="page-title">
        <div class="go-back">
            <img src="/cn/wapvideo/images/video_left.png">
        </div>
        <div class="title-text">{x2;$name}</div>
        <div class="close-teacher">关闭头像</div>
    </div>
    <div id="topHalf">
        <div id="video-box" class="video-container">
            <!--老师视频-->
            <input type="hidden" id="sdkpwd" value="{x2;$VideoPWD}">
            <div class="video-box">
                {x2;if:$ispwd==1}
                <gs:video-vod id="videoComponent" site="bjsy.gensee.com" ctx="training" ownerid="{x2;$VideoSDK}" uid="{x2;$userinfo['uid']}" uname="{x2;$order['consignee']}" fullscreen="true" authcode="{x2;$VideoPWD}" bar="false" gsVer="{x2;$flash}"/>
                {x2;endif}
            </div>
            <!--讲解视频区-->
            <div id="doc-box" class="document-container">
                {x2;if:$ispwd==1}
                <gs:doc id="docComponent"  ctx="training"  site="bjsy.gensee.com" fullscreen="true" ownerid="{x2;$VideoSDK}" gsVer="{x2;$flash}" />
                {x2;endif}
            </div>
        </div>
        <div class="tool_area" id="toolArea">
            <a class="play_area"></a>
            <span id="play_now">00:00</span>
            <!--播放进度条-->
            <div class="progress_area"></div>
            <!--播放控制-->
            <div class="play_time">
                <em id="duration">00:00</em>
            </div>
            <!--视频(全屏/缩小)-->
            <a class="video_scaling" id="videoScaling"></a>
        </div>
    </div>
    <div class="audio-list">
        <div class="audio-title">录播课程</div>
        <div class="audio-box">
            {x2;tree:$videos,videos,nid}
            <input type="hidden" id="nid" value="{x2;v:nid}">
            <input type="hidden" class="orderid" value="{x2;$order_id}"/>
            <a href="https://gmat.viplgw.cn/index.php?web/liveclasswap/livevideo&userid={x2;$userinfo['userid']}&order_id={x2;$order['order_id']}&token={x2;v:nid}">
                <span>{x2;v:videos['name']}</span><span><img src="/cn/wapvideo/images/cideo_play.png"></span></a>
            {x2;endtree}
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
<script type="text/javascript" src="https://static.gensee.com/webcast/static/sdk/js/gssdk-1.3.js?201806v477"></script>
<script type="text/javascript" src="/cn/wapvideo/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/utils.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/TouchSlide.js"></script>
<script type="text/javascript" src="/cn/wapvideo/js/jquery.cookie.js"></script>
<script type="text/javascript">
    //根据组获得通讯通道
    var channel = GS.createChannel();

    var winWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    var winHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
    var video_height = parseInt((9 * winWidth)/16);
    var tabsHeight=$('.tabs').height();
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

        //设置区块高度
        winWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        winHeight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
        video_height = parseInt((9 * winWidth)/16);


        $("#topHalf").height(video_height);
        $('#doc-box,#docComponent').height(winHeight-video_height-tabsHeight);
        $('.chat-bd,.qa_list_content').height(winHeight-video_height-tabsHeight);
        $('.chapter-list-container').height(winHeight-video_height-tabsHeight-$('.chapter-hd').height());

        //单选多选设置答题
        $('body').on('click','.survey_select div a',function(){
            var that=this;
            var is_radio=$(that).parents('.survey_select').hasClass('single');
            if($(that).hasClass('on') && !is_radio){
                $(that).removeClass('on');
            }else{
                if(is_radio){
                    $(that).parent('div').find('a').removeClass('on');
                }
                $(that).addClass('on');
            }
        });

        // 手机旋转操作
        $(window).on("orientationchange",function(){
            if(window.orientation == 0 || window.orientation == 180){
                $('#videoScaling').removeClass('shrink');
                $('#toolArea').css({
                    "position": 'relative',
                    "bottom": 0
                });
                // $("#videoScaling").show();
            } else {
                $('#videoScaling').addClass('shrink');
                $('#toolArea').css({
                    "position": 'absolute',
                    "bottom": 0
                });
                // $("#videoScaling").hide();
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

        //播放按钮 (播放/暂停)
        $('.play_area').on('click',function(){
            if($(this).hasClass('pause')){
                channel.send("pause", {
                });
            }else{
                channel.send("play", {
                });
            }
        });

        //初始化点播，点播开始
        channel.bind("loadStart", function (event) {
            console.log(event);
            $('.play_area').addClass('pause');
        });
        //监听暂停
        channel.bind("onPause", function (event) {
            console.log(event);
            $('.play_area').removeClass('pause');
        });
        //跳转结束
        channel.bind("play", function (event) {
            console.log(event);
            $('.play_area').addClass('pause');
        });
        channel.bind("onPlay", function (event) {
            console.log(event);
            $('.play_area').addClass('pause');
        });

        var duration=0;
        var testInterval;
        //获取播放总时长
        channel.bind("onFileDuration", function (event) {
            console.log(event);
            duration=event.data.duration;
            $('#duration').html(Util.timeDuration(duration/1000));

            //播放进度条
            $(".progress_area").slider({
                value: 0,
                range:"min",
                change: function() {
                    $(".progress_area span").width($(".progress_area a").css("left"));
                },
                start:function(){
                    if(testInterval){
                        clearInterval(testInterval);
                    }
                },
                stop:function(event, ui) {
                    var v = ui.value;
                    var s = duration * Number(v)/ 100;
                    var currentTime=Number(s);
                    //seek操作
                    channel.send("seek", {
                        "timestamp":currentTime
                    });
                }
            });

            //跳转结束
            channel.bind("onSeekCompleted", function (event) {
                console.log(event);
                getplaynow();
            });

            //定时获取当前播放时间点
            function getplaynow(){
                testInterval = setInterval(function(){
                    channel.send("playheadTime", {

                    });
                },190);
            }
            getplaynow();
            //监听播放时间
            channel.bind("onPlayheadTime", function (event) {
                //console.log(event);
                $('#play_now').html(Util.timeDuration(event.data.playheadTime/1000));

                $(".progress_area").slider("value", Util.calcPercent(event.data.playheadTime, duration));

                changeChapter(event.data.playheadTime);
            });
            //切换章节
            function changeChapter(ms){
                if(Util.isEmpty(ms))return;
                $(".chapter_list").find("a").each(function(){
                    var endtime = $(this).attr("data-endtime");
                    $(".chapter_list").find(".on").removeClass("on");
                    if(Number(endtime) > Number(ms)){
                        $(this).addClass("on");
                        return false;
                    }
                });
            }
        });
    });

    //初始化点播，点播开始
    channel.bind("loadStart", function (event) {
        console.log(event);
    });
    //监听暂停
    channel.bind("onPause", function (event) {
        console.log(event);
    });
    //跳转结束
    channel.bind("play", function (event) {
        console.log(event);
    });

    //SDK状态通知
    channel.bind("onStatus", function (event) {
        // console.log(event);
        if(event.data.type!="2"){
            alert("SDK状态通知 "+event.data.type+" "+event.data.explain);
        }
    });

    //SDK加载完毕，所有API生效
    channel.bind("onDataReady", function (event) {
        // console.log(event);

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

            },
            endFun:function(i,c){

            }
        });


        var testInterval;

        testInterval = setInterval(function(){
            channel.send("playheadTime", {

            });
        },190);
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
                $('#doc-box').find('iframe').width(winWidth).height(winHeight-video_height-tabsHeight);
                //setTimeout(function(){$('#doc-box').find('iframe').css('clear','both');},1000);
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
        if($.cookie('SDK_pass_' + $("#sdkpwd").val())){ //判断是否存在有效的cookie SDK值，存在，不加载弹窗，不存在加载弹窗
            // console.log(111)
        } else {
            $(".SDK-big-box").show()
        }
    })
    //取消输入密码，返回上一页个人中心
    $(".SDK-cancel").click(function(){
        $(".SDK-big-box").hide()
        var orderid = $(".orderid").val()
        window.location.href = `http://192.168.31.47:8080/#/my_audio?orderid=${orderid}&type=1`
    })
    //确定密码，请求比较密码是否正确（cookie中不存在SDK密码的情况下，验证SDK密码）
    $(".SDK-sure").click(function(){
        if($(".pass-input").text() == ''){ //密码框为空
            alert("请输入密码")
        } else {
            if($(".pass-input").text() === $("#sdkpwd").val()){
                //将SDK密码存入cookie
                $.cookie('SDK_pass_'+ $(".pass-input").text() ,$(".pass-input").text(),{ expires: 30 });
                $(".SDK-big-box").hide()
            } else {
                alert('密码错误，请重新输入')
            }
        }
    })
    //点击返回按钮，返回到上一页
    $(".go-back").click(function(){
        var orderid = $(".orderid").val()
        window.location.href = `http://192.168.31.47:8080/#/my_audio?orderid=${orderid}&type=1`
    })
    //点击关闭或打开老师视频
    $(".close-teacher").click(function(){
        if($(".video-box").css("display") == "none"){
            $(this).text("关闭头像")
            $(".video-box").show()
        } else {
            $(this).text("打开头像")
            $(".video-box").hide()
        }
    })
</script>
</body>
</html>
