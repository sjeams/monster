<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>



<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/curriculum/index">GRE设置课程</a> <span class="divider">/</span></li>
    </ul>
    <form action="/content/curriculum/add" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:'';  ?>" />
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">课程名称</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[name]" value="<?php echo isset($data['name'])?$data['name']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的课程名称">
                    <span class="help-block">请输入课程名称</span>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label" >课程代表ID</label>
                <div class="controls">
                    <input type="text" name="content[courseId]" value="<?php echo isset($data['representativeid']) ? $data['representativeid'] : '' ?>">
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">课程ID</label>
                <div class="controls">
                    <textarea name="content[courseIds]" style="width: 400px;height: 120px;" ><?php echo isset($data['contentid'])?$data['contentid']:''?></textarea>
                    <span class="help-block">课程，id (课程和id逗号隔开-英文逗号 每组值换行分开)</span>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">排序</label>
                <div class="controls">
                    <input type="text" name="content[sort]" value="1">
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