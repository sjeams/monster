$(function () {
    useTime();
    // 选中答案（列表）
    $('.dk_select li').click(function () {
        $(this).addClass('selected').siblings('li').removeClass('selected');
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
            } else if (x > $(document).width() - $('#CalBar').outerWidth(true)*2+170) {
                x = $(document).width() - $('#CalBar').outerWidth(true)*2+170;
            }
            if (y < 0) {
                y = 0;
            } else if (y > $(document).height() - $('div.cal').outerHeight(true)) {
                y = $(document).height() - $('div.cal').outerHeight(true);
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
});
function wrongTopic (o) {
    $('.log_reg_zzc').show();
    $('.wrong').show();
}
function closeW() {
    $('.log_reg_zzc').hide();
    $('.wrong').hide();
}
function ConfirmProblem() {
    var questionId=$('#questionId').val();
    var errorContent=$('.errorContent').val();
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
//    下一题
function nextQuestion(o) {
    // testType=1 li结构
    // testType=2 radio结构
    // testType=3 checkbox结构
    // testType=4 填空结构
    // testType=5 阅读选句子结构
    var testType = $('#topicType').val();
    if (testType == 1) {
        var topicType = $('.dk_select').length;
        if (topicType == 1) {
            if ($('.dk_select li').hasClass('selected')) {
                singleAnswer();
            } else {
                alert('请先选择答案');
                return false;
            }

        }
        if (topicType == 2) {

            if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected')) {
                doubleAnswer();
            } else {
                alert('请先选择答案');
                return false;
            }

        }
        if (topicType == 3) {
            if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected') && $('.dk_select').eq(2).children('li').hasClass('selected')) {
                threeAnswer();
            } else {
                alert('请先选择答案');
                return false;
            }

        }
    }
    if (testType == 2) {
        if ($(".form_radio input[type='radio']").is(':checked')) {
            fiveCheck_one();
        } else {
            alert('请先选择答案');
            return false;
        }

    }
    if (testType == 3) {
        if ($(".form_check input[type='checkbox']").is(':checked')) {
            sixCheck_two();
        } else {
            alert('请先选择答案');
            return false;
        }

    }
    if (testType == 4) {
        if ($('#intAnswer').val()) {
            intAnswer();
        } else {
            alert('请先输入答案');
            return false;
        }

    }
    if (testType == 5) {
        if ($('.read_topic_left span').hasClass('sent-black')) {
            selectWord();

        } else {
            alert('请先选择答案');
            return false;

        }

    }


}

//    单选题
function singleAnswer() {
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer = $('#trueAnswer').val(); //当前正确答案
    var curAnswer_num = $('.dk_select li.selected').index();//当前选择的答案
    var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
//        答案对比
    pushData(curAnswer, trueAnswer, questionId, libId, useTime, whether);

}

//    双选题
function doubleAnswer() {
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer_split = $('#trueAnswer').val().split(/[,，]/); //当前正确答案&&正则区别中英文逗号分割
    var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    var arrAnswer = [answer_A, answer_B].join(" ");//用户选择的答案字符串
    var trueAnswer = [];
    $(trueAnswer_split).each(function (i, k) {
        return trueAnswer.push(k.replace(/(^\s*)|(\s*$)/g, ""));
    });//遍历去前后空格

    pushData(arrAnswer, trueAnswer.join(" "), questionId, libId, useTime, whether);
}

//    三选题
function threeAnswer() {
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer_split = $('#trueAnswer').val().split(/[,，]/); //当前正确答案&&正则区别中英文逗号分割
    var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    var answer_C = $('.dk_select').eq(2).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
    var arrAnswer = [answer_A, answer_B, answer_C].join(" ");//用户选择的答案字符串
    var trueAnswer = [];
    $(trueAnswer_split).each(function (i, k) {
        return trueAnswer.push(k.replace(/(^\s*)|(\s*$)/g, ""));
    });//遍历去前后空格
    pushData(arrAnswer, trueAnswer.join(" "), questionId, libId, useTime, whether);
}

//    5选1题型
function fiveCheck_one() {
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer = $('#trueAnswer').val(); //当前正确答案
    var curAnswer_num = $('input[name="answer"]:checked').parents('.label_row').index();//当前选择的答案
    var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
    pushData(curAnswer, trueAnswer, questionId, libId, useTime, whether);
}

//    6选2题型
function sixCheck_two() {
    var whether = '';
    var arrAnswer = [];
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer = $('#trueAnswer').val(); //当前正确答案
    $("input:checkbox[name='answer']:checked").each(function () { // 遍历name=answer的多选框
        var curAnswer_num = $(this).parents('.label_row').index();  // 每一个被选中项的值
        arrAnswer.push(getChar(curAnswer_num));//下标转换为字母
    });
    var curAnswer = arrAnswer.join("");
    pushData(curAnswer, trueAnswer, questionId, libId, useTime, whether);
}
// 去除填空字符串数字前后字符
function strToNum(str){
    if(str == ''){
        alert("字符串错误");
        return false;
    }
    // 头部字符串判断
    var ss = str.substr(0,1);
    if(isNaN(ss)){
        str = str.substr(1,str.length-1);
        str = strToNum(str);
    }
    //尾部字符串判断
    var ee = str.substr(str.length-1,1);
    if(isNaN(ee)){
        str = str.substr(0,str.length-1);
        str = strToNum(str);
    }
    return str;
}

//     填空题型
function intAnswer() {
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer = $('#trueAnswer').val().replace(/(^\s*)|(\s*$)/g, ""); //当前正确答案
    var curAnswer = $('#intAnswer').val().replace(/(^\s*)|(\s*$)/g, "");//下标转换为字母对比；
//        答案对比
    pushData(curAnswer, trueAnswer, questionId, libId, useTime, whether,'tiankong');
}

//    阅读选句子
function selectWord() {
    var reg = RegExp(/[\ +\r\n]|[\.\,\，\。\?\''\"\“\”]/g);//去字符串制表符、前后空格、标点，只做字符串比较;
    var reg2 = RegExp(/(^\s*)|(\s*$)/g);//去掉前后空格
    var whether = '';
    var questionId = $('#questionId').val();
    var libId = $('#libId').val();
    var useTime = $('#useTime').val();
    var trueAnswer = $('#trueAnswer').val().replace(reg2, ""); //当前正确答案
    var curAnswer = $('.read_topic_left span.sent-black').html().replace(reg2, "");//下标转换为字母对比；
    //        答案对比
    if (curAnswer.replace(reg, "") == trueAnswer.replace(reg, "")) {
        whether = 1;
    } else {
        whether = 2;
    }
    $.ajax({
        url: "/cn/api/sub-answer",
        dataType: "json",
        data: {
            questionId: questionId, //问题ID
            libId: libId, //题库ID
            answer: curAnswer, //答案
            useTime: useTime, //用时
            whether: whether //正确传1 错误传2
        },
        type: "POST",
        success: function (req) {
            if (req.code == 1) {
                location.reload();
            } else {
                alert(req.message);
            }
        }
    })
}

//公共答案对比&ajax通信
function pushData(curAnswer, trueAnswer, questionId, libId, useTime, whether, who) {
    //        答案对比
    if (curAnswer == trueAnswer) {
        whether = 1;
    } else {
        if(who=='tiankong'){
           if(strToNum(curAnswer)==strToNum(trueAnswer)){
               whether=1;
           }else{
               whether=2;
           }
        }else{
            whether = 2;
        }
    }
    $.ajax({
        url: "/cn/api/sub-answer",
        dataType: "json",
        data: {
            questionId: questionId, //问题ID
            libId: libId, //题库ID
            answer: curAnswer, //答案
            useTime: useTime, //用时
            whether: whether //正确传1 错误传2
        },
        type: "POST",
        success: function (req) {
            if (req.code == 1) {
                location.reload();
            } else {
                alert(req.message);
            }
        }
    })
}

//        公共计时器
function useTime() {
    var HH = 0;
    var mm = 0;
    var ss = 0;
    var str = '';
    var useTime = 0;
    var timer = setInterval(function () {
        str = "";
        useTime++;
        if (++ss == 60) {
            if (++mm == 60) {
                HH++;
                mm = 0;
            }
            ss = 0;
        }
        str += HH < 10 ? "0" + HH : HH;
        str += ":";
        str += mm < 10 ? "0" + mm : mm;
        str += ":";
        str += ss < 10 ? "0" + ss : ss;
        $('.test_time ').html(str);
        $('#useTime').val(useTime);
    }, 1000);
}

//        公共Quit弹窗打开&关闭
function examQuit() {
    $('.quit_wrap').fadeIn();
}

function quitClose() {
    $('.quit_wrap').hide();
}

function quitReback() {
    location.href = '/practice.html';
}

// 打开计算器
function calBtn() {
    $('#CalWrapper').removeClass('hide');
}

//        公共时间显示、隐藏
function shTime(o) {
    $(o).toggleClass('on');
    if ($(o).hasClass('on')) {
        $('.test_time').hide();
        $(o).html('<span>Show Time</span>');
    } else {
        $('.test_time').show();
        $(o).html('<span>Hide Time</span>');
    }
}

//    下标转换为字母
function getChar(i) {
    return (i + 10).toString(36).toUpperCase();
}