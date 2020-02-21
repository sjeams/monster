<?php $userId = Yii::$app->session->get('userId'); ?>
<?php $userData = Yii::$app->session->get('userData') ?>
<?php $level = Yii::$app->session->get('level') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <title><?php echo $this->context->title ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--    <meta name="keywords" content="--><?php //echo $this->context->keywords ?><!--，雷哥培训">-->
    <meta name="keywords" content="<?php echo $this->context->keywords ?>，雷哥GRE">
    <meta name="description" content="<?php echo $this->context->description ?>">
    <meta name="title" content="">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
    ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/reset.css">
    <!--    <link rel="stylesheet" href="/cn/css/course.css?v=1">-->
    <link rel="stylesheet" href="/cn/css/common.css?v=1.0101010101.2">
    <link rel="stylesheet" href="/cn/css/animate.min.css">
    <link rel="stylesheet" href="/cn/css/swiper.css">

    <script src="/cn/js/jquery-1.9.1.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/ResizeSensor.min.js"></script>
    <script type="text/javascript" src="/cn/js/theia-sticky-sidebar.min.js"></script>
    <script type="text/javascript" src="/cn/js/common.js?v=1"></script>
<!--    <script type="text/javascript" src="/cn/js/swiper.js"></script>-->

    <script>
        // var _hmt = _hmt || [];
        // (function () {
        //     var hm = document.createElement("script");
        //     hm.src = "https://hm.baidu.com/hm.js?50f3347ce318df3cd25f2d8ffcf35273";
        //     var s = document.getElementsByTagName("script")[0];
        //     s.parentNode.insertBefore(hm, s);
        // })();

        /*  var _hmt = _hmt || [];
          (function() { var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?58446f09ab8c46a2ba431604d769c5ca";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
          })();*/
    </script>
    <script type="text/javascript" src="/jmeditor/JMEditor.js"></script>
