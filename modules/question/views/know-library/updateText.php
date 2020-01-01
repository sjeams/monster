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
        <li><a href="<?php echo baseUrl?>/question/levels/index">考点题库管理</a> <span class="divider">/</span></li>
        <li class="active">修改考点题库</li>
    </ul>
    <form action="/question/know-library/update" method="post" class="form-horizontal" id="addForm">
        <fieldset>
            <div class="control-group">
<!--                <label for="modulename" class="control-label">单项分类名</label>-->
<!--                <div class="controls">-->
<!--                    <select name="data[catId]" id="sort-select" disabled="disabled">-->
<!--                        <option value="" id="xuanzhe01">请选择</option>-->
<!--                        --><?php
//                        foreach($sectionArr as $v) {
//                            ?>
<!--                            <option value="--><?php //echo $v['id']?><!--" --><?php //echo $data['catId'] == $v['id']?'selected':''?><!--><?php //echo $v['name']?><!--</option>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </select>-->
<!--                </div>-->
                <div class="control-group">
                    <label for="modulename" class="control-label">来源</label>
                    <div class="controls">
                        <select name="data[sourceId]" id="sourceSelect">
                            <option value="" id="xuanzhe02">请选择</option>
                            <?php
                            foreach($source as $v) {
                                ?>
                                <option value="<?php echo $v['id']?>" <?php echo $data['sourceId'] == $v['id']?'selected':''?>><?php echo $v['name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
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
    $(function(){
        $("#sort-select").change(function(){
//            alert(12);return;
            var id=$(this).val();
            $("#xuanzhe01").hide();
            $('#questionDetails').val("");
            $('#optionA').val("");
            $('#optionB').val("");
            $('#optionC').val("");
            if(id==1 || id==2){//填空阅读
                $(".verbal-q").show();
                $(".quant-q").hide();
            }else{
                $(".verbal-q").hide();
                $(".quant-q").show();
            }
            if(id==2){//阅读
                $(".read-hide").show();
            }else{
                $(".read-hide").hide();
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
                        var source=data.source;
                        var str02='';
                        for(var j=0;j<source.length;j++){
                            str02+='<option value="'+source[j].id+'">'+source[j].name+'</option>';
                        }
                        $("#sourceSelect").html(str02);

                    }
                });
            }
        });
    });
    //    提交
    function subTiMuAdd(){
        var section= $("#sort-select option:selected").val();
        var source= $("#sourceSelect option:selected").val();
        if(!source){
            alert("下拉框选择的内容都是必填哦！");
            return false;
        }
        $("#addForm").submit();
    }
    //     保存并新增
</script>