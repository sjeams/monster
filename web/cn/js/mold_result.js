
$(function () {
    useTime();
    $(".file").on("change", "input[type='file']", function () {
        var filePath = $(this).val();
        var arr = filePath.split('\\');
        var fileName = arr[arr.length - 1];
        $(".audioPath").val(fileName);
    });
    $('.pl_link').click(function () {
        location.href = '#all_reply';
    });
    $('.dk_select li').click(function () {
        $(this).addClass('selected').siblings('li').removeClass('selected');
    });
    $(".txtMarquee-top").slide({
        mainCell: ".rt_list",
        autoPlay: true,
        effect: "topMarquee",
        vis: 8,
        interTime: 50,
        trigger: "click"
    });
    $(".s-w-nav02 ul li").click(function () {
        window.location.href=$(this).attr("data-link");
    });

});

function showAnswer(el) {
    var s = $('#useTime').val();
    $('.test_time').html(sec_to_time(s));
    $(el).hide().siblings('#curAnswer').show();
}

//    秒转时分秒
function sec_to_time(s) {
    var t;
    if (s > -1) {
        var hour = Math.floor(s / 3600);
        var min = Math.floor(s / 60) % 60;
        var sec = s % 60;
        if (hour < 10) {
            t = '0' + hour + ":";
        } else {
            t = hour + ":";
        }

        if (min < 10) {
            t += "0";
        }
        t += min + ":";
        if (sec < 10) {
            t += "0";
        }
        t += sec;
    }
    return t;
}

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
            alert(req.message);
            if (req.code == 1) {
                $(o).addClass('on');
            }
            if (req.code == 2) {
                $(o).removeClass('on');
            }

        }
    })
}

//    下一题
function nextQuestion(el, questionId) {
    $.ajax({
        url: "/cn/api/get-next-question",
        type: "post",
        data: {
            questionId: questionId
        },
        dataType: "json",
        success: function (data) {
            if (data.code == 1) {
                location.href = '/question_detail/' + data.id + '.html'
            }
        }
    });
}

//    展示笔记输入框
function showNote() {
    $('.note_wrap').slideToggle();
}

//    添加笔记
function addNote(el) {
    var str = '';
    var content = $('#noteInt').val();
    var questionId = $('#questionId').val();
    if (content == '') {
        alert('请输入笔记内容！！！');
        return false;
    } else {
        $.post('/cn/api/add-question-note',
            {content: content, type: 1, questionId: questionId},
            function (res) {
                alert(res.message);
                if (res.code == 1) {

                    str += '<li>' +
                        '                        <p class="editPre">' + content + '</p>' +
                        '                        <div class="clearfix">' +
                        '                            <span class="nodeTime fl">' + getNowFormatDate() + '</span>' +
                        '                            <input class="editNote_btn fr" value="编辑" onclick="editNote(this,10190,17200)">' +
                        '                        </div>' +
                        '                    </li>';
                    $('.noteList').append(str);
                    $('#noteInt').val('');
                    $('.note_wrap').slideUp();
                }
            }, 'json');
    }
}

//     笔记编辑
function editNote(o, noteId) {
    var oldHtml = $(o).parents("li").find(".editPre").html();
    var questionId = $('#questionId').val();
    var text = '';
    text = '<textarea onblur="pShow(this,' + questionId + ',' + noteId + ')">' + oldHtml + '</textarea>';
    $(o).attr("disabled", "true").parents("li").prepend(text).find(".editPre").remove().end().find("textarea").focus();

}

function pShow(o, questionid, noteid) {
    var text = '<p class="editPre">' + $(o).val() + '</p>';
    $.ajax({
        url: "/cn/api/add-question-note",
        type: "post",
        data: {
            questionId: questionid,
            content: $(o).val(),
            noteId: noteid,
            type: 2//1表示新增笔记 其他值表示修改笔记
        },
        dataType: "json",
        success: function (data) {
            $(o).parents("li").prepend(text).find(".editNote_btn ").removeAttr("disabled");
            $(o).remove();
        }
    });
}

