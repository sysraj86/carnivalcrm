/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('console', function (Y) {
    function Console() {
        Console.superclass.constructor.apply(this, arguments);
    }

    var getCN = Y.ClassNameManager.getClassName, CHECKED = 'checked', CLEAR = 'clear', CLICK = 'click', COLLAPSED = 'collapsed', CONSOLE = 'console', CONTENT_BOX = 'contentBox', DISABLED = 'disabled', ENTRY = 'entry', ERROR = 'error', HEIGHT = 'height', INFO = 'info', INNER_HTML = 'innerHTML', LAST_TIME = 'lastTime', PAUSE = 'pause', PAUSED = 'paused', RESET = 'reset', START_TIME = 'startTime', TITLE = 'title', WARN = 'warn', DOT = '.', C_BUTTON = getCN(CONSOLE, 'button'), C_CHECKBOX = getCN(CONSOLE, 'checkbox'), C_CLEAR = getCN(CONSOLE, CLEAR), C_COLLAPSE = getCN(CONSOLE, 'collapse'), C_COLLAPSED = getCN(CONSOLE, COLLAPSED), C_CONSOLE_CONTROLS = getCN(CONSOLE, 'controls'), C_CONSOLE_HD = getCN(CONSOLE, 'hd'), C_CONSOLE_BD = getCN(CONSOLE, 'bd'), C_CONSOLE_FT = getCN(CONSOLE, 'ft'), C_CONSOLE_TITLE = getCN(CONSOLE, TITLE), C_ENTRY = getCN(CONSOLE, ENTRY), C_ENTRY_CAT = getCN(CONSOLE, ENTRY, 'cat'), C_ENTRY_CONTENT = getCN(CONSOLE, ENTRY, 'content'), C_ENTRY_META = getCN(CONSOLE, ENTRY, 'meta'), C_ENTRY_SRC = getCN(CONSOLE, ENTRY, 'src'), C_ENTRY_TIME = getCN(CONSOLE, ENTRY, 'time'), C_PAUSE = getCN(CONSOLE, PAUSE), C_PAUSE_LABEL = getCN(CONSOLE, PAUSE, 'label'), RE_INLINE_SOURCE = /^(\S+)\s/, RE_AMP = /&/g, RE_GT = />/g, RE_LT = /</g, ESC_AMP = '&#38;', ESC_GT = '&#62;', ESC_LT = '&#60;', ENTRY_TEMPLATE_STR = '<div class="{entry_class} {cat_class} {src_class}">' + '<p class="{entry_meta_class}">' + '<span class="{entry_src_class}">' + '{sourceAndDetail}' + '</span>' + '<span class="{entry_cat_class}">' + '{category}</span>' + '<span class="{entry_time_class}">' + ' {totalTime}ms (+{elapsedTime}) {localTime}' + '</span>' + '</p>' + '<pre class="{entry_content_class}">{message}</pre>' + '</div>', L = Y.Lang, create = Y.Node.create, isNumber = L.isNumber, isString = L.isString, merge = Y.merge, substitute = Y.substitute;
    Y.mix(Console, {NAME:CONSOLE, LOG_LEVEL_INFO:INFO, LOG_LEVEL_WARN:WARN, LOG_LEVEL_ERROR:ERROR, ENTRY_CLASSES:{entry_class:C_ENTRY, entry_meta_class:C_ENTRY_META, entry_cat_class:C_ENTRY_CAT, entry_src_class:C_ENTRY_SRC, entry_time_class:C_ENTRY_TIME, entry_content_class:C_ENTRY_CONTENT}, CHROME_CLASSES:{console_hd_class:C_CONSOLE_HD, console_bd_class:C_CONSOLE_BD, console_ft_class:C_CONSOLE_FT, console_controls_class:C_CONSOLE_CONTROLS, console_checkbox_class:C_CHECKBOX, console_pause_class:C_PAUSE, console_pause_label_class:C_PAUSE_LABEL, console_button_class:C_BUTTON, console_clear_class:C_CLEAR, console_collapse_class:C_COLLAPSE, console_title_class:C_CONSOLE_TITLE}, HEADER_TEMPLATE:'<div class="{console_hd_class}">' + '<h4 class="{console_title_class}">{str_title}</h4>' + '<button type="button" class="' + '{console_button_class} {console_collapse_class}">{str_collapse}' + '</button>' + '</div>', BODY_TEMPLATE:'<div class="{console_bd_class}"></div>', FOOTER_TEMPLATE:'<div class="{console_ft_class}">' + '<div class="{console_controls_class}">' + '<label for="{id_guid}" class="{console_pause_label_class}">' + '<input type="checkbox" class="{console_checkbox_class} ' + '{console_pause_class}" value="1" id="{id_guid}"> ' + '{str_pause}</label>' + '<button type="button" class="' + '{console_button_class} {console_clear_class}">{str_clear}' + '</button>' + '</div>' + '</div>', ENTRY_TEMPLATE:ENTRY_TEMPLATE_STR, ATTRS:{logEvent:{value:'yui:log', writeOnce:true, validator:isString}, logSource:{value:Y, writeOnce:true, validator:function (v) {
        return v && Y.Lang.isFunction(v.on);
    }}, strings:{value:{title:"Log Console", pause:"Pause", clear:"Clear", collapse:"Collapse", expand:"Expand"}}, paused:{value:false, validator:L.isBoolean}, defaultCategory:{value:INFO, validator:isString}, defaultSource:{value:'global', validator:isString}, entryTemplate:{value:ENTRY_TEMPLATE_STR, validator:isString}, logLevel:{value:Y.config.logLevel || INFO, setter:function (v) {
        return this._setLogLevel(v);
    }}, printTimeout:{value:100, validator:isNumber}, printLimit:{value:50, validator:isNumber}, consoleLimit:{value:300, validator:isNumber}, newestOnTop:{value:true}, scrollIntoView:{value:true}, startTime:{value:new Date()}, lastTime:{value:new Date(), readOnly:true}, collapsed:{value:false}, height:{value:"300px"}, width:{value:"300px"}, useBrowserConsole:{lazyAdd:false, value:false, getter:function () {
        var logSource = this.get('logSource');
        return logSource instanceof YUI ? logSource.config.useBrowserConsole : null;
    }, setter:function (v) {
        var logSource = this.get('logSource');
        if (logSource instanceof YUI) {
            v = !!v;
            logSource.config.useBrowserConsole = !!v;
            return v;
        } else {
            return Y.Attribute.INVALID_VALUE;
        }
    }}, style:{value:'separate', writeOnce:true, validator:function (v) {
        return this._validateStyle(v);
    }}}});
    Y.extend(Console, Y.Widget, {_evtCat:null, _head:null, _body:null, _foot:null, _printLoop:null, buffer:null, log:function () {
        Y.log.apply(Y, arguments);
        return this;
    }, clearConsole:function () {
        this._body.set(INNER_HTML, '');
        this._cancelPrintLoop();
        this.buffer = [];
        return this;
    }, reset:function () {
        this.fire(RESET);
        return this;
    }, collapse:function () {
        this.set(COLLAPSED, true);
        return this;
    }, expand:function () {
        this.set(COLLAPSED, false);
        return this;
    }, printBuffer:function (limit) {
        var messages = this.buffer, debug = Y.config.debug, entries = [], consoleLimit = this.get('consoleLimit'), newestOnTop = this.get('newestOnTop'), anchor = newestOnTop ? this._body.get('firstChild') : null, i;
        if (messages.length > consoleLimit) {
            messages.splice(0, messages.length - consoleLimit);
        }
        limit = Math.min(messages.length, (limit || messages.length));
        Y.config.debug = false;
        if (!this.get(PAUSED) && this.get('rendered')) {
            for (i = 0; i < limit && messages.length; ++i) {
                entries[i] = this._createEntryHTML(messages.shift());
            }
            if (!messages.length) {
                this._cancelPrintLoop();
            }
            if (entries.length) {
                if (newestOnTop) {
                    entries.reverse();
                }
                this._body.insertBefore(create(entries.join('')), anchor);
                if (this.get('scrollIntoView')) {
                    this.scrollToLatest();
                }
                this._trimOldEntries();
            }
        }
        Y.config.debug = debug;
        return this;
    }, initializer:function () {
        this._evtCat = Y.stamp(this) + '|';
        this.buffer = [];
        this.get('logSource').on(this._evtCat +
            this.get('logEvent'), Y.bind("_onLogEvent", this));
        this.publish(ENTRY, {defaultFn:this._defEntryFn});
        this.publish(RESET, {defaultFn:this._defResetFn});
        this.after('rendered', this._schedulePrint);
    }, destructor:function () {
        var bb = this.get('boundingBox');
        this._cancelPrintLoop();
        this.get('logSource').detach(this._evtCat + '*');
        Y.Event.purgeElement(bb, true);
        bb.set('innerHTML', '');
    }, renderUI:function () {
        this._initHead();
        this._initBody();
        this._initFoot();
        var style = this.get('style');
        if (style !== 'block') {
            this.get('boundingBox').addClass('yui-' + style + '-console');
        }
    }, syncUI:function () {
        this._uiUpdatePaused(this.get(PAUSED));
        this._uiUpdateCollapsed(this.get(COLLAPSED));
        this._uiSetHeight(this.get(HEIGHT));
    }, bindUI:function () {
        this.get(CONTENT_BOX).query('button.' + C_COLLAPSE).on(CLICK, this._onCollapseClick, this);
        this.get(CONTENT_BOX).query('input[type=checkbox].' + C_PAUSE).on(CLICK, this._onPauseClick, this);
        this.get(CONTENT_BOX).query('button.' + C_CLEAR).on(CLICK, this._onClearClick, this);
        this.after(this._evtCat + 'stringsChange', this._afterStringsChange);
        this.after(this._evtCat + 'pausedChange', this._afterPausedChange);
        this.after(this._evtCat + 'consoleLimitChange', this._afterConsoleLimitChange);
        this.after(this._evtCat + 'collapsedChange', this._afterCollapsedChange);
    }, _initHead:function () {
        var cb = this.get(CONTENT_BOX), info = merge(Console.CHROME_CLASSES, {str_collapse:this.get('strings.collapse'), str_title:this.get('strings.title')});
        this._head = create(substitute(Console.HEADER_TEMPLATE, info));
        cb.insertBefore(this._head, cb.get('firstChild'));
    }, _initBody:function () {
        this._body = create(substitute(Console.BODY_TEMPLATE, Console.CHROME_CLASSES));
        this.get(CONTENT_BOX).appendChild(this._body);
    }, _initFoot:function () {
        var info = merge(Console.CHROME_CLASSES, {id_guid:Y.guid(), str_pause:this.get('strings.pause'), str_clear:this.get('strings.clear')});
        this._foot = create(substitute(Console.FOOTER_TEMPLATE, info));
        this.get(CONTENT_BOX).appendChild(this._foot);
    }, _isInLogLevel:function (e) {
        var cat = e.cat, lvl = this.get('logLevel');
        if (lvl !== INFO) {
            cat = cat || INFO;
            if (isString(cat)) {
                cat = cat.toLowerCase();
            }
            if ((cat === WARN && lvl === ERROR) || (cat === INFO && lvl !== INFO)) {
                return false;
            }
        }
        return true;
    }, _normalizeMessage:function (e) {
        var msg = e.msg, cat = e.cat, src = e.src, m = {time:new Date(), message:msg, category:cat || this.get('defaultCategory'), sourceAndDetail:src || this.get('defaultSource'), source:null, localTime:null, elapsedTime:null, totalTime:null};
        m.source = RE_INLINE_SOURCE.test(m.sourceAndDetail) ? RegExp.$1 : m.sourceAndDetail;
        m.localTime = m.time.toLocaleTimeString ? m.time.toLocaleTimeString() : (m.time + '');
        m.elapsedTime = m.time - this.get(LAST_TIME);
        m.totalTime = m.time - this.get(START_TIME);
        this._set(LAST_TIME, m.time);
        return m;
    }, _schedulePrint:function () {
        if (!this._printLoop && !this.get(PAUSED) && this.get('rendered')) {
            this._printLoop = Y.later(this.get('printTimeout'), this, this.printBuffer, this.get('printLimit'), true);
        }
    }, _createEntryHTML:function (m) {
        m = merge(this._htmlEscapeMessage(m), Console.ENTRY_CLASSES, {cat_class:this.getClassName(ENTRY, m.category), src_class:this.getClassName(ENTRY, m.source)});
        return this.get('entryTemplate').replace(/\{(\w+)\}/g, function (_, token) {
            return token in m ? m[token] : '';
        });
    }, scrollToLatest:function () {
        var scrollTop = this.get('newestOnTop') ? 0 : this._body.get('scrollHeight');
        this._body.set('scrollTop', scrollTop);
    }, _htmlEscapeMessage:function (m) {
        m.message = this._encodeHTML(m.message);
        m.source = this._encodeHTML(m.source);
        m.sourceAndDetail = this._encodeHTML(m.sourceAndDetail);
        m.category = this._encodeHTML(m.category);
        return m;
    }, _trimOldEntries:function () {
        Y.config.debug = false;
        var bd = this._body, limit = this.get('consoleLimit'), debug = Y.config.debug, entries, e, i, l;
        if (bd) {
            entries = bd.queryAll(DOT + C_ENTRY);
            l = entries.size() - limit;
            if (l > 0) {
                if (this.get('newestOnTop')) {
                    i = limit;
                    l = entries.size();
                } else {
                    i = 0;
                }
                this._body.setStyle('display', 'none');
                for (; i < l; ++i) {
                    e = entries.item(i);
                    if (e) {
                        e.remove();
                    }
                }
                this._body.setStyle('display', '');
            }
        }
        Y.config.debug = debug;
    }, _encodeHTML:function (s) {
        return isString(s) ? s.replace(RE_AMP, ESC_AMP).replace(RE_LT, ESC_LT).replace(RE_GT, ESC_GT) : s;
    }, _cancelPrintLoop:function () {
        if (this._printLoop) {
            this._printLoop.cancel();
            this._printLoop = null;
        }
    }, _validateStyle:function (style) {
        return style === 'inline' || style === 'block' || style === 'separate';
    }, _onPauseClick:function (e) {
        this.set(PAUSED, e.target.get(CHECKED));
    }, _onClearClick:function (e) {
        this.clearConsole();
    }, _onCollapseClick:function (e) {
        this.set(COLLAPSED, !this.get(COLLAPSED));
    }, _setLogLevel:function (v) {
        if (isString(v)) {
            v = v.toLowerCase();
        }
        return(v === WARN || v === ERROR) ? v : INFO;
    }, _uiSetHeight:function (v) {
        Console.superclass._uiSetHeight.apply(this, arguments);
        if (this._head && this._foot) {
            var h = this.get('boundingBox').get('offsetHeight') -
                this._head.get('offsetHeight') -
                this._foot.get('offsetHeight');
            this._body.setStyle(HEIGHT, h + 'px');
        }
    }, _afterStringsChange:function (e) {
        var prop = e.subAttrName ? e.subAttrName.split(DOT)[1] : null, cb = this.get(CONTENT_BOX), before = e.prevVal, after = e.newVal;
        if ((!prop || prop === TITLE) && before.title !== after.title) {
            cb.queryAll(DOT + C_CONSOLE_TITLE).set(INNER_HTML, after.title);
        }
        if ((!prop || prop === PAUSE) && before.pause !== after.pause) {
            cb.queryAll(DOT + C_PAUSE_LABEL).set(INNER_HTML, after.pause);
        }
        if ((!prop || prop === CLEAR) && before.clear !== after.clear) {
            cb.queryAll(DOT + C_CLEAR).set('value', after.clear);
        }
    }, _afterPausedChange:function (e) {
        var paused = e.newVal;
        if (e.src !== Y.Widget.SRC_UI) {
            this._uiUpdatePaused(paused);
        }
        if (!paused) {
            this._schedulePrint();
        } else if (this._printLoop) {
            this._cancelPrintLoop();
        }
    }, _uiUpdatePaused:function (on) {
        var node = this._foot.queryAll('input[type=checkbox].' + C_PAUSE);
        if (node) {
            node.set(CHECKED, on);
        }
    }, _afterConsoleLimitChange:function () {
        this._trimOldEntries();
    }, _afterCollapsedChange:function (e) {
        this._uiUpdateCollapsed(e.newVal);
    }, _uiUpdateCollapsed:function (v) {
        var bb = this.get('boundingBox'), button = bb.queryAll('button.' + C_COLLAPSE), method = v ? 'addClass' : 'removeClass', str = this.get('strings.' + (v ? 'expand' : 'collapse'));
        bb[method](C_COLLAPSED);
        if (button) {
            button.set('innerHTML', str);
        }
        this._uiSetHeight(v ? this._head.get('offsetHeight') : this.get(HEIGHT));
    }, _afterVisibleChange:function (e) {
        Console.superclass._afterVisibleChange.apply(this, arguments);
        this._uiUpdateFromHideShow(e.newVal);
    }, _uiUpdateFromHideShow:function (v) {
        if (v) {
            this._uiSetHeight(this.get(HEIGHT));
        }
    }, _onLogEvent:function (e) {
        if (!this.get(DISABLED) && this._isInLogLevel(e)) {
            var debug = Y.config.debug;
            Y.config.debug = false;
            this.fire(ENTRY, {message:this._normalizeMessage(e)});
            Y.config.debug = debug;
        }
    }, _defResetFn:function () {
        this.clearConsole();
        this.set(START_TIME, new Date());
        this.set(DISABLED, false);
        this.set(PAUSED, false);
    }, _defEntryFn:function (e) {
        if (e.message) {
            this.buffer.push(e.message);
            this._schedulePrint();
        }
    }});
    Y.Console = Console;
}, '3.0.0', {requires:['substitute', 'widget']});