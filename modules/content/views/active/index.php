
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">GRE活动推送设置</li>
    </ul>
    <!-- <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/active/add">添加活动推送</a>
        </li>
    </ul> -->
    <form   class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    用户userid：
                    <input name="userid" class="input-big" size="25" type="text" class="number" placeholder="默认所有人,多用户可用逗号隔开" value="<?php echo isset($_GET['uid'])?$_GET['uid']:''?>"/>
                </td>
                <td>
                    推送类型：
                    <select name="type" id="change" >
                        <option value="1" <?php echo isset($_GET['type'])&&$_GET['type']==1?'selected':'' ;?>  >提分课程</option>
                        <option value="2" <?php echo isset($_GET['type'])&&$_GET['type']==2?'selected':'' ;?>  >刷题活动</option>
                    </select>
                </td>
                <td>
                    内容ID：
                    <input  name="noticeId" class="input-big  browsers" type="text" class="number" list="browsers"value=""  />
                    <datalist id="browsers" style=" overflow:scroll; max-height:200px; ">
                        <?php foreach($contentList as $list){ ?>
                            <option label=" <?php echo $list['name']; ?> " value=" <?php echo $list['id']; ?>" > <?php echo $list['id']; ?></option>
                        <?php } ?>
                    </datalist>                      
                <td>


                    <button class="btn btn-primary" id="push" type="button">添加推送</button>
                </td>
            </tr>
        </table>
    </form>
    <form action="/content/active/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <!-- <th style="width: 120px;">排序</th> -->
                <th style="width: 120px;">ID</th>
                <th>用户uid</th>
                <th>来源</th>
                <th>活动id</th>
                <th>是否查看</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($content as $kss => $v) {
                if($kss == 10){
                    break;
                }
                ?>
                <tr>
                    <input name="id[]" type="hidden"  value="<?php echo $v['id']?>">
                    <!-- <td><input type="text" style="width: 30px;" name="sort[]" value="<?php echo $v['sort']?>"/></td> -->
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['uid']?></span></td>
                    <td><span><?php echo  $v['type']=='1'?'做题模考':( $v['type']=='2'?'提分课' :'刷题活动') ; ?></span></td>
                    <td ><div style="word-break: break-all;height: 40px;overflow: hidden"><?php echo $v['noticeId']?></div></td>
                    <td><span><?php echo $v['isLook']=='1'?'未查看':'已查看'; ?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <!-- <a class="btn" href="/content/active/add?id=<?php echo $v['id']; ?>">修改</a> -->
                            <a class="btn" onclick=" DeleteOne(<?php echo $v['id'] ; ?>)"  >删除</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <!-- <button   class="push btn btn-primary" type="submit">排序</button> -->
    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;
        echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
</div>
<script>
        $("#change").change(function(){
                //要触发的事件
            var type = $("#change").find("option:selected").val();
            self.location.href="/content/active/index?type="+type;
        });
    </script>
<script>
    //by sjeam  点击推送事件
    $('#push').click(function(){
        var userid = $("input[name='userid']").val()  
        var type = $("#change option:selected").val()  
        var noticeId = $("input[name='noticeId']").val()  
        if(noticeId==''){
            alert('添加失败,请选择发送内容');
        }
        $.ajax({
            url: "/content/active/add",
            type: "post",
            data: {
                userid: userid,
                type: type,
                noticeId: noticeId,
            },
            dataType: "json",
            success: function (data) {
                alert('操作成功，用户不存则不发送！');
                location.reload();   
            }
        })
    });
     //by sjeam  点击删除事件 
    function DeleteOne(id){
        $.ajax({
            url: "/content/active/delete",
            type: "post",
            data: {
                id : id,
            },
            dataType: "json",
            success: function (data) {
                alert('删除成功');
                location.reload();   
            }
        })
    }


</script>