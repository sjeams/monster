<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<!-- 编辑器公式插件 -->
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/addKityFormulaDialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/getKfContent.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/defaultFilterFix.js"></script>
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="<?php echo baseUrl?>/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="<?php echo baseUrl?>/content/content/index">内容管理</a> <span class="divider">/</span></li>
        <li class="active">添加内容</li>
    </ul>
    <form action="<?php echo baseUrl?>/content/content/video" method="post" class="form-horizontal">
        <fieldset>
            <input type="hidden" name="contentId" value="<?php echo isset($_GET['pid'])?$_GET['pid']:'' ?>">
            <div class="control-group">
                <label for="modulename" class="control-label">LIVESDKID：</label>
                <input type="text" name="kidId" value="<?php echo isset($data['livesdkid'])?$data['livesdkid']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">房间号：</label>
                <input type="text" name="classroom" value="<?php echo isset($data['classroom'])?$data['classroom']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">老师口令：</label>
                <input type="text" name="teacherKey" value="<?php echo isset($data['teacherKey'])?$data['teacherKey']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">助教口令：</label>
                <input type="text" name="assistantKey" value="<?php echo isset($data['assistantKey'])?$data['assistantKey']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">学生WEB端口令：</label>
                <input type="text" name="webKey" value="<?php echo isset($data['webKey'])?$data['webKey']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">学生客户端口令：</label>
                <input type="text" name="clientKey" value="<?php echo isset($data['clientKey'])?$data['clientKey']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">试听口令：</label>
                <input type="text" name="auditionKey" value="<?php echo isset($data['auditionKey'])?$data['auditionKey']:'' ?>">
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">类型：</label>
                <select name="sdkType" id="">
                    <option value="1" <?php if($data['sdkType']==1){ ?> selected="selected" <?php } ?>>展示</option>
                    <option value="2" <?php if($data['sdkType']==2){ ?> selected="selected" <?php } ?>>CC</option>
                </select>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-primary" onclick="displayEdit()">编辑视频课程</span>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    function displayEdit(){
        $("#edit").css("display","block")
    }
    function displayAdd(){
        $("#form_v").css("display","block")
        $("input[name='kname']").val('');
        $("input[name='sdk']").val('');
        $("input[name='pwd']").val('');
        $("input[name='files']").val('');
        $("input[name='id']").remove();
    }
    function displayNone(){
        $("#form_v").css("display","none")
        $("input[name='kname']").val('');
        $("input[name='sdk']").val('');
        $("input[name='pwd']").val('');
        $("input[name='files']").val('');
        $("input[name='id']").remove();
    }

