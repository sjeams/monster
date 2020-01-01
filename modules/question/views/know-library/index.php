<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">小库管理</li>
    </ul>
    <form action="<?php echo baseUrl?>/question/know-library/index" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    单项：&nbsp;&nbsp;
                    <select name="catId" id="sort-select">
                        <option value="" id="xuanzhe01">请选择</option>
                        <?php
                        foreach($cats as $v) {
                            ?>
                            <option value="<?php echo $v['id']?>" <?php echo isset($_GET['catId']) && $_GET['catId'] == $v['id']?'selected':''?>><?php echo $v['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    考点：&nbsp;&nbsp;
                    <select name="knowId" id="knowSelect">
                        <option value="">请选择</option>
                        <?php
                        foreach($knows as $v) {
                            ?>
                            <option value="<?php echo $v['id']?>" <?php echo isset($_GET['knowId']) && $_GET['knowId'] == $v['id']?'selected':''?>><?php echo $v['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>小库名称</th>
                <th>单项</th>
                <th>来源</th>
                <th>知识点</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($queLib)) {
                foreach ($queLib as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v['id'] ?></td>
                        <td><span><?php echo $v['name'] ?></span></td>
                        <td><span><?php echo $v['cName'] ?></span></td>
                        <td><span><?php echo $v['sName'] ?></span></td>
                        <td><span><?php echo $v['kName'] ?></span></td>
                        <td><span><?php echo date("Y-m-d H:i:s", $v['createTime']) ?></span></td>
                        <td class="notSLH" style="width: 247px;">
                            <div>
                                <!--                            <a class="btn" href="#">内容管理</a>-->
                                <!--                            <a class="btn" href="javascript:;">删除</a>-->
                                <a class="btn" href="/question/know-library/update?id=<?php echo $v['id'] ?>&url=<?php echo Yii::$app->request->getUrl() ?>">修改</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    <div class="pagination pagination-right">
        <!--        --><?php //use yii\widgets\LinkPager;?>
        <!--        --><?php //echo LinkPager::widget([
        //            'pagination' => $page,
        //        ])?>
    </div>
    <script>
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
                        var str='<option value="">请选择</option>';
                        for(var i=0;i<know.length;i++){
                            str+='<option value="'+know[i].id+'">'+know[i].name+'</option>';
                        }
                        $("#knowSelect").html(str);
                    }
                });
            }
        });
    </script>


