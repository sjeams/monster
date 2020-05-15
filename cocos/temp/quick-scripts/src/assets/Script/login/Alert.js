"use strict";
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