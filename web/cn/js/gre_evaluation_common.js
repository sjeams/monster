$(function () {
    useTime();
   setTimeout(function () {
       $("#nextQ-btn").bind("click",nextQuestion);
   },1000);
    $('.hide_time').click(function () {
        $(this).toggleClass('on');
        if($(this).hasClass('on')){
            $('.test_time').hide();
            if($(".old_time_show")){
                $('.old_time_show').hide();
            }
            $(this).html('<span>Show Time</span>');
        }else {
            if($(".old_time_show")){
                $('.old_time_show').show();
            }
            $('.test_time').show();
            $(this).html('<span>Hide Time</span>');
        }
    });
    //    计算器公共方法
    var Cal = {
        init: function () {
            var a = this;
            return a.end = 1, a.memory = 0, a.$CalWrapper = $("#CalWrapper"), 0 == a.$CalWrapper.size() ? !1 : (a.$CalBtnWrapper = $("#CalBtnWrapper"), a.$CalBar = $("#CalBar"), a.$CalInput = $("#CalInput"), a.$CalCancel = $("#CalCancel"), a.$CalCancel.click(function () {
                a.hide()
            }), void a.initialize())
        }, initialize: function () {
            var b = this;
            return b.$CalBtnWrapper.on("click", "a", function () {
                var a;
                return a = $(this).html(), b.btnAnswer(a)
            }), this.keybord();
        }, keybord: function () {
            var a = this;
            a.$CalWrapper.on("mouseover", function () {
                a.$CalWrapper.focus()
            }), a.$CalWrapper.on("keydown", function (a) {
                return 8 == a.keyCode ? !1 : void 0
            }), a.$CalWrapper.on("keyup", function (b) {
                var c;
                if (b.shiftKey) b.shiftKey && 56 == b.keyCode ? c = "*" : b.shiftKey && 187 == b.keyCode ? c = "+" : b.shiftKey && 105 == b.keyCode ? c = "(" : b.shiftKey && 104 == b.keyCode && (c = ")"); else if (48 == b.keyCode || 96 == b.keyCode) c = 0; else if (49 == b.keyCode || 97 == b.keyCode) c = 1; else if (50 == b.keyCode || 98 == b.keyCode) c = 2; else if (51 == b.keyCode || 99 == b.keyCode) c = 3; else if (52 == b.keyCode || 100 == b.keyCode) c = 4; else if (53 == b.keyCode || 101 == b.keyCode) c = 5; else if (54 == b.keyCode || 102 == b.keyCode) c = 6; else if (55 == b.keyCode || 103 == b.keyCode) c = 7; else if (56 == b.keyCode || 104 == b.keyCode) c = 8; else if (57 == b.keyCode || 105 == b.keyCode) c = 9; else if (106 == b.keyCode) c = "*"; else if (107 == b.keyCode) c = "+"; else if (106 == b.keyCode || 187 == b.keyCode || 13 == b.keyCode) c = "="; else if (109 == b.keyCode || 189 == b.keyCode) c = "-"; else if (110 == b.keyCode || 190 == b.keyCode) c = "."; else if (111 == b.keyCode || 191 == b.keyCode) c = "÷"; else if (8 == b.keyCode) return !1;
                (c || 0 == c) && a.btnAnswer(c)
            })
        }, hide: function (a) {
            return this.$CalWrapper.addClass("hide"), this.$CalInput.html("0"), this.end = 1
        }, btnAnswer: function (str) {
            var num, _this = this;
            switch (str) {
                case"MR":
                    return -1 === _this.$CalInput.html().search(/(\+|\-|\x|\÷)$/) ? _this.$CalInput.html(_this.memory) : _this.$CalInput.append(_this.memory);
                case"MC":
                    return _this.memory = 0;
                case"M+":
                    return str = _this.memory + "+" + _this.$CalInput.html(), num = eval(str), _this.memory = num, _this.end = 1, _this.$CalInput.html("0");
                case"C":
                    return _this.$CalInput.html("0"), _this.end = 1;
                case"CE":
                    return str = _this.$CalInput.html(), 1 == str.length ? (_this.$CalInput.html(0), _this.end = 1) : _this.$CalInput.html(str.substr(0, str.length - 1));
                case"±":
                    return str = _this.$CalInput.html().replace(/(x|÷)/g, function (a, b) {
                        return "x" === b ? "*" : "÷" === b ? "/" : void 0
                    }), str = str.replace(/(\+|\-|\x|\÷)$/, function () {
                        return ""
                    }), _this.$CalInput.html("-" + eval(str));
                case"√":
                    return str = _this.$CalInput.html().replace(/(x|÷)/g, function (a, b) {
                        return "x" === b ? "*" : "÷" === b ? "/" : void 0
                    }), str = str.replace(/(\+|\-|\*|\／)$/, function () {
                        return ""
                    }), _this.end = 1, _this.$CalInput.html(Math.sqrt(eval(str)));
                case"=":
                    return str = _this.$CalInput.html().replace(/(x|÷)/g, function (a, b) {
                        return "x" === b ? "*" : "÷" === b ? "/" : void 0
                    }), str = str.replace(/(\+|\-|\x|\÷)$/, function () {
                        return ""
                    }), _this.$CalInput.html(eval(str));
                default:
                    if (0 === _this.end) return -1 === _this.$CalInput.html().search(/(\+|\-|\x|\÷)$/) || "x" !== str && "+" !== str && "-" !== str && "÷" !== str ? _this.$CalInput.append(str) : _this.$CalInput.html(_this.$CalInput.html().substr(0, str.length) + str);
                    if ("x" !== str && "+" !== str && "-" !== str && "÷" !== str) return _this.end = 0, _this.$CalInput.html(str)
            }
        }
    };
    Cal.init();
    $('#CalBar').mousedown(function (e) {
        // e.pageX
        var positionDiv = $(this).offset();
        var distenceX = e.pageX - positionDiv.left;
        var distenceY = e.pageY - positionDiv.top;
        //alert(distenceX)
        // alert(positionDiv.left);
        $(document).mousemove(function (e) {
            var x = e.pageX - distenceX;
            var y = e.pageY - distenceY;
            if (x < 0) {
                x = 0;
            } else if (x > $(document).width() - $('div').outerWidth(true)) {
                x = $(document).width() - $('div').outerWidth(true);
            }
            if (y < 0) {
                y = 0;
            } else if (y > $(document).height() - $('div').outerHeight(true)) {
                y = $(document).height() - $('div').outerHeight(true);
            }
            $('#CalWrapper').css({
                'left': x + 'px',
                'top': y + 'px'
            });
        });
        $(document).mouseup(function () {
            $(document).off('mousemove');
        });
    });
    // 点击mark
    // $("#rad03").change(function () {
    //     var uid=$("#uid").val();
    //     var type=$("#type").val();
    //     var questionid=$("#questionid").val();
    //     var mark=0;
    //     if(this.checked){
    //         mark=1;
    //     }else{
    //         mark=0;
    //     }
    //     $.ajax({
    //         url:" /cn/api/do-mark",
    //         type:"post",
    //         data:{
    //             uid:uid,
    //             questionid:questionid,
    //             type:type,
    //             mark:mark
    //         },
    //         dataType:"json",
    //         success:function (data) {
    //             if(data.code==1){
    //
    //             }else{
    //                 alert(data.message);
    //             }
    //         }
    //     });
    // });
});
//        公共计时器 30分钟倒计时
function useTime() {
    var ss = $("#oldTime").val();
    var str = '';
    var useTime = $("#oldTime").val();
    var timer = setInterval(function () {
        str = "";
        useTime--;
        ss--;
        if(ss<0){
            $("#nextid").val(0);
            clearInterval(timer);
            nextQuestion();
            return false;
        }
        $('.test_time ').html(time_To_hhmmss(ss));
        $('#useTime').val(useTime);
    }, 1000);
}
/**
 *将秒转换为 hh:mm:ss
 *
 */
