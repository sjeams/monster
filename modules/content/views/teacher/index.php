
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">GRE名师</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/teacher/add">添加内容</a>
        </li>
    </ul>
    <form action="/content/teacher/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    老师：
                </td>
                <td>
                    <input name="name" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['name'])?$_GET['name']:''?>"/>
                </td>
                <td>
                    标签：
                </td>
                <td>
                    <input name="label" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['label'])?$_GET['label']:''?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/teacher/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>老师姓名</th>
                <th width="100px">图片</th>
                <th>标签</th>
                <th>授课科目</th>
                <th >简介</th>
                <th>详情</th>
                <th>添加时间</th>
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
                    <td><span><?php echo $v['name']?></span></td>
                    <td ><div style="word-break: break-all;height: 40px;overflow: hidden"><?php echo $v['image']?></div></td>
                    <td><span><?php echo $v['label']?></span></td>
                    <td><p class="ellipsis"><?php echo $v['course']?></p></td>
                    <td><p class="ellipsis"><?php echo $v['introduce']?></p></td>
                    <td>
                        <div style="height: 40px;overflow: hidden"><?php echo $v['detail']?></div>
                    </td>
                    <td><span><?php echo $v['createTime']?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/content/teacher/add?id=<?php echo $v['id']; ?>">修改</a>
                            <a class="btn" href="/content/teacher/delete?id=<?php echo $v['id'] ; ?>" >删除</a>
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