
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">GRE课程设置</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/curriculum/add">添加课程</a>
        </li>
    </ul>
    <form action="/content/curriculum/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    课程名称：
                </td>
                <td>
                    <input name="name" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['name'])?$_GET['name']:''?>"/>
                </td>
                <td>
                    课程ID：
                </td>
                <td>
                    <input name="rid" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['rid'])?$_GET['rid']:''?>"/>
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
    <form action="/content/curriculum/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>课程名称</th>
                <th>代表课程ID</th>
                <th>课程ID</th>
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
                    <td><span><?php echo $v['name']?></span></td>
                    <td ><div style="word-break: break-all;height: 40px;overflow: hidden"><?php echo $v['representativeid']?></div></td>
                    <td><span><?php echo $v['contentid']?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/content/curriculum/add?id=<?php echo $v['id']; ?>">修改</a>
                            <a class="btn" href="/content/curriculum/delete?id=<?php echo $v['id'] ; ?>" >删除</a>
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