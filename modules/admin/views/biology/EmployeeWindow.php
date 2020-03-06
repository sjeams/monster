<style>
    .sp-replacer {
        border-width: 0;
        padding: 0;
        /*position: absolute;*/
        /*top: 50%;*/
    }

    .sp-dd {
        display: none;
    }

    
    body .mini-labelfield {
        display: inline-block;
    }
</style>
<form id="form1" method="post">
    <input name="id" class="mini-hidden" />
    <div style="padding-left:11px;padding-bottom:5px;">
        <table>
            <tr>
                <td style="width:80px;">姓名</td>
                <td style="width:150px;">    
                    <input name="name" class="mini-textbox"/>
                </td>
                <td style="width:80px;">头像</td>
                <td rowspan="5" style="border:1px solid #cccccc">      
                    <img src="" alt="头像"> 
                    <input type="hidden" name="headerPicture" >                 
                </td>
                <td style="width:80px;">形象</td>
                <td rowspan="5" style="border:1px solid #cccccc">      
                    <img src="" alt="形象">                  
                    <input type="hidden" name="headerPicture">     
                </td>
            </tr>
            <tr>
                <td style="width:80px;">性别</td>
                <td >                        
                    <select name="sex" class="mini-combobox">
                        <option value="1">男</option>
                        <option value="2">女</option>
                        <option value="3">未知</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td >是否异形</td>
                <td >    
                    <input name="yiXing" class="mini-checkbox" text="异形" trueValue="1" falseValue="0" />
                </td>
            </tr>
            <tr>
                <td style="width:80px;">种族</td>
                <td style="width:150px;">    
                    <input name="biology" class="mini-combobox" valueField="id" textField="name" 
                        url="" onvaluechanged="onDeptChanged" 
                        emptyText="请选择种族"
                        />
                </td>
            </tr> 
            <tr>
                <td >类型</td>
                <td >                        
                    <select name="type" class="mini-combobox">
                        <option value="1">普通</option>
                        <option value="2">商店</option>
                        <option value="3">NPC</option>
                    </select>
                </td>
            </tr> 

            <tr>
                <td >幸运</td>
                <td >    
                    <input name="lucky" class="mini-spinner" value="1" minValue="1" maxValue="200" />
                </td>  
                <td style="width:80px;">境界</td>
                <td style="width:150px;">    
                    <input  name="state" class="mini-combobox" style="width:100%;" url="/admin/biology/biology-stateall" emptyText="请选择境界" />    
                </td>
                <td >血脉</td>
                <td >    
                    <input name="xueMai" class="mini-combobox" url="" />
                </td>
            </tr>   
            <tr>
                <td >力量</td>
                <td >    
                    <input name="power"  class="mini-spinner" value="1" minValue="1" maxValue="200" />
                </td>
                <td >敏捷</td>
                <td >    
                    <input name="agile"  class="mini-spinner" value="1" minValue="1" maxValue="200" />
                </td>
                <td >智力</td>
                <td >    
                    <input name="intelligence"  class="mini-spinner" value="1" minValue="1" maxValue="200" />
                </td>
            </tr>  
            <tr>
                <td >自由属性</td>
                <td >    
                    <input name="maxNature" class="mini-combobox" valueField="id" textField="name" url="" />
                </td>
                <td >潜能</td>
                <td >    
                    <input name="qianNeng" class="mini-textbox" />
                </td>
                <td >性格</td>
                <td >    
                    <input name="character" class="mini-textbox" />
                </td>
            </tr> 
            <tr>
                <td >等级</td>
                <td >    
                    <input name="grade" class="mini-textbox" />
                </td>
                <td >进阶(升星)</td>
                <td >    
                    <input name="jinJie" class="mini-textbox" />
                </td>
                <td >灵气</td>
                <td >    
                    <input name="reiki" class="mini-textbox" />
                </td>
            </tr> 
            <tr>
                <td >训练</td>
                <td >    
                    <input name="xunLian" class="mini-combobox" valueField="id" textField="name" url="" />
                </td>
                <td >刷新</td>
                <td >    
                    <input name="shuaXin" class="mini-textbox" />
                </td>
                <td >悟性</td>
                <td >    
                    <input name="wuXing" class="mini-textbox" />
                </td>
            </tr> 
            
            <tr>
                <td >技能</td>
                <td >    
                    <input name="skill" class="mini-combobox" valueField="id" textField="name" url="" />
                </td>
                <td >元神</td>
                <td >    
                    <input name="yuanShen" class="mini-textbox" />
                </td>
                <td >缘分</td>
                <td >    
                    <input name="Fate" class="mini-textbox" />
                </td>
            </tr> 
            <tr>
                <td >描述</td>
                <td colspan="5">    
                    <input name="descript" class="mini-textarea" style="width:100%;" />
                </td>
            </tr>   

        </table>  
    </div>
    <fieldset style="border:solid 1px #aaa;padding:3px;">
        <legend >基本信息</legend>
        <div style="padding-left:60px;">
            <table style="table-layout:fixed;">
                <tr>
                    <td >生命</td>
                    <td >    
                        <input name="shengMing" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >魔法</td>
                    <td >    
                        <input name="moFa" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >攻击</td>
                    <td >    
                        <input name="gongJi" class="mini-textbox readonly" readonly  />
                    </td>
                </tr>
                <tr>
                    <td >护甲</td>
                    <td >    
                        <input name="huJia" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >特攻</td>
                    <td >    
                        <input name="faGong" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >法抗</td>
                    <td >    
                        <input name="fakang" class="mini-textbox readonly" readonly  />
                    </td>
                </tr>       
                <tr>
                    <td >减伤</td>
                    <td >    
                        <input name="jianShang" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >真实伤害</td>
                    <td >    
                        <input name="zhenShang" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >闪避</td>
                    <td >    
                        <input name="shanbi" class="mini-textbox readonly" readonly  />
                    </td>
                </tr>   
                <tr>
                    <td >速度</td>
                    <td >    
                        <input name="suDu" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >暴击</td>
                    <td >    
                        <input name="baoji" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >暴击率</td>
                    <td >    
                        <input name="baojilv" class="mini-textbox readonly" readonly  />
                    </td>
                </tr>   
                <tr>
                    <td >颜色          <input id="full" ></td>
                    <td class="colorPicker">
                        <!-- <input type="hidden" labelField="true" label="选择颜色:" id="textbox1" name="color"  emptyText="请选择颜色"> -->
                        <input name="color" class="mini-textbox">
              
                    </td>
                    <td >战力</td>
                    <td >    
                        <input name="special" class="mini-textbox readonly" readonly  />
                    </td>
                    <td >评分</td>
                    <td >    
                        <input name="score" class="mini-textbox readonly" readonly  />
                    </td>
                </tr>     
            </table>
        </div>
    </fieldset>
    <div style="text-align:center;padding:10px;">               
        <a class="mini-button" onclick="onOk" style="width:60px;margin-right:20px;">确定</a>       
        <a class="mini-button" onclick="onCancel" style="width:60px;">取消</a>       
    </div>        
