<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PagerTree 树形分页表格</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script src="/monster/pagertree/pagertree.js" type="text/javascript"></script>
    
</head>

<style>                                                     


</style>

<body>
    <!-- <h1>CellEdit 单元格编辑</h1> -->
    任务名称：<input id="key"/><input type="button" value="查找" onclick="search()"/>
    <input type="button" value="收缩所有" onclick="collapseAll()" />
    <input type="button" value="展开所有" onclick="expandAll()" />
    <!-- mini-pagertree    page
    allowResize="false" expandOnLoad="false"  // 展开全部 
    allowDrag="true"  //   允许拖拽节点
    allowDrop="true" // 允许投放节点
    -->
<!-- <div id="treegrid1" class="mini-treegrid " style="width:98%;height:90%"     
    url="/miniui/demo/data/tasks.txt" showTreeIcon="true" 
    treeColumn="taskname" idField="UID" parentField="ParentTaskUID" resultAsTree="false"
    allowResize="false" expandOnLoad="false" 
    allowCellEdit="true" allowCellSelect="true"  frozenStartColumn="0" frozenEndColumn="1" 
    pageSize="20" 
> -->

<div id="treegrid1" class="mini-pagertree" style="width:98%;height:90%"    allowResize="true" 
    url="/admin/api/admin" idField="UID"  treeColumn="taskname" pageSize="20"
>
    <div property="columns">
        <div type="indexcolumn"></div>
        <div name="taskname" field="title" width="160" >任务名称
            <input property="editor" class="mini-textbox" style="width:100%;" />
        </div>
        <div field="PercentComplete" width="80">进度
            <input property="editor" class="mini-spinner"  minValue="0" maxValue="100" value="0" style="width:100%;"/>
        </div>
        <div field="Duration" width="60" align="right">工期
            <input property="editor" class="mini-spinner"  minValue="0" maxValue="1000000" value="0" style="width:100%;"/>
        </div>
        <div field="Start" width="80" dateFormat="yyyy-MM-dd">开始日期
            <input property="editor" class="mini-datepicker" style="width:100%;"/>
        </div>
        <div field="Finish" width="80" dateFormat="yyyy-MM-dd">完成日期
            <input property="editor" class="mini-datepicker" style="width:100%;"/>
        </div> 
        <div type="checkboxcolumn" field="Critical" trueValue="1" falseValue="0" width="60" dateFormat="yyyy-MM-dd">关键任务            
        </div>                            
    </div>
</div>

<script>
    mini.parse();
    var tree = mini.get("treegrid1");
    var treeid = '1';
    tree.load({
        id: treeid
    });

    function search() {
        var key = document.getElementById('key').value;
        tree.load({
            id: treeid,
            name: key
        });
    }
    function expandAll() {
        tree.expandAll();
    }
    function collapseAll() {
        tree.collapseAll();
    }
</script>
</body>
</html>
