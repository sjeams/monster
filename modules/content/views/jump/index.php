
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">GRE跳转图设置</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/jump/add">添加跳转图</a>
        </li>
    </ul>
    <form action="/content/jump/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    资料ID：
                    <input name="id" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['id'])?$_GET['id']:''?>"/>
                </td>
                <td>
                    资料内容：
                    <input name="content" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['content'])?$_GET['content']:''?>"/>
                </td>
                <td>
                    资料来源：
                    <select name="type" >
                        <option value="" <?php echo isset($_GET['type'])&&$_GET['type']==0?'selected':'' ;?>  >默认为空</option>
                        <option value="1" <?php echo isset($_GET['type'])&&$_GET['type']==1?'selected':'' ;?>  >H5</option>
                        <option value="2" <?php echo isset($_GET['type'])&&$_GET['type']==2?'selected':'' ;?>  >课程活动</option>
                        <option value="3" <?php echo isset($_GET['type'])&&$_GET['type']==3?'selected':'' ;?>  >刷题活动</option>
                    </select>
                    <!-- <input name="type" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['type'])?$_GET['type']:''?>"/> -->
                </td>
                <td>
                    展示位置：
                    <select name="belong" >
                        <option value="" <?php echo isset($_GET['belong'])&&$_GET['belong']==0?'selected':'' ;?>  >默认为空</option>
                        <option value="1" <?php echo isset($_GET['belong'])&&$_GET['belong']==1?'selected':'' ;?>  >做题模考</option>
                        <option value="2" <?php echo isset($_GET['belong'])&&$_GET['belong']==2?'selected':'' ;?>  >开屏图</option>
                        <option value="3" <?php echo isset($_GET['belong'])&&$_GET['belong']==3?'selected':'' ;?>  >课程活动</option>
                    </select>
                    <!-- <input name="belong" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['belong'])?$_GET['belong']:''?>"/> -->
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/jump/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th style="width: 120px;">排序</th>
                <th style="width: 120px;">ID</th>
                <th>来源</th>
                <th>内容</th>
                <th>展示位置</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $kss => $v) {
                if($kss == 10){
                    break;
                }
                ?>
                <tr>
                    <input name="id[]" type="hidden"  value="<?php echo $v['id']?>">
                    <td><input type="text" style="width: 30px;" name="sort[]" value="<?php echo $v['sort']?>"/></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo  $v['belong']=='1'?'做题模考':( $v['belong']=='2'?'提分课' :'刷题活动') ; ?></span></td>
                    <td ><div style="word-break: break-all;height: 40px;overflow: hidden"><?php echo $v['content']?></div></td>
                    <td><span><?php echo $v['belong']=='1'?'做题模考':( $v['belong']=='2'?'开屏图' :'课程活动'); ?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/content/jump/add?id=<?php echo $v['id']; ?>">修改</a>
                            <a class="btn" href="/content/jump/delete?id=<?php echo $v['id'] ; ?>" >删除</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <button class="push btn btn-primary" type="submit">排序</button>
    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;
        echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
</div>