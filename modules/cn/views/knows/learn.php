<link rel="stylesheet" href="/cn/css/know/knowledge-details.css">
<link rel="stylesheet" href="/cn/css/font-awesome.css">
<body>
<div class="knowDetail">
    <div class="knowD-left">
        <div class="leftSort01">
            <h1><?php echo $data['name'] ?></h1>
            <div class="bshare-custom">
                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                <a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
                <a title="分享到QQ空间" class="bshare-qzone" href="javascript:void(0);"></a>
                <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
            </div>
            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=0a13f29f-a6de-4905-9fd0-2a39d906a0ef&amp;style=10&amp;bgcolor=Orange&amp;ssc=false&amp;pophcol=1"></script>
            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
            <div class="rightNum"><span><?php echo $data['viewCount'] ?></span>人学习</div>
            <div class="xian"></div>
            <div class="showFont">
                <?php echo $data['description'] ?>
            </div>
        </div>
    </div>
    <div class="knowD-right">
        <div class="rightSort01">
            <img src="/cn/images/know_startIcon.png" alt="图标">
            <a href="/know/<?php echo isset($_GET['catId'])?$_GET['catId']:'569' ?>.html">返回知识点</a>
        </div>
        <div class="rightSort02">
            <h4>
                <img src="/cn/images/know_dengIcon.png" alt="知识点图标"/>
                本章相关知识点</h4>
            <ul>
                <?php
                foreach($relevant as $v) {
                    ?>
                    <li><a href="/knowDetail/d-<?php echo $v['id'] ?>-<?php echo isset($_GET['catId'])?$_GET['catId']:'569' ?>.html">● <?php echo $v['name'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
