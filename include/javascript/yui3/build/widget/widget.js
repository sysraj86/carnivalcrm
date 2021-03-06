/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('widget', function (Y) {
    var L = Y.Lang, O = Y.Object, Node = Y.Node, ClassNameManager = Y.ClassNameManager, WIDGET = "widget", CONTENT = "content", VISIBLE = "visible", HIDDEN = "hidden", DISABLED = "disabled", FOCUSED = "focused", WIDTH = "width", HEIGHT = "height", EMPTY = "", HYPHEN = "-", BOUNDING_BOX = "boundingBox", CONTENT_BOX = "contentBox", PARENT_NODE = "parentNode", FIRST_CHILD = "firstChild", OWNER_DOCUMENT = "ownerDocument", BODY = "body", TAB_INDEX = "tabIndex", LOCALE = "locale", INIT_VALUE = "initValue", ID = "id", RENDER = "render", RENDERED = "rendered", DESTROYED = "destroyed", ContentUpdate = "contentUpdate", _instances = {};

    function Widget(config) {
        this._yuid = Y.guid(WIDGET);
        this._strings = {};
        Widget.superclass.constructor.apply(this, arguments);
    }

    Widget._buildCfg = {aggregates:["HTML_PARSER"]};
    Widget.NAME = WIDGET;
    Widget.UI_SRC = "ui";
    var UI = Widget.UI_SRC;
    Widget.ATTRS = {rendered:{value:false, readOnly:true}, boundingBox:{value:null, setter:function (node) {
        return this._setBoundingBox(node);
    }, writeOnce:true}, contentBox:{value:null, setter:function (node) {
        return this._setContentBox(node);
    }, writeOnce:true}, tabIndex:{value:0, validator:function (val) {
        return(L.isNumber(val) || L.isNull(val));
    }}, focused:{value:false, readOnly:true}, disabled:{value:false}, visible:{value:true}, height:{value:EMPTY}, width:{value:EMPTY}, moveStyles:{value:false}, locale:{value:"en"}, strings:{setter:function (val) {
        return this._setStrings(val, this.get(LOCALE));
    }, getter:function () {
        return this.getStrings(this.get(LOCALE));
    }}};
    Widget._NAME_LOWERCASE = Widget.NAME.toLowerCase();
    Widget.getClassName = function () {
        var args = Y.Array(arguments, 0, true);
        args.splice(0, 0, this._NAME_LOWERCASE);
        return ClassNameManager.getClassName.apply(ClassNameManager, args);
    };
    Widget.getByNode = function (node) {
        var widget, bbMarker = Widget.getClassName();
        node = Node.get(node);
        if (node) {
            node = (node.hasClass(bbMarker)) ? node : node.ancestor("." + bbMarker);
            if (node) {
                widget = _instances[node.get(ID)];
            }
        }
        return widget || null;
    };
    Widget.HTML_PARSER = {};
    Y.extend(Widget, Y.Base, {getClassName:function () {
        var args = Y.Array(arguments, 0, true);
        args.splice(0, 0, this._name);
        return ClassNameManager.getClassName.apply(ClassNameManager, args);
    }, initializer:function (config) {
        this.publish(ContentUpdate, {preventable:false});
        this._name = this.constructor.NAME.toLowerCase();
        var nodeId = this.get(BOUNDING_BOX).get(ID);
        if (nodeId) {
            _instances[nodeId] = this;
        }
        var htmlConfig = this._parseHTML(this.get(CONTENT_BOX));
        if (htmlConfig) {
            Y.aggregate(config, htmlConfig, false);
        }
    }, destructor:function () {
        var boundingBox = this.get(BOUNDING_BOX);
        Y.Event.purgeElement(boundingBox, true);
        var nodeId = boundingBox.get(ID);
        if (nodeId && nodeId in _instances) {
            delete _instances[nodeId];
        }
    }, render:function (parentNode) {
        if (this.get(DESTROYED)) {
            return;
        }
        if (!this.get(RENDERED)) {
            this.publish(RENDER, {queuable:false, defaultFn:this._defRenderFn});
            parentNode = (parentNode) ? Node.get(parentNode) : null;
            if (parentNode && !parentNode.inDoc()) {
                parentNode = null;
            }
            this.fire(RENDER, {parentNode:parentNode});
        }
        return this;
    }, _defRenderFn:function (e) {
        this._renderUI(e.parentNode);
        this._bindUI();
        this._syncUI();
        this.renderer();
        this._set(RENDERED, true);
    }, renderer:function () {
        this.renderUI();
        this.bindUI();
        this.syncUI();
    }, bindUI:function () {
    }, renderUI:function () {
    }, syncUI:function () {
    }, hide:function () {
        return this.set(VISIBLE, false);
    }, show:function () {
        return this.set(VISIBLE, true);
    }, focus:function () {
        return this._set(FOCUSED, true);
    }, blur:function () {
        return this._set(FOCUSED, false);
    }, enable:function () {
        return this.set(DISABLED, false);
    }, disable:function () {
        return this.set(DISABLED, true);
    }, _parseHTML:function (node) {
        var schema = this._getHtmlParser(), data, val;
        if (schema && node && node.hasChildNodes()) {
            O.each(schema, function (v, k, o) {
                val = null;
                if (L.isFunction(v)) {
                    val = v.call(this, node);
                } else {
                    if (L.isArray(v)) {
                        val = node.queryAll(v[0]);
                    } else {
                        val = node.query(v);
                    }
                }
                if (val !== null && val !== undefined) {
                    data = data || {};
                    data[k] = val;
                }
            }, this);
        }
        return data;
    }, _moveStyles:function (nodeFrom, nodeTo) {
        var styles = this.WRAP_STYLES, pos = nodeFrom.getStyle('position'), contentBox = this.get(CONTENT_BOX), xy = [0, 0], h, w;
        if (!this.get('height')) {
            h = contentBox.get('offsetHeight');
        }
        if (!this.get('width')) {
            w = contentBox.get('offsetWidth');
        }
        if (pos === 'absolute') {
            xy = nodeFrom.getXY();
            nodeTo.setStyles({right:'auto', bottom:'auto'});
            nodeFrom.setStyles({right:'auto', bottom:'auto'});
        }
        Y.each(styles, function (v, k) {
            var s = nodeFrom.getStyle(k);
            nodeTo.setStyle(k, s);
            if (v === false) {
                nodeFrom.setStyle(k, '');
            } else {
                nodeFrom.setStyle(k, v);
            }
        });
        if (pos === 'absolute') {
            nodeTo.setXY(xy);
        }
        if (h) {
            this.set('height', h);
        }
        if (w) {
            this.set('width', w);
        }
    }, _renderBox:function (parentNode) {
        var contentBox = this.get(CONTENT_BOX), boundingBox = this.get(BOUNDING_BOX), doc = boundingBox.get(OWNER_DOCUMENT) || contentBox.get(OWNER_DOCUMENT), body;
        if (!boundingBox.compareTo(contentBox.get(PARENT_NODE))) {
            if (this.get('moveStyles')) {
                this._moveStyles(contentBox, boundingBox);
            }
            if (contentBox.inDoc(doc)) {
                contentBox.get(PARENT_NODE).replaceChild(boundingBox, contentBox);
            }
            boundingBox.appendChild(contentBox);
        }
        if (!boundingBox.inDoc(doc) && !parentNode) {
            body = Node.get(BODY);
            if (body.get(FIRST_CHILD)) {
                body.insertBefore(boundingBox, body.get(FIRST_CHILD));
            } else {
                body.appendChild(boundingBox);
            }
        } else {
            if (parentNode && !parentNode.compareTo(boundingBox.get(PARENT_NODE))) {
                parentNode.appendChild(boundingBox);
            }
        }
    }, _setBoundingBox:function (node) {
        return this._setBox(node, this.BOUNDING_TEMPLATE);
    }, _setContentBox:function (node) {
        return this._setBox(node, this.CONTENT_TEMPLATE);
    }, _setBox:function (node, template) {
        node = Node.get(node) || Node.create(template);
        var sid = Y.stamp(node);
        if (!node.get(ID)) {
            node.set(ID, sid);
        }
        return node;
    }, _renderUI:function (parentNode) {
        this._renderBoxClassNames();
        this._renderBox(parentNode);
    }, _renderBoxClassNames:function () {
        var classes = this._getClasses(), boundingBox = this.get(BOUNDING_BOX), contentBox = this.get(CONTENT_BOX), name, i;
        boundingBox.addClass(Widget.getClassName());
        for (i = classes.length - 3; i >= 0; i--) {
            name = classes[i].NAME;
            if (name) {
                boundingBox.addClass(ClassNameManager.getClassName(name.toLowerCase()));
            }
        }
        contentBox.addClass(this.getClassName(CONTENT));
    }, _bindUI:function () {
        this.after('visibleChange', this._afterVisibleChange);
        this.after('disabledChange', this._afterDisabledChange);
        this.after('heightChange', this._afterHeightChange);
        this.after('widthChange', this._afterWidthChange);
        this.after('focusedChange', this._afterFocusedChange);
        this._bindDOMListeners();
    }, _bindDOMListeners:function () {
        var oDocument = this.get(BOUNDING_BOX).get("ownerDocument");
        oDocument.on("focus", this._onFocus, this);
        if (Y.UA.webkit) {
            oDocument.on("mousedown", this._onDocMouseDown, this);
        }
    }, _syncUI:function () {
        this._uiSetVisible(this.get(VISIBLE));
        this._uiSetDisabled(this.get(DISABLED));
        this._uiSetHeight(this.get(HEIGHT));
        this._uiSetWidth(this.get(WIDTH));
        this._uiSetFocused(this.get(FOCUSED));
        this._uiSetTabIndex(this.get(TAB_INDEX));
    }, _uiSetHeight:function (val) {
        if (L.isNumber(val)) {
            val = val + this.DEF_UNIT;
        }
        this.get(BOUNDING_BOX).setStyle(HEIGHT, val);
    }, _uiSetWidth:function (val) {
        if (L.isNumber(val)) {
            val = val + this.DEF_UNIT;
        }
        this.get(BOUNDING_BOX).setStyle(WIDTH, val);
    }, _uiSetVisible:function (val) {
        var box = this.get(BOUNDING_BOX), sClassName = this.getClassName(HIDDEN);
        if (val === true) {
            box.removeClass(sClassName);
        } else {
            box.addClass(sClassName);
        }
    }, _uiSetDisabled:function (val) {
        var box = this.get(BOUNDING_BOX), sClassName = this.getClassName(DISABLED);
        if (val === true) {
            box.addClass(sClassName);
        } else {
            box.removeClass(sClassName);
        }
    }, _uiSetTabIndex:function (index) {
        var boundingBox = this.get(BOUNDING_BOX);
        if (L.isNumber(index)) {
            boundingBox.set(TAB_INDEX, index);
        }
        else {
            boundingBox.removeAttribute(TAB_INDEX);
        }
    }, _uiSetFocused:function (val, src) {
        var box = this.get(BOUNDING_BOX), sClassName = this.getClassName(FOCUSED);
        if (val === true) {
            box.addClass(sClassName);
            if (src !== UI) {
                box.focus();
            }
        } else {
            box.removeClass(sClassName);
            if (src !== UI) {
                box.blur();
            }
        }
    }, _afterVisibleChange:function (evt) {
        this._uiSetVisible(evt.newVal);
    }, _afterDisabledChange:function (evt) {
        this._uiSetDisabled(evt.newVal);
    }, _afterHeightChange:function (evt) {
        this._uiSetHeight(evt.newVal);
    }, _afterWidthChange:function (evt) {
        this._uiSetWidth(evt.newVal);
    }, _afterFocusedChange:function (evt) {
        this._uiSetFocused(evt.newVal, evt.src);
    }, _onDocMouseDown:function (evt) {
        if (this._hasDOMFocus) {
            this._onFocus(evt);
        }
    }, _onFocus:function (evt) {
        var target = evt.target, boundingBox = this.get(BOUNDING_BOX), bFocused = (boundingBox.compareTo(target) || boundingBox.contains(target));
        this._hasDOMFocus = bFocused;
        this._set(FOCUSED, bFocused, {src:UI});
    }, toString:function () {
        return this.constructor.NAME + "[" + this._yuid + "]";
    }, DEF_UNIT:"px", CONTENT_TEMPLATE:"<div></div>", BOUNDING_TEMPLATE:"<div></div>", WRAP_STYLES:{height:'100%', width:'100%', zIndex:false, position:'static', top:'0', left:'0', bottom:'', right:'', padding:'', margin:''}, _setStrings:function (strings, locale) {
        var strs = this._strings;
        locale = locale.toLowerCase();
        if (!strs[locale]) {
            strs[locale] = {};
        }
        Y.aggregate(strs[locale], strings, true);
        return strs[locale];
    }, _getStrings:function (locale) {
        return this._strings[locale.toLowerCase()];
    }, getStrings:function (locale) {
        locale = (locale || this.get(LOCALE)).toLowerCase();
        var defLocale = this.getDefaultLocale().toLowerCase(), defStrs = this._getStrings(defLocale), strs = (defStrs) ? Y.merge(defStrs) : {}, localeSegments = locale.split(HYPHEN);
        if (locale !== defLocale || localeSegments.length > 1) {
            var lookup = "";
            for (var i = 0, l = localeSegments.length; i < l; ++i) {
                lookup += localeSegments[i];
                var localeStrs = this._getStrings(lookup);
                if (localeStrs) {
                    Y.aggregate(strs, localeStrs, true);
                }
                lookup += HYPHEN;
            }
        }
        return strs;
    }, getString:function (key, locale) {
        locale = (locale || this.get(LOCALE)).toLowerCase();
        var defLocale = (this.getDefaultLocale()).toLowerCase(), strs = this._getStrings(defLocale) || {}, str = strs[key], idx = locale.lastIndexOf(HYPHEN);
        if (locale !== defLocale || idx != -1) {
            do {
                strs = this._getStrings(locale);
                if (strs && key in strs) {
                    str = strs[key];
                    break;
                }
                idx = locale.lastIndexOf(HYPHEN);
                if (idx != -1) {
                    locale = locale.substring(0, idx);
                }
            } while (idx != -1);
        }
        return str;
    }, getDefaultLocale:function () {
        return this._conf.get(LOCALE, INIT_VALUE);
    }, _strings:null, _getHtmlParser:function () {
        if (!this._HTML_PARSER) {
            var classes = this._getClasses(), parser = {}, i, p;
            for (i = classes.length - 1; i >= 0; i--) {
                p = classes[i].HTML_PARSER;
                if (p) {
                    Y.mix(parser, p, true);
                }
            }
            this._HTML_PARSER = parser;
        }
        return this._HTML_PARSER;
    }});
    Y.Widget = Widget;
}, '3.0.0', {requires:['attribute', 'event-focus', 'base', 'node', 'classnamemanager']});