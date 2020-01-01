<link rel="stylesheet" href="/cn/css/course.css?v=1">
<div class="course-banner">
    <div class="c-first-page">
        <img src="/cn/images/course/course-title.png" alt="标题图"/>
        <div class="blue inm">直播录播课程，周末班+晚班+全日制班不间断开课</div>
        <p>高效名师方法课+题库刷题+真题机经解析+考前冲刺答疑</p>
        <p>名师方法精讲，RC形式逻辑法+TC关键词逻辑法+Quant三步“快准狠”</p>
    </div>
</div>
<div class="subTime relative">
    <div class="animate_img ani"><img src="/cn/images/course/subTime_bg2.png" alt=""></div>
    <div class="w12 tm clearfix">
        <div class="inm clearfix">
            <?php
            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid!=0', 'fields' => 'answer,alternatives', 'category' => '566', 'page' => 1, 'order' => ' c.id DESC', 'pageSize' => 20]);
            foreach (array_reverse($data) as $k => $v) {
                if ($k < 1) {
                    ?>
                    <div class="subItem_1 fl">
                        <div class="subItem_1_info inm">
                            <p class="subInfo_tit"><span class="inm class_icon"></span>近期开班</p>

                            <p class="subInfo_de ellipsis"><?php echo $v['name'] ?></p>
                        </div>
                    </div>
                    <div class="subTime_bg1 fl"></div>
                    <div class="subItem_2 fl">
                        <div class="subItem_1_info inm">
                            <p class="subInfo_tit"><?php echo $v['answer'] ?></p>

                            <p class="subInfo_de ellipsis"><?php echo $v['alternatives'] ?></p>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="subItem_2 fl">
                        <div class="subItem_1_info inm">
                            <p class="subInfo_tit"><?php echo $v['answer'] ?></p>

                            <p class="subInfo_de ellipsis"><?php echo $v['alternatives'] ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="course-bigBG">
    <!--课程体系-->
    <div class="course-kctx">
        <div class="kctx-left">
            <div> 方法课体系</div>
        </div>
        <div class="kctx-center">
            <div class="kctx-xuanzhuan flex-container-center">
                <div class="kctx-bgXZ"></div>
                <div class="kctx-in-font flex-container-center">
                    雷哥GRE <br/>
                    课程体系
                </div>
            </div>
        </div>
        <div class="kctx-left">
            <div>在线练习答疑</div>
        </div>
        <div class="clearfix"></div>
        <div class="kctx-bot-font">方法+练习+答疑，精准提升考试能力，快速出分</div>
    </div>
    <!--gre短期提分课程-->
    <div class="course-duanqi">
        <div class="c-common-title">GRE短期提分课程</div>
        <!--        --><?php //if($type != 'test'){?>
        <!--        <div class="duanqi-content picScroll-left relative">-->
        <!--            <a class="w_crow ani prev" href="javascript:void (0);"></a>-->
        <!--            <a class="w_crow ani next" href="javascript:void (0);"></a>-->
        <!--            <div class="bd" style="overflow:hidden;">-->
        <!--                <ul>-->
        <!--                    --><?php
        //                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','category' => '482','page'=>1,'order'=>' c.sort asc,c.id DESC','pageSize' => 20]);
        //                    foreach($data as $v) {
        //                        ?>
        <!--                        <li>-->
        <!--                            <a href="course/--><?php //echo $v['id'] ?><!--.html" target="_blank">-->
        <!--                                <div class="dq-div1">-->
        <!--                                    <h4>--><?php //echo $v['name'] ?><!--</h4>-->
        <!--                                    <img src="--><?php //echo $v['image'] ?><!--" alt="图片"/>-->
        <!--                                </div>-->
        <!--                            </a>-->
        <!--                            <div class="dq-ljzx">-->
        <!--                                <a href="course/--><?php //echo $v['id'] ?><!--.html"></a>-->
        <!--                            </div>-->
        <!--                        </li>-->
        <!--                        --><?php
        //                    }
        //                    ?>
        <!--                </ul>-->
        <!--            </div>-->
        <!---->
        <!--            <script>-->
        <!--                jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:3});-->
        <!--            </script>-->
        <!--        </div>-->
        <!--        --><?php //}else{?>

        <div class="w-h-slide">
            <div class="w-h-hd">
                <ul>
                    <?php foreach ($course as $k => $v) { ?>
                        <li><?php echo $v['catName'] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="w-h-bd">
                <?php foreach ($course as $r => $t) { ?>
                    <ul>
                        <li>
                            <table>
                                <tr class="tr-block"></tr>
                                <tr>
                                    <th>课程名称</th>
                                    <?php foreach ($t['courses'] as $w => $c) { ?>
                                        <th><a href="/course/<?php echo $c['id'] ?>.html" style="color: #bdbdbd;"
                                               target="_blank"><?php echo $c['name']; ?></a></th>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>价格</td>
                                    <?php foreach ($t['courses'] as $w => $c) { ?>
                                        <td style="color: white"><?php echo $c['price']; ?>元</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>开课时间</td>
                                    <?php foreach ($t['courses'] as $w => $c) { ?>
                                        <td><?php echo $c['commencement']; ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>课程时长</td>
                                    <?php foreach ($t['courses'] as $w => $c) { ?>
                                        <td><?php echo $c['duration']; ?></td>
                                    <?php } ?>
                                </tr>
                                <!--                            <tr>-->
                                <!--                                <td>试听</td>-->
                                <!--                                --><?php //foreach($t['courses'] as $w => $c){?>
                                <!--                                <td>-->
                                <!--                                    --><?php //if(empty($c['auditionKey'])){?>
                                <!--                                        <div>试听</div>-->
                                <!--                                    --><?php //}else{?>
                                <!--                                        <div class="trylisten"><a href="https://order.viplgw.cn/pay/video/audition-choice?contentId=-->
                                <?php //echo $c['id'] ?><!--&belong=6">试听</a></div>-->
                                <!--                                    --><?php //}?>
                                <!--                                </td>-->
                                <!--                                --><?php //}?>
                                <!--                            </tr>-->
                                <tr>
                                    <td>报名</td>
                                    <?php foreach ($t['courses'] as $w => $c) { ?>
                                        <td>
                                            <div><a href="/course/<?php echo $c['id'] ?>.html"
                                                    style="color: white">立即报名</a></div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </li>
                    </ul>
                <?php } ?>
            </div>

        </div>
        <!--        --><?php //}?>

    </div>
    <!--课程特点-->
    <div class="course-trait">
        <div class="c-common-title" style="width: 338px;height: 90px;">课程特点</div>
        <div class="trait-content">
            <ul>
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted01.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        阅读用逻辑代替翻译<br>
                        改变匀速、被动阅读习惯<br>
                        精准正向解题
                    </div>
                </li>
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted02.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        填空以信息方向代替翻译<br>
                        自然语言处理手法<br>
                        用关键词直切内在逻辑
                    </div>
                </li>
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted03.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        训练最快做题速度<br>
                        培养最佳解题思维<br>
                        进行最高正确率的演练
                    </div>
                </li>
            </ul>
            <ul style="margin-bottom: 30px">
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted01.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        全科考点系统梳理 <br>
                        搭建做题思维<br>
                        简单有效的解题方法
                    </div>
                </li>
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted02.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        在线小班直播<br>
                        课堂高效答疑<br>
                        课后巩固回放
                    </div>
                </li>
                <li>
                    <div class="trait-circle flex-container-center">
                        <div class="in-trait-xz"></div>
                        <div class="trait-yuan">
                            <img src="/cn/images/course/course-ted03.png" alt="图片"/>
                        </div>
                    </div>
                    <div class="trait-info">
                        辅导老师全程督导<br>
                        班级群随时答疑<br>
                        短期备考策略
                    </div>
                </li>

            </ul>
        </div>
        <div class="trait-btn">
            <a href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes">了解详情</a>
        </div>
    </div>
    <!--短期提分名师保障-->
    <div class="course-teacher">
        <div class="c-common-title">短期提分名师保障</div>
        <div class="teacher-content">
            <img src="/cn/images/course/course-bianLan.png" alt="右边图片" class="r-img"/>
            <div class="left-thumb tea-hd">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'category' => '530', 'page' => 1, 'pageSize' => 4]);
                    foreach ($data as $v) {
                        ?>
                        <li>
                            <img src="<?php echo $v['image'] ?>" alt="老师照片"/>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="right-dian">
                <ul>
                    <?php
                    foreach ($data as $k => $v) {
                        ?>
                        <li <?php if ($k < 1){ ?>class="on" <?php } ?>></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="right-tea-info">
                <?php
                $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives,article,url', 'category' => '530', 'page' => 1, 'pageSize' => 4]);
                foreach ($data

                         as $v) {
                    ?>
                    <ul>
                        <li>
                            <div class="teacher-info">
                                <h3>
                                    <img src="/cn/images/course/course-teacher.png" alt="图片">
                                    <p><?php echo $v['name'] ?></p>
                                </h3>
                                <ul>
                                    <li>
                                        <h4>简<span style="margin-left: 35px;font-weight: bold;">介：</span></h4>
                                        <div class="green-w-info ellipsis-6"> <?php echo $v['article'] ?></div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <h4>授课科目：</h4>
                                        <div class="green-w-info">
                                            <ul>
                                                <?php
                                                $curriculum = explode(",", $v['answer']);
                                                foreach ($curriculum as $va) {
                                                    ?>
                                                    <li>●<?php echo $va ?></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <h4>学员评价：</h4>
                                        <div class="green-w-info"><?php echo $v['alternatives'] ?></div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                                <div class="yuyue-btn">
                                    <a href="tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes">预约课程</a>
                                    <?php
                                        $uid = Yii::$app->session->get('uid');
                                        if($uid){
                                            $nickname = \app\modules\cn\models\User::find()->where("uid=$uid")->asArray()->one()['nickname'];
                                        }else{
                                            $nickname = 'lgw'.rand(10000,99999);
                                        }
                                    ?>
                                    <?php if ($v['name'] == 'Helen'): ?>
                                        <a target="_blank"
                                           href="http://bjsy.gensee.com/training/site/v/50802203?nickname=<?php echo $nickname;?>">试听课程</a>
                                    <?php elseif ($v['name'] == 'Regina'): ?>
                                        <a target="_blank"
                                           href="http://bjsy.gensee.com/training/site/v/22278151?nickname=<?php echo $nickname;?>">试听课程</a>
                                    <?php elseif ($v['name'] == '专家团讲师victor'): ?>
                                        <a target="_blank"
                                           href="http://bjsy.gensee.com/training/site/v/36404290?nickname=<?php echo $nickname;?>">试听课程</a>
                                    <?php elseif ($v['name'] == '专家团讲师Bella'): ?>
                                        <a target="_blank"
                                           href="http://bjsy.gensee.com/training/site/v/53517067?nickname=<?php echo $nickname;?>">试听课程</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <script type="text/javascript">
            jQuery(".teacher-content").slide({titCell: ".tea-hd li", mainCell: ".right-tea-info",trigger: 'click'});
            jQuery(".w-h-slide").slide({titCell: ".w-h-hd li", mainCell: ".w-h-bd", trigger: 'click'});
        </script>
    </div>
    <!--短期提分学员案例-->
    <div class="course-cases">
        <div class="c-common-title">短期提分学员案例</div>
        <div class="cases-content">
            <ul id="caseList">
                <?php
                $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer,alternatives,article,listeningFile,cnName,numbering', 'category' => '531', 'page' => 1, 'pageSize' => 6, 'pageStr' => 1]);
                foreach ($data['data'] as $v) {
                    ?>
                    <li>
                        <a href="/case_detail/<?php echo $v['id'] ?>.html">
                            <h4><?php echo $v['name'] ?></h4>

                            <div class="case-c-left">
                                <p class="ellipsis">姓名：<?php echo $v['answer'] ?></p>

                                <p class="ellipsis">基础：<?php echo $v['alternatives'] ?></p>

                                <p class="ellipsis">出分时间：<?php echo $v['article'] ?></p>

                                <p class="ellipsis">班型：<?php echo $v['listeningFile'] ?></p>

                                <p class="ellipsis">考试次数：<?php echo $v['cnName'] ?></p>

                                <p class="ellipsis">分数：<?php echo $v['numbering'] ?></p>
                            </div>
                            <div class="case-c-right">
                                <img src="<?php echo $v['image'] ?>" alt="case"/>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="fenye">
            <ul>
                <?php echo $data['pageStr'] ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    var str;
    var page;
    $(document).on("click", ".iPage", function () {
        $("#caseList").html("");
        str = '';
        page = $(this).html();
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                console.log(data.data.length)
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html">
                            <h4>${data.data[i].name}</h4>
                            <div class="case-c-left">
                                <p class="ellipsis">姓名：${data.data[i].answer}</p>
                                <p class="ellipsis">基础：${data.data[i].alternatives}</p>
                                <p class="ellipsis">出分时间：${data.data[i].article}</p>
                                <p class="ellipsis">班型：${data.data[i].listeningFile}</p>
                                <p class="ellipsis">考试次数：${data.data[i].cnName}</p>
                                <p class="ellipsis">分数：${data.data[i].numbering} </p>
                            </div>
                            <div class="case-c-right">
                                <img src="${data.data[i].image}" alt="case"/>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>`
                }
                ;
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });
    $(document).on("click", ".prev", function () {
        $("#caseList").html("");
        str = '';
        var page = $('.pageSize').find('.on').html();
        if (page == 1) {
            return false;
        } else {
            page = parseInt(page) - 1;
        }
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html">
                            <h4>${data.data[i].name}</h4>
                            <div class="case-c-left">
                                <p class="ellipsis">姓名：${data.data[i].answer}</p>
                                <p class="ellipsis">基础：${data.data[i].alternatives}</p>
                                <p class="ellipsis">出分时间：${data.data[i].article}</p>
                                <p class="ellipsis">班型：${data.data[i].listeningFile}</p>
                                <p class="ellipsis">考试次数：${data.data[i].cnName}</p>
                                <p class="ellipsis">分数：${data.data[i].numbering} </p>
                            </div>
                            <div class="case-c-right">
                                <img src="${data.data[i].image}" alt="case"/>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>`
                }
                ;
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });

    $(document).on("click", ".next", function () {
        $("#caseList").html("");
        str = '';
        var page = $('.pageSize').find('.on').html();
        if (page == <?php echo $data['total']?>) {
            return false;
        } else {
            page = parseInt(page) + 1;
        }
        $.ajax({
            url: '/cn/api/case-page',
            data: {
                page: page,
                pageSize: 6
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.data.length; i++) {
                    str += `<li><a href="/case_detail/${data.data[i].id}.html">
                            <h4>${data.data[i].name}</h4>
                            <div class="case-c-left">
                                <p class="ellipsis">姓名：${data.data[i].answer}</p>
                                <p class="ellipsis">基础：${data.data[i].alternatives}</p>
                                <p class="ellipsis">出分时间：${data.data[i].article}</p>
                                <p class="ellipsis">班型：${data.data[i].listeningFile}</p>
                                <p class="ellipsis">考试次数：${data.data[i].cnName}</p>
                                <p class="ellipsis">分数：${data.data[i].numbering} </p>
                            </div>
                            <div class="case-c-right">
                                <img src="${data.data[i].image}" alt="case"/>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>`
                }
                ;
                $("#caseList").html(str);
                $(".fenye ul").html(data.pageStr);
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    });
</script>
<script type="text/javascript">
    $(function () {
        $(".right-dian ul li").bind({
            "click": function () {
                var index = $(this).index();
                $(this).addClass("on").siblings("li").removeClass("on");
                $(".left-thumb ul li").eq(index).trigger("click");
            }
        });

        $(".left-thumb ul li").bind({
            "click": function () {
                var index = $(this).index();
                $(".right-dian ul li").eq(index).trigger("click");
            }
        });
    });

    //    试听
    function auditions() {
        console.log(2222222)
    }

    function signUp() {
        console.log(333333)
    }

</script>