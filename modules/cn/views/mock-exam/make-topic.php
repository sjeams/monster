<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>雷哥GRE在线模考_GRE模考_magoosh模考_KAPLAN模考_雷哥GRE线上做题平台</title>
    <meta name="keywords" content="GRE模考,真实考试界面,magoosh模考,Kaplan模考，GRE题库，GRE模考软件，GRE模考PP2">
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
    <link rel="stylesheet" href="/cn/css/gre_MoldDe.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/gre_exam_common.js?v=1"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/jmeditor/JMEditor.js"></script>
<!--    <title>做题详情-单空</title>-->
</head>
<body onload="init()">
<input type="hidden" id="sectionId" value="<?php echo $sectionId; ?>" />
<input type="hidden" id="mockExamId" value="<?php echo $mockExamId; ?>" />
<input type="hidden" id="useTime" value="<?php echo $hastime;?>"/>
<input type="hidden" id="oldTime" value="<?php echo $hastime;?>"/>
<input type="hidden" id="nextId" value="<?php echo $nextId; ?>" />
<input type="hidden" id="questionId" value="<?php echo $content['id']; ?>" />
<input type="hidden" id="mark" value="<?php echo $mark; ?>" />
<input type="hidden" id="topicType" data-int="false" value="<?php echo $type;?>"><!--    题型-->
<!--公共计算器-->
<div id="CalWrapper" class="cal-wrapper hide" tabindex="-1">
    <div class="cal">
        <div id="CalBar" class="cal-topbar">&nbsp&nbspcalculator <span id="CalCancel" class="cal-cancel">X</span></div>
        <div id="CalInput" class="cal-input" end='1' mem='0'>0</div>
        <div id="CalBtnWrapper" class="cal-btn-wrapper">
            <a href="javascript:;" class="cal-btn CalBtn">MR</a>
            <a href="javascript:;" class="cal-btn CalBtn">MC</a>
            <a href="javascript:;" class="cal-btn CalBtn">M+</a>
            <a href="javascript:;" class="cal-btn CalBtn">(</a>
            <a href="javascript:;" class="cal-btn CalBtn">)</a>
            <a href="javascript:;" class="cal-btn CalBtn">7</a>
            <a href="javascript:;" class="cal-btn CalBtn">8</a>
            <a href="javascript:;" class="cal-btn CalBtn">9</a>
            <a href="javascript:;" class="cal-btn CalBtn">÷</a>
            <a href="javascript:;" class="cal-btn CalBtn">C</a>
            <a href="javascript:;" class="cal-btn CalBtn">4</a>
            <a href="javascript:;" class="cal-btn CalBtn">5</a>
            <a href="javascript:;" class="cal-btn CalBtn">6</a>
            <a href="javascript:;" class="cal-btn CalBtn">x</a>
            <a href="javascript:;" class="cal-btn CalBtn">CE</a>
            <a href="javascript:;" class="cal-btn CalBtn">1</a>
            <a href="javascript:;" class="cal-btn CalBtn">2</a>
            <a href="javascript:;" class="cal-btn CalBtn">3</a>
            <a href="javascript:;" class="cal-btn CalBtn">-</a>
            <a href="javascript:;" class="cal-btn CalBtn">√</a>
            <a href="javascript:;" class="cal-btn CalBtn">±</a>
            <a href="javascript:;" class="cal-btn CalBtn">0</a>
            <a href="javascript:;" class="cal-btn CalBtn">.</a>
            <a href="javascript:;" class="cal-btn CalBtn">+</a>
            <a href="javascript:;" class="cal-btn CalBtn">=</a>
        </div>
        <div class="cal-bottom">Transfer Display</div>
    </div>
