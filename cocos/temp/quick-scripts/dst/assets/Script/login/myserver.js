
                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/myserver.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'bfe2c9uBzZLZbQL4m1ej4tE', 'myserver');
// Script/login/myserver.js

"use strict";

var HttpHelper = require("http"); // var fs = require('fs'); // 引入fs模块
// var globaluserinfo = require("GlobaluserInfo");


var httpRequest = new HttpHelper();
cc.Class({
  "extends": cc.Component,
  properties: {
    editbox: cc.EditBox
  },
  onLoad: function onLoad() {
    // 操作文本--读取用户信息
    this.tokenlogin(); // 快捷登录
    // // 账号密码登录
    // this.login();
    //储存缓存
    // cc.sys.localStorage.setItem('token', value);
    // cc.sys.localStorage.getItem(key);
    // cc.sys.localStorage.removeItem(key);
  },
  tokenlogin: function tokenlogin() {
    // 获取本地json  信息
    // cc.loader.load( cc.url.raw("resources/login.json"),function(err,res){  
    cc.loader.loadRes('login.json', function (err, res) {
      //默认resources
      var json = res.json;
      var params = {
        'token': json.token
      };
      cc.log(json.token);
      var res = httpRequest.httpPost('http://www.monster.com/app/api-server/token-login', params, function (data) {
        cc.loader.release('resources/login.json'); //释放json 资源
        // if(cc.sys.isNative){  //  jsb.fileUtils不支持 web  读写
        //     jsb.fileUtils.writeStringToFile(data,token)
        // }
        // cc.log(data); 
        // 未登录弹出登录

        if (data.code == 0) {// this.loginbox.node.active = false;  // 进度隐藏
        }
      });
    });
  },
  login: function login() {
    var params = {
      'loginname': 'yincan1993',
      'password': 123456
    };
    httpRequest.httpPost('http://www.monster.com/app/api-server/login', params, function (data) {// cc.log(data); 
      //操作文本--修改用户信息
    });
  },
  btnClick1: function btnClick1(event, customEventData) {
    // 请求登录接口
    var params = {
      'loginname': 'yincan1993',
      'password': 123456,
      'serverid': 1
    }; // let httpRequest =  new HttpHelper();  

    httpRequest.httpPost('http://www.monster.com/app/api-server/user-login', params, function (data) {
      cc.log(data);

      if (data.code == 0) {// 登录失败，或本地数据失效
        // 弹窗
      } else {
        // 设置服务器
        cc.sys.localStorage.setItem('server', JSON.stringify(data.data.server));

        if (data.code == 1) {
          // 登录成功，进入游戏
          // cc.log(data.data.userinfo); 
          cc.sys.localStorage.setItem('userinfo', JSON.stringify(data.data.userinfo));
          cc.director.loadScene('model/dating'); // cc.sys.localStorage.setItem('userinfo', JSON.stringify(data.data.userinfo));
          // cc.sys.localStorage.getItem(key); //读取数据
        }

        if (data.code == 2) {
          // 登录成功，未定义角色
          // 进入定义角色界面     
          var server = JSON.parse(cc.sys.localStorage.getItem('server')); // cc.log(server); 
          // 创建角色

          cc.director.loadScene('register');
        }
      }
    }); //这里 event 是一个 Touch Event 对象，你可以通过 event.target 取到事件的发送节点
    // var node = event.target;
    // var button = node.getComponent(cc.Button);
    //这里的 customEventData 参数就等于你之前设置的 "click1 user data"
    // cc.log("node=", node.name, " event=", event.type, " data=", customEventData);
  },
  callback: function callback(event) {
    // cc.log(data)
    // var userCount =  cc.find("Canvas/ground/editbox_count").getComponent(cc.EditBox).string;
    // var userPassward =  cc.find("Canvas/ground/editbox_passward").getComponent(cc.EditBox).string;
    // console.log("用户账号："+userCount+ "用户密码："+ userPassward);
    // HttpHelp.login(userCount,userPassward,function(isSuccess,Data){
    //     var info = Data;
    //     if(true == isSuccess){
    //         console.log("login  success!!!");
    //         console.log(info);
    //         globaluserinfo.username = info.username;
    //         globaluserinfo.gamepoint = info.gamepoint;
    //         globaluserinfo.skey = info.skey;
    //         globaluserinfo.userid = info.userid;
    //         globaluserinfo.money = info.money;
    //         globaluserinfo.userid = info.userid;
    //         globaluserinfo.password = info.password;
    //         globaluserinfo.salt = info.salt;
    //         //登录成功后加载地图资源
    cc.director.loadScene('map'); //     }else{
    //         console.log("login  filed!!!")
    //     }
    // });
  },
  start: function start() {} // update (dt) {},

});