</head>
<body>
<?php
$success_content = Yii::$app->session->get('success_content');
$loginOut        = Yii::$app->session->get('loginOut');
if ($success_content) {
    echo $success_content;
    Yii::$app->session->remove('success_content');
}
if ($loginOut) {
    echo $loginOut;
    Yii::$app->session->remove('loginOut');
}
?>
<div class="greyNav clearfix">
    <div class="inGrey clearfix">
        <div class="leftNav">
            <ul>
                <li>
                    <h1 title="雷哥GRE">
                        <a href="https://www.viplgw.cn" target="_blank">
                            <!-- <img src="https://gmat.viplgw.cn/app/web_core/styles/images/index_kevinIcon.png"
                                 alt="雷哥_GRE"> -->
                            雷哥网
                        </a>
                    </h1>
                </li>
                <li><a href="https://gmat.viplgw.cn/" target="_blank">GMAT</a></li>
                <li><a href="/" class="on" target="_blank">GRE</a></li>
                <li><a href="https://toefl.viplgw.cn/" target="_blank">托福</a></li>
                <li><a href="https://ielts.viplgw.cn/" target="_blank">雅思</a></li>
                <li><a href="https://sat.viplgw.cn/" target="_blank">SAT</a></li>
                <li><a href="https://liuxue.viplgw.cn/" target="_blank">留学</a></li>
                <li><a href="https://words.viplgw.cn/" target="_blank">单词</a></li>
                <li><a href="https://liuxue.viplgw.cn/question-tag/0.html" target="_blank">留学问答</a></li>
                <li><a href="https://open.viplgw.cn" target="_blank">公开课</a></li>
                <li><a href="https://bbs.viplgw.cn" target="_blank">雷哥论坛</a></li>
                <li><a href="https://lgwcet.viplgw.cn/" target="_blank">四六级</a></li>
                <!-- <li><a href="https://class.viplgw.cn/studyGroup.html" target="_blank">雷哥备考</a></li> -->
                <!--                <li><a href="https://class.viplgw.cn/" target="_blank">课程商城</a></li>-->
                <li class="phone"><span>400-1816-180</span></li>
                <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2095453331&site=qq&menu=yes">在线咨询</a></li>
            </ul>
        </div>

        <div class="rightLogin">
            <!--未登录显示-->
            <?php
            if (!$userId) {
                ?>
                <div class="loginBefore">
                    <input type="button" value="登录" onclick="userLogin()">
                    <input type="button" value="注册" onclick="userRegister()">
                </div>
                <?php
            } else {
                ?>
                <!--登录之后显示-->
                <div class="loginAfter">
                    <div class="whiteDiv"><img
                                src="<?php echo (isset($userData['image']) && $userData['image']) ? $userData['image'] : '/cn/images/details_defaultImg.png' ?>"
                                alt="用户头像"></div>
                    <div class="clearB"></div>
                    <!--                    下拉-->
                    <div class="xiala-con">
                        <ul>
                            <li>
                                <input type="hidden" id="userId" value="115"/>
                                <div class="new-gre-user-img">
                                    <img
                                    src="<?php echo (isset($userData['image']) && $userData['image']) ? $userData['image'] : '/cn/images/details_defaultImg.png' ?>"
                                    alt="用户头像">
                                </div>
                                <div class="new-gre-user-mes">
                                    <p class="userName_n"><?php echo isset($userData['nickname']) ? $userData['nickname'] : $userData['nickname'] ?></p>
                                    <p><?php echo $level ?></p>
                                </div>
                            </li>
                            <li>
                                <a href="/user.html">个人中心</a>
                            </li>
                            <li>
                                <a href="/user/order-0.html">已购课程</a>
                            </li>
                            <li>
                                <a href="/user/se-0/so-0/l-0/st-0/t-0.html">做题记录</a>
                            </li>
                            <li>
                                <a href="/mock_record.html">模考记录</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="loginOut()">安全退出</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <?php
            }
            ?>
            <!--登录之后显示 end-->
        </div>
        <!--        app下载-->
        <div class="appDownload">
            <span title="app下载" class="tit_t"><b>HOT</b>APP下载</span>
            <div class="pull_down">
                <ul>
                    <li>
                        <a href="https://gmat.viplgw.cn/DownloadApp.html">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/gmatapp_logo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥GMAT</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/gmat.jpg"
                                 alt="app二维码图片"/>
                        </div>
                    </li>
                  <!--  <li>
                        <a href="https://gmat.viplgw.cn/DownloadApp.html">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/gmatapp_logo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥GMAT安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/leige-android.png"
                                 alt="app二维码图片"/>
                        </div>
                    </li>-->
                    <li>
                        <a href="https://gre.viplgw.cn/tool.html">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/gmatapp_logo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥GRE</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/gre.jpg"
                                 alt="app二维码图片"/>
                        </div>
                    </li>
                 <!--   <li>
                        <a href="https://gre.viplgw.cn/tool.html">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/gmatapp_logo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥GRE苹果版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/new_gre/ios_gre_app.png"
                                 alt="app二维码图片"/>
                        </div>
                    </li>-->
                    <li>
                        <a href="https://toefl.viplgw.cn/toefl_app.html">
                            <div class="first_layer">
                                <img src="https://toefl.viplgw.cn/cn/images/toeflapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥托福</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/toefl.png" alt="app二维码图片"/>
                        </div>
                    </li>
                   <!-- <li>
                        <a href="https://toefl.viplgw.cn/toefl_app.html">
                            <div class="first_layer">
                                <img src="https://toefl.viplgw.cn/cn/images/toeflapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥托福安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="https://toefl.viplgw.cn/cn/images/app-android.png" alt="app二维码图片"/>
                        </div>
                    </li>-->
                    <li>
                        <a href="https://sat.viplgw.cn">
                            <div class="first_layer">
                                <img src="/cn/images/SAT_logo.png" alt="app logo图标"/>
                                <span>雷哥SAT安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/SAT_QR.png" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <a href="https://liuxue.viplgw.cn/app.html">
                            <div class="first_layer">
                                <img src="https://liuxue.viplgw.cn/cn/images/smart-appLogo.png" alt="app logo图标"/>
                                <span>雷哥选校</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/school.jpg" alt="app二维码图片"/>
                        </div>
                    </li>
                <!--    <li>
                        <a href="https://liuxue.viplgw.cn/app.html">
                            <div class="first_layer">
                                <img src="https://liuxue.viplgw.cn/cn/images/smart-appLogo.png" alt="app logo图标"/>
                                <span>雷哥选校安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="https://liuxue.viplgw.cn/cn/images/anroid-smartapp.png" alt="app二维码图片"/>
                        </div>
                    </li>-->
                    <li>
                        <a href="https://words.viplgw.cn/" target="_blank">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images/words-iosLogo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥单词</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/word.jpg" alt="app二维码图片"/>
                        </div>
                    </li>
                <!--    <li>
                        <a href="https://words.viplgw.cn/" target="_blank">
                            <div class="first_layer">
                                <img src="https://gmat.viplgw.cn/app/web_core/styles/images/words-iosLogo.jpg"
                                     alt="app logo图标"/>
                                <span>雷哥单词安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/word_android.png" alt="app二维码图片"/>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>
        <!--        app下载 end-->
        <div class="clearBr"></div>
    </div>
