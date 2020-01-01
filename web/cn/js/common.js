/**
 * 点赞效果
 */
(function ($) {
    $.extend({
        tipsBox: function (options) {
            options = $.extend({
                obj: null,  //jq对象，要在那个html标签上显示
                str: "+1",  //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
                startSize: "12px",  //动画开始的文字大小
                endSize: "30px",    //动画结束的文字大小
                interval: 600,  //动画时间间隔
                color: "red",    //文字颜色
                callback: function () { }    //回调函数
            }, options);
            $("body").append("<span class='num'>" + options.str + "</span>");
            var box = $(".num");
            var left = options.obj.offset().left + options.obj.width() / 2;
            var top = options.obj.offset().top - options.obj.height();
            box.css({
                "position": "absolute",
                "left": left + "px",
                "top": top + "px",
                "z-index": 9999,
                "font-size": options.startSize,
                "line-height": options.endSize,
                "color": options.color
            });
            box.animate({
                "font-size": options.endSize,
                "opacity": "0",
                "top": top - parseInt(options.endSize) + "px"
            }, options.interval, function () {
                box.remove();
                options.callback();
            });
        }
    });
})(jQuery);

function niceIn(prop){
    prop.find('i').addClass('niceIn');
    setTimeout(function(){
        prop.find('i').removeClass('niceIn');
    },1000);
}


// 点击小的咨询展示大的咨询
function showZiXun(){
    $(".referBox").slideDown();
    $(".refer_small").fadeOut();
}
//回到顶部
function referTop(){
    $("html,body").animate({scrollTop:0},800);
}
//关闭咨询框
function closeRefer(){
    $(".referBox").slideUp();
    $(".refer_small").fadeIn();
}
//登录 按钮跳转
function loginHref(){
    var urls=window.location.href;
    window.location.href="https://login.viplgw.cn/cn/index?source=1&url="+urls;
}
//注册 按钮跳转
function registerHref(){
    var urls=window.location.href;
    window.location.href="https://login.viplgw.cn/cn/index/phone-register?source=1&url="+urls;
}

/**
 * 收藏文章
 */
function collectArt(o,id) {
    $.ajax({
        url:"/cn/api/user-content-collection",
        type:"post",
        data:{
            contentId:id
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
function subError() {
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
            errorContent:errorContent
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
