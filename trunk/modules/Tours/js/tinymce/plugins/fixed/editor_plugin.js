/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 1/12/12
 * Time: 10:04 AM
 */
(function () {

    tinymce.create("tinymce.plugins.fixed", {

        init:function (ed, url) {
            var color, classes;

            //get color
          /*  color = ed.getParam("fixed_content_color", "yellow");*/
            //get classes
            classes = ed.getParam("noneditable_noneditable_class", "jkNonEditAble");
            ed.onInit.add(function () {
                //register formatter
                ed.formatter.register("fixed", {inline:"span", classes:"%classes"})
                //register command
                ed.addCommand("mceFixed", function () {
                    ed.formatter.apply("fixed", {classes:classes});
                });
            });

            //register button
            ed.addButton("fixed", {
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
    tinymce.PluginManager.add("fixed", tinymce.plugins.fixed);

})();
