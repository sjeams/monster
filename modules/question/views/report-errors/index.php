<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">错误题反馈</li>
    </ul>
    <form action="<?php echo baseUrl?>/question/report-errors/index" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    审核：&nbsp;&nbsp;
                    <select name="examine">
                        <option value="0">请选择</option>
                        <option value="1" <?php echo isset($_GET['examine']) && $_GET['examine'] == 1?'selected':''?>>通过</option>
                        <option value="2" <?php echo isset($_GET['examine']) && $_GET['examine'] == 2?'selected':''?>>未通过</option>
                        <option value="3" <?php echo isset($_GET['examine']) && $_GET['examine'] == 3?'selected':''?>>未审核</option>
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
                <th>错误题ID</th>
                <th>反馈人</th>
                <th>题干</th>
                <th>错误类型</th>
                <th>错误描述</th>
                <th>反馈时间</th>
                <th>审核</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['questionId'] ?></span></td>
                    <td><span><?php echo $v['user'] ?></span></td>
                    <td><span><?php echo $v['stem'] ?></span></td>
                    <td><span><?php echo $v['errorsType'] ?></span></td>
                    <td><span><?php echo $v['errorsContent'] ?></span></td>
                    <td><span><?php echo date("Y-m-d H:i:s",$v['createTime'])?></span></td>
                    <td><span><?php if($v['examine']==1){ echo "通过"; } elseif($v['examine']==2){ echo "未通过"; }else{ echo "未审核"; }  ?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
                            <?php if ($v['examine'] == 0):?>
                                <a class="btn" href="/question/report-errors/examine?id=<?php echo $v['id'] ?>&url=<?php echo Yii::$app->request->getUrl() ?>">审核</a>
                            <?php endif;?>
                            <a class="btn" href="javascript:;" onclick="errorDelete(<?php echo $v['id'] ?>)">删除</a>
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
        <span style="font-size: 17px;position: relative;bottom: 7px;">共<?php echo $total;?>条&nbsp;</span>
        <input type="hidden" id="jumpUrl" value="<?php echo Yii::$app->request->getUrl();?>" />
        <?php if($total > 100){?>
            <span style="font-size: 17px;position: relative;bottom: 5px;">
            <a onclick="jumpPage()"  style="cursor: pointer;">Go</a>&nbsp;
            <input type="text" style="width: 20px;height: 18px;" id="jumpPage">&nbsp;页
        </span>
        <?php }?>
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
    <script>
        function errorDelete(o) {
            var r = confirm("是否确定删除错误反馈");
            if (r == true) {
                $.ajax({
                    url: "/question/report-errors/delete",
                    dataType: "json",
                    data: {
                        id: o //ID
                    },
                    type: "get",
                    success: function (re) {
                        alert(re.message);
                        location.reload();
                    }
                });
            }
        }
        function jumpPage(){
            var url = $('#jumpUrl').val();
            var page = $("#jumpPage").val();
            if(isNaN(page) || page <= 0 || !page){
                alert('请输入正确的数值');
                return false;
            }
            var res = url.indexOf('page');
            if(res > 0){
                var u = url.replace(/page=(\d+)/,'page='+page);
            }else{
                var re = url.indexOf('?');
                if(re > 0){
                    u = url+'&page='+page;
                }else{
                    u = url+'?page='+page;
                }
            }
            location.href = u;
        }
    </script>
