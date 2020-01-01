<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>备考故事详情</title>
    <script src="/cn/js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="/cn/css/article_detail.css">
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
    function spotFine(contentid){
        $.ajax({
            url: "/cn/api/content-fabulous",
            type: "get",
            data: {
                contentId: contentid
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    var num = $("#fineNum").html();
                    num = parseInt(num)+1;
//                    console.log(num);return;
                    $("#fineNum").html(num)
                } else {
                    alert("点赞失败");
                }
            }
        });
    }
</script>
<body>

<div class="containers">

    <h3 class="title"><?php echo $data['name'] ?></h3>
    <div class="classmates-info clearfix">
        <div class="left">
            <p><label>姓名：</label><span><?php echo $data['answer'] ?></span></p>
            <p><label>出分时间：</label><span><?php echo $data['article'] ?></span></p>
            <p><label>考试次数：</label><span><?php echo $data['cnName'] ?>次</span></p>
        </div>
        <div class="left">
            <p><label>基础：</label><span><?php echo $data['alternatives'] ?></span></p>
            <p><label>班型：</label><span><?php echo $data['listeningFile'] ?></span></p>
            <p><label>分数：</label><span><?php echo $data['numbering'] ?></span></p>
        </div>
    </div>
    <div class="content">
       <?php echo $data['description'] ?>
        <img src="<?php echo $data['image'] ?>">
    </div>
    <div class="btn-group">
        <p class="give-like">
            <button onclick="spotFine(<?php echo $data['id'] ?>)"><img src="/cn/images/good_a.png"><span id="fineNum"><?php echo $data['fabulous'] ?></span>人点赞</button>
        </p>
    </div>
</div>

<p class="fenge"></p>
<div class="containers">
    <h4 class="tuijian">热门推荐</h4>
    <ul class="tuijian-list ">
        <?php
        foreach($hots as $v) {
            ?>
            <li class="tuijian-item clearfix">
                <div class="left zhuti">
                    <p class="headline">
                        <a href="/share_article2.html?id=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a></p>

                    <p class="font-8 clearfix writer ">
                        <span class="left"><?php echo $v['answer'] ?></span>
                    <span class="left">
                      <?php echo $v['article'] ?>
                    </span>
                    </p>
                </div>
                <img class="right thumbnail" src="<?php echo $v['image'] ?>">
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<div class="footer clearfix">
    <img src="/cn/images/courseDe/greapp-logo.png" class="left">
    <div class="left des">
        <p class="m-0 gre-name">雷哥GRE APP</p>
        <p class="m-0 gre-des">免费做题模考，领雷豆</p>
    </div>
    <button class="right xiazai" onclick="jumpShop()">点击下载</button>
</div>
</body>
</html>