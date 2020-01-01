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
        <li><a href="<?php echo baseUrl?>/question/analysis/index">解析管理</a> <span class="divider">/</span></li>
        <li class="active">查看解析</li>
    </ul>
    <form action="/question/analysis/update" method="post" class="form-horizontal" id="addForm">
        <input type="hidden" value="<?php echo $data['id'];?>" name="id" />
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">解析</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="7" name="content" id="details" style="width: 100%"><?php echo isset($data['analysisContent'])?$data['analysisContent']:' '; ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">操作</label>
                <div class="controls">
                    <label for="type1">
                        允许发表：<input type="radio" name="type" id="type1" value="1" />
                    </label>
                    <label for="type2">
                        禁止发表：<input type="radio" name="type" id="type2" value="2" />
                    </label>
                    <label for="type3">
                        转为评论：<input type="radio" name="type" id="type3" value="3" />
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="提交"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
    //    提交
    var details = UE.getEditor('details');
</script>
