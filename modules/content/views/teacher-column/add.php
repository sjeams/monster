<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>



<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/teacher-column/index">名师专栏</a> <span class="divider">/</span></li>
        <li class="active">添加内容</li>
    </ul>
    <form action="/content/teacher-column/add" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:'';  ?>" />
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">老师</label>
                <div class="controls">
                    <select name="content[nameid]">
                        <?php foreach($teachers as $key=>$value){
                            ?>
                             <option value="<?php echo $value['id']; ?>" <?php if($value['id'] == $id && isset($id)) echo "selected='sselected'"?>><?php echo $value['name']?></option>;
                        <?php
                        }
                        ?>
                    </select>
                    <span class="help-block">请选择老师姓名</span>
                </div>
            </div>


            <div class="control-group">
                <label for="modulename" class="control-label">题目</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[title]" value="<?php echo isset($data['title'])?$data['title']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的题目名称">
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">简介</label>
                <div class="controls">
                    <textarea
                            name="content[introduce]"><?php echo isset($data['introduce']) ? $data['introduce'] : '' ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">标签</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[label]" value="<?php echo isset($data['label'])?$data['label']:''?>"  needle="needle" msg="您必须输入中英文字符的标签名称">
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">关键字</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[keywords]" value="<?php echo isset($data['keywords'])?$data['keywords']:''?>"  needle="needle" msg="您必须输入中英文字符的标签名称">
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label" >描述</label>
                <div class="controls">
                    <textarea name="content[description]" style="width: 400px;height: 120px;"><?php echo isset($data['description']) ? $data['description'] : '' ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">阅读量</label>
                <div class="controls">
                    <input type="text"  name="content[view]" value="<?php echo isset($data['view'])?$data['view']:0?>" >
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">类型</label>
                <div class="controls">
                    <select name="content[type]">
                       <option value="1" <?php if(isset($data['type']) && $data['type'] == 1) echo "selected = 'selected'";?>>经验技巧</option>
                       <option value="2" <?php if(isset($data['type']) && $data['type'] == 2) echo "selected = 'selected'";?>>要点解读</option>
                    </select>
                </div>
            </div>


            <div class="control-group">
                <label for="modulename" class="control-label">热门</label>
                <div class="controls">
                    <select name="content[hot]">
                       <option value="1" <?php if(isset($data['hot']) && $data['hot'] == 1) echo "selected = 'selected'";?>>是</option>
                       <option value="-1" <?php if(isset($data['hot']) && $data['hot'] == -1) echo "selected = 'selected'";?>>否</option>
                    </select>
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
                <label for="modulename" class="control-label">详情</label>
                <div class="controls">
                <textarea  id="editor"
                           name="content[detail]"><?php echo isset($data['content']) ? $data['content'] : '' ?></textarea>
                    <input type="hidden" name="key[]" value="">
                    <script>
                        var editor = UE.getEditor('editor',{ initialFrameWidth: null });
                    </script>
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