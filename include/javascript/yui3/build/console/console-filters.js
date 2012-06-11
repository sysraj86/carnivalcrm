/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('console-filters', function (Y) {
    var getCN = Y.ClassNameManager.getClassName, CONSOLE = 'console', FILTERS = 'filters', FILTER = 'filter', CATEGORY = 'category', SOURCE = 'source', CATEGORY_DOT = 'category.', SOURCE_DOT = 'source.', HOST = 'host', PARENT_NODE = 'parentNode', CHECKED = 'checked', DEF_VISIBILITY = 'defaultVisibility', DOT = '.', EMPTY = '', C_BODY = DOT + Y.Console.CHROME_CLASSES.console_bd_class, C_FOOT = DOT + Y.Console.CHROME_CLASSES.console_ft_class, SEL_CHECK = 'input[type=checkbox].', isString = Y.Lang.isString;

    function ConsoleFilters() {
        ConsoleFilters.superclass.constructor.apply(this, arguments);
    }

    Y.mix(ConsoleFilters, {NAME:'consoleFilters', NS:FILTER, CATEGORIES_TEMPLATE:'<div class="{categories}"></div>', SOURCES_TEMPLATE:'<div class="{sources}"></div>', FILTER_TEMPLATE:'<label class="{filter_label}">' + '<input type="checkbox" value="{filter_name}" ' + 'class="{filter} {filter_class}"> {filter_name}' + '</label>&#8201;', CHROME_CLASSES:{categories:getCN(CONSOLE, FILTERS, 'categories'), sources:getCN(CONSOLE, FILTERS, 'sources'), category:getCN(CONSOLE, FILTER, CATEGORY), source:getCN(CONSOLE, FILTER, SOURCE), filter:getCN(CONSOLE, FILTER), filter_label:getCN(CONSOLE, FILTER, 'label')}, ATTRS:{defaultVisibility:{value:true, validator:Y.Lang.isBoolean}, category:{value:{}, validator:function (v, k) {
        return this._validateCategory(k, v);
    }}, source:{value:{}, validator:function (v, k) {
        return this._validateSource(k, v);
    }}, cacheLimit:{value:Number.POSITIVE_INFINITY, setter:function (v) {
        if (Y.Lang.isNumber(v)) {
            this._cacheLimit = v;
            return v;
        } else {
            return Y.Attribute.INVALID_VALUE;
        }
    }}}});
    Y.extend(ConsoleFilters, Y.Plugin.Base, {_entries:null, _cacheLimit:Number.POSITIVE_INFINITY, _categories:null, _sources:null, initializer:function () {
        this._entries = [];
        this.get(HOST).on("entry", this._onEntry, this);
        this.doAfter("renderUI", this.renderUI);
        this.doAfter("syncUI", this.syncUI);
        this.doAfter("bindUI", this.bindUI);
        this.doAfter("clearConsole", this._afterClearConsole);
        if (this.get(HOST).get('rendered')) {
            this.renderUI();
            this.syncUI();
            this.bindUI();
        }
        this.after("cacheLimitChange", this._afterCacheLimitChange);
    }, destructor:function () {
        this._entries = [];
        if (this._categories) {
            this._categories.get(PARENT_NODE).removeChild(this._categories);
        }
        if (this._sources) {
            this._sources.get(PARENT_NODE).removeChild(this._sources);
        }
    }, renderUI:function () {
        var foot = this.get(HOST).get('contentBox').query(C_FOOT), html;
        if (foot) {
            html = Y.substitute(ConsoleFilters.CATEGORIES_TEMPLATE, ConsoleFilters.CHROME_CLASSES);
            this._categories = foot.appendChild(Y.Node.create(html));
            html = Y.substitute(ConsoleFilters.SOURCES_TEMPLATE, ConsoleFilters.CHROME_CLASSES);
            this._sources = foot.appendChild(Y.Node.create(html));
        }
    }, bindUI:function () {
        this._categories.on('click', Y.bind(this._onCategoryCheckboxClick, this));
        this._sources.on('click', Y.bind(this._onSourceCheckboxClick, this));
        this.after('categoryChange', this._afterCategoryChange);
        this.after('sourceChange', this._afterSourceChange);
    }, syncUI:function () {
        Y.each(this.get(CATEGORY), function (v, k) {
            this._uiSetCheckbox(CATEGORY, k, v);
        }, this);
        Y.each(this.get(SOURCE), function (v, k) {
            this._uiSetCheckbox(SOURCE, k, v);
        }, this);
        this.refreshConsole();
    }, _onEntry:function (e) {
        this._entries.push(e.message);
        var cat = CATEGORY_DOT + e.message.category, src = SOURCE_DOT + e.message.source, cat_filter = this.get(cat), src_filter = this.get(src), overLimit = this._entries.length - this._cacheLimit, visible;
        if (overLimit > 0) {
            this._entries.splice(0, overLimit);
        }
        if (cat_filter === undefined) {
            visible = this.get(DEF_VISIBILITY);
            this.set(cat, visible);
            cat_filter = visible;
        }
        if (src_filter === undefined) {
            visible = this.get(DEF_VISIBILITY);
            this.set(src, visible);
            src_filter = visible;
        }
        if (!cat_filter || !src_filter) {
            e.preventDefault();
        }
    }, _afterClearConsole:function () {
        this._entries = [];
    }, _afterCategoryChange:function (e) {
        var cat = e.subAttrName.replace(/category\./, EMPTY), before = e.prevVal, after = e.newVal;
        if (!cat || before[cat] !== undefined) {
            this.refreshConsole();
            this._filterBuffer();
        }
        if (cat && !e.fromUI) {
            this._uiSetCheckbox(CATEGORY, cat, after[cat]);
        }
    }, _afterSourceChange:function (e) {
        var src = e.subAttrName.replace(/source\./, EMPTY), before = e.prevVal, after = e.newVal;
        if (!src || before[src] !== undefined) {
            this.refreshConsole();
            this._filterBuffer();
        }
        if (src && !e.fromUI) {
            this._uiSetCheckbox(SOURCE, src, after[src]);
        }
    }, _filterBuffer:function () {
        var cats = this.get(CATEGORY), srcs = this.get(SOURCE), buffer = this.get(HOST).buffer, start = null, i;
        for (i = buffer.length - 1; i >= 0; --i) {
            if (!cats[buffer[i].category] || !srcs[buffer[i].source]) {
                start = start || i;
            } else if (start) {
                buffer.splice(i, (start - i));
                start = null;
            }
        }
        if (start) {
            buffer.splice(0, start + 1);
        }
    }, _afterCacheLimitChange:function (e) {
        if (isFinite(e.newVal)) {
            var delta = this._entries.length - e.newVal;
            if (delta > 0) {
                this._entries.splice(0, delta);
            }
        }
    }, refreshConsole:function () {
        var entries = this._entries, host = this.get(HOST), body = host.get('contentBox').query(C_BODY), remaining = host.get('consoleLimit'), cats = this.get(CATEGORY), srcs = this.get(SOURCE), buffer = [], i, e;
        if (body) {
            host._cancelPrintLoop();
            for (i = entries.length - 1; i >= 0 && remaining >= 0; --i) {
                e = entries[i];
                if (cats[e.category] && srcs[e.source]) {
                    buffer.unshift(e);
                    --remaining;
                }
            }
            body.set('innerHTML', EMPTY);
            host.buffer = buffer;
            host.printBuffer();
        }
    }, _uiSetCheckbox:function (type, item, checked) {
        if (type && item) {
            var container = type === CATEGORY ? this._categories : this._sources, sel = SEL_CHECK + getCN(CONSOLE, FILTER, item), checkbox = container.query(sel), host;
            if (!checkbox) {
                host = this.get(HOST);
                this._createCheckbox(container, item);
                checkbox = container.query(sel);
                host._uiSetHeight(host.get('height'));
            }
            checkbox.set(CHECKED, checked);
        }
    }, _onCategoryCheckboxClick:function (e) {
        var t = e.target, cat;
        if (t.hasClass(ConsoleFilters.CHROME_CLASSES.filter)) {
            cat = t.get('value');
            if (cat && cat in this.get(CATEGORY)) {
                this.set(CATEGORY_DOT + cat, t.get(CHECKED), {fromUI:true});
            }
        }
    }, _onSourceCheckboxClick:function (e) {
        var t = e.target, src;
        if (t.hasClass(ConsoleFilters.CHROME_CLASSES.filter)) {
            src = t.get('value');
            if (src && src in this.get(SOURCE)) {
                this.set(SOURCE_DOT + src, t.get(CHECKED), {fromUI:true});
            }
        }
    }, hideCategory:function (cat, multiple) {
        if (isString(multiple)) {
            Y.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(CATEGORY_DOT + cat, false);
        }
    }, showCategory:function (cat, multiple) {
        if (isString(multiple)) {
            Y.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(CATEGORY_DOT + cat, true);
        }
    }, hideSource:function (src, multiple) {
        if (isString(multiple)) {
            Y.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(SOURCE_DOT + src, false);
        }
    }, showSource:function (src, multiple) {
        if (isString(multiple)) {
            Y.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(SOURCE_DOT + src, true);
        }
    }, _createCheckbox:function (container, name) {
        var info = Y.merge(ConsoleFilters.CHROME_CLASSES, {filter_name:name, filter_class:getCN(CONSOLE, FILTER, name)}), node = Y.Node.create(Y.substitute(ConsoleFilters.FILTER_TEMPLATE, info));
        container.appendChild(node);
    }, _validateCategory:function (cat, v) {
        return Y.Lang.isObject(v, true) && cat.split(/\./).length < 3;
    }, _validateSource:function (src, v) {
        return Y.Lang.isObject(v, true) && src.split(/\./).length < 3;
    }});
    Y.namespace('Plugin').ConsoleFilters = ConsoleFilters;
}, '3.0.0', {requires:['console', 'plugin']});