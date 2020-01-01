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
        <li><a href="<?php echo baseUrl?>/question/knows/index">知识点管理</a> <span class="divider">/</span></li>
        <li class="active">修改知识点</li>
    </ul>
    <form action="/question/knows/update" method="post" class="form-horizontal" id="addForm">
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">单项分类</label>
                <div class="controls">
                    <select name="data[catId]" id="sort-select">
                        <option value="" id="xuanzhe01">请选择</option>
                        <?php
                        foreach($cat as $v) {
                            ?>
                            <option value="<?php echo $v['id']?>" <?php echo $data['catId'] == $v['id']?'selected':''?>><?php echo $v['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">知识点</label>
                <div class="controls">
                    <input type="text" id="knowName" name="data[name]" value="<?php echo $data['name']?>" datatype="userName" needle="needle" msg="" style="width: 700px;">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="button" class="btn btn-primary" value="提交" onclick="subTiMuAdd()"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
    //    提交
    function subTiMuAdd(){
        var knowName=$("#knowName").val();
        var catId= $("#sort-select option:selected").val();
        if(!knowName){
            alert("知识点是必填哦！");
            return false;
        }
        if(!catId){
            alert("单项分类是必填哦！");
            return false;
        }
        $("#addForm").submit();
    }
</script>