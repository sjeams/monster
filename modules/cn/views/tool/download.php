 <html>

 <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>二维码下载</title>

         <script type="text/javascript">
                /*
         9          * 智能机浏览器版本信息:
         10          *
         11          */
                 var browser = {
                         versions: function() {
                             var u = navigator.userAgent,
                                     app = navigator.appVersion;
                             return { //移动终端浏览器版本信息
                                     trident: u.indexOf('Trident') > -1, //IE内核
                                     presto: u.indexOf('Presto') > -1, //opera内核
                                     webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                                     gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                                     mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/), //是否为移动终端
                                     ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                                     android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                                     iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
                                     iPad: u.indexOf('iPad') > -1, //是否iPad
                                     webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                             };
                     }(),
                         language: (navigator.browserLanguage || navigator.language).toLowerCase()
                 }

                 if (browser.versions.ios || browser.versions.iPhone || browser.versions.iPad) {
                         window.location = "https://itunes.apple.com/cn/app/%E9%9B%B7%E5%93%A5gre/id1442478540?mt=8";  //改地址放入IOS跳转链接
                     } else if (browser.versions.android) {　　　　　　　　　　　　　　 //该地址放入Android下载包链接
                         // window.location = "https://www.wandoujia.com/apps/thinku.com.word";
                         // window.location = "https://android.myapp.com/myapp/detail.htm?apkName=thinku.com.word&ADTAG=mobile";
                     // document.write(navigator.userAgent)
                     var type=navigator.userAgent;
                     type=type.toUpperCase()
                     //华为
                     if(type.indexOf("HUAWEI")!=-1){
                         window.location= "https://appstore.huawei.com/app/C100482929"
                     }else if(type.indexOf("XIAOMI")!=-1){
                        window.location= "http://app.mi.com/details?id=com.thinkwithu.www.gre&ref=search "
                     }else if(type.indexOf("MZ"||"MEIZU ")!=-1){
                         window.location= "http://app.meizu.com/apps/public/detail?package_name=com.thinkwithu.www.gre"
                     }else if(type.indexOf("VIVO")!=-1){
                         window.location= "http://appdetailh5.vivo.com.cn/detail/2388945?source=1"
                     }else {
                         window.location = "https://sj.qq.com/myapp/detail.htm?apkName=com.thinkwithu.www.gre";
                     }
                 }
                 //            document.writeln("语言版本: " + browser.language);
                 //            document.writeln(" 是否为移动终端: " + browser.versions.mobile);
                 //            document.writeln(" ios终端: " + browser.versions.ios);
                 //            document.writeln(" android终端: " + browser.versions.android);
                 //            document.writeln(" 是否为iPhone: " + browser.versions.iPhone);
                 //            document.writeln(" 是否iPad: " + browser.versions.iPad);
                 //            document.writeln(navigator.userAgent);
             </script>
     </head>

 <body>

 </body>

 </html>