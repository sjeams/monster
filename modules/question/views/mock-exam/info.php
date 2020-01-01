<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li>模考题目管理<span class="divider">/</span></li>
        <li>单项列表<span class="divider">/</span></li>
        <li class="active">题目选择</li>
    </ul>

    <form action="/question/mock-exam/search-question" method="get">
        <input name="questionId" class="input-small" placeholder="id或标题" type="text" size="10" value=""> <input type="submit" value="查询">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th style="width: 50px;">选择</th>
                <th width="80">ID</th>
                <th>题目管理</th>
                <th>题目详细</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><input type="radio" name="ids" size="10" style="zoom:150%;" value="<?php echo $v['id'] ?>"></td>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['stem'];?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/question/mock-exam/question?id=<?php echo $v['id'] ?>">详情</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="sectionId" value="<?php echo $sectionId?>">
        <input type="hidden" name="url" value="">
    </form>

    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
