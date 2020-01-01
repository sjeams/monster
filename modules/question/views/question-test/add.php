<script type="text/javascript" src="/ueditor1/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor1/ueditor.all.min.js"></script>
<!-- 编辑器公式插件-->
<script type="text/javascript" charset="utf-8" src="/ueditor1/kityformula-plugin/addKityFormulaDialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor1/kityformula-plugin/getKfContent.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor1/kityformula-plugin/defaultFilterFix.js"></script>
<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="<?php echo baseUrl?>/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="<?php echo baseUrl?>/question/question-test/index">试题管理</a> <span class="divider">/</span></li>
        <li class="active">添加试题</li>
    </ul>
    <form action="/question/question-test/add" method="post" class="form-horizontal" id="addForm">
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">分类</label>
                <div class="controls">
                    <select name="data[catId]" id="sort-select">
                        <option value="" id="xuanzhe01">请选择</option>
                        <?php
                            foreach($cat as $v) {
                                ?>
                                <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                            <?php
                            }
?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">套题</label>
                <div class="controls">
                    <select name="data[set]" id="set">
                        <option value="第一套">第一套</option>
                        <option value="第二套">第二套</option>
                    </select>
                </div>
            </div>
            <div class="sort-showD" style="display: none">
                <div class="control-group">
                    <label for="modulename" class="control-label">类型</label>
                    <div class="controls">
                        <select name="data[typeId]" id="typeSelect">

                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label for="modulename" class="control-label">知识点</label>
                    <div class="controls">
                        <select name="data[knowId]" id="knowSelect">

                        </select>
                    </div>
                </div>
            </div>
            <div class="read-hide" style="display: none;">
                <div class="control-group">
                    <label for="modulename" class="control-label">阅读题干</label>
                    <div class="controls">
                        <input type="text" id="read-stem" name="data[readStem]" value="" datatype="userName" needle="needle" msg="" style="width: 700px;">
                    </div>
                </div>
                <div class="control-group">
                    <label for="modulename" class="control-label">阅读文章</label>
                    <div class="controls">
                        <textarea class="input-xxlarge" rows="7" name="data[readArticle]" id="read" style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">题干</label>
                <div class="controls">
                    <input type="text" id="stem" name="data[stem]" value="" datatype="userName" needle="needle" msg="" style="width: 700px;">
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">问题详情</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="7" name="data[details]" id="details" style="width: 100%"></textarea>
                </div>
            </div>
            <div id="quantBox" style="display: none">
                <div class="control-group">
                    <label for="modulename" class="control-label">quantityA</label>
                    <div class="controls">
                        <textarea class="input-xxlarge" rows="7" name="data[quantityA]" id="questionA" style="width: 100%"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label for="modulename" class="control-label">quantityB</label>
                    <div class="controls">
                        <textarea class="input-xxlarge" rows="7" name="data[quantityB]" id="questionB" style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">答案</label>
                <div class="controls">
                    <input type="text" id="answer" name="data[answer]" value="" datatype="userName" needle="needle" msg="" style="width: 700px;"/>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">备选项1</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="7" name="data[optionA]" id="optionA" style="width: 100%"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">备选项2</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="7" name="data[optionB]" id="optionB" style="width: 100%"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">备选项3</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="7" name="data[optionC]" id="optionC" style="width: 100%"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">难度</label>
                <div class="controls">
                    <select name="data[levelId]" id="levelId">
                        <option value="" id="xuanzhe02">请选择</option>
                        <?php
                        foreach($level as $v) {
                            ?>
                            <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
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
    var details = UE.getEditor('details');
    var questionA = UE.getEditor('questionA');
    var questionB = UE.getEditor('questionB');
    var read = UE.getEditor('read');
    var optionA = UE.getEditor('optionA');
    var optionB = UE.getEditor('optionB');
    var optionC = UE.getEditor('optionC');
    $(function(){
        $("#sort-select").change(function(){
             var id=$(this).val();
            $("#xuanzhe01").hide();
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
        $("#levelId").change(function(){
            $("#xuanzhe02").hide();
        });
    });
//    提交
    function subTiMuAdd(){
        var know= $("#knowSelect option:selected").val();
        var type= $("#typeSelect option:selected").val();
        var sort= $("#sort-select option:selected").val();
        var level= $("#levelId option:selected").val();
        if(!know || !type || !sort || !level){
            alert("下拉框选择的内容都是必填哦！");
            return false;
        }
        $("#addForm").submit();
    }
    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload',
        {
            autoHeightEnabled:false
        });
    o_ueditorupload.ready(function ()
    {

        o_ueditorupload.hide();//隐藏编辑器

        //监听图片上传
        o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
        {
            $('.imageFile').val(arg[0].src);

        });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg)
        {

        });
    });

    //弹出图片上传的对话框
    function upImage()
    {
        var myImage = o_ueditorupload.getDialog("insertimage");
        myImage.open();
    }
    //弹出文件上传的对话框
    //    function upFiles()
    //    {
    //        var myFiles = o_ueditorupload.getDialog("attachment");
    //        myFiles.open();
    //    }
//     保存并新增
    function saveAndNewAdd(){
        var catId=$("#sort-select option:selected").val();
        var set=$("#set option:selected").val();
        var typeId=$("#typeSelect option:selected").val();
        var knowId=$("#knowSelect option:selected").val();
        var levelId=$("#levelId option:selected").val();
        var readStem=$("#read-stem").val();
        var stem=$("#stem").val();
        var readArticle=read.getContent();
        var a_details=details.getContent();
        var quantityA=questionA.getContent();
        var quantityB=questionB.getContent();
        var a_optionA=optionA.getContent();
        var a_optionB=optionB.getContent();
        var a_optionC=optionC.getContent();
        var a_answer=$("#answer").val();
        if(!knowId || !set || !typeId || !catId || !levelId){
            alert("下拉框选择的内容都是必填哦！");
            return false;
        }
        $.ajax({
            url:"/question/api/question-test-add",
            data:{
                catId:catId,
                set:set,
                typeId:typeId,
                knowId:knowId,
                readStem:readStem,
                readArticle:readArticle,
                stem:stem,
                details:a_details,
                quantityA:quantityA,
                quantityB:quantityB,
                optionA:a_optionA,
                optionB:a_optionB,
                optionC:a_optionC,
                levelId:levelId,
                answer:a_answer
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
<script type="text/plain" id="j_ueditorupload"></script>