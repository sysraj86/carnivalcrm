(function () {
    var Event = tinymce.dom.Event;
    tinymce.create('tinymce.plugins.NonEditablePlugin', {init:function (ed, url) {
        var t = this, editClass, nonEditClass;
        t.editor = ed;
        editClass = ed.getParam("noneditable_editable_class", "mceEditable");
        nonEditClass = ed.getParam("noneditable_noneditable_class", "mceNonEditable");
        ed.onNodeChange.addToTop(function (ed, cm, n) {
            var sc, ec;
            sc = ed.dom.getParent(ed.selection.getStart(), function (n) {
                return ed.dom.hasClass(n, nonEditClass);
            });
            ec = ed.dom.getParent(ed.selection.getEnd(), function (n) {
                return ed.dom.hasClass(n, nonEditClass);
            });
            if (sc || ec) {
                t._setDisabled(1);
                return false;
            } else t._setDisabled(0);
        });
    }, getInfo:function () {
        return{longname:'Non editable elements', author:'Moxiecode Systems AB', authorurl:'http://tinymce.moxiecode.com', infourl:'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/noneditable', version:tinymce.majorVersion + "." + tinymce.minorVersion};
    }, _block:function (ed, e) {
        var k = e.keyCode;
        if ((k > 32 && k < 41) || (k > 111 && k < 124))return;
        return Event.cancel(e);
    }, _setDisabled:function (s) {
        var t = this, ed = t.editor;
        tinymce.each(ed.controlManager.controls, function (c) {
            c.setDisabled(s);
        });
        if (s !== t.disabled) {
            if (s) {
                ed.onKeyDown.addToTop(t._block);
                ed.onKeyPress.addToTop(t._block);
                ed.onKeyUp.addToTop(t._block);
                ed.onPaste.addToTop(t._block);
            } else {
                ed.onKeyDown.remove(t._block);
                ed.onKeyPress.remove(t._block);
                ed.onKeyUp.remove(t._block);
                ed.onPaste.remove(t._block);
            }
            t.disabled = s;
        }
    }});
    tinymce.PluginManager.add('noneditable', tinymce.plugins.NonEditablePlugin);
})();