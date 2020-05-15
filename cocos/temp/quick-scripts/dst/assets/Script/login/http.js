
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