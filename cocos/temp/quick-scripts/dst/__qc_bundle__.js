
                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/__qc_index__.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}
require('./assets/Script/commonjs/alert');
require('./assets/Script/login/Alert');
require('./assets/Script/login/ProgressBarScript');
require('./assets/Script/login/SpriteTextTool');
require('./assets/Script/login/background');
require('./assets/Script/login/http');
require('./assets/Script/login/jspfile');
require('./assets/Script/login/loading');
require('./assets/Script/login/myserver');
require('./assets/Script/login/popup_dlg');
require('./assets/Script/login/role');
require('./assets/Script/scence/loadin_fist');
require('./assets/Script/scence/wap');

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
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/background.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'e483aavH0JDcYCPFVIozWXt', 'background');
// Script/login/background.js

"use strict";

// Learn cc.Class:
//  - [Chinese] https://docs.cocos.com/creator/manual/zh/scripting/class.html
//  - [English] http://docs.cocos2d-x.org/creator/manual/en/scripting/class.html
// Learn Attribute:
//  - [Chinese] https://docs.cocos.com/creator/manual/zh/scripting/reference/attributes.html
//  - [English] http://docs.cocos2d-x.org/creator/manual/en/scripting/reference/attributes.html
// Learn life-cycle callbacks:
//  - [Chinese] https://docs.cocos.com/creator/manual/zh/scripting/life-cycle-callbacks.html
//  - [English] https://www.cocos2d-x.org/docs/creator/manual/en/scripting/life-cycle-callbacks.html
cc.Class({
  "extends": cc.Component,
  properties: {// foo: {
    //     // ATTRIBUTES:
    //     default: null,        // The default value will be used only when the component attaching
    //                           // to a node for the first time
    //     type: cc.SpriteFrame, // optional, default is typeof default
    //     serializable: true,   // optional, default is true
    // },
    // bar: {
    //     get () {
    //         return this._bar;
    //     },
    //     set (value) {
    //         this._bar = value;
    //     }
    // },
  },
  // LIFE-CYCLE CALLBACKS:
  onLoad: function onLoad() {// this.loadingBackground();
  },
  start: function start() {},
  // update (dt) {},
  loadingBackground: function loadingBackground() {
    // 下载资源包
    // 远程 url 带图片后缀名
    var remoteUrl = "http://127.0.0.1/ceshi.php?url=http://www.monster.com/app/loading/loading.jpg";
    var self = this; // cc.loader.load(remoteUrl, function (err, texture) {

    cc.loader.load({
      url: remoteUrl,
      type: 'jpg'
    }, function (err, texture) {
      //   直接释放某个贴图
      // cc.loader.release(texture);
      // // 释放一个 prefab 以及所有它依赖的资源
      // var deps = cc.loader.getDependsRecursively('url_photo');
      // cc.loader.release(deps);
      // // 如果在这个 prefab 中有一些和场景其他部分共享的资源，你不希望它们被释放，有两种方法：
      // // 1. 显式声明禁止某个资源的自动释放
      // cc.loader.setAutoRelease(this.background, false);
      // // 2. 将这个资源从依赖列表中删除
      // var deps = cc.loader.getDependsRecursively('url_photo');
      // var index = deps.indexOf(this.background);
      // if (index !== -1)
      //     deps.splice(index, 1);
      // cc.loader.release(deps);
      // this.node.getComponent(cc.Sprite).spriteFrame = new cc.SpriteFrame(texture)
      //  // 改用 cc.url.raw，此时需要声明 resources 目录和文件后缀名
      // //  var realUrl = cc.url.raw("loading");
      // //  var texture = cc.textureCache.addImage(realUrl);
      // console.log( texture);    
      self.node.getComponent(cc.Sprite).spriteFrame = new cc.SpriteFrame(texture); // self.node.spriteFrame.setTexture(texture.url);
      // self.node.spriteFrame.setContentSize(res.getContentSize());
    });
  }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcYmFja2dyb3VuZC5qcyJdLCJuYW1lcyI6WyJjYyIsIkNsYXNzIiwiQ29tcG9uZW50IiwicHJvcGVydGllcyIsIm9uTG9hZCIsInN0YXJ0IiwibG9hZGluZ0JhY2tncm91bmQiLCJyZW1vdGVVcmwiLCJzZWxmIiwibG9hZGVyIiwibG9hZCIsInVybCIsInR5cGUiLCJlcnIiLCJ0ZXh0dXJlIiwibm9kZSIsImdldENvbXBvbmVudCIsIlNwcml0ZSIsInNwcml0ZUZyYW1lIiwiU3ByaXRlRnJhbWUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRSxDQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWZRLEdBSFA7QUFxQkw7QUFFQUMsRUFBQUEsTUF2Qkssb0JBdUJLLENBQ047QUFDSCxHQXpCSTtBQTJCTEMsRUFBQUEsS0EzQkssbUJBMkJJLENBRVIsQ0E3Qkk7QUErQkw7QUFFQUMsRUFBQUEsaUJBQWlCLEVBQUUsNkJBQVU7QUFDVDtBQUNaO0FBQ0EsUUFBSUMsU0FBUyxHQUFHLDZFQUFoQjtBQUNBLFFBQUlDLElBQUksR0FBRyxJQUFYLENBSnFCLENBS3JCOztBQUNBUixJQUFBQSxFQUFFLENBQUNTLE1BQUgsQ0FBVUMsSUFBVixDQUFlO0FBQUVDLE1BQUFBLEdBQUcsRUFBRUosU0FBUDtBQUFrQkssTUFBQUEsSUFBSSxFQUFFO0FBQXhCLEtBQWYsRUFBZ0QsVUFBVUMsR0FBVixFQUFlQyxPQUFmLEVBQXdCO0FBRXBFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBUUpOLE1BQUFBLElBQUksQ0FBQ08sSUFBTCxDQUFVQyxZQUFWLENBQXVCaEIsRUFBRSxDQUFDaUIsTUFBMUIsRUFBa0NDLFdBQWxDLEdBQWdELElBQUlsQixFQUFFLENBQUNtQixXQUFQLENBQW1CTCxPQUFuQixDQUFoRCxDQTdCd0UsQ0E4QnhFO0FBQ0E7QUFHQyxLQWxDRDtBQW1DUDtBQTFFSSxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyBMZWFybiBjYy5DbGFzczpcclxuLy8gIC0gW0NoaW5lc2VdIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvemgvc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gIC0gW0VuZ2xpc2hdIGh0dHA6Ly9kb2NzLmNvY29zMmQteC5vcmcvY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBbQ2hpbmVzZV0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC96aC9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyAgLSBbRW5nbGlzaF0gaHR0cDovL2RvY3MuY29jb3MyZC14Lm9yZy9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyBMZWFybiBsaWZlLWN5Y2xlIGNhbGxiYWNrczpcclxuLy8gIC0gW0NoaW5lc2VdIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvemgvc2NyaXB0aW5nL2xpZmUtY3ljbGUtY2FsbGJhY2tzLmh0bWxcclxuLy8gIC0gW0VuZ2xpc2hdIGh0dHBzOi8vd3d3LmNvY29zMmQteC5vcmcvZG9jcy9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvbGlmZS1jeWNsZS1jYWxsYmFja3MuaHRtbFxyXG5cclxuY2MuQ2xhc3Moe1xyXG4gICAgZXh0ZW5kczogY2MuQ29tcG9uZW50LFxyXG5cclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICAvLyBmb286IHtcclxuICAgICAgICAvLyAgICAgLy8gQVRUUklCVVRFUzpcclxuICAgICAgICAvLyAgICAgZGVmYXVsdDogbnVsbCwgICAgICAgIC8vIFRoZSBkZWZhdWx0IHZhbHVlIHdpbGwgYmUgdXNlZCBvbmx5IHdoZW4gdGhlIGNvbXBvbmVudCBhdHRhY2hpbmdcclxuICAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIHRvIGEgbm9kZSBmb3IgdGhlIGZpcnN0IHRpbWVcclxuICAgICAgICAvLyAgICAgdHlwZTogY2MuU3ByaXRlRnJhbWUsIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHR5cGVvZiBkZWZhdWx0XHJcbiAgICAgICAgLy8gICAgIHNlcmlhbGl6YWJsZTogdHJ1ZSwgICAvLyBvcHRpb25hbCwgZGVmYXVsdCBpcyB0cnVlXHJcbiAgICAgICAgLy8gfSxcclxuICAgICAgICAvLyBiYXI6IHtcclxuICAgICAgICAvLyAgICAgZ2V0ICgpIHtcclxuICAgICAgICAvLyAgICAgICAgIHJldHVybiB0aGlzLl9iYXI7XHJcbiAgICAgICAgLy8gICAgIH0sXHJcbiAgICAgICAgLy8gICAgIHNldCAodmFsdWUpIHtcclxuICAgICAgICAvLyAgICAgICAgIHRoaXMuX2JhciA9IHZhbHVlO1xyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSxcclxuICAgIH0sXHJcblxyXG4gICAgLy8gTElGRS1DWUNMRSBDQUxMQkFDS1M6XHJcblxyXG4gICAgb25Mb2FkICgpIHtcclxuICAgICAgICAvLyB0aGlzLmxvYWRpbmdCYWNrZ3JvdW5kKCk7XHJcbiAgICB9LFxyXG5cclxuICAgIHN0YXJ0ICgpIHtcclxuXHJcbiAgICB9LFxyXG5cclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG5cclxuICAgIGxvYWRpbmdCYWNrZ3JvdW5kOiBmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyDkuIvovb3otYTmupDljIVcclxuICAgICAgICAgICAgLy8g6L+c56iLIHVybCDluKblm77niYflkI7nvIDlkI1cclxuICAgICAgICAgICAgdmFyIHJlbW90ZVVybCA9IFwiaHR0cDovLzEyNy4wLjAuMS9jZXNoaS5waHA/dXJsPWh0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9sb2FkaW5nL2xvYWRpbmcuanBnXCI7XHJcbiAgICAgICAgICAgIHZhciBzZWxmID0gdGhpcztcclxuICAgICAgICAgICAgLy8gY2MubG9hZGVyLmxvYWQocmVtb3RlVXJsLCBmdW5jdGlvbiAoZXJyLCB0ZXh0dXJlKSB7XHJcbiAgICAgICAgICAgIGNjLmxvYWRlci5sb2FkKHsgdXJsOiByZW1vdGVVcmwsIHR5cGU6ICdqcGcnIH0sIGZ1bmN0aW9uIChlcnIsIHRleHR1cmUpIHsgIFxyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIC8vICAg55u05o6l6YeK5pS+5p+Q5Liq6LS05Zu+XHJcbiAgICAgICAgICAgICAgICAvLyBjYy5sb2FkZXIucmVsZWFzZSh0ZXh0dXJlKTtcclxuICAgICAgICAgICAgICAgIC8vIC8vIOmHiuaUvuS4gOS4qiBwcmVmYWIg5Lul5Y+K5omA5pyJ5a6D5L6d6LWW55qE6LWE5rqQXHJcbiAgICAgICAgICAgICAgICAvLyB2YXIgZGVwcyA9IGNjLmxvYWRlci5nZXREZXBlbmRzUmVjdXJzaXZlbHkoJ3VybF9waG90bycpO1xyXG4gICAgICAgICAgICAgICAgLy8gY2MubG9hZGVyLnJlbGVhc2UoZGVwcyk7XHJcbiAgICAgICAgICAgICAgICAvLyAvLyDlpoLmnpzlnKjov5nkuKogcHJlZmFiIOS4reacieS4gOS6m+WSjOWcuuaZr+WFtuS7lumDqOWIhuWFseS6q+eahOi1hOa6kO+8jOS9oOS4jeW4jOacm+Wug+S7rOiiq+mHiuaUvu+8jOacieS4pOenjeaWueazle+8mlxyXG4gICAgICAgICAgICAgICAgLy8gLy8gMS4g5pi+5byP5aOw5piO56aB5q2i5p+Q5Liq6LWE5rqQ55qE6Ieq5Yqo6YeK5pS+XHJcbiAgICAgICAgICAgICAgICAvLyBjYy5sb2FkZXIuc2V0QXV0b1JlbGVhc2UodGhpcy5iYWNrZ3JvdW5kLCBmYWxzZSk7XHJcbiAgICAgICAgICAgICAgICAvLyAvLyAyLiDlsIbov5nkuKrotYTmupDku47kvp3otZbliJfooajkuK3liKDpmaRcclxuICAgICAgICAgICAgICAgIC8vIHZhciBkZXBzID0gY2MubG9hZGVyLmdldERlcGVuZHNSZWN1cnNpdmVseSgndXJsX3Bob3RvJyk7XHJcbiAgICAgICAgICAgICAgICAvLyB2YXIgaW5kZXggPSBkZXBzLmluZGV4T2YodGhpcy5iYWNrZ3JvdW5kKTtcclxuICAgICAgICAgICAgICAgIC8vIGlmIChpbmRleCAhPT0gLTEpXHJcbiAgICAgICAgICAgICAgICAvLyAgICAgZGVwcy5zcGxpY2UoaW5kZXgsIDEpO1xyXG4gICAgICAgICAgICAgICAgLy8gY2MubG9hZGVyLnJlbGVhc2UoZGVwcyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gdGhpcy5ub2RlLmdldENvbXBvbmVudChjYy5TcHJpdGUpLnNwcml0ZUZyYW1lID0gbmV3IGNjLlNwcml0ZUZyYW1lKHRleHR1cmUpXHJcbiAgICAgICAgICAgICAgICAvLyAgLy8g5pS555SoIGNjLnVybC5yYXfvvIzmraTml7bpnIDopoHlo7DmmI4gcmVzb3VyY2VzIOebruW9leWSjOaWh+S7tuWQjue8gOWQjVxyXG4gICAgICAgICAgICAgICAgLy8gLy8gIHZhciByZWFsVXJsID0gY2MudXJsLnJhdyhcImxvYWRpbmdcIik7XHJcbiAgICAgICAgICAgICAgICAvLyAvLyAgdmFyIHRleHR1cmUgPSBjYy50ZXh0dXJlQ2FjaGUuYWRkSW1hZ2UocmVhbFVybCk7XHJcbiAgICAgICAgICAgICAgICAvLyBjb25zb2xlLmxvZyggdGV4dHVyZSk7ICAgIFxyXG5cclxuXHJcblxyXG5cclxuXHJcblxyXG5cclxuICAgICAgICAgICAgc2VsZi5ub2RlLmdldENvbXBvbmVudChjYy5TcHJpdGUpLnNwcml0ZUZyYW1lID0gbmV3IGNjLlNwcml0ZUZyYW1lKHRleHR1cmUpXHJcbiAgICAgICAgICAgIC8vIHNlbGYubm9kZS5zcHJpdGVGcmFtZS5zZXRUZXh0dXJlKHRleHR1cmUudXJsKTtcclxuICAgICAgICAgICAgLy8gc2VsZi5ub2RlLnNwcml0ZUZyYW1lLnNldENvbnRlbnRTaXplKHJlcy5nZXRDb250ZW50U2l6ZSgpKTtcclxuXHJcblxyXG4gICAgICAgICAgICB9KTtcclxuICAgIH1cclxufSk7XHJcbiJdfQ==
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/Alert.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '2045b71nHFDw7X/Kgx+6xMy', 'Alert');
// Script/login/Alert.js

"use strict";

// Learn cc.Class:
//  - https://docs.cocos.com/creator/manual/en/scripting/class.html
// Learn Attribute:
//  - https://docs.cocos.com/creator/manual/en/scripting/reference/attributes.html
// Learn life-cycle callbacks:
//  - https://docs.cocos.com/creator/manual/en/scripting/life-cycle-callbacks.html
cc.Class({
  "extends": cc.Component,
  properties: {
    _alert: null,
    //提示框
    _btnOK: null,
    //提示框确定按钮
    _btnCancel: null,
    //提示框取消按钮
    _title: null,
    //提示框标题
    _content: null,
    //提示框内容
    _btnOKCallback: null,
    //点击确定按钮的回调事件
    mask: {
      tyep: cc.node,
      "default": null
    },
    dlg: {
      tyep: cc.node,
      "default": null
    },
    server: {
      tyep: cc.node,
      "default": true
    },
    tips: {
      tyep: cc.node,
      "default": true
    },
    mask_opacity: 100
  },
  // LIFE-CYCLE CALLBACKS:
  // onLoad () { },
  start: function start() {// this.node.active =false;
  },
  show_dlg: function show_dlg() {
    this.node.active = true; // this.mask,opacity = 0;
    // var ac1 =cc.fadeTo(0.3,this.mask_opacity);
    // this.mask.runAction(ac1);
    // this.dlg.scale =0;
    // var ac2 =cc.scaleTo(0.3,1).easing(cc.easeBackout());
    // this.dlg.runAction(ac2);
  },
  hidden_dlg: function hidden_dlg() {
    // var ac1 =cc.fadeOut(0.3);
    // this.mask.runAction(ac1);
    // var ac2 =cc.scaleTo(0.3,0).easing(cc.easeBackIn());
    // this.dlg.runAction(ac2);
    this.node.active = false; // 请求更换 server
  }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcQWxlcnQuanMiXSwibmFtZXMiOlsiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJfYWxlcnQiLCJfYnRuT0siLCJfYnRuQ2FuY2VsIiwiX3RpdGxlIiwiX2NvbnRlbnQiLCJfYnRuT0tDYWxsYmFjayIsIm1hc2siLCJ0eWVwIiwibm9kZSIsImRsZyIsInNlcnZlciIsInRpcHMiLCJtYXNrX29wYWNpdHkiLCJzdGFydCIsInNob3dfZGxnIiwiYWN0aXZlIiwiaGlkZGVuX2RsZyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFO0FBQ1JDLElBQUFBLE1BQU0sRUFBQyxJQURDO0FBQ0s7QUFDYkMsSUFBQUEsTUFBTSxFQUFDLElBRkM7QUFFSztBQUNiQyxJQUFBQSxVQUFVLEVBQUMsSUFISDtBQUdTO0FBQ2pCQyxJQUFBQSxNQUFNLEVBQUMsSUFKQztBQUlLO0FBQ2JDLElBQUFBLFFBQVEsRUFBQyxJQUxEO0FBS087QUFDZkMsSUFBQUEsY0FBYyxFQUFDLElBTlA7QUFNYTtBQUVyQkMsSUFBQUEsSUFBSSxFQUFDO0FBQ0RDLE1BQUFBLElBQUksRUFBQ1gsRUFBRSxDQUFDWSxJQURQO0FBRUQsaUJBQVE7QUFGUCxLQVJHO0FBWVJDLElBQUFBLEdBQUcsRUFBQztBQUNBRixNQUFBQSxJQUFJLEVBQUNYLEVBQUUsQ0FBQ1ksSUFEUjtBQUVBLGlCQUFRO0FBRlIsS0FaSTtBQWdCUkUsSUFBQUEsTUFBTSxFQUFDO0FBQ0hILE1BQUFBLElBQUksRUFBQ1gsRUFBRSxDQUFDWSxJQURMO0FBRUgsaUJBQVE7QUFGTCxLQWhCQztBQXFCUkcsSUFBQUEsSUFBSSxFQUFDO0FBQ0RKLE1BQUFBLElBQUksRUFBQ1gsRUFBRSxDQUFDWSxJQURQO0FBRUQsaUJBQVE7QUFGUCxLQXJCRztBQXlCUkksSUFBQUEsWUFBWSxFQUFFO0FBekJOLEdBSFA7QUErQkw7QUFFQTtBQUVBQyxFQUFBQSxLQW5DSyxtQkFtQ0ksQ0FDTDtBQUNILEdBckNJO0FBc0NMQyxFQUFBQSxRQXRDSyxzQkFzQ087QUFDUixTQUFLTixJQUFMLENBQVVPLE1BQVYsR0FBa0IsSUFBbEIsQ0FEUSxDQUVSO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUVILEdBaERJO0FBa0RMQyxFQUFBQSxVQWxESyx3QkFrRFM7QUFFVjtBQUNBO0FBRUE7QUFDQTtBQUVBLFNBQUtSLElBQUwsQ0FBVU8sTUFBVixHQUFrQixLQUFsQixDQVJVLENBU1Y7QUFFSDtBQTdESSxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyBMZWFybiBjYy5DbGFzczpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvY2xhc3MuaHRtbFxyXG4vLyBMZWFybiBBdHRyaWJ1dGU6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL3JlZmVyZW5jZS9hdHRyaWJ1dGVzLmh0bWxcclxuLy8gTGVhcm4gbGlmZS1jeWNsZSBjYWxsYmFja3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2xpZmUtY3ljbGUtY2FsbGJhY2tzLmh0bWxcclxuXHJcbmNjLkNsYXNzKHtcclxuICAgIGV4dGVuZHM6IGNjLkNvbXBvbmVudCxcclxuXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgX2FsZXJ0Om51bGwsIC8v5o+Q56S65qGGXHJcbiAgICAgICAgX2J0bk9LOm51bGwsIC8v5o+Q56S65qGG56Gu5a6a5oyJ6ZKuXHJcbiAgICAgICAgX2J0bkNhbmNlbDpudWxsLCAvL+aPkOekuuahhuWPlua2iOaMiemSrlxyXG4gICAgICAgIF90aXRsZTpudWxsLCAvL+aPkOekuuahhuagh+mimFxyXG4gICAgICAgIF9jb250ZW50Om51bGwsIC8v5o+Q56S65qGG5YaF5a65XHJcbiAgICAgICAgX2J0bk9LQ2FsbGJhY2s6bnVsbCwgLy/ngrnlh7vnoa7lrprmjInpkq7nmoTlm57osIPkuovku7ZcclxuXHJcbiAgICAgICAgbWFzazp7XHJcbiAgICAgICAgICAgIHR5ZXA6Y2Mubm9kZSxcclxuICAgICAgICAgICAgZGVmYXVsdDpudWxsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBkbGc6e1xyXG4gICAgICAgICAgICB0eWVwOmNjLm5vZGUsXHJcbiAgICAgICAgICAgIGRlZmF1bHQ6bnVsbFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgc2VydmVyOntcclxuICAgICAgICAgICAgdHllcDpjYy5ub2RlLFxyXG4gICAgICAgICAgICBkZWZhdWx0OnRydWVcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICB0aXBzOntcclxuICAgICAgICAgICAgdHllcDpjYy5ub2RlLFxyXG4gICAgICAgICAgICBkZWZhdWx0OnRydWVcclxuICAgICAgICB9LFxyXG4gICAgICAgIG1hc2tfb3BhY2l0eTogMTAwLFxyXG4gICAgfSxcclxuXHJcbiAgICAvLyBMSUZFLUNZQ0xFIENBTExCQUNLUzpcclxuXHJcbiAgICAvLyBvbkxvYWQgKCkgeyB9LFxyXG5cclxuICAgIHN0YXJ0ICgpIHtcclxuICAgICAgICAvLyB0aGlzLm5vZGUuYWN0aXZlID1mYWxzZTtcclxuICAgIH0sXHJcbiAgICBzaG93X2RsZyAoKSB7XHJcbiAgICAgICAgdGhpcy5ub2RlLmFjdGl2ZSA9dHJ1ZTtcclxuICAgICAgICAvLyB0aGlzLm1hc2ssb3BhY2l0eSA9IDA7XHJcbiAgICAgICAgLy8gdmFyIGFjMSA9Y2MuZmFkZVRvKDAuMyx0aGlzLm1hc2tfb3BhY2l0eSk7XHJcbiAgICAgICAgLy8gdGhpcy5tYXNrLnJ1bkFjdGlvbihhYzEpO1xyXG5cclxuICAgICAgICAvLyB0aGlzLmRsZy5zY2FsZSA9MDtcclxuICAgICAgICAvLyB2YXIgYWMyID1jYy5zY2FsZVRvKDAuMywxKS5lYXNpbmcoY2MuZWFzZUJhY2tvdXQoKSk7XHJcbiAgICAgICAgLy8gdGhpcy5kbGcucnVuQWN0aW9uKGFjMik7XHJcbiAgICAgXHJcbiAgICB9LFxyXG5cclxuICAgIGhpZGRlbl9kbGcgKCkge1xyXG4gICBcclxuICAgICAgICAvLyB2YXIgYWMxID1jYy5mYWRlT3V0KDAuMyk7XHJcbiAgICAgICAgLy8gdGhpcy5tYXNrLnJ1bkFjdGlvbihhYzEpO1xyXG5cclxuICAgICAgICAvLyB2YXIgYWMyID1jYy5zY2FsZVRvKDAuMywwKS5lYXNpbmcoY2MuZWFzZUJhY2tJbigpKTtcclxuICAgICAgICAvLyB0aGlzLmRsZy5ydW5BY3Rpb24oYWMyKTtcclxuXHJcbiAgICAgICAgdGhpcy5ub2RlLmFjdGl2ZSA9ZmFsc2U7XHJcbiAgICAgICAgLy8g6K+35rGC5pu05o2iIHNlcnZlclxyXG5cclxuICAgIH0sXHJcbiAgICBcclxuXHJcblxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/SpriteTextTool.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '522f7RUlNhOh5+SscH5tMhK', 'SpriteTextTool');
// Script/login/SpriteTextTool.js

"use strict";

cc.Class({
  "extends": cc.Component,
  properties: {
    content: "1000",
    text_sprite: {
      "default": null,
      type: cc.SpriteFrame
    }
  },
  start: function start() {
    this.setContent("8934873");
  },
  // 设置文本
  setContent: function setContent(str) {
    this.content = str;
    this.onSetContentChange();
  },
  onSetContentChange: function onSetContentChange() {
    this.createSpriteText();
  },
  createSpriteText: function createSpriteText() {
    this.clearItem();
    var childs = this.node.children;
    var count = childs.length;

    for (var i = 0; i < this.content.length; i++) {
      var item = null;
      var sprite = null;

      if (i < count) {
        item = childs[i];
        item.active = true;
        sprite = item.getComponent(cc.Sprite);
      } else {
        item = new cc.Node("item");
        sprite = item.addComponent(cc.Sprite);
      }

      this.setSprite(this.content[i], sprite);
      item.parent = this.node;
    }
  },
  // 获取贴图
  getSprite: function getSprite(index) {
    var sprite = this.text_sprite.clone(); // 克隆一张图片

    var width = sprite.getRect().width / 10;
    var height = sprite.getRect().height;
    var x = sprite.getRect().x + index * width;
    var y = sprite.getRect().y;
    var tmpRect = new cc.Rect(x, y, width, height);
    sprite.setRect(tmpRect); // 设置 SpriteFrame 的纹理矩形区域

    return sprite;
  },
  // 设置贴图
  setSprite: function setSprite(value, sprite) {
    switch (value) {
      case "0":
        sprite.spriteFrame = this.getSprite(0);
        break;

      case "1":
        sprite.spriteFrame = this.getSprite(1);
        break;

      case "2":
        sprite.spriteFrame = this.getSprite(2);
        break;

      case "3":
        sprite.spriteFrame = this.getSprite(3);
        break;

      case "4":
        sprite.spriteFrame = this.getSprite(4);
        break;

      case "5":
        sprite.spriteFrame = this.getSprite(5);
        break;

      case "6":
        sprite.spriteFrame = this.getSprite(6);
        break;

      case "7":
        sprite.spriteFrame = this.getSprite(7);
        break;

      case "8":
        sprite.spriteFrame = this.getSprite(8);
        break;

      case "9":
        sprite.spriteFrame = this.getSprite(9);
        break;

      default:
        console.log("value not find :" + value);
        break;
    }
  },
  clearItem: function clearItem() {
    var childs = this.node.children;

    for (var i = 0; i < childs.length; i++) {
      childs[i].active = false;
    }
  }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcU3ByaXRlVGV4dFRvb2wuanMiXSwibmFtZXMiOlsiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJjb250ZW50IiwidGV4dF9zcHJpdGUiLCJ0eXBlIiwiU3ByaXRlRnJhbWUiLCJzdGFydCIsInNldENvbnRlbnQiLCJzdHIiLCJvblNldENvbnRlbnRDaGFuZ2UiLCJjcmVhdGVTcHJpdGVUZXh0IiwiY2xlYXJJdGVtIiwiY2hpbGRzIiwibm9kZSIsImNoaWxkcmVuIiwiY291bnQiLCJsZW5ndGgiLCJpIiwiaXRlbSIsInNwcml0ZSIsImFjdGl2ZSIsImdldENvbXBvbmVudCIsIlNwcml0ZSIsIk5vZGUiLCJhZGRDb21wb25lbnQiLCJzZXRTcHJpdGUiLCJwYXJlbnQiLCJnZXRTcHJpdGUiLCJpbmRleCIsImNsb25lIiwid2lkdGgiLCJnZXRSZWN0IiwiaGVpZ2h0IiwieCIsInkiLCJ0bXBSZWN0IiwiUmVjdCIsInNldFJlY3QiLCJ2YWx1ZSIsInNwcml0ZUZyYW1lIiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQUEsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFO0FBQ1JDLElBQUFBLE9BQU8sRUFBRyxNQURGO0FBRVJDLElBQUFBLFdBQVcsRUFBQztBQUNSLGlCQUFVLElBREY7QUFFUkMsTUFBQUEsSUFBSSxFQUFHTixFQUFFLENBQUNPO0FBRkY7QUFGSixHQUhQO0FBV0xDLEVBQUFBLEtBWEssbUJBWUw7QUFDSSxTQUFLQyxVQUFMLENBQWdCLFNBQWhCO0FBQ0gsR0FkSTtBQWdCTDtBQUNBQSxFQUFBQSxVQWpCSyxzQkFpQk1DLEdBakJOLEVBa0JMO0FBQ0ksU0FBS04sT0FBTCxHQUFlTSxHQUFmO0FBQ0EsU0FBS0Msa0JBQUw7QUFDSCxHQXJCSTtBQXVCTEEsRUFBQUEs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QUFLLEdBQUw7QUFDSVIsUUFBQUEsTUFBTSxDQUFDb0IsV0FBUCxHQUFxQixLQUFLWixTQUFMLENBQWUsQ0FBZixDQUFyQjtBQUNBOztBQUNKLFdBQUssR0FBTDtBQUNJUixRQUFBQSxNQUFNLENBQUNvQixXQUFQLEdBQXFCLEtBQUtaLFNBQUwsQ0FBZSxDQUFmLENBQXJCO0FBQ0E7O0FBQ0osV0FBSyxHQUFMO0FBQ0lSLFFBQUFBLE1BQU0sQ0FBQ29CLFdBQVAsR0FBcUIsS0FBS1osU0FBTCxDQUFlLENBQWYsQ0FBckI7QUFDQTs7QUFDSixXQUFLLEdBQUw7QUFDSVIsUUFBQUEsTUFBTSxDQUFDb0IsV0FBUCxHQUFxQixLQUFLWixTQUFMLENBQWUsQ0FBZixDQUFyQjtBQUNBOztBQUNKLFdBQUssR0FBTDtBQUNJUixRQUFBQSxNQUFNLENBQUNvQixXQUFQLEdBQXFCLEtBQUtaLFNBQUwsQ0FBZSxDQUFmLENBQXJCO0FBQ0E7O0FBQ0o7QUFDSWEsUUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVkscUJBQXFCSCxLQUFqQztBQUNBO0FBakNSO0FBbUNILEdBdkdJO0FBeUdMM0IsRUFBQUEsU0F6R0ssdUJBMEdMO0FBQ0ksUUFBSUMsTUFBTSxHQUFHLEtBQUtDLElBQUwsQ0FBVUMsUUFBdkI7O0FBQ0EsU0FBSyxJQUFJRyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHTCxNQUFNLENBQUNJLE1BQTNCLEVBQW1DQyxDQUFDLEVBQXBDLEVBQXdDO0FBQ3BDTCxNQUFBQSxNQUFNLENBQUNLLENBQUQsQ0FBTixDQUFVRyxNQUFWLEdBQW1CLEtBQW5CO0FBQ0g7QUFDSjtBQS9HSSxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyJjYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiBcclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICBjb250ZW50IDogXCIxMDAwXCIsXHJcbiAgICAgICAgdGV4dF9zcHJpdGU6e1xyXG4gICAgICAgICAgICBkZWZhdWx0IDogbnVsbCxcclxuICAgICAgICAgICAgdHlwZSA6IGNjLlNwcml0ZUZyYW1lLFxyXG4gICAgICAgIH0sXHJcbiAgICB9LFxyXG4gXHJcbiAgICBzdGFydCgpXHJcbiAgICB7XHJcbiAgICAgICAgdGhpcy5zZXRDb250ZW50KFwiODkzNDg3M1wiKTtcclxuICAgIH0sXHJcbiBcclxuICAgIC8vIOiuvue9ruaWh+acrFxyXG4gICAgc2V0Q29udGVudChzdHIpXHJcbiAgICB7XHJcbiAgICAgICAgdGhpcy5jb250ZW50ID0gc3RyO1xyXG4gICAgICAgIHRoaXMub25TZXRDb250ZW50Q2hhbmdlKCk7XHJcbiAgICB9LFxyXG4gXHJcbiAgICBvblNldENvbnRlbnRDaGFuZ2UoKVxyXG4gICAge1xyXG4gICAgICAgIHRoaXMuY3JlYXRlU3ByaXRlVGV4dCgpOyAgICBcclxuICAgIH0sXHJcbiBcclxuICAgIGNyZWF0ZVNwcml0ZVRleHQoKVxyXG4gICAge1xyXG4gICAgICAgIHRoaXMuY2xlYXJJdGVtKCk7XHJcbiAgICAgICAgdmFyIGNoaWxkcyA9IHRoaXMubm9kZS5jaGlsZHJlbjtcclxuICAgICAgICB2YXIgY291bnQgPSBjaGlsZHMubGVuZ3RoO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgdGhpcy5jb250ZW50Lmxlbmd0aDsgaSsrKVxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgdmFyIGl0ZW0gPSBudWxsO1xyXG4gICAgICAgICAgICB2YXIgc3ByaXRlID0gbnVsbDtcclxuICAgICAgICAgICAgaWYoaSA8IGNvdW50KVxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBpdGVtID0gY2hpbGRzW2ldO1xyXG4gICAgICAgICAgICAgICAgaXRlbS5hY3RpdmUgPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgc3ByaXRlID0gaXRlbS5nZXRDb21wb25lbnQoY2MuU3ByaXRlKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIGl0ZW0gPSBuZXcgY2MuTm9kZShcIml0ZW1cIik7XHJcbiAgICAgICAgICAgICAgICBzcHJpdGUgPSBpdGVtLmFkZENvbXBvbmVudChjYy5TcHJpdGUpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIHRoaXMuc2V0U3ByaXRlKHRoaXMuY29udGVudFtpXSxzcHJpdGUpO1xyXG4gICAgICAgICAgICBpdGVtLnBhcmVudCA9IHRoaXMubm9kZTtcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gXHJcbiAgICAvLyDojrflj5botLTlm75cclxuICAgIGdldFNwcml0ZShpbmRleClcclxuICAgIHtcclxuICAgICAgICB2YXIgc3ByaXRlID0gdGhpcy50ZXh0X3Nwcml0ZS5jbG9uZSgpOyAvLyDlhYvpmobkuIDlvKDlm77niYdcclxuICAgICAgICB2YXIgd2lkdGggPSBzcHJpdGUuZ2V0UmVjdCgpLndpZHRoLzEwO1xyXG4gICAgICAgIHZhciBoZWlnaHQgPSBzcHJpdGUuZ2V0UmVjdCgpLmhlaWdodDtcclxuICAgICAgICB2YXIgeCA9IHNwcml0ZS5nZXRSZWN0KCkueCArIGluZGV4ICogd2lkdGg7XHJcbiAgICAgICAgdmFyIHkgPSBzcHJpdGUuZ2V0UmVjdCgpLnk7XHJcbiAgICAgICAgdmFyIHRtcFJlY3QgPSBuZXcgY2MuUmVjdCh4LHksd2lkdGgsaGVpZ2h0KTtcclxuICAgICAgICBzcHJpdGUuc2V0UmVjdCh0bXBSZWN0KTsgICAvLyDorr7nva4gU3ByaXRlRnJhbWUg55qE57q555CG55+p5b2i5Yy65Z+fXHJcbiAgICAgICAgcmV0dXJuIHNwcml0ZTtcclxuICAgIH0sXHJcbiAgICAvLyDorr7nva7otLTlm75cclxuICAgIHNldFNwcml0ZSh2YWx1ZSxzcHJpdGUpXHJcbiAgICB7XHJcbiAgICAgICAgc3dpdGNoICh2YWx1ZSkge1xyXG4gICAgICAgICAgICBjYXNlIFwiMFwiOlxyXG4gICAgICAgICAgICAgICAgc3ByaXRlLnNwcml0ZUZyYW1lID0gdGhpcy5nZXRTcHJpdGUoMCk7XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSBcIjFcIjpcclxuICAgICAgICAgICAgICAgIHNwcml0ZS5zcHJpdGVGcmFtZSA9IHRoaXMuZ2V0U3ByaXRlKDEpOyAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIGNhc2UgXCIyXCI6XHJcbiAgICAgICAgICAgICAgICBzcHJpdGUuc3ByaXRlRnJhbWUgPSB0aGlzLmdldFNwcml0ZSgyKTsgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSBcIjNcIjpcclxuICAgICAgICAgICAgICAgIHNwcml0ZS5zcHJpdGVGcmFtZSA9IHRoaXMuZ2V0U3ByaXRlKDMpO1xyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIGNhc2UgXCI0XCI6XHJcbiAgICAgICAgICAgICAgICBzcHJpdGUuc3ByaXRlRnJhbWUgPSB0aGlzLmdldFNwcml0ZSg0KTtcclxuICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICBjYXNlIFwiNVwiOlxyXG4gICAgICAgICAgICAgICAgc3ByaXRlLnNwcml0ZUZyYW1lID0gdGhpcy5nZXRTcHJpdGUoNSk7XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSBcIjZcIjpcclxuICAgICAgICAgICAgICAgIHNwcml0ZS5zcHJpdGVGcmFtZSA9IHRoaXMuZ2V0U3ByaXRlKDYpO1xyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIGNhc2UgXCI3XCI6XHJcbiAgICAgICAgICAgICAgICBzcHJpdGUuc3ByaXRlRnJhbWUgPSB0aGlzLmdldFNwcml0ZSg3KTtcclxuICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICBjYXNlIFwiOFwiOlxyXG4gICAgICAgICAgICAgICAgc3ByaXRlLnNwcml0ZUZyYW1lID0gdGhpcy5nZXRTcHJpdGUoOCk7XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSBcIjlcIjpcclxuICAgICAgICAgICAgICAgIHNwcml0ZS5zcHJpdGVGcmFtZSA9IHRoaXMuZ2V0U3ByaXRlKDkpO1xyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIGRlZmF1bHQ6XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcInZhbHVlIG5vdCBmaW5kIDpcIiArIHZhbHVlKTtcclxuICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgIH0gICAgICAgIFxyXG4gICAgfSxcclxuIFxyXG4gICAgY2xlYXJJdGVtKClcclxuICAgIHtcclxuICAgICAgICB2YXIgY2hpbGRzID0gdGhpcy5ub2RlLmNoaWxkcmVuO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgY2hpbGRzLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIGNoaWxkc1tpXS5hY3RpdmUgPSBmYWxzZTtcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/scence/wap.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'b005bs3OsxEXphcM4J27bYW', 'wap');
// Script/scence/wap.js

"use strict";

// Learn cc.Class:
//  - https://docs.cocos.com/creator/manual/en/scripting/class.html
// Learn Attribute:
//  - https://docs.cocos.com/creator/manual/en/scripting/reference/attributes.html
// Learn life-cycle callbacks:
//  - https://docs.cocos.com/creator/manual/en/scripting/life-cycle-callbacks.html
cc.Class({
  "extends": cc.Component,
  properties: {// foo: {
    //     // ATTRIBUTES:
    //     default: null,        // The default value will be used only when the component attaching
    //                           // to a node for the first time
    //     type: cc.SpriteFrame, // optional, default is typeof default
    //     serializable: true,   // optional, default is true
    // },
    // bar: {
    //     get () {
    //         return this._bar;
    //     },
    //     set (value) {
    //         this._bar = value;
    //     }
    // },
  },
  // LIFE-CYCLE CALLBACKS:
  // onLoad () {},
  start: function start() {
    var _this = this;

    this.updateCanvasSize();
    cc.view.setResizeCallback(function () {
      _this.updateCanvasSize();
    });
  } // 自由切换横竖屏，动态设置设计分辨率和适配模式。
  // updateCanvasSize() {
  //     let size = cc.view.getFrameSize();
  //     if (size.width > size.height) {
  //         this.canvas.fitWidth = false;
  //         this.canvas.fitHeight = true;
  //         this.canvas.designResolution = cc.size(1920, 1080);
  //         this.showLandscape();
  //     } else {
  //         this.canvas.fitWidth = true;
  //         this.canvas.fitHeight = false;
  //         this.canvas.designResolution = cc.size(1080, 1920);
  //         this.showPortait();
  //     }
  // },
  // update (dt) {},

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxzY2VuY2VcXHdhcC5qcyJdLCJuYW1lcyI6WyJjYyIsIkNsYXNzIiwiQ29tcG9uZW50IiwicHJvcGVydGllcyIsInN0YXJ0IiwidXBkYXRlQ2FudmFzU2l6ZSIsInZpZXciLCJzZXRSZXNpemVDYWxsYmFjayJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFLENBQ1I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBZlEsR0FIUDtBQXFCTDtBQUVBO0FBRUFDLEVBQUFBLEtBekJLLG1CQXlCRztBQUFBOztBQUNKLFNBQUtDLGdCQUFMO0FBQ0FMLElBQUFBLEVBQUUsQ0FBQ00sSUFBSCxDQUFRQyxpQkFBUixDQUEwQixZQUFNO0FBQzVCLE1BQUEsS0FBSSxDQUFDRixnQkFBTDtBQUNILEtBRkQ7QUFHSCxHQTlCSSxDQWdDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTs7QUFoREssQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLy8gTGVhcm4gY2MuQ2xhc3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9yZWZlcmVuY2UvYXR0cmlidXRlcy5odG1sXHJcbi8vIExlYXJuIGxpZmUtY3ljbGUgY2FsbGJhY2tzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9saWZlLWN5Y2xlLWNhbGxiYWNrcy5odG1sXHJcblxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG4gICAgICAgIC8vIGZvbzoge1xyXG4gICAgICAgIC8vICAgICAvLyBBVFRSSUJVVEVTOlxyXG4gICAgICAgIC8vICAgICBkZWZhdWx0OiBudWxsLCAgICAgICAgLy8gVGhlIGRlZmF1bHQgdmFsdWUgd2lsbCBiZSB1c2VkIG9ubHkgd2hlbiB0aGUgY29tcG9uZW50IGF0dGFjaGluZ1xyXG4gICAgICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gdG8gYSBub2RlIGZvciB0aGUgZmlyc3QgdGltZVxyXG4gICAgICAgIC8vICAgICB0eXBlOiBjYy5TcHJpdGVGcmFtZSwgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHlwZW9mIGRlZmF1bHRcclxuICAgICAgICAvLyAgICAgc2VyaWFsaXphYmxlOiB0cnVlLCAgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHRydWVcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgIC8vIGJhcjoge1xyXG4gICAgICAgIC8vICAgICBnZXQgKCkge1xyXG4gICAgICAgIC8vICAgICAgICAgcmV0dXJuIHRoaXMuX2JhcjtcclxuICAgICAgICAvLyAgICAgfSxcclxuICAgICAgICAvLyAgICAgc2V0ICh2YWx1ZSkge1xyXG4gICAgICAgIC8vICAgICAgICAgdGhpcy5fYmFyID0gdmFsdWU7XHJcbiAgICAgICAgLy8gICAgIH1cclxuICAgICAgICAvLyB9LFxyXG4gICAgfSxcclxuXHJcbiAgICAvLyBMSUZFLUNZQ0xFIENBTExCQUNLUzpcclxuXHJcbiAgICAvLyBvbkxvYWQgKCkge30sXHJcblxyXG4gICAgc3RhcnQoKSB7XHJcbiAgICAgICAgdGhpcy51cGRhdGVDYW52YXNTaXplKCk7XHJcbiAgICAgICAgY2Mudmlldy5zZXRSZXNpemVDYWxsYmFjaygoKSA9PiB7XHJcbiAgICAgICAgICAgIHRoaXMudXBkYXRlQ2FudmFzU2l6ZSgpO1xyXG4gICAgICAgIH0pXHJcbiAgICB9LFxyXG5cclxuICAgIC8vIOiHqueUseWIh+aNouaoquerluWxj++8jOWKqOaAgeiuvue9ruiuvuiuoeWIhui+qOeOh+WSjOmAgumFjeaooeW8j+OAglxyXG4gICAgLy8gdXBkYXRlQ2FudmFzU2l6ZSgpIHtcclxuICAgIC8vICAgICBsZXQgc2l6ZSA9IGNjLnZpZXcuZ2V0RnJhbWVTaXplKCk7XHJcbiAgICAvLyAgICAgaWYgKHNpemUud2lkdGggPiBzaXplLmhlaWdodCkge1xyXG4gICAgLy8gICAgICAgICB0aGlzLmNhbnZhcy5maXRXaWR0aCA9IGZhbHNlO1xyXG4gICAgLy8gICAgICAgICB0aGlzLmNhbnZhcy5maXRIZWlnaHQgPSB0cnVlO1xyXG4gICAgLy8gICAgICAgICB0aGlzLmNhbnZhcy5kZXNpZ25SZXNvbHV0aW9uID0gY2Muc2l6ZSgxOTIwLCAxMDgwKTtcclxuICAgIC8vICAgICAgICAgdGhpcy5zaG93TGFuZHNjYXBlKCk7XHJcbiAgICAvLyAgICAgfSBlbHNlIHtcclxuICAgIC8vICAgICAgICAgdGhpcy5jYW52YXMuZml0V2lkdGggPSB0cnVlO1xyXG4gICAgLy8gICAgICAgICB0aGlzLmNhbnZhcy5maXRIZWlnaHQgPSBmYWxzZTtcclxuICAgIC8vICAgICAgICAgdGhpcy5jYW52YXMuZGVzaWduUmVzb2x1dGlvbiA9IGNjLnNpemUoMTA4MCwgMTkyMCk7XHJcbiAgICAvLyAgICAgICAgIHRoaXMuc2hvd1BvcnRhaXQoKTtcclxuICAgIC8vICAgICB9XHJcbiAgICAvLyB9LFxyXG5cclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/http.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '8228eqRxUNJ4IVqrOVz3ZWN', 'http');
// Script/login/http.js

"use strict";

/**
 * Http 请求封装
 */
var HttpHelper = cc.Class({
  "extends": cc.Component,
  statics: {},
  properties: {},

  /**
   * get请求
   * @param {string} url 
   * @param {function} callback 
   */
  httpGets: function httpGets(url, callback) {
    var xhr = cc.loader.getXMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status >= 200 && xhr.status < 300) {
        var respone = xhr.responseText;
        callback(respone);
      }
    };

    xhr.open("GET", url, true);

    if (cc.sys.isNative) {
      xhr.setRequestHeader("Accept-Encoding", "gzip,deflate");
    } // note: In Internet Explorer, the timeout property may be set only after calling the open()
    // method and before calling the send() method.


    xhr.timeout = 5000; // 5 seconds for timeout

    xhr.send();
  },
  httpPost: function httpPost(url, params, callback) {
    var xhr = cc.loader.getXMLHttpRequest();

    xhr.onreadystatechange = function () {
      // cc.log('xhr.readyState='+xhr.readyState+'  xhr.status='+xhr.status);
      if (xhr.readyState === 4 && xhr.status >= 200 && xhr.status < 300) {
        var respone = xhr.responseText;
        callback(JSON.parse(respone)); // json 转数组
      } else {//   callback(-1);
        }
    };

    xhr.open("POST", url, true);

    if (cc.sys.isNative) {
      xhr.setRequestHeader("Accept-Encoding", "gzip,deflate");
    } // xhr.setRequestHeader("Http-Edition", "1.0.0.0");  // 版本
    // xhr.setRequestHeader("Ip", "192.168.1.1");
    // xhr.setRequestHeader("Http-Token", "gzipdeflate");


    xhr.timeout = 5000; // 5 seconds for timeout
    // xhr.setRequestHeader('Content-Type', 'application/json,multipart/form-data');

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // xhr.send(JSON.stringify(params));

    xhr.send('data=' + JSON.stringify(params)); //  xhr.send(params);
  }
});
window.HttpHelper = new HttpHelper();

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcaHR0cC5qcyJdLCJuYW1lcyI6WyJIdHRwSGVscGVyIiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInN0YXRpY3MiLCJwcm9wZXJ0aWVzIiwiaHR0cEdldHMiLCJ1cmwiLCJjYWxsYmFjayIsInhociIsImxvYWRlciIsImdldFhNTEh0dHBSZXF1ZXN0Iiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsInN0YXR1cyIsInJlc3BvbmUiLCJyZXNwb25zZVRleHQiLCJvcGVuIiwic3lzIiwiaXNOYXRpdmUiLCJzZXRSZXF1ZXN0SGVhZGVyIiwidGltZW91dCIsInNlbmQiLCJodHRwUG9zdCIsInBhcmFtcyIsIkpTT04iLCJwYXJzZSIsInN0cmluZ2lmeSIsIndpbmRvdyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTs7O0FBR0EsSUFBTUEsVUFBVSxHQUFHQyxFQUFFLENBQUNDLEtBQUgsQ0FBUztBQUN4QixhQUFTRCxFQUFFLENBQUNFLFNBRFk7QUFHeEJDLEVBQUFBLE9BQU8sRUFBRSxFQUhlO0FBTXhCQyxFQUFBQSxVQUFVLEVBQUUsRUFOWTs7QUFVeEI7Ozs7O0FBTUlDLEVBQUFBLFFBQVEsRUFBRSxrQkFBVUMsR0FBVixFQUFlQyxRQUFmLEVBQXlCO0FBQy9CLFFBQUlDLEdBQUcsR0FBR1IsRUFBRSxDQUFDUyxNQUFILENBQVVDLGlCQUFWLEVBQVY7O0FBQ0FGLElBQUFBLEdBQUcsQ0FBQ0csa0JBQUosR0FBeUIsWUFBWTtBQUNqQyxVQUFJSCxHQUFHLENBQUNJLFVBQUosS0FBbUIsQ0FBbkIsSUFBeUJKLEdBQUcsQ0FBQ0ssTUFBSixJQUFjLEdBQWQsSUFBcUJMLEdBQUcsQ0FBQ0ssTUFBSixHQUFhLEdBQS9ELEVBQXFFO0FBQ2pFLFlBQUlDLE9BQU8sR0FBR04sR0FBRyxDQUFDTyxZQUFsQjtBQUNBUixRQUFBQSxRQUFRLENBQUNPLE9BQUQsQ0FBUjtBQUNIO0FBQ0osS0FMRDs7QUFNQU4sSUFBQUEsR0FBRyxDQUFDUSxJQUFKLENBQVMsS0FBVCxFQUFnQlYsR0FBaEIsRUFBcUIsSUFBckI7O0FBQ0EsUUFBSU4sRUFBRSxDQUFDaUIsR0FBSCxDQUFPQyxRQUFYLEVBQXFCO0FBQ2pCVixNQUFBQSxHQUFHLENBQUNXLGdCQUFKLENBQXFCLGlCQUFyQixFQUF3QyxjQUF4QztBQUNILEtBWDhCLENBYS9CO0FBQ0E7OztBQUNBWCxJQUFBQSxHQUFHLENBQUNZLE9BQUosR0FBYyxJQUFkLENBZitCLENBZVo7O0FBRW5CWixJQUFBQSxHQUFHLENBQUNhLElBQUo7QUFDSCxHQWxDbUI7QUFvQ3BCQyxFQUFBQSxRQUFRLEVBQUUsa0JBQVVoQixHQUFWLEVBQWVpQixNQUFmLEVBQXVCaEIsUUFBdkIsRUFBaUM7QUFDdkMsUUFBSUMsR0FBRyxHQUFHUixFQUFFLENBQUNTLE1BQUgsQ0FBVUMsaUJBQVYsRUFBVjs7QUFDQUYsSUFBQUEsR0FBRyxDQUFDRyxrQkFBSixHQUF5QixZQUFZO0FBQ2pDO0FBQ0EsVUFBSUgsR0FBRyxDQUFDSSxVQUFKLEtBQW1CLENBQW5CLElBQXlCSixHQUFHLENBQUNLLE1BQUosSUFBYyxHQUFkLElBQXFCTCxHQUFHLENBQUNLLE1BQUosR0FBYSxHQUEvRCxFQUFxRTtBQUNqRSxZQUFJQyxPQUFPLEdBQUdOLEdBQUcsQ0FBQ08sWUFBbEI7QUFDQVIsUUFBQUEsUUFBUSxDQUFDaUIsSUFBSSxDQUFDQyxLQUFMLENBQVdYLE9BQVgsQ0FBRCxDQUFSLENBRmlFLENBRWpDO0FBQ25DLE9BSEQsTUFHSyxDQUNEO0FBQ0g7QUFDSixLQVJEOztBQVNBTixJQUFBQSxHQUFHLENBQUNRLElBQUosQ0FBUyxNQUFULEVBQWlCVixHQUFqQixFQUFzQixJQUF0Qjs7QUFDQSxRQUFJTixFQUFFLENBQUNpQixHQUFILENBQU9DLFFBQVgsRUFBcUI7QUFDakJWLE1BQUFBLEdBQUcsQ0FBQ1csZ0JBQUosQ0FBcUIsaUJBQXJCLEVBQXdDLGNBQXhDO0FBQ0gsS0Fkc0MsQ0FldkM7QUFDQTtBQUNBOzs7QUFDQVgsSUFBQUEsR0FBRyxDQUFDWSxPQUFKLEdBQWMsSUFBZCxDQWxCdUMsQ0FrQnBCO0FBQ25COztBQUNBWixJQUFBQSxHQUFHLENBQUNXLGdCQUFKLENBQXFCLGNBQXJCLEVBQXFDLG1DQUFyQyxFQXBCdUMsQ0FxQnZDOztBQUNBWCxJQUFBQSxHQUFHLENBQUNhLElBQUosQ0FBUyxVQUFRRyxJQUFJLENBQUNFLFNBQUwsQ0FBZUgsTUFBZixDQUFqQixFQXRCdUMsQ0F1QnZDO0FBRUg7QUE3RG1CLENBQVQsQ0FBbkI7QUFnRUFJLE1BQU0sQ0FBQzVCLFVBQVAsR0FBb0IsSUFBSUEsVUFBSixFQUFwQiIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLyoqXHJcbiAqIEh0dHAg6K+35rGC5bCB6KOFXHJcbiAqL1xyXG5jb25zdCBIdHRwSGVscGVyID0gY2MuQ2xhc3Moe1xyXG4gICAgZXh0ZW5kczogY2MuQ29tcG9uZW50LFxyXG5cclxuICAgIHN0YXRpY3M6IHtcclxuICAgIH0sXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgLyoqXHJcbiAgICAgKiBnZXTor7fmsYJcclxuICAgICAqIEBwYXJhbSB7c3RyaW5nfSB1cmwgXHJcbiAgICAgKiBAcGFyYW0ge2Z1bmN0aW9ufSBjYWxsYmFjayBcclxuICAgICAqL1xyXG4gICAgXHJcbiAgICAgICAgaHR0cEdldHM6IGZ1bmN0aW9uICh1cmwsIGNhbGxiYWNrKSB7XHJcbiAgICAgICAgICAgIHZhciB4aHIgPSBjYy5sb2FkZXIuZ2V0WE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgeGhyLm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIGlmICh4aHIucmVhZHlTdGF0ZSA9PT0gNCAmJiAoeGhyLnN0YXR1cyA+PSAyMDAgJiYgeGhyLnN0YXR1cyA8IDMwMCkpIHtcclxuICAgICAgICAgICAgICAgICAgICB2YXIgcmVzcG9uZSA9IHhoci5yZXNwb25zZVRleHQ7XHJcbiAgICAgICAgICAgICAgICAgICAgY2FsbGJhY2socmVzcG9uZSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgIHhoci5vcGVuKFwiR0VUXCIsIHVybCwgdHJ1ZSk7XHJcbiAgICAgICAgICAgIGlmIChjYy5zeXMuaXNOYXRpdmUpIHtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKFwiQWNjZXB0LUVuY29kaW5nXCIsIFwiZ3ppcCxkZWZsYXRlXCIpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgXHJcbiAgICAgICAgICAgIC8vIG5vdGU6IEluIEludGVybmV0IEV4cGxvcmVyLCB0aGUgdGltZW91dCBwcm9wZXJ0eSBtYXkgYmUgc2V0IG9ubHkgYWZ0ZXIgY2FsbGluZyB0aGUgb3BlbigpXHJcbiAgICAgICAgICAgIC8vIG1ldGhvZCBhbmQgYmVmb3JlIGNhbGxpbmcgdGhlIHNlbmQoKSBtZXRob2QuXHJcbiAgICAgICAgICAgIHhoci50aW1lb3V0ID0gNTAwMDsvLyA1IHNlY29uZHMgZm9yIHRpbWVvdXRcclxuICAgICAgICBcclxuICAgICAgICAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICB9LFxyXG4gICAgICAgIFxyXG4gICAgICAgIGh0dHBQb3N0OiBmdW5jdGlvbiAodXJsLCBwYXJhbXMsIGNhbGxiYWNrKSB7XHJcbiAgICAgICAgICAgIHZhciB4aHIgPSBjYy5sb2FkZXIuZ2V0WE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgeGhyLm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIC8vIGNjLmxvZygneGhyLnJlYWR5U3RhdGU9Jyt4aHIucmVhZHlTdGF0ZSsnICB4aHIuc3RhdHVzPScreGhyLnN0YXR1cyk7XHJcbiAgICAgICAgICAgICAgICBpZiAoeGhyLnJlYWR5U3RhdGUgPT09IDQgJiYgKHhoci5zdGF0dXMgPj0gMjAwICYmIHhoci5zdGF0dXMgPCAzMDApKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIHJlc3BvbmUgPSB4aHIucmVzcG9uc2VUZXh0O1xyXG4gICAgICAgICAgICAgICAgICAgIGNhbGxiYWNrKEpTT04ucGFyc2UocmVzcG9uZSkpOyAgLy8ganNvbiDovazmlbDnu4RcclxuICAgICAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgICAgIC8vICAgY2FsbGJhY2soLTEpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICB4aHIub3BlbihcIlBPU1RcIiwgdXJsLCB0cnVlKTtcclxuICAgICAgICAgICAgaWYgKGNjLnN5cy5pc05hdGl2ZSkge1xyXG4gICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoXCJBY2NlcHQtRW5jb2RpbmdcIiwgXCJnemlwLGRlZmxhdGVcIik7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8geGhyLnNldFJlcXVlc3RIZWFkZXIoXCJIdHRwLUVkaXRpb25cIiwgXCIxLjAuMC4wXCIpOyAgLy8g54mI5pysXHJcbiAgICAgICAgICAgIC8vIHhoci5zZXRSZXF1ZXN0SGVhZGVyKFwiSXBcIiwgXCIxOTIuMTY4LjEuMVwiKTtcclxuICAgICAgICAgICAgLy8geGhyLnNldFJlcXVlc3RIZWFkZXIoXCJIdHRwLVRva2VuXCIsIFwiZ3ppcGRlZmxhdGVcIik7XHJcbiAgICAgICAgICAgIHhoci50aW1lb3V0ID0gNTAwMDsvLyA1IHNlY29uZHMgZm9yIHRpbWVvdXRcclxuICAgICAgICAgICAgLy8geGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi9qc29uLG11bHRpcGFydC9mb3JtLWRhdGEnKTtcclxuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8geGhyLnNlbmQoSlNPTi5zdHJpbmdpZnkocGFyYW1zKSk7XHJcbiAgICAgICAgICAgIHhoci5zZW5kKCdkYXRhPScrSlNPTi5zdHJpbmdpZnkocGFyYW1zKSk7XHJcbiAgICAgICAgICAgIC8vICB4aHIuc2VuZChwYXJhbXMpO1xyXG5cclxuICAgICAgICB9XHJcbn0pO1xyXG5cclxud2luZG93Lkh0dHBIZWxwZXIgPSBuZXcgSHR0cEhlbHBlcigpOyJdfQ==
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/commonjs/alert.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '264a58ZMhVJpLKSN93M4Wxc', 'alert');
// Script/commonjs/alert.js

"use strict";

// //引入alert    
// let alert = require('alert');
// //弹窗调用
// alert.show.call(this, "确认退出游戏？", "取消", "确认", function (type) {
//    if (type == "取消") {
//        console.log("取消");
//    }
//    if (type == "确认") {
//        console.log("确认");
//    }
// });
var tipAlert = {
  _alert: null,
  //prefab
  _animSpeed: 0.3 //弹窗动画速度

};
/**
 * @param tipStr
 * @param leftStr
 * @param rightStr
 * @param callback
 */

var show = function show(tipStr, leftStr, rightStr, callback) {
  cc.loader.loadRes("alert/tipAlert", cc.Prefab, function (error, prefab) {
    if (error) {
      cc.error(error);
      return;
    }

    tipAlert._alert = cc.instantiate(prefab);
    cc.director.getScene().addChild(tipAlert._alert, 3);
    cc.find("tipAlert/content/top/tip").getComponent(cc.Label).string = tipStr;
    cc.find("tipAlert/content/bottom/left_btn/leftbtn").getComponent(cc.Label).string = leftStr;
    cc.find("tipAlert/content/bottom/right_btn/rightbtn").getComponent(cc.Label).string = rightStr;

    if (callback) {
      cc.find("tipAlert/content/bottom/left_btn").on('click', function (event) {
        dismiss();
        callback(leftStr);
      }, this);
      cc.find("tipAlert/content/bottom/right_btn").on('click', function (event) {
        dismiss();
        callback(rightStr);
      }, this);
    } //设置parent 为当前场景的Canvas ，position跟随父节点


    tipAlert._alert.parent = cc.find("Canvas");
    startFadeIn();
  });
}; // 执行弹进动画


var startFadeIn = function startFadeIn() {
  //动画
  tipAlert._alert.setScale(2);

  tipAlert._alert.opacity = 0;
  var cbFadeIn = cc.callFunc(onFadeInFinish, this);
  var actionFadeIn = cc.sequence(cc.spawn(cc.fadeTo(tipAlert._animSpeed, 255), cc.scaleTo(tipAlert._animSpeed, 1.0)), cbFadeIn);

  tipAlert._alert.runAction(actionFadeIn);
}; // 弹进动画完成回调


var onFadeInFinish = function onFadeInFinish() {}; // 执行弹出动画


var dismiss = function dismiss() {
  if (!tipAlert._alert) {
    return;
  }

  var cbFadeOut = cc.callFunc(onFadeOutFinish, this);
  var actionFadeOut = cc.sequence(cc.spawn(cc.fadeTo(tipAlert._animSpeed, 0), cc.scaleTo(tipAlert._animSpeed, 2.0)), cbFadeOut);

  tipAlert._alert.runAction(actionFadeOut);
}; // 弹出动画完成回调


var onFadeOutFinish = function onFadeOutFinish() {
  onDestroy();
};

var onDestroy = function onDestroy() {
  if (tipAlert._alert != null) {
    tipAlert._alert.removeFromParent();

    tipAlert._alert = null;
  }
};

module.exports = {
  show: show
};

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxjb21tb25qc1xcYWxlcnQuanMiXSwibmFtZXMiOlsidGlwQWxlcnQiLCJfYWxlcnQiLCJfYW5pbVNwZWVkIiwic2hvdyIsInRpcFN0ciIsImxlZnRTdHIiLCJyaWdodFN0ciIsImNhbGxiYWNrIiwiY2MiLCJsb2FkZXIiLCJsb2FkUmVzIiwiUHJlZmFiIiwiZXJyb3IiLCJwcmVmYWIiLCJpbnN0YW50aWF0ZSIsImRpcmVjdG9yIiwiZ2V0U2NlbmUiLCJhZGRDaGlsZCIsImZpbmQiLCJnZXRDb21wb25lbnQiLCJMYWJlbCIsInN0cmluZyIsIm9uIiwiZXZlbnQiLCJkaXNtaXNzIiwicGFyZW50Iiwic3RhcnRGYWRlSW4iLCJzZXRTY2FsZSIsIm9wYWNpdHkiLCJjYkZhZGVJbiIsImNhbGxGdW5jIiwib25GYWRlSW5GaW5pc2giLCJhY3Rpb25GYWRlSW4iLCJzZXF1ZW5jZSIsInNwYXduIiwiZmFkZVRvIiwic2NhbGVUbyIsInJ1bkFjdGlvbiIsImNiRmFkZU91dCIsIm9uRmFkZU91dEZpbmlzaCIsImFjdGlvbkZhZGVPdXQiLCJvbkRlc3Ryb3kiLCJyZW1vdmVGcm9tUGFyZW50IiwibW9kdWxlIiwiZXhwb3J0cyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSUEsSUFBSUEsUUFBUSxHQUFHO0FBQ1hDLEVBQUFBLE1BQU0sRUFBRSxJQURHO0FBQ2E7QUFDeEJDLEVBQUFBLFVBQVUsRUFBRSxHQUZELENBRWE7O0FBRmIsQ0FBZjtBQUtBOzs7Ozs7O0FBTUEsSUFBSUMsSUFBSSxHQUFHLFNBQVBBLElBQU8sQ0FBVUMsTUFBVixFQUFpQkMsT0FBakIsRUFBeUJDLFFBQXpCLEVBQWtDQyxRQUFsQyxFQUE0QztBQUNuREMsRUFBQUEsRUFBRSxDQUFDQyxNQUFILENBQVVDLE9BQVYsQ0FBa0IsZ0JBQWxCLEVBQW1DRixFQUFF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N0IsQ0FBaEI7QUFDQSxNQUFJQyxhQUFhLEdBQUdoQyxFQUFFLENBQUN5QixRQUFILENBQVl6QixFQUFFLENBQUMwQixLQUFILENBQVMxQixFQUFFLENBQUMyQixNQUFILENBQVVuQyxRQUFRLENBQUNFLFVBQW5CLEVBQStCLENBQS9CLENBQVQsRUFBNENNLEVBQUUsQ0FBQzRCLE9BQUgsQ0FBV3BDLFFBQVEsQ0FBQ0UsVUFBcEIsRUFBZ0MsR0FBaEMsQ0FBNUMsQ0FBWixFQUErRm9DLFNBQS9GLENBQXBCOztBQUNBdEMsRUFBQUEsUUFBUSxDQUFDQyxNQUFULENBQWdCb0MsU0FBaEIsQ0FBMEJHLGFBQTFCO0FBQ0gsQ0FQRCxFQVNBOzs7QUFDQSxJQUFJRCxlQUFlLEdBQUcsU0FBbEJBLGVBQWtCLEdBQVk7QUFDOUJFLEVBQUFBLFNBQVM7QUFDWixDQUZEOztBQUlBLElBQUlBLFNBQVMsR0FBRyxTQUFaQSxTQUFZLEdBQVk7QUFDeEIsTUFBSXpDLFFBQVEsQ0FBQ0MsTUFBVCxJQUFtQixJQUF2QixFQUE2QjtBQUN6QkQsSUFBQUEsUUFBUSxDQUFDQyxNQUFULENBQWdCeUMsZ0JBQWhCOztBQUNBMUMsSUFBQUEsUUFBUSxDQUFDQyxNQUFULEdBQWtCLElBQWxCO0FBQ0g7QUFDSixDQUxEOztBQU9BMEMsTUFBTSxDQUFDQyxPQUFQLEdBQWU7QUFDYnpDLEVBQUFBLElBQUksRUFBSkE7QUFEYSxDQUFmIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyAvL+W8leWFpWFsZXJ0ICAgIFxyXG4vLyBsZXQgYWxlcnQgPSByZXF1aXJlKCdhbGVydCcpO1xyXG5cclxuLy8gLy/lvLnnqpfosIPnlKhcclxuLy8gYWxlcnQuc2hvdy5jYWxsKHRoaXMsIFwi56Gu6K6k6YCA5Ye65ri45oiP77yfXCIsIFwi5Y+W5raIXCIsIFwi56Gu6K6kXCIsIGZ1bmN0aW9uICh0eXBlKSB7XHJcbi8vICAgIGlmICh0eXBlID09IFwi5Y+W5raIXCIpIHtcclxuLy8gICAgICAgIGNvbnNvbGUubG9nKFwi5Y+W5raIXCIpO1xyXG4vLyAgICB9XHJcbi8vICAgIGlmICh0eXBlID09IFwi56Gu6K6kXCIpIHtcclxuLy8gICAgICAgIGNvbnNvbGUubG9nKFwi56Gu6K6kXCIpO1xyXG4vLyAgICB9XHJcbi8vIH0pO1xyXG5cclxuXHJcblxyXG5sZXQgdGlwQWxlcnQgPSB7XHJcbiAgICBfYWxlcnQ6IG51bGwsICAgICAgICAgICAvL3ByZWZhYlxyXG4gICAgX2FuaW1TcGVlZDogMC4zLCAgICAgICAgLy/lvLnnqpfliqjnlLvpgJ/luqZcclxufTtcclxuIFxyXG4vKipcclxuICogQHBhcmFtIHRpcFN0clxyXG4gKiBAcGFyYW0gbGVmdFN0clxyXG4gKiBAcGFyYW0gcmlnaHRTdHJcclxuICogQHBhcmFtIGNhbGxiYWNrXHJcbiAqL1xyXG5sZXQgc2hvdyA9IGZ1bmN0aW9uICh0aXBTdHIsbGVmdFN0cixyaWdodFN0cixjYWxsYmFjaykge1xyXG4gICAgY2MubG9hZGVyLmxvYWRSZXMoXCJhbGVydC90aXBBbGVydFwiLGNjLlByZWZhYiwgZnVuY3Rpb24gKGVycm9yLCBwcmVmYWIpe1xyXG4gICAgICAgIGlmIChlcnJvcil7XHJcbiAgICAgICAgICAgIGNjLmVycm9yKGVycm9yKTtcclxuICAgICAgICAgICAgcmV0dXJuO1xyXG4gICAgICAgIH1cclxuICAgICAgICB0aXBBbGVydC5fYWxlcnQgPSBjYy5pbnN0YW50aWF0ZShwcmVmYWIpO1xyXG4gICAgICAgIGNjLmRpcmVjdG9yLmdldFNjZW5lKCkuYWRkQ2hpbGQodGlwQWxlcnQuX2FsZXJ0LDMpO1xyXG4gICAgICAgIGNjLmZpbmQoXCJ0aXBBbGVydC9jb250ZW50L3RvcC90aXBcIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKS5zdHJpbmcgPSB0aXBTdHI7XHJcbiAgICAgICAgY2MuZmluZChcInRpcEFsZXJ0L2NvbnRlbnQvYm90dG9tL2xlZnRfYnRuL2xlZnRidG5cIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKS5zdHJpbmcgPSBsZWZ0U3RyO1xyXG4gICAgICAgIGNjLmZpbmQoXCJ0aXBBbGVydC9jb250ZW50L2JvdHRvbS9yaWdodF9idG4vcmlnaHRidG5cIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKS5zdHJpbmcgPSByaWdodFN0cjtcclxuICAgICAgICBpZihjYWxsYmFjayl7XHJcbiAgICAgICAgICAgIGNjLmZpbmQoXCJ0aXBBbGVydC9jb250ZW50L2JvdHRvbS9sZWZ0X2J0blwiKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGRpc21pc3MoKTtcclxuICAgICAgICAgICAgICAgIGNhbGxiYWNrKGxlZnRTdHIpO1xyXG4gICAgICAgICAgICB9LCB0aGlzKTtcclxuIFxyXG4gICAgICAgICAgICBjYy5maW5kKFwidGlwQWxlcnQvY29udGVudC9ib3R0b20vcmlnaHRfYnRuXCIpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChldmVudCkge1xyXG4gICAgICAgICAgICAgICAgZGlzbWlzcygpO1xyXG4gICAgICAgICAgICAgICAgY2FsbGJhY2socmlnaHRTdHIpO1xyXG4gICAgICAgICAgICB9LCB0aGlzKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgLy/orr7nva5wYXJlbnQg5Li65b2T5YmN5Zy65pmv55qEQ2FudmFzIO+8jHBvc2l0aW9u6Lef6ZqP54i26IqC54K5XHJcbiAgICAgICAgdGlwQWxlcnQuX2FsZXJ0LnBhcmVudCA9IGNjLmZpbmQoXCJDYW52YXNcIik7XHJcbiAgICAgICAgc3RhcnRGYWRlSW4oKTtcclxuICAgIH0pO1xyXG59O1xyXG4gXHJcbi8vIOaJp+ihjOW8uei/m+WKqOeUu1xyXG5sZXQgc3RhcnRGYWRlSW4gPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvL+WKqOeUu1xyXG4gICAgdGlwQWxlcnQuX2FsZXJ0LnNldFNjYWxlKDIpO1xyXG4gICAgdGlwQWxlcnQuX2FsZXJ0Lm9wYWNpdHkgPSAwO1xyXG4gICAgbGV0IGNiRmFkZUluID0gY2MuY2FsbEZ1bmMob25GYWRlSW5GaW5pc2gsIHRoaXMpO1xyXG4gICAgbGV0IGFjdGlvbkZhZGVJbiA9IGNjLnNlcXVlbmNlKGNjLnNwYXduKGNjLmZhZGVUbyh0aXBBbGVydC5fYW5pbVNwZWVkLCAyNTUpLCBjYy5zY2FsZVRvKHRpcEFsZXJ0Ll9hbmltU3BlZWQsIDEuMCkpLCBjYkZhZGVJbik7XHJcbiAgICB0aXBBbGVydC5fYWxlcnQucnVuQWN0aW9uKGFjdGlvbkZhZGVJbik7XHJcbn07XHJcbiBcclxuIFxyXG4vLyDlvLnov5vliqjnlLvlrozmiJDlm57osINcclxubGV0IG9uRmFkZUluRmluaXNoID0gZnVuY3Rpb24gKCkge1xyXG59O1xyXG4gXHJcbi8vIOaJp+ihjOW8ueWHuuWKqOeUu1xyXG5sZXQgZGlzbWlzcyA9IGZ1bmN0aW9uICgpIHtcclxuICAgIGlmICghdGlwQWxlcnQuX2FsZXJ0KSB7XHJcbiAgICAgICAgcmV0dXJuO1xyXG4gICAgfVxyXG4gICAgbGV0IGNiRmFkZU91dCA9IGNjLmNhbGxGdW5jKG9uRmFkZU91dEZpbmlzaCwgdGhpcyk7XHJcbiAgICBsZXQgYWN0aW9uRmFkZU91dCA9IGNjLnNlcXVlbmNlKGNjLnNwYXduKGNjLmZhZGVUbyh0aXBBbGVydC5fYW5pbVNwZWVkLCAwKSwgY2Muc2NhbGVUbyh0aXBBbGVydC5fYW5pbVNwZWVkLCAyLjApKSwgY2JGYWRlT3V0KTtcclxuICAgIHRpcEFsZXJ0Ll9hbGVydC5ydW5BY3Rpb24oYWN0aW9uRmFkZU91dCk7XHJcbn07XHJcbiBcclxuLy8g5by55Ye65Yqo55S75a6M5oiQ5Zue6LCDXHJcbmxldCBvbkZhZGVPdXRGaW5pc2ggPSBmdW5jdGlvbiAoKSB7XHJcbiAgICBvbkRlc3Ryb3koKTtcclxufTtcclxuIFxyXG5sZXQgb25EZXN0cm95ID0gZnVuY3Rpb24gKCkge1xyXG4gICAgaWYgKHRpcEFsZXJ0Ll9hbGVydCAhPSBudWxsKSB7XHJcbiAgICAgICAgdGlwQWxlcnQuX2FsZXJ0LnJlbW92ZUZyb21QYXJlbnQoKTtcclxuICAgICAgICB0aXBBbGVydC5fYWxlcnQgPSBudWxsO1xyXG4gICAgfVxyXG59O1xyXG4gXHJcbm1vZHVsZS5leHBvcnRzPXtcclxuICBzaG93XHJcbn07Il19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/jspfile.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '418e4mQmD5NULo0MWDBNMnw', 'jspfile');
// Script/login/jspfile.js