//     添加音频
function addVideo(questionId) {
    var price = $('.ldVal').val();
    var audioPath = $('.audioPath').val();
    var reg = /^\+?[1-9]\d*$/;
    if (!reg.test(price)) {
        alert('请输入正确的雷豆数！！！');
        return false;
    }
    if (audioPath) {
        $.ajax({
            url: "/cn/api/add-analysis",
            type: "get",
            data: {
                type: 2,
                price: price,
                audio: audioPath,
                questionId: questionId
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    location.reload();
                } else {
                    alert(data.message);
                }

            }
        });
    } else {
        alert('请选择音频文件！！！');
        return false;
    }


}

//     添加解析
function addExplain(questionId) {
    var str = '';
    var userName = $('.userName_n').html();
//        var aContent = ue.getContent();
    var aContent = JMEditor.html('aContent');
    if(!aContent){
        alert("请输入内容");
        return false;
    }
    $.ajax({
        url: "/cn/api/add-analysis",
        type: "get",
        data: {
            aContent: aContent,
            questionId: questionId
        },
        dataType: "json",
        success: function (data) {
            if (data.code == 1) {
                alert("提交成功，正在通过后台审核");
            } else {
                alert(data.message);
            }
        }
    });
}

//    提交评论
function saveReply() {
    var str = '';
    var content = $('#all_reply').val();
    var questionId = $('#questionId').val();
    var username = $('.userName_n').html();
    var curLength = parseInt($('.reply_list .outItem').eq(0).find('.howLow').html());
    if (content == '') {
        alert('请输入评论内容！！！');
        return false;
    } else {
        $.post('/cn/api/question-comment', {content: content, questionId: questionId}, function (res) {
            if (res.code == 0) {
                var r = confirm("您还未登录，是否跳转到登录页！");
                if (r == true) {
                    location.href = "#";

                }
                else {
                    return false;
                }
            }
            if (res.code == 1) {
                alert(res.message);
                str += '<div class="clearfix outItem">' +
                    '                            <div>' +
                    '                                <div class="reply_userInfo inm">' +
                    '                                    <div class="userImg_1"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                    '                                    <p class="userNickname ellipsis tm">' + username + '</p>' +
                    '                                </div>' +
                    '                                <div class="reply_content_a inm">' + content + '</div>' +
                    '                            </div>' +
                    '                            <div class="reply_time_info tr">' +
                    '                                <span class="tiku_floor"><em class="howLow">' + (curLength + 1) + '</em>楼&nbsp;&nbsp;|</span>' +
                    '                                <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                    '                                <span class="tiku_answer" onclick="replyA(this);">回复</span>' +
                    '                            </div>' +
                    '                            <div class="outInt_wrap">' +
                    '                                <textarea class="replyInt_a"></textarea>' +
                    '                                <div class="out_handle tr">' +
                    '                                    <input type="button" class="no" onclick="replyA(this);" value="取消">' +
                    '                                    <input type="button" class="yes" onclick="firstReply(this)" value="回复">' +
                    '                                </div>' +
                    '                            </div>' +
                    '                            <!--内层回复列表-->' +
                    '                            <ul class="innerReply_list"></ul>' +
                    '                        </div>';
                $('.reply_list').prepend(str);
                $('#all_reply').val('');
            }
        }, 'json')
    }

}

//回复输入框展示
function replyA(el) {
    var parentBox = $(el).parents('.outItem');
    parentBox.find('.outInt_wrap').slideToggle();
}

function replyB(el) {
    var parentBox = $(el).parents('li');
    parentBox.find('.innerInt_wrap').slideToggle();
}

