<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件-->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>



<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/means/index">GRE设置资料领取</a> <span class="divider">/</span></li>
    </ul>
    <form action="/content/means/add" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:'';  ?>" />
        <fieldset>
            <!-- <div class="control-group">
                <label for="modulename" class="control-label" >资料代表ID</label>
                <div class="controls">
                    <input type="text" name="content[courseId]" value="<?php echo isset($data['representativeid']) ? $data['representativeid'] : '' ?>">
                </div>
            </div> -->
            <div class="control-group">
                <label for="modulename" class="control-label">描述</label>
                <div class="controls">
                    <textarea name="content[content]" style="width: 400px;height: 120px;" ><?php echo isset($data['content'])?$data['content']:''?></textarea>
                    <span class="help-block">资料领取的内容描述</span>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">微信号</label>
                <div class="controls">
                    <input type="text" id="input1" name="content[chat]" value="<?php echo isset($data['chat'])?$data['chat']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的资料名称">
                    <span class="help-block">请输入资料名称</span>
                </div>
            </div>

            <div class="control-group">
                <label for="modulename" class="control-label">来源</label>
                <div class="controls">
                    <!-- <input type="text" name="content[sort]" value="1"> -->
                    <select name="content[belong]" >
                        <option value="1" <?php echo isset($data['belong'])&&$data['belong']==1?'selected':'' ;?>  >做题模考</option>
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