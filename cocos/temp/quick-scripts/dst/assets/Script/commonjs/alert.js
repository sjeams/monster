
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
// commonjs/alert.js

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcY29tbW9uanNcXGFsZXJ0LmpzIl0sIm5hbWVzIjpbInRpcEFsZXJ0IiwiX2FsZXJ0IiwiX2FuaW1TcGVlZCIsInNob3ciLCJ0aXBTdHIiLCJsZWZ0U3RyIiwicmlnaHRTdHIiLCJjYWxsYmFjayIsImNjIiwibG9hZGVyIiwibG9hZFJlcyIsIlByZWZhYiIsImVycm9yIiwicHJlZmFiIiwiaW5zdGFudGlhdGUiLCJkaXJlY3RvciIsImdldFNjZW5lIiwiYWRkQ2hpbGQiLCJmaW5kIiwiZ2V0Q29tcG9uZW50IiwiTGFiZWwiLCJzdHJpbmciLCJvbiIsImV2ZW50IiwiZGlzbWlzcyIsInBhcmVudCIsInN0YXJ0RmFkZUluIiwic2V0U2NhbGUiLCJvcGFjaXR5IiwiY2JGYWRlSW4iLCJjYWxsRnVuYyIsIm9uRmFkZUluRmluaXNoIiwiYWN0aW9uRmFkZUluIiwic2VxdWVuY2UiLCJzcGF3biIsImZhZGVUbyIsInNjYWxlVG8iLCJydW5BY3Rpb24iLCJjYkZhZGVPdXQiLCJvbkZhZGVPdXRGaW5pc2giLCJhY3Rpb25GYWRlT3V0Iiwib25EZXN0cm95IiwicmVtb3ZlRnJvbVBhcmVudCIsIm1vZHVsZSIsImV4cG9ydHMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUlBLElBQUlBLFFBQVEsR0FBRztBQUNYQyxFQUFBQSxNQUFNLEVBQUUsSUFERztBQUNhO0FBQ3hCQyxFQUFBQSxVQUFVLEVBQUUsR0FGRCxDQUVhOztBQUZiLENBQWY7QUFLQTs7Ozs7OztBQU1BLElBQUlDLElBQUksR0FBRyxTQUFQQSxJQUFPLENBQVVDLE1BQVYsRUFBaUJDLE9BQWpCLEVBQXlCQyxRQUF6QixFQUFrQ0MsUUFBbEMsRUFBNEM7QUFDbkRDLEVBQUFBLEVBQUUsQ0FBQ0MsTUFBSCxDQUFVQyxPQUFWLENBQWtCLGdCQUFsQixFQUFtQ0YsRUFBRSxDQUFDRyxN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O0FBQ0EsTUFBSUMsYUFBYSxHQUFHaEMsRUFBRSxDQUFDeUIsUUFBSCxDQUFZekIsRUFBRSxDQUFDMEIsS0FBSCxDQUFTMUIsRUFBRSxDQUFDMkIsTUFBSCxDQUFVbkMsUUFBUSxDQUFDRSxVQUFuQixFQUErQixDQUEvQixDQUFULEVBQTRDTSxFQUFFLENBQUM0QixPQUFILENBQVdwQyxRQUFRLENBQUNFLFVBQXBCLEVBQWdDLEdBQWhDLENBQTVDLENBQVosRUFBK0ZvQyxTQUEvRixDQUFwQjs7QUFDQXRDLEVBQUFBLFFBQVEsQ0FBQ0MsTUFBVCxDQUFnQm9DLFNBQWhCLENBQTBCRyxhQUExQjtBQUNILENBUEQsRUFTQTs7O0FBQ0EsSUFBSUQsZUFBZSxHQUFHLFNBQWxCQSxlQUFrQixHQUFZO0FBQzlCRSxFQUFBQSxTQUFTO0FBQ1osQ0FGRDs7QUFJQSxJQUFJQSxTQUFTLEdBQUcsU0FBWkEsU0FBWSxHQUFZO0FBQ3hCLE1BQUl6QyxRQUFRLENBQUNDLE1BQVQsSUFBbUIsSUFBdkIsRUFBNkI7QUFDekJELElBQUFBLFFBQVEsQ0FBQ0MsTUFBVCxDQUFnQnlDLGdCQUFoQjs7QUFDQTFDLElBQUFBLFFBQVEsQ0FBQ0MsTUFBVCxHQUFrQixJQUFsQjtBQUNIO0FBQ0osQ0FMRDs7QUFPQTBDLE1BQU0sQ0FBQ0MsT0FBUCxHQUFlO0FBQ2J6QyxFQUFBQSxJQUFJLEVBQUpBO0FBRGEsQ0FBZiIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLy8gLy/lvJXlhaVhbGVydCAgICBcclxuLy8gbGV0IGFsZXJ0ID0gcmVxdWlyZSgnYWxlcnQnKTtcclxuXHJcbi8vIC8v5by556qX6LCD55SoXHJcbi8vIGFsZXJ0LnNob3cuY2FsbCh0aGlzLCBcIuehruiupOmAgOWHuua4uOaIj++8n1wiLCBcIuWPlua2iFwiLCBcIuehruiupFwiLCBmdW5jdGlvbiAodHlwZSkge1xyXG4vLyAgICBpZiAodHlwZSA9PSBcIuWPlua2iFwiKSB7XHJcbi8vICAgICAgICBjb25zb2xlLmxvZyhcIuWPlua2iFwiKTtcclxuLy8gICAgfVxyXG4vLyAgICBpZiAodHlwZSA9PSBcIuehruiupFwiKSB7XHJcbi8vICAgICAgICBjb25zb2xlLmxvZyhcIuehruiupFwiKTtcclxuLy8gICAgfVxyXG4vLyB9KTtcclxuXHJcblxyXG5cclxubGV0IHRpcEFsZXJ0ID0ge1xyXG4gICAgX2FsZXJ0OiBudWxsLCAgICAgICAgICAgLy9wcmVmYWJcclxuICAgIF9hbmltU3BlZWQ6IDAuMywgICAgICAgIC8v5by556qX5Yqo55S76YCf5bqmXHJcbn07XHJcbiBcclxuLyoqXHJcbiAqIEBwYXJhbSB0aXBTdHJcclxuICogQHBhcmFtIGxlZnRTdHJcclxuICogQHBhcmFtIHJpZ2h0U3RyXHJcbiAqIEBwYXJhbSBjYWxsYmFja1xyXG4gKi9cclxubGV0IHNob3cgPSBmdW5jdGlvbiAodGlwU3RyLGxlZnRTdHIscmlnaHRTdHIsY2FsbGJhY2spIHtcclxuICAgIGNjLmxvYWRlci5sb2FkUmVzKFwiYWxlcnQvdGlwQWxlcnRcIixjYy5QcmVmYWIsIGZ1bmN0aW9uIChlcnJvciwgcHJlZmFiKXtcclxuICAgICAgICBpZiAoZXJyb3Ipe1xyXG4gICAgICAgICAgICBjYy5lcnJvcihlcnJvcik7XHJcbiAgICAgICAgICAgIHJldHVybjtcclxuICAgICAgICB9XHJcbiAgICAgICAgdGlwQWxlcnQuX2FsZXJ0ID0gY2MuaW5zdGFudGlhdGUocHJlZmFiKTtcclxuICAgICAgICBjYy5kaXJlY3Rvci5nZXRTY2VuZSgpLmFkZENoaWxkKHRpcEFsZXJ0Ll9hbGVydCwzKTtcclxuICAgICAgICBjYy5maW5kKFwidGlwQWxlcnQvY29udGVudC90b3AvdGlwXCIpLmdldENvbXBvbmVudChjYy5MYWJlbCkuc3RyaW5nID0gdGlwU3RyO1xyXG4gICAgICAgIGNjLmZpbmQoXCJ0aXBBbGVydC9jb250ZW50L2JvdHRvbS9sZWZ0X2J0bi9sZWZ0YnRuXCIpLmdldENvbXBvbmVudChjYy5MYWJlbCkuc3RyaW5nID0gbGVmdFN0cjtcclxuICAgICAgICBjYy5maW5kKFwidGlwQWxlcnQvY29udGVudC9ib3R0b20vcmlnaHRfYnRuL3JpZ2h0YnRuXCIpLmdldENvbXBvbmVudChjYy5MYWJlbCkuc3RyaW5nID0gcmlnaHRTdHI7XHJcbiAgICAgICAgaWYoY2FsbGJhY2spe1xyXG4gICAgICAgICAgICBjYy5maW5kKFwidGlwQWxlcnQvY29udGVudC9ib3R0b20vbGVmdF9idG5cIikub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgICAgICAgICBkaXNtaXNzKCk7XHJcbiAgICAgICAgICAgICAgICBjYWxsYmFjayhsZWZ0U3RyKTtcclxuICAgICAgICAgICAgfSwgdGhpcyk7XHJcbiBcclxuICAgICAgICAgICAgY2MuZmluZChcInRpcEFsZXJ0L2NvbnRlbnQvYm90dG9tL3JpZ2h0X2J0blwiKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGRpc21pc3MoKTtcclxuICAgICAgICAgICAgICAgIGNhbGxiYWNrKHJpZ2h0U3RyKTtcclxuICAgICAgICAgICAgfSwgdGhpcyk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8v6K6+572ucGFyZW50IOS4uuW9k+WJjeWcuuaZr+eahENhbnZhcyDvvIxwb3NpdGlvbui3n+maj+eItuiKgueCuVxyXG4gICAgICAgIHRpcEFsZXJ0Ll9hbGVydC5wYXJlbnQgPSBjYy5maW5kKFwiQ2FudmFzXCIpO1xyXG4gICAgICAgIHN0YXJ0RmFkZUluKCk7XHJcbiAgICB9KTtcclxufTtcclxuIFxyXG4vLyDmiafooYzlvLnov5vliqjnlLtcclxubGV0IHN0YXJ0RmFkZUluID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy/liqjnlLtcclxuICAgIHRpcEFsZXJ0Ll9hbGVydC5zZXRTY2FsZSgyKTtcclxuICAgIHRpcEFsZXJ0Ll9hbGVydC5vcGFjaXR5ID0gMDtcclxuICAgIGxldCBjYkZhZGVJbiA9IGNjLmNhbGxGdW5jKG9uRmFkZUluRmluaXNoLCB0aGlzKTtcclxuICAgIGxldCBhY3Rpb25GYWRlSW4gPSBjYy5zZXF1ZW5jZShjYy5zcGF3bihjYy5mYWRlVG8odGlwQWxlcnQuX2FuaW1TcGVlZCwgMjU1KSwgY2Muc2NhbGVUbyh0aXBBbGVydC5fYW5pbVNwZWVkLCAxLjApKSwgY2JGYWRlSW4pO1xyXG4gICAgdGlwQWxlcnQuX2FsZXJ0LnJ1bkFjdGlvbihhY3Rpb25GYWRlSW4pO1xyXG59O1xyXG4gXHJcbiBcclxuLy8g5by56L+b5Yqo55S75a6M5oiQ5Zue6LCDXHJcbmxldCBvbkZhZGVJbkZpbmlzaCA9IGZ1bmN0aW9uICgpIHtcclxufTtcclxuIFxyXG4vLyDmiafooYzlvLnlh7rliqjnlLtcclxubGV0IGRpc21pc3MgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICBpZiAoIXRpcEFsZXJ0Ll9hbGVydCkge1xyXG4gICAgICAgIHJldHVybjtcclxuICAgIH1cclxuICAgIGxldCBjYkZhZGVPdXQgPSBjYy5jYWxsRnVuYyhvbkZhZGVPdXRGaW5pc2gsIHRoaXMpO1xyXG4gICAgbGV0IGFjdGlvbkZhZGVPdXQgPSBjYy5zZXF1ZW5jZShjYy5zcGF3bihjYy5mYWRlVG8odGlwQWxlcnQuX2FuaW1TcGVlZCwgMCksIGNjLnNjYWxlVG8odGlwQWxlcnQuX2FuaW1TcGVlZCwgMi4wKSksIGNiRmFkZU91dCk7XHJcbiAgICB0aXBBbGVydC5fYWxlcnQucnVuQWN0aW9uKGFjdGlvbkZhZGVPdXQpO1xyXG59O1xyXG4gXHJcbi8vIOW8ueWHuuWKqOeUu+WujOaIkOWbnuiwg1xyXG5sZXQgb25GYWRlT3V0RmluaXNoID0gZnVuY3Rpb24gKCkge1xyXG4gICAgb25EZXN0cm95KCk7XHJcbn07XHJcbiBcclxubGV0IG9uRGVzdHJveSA9IGZ1bmN0aW9uICgpIHtcclxuICAgIGlmICh0aXBBbGVydC5fYWxlcnQgIT0gbnVsbCkge1xyXG4gICAgICAgIHRpcEFsZXJ0Ll9hbGVydC5yZW1vdmVGcm9tUGFyZW50KCk7XHJcbiAgICAgICAgdGlwQWxlcnQuX2FsZXJ0ID0gbnVsbDtcclxuICAgIH1cclxufTtcclxuIFxyXG5tb2R1bGUuZXhwb3J0cz17XHJcbiAgc2hvd1xyXG59OyJdfQ==