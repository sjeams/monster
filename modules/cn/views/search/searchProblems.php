<link rel="stylesheet" href="/cn/css/searchproblem.css?v=1.01010101">
<script src="/cn/js/ResizeSensor.min.js"></script>
<script src="/cn/js/theia-sticky-sidebar.js"></script>
</head>
<body>
<section id="searchProblem">
    <div class="w12">
        <!-- <div class="newAd_img">
            <?php
            //$res = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '590','order'=>' RAND()','page'=>1,'pageSize' => 1]);
            //foreach($res as $v) {
                ?>
                <a href="<?php //echo $v['answer'] ?>"><img src="<?php //echo $v['image'] ?>" alt="banner"></a>
                <?php
            //}
            ?>
            <img src="/cn/images/gre_closeB.png" alt="关闭图标" class="close-icon" onclick="hideBanner()"/>
        </div> -->
        <!--新版搜索框-->
        <div id="searchWrap" class="flex-container-center">
            <div class="new-gre-search-title-wrap">
                <span>雷哥GRE题库</span><span>我们不一样  考生可终身免费使用</span>
            </div>
            <div class="new-gre-serch-data">
                <div><span>题库总题数</span>&nbsp;&nbsp;<span><?php echo $library['library']?></span></div>|
                <div><span>做题总数</span>&nbsp;&nbsp;<span><?php echo $library['libraryQues']?></span></div>|
                <div><span>平均每天做题人数</span>&nbsp;&nbsp;<span><?php echo ($library['averUser'] + 1314)?></span></div>
            </div>
            <div class="searchInt_wrap">
                <input class="searchInt" type="search" onkeydown="keydownSearch(event);" placeholder="输入题干关键词如“The survey showed that children···”或题目来源“Magoosh”" value="<?php echo @$_GET['words1']; ?>">
                <div id="search_btn" onclick="searchKeywords();" class="inm" title="搜索"><img src="/cn/images/searchproblem/search_icon.png" alt=""></div>
            </div>
        </div>
        <!--内容模块-->
        <div class="clearfix" id="searchContent" style="padding-top: 20px;">
            <div class="left_wrap fl">
                <!--搜索框-->
                <!-- <div id="searchWrap" class="flex-container relative">
                    <div class="searchInt_wrap">
                        <input class="searchInt" type="search" onkeydown="keydownSearch(event);" placeholder="搜题" value="<?php //echo !empty($_GET['words1'])?$_GET['words1']:'' ?>">
                        <div id="search_btn" onclick="searchKeywords();" class="inm" title="搜索"><img src="/cn/images/searchproblem/search_icon.png" alt=""></div>
                    </div>
                    <img class=" sr2_img" src="/cn/images/searchproblem/sr2_img.png" alt="">
                </div> -->
                <div id="tagCheck" class="bg_f clearfix">
                    <div class="big_tag clearfix">
                        <div class="child_tag_name fl">科目分类：</div>
                        <div class="child_tag_list fl clearfix">
                            <a href="/search/sectionId-0/source-0/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(empty($_GET['sectionId'])){ ?>class="on" <?php } ?>>全部</a>
                            <a href="/search/sectionId-1/source-0/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(isset($_GET['sectionId']) && $_GET['sectionId']==1){ ?>class="on" <?php } ?>>填空</a>
                            <a href="/search/sectionId-2/source-0/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(isset($_GET['sectionId']) && $_GET['sectionId']==2){ ?>class="on" <?php } ?>>阅读</a>
                            <a href="/search/sectionId-3/source-0/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(isset($_GET['sectionId']) && $_GET['sectionId']==3){ ?>class="on" <?php } ?>>数学</a>
                        </div>
                    </div>
                    <div class="child_tag clearfix">
                        <div class="child_tag_name fl">题目来源：</div>
                        <div class="child_tag_list fl clearfix ques-source-wrap">
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-0/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(empty($_GET['sourceId'])){ ?>class="on" <?php } ?>>全部</a>
                            <?php
                            foreach($sources as $v) {
                                ?>
                                <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo $v['id'] ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(isset($_GET['sourceId']) && $_GET['sourceId']==$v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                <?php
                            }
                            ?>
                            <div class="see-more-ques" onclick="see_more_ques(this)"><span>展开</span><i></i></div>
                            <script>
                                function  see_more_ques(_this) {
                                    if($(_this).find('span').text() == '展开'){
                                        $(_this).find('span').text('收起')
                                        $(_this).find('i').css({'transform': 'rotate(180deg)'})
                                        $('.ques-source-wrap').animate({
                                            height: '100%',
                                        },500)
                                    } else {
                                        $(_this).find('span').text('展开')
                                        $(_this).find('i').css({'transform': 'rotate(0deg)'})
                                        $('.ques-source-wrap').animate({
                                            height: '70px',
                                        },500)
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <div class="child_tag clearfix">
                        <div class="child_tag_name fl">题目难度：</div>
                        <div class="child_tag_list fl clearfix">
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-0/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(empty($_GET['levelId'])){ ?>class="on" <?php } ?>>全部</a>
                            <?php
                            foreach($levels as $v) {
                                ?>
                                <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo $v['id'] ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html" <?php if(isset($_GET['levelId']) && $_GET['levelId']==$v['id']){ ?>class="on" <?php } ?>><?php echo $v['name'] ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="child_tag clearfix">
                        <div class="child_tag_name fl">做题情况：</div>
                        <div class="child_tag_list fl clearfix">
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-0/page-1.html" <?php if(empty($_GET['type'])){ ?>class="on" <?php } ?>>全部</a>
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-1/page-1.html" <?php if(isset($_GET['type']) && $_GET['type']==1){ ?>class="on" <?php } ?>>做过</a>
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-2/page-1.html" <?php if(isset($_GET['type']) && $_GET['type']==2){ ?>class="on" <?php } ?>>正确</a>
                            <a href="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-3/page-1.html" <?php if(isset($_GET['type']) && $_GET['type']==3){ ?>class="on" <?php } ?>>错误</a>
                        </div>
                    </div>
                </div>
                <div class="list_wrap bg_f">
                    <dl class="problem_list">
                        <?php
                        if($data['data']){
                        foreach($data['data'] as $v){
                        ?>
                        <dt>
                            <a href="/question/<?php echo $v['id'] ?>.html" target="_blank">
                                <div class="pn_wrap clearfix">
                                    <div class="new-gre-ques-wrap-list-box-top">
                                        <div class="ellipsis  problem_name">【<?php echo $v['section'] ?> <?php echo $v['source']['name'] ?>-<?php echo $v['id'] ?>】</div>
                                        <div class="fr overWrap tm">
                                            <div class="userOver">
                                                <?php /*$v['doNum']*/$doNum = $v['id']*3;
                                                    $doNum = substr($doNum,0,3);
                                                    $doNum1 = substr($v['id'],-1);
                                                    if($doNum<100){
                                                        $doNum = $doNum*10;
                                                    }
                                                    if($doNum>500){
                                                        $doNum = $doNum/2;
                                                    }
                                                    $doNum = $doNum+$doNum1*3;
                                                    echo $doNum;
                                                ?>人已做
                                            </div>
                                            <span class="new-gre-line"></span>
                                            <div class="userXl">
                                                <?php  /*$v['correctRate']*/$coNum = $v['id']*3;
                                                    $coNum = substr($coNum,0,2);
                                                    $coNum1 = substr($v['id'],-1);
                                                    if($coNum<30){
                                                        $coNum = $coNum*2;
                                                    if($coNum<30){
                                                        $coNum = $coNum*3;
                                                    }
                                                    if($coNum<30){
                                                        $coNum = $coNum*2;
                                                    }
                                                    }
                                                    if($coNum>80){
                                                        $coNum = $coNum/2;
                                                    }
                                                    $coNum = $coNum+$coNum1;
                                                    if($coNum>80){
                                                        $coNum = $coNum-10;
                                                    }
                                                    echo $coNum;
                                                ?>%正确率
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="ellipsis-2 fl problem_de"><?php echo $v['stem'] ?></div>
                                    </div>
                                </div>
                            </a>
                        </dt>
                        <?php
                        }
                        }
                        ?>
                    </dl>
                    <div class="pageSize_wrap tm">
                        <!-- <div class="prev"><img src="/cn/images/new_gre/menu_right.png"></div> -->
                        <ul class="pageSize inm clearfix">
                            <?php echo $data['pageStr'] ?>
                        </ul>
                        <!-- <div class="next"><img src="/cn/images/new_gre/menu_right.png"></div> -->
                    </div>
                </div>
            </div>
            <div class="right_wrap fr">
                <div class="right_tit">
                    <span class="rt_name">最新题目讨论</span>
                </div>
                <div class="txtMarquee-top clearfix bg_f">
                    <ul class="right_list_tl ">
                        <?php
                        foreach($newQuestions as $v) {
                            ?>
                            <li>
                                <a href="/question/<?php echo $v['id'] ?>.html" target="_blank">
                                    <div>
                                        <div class="rt_list_name_wrap">【<span class="ellipsis inm rt_list_name"><?php echo $v['section'] ?>  <?php echo $v['source']['alias'] ?>-<?php echo $v['id'] ?></span>】
                                        </div>
                                        <p class="rt_de ellipsis-2"><?php echo $v['stem'] ?></p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div><a href="#" target="_blank"><img src="/cn/images/searchproblem/ad_bt.png" alt=""></a></div>
            </div>
        </div>
    </div>
    <!-- 吸顶搜索框 -->
    <div class="sticky-search-box">
        <div class="searchInt_wrap sticky-search">
            <input class="searchInt sticky-searchInt" type="search" onkeydown="sticky_keydownSearch(event);" placeholder="输入题干关键词如“The survey showed that children···”或题目来源“Magoosh”" value="<?php echo @$_GET['words1']; ?>">
            <div id="search_btn" onclick="sticky_searchKeywords();" class="inm" title="搜索">搜索题目</div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).on('click', '.iPage', function () {

        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        var page = $('.pageSize_wrap').find('.on').html();
        location.href ="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-"+page+".html<?php echo isset($_GET['words1'])?'?words1='.$_GET['words1']:''?>";
    });
    $(document).on('click', '.prev', function () {

        var page = $('.pageSize_wrap').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        location.href ="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-"+page+".html<?php echo isset($_GET['words1'])?'?words1='.$_GET['words1']:''?>";
    });
    $(document).on('click', '.next', function () {

        var page = $('.pageSize_wrap').find('.on').html();
        if(page == <?php echo $data['total']?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        location.href ="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-"+page+".html<?php echo isset($_GET['words1'])?'?words1='.$_GET['words1']:''?>";
    })
</script>
<script>
    $(function () {
        $('.left_wrap,.right_wrap').theiaStickySidebar();
        jQuery(".txtMarquee-top").slide({
            mainCell: ".right_list_tl",
            autoPlay: true,
            effect: "topMarquee",
            vis: 7,
            interTime: 50,
            trigger: "click"
        });
//        标签选择
        $('.child_tag_list span,.big_tag span').click(function () {
            $(this).addClass('on').siblings('span').removeClass('on');
        })
    });

    //文字搜索高亮
    $(function(){
        var key_word = $(".searchInt").val(); //获取搜索关键词
        if(key_word){
            $(document).scrollTop(550)
        }
        var regExp = new RegExp(key_word, 'ig');//正则表达式方法，完全匹配对应的关键字，忽略大小写
        var article_list = $(".problem_de").toArray();//所有文本
        for(var i = 0;i < article_list.length;i++){
            var article = article_list[i].innerHTML
            //判断是否进行搜索操作
            if(key_word){
                var all_value = article.match(regExp)
                //判断是否有匹配成功的字符串，成功操作
                if(all_value){
                    for(var j = 0;j < all_value.length;j++){
                        article = article.replace(all_value[j],j)
                    }
                    for(var k = 0;k < all_value.length;k++){
                        article = article.replace(k,`<span style="color:#FF4242;">${all_value[k]}</span>`)
                    }
                    article_list[i].innerHTML = article
                }
            }
        }
    })
    function searchKeywords(){
        // console.log($('.searchInt'))
        var content = $('.searchInt').val();
        if(content == '') {
            content = '';
        } else { //将所需高亮的词存入session
            // sessionStorage.setItem("high_keyWords",content)
        }
        location.href ="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html?words1="+content;
    }
    function keydownSearch(e){
        if(e.keyCode==13){
            searchKeywords();
        }
    }
    //悬浮搜索框搜索
    function sticky_searchKeywords(){
        var content = $('.sticky-searchInt').val();
        // console.log(content)
        if(content == '') {
            content = '';
        } else { //将所需高亮的词存入session
            // sessionStorage.setItem("high_keyWords",content)
        }
        location.href ="/search/sectionId-<?php echo isset($_GET['sectionId'])?$_GET['sectionId']:0 ?>/source-<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:0 ?>/level-<?php echo isset($_GET['levelId'])?$_GET['levelId']:0 ?>/select-<?php echo isset($_GET['words'])?$_GET['words']:0 ?>/type-<?php echo isset($_GET['type'])?$_GET['type']:0 ?>/page-1.html?words1="+content;
    }
    function sticky_keydownSearch(e){
        if(e.keyCode==13){
            sticky_searchKeywords();
        }
    }
    function hideBanner() {
        $(".newAd_img").slideUp();
    }
    // 搜索框吸顶
    $(window).scroll(function(){
        // 当滚动条高度距离大于页面搜索距离时，出现吸顶搜索框
        if($(document).scrollTop() > 375){
            $(".sticky-search-box").show()
        } else {
            $(".sticky-search-box").hide()
        }
    })
</script>
