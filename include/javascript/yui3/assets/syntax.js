if (YUI && yuiConfig) {
    YUI(yuiConfig).use('node', 'event-mouseenter', 'later', function (Y) {
        var items = Y.all('.yui-syntax-highlight'), openWindow = function (node, print) {
            var n = Y.one('#' + node.get('id') + '-plain'), code = n.get('value'), win = null, h = n.get('offsetHeight');
            code = code.replace(/</g, '&lt;').replace(/>/g, '&gt;');
            win = window.open('', "codeview", "status=0,scrollbars=1,width=600,height=400,menubar=0,toolbar=0,directories=0");
            win.document.body.innerHTML = '<pre>' + code + '</pre>';
            if (print) {
                Y.later(1000, win, function () {
                    win.focus();
                    win.print();
                    win.focus();
                });
            }
        }, handleClick = function (e) {
            if (e.target.get('tagName').toLowerCase() == 'a') {
                var type = e.target.get('innerHTML').replace(/ /g, '');
                switch (type) {
                    case'print':
                        openWindow(e.target.get('parentNode.parentNode'), true);
                        break;
                    case'viewplain':
                        openWindow(e.target.get('parentNode.parentNode'));
                        break;
                    case'togglelinenumbers':
                        e.target.get('parentNode.parentNode').toggleClass('yui-syntax-highlight-linenumbers');
                        break;
                    case'copy':
                        break;
                }
            }
            e.halt();
        };
        items.each(function (i) {
            var header = Y.Node.create('<div class="syn-header hidden"><a href="#">view plain</a> | <a href="#">print</a> | <a href="#">toggle line numbers</a></div>');
            header.on('click', handleClick);
            i.insertBefore(header, i.get('firstChild'));
            i.on('mouseenter', function () {
                header.removeClass('hidden');
            });
            i.on('mouseleave', function () {
                header.addClass('hidden');
            });
        });
    });
}