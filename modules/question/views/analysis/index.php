<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">解析管理</li>
    </ul>
    <form action="<?php echo baseUrl?>/question/analysis/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    问题ID：&nbsp;&nbsp;
                    <input name="id"  size="25" type="text" value="<?php echo isset($_GET['id'])?$_GET['id']:'' ?>"/>
                </td>
                <td>
                    用户名：&nbsp;&nbsp;
                    <input name="username"  size="25" type="text" value="<?php echo isset($_GET['username'])?$_GET['username']:'' ?>"/>
                </td>
                <td>
                    用户昵称：&nbsp;&nbsp;
                    <input name="nickname"  size="25" type="text" value="<?php echo isset($_GET['nickname'])?$_GET['nickname']:'' ?>"/>
                </td>
            </tr>
            <tr>

                <td>
                    解析类型：&nbsp;&nbsp;
                    <select name="type" id="sort-select">
                        <option value="">请选择</option>
                        <option value="2" <?php echo isset($_GET['type']) && $_GET['type'] == 2?'selected':''?>>音频解析</option>
                        <option value="1" <?php echo isset($_GET['type']) && $_GET['type'] == 1?'selected':''?>>网友解析</option>
                    </select>
                </td>

                <td>
                    是否发表：&nbsp;&nbsp;
                    <select name="publish" id="sourceSelect">
                        <option value="">请选择</option>
                        <option value="1" <?php echo isset($_GET['publish']) && $_GET['publish'] == 1?'selected':''?> >已发表</option>
                        <option value="2" <?php echo isset($_GET['publish']) && $_GET['publish'] == 2?'selected':''?>>未发表</option>
                    </select>
                </td>
                <td>
                    解析时间：
                    <input class="input-small Wdate" onclick="WdatePicker()" type="text" size="10"  name="beginTime" value="<?php echo isset($_GET['beginTime'])?$_GET['beginTime']:''?>"/> - <input class="input-small Wdate" onclick="WdatePicker()"  size="10" type="text" name="endTime"  value="<?php echo isset($_GET['endTime'])?$_GET['endTime']:''?>"/>
                </td>

                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
            </tr>
        </table>
    </form>
    <button class="btn btn-primary" onclick="checked(1)">全选</button>&nbsp;
    <button class="btn btn-primary" onclick="checked(2)">全部取消</button>&nbsp;
    <button class="btn btn-primary" onclick="publish(1)">发表</button>&nbsp;
    <button class="btn btn-primary" onclick="publish(2)">取消发表</button>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="50"></th>
                <th width="50">ID</th>
                <th width="50">问题ID</th>
                <th>用户名</th>
                <th>用户昵称</th>
                <th>解析类型</th>
                <th>是否发表</th>
                <th>解析时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><input type="checkbox"  class="publish" value="<?php echo $v['id'] ?>"/></td>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['questionId'] ?></span></td>
                    <td><span><?php echo $v['userName'] ?></span></td>
                    <td><span><?php echo $v['nickname'] ?></span></td>
<!--                    <td><span>--><?php //if($v['type']==1){ echo $v['analysisContent']; } elseif($v['type']==2){ echo $v['audio'];} ?><!--</span></td>-->
                    <td><span><?php if($v['type']==1){ echo "网友解析"; } elseif($v['type']==2){ echo "音频解析";} ?></span></td>
                    <td><a href="/question/analysis/publish?id=<?php echo $v['id'];?>"><?php if($v['publish']==1){ echo "取消发表"; } elseif($v['publish']==2){ echo "发表";} ?></a></td>
                    <td><span><?php echo date("Y-m-d H:i:s",$v['createTime']) ?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/question/analysis/update?id=<?php echo $v['id'] ?>">查看</a>
                            <a class="btn" href="javascript:;" onclick="deleteA(<?php echo $v['id'] ?>)">删除</a>
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
        <span style="font-size: 17px;position: relative;bottom: 7px;">共<?php echo $count;?>条&nbsp;</span>
        <input type="hidden" id="jumpUrl" value="<?php echo Yii::$app->request->getUrl();?>" />
        <?php if($count > 100){?>
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
        function deleteA(o) {
            var r = confirm("是否确定删除此解析");
            if (r == true) {
                $.ajax({
                    url: "/question/analysis/delete",
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
        function publish(type){
            var ids = '';
            $("input[class='publish']:checked").each(function(e){
                if(e>=0){
                    var id = $(this).val();
                    ids = ids+','+id;
                }
            });
            ids = ids.substring(1);
            $.ajax({
                url:'/question/analysis/update-publish',
                dataType:'json',
                type:'post',
                data:{
                    ids:ids,
                    type:type,//1-发表 2-取消发表
                },
                success:function(e){
                    if(e.code ==1){
                        alert(e.message);
                        location.reload();
                    }else{
                        alert(e.message);
                    }
                }
            });
        }
        function checked(w){
            $("input[type='checkbox']").each(function(r){
                if(r>=0){
                    if(w == 1){
                        $(this).prop('checked',true);
                    }else{
                        $(this).prop('checked',false);
                    }
                }
            });
        }
    </script>

