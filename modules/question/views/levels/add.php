<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<!-- 编辑器公式插件-->
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/addKityFormulaDialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/getKfContent.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/kityformula-plugin/defaultFilterFix.js"></script>
<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="<?php echo baseUrl?>/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="<?php echo baseUrl?>/question/levels/index">难度管理</a> <span class="divider">/</span></li>
        <li class="active">添加难度分类</li>
    </ul>
    <form action="/question/levels/add" method="post" class="form-horizontal" id="addForm">
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">难度分类名</label>
                <div class="controls">
                    <input type="text" id="levelName" name="data[name]" value="" datatype="userName" needle="needle" msg="" style="width: 700px;">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="button" class="btn btn-primary" value="提交" onclick="subTiMuAdd()"/>
                    <input type="button" class="btn btn-primary" value="保存并新增" onclick="saveAndNewAdd()"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
//    提交
    function subTiMuAdd(){
        var levelName=$("#levelName").val();
        if(!levelName){
            alert("单线分类的名字是必填哦！");
            return false;
        }
        $("#addForm").submit();
    }
//     保存并新增
    function saveAndNewAdd(){
        var levelName=$("#levelName").val();
        if(!levelName){
            alert("单线分类的名字是必填哦！");
            return false;
        }
        $.ajax({
            url:"/question/api/level-add",
            data:{
                levelName:levelName,
            },
            type:"post",
            dataType:"json",
            success:function(data){
                if(data.code==1){
                    alert(data.message);
                }
            }
        });
    }
</script>