</form>


<script type="text/javascript">
    mini.parse();
    var Sex = [{ id: 1, text: '男' }, { id: 2, text: '女'},{ id: 3, text: '未知'}];  
    var form = new mini.Form("form1");

    function SaveData() {
        var o = form.getData();            

        form.validate();
        if (form.isValid() == false) return;

        var json = mini.encode([o]);

        console.log(json);
        // $.ajax({
        //     url: "../data/AjaxService.php?method=SaveEmployees",
        //     type: 'post',
        //     data: { data: json },
        //     cache: false,
        //     success: function (text) {
        //         CloseWindow("save");
        //     },
        //     error: function (jqXHR, textStatus, errorThrown) {
        //         alert(jqXHR.responseText);
        //         CloseWindow();
        //     }
        // });
    }

    ////////////////////
    //标准方法接口定义
    function SetData(data) {
        if (data.action == "edit") {
            //跨页面传递的数据对象，克隆后才可以安全使用
            data = mini.clone(data);
            $.ajax({
                url: "/admin/api/biology-updateone?id="+data.id,
                cache: false,
                success: function (text) {
                    var o = mini.decode(text);
                    form.setData(o);
                    form.setChanged(false);
                    onDeptChanged(); //初始化数据
                    // mini.getbyName("position").setValue(o.position);
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
    ////////////////////////////////// 初始化数据
    function onDeptChanged(e) {  
            //初始化数据--颜色
            var colorname = mini.getbyName("color");
            colorvalue = colorname.getValue();
            
            $("#full").spectrum({
                color: colorvalue,  //初始化颜色
                preferredFormat: "hex3", //输入框颜色格式
                showInput: true,  //显示输入
                showPalette: true, //显示选择器面板
                cancelText: "取消",//取消按钮,按钮文字
                chooseText: "选择",//选择按钮,按钮文字
                palette: [
                    ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                    ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                    ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                    ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                    ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                    ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                    ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                    ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
                ]
            });
    }


    $(function () {
        $('#full').change(function() {
            var color = mini.getbyName("color");
            color.setValue($("#full").val())
        });

    })
</script>