</div>
<section id="gre_details">
    <div class="w1050">
        <!--公共&头部工具栏-->
        <div class="toolbar">
            <div class="clearfix tool_handle">
                <div class="topic_name fl">
                    <a href="/"><img src="/cn/images/mold/gre-logo.png" alt="logo"/></a>
                </div>
                <div class="tm fr tool_list clearfix">
                    <div class="tool_div diffW" onclick="exitSectionA(this)">
                        <span class="tool_name">Exit Section</span>
                        <img src="/cn/images/mold/gre-micon01.png" alt="图标"/>
                    </div>
                    <div class="tool_div diffW" style="margin-right: 20px" onclick="quitSave(this)">
                        <span class="tool_name">Quit w/Save</span>
                        <img src="/cn/images/mold/gre-micon02.png" alt="图标"/>
                    </div>
                    <div class="tool_div" style="position: relative">
                        <span class="tool_name">Mark</span>
                        <div class="group_check">
                            <input type="checkbox" name="rad" id="rad03" <?php if($mark == 1) echo "checked='checked'";?>/>
                            <label for="rad03"></label>
                        </div>
                        <img src="/cn/images/mold/gre-micon03.png" alt="图标"/>
                    </div>
                    <div class="tool_div" onclick="examReview()">
                        <span class="tool_name">Review</span>
                        <img src="/cn/images/mold/gre-micon04.png" alt="图标"/>
                    </div>
                    <?php if($mockType == 2){?>
                    <div class="tool_div" onclick="calBtn();">
                        <span class="tool_name">Cale</span>
                        <img src="/cn/images/mold/gre-micon07.png" alt="图标"/>
                    </div>
                    <?php }?>
                    <div class="tool_div" style="margin-right: 20px" onclick="helpA()">
                        <span class="tool_name">Help</span>
                        <img src="/cn/images/mold/gre-micon05.png" alt="图标"/>
                    </div>
                    <div class="tool_div" id="nextQ-btn">
                        <?php if($nextId==0){?>
                            <span class="tool_name">提交</span>
                            <span class="tool_name">√</span>
                        <?php }else{?>
                            <span class="tool_name">Next</span>
                            <b class="next"></b>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="clearfix an-title">
                <div class="clearfix fl test_title">
                    <?php echo $mockName;?> <span></span> Section <?php echo $sectionMsg['site'];?> of <?php echo $sectionMsg['totalCount'];?>
                </div>
                <div class="clearfix time_handel fr">
                    <span class="test_time fr">00:<?php echo $times[0];?>:<?php echo $times[1];?></span>
                    <div class="hide_time tm fr"><span>Hide  Time</span></div>
                </div>
                <h1 class="cur_tit fr centerFont">Question <?php echo $timu['site'];?> of <?php echo $timu['totalCount'];?></h1>
            </div>
        </div>
        <!--内容-->
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
        <!--1-单空题 2-双空题 3-三空题 4-6选2 5-5选1题型 6-不定项题型 7-点选句子题型 8-单选题 9-不定项题 10-填空提-->
        <?php if($type == 1){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <!--阅读题干-->
                    <div class="read_tit">
                        <div class="dx_topic">Select one entry for each blank. Fill the blanks in the way that best completes the text.</div>
                    </div>
                    <div class="dx_wrap">
                        <div class="dx_topic">
                            <?php echo $content['details'];?>
                        </div>
                        <div class="tm dk_select_wrap">
                            <ul class="dk_select">
                                <?php foreach($content['optionsA'] as $k => $v){
                                    echo "<li class='";
                                        if(isset($content['userAnswer']) && $content['userAnswer'] == IntToChr($k)) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                        </div>
                    </div>
                    <div class="hint">Click on your choices.</div>
                </div>
            </div>
        <?php }elseif($type == 2){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <!--阅读题干-->
                    <div class="read_tit">
                        <div class="dx_topic">For each blank select one entry for the corresponding column of choices. Fill the
                            blanks in the way that
                            best completes the text.
                        </div>
                    </div>
                    <div class="dx_wrap">
                        <div class="dx_topic">
                            <?php echo $content['details'];?>
                        </div>

                        <div class="tm dk_select_wrap double_set">
                            <ul class="dk_select">
                                <?php foreach($content['optionsA'] as $k => $v){
                                    echo "<li class='";
                                    if(isset($content['userAnswer']) && isset($content['userAnswer'][0]) && trim(strip_tags($content['userAnswer'][0])) == trim(strip_tags(str_replace('&nbsp;','',$v)))) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                            <ul class="dk_select">
                                <?php foreach($content['optionsB'] as $k => $v){
                                    echo "<li class='";
                                    if(isset($content['userAnswer']) && isset($content['userAnswer'][1]) && trim(strip_tags($content['userAnswer'][1])) == trim(strip_tags(str_replace('&nbsp;','',$v)))) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                        </div>


                    </div>
                    <div class="hint">Click on your choice.</div>
                </div>
            </div>
        <?php }elseif($type == 3){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <!--阅读题干-->
                    <div class="read_tit">
                        <div class="dx_topic">For each blank select one entry for the corresponding column of choices. Fill the blanks in the way that
                            best completes the text.</div>
                    </div>
                    <div class="dx_wrap">
                        <div class="dx_topic">
                            <?php echo $content['details'];?>
                        </div>

                        <div class="tm dk_select_wrap">
                            <ul class="dk_select">
                                <?php foreach($content['optionsA'] as $k => $v){
                                    echo "<li class='";
                                    if(isset($content['userAnswer']) && isset($content['userAnswer'][0])  && trim(strip_tags($content['userAnswer'][0])) == trim(strip_tags(str_replace('&nbsp;','',$v)))) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                            <ul class="dk_select">
                                <?php foreach($content['optionsB'] as $k => $v){
                                    echo "<li class='";
                                    if(isset($content['userAnswer']) && isset($content['userAnswer'][1])  && trim(strip_tags($content['userAnswer'][1])) == trim(strip_tags(str_replace('&nbsp;','',$v)))) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                            <ul class="dk_select">
                                <?php foreach($content['optionsC'] as $k => $v){
                                    echo "<li class='";
                                    if(isset($content['userAnswer']) && isset($content['userAnswer'][2])  && trim(strip_tags($content['userAnswer'][2])) == trim(strip_tags(str_replace('&nbsp;','',$v)))) echo 'selected';
                                    echo "'>".$v."</li>";
                                }?>
                            </ul>
                        </div>


                    </div>
                    <div class="hint">Click on your choice.</div>
                </div>
            </div>
        <?php }elseif($type == 4){?>
            <div class="topic_content bg_f">
               <div class="subMain">
                   <div class="read_tit">
                       <div class="dx_topic">Select the two answer choices that, when used to complete the sentence, fit the meaning of the sentence
                           as a whole and produce completed sentences that are alike in meaning.</div>
                   </div>
                   <div class="dx_wrap">
                       <div class="dx_topic">
                           <?php echo $content['details'];?>
                       </div>
                       <!--6选2-->
                       <div class="tm">
                           <div class="form_check">
                               <?php foreach($content['optionsA'] as $k => $v){?>
                                   <label class="label_row" for="check<?php echo $k?>">
                                       <input type="checkbox" class="input_check" id="check<?php echo $k?>" name="sixTwo" onclick="checkbox(this)" <?php if(isset($content['userAnswer'])){
                                               foreach( $content['userAnswer'] as $kk => $vv ){
                                                   if(IntToChr($k) == $vv){echo "checked='checked'";}
                                               }
                                           }
                                           ?>/>
                                       <span class="check_box"></span>
                                       <span><?php echo $v; ?></span>
                                   </label>
                               <?php } ?>
                           </div>
                       </div>

                   </div>
                   <div class="hint">Click on your choices.</div>
               </div>
            </div>
        <?php }elseif($type == 5){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <div class="read_left fl">
                        <!--                    <div class="test_passage">Questions 1,2,3 are based on this passage</div>-->
                        <div class="read_topic_left scroll_wrap" id="exam_message">
                            <?php echo $content['readArticle'];?>
                        </div>
                    </div>
                    <div class="read_right fr">
                        <div class="read_topic_right scroll_wrap">
                            <div class="tm read_right_hint">Consider each of the choices separately and select all that apply.
                            </div>
                            <div class="r_read_tg">
                                <?php echo $content['details'];?>
                            </div>
                            <!--选项-->
                            <div class="form_radio">
                                <?php foreach($content['optionsA'] as $k => $v){?>
                                    <label class="label_row " for="radio<?php echo $k?>">
                                        <input type="radio" class="input_check" <?php if(isset($content['userAnswer']) && $content['userAnswer'] == IntToChr($k)) echo "checked='checked'"; ?> name="answer" id="radio<?php echo $k?>">
                                        <span class="check_box"></span>
                                        <span><?php echo $v;?></span>
                                    </label>
                                <?php }?>
                            </div>
                            <div class="hint">Click on your choice(s).</div>
                        </div>

                    </div>
                    <div class="clearfixd"></div>
                </div>
            </div>
        <?php }elseif($type == 6){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <div class="read_left fl">
                        <!--                    <div class="test_passage">Questions 1,2,3 are based on this passage</div>-->
                        <div class="read_topic_left scroll_wrap" id="exam_message">
                            <?php echo $content['readArticle'];?>
                        </div>
                    </div>
                    <div class="read_right fr">
                        <div class="read_topic_right scroll_wrap">
                            <div class="tm read_right_hint">Consider each of the choices separately and select all that apply.</div>
                            <div class="r_read_tg">
                                <?php echo $content['details'];?>
                            </div>
                            <!--选项-->
                            <div class="form_check">
                                <?php foreach($content['optionsA'] as $k => $v){?>
                                    <label class="label_row" for="radio<?php echo $k?>">
                                        <input type="checkbox" class="input_check" name="answer" id="radio<?php echo $k?>"
                                            <?php if(isset($content['userAnswer'])){
                                                foreach( $content['userAnswer'] as $kk => $vv ){
                                                    if(IntToChr($k) == $vv){echo "checked='checked'";}
                                                }
                                            }
                                            ?>>
                                        <span class="check_box"></span>
                                        <span><?php echo $v;?></span>
                                    </label>
                                <?php }?>
                            </div>
                            <div class="hint">Click on your choice(s).</div>
                        </div>

                    </div>
                    <div class="clearfixd"></div>
                </div>
            </div>
        <?php }elseif($type == 7){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <div class="read_left fl">
                        <!--                    <div class="test_passage">Questions 1,2,3 are based on this passage</div>-->
                        <div class="read_topic_left scroll_wrap" id="exam_message">
                            <!--提取编辑器HTML-->
                            <?php foreach($content['readArticle'] as $k =>$v ){?>
                                <span class="<?php
                                    if(isset($content['userAnswer']) && preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',htmlspecialchars_decode($content['userAnswer'])) == preg_replace('/(^\s*)|(\s*$)|[\ +\r\n]|[\.\,\，\。]/','',htmlspecialchars_decode($v))) echo 'sent-black';
                                ?>"><?php if(!empty($v))echo $v;?></span>
                            <?php }?>
                        </div>
                    </div>
                    <div class="read_right scroll_wrap fr">
                        <div class="read_topic_right">
                            <?php echo $content['details'];?>
                        </div>
                    </div><div class="clearfixd"></div>
                </div>
            </div>
        <?php }elseif($type == 8){?>
            <div class="topic_content bg_f">
               <div class="subMain">
                   <div class="dx_wrap">
<!--                       <div class="dx_topic">-->
                           <div class="dx_topic_noFlex">
                               <?php echo $content['details'];?>
                           </div>
                           <?php if($content["quantityA"]){?>
                               <div class="dx_topic">
                                   <div>
                                       <h4>Quantity A</h4>
                                       <p><?php echo $content['quantityA'];?></p>
                                   </div>
                                   <div>
                                       <h4>Quantity B</h4>
                                       <p><?php echo $content['quantityB'];?></p>
                                   </div>
                               </div>
                           <?php } ?>
<!--                       </div>-->
                       <!--单选-->
                       <div class="tm">
                           <div class="form_radio">
                               <?php foreach($content['optionsA'] as $k => $v){?>
                                   <label class="label_row" for="radio<?php echo $k?>">
                                       <input type="radio" class="input_check" name="answer" id="radio<?php echo $k?>"  <?php if(isset($content['userAnswer']) && $content['userAnswer'] == IntToChr($k)) echo 'checked="checked"';?>>
                                       <span class="check_box"></span>
                                       <span><?php echo $v; ?></span>
                                   </label>
                               <?php } ?>
                           </div>
                       </div>
                   </div>
                   <div class="hint">Click on your choice.</div>
               </div>
            </div>
        <?php }elseif($type == 9){?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <div class="dx_wrap">
                        <div class="onlyFont">
                            <?php echo $content['details'];?>
                        </div>
                        <!--多选-->
                        <div class="tm">
                            <div class="form_check">
                                <?php foreach($content['optionsA'] as $k =>$v ){?>
                                    <label class="label_row" for="check<?php echo $k?>">
                                        <input type="checkbox" class="input_check" id="check<?php echo $k?>" name="answer"
                                            <?php if(isset($content['userAnswer'])){
                                            foreach( $content['userAnswer'] as $kk => $vv ){
                                                if(IntToChr($k) == $vv){echo "checked='checked'";}
                                            }
                                        }
                                        ?>/>
                                        <span class="check_box"></span>
                                        <span><?php echo $v.'.';?></span>
                                    </label>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="hint">Click on your choice(s).</div>
                </div>
            </div>
        <?php }else{?>
            <div class="topic_content bg_f">
                <div class="subMain">
                    <div class="dx_wrap">
                        <div class="dx_topic"><?php echo $content['details'];?></div>
                        <!--填空-->
                        <div id="tk_model" class="tm">
                            <input id="intAnswer" class="tk_int tl" value="<?php if(isset($content['userAnswer'])) echo $content['userAnswer'];?>" type="text">
                        </div>
                        <div class="hint">Click on the answer box and type in a number.Backspace to erase.</div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</section>
</body>
<script type="text/javascript">
    $(function () {
        $('.dk_select li').click(function () {
            $(this).addClass('selected').siblings('li').removeClass('selected');
        })
    })
</script>
</html>
