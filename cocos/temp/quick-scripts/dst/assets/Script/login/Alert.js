
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