"use strict";

cc.Class({
  "extends": cc.Component,
  properties: {// foo: {
    //    default: null,      // The default value will be used only when the component attaching
    //                           to a node for the first time
    //    url: cc.Texture2D,  // optional, default is typeof default
    //    serializable: true, // optional, default is true
    //    visible: true,      // optional, default is true
    //    displayName: 'Foo', // optional
    //    readonly: false,    // optional, default is false
    // },
    // ...
  },
  // use this for initialization
  onLoad: function onLoad() {
    // jsb.fileUtils获取全局的工具类的实例, cc.director;
    // 如果是在电脑的模拟器上，就会是安装路径下模拟器的位置;
    // 如果是手机上，那么就是手机OS为这个APP分配的可以读写的路径; 
    // jsb --> javascript binding --> jsb是不支持h5的
    var writeable_path = jsb.fileUtils.getWritablePath();
    console.log(writeable_path); // 要在可写的路径先创建一个文件夹

    var new_dir = writeable_path + "new_dir"; // 路径也可以是 外部存储的路径，只要你有可写外部存储的权限;
    // getWritablePath这个路径下，会随着我们的程序卸载而删除,外部存储除非你自己删除，否者的话，卸载APP数据还在;

    if (!jsb.fileUtils.isDirectoryExist(new_dir)) {
      jsb.fileUtils.createDirectory(new_dir);
    } else {
      console.log("dir is exist!!!");
    } // 读写文件我们分两种,文本文件, 二进制文件;
    // (1)文本文件的读,返回的是一个string对象


    var str_data = jsb.fileUtils.getStringFromFile(new_dir + "/test_str_read.txt");
    console.log(str_data);
    str_data = "hello test_write !!!!!";
    jsb.fileUtils.writeStringToFile(str_data, new_dir + "/test_str_write.txt"); // (2)二进制文件的读写, Uint8Array --> js对象

    var bin_array = jsb.fileUtils.getDataFromFile(new_dir + "/test_bin_read.png");
    console.log(bin_array[0], bin_array[1]); // 使用这个就能访问二进制的每一个字节数据;

    jsb.fileUtils.writeDataToFile(bin_array, new_dir + "/test_bin_write.png"); // end 
    // 删除文件和文件夹
    // jsb.fileUtils.removeFile(new_dir + "/test_bin_write.png"); 
    // jsb.fileUtils.removeDirectory(new_dir);
  } // called every frame, uncomment this function to activate update callback
  // update: function (dt) {
  // },

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcanNwZmlsZS5qcyJdLCJuYW1lcyI6WyJjYyIsIkNsYXNzIiwiQ29tcG9uZW50IiwicHJvcGVydGllcyIsIm9uTG9hZCIsIndyaXRlYWJsZV9wYXRoIiwianNiIiwiZmlsZVV0aWxzIiwiZ2V0V3JpdGFibGVQYXRoIiwiY29uc29sZSIsImxvZyIsIm5ld19kaXIiLCJpc0RpcmVjdG9yeUV4aXN0IiwiY3JlYXRlRGlyZWN0b3J5Iiwic3RyX2RhdGEiLCJnZXRTdHJpbmdGcm9tRmlsZSIsIndyaXRlU3RyaW5nVG9GaWxlIiwiYmluX2FycmF5IiwiZ2V0RGF0YUZyb21GaWxlIiwid3JpdGVEYXRhVG9GaWxlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7OztBQUFBQSxFQUFFLENBQUNDLEtBQUgsQ0FBUztBQUNMLGFBQVNELEVBQUUsQ0FBQ0UsU0FEUDtBQUdMQyxFQUFBQSxVQUFVLEVBQUUsQ0FDUjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQVZRLEdBSFA7QUFnQkw7QUFDQUMsRUFBQUEsTUFBTSxFQUFFLGtCQUFZO0FBQ2hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBSUMsY0FBYyxHQUFHQyxHQUFHLENBQUNDLFNBQUosQ0FBY0MsZUFBZCxFQUFyQjtBQUNBQyxJQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWUwsY0FBWixFQU5nQixDQVNoQjs7QUFDQSxRQUFJTSxPQUFPLEdBQUdOLGNBQWMsR0FBRyxTQUEvQixDQVZnQixDQVdoQjtBQUNBOztBQUNBLFFBQUcsQ0FBQ0MsR0FBRyxDQUFDQyxTQUFKLENBQWNLLGdCQUFkLENBQStCRCxPQUEvQixDQUFKLEVBQTZDO0FBQ3pDTCxNQUFBQSxHQUFHLENBQUNDLFNBQUosQ0FBY00sZUFBZCxDQUE4QkYsT0FBOUI7QUFDSCxLQUZELE1BR0s7QUFDREYsTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksaUJBQVo7QUFDSCxLQWxCZSxDQW9CaEI7QUFDQTs7O0FBQ0EsUUFBSUksUUFBUSxHQUFHUixHQUFHLENBQUNDLFNBQUosQ0FBY1EsaUJBQWQsQ0FBZ0NKLE9BQU8sR0FBRyxvQkFBMUMsQ0FBZjtBQUNBRixJQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWUksUUFBWjtBQUNBQSxJQUFBQSxRQUFRLEdBQUcsd0JBQVg7QUFDQVIsSUFBQUEsR0FBRyxDQUFDQyxTQUFKLENBQWNTLGlCQUFkLENBQWdDRixRQUFoQyxFQUEwQ0gsT0FBTyxHQUFHLHFCQUFwRCxFQXpCZ0IsQ0EwQmhCOztBQUNBLFFBQUlNLFNBQVMsR0FBR1gsR0FBRyxDQUFDQyxTQUFKLENBQWNXLGVBQWQsQ0FBOEJQLE9BQU8sR0FBRyxvQkFBeEMsQ0FBaEI7QUFDQUYsSUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVlPLFNBQVMsQ0FBQyxDQUFELENBQXJCLEVBQTBCQSxTQUFTLENBQUMsQ0FBRCxDQUFuQyxFQTVCZ0IsQ0E0QnlCOztBQUN6Q1gsSUFBQUEsR0FBRyxDQUFDQyxTQUFKLENBQWNZLGVBQWQsQ0FBOEJGLFNBQTlCLEVBQXlDTixPQUFPLEdBQUcscUJBQW5ELEVBN0JnQixDQThCaEI7QUFFQTtBQUNBO0FBQ0E7QUFDSCxHQXBESSxDQXNETDtBQUNBO0FBRUE7O0FBekRLLENBQVQiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbImNjLkNsYXNzKHtcclxuICAgIGV4dGVuZHM6IGNjLkNvbXBvbmVudCxcclxuXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgLy8gZm9vOiB7XHJcbiAgICAgICAgLy8gICAgZGVmYXVsdDogbnVsbCwgICAgICAvLyBUaGUgZGVmYXVsdCB2YWx1ZSB3aWxsIGJlIHVzZWQgb25seSB3aGVuIHRoZSBjb21wb25lbnQgYXR0YWNoaW5nXHJcbiAgICAgICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgICB0byBhIG5vZGUgZm9yIHRoZSBmaXJzdCB0aW1lXHJcbiAgICAgICAgLy8gICAgdXJsOiBjYy5UZXh0dXJlMkQsICAvLyBvcHRpb25hbCwgZGVmYXVsdCBpcyB0eXBlb2YgZGVmYXVsdFxyXG4gICAgICAgIC8vICAgIHNlcmlhbGl6YWJsZTogdHJ1ZSwgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHJ1ZVxyXG4gICAgICAgIC8vICAgIHZpc2libGU6IHRydWUsICAgICAgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHJ1ZVxyXG4gICAgICAgIC8vICAgIGRpc3BsYXlOYW1lOiAnRm9vJywgLy8gb3B0aW9uYWxcclxuICAgICAgICAvLyAgICByZWFkb25seTogZmFsc2UsICAgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIGZhbHNlXHJcbiAgICAgICAgLy8gfSxcclxuICAgICAgICAvLyAuLi5cclxuICAgIH0sXHJcblxyXG4gICAgLy8gdXNlIHRoaXMgZm9yIGluaXRpYWxpemF0aW9uXHJcbiAgICBvbkxvYWQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAvLyBqc2IuZmlsZVV0aWxz6I635Y+W5YWo5bGA55qE5bel5YW357G755qE5a6e5L6LLCBjYy5kaXJlY3RvcjtcclxuICAgICAgICAvLyDlpoLmnpzmmK/lnKjnlLXohJHnmoTmqKHmi5/lmajkuIrvvIzlsLHkvJrmmK/lronoo4Xot6/lvoTkuIvmqKHmi5/lmajnmoTkvY3nva47XHJcbiAgICAgICAgLy8g5aaC5p6c5piv5omL5py65LiK77yM6YKj5LmI5bCx5piv5omL5py6T1PkuLrov5nkuKpBUFDliIbphY3nmoTlj6/ku6Xor7vlhpnnmoTot6/lvoQ7IFxyXG4gICAgICAgIC8vIGpzYiAtLT4gamF2YXNjcmlwdCBiaW5kaW5nIC0tPiBqc2LmmK/kuI3mlK/mjIFoNeeahFxyXG4gICAgICAgIHZhciB3cml0ZWFibGVfcGF0aCA9IGpzYi5maWxlVXRpbHMuZ2V0V3JpdGFibGVQYXRoKCk7XHJcbiAgICAgICAgY29uc29sZS5sb2cod3JpdGVhYmxlX3BhdGgpO1xyXG5cclxuXHJcbiAgICAgICAgLy8g6KaB5Zyo5Y+v5YaZ55qE6Lev5b6E5YWI5Yib5bu65LiA5Liq5paH5Lu25aS5XHJcbiAgICAgICAgdmFyIG5ld19kaXIgPSB3cml0ZWFibGVfcGF0aCArIFwibmV3X2RpclwiO1xyXG4gICAgICAgIC8vIOi3r+W+hOS5n+WPr+S7peaYryDlpJbpg6jlrZjlgqjnmoTot6/lvoTvvIzlj6ropoHkvaDmnInlj6/lhpnlpJbpg6jlrZjlgqjnmoTmnYPpmZA7XHJcbiAgICAgICAgLy8gZ2V0V3JpdGFibGVQYXRo6L+Z5Liq6Lev5b6E5LiL77yM5Lya6ZqP552A5oiR5Lus55qE56iL5bqP5Y246L296ICM5Yig6ZmkLOWklumDqOWtmOWCqOmZpOmdnuS9oOiHquW3seWIoOmZpO+8jOWQpuiAheeahOivne+8jOWNuOi9vUFQUOaVsOaNrui/mOWcqDtcclxuICAgICAgICBpZighanNiLmZpbGVVdGlscy5pc0RpcmVjdG9yeUV4aXN0KG5ld19kaXIpKSB7XHJcbiAgICAgICAgICAgIGpzYi5maWxlVXRpbHMuY3JlYXRlRGlyZWN0b3J5KG5ld19kaXIpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBlbHNlIHtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coXCJkaXIgaXMgZXhpc3QhISFcIik7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIFxyXG4gICAgICAgIC8vIOivu+WGmeaWh+S7tuaIkeS7rOWIhuS4pOenjSzmlofmnKzmlofku7YsIOS6jOi/m+WItuaWh+S7tjtcclxuICAgICAgICAvLyAoMSnmlofmnKzmlofku7bnmoTor7ss6L+U5Zue55qE5piv5LiA5Liqc3RyaW5n5a+56LGhXHJcbiAgICAgICAgdmFyIHN0cl9kYXRhID0ganNiLmZpbGVVdGlscy5nZXRTdHJpbmdGcm9tRmlsZShuZXdfZGlyICsgXCIvdGVzdF9zdHJfcmVhZC50eHRcIik7IFxyXG4gICAgICAgIGNvbnNvbGUubG9nKHN0cl9kYXRhKTtcclxuICAgICAgICBzdHJfZGF0YSA9IFwiaGVsbG8gdGVzdF93cml0ZSAhISEhIVwiXHJcbiAgICAgICAganNiLmZpbGVVdGlscy53cml0ZVN0cmluZ1RvRmlsZShzdHJfZGF0YSwgbmV3X2RpciArIFwiL3Rlc3Rfc3RyX3dyaXRlLnR4dFwiKTtcclxuICAgICAgICAvLyAoMinkuozov5vliLbmlofku7bnmoTor7vlhpksIFVpbnQ4QXJyYXkgLS0+IGpz5a+56LGhXHJcbiAgICAgICAgdmFyIGJpbl9hcnJheSA9IGpzYi5maWxlVXRpbHMuZ2V0RGF0YUZyb21GaWxlKG5ld19kaXIgKyBcIi90ZXN0X2Jpbl9yZWFkLnBuZ1wiKTtcclxuICAgICAgICBjb25zb2xlLmxvZyhiaW5fYXJyYXlbMF0sIGJpbl9hcnJheVsxXSk7IC8vIOS9v+eUqOi/meS4quWwseiDveiuv+mXruS6jOi/m+WItueahOavj+S4gOS4quWtl+iKguaVsOaNrjtcclxuICAgICAgICBqc2IuZmlsZVV0aWxzLndyaXRlRGF0YVRvRmlsZShiaW5fYXJyYXksIG5ld19kaXIgKyBcIi90ZXN0X2Jpbl93cml0ZS5wbmdcIik7XHJcbiAgICAgICAgLy8gZW5kIFxyXG5cclxuICAgICAgICAvLyDliKDpmaTmlofku7blkozmlofku7blpLlcclxuICAgICAgICAvLyBqc2IuZmlsZVV0aWxzLnJlbW92ZUZpbGUobmV3X2RpciArIFwiL3Rlc3RfYmluX3dyaXRlLnBuZ1wiKTsgXHJcbiAgICAgICAgLy8ganNiLmZpbGVVdGlscy5yZW1vdmVEaXJlY3RvcnkobmV3X2Rpcik7XHJcbiAgICB9LFxyXG5cclxuICAgIC8vIGNhbGxlZCBldmVyeSBmcmFtZSwgdW5jb21tZW50IHRoaXMgZnVuY3Rpb24gdG8gYWN0aXZhdGUgdXBkYXRlIGNhbGxiYWNrXHJcbiAgICAvLyB1cGRhdGU6IGZ1bmN0aW9uIChkdCkge1xyXG5cclxuICAgIC8vIH0sXHJcbn0pO1xyXG5cclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/popup_dlg.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'f10d1IxjONKCYev3tfm660U', 'popup_dlg');
// Script/login/popup_dlg.js

"use strict";

// popup_dlg.js
cc.Class({
  "extends": cc.Component,
  properties: {
    // foo: {
    //    default: null,      // The default value will be used only when the component attaching
    //                           to a node for the first time
    //    url: cc.Texture2D,  // optional, default is typeof default
    //    serializable: true, // optional, default is true
    //    visible: true,      // optional, default is true
    //    displayName: 'Foo', // optional
    //    readonly: false,    // optional, default is false
    // },
    // ...
    mask: {
      type: cc.Node,
      "default": null
    },
    mask_opacity: 128,
    content: {
      type: cc.Node,
      "default": null
    }
  },
  // use this for initialization
  onLoad: function onLoad() {},
  show_dlg: function show_dlg() {
    this.node.active = true; // mask 渐变出来;

    this.mask.opacity = 0;
    var fin = cc.fadeTo(0.3, this.mask_opacity);
    this.mask.runAction(fin); // dlg由小到大

    this.content.scale = 0;
    var s = cc.scaleTo(0.4, 1).easing(cc.easeBackOut());
    this.content.runAction(s);
  },
  hide_dlg: function hide_dlg() {
    // 
    var fout = cc.fadeOut(0.3);
    this.mask.runAction(fout);
    var s = cc.scaleTo(0.3, 0).easing(cc.easeBackIn());
    var end_func = cc.callFunc(function () {
      this.node.active = false;
    }.bind(this));
    var seq = cc.sequence([s, end_func]);
    this.content.runAction(seq);
  } // called every frame, uncomment this function to activate update callback
  // update: function (dt) {
  // },

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxccG9wdXBfZGxnLmpzIl0sIm5hbWVzIjpbImNjIiwiQ2xhc3MiLCJDb21wb25lbnQiLCJwcm9wZXJ0aWVzIiwibWFzayIsInR5cGUiLCJOb2RlIiwibWFza19vcGFjaXR5IiwiY29udGVudCIsIm9uTG9hZCIsInNob3dfZGxnIiwibm9kZSIsImFjdGl2ZSIsIm9wYWNpdHkiLCJmaW4iLCJmYWRlVG8iLCJydW5BY3Rpb24iLCJzY2FsZSIsInMiLCJzY2FsZVRvIiwiZWFzaW5nIiwiZWFzZUJhY2tPdXQiLCJoaWRlX2RsZyIsImZvdXQiLCJmYWRlT3V0IiwiZWFzZUJhY2tJbiIsImVuZF9mdW5jIiwiY2FsbEZ1bmMiLCJiaW5kIiwic2VxIiwic2VxdWVuY2UiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQ0EsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFFTkMsRUFBQUEsVUFBVSxFQUFFO0FBQ1I7QUFDQTtBQUNEO0FBQ0M7QUFDRDtBQUNDO0FBQ0M7QUFDRDtBQUNBO0FBQ0M7QUFDQUMsSUFBQUEsSUFBSSxFQUFFO0FBQ0ZDLE1BQUFBLElBQUksRUFBRUwsRUFBRSxDQUFDTSxJQURQO0FBRUosaUJBQVM7QUFGTCxLQVhDO0FBZ0JQQyxJQUFBQSxZQUFZLEVBQUUsR0FoQlA7QUFrQlJDLElBQUFBLE9BQU8sRUFBRTtBQUNMSCxNQUFBQSxJQUFJLEVBQUVMLEVBQUUsQ0FBQ00sSUFESjtBQUVKLGlCQUFTO0FBRkw7QUFsQkQsR0FGTjtBQTJCTjtBQUNDRyxFQUFBQSxNQUFNLEVBQUUsa0JBQVksQ0FFcEIsQ0E5Qks7QUFnQ0xDLEVBQUFBLFFBQVEsRUFBRSxvQkFBVztBQUNqQixTQUFLQyxJQUFMLENBQVVDLE1BQVYsR0FBbUIsSUFBbkIsQ0FEaUIsQ0FFakI7O0FBQ0EsU0FBS1IsSUFBTCxDQUFVUyxPQUFWLEdBQW9CLENBQXBCO0FBQ0EsUUFBSUMsR0FBRyxHQUFHZCxFQUFFLENBQUNlLE1BQUgsQ0FBVSxHQUFWLEVBQWUsS0FBS1IsWUFBcEIsQ0FBVjtBQUNELFNBQUtILElBQUwsQ0FBVVksU0FBVixDQUFvQkYsR0FBcEIsRUFMa0IsQ0FNckI7O0FBRUcsU0FBS04sT0FBTCxDQUFhUyxLQUFiLEdBQXFCLENBQXJCO0FBQ0EsUUFBSUMsQ0FBQyxHQUFHbEIsRUFBRSxDQUFDbUIsT0FBSCxDQUFXLEdBQVgsRUFBZ0IsQ0FBaEIsRUFBbUJDLE1BQW5CLENBQTBCcEIsRUFBRSxDQUFDcUIsV0FBSCxFQUExQixDQUFSO0FBQ0MsU0FBS2IsT0FBTCxDQUFhUSxTQUFiLENBQXVCRSxDQUF2QjtBQUNILEdBM0NJO0FBNkNMSSxFQUFBQSxRQUFRLEVBQUUsb0JBQVc7QUFDakI7QUFDQSxRQUFJQyxJQUFJLEdBQUd2QixFQUFFLENBQUN3QixPQUFILENBQVcsR0FBWCxDQUFYO0FBQ0YsU0FBS3BCLElBQUwsQ0FBVVksU0FBVixDQUFvQk8sSUFBcEI7QUFFQyxRQUFJTCxDQUFDLEdBQUdsQixFQUFFLENBQUNtQixPQUFILENBQVcsR0FBWCxFQUFnQixDQUFoQixFQUFtQkMsTUFBbkIsQ0FBMEJwQixFQUFFLENBQUN5QixVQUFILEVBQTFCLENBQVI7QUFDQSxRQUFJQyxRQUFRLEdBQUcxQixFQUFFLENBQUMyQixRQUFILENBQVksWUFBVztBQUNqQyxXQUFLaEIsSUFBTCxDQUFVQyxNQUFWLEdBQW1CLEtBQW5CO0FBQ0gsS0FGeUIsQ0FFeEJnQixJQUZ3QixDQUVuQixJQUZtQixDQUFaLENBQWY7QUFJQyxRQUFJQyxHQUFHLEdBQUc3QixFQUFFLENBQUM4QixRQUFILENBQVksQ0FBQ1osQ0FBRCxFQUFJUSxRQUFKLENBQVosQ0FBVjtBQUNELFNBQUtsQixPQUFMLENBQWFRLFNBQWIsQ0FBdUJhLEdBQXZCO0FBQ0YsR0F6REksQ0EwREw7QUFDQTtBQUVBOztBQTdESyxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyBwb3B1cF9kbGcuanNcclxuIGNjLkNsYXNzKHtcclxuICAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgLy8gZm9vOiB7XHJcbiAgICAgICAgLy8gICAgZGVmYXVsdDogbnVsbCwgICAgICAvLyBUaGUgZGVmYXVsdCB2YWx1ZSB3aWxsIGJlIHVzZWQgb25seSB3aGVuIHRoZSBjb21wb25lbnQgYXR0YWNoaW5nXHJcbiAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICAgIHRvIGEgbm9kZSBmb3IgdGhlIGZpcnN0IHRpbWVcclxuICAgICAgICAvLyAgICB1cmw6IGNjLlRleHR1cmUyRCwgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHR5cGVvZiBkZWZhdWx0XHJcbiAgICAgICAvLyAgICBzZXJpYWxpemFibGU6IHRydWUsIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHRydWVcclxuICAgICAgICAvLyAgICB2aXNpYmxlOiB0cnVlLCAgICAgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHRydWVcclxuICAgICAgICAgLy8gICAgZGlzcGxheU5hbWU6ICdGb28nLCAvLyBvcHRpb25hbFxyXG4gICAgICAgIC8vICAgIHJlYWRvbmx5OiBmYWxzZSwgICAgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgZmFsc2VcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgICAvLyAuLi5cclxuICAgICAgICAgbWFzazoge1xyXG4gICAgICAgICAgICAgdHlwZTogY2MuTm9kZSxcclxuICAgICAgICAgICBkZWZhdWx0OiBudWxsLFxyXG4gICAgICAgICB9LFxyXG4gXHJcbiAgICAgICAgIG1hc2tfb3BhY2l0eTogMTI4LFxyXG4gXHJcbiAgICAgICAgY29udGVudDoge1xyXG4gICAgICAgICAgICB0eXBlOiBjYy5Ob2RlLFxyXG4gICAgICAgICAgICAgZGVmYXVsdDogbnVsbCxcclxuICAgICAgICB9LFxyXG5cclxuICAgIH0sXHJcblxyXG4gICAgLy8gdXNlIHRoaXMgZm9yIGluaXRpYWxpemF0aW9uXHJcbiAgICAgb25Mb2FkOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgIFxyXG4gICAgfSxcclxuXHJcbiAgICAgc2hvd19kbGc6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICB0aGlzLm5vZGUuYWN0aXZlID0gdHJ1ZTtcclxuICAgICAgICAgLy8gbWFzayDmuJDlj5jlh7rmnaU7XHJcbiAgICAgICAgIHRoaXMubWFzay5vcGFjaXR5ID0gMDtcclxuICAgICAgICAgdmFyIGZpbiA9IGNjLmZhZGVUbygwLjMsIHRoaXMubWFza19vcGFjaXR5KTtcclxuICAgICAgICB0aGlzLm1hc2sucnVuQWN0aW9uKGZpbik7XHJcbiAgICAgLy8gZGxn55Sx5bCP5Yiw5aSnXHJcblxyXG4gICAgICAgIHRoaXMuY29udGVudC5zY2FsZSA9IDA7XHJcbiAgICAgICAgdmFyIHMgPSBjYy5zY2FsZVRvKDAuNCwgMSkuZWFzaW5nKGNjLmVhc2VCYWNrT3V0KCkpO1xyXG4gICAgICAgICB0aGlzLmNvbnRlbnQucnVuQWN0aW9uKHMpO1xyXG4gICAgIH0sXHJcbiBcclxuICAgICBoaWRlX2RsZzogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgIC8vIFxyXG4gICAgICAgICB2YXIgZm91dCA9IGNjLmZhZGVPdXQoMC4zKTtcclxuICAgICAgIHRoaXMubWFzay5ydW5BY3Rpb24oZm91dCk7XHJcblxyXG4gICAgICAgIHZhciBzID0gY2Muc2NhbGVUbygwLjMsIDApLmVhc2luZyhjYy5lYXNlQmFja0luKCkpO1xyXG4gICAgICAgIHZhciBlbmRfZnVuYyA9IGNjLmNhbGxGdW5jKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgdGhpcy5ub2RlLmFjdGl2ZSA9IGZhbHNlO1xyXG4gICAgICAgICB9LmJpbmQodGhpcykpO1xyXG5cclxuICAgICAgICAgdmFyIHNlcSA9IGNjLnNlcXVlbmNlKFtzLCBlbmRfZnVuY10pO1xyXG4gICAgICAgIHRoaXMuY29udGVudC5ydW5BY3Rpb24oc2VxKTtcclxuICAgICB9LFxyXG4gICAgIC8vIGNhbGxlZCBldmVyeSBmcmFtZSwgdW5jb21tZW50IHRoaXMgZnVuY3Rpb24gdG8gYWN0aXZhdGUgdXBkYXRlIGNhbGxiYWNrXHJcbiAgICAgLy8gdXBkYXRlOiBmdW5jdGlvbiAoZHQpIHtcclxuXHJcbiAgICAgLy8gfSxcclxuIH0pOyJdfQ==
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/loading.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '77e07WCeNBJrJqHjwTfqjkf', 'loading');
// Script/login/loading.js

"use strict";

var self = void 0;
cc.Class({
  "extends": cc.Component,
  properties: {
    speed: 1,
    progressBar: {
      "default": null,
      type: cc.ProgressBar,
      text: cc.Sprite
    },
    audio: {
      "default": null,
      type: cc.AudioClip
    },
    play: function play() {
      this.audioSource.play();
    },
    pause: function pause() {
      this.audioSource.pause();
    },
    bmp_font: {
      "default": null,
      type: cc.Label
    } // //默认头像
    // headpic:{
    //     type:cc.SpriteFrame,
    //     default:null,
    // },
    //头像
    // background:{
    //     default:null,
    //     type:cc.Sprite,
    // },

  },
  // LIFE-CYCLE CALLBACKS:
  onLoad: function onLoad() {
    console.log(this.node);
    console.log('正在对比资源'); // // 远程 url 不带图片后缀名，此时必须指定远程图片文件的类型
    // remoteUrl = "http://unknown.org/emoji?id=124982374";
    // cc.loader.load({url: remoteUrl, type: 'png'}, function () {
    //     // Use texture to create sprite frame
    // });
    // // 用绝对路径加载设备存储内的资源，比如相册
    // var absolutePath = "/dara/data/some/path/to/image.png"
    // cc.loader.load(absolutePath, function () {
    //     // Use texture to create sprite frame
    // });

    console.log('正在加载场景资源，请耐心等待...'); // 加载资源包

    this._urls = [{
      url: 'http://www.monster.com/app/api/file-content?url=http://www.monster.com/app/loading/剑指苍茫.mp3',
      type: 'mp3'
    } // {url:'http://www.monster.com/app/api/file-content?url=http://www.monster.com/app/loading/loading.jpg', type:'jpg'},
    // {url:'http://www.monster.com/app/api/file-content?url=http://127.0.0.1/123.jpg', type:'jpg'},
    // {url:'http://www.monster.com/app/api/file-content?url=http://127.0.0.1/ccc.png', type:'png'},
    // {url:'http://www.monster.com/app/api/file-content?url=http://127.0.0.1/jq22honey.zip', type:'zip'},
    // {url:'http://www.monster.com/app/api/file-content?url=http://127.0.0.1/monster.zip', type:'zip'},
    // {url:'http://www.monster.com/app/api/file-content?url=http://127.0.0.1（这里填你的服务器ip)/image2.png', type:'png'}, 
    ];
    console.log(this.progressBar); // console.log( this.sprite); 

    this.resource = null;
    this.progressBar.progress = 0;
    this.bmp_font.string = "0%"; // this.ProgressBar.progress += math_random / 100; 

    this._clearAll();

    cc.loader.load(this._urls, this._progressCallback.bind(this), this._completeCallback.bind(this));
  },
  start: function start() {},
  _clearAll: function _clearAll() {
    for (var i = 0; i < this._urls.length; ++i) {
      var url = this._urls[i];
      cc.loader.release(url);
    }
  },
  _progressCallback: function _progressCallback(completeCount, totalCount, res) {
    //加载进度回调
    // console.log('资源 ' + completeCount + '加载完成！资源加载中...');
    // console.log('加载场景资源');
    this.progress = completeCount / totalCount;
    this.resource = res;
    this.completeCount = completeCount;
    this.totalCount = totalCount; // 代码里面获取cc.Label组件, 修改文本内容
    //在代码里面获取cc.Label组件

    var sys_label = this.node.getChildByName("sys_label").getComponent(cc.Label);
    sys_label.string = parseInt(this.progress * 100) + '%';

    if (this.resource.type == 'json') {// console.log(this.resource);  // json
      // 从服务器加载mp3来进行播放
      // this.audio.clip = ret;
      // this.audio.play();
    }

    if (this.resource.type == 'png' || this.resource.type == 'jpg') {
      console.log(res); // json
      //res是cc.Texture2D这样对象 
      //   this.node.getComponent(cc.Sprite).spriteFrame = new cc.SpriteFrame(res)
      // this.headpic.spriteFrame.setTexture(res);
      // this.node.spriteFrame.setTexture(res);
      // this.sprite.spriteFrame.setContentSize(res.getContentSize());
      // this.node.getComponent(cc.Sprite).spriteFrame = res;
    }

    if (this.resource.type == 'mp3') {
      console.log(res); // mp3
      // this.audio.clip = res;
      // this.audio.play();
      // 从服务器加载mp3来进行播放

      this.current = cc.audioEngine.play(res.url, false, 1);
    }
  },
  _completeCallback: function _completeCallback(err, texture) {
    //加载完成回调
    this.loadnextScene(); // 下一场景 
  },
  update: function update(dt) {
    if (!this.resource) {
      return;
    }

    var progress = this.progressBar.progress;

    if (progress >= 1) {
      console.log('加载完成'); //加载完成

      this.progressBar.node.active = false; //进度条隐藏

      this.bmp_font.node.active = false; // 进度隐藏

      this.enabled = false;
      return;
    }

    if (progress < this.progress) {
      progress += dt;
    }

    this.progressBar.progress = progress;
  },
  loadnextScene: function loadnextScene() {
    // 登录预加载
    cc.director.preloadScene('login', function () {
      cc.log('登录预加载');
    });
    cc.director.loadScene('login');
  } // 　　 changeBj: function(){
  // 　　　　var url = 'globalUI/video/gVideoPlayClick';
  // 　　　　var _this = this; cc.loader.loadRes(url,cc.SpriteFrame,function(err,spriteFrame)
  // 　　　　{ 　
  // 　　　　　　_this.isPlay.spriteFrame = spriteFrame;
  // 　　　　 });
  // 　　　
  // 　　　　//加载网络图片
  //         var url = "www.monster.com/web/app/loading.jpg";
  //         cc.loader.load({url: url, type: 'png'}, function(err,img){
  //             var mylogo  = new cc.SpriteFrame(img); 
  //             self.logo.spriteFrame = mylogo;
  //         });
  // 　　　},

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcbG9hZGluZy5qcyJdLCJuYW1lcyI6WyJzZWxmIiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJzcGVlZCIsInByb2dyZXNzQmFyIiwidHlwZSIsIlByb2dyZXNzQmFyIiwidGV4dCIsIlNwcml0ZSIsImF1ZGlvIiwiQXVkaW9DbGlwIiwicGxheSIsImF1ZGlvU291cmNlIiwicGF1c2UiLCJibXBfZm9udCIsIkxhYmVsIiwib25Mb2FkIiwiY29uc29sZSIsImxvZyIsIm5vZGUiLCJfdXJscyIsInVybCIsInJlc291cmNlIiwicHJvZ3Jlc3MiLCJzdHJpbmciLCJfY2xlYXJBbGwiLCJsb2FkZXIiLCJsb2FkIiwiX3Byb2dyZXNzQ2FsbGJhY2siLCJiaW5kIiwiX2NvbXBsZXRlQ2FsbGJhY2siLCJzdGFydCIsImkiLCJsZW5ndGgiLCJyZWxlYXNlIiwiY29tcGxldGVDb3VudCIsInRvdGFsQ291bnQiLCJyZXMiLCJzeXNfbGFiZWwiLCJnZXRDaGlsZEJ5TmFtZSIsImdldENvbXBvbmVudCIsInBhcnNlSW50IiwiY3VycmVudCIsImF1ZGlvRW5naW5lIiwiZXJyIiwidGV4dHVyZSIsImxvYWRuZXh0U2NlbmUiLCJ1cGRhdGUiLCJkdCIsImFjdGl2ZSIsImVuYWJsZWQiLCJkaXJlY3RvciIsInByZWxvYWRTY2VuZSIsImxvYWRTY2VuZSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQSxJQUFJQSxJQUFJLFNBQVI7QUFDQUMsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFO0FBQ1JDLElBQUFBLEtBQUssRUFBRSxDQURDO0FBRVJDLElBQUFBLFdBQVcsRUFBQztBQUNSLGlCQUFRLElBREE7QUFFUkMsTUFBQUEsSUFBSSxFQUFDTixFQUFFLENBQUNPLFdBRkE7QUFHUkMsTUFBQUEsSUFBSSxFQUFDUixFQUFF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QUFjSyxJQUFkLENBQW1COEIsTUFBbkIsR0FBNEIsS0FBNUIsQ0FKYSxDQUl1Qjs7QUFDcEMsV0FBS0MsT0FBTCxHQUFlLEtBQWY7QUFDQTtBQUNIOztBQUVELFFBQUczQixRQUFRLEdBQUcsS0FBS0EsUUFBbkIsRUFBNEI7QUFDeEJBLE1BQUFBLFFBQVEsSUFBSXlCLEVBQVo7QUFDSDs7QUFFRCxTQUFLNUMsV0FBTCxDQUFpQm1CLFFBQWpCLEdBQTRCQSxRQUE1QjtBQUVILEdBOUpJO0FBZ0tMdUIsRUFBQUEsYUFBYSxFQUFFLHlCQUFXO0FBQ3RCO0FBQ0EvQyxJQUFBQSxFQUFFLENBQUNvRCxRQUFILENBQVlDLFlBQVosQ0FBeUIsT0FBekIsRUFBa0MsWUFBWTtBQUMxQ3JELE1BQUFBLEVBQUUsQ0FBQ21CLEdBQUgsQ0FBTyxPQUFQO0FBQ0gsS0FGRDtBQUdBbkIsSUFBQUEsRUFBRSxDQUFDb0QsUUFBSCxDQUFZRSxTQUFaLENBQXNCLE9BQXRCO0FBQ0gsR0F0S0ksQ0F3S1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUF0TFMsQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsidmFyIHNlbGYgPSB0aGlzO1xyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiBcclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICBzcGVlZDogMSxcclxuICAgICAgICBwcm9ncmVzc0Jhcjp7XHJcbiAgICAgICAgICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAgICAgdHlwZTpjYy5Qcm9ncmVzc0JhcixcclxuICAgICAgICAgICAgdGV4dDpjYy5TcHJpdGUsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBhdWRpbzoge1xyXG4gICAgICAgICAgICBkZWZhdWx0OiBudWxsLFxyXG4gICAgICAgICAgICB0eXBlOiBjYy5BdWRpb0NsaXBcclxuICAgICAgICB9LFxyXG4gICAgICAgIHBsYXk6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgdGhpcy5hdWRpb1NvdXJjZS5wbGF5KCk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBcclxuICAgICAgICBwYXVzZTogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICB0aGlzLmF1ZGlvU291cmNlLnBhdXNlKCk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBibXBfZm9udDoge1xyXG4gICAgICAgICAgICBkZWZhdWx0OiBudWxsLFxyXG4gICAgICAgICAgICB0eXBlOiBjYy5MYWJlbCxcclxuICAgICAgICB9LFxyXG4gICAgICAgIC8vIC8v6buY6K6k5aS05YOPXHJcbiAgICAgICAgLy8gaGVhZHBpYzp7XHJcbiAgICAgICAgLy8gICAgIHR5cGU6Y2MuU3ByaXRlRnJhbWUsXHJcbiAgICAgICAgLy8gICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgIC8v5aS05YOPXHJcbiAgICAgICAgLy8gYmFja2dyb3VuZDp7XHJcbiAgICAgICAgLy8gICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAvLyAgICAgdHlwZTpjYy5TcHJpdGUsXHJcbiAgICAgICAgLy8gfSxcclxuICAgIH0sXHJcblxyXG4gICAgICAgIFxyXG5cclxuICAgIC8vIExJRkUtQ1lDTEUgQ0FMTEJBQ0tTOlxyXG4gXHJcbiAgICBvbkxvYWQgKCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKHRoaXMubm9kZSk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfmraPlnKjlr7nmr5TotYTmupAnKTtcclxuICAgICAgICAgICAgLy8gLy8g6L+c56iLIHVybCDkuI3luKblm77niYflkI7nvIDlkI3vvIzmraTml7blv4XpobvmjIflrprov5znqIvlm77niYfmlofku7bnmoTnsbvlnotcclxuICAgICAgICAgICAgLy8gcmVtb3RlVXJsID0gXCJodHRwOi8vdW5rbm93bi5vcmcvZW1vamk/aWQ9MTI0OTgyMzc0XCI7XHJcbiAgICAgICAgICAgIC8vIGNjLmxvYWRlci5sb2FkKHt1cmw6IHJlbW90ZVVybCwgdHlwZTogJ3BuZyd9LCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAvLyBVc2UgdGV4dHVyZSB0byBjcmVhdGUgc3ByaXRlIGZyYW1lXHJcbiAgICAgICAgICAgIC8vIH0pO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgLy8gLy8g55So57ud5a+56Lev5b6E5Yqg6L296K6+5aSH5a2Y5YKo5YaF55qE6LWE5rqQ77yM5q+U5aaC55u45YaMXHJcbiAgICAgICAgICAgIC8vIHZhciBhYnNvbHV0ZVBhdGggPSBcIi9kYXJhL2RhdGEvc29tZS9wYXRoL3RvL2ltYWdlLnBuZ1wiXHJcbiAgICAgICAgICAgIC8vIGNjLmxvYWRlci5sb2FkKGFic29sdXRlUGF0aCwgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyAgICAgLy8gVXNlIHRleHR1cmUgdG8gY3JlYXRlIHNwcml0ZSBmcmFtZVxyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coJ+ato+WcqOWKoOi9veWcuuaZr+i1hOa6kO+8jOivt+iAkOW/g+etieW+hS4uLicpO1xyXG4gICAgICAgIC8vIOWKoOi9vei1hOa6kOWMhVxyXG4gICAgICAgIHRoaXMuX3VybHMgPSBbXHJcbiAgICAgICAgICAgIHt1cmw6J2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGkvZmlsZS1jb250ZW50P3VybD1odHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvbG9hZGluZy/liZHmjIfoi43ojKsubXAzJywgdHlwZTonbXAzJ30sXHJcbiAgICAgICAgICAgIC8vIHt1cmw6J2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGkvZmlsZS1jb250ZW50P3VybD1odHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvbG9hZGluZy9sb2FkaW5nLmpwZycsIHR5cGU6J2pwZyd9LFxyXG4gICAgICAgICAgICAvLyB7dXJsOidodHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvYXBpL2ZpbGUtY29udGVudD91cmw9aHR0cDovLzEyNy4wLjAuMS8xMjMuanBnJywgdHlwZTonanBnJ30sXHJcbiAgICAgICAgICAgIC8vIHt1cmw6J2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGkvZmlsZS1jb250ZW50P3VybD1odHRwOi8vMTI3LjAuMC4xL2NjYy5wbmcnLCB0eXBlOidwbmcnfSxcclxuICAgICAgICAgICAgLy8ge3VybDonaHR0cDovLzE5Mi4xNjguMTAuMjMvYXBwL2FwaS9maWxlLWNvbnRlbnQ/dXJsPWh0dHA6Ly8xMjcuMC4wLjEvanEyMmhvbmV5LnppcCcsIHR5cGU6J3ppcCd9LFxyXG4gICAgICAgICAgICAvLyB7dXJsOidodHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvYXBpL2ZpbGUtY29udGVudD91cmw9aHR0cDovLzEyNy4wLjAuMS9tb25zdGVyLnppcCcsIHR5cGU6J3ppcCd9LFxyXG4gICAgICAgICAgICAvLyB7dXJsOidodHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvYXBpL2ZpbGUtY29udGVudD91cmw9aHR0cDovLzEyNy4wLjAuMe+8iOi/memHjOWhq+S9oOeahOacjeWKoeWZqGlwKS9pbWFnZTIucG5nJywgdHlwZToncG5nJ30sIFxyXG4gICAgICAgIF07XHJcblxyXG4gICAgICAgIGNvbnNvbGUubG9nKCB0aGlzLnByb2dyZXNzQmFyKTsgXHJcbiAgICAgICAgLy8gY29uc29sZS5sb2coIHRoaXMuc3ByaXRlKTsgXHJcbiAgICAgICAgdGhpcy5yZXNvdXJjZSA9IG51bGw7XHJcbiAgICAgICAgdGhpcy5wcm9ncmVzc0Jhci5wcm9ncmVzcyA9MDtcclxuXHJcbiAgICAgICAgdGhpcy5ibXBfZm9udC5zdHJpbmcgPSBcIjAlXCI7XHJcblxyXG5cclxuICBcclxuICAgICAgICAvLyB0aGlzLlByb2dyZXNzQmFyLnByb2dyZXNzICs9IG1hdGhfcmFuZG9tIC8gMTAwOyBcclxuICAgICAgICB0aGlzLl9jbGVhckFsbCgpO1xyXG4gICAgICAgXHJcbiAgICAgICAgY2MubG9hZGVyLmxvYWQodGhpcy5fdXJscywgdGhpcy5fcHJvZ3Jlc3NDYWxsYmFjay5iaW5kKHRoaXMpLCB0aGlzLl9jb21wbGV0ZUNhbGxiYWNrLmJpbmQodGhpcykpO1xyXG4gICAgfSxcclxuIFxyXG4gICAgc3RhcnQgKCkge1xyXG5cclxuICAgIH0sXHJcbiBcclxuICAgIF9jbGVhckFsbDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgZm9yKHZhciBpID0gMDsgaSA8IHRoaXMuX3VybHMubGVuZ3RoOyArK2kpIHtcclxuICAgICAgICAgICAgdmFyIHVybCA9IHRoaXMuX3VybHNbaV07XHJcbiAgICAgICAgICAgIGNjLmxvYWRlci5yZWxlYXNlKHVybCk7XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuIFxyXG4gICAgX3Byb2dyZXNzQ2FsbGJhY2s6IGZ1bmN0aW9uKGNvbXBsZXRlQ291bnQsIHRvdGFsQ291bnQsIHJlcykge1xyXG4gICAgICAgIC8v5Yqg6L296L+b5bqm5Zue6LCDXHJcbiAgICAgICAgLy8gY29uc29sZS5sb2coJ+i1hOa6kCAnICsgY29tcGxldGVDb3VudCArICfliqDovb3lrozmiJDvvIHotYTmupDliqDovb3kuK0uLi4nKTtcclxuICAgICAgICAvLyBjb25zb2xlLmxvZygn5Yqg6L295Zy65pmv6LWE5rqQJyk7XHJcbiAgICAgICAgdGhpcy5wcm9ncmVzcyA9IGNvbXBsZXRlQ291bnQgLyB0b3RhbENvdW50O1xyXG4gICAgICAgIHRoaXMucmVzb3VyY2UgPSByZXM7XHJcbiAgICAgICAgdGhpcy5jb21wbGV0ZUNvdW50ID0gY29tcGxldGVDb3VudDtcclxuICAgICAgICB0aGlzLnRvdGFsQ291bnQgPSB0b3RhbENvdW50O1xyXG5cclxuICAgICAgICAvLyDku6PnoIHph4zpnaLojrflj5ZjYy5MYWJlbOe7hOS7tiwg5L+u5pS55paH5pys5YaF5a65XHJcbiAgICAgICAgLy/lnKjku6PnoIHph4zpnaLojrflj5ZjYy5MYWJlbOe7hOS7tlxyXG4gICAgICAgIHZhciBzeXNfbGFiZWwgPSB0aGlzLm5vZGUuZ2V0Q2hpbGRCeU5hbWUoXCJzeXNfbGFiZWxcIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKTtcclxuICAgICAgICBzeXNfbGFiZWwuc3RyaW5nID0gcGFyc2VJbnQodGhpcy5wcm9ncmVzcyAqIDEwMCkgKyAnJSc7XHJcblxyXG4gICAgICAgIGlmKCB0aGlzLnJlc291cmNlLnR5cGU9PSdqc29uJyl7XHJcbiAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKHRoaXMucmVzb3VyY2UpOyAgLy8ganNvblxyXG4gICAgICAgICAgICAvLyDku47mnI3liqHlmajliqDovb1tcDPmnaXov5vooYzmkq3mlL5cclxuICAgICAgICAgICAgLy8gdGhpcy5hdWRpby5jbGlwID0gcmV0O1xyXG4gICAgICAgICAgICAvLyB0aGlzLmF1ZGlvLnBsYXkoKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgaWYoIHRoaXMucmVzb3VyY2UudHlwZT09J3BuZyd8fHRoaXMucmVzb3VyY2UudHlwZT09J2pwZycpe1xyXG4gICAgICAgICAgICAgY29uc29sZS5sb2cocmVzKTsgIC8vIGpzb25cclxuICAgICAgICAgICAgLy9yZXPmmK9jYy5UZXh0dXJlMkTov5nmoLflr7nosaEgXHJcbiAgICAgICAgICAgIC8vICAgdGhpcy5ub2RlLmdldENvbXBvbmVudChjYy5TcHJpdGUpLnNwcml0ZUZyYW1lID0gbmV3IGNjLlNwcml0ZUZyYW1lKHJlcylcclxuICAgICAgICAgICAgLy8gdGhpcy5oZWFkcGljLnNwcml0ZUZyYW1lLnNldFRleHR1cmUocmVzKTtcclxuICAgICAgICAgICAgLy8gdGhpcy5ub2RlLnNwcml0ZUZyYW1lLnNldFRleHR1cmUocmVzKTtcclxuICAgICAgICAgICAgLy8gdGhpcy5zcHJpdGUuc3ByaXRlRnJhbWUuc2V0Q29udGVudFNpemUocmVzLmdldENvbnRlbnRTaXplKCkpO1xyXG4gICAgICAgICAgICAvLyB0aGlzLm5vZGUuZ2V0Q29tcG9uZW50KGNjLlNwcml0ZSkuc3ByaXRlRnJhbWUgPSByZXM7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGlmKCB0aGlzLnJlc291cmNlLnR5cGU9PSdtcDMnKXtcclxuICAgICAgICAgICAgY29uc29sZS5sb2cocmVzKTsgIC8vIG1wM1xyXG4gICAgICAgICAgICAvLyB0aGlzLmF1ZGlvLmNsaXAgPSByZXM7XHJcbiAgICAgICAgICAgIC8vIHRoaXMuYXVkaW8ucGxheSgpO1xyXG4gICAgICAgICAgICAvLyDku47mnI3liqHlmajliqDovb1tcDPmnaXov5vooYzmkq3mlL5cclxuICAgICAgICAgICAgdGhpcy5jdXJyZW50ID0gY2MuYXVkaW9FbmdpbmUucGxheShyZXMudXJsLCBmYWxzZSwgMSk7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcbiAgICB9LFxyXG4gXHJcbiAgICBfY29tcGxldGVDYWxsYmFjazogZnVuY3Rpb24oZXJyLCB0ZXh0dXJlKSB7XHJcbiAgICAgICAgLy/liqDovb3lrozmiJDlm57osINcclxuICAgICAgICB0aGlzLmxvYWRuZXh0U2NlbmUoKTsgIC8vIOS4i+S4gOWcuuaZryBcclxuICAgIH0sXHJcbiBcclxuICAgIHVwZGF0ZSAoZHQpIHtcclxuICAgICAgICBpZighdGhpcy5yZXNvdXJjZSl7XHJcbiAgICAgICAgICAgIHJldHVybiA7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHZhciBwcm9ncmVzcyA9IHRoaXMucHJvZ3Jlc3NCYXIucHJvZ3Jlc3M7XHJcbiAgICAgICAgaWYocHJvZ3Jlc3MgPj0gMSl7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfliqDovb3lrozmiJAnKVxyXG4gICAgICAgICAgICAvL+WKoOi9veWujOaIkFxyXG4gICAgICAgICAgICB0aGlzLnByb2dyZXNzQmFyLm5vZGUuYWN0aXZlID0gZmFsc2U7IC8v6L+b5bqm5p2h6ZqQ6JePXHJcbiAgICAgICAgICAgIHRoaXMuYm1wX2ZvbnQubm9kZS5hY3RpdmUgPSBmYWxzZTsgIC8vIOi/m+W6pumakOiXj1xyXG4gICAgICAgICAgICB0aGlzLmVuYWJsZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgcmV0dXJuIDtcclxuICAgICAgICB9XHJcbiBcclxuICAgICAgICBpZihwcm9ncmVzcyA8IHRoaXMucHJvZ3Jlc3Mpe1xyXG4gICAgICAgICAgICBwcm9ncmVzcyArPSBkdDtcclxuICAgICAgICB9XHJcbiAgIFxyXG4gICAgICAgIHRoaXMucHJvZ3Jlc3NCYXIucHJvZ3Jlc3MgPSBwcm9ncmVzcztcclxuICAgXHJcbiAgICB9LFxyXG5cclxuICAgIGxvYWRuZXh0U2NlbmU6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIC8vIOeZu+W9lemihOWKoOi9vVxyXG4gICAgICAgIGNjLmRpcmVjdG9yLnByZWxvYWRTY2VuZSgnbG9naW4nLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGNjLmxvZygn55m75b2V6aKE5Yqg6L29Jyk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdsb2dpbicpO1xyXG4gICAgfSxcclxuXHJcbi8vIOOAgOOAgCBjaGFuZ2VCajogZnVuY3Rpb24oKXtcclxuLy8g44CA44CA44CA44CAdmFyIHVybCA9ICdnbG9iYWxVSS92aWRlby9nVmlkZW9QbGF5Q2xpY2snO1xyXG4vLyDjgIDjgIDjgIDjgIB2YXIgX3RoaXMgPSB0aGlzOyBjYy5sb2FkZXIubG9hZFJlcyh1cmwsY2MuU3ByaXRlRnJhbWUsZnVuY3Rpb24oZXJyLHNwcml0ZUZyYW1lKVxyXG4vLyDjgIDjgIDjgIDjgIB7IOOAgFxyXG4vLyDjgIDjgIDjgIDjgIDjgIDjgIBfdGhpcy5pc1BsYXkuc3ByaXRlRnJhbWUgPSBzcHJpdGVGcmFtZTtcclxuLy8g44CA44CA44CA44CAIH0pO1xyXG4gICAgXHJcbi8vIOOAgOOAgOOAgFxyXG4vLyDjgIDjgIDjgIDjgIAvL+WKoOi9vee9kee7nOWbvueJh1xyXG4vLyAgICAgICAgIHZhciB1cmwgPSBcInd3dy5tb25zdGVyLmNvbS93ZWIvYXBwL2xvYWRpbmcuanBnXCI7XHJcbi8vICAgICAgICAgY2MubG9hZGVyLmxvYWQoe3VybDogdXJsLCB0eXBlOiAncG5nJ30sIGZ1bmN0aW9uKGVycixpbWcpe1xyXG4vLyAgICAgICAgICAgICB2YXIgbXlsb2dvICA9IG5ldyBjYy5TcHJpdGVGcmFtZShpbWcpOyBcclxuLy8gICAgICAgICAgICAgc2VsZi5sb2dvLnNwcml0ZUZyYW1lID0gbXlsb2dvO1xyXG4vLyAgICAgICAgIH0pO1xyXG4vLyDjgIDjgIDjgIB9LFxyXG59KTtcclxuXHJcblxyXG4iXX0=
//------QC-SOURCE-SPLIT------

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcbXlzZXJ2ZXIuanMiXSwibmFtZXMiOlsiSHR0cEhlbHBlciIsInJlcXVpcmUiLCJodHRwUmVxdWVzdCIsImNjIiwiQ2xhc3MiLCJDb21wb25lbnQiLCJwcm9wZXJ0aWVzIiwiZWRpdGJveCIsIkVkaXRCb3giLCJvbkxvYWQiLCJ0b2tlbmxvZ2luIiwibG9hZGVyIiwibG9hZFJlcyIsImVyciIsInJlcyIsImpzb24iLCJwYXJhbXMiLCJ0b2tlbiIsImxvZyIsImh0dHBQb3N0IiwiZGF0YSIsInJlbGVhc2UiLCJjb2RlIiwibG9naW4iLCJidG5DbGljazEiLCJldmVudCIsImN1c3RvbUV2ZW50RGF0YSIsInN5cyIsImxvY2FsU3RvcmFnZSIsInNldEl0ZW0iLCJKU09OIiwic3RyaW5naWZ5Iiwic2VydmVyIiwidXNlcmluZm8iLCJkaXJlY3RvciIsImxvYWRTY2VuZSIsInBhcnNlIiwiZ2V0SXRlbSIsImNhbGxiYWNrIiwic3RhcnQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQ0EsSUFBSUEsVUFBVSxHQUFHQyxPQUFPLENBQUMsTUFBRCxDQUF4QixFQUNBO0FBQ0E7OztBQUNBLElBQUlDLFdBQVcsR0FBSSxJQUFJRixVQUFKLEVBQW5CO0FBQ0FHLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRTtBQUNSQyxJQUFBQSxPQUFPLEVBQUVKLEVBQUUsQ0FBQ0s7QUFESixHQUhQO0FBT0xDLEVBQUFBLE1BQU0sRUFBRSxrQkFBWTtBQUVoQjtBQUNBLFNBQUtDLFVBQUwsR0FIZ0IsQ0FHRztBQUVuQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDSCxHQWxCSTtBQW9CTEEsRUFBQUEsVUFBVSxFQUFFLHNCQUFVO0FBQ2xCO0FBQ0E7QUFDQVAsSUFBQUEsRUFBRSxDQUFDUSxNQUFILENBQVVDLE9BQVYsQ0FBa0IsWUFBbEIsRUFBK0IsVUFBU0MsR0FBVCxFQUFhQyxHQUFiLEVBQWlCO0FBQUk7QUFDaEQsVUFBSUMsSUFBSSxHQUFHRCxHQUFHLENBQUNDLElBQWY7QUFDQSxVQUFJQyxNQUFNLEdBQUc7QUFDVCxpQkFBU0QsSUFBSSxDQUFDRTtBQURMLE9BQWI7QUFHQWQsTUFBQUEsRUFBRSxDQUFDZSxHQUFILENBQU9ILElBQUksQ0FBQ0UsS0FBWjtBQUNBLFVBQUlILEdBQUcsR0FBR1osV0FBVyxDQUFDaUIsUUFBWixDQUFxQixpREFBckIsRUFBd0VILE1BQXhFLEVBQWdGLFVBQVVJLElBQVYsRUFBZ0I7QUFDdEdqQixRQUFBQSxFQUFFLENBQUNRLE1BQUgsQ0FBVVUsT0FBVixDQUFrQixzQkFBbEIsRUFEc0csQ0FDM0Q7QUFDM0M7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFDQSxZQUFHRCxJQUFJLENBQUNFLElBQUwsSUFBVyxDQUFkLEVBQWdCLENBQ1o7QUFDSDtBQUVKLE9BWFMsQ0FBVjtBQVlILEtBbEJEO0FBb0JILEdBM0NJO0FBNkNMQyxFQUFBQSxLQUFLLEVBQUUsaUJBQVU7QUFDYixRQUFJUCxNQUFNLEdBQUc7QUFDVCxtQkFBYSxZQURKO0FBRVQsa0JBQVk7QUFGSCxLQUFiO0FBSUFkLElBQUFBLFdBQVcsQ0FBQ2lCLFFBQVosQ0FBcUIsMkNBQXJCLEVBQWtFSCxNQUFsRSxFQUEwRSxVQUFVSSxJQUFWLEVBQWdCLENBQ3RGO0FBQ0E7QUFDSCxLQUhEO0FBS0gsR0F2REk7QUF5RExJLEVBQUFBLFNBQVMsRUFBRSxtQkFBVUMsS0FBVixFQUFpQkMsZUFBakIsRUFBa0M7QUFFekM7QUFDQSxRQUFJVixNQUFNLEdBQUc7QUFDTCxtQkFBYSxZQURSO0FBRUwsa0JBQVksTUFGUDtBQUdMLGtCQUFZO0FBSFAsS0FBYixDQUh5QyxDQVV6Qzs7QUFDQWQsSUFBQUEsV0FBVyxDQUFDaUIsUUFBWixDQUFxQixnREFBckIsRUFBdUVILE1BQXZFLEVBQStFLFVBQVVJLElBQVYsRUFBZ0I7QUFDM0ZqQixNQUFBQSxFQUFFLENBQUNlLEdBQUgsQ0FBT0UsSUFBUDs7QUFDQSxVQUFHQSxJQUFJLENBQUNFLElBQUwsSUFBVyxDQUFkLEVBQWdCLENBQUU7QUFDZDtBQUNILE9BRkQsTUFFSztBQUNEO0FBQ0FuQixRQUFBQSxFQUFFLENBQUN3QixHQUFILENBQU9DLFlBQVAsQ0FBb0JDLE9BQXBCLENBQTRCLFFBQTVCLEVBQXNDQyxJQUFJLENBQUNDLFNBQUwsQ0FBZVgsSUFBSSxDQUFDQSxJQUFMLENBQVVZLE1BQXpCLENBQXRDOztBQUNBLFlBQUdaLElBQUksQ0FBQ0UsSUFBTCxJQUFXLENBQWQsRUFBZ0I7QUFBQztBQUNiO0FBQ0FuQixVQUFBQSxFQUFFLENBQUN3QixHQUFILENBQU9DLFlBQVAsQ0FBb0JDLE9BQXBCLENBQTRCLFVBQTVCLEVBQXdDQyxJQUFJLENBQUNDLFNBQUwsQ0FBZVgsSUFBSSxDQUFDQSxJQUFMLENBQVVhLFFBQXpCLENBQXhDO0FBQ0E5QixVQUFBQSxFQUFFLENBQUMrQixRQUFILENBQVlDLFNBQVosQ0FBc0IsY0FBdEIsRUFIWSxDQUlaO0FBQ0E7QUFDSDs7QUFDRCxZQUFHZixJQUFJLENBQUNFLElBQUwsSUFBVyxDQUFkLEVBQWdCO0FBQUU7QUFDZDtBQUNBLGNBQUlVLE1BQU0sR0FBR0YsSUFBSSxDQUFDTSxLQUFMLENBQVdqQyxFQUFFLENBQUN3QixHQUFILENBQU9DLFlBQVAsQ0FBb0JTLE9BQXBCLENBQTRCLFFBQTVCLENBQVgsQ0FBYixDQUZZLENBR1o7QUFDQTs7QUFDQWxDLFVBQUFBLEVBQUUsQ0FBQytCLFFBQUgsQ0FBWUMsU0FBWixDQUFzQixVQUF0QjtBQUNIO0FBQ0o7QUFFSixLQXZCRCxFQVh5QyxDQW9DekM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNILEdBbEdJO0FBb0dMRyxFQUFBQSxRQUFRLEVBQUUsa0JBQVViLEtBQVYsRUFBaUI7QUFDdkI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ1F0QixJQUFBQSxFQUFFLENBQUMrQixRQUFILENBQVlDLFNBQVosQ0FBc0IsS0FBdEIsRUFyQmUsQ0FzQnZCO0FBQ0E7QUFDQTtBQUNBO0FBRUgsR0EvSEk7QUFpSUxJLEVBQUFBLEtBaklLLG1CQWlJSSxDQUVSLENBbklJLENBcUlMOztBQXJJSyxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyJcclxudmFyIEh0dHBIZWxwZXIgPSByZXF1aXJlKFwiaHR0cFwiKTtcclxuLy8gdmFyIGZzID0gcmVxdWlyZSgnZnMnKTsgLy8g5byV5YWlZnPmqKHlnZdcclxuLy8gdmFyIGdsb2JhbHVzZXJpbmZvID0gcmVxdWlyZShcIkdsb2JhbHVzZXJJbmZvXCIpO1xyXG5sZXQgaHR0cFJlcXVlc3QgPSAgbmV3IEh0dHBIZWxwZXIoKTsgIFxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiBcclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICBlZGl0Ym94OiBjYy5FZGl0Qm94XHJcbiAgICB9LFxyXG4gXHJcbiAgICBvbkxvYWQ6IGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAgICAgLy8g5pON5L2c5paH5pysLS3or7vlj5bnlKjmiLfkv6Hmga9cclxuICAgICAgICB0aGlzLnRva2VubG9naW4oKTsgLy8g5b+r5o2355m75b2VXHJcblxyXG4gICAgICAgIC8vIC8vIOi0puWPt+WvhueggeeZu+W9lVxyXG4gICAgICAgIC8vIHRoaXMubG9naW4oKTtcclxuICAgICAgICAvL+WCqOWtmOe8k+WtmFxyXG4gICAgICAgIC8vIGNjLnN5cy5sb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndG9rZW4nLCB2YWx1ZSk7XHJcbiAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5nZXRJdGVtKGtleSk7XHJcbiAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5yZW1vdmVJdGVtKGtleSk7XHJcbiAgICB9LFxyXG4gICAgIFxyXG4gICAgdG9rZW5sb2dpbjogZnVuY3Rpb24oKXtcclxuICAgICAgICAvLyDojrflj5bmnKzlnLBqc29uICDkv6Hmga9cclxuICAgICAgICAvLyBjYy5sb2FkZXIubG9hZCggY2MudXJsLnJhdyhcInJlc291cmNlcy9sb2dpbi5qc29uXCIpLGZ1bmN0aW9uKGVycixyZXMpeyAgXHJcbiAgICAgICAgY2MubG9hZGVyLmxvYWRSZXMoJ2xvZ2luLmpzb24nLGZ1bmN0aW9uKGVycixyZXMpeyAgIC8v6buY6K6kcmVzb3VyY2VzXHJcbiAgICAgICAgICAgIGxldCBqc29uID0gcmVzLmpzb247XHJcbiAgICAgICAgICAgIHZhciBwYXJhbXMgPSB7XHJcbiAgICAgICAgICAgICAgICAndG9rZW4nOiBqc29uLnRva2VuLFxyXG4gICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICBjYy5sb2coanNvbi50b2tlbik7IFxyXG4gICAgICAgICAgICB2YXIgcmVzID0gaHR0cFJlcXVlc3QuaHR0cFBvc3QoJ2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGktc2VydmVyL3Rva2VuLWxvZ2luJywgcGFyYW1zICxmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgY2MubG9hZGVyLnJlbGVhc2UoJ3Jlc291cmNlcy9sb2dpbi5qc29uJyk7IC8v6YeK5pS+anNvbiDotYTmupBcclxuICAgICAgICAgICAgICAgIC8vIGlmKGNjLnN5cy5pc05hdGl2ZSl7ICAvLyAganNiLmZpbGVVdGlsc+S4jeaUr+aMgSB3ZWIgIOivu+WGmVxyXG4gICAgICAgICAgICAgICAgLy8gICAgIGpzYi5maWxlVXRpbHMud3JpdGVTdHJpbmdUb0ZpbGUoZGF0YSx0b2tlbilcclxuICAgICAgICAgICAgICAgIC8vIH1cclxuICAgICAgICAgICAgICAgIC8vIGNjLmxvZyhkYXRhKTsgXHJcbiAgICAgICAgICAgICAgICAvLyDmnKrnmbvlvZXlvLnlh7rnmbvlvZVcclxuICAgICAgICAgICAgICAgIGlmKGRhdGEuY29kZT09MCl7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gdGhpcy5sb2dpbmJveC5ub2RlLmFjdGl2ZSA9IGZhbHNlOyAgLy8g6L+b5bqm6ZqQ6JePXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICBcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSlcclxuXHJcbiAgICB9LFxyXG5cclxuICAgIGxvZ2luOiBmdW5jdGlvbigpe1xyXG4gICAgICAgIHZhciBwYXJhbXMgPSB7XHJcbiAgICAgICAgICAgICdsb2dpbm5hbWUnOiAneWluY2FuMTk5MycsXHJcbiAgICAgICAgICAgICdwYXNzd29yZCc6IDEyMzQ1NixcclxuICAgICAgICB9O1xyXG4gICAgICAgIGh0dHBSZXF1ZXN0Lmh0dHBQb3N0KCdodHRwOi8vMTkyLjE2OC4xMC4yMy9hcHAvYXBpLXNlcnZlci9sb2dpbicsIHBhcmFtcyAsZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgLy8gY2MubG9nKGRhdGEpOyBcclxuICAgICAgICAgICAgLy/mk43kvZzmlofmnKwtLeS/ruaUueeUqOaIt+S/oeaBr1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgYnRuQ2xpY2sxOiBmdW5jdGlvbiAoZXZlbnQsIGN1c3RvbUV2ZW50RGF0YSkge1xyXG5cclxuICAgICAgICAvLyDor7fmsYLnmbvlvZXmjqXlj6NcclxuICAgICAgICB2YXIgcGFyYW1zID0ge1xyXG4gICAgICAgICAgICAgICAgJ2xvZ2lubmFtZSc6ICd5aW5jYW4xOTkzJyxcclxuICAgICAgICAgICAgICAgICdwYXNzd29yZCc6IDEyMzQ1NixcclxuICAgICAgICAgICAgICAgICdzZXJ2ZXJpZCc6IDEsXHJcbiAgICAgICAgfTtcclxuXHJcblxyXG4gICAgICAgIC8vIGxldCBodHRwUmVxdWVzdCA9ICBuZXcgSHR0cEhlbHBlcigpOyAgXHJcbiAgICAgICAgaHR0cFJlcXVlc3QuaHR0cFBvc3QoJ2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGktc2VydmVyL3VzZXItbG9naW4nLCBwYXJhbXMgLGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgIGNjLmxvZyhkYXRhKTsgXHJcbiAgICAgICAgICAgIGlmKGRhdGEuY29kZT09MCl7IC8vIOeZu+W9leWksei0pe+8jOaIluacrOWcsOaVsOaNruWkseaViFxyXG4gICAgICAgICAgICAgICAgLy8g5by556qXXHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgLy8g6K6+572u5pyN5Yqh5ZmoXHJcbiAgICAgICAgICAgICAgICBjYy5zeXMubG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3NlcnZlcicsIEpTT04uc3RyaW5naWZ5KGRhdGEuZGF0YS5zZXJ2ZXIpKTtcclxuICAgICAgICAgICAgICAgIGlmKGRhdGEuY29kZT09MSl7Ly8g55m75b2V5oiQ5Yqf77yM6L+b5YWl5ri45oiPXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gY2MubG9nKGRhdGEuZGF0YS51c2VyaW5mbyk7IFxyXG4gICAgICAgICAgICAgICAgICAgIGNjLnN5cy5sb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndXNlcmluZm8nLCBKU09OLnN0cmluZ2lmeShkYXRhLmRhdGEudXNlcmluZm8pKTsgXHJcbiAgICAgICAgICAgICAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdtb2RlbC9kYXRpbmcnKTtcclxuICAgICAgICAgICAgICAgICAgICAvLyBjYy5zeXMubG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3VzZXJpbmZvJywgSlNPTi5zdHJpbmdpZnkoZGF0YS5kYXRhLnVzZXJpbmZvKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gY2Muc3lzLmxvY2FsU3RvcmFnZS5nZXRJdGVtKGtleSk7IC8v6K+75Y+W5pWw5o2uXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBpZihkYXRhLmNvZGU9PTIpeyAvLyDnmbvlvZXmiJDlip/vvIzmnKrlrprkuYnop5LoibJcclxuICAgICAgICAgICAgICAgICAgICAvLyDov5vlhaXlrprkuYnop5LoibLnlYzpnaIgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIHZhciBzZXJ2ZXIgPSBKU09OLnBhcnNlKGNjLnN5cy5sb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnc2VydmVyJykpO1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIGNjLmxvZyhzZXJ2ZXIpOyBcclxuICAgICAgICAgICAgICAgICAgICAvLyDliJvlu7rop5LoibJcclxuICAgICAgICAgICAgICAgICAgICBjYy5kaXJlY3Rvci5sb2FkU2NlbmUoJ3JlZ2lzdGVyJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgXHJcbiAgICAgICAgLy/ov5nph4wgZXZlbnQg5piv5LiA5LiqIFRvdWNoIEV2ZW50IOWvueixoe+8jOS9oOWPr+S7pemAmui/hyBldmVudC50YXJnZXQg5Y+W5Yiw5LqL5Lu255qE5Y+R6YCB6IqC54K5XHJcbiAgICAgICAgLy8gdmFyIG5vZGUgPSBldmVudC50YXJnZXQ7XHJcbiAgICAgICAgLy8gdmFyIGJ1dHRvbiA9IG5vZGUuZ2V0Q29tcG9uZW50KGNjLkJ1dHRvbik7XHJcbiAgICAgICAgLy/ov5nph4znmoQgY3VzdG9tRXZlbnREYXRhIOWPguaVsOWwseetieS6juS9oOS5i+WJjeiuvue9rueahCBcImNsaWNrMSB1c2VyIGRhdGFcIlxyXG4gICAgICAgIC8vIGNjLmxvZyhcIm5vZGU9XCIsIG5vZGUubmFtZSwgXCIgZXZlbnQ9XCIsIGV2ZW50LnR5cGUsIFwiIGRhdGE9XCIsIGN1c3RvbUV2ZW50RGF0YSk7XHJcbiAgICB9LFxyXG5cclxuICAgIGNhbGxiYWNrOiBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAvLyBjYy5sb2coZGF0YSlcclxuICAgICAgICAvLyB2YXIgdXNlckNvdW50ID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfY291bnRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyB2YXIgdXNlclBhc3N3YXJkID0gIGNjLmZpbmQoXCJDYW52YXMvZ3JvdW5kL2VkaXRib3hfcGFzc3dhcmRcIikuZ2V0Q29tcG9uZW50KGNjLkVkaXRCb3gpLnN0cmluZztcclxuICAgICAgICAvLyBjb25zb2xlLmxvZyhcIueUqOaIt+i0puWPt++8mlwiK3VzZXJDb3VudCsgXCLnlKjmiLflr4bnoIHvvJpcIisgdXNlclBhc3N3YXJkKTtcclxuICAgICAgICAvLyBIdHRwSGVscC5sb2dpbih1c2VyQ291bnQsdXNlclBhc3N3YXJkLGZ1bmN0aW9uKGlzU3VjY2VzcyxEYXRhKXtcclxuICAgICAgICAvLyAgICAgdmFyIGluZm8gPSBEYXRhO1xyXG4gICAgICAgIC8vICAgICBpZih0cnVlID09IGlzU3VjY2Vzcyl7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBzdWNjZXNzISEhXCIpO1xyXG4gICAgICAgIC8vICAgICAgICAgY29uc29sZS5sb2coaW5mbyk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VybmFtZSA9IGluZm8udXNlcm5hbWU7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5nYW1lcG9pbnQgPSBpbmZvLmdhbWVwb2ludDtcclxuICAgICAgICAvLyAgICAgICAgIGdsb2JhbHVzZXJpbmZvLnNrZXkgPSBpbmZvLnNrZXk7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby51c2VyaWQgPSBpbmZvLnVzZXJpZDtcclxuIFxyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8ubW9uZXkgPSBpbmZvLm1vbmV5O1xyXG4gICAgICAgIC8vICAgICAgICAgZ2xvYmFsdXNlcmluZm8udXNlcmlkID0gaW5mby51c2VyaWQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5wYXNzd29yZCA9IGluZm8ucGFzc3dvcmQ7XHJcbiAgICAgICAgLy8gICAgICAgICBnbG9iYWx1c2VyaW5mby5zYWx0ID0gaW5mby5zYWx0O1xyXG4gXHJcbiAgICAgICAgLy8gICAgICAgICAvL+eZu+W9leaIkOWKn+WQjuWKoOi9veWcsOWbvui1hOa6kFxyXG4gICAgICAgICAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdtYXAnKTtcclxuICAgICAgICAvLyAgICAgfWVsc2V7XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZyhcImxvZ2luICBmaWxlZCEhIVwiKVxyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgXHJcbiAgICB9LFxyXG4gXHJcbiAgICBzdGFydCAoKSB7XHJcbiBcclxuICAgIH0sXHJcbiBcclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/ProgressBarScript.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'f03637Rq8NIL4xawPe0R84Z', 'ProgressBarScript');
// Script/login/ProgressBarScript.js

"use strict";

cc.Class({
  "extends": cc.Component,
  properties: {
    speed: 1,
    progressBarView: {
      type: cc.ProgressBar,
      "default": null
    }
  },
  //当我们将脚本添加到节点 `node`上面的时候
  onLoad: function onLoad() {
    this._ping = true;
    this.progressBarView.progress = 0;
  },
  update: function update(dt) {
    this._updateProgressBar(this.progressBarView, dt);
  },
  _updateProgressBar: function _updateProgressBar(progressBar, dt) {
    var progress = progressBar.progress;

    if (progress < 1.0 && this._ping) {
      progress += dt * this.speed;
    } else {
      progress -= dt * this.speed;
      this._ping = progress <= 0;
    }

    progressBar.progress = progress;
  } // update (dt) {},

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcUHJvZ3Jlc3NCYXJTY3JpcHQuanMiXSwibmFtZXMiOlsiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJzcGVlZCIsInByb2dyZXNzQmFyVmlldyIsInR5cGUiLCJQcm9ncmVzc0JhciIsIm9uTG9hZCIsIl9waW5nIiwicHJvZ3Jlc3MiLCJ1cGRhdGUiLCJkdCIsIl91cGRhdGVQcm9ncmVzc0JhciIsInByb2dyZXNzQmFyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7OztBQUNBQSxFQUFFLENBQUNDLEtBQUgsQ0FBUztBQUNMLGFBQVNELEVBQUUsQ0FBQ0UsU0FEUDtBQUdMQyxFQUFBQSxVQUFVLEVBQUU7QUFFUkMsSUFBQUEsS0FBSyxFQUFFLENBRkM7QUFHUkMsSUFBQUEsZUFBZSxFQUFFO0FBQ2JDLE1BQUFBLElBQUksRUFBRU4sRUFBRSxDQUFDTyxXQURJO0FBRWIsaUJBQVM7QUFGSTtBQUhULEdBSFA7QUFZRDtBQUNKQyxFQUFBQSxNQUFNLEVBQUUsa0JBQVk7QUFFaEIsU0FBS0MsS0FBTCxHQUFhLElBQWI7QUFDQSxTQUFLSixlQUFMLENBQXFCSyxRQUFyQixHQUFnQyxDQUFoQztBQUNILEdBakJJO0FBbUJMQyxFQUFBQSxNQUFNLEVBQUUsZ0JBQVVDLEVBQVYsRUFBYztBQUNsQixTQUFLQyxrQkFBTCxDQUF3QixLQUFLUixlQUE3QixFQUE4Q08sRUFBOUM7QUFDSCxHQXJCSTtBQXVCTEMsRUFBQUEsa0JBQWtCLEVBQUUsNEJBQVNDLFdBQVQsRUFBc0JGLEVBQXRCLEVBQXlCO0FBRXpDLFFBQUlGLFFBQVEsR0FBR0ksV0FBVyxDQUFDSixRQUEzQjs7QUFDQSxRQUFHQSxRQUFRLEdBQUcsR0FBWCxJQUFrQixLQUFLRCxLQUExQixFQUFnQztBQUM1QkMsTUFBQUEsUUFBUSxJQUFJRSxFQUFFLEdBQUcsS0FBS1IsS0FBdEI7QUFDSCxLQUZELE1BR0s7QUFDRE0sTUFBQUEsUUFBUSxJQUFJRSxFQUFFLEdBQUcsS0FBS1IsS0FBdEI7QUFDQSxXQUFLSyxLQUFMLEdBQWFDLFFBQVEsSUFBSSxDQUF6QjtBQUNIOztBQUNESSxJQUFBQSxXQUFXLENBQUNKLFFBQVosR0FBdUJBLFFBQXZCO0FBQ0gsR0FsQ0ksQ0FxQ0w7O0FBckNLLENBQVQiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbIlxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG5cclxuICAgICAgICBzcGVlZDogMSxcclxuICAgICAgICBwcm9ncmVzc0JhclZpZXc6IHtcclxuICAgICAgICAgICAgdHlwZTogY2MuUHJvZ3Jlc3NCYXIsXHJcbiAgICAgICAgICAgIGRlZmF1bHQ6IG51bGxcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG5cclxuICAgICAgICAvL+W9k+aIkeS7rOWwhuiEmuacrOa3u+WKoOWIsOiKgueCuSBgbm9kZWDkuIrpnaLnmoTml7blgJlcclxuICAgIG9uTG9hZDogZnVuY3Rpb24gKCkge1xyXG4gICAgXHJcbiAgICAgICAgdGhpcy5fcGluZyA9IHRydWU7XHJcbiAgICAgICAgdGhpcy5wcm9ncmVzc0JhclZpZXcucHJvZ3Jlc3MgPSAwO1xyXG4gICAgfSxcclxuXHJcbiAgICB1cGRhdGU6IGZ1bmN0aW9uIChkdCkge1xyXG4gICAgICAgIHRoaXMuX3VwZGF0ZVByb2dyZXNzQmFyKHRoaXMucHJvZ3Jlc3NCYXJWaWV3LCBkdCk7XHJcbiAgICB9LFxyXG4gICAgXHJcbiAgICBfdXBkYXRlUHJvZ3Jlc3NCYXI6IGZ1bmN0aW9uKHByb2dyZXNzQmFyLCBkdCl7XHJcblxyXG4gICAgICAgIHZhciBwcm9ncmVzcyA9IHByb2dyZXNzQmFyLnByb2dyZXNzO1xyXG4gICAgICAgIGlmKHByb2dyZXNzIDwgMS4wICYmIHRoaXMuX3Bpbmcpe1xyXG4gICAgICAgICAgICBwcm9ncmVzcyArPSBkdCAqIHRoaXMuc3BlZWQ7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGVsc2Uge1xyXG4gICAgICAgICAgICBwcm9ncmVzcyAtPSBkdCAqIHRoaXMuc3BlZWQ7XHJcbiAgICAgICAgICAgIHRoaXMuX3BpbmcgPSBwcm9ncmVzcyA8PSAwO1xyXG4gICAgICAgIH1cclxuICAgICAgICBwcm9ncmVzc0Jhci5wcm9ncmVzcyA9IHByb2dyZXNzO1xyXG4gICAgfSxcclxuXHJcblxyXG4gICAgLy8gdXBkYXRlIChkdCkge30sXHJcbn0pO1xyXG4iXX0=
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/scence/loadin_fist.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'c9df1hntNVFBZSGCCOYdkEb', 'loadin_fist');
// Script/scence/loadin_fist.js

"use strict";

// Learn cc.Class:
//  - https://docs.cocos.com/creator/manual/en/scripting/class.html
// Learn Attribute:
//  - https://docs.cocos.com/creator/manual/en/scripting/reference/attributes.html
// Learn life-cycle callbacks:
//  - https://docs.cocos.com/creator/manual/en/scripting/life-cycle-callbacks.html
cc.Class({
  "extends": cc.Component,
  properties: {// foo: {
    //     // ATTRIBUTES:
    //     default: null,        // The default value will be used only when the component attaching
    //                           // to a node for the first time
    //     type: cc.SpriteFrame, // optional, default is typeof default
    //     serializable: true,   // optional, default is true
    // },
    // bar: {
    //     get () {
    //         return this._bar;
    //     },
    //     set (value) {
    //         this._bar = value;
    //     }
    // },
  },
  // LIFE-CYCLE CALLBACKS:
  // onLoad () {},
  start: function start() {},
  // update (dt) {},
  loadnextScene: function loadnextScene() {
    // 登录预加载
    cc.director.preloadScene('login', function () {
      cc.log('登录预加载');
    });
    cc.director.loadScene('login');
  },
  //登录
  login: function login() {
    cc.director.loadScene('login');
  },
  //角色
  role: function role() {
    cc.director.loadScene('role');
  },
  //注册
  register: function register() {
    cc.director.loadScene('register');
  },
  //大厅
  home: function home() {
    cc.director.loadScene('home');
  },
  //奖励
  jiangli: function jiangli() {
    cc.director.loadScene('jiangli');
  },
  //充值
  chongzhi: function chongzhi() {
    cc.director.loadScene('chongzhi');
  },
  //充值
  zhifu: function zhifu() {
    cc.director.loadScene('zhifu');
  }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxzY2VuY2VcXGxvYWRpbl9maXN0LmpzIl0sIm5hbWVzIjpbImNjIiwiQ2xhc3MiLCJDb21wb25lbnQiLCJwcm9wZXJ0aWVzIiwic3RhcnQiLCJsb2FkbmV4dFNjZW5lIiwiZGlyZWN0b3IiLCJwcmVsb2FkU2NlbmUiLCJsb2ciLCJsb2FkU2NlbmUiLCJsb2dpbiIsInJvbGUiLCJyZWdpc3RlciIsImhvbWUiLCJqaWFuZ2xpIiwiY2hvbmd6aGkiLCJ6aGlmdSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFLENBQ1I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBZlEsR0FIUDtBQXFCTDtBQUVBO0FBRUFDLEVBQUFBLEtBekJLLG1CQXlCSSxDQUVSLENBM0JJO0FBNkJMO0FBR0FDLEVBQUFBLGFBQWEsRUFBRSx5QkFBVztBQUN0QjtBQUNBTCxJQUFBQSxFQUFFLENBQUNNLFFBQUgsQ0FBWUMsWUFBWixDQUF5QixPQUF6QixFQUFrQyxZQUFZO0FBQzFDUCxNQUFBQSxFQUFFLENBQUNRLEdBQUgsQ0FBTyxPQUFQO0FBQ0gsS0FGRDtBQUdBUixJQUFBQSxFQUFFLENBQUNNLFFBQUgsQ0FBWUcsU0FBWixDQUFzQixPQUF0QjtBQUNILEdBdENJO0FBd0NMO0FBQ0FDLEVBQUFBLEtBQUssRUFBRSxpQkFBVztBQUNsQlYsSUFBQUEsRUFBRSxDQUFDTSxRQUFILENBQVlHLFNBQVosQ0FBc0IsT0FBdEI7QUFDQyxHQTNDSTtBQTZDTDtBQUNBRSxFQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYlgsSUFBQUEsRUFBRSxDQUFDTSxRQUFILENBQVlHLFNBQVosQ0FBc0IsTUFBdEI7QUFDSCxHQWhESTtBQWtETDtBQUNBRyxFQUFBQSxRQUFRLEVBQUUsb0JBQVc7QUFDakJaLElBQUFBLEVBQUUsQ0FBQ00sUUFBSCxDQUFZRyxTQUFaLENBQXNCLFVBQXRCO0FBQ0gsR0FyREk7QUF1REw7QUFDQUksRUFBQUEsSUFBSSxFQUFFLGdCQUFXO0FBQ2JiLElBQUFBLEVBQUUsQ0FBQ00sUUFBSCxDQUFZRyxTQUFaLENBQXNCLE1BQXRCO0FBQ0gsR0ExREk7QUE0REw7QUFDQUssRUFBQUEsT0FBTyxFQUFFLG1CQUFXO0FBQ2hCZCxJQUFBQSxFQUFFLENBQUNNLFFBQUgsQ0FBWUcsU0FBWixDQUFzQixTQUF0QjtBQUNILEdBL0RJO0FBaUVMO0FBQ0FNLEVBQUFBLFFBQVEsRUFBRSxvQkFBVztBQUNqQmYsSUFBQUEsRUFBRSxDQUFDTSxRQUFILENBQVlHLFNBQVosQ0FBc0IsVUFBdEI7QUFDSCxHQXBFSTtBQXNFTDtBQUNBTyxFQUFBQSxLQUFLLEVBQUUsaUJBQVc7QUFDZGhCLElBQUFBLEVBQUUsQ0FBQ00sUUFBSCxDQUFZRyxTQUFaLENBQXNCLE9BQXRCO0FBQ0g7QUF6RUksQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLy8gTGVhcm4gY2MuQ2xhc3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9yZWZlcmVuY2UvYXR0cmlidXRlcy5odG1sXHJcbi8vIExlYXJuIGxpZmUtY3ljbGUgY2FsbGJhY2tzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9saWZlLWN5Y2xlLWNhbGxiYWNrcy5odG1sXHJcblxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG4gICAgICAgIC8vIGZvbzoge1xyXG4gICAgICAgIC8vICAgICAvLyBBVFRSSUJVVEVTOlxyXG4gICAgICAgIC8vICAgICBkZWZhdWx0OiBudWxsLCAgICAgICAgLy8gVGhlIGRlZmF1bHQgdmFsdWUgd2lsbCBiZSB1c2VkIG9ubHkgd2hlbiB0aGUgY29tcG9uZW50IGF0dGFjaGluZ1xyXG4gICAgICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gdG8gYSBub2RlIGZvciB0aGUgZmlyc3QgdGltZVxyXG4gICAgICAgIC8vICAgICB0eXBlOiBjYy5TcHJpdGVGcmFtZSwgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHlwZW9mIGRlZmF1bHRcclxuICAgICAgICAvLyAgICAgc2VyaWFsaXphYmxlOiB0cnVlLCAgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHRydWVcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgIC8vIGJhcjoge1xyXG4gICAgICAgIC8vICAgICBnZXQgKCkge1xyXG4gICAgICAgIC8vICAgICAgICAgcmV0dXJuIHRoaXMuX2JhcjtcclxuICAgICAgICAvLyAgICAgfSxcclxuICAgICAgICAvLyAgICAgc2V0ICh2YWx1ZSkge1xyXG4gICAgICAgIC8vICAgICAgICAgdGhpcy5fYmFyID0gdmFsdWU7XHJcbiAgICAgICAgLy8gICAgIH1cclxuICAgICAgICAvLyB9LFxyXG4gICAgfSxcclxuXHJcbiAgICAvLyBMSUZFLUNZQ0xFIENBTExCQUNLUzpcclxuXHJcbiAgICAvLyBvbkxvYWQgKCkge30sXHJcblxyXG4gICAgc3RhcnQgKCkge1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgLy8gdXBkYXRlIChkdCkge30sXHJcblxyXG5cclxuICAgIGxvYWRuZXh0U2NlbmU6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIC8vIOeZu+W9lemihOWKoOi9vVxyXG4gICAgICAgIGNjLmRpcmVjdG9yLnByZWxvYWRTY2VuZSgnbG9naW4nLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGNjLmxvZygn55m75b2V6aKE5Yqg6L29Jyk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdsb2dpbicpO1xyXG4gICAgfSxcclxuXHJcbiAgICAvL+eZu+W9lVxyXG4gICAgbG9naW46IGZ1bmN0aW9uKCkge1xyXG4gICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdsb2dpbicpO1xyXG4gICAgfSxcclxuXHJcbiAgICAvL+inkuiJslxyXG4gICAgcm9sZTogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdyb2xlJyk7XHJcbiAgICB9LFxyXG5cclxuICAgIC8v5rOo5YaMXHJcbiAgICByZWdpc3RlcjogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdyZWdpc3RlcicpO1xyXG4gICAgfSxcclxuXHJcbiAgICAvL+Wkp+WOhVxyXG4gICAgaG9tZTogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdob21lJyk7XHJcbiAgICB9LFxyXG5cclxuICAgIC8v5aWW5YqxXHJcbiAgICBqaWFuZ2xpOiBmdW5jdGlvbigpIHtcclxuICAgICAgICBjYy5kaXJlY3Rvci5sb2FkU2NlbmUoJ2ppYW5nbGknKTtcclxuICAgIH0sXHJcbiAgIFxyXG4gICAgLy/lhYXlgLxcclxuICAgIGNob25nemhpOiBmdW5jdGlvbigpIHtcclxuICAgICAgICBjYy5kaXJlY3Rvci5sb2FkU2NlbmUoJ2Nob25nemhpJyk7XHJcbiAgICB9LFxyXG5cclxuICAgIC8v5YWF5YC8XHJcbiAgICB6aGlmdTogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCd6aGlmdScpO1xyXG4gICAgfSxcclxuXHJcblxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/role.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, 'ba2146UZDNDA7jR6DbxLO8s', 'role');
// Script/login/role.js

"use strict";

// Learn cc.Class:
//  - https://docs.cocos.com/creator/manual/en/scripting/class.html
// Learn Attribute:
//  - https://docs.cocos.com/creator/manual/en/scripting/reference/attributes.html
// Learn life-cycle callbacks:
//  - https://docs.cocos.com/creator/manual/en/scripting/life-cycle-callbacks.html
var HttpHelper = require("http"); // var fs = require('fs'); // 引入fs模块
// var globaluserinfo = require("GlobaluserInfo");


var httpRequest = new HttpHelper();
cc.Class({
  "extends": cc.Component,
  properties: {// foo: {
    //     // ATTRIBUTES:
    //     default: null,        // The default value will be used only when the component attaching
    //                           // to a node for the first time
    //     type: cc.SpriteFrame, // optional, default is typeof default
    //     serializable: true,   // optional, default is true
    // },
    // bar: {
    //     get () {
    //         return this._bar;
    //     },
    //     set (value) {
    //         this._bar = value;
    //     }
    // },
  },
  // LIFE-CYCLE CALLBACKS:
  // onLoad () {},
  start: function start() {},
  //创建角色
  create_role: function create_role() {
    var server = JSON.parse(cc.sys.localStorage.getItem('server')); // 请求登录接口

    var params = {
      'loginid': server.loginid,
      'server': server.id,
      'name': '测试',
      'servername': server.name
    }; // cc.log(server); 

    httpRequest.httpPost('http://www.monster.com/app/api-server/user-role', params, function (data) {
      cc.log(data);

      if (data.code == 0) {
        // 登录失败，或本地数据失效
        cc.director.loadScene('login');
      } else {
        cc.sys.localStorage.setItem('userinfo', JSON.stringify(data.data.userinfo));
        cc.director.loadScene('model/dating');
      }
    });
  } // update (dt) {},

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxccm9sZS5qcyJdLCJuYW1lcyI6WyJIdHRwSGVscGVyIiwicmVxdWlyZSIsImh0dHBSZXF1ZXN0IiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJzdGFydCIsImNyZWF0ZV9yb2xlIiwic2VydmVyIiwiSlNPTiIsInBhcnNlIiwic3lzIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsInBhcmFtcyIsImxvZ2luaWQiLCJpZCIsIm5hbWUiLCJodHRwUG9zdCIsImRhdGEiLCJsb2ciLCJjb2RlIiwiZGlyZWN0b3IiLCJsb2FkU2NlbmUiLCJzZXRJdGVtIiwic3RyaW5naWZ5IiwidXNlcmluZm8iXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSUEsVUFBVSxHQUFHQyxPQUFPLENBQUMsTUFBRCxDQUF4QixFQUNBO0FBQ0E7OztBQUNBLElBQUlDLFdBQVcsR0FBSSxJQUFJRixVQUFKLEVBQW5CO0FBQ0FHLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRSxDQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWZRLEdBSFA7QUFxQkw7QUFFQTtBQUVBQyxFQUFBQSxLQXpCSyxtQkF5QkksQ0FFUixDQTNCSTtBQTZCTDtBQUNBQyxFQUFBQSxXQTlCSyx5QkE4QlE7QUFDVCxRQUFJQyxNQUFNLEdBQUdDLElBQUksQ0FBQ0MsS0FBTCxDQUFXUixFQUFFLENBQUNTLEdBQUgsQ0FBT0MsWUFBUCxDQUFvQkMsT0FBcEIsQ0FBNEIsUUFBNUIsQ0FBWCxDQUFiLENBRFMsQ0FFVDs7QUFDSSxRQUFJQyxNQUFNLEdBQUc7QUFDVCxpQkFBV04sTUFBTSxDQUFDTyxPQURUO0FBRVQsZ0JBQVVQLE1BQU0sQ0FBQ1EsRUFGUjtBQUdULGNBQVEsSUFIQztBQUlULG9CQUFjUixNQUFNLENBQUNTO0FBSlosS0FBYixDQUhLLENBU1Q7O0FBQ0FoQixJQUFBQSxXQUFXLENBQUNpQixRQUFaLENBQXFCLCtDQUFyQixFQUFzRUosTUFBdEUsRUFBOEUsVUFBVUssSUFBVixFQUFnQjtBQUMxRmpCLE1BQUFBLEVBQUUsQ0FBQ2tCLEdBQUgsQ0FBT0QsSUFBUDs7QUFDQSxVQUFHQSxJQUFJLENBQUNFLElBQUwsSUFBVyxDQUFkLEVBQWdCO0FBQUU7QUFDZG5CLFFBQUFBLEVBQUUsQ0FBQ29CLFFBQUgsQ0FBWUMsU0FBWixDQUFzQixPQUF0QjtBQUNILE9BRkQsTUFFSztBQUNEckIsUUFBQUEsRUFBRSxDQUFDUyxHQUFILENBQU9DLFlBQVAsQ0FBb0JZLE9BQXBCLENBQTRCLFVBQTVCLEVBQXdDZixJQUFJLENBQUNnQixTQUFMLENBQWVOLElBQUksQ0FBQ0EsSUFBTCxDQUFVTyxRQUF6QixDQUF4QztBQUNBeEIsUUFBQUEsRUFBRSxDQUFDb0IsUUFBSCxDQUFZQyxTQUFaLENBQXNCLGNBQXRCO0FBQ0g7QUFFSixLQVREO0FBWUgsR0FwREksQ0FzREw7O0FBdERLLENBQVQiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbIi8vIExlYXJuIGNjLkNsYXNzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9jbGFzcy5odG1sXHJcbi8vIExlYXJuIEF0dHJpYnV0ZTpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyBMZWFybiBsaWZlLWN5Y2xlIGNhbGxiYWNrczpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvbGlmZS1jeWNsZS1jYWxsYmFja3MuaHRtbFxyXG52YXIgSHR0cEhlbHBlciA9IHJlcXVpcmUoXCJodHRwXCIpO1xyXG4vLyB2YXIgZnMgPSByZXF1aXJlKCdmcycpOyAvLyDlvJXlhaVmc+aooeWdl1xyXG4vLyB2YXIgZ2xvYmFsdXNlcmluZm8gPSByZXF1aXJlKFwiR2xvYmFsdXNlckluZm9cIik7XHJcbmxldCBodHRwUmVxdWVzdCA9ICBuZXcgSHR0cEhlbHBlcigpOyAgXHJcbmNjLkNsYXNzKHtcclxuICAgIGV4dGVuZHM6IGNjLkNvbXBvbmVudCxcclxuXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgLy8gZm9vOiB7XHJcbiAgICAgICAgLy8gICAgIC8vIEFUVFJJQlVURVM6XHJcbiAgICAgICAgLy8gICAgIGRlZmF1bHQ6IG51bGwsICAgICAgICAvLyBUaGUgZGVmYXVsdCB2YWx1ZSB3aWxsIGJlIHVzZWQgb25seSB3aGVuIHRoZSBjb21wb25lbnQgYXR0YWNoaW5nXHJcbiAgICAgICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgICAvLyB0byBhIG5vZGUgZm9yIHRoZSBmaXJzdCB0aW1lXHJcbiAgICAgICAgLy8gICAgIHR5cGU6IGNjLlNwcml0ZUZyYW1lLCAvLyBvcHRpb25hbCwgZGVmYXVsdCBpcyB0eXBlb2YgZGVmYXVsdFxyXG4gICAgICAgIC8vICAgICBzZXJpYWxpemFibGU6IHRydWUsICAgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHJ1ZVxyXG4gICAgICAgIC8vIH0sXHJcbiAgICAgICAgLy8gYmFyOiB7XHJcbiAgICAgICAgLy8gICAgIGdldCAoKSB7XHJcbiAgICAgICAgLy8gICAgICAgICByZXR1cm4gdGhpcy5fYmFyO1xyXG4gICAgICAgIC8vICAgICB9LFxyXG4gICAgICAgIC8vICAgICBzZXQgKHZhbHVlKSB7XHJcbiAgICAgICAgLy8gICAgICAgICB0aGlzLl9iYXIgPSB2YWx1ZTtcclxuICAgICAgICAvLyAgICAgfVxyXG4gICAgICAgIC8vIH0sXHJcbiAgICB9LFxyXG5cclxuICAgIC8vIExJRkUtQ1lDTEUgQ0FMTEJBQ0tTOlxyXG5cclxuICAgIC8vIG9uTG9hZCAoKSB7fSxcclxuXHJcbiAgICBzdGFydCAoKSB7XHJcblxyXG4gICAgfSxcclxuXHJcbiAgICAvL+WIm+W7uuinkuiJslxyXG4gICAgY3JlYXRlX3JvbGUoKXtcclxuICAgICAgICB2YXIgc2VydmVyID0gSlNPTi5wYXJzZShjYy5zeXMubG9jYWxTdG9yYWdlLmdldEl0ZW0oJ3NlcnZlcicpKTtcclxuICAgICAgICAvLyDor7fmsYLnmbvlvZXmjqXlj6NcclxuICAgICAgICAgICAgdmFyIHBhcmFtcyA9IHtcclxuICAgICAgICAgICAgICAgICdsb2dpbmlkJzogc2VydmVyLmxvZ2luaWQsXHJcbiAgICAgICAgICAgICAgICAnc2VydmVyJzogc2VydmVyLmlkLFxyXG4gICAgICAgICAgICAgICAgJ25hbWUnOiAn5rWL6K+VJyxcclxuICAgICAgICAgICAgICAgICdzZXJ2ZXJuYW1lJzogc2VydmVyLm5hbWUsXHJcbiAgICAgICAgfTtcclxuICAgICAgICAvLyBjYy5sb2coc2VydmVyKTsgXHJcbiAgICAgICAgaHR0cFJlcXVlc3QuaHR0cFBvc3QoJ2h0dHA6Ly8xOTIuMTY4LjEwLjIzL2FwcC9hcGktc2VydmVyL3VzZXItcm9sZScsIHBhcmFtcyAsZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgY2MubG9nKGRhdGEpOyBcclxuICAgICAgICAgICAgaWYoZGF0YS5jb2RlPT0wKXsgLy8g55m75b2V5aSx6LSl77yM5oiW5pys5Zyw5pWw5o2u5aSx5pWIXHJcbiAgICAgICAgICAgICAgICBjYy5kaXJlY3Rvci5sb2FkU2NlbmUoJ2xvZ2luJyk7XHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgY2Muc3lzLmxvY2FsU3RvcmFnZS5zZXRJdGVtKCd1c2VyaW5mbycsIEpTT04uc3RyaW5naWZ5KGRhdGEuZGF0YS51c2VyaW5mbykpOyBcclxuICAgICAgICAgICAgICAgIGNjLmRpcmVjdG9yLmxvYWRTY2VuZSgnbW9kZWwvZGF0aW5nJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgXHJcbiAgICB9XHJcblxyXG4gICAgLy8gdXBkYXRlIChkdCkge30sXHJcbn0pO1xyXG4iXX0=
//------QC-SOURCE-SPLIT------
