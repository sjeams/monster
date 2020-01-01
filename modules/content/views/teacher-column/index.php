<style>

.hidden_two span{    
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
    text-overflow:ellipsis;}
</style>

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li class="active">名师专栏</li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle"
               href="/content/teacher-column/add">添加内容</a>
        </li>
    </ul>
    <form action="/content/teacher-column/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    老师：
                </td>
                <td>
                    <select name="nameid">
                        <option value="0">全部</option>
                        <?php foreach($teachers as $k=>$v){
                            ?>
                            <option value="<?php echo $v['id'];?>" <?php if(isset($_GET['nameid']) && $_GET['nameid'] == $v['id']) echo "selected = 'selected'" ?>><?php echo $v['name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    类型：
                </td>
                <td>
                    <select name="type">
                        <option value="0">全部</option>
                        <option value="1"<?php if(isset($_GET['type']) && $_GET['type'] == 1) echo "selected='selected'"?>>经验技巧</option>
                        <option value="2" <?php if(isset($_GET['type']) && $_GET['type'] == 2) echo "selected='selected'"?>>要点解读</option>
                    </select>
                </td>
                <td>
                    热门：
                </td>
                <td>
                    <select name="hot">
                        <option value="0">全部</option>
                        <option value="1"<?php if(isset($_GET['hot']) && $_GET['hot'] == 1) echo "selected='selected'"?>>是</option>
                        <option value="-1" <?php if(isset($_GET['hot']) && $_GET['hot'] == -1) echo "selected='selected'"?>>否</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/teacher-column/index" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>老师姓名</th>
                <th width="100px">题目</th>
                <th>简介</th>
                <th>阅读量</th>
                <th>类型</th>
                <th>标签</th>
                <th>热门</th>
                <th>图片</th>
                <th>添加时间</th>
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
                    <input name="id[]" type="hidden" value="<?php echo $v['id']?>">
                    <td><span><?php echo $v['teachername']?></span></td>
                    <td class="hidden_two"><span ><?php echo $v['title']?></span></td>
                    <td class="hidden_two"><span ><?php echo $v['introduce']?></span></td>
                    <td><span><?php echo $v['view']?></span></td>
                    <td><p class="ellipsis">
                            <?php if($v['type']== 1) echo '经验技巧';else echo '要点解读';?>
                        </p>
                    </td>
                    <td ><span ><?php echo $v['label']?></span></td>
                    <td><p class="ellipsis">
                            <?php if($v['hot']== 1) echo '是';else echo '否';?>
                        </p>
                    </td>
                    <td style="overflow: hidden;"><span><?php echo $v['image']?></span></td>
                    <td><span><?php echo $v['createTime']?></span></td>
                    <td  class="notSLH" style="width: 247px;">
                        <div>
                            <a class="btn" href="/content/teacher-column/add?id=<?php echo $v['id']; ?>">修改</a>
                            <a class="btn" href="/content/teacher-column/delete?id=<?php echo $v['id'] ; ?>" >删除</a>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
    <div class="pagination pagination-right">
        <span style="font-size: 17px;position: relative;bottom: 7px;">共<?php echo $total;?>条&nbsp;</span>&nbsp;&nbsp;&nbsp;
        <input type="hidden" id="jumpUrl" value="<?php echo Yii::$app->request->getUrl();?>" />
        <?php if($total > 10){?>
            <span style="font-size: 17px;position: relative;bottom: 5px;">
            <a onclick="jumpPage()"  style="cursor: pointer;">Go</a>&nbsp;
            <input type="text" style="width: 20px;height: 18px;" id="jumpPage">&nbsp;页
        </span>
        <?php }?>
        <?php use yii\widgets\LinkPager;
        echo LinkPager::widget([
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
    </script>
</div>