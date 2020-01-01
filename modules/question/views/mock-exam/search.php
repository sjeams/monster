<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li>模考题目管理 <span class="divider">/</span></li>
        <li>单项列表 <span class="divider">/</span></li>
        <li>搜索详情 </li>
    </ul>
    <form action="/question/mock-exam/replace" method="post">
        <input type="submit" value="确认替换" onclick="if(!confirm('replace?')) return false;">
        <input type="hidden" name="sectionId" value="<?php echo $sectionId;?>">
        <input type="hidden" name="replaceId" value="<?php echo $replaceId;?>">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th style="width: 50px;">选择</th>
                <th width="80">ID</th>
                <th>题目描述</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $v) {
                ?>
                <tr>
                    <td><input type="radio" name="rep" size="10" style="zoom:150%;" value="<?php echo $v['id'] ?>"></td>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['stem'];?></span></td>
                    <td><span><?php echo date('Y-m-d H:i:s', $v['createTime']);?></span></td>
                    <td><a class="btn" href="/question/mock-exam/question?id=<?php echo $v['id'] ?>"><span>详情</span></a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    </div>
