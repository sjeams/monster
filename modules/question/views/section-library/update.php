<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li><a href="/question/index/index">小库管理</a><span class="divider">/</span></li>
        <li class="active">题库名</li>
    </ul>
    <table class="table table-hover add_defined">
        <thead>
        <tr>
            <th width="80">ID</th>
            <th>问题ID</th>
            <th>试题内容</th>
            <th>录入人</th>
            <th>录入时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="library-question">
        <?php
        if(isset($questions)) {
            foreach ($questions as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['questionId'] ?></span></td>
                    <td><span><?php echo $v['stem'] ?></span></td>
                    <td><span><?php echo $v['user']['userName'] ?></span></td>
                    <td><span><?php echo date("Y-m-d H:i:s", $v['createTime']) ?></span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="javascript:void(0);" onclick="cancelQuestion(<?php echo $v['id'] ?>)">取消</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <table class="table">
        <tr>
            <td>
                题目ID：&nbsp;&nbsp;
                <input type="text" name="questionId" id="questionId">
            </td>
            <td>
                单项：&nbsp;&nbsp;
                <select name="catId" id="sort-select">
                    <option value="" id="xuanzhe01">请选择</option>
                    <?php
                    if(isset($cats)) {
                        foreach ($cats as $v) {
                            ?>
                            <option
                                value="<?php echo $v['id'] ?>" <?php echo isset($_GET['catId']) && $_GET['catId'] == $v['id'] ? 'selected' : '' ?>><?php echo $v['name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
            <td>
                来源：&nbsp;&nbsp;
                <select name="sourceId" id="sourceSelect">
                    <option value="">请选择</option>
                    <?php
                    if(isset($sources)) {
                        foreach ($sources as $v) {
                            ?>
                            <option
                                value="<?php echo $v['id'] ?>" <?php echo isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id'] ? 'selected' : '' ?>><?php echo $v['name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit" onclick="selectQuestion()">搜索</button>
            </td>
        </tr>
    </table>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th width="80">ID</th>
                <th>试题内容</th>
                <th>录入人</th>
                <th>录入时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="select-display">
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    <input type="hidden" id="libId" value="<?php echo $_GET['id'] ?>">
    <div class="pagination pagination-right">
<!--        --><?php //use yii\widgets\LinkPager;?>
<!--        --><?php //echo LinkPager::widget([
//            'pagination' => $page,
//        ])?>
    </div>
    <script>
        //搜索题目
        function selectQuestion() {
            var questionId=$("#questionId").val();
            var sectionId=$("#sort-select").val();
            var sourceId=$("#sourceSelect").val();
            if(!questionId && !sectionId && !sourceId){
                alert("请输入搜索条件");return;
            } else {
                $.ajax({
                    url: "/question/section-library/ajax-question-select",
                    data: {
                        questionId: questionId,
                        sectionId: sectionId,
                        sourceId: sourceId
                    },
                    type: "post",
                    dataType: "json",
                    success: function (data) {
                        var str='';
                        for(var i=0;i<data.length;i++){
                            str +="<tr>";
                            str +="<td>"+data[i].id+"</td>";
                            str +="<td><span>"+data[i].stem+"</span></td>";
                            str +="<td><span>"+data[i].userName+"</span></td>";
                            str +="<td><span>"+data[i].createTime+"</span></td>";
                            str +='<td class="notSLH" style="width: 247px;"><div><a class="btn" href="javascript:void(0);" onclick="manualAdd('+data[i].id+')">添加</a></div>';
                            str +='</tr>';
                        }
                        $("#select-display").html(str);
                    }
                });
            }
        }
        //手动添加题目
        function manualAdd(o){
           var libId = $("#libId").val();
            if(libId){
                $.ajax({
                    url: "/question/section-library/manual-add",
                    data: {
                        libId: libId,
                        questionId: o
                    },
                    type: "post",
                    dataType: "json",
                    success: function (data) {
                        if(data.code==1){
                            var str='';
                            for(var i=0;i<data.data.length;i++){
                                str +="<tr>";
                                str +="<td>"+data.data[i].id+"</td>";
                                str +="<td><span>"+data.data[i].questionId+"</span></td>";
                                str +="<td><span>"+data.data[i].stem+"</span></td>";
                                str +="<td><span>"+data.data[i].userName+"</span></td>";
                                str +="<td><span>"+data.data[i].createTime+"</span></td>";
                                str +='<td class="notSLH" style="width: 247px;"><div><a class="btn" href="javascript:void(0);" onclick="cancelQuestion('+data.data[i].id+')">取消</a></div>';
                                str +='</tr>'
                            }
                            $("#library-question").html(str);
                        } else {
                            alert(data.message);
                        }
                    }
                });
            } else {
                alert("没有题库ID");return;
            }
        }
        function cancelQuestion(e){
            if(confirm("是否确定要取消此题？")){
                $.ajax({
                    url: "/question/section-library/cancel-question",
                    data: {
                        id: e
                    },
                    type: "post",
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 1) {
                            alert(data.message)
                            location.reload();
                        } else {
                            alert(data.message)
                        }
                    }
                });
            }
        }
    </script>
    <script>
        $("#sort-select").change(function(){
            var id=$(this).val();
            $("#xuanzhe01").hide();
            if(id==2){//阅读
                $(".read-hide").show();
                $("#read-num").css({
                    display:'block'
                });
            }else{
                $(".read-hide").hide();
                $("#read-num").css({
                    display:'none'
                });
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
    </script>

