<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2，GRE模考报告">
    <meta name="description" content="雷哥GRE在线模考，包含magoosh模考、Kaplan模考、精选真题模考，在线免费模考软件，自适应出具模考结果与pace分析">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
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
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/moldresult.css">
    <link rel="stylesheet" href="/cn/css/gre_topicDe.css?v=1.1">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.3.js"></script>
    <script src="/cn/js/common.js?v=1"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/jmeditor/JMEditor.js"></script>

    <script src="/cn/js/mold_result.js"></script>
    <title>模考报告_雷哥GRE模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台</title>
</head>
<body>
<div class="result-nav">
    <ul>
        <li><a href="javascript:void(0);">模考结果</a></li>
        <li>&gt;</li>
        <li><a href="#"><?php echo $mockName?></a></li>
    </ul>
</div>
<div class="result-score">
    <a data-href="/cn/mock-exam/do-again?mockExamId=<?php echo $mockExamId?>" href="javascript:void(0);" onclick="jumpReload(this)">
        <img src="/cn/images/mold/mold-btn.png" alt="重新模考" id="remold-btn"/>
    </a>
     <div class="score-con">
         <ul>
             <li>
                 <img src="/cn/images/mold/mold-purpleY.png" alt="图标" class="circle"/>
                 <div class="benci-score">
                      <div class="left_info">
                          <h2>本次得分<?php echo $data['score']?><span>(满分<?php if($type > 2) echo 340;else echo 170;?>分)</span></h2>
                          <div class="bc-purple">
                              <h4><b>
                                      <span>
                                          <?php if($type == 1)echo $correctMsg['verbal']['correct'];elseif($type == 2) echo $correctMsg['quant']['correct'];else echo $correctMsg['all']['correct']; ?>
                                      </span>/
                                      <?php if($type == 1)echo $correctMsg['verbal']['total'];elseif($type == 2) echo $correctMsg['quant']['total'];else echo $correctMsg['all']['total']; ?>
                                  </b>共做题<?php if($type == 1)echo $correctMsg['verbal']['do'];elseif($type == 2) echo $correctMsg['quant']['do'];else echo $correctMsg['all']['do'];?>道，综合正确率<?php if($type == 1)echo $correctMsg['verbal']['correctRate'];elseif($type == 2) echo $correctMsg['quant']['correctRate'];else echo $correctMsg['all']['correctRate']; ?>%</h4>
                              <div style="display: flex;display: -webkit-flex;align-items: center;height: 100%;">
                                  <div class="bc-white">
                                      <?php if($type != 2){?>
                                      <p class="title">语文得分<?php if($type == 1) echo $data['score'];else echo $data['verbalScore'];?><span>(满分170分)</span></p>
                                      <p class="des">填空：<span class="blue"><?php echo $correctMsg['blank']['correct']?></span>/<?php echo $correctMsg['blank']['total']?>题    共做题<?php echo $correctMsg['blank']['do']?> 道，正确率<?php echo $correctMsg['blank']['correctRate']?>%</p>
                                      <p class="des">阅读：<span class="blue"><?php echo $correctMsg['read']['correct']?></span>/<?php echo $correctMsg['read']['total']?>题    共做题<?php echo $correctMsg['read']['do']?> 道，正确率<?php echo $correctMsg['read']['correctRate']?>%</p>
                                      <div class="xu-xian"></div>
                                          <?php if($type == 3){ ?>
                                              <p class="title">数学得分<?php echo $data['quantScore']?><span>(满分170分)</span></p>
                                              <p class="des"><span class="blue"><?php echo $correctMsg['quant']['correct']?></span>/<?php echo $correctMsg['quant']['total']?>题    共做题<?php echo $correctMsg['quant']['do']?>道，正确率<?php echo $correctMsg['quant']['correctRate']?>%</p>
                                          <?php }?>
                                      <?php }else{?>
                                      <p class="title">数学得分<?php echo $data['score']?><span>(满分170分)</span></p>
                                      <p class="des"><span class="blue"><?php echo $correctMsg['quant']['correct']?></span>/40题    共做题<?php echo $correctMsg['quant']['do'];?>道，正确率<?php echo $data['correctRate']?>%</p>
                                      <?php } ?>
                                  </div>
                                  <div class="right_time">
                                      总耗时 ： <span><?php echo $data['useTime']?></span>  <br>
                                      平均每题耗时 ： <span><?php echo $data['averTime']; ?></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                 </div>
             </li>
             <li>
                 <img src="/cn/images/mold/mold-purpleY.png" alt="图标" class="circle"/>
                 <div class="left_info">
                     <h2>Pace 诊断</h2>
                     <div class="bc-purple">
                         <div class="result-jian">
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
                             <img src="/cn/images/mold/mold-jiant.png" alt="箭头图标"/>
                         </div>
                         <p class="bot-font">

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
                     </div>
                 </div>
             </li>
             <li>
                 <img src="/cn/images/mold/mold-purpleY.png" alt="图标" class="circle"/>
                 <div class="left_info">
                     <h2>竞争力</h2>
                     <div class="bc-purple">
                         <div class="result-jian">
                             <?php echo $beatRate;?>%
                             <img src="/cn/images/mold/mold-jiant.png" alt="箭头图标"/>
                         </div>
                         <p class="bot-font">共有<?php echo $totalCount;?>人答题，您打败了<?php echo $beatRate;?>%的人，再接再厉！</p>
                     </div>
                 </div>
             </li>
         </ul>
     </div>
