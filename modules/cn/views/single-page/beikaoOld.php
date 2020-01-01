<link rel="stylesheet" href="/cn/css/beikao.css">
<link rel="stylesheet" href="/cn/css/common.css?v=1.1.2">
<div class="beikao-banner">
    <?php
    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '563','page'=>1,'pageSize' => 1]);
    foreach($data as $v) {
        ?>
        <a href="<?php echo $v['answer'] ?>">
            <img src="<?php echo $v['image'] ?>" alt="banner"/>
        </a>
        <?php
    }
    ?>
</div>
<div class="beikao-content wrapper">
    <div class="beikao-left content">
        <div class="theiaStickySidebar">
        <!--一周热门-->
        <div class="beikao-title">
            <div class="beikao-t-bg">
                <img src="/cn/images/beikao/beikao-hot.png" alt="标题图标"/>
                <span>一周热门</span>
                <img src="/cn/images/beikao/beikao-bg.png" alt="标题背景" class="bg"/>
            </div>
            <a href="/beikao/537.html">MORE</a>
        </div>
        <div class="yizhou-hot">
            <ul>
                <?php
                $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0 and hot=2','fields' => 'answer,alternatives','category' => '537','order'=>'alternatives DESC','page'=>1,'pageSize' => 4]);
                foreach($data as $v) {
                    ?>
                    <li>
                        <div class="yizhou-left">
                            <a href="/beikao/d-537-<?php echo $v['id'] ?>.html">
                                <img src="<?php echo $v['image'] ?>" alt="图片"/>
                            </a>
                        </div>
                        <div class="yizhou-right">
                            <p class="ellipsis-2">
                                <a href="/beikao/d-537-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                            </p>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?> | 关注度：<?php echo $v['viewCount'] ?></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <!--词汇-->
        <div class="beikao-title">
            <div class="beikao-t-bg diff02">
                <img src="/cn/images/beikao/beikao-cihui.png" alt="标题图标"/>
                <span>词汇</span>
                <img src="/cn/images/beikao/beikao-bg02.png" alt="标题背景" class="bg"/>
            </div>
            <a href="beikao/538.html">MORE</a>
        </div>
        <div class="beikao-cihui">
            <div class="cihui-left">
                <?php $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' => '538','pageSize' => 1,'order'=>'alternatives DESC']); ?>
                <img src="<?php echo $data[0]['image'] ?>" alt="图片"/>
                <div class="cihui-mask">
                    <span><?php echo $data[0]['name'] ?></span>
                </div>
            </div>
            <div class="cihui-right">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '538','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <b>●</b>
                            <a href="/beikao/d-538-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--阅读-->
        <div class="beikao-title">
            <div class="beikao-t-bg diff02">
                <img src="/cn/images/beikao/beikao-read.png" alt="标题图标"/>
                <span>阅读</span>
                <img src="/cn/images/beikao/beikao-bg02.png" alt="标题背景" class="bg"/>
            </div>
            <a href="beikao/540.html">MORE</a>
        </div>
        <div class="beikao-cihui">
            <div class="cihui-left">
                <?php $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' => '540','pageSize' => 1,'order'=>' alternatives DESC']); ?>
                <img src="<?php echo $data[0]['image'] ?>" alt="图片"/>
                <div class="cihui-mask">
                    <span><?php echo $data[0]['name'] ?></span>
                </div>
            </div>
            <div class="cihui-right">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '540','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <b>●</b>
                            <a href="beikao/d-540-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--填空-->
        <div class="beikao-title">
            <div class="beikao-t-bg diff02">
                <img src="/cn/images/beikao/beikao-tiankong.png" alt="标题图标"/>
                <span>填空</span>
                <img src="/cn/images/beikao/beikao-bg02.png" alt="标题背景" class="bg"/>
            </div>
            <a href="beikao/539.html">MORE</a>
        </div>
        <div class="beikao-cihui">
            <div class="cihui-left">
                <?php $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' => '539','pageSize' => 1,'order'=>' alternatives DESC']); ?>
                <img src="<?php echo $data[0]['image'] ?>" alt="图片"/>
                <div class="cihui-mask">
                    <span><?php echo $data[0]['name'] ?></span>
                </div>
            </div>
            <div class="cihui-right">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '539','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <b>●</b>
                            <a href="beikao/d-539-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--数学-->
        <div class="beikao-title">
            <div class="beikao-t-bg diff02">
                <img src="/cn/images/beikao/beikao-shuxue.png" alt="标题图标"/>
                <span>数学</span>
                <img src="/cn/images/beikao/beikao-bg02.png" alt="标题背景" class="bg"/>
            </div>
            <a href="beikao/541.html">MORE</a>
        </div>
        <div class="beikao-cihui">
            <div class="cihui-left">
                <?php $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' => '541','pageSize' => 1,'order'=>' alternatives DESC']); ?>
                <img src="<?php echo $data[0]['image'] ?>" alt="图片"/>
                <div class="cihui-mask">
                    <span><?php echo $data[0]['name'] ?></span>
                </div>
            </div>
            <div class="cihui-right">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '541','page'=>1,'pageSize' => 7,'order'=>'alternatives DESC']);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <b>●</b>
                            <a href="beikao/d-541-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--写作-->
        <div class="beikao-title">
            <div class="beikao-t-bg diff02">
                <img src="/cn/images/beikao/beikao-write.png" alt="标题图标"/>
                <span>写作</span>
                <img src="/cn/images/beikao/beikao-bg02.png" alt="标题背景" class="bg"/>
            </div>
            <a href="beikao/542.html">MORE</a>
        </div>
        <div class="beikao-cihui">
            <div class="cihui-left">
                <?php $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'alternatives','category' => '542','pageSize' => 1,'order'=>' alternatives DESC']); ?>
                <img src="<?php echo $data[0]['image'] ?>" alt="图片"/>
                <div class="cihui-mask">
                    <span><?php echo $data[0]['name'] ?></span>
                </div>
            </div>
            <div class="cihui-right">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,alternatives','category' => '542','page'=>1,'pageSize' => 7,'order'=>' alternatives DESC']);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <b>●</b>
                            <a href="beikao/d-542-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a>
                            <span><?php echo date("Y-m-d",strtotime($v['alternatives'])) ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
    </div>
    <?php use app\commands\front\RightWidget; ?>
    <?php RightWidget::begin(); ?>
    <?php RightWidget::end(); ?>
    <div class="clearfix"></div>
</div>

