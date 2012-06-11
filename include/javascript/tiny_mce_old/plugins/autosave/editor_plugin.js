(function () {
    tinymce.create('tinymce.plugins.AutoSavePlugin', {init:function (ed, url) {
        var t = this;
        t.editor = ed;
        window.onbeforeunload = tinymce.plugins.AutoSavePlugin._beforeUnloadHandler;
    }, getInfo:function () {
        return{longname:'Auto save', author:'Moxiecode Systems AB', authorurl:'http://tinymce.moxiecode.com', infourl:'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/autosave', version:tinymce.majorVersion + "." + tinymce.minorVersion};
    }, 'static':{_beforeUnloadHandler:function () {
        var msg;
        tinymce.each(tinyMCE.editors, function (ed) {
            if (ed.getParam("fullscreen_is_enabled"))return;
            if (ed.isDirty()) {
                msg = ed.getLang("autosave.unload_msg");
                return false;
            }
        });
        return msg;
    }}});
    tinymce.PluginManager.add('autosave', tinymce.plugins.AutoSavePlugin);
})();