</div>
<!--做题记录详情-->
<div class="zuoti-details">
    <h2>做题记录详情</h2>
    <div class="zuoti-whita">
        <div class="z-w-nav01" >
            <ul><a name="question"></a>
                <?php foreach($sections as $k => $v){?>
                    <li class="<?php if($sectionId == $v['id'])echo 'on';?>" >
                        <a href="/mockResult/<?php echo $mockExamId;?>-<?php echo $v['id'];?>-0-0.html#question">
                        <span ><?php echo $v['site']?>: <?php echo $v['category']?></span>
                    </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="s-w-nav02">
            <ul>
                <li data-link="/mockResult/<?php echo $mockExamId;?>-<?php echo $sectionId;?>-0-0.html#question">
                    <input type="radio" name="timu" <?php if($access == 0)echo "checked='checked'"?> value="0" id="all_t"/>
                    <label for="all_t">全部题目</label>
                </li>
                <li data-link="/mockResult/<?php echo $mockExamId;?>-<?php echo $sectionId;?>-1-0.html#question">
                    <input type="radio" name="timu" <?php if($access == 1)echo "checked='checked'"?> value="1" id="cuo_t"/>
                    <label for="cuo_t">只看错题</label>
                </li>
                <li data-link="/mockResult/<?php echo $mockExamId;?>-<?php echo $sectionId;?>-2-0.html#question">
                    <input type="radio" name="timu" <?php if($access == 2)echo "checked='checked'"?> value="2" id="long_t"/>
                    <label for="long_t">用时较长的题目</label>
                </li>
            </ul>
        </div>
        <div class="s-w-timu">
            <ul class="clearfix">
                <?php foreach($question_data as $kk => $vv){?>
                    <li class="<?php if($questionId == $vv['questionId']) echo 'on ';if($vv['correct'] == 1 )echo 'green';elseif($vv['correct'] == 0)echo 'red';?>" >
                        <input type="hidden" value="<?php echo $questionId; ?>" id="questionId"/>
                        <a  href="/mockResult/<?php echo $mockExamId;?>-<?php echo $sectionId;?>-<?php echo $access;?>-<?php echo $vv['questionId'];?>.html#question"><?php echo $vv['site']?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="timu_title">
            <h4>题目信息</h4>
            <div class="tm_right">
                <span class="jiucuo" onclick="showJiucuo()">纠错</span>
                <div class="fr collect_btn <?php if($question['collecte']==1){?> on <?php }; ?>" onclick="collect(this)">
                    <input type="hidden" value="<?php echo $question['collecte'];?>" id="collecte" />
                    <span class="collect_bg"></span> 收藏
                </div>
            </div>
        </div>
        <div class="timu_purple">
            <div class="timu_title_top">
                <p class="title">
                <!--1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提-->
                    <?php
                        if($typeId != 5 && $typeId != 6 && $typeId != 7){
                            echo $question['details'];
/*                            echo preg_replace("/<br\s?\/?>/",'',$question['details']);*/
                        }else{
                            if($typeId == 7){
                                foreach($question['readArticles'] as $k => $v){
                                    echo "<span class='";
                                    if(preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$question['answer']) == preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',htmlspecialchars_decode($v))) echo 'green';
                                    if(isset($question['userAnswer']) && preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$question['userAnswer']) == preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',htmlspecialchars_decode($v)) && preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$question['answer']) != preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',$question['userAnswer']))echo 'red';
                                    echo "'>".$v."</span>";
                                }
                                echo "<br /><br />";
                                echo $question['details'];
                            }else{
                                echo $question['readArticle'];
/*                                echo preg_replace("/<br\s?\/?>/",'',$question['readArticle']);*/
                                echo "<br /><br />";
                                echo $question['details'];
                            }
                        }
                    ?>
                </p>
                <?php if($question["quantityA"]){?>
                    <div class="dx_topic">
                        <div>
                            <h4>Quantity A</h4>
                            <p><?php echo $question['quantityA'];?></p>
                        </div>
                        <div>
                            <h4>Quantity B</h4>
                            <p><?php echo $question['quantityB'];?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php
                /**
                 * 数字转字母 （类似于Excel列标）
                 * @param Int $index 索引值
                 * @param Int $start 字母起始值
                 * @return String 返回字母
                 */
                function IntToChr($index, $start = 65)
                {
                    $str = '';
                    if (floor($index / 26) > 0) {
                        $str .= IntToChr(floor($index / 26) - 1);
                    }
                    return $str . chr($index % 26 + $start);
                }

                ?>
                <ul>
<!-- 1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提-->
                    <?php
                        if(isset($question['optionsA']) && $question['optionsA']) {
                            foreach ($question['optionsA'] as $k => $v) {
                                ?>
                                <li class = "<?php
                                    if($typeId == 1 || $typeId == 5 || $typeId ==8){
                                        if($question['answer'] == IntToChr($k))echo 'green ';
                                        if(isset($question['userAnswer']) && $question['userAnswer'] == IntToChr($k) && $question['userAnswer'] != $question['answer'])echo 'red';
                                    }elseif($typeId == 4 || $typeId == 6 || $typeId == 9){
                                        foreach($question['answers'] as $kk => $vv){
                                            if(IntToChr($k) == $vv)echo 'green ';
                                        }
                                        foreach($question['userAnswers'] as $kl => $ku){
                                            if(IntToChr($k) == $ku){
                                                foreach($question['answers'] as $ki => $ko){
                                                    if($ku != $ko && !in_array($ku,$question['answers']) ){echo 'red '.IntToChr($k).$ko;break;}
                                                }
                                            }
                                        }
                                    }elseif($typeId == 2 || $typeId == 3){
                                        if(isset($question['answers']) && isset($question['answers'][0]) && $question['answers'][0] == $v)echo 'green ';
                                        if(isset($question['userAnswers'][0]) && $question['userAnswers'][0] == $v && $question['userAnswers'][0] != $question['answers'][0])echo 'red';
                                    }
                                ?>">
                                    <label for="xx_1"><?php echo $v; ?></label>
                                </li>
                            <?php }
                        }?>
                </ul><br />
                <ul>
                    <?php
                        if(isset($question['optionsB']) && $question['optionsB']) {
                            foreach ($question['optionsB'] as $k => $v) {
                                ?>
                                <li class="
                                <?php
                                if(isset($question['answers']) && isset($question['answers'][1]) && $question['answers'][1] == $v){echo 'green ';}
                                if(isset($question['userAnswers'][1]) && $question['userAnswers'][1] == $v && $question['userAnswers'][1] != $question['answers'][1])echo 'red';
                                ?>
                            ">
                                    <label for="xx_1"><?php echo $v; ?></label>
                                </li>
                            <?php }
                        }?>
                </ul><br />
                <ul>
                    <?php
                        if(isset($question['optionsC']) && $question['optionsC']) {
                            foreach ($question['optionsC'] as $k => $v) {
                                ?>
                                <li class="<?php
                                if(isset($question['answers']) && isset($question['answers'][2]) && $question['answers'][2] == $v)echo 'green ';
                                if(isset($question['userAnswers'][2]) && $question['userAnswers'][2] == $v && $question['userAnswer'][2] != $question['answers'][2])echo 'red';
                                ?>" >
                                    <label for="xx_1"><?php echo $v; ?></label>
                                </li>
                            <?php }
                        }?>
                </ul>
            </div>
            <div class="tiku_topic_handle clearfix">
                <div class="fl">
                    <input type="button" onclick="showAnswer(this)" value="显示答案" id="showAnswer-btn" style="display: none;">
                    <div id="curAnswer" style="display: block;">
                        <em class="int">正确答案：</em>
                        <strong style="max-width: 350px;" class="int"><?php echo $question['answer']?> </strong>
                        <em class="int">您的答案：</em>
                        <strong style="max-width: 350px;" class="int"><?php if(isset($question['userAnswer'])) echo $question['userAnswer']?> </strong>
                        <em style="padding-left: 10px;" class="int">耗时：<em class="test_time"><?php if(isset($question['useTime'])) echo $question['useTime']?></em></em>
                    </div>
                </div>
                <div class="fr">
                    <input class="addNote" type="button" onclick="showNote(this)" value="添加做题笔记">
<!--                    <input type="button" value="下一题" class="toggle-timu mr">-->
                    <div class="bdsharebuttonbox inm bdshare-button-style0-16" data-bd-bind="1523946666579"><a href="#" class="bds_more" data-cmd="more"></a>分享</div>
                    <script>window._bd_share_config = {
                        "common": {
                            "bdSnsKey": {},
                            "bdText": "",
                            "bdMini": "2",
                            "bdMiniList": false,
                            "bdPic": "",
                            "bdStyle": "0",
                            "bdSize": "16"
                        }, "share": {}
                    };
                    with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'https://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>

                </div>
            </div>
            <!--输入笔记框-->
            <div class="note_wrap">
                <textarea id="noteInt" placeholder="输入笔记内容，方便更好的理解题目，便于复习"></textarea>
                <input type="button" onclick="addNote(this)" value="确定" class="yes">
                <input type="button" onclick="showNote(this)" value="取消" class="no">
            </div>
            <div class="topic_source">
                <span class="inm">该题平均耗时：<?php echo $question['averTime'];?>                        ，平均正确率：<?php echo $question['averRate'];?>                        %。 该题由网友<strong>admin</strong>提供。更多GRE题目请</span>
                <a class="inm upload" href="/question_upload.html?questionId=39">点击上传</a>
            </div>



        </div>
        <!--做题笔记-->
        <div class="timu_title">
            <h4>做题笔记</h4>
        </div>
        <div class="common_wrap mbt_20" id="noteWrap" style="background-color: #f5f8fc;">
            <ul class="noteList">
                <?php
                if (isset($question['note'])) {
                    foreach ($question['note'] as $v) {
                        ?>
                        <li>
                            <p class="editPre"><?php echo $v['noteContent'] ?></p>
                            <div class="clearfix">
                                <span class="nodeTime fl"><?php echo date("Y-m-d H:i:s", $v['createTime']); ?></span>
                                <input class="editNote_btn fr" type="button" value="编辑"
                                       onclick="editNote(this,<?php echo $v['id'] ?>)">
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="timu_title">
            <h4>网友解析</h4>
        </div>
        <div class="timu_purple">
            <div class="explain_wrap">
                <ul class="explain_list">
                    <?php foreach($question['analysis'] as $kk => $vv){?>
                        <li>
                            <p class="explain_time">
                                当前版本由<strong><?php echo $vv['nickname']?></strong>更新于<?php echo date("Y-m-d H:i:s",$vv['createTime'])?>
                                感谢由<strong><?php echo $vv['nickname']?></strong>对此题目的解答所做出的贡献。
                            </p>
                            <div class="editor_content">
                                <?php echo $vv['analysisContent']?>
                            </div>
                        </li>
                    <?php } ?>

                </ul>

                <div class="ad_link tm">
                    <a target="blank"
                       href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes">
                        <img src="https://gre.viplgw.cn/cn/images/gre_topicDe/mdt-onevone.png" alt="图标">
                        <span class="inm">预约名师一对一题目解析课程</span>
                    </a>
                    <a href="javascript:void(0);" class="fr myBest goodExplain">我有更好的解析</a>
                </div>
                <div class="editWrap">
                    <!-- 加载编辑器的容器 -->
                    <div id="aContent" class="editDemo" contentEditable="true">

                    </div>
                    <input class="tj_btn fr" onclick="addExplain(<?php echo $question['id'] ?>)"
                           type="button" value="提交">
                    <div class="clearfixd"></div>
                </div>
                <script>
                    $('.goodExplain').click(function () {
                        $('.editWrap').slideToggle();
                    });
                    setTimeout(function(){
                        $(".editWrap").hide();
                    },1000)
                </script>

            </div>
        </div>
        <div class="timu_title">
            <h4>题目讨论 <span>(如果对题目有任何的疑惑，欢迎在这里提出来，大家会帮你解答的哦~)</span></h4>
<!--            <div class="right-top-btn pl_link" style="padding: 0 8px;">-->
<!--                <img src="https://gre.viplgw.cn/cn/images/gre_topicDe/new-mdtReply.png" alt="总回复图标"> 发表讨论-->
<!--            </div>-->
        </div>
        <div class="timu_purple" style="margin-top: 12px">
            <!--新版评论-->
            <div class="new-comment">
<!--                <div class="comment-title an-flex">-->
<!--                    <div>-->
<!--                        <img src="/cn/images/epl_reply.png" alt="评论标题图标"/>-->
<!--                        <span>网友评论</span>-->
<!--                    </div>-->
<!--                    <div><b>（评论数：<em id="replyCount" style="font-style: normal;">--><?php //echo $comment['count'] ?><!--</em>）</b></div>-->
<!--                </div>-->
                <!--总评论发表框-->
                <div class="common-pub an-flex">
                    <div class="left-tx">
                        <img src="<?php if(isset($user['image']) && $user['image']) echo $user['image'];else echo '/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                    </div>
                    <div class="right-user">
                        <h4>
                            <span><?php if(isset($user['nickname']) && $user['nickname']) echo $user['nickname'];else echo '游客'?></span>
                        </h4>
                        <textarea class="common-area" placeholder="我来说两句"></textarea>
                        <input type="button" value="提交" class="common-sub" onclick="commentNew(this)"/>
                    </div>
                </div>
                <!--评论列表-->
                <div class="comment-list">
                    <ul>
                        <?php
                        foreach ($comment['data'] as $k => $v) {
                            ?>
                            <li class="an-flex" data-id="<?php echo $v['id'] ?>">
                                <div class="left-tx">
                                    <img src="<?php echo $v['image']?$v['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                </div>
                                <div class="right-user">
                                    <h4>
                                        <span><?php echo $v['nickname'] ?></span>
                                        <!--                                            <em>--><?php //echo $comment['count'] - $k ?><!--楼</em>-->
                                    </h4>
                                    <p>
                                        <?php echo $v['content'] ?>
                                    </p>
                                    <div class="bot-control">
                                        <b><?php echo date("Y-m-d H:i:s", $v['createTime']); ?></b>
                                        <a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">
                                            <img src="/cn/images/common-zan.png" alt="点赞图标"/>
                                            <span>点赞 <b><?php echo isset($v['fane'])?$v['fane']:0 ?></b></span>
                                        </a>
                                        <a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>
                                    </div>
                                    <!--里层回复框-->
                                    <div class="in-replyK an-flex">
                                        <!--                                            <input type="text"/>-->
                                        <!--                                            <input type="button" value="发送" onclick="reply(this)"/>-->
                                        <!--                                            <input class="reply_name2" type="hidden" value="--><?php //echo $v['nickname'] ?><!--">-->
                                        <textarea></textarea>
                                        <div class="in-reply-btn">
                                            <input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>
                                            <input type="button" value="回复" class="sure" onclick="reply(this)"/>
                                            <input class="reply_name2" type="hidden" value="<?php echo $v['nickname'] ?>">
                                        </div>
                                    </div>
                                    <!--里层回复展示样式-->
                                    <?php
                                    $reply = Yii::$app->db->createCommand("select uc.*,u.nickname,u.image from x2_user_comment uc LEFT JOIN x2_user u on uc.uid=u.uid where uc.pid={$v['id']}")->queryAll();
                                    ?>
                                    <?php
                                    if (count($reply) > 0) {
                                        ?>
                                        <div class="inReply-box">
                                            <div class="in-reply-list">
                                                <ul>
                                                    <?php
                                                    foreach ($reply as $key => $va) {
                                                        ?>
                                                        <li>
                                                            <div class="an-flex list-auto">
                                                                <div class="left-tx special-w">
                                                                    <img src="<?php echo $va['image']?$va['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"/>
                                                                </div>
                                                                <div class="right-user diffW-r">
                                                                    <div class="inr-font">
                                                                        <span class="blue"><?php echo $va['nickname'] ?></span>
                                                                        <b>：回复@<?php echo $va['replyName'] ?></b>
                                                                        <span class="font-g"><?php echo $va['content'] ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bot-control">
                                                                <span class="time"><?php echo date("Y-m-d H:i:s", $va['createTime']); ?></span>
                                                                <a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
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
                <div class="pageSize tr" style="padding: 10px 0 30px;">
                    <ul>
                        <?php echo $comment['pageStr']?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>
<!--纠错弹窗-->
<div class="wrong_mask">
    <div class="wrong">
        <div class="wrongTitle">
            报告题目错误
            <span onclick="closeW()">×</span>
        </div>
        <div class="wrongContent">
            <h5>请选择错误类型：</h5>
            <select name="" class="errorType">
                <option value="答案错误">答案错误</option>
                <option value="格式有错误">格式有错误</option>
                <option value="题目内容有错误">题目内容有错误</option>
                <option value="其它">其它</option>
            </select>
            <h5>请描述一下这个错误：</h5>
            <textarea></textarea>
            <input type="hidden" value="8597">
            <br><input type="button" value="确认提交" onclick="ConfirmProblem()">
            <a href="javascript:closeW();">取消</a>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function showThree(o){
        var wrapper = $(o).parents('.inReply-box').parents("li");
        var replyName = $(o).parents(".bot-control").siblings(".list-auto").find(".inr-font span.blue").html();
        wrapper.find('.reply_name2').val(replyName);
        wrapper.find('.in-replyK').find("textarea").val("").attr('placeholder', '回复@ ' + replyName + '');
        $(o).parents(".inReply-box").siblings(".in-replyK").slideDown();
    }
    //    评论
    function commentNew(o) {
        var str = '';
        var username = $(o).siblings('h4').find('span').html();
        var content = $('.common-area').val();
        var questionId = $('#questionId').val();
        var replyCount=parseInt($('#replyCount').html());
        var curLength=parseInt($('.comment-list>ul>li').length);
        var userImg=$(o).parents('.right-user').siblings("div.left-tx").find('img').attr("src");
        if(!content){
            alert("请输入评论内容");
            return false;
        }
        $.ajax({
            url: "/cn/api/question-comment",
            dataType: "json",
            data: {
                content: content,
                questionId: questionId
            },
            type: "POST",
            success: function (req) {
                if (req.code == 0) {
                    var r = confirm(req.message);
                    if (r == true) {
                        location.href="https://login.viplgw.cn/cn/index?source=22&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"

                    }
                    else {
                        return false;
                    }
                }
                if (req.code == 1) {
                    alert(req.message);
                    str+='<li class="an-flex" data-id="'+req.id+'">' +
                        '<div class="left-tx">' +
                        '<img src="'+userImg+'" alt="用户头像"/>'+
                        '</div>' +
                        '<div class="right-user">' +
                        '<h4>' +
                        '<span>'+username+'</span>' +
                        //                        '<em>'+(replyCount+1)+'楼</em>' +
                        '</h4>' +
                        '<p>' +
                        content +
                        '</p>' +
                        '<div class="bot-control">' +
                        '<b>'+ getNowFormatDate() + '</b>' +
                        '<a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">' +
                        '<img src="/cn/images/common-zan.png" alt="点赞图标"/>' +
                        '<span>点赞 <b>0</b></span>' +
                        '</a>' +
                        '<a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>' +
                        '</div>' +
                        '<!--里层回复框-->' +
                        '<div class="in-replyK an-flex">' +
                        '<textarea></textarea>'+
                        '<div class="in-reply-btn">'+
                        '<input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>'+
                        '<input type="button" value="回复" class="sure" onclick="reply(this)"/>'+
                        '<input class="reply_name2" type="hidden" value="'+username+'">'+
                        '</div>'+
                        '</div>' +
                        '<!--里层回复展示样式-->' +
                        '<div class="inReply-box">' +
                        '</div>' +
                        '</div>' +
                        '</li>';
                    $('.comment-list>ul').prepend(str);
                    $('.common-area').val("");
                    $('#replyCount').html(replyCount+1);
                }

            }

        });
    }
    //    取消回复
    function quxiaoReply(o) {
        $(o).parents(".in-replyK").slideUp().find("textarea").val("");
    }
    //    回复
    function reply(o) {
        var str = '';
        var str2 = '';
        var wrapper = $(o).parents('li');
        var content = $(o).parent().siblings("textarea").val();
        var questionId = $('#questionId').val();
        var commentId = wrapper.attr('data-id');
        var replyName = wrapper.find('.reply_name2').val();
        var otherWrap = wrapper.find('.inReply-box').find(".in-reply-list").find("ul");
        var lc_reply = wrapper.find('.inReply-box');
        var comment_name=$(".common-pub").find('.right-user').find('span').html();
        var userImg=$(".common-pub").find("div.left-tx").find('img').attr("src");
        if(!content){
            alert("请输入评论内容");
            return false;
        }
        $.ajax({
            url: "/cn/api/question-reply",
            dataType: "json",
            data: {
                content: content,
                questionId: questionId,
                commentId: commentId,
                replyName: replyName
            },
            type: "POST",
            success: function (req) {
                str2+='<li>' +
                    '<div class="an-flex list-auto"><div class="left-tx special-w">' +
                    '<img src="'+userImg+'" alt="用户头像"/>'+
                    '</div>' +
                    '<div class="right-user diffW-r">' +
                    '<div class="inr-font">' +
                    '<span class="blue">'+comment_name+'</span><b>：回复@'+replyName+'&nbsp;</b>' +
                    '<span class="font-g">'+content+'</span>' +
                    '</div>' +
                    '</div></div>' +
                    '<div class="bot-control">' +
                    '<span class="time">' + getNowFormatDate() + '</span>' +
                    '<a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>' +
                    '</div>' +
                    '</li>';
                alert(req.message);
                $(o).siblings("input[type='text']").val('');
                if (req.code==1&&otherWrap.length<1) {
                    str = '<div class="inReply-box" style="display: block;"><div class="in-reply-list"><ul>' + str2 + '</ul></div></div>';
                    $(o).parents(".in-replyK").after(str);
                }else {
                    str = str2;
                    otherWrap.append(str);
                }
                $(o).parent().siblings("textarea").val("");
            }

        });
    }
    //时间格式化
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        var h,m,s=0;
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        if(date.getHours()<10){
            h="0"+date.getHours();
        }else{
            h=date.getHours();
        }
        if(date.getMinutes()<10){
            m="0"+date.getMinutes();
        }else{
            m=date.getMinutes();
        }
        if(date.getSeconds()<10){
            s="0"+date.getSeconds();
        }else{
            s=date.getSeconds();
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + h + seperator2 + m + seperator2 +s;
        return currentdate;

    }
    function errorMask() {
        $(".error_mask").fadeIn();
    }
    function closeErrorMask() {
        $(".error_mask").fadeOut();
    }

    /**
     * 点击里层回复
     * @param o
     */
    function showReplyK(o) {
//        var ht=$(o).html();
//        if(ht=="回复"){
        var replyName2=$(o).parents(".bot-control").siblings("h4").find("span").html();
//            $(o).html("收起回复");
        $(o).parents(".bot-control").siblings(".in-replyK").slideDown()
            .find("textarea").attr("placeholder","").val("");
        $(o).parents(".bot-control").siblings(".in-replyK").find(".reply_name2").val(replyName2);
//            $(o).parents(".bot-control").siblings(".inReply-box").slideDown();
//        }else{
//            $(o).html("回复");
//            $(o).parents(".bot-control").siblings(".in-replyK").slideUp();
//            $(o).parents(".bot-control").siblings(".inReply-box").slideUp();
//        }
    }
</script>
<script type="text/javascript">
    $(function () {
        pageClick();
    });
    function pageClick() {
        $('.iPage').click(function(){
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var page = $('.pageSize').find('.on').html();
            pageStr(page);
        });

        $('.prev').click(function(){
            var page = $('.pageSize').find('.on').html();
            if(page == 1){
                return false;
            }else{
                page = parseInt(page)-1;
            }
            pageStr(page);
        });

        $('.next').click(function(){
            var page = $('.pageSize').find('.on').html();
            var len=$(".pageSize ul li").length;
            if(!page || page>=(len-2)){
                return false;
            }else{
                page = parseInt(page)+1;
            }
            pageStr(page);
        });
    }
    function pageStr(page) {
        var str='';
        var questionId = $('#questionId').val();
        $.ajax({
            url:"/cn/api/load-question-comment",
            type:"post",
            data:{
                questionId: questionId, //问题ID
                page:page
            },
            dataType:"json",
            success:function (data) {
                var da=data.data;
                for(var i=0;i<da.length;i++){
                    var imgStr='';
                    if(da[i].image){
                        imgStr=da[i].image;
                    }else{
                        imgStr='/cn/images/details_defaultImg.png';
                    }
                    str+='<li class="an-flex" data-id="'+da[i].id+'">'+
                        '<div class="left-tx">' +
                        '<img src="'+imgStr+'" alt="用户头像"/>' +
                        '</div>' +
                        '<div class="right-user">' +
                        '<h4>' +
                        '<span>'+da[i].nickname+'</span>' +
                        //                        '<em>'+((data.count-i)-5*(page-1))+'楼</em>' +
                        '</h4>' +
                        '<p>' +
                        da[i].content +
                        '</p>' +
                        '<div class="bot-control">' +
                        '<b>'+formatDate(parseInt(da[i].createTime)*1000)+'</b>' +
                        '<a href="javascript:void(0);" class="zan" onclick="clickZanCom(this)">' +
                        '<img src="/cn/images/common-zan.png" alt="点赞图标"/>' +
                        '<span>点赞 <b>'+(da[i].fane?da[i].fane:0)+'</b></span>' +
                        '</a>' +
                        '<a  href="javascript:void(0);" class="reply" onclick="showReplyK(this)">回复</a>' +
                        '</div>' +
                        '<!--里层回复框-->' +
                        '<div class="in-replyK an-flex">' +
                        '<textarea></textarea>'+
                        '<div class="in-reply-btn">'+
                        '<input type="button" value="取消" class="quxiao" onclick="quxiaoReply(this)"/>'+
                        '<input type="button" value="回复" class="sure" onclick="reply(this)"/>'+
                        '<input class="reply_name2" type="hidden" value="'+da[i].nickname+'">'+
                        '</div>'+
                        '</div>' +
                        '<!--里层回复展示样式-->';
                    if(da[i].reply.length>0){
                        str+='<div class="inReply-box">' +
                            '<div class="in-reply-list">' +
                            '<ul>';
                        for(var j=0;j<da[i].reply.length;j++){
                            str+='<li>' +
                                '<div class="an-flex list-auto"><div class="left-tx special-w">' +
                                '<img src="';
                            if(da[i].reply[j].image){
                                str+=da[i].reply[j].image;
                            }else{
                                str+='/cn/images/details_defaultImg.png';
                            }
                            str+='"/>'+
                                '</div>' +
                                '<div class="right-user diffW-r">' +
                                '<div class="inr-font">' +
                                '<span class="blue">'+da[i].reply[j].nickname+'</span><b>：回复@'+da[i].reply[j].replyName+'&nbsp;</b>' +
                                '<span class="font-g">'+da[i].reply[j].content+'</span>' +
                                '</div>' +
                                '</div></div>' +
                                '<div class="bot-control">' +
                                '<span class="time">'+ formatDate(parseInt(da[i].reply[j].createTime)*1000)+'</span>' +
                                '<a  href="javascript:void(0);" class="reply" onclick="showThree(this)">回复</a>\n' +
                                '</div>' +
                                '</li>';
                        }
                        str+='</ul>' +
                            '</div>' +
                            '</div>';
                    }
                    str+='</div>' +
                        '</li>';
                }
                $(".comment-list ul").html(str);
                $(".pageSize ul").html(data.pageStr);
                pageClick();
            }
        })
    }

    /**
     * 时间戳数字转化
     * @param m
     * @returns {string}
     */
    function add0(m){return m<10?'0'+m:m }
    function formatDate(needTime)
    {
        //needTime是整数，否则要parseInt转换
        var time = new Date(needTime);
        var y = time.getFullYear();
        var m = time.getMonth()+1;
        var d = time.getDate();
        var h = time.getHours();
        var mm = time.getMinutes();
        var s = time.getSeconds();
        return y+'-'+add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
    }
    function clickZanCom(o) {
        var commentId=$(o).parents("li").attr("data-id");
        var num=$(o).find("b").html();
        $.ajax({
            url:"/cn/api/comment-fabulous",
            type:"get",
            data:{
                commentId:commentId
            },
            dataType:"json",
            success:function (data) {
                if(data.code==1){
                    //                    点赞动画效果
                    $.tipsBox({
                        obj: $(o),
                        str:"+1",
                        callback: function () {
                            $(o).find("b").html(parseInt(num)+1);
                        }
                    });
                    niceIn($(o));
                }else{
                    alert(data.message);
                }
            }
        });
    }
</script>
</html>