</script>
<div class="span10" id="edit" style="display: none;">
    <ul class="breadcrumb">
        <li>班次 <span class="divider">
                <select style="width: 79px;" id="grade" onchange="courseChange()">
                    <?php if(!empty($videoGrade)) foreach($videoGrade as $k =>$v){?>
                    <option value="<?php echo $v['grade'];?>"><?php echo $v['grade']?></option>
                    <?php }?>
                </select>
            </span></li>
        <li>内容模块 <span class="divider">/</span></li>
        <li>视频管理 <span class="divider">/</span></li>
        <li><a href="javascript:void(0);" onclick="displayAdd()">添加视频</a></li>
    </ul>
    <div class="control-group" >
        <table id="typeTable" style=" width: 20%;overflow: auto;_overflow: auto;background: #ffffff;border-radius: 5px;border: 3px solid #fff;">
            <th style="width: 35%">类型</th>
            <th style="width: 35%">排序</th>
            <th style="width: 30%">排序修改</th>
            <?php foreach($videoType as $k => $v){?>
                <tr class="typeRemoveTr" style="text-align: center">
                    <td><?php echo $v['type'] ?></td>
                    <td><input type="text" value="<?php echo $v['typeSort']?>" style="width: 54px;height: 16px;margin-top: 10px;"></td>
                    <td><a href="javascript:void(0);" onclick="typeSort(<?php echo $v['id'] ?>,this)" style="margin-left: 20px">确定</a></td>
                </tr>
            <?php }?>
        </table>
        <table id="table" style=" width: 90%;text-align:center; overflow: auto;_overflow: auto;margin: 20px 0;background: #ffffff;border-radius: 5px;border: 3px solid #fff;">
            <th>课程名称</th>
            <th>sdk</th>
            <th>密码</th>
            <th>班次</th>
            <th>类型</th>
            <th>发表时间</th>
            <th>操作</th>
            <th>排序</th>
            <th>排序修改</th>

            <?php foreach($video as $ki => $ko){?>
            <tr class="removeTr">
                <td><?php echo $ko['name'] ?></td>
                <td><?php echo $ko['sdk'] ?></td>
                <td><?php echo $ko['pwd'] ?></td>
                <td><?php echo $ko['grade'] ?></td>
                <td><?php echo $ko['type'] ?></td>
                <td><?php echo date('Y-m-d H:i:s', $ko['createTime']); ?></td>
                <td>
                    <a href='javascript:void(0);' onclick="upData(<?php echo $ko['id'] ?>);">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='javascript:void(0);' onclick="Delete(<?php echo $ko['id'] ?>);">删除</a>
                </td>
                <td><input type="text" value="<?php echo $ko['sort']?>"; style="width: 54px;height: 16px;margin-top: 10px;"></td>
                <td><a href="javascript:void(0);" onclick="Sort(<?php echo $ko['id'] ?>,this)" style="margin-left: 20px">确定</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <script>
        function upData(o) {
            var id = o;
            $.ajax({
                url: '/content/api/video',
                data: {id: id},
                dataType: 'json',
                type: 'get',
                success: function (data) {
                    $("input[name='kname']").val(data.name);
                    $("input[name='sdk']").val(data.sdk);
                    $("input[name='pwd']").val(data.pwd);
                    $("input[name='grade']").val(data.grade);
                    $("input[name='type']").val(data.type);
                    $("input[name='files']").val(data.fileAddress);
                    $("#form_v").css("display","block");
                    var str = "<input type='hidden' name='id' id='vid' value='"+data.id+"'>";
                    $("#form_v").append(str);
                }
            });
        }
        function Delete(j){
            var id = j;
            if(confirm("确认删除视频")) {
                $.ajax({
                    url: '/content/api/video-delete',
                    data: {id: id},
                    dataType: 'json',
                    type: 'get',
                    success: function (data) {
                        if (data == 1) {
                            alert("成功");
                            courseChange();
                        } else {
                            alert("删除失败");
                        }
                    }
                });
            }
        }
        function courseChange(){
            var grade = $("#grade").val();
            $.ajax({
                url: '/content/api/video-grade',
                data: {grade: grade,contentId:<?php echo $_GET['pid']?>},
                dataType: 'json',
                type: 'get',
                success: function (data) {
                    var str = '';
                    $("#table .removeTr").remove();
                    $(data.data).each(function(i,row){
                        str += "<tr class='removeTr'>";
                        str += "<td>"+row.name+"</td>";
                        str += "<td>"+row.sdk+"</td>";
                        str += "<td>"+row.pwd+"</td>";
                        str += "<td>"+row.grade+"</td>";
                        str += "<td>"+row.type+"</td>";
                        str += "<td>"+timestampToTime(row.createTime)+"</td>";
                        str +='<td><a href="javascript:void(0);" onclick="upData('+row.id+')">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Delete('+row.id+')">删除</a></td>';
                        str += "<td><input type='text' value='"+row.sort+"'; style='width: 54px;height: 16px;margin-top: 10px;' ></td>";
                        str +='<td><a href="javascript:void(0);" onclick="Sort('+row.id+',this)" style="margin-left: 20px">确定</a></td>';
                    });
                    $("#table").append(str);
                    $("#form_v").css("display","none");
                    var type = '';
                    $("#typeTable .typeRemoveTr").remove();
                    $(data.type).each(function (i, row) {
                        type += "<tr class='typeRemoveTr'>";
                        type += "<td>" + row.type + "</td>";
                        type += "<td><input type='text' value='" + row.typeSort + "'; style='width: 54px;height: 16px;margin-top: 10px;'></td>";
                        type += '<td><a href="javascript:void(0);" onclick="typeSort(' + row.id + ',this)" style="margin-left: 20px">确定</a></td>';
                    });
                    $("#typeTable").append(type);
                    $("#form_v").css("display", "none");
                }
            });
        }
        //时间戳转换成日期
        function timestampToTime(timestamp) {
            var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
            Y = date.getFullYear() + '-';
            M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
            D = date.getDate() + ' ';
            h = date.getHours() + ':';
            m = date.getMinutes() + ':';
            s = date.getSeconds();
            return Y+M+D+h+m+s;
        }
        function Sort(id,_this){
            var sort = $(_this).parent().prev().children().eq(0).val();
            $.ajax({
                url:'/content/api/video-sort',
                data:{
                    id:id,
                    sort:sort,
                },
                dataType:"json",
                type:'post',
                success:function(e){
                    if(e.code == 1){
                        var str = '';
                        $("#table .removeTr").remove();
                        $(e.data).each(function(i,row){
                            str += "<tr class='removeTr'>";
                            str += "<td>"+row.name+"</td>";
                            str += "<td>"+row.sdk+"</td>";
                            str += "<td>"+row.pwd+"</td>";
                            str += "<td>"+row.grade+"</td>";
                            str += "<td>"+row.type+"</td>";
                            str += "<td>"+timestampToTime(row.createTime)+"</td>";
                            str +='<td><a href="javascript:void(0);" onclick="upData('+row.id+')">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;' +
                                '<a href="javascript:void(0);" onclick="Delete('+row.id+')">删除</a></td>';
                            str += "<td><input type='text' value='"+row.sort+"'; style='width: 54px;height: 16px;margin-top: 10px;'></td>";
                            str +='<td><a href="javascript:void(0);" onclick="Sort('+row.id+',this)" style="margin-left: 20px">确定</a></td>';
                        });
                        $("#table").append(str);
                        $("#form_v").css("display","none");
                    }else{
                        alert(e.message);
                    }
                }
            });
        }
        function typeSort(id,_this) {
            var sort = $(_this).parent().prev().children().eq(0).val();
            var grade = $('#grade').val();
            $.ajax({
                url: '/content/api/type-sort',
                data: {
                    id: id,
                    sort: sort,
                    grade:grade,
                },
                dataType: "json",
                type: 'post',
                success: function (e) {
                    if (e.code == 1) {
                        var str = '';
                        $("#typeTable .typeRemoveTr").remove();
                        $(e.data).each(function (i, row) {
                            str += "<tr class='typeRemoveTr'>";
                            str += "<td>" + row.type + "</td>";
                            str += "<td><input type='text' value='" + row.typeSort + "'; style='width: 54px;height: 16px;margin-top: 10px;'></td>";
                            str += '<td><a href="javascript:void(0);" onclick="typeSort(' + row.id + ',this)" style="margin-left: 20px">确定</a></td>';
                        });
                        $("#typeTable").append(str);
                        $("#form_v").css("display", "none");
                    } else {
                        alert(e.message);
                    }
                }
            });
        }
    </script>
    <form action="#" method="post" class="form-horizontal" id="form_v" style="display: none">
        <fieldset>
            <div class="hid control-group">
                <label for="modulename" class="control-label">课程名称：</label>
                <input type="text" name="kname" id="subName" value="">
            </div>
            <div class="hid control-group">
                <label for="modulename" class="control-label">SDK：</label>
                <input type="text" name="sdk" id="subSdk" value="">
            </div>
            <div class="hid control-group">
                <label for="modulename" class="control-label">密码：</label>
                <input type="text" name="pwd" value="" id="subPwd">
            </div>
            <div class="hid control-group">
                <label for="modulename" class="control-label">班次：</label>
                <input type="text" name="grade" value="" id="subGrade">
            </div>
            <div class="hid control-group">
                <label for="modulename" class="control-label">类型：</label>
                <input type="text" name="type" value="" id="subType">
            </div>
            <input type="hidden" name="cid" id="cid" value="<?php echo isset($_GET['pid'])?$_GET['pid']:'' ?>">
<!--            <div class="hid control-group">-->
<!--                <label for="catdes" class="control-label">视频课程：</label>-->
<!--                <div class="controls">-->
<!--                    <div style="margin-bottom: 10px" id="InputsWrapper">-->
<!--                                  <span>-->
<!--                                      <input type="text" class="file" name="files"-->
<!--                                             value="" placeholder="文件地址">-->
<!--                                  </span>-->
<!--                        <a href="javascript:void(0);" class="btn btn-info" onclick="upFiles();">上传文件</a>-->
<!--                        <script>-->
<!--                            //实例化编辑器-->
<!--                            var o_ueditorupload = UE.getEditor('j_ueditorupload',-->
<!--                                {-->
<!--                                    autoHeightEnabled: false-->
<!--                                });-->
<!--                            o_ueditorupload.ready(function () {-->
<!---->
<!--                                o_ueditorupload.hide();//隐藏编辑器-->
<!---->
<!--                                o_ueditorupload.addListener('afterUpfile', function (t, arg) {-->
<!--                                    $('.file').val(arg[0].url);-->
<!--                                });-->
<!--                            });-->
<!---->
<!--                            //                    弹出文件上传的对话框-->
<!--                            function upFiles() {-->
<!--                                var myFiles = o_ueditorupload.getDialog("attachment");-->
<!--                                myFiles.open();-->
<!--                            }-->
<!---->
<!--                        </script>-->
<!--                        <script type="text/plain" id="j_ueditorupload"></script>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="control-group">
                <div class="controls">
                    <input type="button" class="btn btn-primary" value="添加视频课" onclick="subContent()">
                </div>
            </div>
            <script>
                function subContent(){
                    var kname = $('#subName').val();
                    var sdk = $('#subSdk').val();
                    var pwd = $('#subPwd').val();
                    var grade = $('#subGrade').val();
                    var type = $('#subType').val();
                    var cid = $('#cid').val();
                    var id = $('#vid').val();
                    if(!kname){
                        alert('请填写课程名称！');return false;
                    }
                    if(!sdk){
                        alert('请填写SDK');return false;
                    }
                    if(!cid){
                        alert('提交失败；请重试');return false;
                    }
                    $.ajax({
                        url:'/content/content/file-video',
                        type:'post',
                        dataType:'json',
                        data:{
                            id:id,
                            cid:cid,
                            kname:kname,
                            sdk:sdk,
                            pwd:pwd,
                            grade:grade,
                            type:type
                        },
                        success:function(e){
                            alert(e.message);
                            if(e.code ==1){
                                displayNone();
                                courseChange()
                            }
                        }
                    });
                }
            </script>
        </fieldset>
    </form>
</div>




