/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 1/12/12
 * Time: 10:04 AM
 */
(function () {

    tinymce.create("tinymce.plugins.fixed", {

        init:function (editor, url) {
            var color, classes;
            //get color
            color = editor.getParam("fixed_content_color", "yellow");
            //get classes
            classes = editor.getParam("noneditable_noneditable_class", "jkNonEditAble");
            editor.formatter.register("fixed", {inline:"span", classes:"%classes", styles:{background:"%color"}})

            editor.addCommand("mceFixed", function () {
                editor.formatter.apply("fixed", {color:color, classes:classes});
            });

            editor.addButton("fixed", {
                title:"Fixed",
                image:"modules/images/fixed.png",
                cmd:"mceFixed"
            });
        },
        getInfo:function () {
            return {
                longname:'Fixed Content',
                author:'JK',
                authorurl:'http://jkaveri.com',
                infourl:'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/noneditable',
                version:tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });
    tinymce.PluginManager.add("fixed_content", tinymce.plugins.fixed);

})();
