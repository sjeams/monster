<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>
<style>
.hidden-class{display:none;}
.block-class{display:block;}
</style>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">小库管理</li>
    </ul>
    <form action="<?php echo baseUrl?>/question/section-library/add/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    题库名：&nbsp;&nbsp;
                    <input type="text" name="libName">
                </td>
                <td>
                    生成模式：&nbsp;&nbsp;
                    <select name="stype">
                        <option value="1">手动生成</option>
                        <option value="2">自动生成</option>
                    </select>
                </td>
                <td>
                    单项：&nbsp;&nbsp;
                    <select name="catId" id="sort-select">
                        <option value="" id="xuanzhe01">请选择</option>
                        <?php
                        if(isset($cats)) {
                            foreach ($cats as $v) {
                                ?>
                                <option
                                    value="<?php echo $v['id'] ?>" <?php echo isset($_GET['catId']) && $_GET['catId'] == $v['id'] ? 'selected' : '' ?>><?php echo $v['name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    来源：&nbsp;&nbsp;
                    <select name="sourceId" id="sourceSelect">
                        <option value="">请选择</option>
                        <?php
                        if(isset($sources)) {
                            foreach ($sources as $v) {
                                ?>
                                <option
                                    value="<?php echo $v['id'] ?>" <?php echo isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id'] ? 'selected' : '' ?>><?php echo $v['name'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td id="read-num" style="display: none">
                    选择阅读数：&nbsp;&nbsp;
                    <select name="readNum" id="read-num">
                        <option value="3">三篇文章</option>
                        <option value="4">四篇文章</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">添加</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>小库名称</th>
                <th>单项</th>
                <th>来源</th>
                <th>知识点</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($queLib)) {
                foreach ($queLib as $v) {
                    ?>
                    <tr>
                        <td class="tikuid"><?php echo $v['id'] ?></td>
                        <td class="updateName"><span><?php echo $v['name'] ?></span><input type="hidden" value=" <?php echo $v['name'] ?>"></td>
                        <td><span><?php echo $v['cName'] ?></span></td>
                        <td><span><?php echo $v['sName'] ?></span></td>
                        <td><span><?php echo $v['kName'] ?></span></td>
                        <td><span><?php echo date("Y-m-d H:i:s", $v['createTime']) ?></span></td>
                        <td class="notSLH" style="width: 247px;">
                            <div>
                                <!--                            <a class="btn" href="#">内容管理</a>-->
                                <!--                            <a class="btn" href="javascript:;">删除</a>-->
                                <a class="btn" href="/question/section-library/update?id=<?php echo $v['id'] ?>">修改</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    <div class="pagination pagination-right">
<!--        --><?php //use yii\widgets\LinkPager;?>
<!--        --><?php //echo LinkPager::widget([
//            'pagination' => $page,
//        ])?>
    </div>
    <script>
        $(".updateName").dblclick(function(){
            // alert( $(this).children().text());
            var objSpan =$(this).children('span');
            var objIpnut =$(this).children('input');
            $(objSpan).addClass('hidden-class');
            $(objIpnut).attr('type','text');
            // 获取焦点
            $(objIpnut).focus();
             //失去焦点
             $(objIpnut).blur(function(){
                // alert( $(this).parent().prev().text());
                var id =$(objSpan).parent().prev().text();
                var name =$(objIpnut).val();
                // var  conf = confirm("确认修改题库名称？");
                if(confirm("确认修改题库名称？")) {
                    $.ajax({
                        url: '/question/section-library/update-name',
                        data: {id: id,name : name},
                        dataType: 'json',
                        type: 'post',
                        success: function (data) {
                            if (data == 1) {
                                // alert("修改成功");
                                $(objSpan).removeClass('hidden-class');
                                $(objSpan).text(name);
                                $(objIpnut).attr('type','hidden');
                            } else {
                                // alert("修改失败");
                                $(objSpan).removeClass('hidden-class');
                                // alert($(objIpnut).val());
                                $(objIpnut).val(name);
                                $(objIpnut).attr('type','hidden');
                            }
                        }
                    });
                }else{
                    $(objSpan).removeClass('hidden-class');
                    $(objIpnut).attr('type','hidden');
                }
                windows.location.reload();
                });
            });

        $("#sort-select").change(function(){
            var id=$(this).val();
            $("#xuanzhe01").hide();
            if(id==2){//阅读
                $(".read-hide").show();
                $("#read-num").css({
                    display:'block'
                });
            }else{
                $(".read-hide").hide();
                $("#read-num").css({
                    display:'none'
                });
            }
            if(id==3){//数学
                $("#quantBox").show();
            }else{
                $("#quantBox").hide();
            }
            if(id){
                $.ajax({
                    url:"/question/api/change-cat",
                    data:{
                        id:id
                    },
                    type:"post",
                    dataType:"json",
                    success:function(data){
                        var know=data.know;
                        var source=data.source;
                        var type=data.type;
                        var str='',str02='',str03='';
                        $(".sort-showD").show();
                        for(var i=0;i<know.length;i++){
                            str+='<option value="'+know[i].id+'">'+know[i].name+'</option>';
                        }
                        $("#knowSelect").html(str);
                        for(var j=0;j<source.length;j++){
                            str02+='<option value="'+source[j].id+'">'+source[j].name+'</option>';
                        }
                        $("#sourceSelect").html(str02);
                        for(var b=0;b<type.length;b++){
                            str03+='<option value="'+type[b].id+'">'+type[b].name+'</option>';
                        }
                        $("#typeSelect").html(str03);

                    }
                });
            }
        });
    </script>

