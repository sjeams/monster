// CKEDITOR.plugins.add( 'jme', {
//     icons: 'jme',
//     init: function( editor ) {
//         // Plugin logic goes here...
//         editor.addCommand( 'jmeDialog', new CKEDITOR.dialogCommand( 'jmeDialog' ) );
//         editor.ui.addButton( 'jme', {
// 				    label: 'JMEditor',
// 				    command: 'jmeDialog',
// 				    toolbar: 'insert'
// 				});
// 				CKEDITOR.dialog.add( 'jmeDialog', this.path + 'dialogs/jme.js' );
//
//     }
// });
KindEditor.plugin('jme', function(e){
    var editor = this, name = 'jme', lang = editor.lang(name + '.');
    editor.clickToolbar(name, function() {
        var dialog = editor.createDialog({
            name : name,
            width : 500,
            height : 300,
            title : editor.lang(name),
            body : '<div style="width:500px;height:300px;">' +
            '<iframe id="math_frame" style="width:500px;height:300px;" frameborder="no" src="'+ KindEditor.basePath +'plugins/jme/dialogs/mathdialog.html"></iframe></div>',

            closeBtn : {
                name : '关闭',
                click : function(e) {
                    dialog.remove();
                }
            },
            yesBtn : {
                name : '确定',
                click : function(e) {
                    var thedoc = document.frames ? document.frames('math_frame').document : getIFrameDOM("math_frame");
                    var mathHTML = '<span class="mathquill-rendered-math" style="font-size:'
                        + '20px' + ';" >' + $("#jme-math",thedoc).html() + '</span><span>&nbsp;</span>';

                    editor.insertHtml(mathHTML).hideDialog().focus();
                    return;
                }
            }
        });
    });
});

function getIFrameDOM(fid){
    var fm = getIFrame(fid);
    return fm.document||fm.contentDocument;
}
function getIFrame(fid){
    return document.getElementById(fid)||document.frames[fid];
}