<?php
$userData = Yii::$app->session->get('userData');
if ($userData) {
    $userData = \app\modules\cn\models\User::find()->asArray()->where("id={$userData['id']}")->one();
}
?>
<link rel="stylesheet" href="/cn/css/gre_index.css?v=1.01010101">
<script>
    var regExp = new RegExp("http://", 'g');
    $('body')[0].innerHTML = $('body')[0].innerHTML.replace(regExp, 'https://');

    if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
        window.location.href = 'https://mgre.viplgw.cn/#/'
    }
</script>
<!-- vip广告 -->
<div class="anne-vip">
    <a href="https://class.viplgw.cn/vip.html"
       style="background:url('/cn/images/new_gre/vip_banner/ad_pic.png') no-repeat center;background-size:100% 100%;"></a>
    <b onclick="close_vip()"></b>
</div>
<!--导航栏-->
<div class="nav-wrap">
    <div class="anne-outBox new-gre-nav">
        <div class="relative logo_wrap inb fl">
            <a href="/">
                <img src="/cn/images/gre_index/newlogo_3.png" alt="logo_图标"/>
            </a>
        </div>
        <div class="nav_list tl">
            <!-- <div class="kexue_left fl">
                <img src="/cn/images/gre_index/gmat-navIcon01.png" alt="图标"/>
                <span>科学备考</span>
                <span>快捷提分</span>
            </div> -->
            <div class="nav2_fl fl">
                <ul class="inb tm nav_bar clearfix">
                    <li class="on bar-li"><a href="/">首页</a></li>
                    <!--                <li class="bar-li">-->
                    <!--                    <a href="/activity.html">知识库-->
                    <!--                        <img src="/cn/images/gre_index/gmat-hot.png" alt="hot"-->
                    <!--                             class="hotImg"/>-->

                    <!--                        <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"-->
                    <!--                             alt="箭头">-->
                    <!--                    </a>-->
                    <!--                    <div class="nav2-wrap" style="width: 100px;">-->
                    <!--                        <ul class="nav2-list">-->
                    <!--                            <li><a href="/words.html">背单词</a></li>-->
                    <!--                            <li><a href="/know.html">知识讲堂</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </li>-->
                    <li class=" bar-li">
                        <a href="/practice.html">做题模考
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
                                    <!--                                <div class="ani kfz_icon"><img src="/cn/images/searchproblem/kfz_icon.png" alt=""></div>-->
                                </li>
                                <li class="relative"><a href="/words.html">背单词</a></li>
                                <li class="relative"><a href="/know.html">知识讲堂</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class=" bar-li">
                        <a href="/presentation.html">做题报告
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 130px;">
                            <ul class="nav2-list">
                                <li><a href="/presentation.html">全科报告</a></li>
                                <li><a href="/report/dx-1.html">填空报告</a></li>
                                <li><a href="/report/dx-2.html">阅读报告</a></li>
                                <li><a href="/report/dx-3.html">数学报告</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class=" bar-li">
                        <a href="/course.html">GRE课程
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
                                 alt="箭头">
                        </a>
                        <div class="nav2-wrap" style="width: 110px;">
                            <ul class="nav2-list">
                                <li><a href="/course.html">在线课程</a></li>
                                <li><a href="/activity.html">刷题活动</a></li>
                                <li><a href="/course/8295.html">寒假封闭班</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class=" bar-li">
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
                    <li class=" bar-li">
                        <a href="/beikao.html">备考心经
                            <img class="crow-1" src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-1.png"
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
                    <li class=" bar-li">
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
                    <li class=" bar-li"><a href="/teacher.html">GRE名师</a></li>
                    <li class=" bar-li"><a href="http://question.viplgw.cn/gre.html" target="_blank">智能问答</a></li>
                </ul>
            </div>
        </div>
        <div class="search-box">
            搜索
        </div>
    </div>
    <div class="new-gre-search-wrap">
        <div class="search-wrap fl new-serch-wrap">
            <img src="/cn/images/gre_index/gmat-search.png" alt="搜索图标"/>
            <input type="text" name="keywords" id="keyword_2" placeholder="搜索GRE题目" class="searchInput search_int"
                   value="" onkeydown="searchs_index(event);">
            <div class="search_btn inb tm" onclick="searchGoods_index(this)">搜索</div>
            <div class="clearfix"></div>
            <p>热门搜索：如何备考GRE&nbsp;GRE填空&nbsp;GRE数学机经&nbsp;GRE模考</p>
        </div>
    </div>
    <script>
        function searchGoods_index() {
            var content = $('#keyword_2').val();
            console.log(content)
            if (content == '') {
                alert('请输入关键词');
                return false;
            } else {
                location.href = "/search/sectionId-0/source-0/level-0/select-0/type-0/page-1.html?words1=" + content;
            }
        }

        function searchs_index(e) {
            if (e.keyCode == 13) {
                searchGoods_index();
            }
        }

        //搜索button鼠标移入时出现搜索框
        $(".search-box").mouseenter(function () {
            $(".new-gre-search-wrap").animate({
                "height": "100px",
            }, 500)
        });
        // 离开搜索框，搜索框自动隐藏
        $(".new-gre-search-wrap").mouseleave(function () {
            $(".new-gre-search-wrap").animate({
                "height": 0,
            }, 500)
        })

        //关闭vip广告
        function close_vip() {
            $(".anne-vip").animate({
                "height": 0
            }, 500)
        }
    </script>