function time_To_hhmmss(seconds){
    var hh;
    var mm;
    var ss;
    //传入的时间为空或小于0
    if(seconds==null||seconds<0){
        return;
    }
    //得到小时
    hh=seconds/3600|0;
    seconds=parseInt(seconds)-hh*3600;
    if(parseInt(hh)<10){
        hh="0"+hh;
    }
    //得到分
    mm=seconds/60|0;
    //得到秒
    ss=parseInt(seconds)-mm*60;
    if(parseInt(mm)<10){
        mm="0"+mm;
    }
    if(ss<10){
        ss="0"+ss;
    }
    if(hh!=0){
        return hh+":"+mm+":"+ss;
    }else if(mm!=0){
        return "00:"+mm+":"+ss;
    }else if(ss!=0){
        return "00:"+"00:"+ss;
    }

}
//    下标转换为字母
function getChar(i) {
    return (i + 10).toString(36).toUpperCase();
}
// 打开计算器
function calBtn() {
    $('#CalWrapper').removeClass('hide');
}
//    下一题
function nextQuestion() {
    // testType=1 li结构
    // testType=2 radio结构
    // testType=3 checkbox结构
    // testType=4 填空结构
    // testType=5 阅读选句子结构
    var testType = $('#topicType').val();
    var oldtime=$("#useTime").val();//时间用完直接跳转到结果页
    if (testType == 1) {
        var topicType = $('.dk_select').length;
        if (topicType == 1) {
            if(oldtime==0){
                pushData('');
            }else{
                if ($('.dk_select li').hasClass('selected')) {
                    singleAnswer();
                } else {
                    alert('请先选择答案');
                    return false;
                }

            }

        }
        if (topicType == 2) {

           if(oldtime==0){
               pushData('');
           }else{
               if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected')) {
                   doubleAnswer();
               } else {
                   alert('请先选择答案');
                   return false;
               }
           }

        }
        if (topicType == 3) {
           if(oldtime==0){
               pushData('');
           }else{
               if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected') && $('.dk_select').eq(2).children('li').hasClass('selected')) {
                   threeAnswer();
               } else {
                   alert('请先选择答案');
                   return false;
               }
           }

        }
    }
    if (testType == 2) {
       if(oldtime==0){
           pushData('');
       }else{
           if ($(".form_radio input[type='radio']").is(':checked')) {
               fiveCheck_one();
           } else {
               alert('请先选择答案');
               return false;
           }
       }

    }
    if (testType == 3) {
        if(oldtime==0){
            pushData('');
        }else {
            if ($(".form_check input[type='checkbox']").is(':checked')) {
                sixCheck_two();
            } else {
                alert('请先选择答案');
                return false;
            }
        }

    }
    if (testType == 4) {
        if(oldtime==0){
            pushData('');
        }else {
            if ($('#intAnswer').val()) {
                intAnswer();
            } else {
                alert('请先输入答案');
                return false;
            }
        }

    }
    if (testType == 5) {
        if(oldtime==0){
            pushData('');
        }else {
            if ($('.read_topic_left span').hasClass('sent-black')) {
                selectWord();

            } else {
                alert('请先选择答案');
                return false;

            }
        }

    }


}

