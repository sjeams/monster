
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

var HttpHelp = require("http"); // var globaluserinfo = require("GlobaluserInfo");


cc.Class({
  "extends": cc.Component,
  properties: {
    editbox: cc.EditBox
  },
  onLoad: function onLoad() {
    cc.find("Canvas/ground/confir").on('click', this.callback, this);
  },
  callback: function callback(event) {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcbXlzZXJ2ZXIuanMiXSwibmFtZXMiOlsiSHR0cEhlbHAiLCJyZXF1aXJlIiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJlZGl0Ym94IiwiRWRpdEJveCIsIm9uTG9hZCIsImZpbmQiLCJvbiIsImNhbGxiYWNrIiwiZXZlbnQiLCJkaXJlY3RvciIsImxvYWRTY2VuZSIsInN0YXJ0Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7OztBQUNBLElBQUlBLFFBQVEsR0FBR0MsT0FBTyxDQUFDLE1BQUQsQ0FBdEIsRUFDQTs7O0FBRUFDLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRTtBQUNSQyxJQUFBQSxPQUFPLEVBQUVKLEVBQUUsQ0FBQ0s7QUFESixHQUhQO0FBT0xDLEVBQUFBLE1BQU0sRUFBRSxrQkFBWTtBQUNoQk4sSUFBQUEsRUFBRSxDQUFDTyxJQUFILENBQVEsc0JBQVIsRUFBZ0NDLEVBQWhDLENBQW1DLE9BQW5DLEVBQTRDLEtBQUtDLFFBQWpELEVBQTJELElBQTNEO0FBQ0gsR0FUSTtBQVdMQSxFQUFBQSxRQUFRLEVBQUUsa0JBQVVDLEtBQVYsRUFBaUI7QUFDdkI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNRVixJQUFBQSxFQUFFLENBQUNXLFFBQUgsQ0FBWUMsU0FBWixDQUFzQixLQUF0QixFQXBCZSxDQXFCdkI7QUFDQTtBQUNBO0FBQ0E7QUFFSCxHQXJDSTtBQXVDTEMsRUFBQUEsS0F2Q0ssbUJBdUNJLENBRVIsQ0F6Q0ksQ0EyQ0w7O0FBM0NLLENBQVQiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbIlxyXG52YXIgSHR0cEhlbHAgPSByZXF1aXJlKFwiaHR0cFwiKTtcclxuLy8gdmFyIGdsb2JhbHVzZXJpbmZvID0gcmVxdWlyZShcIkdsb2JhbHVzZXJJbmZvXCIpO1xyXG5cclxuY2MuQ2xhc3Moe1xyXG4gICAgZXh0ZW5kczogY2MuQ29tcG9uZW50LFxyXG4gXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgZWRpdGJveDogY2MuRWRpdEJveFxyXG4gICAgfSxcclxuIFxyXG4gICAgb25Mb2FkOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgY2MuZmluZChcIkNhbnZhcy9ncm91bmQvY29uZmlyXCIpLm9uKCdjbGljaycsIHRoaXMuY2FsbGJhY2ssIHRoaXMpO1xyXG4gICAgfSxcclxuICAgICBcclxuICAgIGNhbGxiYWNrOiBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAvLyB2YXIgdXNlckNvdW50ID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfY291bnRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyB2YXIgdXNlclBhc3N3YXJkID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfcGFzc3dhcmRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyBjb25zb2xlLmxvZyhcIueUqOaIt+i0puWPt++8mlwiK3VzZXJDb3VudCsgXCLnlKjmiLflr4bnoIHvvJpcIisgdXNlclBhc3N3YXJkKTtcclxuICAgICAgICAvLyBIdHRwSGVscC5sb2dpbih1c2VyQ291bnQsdXNlclBhc3N3YXJkLGZ1bmN0aW9uKGlzU3VjY2VzcyxEYXRhKXtcclxuICAgICAgICAvLyAgICAgdmFyIGluZm8gPSBEYXRhO1xyXG4gICAgICAgIC8vICAgICBpZih0cnVlID09IGlzU3VjY2Vzcyl7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBzdWNjZXNzISEhXCIpO1xyXG4gICAgICAgIC8vICAgICAgICAgY29uc29sZS5sb2coaW5mbyk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VybmFtZSA9IGluZm8udXNlcm5hbWU7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5nYW1lcG9pbnQgPSBpbmZvLmdhbWVwb2ludDtcclxuICAgICAgICAvLyAgICAgICAgIGdsb2JhbHVzZXJpbmZvLnNrZXkgPSBpbmZvLnNrZXk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VyaWQgPSBpbmZvLnVzZXJpZDtcclxuIFxyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8ubW9uZXkgPSBpbmZvLm1vbmV5O1xyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8udXNlcmlkID0gaW5mby51c2VyaWQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5wYXNzd29yZCA9IGluZm8ucGFzc3dvcmQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5zYWx0ID0gaW5mby5zYWx0O1xyXG4gXHJcbiAgICAgICAgLy8gICAgICAgICAvL+eZu+W9leaIkOWKn+WQjuWKoOi9veWcsOWbvui1hOa6kFxyXG4gICAgICAgICAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdtYXAnKTtcclxuICAgICAgICAvLyAgICAgfWVsc2V7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBmaWxlZCEhIVwiKVxyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgXHJcbiAgICB9LFxyXG4gXHJcbiAgICBzdGFydCAoKSB7XHJcbiBcclxuICAgIH0sXHJcbiBcclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG59KTtcclxuIl19