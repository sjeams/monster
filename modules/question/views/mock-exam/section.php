<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li>模考题目管理<span class="divider">/</span></li>
        <li class="active">单项列表</li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>模考ID</th>
                <th>单项ID</th>
                <th>创建时间</th>
                <th>题目集合</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $k => $v) {
                ?>
                <tr>
                    <td><?php echo $v['mockExamId'] ?></td>
                    <td><span><a href="/question/mock-exam/info?id=<?php echo $v['id'] ?>"><?php echo $v['id'] ?></a></span></td>
                    <td><?php echo date('Y-m-d H:i:s', $v['createTime']) ?></td>
                    <td><span><a class="btn" href="/question/mock-exam/info?id=<?php echo $v['id'] ?>">详情</a></span></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
