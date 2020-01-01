<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- <meta name="description" content=""> -->
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    <!-- ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏-->
    <!-- ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面-->
    <!-- ================================================== -->
    <meta name="renderer" content="webkit">
    <!-- Mobile Specific Metas
   ================================================== -->
    <!-- !!!注意 minimal-ui 是IOS7.1的新属性，最小化浏览器UI -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/cn/css/swiper.min.css">
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/app-articleDetails.css">
    <script src="/cn/js/jquery-1.9.1.min.js"></script>
    <script src="/cn/js/idangerous.swiper.min.js"></script>
    <script src="/cn/js/zepto.min.js"></script>
    <title><?php echo $data['name'] ?></title>
</head>
<script language="javascript">
    function jumpShop(){
        if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) {
            var loadDateTime = new Date();
            window.setTimeout(function () {
                var timeOutDateTime = new Date();
                if (timeOutDateTime - loadDateTime < 5000) {
                    window.location ="https://itunes.apple.com/cn/app/%E9%9B%B7%E5%93%A5gre/id1442478540?mt=8";
                } else {
                    window.close();
                }
            }, 25);
            window.location = " smartapply://";
        } else if (navigator.userAgent.match(/android/i)) {
            var state = null;
            try {
                window.location = ' smartapply://';
                setTimeout(function(){
                    window.location= "https://sj.qq.com/myapp/detail.htm?apkName=com.thinkwithu.www.gre"; //android下载地址

                },500);
            } catch(e) {}
        }
    }
</script>
<body>
    <!-- 文章详情 -->
    <div class="articleDetails">
        <div class="title">
            <?php echo $data['name'] ?>
        </div>
        <div class="editorDetails">
            <div class="editor-left">
                <div class="editor-img">
                    <img src="<?php echo !empty($data['editUser']['image'])?$data['editUser']['image']:'/cn/images/details_defaultImg.png' ?>" alt="">
                </div>
                <div class="editor-name"><?php echo $data['editUser']['nickname'] ?></div>
                <div class="editor-time"><?php echo $data['alternatives'] ?></div>
            </div>
            <div class="editor-right" onclick="jumpShop()">+关注</div>
        </div>
        <div class="content">
            <?php echo $data['description'] ?>
        </div>

        <div class='like' onclick="jumpShop()">
            <div class="like-img">
                <img src="/cn/images/dianz.png" alt="点赞">
            </div>
            <div><?php echo $data['fabulous'] ?>人点赞</div>
        </div>
    </div>
    <!-- 热门推荐 -->
    <div class="articleDetails hot">
        <div class="hot-recommend">热门推荐</div>
        <?php
        foreach($hot as $k=>$v) {
            ?>
            <div class="hot-content content-border">
                <div class="content-left">
                    <a href="/share_article.html?id=<?php echo $v['id'] ?>">
                    <div><?php echo $v['name'] ?></div>
                    <div class="details">
                        <div><?php echo $v['editUser']['nickname'] ?></div>
                        <div class="details">
                            <div class="see-img">
                                <img src="/cn/images/see.png" alt="查看">
                            </div>
                            <div><?php echo $v['viewCount'] ?></div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="book-img">
                    <img src="<?php echo $v['image'] ?>" alt="图片">
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- 固定形式部分 -->
    <div class="footer">
        <div style="display:flex;justify-items:center;">
            <div class="greapp-img">
                <img src="/cn/images/courseDe/greapp-logo.png" alt="雷哥gre">
            </div>
            <div>
                <div class="GREAPP">
                    <span>雷哥GRE</span>
                    <span style="margin-left:.3rem">APP</span>
                </div>
                <div class="freeget" onclick="jumpShop()">免费做题模考，领雷豆</div>
            </div>
        </div>
        <div class='download' onclick="jumpShop()">
            点击下载
        </div>

    </div>
</body>
<script type="text/javascript">
    //    适配 (计算尺寸时，只需要将对应的尺寸除以100)。
    (function (designWidth, maxWidth) {
        var doc = document,
            win = window;
        var docEl = doc.documentElement;
        var metaEl,
            metaElCon;
        var styleText,
            remStyle = document.createElement("style");
        var tid;

        function refreshRem() {
            // var width = parseInt(window.screen.width); // uc有bug
            var width = docEl.getBoundingClientRect().width;
            if (!maxWidth) {
                maxWidth = 540;
            };
            if (width > maxWidth) { // 淘宝做法：限制在540的屏幕下，这样100%就跟10rem不一样了
                width = maxWidth;
            }
            var rem = width * 100 / designWidth;
            // var rem = width / 10; // 如果要兼容vw的话分成10份 淘宝做法
            //docEl.style.fontSize = rem + "px"; //旧的做法，在uc浏览器下面会有切换横竖屏时定义了font-size的标签不起作用的bug
            remStyle.innerHTML = 'html{font-size:' + rem + 'px;}';
        }

        // 设置 viewport ，有的话修改 没有的话设置
        metaEl = doc.querySelector('meta[name="viewport"]');
        // 20171219修改：增加 viewport-fit=cover ，用于适配iphoneX
        metaElCon = "width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no,viewport-fit=cover";
        if (metaEl) {
            metaEl.setAttribute("content", metaElCon);
        } else {
            metaEl = doc.createElement("meta");
            metaEl.setAttribute("name", "viewport");
            metaEl.setAttribute("content", metaElCon);
            if (docEl.firstElementChild) {
                docEl.firstElementChild.appendChild(metaEl);
            } else {
                var wrap = doc.createElement("div");
                wrap.appendChild(metaEl);
                doc.write(wrap.innerHTML);
                wrap = null;
            }
        }

        //要等 wiewport 设置好后才能执行 refreshRem，不然 refreshRem 会执行2次；
        refreshRem();

        if (docEl.firstElementChild) {
            docEl.firstElementChild.appendChild(remStyle);
        } else {
            var wrap = doc.createElement("div");
            wrap.appendChild(remStyle);
            doc.write(wrap.innerHTML);
            wrap = null;
        }

        win.addEventListener("resize", function () {
            clearTimeout(tid); //防止执行两次
            tid = setTimeout(refreshRem, 300);
        }, false);

        win.addEventListener("pageshow", function (e) {
            if (e.persisted) { // 浏览器后退的时候重新计算
                clearTimeout(tid);
                tid = setTimeout(refreshRem, 300);
            }
        }, false);

        if (doc.readyState === "complete") {
            doc.body.style.fontSize = "16px";
        } else {
            doc.addEventListener("DOMContentLoaded", function (e) {
                doc.body.style.fontSize = "16px";
            }, false);
        }
    })(750, 750);

</script>

</html>