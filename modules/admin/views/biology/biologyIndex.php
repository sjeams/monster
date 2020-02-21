<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>CellEdit 单元格编辑 </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <!-- <link href="../demo.css" rel="stylesheet" type="text/css" />
    
    <script src="../../scripts/boot.js" type="text/javascript"></script> 
    
    <link href="../../scripts/miniui/themes/blue/skin.css" rel="stylesheet" type="text/css" /> -->
    
</head>
<body>
    <!-- <h1>CellEdit 单元格编辑</h1> -->
    <div style="width:800px;">
        <div class="mini-toolbar" style="border-bottom:0;padding:0px;">
            <table style="width:100%;">
                <tr>
                    <td style="width:100%;">
                        <a class="mini-button" iconCls="icon-add" onclick="addRow()" plain="true" tooltip="增加...">增加</a>
                        <a class="mini-button" iconCls="icon-remove" onclick="removeRow()" plain="true">删除</a>
                        <span class="separator"></span>
                        <a class="mini-button" iconCls="icon-save" onclick="saveData()" plain="true">保存</a>   
                        <span class="separator"></span>
                        <a class="mini-button" iconCls="icon-reload" onclick="BrushData()" plain="true">刷新</a>            
                    </td>
                    <td style="white-space:nowrap;">
                        <input id="key" class="mini-textbox" emptyText="请输入姓名" style="width:150px;" onenter="onKeyEnter"/>   
                        <a class="mini-button" onclick="search()">查询</a>
                    </td>
                </tr>
            </table>           
        </div>
    </div>
    <div id="datagrid1" class="mini-datagrid" style="width:98%;height:95%"
        url="/admin/biology/api-index" idField="id" 
        allowResize="true" pageSize="20" 
        allowCellEdit="true" allowCellSelect="true" multiSelect="true" 
        editNextOnEnterKey="true"
        
    >
        <div property="columns">
            <div type="indexcolumn"></div>
            <div type="checkcolumn"></div>
            <div  field="name" headerAlign="center" allowSort="true" width="150" >生物名称
                <input name="name" property="editor" class="mini-textbox" style="width:100%;" minWidth="200" />
            </div>
            <!--ComboBox：本地数据-->         
            <div type="comboboxcolumn" autoShowPopup="true" name="biology" field="biology" width="100"  allowSort="true"  align="center" headerAlign="center">种族
                <input property="editor" class="mini-combobox" style="width:100%;" data="Biologys" />                
            </div>
            <div field="grade" width="100"  allowSort="true" >等级
                <input name="grade" property="editor" class="mini-spinner"  minValue="1" maxValue="200" value="25" style="width:100%;"/>
            </div>  

            <div field="photo" width="100"  allowSort="true" >头像
                <input name="photo" property="editor" class="mini-htmlfile" name="uploadFile" limitType="*.png;*.jpg;*.xls,*.dwg;*.vsd" />       
                <!-- <a class="mini-button" id="blabla" iconCls="blabla">上传</a> -->
            </div>  

            <div field="image" width="100"  allowSort="true" >造型
                <input  name="image"  property="editor" class="mini-htmlfile" name="uploadFile" limitType="*.png;*.jpg;*.xls,*.dwg;*.vsd" />       
                <!-- <a class="mini-button" id="blabla" iconCls="blabla">上传</a> -->
            </div>  
            <div name="skill"  field="skill" headerAlign="center" allowSort="true" width="150" >生物技能
                <!-- <input property="editor" class="mini-textbox" style="width:100%;" minWidth="200" /> -->
                <input property="editor" name="skill"  class="mini-buttonedit" style="width:100%;" minWidth="200" onbuttonclick="onButtonEdit"/>
            </div>
            

            <div name="birthday" field="birthday" width="100"  allowSort="true" dateFormat="yyyy-MM-dd">出生日期
                <input property="editor" class="mini-datepicker" style="width:100%;"/>
            </div>    
            <div field="descript" width="150" headerAlign="center" allowSort="true">描述
                <input name="descript" property="editor" class="mini-textarea mini-textbox" style="width:200px;" minWidth="200" minHeight="50"/>
            </div>
            <!--ComboBox：本地数据-->         
            <!-- <div type="comboboxcolumn" autoShowPopup="true" name="special" field="special" width="100"  allowSort="true"  align="center" headerAlign="center">评分
                <input property="editor" class="mini-combobox" style="width:100%;" data="Genders" />                
            </div> -->
            <!--ComboBox：远程数据-->
            <!-- <div type="comboboxcolumn" field="country" width="100"  headerAlign="center" >国家
                <input property="editor" class="mini-combobox" style="width:100%;" url="/miniui/demo/data/countrys.txt" />                
            </div>    -->
            <div type="checkboxcolumn" field="married" trueValue="1" falseValue="0" width="60" headerAlign="center">是否异形</div>                        
        </div>
    </div>

    </body>
