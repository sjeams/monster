<?php use app\libs\Method; ?>
<?php $userData = Yii::$app->session->get('userData')?>
<link rel="stylesheet" href="/cn/css/singleReport.css">
<script src="/cn/js/echarts.js"></script>
<script src="/cn/js/walden.js"></script>
</head>
<body>
<div class="head-wrap">
    <div class="w12 tm">
        <div><img src="/cn/images/report/gre-title.png" alt="标题图片"/></div>
        <div class="tit-2 tr">
            <p class="u-hint"><strong class="username"><?php echo !empty($userData['nickname'])?$userData['nickname']:$userData['userName'] ?></strong>同学你好，以下是你的<em class="subject">GRE</em>全科复习分析报告</p>
            <p class="h-hint">以下出具的数据报告基于你目前所做题目数。</p>
        </div>
    </div>
</div>
<section class="content-wrap">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-atitleicon.png" alt="图标"><span class="inb column-tit">Verbal部分</span>
        </div>
        <div class="data-wrap tm clearfix">
            <div class="bg-lr" style="display: flex;display: -webkit-flex;">
            <div class="left tl flex-container-center" >
                <div>
                    <h1 class="name">
                        <div class="loader-inner inm line-scale-pulse-out">
                        <div></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;margin-right: 5px;"></div>
                        </div>
                        正确率
                        <div class="loader-inner inm line-scale-pulse-out">
                            <div></div>
                            <div style="margin-left: -3px;"></div>
                            <div style="margin-left: -3px;"></div>
                            <div style="margin-left: -3px;margin-right: 5px;"></div>
                        </div>
                    </h1>
                    <div class="accuracy">
                        <span class="sub-name inb">填空</span>
                        <div class="inb sub-text">
                            <p>你的正确率：<em class="e1"><?php echo $replenish['correct'] ?>%</em></p>
                            <?php if($replenish['correct']>80){
                                ?>
                                <p><em>正确率>80%</em>,该科掌握得非常好，一般V160+对于填空的正确率要求>80%。第一个section正确率越高，下一个section进入hard模式几率越高，那么160+的高分概率就越大。</p>
                                <?php
                            }elseif($replenish['correct']>65 && $replenish['correct']<=80) {
                                ?>
                                <p><em>正确率65%-80%</em>,该科掌握得还不错，只需要继续总结分析错题原因，熟练考点，提高正确率即可。</p>
                                <?php
                            } elseif($replenish['correct']>50 && $replenish['correct']<=65) {
                                ?>
                                <p><em>正确率50%-65%</em>,这部分还需要继续努力呀，填空瓶颈区一般会处在正确率50%-65%左右，要想快速提高正确率，还需要总结分析错题原因，熟练高频词汇用法，熟练考点技巧。</p>
                                <?php
                            }else{
                                ?>
                                <p><em> 正确率<50%</em>,这部分需要努力的地方还很多，建议系统学习所有知识点后，再次练习。</p>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="accuracy">
                        <span class="sub-name inb">阅读</span>
                        <div class="inb sub-text">
                            <p>你的正确率：<em class="e1"><?php echo $read['correct'] ?>%</em></p>
                            <?php if($read['correct']>70) {
                                ?>
                                <p><em>正确率>70%</em>,该科掌握不错，一般V160+要求RC正确率达到70%以上。</p>
                                <?php
                            } elseif($read['correct']>50 && $read['correct']<=70) {
                                ?>
                                <p><em>正确率50%-70%</em>,该科掌握一般，RC正确率瓶颈一般会处在正确率50%-60%左右，要想快速提高正确率，需要练习长难句，学习回文定位、快速获取文章结构等做题方法。</p>
                                <?php
                            } else {
                                ?>
                                <p><em>正确率<50%</em>,该科基本没掌握，建议系统学习所有知识点后，再次练习。</p>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="right tl">
                <h1 class="name">
                    <div class="loader-inner inm line-scale-pulse-out">
                        <div></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;margin-right: 5px;"></div>
                    </div>
                    Pace
                    <div class="loader-inner inm line-scale-pulse-out">
                        <div></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;"></div>
                        <div style="margin-left: -3px;margin-right: 5px;"></div>
                    </div></h1>
                <div class="sub-img flex-container-center">
                    <div class="lev-time tm" style="margin-right: 54px">
                        <p><?php echo Method::secToTime($replenish['ageTime']) ?>每道题</p>
                        <p>PaceD</p>
                        <p>(2min30s-3min)</p>
                        <span class="sub-name inb pos">填空</span>
                    </div>
                    <div class="lev-time tm">
                        <p><?php echo Method::secToTime($read['ageTime']) ?>每道题</p>
                        <p>PaceA</p>
                        <p>(1min-1min30s)</p>
                        <span class="sub-name inb pos">阅读</span>
                    </div>

                </div>
            </div>
            </div>
        </div>
        <div class="tm col-4">
            <div class="c4-tit">
                <h1>考点掌握分析</h1>
                <p>准确了解各考点掌握情况，针对薄弱项知识点突破</p>
            </div>
            <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
            <div class="echar-list">
                <span id="sc" class="current">填空</span>
                <span id="rc">阅读</span>
            </div>
            <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
            <div class="echart" id="main" style="display: block"></div>
            <div class="echart" id="main2"></div>
            <script>
                // 基于准备好的dom，初始化echarts实例
                var myChart = echarts.init(document.getElementById('main'),"walden");
                var myChart2 = echarts.init(document.getElementById('main2'),"walden");
                // 指定图表的配置项和数据
                option = {
                    title: {
//                        text: '',
//                        subtext:""
                    },
                    tooltip : {
                        trigger: 'axis',
                        formatter:function(params)
                        {
                            var relVal = params[0].name;
                            for (var i = 0, l = params.length; i < l; i++) {
                                relVal += '<br/>' + params[i].seriesName + ' : ' + params[i].value+"%";
                            }
                            return relVal;
                        }
                    },
                    legend: {
//                        data:['正确率']
                    },
                    toolbox: {



                    },

                    grid: {
                        x2:0,
                        y2:70,
                        containLabel: true
                    },
                    valueAxis:{
                        axisLine:{
                            lineStyle: {
                                color:'#a2a2a2',
                            }
                        }
                    },
                    axisLabel :{
                        interval:0,
                    },
                    xAxis : [
                        {

                            type : 'category',
                            name:'考点',
                            show:true,
                            boundaryGap : false,
                            splitLine:{
                                show:false //是否显示，默认为true
                            },
                            nameTextStyle:{
                                color:'#000',
                            },
                            nameGap:5,
                            axisLabel:{
                                rotate:45,
                                interval:0 ,
                                textStyle: {
                                    color: '#000'
                                },
                            },
                            data : []
                        }

                    ],
                    yAxis : [
                        {
                            type : 'value',
                            max:100,
                            min:0,
                            name:'正确率（%）',
                            splitLine:{

                                show:false //是否显示，默认为true

                            },
                            nameTextStyle:{
                                color:'#000',
                            },
                            axisLabel : {
                                textStyle: {
                                    color: '#000'
                                },
                                formatter: '{value}%' //间隔名称格式器%

                            },
                        }
                    ],

                    series : [

                        {
                            name:'正确率',
                            type:'line',
                            stack: '总量',
                            areaStyle: {normal: {textStyle: {
                                color: '6ae1d2'
                            }}},
                            data:[]
                        },


                    ]
                };
                option1 = {
                    title: {
//                        text: '',
//                        subtext:""
                    },
                    tooltip : {
                        trigger: 'axis',
                        formatter:function(params)
                        {
                            var relVal = params[0].name;
                            for (var i = 0, l = params.length; i < l; i++) {
                                relVal += '<br/>' + params[i].seriesName + ' : ' + params[i].value+"%";
                            }
                            return relVal;
                        }
                    },
                    legend: {
//                        data:['正确率']
                    },
                    toolbox: {



                    },

                    grid: {
                        x2:0,
                        y2:70,
                        containLabel: true
                    },
                    valueAxis:{
                        axisLine:{
                            lineStyle: {
                                color:'#a2a2a2',
                            }
                        }
                    },
                    axisLabel :{
                        interval:0,
                    },
                    xAxis : [
                        {

                            type : 'category',
                            name:'考点',
                            show:true,
                            boundaryGap : false,
                            splitLine:{
                                show:false //是否显示，默认为true
                            },
                            nameTextStyle:{
                                color:'#000',
                            },
                            nameGap:5,
                            axisLabel:{
                                rotate:45,
                                interval:0 ,
                                textStyle: {
                                    color: '#000'
                                },
                            },
                            data : []
                        }

                    ],
                    yAxis : [
                        {
                            type : 'value',
                            max:100,
                            min:0,
                            name:'正确率（%）',
                            splitLine:{

                                show:false //是否显示，默认为true

                            },
                            nameTextStyle:{
                                color:'#000',
                            },
                            axisLabel : {
                                textStyle: {
                                    color: '#000'
                                },
                                formatter: '{value}%' //间隔名称格式器%

                            },
                        }
                    ],

                    series : [

                        {
                            name:'正确率',
                            type:'line',
                            stack: '总量',
                            areaStyle: {normal: {textStyle: {
                                color: '6ae1d2'
                            }}},
                            data:[]
                        },


                    ]
                };

                $.ajax({
                    type: "post",
                    async: false, //同步执行
                    url: "/cn/presentation/ajax-know",
                    dataType: "json", //返回数据形式为json
                    data: { sectionId:1 },
                    success: function(result) {
                        var center=Array();
                        var acc=Array();
//                        var result=[['比较',42],['用词',62], ["句法结构", 54], ["平行", 41], ["逻辑语义", 50], ["动词形式", 33], ["主谓一致", 80]];
                        if (result) {
                            for(var i=0; i<result.length; i++){
                                center.push(result[i]['knowName']);
                                acc.push(result[i]['correctReta']);
                            }
                            //将返回的category和series对象赋值给options对象内的category和series
                            //因为xAxis是一个数组 这里需要是xAxis[i]的形式
                            option.xAxis[0].data = center;
                            option.series[0].data =acc;
                            myChart.hideLoading();
                            myChart.setOption(option);
                        }
                    },
                    error: function() {
                        alert("图表请求数据失败啦!");
                    }
                });
                $.ajax({
                    type: "post",
                    async: false, //同步执行
                    url: "/cn/presentation/ajax-know",
                    dataType: "json", //返回数据形式为json
                    data: { sectionId:2 },
                    success: function(result) {
                        var center1=Array();
                        var acc1=Array();
                        if (result) {
                            for(var i=0; i<result.length; i++){
                                center1.push(result[i]['knowName']);
                                acc1.push(result[i]['correctReta']);
                            }
                            //将返回的category和series对象赋值给options对象内的category和series
                            //因为xAxis是一个数组 这里需要是xAxis[i]的形式
                            option1.xAxis[0].data = center1;
                            option1.series[0].data =acc1;
                            myChart2.hideLoading();
                            myChart2.setOption(option1);
                        }
                    },
                    error: function() {
                        alert("图表请求数据失败啦!");
                    }
                });
            </script>
        </div>
    </div>
</section>
<section class="content-wrap">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-atitleicon.png" alt=""><span class="inb column-tit">QUANT部分</span>
        </div>

        <div class="tm col-1">
            <div class="circle inb">
                <div class="inb mark-wrap">
                    <p>正确率</p>
                    <p><?php echo $quant['correct'] ?>%</p>
                </div>
            </div>
            <?php if($quant['correct']>95) {
                ?>
                <p class="mark">正确率><em>95%</em>，该科掌握不错</p>
                <p class="sc-hint">一般V160+要求RC正确率达到70%以上。</p>
                <?php
            } elseif($quant['correct']>85 && $quant['correct']<=95) {
                ?>
                <p class="mark">正确率<em>85%-95%</em>，该科掌握一般</p>
                <p class="sc-hint">QUANT正确率比较容易提升，建议熟悉数学词汇，熟悉数学题型，加强题意理解，提高正确率。</p>
                <?php
            } elseif($quant['correct']>60 && $quant['correct']<=85) {
                ?>
                <p class="mark">正确率<em>60%-85%</em>，该科掌握较差</p>
                <p class="sc-hint">需要针对性的学习相关知识点，熟悉考点，再做题，提高正确率。</p>
                <?php
            } else {
                ?>
                <p class="mark">正确率<<em>60%</em>，该科基本没掌握</p>
                <p class="sc-hint">该科基本没掌握，建议系统学习所有知识点后，再次练习。</p>
                <?php
            }
            ?>
        </div>
        <div class="echart" id="main4" style="display: block"></div>

        <script>
            // 基于准备好的dom，初始化echarts实例
            var myChart4 = echarts.init(document.getElementById('main4'),"walden");
            // 指定图表的配置项和数据
            option3 = {
//        backgroundColor: '#6ae1d2',
                title: {
//                        text: '',
//                        subtext:""
                },
                tooltip : {
                    trigger: 'axis',
                    formatter:function(params)
                    {
                        var relVal = params[0].name;
                        for (var i = 0, l = params.length; i < l; i++) {
                            relVal += '<br/>' + params[i].seriesName + ' : ' + params[i].value+"%";
                        }
                        return relVal;
                    }
                },
                legend: {
//                        data:['正确率']
                },
                toolbox: {



                },

                grid: {
                    x2:0,
                    y2:70,
                    containLabel: true
                },
                valueAxis:{
                    axisLine:{
                        lineStyle: {
                            color:'#a2a2a2',
                        }
                    }
                },
                axisLabel :{
                    interval:0,
//                        formatter:function(val){
//                            return val.split("").join("\n");
//                        }
                },
                xAxis : [
                    {

                        type : 'category',
                        name:'考点',
                        show:true,
                        boundaryGap : false,
                        splitLine:{
                            show:false //是否显示，默认为true
                        },
                        nameTextStyle:{
                            color:'#000',
                        },
                        nameGap:5,
                        axisLabel:{
                            rotate:45,
                            interval:0 ,
                            textStyle: {
                                color: '#000'
                            },
                        },
                        data : []
                    }

                ],
                yAxis : [
                    {
                        type : 'value',
                        max:100,
                        min:0,
                        name:'正确率（%）',
                        splitLine:{

                            show:false //是否显示，默认为true

                        },
                        nameTextStyle:{
                            color:'#000',
                        },
                        axisLabel : {
                            textStyle: {
                                color: '#000'
                            },
                            formatter: '{value}%' //间隔名称格式器%

                        },
                    }
                ],

                series : [

                    {
                        name:'正确率',
                        type:'line',
                        stack: '总量',
                        areaStyle: {normal: {textStyle: {
                            color: '6ae1d2'
                        }}},
                        data:[]
                    },
                ]
            };
            $.ajax({
                type: "post",
                async: false, //同步执行
                url: "/cn/presentation/ajax-know",
                dataType: "json", //返回数据形式为json
                data: { sectionId:3 },
                success: function(result) {
                    var center3=Array();
                    var acc3=Array();
                    if (result) {
                        for(var i=0; i<result.length; i++){
                            center3.push(result[i]['knowName']);
                            acc3.push(result[i]['correctReta']);
                        }

                        //将返回的category和series对象赋值给options对象内的category和series
                        //因为xAxis是一个数组 这里需要是xAxis[i]的形式
                        option3.xAxis[0].data = center3;
                        option3.series[0].data =acc3;
                        myChart4.hideLoading();
                        myChart4.setOption(option3);
                    }else {
                        $("#main4").hide();
                    }
                },
                error: function() {
                    alert("图表请求数据失败啦!");
                }
            });
        </script>
        <div class="tm col-2">
            <ul class="time-wrap">
                <li >
                    <div class="level-wrap inb">
                        <p>PaceA</p>
                        <P>(1min-1min30s)</P>
                    </div>
                </li>
                <li >
                    <div class="level-wrap inb">
                        <p>PaceB</p>
                        <P>(1min30s-2min)</P>
                    </div>
                </li>
                <li >
                    <div class="level-wrap inb">
                        <p>PaceC</p>
                        <P>(2min-2min30s)</P>
                    </div>
                </li>
                <li>
                    <div class="level-wrap inb">
                        <p>PaceD</p>
                        <P>(2min30s-3min)</P>
                    </div>
                </li>
                <li>
                    <div class="level-wrap inb">
                        <p>PaceE</p>
                        <P>(3min-3min30s)</P>
                    </div>
                </li>
                <li>
                    <div class="level-wrap inb">
                        <p>PaceF</p>
                        <P>(3min30s以上)</P>
                    </div>
                </li>
            </ul>
            <p class="c2-hint-1">你的做题Pace为：<?php echo Method::secToTime($quant['ageTime']) ?>每道题。</p>
            <?php
            if($quant['ageTime']<90) {
                ?>
                <p class="c2-hint-2">非常棒，做题速度已经赶上330的节奏啦。如果正确率较高，接下来只需要加强练习，总结分析错题，保持即可！</p>
                <?php
            } elseif($quant['ageTime']>=90 && $quant['ageTime']<120) {
                ?>
                <p class="c2-hint-2">不错哟，再稍稍加快点节奏预见想象中的325+。接下来请在保证正确率的同时，提高做题速度。</p>
                <?php
            } elseif($quant['ageTime']>=120 && $quant['ageTime']<150) {
                ?>
                <p class="c2-hint-2">做题速度不稳定噢，GRE VERBAL的PACE对中国考生来说最为重要，比较理想的答题流程是填空、短篇&逻辑阅读、长篇阅读。这是因为这个顺序一般都是大家花费时间从少到多，得分性价比从高到低排列的各类题型。大家如果还没找到自己的PACE，不妨根据这个答题顺序来进行练习，等熟练以后可以再根据自身的实际情况调整。</p>
                <?php
            } elseif($quant['ageTime']>=150 && $quant['ageTime']<180) {
                ?>
                <p class="c2-hint-2">有点难过，亲，做题要集中精力，GRE VERBAL的PACE对中国考生来说最为重要，比较理想的答题流程是填空、短篇&逻辑阅读、长篇阅读。这是因为这个顺序一般都是大家花费时间从少到多，得分性价比从高到低排列的各类题型。大家如果还没找到自己的PACE，不妨根据这个答题顺序来进行练习，等熟练以后可以再根据自身的实际情况调整。</p>
                <?php
            } elseif($quant['ageTime']>=180 && $quant['ageTime']<210) {
                ?>
                <p class="c2-hint-2">伤心过度，亲，是不是遇到难题比较多？接下来需要再次熟悉考点，掌握做题方法，再行练习题目比较好哦~</p>
                <?php
            } else {
                ?>
                <p class="c2-hint-2">不想活啦，亲，你一定是边做题边在睡大觉，还是每道题目都难到无法抉择？那就建议你抓紧时间系统性学习知识点再来练习吧~</p>
                <?php
            }
            ?>
        </div>

    </div>
</section>

<section class="content-wrap" style="padding: 36px 0 50px 0;">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-atitleicon02.png" alt=""><span class="inb column-tit">复习策略建议</span>
        </div>
        <div class="tm col-3">

            <div class="jy-wrap3 inb">
                <div class="jy-list-wrap clearfix tl">

                    <div class="rc-name tm fl">填空</div>
                    <?php if($replenish['correct']>80){
                        ?>
                        <p class="sub-jy fl">
                            填空部分的正确率可以达到80%以上，说明你距离V160+更近一步了。在接下来的日子里，只需要保持常规训练，以10-20道左右为佳，维持自己现有的题感就可以了。如果还想继续冲刺，则需要多花一点时间在错题分析上面。资料的话：自己的错题库+近期真题。
                        </p>
                        <?php
                    }elseif($replenish['correct']>65 && $replenish['correct']<=80) {
                        ?>
                        <p class="sub-jy fl">
                            65%-80%，填空部分想做好，单词是基础性的，但是不是决定性的。关键在于逻辑和做题的技巧。根据关键词汇来判断语言上的基本逻辑关系，寻找句子中的重复关系，判断语气或感情色彩，推理判断时注意避免发散思维。所以需要多做总结，不要题海战术，先不要看答案，把整个句子的走向看一遍，觉得它本身是正还是反，然后有没有转折、因果这些逻辑。先看句子间大逻辑，再看单个小句子的小逻辑就能解决了。
                        </p>
                        <?php
                    } elseif($replenish['correct']>50 && $replenish['correct']<=65) {
                        ?>
                        <p class="sub-jy fl">
                            50%-65%，建议重新过一遍词汇，填空部分想做好，单词是基础性的，但是不是决定性的，关键在于逻辑和做题的技巧。根据关键词汇来判断语言上的基本逻辑关系，寻找句子中的重复关系，判断语气或感情色彩，推理判断时注意避免发散思维。所以需要多做总结，不要题海战术，先不要看答案，把整个句子的走向看一遍，觉得它本身是正还是反，然后有没有转折、因果这些逻辑。先看句子间大逻辑，再看单个小句子的小逻辑就能解决了。
                        </p>
                        <?php
                    }else{
                        ?>
                        <p class="sub-jy fl">
                            50%以下，重新学习吧。填空高频率词汇背诵3-5遍，再学习填空做题技巧和方法，按照方法练习。
                        </p>
                        <?php
                    }
                    ?>
                </div>
                <div class="jy-list-wrap clearfix tl">
                    <div class="rc-name tm fl">阅读</div>
                    <?php if($read['correct']>70) {
                        ?>
                        <p class="sub-jy fl" style="line-height: 16px;">
                            RC的正确率达到70%，并不是说就万事大吉了，一定多去关注自己错题有没有集合在同一篇文章下，对于这种文章，要多注意总结分析结构。每天的练习量需要以文章类型或者题型为主。如果是文章类型的问题，那么要多注意分析文章结构；如果是题型问题，则需要多总结相关的题型技巧。资料的话：自己的错题库+近期真题。
                        </p>
                        <?php
                    } elseif($read['correct']>50 && $read['correct']<=70) {
                        ?>
                        <p class="sub-jy fl" style="line-height: 16px;">
                            50%-70%，GRE阅读正确率相对来说是比较容易提升的，分析题型和篇章结构，先分析是什么导致正确率上不去的罪魁祸首。其次，熟悉文章的篇章结构。是否能准备把握文章段落主干关系，观察自己的定位是不是每次都可以定准确。每一篇文章可以稍微多花一点时间用来分析。建议一篇一篇去做，同类型的文章放在一起做。
                        </p>
                        <?php
                    } else {
                        ?>
                        <p class="sub-jy fl" style="line-height: 16px;">
                            50%以下，需要背诵单词，长难句训练。精度阅读内容，掌握篇章结构。一篇阅读建议读2-3遍之后，再做题。资料的话，长难句可以看《杨鹏阅读难句》，方法及题型可以参照雷哥知识库。
                        </p>
                        <?php
                    }
                    ?>
                </div>


                <div class="jy-list-wrap clearfix tl">
                    <div class="rc-name tm fl">数学</div>
                    <?php if($quant['correct']>95) {
                        ?>
                        <p class="sub-jy fl">
                            95%+的正确率已经说明你的数学没有太大的问题，只有继续保持就可以了~多注意易错点就好。资料的话：自己的错题库+近期真题。
                        </p>
                        <?php
                    } elseif($quant['correct']>85 && $quant['correct']<=95) {
                        ?>
                        <p class="sub-jy fl">
                            85%-95%，首先查看自己对于所有题型的考试方式是否已全部知晓，这个正确率有很大可能性都是因为不了解考法，尤其是自己细想有没有找不出错题原因的题目。如果是，纠正思路。其次，查看是不是有术语或者数学表达方式不熟，要对其多加防范，总结句式例题。必要时，加强长难句训练。最后，易错点逐个攻破，加深印象。
                        </p>
                        <?php
                    } elseif($quant['correct']>60 && $quant['correct']<=85) {
                        ?>
                        <p class="sub-jy fl">
                            60%-85%，一定是有某些知识点没有特别清楚。建议学习后，再练习习题，而不要一味的做题。知识点可以参考雷哥知识库。
                        </p>
                        <?php
                    } else {
                        ?>
                        <p class="sub-jy fl">
                            60%以下，背诵数学词汇，看数学知识点，逐个攻破。之后，再去做题。先看OG math review，掌握考试大纲及基本词汇后，再做OG数学部分。如果还有知识点有问题，可以看雷哥知识库或《陈向东数学高分突破》或上网搜索，稍微熟悉一点后，再做真题。
                        </p>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</section>
<script>
    $(function(){
        $(".echar-list span").on("click",function(){
            var num=$(this).index();
            $(".echart").eq(num).fadeIn(300).siblings(".echart").hide();
            $(this).addClass("current").siblings("span").removeClass("current")
        });
    })
</script>