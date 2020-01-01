$(function(){
    // removeAhref();
    // $(".content-page ul li:not('.active') a").click(function(){
    //     var _that=$(this);
    //     pingStr(_that);
    // });
});
//    时间戳转化
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
/**
 * 删除分页a标签的跳转链接
 */
function removeAhref(){
    $(".content-page ul li").each(function(){
        $(this).find("a").attr("href","javascript:void(0);");
    });
}
/**
 * 分页点击事件
 */
function pingStr(_that){
    var curPage=_that.html();
    var catId=$(".t-index-hd ul li.on").attr("data-cat");
    $.ajax({
        url:"index.php?web/teacherRelevant/articlePage",
        type:"post",
        data:{
            catId:catId,
            page:curPage
        },
        dataType:"json",
        success:function(data){
            var content=data.data.data;
            var str='';
            _that.parents(".content-page").siblings(".content-list").find("ul").html("");
            for(var i=0;i<content.length;i++){
                str+='<li>'+
                    '<div class="cl-left">'+
                    '<a href="/article/'+content[i].contentid+'.html">'+
                    '<img src="'+content[i].contentthumb+'" alt="图片"/>'+
                    '</a>'+
                    '</div>'+
                    '<div class="cl-right">'+
                    '<h4 class="ellipsis"><a href="/article/'+content[i].contentid+'.html">'+content[i].contenttitle+'</a></h4>'+
                    '<p class="ellipsis">'+content[i].contentdescribe+'</p>'+
                    '<div class="cl-r-teacher flex-container-left">'+
                    '<div class="small-thumb">'+
                    '<a href="/article/teacher-'+content[i].teacher.contentid+'.html"><img src="'+content[i].teacher.contentthumb+'" alt="老师头像"/></a>'+
                    '</div>'+
                    '<p><a href="/article/teacher-'+content[i].teacher.contentid+'.html">'+content[i].teacher.contenttitle+'</a></p>'+
                    '<img src="/app/web_core/styles/images/teacher/teacher-shuqian.png" alt="图标"/>'+
                    '<span>'+content[i].catname+'</span>'+
                    '<div class="clearfixd"></div>'+
                    '</div>'+
                    '<div class="cl-r-controls">'+
                    '<p>'+
                    '<img src="/app/web_core/styles/images/teacher/teacher-eye.png" alt="阅读图标"/>'+
                    '<span> &nbsp;阅读 &nbsp;'+content[i].views+'</span>'+
                    '</p>'+
                    '<p style="cursor: pointer;" onclick="indexZan(this,'+content[i].contentid+',1)" class="zanBtn">'+
                    '<img src="/app/web_core/styles/images/teacher/teacher-dianzan.png" alt="点赞图标"/>'+
                    '<span>&nbsp;点赞 &nbsp;<b>'+content[i].likeNum+'</b></span>'+
                    '</p>'+
                    '<p>'+
                    '<img src="/app/web_core/styles/images/teacher/teacher-pinglun.png" alt="评论图标"/>'+
                    '<span> &nbsp;评论 &nbsp;'+content[i].commentNum+'</span>'+
                    '</p>'+
                    '<p>'+formatDate(parseInt(content[i].contentinputtime)*1000)+'</p>'+
                    '</div>'+
                    '</div>'+
                    '<div class="clearfixd"></div>'+
                    '</li>';
            }
            _that.parents(".content-page").siblings(".content-list").find("ul").html(str);
            _that.parents(".content-page").find("ul").html(data.data.pages);
            removeAhref();
            $(".content-page ul li a:not('.on')").click(function(){
                var _that=$(this);
                pingStr(_that);
            });
            $("html,body").animate({scrollTop:$(".teacher-box")[0].offsetTop+ "px"}, 500);

        }
    });
}

/**
 *
 * @param o
 * @param teacherid  有这个参数表示是老师点赞
 * @param contentid 有这个参数表示是文章详情点赞
 */
function indexZan(o,teacherid,contentid){
    var oldN=parseInt($(o).find("b").html());
    var strT="";
    $.ajax({
        url:"/cn/api/add-fine",
        type:"post",
        data:{
            teacherid:teacherid,
            contentid:contentid
        },
        dataType:"json",
        success:function(data){
//                未登录 2
            if(data.code==2){
                loginHref();
            }else if(data.code==1){
//                    点赞动画效果
                $.tipsBox({
                    obj: $(o),
                    str:"+1",
                    callback: function () {
                        $(o).find("b").html(oldN+1);
                    }
                });
                niceIn($(o));
            }else{
                alert(data.message);
            }
        }
    });
}
/**
 * 收藏
 * @param o
 */