</div>

<div class="banner-wrap">
    <div class="w12 slideBox-1 relative new-banner">
        <div class="b1-hd ani">
            <ul></ul>
        </div>
        <div class="b1-bd new-banner new-gre-banner">
            <ul>
                <?php
                $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'url', 'category' => '551', 'page' => 1, 'pageSize' => 5]);
                foreach ($data as $v) {
                    ?>
                    <li>
                        <a href="<?php echo $v['url'] ?>" target="_blank"
                           style="background:url('https://gre.viplgw.cn/<?php echo $v['image'] ?>') no-repeat center;background-size:auto 100%;">
                            <!-- <img style="height: 100%;" src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                 alt="banner图"/> -->
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="new-gre-sidebar-box">
            <ul class="all-list ani">
                <?php
                foreach ($navigation as $key => $value) {
                    echo '<li class="a1-li">' .
                        '<a class="a1-tit relative" href="' . $value['url'] . '" style="font-weight: normal;">' . $value['name'] . ' <img class="crow-3 ani" src="/cn/images/gre_index/crow-3.png" alt=""></a>' . '
                            <ul class="a2-list ani">';
                    if (isset($value['childrens']) && is_array($value['childrens'])) {
                        foreach ($value['childrens'] as $k => $v) {
                            echo '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
                        }
                    }
                    echo '</ul>
                        </li>';
                }
                ?>
            </ul>
        </div>
        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <!-- <a class="prev" href="javascript:void(0)"></a>
        <a class="next ani" href="javascript:void(0)">
            <img src="https://gmat.viplgw.cn/app/web_core/styles/images-3/crow-4.png" alt="">
        </a> -->
    </div>
    <script>
        //        轮播
        $(".slideBox-1").slide({
            mainCell: ".b1-bd ul",
            titCell: ".b1-hd ul",
            effect: "leftLoop",
            autoPlay: true,
            autoPage: "<li></li>"
        });

    </script>
</div>
<section id="index" class="clearfix relative">
    <!-- 新版短期提分课程 -->
    <div class="w12" style="margin-bottom: 50px;">
        <div class="model_1 relative">
            <div class="relative">
                <div class="new-gre-title">
                    <h2>GRE短期提分课程</h2>
                    <p>名师在线课程，浸泡式封闭班，学管全程监督，轻松进阶330+</p>
                </div>
                <div class="new-gre-class-list">
                    <ul>
                        <li>
                            <div class="new-gre-class-img"><img src="/cn/images/new_gre/part_teach.png" alt=""></div>
                            <div class="min-title">名师方法梳理</div>
                            <p>搭建高效做题思维</p>
                            <p>实战常用逻辑梳理</p>
                            <p>打破原有阅读习惯</p>
                        </li>
                        <li>
                            <div class="new-gre-class-img"><img src="/cn/images/new_gre/part_book.png" alt=""></div>
                            <div class="min-title">题库逐点击破</div>
                            <p>全科考点系统训练</p>
                            <p>模考分析报告自查</p>
                            <p>高正确率做题演练</p>
                        </li>
                        <li>
                            <div class="new-gre-class-img"><img src="/cn/images/new_gre/part_test.png" alt=""></div>
                            <div class="min-title">独家真题解密</div>
                            <p>大神讲解独家真题</p>
                            <p>精析阅读关键信息</p>
                            <p>快速寻找核心信息</p>
                        </li>
                        <li>
                            <div class="new-gre-class-img"><img src="/cn/images/new_gre/part_run.png" alt=""></div>
                            <div class="min-title">考前冲刺答疑</div>
                            <p>核心考题重点精析</p>
                            <p>一对一答疑破瓶颈</p>
                            <p>考前短期高效提分</p>
                        </li>
                    </ul>
                </div>
                <div class="new-gre-more">
                    <a href="/course.html">全部课程</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 新版题库 -->
    <div class="new-gre-itemBank-big-wrap">
        <div class="new-gre-title">
            <h2>题库实时更新</h2>
            <p>网络最新GRE题目，及时了解新题考点</p>
        </div>
        <div class="new-gre-itemBank-min-wrap">
            <div class="new-gre-itemBank-list-wrap slide03">
                <div class="new-gre-itemBank-list-title new-gre-itemBank-list-title-question">最新题目</div>
                <div class="new-gre-itemBank-slide-wrap">
                    <ul class="new-gre-itemBank">
                        <?php
                        foreach ($newQuestions as $k => $v) {
                            if ($k < 10) {
                                ?>
                                <li class="new-gre-itemBank-list">
                                    <a href="/question/<?php echo $v['id'] ?>.html">
                                        <div>
                                            <?php if ($v['section'] && $v['source']) { ?>
                                                【<?php echo $v['section'] ?>】-<?php echo $v['source']['alias'] ?>
                                                -<?php echo $v['id'] ?>
                                            <?php } else { ?>
                                                <?php echo $v['id'] ?>
                                            <?php } ?>
                                        </div>
                                        <p><?php echo $v['stem'] ?></p>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(".slide03").slide({
                    mainCell: ".new-gre-itemBank-slide-wrap ul",
                    autoPlay: true,
                    effect: "topMarquee",
                    interTime: 50,
                    vis: 5,
                    autoPage: true
                });
            </script>
            <div class="new-gre-itemBank-list-wrap slide04">
                <div class="new-gre-itemBank-list-title new-gre-itemBank-list-title-topic">讨论最多题目</div>
                <div class="new-gre-itemBank-slide-wrap">
                    <ul class="new-gre-itemBank">
                        <?php
                        foreach ($most_question as $_k => $_v) {
                            if ($k > 10) {
                                ?>
                                <li class="new-gre-itemBank-list">
                                    <a href="/question/<?php echo $_v['id'] ?>.html">
                                        <div>
                                            【<?php echo $_v['section'] ?>】-<?php echo $_v['source']['alias'] ?>
                                            -<?php echo $_v['id'] ?>
                                        </div>
                                        <p><?php echo $_v['stem'] ?></p>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(".slide04").slide({
                    mainCell: ".new-gre-itemBank-slide-wrap ul",
                    autoPlay: true,
                    effect: "topMarquee",
                    interTime: 50,
                    vis: 5,
                    autoPage: true
                });
            </script>
        </div>
        <div class="new-gre-more">
            <a href="/search.html">全部题目</a>
        </div>
    </div>
    <!--新版备考-->
    <div class="new_model_3">
        <div class="w12">
            <div class="tm model_name_wrap new-gre-title" style="padding-top: 0;padding-bottom: 15px;">
                <h2>GRE备考</h2>
            </div>
            <ul class="bkTab tm new-bkTab">
                <li class="on">热门资讯</li>
                <li>词汇</li>
                <li>阅读</li>
                <li>填空</li>
                <li>数学</li>
                <li>写作</li>
            </ul>
            <div class="newModel_wrap ">
                <div class="bkItem_wrap ">
                    <div class="list  slide05">

                        <ul class="list_1 list1 tl new-tl test">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '543', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>
                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/information/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list  slide06">
                        <ul class="list_1 list2 tl new-tl test">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '543', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>
                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/information/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                    <script type="text/javascript">
                        jQuery(".slide05").slide({
                            mainCell: ".list1",
                            autoPlay: true,
                            effect: "topMarquee",
                            interTime: 50,
                            vis: 3,
                            autoPage: true
                        });
                        jQuery(".slide06").slide({
                            mainCell: ".list2",
                            autoPlay: true,
                            effect: "topMarquee",
                            interTime: 50,
                            vis: 3,
                            autoPage: true
                        });

                    </script>
                </div>
                <div class="bkItem_wrap ">
                    <div class="list slide05">
                        <ul class="list_1 list1 flexList tl new-tl test2">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '538', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>

                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list slide06">
                        <ul class="list_1 list2 flexList tl new-tl test2">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '538', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>
                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>


                </div>
                <div class="bkItem_wrap ">
                    <div class="list slide05">

                        <ul class="list_1 list1 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '540', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>

                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list slide06">
                        <ul class="list_1 list2 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '540', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>


                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="bkItem_wrap ">
                    <div class="list slide05">
                        <ul class="list_1 list1 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '539', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>

                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list slide06">
                        <ul class="list_1 list2 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '539', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>
                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="bkItem_wrap ">
                    <div class="list slide05">

                        <ul class="list_1 list1 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '541', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>

                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list slide06">

                        <ul class="list_1 list2 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '541', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>


                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="bkItem_wrap ">
                    <div class="list slide05">

                        <ul class="list_1 list1 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '542', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k < 4): ?>


                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list slide06">

                        <ul class="list_1 list2 flexList tl new-tl">
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives', 'category' => '542', 'page' => 1, 'pageSize' => 8, 'order' => 'alternatives desc']);
                            foreach ($data as $k => $v) {
                                ?>
                                <?php if ($k >= 4 && $k <= 7): ?>


                                    <li>
                                        <div class="small_img new-small-img"><img
                                                    src="https://gre.viplgw.cn/<?php echo $v['image'] ?>"
                                                    alt=""></div>
                                        <div class="small_info_wrap new-small-info-wrap">
                                            <h4 class="small_h1 new-small-h1">
                                                <a class="ellipsis"
                                                   href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                            </h4>
                                            <div class="small_info new-small-info">
                                                <span><?php echo date("Y-m-d", strtotime($v['alternatives'])) ?></span><span
                                                        class="small_line new-small-line">|</span><span>阅读（<?php echo $v['viewCount'] ?>）</span>
                                            </div>
                                            <p class="ellipsis small_de new-ellipsis"><?php echo $v['answer'] ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>


            </div>
            <div class="new-gre-more">
                <a href="/information.html">全部文章</a>
            </div>
        </div>
    </div>
    <!-- 新版雷哥GRE精准提分服务 -->
    <div class="new-gre-service">
        <div class="new-gre-title">
            <h2>雷哥GRE精准提分服务</h2>
        </div>
        <div class="new-service-list-wrap">
            <ul>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_a.png" alt=""></div>
                    <p>在线课程</p>
                </li>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_b.png" alt=""></div>
                    <p>在线做题</p>
                </li>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_c.png" alt=""></div>
                    <p>在线模考</p>
                </li>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_d.png" alt=""></div>
                    <p>在线答疑</p>
                </li>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_e.png" alt=""></div>
                    <p>社区辅导</p>
                </li>
                <li>
                    <div><img src="/cn/images/new_gre/bottom_f.png" alt=""></div>
                    <p>备考咨询</p>
                </li>
            </ul>
        </div>
    </div>

    <!-- <div class="model_2 relative">
        <div class="w12 relative">
            <div class="tm relative" style="z-index: 15;">
                <h3 class="model2_h1">名师方法+在线刷题<br>六大功能与服务，助你预见高分！</h3>
                <div><img src="/cn/images/gre_index/icon_item.png" alt=""></div>
                <div style="margin-top: -30px;"><img src="/cn/images/gre_index/item_hj.png" alt=""></div>
            </div>
        </div>
        <canvas id="GRE_ani" width="685" height="520"></canvas>
    </div>
    <div class="model_4">
        <div class="w12">
            <div class="register_enter flex-container-center clearfix">
                <div class="fl" style="margin-right: 70px"><img src="/cn/images/gre_index/gre_1.png" alt=""></div>
                <div class="fr tm">
                    <h3 class="bold_gre">来雷哥，我们帮你拿高分 </h3>
                    <p class="gre_de">全球已有<strong>10000+</strong>你的小伙伴加入雷哥GRE</p>
                    <div class="tm register_btn"><a class="inm" href="https://login.viplgw.cn/cn/index/register"
                                                    target="_blank">立即注册</a></div>
                </div>
            </div>
        </div>
    </div> -->
</section>
<!--五秒弹窗-->
<div class="fiveSecond-mask">
    <div class="five-m-in">
        <!--        关闭-->
        <div class="five-m-close" onclick="closeFiveSecond()">
            <img src="/cn/images/gre-maskClosk.png" alt="关闭图标"/>
            <span>关闭 ( <b id="five-s">5</b>s )</span>
        </div>
        <!--        右侧图片-->
        <div class="f-m-rimg">
            <img src="/cn/images/gre-maskCom.png" alt="文字图片"/>
        </div>
        <div class="five-content">
            <div class="f-c-title">离330更近一步！</div>
            <div>
                <img src="/cn/images/gre-maskTitle.png" alt="文字图片" width="470"/>
            </div>
            <div class="f-c-info">
                <ul>
                    <li>
                        <b>1</b>
                        <span>题源丰富：精选OG/150/大陆历/NO.题/Kaplan等真题</span>
                    </li>
                    <li>
                        <b>2</b>
                        <span>在线测评：不同基础测评题目，精准评分，智能给出复习规划</span>
                    </li>
                    <li>
                        <b>3</b>
                        <span>不同做题模式：分来源、单项、考点 针对练习</span>
                    </li>
                    <li>
                        <b>4</b>
                        <span>仿真考试：仿真实考试环境和做题模式</span>
                    </li>
                    <li>
                        <b>5</b>
                        <span>题目详析：题目解析全面，可参与讨论、备注做题笔记</span>
                    </li>
                    <li>
                        <b>6</b>
                        <span>做题报告：随最新做题情况变化，真实反映你的实际水平</span>
                    </li>
                </ul>
            </div>
            <div class="zuoti-btn">
                <a href="/practice.html">开始做题</a>
            </div>
        </div>
    </div>
</div>
<script>

    var num1 = 0;

    $('.bkTab li').click(function () {
        var num = $(this).index();

        if (num == 0) {
            $('.new-gre-more a').attr({"href": "/information.html"})
        } else {
            $('.new-gre-more a').attr({"href": "/beikao.html"})

        }

        num1 = num1 + 1;

        $(this).addClass('on').siblings('li').removeClass('on');
        $('.newModel_wrap .bkItem_wrap').eq(num).show().siblings('.bkItem_wrap').hide();
        $('.list ul').parent('div').removeClass('tempWrap');
        console.log('num1', num1);
        jQuery($('.newModel_wrap .bkItem_wrap').eq(num).children('.slide05')).slide({
            mainCell: $('.newModel_wrap .bkItem_wrap').eq(num).children('.list').children('.list1'),
            autoPlay: true,
            effect: "topMarquee",
            interTime: 50,
            vis: 3,
            autoPage: true
        });
        jQuery($('.newModel_wrap .bkItem_wrap').eq(num).children('.slide06')).slide({
            mainCell: $('.newModel_wrap .bkItem_wrap').eq(num).children('.list').children('.list2'),
            autoPlay: true,
            effect: "topMarquee",
            interTime: 50,
            vis: 3,
            autoPage: true
        });
    });
    $(function () {

        var fNum = localStorage.getItem("fiveMask");
        if (!fNum) {
            setTimeout(function () {
                localStorage.setItem("fiveMask", "true");
                $(".fiveSecond-mask").fadeIn();
                //        5秒关闭弹窗
                var s = $("#five-s").html();
                var timer = setInterval(function () {
                    s--;
                    $("#five-s").html(s);
                    if (s < 1) {
                        clearInterval(timer);
                        closeFiveSecond();
                        return false;
                    }
                }, 1000);
            }, 1000);
        }
    });
    // var canvas = document.getElementById("GRE_ani");
    // var ctx = canvas.getContext("2d");
    // var img = new Image();
    // img.src = "/cn/images/gre_index/canvas_img.png";
    // img.onload = function () {
    //     setInterval(function () {
    //         rotate(ctx)
    //     }, 100)
    // };

    // function rotate(ctx) {
    //     var x = canvas.width / 2; //画布宽度的一半
    //     var y = canvas.height / 2;//画布高度的一半
    //     ctx.clearRect(0, 0, canvas.width, canvas.height);//先清掉画布上的内容
    //     ctx.translate(x, y);//将绘图原点移到画布中点
    //     ctx.rotate(Math.PI / 360);//旋转角度
    //     ctx.translate(-x, -y);//将画布原点移动
    //     ctx.drawImage(img, 90, 10);//绘制图片
    // }

    function closeFiveSecond() {
        $(".fiveSecond-mask").fadeOut();
    }


    <!--用户第一次注册进入首页显示弹窗-->
    <?php
    if (isset($userData['newUser']) && $userData['newUser'] == 1) {
    \app\modules\cn\models\User::updateAll(['newUser' => 2], "id={$userData['id']}");
    ?>
    <
    div
    class
    = "newUser-mask" >
        < a
    href = "/practice.html" > < /a>
        < /div>
    <?php
    }
    ?>
</script>