</html>
    <script type="text/javascript">

        var Biologys = [{ id: 1, text: '人' }, { id: 2, text: '鬼'},{ id: 3, text: '妖'},{ id: 4, text: '神'},{ id: 5, text: '异'},{ id: 6, text: '魔'}];

        var Genders = [{ id: 1, text: '男' }, { id: 2, text: '女'}];
        
        mini.parse();

        var grid = mini.get("datagrid1");
        grid.load();
        

        //////////////////////////////////////////////////////

        function search() {
            var key = mini.get("key").getValue();

            grid.load({ key: key });
        }

        function onKeyEnter(e) {
            search();
        }

        function addRow() {          
            var newRow = { name: "New Row" };
            grid.addRow(newRow, 0);

            grid.beginEditCell(newRow, "LoginName");
        }
        function removeRow() {
            var rows = grid.getSelecteds();
            if (rows.length > 0) {
                grid.removeRows(rows, true);
            }
        }
        function saveData() {            
            
            var data = grid.getChanges();
            var json = mini.encode(data);
            
            grid.loading("保存中，请稍后......");
            $.ajax({
                url: "/miniui/demo/data/AjaxService.php?method=SaveEmployees",
                data: { data: json },
                type: "post",
                success: function (text) {
                    grid.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
        }


        grid.on("celleditenter", function (e) {
            var index = grid.indexOf(e.record);
            if (index == grid.getData().length - 1) {
                var row = {};
                grid.addRow(row);
            }
        });

        grid.on("beforeload", function (e) {
            if (grid.getChanges().length > 0) {
                if (confirm("有增删改的数据未保存，是否取消本次操作？")) {
                    e.cancel = true;
                }
            }
        });


//        grid.on("cellcommitedit", function (e) {
//            if (e.field == "loginname") {
//                if (e.value == "111") {
//                    alert("不允许为111");
//                    e.cancel = true;
//                }
//            }
//        });



    function BrushData(){
        grid.reload();
    }
        
    </script>


<!-- 技能弹窗 -->
<script type="text/javascript">
    mini.parse();

    function onButtonEdit(e) {
        var buttonEdit = e.sender;

        var win = new UserSelectWindow();
        win.set({
            url: "/admin/biology/api-skill",                    
            title: "生物技能",
            width: 600,
            height: 350
        });
        
        win.show();
        win.search();

        //初始化数据
        win.setData(null, function (action) {
            if (action == "ok") {
                //获取数据
                var rows = win.getData();
                console.log(rows);
                if (rows) {    
                    //循环取值  
                    var ids = [], texts = [];
                    for (var i = 0, l = rows.length; i < l; i++) {
                        var row = rows[i];
                        ids.push(row.id);
                        texts.push(row.name);
                    }
                    var data = {};
                    data.id = ids.join(",");
                    data.text = texts.join(",");
                    console.log(data.id);
                    console.log(data.text);
                    buttonEdit.setValue(data.id);
                    buttonEdit.setText(data.text);
                    console.log( buttonEdit);
                    // grid.get('input').setValue(data.text);
                    // alert("选中记录: " + row.name);
                }
            }
        });
    }
    
</script>

