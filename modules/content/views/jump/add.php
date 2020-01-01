<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>



<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/jump/index">GRE设置跳转图</a> <span class="divider">/</span></li>
    </ul>
    <form action="/content/jump/add" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:'';  ?>" />
        <fieldset>

            <div class="control-group">
                <label for="modulename" class="control-label">来源</label>
                <div class="controls">
                    <!-- <input type="text" name="content[sort]" value="1"> -->
                    <select name="content[type]" >
                        <option value="1" <?php echo isset($data['type'])&&$data['type']==1?'selected':'' ;?>  >H5</option>
                        <option value="2" <?php echo isset($data['type'])&&$data['type']==2?'selected':'' ;?>  >课程活动</option>
                        <option value="3" <?php echo isset($data['type'])&&$data['type']==3?'selected':'' ;?>  >刷题活动</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">内容</label>
                <div class="controls">
                    <textarea name="content[content]" style="width: 400px;height: 120px;" ><?php echo isset($data['content'])?$data['content']:''?></textarea>
                    <span class="help-block">商品ID或者链接</span>
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
                <label for="modulename" class="control-label">展示位置</label>
                <div class="controls">
                    <!-- <input type="text" name="content[sort]" value="1"> -->
                    <select name="content[belong]" >
                        <option value="1" <?php echo isset($data['belong'])&&$data['belong']==1?'selected':'' ;?>  >做题模考</option>
                        <option value="2" <?php echo isset($data['belong'])&&$data['belong']==2?'selected':'' ;?>  >开屏图</option>
                        <option value="3" <?php echo isset($data['belong'])&&$data['belong']==3?'selected':'' ;?>  >课程活动</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">排序</label>
                <div class="controls">
                  <input type="text" name="content[sort]" value="<?php echo isset($data['sort'])?$data['sort']: 0 ;?>">
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