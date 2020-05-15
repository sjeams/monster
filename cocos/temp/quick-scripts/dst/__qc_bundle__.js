
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
require('./assets/Script/login/Alert');
require('./assets/Script/login/ProgressBarScript');
require('./assets/Script/login/SpriteTextTool');
require('./assets/Script/login/background');
require('./assets/Script/login/http');
require('./assets/Script/login/loading');
require('./assets/Script/login/myserver');
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
  httpGet: function httpGet(url, callback) {
    cc.myGame.gameUi.onShowLockScreen();
    var xhr = cc.loader.getXMLHttpRequest();

    xhr.onreadystatechange = function () {
      // cc.log("Get: readyState:" + xhr.readyState + " status:" + xhr.status);
      if (xhr.readyState === 4 && xhr.status == 200) {
        var respone = xhr.responseText;
        var rsp = JSON.parse(respone);
        cc.myGame.gameUi.onHideLockScreen();
        callback(rsp);
      } else if (xhr.readyState === 4 && xhr.status == 401) {
        cc.myGame.gameUi.onHideLockScreen();
        callback({
          status: 401
        });
      } else {//callback(-1);
      }
    };

    xhr.withCredentials = true;
    xhr.open('GET', url, true); // if (cc.sys.isNative) {

    xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhr.setRequestHeader('Access-Control-Allow-Methods', 'GET, POST');
    xhr.setRequestHeader('Access-Control-Allow-Headers', 'x-requested-with,content-type,authorization');
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader('Authorization', 'Bearer ' + cc.myGame.gameManager.getToken()); // xhr.setRequestHeader('Authorization', 'Bearer ' + "");
    // }
    // note: In Internet Explorer, the timeout property may be set only after calling the open()
    // method and before calling the send() method.

    xhr.timeout = 8000; // 8 seconds for timeout

    xhr.send();
  },

  /**
   * post请求
   * @param {string} url 
   * @param {object} params 
   * @param {function} callback 
   */
  httpPost: function httpPost(url, params, callback) {
    cc.myGame.gameUi.onShowLockScreen();
    var xhr = cc.loader.getXMLHttpRequest();

    xhr.onreadystatechange = function () {
      // cc.log('xhr.readyState=' + xhr.readyState + '  xhr.status=' + xhr.status);
      if (xhr.readyState === 4 && xhr.status == 200) {
        var respone = xhr.responseText;
        var rsp = JSON.parse(respone);
        cc.myGame.gameUi.onHideLockScreen();
        callback(rsp);
      } else {
        callback(-1);
      }
    };

    xhr.open('POST', url, true); // if (cc.sys.isNative) {

    xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhr.setRequestHeader('Access-Control-Allow-Methods', 'GET, POST');
    xhr.setRequestHeader('Access-Control-Allow-Headers', 'x-requested-with,content-type');
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader('Authorization', 'Bearer ' + cc.myGame.gameManager.getToken()); // }
    // note: In Internet Explorer, the timeout property may be set only after calling the open()
    // method and before calling the send() method.

    xhr.timeout = 8000; // 8 seconds for timeout

    xhr.send(JSON.stringify(params));
  },

  /**
   * 登录专用
   * @param {string} url 
   * @param {object} params 
   * @param {function} callback 
   * @param {string} account 
   * @param {string} password 
   */
  httpPostLogin: function httpPostLogin(url, params, callback, account, password) {
    cc.myGame.gameUi.onShowLockScreen();
    var xhr = cc.loader.getXMLHttpRequest();

    xhr.onreadystatechange = function () {
      // cc.log('xhr.readyState=' + xhr.readyState + '  xhr.status=' + xhr.status);
      if (xhr.readyState === 4 && xhr.status == 200) {
        var respone = xhr.responseText;
        var rsp = JSON.parse(respone);
        cc.myGame.gameUi.onHideLockScreen();
        callback(rsp);
      } else {
        callback(-1);
      }
    };

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhr.setRequestHeader('Access-Control-Allow-Methods', 'GET, POST');
    xhr.setRequestHeader('Access-Control-Allow-Headers', 'x-requested-with,content-type');
    xhr.setRequestHeader("Content-Type", "application/json");
    var str = account + "@" + password;
    xhr.setRequestHeader('Authorization', 'Basic' + ' ' + window.btoa(str));
    xhr.timeout = 8000; // 8 seconds for timeout

    xhr.send(JSON.stringify(params));
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcaHR0cC5qcyJdLCJuYW1lcyI6WyJIdHRwSGVscGVyIiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInN0YXRpY3MiLCJwcm9wZXJ0aWVzIiwiaHR0cEdldCIsInVybCIsImNhbGxiYWNrIiwibXlHYW1lIiwiZ2FtZVVpIiwib25TaG93TG9ja1NjcmVlbiIsInhociIsImxvYWRlciIsImdldFhNTEh0dHBSZXF1ZXN0Iiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsInN0YXR1cyIsInJlc3BvbmUiLCJyZXNwb25zZVRleHQiLCJyc3AiLCJKU09OIiwicGFyc2UiLCJvbkhpZGVMb2NrU2NyZWVuIiwid2l0aENyZWRlbnRpYWxzIiwib3BlbiIsInNldFJlcXVlc3RIZWFkZXIiLCJnYW1lTWFuYWdlciIsImdldFRva2VuIiwidGltZW91dCIsInNlbmQiLCJodHRwUG9zdCIsInBhcmFtcyIsInN0cmluZ2lmeSIsImh0dHBQb3N0TG9naW4iLCJhY2NvdW50IiwicGFzc3dvcmQiLCJzdHIiLCJ3aW5kb3ciLCJidG9hIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7OztBQUFBOzs7QUFHQSxJQUFNQSxVQUFVLEdBQUdDLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ3hCLGFBQVNELEVBQUUsQ0FBQ0UsU0FEWTtBQUd4QkMsRUFBQUEsT0FBTyxFQUFFLEVBSGU7QUFNeEJDLEVBQUFBLFVBQVUsRUFBRSxFQU5ZOztBQVV4Qjs7Ozs7QUFLQUMsRUFBQUEsT0Fmd0IsbUJBZWhCQyxHQWZnQixFQWVYQyxRQWZXLEVBZUQ7QUFDbkJQLElBQUFBLEVBQUUsQ0FBQ1EsTUFBSCxDQUFVQyxNQUFWLENBQWlCQyxnQkFBakI7QUFDQSxRQUFJQyxHQUFHLEdBQUdYLEVBQUUsQ0FBQ1ksTUFBSCxDQUFVQyxpQkFBVixFQUFWOztBQUNBRixJQUFBQSxHQUFHLENBQUNHLGtCQUFKLEdBQXlCLFlBQVk7QUFDakM7QUFDQSxVQUFJ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Q0FBUjtBQUNILE9BTEQsTUFLTztBQUNIWixRQUFBQSxRQUFRLENBQUMsQ0FBQyxDQUFGLENBQVI7QUFDSDtBQUNKLEtBVkQ7O0FBV0FJLElBQUFBLEdBQUcsQ0FBQ2EsSUFBSixDQUFTLE1BQVQsRUFBaUJsQixHQUFqQixFQUFzQixJQUF0QjtBQUNBSyxJQUFBQSxHQUFHLENBQUNjLGdCQUFKLENBQXFCLDZCQUFyQixFQUFvRCxHQUFwRDtBQUNBZCxJQUFBQSxHQUFHLENBQUNjLGdCQUFKLENBQXFCLDhCQUFyQixFQUFxRCxXQUFyRDtBQUNBZCxJQUFBQSxHQUFHLENBQUNjLGdCQUFKLENBQXFCLDhCQUFyQixFQUFxRCwrQkFBckQ7QUFDQWQsSUFBQUEsR0FBRyxDQUFDYyxnQkFBSixDQUFxQixjQUFyQixFQUFxQyxrQkFBckM7QUFDQSxRQUFJVyxHQUFHLEdBQUdGLE9BQU8sR0FBRyxHQUFWLEdBQWdCQyxRQUExQjtBQUNBeEIsSUFBQUEsR0FBRyxDQUFDYyxnQkFBSixDQUFxQixlQUFyQixFQUFzQyxVQUFVLEdBQVYsR0FBZ0JZLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZRixHQUFaLENBQXREO0FBRUF6QixJQUFBQSxHQUFHLENBQUNpQixPQUFKLEdBQWMsSUFBZCxDQXRCb0QsQ0FzQmpDOztBQUVuQmpCLElBQUFBLEdBQUcsQ0FBQ2tCLElBQUosQ0FBU1QsSUFBSSxDQUFDWSxTQUFMLENBQWVELE1BQWYsQ0FBVDtBQUVIO0FBM0h1QixDQUFULENBQW5CO0FBOEhBTSxNQUFNLENBQUN0QyxVQUFQLEdBQW9CLElBQUlBLFVBQUosRUFBcEIiLCJzb3VyY2VSb290IjoiLyIsInNvdXJjZXNDb250ZW50IjpbIi8qKlxyXG4gKiBIdHRwIOivt+axguWwgeijhVxyXG4gKi9cclxuY29uc3QgSHR0cEhlbHBlciA9IGNjLkNsYXNzKHtcclxuICAgIGV4dGVuZHM6IGNjLkNvbXBvbmVudCxcclxuXHJcbiAgICBzdGF0aWNzOiB7XHJcbiAgICB9LFxyXG5cclxuICAgIHByb3BlcnRpZXM6IHtcclxuXHJcbiAgICB9LFxyXG5cclxuICAgIC8qKlxyXG4gICAgICogZ2V06K+35rGCXHJcbiAgICAgKiBAcGFyYW0ge3N0cmluZ30gdXJsIFxyXG4gICAgICogQHBhcmFtIHtmdW5jdGlvbn0gY2FsbGJhY2sgXHJcbiAgICAgKi9cclxuICAgIGh0dHBHZXQodXJsLCBjYWxsYmFjaykge1xyXG4gICAgICAgIGNjLm15R2FtZS5nYW1lVWkub25TaG93TG9ja1NjcmVlbigpO1xyXG4gICAgICAgIGxldCB4aHIgPSBjYy5sb2FkZXIuZ2V0WE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICB4aHIub25yZWFkeXN0YXRlY2hhbmdlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyBjYy5sb2coXCJHZXQ6IHJlYWR5U3RhdGU6XCIgKyB4aHIucmVhZHlTdGF0ZSArIFwiIHN0YXR1czpcIiArIHhoci5zdGF0dXMpO1xyXG4gICAgICAgICAgICBpZiAoeGhyLnJlYWR5U3RhdGUgPT09IDQgJiYgeGhyLnN0YXR1cyA9PSAyMDApIHtcclxuICAgICAgICAgICAgICAgIGxldCByZXNwb25lID0geGhyLnJlc3BvbnNlVGV4dDtcclxuICAgICAgICAgICAgICAgIGxldCByc3AgPSBKU09OLnBhcnNlKHJlc3BvbmUpO1xyXG4gICAgICAgICAgICAgICAgY2MubXlHYW1lLmdhbWVVaS5vbkhpZGVMb2NrU2NyZWVuKCk7XHJcbiAgICAgICAgICAgICAgICBjYWxsYmFjayhyc3ApO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKHhoci5yZWFkeVN0YXRlID09PSA0ICYmIHhoci5zdGF0dXMgPT0gNDAxKSB7XHJcbiAgICAgICAgICAgICAgICBjYy5teUdhbWUuZ2FtZVVpLm9uSGlkZUxvY2tTY3JlZW4oKTtcclxuICAgICAgICAgICAgICAgIGNhbGxiYWNrKHtzdGF0dXM6NDAxfSk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAvL2NhbGxiYWNrKC0xKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuXHJcbiAgICAgICAgfTtcclxuICAgICAgICB4aHIud2l0aENyZWRlbnRpYWxzID0gdHJ1ZTtcclxuICAgICAgICB4aHIub3BlbignR0VUJywgdXJsLCB0cnVlKTtcclxuXHJcbiAgICAgICAgLy8gaWYgKGNjLnN5cy5pc05hdGl2ZSkge1xyXG4gICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdBY2Nlc3MtQ29udHJvbC1BbGxvdy1PcmlnaW4nLCAnKicpO1xyXG4gICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdBY2Nlc3MtQ29udHJvbC1BbGxvdy1NZXRob2RzJywgJ0dFVCwgUE9TVCcpO1xyXG4gICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdBY2Nlc3MtQ29udHJvbC1BbGxvdy1IZWFkZXJzJywgJ3gtcmVxdWVzdGVkLXdpdGgsY29udGVudC10eXBlLGF1dGhvcml6YXRpb24nKTtcclxuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcihcIkNvbnRlbnQtVHlwZVwiLCBcImFwcGxpY2F0aW9uL2pzb25cIik7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0F1dGhvcml6YXRpb24nLCAnQmVhcmVyICcgKyBjYy5teUdhbWUuZ2FtZU1hbmFnZXIuZ2V0VG9rZW4oKSk7XHJcbiAgICAgICAgLy8geGhyLnNldFJlcXVlc3RIZWFkZXIoJ0F1dGhvcml6YXRpb24nLCAnQmVhcmVyICcgKyBcIlwiKTtcclxuICAgICAgICAvLyB9XHJcblxyXG4gICAgICAgIC8vIG5vdGU6IEluIEludGVybmV0IEV4cGxvcmVyLCB0aGUgdGltZW91dCBwcm9wZXJ0eSBtYXkgYmUgc2V0IG9ubHkgYWZ0ZXIgY2FsbGluZyB0aGUgb3BlbigpXHJcbiAgICAgICAgLy8gbWV0aG9kIGFuZCBiZWZvcmUgY2FsbGluZyB0aGUgc2VuZCgpIG1ldGhvZC5cclxuICAgICAgICB4aHIudGltZW91dCA9IDgwMDA7Ly8gOCBzZWNvbmRzIGZvciB0aW1lb3V0XHJcblxyXG4gICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICB9LFxyXG5cclxuICAgIC8qKlxyXG4gICAgICogcG9zdOivt+axglxyXG4gICAgICogQHBhcmFtIHtzdHJpbmd9IHVybCBcclxuICAgICAqIEBwYXJhbSB7b2JqZWN0fSBwYXJhbXMgXHJcbiAgICAgKiBAcGFyYW0ge2Z1bmN0aW9ufSBjYWxsYmFjayBcclxuICAgICAqL1xyXG4gICAgaHR0cFBvc3QodXJsLCBwYXJhbXMsIGNhbGxiYWNrKSB7XHJcbiAgICAgICAgY2MubXlHYW1lLmdhbWVVaS5vblNob3dMb2NrU2NyZWVuKCk7XHJcbiAgICAgICAgbGV0IHhociA9IGNjLmxvYWRlci5nZXRYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgIHhoci5vbnJlYWR5c3RhdGVjaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vIGNjLmxvZygneGhyLnJlYWR5U3RhdGU9JyArIHhoci5yZWFkeVN0YXRlICsgJyAgeGhyLnN0YXR1cz0nICsgeGhyLnN0YXR1cyk7XHJcbiAgICAgICAgICAgIGlmICh4aHIucmVhZHlTdGF0ZSA9PT0gNCAmJiB4aHIuc3RhdHVzID09IDIwMCkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHJlc3BvbmUgPSB4aHIucmVzcG9uc2VUZXh0O1xyXG4gICAgICAgICAgICAgICAgbGV0IHJzcCA9IEpTT04ucGFyc2UocmVzcG9uZSk7XHJcbiAgICAgICAgICAgICAgICBjYy5teUdhbWUuZ2FtZVVpLm9uSGlkZUxvY2tTY3JlZW4oKTtcclxuICAgICAgICAgICAgICAgIGNhbGxiYWNrKHJzcCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBjYWxsYmFjaygtMSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIHhoci5vcGVuKCdQT1NUJywgdXJsLCB0cnVlKTtcclxuICAgICAgICAvLyBpZiAoY2Muc3lzLmlzTmF0aXZlKSB7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0FjY2Vzcy1Db250cm9sLUFsbG93LU9yaWdpbicsICcqJyk7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0FjY2Vzcy1Db250cm9sLUFsbG93LU1ldGhvZHMnLCAnR0VULCBQT1NUJyk7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0FjY2Vzcy1Db250cm9sLUFsbG93LUhlYWRlcnMnLCAneC1yZXF1ZXN0ZWQtd2l0aCxjb250ZW50LXR5cGUnKTtcclxuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcihcIkNvbnRlbnQtVHlwZVwiLCBcImFwcGxpY2F0aW9uL2pzb25cIik7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0F1dGhvcml6YXRpb24nLCAnQmVhcmVyICcgKyBjYy5teUdhbWUuZ2FtZU1hbmFnZXIuZ2V0VG9rZW4oKSk7XHJcbiAgICAgICAgLy8gfVxyXG5cclxuICAgICAgICAvLyBub3RlOiBJbiBJbnRlcm5ldCBFeHBsb3JlciwgdGhlIHRpbWVvdXQgcHJvcGVydHkgbWF5IGJlIHNldCBvbmx5IGFmdGVyIGNhbGxpbmcgdGhlIG9wZW4oKVxyXG4gICAgICAgIC8vIG1ldGhvZCBhbmQgYmVmb3JlIGNhbGxpbmcgdGhlIHNlbmQoKSBtZXRob2QuXHJcbiAgICAgICAgeGhyLnRpbWVvdXQgPSA4MDAwOy8vIDggc2Vjb25kcyBmb3IgdGltZW91dFxyXG5cclxuICAgICAgICB4aHIuc2VuZChKU09OLnN0cmluZ2lmeShwYXJhbXMpKTtcclxuICAgIH0sXHJcblxyXG4gICAgLyoqXHJcbiAgICAgKiDnmbvlvZXkuJPnlKhcclxuICAgICAqIEBwYXJhbSB7c3RyaW5nfSB1cmwgXHJcbiAgICAgKiBAcGFyYW0ge29iamVjdH0gcGFyYW1zIFxyXG4gICAgICogQHBhcmFtIHtmdW5jdGlvbn0gY2FsbGJhY2sgXHJcbiAgICAgKiBAcGFyYW0ge3N0cmluZ30gYWNjb3VudCBcclxuICAgICAqIEBwYXJhbSB7c3RyaW5nfSBwYXNzd29yZCBcclxuICAgICAqL1xyXG4gICAgaHR0cFBvc3RMb2dpbih1cmwsIHBhcmFtcywgY2FsbGJhY2ssIGFjY291bnQsIHBhc3N3b3JkKSB7XHJcbiAgICAgICAgY2MubXlHYW1lLmdhbWVVaS5vblNob3dMb2NrU2NyZWVuKCk7XHJcbiAgICAgICAgbGV0IHhociA9IGNjLmxvYWRlci5nZXRYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgIHhoci5vbnJlYWR5c3RhdGVjaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vIGNjLmxvZygneGhyLnJlYWR5U3RhdGU9JyArIHhoci5yZWFkeVN0YXRlICsgJyAgeGhyLnN0YXR1cz0nICsgeGhyLnN0YXR1cyk7XHJcbiAgICAgICAgICAgIGlmICh4aHIucmVhZHlTdGF0ZSA9PT0gNCAmJiB4aHIuc3RhdHVzID09IDIwMCkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHJlc3BvbmUgPSB4aHIucmVzcG9uc2VUZXh0O1xyXG4gICAgICAgICAgICAgICAgbGV0IHJzcCA9IEpTT04ucGFyc2UocmVzcG9uZSk7XHJcbiAgICAgICAgICAgICAgICBjYy5teUdhbWUuZ2FtZVVpLm9uSGlkZUxvY2tTY3JlZW4oKTtcclxuICAgICAgICAgICAgICAgIGNhbGxiYWNrKHJzcCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBjYWxsYmFjaygtMSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIHhoci5vcGVuKCdQT1NUJywgdXJsLCB0cnVlKTtcclxuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQWNjZXNzLUNvbnRyb2wtQWxsb3ctT3JpZ2luJywgJyonKTtcclxuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQWNjZXNzLUNvbnRyb2wtQWxsb3ctTWV0aG9kcycsICdHRVQsIFBPU1QnKTtcclxuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQWNjZXNzLUNvbnRyb2wtQWxsb3ctSGVhZGVycycsICd4LXJlcXVlc3RlZC13aXRoLGNvbnRlbnQtdHlwZScpO1xyXG4gICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKFwiQ29udGVudC1UeXBlXCIsIFwiYXBwbGljYXRpb24vanNvblwiKTtcclxuICAgICAgICBsZXQgc3RyID0gYWNjb3VudCArIFwiQFwiICsgcGFzc3dvcmQ7XHJcbiAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0F1dGhvcml6YXRpb24nLCAnQmFzaWMnICsgJyAnICsgd2luZG93LmJ0b2Eoc3RyKSk7XHJcblxyXG4gICAgICAgIHhoci50aW1lb3V0ID0gODAwMDsvLyA4IHNlY29uZHMgZm9yIHRpbWVvdXRcclxuXHJcbiAgICAgICAgeGhyLnNlbmQoSlNPTi5zdHJpbmdpZnkocGFyYW1zKSk7XHJcblxyXG4gICAgfVxyXG59KTtcclxuXHJcbndpbmRvdy5IdHRwSGVscGVyID0gbmV3IEh0dHBIZWxwZXIoKTsiXX0=
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcbG9hZGluZy5qcyJdLCJuYW1lcyI6WyJzZWxmIiwiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJzcGVlZCIsInByb2dyZXNzQmFyIiwidHlwZSIsIlByb2dyZXNzQmFyIiwidGV4dCIsIlNwcml0ZSIsImF1ZGlvIiwiQXVkaW9DbGlwIiwicGxheSIsImF1ZGlvU291cmNlIiwicGF1c2UiLCJibXBfZm9udCIsIkxhYmVsIiwib25Mb2FkIiwiY29uc29sZSIsImxvZyIsIm5vZGUiLCJfdXJscyIsInVybCIsInJlc291cmNlIiwicHJvZ3Jlc3MiLCJzdHJpbmciLCJfY2xlYXJBbGwiLCJsb2FkZXIiLCJsb2FkIiwiX3Byb2dyZXNzQ2FsbGJhY2siLCJiaW5kIiwiX2NvbXBsZXRlQ2FsbGJhY2siLCJzdGFydCIsImkiLCJsZW5ndGgiLCJyZWxlYXNlIiwiY29tcGxldGVDb3VudCIsInRvdGFsQ291bnQiLCJyZXMiLCJzeXNfbGFiZWwiLCJnZXRDaGlsZEJ5TmFtZSIsImdldENvbXBvbmVudCIsInBhcnNlSW50IiwiY3VycmVudCIsImF1ZGlvRW5naW5lIiwiZXJyIiwidGV4dHVyZSIsImxvYWRuZXh0U2NlbmUiLCJ1cGRhdGUiLCJkdCIsImFjdGl2ZSIsImVuYWJsZWQiLCJkaXJlY3RvciIsInByZWxvYWRTY2VuZSIsImxvYWRTY2VuZSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQSxJQUFJQSxJQUFJLFNBQVI7QUFDQUMsRUFBRSxDQUFDQyxLQUFILENBQVM7QUFDTCxhQUFTRCxFQUFFLENBQUNFLFNBRFA7QUFHTEMsRUFBQUEsVUFBVSxFQUFFO0FBQ1JDLElBQUFBLEtBQUssRUFBRSxDQURDO0FBRVJDLElBQUFBLFdBQVcsRUFBQztBQUNSLGlCQUFRLElBREE7QUFFUkMsTUFBQUEsSUFBSSxFQUFDTixFQUFFLENBQUNPLFdBRkE7QUFHUkMsTUFBQUEsSUFBSSxFQUFDUixFQUFF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QUFjSyxJQUFkLENBQW1COEIsTUFBbkIsR0FBNEIsS0FBNUIsQ0FKYSxDQUl1Qjs7QUFDcEMsV0FBS0MsT0FBTCxHQUFlLEtBQWY7QUFDQTtBQUNIOztBQUVELFFBQUczQixRQUFRLEdBQUcsS0FBS0EsUUFBbkIsRUFBNEI7QUFDeEJBLE1BQUFBLFFBQVEsSUFBSXlCLEVBQVo7QUFDSDs7QUFFRCxTQUFLNUMsV0FBTCxDQUFpQm1CLFFBQWpCLEdBQTRCQSxRQUE1QjtBQUVILEdBOUpJO0FBZ0tMdUIsRUFBQUEsYUFBYSxFQUFFLHlCQUFXO0FBQ3RCO0FBQ0EvQyxJQUFBQSxFQUFFLENBQUNvRCxRQUFILENBQVlDLFlBQVosQ0FBeUIsT0FBekIsRUFBa0MsWUFBWTtBQUMxQ3JELE1BQUFBLEVBQUUsQ0FBQ21CLEdBQUgsQ0FBTyxPQUFQO0FBQ0gsS0FGRDtBQUdBbkIsSUFBQUEsRUFBRSxDQUFDb0QsUUFBSCxDQUFZRSxTQUFaLENBQXNCLE9BQXRCO0FBQ0gsR0F0S0ksQ0F3S1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUF0TFMsQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsidmFyIHNlbGYgPSB0aGlzO1xyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcbiBcclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICBzcGVlZDogMSxcclxuICAgICAgICBwcm9ncmVzc0Jhcjp7XHJcbiAgICAgICAgICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAgICAgdHlwZTpjYy5Qcm9ncmVzc0JhcixcclxuICAgICAgICAgICAgdGV4dDpjYy5TcHJpdGUsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBhdWRpbzoge1xyXG4gICAgICAgICAgICBkZWZhdWx0OiBudWxsLFxyXG4gICAgICAgICAgICB0eXBlOiBjYy5BdWRpb0NsaXBcclxuICAgICAgICB9LFxyXG4gICAgICAgIHBsYXk6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgdGhpcy5hdWRpb1NvdXJjZS5wbGF5KCk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBcclxuICAgICAgICBwYXVzZTogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICB0aGlzLmF1ZGlvU291cmNlLnBhdXNlKCk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBibXBfZm9udDoge1xyXG4gICAgICAgICAgICBkZWZhdWx0OiBudWxsLFxyXG4gICAgICAgICAgICB0eXBlOiBjYy5MYWJlbCxcclxuICAgICAgICB9LFxyXG4gICAgICAgIC8vIC8v6buY6K6k5aS05YOPXHJcbiAgICAgICAgLy8gaGVhZHBpYzp7XHJcbiAgICAgICAgLy8gICAgIHR5cGU6Y2MuU3ByaXRlRnJhbWUsXHJcbiAgICAgICAgLy8gICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgIC8v5aS05YOPXHJcbiAgICAgICAgLy8gYmFja2dyb3VuZDp7XHJcbiAgICAgICAgLy8gICAgIGRlZmF1bHQ6bnVsbCxcclxuICAgICAgICAvLyAgICAgdHlwZTpjYy5TcHJpdGUsXHJcbiAgICAgICAgLy8gfSxcclxuICAgIH0sXHJcblxyXG4gICAgICAgIFxyXG5cclxuICAgIC8vIExJRkUtQ1lDTEUgQ0FMTEJBQ0tTOlxyXG4gXHJcbiAgICBvbkxvYWQgKCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKHRoaXMubm9kZSk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfmraPlnKjlr7nmr5TotYTmupAnKTtcclxuICAgICAgICAgICAgLy8gLy8g6L+c56iLIHVybCDkuI3luKblm77niYflkI7nvIDlkI3vvIzmraTml7blv4XpobvmjIflrprov5znqIvlm77niYfmlofku7bnmoTnsbvlnotcclxuICAgICAgICAgICAgLy8gcmVtb3RlVXJsID0gXCJodHRwOi8vdW5rbm93bi5vcmcvZW1vamk/aWQ9MTI0OTgyMzc0XCI7XHJcbiAgICAgICAgICAgIC8vIGNjLmxvYWRlci5sb2FkKHt1cmw6IHJlbW90ZVVybCwgdHlwZTogJ3BuZyd9LCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAvLyBVc2UgdGV4dHVyZSB0byBjcmVhdGUgc3ByaXRlIGZyYW1lXHJcbiAgICAgICAgICAgIC8vIH0pO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgLy8gLy8g55So57ud5a+56Lev5b6E5Yqg6L296K6+5aSH5a2Y5YKo5YaF55qE6LWE5rqQ77yM5q+U5aaC55u45YaMXHJcbiAgICAgICAgICAgIC8vIHZhciBhYnNvbHV0ZVBhdGggPSBcIi9kYXJhL2RhdGEvc29tZS9wYXRoL3RvL2ltYWdlLnBuZ1wiXHJcbiAgICAgICAgICAgIC8vIGNjLmxvYWRlci5sb2FkKGFic29sdXRlUGF0aCwgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyAgICAgLy8gVXNlIHRleHR1cmUgdG8gY3JlYXRlIHNwcml0ZSBmcmFtZVxyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coJ+ato+WcqOWKoOi9veWcuuaZr+i1hOa6kO+8jOivt+iAkOW/g+etieW+hS4uLicpO1xyXG4gICAgICAgIC8vIOWKoOi9vei1hOa6kOWMhVxyXG4gICAgICAgIHRoaXMuX3VybHMgPSBbXHJcbiAgICAgICAgICAgIHt1cmw6J2h0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2FwaS9maWxlLWNvbnRlbnQ/dXJsPWh0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2xvYWRpbmcv5YmR5oyH6IuN6IyrLm1wMycsIHR5cGU6J21wMyd9LFxyXG4gICAgICAgICAgICAvLyB7dXJsOidodHRwOi8vd3d3Lm1vbnN0ZXIuY29tL2FwcC9hcGkvZmlsZS1jb250ZW50P3VybD1odHRwOi8vd3d3Lm1vbnN0ZXIuY29tL2FwcC9sb2FkaW5nL2xvYWRpbmcuanBnJywgdHlwZTonanBnJ30sXHJcbiAgICAgICAgICAgIC8vIHt1cmw6J2h0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2FwaS9maWxlLWNvbnRlbnQ/dXJsPWh0dHA6Ly8xMjcuMC4wLjEvMTIzLmpwZycsIHR5cGU6J2pwZyd9LFxyXG4gICAgICAgICAgICAvLyB7dXJsOidodHRwOi8vd3d3Lm1vbnN0ZXIuY29tL2FwcC9hcGkvZmlsZS1jb250ZW50P3VybD1odHRwOi8vMTI3LjAuMC4xL2NjYy5wbmcnLCB0eXBlOidwbmcnfSxcclxuICAgICAgICAgICAgLy8ge3VybDonaHR0cDovL3d3dy5tb25zdGVyLmNvbS9hcHAvYXBpL2ZpbGUtY29udGVudD91cmw9aHR0cDovLzEyNy4wLjAuMS9qcTIyaG9uZXkuemlwJywgdHlwZTonemlwJ30sXHJcbiAgICAgICAgICAgIC8vIHt1cmw6J2h0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2FwaS9maWxlLWNvbnRlbnQ/dXJsPWh0dHA6Ly8xMjcuMC4wLjEvbW9uc3Rlci56aXAnLCB0eXBlOid6aXAnfSxcclxuICAgICAgICAgICAgLy8ge3VybDonaHR0cDovL3d3dy5tb25zdGVyLmNvbS9hcHAvYXBpL2ZpbGUtY29udGVudD91cmw9aHR0cDovLzEyNy4wLjAuMe+8iOi/memHjOWhq+S9oOeahOacjeWKoeWZqGlwKS9pbWFnZTIucG5nJywgdHlwZToncG5nJ30sIFxyXG4gICAgICAgIF07XHJcblxyXG4gICAgICAgIGNvbnNvbGUubG9nKCB0aGlzLnByb2dyZXNzQmFyKTsgXHJcbiAgICAgICAgLy8gY29uc29sZS5sb2coIHRoaXMuc3ByaXRlKTsgXHJcbiAgICAgICAgdGhpcy5yZXNvdXJjZSA9IG51bGw7XHJcbiAgICAgICAgdGhpcy5wcm9ncmVzc0Jhci5wcm9ncmVzcyA9MDtcclxuXHJcbiAgICAgICAgdGhpcy5ibXBfZm9udC5zdHJpbmcgPSBcIjAlXCI7XHJcblxyXG5cclxuICBcclxuICAgICAgICAvLyB0aGlzLlByb2dyZXNzQmFyLnByb2dyZXNzICs9IG1hdGhfcmFuZG9tIC8gMTAwOyBcclxuICAgICAgICB0aGlzLl9jbGVhckFsbCgpO1xyXG4gICAgICAgXHJcbiAgICAgICAgY2MubG9hZGVyLmxvYWQodGhpcy5fdXJscywgdGhpcy5fcHJvZ3Jlc3NDYWxsYmFjay5iaW5kKHRoaXMpLCB0aGlzLl9jb21wbGV0ZUNhbGxiYWNrLmJpbmQodGhpcykpO1xyXG4gICAgfSxcclxuIFxyXG4gICAgc3RhcnQgKCkge1xyXG5cclxuICAgIH0sXHJcbiBcclxuICAgIF9jbGVhckFsbDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgZm9yKHZhciBpID0gMDsgaSA8IHRoaXMuX3VybHMubGVuZ3RoOyArK2kpIHtcclxuICAgICAgICAgICAgdmFyIHVybCA9IHRoaXMuX3VybHNbaV07XHJcbiAgICAgICAgICAgIGNjLmxvYWRlci5yZWxlYXNlKHVybCk7XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuIFxyXG4gICAgX3Byb2dyZXNzQ2FsbGJhY2s6IGZ1bmN0aW9uKGNvbXBsZXRlQ291bnQsIHRvdGFsQ291bnQsIHJlcykge1xyXG4gICAgICAgIC8v5Yqg6L296L+b5bqm5Zue6LCDXHJcbiAgICAgICAgLy8gY29uc29sZS5sb2coJ+i1hOa6kCAnICsgY29tcGxldGVDb3VudCArICfliqDovb3lrozmiJDvvIHotYTmupDliqDovb3kuK0uLi4nKTtcclxuICAgICAgICAvLyBjb25zb2xlLmxvZygn5Yqg6L295Zy65pmv6LWE5rqQJyk7XHJcbiAgICAgICAgdGhpcy5wcm9ncmVzcyA9IGNvbXBsZXRlQ291bnQgLyB0b3RhbENvdW50O1xyXG4gICAgICAgIHRoaXMucmVzb3VyY2UgPSByZXM7XHJcbiAgICAgICAgdGhpcy5jb21wbGV0ZUNvdW50ID0gY29tcGxldGVDb3VudDtcclxuICAgICAgICB0aGlzLnRvdGFsQ291bnQgPSB0b3RhbENvdW50O1xyXG5cclxuICAgICAgICAvLyDku6PnoIHph4zpnaLojrflj5ZjYy5MYWJlbOe7hOS7tiwg5L+u5pS55paH5pys5YaF5a65XHJcbiAgICAgICAgLy/lnKjku6PnoIHph4zpnaLojrflj5ZjYy5MYWJlbOe7hOS7tlxyXG4gICAgICAgIHZhciBzeXNfbGFiZWwgPSB0aGlzLm5vZGUuZ2V0Q2hpbGRCeU5hbWUoXCJzeXNfbGFiZWxcIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKTtcclxuICAgICAgICBzeXNfbGFiZWwuc3RyaW5nID0gcGFyc2VJbnQodGhpcy5wcm9ncmVzcyAqIDEwMCkgKyAnJSc7XHJcblxyXG4gICAgICAgIGlmKCB0aGlzLnJlc291cmNlLnR5cGU9PSdqc29uJyl7XHJcbiAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKHRoaXMucmVzb3VyY2UpOyAgLy8ganNvblxyXG4gICAgICAgICAgICAvLyDku47mnI3liqHlmajliqDovb1tcDPmnaXov5vooYzmkq3mlL5cclxuICAgICAgICAgICAgLy8gdGhpcy5hdWRpby5jbGlwID0gcmV0O1xyXG4gICAgICAgICAgICAvLyB0aGlzLmF1ZGlvLnBsYXkoKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgaWYoIHRoaXMucmVzb3VyY2UudHlwZT09J3BuZyd8fHRoaXMucmVzb3VyY2UudHlwZT09J2pwZycpe1xyXG4gICAgICAgICAgICAgY29uc29sZS5sb2cocmVzKTsgIC8vIGpzb25cclxuICAgICAgICAgICAgLy9yZXPmmK9jYy5UZXh0dXJlMkTov5nmoLflr7nosaEgXHJcbiAgICAgICAgICAgIC8vICAgdGhpcy5ub2RlLmdldENvbXBvbmVudChjYy5TcHJpdGUpLnNwcml0ZUZyYW1lID0gbmV3IGNjLlNwcml0ZUZyYW1lKHJlcylcclxuICAgICAgICAgICAgLy8gdGhpcy5oZWFkcGljLnNwcml0ZUZyYW1lLnNldFRleHR1cmUocmVzKTtcclxuICAgICAgICAgICAgLy8gdGhpcy5ub2RlLnNwcml0ZUZyYW1lLnNldFRleHR1cmUocmVzKTtcclxuICAgICAgICAgICAgLy8gdGhpcy5zcHJpdGUuc3ByaXRlRnJhbWUuc2V0Q29udGVudFNpemUocmVzLmdldENvbnRlbnRTaXplKCkpO1xyXG4gICAgICAgICAgICAvLyB0aGlzLm5vZGUuZ2V0Q29tcG9uZW50KGNjLlNwcml0ZSkuc3ByaXRlRnJhbWUgPSByZXM7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGlmKCB0aGlzLnJlc291cmNlLnR5cGU9PSdtcDMnKXtcclxuICAgICAgICAgICAgY29uc29sZS5sb2cocmVzKTsgIC8vIG1wM1xyXG4gICAgICAgICAgICAvLyB0aGlzLmF1ZGlvLmNsaXAgPSByZXM7XHJcbiAgICAgICAgICAgIC8vIHRoaXMuYXVkaW8ucGxheSgpO1xyXG4gICAgICAgICAgICAvLyDku47mnI3liqHlmajliqDovb1tcDPmnaXov5vooYzmkq3mlL5cclxuICAgICAgICAgICAgdGhpcy5jdXJyZW50ID0gY2MuYXVkaW9FbmdpbmUucGxheShyZXMudXJsLCBmYWxzZSwgMSk7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcbiAgICB9LFxyXG4gXHJcbiAgICBfY29tcGxldGVDYWxsYmFjazogZnVuY3Rpb24oZXJyLCB0ZXh0dXJlKSB7XHJcbiAgICAgICAgLy/liqDovb3lrozmiJDlm57osINcclxuICAgICAgICB0aGlzLmxvYWRuZXh0U2NlbmUoKTsgIC8vIOS4i+S4gOWcuuaZryBcclxuICAgIH0sXHJcbiBcclxuICAgIHVwZGF0ZSAoZHQpIHtcclxuICAgICAgICBpZighdGhpcy5yZXNvdXJjZSl7XHJcbiAgICAgICAgICAgIHJldHVybiA7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHZhciBwcm9ncmVzcyA9IHRoaXMucHJvZ3Jlc3NCYXIucHJvZ3Jlc3M7XHJcbiAgICAgICAgaWYocHJvZ3Jlc3MgPj0gMSl7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfliqDovb3lrozmiJAnKVxyXG4gICAgICAgICAgICAvL+WKoOi9veWujOaIkFxyXG4gICAgICAgICAgICB0aGlzLnByb2dyZXNzQmFyLm5vZGUuYWN0aXZlID0gZmFsc2U7IC8v6L+b5bqm5p2h6ZqQ6JePXHJcbiAgICAgICAgICAgIHRoaXMuYm1wX2ZvbnQubm9kZS5hY3RpdmUgPSBmYWxzZTsgIC8vIOi/m+W6pumakOiXj1xyXG4gICAgICAgICAgICB0aGlzLmVuYWJsZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgcmV0dXJuIDtcclxuICAgICAgICB9XHJcbiBcclxuICAgICAgICBpZihwcm9ncmVzcyA8IHRoaXMucHJvZ3Jlc3Mpe1xyXG4gICAgICAgICAgICBwcm9ncmVzcyArPSBkdDtcclxuICAgICAgICB9XHJcbiAgIFxyXG4gICAgICAgIHRoaXMucHJvZ3Jlc3NCYXIucHJvZ3Jlc3MgPSBwcm9ncmVzcztcclxuICAgXHJcbiAgICB9LFxyXG5cclxuICAgIGxvYWRuZXh0U2NlbmU6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIC8vIOeZu+W9lemihOWKoOi9vVxyXG4gICAgICAgIGNjLmRpcmVjdG9yLnByZWxvYWRTY2VuZSgnbG9naW4nLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGNjLmxvZygn55m75b2V6aKE5Yqg6L29Jyk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgY2MuZGlyZWN0b3IubG9hZFNjZW5lKCdsb2dpbicpO1xyXG4gICAgfSxcclxuXHJcbi8vIOOAgOOAgCBjaGFuZ2VCajogZnVuY3Rpb24oKXtcclxuLy8g44CA44CA44CA44CAdmFyIHVybCA9ICdnbG9iYWxVSS92aWRlby9nVmlkZW9QbGF5Q2xpY2snO1xyXG4vLyDjgIDjgIDjgIDjgIB2YXIgX3RoaXMgPSB0aGlzOyBjYy5sb2FkZXIubG9hZFJlcyh1cmwsY2MuU3ByaXRlRnJhbWUsZnVuY3Rpb24oZXJyLHNwcml0ZUZyYW1lKVxyXG4vLyDjgIDjgIDjgIDjgIB7IOOAgFxyXG4vLyDjgIDjgIDjgIDjgIDjgIDjgIBfdGhpcy5pc1BsYXkuc3ByaXRlRnJhbWUgPSBzcHJpdGVGcmFtZTtcclxuLy8g44CA44CA44CA44CAIH0pO1xyXG4gICAgXHJcbi8vIOOAgOOAgOOAgFxyXG4vLyDjgIDjgIDjgIDjgIAvL+WKoOi9vee9kee7nOWbvueJh1xyXG4vLyAgICAgICAgIHZhciB1cmwgPSBcInd3dy5tb25zdGVyLmNvbS93ZWIvYXBwL2xvYWRpbmcuanBnXCI7XHJcbi8vICAgICAgICAgY2MubG9hZGVyLmxvYWQoe3VybDogdXJsLCB0eXBlOiAncG5nJ30sIGZ1bmN0aW9uKGVycixpbWcpe1xyXG4vLyAgICAgICAgICAgICB2YXIgbXlsb2dvICA9IG5ldyBjYy5TcHJpdGVGcmFtZShpbWcpOyBcclxuLy8gICAgICAgICAgICAgc2VsZi5sb2dvLnNwcml0ZUZyYW1lID0gbXlsb2dvO1xyXG4vLyAgICAgICAgIH0pO1xyXG4vLyDjgIDjgIDjgIB9LFxyXG59KTtcclxuXHJcblxyXG4iXX0=
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcYmFja2dyb3VuZC5qcyJdLCJuYW1lcyI6WyJjYyIsIkNsYXNzIiwiQ29tcG9uZW50IiwicHJvcGVydGllcyIsIm9uTG9hZCIsInN0YXJ0IiwibG9hZGluZ0JhY2tncm91bmQiLCJyZW1vdGVVcmwiLCJzZWxmIiwibG9hZGVyIiwibG9hZCIsInVybCIsInR5cGUiLCJlcnIiLCJ0ZXh0dXJlIiwibm9kZSIsImdldENvbXBvbmVudCIsIlNwcml0ZSIsInNwcml0ZUZyYW1lIiwiU3ByaXRlRnJhbWUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRSxDQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWZRLEdBSFA7QUFxQkw7QUFFQUMsRUFBQUEsTUF2Qkssb0JBdUJLLENBQ047QUFDSCxHQXpCSTtBQTJCTEMsRUFBQUEsS0EzQkssbUJBMkJJLENBRVIsQ0E3Qkk7QUErQkw7QUFFQUMsRUFBQUEsaUJBQWlCLEVBQUUsNkJBQVU7QUFDVDtBQUNaO0FBQ0EsUUFBSUMsU0FBUyxHQUFHLCtFQUFoQjtBQUNBLFFBQUlDLElBQUksR0FBRyxJQUFYLENBSnFCLENBS3JCOztBQUNBUixJQUFBQSxFQUFFLENBQUNTLE1BQUgsQ0FBVUMsSUFBVixDQUFlO0FBQUVDLE1BQUFBLEdBQUcsRUFBRUosU0FBUDtBQUFrQkssTUFBQUEsSUFBSSxFQUFFO0FBQXhCLEtBQWYsRUFBZ0QsVUFBVUMsR0FBVixFQUFlQyxPQUFmLEVBQXdCO0FBRXBFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBUUpOLE1BQUFBLElBQUksQ0FBQ08sSUFBTCxDQUFVQyxZQUFWLENBQXVCaEIsRUFBRSxDQUFDaUIsTUFBMUIsRUFBa0NDLFdBQWxDLEdBQWdELElBQUlsQixFQUFFLENBQUNtQixXQUFQLENBQW1CTCxPQUFuQixDQUFoRCxDQTdCd0UsQ0E4QnhFO0FBQ0E7QUFHQyxLQWxDRDtBQW1DUDtBQTFFSSxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyBMZWFybiBjYy5DbGFzczpcclxuLy8gIC0gW0NoaW5lc2VdIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvemgvc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gIC0gW0VuZ2xpc2hdIGh0dHA6Ly9kb2NzLmNvY29zMmQteC5vcmcvY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBbQ2hpbmVzZV0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC96aC9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyAgLSBbRW5nbGlzaF0gaHR0cDovL2RvY3MuY29jb3MyZC14Lm9yZy9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvcmVmZXJlbmNlL2F0dHJpYnV0ZXMuaHRtbFxyXG4vLyBMZWFybiBsaWZlLWN5Y2xlIGNhbGxiYWNrczpcclxuLy8gIC0gW0NoaW5lc2VdIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvemgvc2NyaXB0aW5nL2xpZmUtY3ljbGUtY2FsbGJhY2tzLmh0bWxcclxuLy8gIC0gW0VuZ2xpc2hdIGh0dHBzOi8vd3d3LmNvY29zMmQteC5vcmcvZG9jcy9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvbGlmZS1jeWNsZS1jYWxsYmFja3MuaHRtbFxyXG5cclxuY2MuQ2xhc3Moe1xyXG4gICAgZXh0ZW5kczogY2MuQ29tcG9uZW50LFxyXG5cclxuICAgIHByb3BlcnRpZXM6IHtcclxuICAgICAgICAvLyBmb286IHtcclxuICAgICAgICAvLyAgICAgLy8gQVRUUklCVVRFUzpcclxuICAgICAgICAvLyAgICAgZGVmYXVsdDogbnVsbCwgICAgICAgIC8vIFRoZSBkZWZhdWx0IHZhbHVlIHdpbGwgYmUgdXNlZCBvbmx5IHdoZW4gdGhlIGNvbXBvbmVudCBhdHRhY2hpbmdcclxuICAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIHRvIGEgbm9kZSBmb3IgdGhlIGZpcnN0IHRpbWVcclxuICAgICAgICAvLyAgICAgdHlwZTogY2MuU3ByaXRlRnJhbWUsIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHR5cGVvZiBkZWZhdWx0XHJcbiAgICAgICAgLy8gICAgIHNlcmlhbGl6YWJsZTogdHJ1ZSwgICAvLyBvcHRpb25hbCwgZGVmYXVsdCBpcyB0cnVlXHJcbiAgICAgICAgLy8gfSxcclxuICAgICAgICAvLyBiYXI6IHtcclxuICAgICAgICAvLyAgICAgZ2V0ICgpIHtcclxuICAgICAgICAvLyAgICAgICAgIHJldHVybiB0aGlzLl9iYXI7XHJcbiAgICAgICAgLy8gICAgIH0sXHJcbiAgICAgICAgLy8gICAgIHNldCAodmFsdWUpIHtcclxuICAgICAgICAvLyAgICAgICAgIHRoaXMuX2JhciA9IHZhbHVlO1xyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gfSxcclxuICAgIH0sXHJcblxyXG4gICAgLy8gTElGRS1DWUNMRSBDQUxMQkFDS1M6XHJcblxyXG4gICAgb25Mb2FkICgpIHtcclxuICAgICAgICAvLyB0aGlzLmxvYWRpbmdCYWNrZ3JvdW5kKCk7XHJcbiAgICB9LFxyXG5cclxuICAgIHN0YXJ0ICgpIHtcclxuXHJcbiAgICB9LFxyXG5cclxuICAgIC8vIHVwZGF0ZSAoZHQpIHt9LFxyXG5cclxuICAgIGxvYWRpbmdCYWNrZ3JvdW5kOiBmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyDkuIvovb3otYTmupDljIVcclxuICAgICAgICAgICAgLy8g6L+c56iLIHVybCDluKblm77niYflkI7nvIDlkI1cclxuICAgICAgICAgICAgdmFyIHJlbW90ZVVybCA9IFwiaHR0cDovLzEyNy4wLjAuMS9jZXNoaS5waHA/dXJsPWh0dHA6Ly93d3cubW9uc3Rlci5jb20vYXBwL2xvYWRpbmcvbG9hZGluZy5qcGdcIjtcclxuICAgICAgICAgICAgdmFyIHNlbGYgPSB0aGlzO1xyXG4gICAgICAgICAgICAvLyBjYy5sb2FkZXIubG9hZChyZW1vdGVVcmwsIGZ1bmN0aW9uIChlcnIsIHRleHR1cmUpIHtcclxuICAgICAgICAgICAgY2MubG9hZGVyLmxvYWQoeyB1cmw6IHJlbW90ZVVybCwgdHlwZTogJ2pwZycgfSwgZnVuY3Rpb24gKGVyciwgdGV4dHVyZSkgeyAgXHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgLy8gICDnm7TmjqXph4rmlL7mn5DkuKrotLTlm75cclxuICAgICAgICAgICAgICAgIC8vIGNjLmxvYWRlci5yZWxlYXNlKHRleHR1cmUpO1xyXG4gICAgICAgICAgICAgICAgLy8gLy8g6YeK5pS+5LiA5LiqIHByZWZhYiDku6Xlj4rmiYDmnInlroPkvp3otZbnmoTotYTmupBcclxuICAgICAgICAgICAgICAgIC8vIHZhciBkZXBzID0gY2MubG9hZGVyLmdldERlcGVuZHNSZWN1cnNpdmVseSgndXJsX3Bob3RvJyk7XHJcbiAgICAgICAgICAgICAgICAvLyBjYy5sb2FkZXIucmVsZWFzZShkZXBzKTtcclxuICAgICAgICAgICAgICAgIC8vIC8vIOWmguaenOWcqOi/meS4qiBwcmVmYWIg5Lit5pyJ5LiA5Lqb5ZKM5Zy65pmv5YW25LuW6YOo5YiG5YWx5Lqr55qE6LWE5rqQ77yM5L2g5LiN5biM5pyb5a6D5Lus6KKr6YeK5pS+77yM5pyJ5Lik56eN5pa55rOV77yaXHJcbiAgICAgICAgICAgICAgICAvLyAvLyAxLiDmmL7lvI/lo7DmmI7npoHmraLmn5DkuKrotYTmupDnmoToh6rliqjph4rmlL5cclxuICAgICAgICAgICAgICAgIC8vIGNjLmxvYWRlci5zZXRBdXRvUmVsZWFzZSh0aGlzLmJhY2tncm91bmQsIGZhbHNlKTtcclxuICAgICAgICAgICAgICAgIC8vIC8vIDIuIOWwhui/meS4qui1hOa6kOS7juS+nei1luWIl+ihqOS4reWIoOmZpFxyXG4gICAgICAgICAgICAgICAgLy8gdmFyIGRlcHMgPSBjYy5sb2FkZXIuZ2V0RGVwZW5kc1JlY3Vyc2l2ZWx5KCd1cmxfcGhvdG8nKTtcclxuICAgICAgICAgICAgICAgIC8vIHZhciBpbmRleCA9IGRlcHMuaW5kZXhPZih0aGlzLmJhY2tncm91bmQpO1xyXG4gICAgICAgICAgICAgICAgLy8gaWYgKGluZGV4ICE9PSAtMSlcclxuICAgICAgICAgICAgICAgIC8vICAgICBkZXBzLnNwbGljZShpbmRleCwgMSk7XHJcbiAgICAgICAgICAgICAgICAvLyBjYy5sb2FkZXIucmVsZWFzZShkZXBzKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyB0aGlzLm5vZGUuZ2V0Q29tcG9uZW50KGNjLlNwcml0ZSkuc3ByaXRlRnJhbWUgPSBuZXcgY2MuU3ByaXRlRnJhbWUodGV4dHVyZSlcclxuICAgICAgICAgICAgICAgIC8vICAvLyDmlLnnlKggY2MudXJsLnJhd++8jOatpOaXtumcgOimgeWjsOaYjiByZXNvdXJjZXMg55uu5b2V5ZKM5paH5Lu25ZCO57yA5ZCNXHJcbiAgICAgICAgICAgICAgICAvLyAvLyAgdmFyIHJlYWxVcmwgPSBjYy51cmwucmF3KFwibG9hZGluZ1wiKTtcclxuICAgICAgICAgICAgICAgIC8vIC8vICB2YXIgdGV4dHVyZSA9IGNjLnRleHR1cmVDYWNoZS5hZGRJbWFnZShyZWFsVXJsKTtcclxuICAgICAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKCB0ZXh0dXJlKTsgICAgXHJcblxyXG5cclxuXHJcblxyXG5cclxuXHJcblxyXG4gICAgICAgICAgICBzZWxmLm5vZGUuZ2V0Q29tcG9uZW50KGNjLlNwcml0ZSkuc3ByaXRlRnJhbWUgPSBuZXcgY2MuU3ByaXRlRnJhbWUodGV4dHVyZSlcclxuICAgICAgICAgICAgLy8gc2VsZi5ub2RlLnNwcml0ZUZyYW1lLnNldFRleHR1cmUodGV4dHVyZS51cmwpO1xyXG4gICAgICAgICAgICAvLyBzZWxmLm5vZGUuc3ByaXRlRnJhbWUuc2V0Q29udGVudFNpemUocmVzLmdldENvbnRlbnRTaXplKCkpO1xyXG5cclxuXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgfVxyXG59KTtcclxuIl19
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/NewScript.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '2045b71nHFDw7X/Kgx+6xMy', 'NewScript');
// Script/login/NewScript.js

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcTmV3U2NyaXB0LmpzIl0sIm5hbWVzIjpbImNjIiwiQ2xhc3MiLCJDb21wb25lbnQiLCJwcm9wZXJ0aWVzIiwic3RhcnQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRSxDQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQWZRLEdBSFA7QUFxQkw7QUFFQTtBQUVBQyxFQUFBQSxLQXpCSyxtQkF5QkksQ0FFUixDQTNCSSxDQTZCTDs7QUE3QkssQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLy8gTGVhcm4gY2MuQ2xhc3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9yZWZlcmVuY2UvYXR0cmlidXRlcy5odG1sXHJcbi8vIExlYXJuIGxpZmUtY3ljbGUgY2FsbGJhY2tzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9saWZlLWN5Y2xlLWNhbGxiYWNrcy5odG1sXHJcblxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG4gICAgICAgIC8vIGZvbzoge1xyXG4gICAgICAgIC8vICAgICAvLyBBVFRSSUJVVEVTOlxyXG4gICAgICAgIC8vICAgICBkZWZhdWx0OiBudWxsLCAgICAgICAgLy8gVGhlIGRlZmF1bHQgdmFsdWUgd2lsbCBiZSB1c2VkIG9ubHkgd2hlbiB0aGUgY29tcG9uZW50IGF0dGFjaGluZ1xyXG4gICAgICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gdG8gYSBub2RlIGZvciB0aGUgZmlyc3QgdGltZVxyXG4gICAgICAgIC8vICAgICB0eXBlOiBjYy5TcHJpdGVGcmFtZSwgLy8gb3B0aW9uYWwsIGRlZmF1bHQgaXMgdHlwZW9mIGRlZmF1bHRcclxuICAgICAgICAvLyAgICAgc2VyaWFsaXphYmxlOiB0cnVlLCAgIC8vIG9wdGlvbmFsLCBkZWZhdWx0IGlzIHRydWVcclxuICAgICAgICAvLyB9LFxyXG4gICAgICAgIC8vIGJhcjoge1xyXG4gICAgICAgIC8vICAgICBnZXQgKCkge1xyXG4gICAgICAgIC8vICAgICAgICAgcmV0dXJuIHRoaXMuX2JhcjtcclxuICAgICAgICAvLyAgICAgfSxcclxuICAgICAgICAvLyAgICAgc2V0ICh2YWx1ZSkge1xyXG4gICAgICAgIC8vICAgICAgICAgdGhpcy5fYmFyID0gdmFsdWU7XHJcbiAgICAgICAgLy8gICAgIH1cclxuICAgICAgICAvLyB9LFxyXG4gICAgfSxcclxuXHJcbiAgICAvLyBMSUZFLUNZQ0xFIENBTExCQUNLUzpcclxuXHJcbiAgICAvLyBvbkxvYWQgKCkge30sXHJcblxyXG4gICAgc3RhcnQgKCkge1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgLy8gdXBkYXRlIChkdCkge30sXHJcbn0pO1xyXG4iXX0=
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
    _btnOKCallback: null //点击确定按钮的回调事件

  },
  // LIFE-CYCLE CALLBACKS:
  onLoad: function onLoad() {
    //配置AppStart.js以后才可以判断
    // if(cc.vv == null){
    //     return;
    // }
    cc.log('Alert.js onLoad');
    this._alert = cc.find("Canvas/safe_area/alert");
    this._title = cc.find("Canvas/safe_area/alert/background/title").getComponent(cc.Label);
    this._content = cc.find("Canvas/safe_area/alert/background/content").getComponent(cc.Label);
    this._btnOK = cc.find("Canvas/safe_area/alert/background/btn_ok").getComponent(cc.Button);
    this._btnCancel = cc.find("Canvas/safe_area/alert/background/btn_cancel").getComponent(cc.Button);

    if (this._btnCancel instanceof cc.Button) {
      console.log('是个Button ');
    } else {
      console.log('是个鬼');
    }

    this._btnOK.active = false; //下面这段代码开启是否显示
    // this._alert.active = false;

    cc.vv.alert = this;
  },
  start: function start() {},
  // update (dt) {},
  onBtnClicked: function onBtnClicked(event) {
    if (event.target.name == "btn_ok") {
      if (this._btnOKCallback) {
        this._btnOKCallback();
      }
    }

    this._alert.active = false;
    this._btnOKCallback = null;
    console.log("这是全新定义的clicked!!");
  },
  cancelBtnClicked: function cancelBtnClicked() {
    cc.log('我被点中了');
    this._alert.active = false;
  },

  /** 
   * title:弹框标题
   * content：弹框显示内容
   * callback：点击“确定”按钮的回调事件
   * needCancel：是否需要显示“取消”按钮
  */
  show: function show(title, content, callback, needCancel) {
    console.log('paras -----> : ', title, content, callback, needCancel);
    this._alert.active = true;
    this._btnOKCallback = callback;
    this._title.string = title;
    this._content.string = content;

    if (needCancel) {
      // "确定" 和 "取消"都显示
      //注意：这里面都是对节点node 操作,this._btnCancel.active(或者.x)什么的操作都是无效的☹️
      console.log("needCancel ? true");
      this._btnCancel.node.active = true;
      this._btnOK.node.x = -239.5;
      this._btnCancel.node.x = 239.5;

      if (this._btnOK) {
        cc.log('也是存在的啊！');
      }
    } else {
      //不需要显示“取消”按钮
      console.log("needCancel ? false");
      this._btnCancel.node.active = false;
      this._btnOK.node.x = 0;
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcQWxlcnQuanMiXSwibmFtZXMiOlsiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJfYWxlcnQiLCJfYnRuT0siLCJfYnRuQ2FuY2VsIiwiX3RpdGxlIiwiX2NvbnRlbnQiLCJfYnRuT0tDYWxsYmFjayIsIm9uTG9hZCIsImxvZyIsImZpbmQiLCJnZXRDb21wb25lbnQiLCJMYWJlbCIsIkJ1dHRvbiIsImNvbnNvbGUiLCJhY3RpdmUiLCJ2diIsImFsZXJ0Iiwic3RhcnQiLCJvbkJ0bkNsaWNrZWQiLCJldmVudCIsInRhcmdldCIsIm5hbWUiLCJjYW5jZWxCdG5DbGlja2VkIiwic2hvdyIsInRpdGxlIiwiY29udGVudCIsImNhbGxiYWNrIiwibmVlZENhbmNlbCIsInN0cmluZyIsIm5vZGUiLCJ4Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBQSxFQUFFLENBQUNDLEtBQUgsQ0FBUztBQUNMLGFBQVNELEVBQUUsQ0FBQ0UsU0FEUDtBQUdMQyxFQUFBQSxVQUFVLEVBQUU7QUFDUkMsSUFBQUEsTUFBTSxFQUFDLElBREM7QUFDSztBQUNiQyxJQUFBQSxNQUFNLEVBQUMsSUFGQztBQUVLO0FBQ2JDLElBQUFBLFVBQVUsRUFBQyxJQUhIO0FBR1M7QUFDakJDLElBQUFBLE1BQU0sRUFBQyxJQUpDO0FBSUs7QUFDYkMsSUFBQUEsUUFBUSxFQUFDLElBTEQ7QUFLTztBQUNmQyxJQUFBQSxjQUFjLEVBQUMsSUFOUCxDQU1hOztBQU5iLEdBSFA7QUFhTDtBQUVBQyxFQUFBQSxNQWZLLG9CQWVLO0FBQ047QUFDQTtBQUNBO0FBQ0E7QUFDQVYsSUFBQUEsRUFBRSxDQUFDVyxHQUFILENBQU8saUJBQVA7QUFFQSxTQUFLUCxNQUFMLEdBQWNKLEVBQUUsQ0FBQ1ksSUFBSCxDQUFRLHdCQUFSLENBQWQ7QUFDQSxTQUFLTCxNQUFMLEdBQWNQLEVB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S0FBOUI7QUFDQSxXQUFLWixNQUFMLENBQVkyQixJQUFaLENBQWlCQyxDQUFqQixHQUFxQixDQUFyQjtBQUNIO0FBQ0o7QUEvRkksQ0FBVCIsInNvdXJjZVJvb3QiOiIvIiwic291cmNlc0NvbnRlbnQiOlsiLy8gTGVhcm4gY2MuQ2xhc3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2NsYXNzLmh0bWxcclxuLy8gTGVhcm4gQXR0cmlidXRlOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9yZWZlcmVuY2UvYXR0cmlidXRlcy5odG1sXHJcbi8vIExlYXJuIGxpZmUtY3ljbGUgY2FsbGJhY2tzOlxyXG4vLyAgLSBodHRwczovL2RvY3MuY29jb3MuY29tL2NyZWF0b3IvbWFudWFsL2VuL3NjcmlwdGluZy9saWZlLWN5Y2xlLWNhbGxiYWNrcy5odG1sXHJcblxyXG5jYy5DbGFzcyh7XHJcbiAgICBleHRlbmRzOiBjYy5Db21wb25lbnQsXHJcblxyXG4gICAgcHJvcGVydGllczoge1xyXG4gICAgICAgIF9hbGVydDpudWxsLCAvL+aPkOekuuahhlxyXG4gICAgICAgIF9idG5PSzpudWxsLCAvL+aPkOekuuahhuehruWumuaMiemSrlxyXG4gICAgICAgIF9idG5DYW5jZWw6bnVsbCwgLy/mj5DnpLrmoYblj5bmtojmjInpkq5cclxuICAgICAgICBfdGl0bGU6bnVsbCwgLy/mj5DnpLrmoYbmoIfpophcclxuICAgICAgICBfY29udGVudDpudWxsLCAvL+aPkOekuuahhuWGheWuuVxyXG4gICAgICAgIF9idG5PS0NhbGxiYWNrOm51bGwsIC8v54K55Ye756Gu5a6a5oyJ6ZKu55qE5Zue6LCD5LqL5Lu2XHJcbiAgICB9LFxyXG5cclxuICAgICAgICBcclxuICAgIC8vIExJRkUtQ1lDTEUgQ0FMTEJBQ0tTOlxyXG5cclxuICAgIG9uTG9hZCAoKSB7XHJcbiAgICAgICAgLy/phY3nva5BcHBTdGFydC5qc+S7peWQjuaJjeWPr+S7peWIpOaWrVxyXG4gICAgICAgIC8vIGlmKGNjLnZ2ID09IG51bGwpe1xyXG4gICAgICAgIC8vICAgICByZXR1cm47XHJcbiAgICAgICAgLy8gfVxyXG4gICAgICAgIGNjLmxvZygnQWxlcnQuanMgb25Mb2FkJyk7XHJcbiAgICAgICAgIFxyXG4gICAgICAgIHRoaXMuX2FsZXJ0ID0gY2MuZmluZChcIkNhbnZhcy9zYWZlX2FyZWEvYWxlcnRcIik7XHJcbiAgICAgICAgdGhpcy5fdGl0bGUgPSBjYy5maW5kKFwiQ2FudmFzL3NhZmVfYXJlYS9hbGVydC9iYWNrZ3JvdW5kL3RpdGxlXCIpLmdldENvbXBvbmVudChjYy5MYWJlbCk7XHJcbiAgICAgICAgdGhpcy5fY29udGVudCA9IGNjLmZpbmQoXCJDYW52YXMvc2FmZV9hcmVhL2FsZXJ0L2JhY2tncm91bmQvY29udGVudFwiKS5nZXRDb21wb25lbnQoY2MuTGFiZWwpO1xyXG4gICAgICAgIHRoaXMuX2J0bk9LID0gY2MuZmluZChcIkNhbnZhcy9zYWZlX2FyZWEvYWxlcnQvYmFja2dyb3VuZC9idG5fb2tcIikuZ2V0Q29tcG9uZW50KGNjLkJ1dHRvbik7XHJcbiAgICAgICAgdGhpcy5fYnRuQ2FuY2VsID0gY2MuZmluZChcIkNhbnZhcy9zYWZlX2FyZWEvYWxlcnQvYmFja2dyb3VuZC9idG5fY2FuY2VsXCIpLmdldENvbXBvbmVudChjYy5CdXR0b24pO1xyXG5cclxuICAgICAgICBpZiAodGhpcy5fYnRuQ2FuY2VsIGluc3RhbmNlb2YgY2MuQnV0dG9uKSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfmmK/kuKpCdXR0b24gJyk7XHJcbiAgICAgICAgfWVsc2V7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCfmmK/kuKrprLwnKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHRoaXMuX2J0bk9LLmFjdGl2ZSA9IGZhbHNlO1xyXG5cclxuICAgICAgICAvL+S4i+mdoui/meauteS7o+eggeW8gOWQr+aYr+WQpuaYvuekulxyXG4gICAgICAgIC8vIHRoaXMuX2FsZXJ0LmFjdGl2ZSA9IGZhbHNlO1xyXG4gICAgICAgIGNjLnZ2LmFsZXJ0ID0gdGhpcztcclxuICAgIH0sXHJcblxyXG4gICAgc3RhcnQgKCkge1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgLy8gdXBkYXRlIChkdCkge30sXHJcblxyXG5cclxuICAgIG9uQnRuQ2xpY2tlZDpmdW5jdGlvbihldmVudCl7XHJcbiAgICAgICAgaWYoZXZlbnQudGFyZ2V0Lm5hbWUgPT0gXCJidG5fb2tcIil7XHJcbiAgICAgICAgICAgIGlmKHRoaXMuX2J0bk9LQ2FsbGJhY2spe1xyXG4gICAgICAgICAgICAgICAgdGhpcy5fYnRuT0tDYWxsYmFjaygpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHRoaXMuX2FsZXJ0LmFjdGl2ZSA9IGZhbHNlO1xyXG4gICAgICAgIHRoaXMuX2J0bk9LQ2FsbGJhY2sgPSBudWxsO1xyXG5cclxuICAgICAgICBjb25zb2xlLmxvZyhcIui/meaYr+WFqOaWsOWumuS5ieeahGNsaWNrZWQhIVwiKTtcclxuICAgIH0sXHJcblxyXG4gICAgY2FuY2VsQnRuQ2xpY2tlZDpmdW5jdGlvbigpe1xyXG4gICAgICAgIGNjLmxvZygn5oiR6KKr54K55Lit5LqGJyk7IFxyXG4gICAgICAgIHRoaXMuX2FsZXJ0LmFjdGl2ZSA9IGZhbHNlOyBcclxuICAgICAgfSxcclxuIFxyXG4gICAgLyoqIFxyXG4gICAgICogdGl0bGU65by55qGG5qCH6aKYXHJcbiAgICAgKiBjb250ZW5077ya5by55qGG5pi+56S65YaF5a65XHJcbiAgICAgKiBjYWxsYmFja++8mueCueWHu+KAnOehruWumuKAneaMiemSrueahOWbnuiwg+S6i+S7tlxyXG4gICAgICogbmVlZENhbmNlbO+8muaYr+WQpumcgOimgeaYvuekuuKAnOWPlua2iOKAneaMiemSrlxyXG4gICAgKi9cclxuICAgIHNob3c6ZnVuY3Rpb24odGl0bGUsY29udGVudCxjYWxsYmFjayxuZWVkQ2FuY2VsKXtcclxuICAgICAgICBjb25zb2xlLmxvZygncGFyYXMgLS0tLS0+IDogJyx0aXRsZSxjb250ZW50LGNhbGxiYWNrLG5lZWRDYW5jZWwpO1xyXG4gICAgICAgIHRoaXMuX2FsZXJ0LmFjdGl2ZSA9IHRydWU7XHJcbiAgICAgICAgdGhpcy5fYnRuT0tDYWxsYmFjayA9IGNhbGxiYWNrO1xyXG4gICAgICAgIHRoaXMuX3RpdGxlLnN0cmluZyA9IHRpdGxlO1xyXG4gICAgICAgIHRoaXMuX2NvbnRlbnQuc3RyaW5nID0gY29udGVudDtcclxuICAgICAgICBpZihuZWVkQ2FuY2VsKXtcclxuICAgICAgICAgIFxyXG4gICAgICAgICAgICAvLyBcIuehruWumlwiIOWSjCBcIuWPlua2iFwi6YO95pi+56S6XHJcbiAgICAgICAgICAgIC8v5rOo5oSP77ya6L+Z6YeM6Z2i6YO95piv5a+56IqC54K5bm9kZSDmk43kvZwsdGhpcy5fYnRuQ2FuY2VsLmFjdGl2ZSjmiJbogIUueCnku4DkuYjnmoTmk43kvZzpg73mmK/ml6DmlYjnmoTimLnvuI9cclxuICAgICAgICAgICAgY29uc29sZS5sb2coXCJuZWVkQ2FuY2VsID8gdHJ1ZVwiKTtcclxuICAgICAgICAgICAgdGhpcy5fYnRuQ2FuY2VsLm5vZGUuYWN0aXZlID0gdHJ1ZTtcclxuICAgICAgICAgICAgdGhpcy5fYnRuT0subm9kZS54ID0gLTIzOS41O1xyXG4gICAgICAgICAgICB0aGlzLl9idG5DYW5jZWwubm9kZS54ID0gMjM5LjU7XHJcbiAgICAgICAgICAgIGlmKHRoaXMuX2J0bk9LKXtcclxuICAgICAgICAgICAgICAgIGNjLmxvZygn5Lmf5piv5a2Y5Zyo55qE5ZWK77yBJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgZWxzZXtcclxuICAgICAgICAgICAvL+S4jemcgOimgeaYvuekuuKAnOWPlua2iOKAneaMiemSrlxyXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhcIm5lZWRDYW5jZWwgPyBmYWxzZVwiKTtcclxuICAgICAgICAgICAgdGhpcy5fYnRuQ2FuY2VsLm5vZGUuYWN0aXZlID0gZmFsc2U7XHJcbiAgICAgICAgICAgIHRoaXMuX2J0bk9LLm5vZGUueCA9IDA7XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuXHJcbn0pO1xyXG4iXX0=
//------QC-SOURCE-SPLIT------

                (function() {
                    var nodeEnv = typeof require !== 'undefined' && typeof process !== 'undefined';
                    var __module = nodeEnv ? module : {exports:{}};
                    var __filename = 'preview-scripts/assets/Script/login/alert.js';
                    var __require = nodeEnv ? function (request) {
                        return cc.require(request);
                    } : function (request) {
                        return __quick_compile_project__.require(request, __filename);
                    };
                    function __define (exports, require, module) {
                        if (!nodeEnv) {__quick_compile_project__.registerModule(__filename, module);}"use strict";
cc._RF.push(module, '2045b71nHFDw7X/Kgx+6xMy', 'alert');
// Script/login/alert.js

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
    _btnOKCallback: null //点击确定按钮的回调事件

  },
  // LIFE-CYCLE CALLBACKS:
  onLoad: function onLoad() {
    //配置AppStart.js以后才可以判断
    // if(cc.vv == null){
    //     return;
    // }
    cc.log('Alert.js onLoad');
    this._alert = cc.find("Canvas/safe_area/alert");
    this._title = cc.find("Canvas/safe_area/alert/background/title").getComponent(cc.Label);
    this._content = cc.find("Canvas/safe_area/alert/background/content").getComponent(cc.Label);
    this._btnOK = cc.find("Canvas/safe_area/alert/background/btn_ok").getComponent(cc.Button);
    this._btnCancel = cc.find("Canvas/safe_area/alert/background/btn_cancel").getComponent(cc.Button);

    if (this._btnCancel instanceof cc.Button) {
      console.log('是个Button ');
    } else {
      console.log('是个鬼');
    }

    this._btnOK.active = false; //下面这段代码开启是否显示
    // this._alert.active = false;

    cc.vv.alert = this;
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFzc2V0c1xcU2NyaXB0XFxsb2dpblxcYWxlcnQuanMiXSwibmFtZXMiOlsiY2MiLCJDbGFzcyIsIkNvbXBvbmVudCIsInByb3BlcnRpZXMiLCJfYWxlcnQiLCJfYnRuT0siLCJfYnRuQ2FuY2VsIiwiX3RpdGxlIiwiX2NvbnRlbnQiLCJfYnRuT0tDYWxsYmFjayIsIm9uTG9hZCIsImxvZyIsImZpbmQiLCJnZXRDb21wb25lbnQiLCJMYWJlbCIsIkJ1dHRvbiIsImNvbnNvbGUiLCJhY3RpdmUiLCJ2diIsImFsZXJ0Iiwic3RhcnQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLEVBQUUsQ0FBQ0MsS0FBSCxDQUFTO0FBQ0wsYUFBU0QsRUFBRSxDQUFDRSxTQURQO0FBR0xDLEVBQUFBLFVBQVUsRUFBRTtBQUNSQyxJQUFBQSxNQUFNLEVBQUMsSUFEQztBQUNLO0FBQ2JDLElBQUFBLE1BQU0sRUFBQyxJQUZDO0FBRUs7QUFDYkMsSUFBQUEsVUFBVSxFQUFDLElBSEg7QUFHUztBQUNqQkMsSUFBQUEsTUFBTSxFQUFDLElBSkM7QUFJSztBQUNiQyxJQUFBQSxRQUFRLEVBQUMsSUFMRDtBQUtPO0FBQ2ZDLElBQUFBLGNBQWMsRUFBQyxJQU5QLENBTWE7O0FBTmIsR0FIUDtBQWFMO0FBRUFDLEVBQUFBLE1BZkssb0JBZUs7QUFDTjtBQUNBO0FBQ0E7QUFDQTtBQUNBVixJQUFBQSxFQUFFLENBQUNXLEdBQUgsQ0FBTyxpQkFBUDtBQUVBLFNBQUtQLE1BQUwsR0FBY0osRUFBRSxDQUFDWSxJQUFILENBQVEsd0JBQVIsQ0FBZDtBQUNBLFNBQUtMLE1BQUwsR0FBY1AsRUFBRSxDQUFDWSxJQUFILENBQVEseUNBQVIsRUFBbURDLFlBQW5ELENBQWdFYixFQUFFLENBQUNjLEtBQW5FLENBQWQ7QUFDQSxTQUFLTixRQUFMLEdBQWdCUixFQUFFLENBQUNZLElBQUgsQ0FBUSwyQ0FBUixFQUFxREMsWUFBckQsQ0FBa0ViLEVBQUUsQ0FBQ2MsS0FBckUsQ0FBaEI7QUFDQSxTQUFLVCxNQUFMLEdBQWNMLEVBQUUsQ0FBQ1ksSUFBSCxDQUFRLDBDQUFSLEVBQW9EQyxZQUFwRCxDQUFpRWIsRUFBRSxDQUFDZSxNQUFwRSxDQUFkO0FBQ0EsU0FBS1QsVUFBTCxHQUFrQk4sRUFBRSxDQUFDWSxJQUFILENBQVEsOENBQVIsRUFBd0RDLFlBQXhELENBQXFFYixFQUFFLENBQUNlLE1BQXhFLENBQWxCOztBQUVBLFFBQUksS0FBS1QsVUFBTCxZQUEyQk4sRUFBRSxDQUFDZSxNQUFsQyxFQUEwQztBQUN0Q0MsTUFBQUEsT0FBTyxDQUFDTCxHQUFSLENBQVksV0FBWjtBQUNILEtBRkQsTUFFSztBQUNESyxNQUFBQSxPQUFPLENBQUNMLEdBQVIsQ0FBWSxLQUFaO0FBQ0g7O0FBRUQsU0FBS04sTUFBTCxDQUFZWSxNQUFaLEdBQXFCLEtBQXJCLENBbkJNLENBcUJOO0FBQ0E7O0FBQ0FqQixJQUFBQSxFQUFFLENBQUNrQixFQUFILENBQU1DLEtBQU4sR0FBYyxJQUFkO0FBQ0gsR0F2Q0k7QUF5Q0xDLEVBQUFBLEtBekNLLG1CQXlDSSxDQUVSLENBM0NJLENBNkNMOztBQTdDSyxDQUFUIiwic291cmNlUm9vdCI6Ii8iLCJzb3VyY2VzQ29udGVudCI6WyIvLyBMZWFybiBjYy5DbGFzczpcclxuLy8gIC0gaHR0cHM6Ly9kb2NzLmNvY29zLmNvbS9jcmVhdG9yL21hbnVhbC9lbi9zY3JpcHRpbmcvY2xhc3MuaHRtbFxyXG4vLyBMZWFybiBBdHRyaWJ1dGU6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL3JlZmVyZW5jZS9hdHRyaWJ1dGVzLmh0bWxcclxuLy8gTGVhcm4gbGlmZS1jeWNsZSBjYWxsYmFja3M6XHJcbi8vICAtIGh0dHBzOi8vZG9jcy5jb2Nvcy5jb20vY3JlYXRvci9tYW51YWwvZW4vc2NyaXB0aW5nL2xpZmUtY3ljbGUtY2FsbGJhY2tzLmh0bWxcclxuXHJcbmNjLkNsYXNzKHtcclxuICAgIGV4dGVuZHM6IGNjLkNvbXBvbmVudCxcclxuXHJcbiAgICBwcm9wZXJ0aWVzOiB7XHJcbiAgICAgICAgX2FsZXJ0Om51bGwsIC8v5o+Q56S65qGGXHJcbiAgICAgICAgX2J0bk9LOm51bGwsIC8v5o+Q56S65qGG56Gu5a6a5oyJ6ZKuXHJcbiAgICAgICAgX2J0bkNhbmNlbDpudWxsLCAvL+aPkOekuuahhuWPlua2iOaMiemSrlxyXG4gICAgICAgIF90aXRsZTpudWxsLCAvL+aPkOekuuahhuagh+mimFxyXG4gICAgICAgIF9jb250ZW50Om51bGwsIC8v5o+Q56S65qGG5YaF5a65XHJcbiAgICAgICAgX2J0bk9LQ2FsbGJhY2s6bnVsbCwgLy/ngrnlh7vnoa7lrprmjInpkq7nmoTlm57osIPkuovku7ZcclxuICAgIH0sXHJcblxyXG4gICAgICAgIFxyXG4gICAgLy8gTElGRS1DWUNMRSBDQUxMQkFDS1M6XHJcblxyXG4gICAgb25Mb2FkICgpIHtcclxuICAgICAgICAvL+mFjee9rkFwcFN0YXJ0Lmpz5Lul5ZCO5omN5Y+v5Lul5Yik5patXHJcbiAgICAgICAgLy8gaWYoY2MudnYgPT0gbnVsbCl7XHJcbiAgICAgICAgLy8gICAgIHJldHVybjtcclxuICAgICAgICAvLyB9XHJcbiAgICAgICAgY2MubG9nKCdBbGVydC5qcyBvbkxvYWQnKTtcclxuICAgICAgICAgXHJcbiAgICAgICAgdGhpcy5fYWxlcnQgPSBjYy5maW5kKFwiQ2FudmFzL3NhZmVfYXJlYS9hbGVydFwiKTtcclxuICAgICAgICB0aGlzLl90aXRsZSA9IGNjLmZpbmQoXCJDYW52YXMvc2FmZV9hcmVhL2FsZXJ0L2JhY2tncm91bmQvdGl0bGVcIikuZ2V0Q29tcG9uZW50KGNjLkxhYmVsKTtcclxuICAgICAgICB0aGlzLl9jb250ZW50ID0gY2MuZmluZChcIkNhbnZhcy9zYWZlX2FyZWEvYWxlcnQvYmFja2dyb3VuZC9jb250ZW50XCIpLmdldENvbXBvbmVudChjYy5MYWJlbCk7XHJcbiAgICAgICAgdGhpcy5fYnRuT0sgPSBjYy5maW5kKFwiQ2FudmFzL3NhZmVfYXJlYS9hbGVydC9iYWNrZ3JvdW5kL2J0bl9va1wiKS5nZXRDb21wb25lbnQoY2MuQnV0dG9uKTtcclxuICAgICAgICB0aGlzLl9idG5DYW5jZWwgPSBjYy5maW5kKFwiQ2FudmFzL3NhZmVfYXJlYS9hbGVydC9iYWNrZ3JvdW5kL2J0bl9jYW5jZWxcIikuZ2V0Q29tcG9uZW50KGNjLkJ1dHRvbik7XHJcblxyXG4gICAgICAgIGlmICh0aGlzLl9idG5DYW5jZWwgaW5zdGFuY2VvZiBjYy5CdXR0b24pIHtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coJ+aYr+S4qkJ1dHRvbiAnKTtcclxuICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coJ+aYr+S4qumsvCcpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgdGhpcy5fYnRuT0suYWN0aXZlID0gZmFsc2U7XHJcblxyXG4gICAgICAgIC8v5LiL6Z2i6L+Z5q615Luj56CB5byA5ZCv5piv5ZCm5pi+56S6XHJcbiAgICAgICAgLy8gdGhpcy5fYWxlcnQuYWN0aXZlID0gZmFsc2U7XHJcbiAgICAgICAgY2MudnYuYWxlcnQgPSB0aGlzO1xyXG4gICAgfSxcclxuXHJcbiAgICBzdGFydCAoKSB7XHJcblxyXG4gICAgfSxcclxuXHJcbiAgICAvLyB1cGRhdGUgKGR0KSB7fSxcclxufSk7XHJcbiJdfQ==
//------QC-SOURCE-SPLIT------
