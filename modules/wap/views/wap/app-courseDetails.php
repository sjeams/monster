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
    <link rel="stylesheet" href="/cn/css/app-courseDetails.css">
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
    <!--<div class="g-doc">-->
    <!-- 页面结构写在这里 -->
    <!--顶部app下载-->
    <div class="topApp an-flex">
        <div class="l_logo">
            <img src="/cn/images/courseDe/greapp-logo.png" alt="logo" />
        </div>
        <div class="c_font">
            <h4>雷哥GRE APP</h4>
            <p>免费做题模考，领雷豆</p>
        </div>
        <div class="r_btn">
            <a href="javascript:jumpShop();">
                <img src="/cn/images/courseDe/greapp-btn.png" alt="按钮" />
            </a>
        </div>
    </div>
    <!--图片详情-->
    <div class="imgDetails">
        <img src="/cn/images/courseDe/greapp-book.png" alt="图片" class="imgd" />
        <img src="/cn/images/courseDe/greapp-shiting.png" alt="右侧试听按钮图" class="btn"  onclick="jumpShop()"/>
    </div>
    <!--标题等内容信息-->
    <div class="courseInfo">
        <h2><?php echo $data['name'] ?></h2>
        <div style="display: none" id="pid" data-value="<?php echo $pid; ?>"></div>
        <div class="cI-box an-flex">
            <div class="cI-left">
                <?php echo $data['performance'] ?>
                <span>（已有<?php echo $data['alternatives'] ?>人购买）</span>
            </div>
            <div class="cI-right">
                ￥<?php echo $data['price'] ?>
            </div>
        </div>
        <div class="cI-boFont">
            <ul>
                <li class="an-flex">
                    <div class="left_title">开课时间
                        <span></span>
                    </div>
                    <div class="right_info"><?php echo $data['commencement'] ?></div>
                </li>
                <li class="an-flex">
                    <div class="left_title">授课老师
                        <span></span>
                    </div>
                    <div class="right_info">雷哥GRE名师团队</div>
                </li>
                <?php
                foreach ($tag as $v) {
                    ?>
                    <li class="an-flex">
                        <div class="left_title"><?php echo $v['name'] ?>
                            <span></span>
                        </div>
                        <div class="right_info an-flex" id="changeBtn">
                            <?php
                            foreach ($v['child'] as $val) {
                                ?>
                                <span data-value="<?php echo $val['id'] ?>" class="teacherTag <?php echo $val['select'] ? 'on' : '' ?>" ><?php echo $val['name'] ?></span>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!--切换-->
    <div class="slideContent">
        <div class="wrap">
            <div class="tabs">
                <span class="part active">
                    <a href="javascript:void(0);" hidefocus="true">课程介绍</a>
                </span>
                <span class="part">
                    <a href="javascript:void(0);" hidefocus="true">用户评价(<?php echo count($comment['data']) ?>)</a>
                </span>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-visible swiper-slide-active">
                        <div class="content-slide">
                        <?php
                        if(empty($data['description'])) {
                            echo $parent['description'];
                        } else{
                            echo $data['description'];
                        }
                        ?>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="content-slide">
                            <?php
                            foreach ($comment['data'] as $k => $v) {
                                ?>
                                <div class="user-comment-item">
                                    <div class="user-comment">
                                        <div>
                                            <img src="<?php echo $v['image']?$v['image']:'/cn/images/courseDe/user_img.png'?>" alt="用户头像">

                                            <p><?php echo isset($v['nickname'])?$v['nickname']:$v['userName'] ?></p>
                                        </div>
                                        <div><?php echo date("Y-m-d", $v['createTime']); ?></div>
                                    </div>
                                    <p> <?php echo $v['content'] ?></p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- 固定形式部分 -->
    <div class="footer">
        <div>促销价
            <div class="price">
                <span>￥</span>
                <span><?php echo $data['price'] ?></span>
            </div>
        </div>
        <div class="consult">
            <img src="/cn/images/courseDe/gmatapp-zixun.png" alt="咨询">
            <div><a href="<?php echo Yii::$app->params['navUrl'];?>">咨询</a></div>
            <div><a href="https://mgre.viplgw.cn/#/courseDetails?id=<?php echo $data['id']?>">立即购买</a></div>
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

        /**
         *价格切换
         */
        $('.teacherTag').click(function () {
            var tagStr = "";
            var tagId = $(this).attr('data-value');
            var pid = $('#pid').attr('data-value');
            var tagObg = $(this).find('.on');
            $(tagObg).each(function () {
                var ss = $(this).attr('data-value');
                tagStr += (ss + ",");
            });
            tagStr += tagId;
            $.post("/cn/api/change-class", {tagStr: tagStr, pid: pid}, function (re) {
                if (re.id == undefined) {
                    alert("缺货中、、、、");
                } else {
                    window.location.href = "/share_course.html?courseId=" + re.id ;
                }
            }, 'json')
        });
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
    $(function () {
        //    swiper tab切换
        var tabsSwiper;
        tabsSwiper = new Swiper('.swiper-container', {
            speed: 500,
            onSlideChangeStart: function () {
                var H = $(".content-slide").eq(tabsSwiper.activeIndex).height();
                $(".swiper-slide").css('height', H + 'px');
                $(".swiper-wrapper").css('height', H + 'px');
                $(".tabs .active").removeClass('active');
                $(".tabs span").eq(tabsSwiper.activeIndex).addClass('active');
            },
        });
        setTimeout(function () {
            var H = $(".content-slide").eq(0).height();
            $(".swiper-slide").css('height', H + 'px');
            $(".swiper-wrapper").css('height', H + 'px');
        },1000/60);

        $(".tabs span").on('touchstart mousedown', function (e) {
            e.preventDefault()
            $(".tabs .active").removeClass('active');
            $(this).addClass('active');
            tabsSwiper.swipeTo($(this).index());
        });
        $(".tabs span").click(function (e) {
            e.preventDefault();
        });
    });//end

    $(function () {
        $("#changeBtn").on("click", "span", function (event) {
            var target = $(event.target);
            $('span').removeClass('on')
            target.addClass('on');

        })

    })
</script>

</html>