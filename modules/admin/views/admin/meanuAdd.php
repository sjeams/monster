<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>菜单管理</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    
    <!-- <script src="../../scripts/boot.js" type="text/javascript"></script> -->
    

    <style type="text/css">
    html, body
    {        
        padding:0;
        margin:0;
        border:0;
        height:100%;
        overflow:hidden;
        font-family: cursive;
    }
    </style>
</head>
<body>    
     
    <form id="form1" method="post">
        <input name="id" class="mini-hidden" />
        <div style="padding-left:11px;padding-bottom:5px;">
            <table style="table-layout:fixed;">
                <tr>
                    <td >标题：</td>
                    <td >    
                        <input name="educational" class="mini-textbox"  required="true"  emptyText="请输入标题"/> 
                    </td>
                    <td >模块：</td>
                    <td >    
                        <input name="school" class="mini-textbox" style="width:99%;" />
                    </td>
                </tr>    
                <tr>
                    <td >路径：</td>
                    <td colspan="3">    
                        <input name="url" class="mini-textarea" style="width:386px;" />
                    </td>
                </tr>   
                <tr>
                    <td >分类：</td>
                    <td colspan="3">    
                        <!-- <input name="url" class="mini-textarea" style="width:386px;" /> -->
                        <input id="btnEdit1" class="mini-buttonedit" onbuttonclick="onButtonEdit"/> (默认父级为0)
                    </td>
                </tr>   
                <tr>
                    <td >按钮</td>
                    <td colspan="3">    
                        <input name="update" class="mini-textarea" style="width:386px;" value='<input type="button" value="编辑节点" onclick="onEditNode()"/> <input type="button" value="删除节点" onclick="onRemoveNode()"/>' />
                    </td>
                </tr>  
                <tr>
                    <td >备注：</td>
                    <td colspan="3">    
                        <input name="remark" class="mini-textarea" style="width:386px;" />
                    </td>
                </tr>           
            </table>
        </div>

    <!-- <fieldset style="border:solid 1px #aaa;padding:3px;">
            <legend >基本信息</legend>
            <div style="padding:5px;">
        <table>
            <tr>
                <td style="width:80px;">姓名</td>
                <td style="width:150px;">    
                    <input name="name" class="mini-textbox" required="true"/>
                </td>
                <td style="width:80px;">性别：</td>
                <td >                        
                    <select name="gender" class="mini-radiobuttonlist">
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td >年龄：</td>
                <td >    
                    <input name="age" class="mini-spinner" value="25" minValue="1" maxValue="200" />
                </td>
                <td >出生日期：</td>
                <td >    
                    <input name="birthday" class="mini-datepicker" required="true" emptyText="请选择日期"/>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td >    
                    <input name="married" class="mini-checkbox" text="已婚？" trueValue="1" falseValue="0" />
                </td>
                <td ></td>
                <td >    
                    
                </td>
            </tr>     
            <tr>
                <td >国家：</td>
                <td >    
                    <input name="country" class="mini-combobox" url="/miniui/demo/data/countrys.txt" />
                </td>
                <td >城市：</td>
                <td >    
                    <input name="city" class="mini-combobox"  />
                </td>
            </tr>
            <tr>
                <td >url：</td>
                <td colspan="3">    
                    <input name="url" class="mini-textarea" style="width:386px;" />
                </td>
            </tr>  
            <tr>
                <td >备注：</td>
                <td colspan="3">    
                    <input name="remark" class="mini-textarea" style="width:386px;" />
                </td>
            </tr>    
        
        </table>            
            </div>
    </fieldset> -->

        <div style="text-align:center;padding:10px;">               
            <a class="mini-button" onclick="onOk" style="width:60px;margin-right:20px;">确定</a>       
            <a class="mini-button" onclick="onCancel" style="width:60px;">取消</a>       
        </div>        
    </form>
    <script type="text/javascript">
        mini.parse();


        var form = new mini.Form("form1");

        function SaveData() {
            var o = form.getData();            

            form.validate();
            if (form.isValid() == false) return;

            var json = mini.encode([o]);
            $.ajax({
                url: "../data/AjaxService.php?method=SaveEmployees",
		        type: 'post',
                data: { data: json },
                cache: false,
                success: function (text) {
                    CloseWindow("save");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                    CloseWindow();
                }
            });
        }

        ////////////////////
        //标准方法接口定义
        function SetData(data) {
            if (data.action == "edit") {
                //跨页面传递的数据对象，克隆后才可以安全使用
                data = mini.clone(data);

                $.ajax({
                    url: "../data/AjaxService.php?method=GetEmployee&id=" + data.id,
                    cache: false,
                    success: function (text) {
                        var o = mini.decode(text);
                        form.setData(o);
                        form.setChanged(false);

                        onDeptChanged();
                        mini.getbyName("position").setValue(o.position);
                    }
                });
            }
        }

        function GetData() {
            var o = form.getData();
            return o;
        }
        function CloseWindow(action) {            
            if (action == "close" && form.isChanged()) {
                if (confirm("数据被修改了，是否先保存？")) {
                    return false;
                }
            }
            if (window.CloseOwnerWindow) return window.CloseOwnerWindow(action);
            else window.close();            
        }
        function onOk(e) {
            SaveData();
        }
        function onCancel(e) {
            CloseWindow("cancel");
        }
        //////////////////////////////////
        function onDeptChanged(e) {
            var deptCombo = mini.getbyName("dept_id");
            var positionCombo = mini.getbyName("position");
            var dept_id = deptCombo.getValue();

            positionCombo.load("../data/AjaxService.php?method=GetPositionsByDepartmenId&id=" + dept_id);
            positionCombo.setValue("");
        }



    </script>
    <!-- 弹出树 -->
    <script type="text/javascript">
        mini.parse();

        function onButtonEdit(e) {
            var btnEdit = this;
            mini.open({
                url:  "/admin/admin/meanu-tree",
                showMaxButton: false,
                title: "选择树",
                width: 350,
                height: 350,
                ondestroy: function (action) {                    
                    if (action == "ok") {
                        var iframe = this.getIFrameEl();
                        var data = iframe.contentWindow.GetData();
                        data = mini.clone(data);
                        if (data) {
                            btnEdit.setValue(data.id);
                            btnEdit.setText(data.text);
                        }
                    }
                }
            });            
             
        }        

    </script>
</body>
</html>