//    单选题
function singleAnswer() {
    var curAnswer_num = $('.dk_select li.selected').index();//当前选择的答案
    var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
//        答案对比
    pushData(curAnswer);

}

//    双选题
function doubleAnswer() {
    // var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    // var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    // var arrAnswer = [answer_A, answer_B].join(" ");//用户选择的答案字符串

    var answer_index1=$('.dk_select').eq(0).find('li.selected').index();
    var answer_index2=$('.dk_select').eq(1).find('li.selected').index();
    var index1_count = $('.dk_select').eq(0).find('li').length;
    var answer_zimu1=(answer_index1 + 10).toString(36).toUpperCase();
    var answer_zimu2=(answer_index2 + 10+index1_count).toString(36).toUpperCase();
    var arrAnswer=answer_zimu1+answer_zimu2;
    // alert(answer_zimu1+answer_zimu2);
    pushData(arrAnswer);
}

//    三选题
function threeAnswer() {
    // var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    // var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    // var answer_C = $('.dk_select').eq(2).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    // var arrAnswer = [answer_A, answer_B, answer_C].join(" ");//用户选择的答案字符串

    var answer_index1=$('.dk_select').eq(0).find('li.selected').index();
    var answer_index2=$('.dk_select').eq(1).find('li.selected').index();
    var answer_index3=$('.dk_select').eq(2).find('li.selected').index();
    var index1_count1 = $('.dk_select').eq(0).find('li').length;
    var index1_count2 = $('.dk_select').eq(1).find('li').length;
    var answer_zimu1=(answer_index1 + 10).toString(36).toUpperCase();
    var answer_zimu2=(answer_index2 + 10+ index1_count1).toString(36).toUpperCase();
    var answer_zimu3=(answer_index3 + 10 + index1_count2 + index1_count1).toString(36).toUpperCase();
    var arrAnswer=answer_zimu1+answer_zimu2+answer_zimu3;
    pushData(arrAnswer);
}