cc._RF.pop();
                    }
                    if (nodeEnv) {
                        __define(__module.exports, __require, __module);
                    }
                    else {
                        __quick_compile_project__.registerModuleFunc(__filename, function () {
                            __define(__module.exports, __require, __module);
                        });
                    }
                })();
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcbXlzZXJ2ZXIuanMiXSwibmFtZXMiOlsiSHR0cEhlbHBlciIsInJlcXVpcmUiLCJodHRwUmVxdWVzdCIsImNjIiwiQ2xhc3MiLCJDb21wb25lbnQiLCJwcm9wZXJ0aWVzIiwiZWRpdGJveCIsIkVkaXRCb3giLCJvbkxvYWQiLCJ0b2tlbmxvZ2luIiwibG9hZGVyIiwibG9hZFJlcyIsImVyciIsInJlcyIsImpzb24iLCJwYXJhbXMiLCJ0b2tlbiIsImxvZyIsImh0dHBQb3N0IiwiZGF0YSIsInJlbGVhc2UiLCJjb2RlIiwibG9naW4iLCJidG5DbGljazEiLCJldmVudCIsImN1c3RvbUV2ZW50RGF0YSIsInN5cyIsImxvY2FsU3RvcmFnZSIsInNldEl0ZW0iLCJKU09OIiwic3RyaW5naWZ5Iiwic2VydmVyIiwidXNlcmluZm8iLCJkaXJlY3RvciIsImxvYWRTY2VuZSIsInBhcnNlIiwiZ2V0SXRlbSIsImNhbGxiYWNrIiwic3RhcnQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQ0EsSUFBSUEsVUFBVSxHQUFHQyxPQUFPLENBQUMsTUFBRCxDQUF4QixFQUNBO0FBQ0E7OztBQUNBLElBQUlDLFdBQVcsR0FBSSxJQUFJRixVQUFKLEVBQW5CO0FBQ0FHLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRTtBQUNSQyxJQUFBQSxPQUFPLEVBQUVKLEVBQUUsQ0FBQ0s7QUFESixHQUhQO0FBT0xDLEVBQUFBLE1BQU0sRUFBRSxrQkFBWTtBQUVoQjtBQUNBLFNBQUtDLFVBQUwsR0FIZ0IsQ0FHRztBQUVuQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDSCxHQWxCSTtBQW9CTEEsRUFBQUEsVUFBVSxFQUFFLHNCQUFVO0FBQ2xCO0FBQ0E7QUFDQVAsSUFBQUEsRUFBRSxDQUFDUSxNQUFILENBQVVDLE9BQVYsQ0FBa0IsWUFBbEIsRUFB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O0FBQ1F0QixJQUFBQSxFQUFFLENBQUMrQixRQUFILENBQVlDLFNBQVosQ0FBc0IsS0FBdEIsRUFyQmUsQ0FzQnZCO0FBQ0E7QUFDQTtBQUNBO0FBRUgsR0EvSEk7QUFpSUxJLEVBQUFBLEtBaklLLG1CQWlJSSxDQUVSLENBbklJLENBcUlMOztBQXJJSyxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyJcclxudmFyIEh0dHBIZWxwZXIgPSByZXF1aXJlKFwiaHR0cFwiKTtcclxuLy8gdmFyIGZzID0gcmVxdWlyZSgnZnMnKTsgLy8g5byV5YWlZnPmqKHlnZdcclxuLy8gdmFyIGdsb2JhbHVzZXJpbmZvID0gcmVxdWlyZShcIkdsb2JhbHVzZXJJbmZvXCIpO1xyXG5sZXQgaHR0cFJlcXVlc3QgPSAgbmV3IEh0dHBIZWxwZXIoKTsgIFxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiBcclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICBlZGl0Ym94OiBjYy5FZGl0Qm94XHJcbiAgICB9LFxyXG4gXHJcbiAgICBvbkxvYWQ6IGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAgICAgLy8g5pON5L2c5paH5pysLS3or7vlj5bnlKjmiLfkv6Hmga9cclxuICAgICAgICB0aGlzLnRva2VubG9naW4oKTsgLy8g5b+r5o2355m75b2VXHJcblxyXG4gICAgICAgIC8vIC8vIOi0puWPt+WvhueggeeZu+W9lVxyXG4gICAgICAgIC8vIHRoaXMubG9naW4oKTtcclxuICAgICAgICAvL+WCqOWtmOe8k+WtmFxyXG4gICAgICAgIC8vIGNjLnN5cy5sb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndG9rZW4nLCB2YWx1ZSk7XHJcbiAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5nZXRJdGVtKGtleSk7XHJcbiAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5yZW1vdmVJdGVtKGtleSk7XHJcbiAgICB9LFxyXG4gICAgIFxyXG4gICAgdG9rZW5sb2dpbjogZnVuY3Rpb24oKXtcclxuICAgICAgICAvLyDojrflj5bmnKzlnLBqc29uICDkv6Hmga9cclxuICAgICAgICAvLyBjYy5sb2FkZXIubG9hZCggY2MudXJsLnJhdyhcInJlc291cmNlcy9sb2dpbi5qc29uXCIpLGZ1bmN0aW9uKGVycixyZXMpeyAgXHJcbiAgICAgICAgY2MubG9hZGVyLmxvYWRSZXMoJ2xvZ2luLmpzb24nLGZ1bmN0aW9uKGVycixyZXMpeyAgIC8v6buY6K6kcmVzb3VyY2VzXHJcbiAgICAgICAgICAgIGxldCBqc29uID0gcmVzLmpzb247XHJcbiAgICAgICAgICAgIHZhciBwYXJhbXMgPSB7XHJcbiAgICAgICAgICAgICAgICAndG9rZW4nOiBqc29uLnRva2VuLFxyXG4gICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICBjYy5sb2coanNvbi50b2tlbik7IFxyXG4gICAgICAgICAgICB2YXIgcmVzID0gaHR0cFJlcXVlc3QuaHR0cFBvc3QoJ2h0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2FwaS1zZXJ2ZXIvdG9rZW4tbG9naW4nLCBwYXJhbXMgLGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICBjYy5sb2FkZXIucmVsZWFzZSgncmVzb3VyY2VzL2xvZ2luLmpzb24nKTsgLy/ph4rmlL5qc29uIOi1hOa6kFxyXG4gICAgICAgICAgICAgICAgLy8gaWYoY2Muc3lzLmlzTmF0aXZlKXsgIC8vICBqc2IuZmlsZVV0aWxz5LiN5pSv5oyBIHdlYiAg6K+75YaZXHJcbiAgICAgICAgICAgICAgICAvLyAgICAganNiLmZpbGVVdGlscy53cml0ZVN0cmluZ1RvRmlsZShkYXRhLHRva2VuKVxyXG4gICAgICAgICAgICAgICAgLy8gfVxyXG4gICAgICAgICAgICAgICAgLy8gY2MubG9nKGRhdGEpOyBcclxuICAgICAgICAgICAgICAgIC8vIOacqueZu+W9leW8ueWHuueZu+W9lVxyXG4gICAgICAgICAgICAgICAgaWYoZGF0YS5jb2RlPT0wKXtcclxuICAgICAgICAgICAgICAgICAgICAvLyB0aGlzLmxvZ2luYm94Lm5vZGUuYWN0aXZlID0gZmFsc2U7ICAvLyDov5vluqbpmpDol49cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KVxyXG5cclxuICAgIH0sXHJcblxyXG4gICAgbG9naW46IGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgdmFyIHBhcmFtcyA9IHtcclxuICAgICAgICAgICAgJ2xvZ2lubmFtZSc6ICd5aW5jYW4xOTkzJyxcclxuICAgICAgICAgICAgJ3Bhc3N3b3JkJzogMTIzNDU2LFxyXG4gICAgICAgIH07XHJcbiAgICAgICAgaHR0cFJlcXVlc3QuaHR0cFBvc3QoJ2h0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2FwaS1zZXJ2ZXIvbG9naW4nLCBwYXJhbXMgLGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgIC8vIGNjLmxvZyhkYXRhKTsgXHJcbiAgICAgICAgICAgIC8v5pON5L2c5paH5pysLS3kv67mlLnnlKjmiLfkv6Hmga9cclxuICAgICAgICB9KTtcclxuXHJcbiAgICB9LFxyXG5cclxuICAgIGJ0bkNsaWNrMTogZnVuY3Rpb24gKGV2ZW50LCBjdXN0b21FdmVudERhdGEpIHtcclxuXHJcbiAgICAgICAgLy8g6K+35rGC55m75b2V5o6l5Y+jXHJcbiAgICAgICAgdmFyIHBhcmFtcyA9IHtcclxuICAgICAgICAgICAgICAgICdsb2dpbm5hbWUnOiAneWluY2FuMTk5MycsXHJcbiAgICAgICAgICAgICAgICAncGFzc3dvcmQnOiAxMjM0NTYsXHJcbiAgICAgICAgICAgICAgICAnc2VydmVyaWQnOiAxLFxyXG4gICAgICAgIH07XHJcblxyXG5cclxuICAgICAgICAvLyBsZXQgaHR0cFJlcXVlc3QgPSAgbmV3IEh0dHBIZWxwZXIoKTsgIFxyXG4gICAgICAgIGh0dHBSZXF1ZXN0Lmh0dHBQb3N0KCdodHRwOi8vd3d3Lm1vbnN0ZXIuY29tL2FwcC9hcGktc2VydmVyL3VzZXItbG9naW4nLCBwYXJhbXMgLGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgIGNjLmxvZyhkYXRhKTsgXHJcbiAgICAgICAgICAgIGlmKGRhdGEuY29kZT09MCl7IC8vIOeZu+W9leWksei0pe+8jOaIluacrOWcsOaVsOaNruWkseaViFxyXG4gICAgICAgICAgICAgICAgLy8g5by556qXXHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgLy8g6K6+572u5pyN5Yqh5ZmoXHJcbiAgICAgICAgICAgICAgICBjYy5zeXMubG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3NlcnZlcicsIEpTT04uc3RyaW5naWZ5KGRhdGEuZGF0YS5zZXJ2ZXIpKTtcclxuICAgICAgICAgICAgICAgIGlmKGRhdGEuY29kZT09MSl7Ly8g55m75b2V5oiQ5Yqf77yM6L+b5YWl5ri45oiPXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gY2MubG9nKGRhdGEuZGF0YS51c2VyaW5mbyk7IFxyXG4gICAgICAgICAgICAgICAgICAgIGNjLnN5cy5sb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndXNlcmluZm8nLCBKU09OLnN0cmluZ2lmeShkYXRhLmRhdGEudXNlcmluZm8pKTsgXHJcbiAgICAgICAgICAgICAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdtb2RlbC9kYXRpbmcnKTtcclxuICAgICAgICAgICAgICAgICAgICAvLyBjYy5zeXMubG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3VzZXJpbmZvJywgSlNPTi5zdHJpbmdpZnkoZGF0YS5kYXRhLnVzZXJpbmZvKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5nZXRJdGVtKGtleSk7IC8v6K+75Y+W5pWw5o2uXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBpZihkYXRhLmNvZGU9PTIpeyAvLyDnmbvlvZXmiJDlip/vvIzmnKrlrprkuYnop5LoibJcclxuICAgICAgICAgICAgICAgICAgICAvLyDov5vlhaXlrprkuYnop5LoibLnlYzpnaIgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIHZhciBzZXJ2ZXIgPSBKU09OLnBhcnNlKGNjLnN5cy5sb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnc2VydmVyJykpO1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIGNjLmxvZyhzZXJ2ZXIpOyBcclxuICAgICAgICAgICAgICAgICAgICAvLyDliJvlu7rop5LoibJcclxuICAgICAgICAgICAgICAgICAgICBjYy5kaXJlY3Rvci5sb2FkU2NlbmUoJ3JlZ2lzdGVyJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgXHJcbiAgICAgICAgLy/ov5nph4wgZXZlbnQg5piv5LiA5LiqIFRvdWNoIEV2ZW50IOWvueixoe+8jOS9oOWPr+S7pemAmui/hyBldmVudC50YXJnZXQg5Y+W5Yiw5LqL5Lu255qE5Y+R6YCB6IqC54K5XHJcbiAgICAgICAgLy8gdmFyIG5vZGUgPSBldmVudC50YXJnZXQ7XHJcbiAgICAgICAgLy8gdmFyIGJ1dHRvbiA9IG5vZGUuZ2V0Q29tcG9uZW50KGNjLkJ1dHRvbik7XHJcbiAgICAgICAgLy/ov5nph4znmoQgY3VzdG9tRXZlbnREYXRhIOWPguaVsOWwseetieS6juS9oOS5i+WJjeiuvue9rueahCBcImNsaWNrMSB1c2VyIGRhdGFcIlxyXG4gICAgICAgIC8vIGNjLmxvZyhcIm5vZGU9XCIsIG5vZGUubmFtZSwgXCIgZXZlbnQ9XCIsIGV2ZW50LnR5cGUsIFwiIGRhdGE9XCIsIGN1c3RvbUV2ZW50RGF0YSk7XHJcbiAgICB9LFxyXG5cclxuICAgIGNhbGxiYWNrOiBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAvLyBjYy5sb2coZGF0YSlcclxuICAgICAgICAvLyB2YXIgdXNlckNvdW50ID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfY291bnRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyB2YXIgdXNlclBhc3N3YXJkID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfcGFzc3dhcmRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyBjb25zb2xlLmxvZyhcIueUqOaIt+i0puWPt++8mlwiK3VzZXJDb3VudCsgXCLnlKjmiLflr4bnoIHvvJpcIisgdXNlclBhc3N3YXJkKTtcclxuICAgICAgICAvLyBIdHRwSGVscC5sb2dpbih1c2VyQ291bnQsdXNlclBhc3N3YXJkLGZ1bmN0aW9uKGlzU3VjY2VzcyxEYXRhKXtcclxuICAgICAgICAvLyAgICAgdmFyIGluZm8gPSBEYXRhO1xyXG4gICAgICAgIC8vICAgICBpZih0cnVlID09IGlzU3VjY2Vzcyl7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBzdWNjZXNzISEhXCIpO1xyXG4gICAgICAgIC8vICAgICAgICAgY29uc29sZS5sb2coaW5mbyk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VybmFtZSA9IGluZm8udXNlcm5hbWU7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5nYW1lcG9pbnQgPSBpbmZvLmdhbWVwb2ludDtcclxuICAgICAgICAvLyAgICAgICAgIGdsb2JhbHVzZXJpbmZvLnNrZXkgPSBpbmZvLnNrZXk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VyaWQgPSBpbmZvLnVzZXJpZDtcclxuIFxyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8ubW9uZXkgPSBpbmZvLm1vbmV5O1xyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8udXNlcmlkID0gaW5mby51c2VyaWQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5wYXNzd29yZCA9IGluZm8ucGFzc3dvcmQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5zYWx0ID0gaW5mby5zYWx0O1xyXG4gXHJcbiAgICAgICAgLy8gICAgICAgICAvL+eZu+W9leaIkOWKn+WQjuWKoOi9veWcsOWbvui1hOa6kFxyXG4gICAgICAgICAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdtYXAnKTtcclxuICAgICAgICAvLyAgICAgfWVsc2V7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBmaWxlZCEhIVwiKVxyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgXHJcbiAgICB9LFxyXG4gXHJcbiAgICBzdGFydCAoKSB7XHJcbiBcclxuICAgIH0sXHJcbiBcclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG59KTtcclxuIl19