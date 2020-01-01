<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li>模考题目管理<span class="divider">/</span></li>
        <li>单项列表 <span class="divider">/</span></li>
        <li>详情 </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>描述</th>
                <th>详情</th>
                <th>答案</th>
                <th>创建时间</th>
                <th>更新时间</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['stem'];?></span></td>
                    <td><span><?php echo $v['details'];?></span></td>
                    <td><span><?php echo $v['answer'];?></span></td>
                    <td><span><?php echo date('Y-m-d H:i:s', $v['createTime']);?></span></td>
                    <td><span><?php echo date('Y-m-d H:i:s', $v['updateTime']);?></span></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    </div>
