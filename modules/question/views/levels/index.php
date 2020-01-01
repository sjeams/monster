<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">难度分类管理</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/question/levels/add">添加单项分类</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>难度</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['name'] ?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
<!--                            <a class="btn" href="#">内容管理</a>-->
<!--                            <a class="btn" href="javascript:;">删除</a>-->
                            <a class="btn" href="/question/levels/update?id=<?php echo $v['id'] ?>">修改</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