//    5选1题型
function fiveCheck_one() {
    var curAnswer_num = $('input[name="answer"]:checked').parents('.label_row').index();//当前选择的答案
    var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
    pushData(curAnswer);
}

//    6选2题型
function sixCheck_two() {
    var arrAnswer = [];
    $("input:checkbox[name='answer']:checked").each(function () { // 遍历name=answer的多选框
        var curAnswer_num = $(this).parents('.label_row').index();  // 每一个被选中项的值
        arrAnswer.push(getChar(curAnswer_num));//下标转换为字母
    });
    var curAnswer = arrAnswer.join("");
    pushData(curAnswer);
}

//     填空题型
function intAnswer() {
    var curAnswer = $('#intAnswer').val().replace(/(^\s*)|(\s*$)/g, "");//下标转换为字母对比；
    pushData(curAnswer);
}

//    阅读选句子
function selectWord() {
    var reg2 = RegExp(/(^\s*)|(\s*$)/g);//去掉前后空格
    var curAnswer = $('.read_topic_left span.sent-black').html().replace(reg2, "");//下标转换为字母对比；
    pushData(curAnswer);
}

//公共ajax通信
function pushData(userAnswer){
    var nextId=$("#nextid").val();
    var uid=$("#uid").val();
    var type=$("#type").val();
    var questionid=$("#questionid").val();
    var mark=0;
    var usetime=$("#useTime").val();
    var oldtime=$("#oldTime").val();
    // if($("#rad03")[0].checked){
    //     mark=1;
    // }else{
    //     mark=0;
    // }
    // alert(userAnswer);
    if(nextId==0){//没有下一题了
        $.ajax({
            url:"/cn/api/evaluation-over",
            type:"post",
            data:{
                uid:uid,
                questionid:questionid,
                type:type,
                mark:mark,
                hastime:usetime,
                answer:userAnswer,
                oldtime:oldtime
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    window.location.href="/evaluation_result/"+type+"-"+uid+".html";
                }else{
                    alert(data.message);
                }
            }
        });
    }else{
        $.ajax({
            url:"/cn/evaluation/write",
            type:"post",
            data:{
                id:questionid,
                type:type,
                uid:uid,
                mark:mark,
                hastime:usetime,
                answer:userAnswer,
                oldtime:oldtime
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    window.location.href="/evaluation_write/"+type+"-"+nextId+".html";
                }else{
                    alert(data.message);
                }
            }
        });
    }
}

/**
 * 退出保存按钮
 * @param o
 */
function quitSave(o) {
    var hastime=$('#useTime').val();
    var type=$("#type").val();
    var id=$("#questionid").val();
    var site=$(o).attr("data-site");
    var total=$(o).attr("data-total");
    var catid=$(o).attr("data-catid");
    window.location.href="/cn/evaluation/quit?type="+type+"&id="+id +
        "&site="+site+"&total="+total+"&catid="+catid+"&hastime="+hastime;
}

/**
 * 直接退出按钮
 * @param o
 */
function exitSectionA(o) {
    var hastime=$('#useTime').val();
    var type=$("#type").val();
    var id=$("#questionid").val();
    var site=$(o).attr("data-site");
    var total=$(o).attr("data-total");
    var catid=$(o).attr("data-catid");
    window.location.href="/cn/evaluation/exit-section?type="+type+"&id="+id +
        "&site="+site+"&total="+total+"&catid="+catid+"&hastime="+hastime;
}

/**
 * 帮助按钮
 * @param o
 */
function helpA(o) {
    var hastime=$('#useTime').val();
    var type=$("#type").val();
    var id=$("#questionid").val();
    window.location.href="/cn/evaluation/help?type="+type+"&id="+id +"&hastime="+hastime;
}