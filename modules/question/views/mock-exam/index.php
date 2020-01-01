<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">模考题目管理</li>
    </ul>
    <form action="/question/mock-exam/section" method="post">
        <input name="questions" placeholder="id或标题" type="text" width="20px">
        <br>
        <input type="submit" name="sub" class="btn btn-primary" value="题目查询">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>模考标题</th>
                <th>所属类别</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><a href="/question/mock-exam/section?id=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
                            <?php echo $v['qname'];?>
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
        $("form").submit( function () {
            if (!$("[name=questions]").val()){
                alert('请填写表单');
                return false;
            }
        } );
    </script>
