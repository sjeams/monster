<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>



<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/teacher/index">GRE名师</a> <span class="divider">/</span></li>
        <li class="active">添加内容</li>
    </ul>
    <form action="/content/teacher/add" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:'';  ?>" />
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">老师</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[name]" value="<?php echo isset($data['name'])?$data['name']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的老师姓名">
                    <span class="help-block">请输入老师姓名</span>
                </div>
            </div>

            <div class="control-group">
                <label for="moduledescribe" class="control-label">图片</label>

                <div class="controls">
                    <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <input type="text" class="imageFile" name="content[image]"
                                             value="<?php echo isset($data['image']) ? $data['image'] : '' ?>"
                                             placeholder="图片地址">
                                  </span>
                        <br>
                        <br>
                    </div>
                    <a href="#" class="btn btn-info" onclick="upImage();">上传图片</a>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">标签</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[label]" value="<?php echo isset($data['label'])?$data['label']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的标签名称">
                    <span class="help-block">内容以逗号隔开-英文逗号</span>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label" >简介</label>
                <div class="controls">
                    <textarea name="content[introduce]" style="width: 400px;height: 120px;"><?php echo isset($data['introduce']) ? $data['introduce'] : '' ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">授课科目</label>
                <div class="controls">
                    <textarea name="content[course]" style="width: 400px;height: 120px;" ><?php echo isset($data['course'])?$data['course']:''?></textarea>
                    <span class="help-block">课程，id (课程和id逗号隔开-英文逗号 每组值换行分开)</span>
                </div>
            </div>


            <div class="control-group">
                <label for="modulename" class="control-label">个人详情</label>
                <div class="controls">
                <textarea  id="editor"
                           name="content[detail]"><?php echo isset($data['detail']) ? $data['detail'] : '' ?></textarea>
                    <input type="hidden" name="key[]" value="">
                    <script>
                        var editor = UE.getEditor('editor',{ initialFrameWidth: null });
                    </script>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label" >关键词</label>
                <div class="controls">
                    <textarea name="content[keywords]" style="width: 400px;height: 120px;"><?php echo isset($data['keywords']) ? $data['keywords'] : '' ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label" >描述</label>
                <div class="controls">
                    <textarea name="content[description]" style="width: 400px;height: 120px;"><?php echo isset($data['description']) ? $data['description'] : '' ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="提交">
                </div>
            </div>
        </fieldset>
    </form>
</div>


<script>
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

</script>
<script type="text/plain" id="j_ueditorupload"></script>