function firstReply(el) {
    var str = '';
    var parentWrap = $(el).parents('.outItem').find('.innerReply_list');
    var parentBox = $(el).parents('.outInt_wrap');
    var content = parentBox.find('.replyInt_a').val();
    var questionId = $('#questionId').val();
    var replyName = $(el).parents('.outItem').find('.userNickname ').html();
    var commentId = $(el).parents('.outItem').attr('data-id');
    var curName = $('.userName_n').html();
    if (content == '') {
        alert('请输入评论内容！！！');
        return false;
    } else {
        $.post('/cn/api/question-reply',
            {
                content: content,
                questionId: questionId,
                replyName: replyName,
                commentId: commentId
            },
            function (res) {
                alert(res.message);
                if (res.code == 1) {
                    str += '<li>' +
                        '                                        <div class="userImg_2 inm"><img src="/cn/images/details_defaultImg.png" alt="">' +
                        '                                        </div>' +
                        '                                        <div class="reply_content_b inm">' +
                        '                                            <span class="reply_name inm ellipsis">' + curName + '</span>' +
                        '                                            <em class="inm">回复</em>' +
                        '                                            <span class="comment_name inm ellipsis">' + replyName + '</span>' +
                        '                                            <span class="replyText inm">' + content + '</span>' +
                        '                                        </div>' +
                        '                                        <div class="reply_time_info tr">' +
                        '                                            <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                        '                                            <span class="tiku_answer" onclick="replyB(this)">回复</span>' +
                        '                                        </div>' +
                        '                                        <!--内层输入框-->' +
                        '                                        <div class="innerInt_wrap">' +
                        '                                            <textarea class="replyInt_b"></textarea>' +
                        '                                            <div class="inner_handle tr">' +
                        '                                                <input type="button" class="no" onclick="replyB(this)" value="取消">' +
                        '                                                <input type="button" onclick="secondReply(this)" class="yes" value="回复">' +
                        '                                            </div>' +
                        '                                        </div>' +
                        '                                    </li>';
                    parentWrap.append(str);
                    parentBox.find('.replyInt_a').val('');
                }

            }, 'json');
    }

}

function secondReply(el) {
    var str = '';
    var parentWrap = $(el).parents('.outItem').find('.innerReply_list');
    var parentBox = $(el).parents('li');
    var content = parentBox.find('.replyInt_b').val();
    var questionId = $('#questionId').val();
    var replyName = parentBox.find('.reply_name ').html();
    var curName = $('.userName_n').html();
    var commentId = $(el).parents('.outItem').attr('data-id');
    if (content == '') {
        alert('请输入回复内容！！！');
        return false;
    } else {
        $.post('/cn/api/question-reply',
            {
                content: content,
                questionId: questionId,
                replyName: replyName,
                commentId: commentId
            },
            function (res) {
                alert(res.message);
                if (res.code == 1) {
                    str += '<li>' +
                        '                                        <div class="userImg_2 inm"><img src="/cn/images/details_defaultImg.png" alt="">' +
                        '                                        </div>' +
                        '                                        <div class="reply_content_b inm">' +
                        '                                            <span class="reply_name inm ellipsis">' + curName + '</span>' +
                        '                                            <em class="inm">回复</em>' +
                        '                                            <span class="comment_name inm ellipsis">' + replyName + '</span>' +
                        '                                            <span class="replyText inm">' + content + '</span>' +
                        '                                        </div>' +
                        '                                        <div class="reply_time_info tr">' +
                        '                                            <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                        '                                            <span class="tiku_answer" onclick="replyB(this)">回复</span>' +
                        '                                        </div>' +
                        '                                        <!--内层输入框-->' +
                        '                                        <div class="innerInt_wrap">' +
                        '                                            <textarea class="replyInt_b"></textarea>' +
                        '                                            <div class="inner_handle tr">' +
                        '                                                <input type="button" class="no" onclick="replyB(this)" value="取消">' +
                        '                                                <input type="button" onclick="secondReply(this)" class="yes" value="回复">' +
                        '                                            </div>' +
                        '                                        </div>' +
                        '                                    </li>';
                }
                parentWrap.append(str);
                parentBox.find('.replyInt_b').val('');

            }, 'json');
    }

}

