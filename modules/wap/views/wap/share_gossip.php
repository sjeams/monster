<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>吐槽详情</title>
    <script src="/cn/js/jquery-1.9.1.min.js"></script>
    <link href="/cn/css/article_detail.css" rel="stylesheet">
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
<div class="containers post">
    <div class="author-info clearfix">
        <img src="<?php echo !empty($data['editUser']['image'])?$data['editUser']['image']:'/cn/images/details_defaultImg.png' ?>">
        <span class="left"><?php echo isset($data['editUser']['nickname'])?$data['editUser']['nickname']:'' ?></span>
        <span class="right"><?php echo $data['alternatives'] ?></span>
    </div>
    <h3 class="title"><?php echo $data['title'] ?></h3>
    <div class="content">
        <p> <?php echo $data['content'] ?></p>
        <ul class="img-list clearfix">
            <?php
            if($data['image']) {
                foreach ($data['image'] as $v) {
                    ?>
                    <li><img src="https://gre.viplgw.cn<?php echo $v ?>"></li>
                    <?php
                }
            }
            ?>

        </ul>
    </div>
    <div class="clearfix view-num">
        <span class="left"><?php echo $data['viewCount'] ?>次浏览</span>
        <span class="right like-num"  onclick="jumpShop()"><img src="/cn/images/good_a.png"><?php echo $data['likeNum'] ?></span>
    </div>

</div>
<p class="fenge"></p>
<div class="containers">
    <div class="reply">
        <h4 class="tuijian">全部回复</h4>
        <ul class="reply-list m-0">
            <?php
            if($comment) {
                foreach ($comment as $v) {
                    ?>
                    <li class="reply-item">
                        <div class="author-info clearfix">
                            <img src="https://gre.viplgw.cn<?php echo $v['image'] ?>" class="thumbnail">

                            <p class="user_name m-0"><?php echo $v['nickname'] ?>
                            </p>

                            <p class="clearfix view-num m-0">
                                <span class="left time"><?php echo $v['createTime'] ?></span>
                                <span class="right like-num" onclick="jumpShop()"><img
                                        src="/cn/images/good_a.png"><?php echo $v['fine'] ?></span>
                            </p>
                        </div>
                        <div class="reply-main">
                            <div class="reply-details">
                                <p> <?php echo $v['content'] ?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
<div class="footer clearfix">
    <img src="/cn/images/courseDe/greapp-logo.png" class="left">
    <div class="left des">
        <p class="m-0 gre-name">雷哥GRE APP</p>
        <p class="m-0 gre-des">免费做题模考，领雷豆</p>
    </div>
    <button class="right xiazai"  onclick="jumpShop()">点击下载</button>
</div>
</body>
</html>