
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