<link rel="stylesheet" href="/cn/css/teachers.css?v=1"/>
<div class="teabig">
    <ul>
        <?php foreach($teachers as $k => $v){
            if($k%2 == 0){
            ?>
                <li>
                    <div class="teaLeft">
                        <a href="/teacher/<?php echo $v['id']; ?>.html">
                            <div class="leftTopY topLeft"><span><?php echo $v['name']; ?></span></div>
                            <div class="circleImg"><img src="<?php echo $v['image']; ?>" alt="<?php echo $v['name']; ?>"></div>
                        </a>
                    </div>
                    <div class="teaRight ml">
                        <div class="teaR_left">
                            <a href="/teacher/<?php echo $v['id']; ?>.html"><h3><?php echo $v['name']; ?></h3></a>
                            <ul>
                                <?php foreach($v['label'] as $kl => $vl){
                                    if($kl%4 == 0) echo "<li class='bacOrange'>$vl</li>";
                                    if($kl%4 == 1) echo "<li class='bacGreen'>$vl</li>";
                                    if($kl%4 == 2) echo "<li class='bacBlue'>$vl</li>";
                                    if($kl%4 == 3) echo "<li class='bacPurple'>$vl</li>";

                                }?>
                            </ul>
                            <div style="clear: both"></div>
                            <h4><?php echo $v['introduce']; ?></h4>
                            <p>
                                <?php echo $v['detail']; ?>
                            </p>
                        </div>
                        <div class="teaR_right">
                            <h3>授课科目</h3>
                            <ul>
                                <?php
                                    foreach($v['course'] as $kc => $kv){
                                        echo " <li>";
                                        if($kc == 0)
                                            echo "<a href='/course/".$kv[1].".html'>● ".$kv[0]."</a>";
                                        else
                                            echo"<a href='/course/".$kv[1].".html'>● ".$kv[0]."</a>";

                                        echo "<a target=blank href=tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes>
                                        <input type=\"button\" value=\"预约\"/></a>
                                    </li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </li>
                <?php
            }else{
                ?>
                <li>
                    <div class="teaRight">
                        <div class="teaR_left">
                            <a href="/teacher/<?php echo $v['id']; ?>.html"><h3><?php echo $v['name']; ?></h3></a>
                            <ul>
                                <?php foreach($v['label'] as $kl => $vl){
                                    if($kl%4 == 0) echo "<li class='bacOrange'>$vl</li>";
                                    if($kl%4 == 1) echo "<li class='bacGreen'>$vl</li>";
                                    if($kl%4 == 2) echo "<li class='bacBlue'>$vl</li>";
                                    if($kl%4 == 3) echo "<li class='bacPurple'>$vl</li>";

                                }?>
                            </ul>
                            <div style="clear: both"></div>
                            <h4><?php echo $v['introduce']; ?></h4>
                            <p><?php echo $v['detail']; ?></p>

                        </div>
                        <div class="teaR_right">
                            <h3>授课科目</h3>
                            <ul>
                                <?php
                                foreach($v['course'] as $kc => $kv){
                                    echo " <li>";
                                    if($kc == 0)
                                        echo "<a href='/course/".$kv[1].".html'>● ".$kv[0]."</a>";
                                    else
                                        echo"<a href='/course/".$kv[1].".html'>● ".$kv[0]."</a>";

                                        echo "<a target=blank href=tencent://message/?uin=2095453331&Site=www.cnclcy&Menu=yes>
                                        <input type=\"button\" value=\"预约\"/></a>
                                    </li>";
                                }
                               ?>
                            </ul>
                        </div>
                    </div>
                    <div class="teaLeft ml">
                        <a href="/teacher/<?php echo $v['id']; ?>.html">
                            <div class="leftTopY topRight"><span><?php echo $v['name']; ?></span></div>
                            <div class="circleImg"><img src="<?php echo $v['image']; ?>" alt="amanda"></div>
                        </a>
                    </div>
                    <div style="clear: both"></div>
                </li>
            <?php
            }
        }?>


    </ul>
</div>
<div style="clear: both"></div>
<!--<div class="bottomA">-->
<!--    <a href="/teachers/teacherin/">欢迎海内外GRE名师入驻</a>-->
<!--</div>-->
