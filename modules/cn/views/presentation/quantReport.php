<?php use app\libs\Method; ?>
<?php $userData = Yii::$app->session->get('userData')?>
<link rel="stylesheet" href="/cn/css/singleReport.css">
<script src="/cn/js/echarts.js"></script>
<script src="/cn/js/walden.js"></script>
<div class="head-wrap">
    <div class="w12 tm">
        <div><img src="/cn/images/report/gre-title.png" alt="标题图片"/></div>
        <div class="tit-2 tr">
            <p class="u-hint"><strong class="username"><?php echo !empty($userData['nickname'])?$userData['nickname']:$userData['userName'] ?></strong>同学你好，以下是你的<em class="subject">数学</em>单科复习分析报告</p>
            <p class="h-hint">以下出具的数据报告基于你目前所做题目数。</p>
        </div>
    </div>
</div>
<section class="content-wrap">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-titleIcon01.png" alt=""><span class="inb column-tit">数学备考数据</span>
        </div>

        <div class="tm col-1">
            <div class="circle inb">
                <div class="inb mark-wrap">
                    <p>正确率</p>
                    <p><?php echo $data['correct'] ?>%</p>
                </div>
            </div>
            <?php if($data['correct']>95) {
                ?>
                <p class="mark">正确率><em>95%</em>，该科掌握不错</p>
                <p class="sc-hint">一般V160+要求RC正确率达到70%以上。</p>
                <?php
            } elseif($data['correct']>85 && $data['correct']<=95) {
                ?>
                <p class="mark">正确率<em>85%-95%</em>，该科掌握一般</p>
                <p class="sc-hint">QUANT正确率比较容易提升，建议熟悉数学词汇，熟悉数学题型，加强题意理解，提高正确率。</p>
                <?php
            } elseif($data['correct']>60 && $data['correct']<=85) {
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
        <div class="echart" id="main" style="display: block"></div>
        <script>
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'),"walden");
            // 指定图表的配置项和数据
            option = {
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
                    var center=Array();
                    var acc=Array();
//                    var result=[['比较',42],['用词',62], ["句法结构", 54], ["平行", 41], ["逻辑语义", 50], ["动词形式", 33], ["主谓一致", 80]];
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
            <p class="c2-hint-1">你的做题Pace为：<?php echo Method::secToTime($data['ageTime']) ?>每道题</p>
            <?php
            if($data['ageTime']<90) {
                ?>
                <p class="c2-hint-2">非常棒，做题速度已经赶上330的节奏啦。如果正确率较高，接下来只需要加强练习，总结分析错题，保持即可！</p>
                <?php
            } elseif($data['ageTime']>=90 && $data['ageTime']<120) {
                ?>
                <p class="c2-hint-2">不错哟，再稍稍加快点节奏预见想象中的325+。接下来请在保证正确率的同时，提高做题速度。</p>
                <?php
            } elseif($data['ageTime']>=120 && $data['ageTime']<150) {
                ?>
                <p class="c2-hint-2">做题速度不稳定噢，GRE VERBAL的PACE对中国考生来说最为重要，比较理想的答题流程是填空、短篇&逻辑阅读、长篇阅读。这是因为这个顺序一般都是大家花费时间从少到多，得分性价比从高到低排列的各类题型。大家如果还没找到自己的PACE，不妨根据这个答题顺序来进行练习，等熟练以后可以再根据自身的实际情况调整。</p>
                <?php
            } elseif($data['ageTime']>=150 && $data['ageTime']<180) {
                ?>
                <p class="c2-hint-2">有点难过，亲，做题要集中精力，GRE VERBAL的PACE对中国考生来说最为重要，比较理想的答题流程是填空、短篇&逻辑阅读、长篇阅读。这是因为这个顺序一般都是大家花费时间从少到多，得分性价比从高到低排列的各类题型。大家如果还没找到自己的PACE，不妨根据这个答题顺序来进行练习，等熟练以后可以再根据自身的实际情况调整。</p>
                <?php
            } elseif($data['ageTime']>=180 && $data['ageTime']<210) {
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
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-retitleicon02.png" alt="图标"><span class="inb column-tit">填空复习策略建议</span>
        </div>
        <div class="tm col-3">
            <div class="jy-wrap2 inb">
                <?php if($data['correct']>95) {
                    ?>
                    <div class="jy-wrap">
                        95%+的正确率已经说明你的数学没有太大的问题，只有继续保持就可以了~多注意易错点就好。资料的话：自己的错题库+近期真题。
                    </div>
                    <?php
                } elseif($data['correct']>85 && $data['correct']<=95) {
                    ?>
                    <div class="jy-wrap">
                        85%-95%，首先查看自己对于所有题型的考试方式是否已全部知晓，这个正确率有很大可能性都是因为不了解考法，尤其是自己细想有没有找不出错题原因的题目。如果是，纠正思路。其次，查看是不是有术语或者数学表达方式不熟，要对其多加防范，总结句式例题。必要时，加强长难句训练。最后，易错点逐个攻破，加深印象。
                    </div>
                    <?php
                } elseif($data['correct']>60 && $data['correct']<=85) {
                    ?>
                    <div class="jy-wrap">
                        60%-85%，一定是有某些知识点没有特别清楚。建议学习后，再练习习题，而不要一味的做题。知识点可以参考雷哥知识库。
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="jy-wrap">
                        60%以下，背诵数学词汇，看数学知识点，逐个攻破。之后，再去做题。先看OG math review，掌握考试大纲及基本词汇后，再做OG数学部分。如果还有知识点有问题，可以看雷哥知识库或《陈向东数学高分突破》或上网搜索，稍微熟悉一点后，再做真题。
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</section>
</body>
</html>