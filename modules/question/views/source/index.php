<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">来源管理</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/question/source/add">添加来源</a>
        </li>
    </ul>
    <form action="<?php echo baseUrl?>/question/source/index" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    单项类型：&nbsp;&nbsp;
                    <select name="cat" id="sort-select">
                        <option value="">请选择</option>
                        <option value="1" <?php echo isset($_GET['cat']) && $_GET['cat'] == 1?'selected':''?>>填空</option>
                        <option value="2" <?php echo isset($_GET['cat']) && $_GET['cat'] == 2?'selected':''?>>阅读</option>
                        <option value="3" <?php echo isset($_GET['cat']) && $_GET['cat'] == 3?'selected':''?>>数学</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>来源</th>
                <th>来源别名</th>
                <th>来源排序</th>
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
                    <td><span><?php echo $v['alias'] ?></span></td>
                    <td><span><?php echo $v['sort'] ?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
<!--                            <a class="btn" href="#">内容管理</a>-->
                            <a class="btn" href="javascript:;" onclick="deleteS(<?php echo $v['id'] ?>)">删除</a>
                            <a class="btn" href="/question/source/update?id=<?php echo $v['id'] ?>&catId=<?php echo $v['catId'];?>">修改</a>
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
    <script>
        function deleteS(o) {
            var r = confirm("是否确定删除此來源");
            if (r == true) {
                $.ajax({
                    url: "/question/source/delete",
                    dataType: "json",
                    data: {
                        id: o //问题ID
                    },
                    type: "get",
                    success: function (re) {
                        alert(re.message);
                        location.reload();
                    }
                });
            }
        }
    </script>