</div>

<!--导航栏-->
<?php if ($this->context->type != 1) {
    ?>
    <link rel="stylesheet" href="/cn/css/common_index.css?v=v=1.01010101.2">
    <div class="nav-wrap">
        <div class="nav_list tl clearfix">
            <div class="nav2_fl fl">
                <div class="relative logo_wrap inb">
                    <a href="/">
                        <img src="/cn/images/gre-logo.png" style="width: 150px;" alt="雷哥GRE培训官网"/>
                    </a>
                </div>
                <ul class="inb tm nav_bar clearfix">
                    <li class="<?php if ($this->context->type == 1) {
                        echo 'on';
                    } ?> bar-li"><a href="/">首页</a></li>
                    <!--                    <li class="--><?php //if ($this->context->type == 9) {
                    //                        echo 'on';
                    //                    } ?><!-- bar-li">-->
                    <!--                        <a href="/know.html">知识库-->
                    <!--                            <img src="/cn/images/gre_index/gmat-hot.png" alt="hot"-->
                    <!--                                 class="hotImg"/>-->

                    <!--                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"-->
                    <!--                                 alt="箭头">-->
                    <!--                        </a>-->
                    <!--                        <div class="nav2-wrap" style="width: 100px;">-->
                    <!--                            <ul class="nav2-list">-->
                    <!--                                <li><a href="/words.html">背单词</a></li>-->
                    <!--                                <li><a href="/know.html">知识讲堂</a></li>-->
                    <!--                            </ul>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                    <li class="<?php if ($this->context->type == 7) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/practice.html">
                            做题模考
                            <img src="/cn/images/gre_index/gmat-hot.png" alt="hot"
                                 class="hotImg"/>
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 130px;">
                            <ul class="nav2-list">
                                <li><a href="/search.html">在线搜题</a></li>
                                <li><a href="/practice.html">在线做题</a></li>
                                <li class="relative">
                                    <a href="/mockExam.html">在线模考</a>
                                </li>
                                <li class="relative">
                                    <a href="/evaluation.html">智能测评</a>
                                </li>
                                <li class="relative"><a href="/words.html">背单词</a></li>
                                <li class="relative"><a href="/know.html">知识讲堂</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 8) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/presentation.html">做题报告
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 90px;">
                            <ul class="nav2-list">
                                <li><a href="/presentation.html">全科报告</a></li>
                                <li><a href="/report/dx-1.html">填空报告</a></li>
                                <li><a href="/report/dx-2.html">阅读报告</a></li>
                                <li><a href="/report/dx-3.html">数学报告</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 3) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/course.html">GRE课程
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 110px;">
                            <ul class="nav2-list">
                                <li><a href="/course.html">在线课程</a></li>
                                <li><a href="/activity.html">刷题活动</a></li>
                                <li><a href="/course/8295.html">寒暑假封闭班</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 10) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/teacher_article.html">名师专栏
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 110px;">
                            <ul class="nav2-list">
                                <li><a href="/teacher_article.html">经验技巧</a></li>
                                <li><a href="/teacher_article.html">要点解读</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 5) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/beikao.html">备考心经
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                            <img class="crow-1" src="https://liuxue.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 150px;">
                            <ul class="nav2-list">
                                <li><a href="/beikao/539.html">GRE填空TC&SE</a></li>
                                <li><a href="/beikao/540.html">GRE逻辑阅读RC</a></li>
                                <li><a href="/beikao/541.html">GRE数学Quant</a></li>
                                <li><a href="/beikao/538.html">GRE词汇Vocab</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bar-li">
                        <a target="_blank" href="https://bbs.viplgw.cn/post/list/41.html#41">真题机经
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 110px;">
                            <ul class="nav2-list">
                                <li><a target="_blank" href="https://bbs.viplgw.cn/post/list/43.html">真题下载</a></li>
                                <li><a target="_blank" href="https://bbs.viplgw.cn/post/list/43.html">机经下载</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 6) {
                        echo 'on';
                    } ?> bar-li">
                        <a href="/information.html">热点专题
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 100px;">
                            <ul class="nav2-list">
                                <li><a href="https://gre.viplgw.cn/information.html">热点资讯</a></li>
                                <li><a href="/beikao/544.html">GRE百科</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($this->context->type == 11) {
                        echo 'on';
                    } ?> bar-li"><a href="/teacher.html">GRE名师</a></li>
                    <li class=" bar-li"><a href="http://question.viplgw.cn/gre.html" target="_blank">智能问答</a></li>
                </ul>
            </div>
            <div class="search-wrap fr">
                <input type="search" name="keywords" id="keyword" onkeydown="searchs(event);" placeholder="搜索"
                       class="navSearch searchInput search_int"
                       value="<?php echo isset($_GET['words1']) ? $_GET['words1'] : ''; ?>">
                <div class="search_btn inb tm"><img src="/cn/images/beikao/beikao-fangdajing.png" alt="搜索图标"
                                                    onclick="searchGoods(this)"/></div>
            </div>
        </div>
    </div>
    <?php
}
?>
<!--导航栏 END-->
<?= $content ?>
<!----------------------尾部----------------------------->
<!--footer-->
<div id="footer_nav">
    <div>
        <span>友情链接：<a href="http://www.ets.org/gre" target="_blank">The GRE Tests</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://gmatonline.taobao.com/category-1373428283.htm?spm=a1z10.1-c-s.w5002-12118475574.3.9a72287f172BiW&search=y&catName=%C0%D7%B8%E7GRE%BF%CE%B3%CC"
               target="_blank">雷哥GRE淘宝店</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://gre.etest.net.cn/login.do" target="_blank">教育部考试中心GRE考试报名网</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.zhihu.com/org/lei-ge-gre-26/activities"
                                       target="_blank">雷哥GRE知乎</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.thinkwithu.com" target="_blank">申友网</a>
        </span>
    </div>