//时间格式化
function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
        + " " + date.getHours() + seperator2 + date.getMinutes()
        + seperator2 + date.getSeconds();
    return currentdate;

}
//时间戳转换为时间
function getMyDate(str){
    var oDate = new Date(str*1000),
        oYear = oDate.getFullYear(),
        oMonth = oDate.getMonth()+1,
        oDay = oDate.getDate(),
        oHour = oDate.getHours(),
        oMin = oDate.getMinutes(),
        oSen = oDate.getSeconds(),
        oTime = oYear +'-'+ getzf(oMonth) +'-'+ getzf(oDay) +' '+ getzf(oHour) +':'+ getzf(oMin) +':'+getzf(oSen);//最后拼接时间
    return oTime;
}
//补0操作
function getzf(num){
    if(parseInt(num) < 10){
        num = '0'+num;
    }
    return num;
}

//        公共计时器
function useTime() {
    var useTime = 0;
    var timer = setInterval(function () {
        useTime++;
        $('#useTime').val(useTime);

    }, 1000);
}


function closeW() {
    $(".wrong_mask").hide();
    $(".wrong").hide();
}
function showJiucuo() {
    $(".wrong_mask").show();
    $(".wrong").show();
}
function showDetails(o) {
    var sectionId=$(".z-w-nav01 ul li.on").find("input").val();
    var access=$(".s-w-nav02 ul li input:checked").val();
    var questionId=$(".s-w-timu ul li.on").find("input").val();
    $(o).addClass("on").siblings().removeClass("on");
    $.ajax({
        url:"/cn/api/select-topic",
        type:"post",
        data:{
            sectionId:sectionId,
            access:access,
            questionId:questionId
        },
        dataType:"json",
        success:function (data) {
            
        }
    });
}
// 数学公式编辑器上传图片需要

function showUrl(o) {
    var fd = new FormData();
    var file = $(o)[0].files[0];//获取文件名
    fd.append("imgFile", file);
    $.ajax({
        url: "/kindeditor/php/upload_json.php?dir=image",
        data: fd,
        type: "post",
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.error == 0) {
                $('.urlWrap').prev().val(data.url)
            } else {
                alert('上传失败');
                return false;
            }

        }
    });

}

/**
 * 纠错
 * @returns {boolean}
 * @constructor
 */
function ConfirmProblem() {
    var questionId=$('#questionId').val();
    var errorContent=$('.wrongContent').find("textarea").val();
    var errorType=$('.errorType').val();
    if(errorContent){
        $.ajax({
            url: "/cn/api/report-errors",
            type: "get",
            data: {
                questionId: questionId,
                errorContent: errorContent,
                errorType:errorType
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    alert(data.message);
                    $('.errorContent').val('');
                    closeW();
                } else if (data.code == 2) {
                    if (confirm(data.message)) {
                        location.href = "https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/questionl/" + questionId + ".html"
                    }
                }
            }
        });
    }else {
        alert('请输入你要提交的信息');
        return false;
    }

}
//    收藏题目
function collect(o) {
    var questionId=$('#questionId').val();
    $.ajax({
        url: "/cn/api/user-question-collection",
        dataType: "json",
        data: {
            questionId: questionId //问题ID
        },
        type: "POST",
        success: function (req) {
            alert(req.message);
            if (req.code == 1) {
                $(o).addClass('on');
            }
            if (req.code == 2) {
                $(o).removeClass('on');
            }

        }
    })
}

/**
 * 重新模考
 */
function jumpReload(o) {
    if(confirm("是否重新模考？重新模考之后，之前的记录是会被清除的哦！")){
        window.location.href=$(o).attr("data-href");
    }
}