(function() {"use strict";var __module = CC_EDITOR ? module : {exports:{}};var __filename = 'preview-scripts/assets/Script/login/myserver.js';var __require = CC_EDITOR ? function (request) {return cc.require(request, require);} : function (request) {return cc.require(request, __filename);};function __define (exports, require, module) {"use strict";
cc._RF.push(module, 'bfe2c9uBzZLZbQL4m1ej4tE', 'myserver', __filename);
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
        }
        if (CC_EDITOR) {
            __define(__module.exports, __require, __module);
        }
        else {
            cc.registerModuleFunc(__filename, function () {
                __define(__module.exports, __require, __module);
            });
        }
        })();
        //# sourceMappingURL=myserver.js.map
        