
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
  },
  // 自由切换横竖屏，动态设置设计分辨率和适配模式。
  updateCanvasSize: function updateCanvasSize() {
    var size = cc.view.getFrameSize();

    if (size.width > size.height) {
      this.canvas.fitWidth = false;
      this.canvas.fitHeight = true;
      this.canvas.designResolution = cc.size(1920, 1080);
      this.showLandscape();
    } else {
      this.canvas.fitWidth = true;
      this.canvas.fitHeight = false;
      this.canvas.designResolution = cc.size(1080, 1920);
      this.showPortait();
    }
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxzY2VuY2VcXHdhcC5qcyJdLCJuYW1lcyI6WyJjYyIsIkNsYXNzIiwiQ29tcG9uZW50IiwicHJvcGVydGllcyIsInN0YXJ0IiwidXBkYXRlQ2FudmFzU2l6ZSIsInZpZXciLCJzZXRSZXNpemVDYWxsYmFjayIsInNpemUiLCJnZXRGcmFtZVNpemUiLCJ3aWR0aCIsImhlaWdodCIsImNhbnZhcyIsImZpdFdpZHRoIiwiZml0SGVpZ2h0IiwiZGVzaWduUmVzb2x1dGlvbiIsInNob3dMYW5kc2NhcGUiLCJzaG93UG9ydGFpdCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFLENBQ1I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBZlEsR0FIUDtBQXFCTDtBQUVBO0FBRUFDLEVBQUFBLEtBekJLLG1CQXlCRztBQUFBOztBQUNKLFNBQUtDLGdCQUFMO0FBQ0FMLElBQUFBLEVBQUUsQ0FBQ00sSUFBSCxDQUFRQyxpQkFBUixDQUEwQixZQUFNO0FBQzVCLE1BQUEsS0FBSSxDQUFDRixnQkFBTDtBQUNILEtBRkQ7QUFHSCxHQTlCSTtBQWdDTDtBQUNBQSxFQUFBQSxnQkFqQ0ssOEJBaUNjO0FBQ2YsUUFBSUcsSUFBSSxHQUFHUixFQUFFLENBQUNNLElBQUgsQ0FBUUcsWUFBUixFQUFYOztBQUNBLFFBQUlELElBQUksQ0FBQ0UsS0FBTCxHQUFhRixJQUFJLENBQUNHLE1BQXRCLEVBQThCO0FBQzFCLFdBQUtDLE1BQUwsQ0FBWUMsUUFBWixHQUF1QixLQUF2QjtBQUNBLFdBQUtELE1BQUwsQ0FBWUUsU0FBWixHQUF3QixJQUF4QjtBQUNBLFdBQUtGLE1BQUwsQ0FBWUcsZ0JBQVosR0FBK0JmLEVBQUUsQ0FBQ1EsSUFBSCxDQUFRLElBQVIsRUFBYyxJQUFkLENBQS9CO0FBQ0EsV0FBS1EsYUFBTDtBQUNILEtBTEQsTUFLTztBQUNILFdBQUtKLE1BQUwsQ0FBWUMsUUFBWixHQUF1QixJQUF2QjtBQUNBLFdBQUtELE1BQUwsQ0FBWUUsU0FBWixHQUF3QixLQUF4QjtBQUNBLFdBQUtGLE1BQUwsQ0FBWUcsZ0JBQVosR0FBK0JmLEVBQUUsQ0FBQ1EsSUFBSCxDQUFRLElBQVIsRUFBYyxJQUFkLENBQS9CO0FBQ0EsV0FBS1MsV0FBTDtBQUNIO0FBQ0osR0E5Q0ksQ0FnREw7O0FBaERLLENBQVQiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbIi8vIExlYXJuIGNjLkNsYXNzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9jbGFzcy5odG1sXHJcbi8vIExlYXJuIEF0dHJpYnV0ZTpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyBMZWFybiBsaWZlLWN5Y2xlIGNhbGxiYWNrczpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvbGlmZS1jeWNsZS1jYWxsYmFja3MuaHRtbFxyXG5cclxuY2MuQ2xhc3Moe1xyXG4gICAgZXh0ZW5kczogY2MuQ29tcG9uZW50LFxyXG5cclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICAvLyBmb286IHtcclxuICAgICAgICAvLyAgICAgLy8gQVRUUklCVVRFUzpcclxuICAgICAgICAvLyAgICAgZGVmYXVsdDogbnVsbCwgICAgICAgIC8vIFRoZSBkZWZhdWx0IHZhbHVlIHdpbGwgYmUgdXNlZCBvbmx5IHdoZW4gdGhlIGNvbXBvbmVudCBhdHRhY2hpbmdcclxuICAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIHRvIGEgbm9kZSBmb3IgdGhlIGZpcnN0IHRpbWVcclxuICAgICAgICAvLyAgICAgdHlwZTogY2MuU3ByaXRlRnJhbWUsIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHR5cGVvZiBkZWZhdWx0XHJcbiAgICAgICAgLy8gICAgIHNlcmlhbGl6YWJsZTogdHJ1ZSwgICAvLyBvcHRpb25hbCwgZGVmYXVsdCBpcyB0cnVlXHJcbiAgICAgICAgLy8gfSxcclxuICAgICAgICAvLyBiYXI6IHtcclxuICAgICAgICAvLyAgICAgZ2V0ICgpIHtcclxuICAgICAgICAvLyAgICAgICAgIHJldHVybiB0aGlzLl9iYXI7XHJcbiAgICAgICAgLy8gICAgIH0sXHJcbiAgICAgICAgLy8gICAgIHNldCAodmFsdWUpIHtcclxuICAgICAgICAvLyAgICAgICAgIHRoaXMuX2JhciA9IHZhbHVlO1xyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSxcclxuICAgIH0sXHJcblxyXG4gICAgLy8gTElGRS1DWUNMRSBDQUxMQkFDS1M6XHJcblxyXG4gICAgLy8gb25Mb2FkICgpIHt9LFxyXG5cclxuICAgIHN0YXJ0KCkge1xyXG4gICAgICAgIHRoaXMudXBkYXRlQ2FudmFzU2l6ZSgpO1xyXG4gICAgICAgIGNjLnZpZXcuc2V0UmVzaXplQ2FsbGJhY2soKCkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLnVwZGF0ZUNhbnZhc1NpemUoKTtcclxuICAgICAgICB9KVxyXG4gICAgfSxcclxuXHJcbiAgICAvLyDoh6rnlLHliIfmjaLmqKrnq5blsY/vvIzliqjmgIHorr7nva7orr7orqHliIbovqjnjoflkozpgILphY3mqKHlvI/jgIJcclxuICAgIHVwZGF0ZUNhbnZhc1NpemUoKSB7XHJcbiAgICAgICAgbGV0IHNpemUgPSBjYy52aWV3LmdldEZyYW1lU2l6ZSgpO1xyXG4gICAgICAgIGlmIChzaXplLndpZHRoID4gc2l6ZS5oZWlnaHQpIHtcclxuICAgICAgICAgICAgdGhpcy5jYW52YXMuZml0V2lkdGggPSBmYWxzZTtcclxuICAgICAgICAgICAgdGhpcy5jYW52YXMuZml0SGVpZ2h0ID0gdHJ1ZTtcclxuICAgICAgICAgICAgdGhpcy5jYW52YXMuZGVzaWduUmVzb2x1dGlvbiA9IGNjLnNpemUoMTkyMCwgMTA4MCk7XHJcbiAgICAgICAgICAgIHRoaXMuc2hvd0xhbmRzY2FwZSgpO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIHRoaXMuY2FudmFzLmZpdFdpZHRoID0gdHJ1ZTtcclxuICAgICAgICAgICAgdGhpcy5jYW52YXMuZml0SGVpZ2h0ID0gZmFsc2U7XHJcbiAgICAgICAgICAgIHRoaXMuY2FudmFzLmRlc2lnblJlc29sdXRpb24gPSBjYy5zaXplKDEwODAsIDE5MjApO1xyXG4gICAgICAgICAgICB0aGlzLnNob3dQb3J0YWl0KCk7XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuXHJcbiAgICAvLyB1cGRhdGUgKGR0KSB7fSxcclxufSk7XHJcbiJdfQ==