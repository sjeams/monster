<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>

<!-- 树形菜单选择 -->
<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/question/index/index">试题模块</a> <span class="divider">/</span></li>
        <li class="active">试题管理</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/question/question/add?url=<?php echo Yii::$app->request->getUrl() ?>">添加问题</a>
        </li>
    </ul>
    <form action="<?php echo baseUrl?>/question/question/index" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    试题ID：&nbsp;&nbsp;
                    <input type="text" name="questionId" value="<?php echo isset($_GET['questionId'])?$_GET['questionId']:'' ?>">
                </td>
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
                    来源：&nbsp;&nbsp;
                    <select name="sourceId" id="sourceSelect">
                        <option value="">请选择</option>
                        <?php
                        foreach($sources as $v) {
                            ?>
                            <option value="<?php echo $v['id']?>" <?php echo isset($_GET['sourceId']) && $_GET['sourceId'] == $v['id']?'selected':''?>><?php echo $v['name']?></option>
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
                    关键字：&nbsp;&nbsp;
                    <input name="keyWord"  size="25" type="text" value="<?php echo isset($_GET['keyWord'])?$_GET['keyWord']:''?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    答案：&nbsp;&nbsp;
                    <select name="answer">
                        <option value="">请选择</option>
                        <option value="1" <?php echo isset($_GET['answer']) && $_GET['answer'] == 1?'selected':''?>>有答案</option>
                        <option value="2" <?php echo isset($_GET['answer']) && $_GET['answer'] == 2?'selected':''?>>无答案</option>
                    </select>
                </td>
                <td>
                    解析：&nbsp;&nbsp;
                    <select name="analysis">
                        <option value="">请选择</option>
                        <option value="1" <?php echo isset($_GET['analysis']) && $_GET['analysis'] == 1?'selected':''?>>有解析</option>
                        <option value="2" <?php echo isset($_GET['analysis']) && $_GET['analysis'] == 2?'selected':''?>>无解析</option>
                    </select>
                </td>
                <td>
                    用户名：&nbsp;&nbsp;
                    <input name="userName"  size="25" type="text" value="<?php echo isset($_GET['userName'])?$_GET['userName']:''?>"/>
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
                <th>分类</th>
                <th>来源</th>
                <th>类型</th>
                <th>知识点</th>
                <th>题干</th>
                <th>答案</th>
                <th>阅读题干</th>
                <th>难度</th>
                <th>传题时间</th>
                <th>传题用户</th>
                <th>解析</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $v) {
                ?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><span><?php echo $v['cat'] ?></span></td>
                    <td><span><?php echo $v['source'] ?></span></td>
                    <td><span><?php echo $v['type'] ?></span></td>
                    <td><span><?php echo $v['know'] ?></span></td>
                    <td><p class="ellipsis"><?php echo $v['stem'] ?></p></td>
                    <td><span><?php echo $v['answer'] ?></span></td>
                    <td><p class="ellipsis"> <?php echo $v['readStem'] ?></p></td>
                    <td><span><?php echo $v['level'] ?></span></td>
                    <td><span><?php echo date("Y-m-d H:i:s",$v['createTime']) ?></span></td>
                    <td><span><?php echo $v['userName'] ?></span></td>
                    <td><span>
                            <?php if($v['analysis'] ==1)echo '有';else echo '无';?>
                        </span></td>
                    <td class="notSLH" style="width: 247px;">
                        <div>
<!--                            <a class="btn" href="#">内容管理</a>-->
    <!--                        <a class="btn" href="javascript:;" onclick="deleteA(<?php /*echo $v['id'] */?>)">删除</a>-->
                            <a class="btn" href="/question/question/update?id=<?php echo $v['id'] ?>&url=<?php echo Yii::$app->request->getUrl() ?>">修改</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="">
    </form>
    <div class="pagination pagination-right">
        <input type="hidden" id="jumpUrl" value="<?php echo Yii::$app->request->getUrl();?>" />
        <?php if($total > 100){?>
            <span style="font-size: 17px;position: relative;bottom: 5px;">
            <a onclick="jumpPage()"  style="cursor: pointer;">Go</a>&nbsp;
            <input type="text" style="width: 20px;height: 18px;" id="jumpPage">&nbsp;页
        </span>
        <?php }?>
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
    <script>
        function jumpPage(){
            var url = $('#jumpUrl').val();
            var page = $("#jumpPage").val();
            if(isNaN(page) || page <= 0 || !page){
                alert('请输入正确的数值');
                return false;
            }
            var res = url.indexOf('page');
            if(res > 0){
                var u = url.replace(/page=(\d+)/,'page='+page);
            }else{
                var re = url.indexOf('?');
                if(re > 0){
                    u = url+'&page='+page;
                }else{
                    u = url+'?page='+page;
                }
            }
            location.href = u;
        }
        $(function () {
            var page = <?php echo ceil($count/$pageSize) ?>;
            var url1 = "/question/question/index?questionId=<?php echo isset($_GET['questionId'])?$_GET['questionId']:''?>&catId=<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>&sourceId=<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:'' ?>&knowId=<?php echo isset($_GET['knowId'])?$_GET['knowId']:'' ?>&keyWord=<?php echo isset($_GET['keyWord'])?$_GET['keyWord']:'' ?>&page=1&per-page=10";
            var url2 = "/question/question/index?questionId=<?php echo isset($_GET['questionId'])?$_GET['questionId']:''?>&catId=<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>&sourceId=<?php echo isset($_GET['sourceId'])?$_GET['sourceId']:'' ?>&knowId=<?php echo isset($_GET['knowId'])?$_GET['knowId']:'' ?>&keyWord=<?php echo isset($_GET['keyWord'])?$_GET['keyWord']:'' ?>&page="+page+"&per-page=10";
            var total_star='<li><a href="#"><?php echo "共".$totalPage."页"; ?></a></li>';
            var page1 =<?php echo ceil($count/$pageSize)-1 ?>;
            var str_end='<li><a href="'+url2+'" data-page="page1">尾页</a></li>';
            var str_star='<li><a href="'+url1+'" data-page="0">首页</a></li>';
            $('ul.pagination').append(str_end);
            $('ul.pagination').prepend(str_star);
            $('ul.pagination').prepend(total_star);
        });
    </script>
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
                        var source=data.source;
                        var type=data.type;
                        var str='<option value="">请选择</option>',str02='';
                        $(".sort-showD").show();
                        for(var i=0;i<know.length;i++){
                            str+='<option value="'+know[i].id+'">'+know[i].name+'</option>';
                        }
                        $("#knowSelect").html(str);
                        for(var j=0;j<source.length;j++){
                            str02+='<option value="'+source[j].id+'">'+source[j].name+'</option>';
                        }
                        $("#sourceSelect").html(str02);

                    }
                });
            }
        });
        function deleteA(o) {
            var r = confirm("是否确定删除此题");
            if (r == true) {
                $.ajax({
                    url: "/question/question/delete",
                    dataType: "json",
                    data: {
                        id: o //问题ID
                    },
                    type: "get",
                    success: function (re) {
                        alert(re.message);
                        location.reload();
                    }
                });
            }
        }
    </script>

