<link rel="stylesheet" href="/cn/css/reset.css">
<link rel="stylesheet" href="/cn/css/font-awesome.css">
<link rel="stylesheet" href="/cn/css/gre_topicDe.css?v=1.1">
<script src="/cn/js/ResizeSensor.min.js"></script>
<script src="/cn/js/theia-sticky-sidebar.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>


<link rel="stylesheet" href="/style/default.css" media="screen" type="text/css"/>
<!--<script type="text/javascript" src="/jmeditor/jquery-1.8.3.min.js"></script>-->
<script type="text/javascript" src="/jmeditor/JMEditor.js"></script>
<section id="tiku_De">
    <div class="w12 clearfix">
        <!--左边-->
        <div class="tiku_left fl">
            <!--题库-->
            <div class="bg_f common_wrap mbt_20 mdt-oneSort">
                <!--导航栏-->
                <div class="tiku_mdt_head">
                    <a href="/search.html">雷哥GRE</a>
                    <span>&gt;</span>
                    <a href="/search/sectionId-<?php echo $questionData['section']['id'] ?>/source-0/level-0/select-0/type-0/page-1.html"><?php echo $questionData['section']['name'] ?></a>
                    <span>&gt;</span>
                    <a href="/search/sectionId-<?php echo $questionData['section']['id'] ?>/source-<?php echo $questionData['sourceName']['id'] ?>/level-0/select-0/type-0/page-1.html"><?php echo $questionData['sourceName']['name'] ?></a>
                    <span>&gt;</span>
                    <a href="javascript:void(0)"><?php echo $questionData['id'] ?></a>
                </div>
                <!--题库名字&收藏-->
                <div class="clearfix tiku_mdt_dht">
                    <span class="fl" style="margin-right: 30px;"><?php echo $questionData['sourceName']['name'] ?>
                        -<?php echo $questionData['id'] ?>【<?php echo $questionData['levelName']['name'] ?>】</span>
                    <span class="fl test_time2" style="color: #f23c44;">00:00:00</span>
                    <span class="fl closeTime" onclick="closeTime()" style="margin-left: 10px;cursor: pointer">关闭计时</span>

                    <div onclick="collect(<?php echo $questionData['id'] ?>,this)"
                         class="fr collect_btn <?php if (!empty($questionData['collection'])) {
                             echo 'on';
                         } ?>">
                        收藏 <span class="collect_bg"></span>
                    </div>
                    <span class="resMistake fr" style="margin-right: 30px;cursor: pointer;" onclick="wrongTopic(this)">纠错</span>
                </div>
                <!--题目 这块不一样  其他都是公共的-->
                <div class="dx_wrap">
                    <?php
                    if ($questionData['catId'] != 2) {
                        ?>
                        <div class="dx_topic">

                            <?php echo $questionData['details'] ?>

                            <?php
                            if ($questionData['quantityA'] && $questionData['quantityB']) {
                                ?>
                                <div class="clearfix newspBox_Wrap tm">
                                    <div class="int newspBox" style="margin-right: 2%;">
                                        <div class="qName">Quantity A</div>
                                        <div><?php echo $questionData['quantityA'] ?></div>
                                    </div>
                                    <div class="int newspBox" style="margin-left: 2%;">
                                        <div class="qName">Quantity B</div>
                                        <div>
                                            <?php echo $questionData['quantityB'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <!--多选、 6选2-->
                    <?php
                    if ($questionData['typeId'] == 4 || $questionData['typeId'] == 9) {
                        ?>
                        <div class="tm">
                            <div class="form_check">
                                <?php
                                if ($questionData['optionA']) {
                                    foreach ($questionData['optionA'] as $k => $v) {
                                        ?>
                                        <label class="label_row" for="check1<?php echo $k + 1 ?>">
                                            <input type="checkbox" class="input_check" id="check1<?php echo $k + 1 ?>"
                                                   name="answer"/>
                                            <span class="check_box"></span>
                                            <span><?php echo $v ?></span>
                                        </label>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="3">
                    <?php
                    } elseif ($questionData['typeId'] == 8) {
                    ?>
                        <!--单选-->
                        <div class="tm">
                            <div class="form_radio">
                                <?php
                                if ($questionData['optionA']) {
                                    foreach ($questionData['optionA'] as $k => $v) {
                                        ?>
                                        <label class="label_row" for="radio<?php echo $k + 1 ?>">
                                            <input type="radio" class="input_check" name="answer"
                                                   id="radio<?php echo $k + 1 ?>">
                                            <span class="check_box"></span>
                                            <span><?php echo $v ?></span>
                                        </label>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="2">
                    <?php
                    } elseif ($questionData['typeId'] == 10) {
                    ?>
                        <!--填空-->
                        <div id="tk_model" class="tm">
                            <input id="intAnswer" class="tk_int tl" type="text">
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="4">
                    <?php
                    } elseif ($questionData['typeId'] == 1) {
                    ?>
                        <!--单空-->
                        <div class="tm dk_select_wrap">
                            <ul class="dk_select">
                                <?php
                                if ($questionData['optionA']) {
                                    foreach ($questionData['optionA'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <!--                                    <li class="selected"></li>-->
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="1">
                    <?php
                    } elseif ($questionData['typeId'] == 2) {
                    ?>
                        <!--双空-->
                        <div class="tm dk_select_wrap double_set">
                            <ul class="dk_select">
                                <!--                                <li class="selected">defiance</li>-->
                                <?php
                                if ($questionData['optionA']) {
                                    foreach ($questionData['optionA'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                            if ($questionData['optionB']) {
                                ?>
                                <ul class="dk_select">
                                    <!--                                <li class="selected">defiance</li>-->
                                    <?php
                                    foreach ($questionData['optionB'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="1">
                    <?php
                    } elseif ($questionData['typeId'] == 3) {
                    ?>
                        <!--三空-->
                        <div class="tm dk_select_wrap">
                            <ul class="dk_select">
                                <!--                                <li class="selected">defiance</li>-->
                                <?php
                                if ($questionData['optionA']) {
                                    foreach ($questionData['optionA'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <ul class="dk_select">
                                <!--                                <li class="selected">defiance</li>-->
                                <?php
                                if ($questionData['optionB']) {
                                    foreach ($questionData['optionB'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <ul class="dk_select">
                                <!--                                <li class="selected">defiance</li>-->
                                <?php
                                if ($questionData['optionB']) {
                                    foreach ($questionData['optionC'] as $v) {
                                        ?>
                                        <li><?php echo $v ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="1">
                    <?php
                    } elseif ($questionData['typeId'] == 5) {
                    ?>
                        <!--阅读 5选1 -->
                        <div class="topic_content clearfix bg_f">
                            <div class="read_left fl">
                                <div class="read_topic_left scroll_wrap" id="exam_message">
                                    <?php echo $questionData['readArticle'] ?>
                                </div>
                            </div>
                            <div class="read_right fr">
                                <div class="read_topic_right scroll_wrap">
                                    <ul class="readAll_list clearfix">
                                        <?php
                                        foreach ($readQue as $k => $v) {
                                            ?>
                                            <li <?php if ($questionData['id'] == $v['id']) { ?> class="on" <?php } ?>><a
                                                        href="/question/<?php echo $v['id'] ?>.html">第<?php echo $k + 1 ?>
                                                    题</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="r_read_tg">
                                        <?php echo $questionData['details'] ?>
                                    </div>
                                    <!--选项-->
                                    <div class="form_radio">
                                        <?php
                                        if ($questionData['optionA']) {
                                            foreach ($questionData['optionA'] as $k => $v) {
                                                ?>
                                                <label class="label_row" for="radio<?php echo $k + 1 ?>">
                                                    <input type="radio" class="input_check" name="answer"
                                                           id="radio<?php echo $k + 1 ?>">
                                                    <span class="check_box"></span>
                                                    <span><?php echo $v ?></span>
                                                </label>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="2">
                    <?php
                    } elseif ($questionData['typeId'] == 6) {
                    ?>
                        <!--阅读 不定项（多选） -->
                        <div class="topic_content clearfix bg_f">
                            <div class="read_left fl">
                                <div class="read_topic_left scroll_wrap" id="exam_message">
                                    <?php echo $questionData['readArticle'] ?>
                                </div>
                            </div>
                            <div class="read_right fr">
                                <div class="read_topic_right scroll_wrap">
                                    <ul class="readAll_list clearfix">
                                        <?php
                                        foreach ($readQue as $k => $v) {
                                            ?>
                                            <li <?php if ($questionData['id'] == $v['id']) { ?> class="on" <?php } ?>><a
                                                        href="/question/<?php echo $v['id'] ?>.html">第<?php echo $k + 1 ?>
                                                    题</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="r_read_tg">
                                        <?php echo $questionData['details'] ?>
                                    </div>
                                    <!--选项-->
                                    <div class="form_check">
                                        <?php
                                        if ($questionData['optionA']) {
                                            foreach ($questionData['optionA'] as $k => $v) {
                                                ?>
                                                <label class="label_row" for="check<?php echo $k + 1 ?>">
                                                    <input type="checkbox" name="answer" class="input_check"
                                                           id="check<?php echo $k + 1 ?>">
                                                    <span class="check_box"></span>
                                                    <span><?php echo $v ?></span>
                                                </label>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="3">
                    <?php
                    } elseif ($questionData['typeId'] == 7) {
                    ?>
                        <!--阅读 点选句子-->
                        <div class="topic_content clearfix bg_f">
                            <div class="read_left fl">
                                <div class="read_topic_left scroll_wrap" id="exam_message">
                                    <!--提取编辑器HTML-->
                                    <?php
                                    foreach ($questionData['readArticle'] as $k => $v) {
                                        ?>
                                        <span><?php echo $v ?>.</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="read_right fr">
                                <div class="read_topic_right scroll_wrap">
                                    <ul class="readAll_list clearfix">
                                        <?php
                                        foreach ($readQue as $k => $v) {
                                            ?>
                                            <li <?php if ($questionData['id'] == $v['id']) { ?> class="on" <?php } ?>><a
                                                        href="/question/<?php echo $v['id'] ?>.html">第<?php echo $k + 1 ?>
                                                    题</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="r_read_tg">
                                        <?php echo $questionData['details'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--题型Type-->
                    <input type="hidden" id="topicType" data-int="false" value="5">
                        <script>
                            $(function () {
                                $('#exam_message span').click(function () {
                                        $(this).addClass('sent-black').siblings('span').removeClass('sent-black');
                                    }
                                );
                            })
                        </script>
                        <?php
                    }
                    ?>
                </div>
                <!--显示答案&计算器&下一题操作-->
                <div class="tiku_topic_handle clearfix">
                    <div class="fl">
                        <input type="button" onclick="showAnswer(this)" value="显示答案" id="showAnswer-btn">
                        <div id="curAnswer">
                            <em class="int">正确答案：</em>
                            <strong style="max-width: 350px;"
                                    class="int"><?php echo $questionData['answer'] ?> </strong>
                            <em style="padding-left: 10px;" class="int">耗时：<em class="test_time"></em></em>
                        </div>
                    </div>
                    <div class="fr">
                        <input class="addNote" type="button" onclick="showNote(this)" value="添加做题笔记"
                               style="margin-right:10px;">
                        <input type="button" value="下一题" onclick="nextQuestion(this,<?php echo $questionData['id'] ?>)"
                               class="toggle-timu mr">
                        <div class="bdsharebuttonbox inm"><a href="#" class="bds_more" data-cmd="more"></a></div>
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
                <!--笔记输入框-->
                <div class="note_wrap">
                    <textarea id="noteInt" placeholder="输入笔记内容，方便更好的理解题目，便于复习"></textarea>
                    <input type="button" onclick="addNote(this)" value="确定" class="yes">
                    <input type="button" onclick="showNote(this)" value="取消" class="no">
                </div>
                <!--题目来源-->
                <div class="topic_source">
                    <span class="inm">该题平均耗时：<?php echo $questionData['averageTime'] ?>
                        ，平均正确率：<?php /*echo $questionData['correctRate']*/
                        $coNum  = $questionData['id'] * 3;
                        $coNum  = substr($coNum, 0, 2);
                        $coNum1 = substr($questionData['id'], -1);
                        if ($coNum < 30) {
                            $coNum = $coNum * 2;
                            if ($coNum < 30) {
                                $coNum = $coNum * 3;
                            }
                            if ($coNum < 30) {
                                $coNum = $coNum * 2;
                            }
                        }
                        if ($coNum > 80) {
                            $coNum = $coNum / 2;
                        }
                        $coNum = $coNum + $coNum1;
                        if ($coNum > 80) {
                            $coNum = $coNum - 10;
                        }
                        echo $coNum; ?>
                        %。 该题由网友<strong><?php echo $questionData['user']['userName'] ?></strong>提供。更多GRE题目请</span>
                    <a class="inm upload"
                       href="/question_upload.html?questionId=<?php echo $questionData['id'] ?>">点击上传</a>
                </div>
            </div>
            <!--做题笔记-->
            <div class="bg_f common_wrap mbt_20" id="noteWrap">
                <h3 class="common_blue_tit">做题笔记</h3>
                <ul class="noteList">
                    <?php
                    if (isset($questionData['note'])) {
                        foreach ($questionData['note'] as $v) {
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
            <!--名师音频解析-->
            <?php if ($questionData['audio']): ?>
                <div class="bg_f common_wrap mbt_20">
                    <?php
                    if ($questionData['audio']) {
                        ?>
                        <div>
                            <h3 class="common_blue_tit">名师音频解析</h3>

                            <div class="clearfix voiceWrap">
                                <div class="voiceLeft fl clearfix">
                                    <div class="voicePrice fl tm">
                                        <p class="needLd"><?php echo $questionData['audio']['price'] ?>雷豆</p>

                                        <p class="rmbChange">只需<?php echo $questionData['audio']['price'] / 10 ?>
                                            元RMB</p>
                                    </div>
                                    <div class="tm buyShow fr">
                                        <a class="" href="#">购买观看</a>

                                        <p class="buyNum">（<?php echo $questionData['audio']['purchaseNum'] ?>人已购买）</p>
                                    </div>
                                </div>
                                <div class="voiceRight fr">
                                    <h4>雷哥GRE名师音频解析</h4>
                                    <audio src="<?php echo $questionData['audio']['audio'] ?>" controls="controls"
                                           id="audio"></audio>
                                    <div id="videoContent" class="relative">
                                        <div id="videoControls">
                                            <div id="play" class="icon-play"></div>
                                            <div id="progress">
                                                <div id="progressBG"></div>
                                                <div id="moveBlock"></div>
                                            </div>
                                            <div id="sound" class="icon-volume-up"></div>
                                            <div id="sound_progress">
                                                <div id="sound_progressBG"></div>
                                                <div id="sound_moveBlock"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <!--音频上传-->
                    <?php
                    if ($uploadRights == 1) {
                        ?>
                        <div class="clearfix">
                            <div class="fl">
                                <a href="javascript:void (0);" class="file" onclick="upFiles()">
                                    <span>上传音频</span>
                                </a>
                                <input class="audioPath imageFile inm" type="text" disabled="disabled">
                            </div>
                            <div class="fl" style="padding-left: 20px">
                                <span class="inm ldName">雷豆：</span>
                                <input class="ldVal inm" type="text">
                            </div>
                            <input class="tj_btn fr" style="margin-right: 38px;"
                                   onclick="addVideo(<?php echo $questionData['id'] ?>)" type="button" value="提交">
                        </div>
                        <?php
                    }
                    ?>
                </div>
            <?php endif; ?>
            <!--网友解析-->
            <div class="bg_f common_wrap inter_explain mbt_20">
                <div class="relative">
                    <h3 class="common_blue_tit">网友解析</h3>
                    <div class="right-top-btn goodExplain">我有更好的解析</div>
                </div>
                <div class="explain_wrap">
                    <ul class="explain_list">
                        <?php foreach ($questionData['analysis'] as $v) {
                            ?>
                            <li>
                                <p class="explain_time">
                                    当前版本由<strong><?php echo $v['nickname'] ?></strong>更新于<?php echo date("Y-m-d H:i:s", $v['createTime']); ?>
                                    感谢由<strong><?php echo $v['nickname'] ?></strong>对此题目的解答所做出的贡献。
                                </p>
                                <div class="editor_content">
                                    <?php echo $v['analysisContent'] ?>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>

                    <div class="ad_link tm">
                        <a target="blank"
                           href="tencent://message/?uin=2095453331&amp;Site=www.cnclcy&amp;Menu=yes">
                            <img src="/cn/images/gre_topicDe/mdt-onevone.png" alt="图标">
                            <span class="inm">预约名师一对一题目解析课程</span>
                        </a>
                    </div>
                    <div class="editWrap">
                        <!-- 加载编辑器的容器 -->
                        <div id="aContent" class="editDemo" contentEditable="true">

                        </div>
                        <input class="tj_btn fr" onclick="addExplain(<?php echo $questionData['id'] ?>)"
                               type="button" value="提交">
                    </div>
                    <script>
                        setTimeout(function () {
                            $(".editWrap").hide();
                        }, 1000)
                    </script>
                </div>
            </div>

            <!--题目讨论-->
            <div class="bg_f common_wrap topic_reply">
                <div class="relative">
                    <h3 class="common_blue_tit">题目讨论
                        <span>(如果对题目有任何的疑惑，欢迎在这里提出来，大家会帮你解答的哦~)</span>
                    </h3>
                    <div class="right-top-btn pl_link">
                        <img src="/cn/images/gre_topicDe/new-mdtReply.png" alt="总回复图标"> 发表讨论
                    </div>
                </div>
                <!--评论列表-->
                <div class="reply_list">
                    <!--外层评论-->
                    <?php
                    foreach ($comment['data'] as $k => $v) {
                        ?>
                        <div class="clearfix outItem" data-id="<?php echo $v['id'] ?>">
                            <div>
                                <div class="reply_userInfo inm">
                                    <div class="userImg_1"><img
                                                src="<?php echo !empty($v['image']) ? $v['image'] : '/cn/images/details_defaultImg.png' ?>"
                                                alt=""></div>
                                    <p class="userNickname ellipsis tm"><?php echo $v['nickname'] ?></p>
                                </div>
                                <div class="reply_content_a inm"><?php echo $v['content'] ?></div>
                            </div>
                            <div class="reply_time_info tr">
                                <span class="tiku_floor"><em class="howLow"><?php echo $comment['count'] - $k ?></em>楼&nbsp;&nbsp;|</span>
                                <span class="tiku_timer"><?php echo date("Y-m-d H:i:s", $v['createTime']); ?></span>
                                <span class="tiku_answer" onclick="replyA(this);">回复</span>
                            </div>
                            <div class="outInt_wrap">
                                <textarea class="replyInt_a"></textarea>
                                <div class="out_handle tr">
                                    <input type="button" class="no" onclick="replyA(this);" value="取消">
                                    <input type="button" onclick="firstReply(this)" class="yes" value="回复">
                                </div>
                            </div>

                            <!--内层回复列表-->
                            <ul class="innerReply_list">
                                <?php
                                foreach ($v['reply'] as $key => $va) {
                                    ?>
                                    <li>
                                        <div class="userImg_2 inm"><img
                                                    src="<?php echo !empty($va['image']) ? $va['image'] : '/cn/images/details_defaultImg.png' ?>"
                                                    onerror="this.src='/cn/images/details_defaultImg.png'" alt="">
                                        </div>
                                        <div class="reply_content_b inm">
                                            <span class="reply_name inm ellipsis"><?php echo $va['nickname'] ?></span>
                                            <em class=inm">回复</em>
                                            <span class="comment_name inm ellipsis"><?php echo $va['nickname'] ?></span>
                                            <span class="replyText inm"><?php echo $va['content'] ?></span>
                                        </div>
                                        <div class="reply_time_info tr">
                                            <span class="tiku_timer"><?php echo date("Y-m-d H:i:s", $va['createTime']); ?></span>
                                            <span class="tiku_answer" onclick="replyB(this)">回复</span>
                                        </div>
                                        <!--内层输入框-->
                                        <div class="innerInt_wrap">
                                            <textarea class="replyInt_b"></textarea>
                                            <div class="inner_handle tr">
                                                <input type="button" class="no" onclick="replyB(this)" value="取消">
                                                <input type="button" onclick="secondReply(this)" class="yes" value="回复">
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!--评论分页-->
                <div class="pageSize tr">
                    <ul>
                        <?php echo $comment['pageStr'] ?>
                    </ul>
                </div>
                <!--评论输入框-->
                <div>
                    <textarea id="all_reply" placeholder="我来说两句"></textarea>
                </div>
                <div class="all_reply_yes tr"><input type="button" onclick="saveReply()" value="提交"></div>
            </div>
        </div>
        <!--右边-->
        <div class="tiku_right fr">
            <div class="rt_1"><span class="rt_tit">最新更新题库</span></div>
            <div class="txtMarquee-top bg_f">
                <ul class="rt_list">
                    <?php
                    foreach ($newQuestions as $v) {
                        ?>
                        <li>
                            <a href="/question/<?php echo $v['id'] ?>.html">
                                <div>
                                    <p class="rt_timu">[<?php echo $v['section'] ?>
                                        ]<?php echo $v['source']['alias'] ?>
                                        -<?php echo $v['id'] ?></p>

                                    <p class="rt_timu_de"><?php echo $v['stem'] ?></p>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="rt_2"><span class="rt_tit">雷哥GRE微信</span></div>
            <div class="bg_f tm clearfix">
                <p class="erm_intra">微信公众号：greonline</p>
                <div class="erm_img"><img src="/cn/images/gre_topicDe/erm_cliub.png" alt=""></div>
            </div>
        </div>
    </div>
</section>
<!--遮罩层-->
<div class="log_reg_zzc"></div>
<div id="fixedTc" class="tc"></div>
<!--纠错-->
<div class="wrong">
    <div class="wrongTitle">
        报告题目错误
        <i class="fa fa-close" onclick="closeW()"></i>
    </div>
    <div class="wrongContent">
        <h5>请选择错误类型：</h5>
        <select name="" id="errorType">
            <option value="答案错误">答案错误</option>
            <option value="格式有错误">格式有错误</option>
            <option value="题目内容有错误">题目内容有错误</option>
            <option value="其它">其它</option>
        </select>
        <h5>请描述一下这个错误：</h5>
        <textarea class="errorContent" name="" cols="30" rows="10" onfocus="this.value=''"></textarea>
        <br><input type="button" value="确认提交" onclick="ConfirmProblem()">
        <a href="javascript:closeW();">取消</a>
    </div>
</div>
<!--toast-->
<div class="toast" onclick="closeToast()"><img src="/cn/images/noAnswer.png" alt=""></div>
<!--计时器-->
<input type="hidden" id="useTime" value="">
<input type="hidden" id="questionId" value="<?php echo $questionData['id'] ?>">
<input type="hidden" id="trueAnswer" value="<?php echo trim($questionData['answer']) ?>">
</body>
<script>
    function wrongTopic(o) {
        $('.log_reg_zzc').show();
        $('.wrong').show();
    }

    function closeW() {
        $('.log_reg_zzc').hide();
        $('.wrong').hide();
    }

    function toast() {
        $('.toast').show();
        $('.log_reg_zzc').show();
    }

    function closeToast() {
        $('.toast').hide();
        $('.log_reg_zzc').hide();
    }

    function ConfirmProblem() {
        var questionId = $('#questionId').val();
        var errorContent = $('.errorContent').val();
        var errorType = $('#errorType').val();
        if (errorContent) {
            $.ajax({
                url: "/cn/api/report-errors",
                type: "get",
                data: {
                    questionId: questionId,
                    errorContent: errorContent,
                    errorType: errorType
                },
                dataType: "json",
                success: function (data) {
                    if (data.code == 1) {
                        alert(data.message);
                        $('.errorContent').val('');
                        closeW();
                    } else if (data.code == 2) {
                        if (confirm(data.message)) {
                            location.href = "https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/question/" + questionId + ".html"
                        }
                    }
                }
            });
        } else {
            alert('请输入你要提交的信息');
            return false;
        }

    }

    //    单选题
    function singleAnswer() {
        var whether = '';
        var questionId = $('#questionId').val();
        var useTime = $('#useTime').val();
        var trueAnswer = $('#trueAnswer').val(); //当前正确答案
        var curAnswer_num = $('.dk_select li.selected').index();//当前选择的答案
        var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
//        答案对比
        pushData(curAnswer, trueAnswer, questionId, useTime, whether);

    }

    //    双选题
    function doubleAnswer() {
        var whether = '';
        var questionId = $('#questionId').val();
        var useTime = $('#useTime').val();
        var trueAnswer_split = $('#trueAnswer').val().split(/[,，]/); //当前正确答案&&正则区别中英文逗号分割
        var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
        var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
        var arrAnswer = [answer_A, answer_B].join(" ");//用户选择的答案字符串
        var trueAnswer = [];
        $(trueAnswer_split).each(function (i, k) {
            return trueAnswer.push(k.replace(/(^\s*)|(\s*$)/g, ""));
        });//遍历去前后空格

        pushData(arrAnswer, trueAnswer.join(" "), questionId, useTime, whether);
    }

    //    三选题
    function threeAnswer() {
        var whether = '';
        var questionId = $('#questionId').val();
        var useTime = $('#useTime').val();
        var trueAnswer_split = $('#trueAnswer').val().split(/[,，]/); //当前正确答案&&正则区别中英文逗号分割
        var answer_A = $('.dk_select').eq(0).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
        var answer_B = $('.dk_select').eq(1).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
        var answer_C = $('.dk_select').eq(2).find('li.selected').text().replace(/(^\s*)|(\s*$)/g, "");
        var arrAnswer = [answer_A, answer_B, answer_C].join(" ");//用户选择的答案字符串
        var trueAnswer = [];
        $(trueAnswer_split).each(function (i, k) {
            return trueAnswer.push(k.replace(/(^\s*)|(\s*$)/g, ""));
        });//遍历去前后空格
        pushData(arrAnswer, trueAnswer.join(" "), questionId, useTime, whether);
    }

    //    5选1题型
    function fiveCheck_one() {
        var whether = '';
        var questionId = $('#questionId').val();
        var useTime = $('#useTime').val();
        var trueAnswer = $('#trueAnswer').val(); //当前正确答案
        var curAnswer_num = $('input[name="answer"]:checked').parents('.label_row').index();//当前选择的答案
        var curAnswer = (curAnswer_num + 10).toString(36).toUpperCase();//下标转换为字母对比；
        pushData(curAnswer, trueAnswer, questionId, useTime, whether);
    }

    //    6选2题型
    function sixCheck_two() {
        var whether = '';
        var arrAnswer = [];
        var questionId = $('#questionId').val();
        var useTime = $('#useTime').val();
        var trueAnswer = $('#trueAnswer').val(); //当前正确答案
        $("input:checkbox[name='answer']:checked").each(function () { // 遍历name=answer的多选框
            var curAnswer_num = $(this).parents('.label_row').index();  // 每一个被选中项的值
            arrAnswer.push(getChar(curAnswer_num));//下标转换为字母
        });
        var curAnswer = arrAnswer.join("");
        pushData(curAnswer, trueAnswer, questionId, useTime, whether);
    }

    //     填空题型
    function intAnswer() {
        var whether = '';
        var questionId = $('#questionId').val();

        var useTime = $('#useTime').val();
        var trueAnswer = $('#trueAnswer').val().replace(/(^\s*)|(\s*$)/g, ""); //当前正确答案
        var curAnswer = $('#intAnswer').val().replace(/(^\s*)|(\s*$)/g, "");//下标转换为字母对比；
//        答案对比
        pushData(curAnswer, trueAnswer, questionId, useTime, whether, 'tiankong');
    }

    // 去除填空字符串数字前后字符
    function strToNum(str) {
        if (str == '') {
            alert("字符串错误");
            return false;
        }
        // 头部字符串判断
        var ss = str.substr(0, 1);
        if (isNaN(ss)) {
            str = str.substr(1, str.length - 1);
            str = strToNum(str);
        }
        //尾部字符串判断
        var ee = str.substr(str.length - 1, 1);
        if (isNaN(ee)) {
            str = str.substr(0, str.length - 1);
            str = strToNum(str);
        }
        return str;
    }

    //    阅读选句子
    function selectWord() {
        var reg = RegExp(/[\ +\r\n]|[\.\,\，\。\?\''\"\“\”]/g);//去字符串制表符、前后空格、标点，只做字符串比较;
        var reg2 = RegExp(/(^\s*)|(\s*$)/g);//去掉前后空格
        var whether = '';
        var questionId = $('#questionId').val();

        var useTime = $('#useTime').val();
        var trueAnswer = $('#trueAnswer').val().replace(reg2, ""); //当前正确答案
        var curAnswer = $('.read_topic_left span.sent-black').html().replace(reg2, "");//下标转换为字母对比；
        //        答案对比
        if (curAnswer.replace(reg, "") == trueAnswer.replace(reg, "")) {
            whether = 1;
        } else {
            whether = 2;
        }

//        console.log(curAnswer, trueAnswer, whether, useTime)
        $.ajax({
            url: "/cn/api/get-next-question",
            type: "post",
            data: {
                questionId: questionId,
                answer: curAnswer,
                useTime: useTime,
                whether: whether
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    location.href = '/question/' + data.id + '.html'
                } else if (data.code == 3) {
                    if (confirm(data.message)) {
                        location.href = "https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/question/" + questionId + ".html"
                    }
                }
            }
        });
    }

    //    下一题
    function nextQuestion(el, questionId) {
        // testType=1 li结构
        // testType=2 radio结构
        // testType=3 checkbox结构
        // testType=4 填空结构
        // testType=5 阅读选句子结构
        var testType = $('#topicType').val();
        if (testType == 1) {
            var topicType = $('.dk_select').length;
            if (topicType == 1) {
                if ($('.dk_select li').hasClass('selected')) {
                    singleAnswer();
                } else {
                    toast();
                    return false;
                }
            }
            if (topicType == 2) {

                if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected')) {
                    doubleAnswer();
                } else {
                    alert('请先选择答案');
                    return false;
                }

            }
            if (topicType == 3) {
                if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected') && $('.dk_select').eq(2).children('li').hasClass('selected')) {
                    threeAnswer();
                } else {
                    toast();
                    return false;
                }

            }
        }
        if (testType == 2) {
            if ($(".form_radio input[type='radio']").is(':checked')) {
                fiveCheck_one();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 3) {
            if ($(".form_check input[type='checkbox']").is(':checked')) {
                sixCheck_two();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 4) {
            if ($('#intAnswer').val()) {
                intAnswer();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 5) {
            if ($('.read_topic_left span').hasClass('sent-black')) {
                selectWord();

            } else {
                toast();
                return false;

            }

        }
    }

    //公共答案对比&ajax通信
    function pushData(curAnswer, trueAnswer, questionId, useTime, whether, who) {
        //        答案对比
        if (curAnswer == trueAnswer) {
            whether = 1;
        } else {
            if (who == 'tiankong') {
                if (strToNum(curAnswer) == strToNum(trueAnswer)) {
                    whether = 1;
                } else {
                    whether = 2;
                }
            } else {
                whether = 2;
            }
        }
//        console.log(curAnswer,trueAnswer,whether,useTime)
        $.ajax({
            url: "/cn/api/get-next-question",
            type: "post",
            data: {
                questionId: questionId,
                answer: curAnswer,
                useTime: useTime,
                whether: whether
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    location.href = '/question/' + data.id + '.html'
                } else if (data.code == 3) {
                    if (confirm(data.message)) {
                        location.href = "https://login.viplgw.cn/cn/index?source=22&url=https://gre.viplgw.cn/question/" + questionId + ".html"
                    }
                }
            }
        });
    }

    $(function () {
            useTime();
        $(".file").on("change", "input[type='file']", function () {
            var filePath = $(this).val();
            var arr = filePath.split('\\');
            var fileName = arr[arr.length - 1];
            $(".audioPath").val(fileName);
        });
        $('.pl_link').click(function () {
            location.href = '#all_reply';
        });
        $('.goodExplain').click(function () {
            $('.editWrap').slideToggle();
        });
        $('.tiku_left,.tiku_right').theiaStickySidebar();
        $('.dk_select li').click(function () {
            $(this).addClass('selected').siblings('li').removeClass('selected');
        });
        $(".txtMarquee-top").slide({
            mainCell: ".rt_list",
            autoPlay: true,
            effect: "topMarquee",
            vis: 8,
            interTime: 50,
            trigger: "click"
        });
//        评论 翻页
        $('.pageSize').on('click', '.iPage', function () {
            var page = $(this).html();
            var questionId = $('#questionId').val();
            contentStr(page, questionId);

        });
        $('.pageSize').on('click', '.next', function () {
            var page = parseInt($('.pageSize li.on').html()) + 1;
            var questionId = $('#questionId').val();
            contentStr(page, questionId);
        });
        $('.pageSize').on('click', '.prev', function () {
            var page = parseInt($('.pageSize li.on').html()) - 1;
            var questionId = $('#questionId').val();
            contentStr(page, questionId);
        })
    });

    function contentStr(page, questionId) {
        var str = '';
        $.ajax({
            url: "/cn/api/load-question-comment",
            dataType: "json",
            data: {
                page: page,
                questionId: questionId //问题ID
            },
            type: "POST",
            success: function (res) {
                var data = res.data;
                for (var i = 0; i < data.length; i++) {
                    str += '<div class="clearfix outItem" data-id="' + data[i].id + '">' +
                        '                            <div>' +
                        '                                <div class="reply_userInfo inm">' +
                        '                                    <div class="userImg_1"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                        '                                    <p class="userNickname ellipsis tm">' + data[i].nickname + '</p>' +
                        '                                </div>' +
                        '                                <div class="reply_content_a inm">' + data[i].content + '</div>' +
                        '                            </div>' +
                        '                            <div class="reply_time_info tr">' +
                        '                                <span class="tiku_floor"><em class="howLow">1</em>楼&nbsp;&nbsp;|</span>' +
                        '                                <span class="tiku_timer">' + getMyDate(data[i].createTime) + '</span>' +
                        '                                <span class="tiku_answer" onclick="replyA(this);">回复</span>' +
                        '                            </div>' +
                        '                            <div class="outInt_wrap" style="display: none;">' +
                        '                                <textarea class="replyInt_a"></textarea>' +
                        '                                <div class="out_handle tr">' +
                        '                                    <input type="button" class="no" onclick="replyA(this);" value="取消">' +
                        '                                    <input type="button" onclick="firstReply(this)" class="yes" value="回复">' +
                        '                                </div>' +
                        '                            </div>' +
                        '                            <!--内层回复列表-->' +
                        '<ul class="innerReply_list">';
                    if (data[i].reply.length > 0) {
                        for (var k = 0; k < data[i].reply.length; k++) {
                            str += '<li>' +
                                '<div class="userImg_2 inm"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                                '<div class="reply_content_b inm">' +
                                '<span class="reply_name inm ellipsis">' + data[i].reply[k].replyName + '</span><em class="inm">回复</em>' +
                                '<span class="comment_name inm ellipsis">' + data[i].reply[k].nickname + '</span>' +
                                '<span class="replyText inm">' + data[i].reply[k].content + '</span>' +
                                '</div>' +
                                '<div class="reply_time_info tr">' +
                                '<span class="tiku_timer">' + getMyDate(data[i].reply[k].createTime) + '</span>' +
                                '<span class="tiku_answer" onclick="replyB(this)">回复</span>' +
                                '</div>                                        <!--内层输入框-->                                        ' +
                                '<div class="innerInt_wrap">' +
                                '<textarea class="replyInt_b"></textarea>' +
                                '<div class="inner_handle tr">' +
                                '<input type="button" class="no" onclick="replyB(this)" value="取消">' +
                                '<input type="button" onclick="secondReply(this)" class="yes" value="回复">' +
                                '</div>' +
                                '</div>' +
                                '</li>';
                        }
                    }
                    str += '</ul></div>';
                }
                $('.reply_list').html(str);
                $('.pageSize ul').html(res.pageStr);
            }
        })
    }

    //    显示答案
    function showAnswer(el) {
        var s = $('#useTime').val();
        $('.test_time').html(sec_to_time(s));
        var testType = $('#topicType').val();
        if (testType == 1) {
            var topicType = $('.dk_select').length;
            if (topicType == 1) {
                if ($('.dk_select li').hasClass('selected')) {
                    $(el).hide().siblings('#curAnswer').show();
                } else {
                    toast();
                    return false;
                }
            }
            if (topicType == 2) {

                if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected')) {
                    $(el).hide().siblings('#curAnswer').show();
                } else {
                    toast();
                    return false;
                }

            }
            if (topicType == 3) {
                if ($('.dk_select').eq(0).children('li').hasClass('selected') && $('.dk_select').eq(1).children('li').hasClass('selected') && $('.dk_select').eq(2).children('li').hasClass('selected')) {
                    $(el).hide().siblings('#curAnswer').show();
                } else {
                    toast();
                    return false;
                }

            }
        }
        if (testType == 2) {
            if ($(".form_radio input[type='radio']").is(':checked')) {
                $(el).hide().siblings('#curAnswer').show();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 3) {
            if ($(".form_check input[type='checkbox']").is(':checked')) {
                $(el).hide().siblings('#curAnswer').show();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 4) {
            if ($('#intAnswer').val()) {
                $(el).hide().siblings('#curAnswer').show();
            } else {
                toast();
                return false;
            }

        }
        if (testType == 5) {
            if ($('.read_topic_left span').hasClass('sent-black')) {
                $(el).hide().siblings('#curAnswer').show();

            } else {
                toast();
                return false;

            }

        }
    }

    //    秒转时分秒
    function sec_to_time(s) {
        var t;
        if (s > -1) {
            var hour = Math.floor(s / 3600);
            var min = Math.floor(s / 60) % 60;
            var sec = s % 60;
            if (hour < 10) {
                t = '0' + hour + ":";
            } else {
                t = hour + ":";
            }

            if (min < 10) {
                t += "0";
            }
            t += min + ":";
            if (sec < 10) {
                t += "0";
            }
            t += sec;
        }
        return t;
    }

    //    收藏题目
    function collect(questionId, o) {
        $.ajax({
            url: "/cn/api/user-question-collection",
            dataType: "json",
            data: {
                questionId: questionId, //问题ID
            },
            type: "POST",
            success: function (req) {
                $('#fixedTc').html(req.message).show();
                var time = setTimeout(function () {
                    $('#fixedTc').hide();
                }, 3000);
                if (req.code == 1) {
                    $(o).addClass('on');
                }
                if (req.code == 2) {
                    $(o).removeClass('on');
                }

            }
        })
    }

    //    展示笔记输入框
    function showNote() {
        $('.note_wrap').slideToggle();
    }

    //    添加笔记
    function addNote(el) {
        var str = '';
        var content = $('#noteInt').val();
        var questionId = $('#questionId').val();
        if (content == '') {
            alert('请输入笔记内容！！！');
            return false;
        } else {
            $.post('/cn/api/add-question-note',
                {content: content, type: 1, questionId: questionId},
                function (res) {
                    alert(res.message);
                    if (res.code == 1) {
                        str += '<li>' +
                            '                        <p class="editPre">' + content + '</p>' +
                            '                        <div class="clearfix">' +
                            '                            <span class="nodeTime fl">' + getNowFormatDate() + '</span>' +
                            '                            <input class="editNote_btn fr" value="编辑" onclick="editNote(this,10190,17200)">' +
                            '                        </div>' +
                            '                    </li>';
                        $('.noteList').append(str);
                        $('#noteInt').val('');
                        $('.note_wrap').slideUp();
                    }
                }, 'json');
        }
    }

    //     笔记编辑
    function editNote(o, noteId) {
        var oldHtml = $(o).parents("li").find(".editPre").html();
        var questionId = $('#questionId').val();
        var text = '';
        text = '<textarea onblur="pShow(this,' + questionId + ',' + noteId + ')">' + oldHtml + '</textarea>';
        $(o).attr("disabled", "true").parents("li").prepend(text).find(".editPre").remove().end().find("textarea").focus();

    }

    function pShow(o, questionid, noteid) {
        var text = '<p class="editPre">' + $(o).val() + '</p>';
        $.ajax({
            url: "/cn/api/add-question-note",
            type: "post",
            data: {
                questionId: questionid,
                content: $(o).val(),
                noteId: noteid,
                type: 2//1表示新增笔记 其他值表示修改笔记
            },
            dataType: "json",
            success: function (data) {
                $(o).parents("li").prepend(text).find(".editNote_btn ").removeAttr("disabled");
                $(o).remove();
            }
        });
    }

    //     添加音频
    function addVideo(questionId) {
        var price = $('.ldVal').val();
        var audioPath = $('.audioPath').val();
        var reg = /^\+?[1-9]\d*$/;
        if (!reg.test(price)) {
            alert('请输入正确的雷豆数！！！');
            return false;
        }
        if (audioPath) {
            $.ajax({
                url: "/cn/api/add-analysis",
                type: "get",
                data: {
                    type: 2,
                    price: price,
                    audio: audioPath,
                    questionId: questionId
                },
                dataType: "json",
                success: function (data) {
                    if (data.code == 1) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }

                }
            });
        } else {
            alert('请选择音频文件！！！');
            return false;
        }


    }

    //     添加解析
    function addExplain(questionId) {
        var str = '';
        var userName = $('.userName_n').html();
//        var aContent = ue.getContent();
        var aContent = JMEditor.html('aContent');
        $.ajax({
            url: "/cn/api/add-analysis",
            type: "get",
            data: {
                aContent: aContent,
                questionId: questionId
            },
            dataType: "json",
            success: function (data) {
                if (data.code == 1) {
                    alert("提交成功，正在通过后台审核");
                } else {
                    alert(data.message);
                }
            },
            complete: function () {
                $('.editWrap').slideToggle();
            }

        });
    }

    //    提交评论
    function saveReply() {
        var str = '';
        var content = $('#all_reply').val();
        var questionId = $('#questionId').val();
        var nickname = $('.userName_n').html();
        var curLength = parseInt($('.reply_list .outItem').eq(0).find('.howLow').html());
        if (!curLength) {
            curLength = 0;
        }
        if (content == '') {
            alert('请输入评论内容！！！');
            return false;
        } else {
            $.post('/cn/api/question-comment', {content: content, questionId: questionId}, function (res) {
                if (res.code == 0) {
                    var r = confirm("您还未登录，是否跳转到登录页！");
                    if (r == true) {
                        location.href = "#";

                    } else {
                        return false;
                    }
                }
                if (res.code == 1) {
                    alert(res.message);
                    str += '<div class="clearfix outItem">' +
                        '                            <div>' +
                        '                                <div class="reply_userInfo inm">' +
                        '                                    <div class="userImg_1"><img src="/cn/images/details_defaultImg.png" alt=""></div>' +
                        '                                    <p class="userNickname ellipsis tm">' + nickname + '</p>' +
                        '                                </div>' +
                        '                                <div class="reply_content_a inm">' + content + '</div>' +
                        '                            </div>' +
                        '                            <div class="reply_time_info tr">' +
                        '                                <span class="tiku_floor"><em class="howLow">' + (curLength + 1) + '</em>楼&nbsp;&nbsp;|</span>' +
                        '                                <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                        '                                <span class="tiku_answer" onclick="replyA(this);">回复</span>' +
                        '                            </div>' +
                        '                            <div class="outInt_wrap">' +
                        '                                <textarea class="replyInt_a"></textarea>' +
                        '                                <div class="out_handle tr">' +
                        '                                    <input type="button" class="no" onclick="replyA(this);" value="取消">' +
                        '                                    <input type="button" class="yes" onclick="firstReply(this)" value="回复">' +
                        '                                </div>' +
                        '                            </div>' +
                        '                            <!--内层回复列表-->' +
                        '                            <ul class="innerReply_list"></ul>' +
                        '                        </div>';
                    $('.reply_list').prepend(str);
                    $('#all_reply').val('');
                }
            }, 'json')
        }

    }

    //回复输入框展示
    function replyA(el) {
        var parentBox = $(el).parents('.outItem');
        parentBox.find('.outInt_wrap').slideToggle();
    }

    function replyB(el) {
        var parentBox = $(el).parents('li');
        parentBox.find('.innerInt_wrap').slideToggle();
    }

    function firstReply(el) {
        var str = '';
        var parentWrap = $(el).parents('.outItem').find('.innerReply_list');
        var parentBox = $(el).parents('.outInt_wrap');
        var content = parentBox.find('.replyInt_a').val();
        var questionId = $('#questionId').val();
        var replyName = $(el).parents('.outItem').find('.userNickname ').html();
        var commentId = $(el).parents('.outItem').attr('data-id');
        var curName = $('.userName_n').html();
        if (content == '') {
            alert('请输入评论内容！！！');
            return false;
        } else {
            $.post('/cn/api/question-reply',
                {
                    content: content,
                    questionId: questionId,
                    replyName: replyName,
                    commentId: commentId
                },
                function (res) {
                    alert(res.message);
                    if (res.code == 1) {
                        str += '<li>' +
                            '                                        <div class="userImg_2 inm"><img src="/cn/images/details_defaultImg.png" alt="">' +
                            '                                        </div>' +
                            '                                        <div class="reply_content_b inm">' +
                            '                                            <span class="reply_name inm ellipsis">' + curName + '</span>' +
                            '                                            <em class="inm">回复</em>' +
                            '                                            <span class="comment_name inm ellipsis">' + replyName + '</span>' +
                            '                                            <span class="replyText inm">' + content + '</span>' +
                            '                                        </div>' +
                            '                                        <div class="reply_time_info tr">' +
                            '                                            <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                            '                                            <span class="tiku_answer" onclick="replyB(this)">回复</span>' +
                            '                                        </div>' +
                            '                                        <!--内层输入框-->' +
                            '                                        <div class="innerInt_wrap">' +
                            '                                            <textarea class="replyInt_b"></textarea>' +
                            '                                            <div class="inner_handle tr">' +
                            '                                                <input type="button" class="no" onclick="replyB(this)" value="取消">' +
                            '                                                <input type="button" onclick="secondReply(this)" class="yes" value="回复">' +
                            '                                            </div>' +
                            '                                        </div>' +
                            '                                    </li>';
                        parentWrap.append(str);
                        parentBox.find('.replyInt_a').val('');
                    }

                }, 'json');
        }

    }

    function secondReply(el) {
        var str = '';
        var parentWrap = $(el).parents('.outItem').find('.innerReply_list');
        var parentBox = $(el).parents('li');
        var content = parentBox.find('.replyInt_b').val();
        var questionId = $('#questionId').val();
        var replyName = parentBox.find('.reply_name ').html();
        var curName = $('.userName_n').html();
        var commentId = $(el).parents('.outItem').attr('data-id');
        if (content == '') {
            alert('请输入回复内容！！！');
            return false;
        } else {
            $.post('/cn/api/question-reply',
                {
                    content: content,
                    questionId: questionId,
                    replyName: replyName,
                    commentId: commentId
                },
                function (res) {
                    alert(res.message);
                    if (res.code == 1) {
                        str += '<li>' +
                            '                                        <div class="userImg_2 inm"><img src="/cn/images/details_defaultImg.png" alt="">' +
                            '                                        </div>' +
                            '                                        <div class="reply_content_b inm">' +
                            '                                            <span class="reply_name inm ellipsis">' + curName + '</span>' +
                            '                                            <em class="inm">回复</em>' +
                            '                                            <span class="comment_name inm ellipsis">' + replyName + '</span>' +
                            '                                            <span class="replyText inm">' + content + '</span>' +
                            '                                        </div>' +
                            '                                        <div class="reply_time_info tr">' +
                            '                                            <span class="tiku_timer">' + getNowFormatDate() + '</span>' +
                            '                                            <span class="tiku_answer" onclick="replyB(this)">回复</span>' +
                            '                                        </div>' +
                            '                                        <!--内层输入框-->' +
                            '                                        <div class="innerInt_wrap">' +
                            '                                            <textarea class="replyInt_b"></textarea>' +
                            '                                            <div class="inner_handle tr">' +
                            '                                                <input type="button" class="no" onclick="replyB(this)" value="取消">' +
                            '                                                <input type="button" onclick="secondReply(this)" class="yes" value="回复">' +
                            '                                            </div>' +
                            '                                        </div>' +
                            '                                    </li>';
                    }
                    parentWrap.append(str);
                    parentBox.find('.replyInt_b').val('');

                }, 'json');
        }

    }

    //时间格式化
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
        return currentdate;

    }

    //时间戳转换为时间
    function getMyDate(str) {
        var oDate = new Date(str * 1000),
            oYear = oDate.getFullYear(),
            oMonth = oDate.getMonth() + 1,
            oDay = oDate.getDate(),
            oHour = oDate.getHours(),
            oMin = oDate.getMinutes(),
            oSen = oDate.getSeconds(),
            oTime = oYear + '-' + getzf(oMonth) + '-' + getzf(oDay) + ' ' + getzf(oHour) + ':' + getzf(oMin) + ':' + getzf(oSen);//最后拼接时间
        return oTime;
    }

    //补0操作
    function getzf(num) {
        if (parseInt(num) < 10) {
            num = '0' + num;
        }
        return num;
    }

    var timer;




    //        公共计时器
    function useTime() {
        console.log('useTime')
        var HH = 0;
        var mm = 0;
        var ss = 0;
        var str = '';
        var useTime = 0;
        timer = setInterval(function () {
            str = "";
            useTime++;
            if (++ss == 60) {
                if (++mm == 60) {
                    HH++;
                    mm = 0;
                }
                ss = 0;
            }
            str += HH < 10 ? "0" + HH : HH;
            str += ":";
            str += mm < 10 ? "0" + mm : mm;
            str += ":";
            str += ss < 10 ? "0" + ss : ss;
            $('.test_time2').html(str);
            $('#useTime').val(useTime);
        }, 1000);
    }
    function closeTime() {
        $('.test_time2').html('计时已关闭');
        console.log('closeTime');
        clearInterval(timer)
        $('.closeTime').html('')
    }

    //    下标转换为字母
    function getChar(i) {
        return (i + 10).toString(36).toUpperCase();
    }
</script>
<script>
    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload',
        {
            autoHeightEnabled: false
        });
    o_ueditorupload.ready(function () {

        o_ueditorupload.hide();//隐藏编辑器

        //监听图片上传
//                    o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
//                    {
//                        $('.imageFile').val(arg[0].src);
//
//                    });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg) {
            $('.imageFile').val(arg[0].url);
        });
    });

    //弹出图片上传的对话框
    //                function upImage()
    //                {
    //                    var myImage = o_ueditorupload.getDialog("insertimage");
    //                    myImage.open();
    //                }
    //                弹出文件上传的对话框
    function upFiles() {
        var myFiles = o_ueditorupload.getDialog("attachment");
        myFiles.open();
    }

</script>
<script type="text/plain" id="j_ueditorupload"></script>
