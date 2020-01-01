<?php use app\libs\Method; ?>
<?php $userData = Yii::$app->session->get('userData')?>
<link rel="stylesheet" href="/cn/css/singleReport.css">
<script src="/cn/js/echarts.js"></script>
<script src="/cn/js/walden.js"></script>
<div class="head-wrap">
    <div class="w12 tm">
        <div><img src="/cn/images/report/gre-title.png" alt="标题图片"/></div>
        <div class="tit-2 tr">
            <p class="u-hint"><strong class="username"><?php echo !empty($userData['nickname'])?$userData['nickname']:$userData['userName'] ?></strong>同学你好，以下是你的<em class="subject">填空</em>单科复习分析报告</p>
            <p class="h-hint">以下出具的数据报告基于你目前所做题目数。</p>
        </div>
    </div>
</div>
<section class="content-wrap">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-titleIcon01.png" alt=""><span class="inb column-tit">填空备考数据</span>
        </div>

        <div class="tm col-1">
            <div class="circle inb">
                <div class="inb mark-wrap">
                    <p>正确率</p>
                    <p><?php echo $data['correct'] ?>%</p>
                </div>
            </div>
            <?php if($data['correct']>80) {
                ?>
                <p class="mark">正确率><em>80%</em>，该科掌握不错</p>
                <p class="sc-hint">一般V160+对于填空的正确率要求>80%。第一个section正确率越高，下一个section进入hard模式几率越高，那么160+的高分概率就越大。</p>
                <?php
            } elseif($data['correct']>65 && $data['correct']<=80) {
                ?>
                <p class="mark">正确率<em>65%-80%</em>，该科掌握一般</p>
                <p class="sc-hint">只需要继续总结分析错题原因，熟练考点，提高正确率即可。</p>
                <?php
            } elseif($data['correct']>50 && $data['correct']<=65) {
                ?>
                <p class="mark">正确率<em>50%-65%</em>，该科掌握较差</p>
                <p class="sc-hint">这部分还需要继续努力呀，填空瓶颈区一般会处在正确率50%-65%左右，要想快速提高正确率，还需要总结分析错题原因，熟练高频词汇用法，熟练考点技巧。</p>
                <?php
            } else {
                ?>
                <p class="mark">正确率<em>50%</em>，该科基本没掌握</p>
                <p class="sc-hint">这部分需要努力的地方还很多，建议系统学习所有知识点后，再次练习。</p>
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
                data: { sectionId:1 },
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
                <?php if($data['correct']>80){
                    ?>
                    <div class="jy-wrap">
                        填空部分的正确率可以达到80%以上，说明你距离V160+更近一步了。在接下来的日子里，只需要保持常规训练，以10-20道左右为佳，维持自己现有的题感就可以了。如果还想继续冲刺，则需要多花一点时间在错题分析上面。资料的话：自己的错题库+近期真题。
                    </div>
                    <?php
                }elseif($data['correct']>65 && $data['correct']<=80) {
                    ?>
                    <div class="jy-wrap">
                        65%-80%，填空部分想做好，单词是基础性的，但是不是决定性的。关键在于逻辑和做题的技巧。根据关键词汇来判断语言上的基本逻辑关系，寻找句子中的重复关系，判断语气或感情色彩，推理判断时注意避免发散思维。所以需要多做总结，不要题海战术，先不要看答案，把整个句子的走向看一遍，觉得它本身是正还是反，然后有没有转折、因果这些逻辑。先看句子间大逻辑，再看单个小句子的小逻辑就能解决了。
                    </div>
                    <?php
                } elseif($data['correct']>50 && $data['correct']<=65) {
                    ?>
                    <div class="jy-wrap">
                        50%-65%，建议重新过一遍词汇，填空部分想做好，单词是基础性的，但是不是决定性的，关键在于逻辑和做题的技巧。根据关键词汇来判断语言上的基本逻辑关系，寻找句子中的重复关系，判断语气或感情色彩，推理判断时注意避免发散思维。所以需要多做总结，不要题海战术，先不要看答案，把整个句子的走向看一遍，觉得它本身是正还是反，然后有没有转折、因果这些逻辑。先看句子间大逻辑，再看单个小句子的小逻辑就能解决了。
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="jy-wrap">
                        50%以下，重新学习吧。填空高频率词汇背诵3-5遍，再学习填空做题技巧和方法，按照方法练习。
                        <!--<a href="https://gmat.viplgw.cn/learn/64.html">（https://gmat.viplgw.cn/learn/64.html）</a>-->
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