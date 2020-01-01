<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Title</title>
    <link rel="stylesheet" href="/cn/css/result-share.css">
</head>
<body>
<div class="content">

    <section>
        <p class="title m-0">
            <span class="title-name font-3 font-bold font-18 mr-5">本次得分</span>
            <span class="score font-pur font-bold font-16 mr-5"><?php echo $data['score']?></span>
            <span class="full-mark">(满分<?php if($type > 2) echo 340;else echo 170;?>分）</span>
        </p>
        <p class="range">
            <progress value="22" max="100"></progress>
        </p>

        <p class="des">
            模考共做题<?php if($type == 1)echo $correctMsg['verbal']['do'];elseif($type == 2) echo $correctMsg['quant']['do'];else echo $correctMsg['all']['do'];?>道，正确20道，正确率<?php if($type == 1)echo $correctMsg['verbal']['correctRate'];elseif($type == 2) echo $correctMsg['quant']['correctRate'];else echo $correctMsg['all']['correctRate']; ?>%
        </p>
        <div class="transcript">
            <?php if($type != 2){?>
            <div class="subject">
                <p class="font-16 mt-0">
                    <span class="mr-5 font-3 font-bold">语文得分</span>
                    <span class="font-pur"><?php if($type == 1) echo $data['score'];else echo $data['verbalScore'];?></span>
                </p>
                <p class="m-0 mb-5"><label>填空：</label><span class="font-pur"><?php echo $correctMsg['blank']['correct']?></span><span>/<?php echo $correctMsg['blank']['total']?>题，共做题<?php echo $correctMsg['blank']['do']?> 道，正确率<?php echo $correctMsg['blank']['correctRate']?>%</span></p>
                <p class="m-0 "><label>阅读：</label><span class="font-pur"><?php echo $correctMsg['read']['correct']?></span><span>/<?php echo $correctMsg['read']['total']?>题，共做题<?php echo $correctMsg['read']['do']?>道，正确率<?php echo $correctMsg['read']['correctRate']?>%</span></p>
            </div>
            <?php if($type == 3){ ?>
            <div class="subject">
                <p class="font-16 mt-0">
                    <span class="mr-5 font-3 font-bold">数学得分</span>
                    <span class="font-pur"><?php echo $data['quantScore']?></span>
                </p>
                <p class="m-0"><label>数学：</label><span class="font-pur"><?php echo $correctMsg['quant']['correct']?></span><span>/<?php echo $correctMsg['quant']['total']?>题，共做题<?php echo $correctMsg['quant']['do']?>道，正确率<?php echo $correctMsg['quant']['correctRate']?>%</span></p>
            </div>
            <?php }?>
            <?php }else{?>
            <div class="subject">
                <p class="font-16 mt-0">
                    <span class="mr-5 font-3 font-bold">数学得分</span>
                    <span class="font-pur"><?php echo $data['score']?></span>
                </p>
                <p class="m-0"><label>数学：</label><span class="font-pur"><?php echo $correctMsg['quant']['correct']?></span><span>/40题，共做题<?php echo $correctMsg['quant']['do'];?>道，正确率<?php echo $data['correctRate']?>%</span></p>
            </div>
            <?php } ?>
        </div>
    </section>
    <section>
        <p class="title m-0">
            <span class="title-name font-3 font-bold font-18 mr-5">Pace 诊断</span>
            <span class="score font-pur font-bold font-16 mr-5">
                <?php if ($data['averTime'] < 40) {
                    echo 'D';
                } elseif ($data['averTime'] < 90) {
                    echo 'A';
                } elseif ($data['averTime'] < 120) {
                    echo 'B';
                } elseif ($data['averTime'] < 150) {
                    echo 'C';
                } elseif ($data['averTime'] < 180) {
                    echo 'E';
                } elseif ($data['averTime'] < 210) {
                    echo 'F';
                } else {
                    echo 'G';
                }?>
            </span>
        </p>
        <p class="range">
            <progress value="22" max="100"></progress>
        </p>

        <p class="time">
            <span class="total-time">总用时:<?php echo $data['useTime']?></span>
            <span class="total-time">平均用时:<?php echo $data['averTime']; ?></span>
</div></span>
        </p>
        <p class="des">
            <?php
            if ($data['averTime'] < 40) {
                echo '小心哦，你做题的时间太快啦，即使做过的题目也最好在看一下，不要蒙哦~';
            } elseif ($data['averTime'] < 90) {
                echo '非常棒，做题速度已经赶上780的节奏啦~';
            } elseif ($data['averTime'] < 120) {
                echo '不错哟，再稍稍加快点节奏预见想象中的700~';
            } elseif ($data['averTime'] < 150) {
                echo '不稳定噢，革命尚未成功，同志需更加努力呀~';
            } elseif ($data['averTime'] < 180) {
                echo '有点难过，亲，做题要集中精力，遇到难题要学会快速决策哦~';
            } elseif ($data['averTime'] < 210) {
                echo '伤心过度，亲，你离700分还有一万五千公里，呼哧呼哧~';
            } else {
                echo '不想活啦，亲，你一定是边做题边在睡大觉~';
            }
            ?>
        </p>
    </section>
    <section>
        <p class="title m-0">
            <span class="title-name font-3 font-bold font-18 mr-5">竞争力</span>
            <span class="score font-pur font-bold font-16 mr-5"><?php echo $beatRate;?>%</span>
        </p>
        <p class="range">
            <progress value="22" max="100"></progress>
        </p>
        <p class="des">共有<?php echo $totalCount;?>人答题，您打败了<?php echo $beatRate;?>%的人，再接再厉</p>
    </section>
</div>

<div class="footer clearfix">
    <img src="/cn/images/GRE-logo2.png" class="left">
    <div class="left des">
        <p class="m-0 gre-name font-3 font-16 font-bold mb-5">雷哥GRE APP</p>
        <p class="m-0 gre-des font-8">免费做题模考，领雷豆</p>
    </div>
    <button class="right xiazai">点击下载</button>
</div>
</body>
</html>