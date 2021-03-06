/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('widget-stdmod', function (Y) {
    var L = Y.Lang, Node = Y.Node, NodeList = Y.NodeList, UA = Y.UA, Widget = Y.Widget, EMPTY = "", HD = "hd", BD = "bd", FT = "ft", HEADER = "header", BODY = "body", FOOTER = "footer", FILL_HEIGHT = "fillHeight", STDMOD = "stdmod", PX = "px", NODE_SUFFIX = "Node", CONTENT_SUFFIX = "Content", INNER_HTML = "innerHTML", FIRST_CHILD = "firstChild", CHILD_NODES = "childNodes", CREATE_DOCUMENT_FRAGMENT = "createDocumentFragment", OWNER_DOCUMENT = "ownerDocument", CONTENT_BOX = "contentBox", BOUNDING_BOX = "boundingBox", HEIGHT = "height", OFFSET_HEIGHT = "offsetHeight", AUTO = "auto", HeaderChange = "headerContentChange", BodyChange = "bodyContentChange", FooterChange = "footerContentChange", FillHeightChange = "fillHeightChange", HeightChange = "HeightChange", ContentUpdate = "contentUpdate", RENDERUI = "renderUI", BINDUI = "bindUI", SYNCUI = "syncUI", UI = Y.Widget.UI_SRC;

    function StdMod(config) {
        this._stdModNode = this.get(CONTENT_BOX);
        Y.after(this._renderUIStdMod, this, RENDERUI);
        Y.after(this._bindUIStdMod, this, BINDUI);
        Y.after(this._syncUIStdMod, this, SYNCUI);
    }

    StdMod.HEADER = HEADER;
    StdMod.BODY = BODY;
    StdMod.FOOTER = FOOTER;
    StdMod.AFTER = "after";
    StdMod.BEFORE = "before";
    StdMod.REPLACE = "replace";
    var STD_HEADER = StdMod.HEADER, STD_BODY = StdMod.BODY, STD_FOOTER = StdMod.FOOTER, AFTER = StdMod.AFTER, BEFORE = StdMod.BEFORE;
    StdMod.ATTRS = {headerContent:{value:null}, footerContent:{value:null}, bodyContent:{value:null}, fillHeight:{value:StdMod.BODY, validator:function (val) {
        return this._validateFillHeight(val);
    }}};
    StdMod.HTML_PARSER = {headerContent:function (contentBox) {
        return this._parseStdModHTML(STD_HEADER);
    }, bodyContent:function (contentBox) {
        return this._parseStdModHTML(STD_BODY);
    }, footerContent:function (contentBox) {
        return this._parseStdModHTML(STD_FOOTER);
    }};
    StdMod.SECTION_CLASS_NAMES = {header:Widget.getClassName(HD), body:Widget.getClassName(BD), footer:Widget.getClassName(FT)};
    StdMod.TEMPLATES = {header:'<div class="' + StdMod.SECTION_CLASS_NAMES[STD_HEADER] + '"></div>', body:'<div class="' + StdMod.SECTION_CLASS_NAMES[STD_BODY] + '"></div>', footer:'<div class="' + StdMod.SECTION_CLASS_NAMES[STD_FOOTER] + '"></div>'};
    StdMod.prototype = {_syncUIStdMod:function () {
        this._uiSetStdMod(STD_HEADER, this.get(STD_HEADER + CONTENT_SUFFIX));
        this._uiSetStdMod(STD_BODY, this.get(STD_BODY + CONTENT_SUFFIX));
        this._uiSetStdMod(STD_FOOTER, this.get(STD_FOOTER + CONTENT_SUFFIX));
        this._uiSetFillHeight(this.get(FILL_HEIGHT));
    }, _renderUIStdMod:function () {
        this._stdModNode.addClass(Widget.getClassName(STDMOD));
    }, _bindUIStdMod:function () {
        this.after(HeaderChange, this._afterHeaderChange);
        this.after(BodyChange, this._afterBodyChange);
        this.after(FooterChange, this._afterFooterChange);
        this.after(FillHeightChange, this._afterFillHeightChange);
        this.after(HeightChange, this._fillHeight);
        this.after(ContentUpdate, this._fillHeight);
    }, _afterHeaderChange:function (e) {
        if (e.src !== UI) {
            this._uiSetStdMod(STD_HEADER, e.newVal, e.stdModPosition);
        }
    }, _afterBodyChange:function (e) {
        if (e.src !== UI) {
            this._uiSetStdMod(STD_BODY, e.newVal, e.stdModPosition);
        }
    }, _afterFooterChange:function (e) {
        if (e.src !== UI) {
            this._uiSetStdMod(STD_FOOTER, e.newVal, e.stdModPosition);
        }
    }, _afterFillHeightChange:function (e) {
        this._uiSetFillHeight(e.newVal);
    }, _validateFillHeight:function (val) {
        return!val || val == StdMod.BODY || val == StdMod.HEADER || val == StdMod.FOOTER;
    }, _uiSetFillHeight:function (fillSection) {
        var fillNode = this.getStdModNode(fillSection);
        var currNode = this._currFillNode;
        if (currNode && fillNode !== currNode) {
            currNode.setStyle(HEIGHT, EMPTY);
        }
        if (fillNode) {
            this._currFillNode = fillNode;
        }
        this._fillHeight();
    }, _fillHeight:function () {
        if (this.get(FILL_HEIGHT)) {
            var height = this.get(HEIGHT);
            if (height != EMPTY && height != AUTO) {
                this.fillHeight(this._currFillNode);
            }
        }
    }, _uiSetStdMod:function (section, content, where) {
        if (content) {
            var node = this.getStdModNode(section) || this._renderStdMod(section);
            if (content instanceof Node || content instanceof NodeList) {
                this._addNodeRef(node, content, where);
            } else {
                this._addNodeHTML(node, content, where);
            }
            this.set(section + CONTENT_SUFFIX, this._getStdModContent(section), {src:UI});
            this.fire(ContentUpdate);
        }
    }, _renderStdMod:function (section) {
        var contentBox = this.get(CONTENT_BOX), sectionNode = this._findStdModSection(section);
        if (!sectionNode) {
            sectionNode = this._getStdModTemplate(section);
        }
        this._insertStdModSection(contentBox, section, sectionNode);
        this[section + NODE_SUFFIX] = sectionNode;
        return this[section + NODE_SUFFIX];
    }, _insertStdModSection:function (contentBox, section, sectionNode) {
        var fc = contentBox.get(FIRST_CHILD);
        if (section === STD_FOOTER || !fc) {
            contentBox.appendChild(sectionNode);
        } else {
            if (section === STD_HEADER) {
                contentBox.insertBefore(sectionNode, fc);
            } else {
                var footer = this[STD_FOOTER + NODE_SUFFIX];
                if (footer) {
                    contentBox.insertBefore(sectionNode, footer);
                } else {
                    contentBox.appendChild(sectionNode);
                }
            }
        }
    }, _getStdModTemplate:function (section) {
        return Node.create(StdMod.TEMPLATES[section], this._stdModNode.get(OWNER_DOCUMENT));
    }, _addNodeHTML:function (node, html, where) {
        if (where == AFTER) {
            node.set(INNER_HTML, node.get(INNER_HTML) + html);
        } else if (where == BEFORE) {
            node.set(INNER_HTML, html + node.get(INNER_HTML));
        } else {
            node.set(INNER_HTML, html);
        }
    }, _addNodeRef:function (node, children, where) {
        var append = true, i, s;
        if (where == BEFORE) {
            var n = node.get(FIRST_CHILD);
            if (n) {
                if (children instanceof NodeList) {
                    for (i = children.size() - 1; i >= 0; --i) {
                        node.insertBefore(children.item(i), n);
                    }
                } else {
                    node.insertBefore(children, n);
                }
                append = false;
            }
        } else if (where != AFTER) {
            node.set(INNER_HTML, EMPTY);
        }
        if (append) {
            if (children instanceof NodeList) {
                for (i = 0, s = children.size(); i < s; ++i) {
                    node.appendChild(children.item(i));
                }
            } else {
                node.appendChild(children);
            }
        }
    }, _getPreciseHeight:function (node) {
        var height = (node) ? node.get(OFFSET_HEIGHT) : 0, getBCR = "getBoundingClientRect";
        if (node && node.hasMethod(getBCR)) {
            var preciseRegion = node.invoke(getBCR);
            if (preciseRegion) {
                height = preciseRegion.bottom - preciseRegion.top;
            }
        }
        return height;
    }, _findStdModSection:function (section) {
        return this.get(CONTENT_BOX).query("> ." + StdMod.SECTION_CLASS_NAMES[section]);
    }, _parseStdModHTML:function (section) {
        var node = this._findStdModSection(section), docFrag, children;
        if (node) {
            docFrag = node.get(OWNER_DOCUMENT).invoke(CREATE_DOCUMENT_FRAGMENT);
            children = node.get(CHILD_NODES);
            for (var i = children.size() - 1; i >= 0; i--) {
                var fc = docFrag.get(FIRST_CHILD);
                if (fc) {
                    docFrag.insertBefore(children.item(i), fc);
                } else {
                    docFrag.appendChild(children.item(i));
                }
            }
            return docFrag;
        }
        return null;
    }, _getStdModContent:function (section) {
        return(this[section + NODE_SUFFIX]) ? this[section + NODE_SUFFIX].get(CHILD_NODES) : null;
    }, setStdModContent:function (section, content, where) {
        this.set(section + CONTENT_SUFFIX, content, {stdModPosition:where});
    }, getStdModNode:function (section) {
        return this[section + NODE_SUFFIX] || null;
    }, fillHeight:function (node) {
        if (node) {
            var boundingBox = this.get(BOUNDING_BOX), stdModNodes = [this.headerNode, this.bodyNode, this.footerNode], stdModNode, total = 0, filled = 0, remaining = 0, validNode = false;
            for (var i = 0, l = stdModNodes.length; i < l; i++) {
                stdModNode = stdModNodes[i];
                if (stdModNode) {
                    if (stdModNode !== node) {
                        filled += this._getPreciseHeight(stdModNode);
                    } else {
                        validNode = true;
                    }
                }
            }
            if (validNode) {
                if (UA.ie || UA.opera) {
                    node.setStyle(HEIGHT, 0 + PX);
                }
                total = parseInt(boundingBox.getComputedStyle(HEIGHT), 10);
                if (L.isNumber(total)) {
                    remaining = total - filled;
                    if (remaining >= 0) {
                        node.setStyle(HEIGHT, remaining + PX);
                    }
                    var offsetHeight = this.get(CONTENT_BOX).get(OFFSET_HEIGHT);
                    if (offsetHeight != total) {
                        remaining = remaining - (offsetHeight - total);
                        node.setStyle(HEIGHT, remaining + PX);
                    }
                }
            }
        }
    }};
    Y.WidgetStdMod = StdMod;
}, '3.0.0', {requires:['widget']});