function indexZan02(o){
    var oldN=parseInt($(o).find("b").html());
    var collection=$(o).find("input#userCollection").val();
    var collectionNum=0;
    var strN='';
    var userid=$("#userid").val();
    if(!userid){
        loginHref();
        return false;
    }
    if(collection==0){
        collectionNum=1;
        strN="+1";
    }else{
        collectionNum=0;
        strN="-1";
    }
    var strT="";
    $.ajax({
        url:"/cn/api/collection",
        type:"post",
        data:{
            userid:userid,
            teacherid:$("#teacherid").val(),
            collection:collectionNum //1收藏 0取消收藏
        },
        dataType:"json",
        success:function(data){
//                未登录 2
            if(data.code==2){
                loginHref();
            }else if(data.code==1){
                $("input#userCollection").val(collectionNum);
//                    点赞动画效果
                $.tipsBox({
                    obj: $(o),
                    str:strN,
                    callback: function () {
                        if(collection==0){
                            $(o).find("span.dis").html("取消收藏");
                            $(o).find("b").html(oldN+1);
                            $(o).find("strong").addClass("red");
                        }else{
                            $(o).find("span.dis").html("收藏");
                            $(o).find("b").html(oldN-1);
                            $(o).find("strong").removeClass("red");
                        }

                    }
                });
                niceIn($(o));
            }
        }
    });
}

//打赏
function giveAReward(conId){
    var num=$(".sel_ld li.on").find(".dsld_val").html();
    var uid=$("#userid").val();
    if(!uid){
        loginHref();
        return false;
    }
    if(!num || num==0){
        alert("请选择或者输入你要打赏的雷豆数量哦！");
        return false;
    }
    $.ajax({
        url:"/cn/api/send-integral",
        type:"post",
        data:{
            uid:uid,
            leidou:parseInt(num),
            contentid:conId
        },
        dataType:"json",
        success:function(data){
//                未登录 2
            if(data.code==2){
                loginHref();
            }else if(data.code==1){
                //alert("打赏成功！");
                location.reload();
            }else{
                alert(data.message);
            }
        }
    });
}

/**
 * 评论
 * @param teacherid 有这个参数表示是老师详情下面的评论
 * @param contentid 有这个参数表示是文章详情下面的评论
 * @param o
 * @param flag
 * @returns {boolean}
 */
function comment(teacherid,contentid,o,flag) {
    var com_content=$(o).siblings('textarea').val();
    var userid=$("#userid").val();
    var num=$("#commitNum").html();
    if(!userid){
        loginHref();
        return false;
    }
    if(!com_content){
        alert("请输入评论内容");
        return false;
    }
    $.ajax( {
        url: '/cn/api/add-comment',// 跳转到 action
        data:{
            userid:userid,
            comment:com_content,
            teacherid:teacherid,
            contentid:contentid
        },
        type:'post',
        cache:false,
        dataType:'json',
        success:function(data) {
            if (data.code == 1) {
                $("#commitNum").html(parseInt(num)+1);
                var str = "";
                var imgStr = "";
                $.each(data.comments,function(k,v){
                    if (v.userimage == "" || v.userimage==null) {
                        imgStr = '<img src="/cn/images/teacher/details_defaultImg.png" alt="用户头像"/>';
                    }else{
                        if (v.userimage.substr(0, 1) == "/") {
                            imgStr = '<img src="' + v.userimage + '" alt="回复中的用户头像"/>';
                        } else {
                            imgStr = '<img src="/' + v.userimage + '" alt="回复中的用户头像"/>';
                        }
                    }
                    str+= '<li class="flex-container-left">'+
                        '<div class="pj-left">'+
                        '<div class="l-user">'+imgStr+
                        '</div>'+
                        '<p class="ellipsis">'+ v.usernickname+'</p>'+
                        '</div>'+
                        '<div class="pj-right">'+
                        '<p>'+ v.comment+
                        '</p>'+
                        '<span><b id="num">'+v.key+'楼</b>&nbsp;&nbsp;|&nbsp;&nbsp;'+ v.createTime+'</span>'+
                        '</div>'+
                        '<div class="clearfixd"></div>'+
                        '</li>';
                });
                $("#new_ul").html(str);
                $("html,body").animate({scrollTop:$("#pingjia")[0].offsetTop+ "px"}, 500);
                $(o).siblings('textarea').val("");

            }else{
                alert(data.message);
            }
        }
    });
}