"use strict";
cc._RF.push(module, 'bfe2c9uBzZLZbQL4m1ej4tE', 'myserver');
// Script/myserver.js

"use strict";

var HttpHelp = require("http");
// var globaluserinfo = require("GlobaluserInfo");

cc.Class({
   extends: cc.Component,

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
      cc.director.loadScene('map');
      //     }else{
      //         console.log("login  filed!!!")
      //     }
      // });
   },

   start: function start() {}
}

// update (dt) {},
);

cc._RF.pop();