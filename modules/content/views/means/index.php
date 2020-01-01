
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">GRE资料设置</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/means/add">添加资料</a>
        </li>
    </ul>
    <form action="/content/means/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    资料名称：
                    <input name="content" class="input-large" size="25" type="text" class="number" value="<?php echo isset($_GET['content'])?$_GET['content']:''?>"/>
                </td>
                <td>
                    资料ID：
                    <input name="id" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['id'])?$_GET['id']:''?>"/>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/means/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th style="width: 120px;">排序</th>
                <th style="width: 120px;">ID</th>
                <th>资料名称</th>
                <th>微信</th>
                <th>来源</th>
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
                    <td><span><?php echo $v['chat']?></span></td>
                    <td ><div style="word-break: break-all;height: 40px;overflow: hidden"><?php echo $v['content']?></div></td>
                    <td><span><?php echo $v['belong']=='1'?'做题模考':''; ?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/content/means/add?id=<?php echo $v['id']; ?>">修改</a>
                            <a class="btn" href="/content/means/delete?id=<?php echo $v['id'] ; ?>" >删除</a>
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