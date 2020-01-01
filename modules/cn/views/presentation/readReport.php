<?php use app\libs\Method; ?>
<?php $userData = Yii::$app->session->get('userData')?>
<link rel="stylesheet" href="/cn/css/singleReport.css">
<script src="/cn/js/echarts.js"></script>
<script src="/cn/js/walden.js"></script>
<div class="head-wrap">
    <div class="w12 tm">
        <div><img src="/cn/images/report/gre-title.png" alt="标题图片"/></div>
        <div class="tit-2 tr">
            <p class="u-hint"><strong class="username"><?php echo !empty($userData['nickname'])?$userData['nickname']:$userData['userName'] ?></strong>同学你好，以下是你的<em class="subject">阅读</em>单科复习分析报告</p>
            <p class="h-hint">以下出具的数据报告基于你目前所做题目数。</p>
        </div>
    </div>
</div>
<section class="content-wrap">
    <div class="w12 content">
        <div class="tm column-tit-wrap"><img src="/cn/images/report/gre-titleIcon01.png" alt=""><span class="inb column-tit">阅读备考数据</span>
        </div>

        <div class="tm col-1">
            <div class="circle inb">
                <div class="inb mark-wrap">
                    <p>正确率</p>
                    <p><?php echo $data['correct'] ?>%</p>
                </div>
            </div>
            <?php if($data['correct']>70) {
                ?>
                <p class="mark">正确率><em>70%</em>，该科掌握不错，</p>
                <p class="sc-hint">一般V160+要求RC正确率达到70%以上。</p>
                <?php
            } elseif($data['correct']>50 && $data['correct']<=70) {
                ?>
                <p class="mark">正确率<em>50%-70%</em>，该科掌握一般，</p>
                <p class="sc-hint">RC正确率瓶颈一般会处在正确率50%-60%左右，要想快速提高正确率，需要练习长难句，学习回文定位、快速获取文章结构等做题方法。</p>
                <?php
            } else {
                ?>
                <p class="mark">正确率<<em>50%</em>，该科基本没掌握，</p>
                <p class="sc-hint">建议系统学习所有知识点后，再次练习。</p>
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
                data: { sectionId:2 },
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
                <?php if($data['correct']>70){
                    ?>
                    <div class="jy-wrap">
                        RC的正确率达到70%，并不是说就万事大吉了，一定多去关注自己错题有没有集合在同一篇文章下，对于这种文章，要多注意总结分析结构。每天的练习量需要以文章类型或者题型为主。如果是文章类型的问题，那么要多注意分析文章结构；如果是题型问题，则需要多总结相关的题型技巧。资料的话：自己的错题库+近期真题。
                    </div>
                    <?php
                }elseif($data['correct']>50 && $data['correct']<=70) {
                    ?>
                    <div class="jy-wrap">
                        50%-70%，GRE阅读正确率相对来说是比较容易提升的，分析题型和篇章结构，先分析是什么导致正确率上不去的罪魁祸首。其次，熟悉文章的篇章结构。是否能准备把握文章段落主干关系，观察自己的定位是不是每次都可以定准确。每一篇文章可以稍微多花一点时间用来分析。建议一篇一篇去做，同类型的文章放在一起做。
                    </div>
                    <?php
                } else{
                    ?>
                    <div class="jy-wrap">
                        50%以下，需要背诵单词，长难句训练。精度阅读内容，掌握篇章结构。一篇阅读建议读2-3遍之后，再做题。资料的话，长难句可以看《杨鹏阅读难句》，方法及题型可以参照雷哥知识库。
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