</div>
<div class="gre-foot">
    <div class="in-gre-f">
        <div class="in-gre-left">
            <ul>
                <li>
                    <h4>关于GRE</h4>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'url,answer', 'category' => '557', 'page' => 1, 'pageSize' => 7]);
                    foreach ($data as $v) {
                        ?>
                        <a href="<?php echo $v['url'] ?>"><?php echo $v['name'] ?></a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
            <ul>
                <li>
                    <h4>关于课程</h4>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'url,answer', 'category' => '558', 'page' => 1, 'pageSize' => 7]);
                    foreach ($data as $v) {
                        ?>
                        <a href="<?php echo $v['url'] ?>"><?php echo $v['name'] ?></a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
            <ul>
                <li>
                    <h4>联系我们</h4>
                    <a href="#">
                        <img src="/cn/images/gre-weChat.png" alt="图标">
                        <span class="fth_name">微信</span>
                        <div class="fth_img"><img src="/cn/images/ftHover_img3.png" alt=""></div>
                    </a>
                    <a href="#">
                        <img src="/cn/images/gre-weibo.png" alt="图标">
                        <span class="fth_name">微博</span>
                        <div class="fth_img"><img src="/cn/images/ftHover_img2.png" alt=""></div>
                    </a>
                    <a href="#">
                        <img src="/cn/images/gre-email.png" alt="图标">
                        <span class="fth_name">邮箱</span>
                        <div class="fth_img"><img src="/cn/images/ftHover_img1.png" alt=""></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="in-gre-right clearfix">
            <div class="fl" style="width: 120px"><img src="/cn/images/ftHover_img3.png" alt=""></div>
            <div class="fr" style="padding-top: 7px;">
                <img style="width: 200px;" src="/cn/images/gre-footLogo.png" alt="GRE培训"/>
                <p>高效提分，预见你想象的高分！</p>
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="gre-font-small">
            2018 gre.viplgw.cn All Rights Reserved
            <a class="mz_sm" target="_blank" href="http://beian.miit.gov.cn/publish/query/indexFirst.action">京ICP备16000003号-3</a>
            京公网安备11010802017681
            <a class="mz_sm" target="_blank" href="/about.html">免责声明</a>
            <div>雷哥GRE（gre.viplgw.cn），GRE培训|GRE考试|GRE在线课程|GRE网课|GRE机经真题_雷哥GRE培训官网
                本网站提供的OG&150真题&真题内容，其版权均为ETS所有，Please reference the OG。
                本网站中所提供的magoosh、Kaplan、princeton、NO、CQ、CHP、猴哥等题目内容来源互联网网友，仅供学习者交流免费使用。
                本网站所提供的知识库内容，部分来源于雷哥GRE整理发布，版权归greonline.cn所有，仅供学习者交流免费使用。部分来源于互联网，版权归原作者所有，仅供学习者交流免费使用。
                <div style="display: none;">
                    <!--                    百度商桥代码-->
                    <script type="text/javascript">
                        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F85e83d82fc02c204e3d0bb79d46ffa46' type='text/javascript'%3E%3C/script%3E"))
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!----------------------尾部  end----------------------------->
<script type="text/javascript">
    $(function () {
        $('.navSearch').focus(function () {
            $(this).stop(true).animate({
                width: 180
            }, (200))
        });
        $('.navSearch').blur(function () {
            $(this).stop(true).animate({
                width: 70
            }, (200))
        })
    });

    function searchGoods() {
        var content = $('#keyword').val();
        if (content == '') {
            alert('请输入关键词');
            return false;
        } else {
            location.href = "/search/sectionId-0/source-0/level-0/select-0/type-0/page-1.html?words1=" + content;
        }
    }

    function searchs(e) {
        if (e.keyCode == 13) {
            searchGoods();
        }
    }

    /**
     * 用户退出
     */
    function loginOut() {

        $.ajax({
            url: 'https://login.viplgw.cn/cn/ssl-api/web-login-out',
            type: 'POST',
            dataType: "json",
            xhrFields: {
                withCredentials: true
            },
            // crossDomain: true
            success: function (data) {
                // console.log('data', data);
                window.location.reload();
                //
            },
            error: function () {
                window.location.reload();
            }
        });

        /*   $.post('https://login.viplgw.cn/cn/ssl-api/web-login-out', {}, function (re) {
               window.location.href = "/"
           }, 'json')*/
    }

    /**
     * 登录框
     */
    function userLogin() {
        location.href = "https://login.viplgw.cn/cn/index?source=22&url=<?php echo Yii::$app->request->hostInfo . Yii::$app->request->getUrl()?>"
    }

    /**
     * 注册框
     */
    function userRegister() {
        location.href = "https://login.viplgw.cn/cn/index/register?source=22&url=<?php echo Yii::$app->request->hostInfo . Yii::$app->request->getUrl()?>"
    }
</script>
<!-------------------咨询框------------------------>
<div class="refer_small" style="display: block" onclick="showZiXun()">
    <!--    <img src="/cn/images/newyear_refer/lx_pic_1.png">-->

</div>
<div class="referBox" style="display: none;">
    <div class="refer_close" onclick="closeRefer()"></div>
    <div class="refer_top"></div>
    <div class="refer_con">
        <ul>
            <li>
                <a href="<?php echo Yii::$app->params['navUrl']; ?>" target="_blank">
                    <div class="comSize diffBG01"></div>
                    <p>在线咨询</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG02"></div>
                    <p>微信</p>
                    <div class="tanc_mask01 animated"><img src="/cn/images/lindy-wechat.jpg" alt="二维码图片"></div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG03"></div>
                    <p>QQ</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG04"></div>
                    <p>电话</p>
                    <div class="tanc_mask02 animated">400-1816-180</div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG05"></div>
                    <p>吐槽入口</p>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" onclick="referTop();">
                    <div class="diffBG06 animated">
                        <img src="/cn/images/refer_icon06.png" alt="回到顶部图标"/>
                    </div>
                </a>
            </li>
            <!--<li style="padding-bottom: 10px">
                <a href="javascript:void(0);" onclick="referTop();">
                    <div class="diffBG06 animated">
                        <img src="/cn/images/newyear_refer/tu-1/down.png" alt="回到顶部图标"/>
                    </div>
                </a>
            </li>-->
        </ul>
    </div>
</div>

</body>
</html>
