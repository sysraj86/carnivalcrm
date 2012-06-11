/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 2.8.0r4
 */
(function () {
    var B = YAHOO.util.Dom, A = YAHOO.util.Event, C = YAHOO.lang;
    if (YAHOO.widget.Button) {
        YAHOO.widget.ToolbarButtonAdvanced = YAHOO.widget.Button;
        YAHOO.widget.ToolbarButtonAdvanced.prototype.buttonType = "rich";
        YAHOO.widget.ToolbarButtonAdvanced.prototype.checkValue = function (F) {
            var E = this.getMenu().getItems();
            if (E.length === 0) {
                this.getMenu()._onBeforeShow();
                E = this.getMenu().getItems();
            }
            for (var D = 0; D < E.length; D++) {
                E[D].cfg.setProperty("checked", false);
                if (E[D].value == F) {
                    E[D].cfg.setProperty("checked", true);
                }
            }
        };
    } else {
        YAHOO.widget.ToolbarButtonAdvanced = function () {
        };
    }
    YAHOO.widget.ToolbarButton = function (E, D) {
        if (C.isObject(arguments[0]) && !B.get(E).nodeType) {
            D = E;
        }
        var G = (D || {});
        var F = {element:null, attributes:G};
        if (!F.attributes.type) {
            F.attributes.type = "push";
        }
        F.element = document.createElement("span");
        F.element.setAttribute("unselectable", "on");
        F.element.className = "yui-button yui-" + F.attributes.type + "-button";
        F.element.innerHTML = '<span class="first-child"><a href="#">LABEL</a></span>';
        F.element.firstChild.firstChild.tabIndex = "-1";
        F.attributes.id = (F.attributes.id || B.generateId());
        F.element.id = F.attributes.id;
        YAHOO.widget.ToolbarButton.superclass.constructor.call(this, F.element, F.attributes);
    };
    YAHOO.extend(YAHOO.widget.ToolbarButton, YAHOO.util.Element, {buttonType:"normal", _handleMouseOver:function () {
        if (!this.get("disabled")) {
            this.addClass("yui-button-hover");
            this.addClass("yui-" + this.get("type") + "-button-hover");
        }
    }, _handleMouseOut:function () {
        this.removeClass("yui-button-hover");
        this.removeClass("yui-" + this.get("type") + "-button-hover");
    }, checkValue:function (F) {
        if (this.get("type") == "menu") {
            var E = this._button.options;
            for (var D = 0; D < E.length; D++) {
                if (E[D].value == F) {
                    E.selectedIndex = D;
                }
            }
        }
    }, init:function (E, D) {
        YAHOO.widget.ToolbarButton.superclass.init.call(this, E, D);
        this.on("mouseover", this._handleMouseOver, this, true);
        this.on("mouseout", this._handleMouseOut, this, true);
        this.on("click", function (F) {
            A.stopEvent(F);
            return false;
        }, this, true);
    }, initAttributes:function (D) {
        YAHOO.widget.ToolbarButton.superclass.initAttributes.call(this, D);
        this.setAttributeConfig("value", {value:D.value});
        this.setAttributeConfig("menu", {value:D.menu || false});
        this.setAttributeConfig("type", {value:D.type, writeOnce:true, method:function (H) {
            var G, F;
            if (!this._button) {
                this._button = this.get("element").getElementsByTagName("a")[0];
            }
            switch (H) {
                case"select":
                case"menu":
                    G = document.createElement("select");
                    G.id = this.get("id");
                    var I = this.get("menu");
                    for (var E = 0; E < I.length; E++) {
                        F = document.createElement("option");
                        F.innerHTML = I[E].text;
                        F.value = I[E].value;
                        if (I[E].checked) {
                            F.selected = true;
                        }
                        G.appendChild(F);
                    }
                    this._button.parentNode.replaceChild(G, this._button);
                    A.on(G, "change", this._handleSelect, this, true);
                    this._button = G;
                    break;
            }
        }});
        this.setAttributeConfig("disabled", {value:D.disabled || false, method:function (E) {
            if (E) {
                this.addClass("yui-button-disabled");
                this.addClass("yui-" + this.get("type") + "-button-disabled");
            } else {
                this.removeClass("yui-button-disabled");
                this.removeClass("yui-" + this.get("type") + "-button-disabled");
            }
            if ((this.get("type") == "menu") || (this.get("type") == "select")) {
                this._button.disabled = E;
            }
        }});
        this.setAttributeConfig("label", {value:D.label, method:function (E) {
            if (!this._button) {
                this._button = this.get("element").getElementsByTagName("a")[0];
            }
            if (this.get("type") == "push") {
                this._button.innerHTML = E;
            }
        }});
        this.setAttributeConfig("title", {value:D.title});
        this.setAttributeConfig("container", {value:null, writeOnce:true, method:function (E) {
            this.appendTo(E);
        }});
    }, _handleSelect:function (E) {
        var D = A.getTarget(E);
        var F = D.options[D.selectedIndex].value;
        this.fireEvent("change", {type:"change", value:F});
    }, getMenu:function () {
        return this.get("menu");
    }, destroy:function () {
        A.purgeElement(this.get("element"), true);
        this.get("element").parentNode.removeChild(this.get("element"));
        for (var D in this) {
            if (C.hasOwnProperty(this, D)) {
                this[D] = null;
            }
        }
    }, fireEvent:function (E, D) {
        if (this.DOM_EVENTS[E] && this.get("disabled")) {
            A.stopEvent(D);
            return;
        }
        YAHOO.widget.ToolbarButton.superclass.fireEvent.call(this, E, D);
    }, toString:function () {
        return"ToolbarButton (" + this.get("id") + ")";
    }});
})();
(function () {
    var C = YAHOO.util.Dom, A = YAHOO.util.Event, D = YAHOO.lang;
    var B = function (F) {
        var E = F;
        if (D.isString(F)) {
            E = this.getButtonById(F);
        }
        if (D.isNumber(F)) {
            E = this.getButtonByIndex(F);
        }
        if ((!(E instanceof YAHOO.widget.ToolbarButton)) && (!(E instanceof YAHOO.widget.ToolbarButtonAdvanced))) {
            E = this.getButtonByValue(F);
        }
        if ((E instanceof YAHOO.widget.ToolbarButton) || (E instanceof YAHOO.widget.ToolbarButtonAdvanced)) {
            return E;
        }
        return false;
    };
    YAHOO.widget.Toolbar = function (I, H) {
        if (D.isObject(arguments[0]) && !C.get(I).nodeType) {
            H = I;
        }
        var K = {};
        if (H) {
            D.augmentObject(K, H);
        }
        var J = {element:null, attributes:K};
        if (D.isString(I) && C.get(I)) {
            J.element = C.get(I);
        } else {
            if (D.isObject(I) && C.get(I) && C.get(I).nodeType) {
                J.element = C.get(I);
            }
        }
        if (!J.element) {
            J.element = document.createElement("DIV");
            J.element.id = C.generateId();
            if (K.container && C.get(K.container)) {
                C.get(K.container).appendChild(J.element);
            }
        }
        if (!J.element.id) {
            J.element.id = ((D.isString(I)) ? I : C.generateId());
        }
        var F = document.createElement("fieldset");
        var G = document.createElement("legend");
        G.innerHTML = "Toolbar";
        F.appendChild(G);
        var E = document.createElement("DIV");
        J.attributes.cont = E;
        C.addClass(E, "yui-toolbar-subcont");
        F.appendChild(E);
        J.element.appendChild(F);
        J.element.tabIndex = -1;
        J.attributes.element = J.element;
        J.attributes.id = J.element.id;
        this._configuredButtons = [];
        YAHOO.widget.Toolbar.superclass.constructor.call(this, J.element, J.attributes);
    };
    YAHOO.extend(YAHOO.widget.Toolbar, YAHOO.util.Element, {_configuredButtons:null, _addMenuClasses:function (H, E, I) {
        C.addClass(this.element, "yui-toolbar-" + I.get("value") + "-menu");
        if (C.hasClass(I._button.parentNode.parentNode, "yui-toolbar-select")) {
            C.addClass(this.element, "yui-toolbar-select-menu");
        }
        var F = this.getItems();
        for (var G = 0; G < F.length; G++) {
            C.addClass(F[G].element, "yui-toolbar-" + I.get("value") + "-" + ((F[G].value) ? F[G].value.replace(/ /g, "-").toLowerCase() : F[G]._oText.nodeValue.replace(/ /g, "-").toLowerCase()));
            C.addClass(F[G].element, "yui-toolbar-" + I.get("value") + "-" + ((F[G].value) ? F[G].value.replace(/ /g, "-") : F[G]._oText.nodeValue.replace(/ /g, "-")));
        }
    }, buttonType:YAHOO.widget.ToolbarButton, dd:null, _colorData:{"#111111":"Obsidian", "#2D2D2D":"Dark Gray", "#434343":"Shale", "#5B5B5B":"Flint", "#737373":"Gray", "#8B8B8B":"Concrete", "#A2A2A2":"Gray", "#B9B9B9":"Titanium", "#000000":"Black", "#D0D0D0":"Light Gray", "#E6E6E6":"Silver", "#FFFFFF":"White", "#BFBF00":"Pumpkin", "#FFFF00":"Yellow", "#FFFF40":"Banana", "#FFFF80":"Pale Yellow", "#FFFFBF":"Butter", "#525330":"Raw Siena", "#898A49":"Mildew", "#AEA945":"Olive", "#7F7F00":"Paprika", "#C3BE71":"Earth", "#E0DCAA":"Khaki", "#FCFAE1":"Cream", "#60BF00":"Cactus", "#80FF00":"Chartreuse", "#A0FF40":"Green", "#C0FF80":"Pale Lime", "#DFFFBF":"Light Mint", "#3B5738":"Green", "#668F5A":"Lime Gray", "#7F9757":"Yellow", "#407F00":"Clover", "#8A9B55":"Pistachio", "#B7C296":"Light Jade", "#E6EBD5":"Breakwater", "#00BF00":"Spring Frost", "#00FF80":"Pastel Green", "#40FFA0":"Light Emerald", "#80FFC0":"Sea Foam", "#BFFFDF":"Sea Mist", "#033D21":"Dark Forrest", "#438059":"Moss", "#7FA37C":"Medium Green", "#007F40":"Pine", "#8DAE94":"Yellow Gray Green", "#ACC6B5":"Aqua Lung", "#DDEBE2":"Sea Vapor", "#00BFBF":"Fog", "#00FFFF":"Cyan", "#40FFFF":"Turquoise Blue", "#80FFFF":"Light Aqua", "#BFFFFF":"Pale Cyan", "#033D3D":"Dark Teal", "#347D7E":"Gray Turquoise", "#609A9F":"Green Blue", "#007F7F":"Seaweed", "#96BDC4":"Green Gray", "#B5D1D7":"Soapstone", "#E2F1F4":"Light Turquoise", "#0060BF":"Summer Sky", "#0080FF":"Sky Blue", "#40A0FF":"Electric Blue", "#80C0FF":"Light Azure", "#BFDFFF":"Ice Blue", "#1B2C48":"Navy", "#385376":"Biscay", "#57708F":"Dusty Blue", "#00407F":"Sea Blue", "#7792AC":"Sky Blue Gray", "#A8BED1":"Morning Sky", "#DEEBF6":"Vapor", "#0000BF":"Deep Blue", "#0000FF":"Blue", "#4040FF":"Cerulean Blue", "#8080FF":"Evening Blue", "#BFBFFF":"Light Blue", "#212143":"Deep Indigo", "#373E68":"Sea Blue", "#444F75":"Night Blue", "#00007F":"Indigo Blue", "#585E82":"Dockside", "#8687A4":"Blue Gray", "#D2D1E1":"Light Blue Gray", "#6000BF":"Neon Violet", "#8000FF":"Blue Violet", "#A040FF":"Violet Purple", "#C080FF":"Violet Dusk", "#DFBFFF":"Pale Lavender", "#302449":"Cool Shale", "#54466F":"Dark Indigo", "#655A7F":"Dark Violet", "#40007F":"Violet", "#726284":"Smoky Violet", "#9E8FA9":"Slate Gray", "#DCD1DF":"Violet White", "#BF00BF":"Royal Violet", "#FF00FF":"Fuchsia", "#FF40FF":"Magenta", "#FF80FF":"Orchid", "#FFBFFF":"Pale Magenta", "#4A234A":"Dark Purple", "#794A72":"Medium Purple", "#936386":"Cool Granite", "#7F007F":"Purple", "#9D7292":"Purple Moon", "#C0A0B6":"Pale Purple", "#ECDAE5":"Pink Cloud", "#BF005F":"Hot Pink", "#FF007F":"Deep Pink", "#FF409F":"Grape", "#FF80BF":"Electric Pink", "#FFBFDF":"Pink", "#451528":"Purple Red", "#823857":"Purple Dino", "#A94A76":"Purple Gray", "#7F003F":"Rose", "#BC6F95":"Antique Mauve", "#D8A5BB":"Cool Marble", "#F7DDE9":"Pink Granite", "#C00000":"Apple", "#FF0000":"Fire Truck", "#FF4040":"Pale Red", "#FF8080":"Salmon", "#FFC0C0":"Warm Pink", "#441415":"Sepia", "#82393C":"Rust", "#AA4D4E":"Brick", "#800000":"Brick Red", "#BC6E6E":"Mauve", "#D8A3A4":"Shrimp Pink", "#F8DDDD":"Shell Pink", "#BF5F00":"Dark Orange", "#FF7F00":"Orange", "#FF9F40":"Grapefruit", "#FFBF80":"Canteloupe", "#FFDFBF":"Wax", "#482C1B":"Dark Brick", "#855A40":"Dirt", "#B27C51":"Tan", "#7F3F00":"Nutmeg", "#C49B71":"Mustard", "#E1C4A8":"Pale Tan", "#FDEEE0":"Marble"}, _colorPicker:null, STR_COLLAPSE:"Collapse Toolbar", STR_EXPAND:"Expand Toolbar", STR_SPIN_LABEL:"Spin Button with value {VALUE}. Use Control Shift Up Arrow and Control Shift Down arrow keys to increase or decrease the value.", STR_SPIN_UP:"Click to increase the value of this input", STR_SPIN_DOWN:"Click to decrease the value of this input", _titlebar:null, browser:YAHOO.env.ua, _buttonList:null, _buttonGroupList:null, _sep:null, _sepCount:null, _dragHandle:null, _toolbarConfigs:{renderer:true}, CLASS_CONTAINER:"yui-toolbar-container", CLASS_DRAGHANDLE:"yui-toolbar-draghandle", CLASS_SEPARATOR:"yui-toolbar-separator", CLASS_DISABLED:"yui-toolbar-disabled", CLASS_PREFIX:"yui-toolbar", init:function (F, E) {
        YAHOO.widget.Toolbar.superclass.init.call(this, F, E);
    }, initAttributes:function (E) {
        YAHOO.widget.Toolbar.superclass.initAttributes.call(this, E);
        this.addClass(this.CLASS_CONTAINER);
        this.setAttributeConfig("buttonType", {value:E.buttonType || "basic", writeOnce:true, validator:function (F) {
            switch (F) {
                case"advanced":
                case"basic":
                    return true;
            }
            return false;
        }, method:function (F) {
            if (F == "advanced") {
                if (YAHOO.widget.Button) {
                    this.buttonType = YAHOO.widget.ToolbarButtonAdvanced;
                } else {
                    this.buttonType = YAHOO.widget.ToolbarButton;
                }
            } else {
                this.buttonType = YAHOO.widget.ToolbarButton;
            }
        }});
        this.setAttributeConfig("buttons", {value:[], writeOnce:true, method:function (K) {
            var I, H, J, G, F;
            for (I in K) {
                if (D.hasOwnProperty(K, I)) {
                    if (K[I].type == "separator") {
                        this.addSeparator();
                    } else {
                        if (K[I].group !== undefined) {
                            J = this.addButtonGroup(K[I]);
                            if (J) {
                                G = J.length;
                                for (F = 0; F < G; F++) {
                                    if (J[F]) {
                                        this._configuredButtons[this._configuredButtons.length] = J[F].id;
                                    }
                                }
                            }
                        } else {
                            H = this.addButton(K[I]);
                            if (H) {
                                this._configuredButtons[this._configuredButtons.length] = H.id;
                            }
                        }
                    }
                }
            }
        }});
        this.setAttributeConfig("disabled", {value:false, method:function (F) {
            if (this.get("disabled") === F) {
                return false;
            }
            if (F) {
                this.addClass(this.CLASS_DISABLED);
                this.set("draggable", false);
                this.disableAllButtons();
            } else {
                this.removeClass(this.CLASS_DISABLED);
                if (this._configs.draggable._initialConfig.value) {
                    this.set("draggable", true);
                }
                this.resetAllButtons();
            }
        }});
        this.setAttributeConfig("cont", {value:E.cont, readOnly:true});
        this.setAttributeConfig("grouplabels", {value:((E.grouplabels === false) ? false : true), method:function (F) {
            if (F) {
                C.removeClass(this.get("cont"), (this.CLASS_PREFIX + "-nogrouplabels"));
            } else {
                C.addClass(this.get("cont"), (this.CLASS_PREFIX + "-nogrouplabels"));
            }
        }});
        this.setAttributeConfig("titlebar", {value:false, method:function (G) {
            if (G) {
                if (this._titlebar && this._titlebar.parentNode) {
                    this._titlebar.parentNode.removeChild(this._titlebar);
                }
                this._titlebar = document.createElement("DIV");
                this._titlebar.tabIndex = "-1";
                A.on(this._titlebar, "focus", function () {
                    this._handleFocus();
                }, this, true);
                C.addClass(this._titlebar, this.CLASS_PREFIX + "-titlebar");
                if (D.isString(G)) {
                    var F = document.createElement("h2");
                    F.tabIndex = "-1";
                    F.innerHTML = '<a href="#" tabIndex="0">' + G + "</a>";
                    this._titlebar.appendChild(F);
                    A.on(F.firstChild, "click", function (H) {
                        A.stopEvent(H);
                    });
                    A.on([F, F.firstChild], "focus", function () {
                        this._handleFocus();
                    }, this, true);
                }
                if (this.get("firstChild")) {
                    this.insertBefore(this._titlebar, this.get("firstChild"));
                } else {
                    this.appendChild(this._titlebar);
                }
                if (this.get("collapse")) {
                    this.set("collapse", true);
                }
            } else {
                if (this._titlebar) {
                    if (this._titlebar && this._titlebar.parentNode) {
                        this._titlebar.parentNode.removeChild(this._titlebar);
                    }
                }
            }
        }});
        this.setAttributeConfig("collapse", {value:false, method:function (H) {
            if (this._titlebar) {
                var G = null;
                var F = C.getElementsByClassName("collapse", "span", this._titlebar);
                if (H) {
                    if (F.length > 0) {
                        return true;
                    }
                    G = document.createElement("SPAN");
                    G.innerHTML = "X";
                    G.title = this.STR_COLLAPSE;
                    C.addClass(G, "collapse");
                    this._titlebar.appendChild(G);
                    A.addListener(G, "click", function () {
                        if (C.hasClass(this.get("cont").parentNode, "yui-toolbar-container-collapsed")) {
                            this.collapse(false);
                        } else {
                            this.collapse();
                        }
                    }, this, true);
                } else {
                    G = C.getElementsByClassName("collapse", "span", this._titlebar);
                    if (G[0]) {
                        if (C.hasClass(this.get("cont").parentNode, "yui-toolbar-container-collapsed")) {
                            this.collapse(false);
                        }
                        G[0].parentNode.removeChild(G[0]);
                    }
                }
            }
        }});
        this.setAttributeConfig("draggable", {value:(E.draggable || false), method:function (F) {
            if (F && !this.get("titlebar")) {
                if (!this._dragHandle) {
                    this._dragHandle = document.createElement("SPAN");
                    this._dragHandle.innerHTML = "|";
                    this._dragHandle.setAttribute("title", "Click to drag the toolbar");
                    this._dragHandle.id = this.get("id") + "_draghandle";
                    C.addClass(this._dragHandle, this.CLASS_DRAGHANDLE);
                    if (this.get("cont").hasChildNodes()) {
                        this.get("cont").insertBefore(this._dragHandle, this.get("cont").firstChild);
                    } else {
                        this.get("cont").appendChild(this._dragHandle);
                    }
                    this.dd = new YAHOO.util.DD(this.get("id"));
                    this.dd.setHandleElId(this._dragHandle.id);
                }
            } else {
                if (this._dragHandle) {
                    this._dragHandle.parentNode.removeChild(this._dragHandle);
                    this._dragHandle = null;
                    this.dd = null;
                }
            }
            if (this._titlebar) {
                if (F) {
                    this.dd = new YAHOO.util.DD(this.get("id"));
                    this.dd.setHandleElId(this._titlebar);
                    C.addClass(this._titlebar, "draggable");
                } else {
                    C.removeClass(this._titlebar, "draggable");
                    if (this.dd) {
                        this.dd.unreg();
                        this.dd = null;
                    }
                }
            }
        }, validator:function (G) {
            var F = true;
            if (!YAHOO.util.DD) {
                F = false;
            }
            return F;
        }});
    }, addButtonGroup:function (J) {
        if (!this.get("element")) {
            this._queue[this._queue.length] = ["addButtonGroup", arguments];
            return false;
        }
        if (!this.hasClass(this.CLASS_PREFIX + "-grouped")) {
            this.addClass(this.CLASS_PREFIX + "-grouped");
        }
        var L = document.createElement("DIV");
        C.addClass(L, this.CLASS_PREFIX + "-group");
        C.addClass(L, this.CLASS_PREFIX + "-group-" + J.group);
        if (J.label) {
            var F = document.createElement("h3");
            F.innerHTML = J.label;
            L.appendChild(F);
        }
        if (!this.get("grouplabels")) {
            C.addClass(this.get("cont"), this.CLASS_PREFIX, "-nogrouplabels");
        }
        this.get("cont").appendChild(L);
        var I = document.createElement("ul");
        L.appendChild(I);
        if (!this._buttonGroupList) {
            this._buttonGroupList = {};
        }
        this._buttonGroupList[J.group] = I;
        var K = [], H;
        for (var G = 0; G < J.buttons.length; G++) {
            var E = document.createElement("li");
            E.className = this.CLASS_PREFIX + "-groupitem";
            I.appendChild(E);
            if ((J.buttons[G].type !== undefined) && J.buttons[G].type == "separator") {
                this.addSeparator(E);
            } else {
                J.buttons[G].container = E;
                H = this.addButton(J.buttons[G]);
                if (H) {
                    K[K.length] = H.id;
                }
            }
        }
        return K;
    }, addButtonToGroup:function (G, H, I) {
        var F = this._buttonGroupList[H], E = document.createElement("li");
        E.className = this.CLASS_PREFIX + "-groupitem";
        G.container = E;
        this.addButton(G, I);
        F.appendChild(E);
    }, addButton:function (J, I) {
        if (!this.get("element")) {
            this._queue[this._queue.length] = ["addButton", arguments];
            return false;
        }
        if (!this._buttonList) {
            this._buttonList = [];
        }
        if (!J.container) {
            J.container = this.get("cont");
        }
        if ((J.type == "menu") || (J.type == "split") || (J.type == "select")) {
            if (D.isArray(J.menu)) {
                for (var P in J.menu) {
                    if (D.hasOwnProperty(J.menu, P)) {
                        var V = {fn:function (Y, W, X) {
                            if (!J.menucmd) {
                                J.menucmd = J.value;
                            }
                            J.value = ((X.value) ? X.value : X._oText.nodeValue);
                        }, scope:this};
                        J.menu[P].onclick = V;
                    }
                }
            }
        }
        var Q = {}, N = false;
        for (var L in J) {
            if (D.hasOwnProperty(J, L)) {
                if (!this._toolbarConfigs[L]) {
                    Q[L] = J[L];
                }
            }
        }
        if (J.type == "select") {
            Q.type = "menu";
        }
        if (J.type == "spin") {
            Q.type = "push";
        }
        if (Q.type == "color") {
            if (YAHOO.widget.Overlay) {
                Q = this._makeColorButton(Q);
            } else {
                N = true;
            }
        }
        if (Q.menu) {
            if ((YAHOO.widget.Overlay) && (J.menu instanceof YAHOO.widget.Overlay)) {
                J.menu.showEvent.subscribe(function () {
                    this._button = Q;
                });
            } else {
                for (var O = 0; O < Q.menu.length; O++) {
                    if (!Q.menu[O].value) {
                        Q.menu[O].value = Q.menu[O].text;
                    }
                }
                if (this.browser.webkit) {
                    Q.focusmenu = false;
                }
            }
        }
        if (N) {
            J = false;
        } else {
            this._configs.buttons.value[this._configs.buttons.value.length] = J;
            var T = new this.buttonType(Q);
            T.get("element").tabIndex = "-1";
            T.get("element").setAttribute("role", "button");
            T._selected = true;
            if (this.get("disabled")) {
                T.set("disabled", true);
            }
            if (!J.id) {
                J.id = T.get("id");
            }
            if (I) {
                var F = T.get("element");
                var M = null;
                if (I.get) {
                    M = I.get("element").nextSibling;
                } else {
                    if (I.nextSibling) {
                        M = I.nextSibling;
                    }
                }
                if (M) {
                    M.parentNode.insertBefore(F, M);
                }
            }
            T.addClass(this.CLASS_PREFIX + "-" + T.get("value"));
            var S = document.createElement("span");
            S.className = this.CLASS_PREFIX + "-icon";
            T.get("element").insertBefore(S, T.get("firstChild"));
            if (T._button.tagName.toLowerCase() == "button") {
                T.get("element").setAttribute("unselectable", "on");
                var U = document.createElement("a");
                U.innerHTML = T._button.innerHTML;
                U.href = "#";
                U.tabIndex = "-1";
                A.on(U, "click", function (W) {
                    A.stopEvent(W);
                });
                T._button.parentNode.replaceChild(U, T._button);
                T._button = U;
            }
            if (J.type == "select") {
                if (T._button.tagName.toLowerCase() == "select") {
                    S.parentNode.removeChild(S);
                    var G = T._button, R = T.get("element");
                    R.parentNode.replaceChild(G, R);
                    T._configs.element.value = G;
                } else {
                    T.addClass(this.CLASS_PREFIX + "-select");
                }
            }
            if (J.type == "spin") {
                if (!D.isArray(J.range)) {
                    J.range = [10, 100];
                }
                this._makeSpinButton(T, J);
            }
            T.get("element").setAttribute("title", T.get("label"));
            if (J.type != "spin") {
                if ((YAHOO.widget.Overlay) && (Q.menu instanceof YAHOO.widget.Overlay)) {
                    var H = function (Y) {
                        var W = true;
                        if (Y.keyCode && (Y.keyCode == 9)) {
                            W = false;
                        }
                        if (W) {
                            if (this._colorPicker) {
                                this._colorPicker._button = J.value;
                            }
                            var X = T.getMenu().element;
                            if (C.getStyle(X, "visibility") == "hidden") {
                                T.getMenu().show();
                            } else {
                                T.getMenu().hide();
                            }
                        }
                        YAHOO.util.Event.stopEvent(Y);
                    };
                    T.on("mousedown", H, J, this);
                    T.on("keydown", H, J, this);
                } else {
                    if ((J.type != "menu") && (J.type != "select")) {
                        T.on("keypress", this._buttonClick, J, this);
                        T.on("mousedown", function (W) {
                            YAHOO.util.Event.stopEvent(W);
                            this._buttonClick(W, J);
                        }, J, this);
                        T.on("click", function (W) {
                            YAHOO.util.Event.stopEvent(W);
                        });
                    } else {
                        T.on("mousedown", function (W) {
                            YAHOO.util.Event.stopEvent(W);
                        });
                        T.on("click", function (W) {
                            YAHOO.util.Event.stopEvent(W);
                        });
                        T.on("change", function (W) {
                            if (!W.target) {
                                if (!J.menucmd) {
                                    J.menucmd = J.value;
                                }
                                J.value = W.value;
                                this._buttonClick(W, J);
                            }
                        }, this, true);
                        var K = this;
                        T.on("appendTo", function () {
                            var W = this;
                            if (W.getMenu() && W.getMenu().mouseDownEvent) {
                                W.getMenu().mouseDownEvent.subscribe(function (Z, Y) {
                                    var X = Y[1];
                                    YAHOO.util.Event.stopEvent(Y[0]);
                                    W._onMenuClick(Y[0], W);
                                    if (!J.menucmd) {
                                        J.menucmd = J.value;
                                    }
                                    J.value = ((X.value) ? X.value : X._oText.nodeValue);
                                    K._buttonClick.call(K, Y[1], J);
                                    W._hideMenu();
                                    return false;
                                });
                                W.getMenu().clickEvent.subscribe(function (Y, X) {
                                    YAHOO.util.Event.stopEvent(X[0]);
                                });
                                W.getMenu().mouseUpEvent.subscribe(function (Y, X) {
                                    YAHOO.util.Event.stopEvent(X[0]);
                                });
                            }
                        });
                    }
                }
            } else {
                T.on("mousedown", function (W) {
                    YAHOO.util.Event.stopEvent(W);
                });
                T.on("click", function (W) {
                    YAHOO.util.Event.stopEvent(W);
                });
            }
            if (this.browser.ie) {
            }
            if (this.browser.webkit) {
                T.hasFocus = function () {
                    return true;
                };
            }
            this._buttonList[this._buttonList.length] = T;
            if ((J.type == "menu") || (J.type == "split") || (J.type == "select")) {
                if (D.isArray(J.menu)) {
                    var E = T.getMenu();
                    if (E && E.renderEvent) {
                        E.renderEvent.subscribe(this._addMenuClasses, T);
                        if (J.renderer) {
                            E.renderEvent.subscribe(J.renderer, T);
                        }
                    }
                }
            }
        }
        return J;
    }, addSeparator:function (E, H) {
        if (!this.get("element")) {
            this._queue[this._queue.length] = ["addSeparator", arguments];
            return false;
        }
        var F = ((E) ? E : this.get("cont"));
        if (!this.get("element")) {
            this._queue[this._queue.length] = ["addSeparator", arguments];
            return false;
        }
        if (this._sepCount === null) {
            this._sepCount = 0;
        }
        if (!this._sep) {
            this._sep = document.createElement("SPAN");
            C.addClass(this._sep, this.CLASS_SEPARATOR);
            this._sep.innerHTML = "|";
        }
        var G = this._sep.cloneNode(true);
        this._sepCount++;
        C.addClass(G, this.CLASS_SEPARATOR + "-" + this._sepCount);
        if (H) {
            var I = null;
            if (H.get) {
                I = H.get("element").nextSibling;
            } else {
                if (H.nextSibling) {
                    I = H.nextSibling;
                } else {
                    I = H;
                }
            }
            if (I) {
                if (I == H) {
                    I.parentNode.appendChild(G);
                } else {
                    I.parentNode.insertBefore(G, I);
                }
            }
        } else {
            F.appendChild(G);
        }
        return G;
    }, _createColorPicker:function (H) {
        if (C.get(H + "_colors")) {
            C.get(H + "_colors").parentNode.removeChild(C.get(H + "_colors"));
        }
        var E = document.createElement("div");
        E.className = "yui-toolbar-colors";
        E.id = H + "_colors";
        E.style.display = "none";
        A.on(window, "load", function () {
            document.body.appendChild(E);
        }, this, true);
        this._colorPicker = E;
        var G = "";
        for (var F in this._colorData) {
            if (D.hasOwnProperty(this._colorData, F)) {
                G += '<a style="background-color: ' + F + '" href="#">' + F.replace("#", "") + "</a>";
            }
        }
        G += "<span><em>X</em><strong></strong></span>";
        window.setTimeout(function () {
            E.innerHTML = G;
        }, 0);
        A.on(E, "mouseover", function (M) {
            var K = this._colorPicker;
            var L = K.getElementsByTagName("em")[0];
            var J = K.getElementsByTagName("strong")[0];
            var I = A.getTarget(M);
            if (I.tagName.toLowerCase() == "a") {
                L.style.backgroundColor = I.style.backgroundColor;
                J.innerHTML = this._colorData["#" + I.innerHTML] + "<br>" + I.innerHTML;
            }
        }, this, true);
        A.on(E, "focus", function (I) {
            A.stopEvent(I);
        });
        A.on(E, "click", function (I) {
            A.stopEvent(I);
        });
        A.on(E, "mousedown", function (J) {
            A.stopEvent(J);
            var I = A.getTarget(J);
            if (I.tagName.toLowerCase() == "a") {
                var L = this.fireEvent("colorPickerClicked", {type:"colorPickerClicked", target:this, button:this._colorPicker._button, color:I.innerHTML, colorName:this._colorData["#" + I.innerHTML]});
                if (L !== false) {
                    var K = {color:I.innerHTML, colorName:this._colorData["#" + I.innerHTML], value:this._colorPicker._button};
                    this.fireEvent("buttonClick", {type:"buttonClick", target:this.get("element"), button:K});
                }
                this.getButtonByValue(this._colorPicker._button).getMenu().hide();
            }
        }, this, true);
    }, _resetColorPicker:function () {
        var F = this._colorPicker.getElementsByTagName("em")[0];
        var E = this._colorPicker.getElementsByTagName("strong")[0];
        F.style.backgroundColor = "transparent";
        E.innerHTML = "";
    }, _makeColorButton:function (E) {
        if (!this._colorPicker) {
            this._createColorPicker(this.get("id"));
        }
        E.type = "color";
        E.menu = new YAHOO.widget.Overlay(this.get("id") + "_" + E.value + "_menu", {visible:false, position:"absolute", iframe:true});
        E.menu.setBody("");
        E.menu.render(this.get("cont"));
        C.addClass(E.menu.element, "yui-button-menu");
        C.addClass(E.menu.element, "yui-color-button-menu");
        E.menu.beforeShowEvent.subscribe(function () {
            E.menu.cfg.setProperty("zindex", 5);
            E.menu.cfg.setProperty("context", [this.getButtonById(E.id).get("element"), "tl", "bl"]);
            this._resetColorPicker();
            var F = this._colorPicker;
            if (F.parentNode) {
                F.parentNode.removeChild(F);
            }
            E.menu.setBody("");
            E.menu.appendToBody(F);
            this._colorPicker.style.display = "block";
        }, this, true);
        return E;
    }, _makeSpinButton:function (R, L) {
        R.addClass(this.CLASS_PREFIX + "-spinbutton");
        var S = this, N = R._button.parentNode.parentNode, I = L.range, H = document.createElement("a"), G = document.createElement("a");
        H.href = "#";
        G.href = "#";
        H.tabIndex = "-1";
        G.tabIndex = "-1";
        H.className = "up";
        H.title = this.STR_SPIN_UP;
        H.innerHTML = this.STR_SPIN_UP;
        G.className = "down";
        G.title = this.STR_SPIN_DOWN;
        G.innerHTML = this.STR_SPIN_DOWN;
        N.appendChild(H);
        N.appendChild(G);
        var M = YAHOO.lang.substitute(this.STR_SPIN_LABEL, {VALUE:R.get("label")});
        R.set("title", M);
        var Q = function (T) {
            T = ((T < I[0]) ? I[0] : T);
            T = ((T > I[1]) ? I[1] : T);
            return T;
        };
        var P = this.browser;
        var F = false;
        var K = this.STR_SPIN_LABEL;
        if (this._titlebar && this._titlebar.firstChild) {
            F = this._titlebar.firstChild;
        }
        var E = function (U) {
            YAHOO.util.Event.stopEvent(U);
            if (!R.get("disabled") && (U.keyCode != 9)) {
                var V = parseInt(R.get("label"), 10);
                V++;
                V = Q(V);
                R.set("label", "" + V);
                var T = YAHOO.lang.substitute(K, {VALUE:R.get("label")});
                R.set("title", T);
                if (!P.webkit && F) {
                }
                S._buttonClick(U, L);
            }
        };
        var O = function (U) {
            YAHOO.util.Event.stopEvent(U);
            if (!R.get("disabled") && (U.keyCode != 9)) {
                var V = parseInt(R.get("label"), 10);
                V--;
                V = Q(V);
                R.set("label", "" + V);
                var T = YAHOO.lang.substitute(K, {VALUE:R.get("label")});
                R.set("title", T);
                if (!P.webkit && F) {
                }
                S._buttonClick(U, L);
            }
        };
        var J = function (T) {
            if (T.keyCode == 38) {
                E(T);
            } else {
                if (T.keyCode == 40) {
                    O(T);
                } else {
                    if (T.keyCode == 107 && T.shiftKey) {
                        E(T);
                    } else {
                        if (T.keyCode == 109 && T.shiftKey) {
                            O(T);
                        }
                    }
                }
            }
        };
        R.on("keydown", J, this, true);
        A.on(H, "mousedown", function (T) {
            A.stopEvent(T);
        }, this, true);
        A.on(G, "mousedown", function (T) {
            A.stopEvent(T);
        }, this, true);
        A.on(H, "click", E, this, true);
        A.on(G, "click", O, this, true);
    }, _buttonClick:function (L, F) {
        var E = true;
        if (L && L.type == "keypress") {
            if (L.keyCode == 9) {
                E = false;
            } else {
                if ((L.keyCode === 13) || (L.keyCode === 0) || (L.keyCode === 32)) {
                } else {
                    E = false;
                }
            }
        }
        if (E) {
            var N = true, H = false;
            F.isSelected = this.isSelected(F.id);
            if (F.value) {
                H = this.fireEvent(F.value + "Click", {type:F.value + "Click", target:this.get("element"), button:F});
                if (H === false) {
                    N = false;
                }
            }
            if (F.menucmd && N) {
                H = this.fireEvent(F.menucmd + "Click", {type:F.menucmd + "Click", target:this.get("element"), button:F});
                if (H === false) {
                    N = false;
                }
            }
            if (N) {
                this.fireEvent("buttonClick", {type:"buttonClick", target:this.get("element"), button:F});
            }
            if (F.type == "select") {
                var K = this.getButtonById(F.id);
                if (K.buttonType == "rich") {
                    var J = F.value;
                    for (var I = 0; I < F.menu.length; I++) {
                        if (F.menu[I].value == F.value) {
                            J = F.menu[I].text;
                            break;
                        }
                    }
                    K.set("label", '<span class="yui-toolbar-' + F.menucmd + "-" + (F.value).replace(/ /g, "-").toLowerCase() + '">' + J + "</span>");
                    var M = K.getMenu().getItems();
                    for (var G = 0; G < M.length; G++) {
                        if (M[G].value.toLowerCase() == F.value.toLowerCase()) {
                            M[G].cfg.setProperty("checked", true);
                        } else {
                            M[G].cfg.setProperty("checked", false);
                        }
                    }
                }
            }
            if (L) {
                A.stopEvent(L);
            }
        }
    }, _keyNav:null, _navCounter:null, _navigateButtons:function (F) {
        switch (F.keyCode) {
            case 37:
            case 39:
                if (F.keyCode == 37) {
                    this._navCounter--;
                } else {
                    this._navCounter++;
                }
                if (this._navCounter > (this._buttonList.length - 1)) {
                    this._navCounter = 0;
                }
                if (this._navCounter < 0) {
                    this._navCounter = (this._buttonList.length - 1);
                }
                if (this._buttonList[this._navCounter]) {
                    var E = this._buttonList[this._navCounter].get("element");
                    if (this.browser.ie) {
                        E = this._buttonList[this._navCounter].get("element").getElementsByTagName("a")[0];
                    }
                    if (this._buttonList[this._navCounter].get("disabled")) {
                        this._navigateButtons(F);
                    } else {
                        E.focus();
                    }
                }
                break;
        }
    }, _handleFocus:function () {
        if (!this._keyNav) {
            var E = "keypress";
            if (this.browser.ie) {
                E = "keydown";
            }
            A.on(this.get("element"), E, this._navigateButtons, this, true);
            this._keyNav = true;
            this._navCounter = -1;
        }
    }, getButtonById:function (G) {
        var E = this._buttonList.length;
        for (var F = 0; F < E; F++) {
            if (this._buttonList[F] && this._buttonList[F].get("id") == G) {
                return this._buttonList[F];
            }
        }
        return false;
    }, getButtonByValue:function (K) {
        var H = this.get("buttons");
        if (!H) {
            return false;
        }
        var F = H.length;
        for (var I = 0; I < F; I++) {
            if (H[I].group !== undefined) {
                for (var E = 0; E < H[I].buttons.length; E++) {
                    if ((H[I].buttons[E].value == K) || (H[I].buttons[E].menucmd == K)) {
                        return this.getButtonById(H[I].buttons[E].id);
                    }
                    if (H[I].buttons[E].menu) {
                        for (var J = 0; J < H[I].buttons[E].menu.length; J++) {
                            if (H[I].buttons[E].menu[J].value == K) {
                                return this.getButtonById(H[I].buttons[E].id);
                            }
                        }
                    }
                }
            } else {
                if ((H[I].value == K) || (H[I].menucmd == K)) {
                    return this.getButtonById(H[I].id);
                }
                if (H[I].menu) {
                    for (var G = 0; G < H[I].menu.length; G++) {
                        if (H[I].menu[G].value == K) {
                            return this.getButtonById(H[I].id);
                        }
                    }
                }
            }
        }
        return false;
    }, getButtonByIndex:function (E) {
        if (this._buttonList[E]) {
            return this._buttonList[E];
        } else {
            return false;
        }
    }, getButtons:function () {
        return this._buttonList;
    }, disableButton:function (F) {
        var E = B.call(this, F);
        if (E) {
            E.set("disabled", true);
        } else {
            return false;
        }
    }, enableButton:function (F) {
        if (this.get("disabled")) {
            return false;
        }
        var E = B.call(this, F);
        if (E) {
            if (E.get("disabled")) {
                E.set("disabled", false);
            }
        } else {
            return false;
        }
    }, isSelected:function (F) {
        var E = B.call(this, F);
        if (E) {
            return E._selected;
        }
        return false;
    }, selectButton:function (I, G) {
        var F = B.call(this, I);
        if (F) {
            F.addClass("yui-button-selected");
            F.addClass("yui-button-" + F.get("value") + "-selected");
            F._selected = true;
            if (G) {
                if (F.buttonType == "rich") {
                    var H = F.getMenu().getItems();
                    for (var E = 0; E < H.length; E++) {
                        if (H[E].value == G) {
                            H[E].cfg.setProperty("checked", true);
                            F.set("label", '<span class="yui-toolbar-' + F.get("value") + "-" + (G).replace(/ /g, "-").toLowerCase() + '">' + H[E]._oText.nodeValue + "</span>");
                        } else {
                            H[E].cfg.setProperty("checked", false);
                        }
                    }
                }
            }
        } else {
            return false;
        }
    }, deselectButton:function (F) {
        var E = B.call(this, F);
        if (E) {
            E.removeClass("yui-button-selected");
            E.removeClass("yui-button-" + E.get("value") + "-selected");
            E.removeClass("yui-button-hover");
            E._selected = false;
        } else {
            return false;
        }
    }, deselectAllButtons:function () {
        var E = this._buttonList.length;
        for (var F = 0; F < E; F++) {
            this.deselectButton(this._buttonList[F]);
        }
    }, disableAllButtons:function () {
        if (this.get("disabled")) {
            return false;
        }
        var E = this._buttonList.length;
        for (var F = 0; F < E; F++) {
            this.disableButton(this._buttonList[F]);
        }
    }, enableAllButtons:function () {
        if (this.get("disabled")) {
            return false;
        }
        var E = this._buttonList.length;
        for (var F = 0; F < E; F++) {
            this.enableButton(this._buttonList[F]);
        }
    }, resetAllButtons:function (I) {
        if (!D.isObject(I)) {
            I = {};
        }
        if (this.get("disabled") || !this._buttonList) {
            return false;
        }
        var E = this._buttonList.length;
        for (var F = 0; F < E; F++) {
            var H = this._buttonList[F];
            if (H) {
                var G = H._configs.disabled._initialConfig.value;
                if (I[H.get("id")]) {
                    this.enableButton(H);
                    this.selectButton(H);
                } else {
                    if (G) {
                        this.disableButton(H);
                    } else {
                        this.enableButton(H);
                    }
                    this.deselectButton(H);
                }
            }
        }
    }, destroyButton:function (J) {
        var H = B.call(this, J);
        if (H) {
            var I = H.get("id"), F = [], G = 0, E = this._buttonList.length;
            H.destroy();
            for (G = 0; G < E; G++) {
                if (this._buttonList[G].get("id") != I) {
                    F[F.length] = this._buttonList[G];
                }
            }
            this._buttonList = F;
        } else {
            return false;
        }
    }, destroy:function () {
        var E = this._configuredButtons.length, F, G;
        for (b = 0; b < E; b++) {
            this.destroyButton(this._configuredButtons[b]);
        }
        this._configuredButtons = null;
        this.get("element").innerHTML = "";
        this.get("element").className = "";
        for (G in this) {
            if (D.hasOwnProperty(this, G)) {
                this[G] = null;
            }
        }
        return true;
    }, collapse:function (F) {
        var E = C.getElementsByClassName("collapse", "span", this._titlebar);
        if (F === false) {
            C.removeClass(this.get("cont").parentNode, "yui-toolbar-container-collapsed");
            if (E[0]) {
                C.removeClass(E[0], "collapsed");
                E[0].title = this.STR_COLLAPSE;
            }
            this.fireEvent("toolbarExpanded", {type:"toolbarExpanded", target:this});
        } else {
            if (E[0]) {
                C.addClass(E[0], "collapsed");
                E[0].title = this.STR_EXPAND;
            }
            C.addClass(this.get("cont").parentNode, "yui-toolbar-container-collapsed");
            this.fireEvent("toolbarCollapsed", {type:"toolbarCollapsed", target:this});
        }
    }, toString:function () {
        return"Toolbar (#" + this.get("element").id + ") with " + this._buttonList.length + " buttons.";
    }});
})();
(function () {
    var C = YAHOO.util.Dom, A = YAHOO.util.Event, D = YAHOO.lang, B = YAHOO.widget.Toolbar;
    YAHOO.widget.SimpleEditor = function (H, M) {
        var G = {};
        if (D.isObject(H) && (!H.tagName) && !M) {
            D.augmentObject(G, H);
            H = document.createElement("textarea");
            this.DOMReady = true;
            if (G.container) {
                var K = C.get(G.container);
                K.appendChild(H);
            } else {
                document.body.appendChild(H);
            }
        } else {
            if (M) {
                D.augmentObject(G, M);
            }
        }
        var I = {element:null, attributes:G}, F = null;
        if (D.isString(H)) {
            F = H;
        } else {
            if (I.attributes.id) {
                F = I.attributes.id;
            } else {
                this.DOMReady = true;
                F = C.generateId(H);
            }
        }
        I.element = H;
        var J = document.createElement("DIV");
        I.attributes.element_cont = new YAHOO.util.Element(J, {id:F + "_container"});
        var E = document.createElement("div");
        C.addClass(E, "first-child");
        I.attributes.element_cont.appendChild(E);
        if (!I.attributes.toolbar_cont) {
            I.attributes.toolbar_cont = document.createElement("DIV");
            I.attributes.toolbar_cont.id = F + "_toolbar";
            E.appendChild(I.attributes.toolbar_cont);
        }
        var L = document.createElement("DIV");
        E.appendChild(L);
        I.attributes.editor_wrapper = L;
        YAHOO.widget.SimpleEditor.superclass.constructor.call(this, I.element, I.attributes);
    };
    YAHOO.extend(YAHOO.widget.SimpleEditor, YAHOO.util.Element, {_resizeConfig:{handles:["br"], autoRatio:true, status:true, proxy:true, useShim:true, setSize:false}, _setupResize:function () {
        if (!YAHOO.util.DD || !YAHOO.util.Resize) {
            return false;
        }
        if (this.get("resize")) {
            var E = {};
            D.augmentObject(E, this._resizeConfig);
            this.resize = new YAHOO.util.Resize(this.get("element_cont").get("element"), E);
            this.resize.on("resize", function (G) {
                var K = this.get("animate");
                this.set("animate", false);
                this.set("width", G.width + "px");
                var H = G.height, I = (this.toolbar.get("element").clientHeight + 2), J = 0;
                if (this.dompath) {
                    J = (this.dompath.clientHeight + 1);
                }
                var F = (H - I - J);
                this.set("height", F + "px");
                this.get("element_cont").setStyle("height", "");
                this.set("animate", K);
            }, this, true);
        }
    }, resize:null, _setupDD:function () {
        if (!YAHOO.util.DD) {
            return false;
        }
        if (this.get("drag")) {
            var F = this.get("drag"), E = YAHOO.util.DD;
            if (F === "proxy") {
                E = YAHOO.util.DDProxy;
            }
            this.dd = new E(this.get("element_cont").get("element"));
            this.toolbar.addClass("draggable");
            this.dd.setHandleElId(this.toolbar._titlebar);
        }
    }, dd:null, _lastCommand:null, _undoNodeChange:function () {
    }, _storeUndo:function () {
    }, _checkKey:function (E, H) {
        var F = false;
        if ((H.keyCode === E.key)) {
            if (E.mods && (E.mods.length > 0)) {
                var I = 0;
                for (var G = 0; G < E.mods.length; G++) {
                    if (this.browser.mac) {
                        if (E.mods[G] == "ctrl") {
                            E.mods[G] = "meta";
                        }
                    }
                    if (H[E.mods[G] + "Key"] === true) {
                        I++;
                    }
                }
                if (I === E.mods.length) {
                    F = true;
                }
            } else {
                F = true;
            }
        }
        return F;
    }, _keyMap:{SELECT_ALL:{key:65, mods:["ctrl"]}, CLOSE_WINDOW:{key:87, mods:["shift", "ctrl"]}, FOCUS_TOOLBAR:{key:27, mods:["shift"]}, FOCUS_AFTER:{key:27}, FONT_SIZE_UP:{key:38, mods:["shift", "ctrl"]}, FONT_SIZE_DOWN:{key:40, mods:["shift", "ctrl"]}, CREATE_LINK:{key:76, mods:["shift", "ctrl"]}, BOLD:{key:66, mods:["shift", "ctrl"]}, ITALIC:{key:73, mods:["shift", "ctrl"]}, UNDERLINE:{key:85, mods:["shift", "ctrl"]}, UNDO:{key:90, mods:["ctrl"]}, REDO:{key:90, mods:["shift", "ctrl"]}, JUSTIFY_LEFT:{key:219, mods:["shift", "ctrl"]}, JUSTIFY_CENTER:{key:220, mods:["shift", "ctrl"]}, JUSTIFY_RIGHT:{key:221, mods:["shift", "ctrl"]}}, _cleanClassName:function (E) {
        return E.replace(/ /g, "-").toLowerCase();
    }, _textarea:null, _docType:'<!DOCTYPE HTML PUBLIC "-/' + "/W3C/" + "/DTD HTML 4.01/" + '/EN" "http:/' + '/www.w3.org/TR/html4/strict.dtd">', editorDirty:null, _defaultCSS:"html { height: 95%; } body { padding: 7px; background-color: #fff; font: 13px/1.22 arial,helvetica,clean,sans-serif;*font-size:small;*font:x-small; } a, a:visited, a:hover { color: blue !important; text-decoration: underline !important; cursor: text !important; } .warning-localfile { border-bottom: 1px dashed red !important; } .yui-busy { cursor: wait !important; } img.selected { border: 2px dotted #808080; } img { cursor: pointer !important; border: none; } body.ptags.webkit div.yui-wk-p { margin: 11px 0; } body.ptags.webkit div.yui-wk-div { margin: 0; }", _defaultToolbar:null, _lastButton:null, _baseHREF:function () {
        var E = document.location.href;
        if (E.indexOf("?") !== -1) {
            E = E.substring(0, E.indexOf("?"));
        }
        E = E.substring(0, E.lastIndexOf("/")) + "/";
        return E;
    }(), _lastImage:null, _blankImageLoaded:null, _fixNodesTimer:null, _nodeChangeTimer:null, _nodeChangeDelayTimer:null, _lastNodeChangeEvent:null, _lastNodeChange:0, _rendered:null, DOMReady:null, _selection:null, _mask:null, _showingHiddenElements:null, currentWindow:null, currentEvent:null, operaEvent:null, currentFont:null, currentElement:null, dompath:null, beforeElement:null, afterElement:null, invalidHTML:{form:true, input:true, button:true, select:true, link:true, html:true, body:true, iframe:true, script:true, style:true, textarea:true}, toolbar:null, _contentTimer:null, _contentTimerMax:500, _contentTimerCounter:0, _disabled:["createlink", "fontname", "fontsize", "forecolor", "backcolor"], _alwaysDisabled:{undo:true, redo:true}, _alwaysEnabled:{}, _semantic:{"bold":true, "italic":true, "underline":true}, _tag2cmd:{"b":"bold", "strong":"bold", "i":"italic", "em":"italic", "u":"underline", "sup":"superscript", "sub":"subscript", "img":"insertimage", "a":"createlink", "ul":"insertunorderedlist", "ol":"insertorderedlist"}, _createIframe:function () {
        var I = document.createElement("iframe");
        I.id = this.get("id") + "_editor";
        var G = {border:"0", frameBorder:"0", marginWidth:"0", marginHeight:"0", leftMargin:"0", topMargin:"0", allowTransparency:"true", width:"100%"};
        if (this.get("autoHeight")) {
            G.scrolling = "no";
        }
        for (var H in G) {
            if (D.hasOwnProperty(G, H)) {
                I.setAttribute(H, G[H]);
            }
        }
        var F = "javascript:;";
        if (this.browser.ie) {
            F = "javascript:false;";
        }
        I.setAttribute("src", F);
        var E = new YAHOO.util.Element(I);
        E.setStyle("visibility", "hidden");
        return E;
    }, _isElement:function (F, E) {
        if (F && F.tagName && (F.tagName.toLowerCase() == E)) {
            return true;
        }
        if (F && F.getAttribute && (F.getAttribute("tag") == E)) {
            return true;
        }
        return false;
    }, _hasParent:function (F, E) {
        if (!F || !F.parentNode) {
            return false;
        }
        while (F.parentNode) {
            if (this._isElement(F, E)) {
                return F;
            }
            if (F.parentNode) {
                F = F.parentNode;
            } else {
                return false;
            }
        }
        return false;
    }, _getDoc:function () {
        var E = false;
        try {
            if (this.get("iframe").get("element").contentWindow.document) {
                E = this.get("iframe").get("element").contentWindow.document;
                return E;
            }
        } catch (F) {
            return false;
        }
    }, _getWindow:function () {
        return this.get("iframe").get("element").contentWindow;
    }, focus:function () {
        this._getWindow().focus();
    }, _focusWindow:function () {
        this.focus();
    }, _hasSelection:function () {
        var G = this._getSelection();
        var E = this._getRange();
        var F = false;
        if (!G || !E) {
            return F;
        }
        if (this.browser.ie || this.browser.opera) {
            if (E.text) {
                F = true;
            }
            if (E.html) {
                F = true;
            }
        } else {
            if (this.browser.webkit) {
                if (G + "" !== "") {
                    F = true;
                }
            } else {
                if (G && (G.toString() !== "") && (G !== undefined)) {
                    F = true;
                }
            }
        }
        return F;
    }, _getSelection:function () {
        var E = null;
        if (this._getDoc() && this._getWindow()) {
            if (this._getDoc().selection) {
                E = this._getDoc().selection;
            } else {
                E = this._getWindow().getSelection();
            }
            if (this.browser.webkit) {
                if (E.baseNode) {
                    this._selection = {};
                    this._selection.baseNode = E.baseNode;
                    this._selection.baseOffset = E.baseOffset;
                    this._selection.extentNode = E.extentNode;
                    this._selection.extentOffset = E.extentOffset;
                } else {
                    if (this._selection !== null) {
                        E = this._getWindow().getSelection();
                        E.setBaseAndExtent(this._selection.baseNode, this._selection.baseOffset, this._selection.extentNode, this._selection.extentOffset);
                        this._selection = null;
                    }
                }
            }
        }
        return E;
    }, _selectNode:function (F, I) {
        if (!F) {
            return false;
        }
        var G = this._getSelection(), E = null;
        if (this.browser.ie) {
            try {
                E = this._getDoc().body.createTextRange();
                E.moveToElementText(F);
                E.select();
            } catch (H) {
            }
        } else {
            if (this.browser.webkit) {
                if (I) {
                    G.setBaseAndExtent(F, 1, F, F.innerText.length);
                } else {
                    G.setBaseAndExtent(F, 0, F, F.innerText.length);
                }
            } else {
                if (this.browser.opera) {
                    G = this._getWindow().getSelection();
                    E = this._getDoc().createRange();
                    E.selectNode(F);
                    G.removeAllRanges();
                    G.addRange(E);
                } else {
                    E = this._getDoc().createRange();
                    E.selectNodeContents(F);
                    G.removeAllRanges();
                    G.addRange(E);
                }
            }
        }
        this.nodeChange();
    }, _getRange:function () {
        var E = this._getSelection();
        if (E === null) {
            return null;
        }
        if (this.browser.webkit && !E.getRangeAt) {
            var H = this._getDoc().createRange();
            try {
                H.setStart(E.anchorNode, E.anchorOffset);
                H.setEnd(E.focusNode, E.focusOffset);
            } catch (G) {
                H = this._getWindow().getSelection() + "";
            }
            return H;
        }
        if (this.browser.ie || this.browser.opera) {
            try {
                return E.createRange();
            } catch (F) {
                return null;
            }
        }
        if (E.rangeCount > 0) {
            return E.getRangeAt(0);
        }
        return null;
    }, _setDesignMode:function (E) {
        if (this.get("setDesignMode")) {
            try {
                this._getDoc().designMode = ((E.toLowerCase() == "off") ? "off" : "on");
            } catch (F) {
            }
        }
    }, _toggleDesignMode:function () {
        var F = this._getDoc().designMode, E = ((F.toLowerCase() == "on") ? "off" : "on");
        this._setDesignMode(E);
        return E;
    }, _focused:null, _handleFocus:function (E) {
        if (!this._focused) {
            this._focused = true;
            this.fireEvent("editorWindowFocus", {type:"editorWindowFocus", target:this});
        }
    }, _handleBlur:function (E) {
        if (this._focused) {
            this._focused = false;
            this.fireEvent("editorWindowBlur", {type:"editorWindowBlur", target:this});
        }
    }, _initEditorEvents:function () {
        var F = this._getDoc(), E = this._getWindow();
        A.on(F, "mouseup", this._handleMouseUp, this, true);
        A.on(F, "mousedown", this._handleMouseDown, this, true);
        A.on(F, "click", this._handleClick, this, true);
        A.on(F, "dblclick", this._handleDoubleClick, this, true);
        A.on(F, "keypress", this._handleKeyPress, this, true);
        A.on(F, "keyup", this._handleKeyUp, this, true);
        A.on(F, "keydown", this._handleKeyDown, this, true);
        A.on(E, "focus", this._handleFocus, this, true);
        A.on(E, "blur", this._handleBlur, this, true);
    }, _removeEditorEvents:function () {
        var F = this._getDoc(), E = this._getWindow();
        A.removeListener(F, "mouseup", this._handleMouseUp, this, true);
        A.removeListener(F, "mousedown", this._handleMouseDown, this, true);
        A.removeListener(F, "click", this._handleClick, this, true);
        A.removeListener(F, "dblclick", this._handleDoubleClick, this, true);
        A.removeListener(F, "keypress", this._handleKeyPress, this, true);
        A.removeListener(F, "keyup", this._handleKeyUp, this, true);
        A.removeListener(F, "keydown", this._handleKeyDown, this, true);
        A.removeListener(E, "focus", this._handleFocus, this, true);
        A.removeListener(E, "blur", this._handleBlur, this, true);
    }, _fixWebkitDivs:function () {
        if (this.browser.webkit) {
            var E = this._getDoc().body.getElementsByTagName("div");
            C.addClass(E, "yui-wk-div");
        }
    }, _initEditor:function (F) {
        if (this._editorInit) {
            return;
        }
        this._editorInit = true;
        if (this.browser.ie) {
            this._getDoc().body.style.margin = "0";
        }
        if (!this.get("disabled")) {
            this._setDesignMode("on");
            this._contentTimerCounter = 0;
        }
        if (!this._getDoc().body) {
            this._contentTimerCounter = 0;
            this._editorInit = false;
            this._checkLoaded();
            return false;
        }
        if (!F) {
            this.toolbar.on("buttonClick", this._handleToolbarClick, this, true);
        }
        if (!this.get("disabled")) {
            this._initEditorEvents();
            this.toolbar.set("disabled", false);
        }
        if (F) {
            this.fireEvent("editorContentReloaded", {type:"editorreloaded", target:this});
        } else {
            this.fireEvent("editorContentLoaded", {type:"editorLoaded", target:this});
        }
        this._fixWebkitDivs();
        if (this.get("dompath")) {
            var E = this;
            setTimeout(function () {
                E._writeDomPath.call(E);
                E._setupResize.call(E);
            }, 150);
        }
        var H = [];
        for (var G in this.browser) {
            if (this.browser[G]) {
                H.push(G);
            }
        }
        if (this.get("ptags")) {
            H.push("ptags");
        }
        C.addClass(this._getDoc().body, H.join(" "));
        this.nodeChange(true);
    }, _checkLoaded:function (F) {
        this._editorInit = false;
        this._contentTimerCounter++;
        if (this._contentTimer) {
            clearTimeout(this._contentTimer);
        }
        if (this._contentTimerCounter > this._contentTimerMax) {
            return false;
        }
        var H = false;
        try {
            if (this._getDoc() && this._getDoc().body) {
                if (this.browser.ie) {
                    if (this._getDoc().body.readyState == "complete") {
                        H = true;
                    }
                } else {
                    if (this._getDoc().body._rteLoaded === true) {
                        H = true;
                    }
                }
            }
        } catch (G) {
            H = false;
        }
        if (H === true) {
            this._initEditor(F);
        } else {
            var E = this;
            this._contentTimer = setTimeout(function () {
                E._checkLoaded.call(E, F);
            }, 20);
        }
    }, _setInitialContent:function (F) {
        var I = ((this._textarea) ? this.get("element").value : this.get("element").innerHTML), K = null;
        if (I === "") {
            I = "<br>";
        }
        var G = D.substitute(this.get("html"), {TITLE:this.STR_TITLE, CONTENT:this._cleanIncomingHTML(I), CSS:this.get("css"), HIDDEN_CSS:((this.get("hiddencss")) ? this.get("hiddencss") : "/* No Hidden CSS */"), EXTRA_CSS:((this.get("extracss")) ? this.get("extracss") : "/* No Extra CSS */")}), E = true;
        G = G.replace(/RIGHT_BRACKET/gi, "{");
        G = G.replace(/LEFT_BRACKET/gi, "}");
        if (document.compatMode != "BackCompat") {
            G = this._docType + "\n" + G;
        } else {
        }
        if (this.browser.ie || this.browser.webkit || this.browser.opera || (navigator.userAgent.indexOf("Firefox/1.5") != -1)) {
            try {
                if (this.browser.air) {
                    K = this._getDoc().implementation.createHTMLDocument();
                    var L = this._getDoc();
                    L.open();
                    L.close();
                    K.open();
                    K.write(G);
                    K.close();
                    var H = L.importNode(K.getElementsByTagName("html")[0], true);
                    L.replaceChild(H, L.getElementsByTagName("html")[0]);
                    L.body._rteLoaded = true;
                } else {
                    K = this._getDoc();
                    K.open();
                    K.write(G);
                    K.close();
                }
            } catch (J) {
                E = false;
            }
        } else {
            this.get("iframe").get("element").src = "data:text/html;charset=utf-8," + encodeURIComponent(G);
        }
        this.get("iframe").setStyle("visibility", "");
        if (E) {
            this._checkLoaded(F);
        }
    }, _setMarkupType:function (E) {
        switch (this.get("markup")) {
            case"css":
                this._setEditorStyle(true);
                break;
            case"default":
                this._setEditorStyle(false);
                break;
            case"semantic":
            case"xhtml":
                if (this._semantic[E]) {
                    this._setEditorStyle(false);
                } else {
                    this._setEditorStyle(true);
                }
                break;
        }
    }, _setEditorStyle:function (F) {
        try {
            this._getDoc().execCommand("useCSS", false, !F);
        } catch (E) {
        }
    }, _getSelectedElement:function () {
        var J = this._getDoc(), G = null, H = null, K = null, F = true;
        if (this.browser.ie) {
            this.currentEvent = this._getWindow().event;
            G = this._getRange();
            if (G) {
                K = G.item ? G.item(0) : G.parentElement();
                if (this._hasSelection()) {
                }
                if (K === J.body) {
                    K = null;
                }
            }
            if ((this.currentEvent !== null) && (this.currentEvent.keyCode === 0)) {
                K = A.getTarget(this.currentEvent);
            }
        } else {
            H = this._getSelection();
            G = this._getRange();
            if (!H || !G) {
                return null;
            }
            if (!this._hasSelection() && this.browser.webkit3) {
            }
            if (this.browser.gecko) {
                if (G.startContainer) {
                    if (G.startContainer.nodeType === 3) {
                        K = G.startContainer.parentNode;
                    } else {
                        if (G.startContainer.nodeType === 1) {
                            K = G.startContainer;
                        }
                    }
                    if (this.currentEvent) {
                        var E = A.getTarget(this.currentEvent);
                        if (!this._isElement(E, "html")) {
                            if (K !== E) {
                                K = E;
                            }
                        }
                    }
                }
            }
            if (F) {
                if (H.anchorNode && (H.anchorNode.nodeType == 3)) {
                    if (H.anchorNode.parentNode) {
                        K = H.anchorNode.parentNode;
                    }
                    if (H.anchorNode.nextSibling != H.focusNode.nextSibling) {
                        K = H.anchorNode.nextSibling;
                    }
                }
                if (this._isElement(K, "br")) {
                    K = null;
                }
                if (!K) {
                    K = G.commonAncestorContainer;
                    if (!G.collapsed) {
                        if (G.startContainer == G.endContainer) {
                            if (G.startOffset - G.endOffset < 2) {
                                if (G.startContainer.hasChildNodes()) {
                                    K = G.startContainer.childNodes[G.startOffset];
                                }
                            }
                        }
                    }
                }
            }
        }
        if (this.currentEvent !== null) {
            try {
                switch (this.currentEvent.type) {
                    case"click":
                    case"mousedown":
                    case"mouseup":
                        if (this.browser.webkit) {
                            K = A.getTarget(this.currentEvent);
                        }
                        break;
                    default:
                        break;
                }
            } catch (I) {
            }
        } else {
            if ((this.currentElement && this.currentElement[0]) && (!this.browser.ie)) {
            }
        }
        if (this.browser.opera || this.browser.webkit) {
            if (this.currentEvent && !K) {
                K = YAHOO.util.Event.getTarget(this.currentEvent);
            }
        }
        if (!K || !K.tagName) {
            K = J.body;
        }
        if (this._isElement(K, "html")) {
            K = J.body;
        }
        if (this._isElement(K, "body")) {
            K = J.body;
        }
        if (K && !K.parentNode) {
            K = J.body;
        }
        if (K === undefined) {
            K = null;
        }
        return K;
    }, _getDomPath:function (E) {
        if (!E) {
            E = this._getSelectedElement();
        }
        var F = [];
        while (E !== null) {
            if (E.ownerDocument != this._getDoc()) {
                E = null;
                break;
            }
            if (E.nodeName && E.nodeType && (E.nodeType == 1)) {
                F[F.length] = E;
            }
            if (this._isElement(E, "body")) {
                break;
            }
            E = E.parentNode;
        }
        if (F.length === 0) {
            if (this._getDoc() && this._getDoc().body) {
                F[0] = this._getDoc().body;
            }
        }
        return F.reverse();
    }, _writeDomPath:function () {
        var K = this._getDomPath(), I = [], G = "", L = "";
        for (var E = 0; E < K.length; E++) {
            var M = K[E].tagName.toLowerCase();
            if ((M == "ol") && (K[E].type)) {
                M += ":" + K[E].type;
            }
            if (C.hasClass(K[E], "yui-tag")) {
                M = K[E].getAttribute("tag");
            }
            if ((this.get("markup") == "semantic") || (this.get("markup") == "xhtml")) {
                switch (M) {
                    case"b":
                        M = "strong";
                        break;
                    case"i":
                        M = "em";
                        break;
                }
            }
            if (!C.hasClass(K[E], "yui-non")) {
                if (C.hasClass(K[E], "yui-tag")) {
                    L = M;
                } else {
                    G = ((K[E].className !== "") ? "." + K[E].className.replace(/ /g, ".") : "");
                    if ((G.indexOf("yui") != -1) || (G.toLowerCase().indexOf("apple-style-span") != -1)) {
                        G = "";
                    }
                    L = M + ((K[E].id) ? "#" + K[E].id : "") + G;
                }
                switch (M) {
                    case"body":
                        L = "body";
                        break;
                    case"a":
                        if (K[E].getAttribute("href", 2)) {
                            L += ":" + K[E].getAttribute("href", 2).replace("mailto:", "").replace("http:/" + "/", "").replace("https:/" + "/", "");
                        }
                        break;
                    case"img":
                        var F = K[E].height;
                        var J = K[E].width;
                        if (K[E].style.height) {
                            F = parseInt(K[E].style.height, 10);
                        }
                        if (K[E].style.width) {
                            J = parseInt(K[E].style.width, 10);
                        }
                        L += "(" + J + "x" + F + ")";
                        break;
                }
                if (L.length > 10) {
                    L = '<span title="' + L + '">' + L.substring(0, 10) + "..." + "</span>";
                } else {
                    L = '<span title="' + L + '">' + L + "</span>";
                }
                I[I.length] = L;
            }
        }
        var H = I.join(" " + this.SEP_DOMPATH + " ");
        if (this.dompath.innerHTML != H) {
            this.dompath.innerHTML = H;
        }
    }, _fixNodes:function () {
        try {
            var K = this._getDoc(), H = [];
            for (var E in this.invalidHTML) {
                if (YAHOO.lang.hasOwnProperty(this.invalidHTML, E)) {
                    if (E.toLowerCase() != "span") {
                        var F = K.body.getElementsByTagName(E);
                        if (F.length) {
                            for (var G = 0; G < F.length; G++) {
                                H.push(F[G]);
                            }
                        }
                    }
                }
            }
            for (var I = 0; I < H.length; I++) {
                if (H[I].parentNode) {
                    if (D.isObject(this.invalidHTML[H[I].tagName.toLowerCase()]) && this.invalidHTML[H[I].tagName.toLowerCase()].keepContents) {
                        this._swapEl(H[I], "span", function (M) {
                            M.className = "yui-non";
                        });
                    } else {
                        H[I].parentNode.removeChild(H[I]);
                    }
                }
            }
            var L = this._getDoc().getElementsByTagName("img");
            C.addClass(L, "yui-img");
        } catch (J) {
        }
    }, _isNonEditable:function (G) {
        if (this.get("allowNoEdit")) {
            var F = A.getTarget(G);
            if (this._isElement(F, "html")) {
                F = null;
            }
            var J = this._getDomPath(F);
            for (var E = (J.length - 1); E > -1; E--) {
                if (C.hasClass(J[E], this.CLASS_NOEDIT)) {
                    try {
                        this._getDoc().execCommand("enableObjectResizing", false, "false");
                    } catch (I) {
                    }
                    this.nodeChange();
                    A.stopEvent(G);
                    return true;
                }
            }
            try {
                this._getDoc().execCommand("enableObjectResizing", false, "true");
            } catch (H) {
            }
        }
        return false;
    }, _setCurrentEvent:function (E) {
        this.currentEvent = E;
    }, _handleClick:function (G) {
        var F = this.fireEvent("beforeEditorClick", {type:"beforeEditorClick", target:this, ev:G});
        if (F === false) {
            return false;
        }
        if (this._isNonEditable(G)) {
            return false;
        }
        this._setCurrentEvent(G);
        if (this.currentWindow) {
            this.closeWindow();
        }
        if (this.currentWindow) {
            this.closeWindow();
        }
        if (this.browser.webkit) {
            var E = A.getTarget(G);
            if (this._isElement(E, "a") || this._isElement(E.parentNode, "a")) {
                A.stopEvent(G);
                this.nodeChange();
            }
        } else {
            this.nodeChange();
        }
        this.fireEvent("editorClick", {type:"editorClick", target:this, ev:G});
    }, _handleMouseUp:function (G) {
        var F = this.fireEvent("beforeEditorMouseUp", {type:"beforeEditorMouseUp", target:this, ev:G});
        if (F === false) {
            return false;
        }
        if (this._isNonEditable(G)) {
            return false;
        }
        var E = this;
        if (this.browser.opera) {
            var H = A.getTarget(G);
            if (this._isElement(H, "img")) {
                this.nodeChange();
                if (this.operaEvent) {
                    clearTimeout(this.operaEvent);
                    this.operaEvent = null;
                    this._handleDoubleClick(G);
                } else {
                    this.operaEvent = window.setTimeout(function () {
                        E.operaEvent = false;
                    }, 700);
                }
            }
        }
        if (this.browser.webkit || this.browser.opera) {
            if (this.browser.webkit) {
                A.stopEvent(G);
            }
        }
        this.nodeChange();
        this.fireEvent("editorMouseUp", {type:"editorMouseUp", target:this, ev:G});
    }, _handleMouseDown:function (F) {
        var E = this.fireEvent("beforeEditorMouseDown", {type:"beforeEditorMouseDown", target:this, ev:F});
        if (E === false) {
            return false;
        }
        if (this._isNonEditable(F)) {
            return false;
        }
        this._setCurrentEvent(F);
        var G = A.getTarget(F);
        if (this.browser.webkit && this._hasSelection()) {
            var H = this._getSelection();
            if (!this.browser.webkit3) {
                H.collapse(true);
            } else {
                H.collapseToStart();
            }
        }
        if (this.browser.webkit && this._lastImage) {
            C.removeClass(this._lastImage, "selected");
            this._lastImage = null;
        }
        if (this._isElement(G, "img") || this._isElement(G, "a")) {
            if (this.browser.webkit) {
                A.stopEvent(F);
                if (this._isElement(G, "img")) {
                    C.addClass(G, "selected");
                    this._lastImage = G;
                }
            }
            if (this.currentWindow) {
                this.closeWindow();
            }
            this.nodeChange();
        }
        this.fireEvent("editorMouseDown", {type:"editorMouseDown", target:this, ev:F});
    }, _handleDoubleClick:function (F) {
        var E = this.fireEvent("beforeEditorDoubleClick", {type:"beforeEditorDoubleClick", target:this, ev:F});
        if (E === false) {
            return false;
        }
        if (this._isNonEditable(F)) {
            return false;
        }
        this._setCurrentEvent(F);
        var G = A.getTarget(F);
        if (this._isElement(G, "img")) {
            this.currentElement[0] = G;
            this.toolbar.fireEvent("insertimageClick", {type:"insertimageClick", target:this.toolbar});
            this.fireEvent("afterExecCommand", {type:"afterExecCommand", target:this});
        } else {
            if (this._hasParent(G, "a")) {
                this.currentElement[0] = this._hasParent(G, "a");
                this.toolbar.fireEvent("createlinkClick", {type:"createlinkClick", target:this.toolbar});
                this.fireEvent("afterExecCommand", {type:"afterExecCommand", target:this});
            }
        }
        this.nodeChange();
        this.fireEvent("editorDoubleClick", {type:"editorDoubleClick", target:this, ev:F});
    }, _handleKeyUp:function (G) {
        var F = this.fireEvent("beforeEditorKeyUp", {type:"beforeEditorKeyUp", target:this, ev:G});
        if (F === false) {
            return false;
        }
        if (this._isNonEditable(G)) {
            return false;
        }
        this._storeUndo();
        this._setCurrentEvent(G);
        switch (G.keyCode) {
            case this._keyMap.SELECT_ALL.key:
                if (this._checkKey(this._keyMap.SELECT_ALL, G)) {
                    this.nodeChange();
                }
                break;
            case 32:
            case 35:
            case 36:
            case 37:
            case 38:
            case 39:
            case 40:
            case 46:
            case 8:
            case this._keyMap.CLOSE_WINDOW.key:
                if ((G.keyCode == this._keyMap.CLOSE_WINDOW.key) && this.currentWindow) {
                    if (this._checkKey(this._keyMap.CLOSE_WINDOW, G)) {
                        this.closeWindow();
                    }
                } else {
                    if (!this.browser.ie) {
                        if (this._nodeChangeTimer) {
                            clearTimeout(this._nodeChangeTimer);
                        }
                        var E = this;
                        this._nodeChangeTimer = setTimeout(function () {
                            E._nodeChangeTimer = null;
                            E.nodeChange.call(E);
                        }, 100);
                    } else {
                        this.nodeChange();
                    }
                    this.editorDirty = true;
                }
                break;
        }
        this.fireEvent("editorKeyUp", {type:"editorKeyUp", target:this, ev:G});
    }, _handleKeyPress:function (G) {
        var F = this.fireEvent("beforeEditorKeyPress", {type:"beforeEditorKeyPress", target:this, ev:G});
        if (F === false) {
            return false;
        }
        if (this.get("allowNoEdit")) {
            if (G && G.keyCode && (G.keyCode == 63272)) {
                A.stopEvent(G);
            }
        }
        if (this._isNonEditable(G)) {
            return false;
        }
        this._setCurrentEvent(G);
        this._storeUndo();
        if (this.browser.opera) {
            if (G.keyCode === 13) {
                var E = this._getSelectedElement();
                if (!this._isElement(E, "li")) {
                    this.execCommand("inserthtml", "<br>");
                    A.stopEvent(G);
                }
            }
        }
        if (this.browser.webkit) {
            if (!this.browser.webkit3) {
                if (G.keyCode && (G.keyCode == 122) && (G.metaKey)) {
                    if (this._hasParent(this._getSelectedElement(), "li")) {
                        A.stopEvent(G);
                    }
                }
            }
            this._listFix(G);
        }
        this._fixListDupIds();
        this.fireEvent("editorKeyPress", {type:"editorKeyPress", target:this, ev:G});
    }, _handleKeyDown:function (X) {
        var Z = this.fireEvent("beforeEditorKeyDown", {type:"beforeEditorKeyDown", target:this, ev:X});
        if (Z === false) {
            return false;
        }
        var U = null, E = null;
        if (this._isNonEditable(X)) {
            return false;
        }
        this._setCurrentEvent(X);
        if (this.currentWindow) {
            this.closeWindow();
        }
        if (this.currentWindow) {
            this.closeWindow();
        }
        var N = false, S = null, P = null, R = false;
        switch (X.keyCode) {
            case this._keyMap.FOCUS_TOOLBAR.key:
                if (this._checkKey(this._keyMap.FOCUS_TOOLBAR, X)) {
                    var W = this.toolbar.getElementsByTagName("h2")[0];
                    if (W && W.firstChild) {
                        W.firstChild.focus();
                    }
                } else {
                    if (this._checkKey(this._keyMap.FOCUS_AFTER, X)) {
                        this.afterElement.focus();
                    }
                }
                A.stopEvent(X);
                N = false;
                break;
            case this._keyMap.CREATE_LINK.key:
                if (this._hasSelection()) {
                    if (this._checkKey(this._keyMap.CREATE_LINK, X)) {
                        var F = true;
                        if (this.get("limitCommands")) {
                            if (!this.toolbar.getButtonByValue("createlink")) {
                                F = false;
                            }
                        }
                        if (F) {
                            this.execCommand("createlink", "");
                            this.toolbar.fireEvent("createlinkClick", {type:"createlinkClick", target:this.toolbar});
                            this.fireEvent("afterExecCommand", {type:"afterExecCommand", target:this});
                            N = false;
                        }
                    }
                }
                break;
            case this._keyMap.UNDO.key:
            case this._keyMap.REDO.key:
                if (this._checkKey(this._keyMap.REDO, X)) {
                    S = "redo";
                    N = true;
                } else {
                    if (this._checkKey(this._keyMap.UNDO, X)) {
                        S = "undo";
                        N = true;
                    }
                }
                break;
            case this._keyMap.BOLD.key:
                if (this._checkKey(this._keyMap.BOLD, X)) {
                    S = "bold";
                    N = true;
                }
                break;
            case this._keyMap.FONT_SIZE_UP.key:
            case this._keyMap.FONT_SIZE_DOWN.key:
                var K = false, T = false;
                if (this._checkKey(this._keyMap.FONT_SIZE_UP, X)) {
                    K = true;
                }
                if (this._checkKey(this._keyMap.FONT_SIZE_DOWN, X)) {
                    T = true;
                }
                if (K || T) {
                    var H = this.toolbar.getButtonByValue("fontsize"), G = parseInt(H.get("label"), 10), I = (G + 1);
                    if (T) {
                        I = (G - 1);
                    }
                    S = "fontsize";
                    P = I + "px";
                    N = true;
                }
                break;
            case this._keyMap.ITALIC.key:
                if (this._checkKey(this._keyMap.ITALIC, X)) {
                    S = "italic";
                    N = true;
                }
                break;
            case this._keyMap.UNDERLINE.key:
                if (this._checkKey(this._keyMap.UNDERLINE, X)) {
                    S = "underline";
                    N = true;
                }
                break;
            case 9:
                if (this.browser.ie) {
                    E = this._getRange();
                    U = this._getSelectedElement();
                    if (!this._isElement(U, "li")) {
                        if (E) {
                            E.pasteHTML("&nbsp;&nbsp;&nbsp;&nbsp;");
                            E.collapse(false);
                            E.select();
                        }
                        A.stopEvent(X);
                    }
                }
                if (this.browser.gecko > 1.8) {
                    U = this._getSelectedElement();
                    if (this._isElement(U, "li")) {
                        if (X.shiftKey) {
                            this._getDoc().execCommand("outdent", null, "");
                        } else {
                            this._getDoc().execCommand("indent", null, "");
                        }
                    } else {
                        if (!this._hasSelection()) {
                            this.execCommand("inserthtml", "&nbsp;&nbsp;&nbsp;&nbsp;");
                        }
                    }
                    A.stopEvent(X);
                }
                break;
            case 13:
                var M = null, V = 0;
                if (this.get("ptags") && !X.shiftKey) {
                    if (this.browser.gecko) {
                        U = this._getSelectedElement();
                        if (!this._hasParent(U, "li")) {
                            if (this._hasParent(U, "p")) {
                                M = this._getDoc().createElement("p");
                                M.innerHTML = "&nbsp;";
                                C.insertAfter(M, U);
                                this._selectNode(M.firstChild);
                            } else {
                                if (this._isElement(U, "body")) {
                                    this.execCommand("insertparagraph", null);
                                    var O = this._getDoc().body.getElementsByTagName("p");
                                    for (V = 0; V < O.length; V++) {
                                        if (O[V].getAttribute("_moz_dirty") !== null) {
                                            M = this._getDoc().createElement("p");
                                            M.innerHTML = "&nbsp;";
                                            C.insertAfter(M, O[V]);
                                            this._selectNode(M.firstChild);
                                            O[V].removeAttribute("_moz_dirty");
                                        }
                                    }
                                } else {
                                    N = true;
                                    S = "insertparagraph";
                                }
                            }
                            A.stopEvent(X);
                        }
                    }
                    if (this.browser.webkit) {
                        U = this._getSelectedElement();
                        if (!this._hasParent(U, "li")) {
                            this.execCommand("insertparagraph", null);
                            var Q = this._getDoc().body.getElementsByTagName("div");
                            for (V = 0; V < Q.length; V++) {
                                if (!C.hasClass(Q[V], "yui-wk-div")) {
                                    C.addClass(Q[V], "yui-wk-p");
                                }
                            }
                            A.stopEvent(X);
                        }
                    }
                } else {
                    if (this.browser.webkit) {
                        U = this._getSelectedElement();
                        if (!this._hasParent(U, "li")) {
                            if (this.browser.webkit4) {
                                this.execCommand("insertlinebreak");
                            } else {
                                this.execCommand("inserthtml", '<var id="yui-br"></var>');
                                var L = this._getDoc().getElementById("yui-br"), Y = this._getDoc().createElement("br"), J = this._getDoc().createElement("span");
                                L.parentNode.replaceChild(Y, L);
                                J.className = "yui-non";
                                J.innerHTML = "&nbsp;";
                                C.insertAfter(J, Y);
                                this._selectNode(J);
                            }
                            A.stopEvent(X);
                        }
                    }
                    if (this.browser.ie) {
                        E = this._getRange();
                        U = this._getSelectedElement();
                        if (!this._isElement(U, "li")) {
                            if (E) {
                                E.pasteHTML("<br>");
                                E.collapse(false);
                                E.select();
                            }
                            A.stopEvent(X);
                        }
                    }
                }
                break;
        }
        if (this.browser.ie) {
            this._listFix(X);
        }
        if (N && S) {
            this.execCommand(S, P);
            A.stopEvent(X);
            this.nodeChange();
        }
        this._storeUndo();
        this.fireEvent("editorKeyDown", {type:"editorKeyDown", target:this, ev:X});
    }, _fixListRunning:null, _fixListDupIds:function () {
        if (this._fixListRunning) {
            return false;
        }
        if (this._getDoc()) {
            this._fixListRunning = true;
            var E = this._getDoc().body.getElementsByTagName("li"), F = 0, G = {};
            for (F = 0; F < E.length; F++) {
                if (E[F].id) {
                    if (G[E[F].id]) {
                        E[F].id = "";
                    }
                    G[E[F].id] = true;
                }
            }
            this._fixListRunning = false;
        }
    }, _listFix:function (K) {
        var M = null, I = null, E = false, G = null;
        if (this.browser.webkit) {
            if (K.keyCode && (K.keyCode == 13)) {
                if (this._hasParent(this._getSelectedElement(), "li")) {
                    var H = this._hasParent(this._getSelectedElement(), "li");
                    if (H.previousSibling) {
                        if (H.firstChild && (H.firstChild.length == 1)) {
                            this._selectNode(H);
                        }
                    }
                }
            }
        }
        if (K.keyCode && ((!this.browser.webkit3 && (K.keyCode == 25)) || ((this.browser.webkit3 || !this.browser.webkit) && ((K.keyCode == 9) && K.shiftKey)))) {
            M = this._getSelectedElement();
            if (this._hasParent(M, "li")) {
                M = this._hasParent(M, "li");
                if (this._hasParent(M, "ul") || this._hasParent(M, "ol")) {
                    I = this._hasParent(M, "ul");
                    if (!I) {
                        I = this._hasParent(M, "ol");
                    }
                    if (this._isElement(I.previousSibling, "li")) {
                        I.removeChild(M);
                        I.parentNode.insertBefore(M, I.nextSibling);
                        if (this.browser.ie) {
                            G = this._getDoc().body.createTextRange();
                            G.moveToElementText(M);
                            G.collapse(false);
                            G.select();
                        }
                        if (this.browser.webkit) {
                            this._selectNode(M.firstChild);
                        }
                        A.stopEvent(K);
                    }
                }
            }
        }
        if (K.keyCode && ((K.keyCode == 9) && (!K.shiftKey))) {
            var F = this._getSelectedElement();
            if (this._hasParent(F, "li")) {
                E = this._hasParent(F, "li").innerHTML;
            }
            if (this.browser.webkit) {
                this._getDoc().execCommand("inserttext", false, "\t");
            }
            M = this._getSelectedElement();
            if (this._hasParent(M, "li")) {
                I = this._hasParent(M, "li");
                var J = this._getDoc().createElement(I.parentNode.tagName.toLowerCase());
                if (this.browser.webkit) {
                    var L = C.getElementsByClassName("Apple-tab-span", "span", I);
                    if (L[0]) {
                        I.removeChild(L[0]);
                        I.innerHTML = D.trim(I.innerHTML);
                        if (E) {
                            I.innerHTML = '<span class="yui-non">' + E + "</span>&nbsp;";
                        } else {
                            I.innerHTML = '<span class="yui-non">&nbsp;</span>&nbsp;';
                        }
                    }
                } else {
                    if (E) {
                        I.innerHTML = E + "&nbsp;";
                    } else {
                        I.innerHTML = "&nbsp;";
                    }
                }
                I.parentNode.replaceChild(J, I);
                J.appendChild(I);
                if (this.browser.webkit) {
                    this._getSelection().setBaseAndExtent(I.firstChild, 1, I.firstChild, I.firstChild.innerText.length);
                    if (!this.browser.webkit3) {
                        I.parentNode.parentNode.style.display = "list-item";
                        setTimeout(function () {
                            I.parentNode.parentNode.style.display = "block";
                        }, 1);
                    }
                } else {
                    if (this.browser.ie) {
                        G = this._getDoc().body.createTextRange();
                        G.moveToElementText(I);
                        G.collapse(false);
                        G.select();
                    } else {
                        this._selectNode(I);
                    }
                }
                A.stopEvent(K);
            }
            if (this.browser.webkit) {
                A.stopEvent(K);
            }
            this.nodeChange();
        }
    }, nodeChange:function (E) {
        var F = this;
        this._storeUndo();
        if (this.get("nodeChangeDelay")) {
            this._nodeChangeDelayTimer = window.setTimeout(function () {
                F._nodeChangeDelayTimer = null;
                F._nodeChange.apply(F, arguments);
            }, 0);
        } else {
            this._nodeChange();
        }
    }, _nodeChange:function (F) {
        var H = parseInt(this.get("nodeChangeThreshold"), 10), O = Math.round(new Date().getTime() / 1000), R = this;
        if (F === true) {
            this._lastNodeChange = 0;
        }
        if ((this._lastNodeChange + H) < O) {
            if (this._fixNodesTimer === null) {
                this._fixNodesTimer = window.setTimeout(function () {
                    R._fixNodes.call(R);
                    R._fixNodesTimer = null;
                }, 0);
            }
        }
        this._lastNodeChange = O;
        if (this.currentEvent) {
            try {
                this._lastNodeChangeEvent = this.currentEvent.type;
            } catch (a) {
            }
        }
        var Z = this.fireEvent("beforeNodeChange", {type:"beforeNodeChange", target:this});
        if (Z === false) {
            return false;
        }
        if (this.get("dompath")) {
            window.setTimeout(function () {
                R._writeDomPath.call(R);
            }, 0);
        }
        if (!this.get("disabled")) {
            if (this.STOP_NODE_CHANGE) {
                this.STOP_NODE_CHANGE = false;
                return false;
            } else {
                var T = this._getSelection(), Q = this._getRange(), E = this._getSelectedElement(), M = this.toolbar.getButtonByValue("fontname"), L = this.toolbar.getButtonByValue("fontsize"), J = this.toolbar.getButtonByValue("undo"), G = this.toolbar.getButtonByValue("redo");
                var N = {};
                if (this._lastButton) {
                    N[this._lastButton.id] = true;
                }
                if (!this._isElement(E, "body")) {
                    if (M) {
                        N[M.get("id")] = true;
                    }
                    if (L) {
                        N[L.get("id")] = true;
                    }
                }
                if (G) {
                    delete N[G.get("id")];
                }
                this.toolbar.resetAllButtons(N);
                for (var c = 0; c < this._disabled.length; c++) {
                    var P = this.toolbar.getButtonByValue(this._disabled[c]);
                    if (P && P.get) {
                        if (this._lastButton && (P.get("id") === this._lastButton.id)) {
                        } else {
                            if (!this._hasSelection() && !this.get("insert")) {
                                switch (this._disabled[c]) {
                                    case"fontname":
                                    case"fontsize":
                                        break;
                                    default:
                                        this.toolbar.disableButton(P);
                                }
                            } else {
                                if (!this._alwaysDisabled[this._disabled[c]]) {
                                    this.toolbar.enableButton(P);
                                }
                            }
                            if (!this._alwaysEnabled[this._disabled[c]]) {
                                this.toolbar.deselectButton(P);
                            }
                        }
                    }
                }
                var S = this._getDomPath();
                var f = null, W = null;
                for (var X = 0; X < S.length; X++) {
                    f = S[X].tagName.toLowerCase();
                    if (S[X].getAttribute("tag")) {
                        f = S[X].getAttribute("tag").toLowerCase();
                    }
                    W = this._tag2cmd[f];
                    if (W === undefined) {
                        W = [];
                    }
                    if (!D.isArray(W)) {
                        W = [W];
                    }
                    if (S[X].style.fontWeight.toLowerCase() == "bold") {
                        W[W.length] = "bold";
                    }
                    if (S[X].style.fontStyle.toLowerCase() == "italic") {
                        W[W.length] = "italic";
                    }
                    if (S[X].style.textDecoration.toLowerCase() == "underline") {
                        W[W.length] = "underline";
                    }
                    if (S[X].style.textDecoration.toLowerCase() == "line-through") {
                        W[W.length] = "strikethrough";
                    }
                    if (W.length > 0) {
                        for (var V = 0; V < W.length; V++) {
                            this.toolbar.selectButton(W[V]);
                            this.toolbar.enableButton(W[V]);
                        }
                    }
                    switch (S[X].style.textAlign.toLowerCase()) {
                        case"left":
                        case"right":
                        case"center":
                        case"justify":
                            var U = S[X].style.textAlign.toLowerCase();
                            if (S[X].style.textAlign.toLowerCase() == "justify") {
                                U = "full";
                            }
                            this.toolbar.selectButton("justify" + U);
                            this.toolbar.enableButton("justify" + U);
                            break;
                    }
                }
                if (M) {
                    var Y = M._configs.label._initialConfig.value;
                    M.set("label", '<span class="yui-toolbar-fontname-' + this._cleanClassName(Y) + '">' + Y + "</span>");
                    this._updateMenuChecked("fontname", Y);
                }
                if (L) {
                    L.set("label", L._configs.label._initialConfig.value);
                }
                var K = this.toolbar.getButtonByValue("heading");
                if (K) {
                    K.set("label", K._configs.label._initialConfig.value);
                    this._updateMenuChecked("heading", "none");
                }
                var I = this.toolbar.getButtonByValue("insertimage");
                if (I && this.currentWindow && (this.currentWindow.name == "insertimage")) {
                    this.toolbar.disableButton(I);
                }
                if (this._lastButton && this._lastButton.isSelected) {
                    this.toolbar.deselectButton(this._lastButton.id);
                }
                this._undoNodeChange();
            }
        }
        this.fireEvent("afterNodeChange", {type:"afterNodeChange", target:this});
    }, _updateMenuChecked:function (E, F, H) {
        if (!H) {
            H = this.toolbar;
        }
        var G = H.getButtonByValue(E);
        G.checkValue(F);
    }, _handleToolbarClick:function (F) {
        var H = "";
        var I = "";
        var G = F.button.value;
        if (F.button.menucmd) {
            H = G;
            G = F.button.menucmd;
        }
        this._lastButton = F.button;
        if (this.STOP_EXEC_COMMAND) {
            this.STOP_EXEC_COMMAND = false;
            return false;
        } else {
            this.execCommand(G, H);
            if (!this.browser.webkit) {
                var E = this;
                setTimeout(function () {
                    E.focus.call(E);
                }, 5);
            }
        }
        A.stopEvent(F);
    }, _setupAfterElement:function () {
        if (!this.beforeElement) {
            this.beforeElement = document.createElement("h2");
            this.beforeElement.className = "yui-editor-skipheader";
            this.beforeElement.tabIndex = "-1";
            this.beforeElement.innerHTML = this.STR_BEFORE_EDITOR;
            this.get("element_cont").get("firstChild").insertBefore(this.beforeElement, this.toolbar.get("nextSibling"));
        }
        if (!this.afterElement) {
            this.afterElement = document.createElement("h2");
            this.afterElement.className = "yui-editor-skipheader";
            this.afterElement.tabIndex = "-1";
            this.afterElement.innerHTML = this.STR_LEAVE_EDITOR;
            this.get("element_cont").get("firstChild").appendChild(this.afterElement);
        }
    }, _disableEditor:function (J) {
        var I, H, G, E;
        if (!this.get("disabled_iframe")) {
            I = this._createIframe();
            I.set("id", "disabled_" + this.get("iframe").get("id"));
            I.setStyle("height", "100%");
            I.setStyle("display", "none");
            I.setStyle("visibility", "visible");
            this.set("disabled_iframe", I);
            H = this.get("iframe").get("parentNode");
            H.appendChild(I.get("element"));
        }
        if (!I) {
            I = this.get("disabled_iframe");
        }
        if (J) {
            this._orgIframe = this.get("iframe");
            if (this.toolbar) {
                this.toolbar.set("disabled", true);
            }
            G = this.getEditorHTML();
            E = this.get("iframe").get("offsetHeight");
            I.setStyle("visibility", "");
            I.setStyle("position", "");
            I.setStyle("top", "");
            I.setStyle("left", "");
            this._orgIframe.setStyle("visibility", "hidden");
            this._orgIframe.setStyle("position", "absolute");
            this._orgIframe.setStyle("top", "-99999px");
            this._orgIframe.setStyle("left", "-99999px");
            this.set("iframe", I);
            this._setInitialContent(true);
            if (!this._mask) {
                this._mask = document.createElement("DIV");
                C.addClass(this._mask, "yui-editor-masked");
                if (this.browser.ie) {
                    this._mask.style.height = E + "px";
                }
                this.get("iframe").get("parentNode").appendChild(this._mask);
            }
            this.on("editorContentReloaded", function () {
                this._getDoc().body._rteLoaded = false;
                this.setEditorHTML(G);
                I.setStyle("display", "block");
                this.unsubscribeAll("editorContentReloaded");
            });
        } else {
            if (this._mask) {
                this._mask.parentNode.removeChild(this._mask);
                this._mask = null;
                if (this.toolbar) {
                    this.toolbar.set("disabled", false);
                }
                I.setStyle("visibility", "hidden");
                I.setStyle("position", "absolute");
                I.setStyle("top", "-99999px");
                I.setStyle("left", "-99999px");
                this._orgIframe.setStyle("visibility", "");
                this._orgIframe.setStyle("position", "");
                this._orgIframe.setStyle("top", "");
                this._orgIframe.setStyle("left", "");
                this.set("iframe", this._orgIframe);
                this.focus();
                var F = this;
                window.setTimeout(function () {
                    F.nodeChange.call(F);
                }, 100);
            }
        }
    }, SEP_DOMPATH:"<", STR_LEAVE_EDITOR:"You have left the Rich Text Editor.", STR_BEFORE_EDITOR:"This text field can contain stylized text and graphics. To cycle through all formatting options, use the keyboard shortcut Shift + Escape to place focus on the toolbar and navigate between options with your arrow keys. To exit this text editor use the Escape key and continue tabbing. <h4>Common formatting keyboard shortcuts:</h4><ul><li>Control Shift B sets text to bold</li> <li>Control Shift I sets text to italic</li> <li>Control Shift U underlines text</li> <li>Control Shift L adds an HTML link</li></ul>", STR_TITLE:"Rich Text Area.", STR_IMAGE_HERE:"Image URL Here", STR_IMAGE_URL:"Image URL", STR_LINK_URL:"Link URL", STOP_EXEC_COMMAND:false, STOP_NODE_CHANGE:false, CLASS_NOEDIT:"yui-noedit", CLASS_CONTAINER:"yui-editor-container", CLASS_EDITABLE:"yui-editor-editable", CLASS_EDITABLE_CONT:"yui-editor-editable-container", CLASS_PREFIX:"yui-editor", browser:function () {
        var E = YAHOO.env.ua;
        if (E.webkit >= 420) {
            E.webkit3 = E.webkit;
        } else {
            E.webkit3 = 0;
        }
        if (E.webkit >= 530) {
            E.webkit4 = E.webkit;
        } else {
            E.webkit4 = 0;
        }
        E.mac = false;
        if (navigator.userAgent.indexOf("Macintosh") !== -1) {
            E.mac = true;
        }
        return E;
    }(), init:function (F, E) {
        if (!this._defaultToolbar) {
            this._defaultToolbar = {collapse:true, titlebar:"Text Editing Tools", draggable:false, buttons:[
                {group:"fontstyle", label:"Font Name and Size", buttons:[
                    {type:"select", label:"Arial", value:"fontname", disabled:true, menu:[
                        {text:"Arial", checked:true},
                        {text:"Arial Black"},
                        {text:"Comic Sans MS"},
                        {text:"Courier New"},
                        {text:"Lucida Console"},
                        {text:"Tahoma"},
                        {text:"Times New Roman"},
                        {text:"Trebuchet MS"},
                        {text:"Verdana"}
                    ]},
                    {type:"spin", label:"13", value:"fontsize", range:[9, 75], disabled:true}
                ]},
                {type:"separator"},
                {group:"textstyle", label:"Font Style", buttons:[
                    {type:"push", label:"Bold CTRL + SHIFT + B", value:"bold"},
                    {type:"push", label:"Italic CTRL + SHIFT + I", value:"italic"},
                    {type:"push", label:"Underline CTRL + SHIFT + U", value:"underline"},
                    {type:"push", label:"Strike Through", value:"strikethrough"},
                    {type:"separator"},
                    {type:"color", label:"Font Color", value:"forecolor", disabled:true},
                    {type:"color", label:"Background Color", value:"backcolor", disabled:true}
                ]},
                {type:"separator"},
                {group:"indentlist", label:"Lists", buttons:[
                    {type:"push", label:"Create an Unordered List", value:"insertunorderedlist"},
                    {type:"push", label:"Create an Ordered List", value:"insertorderedlist"}
                ]},
                {type:"separator"},
                {group:"insertitem", label:"Insert Item", buttons:[
                    {type:"push", label:"HTML Link CTRL + SHIFT + L", value:"createlink", disabled:true},
                    {type:"push", label:"Insert Image", value:"insertimage"}
                ]}
            ]};
        }
        YAHOO.widget.SimpleEditor.superclass.init.call(this, F, E);
        YAHOO.widget.EditorInfo._instances[this.get("id")] = this;
        this.currentElement = [];
        this.on("contentReady", function () {
            this.DOMReady = true;
            this.fireQueue();
        }, this, true);
    }, initAttributes:function (E) {
        YAHOO.widget.SimpleEditor.superclass.initAttributes.call(this, E);
        var F = this;
        this.setAttributeConfig("setDesignMode", {value:((E.setDesignMode === false) ? false : true)});
        this.setAttributeConfig("nodeChangeDelay", {value:((E.nodeChangeDelay === false) ? false : true)});
        this.setAttributeConfig("maxUndo", {writeOnce:true, value:E.maxUndo || 30});
        this.setAttributeConfig("ptags", {writeOnce:true, value:E.ptags || false});
        this.setAttributeConfig("insert", {writeOnce:true, value:E.insert || false, method:function (K) {
            if (K) {
                var J = {fontname:true, fontsize:true, forecolor:true, backcolor:true};
                var I = this._defaultToolbar.buttons;
                for (var H = 0; H < I.length; H++) {
                    if (I[H].buttons) {
                        for (var G = 0; G < I[H].buttons.length; G++) {
                            if (I[H].buttons[G].value) {
                                if (J[I[H].buttons[G].value]) {
                                    delete I[H].buttons[G].disabled;
                                }
                            }
                        }
                    }
                }
            }
        }});
        this.setAttributeConfig("container", {writeOnce:true, value:E.container || false});
        this.setAttributeConfig("plainText", {writeOnce:true, value:E.plainText || false});
        this.setAttributeConfig("iframe", {value:null});
        this.setAttributeConfig("disabled_iframe", {value:null});
        this.setAttributeConfig("textarea", {value:null, writeOnce:true});
        this.setAttributeConfig("nodeChangeThreshold", {value:E.nodeChangeThreshold || 3, validator:YAHOO.lang.isNumber});
        this.setAttributeConfig("allowNoEdit", {value:E.allowNoEdit || false, validator:YAHOO.lang.isBoolean});
        this.setAttributeConfig("limitCommands", {value:E.limitCommands || false, validator:YAHOO.lang.isBoolean});
        this.setAttributeConfig("element_cont", {value:E.element_cont});
        this.setAttributeConfig("editor_wrapper", {value:E.editor_wrapper || null, writeOnce:true});
        this.setAttributeConfig("height", {value:E.height || C.getStyle(F.get("element"), "height"), method:function (G) {
            if (this._rendered) {
                if (this.get("animate")) {
                    var H = new YAHOO.util.Anim(this.get("iframe").get("parentNode"), {height:{to:parseInt(G, 10)}}, 0.5);
                    H.animate();
                } else {
                    C.setStyle(this.get("iframe").get("parentNode"), "height", G);
                }
            }
        }});
        this.setAttributeConfig("autoHeight", {value:E.autoHeight || false, method:function (G) {
            if (G) {
                if (this.get("iframe")) {
                    this.get("iframe").get("element").setAttribute("scrolling", "no");
                }
                this.on("afterNodeChange", this._handleAutoHeight, this, true);
                this.on("editorKeyDown", this._handleAutoHeight, this, true);
                this.on("editorKeyPress", this._handleAutoHeight, this, true);
            } else {
                if (this.get("iframe")) {
                    this.get("iframe").get("element").setAttribute("scrolling", "auto");
                }
                this.unsubscribe("afterNodeChange", this._handleAutoHeight);
                this.unsubscribe("editorKeyDown", this._handleAutoHeight);
                this.unsubscribe("editorKeyPress", this._handleAutoHeight);
            }
        }});
        this.setAttributeConfig("width", {value:E.width || C.getStyle(this.get("element"), "width"), method:function (G) {
            if (this._rendered) {
                if (this.get("animate")) {
                    var H = new YAHOO.util.Anim(this.get("element_cont").get("element"), {width:{to:parseInt(G, 10)}}, 0.5);
                    H.animate();
                } else {
                    this.get("element_cont").setStyle("width", G);
                }
            }
        }});
        this.setAttributeConfig("blankimage", {value:E.blankimage || this._getBlankImage()});
        this.setAttributeConfig("css", {value:E.css || this._defaultCSS, writeOnce:true});
        this.setAttributeConfig("html", {value:E.html || '<html><head><title>{TITLE}</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><base href="' + this._baseHREF + '"><style>{CSS}</style><style>{HIDDEN_CSS}</style><style>{EXTRA_CSS}</style></head><body onload="document.body._rteLoaded = true;">{CONTENT}</body></html>', writeOnce:true});
        this.setAttributeConfig("extracss", {value:E.extracss || "", writeOnce:true});
        this.setAttributeConfig("handleSubmit", {value:E.handleSubmit || false, method:function (G) {
            if (this.get("element").form) {
                if (!this._formButtons) {
                    this._formButtons = [];
                }
                if (G) {
                    A.on(this.get("element").form, "submit", this._handleFormSubmit, this, true);
                    var H = this.get("element").form.getElementsByTagName("input");
                    for (var J = 0; J < H.length; J++) {
                        var I = H[J].getAttribute("type");
                        if (I && (I.toLowerCase() == "submit")) {
                            A.on(H[J], "click", this._handleFormButtonClick, this, true);
                            this._formButtons[this._formButtons.length] = H[J];
                        }
                    }
                } else {
                    A.removeListener(this.get("element").form, "submit", this._handleFormSubmit);
                    if (this._formButtons) {
                        A.removeListener(this._formButtons, "click", this._handleFormButtonClick);
                    }
                }
            }
        }});
        this.setAttributeConfig("disabled", {value:false, method:function (G) {
            if (this._rendered) {
                this._disableEditor(G);
            }
        }});
        this.setAttributeConfig("saveEl", {value:this.get("element")});
        this.setAttributeConfig("toolbar_cont", {value:null, writeOnce:true});
        this.setAttributeConfig("toolbar", {value:E.toolbar || this._defaultToolbar, writeOnce:true, method:function (G) {
            if (!G.buttonType) {
                G.buttonType = this._defaultToolbar.buttonType;
            }
            this._defaultToolbar = G;
        }});
        this.setAttributeConfig("animate", {value:((E.animate) ? ((YAHOO.util.Anim) ? true : false) : false), validator:function (H) {
            var G = true;
            if (!YAHOO.util.Anim) {
                G = false;
            }
            return G;
        }});
        this.setAttributeConfig("panel", {value:null, writeOnce:true, validator:function (H) {
            var G = true;
            if (!YAHOO.widget.Overlay) {
                G = false;
            }
            return G;
        }});
        this.setAttributeConfig("focusAtStart", {value:E.focusAtStart || false, writeOnce:true, method:function (G) {
            if (G) {
                this.on("editorContentLoaded", function () {
                    var H = this;
                    setTimeout(function () {
                        H.focus.call(H);
                        H.editorDirty = false;
                    }, 400);
                }, this, true);
            }
        }});
        this.setAttributeConfig("dompath", {value:E.dompath || false, method:function (G) {
            if (G && !this.dompath) {
                this.dompath = document.createElement("DIV");
                this.dompath.id = this.get("id") + "_dompath";
                C.addClass(this.dompath, "dompath");
                this.get("element_cont").get("firstChild").appendChild(this.dompath);
                if (this.get("iframe")) {
                    this._writeDomPath();
                }
            } else {
                if (!G && this.dompath) {
                    this.dompath.parentNode.removeChild(this.dompath);
                    this.dompath = null;
                }
            }
        }});
        this.setAttributeConfig("markup", {value:E.markup || "semantic", validator:function (G) {
            switch (G.toLowerCase()) {
                case"semantic":
                case"css":
                case"default":
                case"xhtml":
                    return true;
            }
            return false;
        }});
        this.setAttributeConfig("removeLineBreaks", {value:E.removeLineBreaks || false, validator:YAHOO.lang.isBoolean});
        this.setAttributeConfig("drag", {writeOnce:true, value:E.drag || false});
        this.setAttributeConfig("resize", {writeOnce:true, value:E.resize || false});
        this.setAttributeConfig("filterWord", {value:E.filterWord || false, validator:YAHOO.lang.isBoolean});
    }, _getBlankImage:function () {
        if (!this.DOMReady) {
            this._queue[this._queue.length] = ["_getBlankImage", arguments];
            return"";
        }
        var E = "";
        if (!this._blankImageLoaded) {
            if (YAHOO.widget.EditorInfo.blankImage) {
                this.set("blankimage", YAHOO.widget.EditorInfo.blankImage);
                this._blankImageLoaded = true;
            } else {
                var F = document.createElement("div");
                F.style.position = "absolute";
                F.style.top = "-9999px";
                F.style.left = "-9999px";
                F.className = this.CLASS_PREFIX + "-blankimage";
                document.body.appendChild(F);
                E = YAHOO.util.Dom.getStyle(F, "background-image");
                E = E.replace("url(", "").replace(")", "").replace(/"/g, "");
                E = E.replace("app:/", "");
                this.set("blankimage", E);
                this._blankImageLoaded = true;
                F.parentNode.removeChild(F);
                YAHOO.widget.EditorInfo.blankImage = E;
            }
        } else {
            E = this.get("blankimage");
        }
        return E;
    }, _handleAutoHeight:function () {
        var J = this._getDoc(), F = J.body, K = J.documentElement;
        var E = parseInt(C.getStyle(this.get("editor_wrapper"), "height"), 10);
        var G = F.scrollHeight;
        if (this.browser.webkit) {
            G = K.scrollHeight;
        }
        if (G < parseInt(this.get("height"), 10)) {
            G = parseInt(this.get("height"), 10);
        }
        if ((E != G) && (G >= parseInt(this.get("height"), 10))) {
            var I = this.get("animate");
            this.set("animate", false);
            this.set("height", G + "px");
            this.set("animate", I);
            if (this.browser.ie) {
                this.get("iframe").setStyle("height", "99%");
                this.get("iframe").setStyle("zoom", "1");
                var H = this;
                window.setTimeout(function () {
                    H.get("iframe").setStyle("height", "100%");
                }, 1);
            }
        }
    }, _formButtons:null, _formButtonClicked:null, _handleFormButtonClick:function (F) {
        var E = A.getTarget(F);
        this._formButtonClicked = E;
    }, _handleFormSubmit:function (H) {
        this.saveHTML();
        var G = this.get("element").form, E = this._formButtonClicked || false;
        A.removeListener(G, "submit", this._handleFormSubmit);
        if (YAHOO.env.ua.ie) {
            if (E && !E.disabled) {
                E.click();
            }
        } else {
            if (E && !E.disabled) {
                E.click();
            }
            var F = document.createEvent("HTMLEvents");
            F.initEvent("submit", true, true);
            G.dispatchEvent(F);
            if (YAHOO.env.ua.webkit) {
                if (YAHOO.lang.isFunction(G.submit)) {
                    G.submit();
                }
            }
        }
    }, _handleFontSize:function (G) {
        var E = this.toolbar.getButtonById(G.button.id);
        var F = E.get("label") + "px";
        this.execCommand("fontsize", F);
        return false;
    }, _handleColorPicker:function (G) {
        var F = G.button;
        var E = "#" + G.color;
        if ((F == "forecolor") || (F == "backcolor")) {
            this.execCommand(F, E);
        }
    }, _handleAlign:function (H) {
        var G = null;
        for (var E = 0; E < H.button.menu.length; E++) {
            if (H.button.menu[E].value == H.button.value) {
                G = H.button.menu[E].value;
            }
        }
        var F = this._getSelection();
        this.execCommand(G, F);
        return false;
    }, _handleAfterNodeChange:function () {
        var Q = this._getDomPath(), L = null, H = null, M = null, F = false, J = this.toolbar.getButtonByValue("fontname"), K = this.toolbar.getButtonByValue("fontsize"), E = this.toolbar.getButtonByValue("heading");
        for (var G = 0; G < Q.length; G++) {
            L = Q[G];
            var P = L.tagName.toLowerCase();
            if (L.getAttribute("tag")) {
                P = L.getAttribute("tag");
            }
            H = L.getAttribute("face");
            if (C.getStyle(L, "font-family")) {
                H = C.getStyle(L, "font-family");
                H = H.replace(/'/g, "");
            }
            if (P.substring(0, 1) == "h") {
                if (E) {
                    for (var I = 0; I < E._configs.menu.value.length; I++) {
                        if (E._configs.menu.value[I].value.toLowerCase() == P) {
                            E.set("label", E._configs.menu.value[I].text);
                        }
                    }
                    this._updateMenuChecked("heading", P);
                }
            }
        }
        if (J) {
            for (var O = 0; O < J._configs.menu.value.length; O++) {
                if (H && J._configs.menu.value[O].text.toLowerCase() == H.toLowerCase()) {
                    F = true;
                    H = J._configs.menu.value[O].text;
                }
            }
            if (!F) {
                H = J._configs.label._initialConfig.value;
            }
            var N = '<span class="yui-toolbar-fontname-' + this._cleanClassName(H) + '">' + H + "</span>";
            if (J.get("label") != N) {
                J.set("label", N);
                this._updateMenuChecked("fontname", H);
            }
        }
        if (K) {
            M = parseInt(C.getStyle(L, "fontSize"), 10);
            if ((M === null) || isNaN(M)) {
                M = K._configs.label._initialConfig.value;
            }
            K.set("label", "" + M);
        }
        if (!this._isElement(L, "body") && !this._isElement(L, "img")) {
            this.toolbar.enableButton(J);
            this.toolbar.enableButton(K);
            this.toolbar.enableButton("forecolor");
            this.toolbar.enableButton("backcolor");
        }
        if (this._isElement(L, "img")) {
            if (YAHOO.widget.Overlay) {
                this.toolbar.enableButton("createlink");
            }
        }
        if (this._hasParent(L, "blockquote")) {
            this.toolbar.selectButton("indent");
            this.toolbar.disableButton("indent");
            this.toolbar.enableButton("outdent");
        }
        if (this._hasParent(L, "ol") || this._hasParent(L, "ul")) {
            this.toolbar.disableButton("indent");
        }
        this._lastButton = null;
    }, _handleInsertImageClick:function () {
        if (this.get("limitCommands")) {
            if (!this.toolbar.getButtonByValue("insertimage")) {
                return false;
            }
        }
        this.toolbar.set("disabled", true);
        var E = function () {
            var F = this.currentElement[0], H = "http://";
            if (!F) {
                F = this._getSelectedElement();
            }
            if (F) {
                if (F.getAttribute("src")) {
                    H = F.getAttribute("src", 2);
                    if (H.indexOf(this.get("blankimage")) != -1) {
                        H = this.STR_IMAGE_HERE;
                    }
                }
            }
            var G = prompt(this.STR_IMAGE_URL + ": ", H);
            if ((G !== "") && (G !== null)) {
                F.setAttribute("src", G);
            } else {
                if (G === "") {
                    F.parentNode.removeChild(F);
                    this.currentElement = [];
                    this.nodeChange();
                } else {
                    if ((G === null)) {
                        H = F.getAttribute("src", 2);
                        if (H.indexOf(this.get("blankimage")) != -1) {
                            F.parentNode.removeChild(F);
                            this.currentElement = [];
                            this.nodeChange();
                        }
                    }
                }
            }
            this.closeWindow();
            this.toolbar.set("disabled", false);
            this.unsubscribe("afterExecCommand", E, this, true);
        };
        this.on("afterExecCommand", E, this, true);
    }, _handleInsertImageWindowClose:function () {
        this.nodeChange();
    }, _isLocalFile:function (E) {
        if ((E) && (E !== "") && ((E.indexOf("file:/") != -1) || (E.indexOf(":\\") != -1))) {
            return true;
        }
        return false;
    }, _handleCreateLinkClick:function () {
        if (this.get("limitCommands")) {
            if (!this.toolbar.getButtonByValue("createlink")) {
                return false;
            }
        }
        this.toolbar.set("disabled", true);
        var E = function () {
            var H = this.currentElement[0], G = "";
            if (H) {
                if (H.getAttribute("href", 2) !== null) {
                    G = H.getAttribute("href", 2);
                }
            }
            var J = prompt(this.STR_LINK_URL + ": ", G);
            if ((J !== "") && (J !== null)) {
                var I = J;
                if ((I.indexOf(":/" + "/") == -1) && (I.substring(0, 1) != "/") && (I.substring(0, 6).toLowerCase() != "mailto")) {
                    if ((I.indexOf("@") != -1) && (I.substring(0, 6).toLowerCase() != "mailto")) {
                        I = "mailto:" + I;
                    } else {
                        if (I.substring(0, 1) != "#") {
                        }
                    }
                }
                H.setAttribute("href", I);
            } else {
                if (J !== null) {
                    var F = this._getDoc().createElement("span");
                    F.innerHTML = H.innerHTML;
                    C.addClass(F, "yui-non");
                    H.parentNode.replaceChild(F, H);
                }
            }
            this.closeWindow();
            this.toolbar.set("disabled", false);
            this.unsubscribe("afterExecCommand", E, this, true);
        };
        this.on("afterExecCommand", E, this);
    }, _handleCreateLinkWindowClose:function () {
        this.nodeChange();
        this.currentElement = [];
    }, render:function () {
        if (this._rendered) {
            return false;
        }
        if (!this.DOMReady) {
            this._queue[this._queue.length] = ["render", arguments];
            return false;
        }
        if (this.get("element")) {
            if (this.get("element").tagName) {
                this._textarea = true;
                if (this.get("element").tagName.toLowerCase() !== "textarea") {
                    this._textarea = false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        this._rendered = true;
        var E = this;
        window.setTimeout(function () {
            E._render.call(E);
        }, 4);
    }, _render:function () {
        var E = this;
        this.set("textarea", this.get("element"));
        this.get("element_cont").setStyle("display", "none");
        this.get("element_cont").addClass(this.CLASS_CONTAINER);
        this.set("iframe", this._createIframe());
        window.setTimeout(function () {
            E._setInitialContent.call(E);
        }, 10);
        this.get("editor_wrapper").appendChild(this.get("iframe").get("element"));
        if (this.get("disabled")) {
            this._disableEditor(true);
        }
        var F = this.get("toolbar");
        if (F instanceof B) {
            this.toolbar = F;
            this.toolbar.set("disabled", true);
        } else {
            F.disabled = true;
            this.toolbar = new B(this.get("toolbar_cont"), F);
        }
        this.fireEvent("toolbarLoaded", {type:"toolbarLoaded", target:this.toolbar});
        this.toolbar.on("toolbarCollapsed", function () {
            if (this.currentWindow) {
                this.moveWindow();
            }
        }, this, true);
        this.toolbar.on("toolbarExpanded", function () {
            if (this.currentWindow) {
                this.moveWindow();
            }
        }, this, true);
        this.toolbar.on("fontsizeClick", this._handleFontSize, this, true);
        this.toolbar.on("colorPickerClicked", function (G) {
            this._handleColorPicker(G);
            return false;
        }, this, true);
        this.toolbar.on("alignClick", this._handleAlign, this, true);
        this.on("afterNodeChange", this._handleAfterNodeChange, this, true);
        this.toolbar.on("insertimageClick", this._handleInsertImageClick, this, true);
        this.on("windowinsertimageClose", this._handleInsertImageWindowClose, this, true);
        this.toolbar.on("createlinkClick", this._handleCreateLinkClick, this, true);
        this.on("windowcreatelinkClose", this._handleCreateLinkWindowClose, this, true);
        this.get("parentNode").replaceChild(this.get("element_cont").get("element"), this.get("element"));
        this.setStyle("visibility", "hidden");
        this.setStyle("position", "absolute");
        this.setStyle("top", "-9999px");
        this.setStyle("left", "-9999px");
        this.get("element_cont").appendChild(this.get("element"));
        this.get("element_cont").setStyle("display", "block");
        C.addClass(this.get("iframe").get("parentNode"), this.CLASS_EDITABLE_CONT);
        this.get("iframe").addClass(this.CLASS_EDITABLE);
        this.get("element_cont").setStyle("width", this.get("width"));
        C.setStyle(this.get("iframe").get("parentNode"), "height", this.get("height"));
        this.get("iframe").setStyle("width", "100%");
        this.get("iframe").setStyle("height", "100%");
        this._setupDD();
        window.setTimeout(function () {
            E._setupAfterElement.call(E);
        }, 0);
        this.fireEvent("afterRender", {type:"afterRender", target:this});
    }, execCommand:function (G, F) {
        var J = this.fireEvent("beforeExecCommand", {type:"beforeExecCommand", target:this, args:arguments});
        if ((J === false) || (this.STOP_EXEC_COMMAND)) {
            this.STOP_EXEC_COMMAND = false;
            return false;
        }
        this._lastCommand = G;
        this._setMarkupType(G);
        if (this.browser.ie) {
            this._getWindow().focus();
        }
        var E = true;
        if (this.get("limitCommands")) {
            if (!this.toolbar.getButtonByValue(G)) {
                E = false;
            }
        }
        this.editorDirty = true;
        if ((typeof this["cmd_" + G.toLowerCase()] == "function") && E) {
            var I = this["cmd_" + G.toLowerCase()](F);
            E = I[0];
            if (I[1]) {
                G = I[1];
            }
            if (I[2]) {
                F = I[2];
            }
        }
        if (E) {
            try {
                this._getDoc().execCommand(G, false, F);
            } catch (H) {
            }
        } else {
        }
        this.on("afterExecCommand", function () {
            this.unsubscribeAll("afterExecCommand");
            this.nodeChange();
        }, this, true);
        this.fireEvent("afterExecCommand", {type:"afterExecCommand", target:this});
    }, cmd_bold:function (H) {
        if (!this.browser.webkit) {
            var G = this._getSelectedElement();
            if (G && this._isElement(G, "span") && this._hasSelection()) {
                if (G.style.fontWeight == "bold") {
                    G.style.fontWeight = "";
                    var E = this._getDoc().createElement("b"), F = G.parentNode;
                    F.replaceChild(E, G);
                    E.appendChild(G);
                }
            }
        }
        return[true];
    }, cmd_italic:function (H) {
        if (!this.browser.webkit) {
            var G = this._getSelectedElement();
            if (G && this._isElement(G, "span") && this._hasSelection()) {
                if (G.style.fontStyle == "italic") {
                    G.style.fontStyle = "";
                    var E = this._getDoc().createElement("i"), F = G.parentNode;
                    F.replaceChild(E, G);
                    E.appendChild(G);
                }
            }
        }
        return[true];
    }, cmd_underline:function (F) {
        if (!this.browser.webkit) {
            var E = this._getSelectedElement();
            if (E && this._isElement(E, "span")) {
                if (E.style.textDecoration == "underline") {
                    E.style.textDecoration = "none";
                } else {
                    E.style.textDecoration = "underline";
                }
                return[false];
            }
        }
        return[true];
    }, cmd_backcolor:function (H) {
        var E = true, F = this._getSelectedElement(), G = "backcolor";
        if (this.browser.gecko || this.browser.opera) {
            this._setEditorStyle(true);
            G = "hilitecolor";
        }
        if (!this._isElement(F, "body") && !this._hasSelection()) {
            F.style.backgroundColor = H;
            this._selectNode(F);
            E = false;
        } else {
            if (this.get("insert")) {
                F = this._createInsertElement({backgroundColor:H});
            } else {
                this._createCurrentElement("span", {backgroundColor:H, color:F.style.color, fontSize:F.style.fontSize, fontFamily:F.style.fontFamily});
                this._selectNode(this.currentElement[0]);
            }
            E = false;
        }
        return[E, G];
    }, cmd_forecolor:function (G) {
        var E = true, F = this._getSelectedElement();
        if (!this._isElement(F, "body") && !this._hasSelection()) {
            C.setStyle(F, "color", G);
            this._selectNode(F);
            E = false;
        } else {
            if (this.get("insert")) {
                F = this._createInsertElement({color:G});
            } else {
                this._createCurrentElement("span", {color:G, fontSize:F.style.fontSize, fontFamily:F.style.fontFamily, backgroundColor:F.style.backgroundColor});
                this._selectNode(this.currentElement[0]);
            }
            E = false;
        }
        return[E];
    }, cmd_unlink:function (E) {
        this._swapEl(this.currentElement[0], "span", function (F) {
            F.className = "yui-non";
        });
        return[false];
    }, cmd_createlink:function (G) {
        var F = this._getSelectedElement(), E = null;
        if (this._hasParent(F, "a")) {
            this.currentElement[0] = this._hasParent(F, "a");
        } else {
            if (this._isElement(F, "li")) {
                E = this._getDoc().createElement("a");
                E.innerHTML = F.innerHTML;
                F.innerHTML = "";
                F.appendChild(E);
                this.currentElement[0] = E;
            } else {
                if (!this._isElement(F, "a")) {
                    this._createCurrentElement("a");
                    E = this._swapEl(this.currentElement[0], "a");
                    this.currentElement[0] = E;
                } else {
                    this.currentElement[0] = F;
                }
            }
        }
        return[false];
    }, cmd_insertimage:function (J) {
        var E = true, F = null, I = "insertimage", H = this._getSelectedElement();
        if (J === "") {
            J = this.get("blankimage");
        }
        if (this._isElement(H, "img")) {
            this.currentElement[0] = H;
            E = false;
        } else {
            if (this._getDoc().queryCommandEnabled(I)) {
                this._getDoc().execCommand(I, false, J);
                var K = this._getDoc().getElementsByTagName("img");
                for (var G = 0; G < K.length; G++) {
                    if (!YAHOO.util.Dom.hasClass(K[G], "yui-img")) {
                        YAHOO.util.Dom.addClass(K[G], "yui-img");
                        this.currentElement[0] = K[G];
                    }
                }
                E = false;
            } else {
                if (H == this._getDoc().body) {
                    F = this._getDoc().createElement("img");
                    F.setAttribute("src", J);
                    YAHOO.util.Dom.addClass(F, "yui-img");
                    this._getDoc().body.appendChild(F);
                } else {
                    this._createCurrentElement("img");
                    F = this._getDoc().createElement("img");
                    F.setAttribute("src", J);
                    YAHOO.util.Dom.addClass(F, "yui-img");
                    this.currentElement[0].parentNode.replaceChild(F, this.currentElement[0]);
                }
                this.currentElement[0] = F;
                E = false;
            }
        }
        return[E];
    }, cmd_inserthtml:function (H) {
        var E = true, G = "inserthtml", F = null, I = null;
        if (this.browser.webkit && !this._getDoc().queryCommandEnabled(G)) {
            this._createCurrentElement("img");
            F = this._getDoc().createElement("span");
            F.innerHTML = H;
            this.currentElement[0].parentNode.replaceChild(F, this.currentElement[0]);
            E = false;
        } else {
            if (this.browser.ie) {
                I = this._getRange();
                if (I.item) {
                    I.item(0).outerHTML = H;
                } else {
                    I.pasteHTML(H);
                }
                E = false;
            }
        }
        return[E];
    }, cmd_list:function (e) {
        var V = true, Z = null, N = 0, G = null, U = "", d = this._getSelectedElement(), W = "insertorderedlist";
        if (e == "ul") {
            W = "insertunorderedlist";
        }
        if ((this.browser.webkit && !this.browser.webkit4) || (this.browser.opera)) {
            if (this._isElement(d, "li") && this._isElement(d.parentNode, e)) {
                G = d.parentNode;
                Z = this._getDoc().createElement("span");
                YAHOO.util.Dom.addClass(Z, "yui-non");
                U = "";
                var F = G.getElementsByTagName("li"), I = ((this.browser.opera && this.get("ptags")) ? "p" : "div");
                for (N = 0; N < F.length; N++) {
                    U += "<" + I + ">" + F[N].innerHTML + "</" + I + ">";
                }
                Z.innerHTML = U;
                this.currentElement[0] = G;
                this.currentElement[0].parentNode.replaceChild(Z, this.currentElement[0]);
            } else {
                this._createCurrentElement(e.toLowerCase());
                Z = this._getDoc().createElement(e);
                for (N = 0; N < this.currentElement.length; N++) {
                    var K = this._getDoc().createElement("li");
                    K.innerHTML = this.currentElement[N].innerHTML + '<span class="yui-non">&nbsp;</span>&nbsp;';
                    Z.appendChild(K);
                    if (N > 0) {
                        this.currentElement[N].parentNode.removeChild(this.currentElement[N]);
                    }
                }
                var T = ((this.browser.opera) ? "<BR>" : "<br>"), S = Z.firstChild.innerHTML.split(T), Y, a;
                if (S.length > 0) {
                    Z.innerHTML = "";
                    for (Y = 0; Y < S.length; Y++) {
                        a = this._getDoc().createElement("li");
                        a.innerHTML = S[Y];
                        Z.appendChild(a);
                    }
                }
                this.currentElement[0].parentNode.replaceChild(Z, this.currentElement[0]);
                this.currentElement[0] = Z;
                var H = this.currentElement[0].firstChild;
                H = C.getElementsByClassName("yui-non", "span", H)[0];
                if (this.browser.webkit) {
                    this._getSelection().setBaseAndExtent(H, 1, H, H.innerText.length);
                }
            }
            V = false;
        } else {
            G = this._getSelectedElement();
            if (this._isElement(G, "li") && this._isElement(G.parentNode, e) || (this.browser.ie && this._isElement(this._getRange().parentElement, "li")) || (this.browser.ie && this._isElement(G, "ul")) || (this.browser.ie && this._isElement(G, "ol"))) {
                if (this.browser.ie) {
                    if ((this.browser.ie && this._isElement(G, "ul")) || (this.browser.ie && this._isElement(G, "ol"))) {
                        G = G.getElementsByTagName("li")[0];
                    }
                    U = "";
                    var J = G.parentNode.getElementsByTagName("li");
                    for (var X = 0; X < J.length; X++) {
                        U += J[X].innerHTML + "<br>";
                    }
                    var c = this._getDoc().createElement("span");
                    c.innerHTML = U;
                    G.parentNode.parentNode.replaceChild(c, G.parentNode);
                } else {
                    this.nodeChange();
                    this._getDoc().execCommand(W, "", G.parentNode);
                    this.nodeChange();
                }
                V = false;
            }
            if (this.browser.opera) {
                var R = this;
                window.setTimeout(function () {
                    var f = R._getDoc().getElementsByTagName("li");
                    for (var g = 0; g < f.length; g++) {
                        if (f[g].innerHTML.toLowerCase() == "<br>") {
                            f[g].parentNode.parentNode.removeChild(f[g].parentNode);
                        }
                    }
                }, 30);
            }
            if (this.browser.ie && V) {
                var L = "";
                if (this._getRange().html) {
                    L = "<li>" + this._getRange().html + "</li>";
                } else {
                    var M = this._getRange().text.split("\n");
                    if (M.length > 1) {
                        L = "";
                        for (var Q = 0; Q < M.length; Q++) {
                            L += "<li>" + M[Q] + "</li>";
                        }
                    } else {
                        var P = this._getRange().text;
                        if (P === "") {
                            L = '<li id="new_list_item">' + P + "</li>";
                        } else {
                            L = "<li>" + P + "</li>";
                        }
                    }
                }
                this._getRange().pasteHTML("<" + e + ">" + L + "</" + e + ">");
                var E = this._getDoc().getElementById("new_list_item");
                if (E) {
                    var O = this._getDoc().body.createTextRange();
                    O.moveToElementText(E);
                    O.collapse(false);
                    O.select();
                    E.id = "";
                }
                V = false;
            }
        }
        return V;
    }, cmd_insertorderedlist:function (E) {
        return[this.cmd_list("ol")];
    }, cmd_insertunorderedlist:function (E) {
        return[this.cmd_list("ul")];
    }, cmd_fontname:function (H) {
        var E = true, G = this._getSelectedElement();
        this.currentFont = H;
        if (G && G.tagName && !this._hasSelection() && !this._isElement(G, "body") && !this.get("insert")) {
            YAHOO.util.Dom.setStyle(G, "font-family", H);
            E = false;
        } else {
            if (this.get("insert") && !this._hasSelection()) {
                var F = this._createInsertElement({fontFamily:H});
                E = false;
            }
        }
        return[E];
    }, cmd_fontsize:function (H) {
        var E = null, G = true;
        E = this._getSelectedElement();
        if (this.browser.webkit) {
            if (this.currentElement[0]) {
                if (E == this.currentElement[0]) {
                    G = false;
                    YAHOO.util.Dom.setStyle(E, "fontSize", H);
                    this._selectNode(E);
                    this.currentElement[0] = E;
                }
            }
        }
        if (G) {
            if (!this._isElement(this._getSelectedElement(), "body") && (!this._hasSelection())) {
                E = this._getSelectedElement();
                YAHOO.util.Dom.setStyle(E, "fontSize", H);
                if (this.get("insert") && this.browser.ie) {
                    var F = this._getRange();
                    F.collapse(false);
                    F.select();
                } else {
                    this._selectNode(E);
                }
            } else {
                if (this.currentElement && (this.currentElement.length > 0) && (!this._hasSelection()) && (!this.get("insert"))) {
                    YAHOO.util.Dom.setStyle(this.currentElement, "fontSize", H);
                } else {
                    if (this.get("insert") && !this._hasSelection()) {
                        E = this._createInsertElement({fontSize:H});
                        this.currentElement[0] = E;
                        this._selectNode(this.currentElement[0]);
                    } else {
                        this._createCurrentElement("span", {"fontSize":H, fontFamily:E.style.fontFamily, color:E.style.color, backgroundColor:E.style.backgroundColor});
                        this._selectNode(this.currentElement[0]);
                    }
                }
            }
        }
        return[false];
    }, _swapEl:function (F, E, H) {
        var G = this._getDoc().createElement(E);
        if (F) {
            G.innerHTML = F.innerHTML;
        }
        if (typeof H == "function") {
            H.call(this, G);
        }
        if (F) {
            F.parentNode.replaceChild(G, F);
        }
        return G;
    }, _createInsertElement:function (E) {
        this._createCurrentElement("span", E);
        var F = this.currentElement[0];
        if (this.browser.webkit) {
            F.innerHTML = '<span class="yui-non">&nbsp;</span>';
            F = F.firstChild;
            this._getSelection().setBaseAndExtent(F, 1, F, F.innerText.length);
        } else {
            if (this.browser.ie || this.browser.opera) {
                F.innerHTML = "&nbsp;";
            }
        }
        this.focus();
        this._selectNode(F, true);
        return F;
    }, _createCurrentElement:function (G, J) {
        G = ((G) ? G : "a");
        var R = null, F = [], H = this._getDoc();
        if (this.currentFont) {
            if (!J) {
                J = {};
            }
            J.fontFamily = this.currentFont;
            this.currentFont = null;
        }
        this.currentElement = [];
        var M = function (X, Z) {
            var Y = null;
            X = ((X) ? X : "span");
            X = X.toLowerCase();
            switch (X) {
                case"h1":
                case"h2":
                case"h3":
                case"h4":
                case"h5":
                case"h6":
                    Y = H.createElement(X);
                    break;
                default:
                    Y = H.createElement(X);
                    if (X === "span") {
                        YAHOO.util.Dom.addClass(Y, "yui-tag-" + X);
                        YAHOO.util.Dom.addClass(Y, "yui-tag");
                        Y.setAttribute("tag", X);
                    }
                    for (var W in Z) {
                        if (YAHOO.lang.hasOwnProperty(Z, W)) {
                            Y.style[W] = Z[W];
                        }
                    }
                    break;
            }
            return Y;
        };
        if (!this._hasSelection()) {
            if (this._getDoc().queryCommandEnabled("insertimage")) {
                this._getDoc().execCommand("insertimage", false, "yui-tmp-img");
                var L = this._getDoc().getElementsByTagName("img");
                for (var Q = 0; Q < L.length; Q++) {
                    if (L[Q].getAttribute("src", 2) == "yui-tmp-img") {
                        F = M(G, J);
                        L[Q].parentNode.replaceChild(F, L[Q]);
                        this.currentElement[this.currentElement.length] = F;
                    }
                }
            } else {
                if (this.currentEvent) {
                    R = YAHOO.util.Event.getTarget(this.currentEvent);
                } else {
                    R = this._getDoc().body;
                }
            }
            if (R) {
                F = M(G, J);
                if (this._isElement(R, "body") || this._isElement(R, "html")) {
                    if (this._isElement(R, "html")) {
                        R = this._getDoc().body;
                    }
                    R.appendChild(F);
                } else {
                    if (R.nextSibling) {
                        R.parentNode.insertBefore(F, R.nextSibling);
                    } else {
                        R.parentNode.appendChild(F);
                    }
                }
                this.currentElement[this.currentElement.length] = F;
                this.currentEvent = null;
                if (this.browser.webkit) {
                    this._getSelection().setBaseAndExtent(F, 0, F, 0);
                    if (this.browser.webkit3) {
                        this._getSelection().collapseToStart();
                    } else {
                        this._getSelection().collapse(true);
                    }
                }
            }
        } else {
            this._setEditorStyle(true);
            this._getDoc().execCommand("fontname", false, "yui-tmp");
            var E = [], P, V = ["font", "span", "i", "b", "u"];
            if (!this._isElement(this._getSelectedElement(), "body")) {
                V[V.length] = this._getDoc().getElementsByTagName(this._getSelectedElement().tagName);
                V[V.length] = this._getDoc().getElementsByTagName(this._getSelectedElement().parentNode.tagName);
            }
            for (var K = 0; K < V.length; K++) {
                var I = this._getDoc().getElementsByTagName(V[K]);
                for (var U = 0; U < I.length; U++) {
                    E[E.length] = I[U];
                }
            }
            for (var S = 0; S < E.length; S++) {
                if ((YAHOO.util.Dom.getStyle(E[S], "font-family") == "yui-tmp") || (E[S].face && (E[S].face == "yui-tmp"))) {
                    if (G !== "span") {
                        F = M(G, J);
                    } else {
                        F = M(E[S].tagName, J);
                    }
                    F.innerHTML = E[S].innerHTML;
                    if (this._isElement(E[S], "ol") || (this._isElement(E[S], "ul"))) {
                        var N = E[S].getElementsByTagName("li")[0];
                        E[S].style.fontFamily = "inherit";
                        N.style.fontFamily = "inherit";
                        F.innerHTML = N.innerHTML;
                        N.innerHTML = "";
                        N.appendChild(F);
                        this.currentElement[this.currentElement.length] = F;
                    } else {
                        if (this._isElement(E[S], "li")) {
                            E[S].innerHTML = "";
                            E[S].appendChild(F);
                            E[S].style.fontFamily = "inherit";
                            this.currentElement[this.currentElement.length] = F;
                        } else {
                            if (E[S].parentNode) {
                                E[S].parentNode.replaceChild(F, E[S]);
                                this.currentElement[this.currentElement.length] = F;
                                this.currentEvent = null;
                                if (this.browser.webkit) {
                                    this._getSelection().setBaseAndExtent(F, 0, F, 0);
                                    if (this.browser.webkit3) {
                                        this._getSelection().collapseToStart();
                                    } else {
                                        this._getSelection().collapse(true);
                                    }
                                }
                                if (this.browser.ie && J && J.fontSize) {
                                    this._getSelection().empty();
                                }
                                if (this.browser.gecko) {
                                    this._getSelection().collapseToStart();
                                }
                            }
                        }
                    }
                }
            }
            var T = this.currentElement.length;
            for (var O = 0; O < T; O++) {
                if ((O + 1) != T) {
                    if (this.currentElement[O] && this.currentElement[O].nextSibling) {
                        if (this._isElement(this.currentElement[O], "br")) {
                            this.currentElement[this.currentElement.length] = this.currentElement[O].nextSibling;
                        }
                    }
                }
            }
        }
    }, saveHTML:function () {
        var F = this.cleanHTML();
        if (this._textarea) {
            this.get("element").value = F;
        } else {
            this.get("element").innerHTML = F;
        }
        if (this.get("saveEl") !== this.get("element")) {
            var E = this.get("saveEl");
            if (D.isString(E)) {
                E = C.get(E);
            }
            if (E) {
                if (E.tagName.toLowerCase() === "textarea") {
                    E.value = F;
                } else {
                    E.innerHTML = F;
                }
            }
        }
        return F;
    }, setEditorHTML:function (F) {
        var E = this._cleanIncomingHTML(F);
        E = E.replace(/RIGHT_BRACKET/gi, "{");
        E = E.replace(/LEFT_BRACKET/gi, "}");
        this._getDoc().body.innerHTML = E;
        this.nodeChange();
    }, getEditorHTML:function () {
        try {
            var E = this._getDoc().body;
            if (E === null) {
                return null;
            }
            return this._getDoc().body.innerHTML;
        } catch (F) {
            return"";
        }
    }, show:function () {
        if (this.browser.gecko) {
            this._setDesignMode("on");
            this.focus();
        }
        if (this.browser.webkit) {
            var E = this;
            window.setTimeout(function () {
                E._setInitialContent.call(E);
            }, 10);
        }
        if (this.currentWindow) {
            this.closeWindow();
        }
        this.get("iframe").setStyle("position", "static");
        this.get("iframe").setStyle("left", "");
    }, hide:function () {
        if (this.currentWindow) {
            this.closeWindow();
        }
        if (this._fixNodesTimer) {
            clearTimeout(this._fixNodesTimer);
            this._fixNodesTimer = null;
        }
        if (this._nodeChangeTimer) {
            clearTimeout(this._nodeChangeTimer);
            this._nodeChangeTimer = null;
        }
        this._lastNodeChange = 0;
        this.get("iframe").setStyle("position", "absolute");
        this.get("iframe").setStyle("left", "-9999px");
    }, _cleanIncomingHTML:function (E) {
        E = E.replace(/{/gi, "RIGHT_BRACKET");
        E = E.replace(/}/gi, "LEFT_BRACKET");
        E = E.replace(/<strong([^>]*)>/gi, "<b$1>");
        E = E.replace(/<\/strong>/gi, "</b>");
        E = E.replace(/<embed([^>]*)>/gi, "<YUI_EMBED$1>");
        E = E.replace(/<\/embed>/gi, "</YUI_EMBED>");
        E = E.replace(/<em([^>]*)>/gi, "<i$1>");
        E = E.replace(/<\/em>/gi, "</i>");
        E = E.replace(/_moz_dirty=""/gi, "");
        E = E.replace(/<YUI_EMBED([^>]*)>/gi, "<embed$1>");
        E = E.replace(/<\/YUI_EMBED>/gi, "</embed>");
        if (this.get("plainText")) {
            E = E.replace(/\n/g, "<br>").replace(/\r/g, "<br>");
            E = E.replace(/  /gi, "&nbsp;&nbsp;");
            E = E.replace(/\t/gi, "&nbsp;&nbsp;&nbsp;&nbsp;");
        }
        E = E.replace(/<script([^>]*)>/gi, "<bad>");
        E = E.replace(/<\/script([^>]*)>/gi, "</bad>");
        E = E.replace(/&lt;script([^>]*)&gt;/gi, "<bad>");
        E = E.replace(/&lt;\/script([^>]*)&gt;/gi, "</bad>");
        E = E.replace(/\r\n/g, "<YUI_LF>").replace(/\n/g, "<YUI_LF>").replace(/\r/g, "<YUI_LF>");
        E = E.replace(new RegExp("<bad([^>]*)>(.*?)</bad>", "gi"), "");
        E = E.replace(/<YUI_LF>/g, "\n");
        return E;
    }, cleanHTML:function (H) {
        if (!H) {
            H = this.getEditorHTML();
        }
        var F = this.get("markup");
        H = this.pre_filter_linebreaks(H, F);
        H = this.filter_msword(H);
        H = H.replace(/<img([^>]*)\/>/gi, "<YUI_IMG$1>");
        H = H.replace(/<img([^>]*)>/gi, "<YUI_IMG$1>");
        H = H.replace(/<input([^>]*)\/>/gi, "<YUI_INPUT$1>");
        H = H.replace(/<input([^>]*)>/gi, "<YUI_INPUT$1>");
        H = H.replace(/<ul([^>]*)>/gi, "<YUI_UL$1>");
        H = H.replace(/<\/ul>/gi, "</YUI_UL>");
        H = H.replace(/<blockquote([^>]*)>/gi, "<YUI_BQ$1>");
        H = H.replace(/<\/blockquote>/gi, "</YUI_BQ>");
        H = H.replace(/<embed([^>]*)>/gi, "<YUI_EMBED$1>");
        H = H.replace(/<\/embed>/gi, "</YUI_EMBED>");
        if ((F == "semantic") || (F == "xhtml")) {
            H = H.replace(/<i(\s+[^>]*)?>/gi, "<em$1>");
            H = H.replace(/<\/i>/gi, "</em>");
            H = H.replace(/<b(\s+[^>]*)?>/gi, "<strong$1>");
            H = H.replace(/<\/b>/gi, "</strong>");
        }
        H = H.replace(/_moz_dirty=""/gi, "");
        H = H.replace(/<strike/gi, '<span style="text-decoration: line-through;"');
        H = H.replace(/\/strike>/gi, "/span>");
        if (this.browser.ie) {
            H = H.replace(/text-decoration/gi, "text-decoration");
            H = H.replace(/font-weight/gi, "font-weight");
            H = H.replace(/_width="([^>]*)"/gi, "");
            H = H.replace(/_height="([^>]*)"/gi, "");
            var G = this._baseHREF.replace(/\//gi, "\\/"), I = new RegExp('src="' + G, "gi");
            H = H.replace(I, 'src="');
        }
        H = H.replace(/<font/gi, "<font");
        H = H.replace(/<\/font>/gi, "</font>");
        H = H.replace(/<span/gi, "<span");
        H = H.replace(/<\/span>/gi, "</span>");
        if ((F == "semantic") || (F == "xhtml") || (F == "css")) {
            H = H.replace(new RegExp('<font([^>]*)face="([^>]*)">(.*?)</font>', "gi"), '<span $1 style="font-family: $2;">$3</span>');
            H = H.replace(/<u/gi, '<span style="text-decoration: underline;"');
            if (this.browser.webkit) {
                H = H.replace(new RegExp('<span class="Apple-style-span" style="font-weight: bold;">([^>]*)</span>', "gi"), "<strong>$1</strong>");
                H = H.replace(new RegExp('<span class="Apple-style-span" style="font-style: italic;">([^>]*)</span>', "gi"), "<em>$1</em>");
            }
            H = H.replace(/\/u>/gi, "/span>");
            if (F == "css") {
                H = H.replace(/<em([^>]*)>/gi, "<i$1>");
                H = H.replace(/<\/em>/gi, "</i>");
                H = H.replace(/<strong([^>]*)>/gi, "<b$1>");
                H = H.replace(/<\/strong>/gi, "</b>");
                H = H.replace(/<b/gi, '<span style="font-weight: bold;"');
                H = H.replace(/\/b>/gi, "/span>");
                H = H.replace(/<i/gi, '<span style="font-style: italic;"');
                H = H.replace(/\/i>/gi, "/span>");
            }
            H = H.replace(/  /gi, " ");
        } else {
            H = H.replace(/<u/gi, "<u");
            H = H.replace(/\/u>/gi, "/u>");
        }
        H = H.replace(/<ol([^>]*)>/gi, "<ol$1>");
        H = H.replace(/\/ol>/gi, "/ol>");
        H = H.replace(/<li/gi, "<li");
        H = H.replace(/\/li>/gi, "/li>");
        H = this.filter_safari(H);
        H = this.filter_internals(H);
        H = this.filter_all_rgb(H);
        H = this.post_filter_linebreaks(H, F);
        if (F == "xhtml") {
            H = H.replace(/<YUI_IMG([^>]*)>/g, "<img $1 />");
            H = H.replace(/<YUI_INPUT([^>]*)>/g, "<input $1 />");
        } else {
            H = H.replace(/<YUI_IMG([^>]*)>/g, "<img $1>");
            H = H.replace(/<YUI_INPUT([^>]*)>/g, "<input $1>");
        }
        H = H.replace(/<YUI_UL([^>]*)>/g, "<ul$1>");
        H = H.replace(/<\/YUI_UL>/g, "</ul>");
        H = this.filter_invalid_lists(H);
        H = H.replace(/<YUI_BQ([^>]*)>/g, "<blockquote$1>");
        H = H.replace(/<\/YUI_BQ>/g, "</blockquote>");
        H = H.replace(/<YUI_EMBED([^>]*)>/g, "<embed$1>");
        H = H.replace(/<\/YUI_EMBED>/g, "</embed>");
        H = H.replace(/ &amp; /gi, " YUI_AMP ");
        H = H.replace(/ &amp;/gi, " YUI_AMP_F ");
        H = H.replace(/&amp; /gi, " YUI_AMP_R ");
        H = H.replace(/&amp;/gi, "&");
        H = H.replace(/ YUI_AMP /gi, " &amp; ");
        H = H.replace(/ YUI_AMP_F /gi, " &amp;");
        H = H.replace(/ YUI_AMP_R /gi, "&amp; ");
        H = YAHOO.lang.trim(H);
        if (this.get("removeLineBreaks")) {
            H = H.replace(/\n/g, "").replace(/\r/g, "");
            H = H.replace(/  /gi, " ");
        }
        for (var E in this.invalidHTML) {
            if (YAHOO.lang.hasOwnProperty(this.invalidHTML, E)) {
                if (D.isObject(E) && E.keepContents) {
                    H = H.replace(new RegExp("<" + E + "([^>]*)>(.*?)</" + E + ">", "gi"), "$1");
                } else {
                    H = H.replace(new RegExp("<" + E + "([^>]*)>(.*?)</" + E + ">", "gi"), "");
                }
            }
        }
        this.fireEvent("cleanHTML", {type:"cleanHTML", target:this, html:H});
        return H;
    }, filter_msword:function (E) {
        if (!this.get("filterWord")) {
            return E;
        }
        E = E.replace(/<o:p>\s*<\/o:p>/g, "");
        E = E.replace(/<o:p>[\s\S]*?<\/o:p>/g, "&nbsp;");
        E = E.replace(/<w:[^>]*>[\s\S]*?<\/w:[^>]*>/gi, "");
        E = E.replace(/\s*mso-[^:]+:[^;"]+;?/gi, "");
        E = E.replace(/\s*MARGIN: 0cm 0cm 0pt\s*;/gi, "");
        E = E.replace(/\s*MARGIN: 0cm 0cm 0pt\s*"/gi, '"');
        E = E.replace(/\s*TEXT-INDENT: 0cm\s*;/gi, "");
        E = E.replace(/\s*TEXT-INDENT: 0cm\s*"/gi, '"');
        E = E.replace(/\s*PAGE-BREAK-BEFORE: [^\s;]+;?"/gi, '"');
        E = E.replace(/\s*FONT-VARIANT: [^\s;]+;?"/gi, '"');
        E = E.replace(/\s*tab-stops:[^;"]*;?/gi, "");
        E = E.replace(/\s*tab-stops:[^"]*/gi, "");
        E = E.replace(/<\\?\?xml[^>]*>/gi, "");
        E = E.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/gi, "<$1$3");
        E = E.replace(/<(\w[^>]*) language=([^ |>]*)([^>]*)/gi, "<$1$3");
        E = E.replace(/<(\w[^>]*) onmouseover="([^\"]*)"([^>]*)/gi, "<$1$3");
        E = E.replace(/<(\w[^>]*) onmouseout="([^\"]*)"([^>]*)/gi, "<$1$3");
        return E;
    }, filter_invalid_lists:function (E) {
        E = E.replace(/<\/li>\n/gi, "</li>");
        E = E.replace(/<\/li><ol>/gi, "</li><li><ol>");
        E = E.replace(/<\/ol>/gi, "</ol></li>");
        E = E.replace(/<\/ol><\/li>\n/gi, "</ol>");
        E = E.replace(/<\/li><ul>/gi, "</li><li><ul>");
        E = E.replace(/<\/ul>/gi, "</ul></li>");
        E = E.replace(/<\/ul><\/li>\n?/gi, "</ul>");
        E = E.replace(/<\/li>/gi, "</li>");
        E = E.replace(/<\/ol>/gi, "</ol>");
        E = E.replace(/<ol>/gi, "<ol>");
        E = E.replace(/<ul>/gi, "<ul>");
        return E;
    }, filter_safari:function (E) {
        if (this.browser.webkit) {
            E = E.replace(/<span class="Apple-tab-span" style="white-space:pre">([^>])<\/span>/gi, "&nbsp;&nbsp;&nbsp;&nbsp;");
            E = E.replace(/Apple-style-span/gi, "");
            E = E.replace(/style="line-height: normal;"/gi, "");
            E = E.replace(/yui-wk-div/gi, "");
            E = E.replace(/yui-wk-p/gi, "");
            E = E.replace(/<li><\/li>/gi, "");
            E = E.replace(/<li> <\/li>/gi, "");
            E = E.replace(/<li>  <\/li>/gi, "");
            if (this.get("ptags")) {
                E = E.replace(/<div([^>]*)>/g, "<p$1>");
                E = E.replace(/<\/div>/gi, "</p>");
            } else {
                E = E.replace(/<div([^>]*)>([ tnr]*)<\/div>/gi, "<br>");
                E = E.replace(/<\/div>/gi, "");
            }
        }
        return E;
    }, filter_internals:function (E) {
        E = E.replace(/\r/g, "");
        E = E.replace(/<\/?(body|head|html)[^>]*>/gi, "");
        E = E.replace(/<YUI_BR><\/li>/gi, "</li>");
        E = E.replace(/yui-tag-span/gi, "");
        E = E.replace(/yui-tag/gi, "");
        E = E.replace(/yui-non/gi, "");
        E = E.replace(/yui-img/gi, "");
        E = E.replace(/ tag="span"/gi, "");
        E = E.replace(/ class=""/gi, "");
        E = E.replace(/ style=""/gi, "");
        E = E.replace(/ class=" "/gi, "");
        E = E.replace(/ class="  "/gi, "");
        E = E.replace(/ target=""/gi, "");
        E = E.replace(/ title=""/gi, "");
        if (this.browser.ie) {
            E = E.replace(/ class= /gi, "");
            E = E.replace(/ class= >/gi, "");
        }
        return E;
    }, filter_all_rgb:function (I) {
        var H = new RegExp("rgb\\s*?\\(\\s*?([0-9]+).*?,\\s*?([0-9]+).*?,\\s*?([0-9]+).*?\\)", "gi");
        var E = I.match(H);
        if (D.isArray(E)) {
            for (var G = 0; G < E.length; G++) {
                var F = this.filter_rgb(E[G]);
                I = I.replace(E[G].toString(), F);
            }
        }
        return I;
    }, filter_rgb:function (G) {
        if (G.toLowerCase().indexOf("rgb") != -1) {
            var J = new RegExp("(.*?)rgb\\s*?\\(\\s*?([0-9]+).*?,\\s*?([0-9]+).*?,\\s*?([0-9]+).*?\\)(.*?)", "gi");
            var F = G.replace(J, "$1,$2,$3,$4,$5").split(",");
            if (F.length == 5) {
                var I = parseInt(F[1], 10).toString(16);
                var H = parseInt(F[2], 10).toString(16);
                var E = parseInt(F[3], 10).toString(16);
                I = I.length == 1 ? "0" + I : I;
                H = H.length == 1 ? "0" + H : H;
                E = E.length == 1 ? "0" + E : E;
                G = "#" + I + H + E;
            }
        }
        return G;
    }, pre_filter_linebreaks:function (F, E) {
        if (this.browser.webkit) {
            F = F.replace(/<br class="khtml-block-placeholder">/gi, "<YUI_BR>");
            F = F.replace(/<br class="webkit-block-placeholder">/gi, "<YUI_BR>");
        }
        F = F.replace(/<br>/gi, "<YUI_BR>");
        F = F.replace(/<br (.*?)>/gi, "<YUI_BR>");
        F = F.replace(/<br\/>/gi, "<YUI_BR>");
        F = F.replace(/<br \/>/gi, "<YUI_BR>");
        F = F.replace(/<div><YUI_BR><\/div>/gi, "<YUI_BR>");
        F = F.replace(/<p>(&nbsp;|&#160;)<\/p>/g, "<YUI_BR>");
        F = F.replace(/<p><br>&nbsp;<\/p>/gi, "<YUI_BR>");
        F = F.replace(/<p>&nbsp;<\/p>/gi, "<YUI_BR>");
        F = F.replace(/<YUI_BR>$/, "");
        F = F.replace(/<YUI_BR><\/p>/g, "</p>");
        if (this.browser.ie) {
            F = F.replace(/&nbsp;&nbsp;&nbsp;&nbsp;/g, "\t");
        }
        return F;
    }, post_filter_linebreaks:function (F, E) {
        if (E == "xhtml") {
            F = F.replace(/<YUI_BR>/g, "<br />");
        } else {
            F = F.replace(/<YUI_BR>/g, "<br>");
        }
        return F;
    }, clearEditorDoc:function () {
        this._getDoc().body.innerHTML = "&nbsp;";
    }, openWindow:function (E) {
    }, moveWindow:function () {
    }, _closeWindow:function () {
    }, closeWindow:function () {
        this.toolbar.resetAllButtons();
        this.focus();
    }, destroy:function () {
        if (this._nodeChangeDelayTimer) {
            clearTimeout(this._nodeChangeDelayTimer);
        }
        this.hide();
        if (this.resize) {
            this.resize.destroy();
        }
        if (this.dd) {
            this.dd.unreg();
        }
        if (this.get("panel")) {
            this.get("panel").destroy();
        }
        this.saveHTML();
        this.toolbar.destroy();
        this.setStyle("visibility", "visible");
        this.setStyle("position", "static");
        this.setStyle("top", "");
        this.setStyle("left", "");
        var E = this.get("element");
        this.get("element_cont").get("parentNode").replaceChild(E, this.get("element_cont").get("element"));
        this.get("element_cont").get("element").innerHTML = "";
        this.set("handleSubmit", false);
        return true;
    }, toString:function () {
        var E = "SimpleEditor";
        if (this.get && this.get("element_cont")) {
            E = "SimpleEditor (#" + this.get("element_cont").get("id") + ")" + ((this.get("disabled") ? " Disabled" : ""));
        }
        return E;
    }});
    YAHOO.widget.EditorInfo = {_instances:{}, blankImage:"", window:{}, panel:null, getEditorById:function (E) {
        if (!YAHOO.lang.isString(E)) {
            E = E.id;
        }
        if (this._instances[E]) {
            return this._instances[E];
        }
        return false;
    }, saveAll:function (G) {
        var F, H, E = YAHOO.widget.EditorInfo._instances;
        if (G) {
            for (F in E) {
                if (D.hasOwnProperty(E, F)) {
                    H = E[F];
                    if (H.get("element").form && (H.get("element").form == G)) {
                        H.saveHTML();
                    }
                }
            }
        } else {
            for (F in E) {
                if (D.hasOwnProperty(E, F)) {
                    E[F].saveHTML();
                }
            }
        }
    }, toString:function () {
        var E = 0;
        for (var F in this._instances) {
            if (D.hasOwnProperty(this._instances, F)) {
                E++;
            }
        }
        return"Editor Info (" + E + " registered intance" + ((E > 1) ? "s" : "") + ")";
    }};
})();
(function () {
    var C = YAHOO.util.Dom, A = YAHOO.util.Event, D = YAHOO.lang, B = YAHOO.widget.Toolbar;
    YAHOO.widget.Editor = function (F, E) {
        YAHOO.widget.Editor.superclass.constructor.call(this, F, E);
    };
    YAHOO.extend(YAHOO.widget.Editor, YAHOO.widget.SimpleEditor, {_undoCache:null, _undoLevel:null, _hasUndoLevel:function () {
        return((this._undoCache.length > 1) && this._undoLevel);
    }, _undoNodeChange:function () {
        var E = this.toolbar.getButtonByValue("undo"), F = this.toolbar.getButtonByValue("redo");
        if (E && F) {
            if (this._hasUndoLevel()) {
                this.toolbar.enableButton(E);
            }
            if (this._undoLevel < this._undoCache.length) {
                this.toolbar.enableButton(F);
            }
        }
        this._lastCommand = null;
    }, _checkUndo:function () {
        var E = this._undoCache.length, G = [];
        if (E >= this.get("maxUndo")) {
            for (var F = (E - this.get("maxUndo")); F < E; F++) {
                G.push(this._undoCache[F]);
            }
            this._undoCache = G;
        }
    }, _putUndo:function (F) {
        if (this._undoLevel === this._undoCache.length) {
            this._undoCache.push(F);
            this._undoLevel = this._undoCache.length;
        } else {
            var F = this.getEditorHTML();
            var E = this._undoCache[this._undoLevel];
            if (E) {
                if (F !== E) {
                    this._undoCache = [];
                    this._undoLevel = 0;
                }
            }
        }
    }, _getUndo:function (E) {
        this._undoLevel = E;
        return this._undoCache[E];
    }, _storeUndo:function () {
        if (this._lastCommand === "undo" || this._lastCommand === "redo") {
            return false;
        }
        if (!this._undoCache) {
            this._undoCache = [];
            this._undoLevel = 0;
        }
        this._checkUndo();
        var F = this.getEditorHTML();
        var E = this._undoCache[this._undoLevel - 1];
        if (E) {
            if (F !== E) {
                this._putUndo(F);
            }
        } else {
            this._putUndo(F);
        }
        this._undoNodeChange();
    }, STR_BEFORE_EDITOR:"This text field can contain stylized text and graphics. To cycle through all formatting options, use the keyboard shortcut Control + Shift + T to place focus on the toolbar and navigate between option heading names. <h4>Common formatting keyboard shortcuts:</h4><ul><li>Control Shift B sets text to bold</li> <li>Control Shift I sets text to italic</li> <li>Control Shift U underlines text</li> <li>Control Shift [ aligns text left</li> <li>Control Shift | centers text</li> <li>Control Shift ] aligns text right</li> <li>Control Shift L adds an HTML link</li> <li>To exit this text editor use the keyboard shortcut Control + Shift + ESC.</li></ul>", STR_CLOSE_WINDOW:"Close Window", STR_CLOSE_WINDOW_NOTE:"To close this window use the Control + Shift + W key", STR_IMAGE_PROP_TITLE:"Image Options", STR_IMAGE_TITLE:"Description", STR_IMAGE_SIZE:"Size", STR_IMAGE_ORIG_SIZE:"Original Size", STR_IMAGE_COPY:'<span class="tip"><span class="icon icon-info"></span><strong>Note:</strong>To move this image just highlight it, cut, and paste where ever you\'d like.</span>', STR_IMAGE_PADDING:"Padding", STR_IMAGE_BORDER:"Border", STR_IMAGE_BORDER_SIZE:"Border Size", STR_IMAGE_BORDER_TYPE:"Border Type", STR_IMAGE_TEXTFLOW:"Text Flow", STR_LOCAL_FILE_WARNING:'<span class="tip"><span class="icon icon-warn"></span><strong>Note:</strong>This image/link points to a file on your computer and will not be accessible to others on the internet.</span>', STR_LINK_PROP_TITLE:"Link Options", STR_LINK_PROP_REMOVE:"Remove link from text", STR_LINK_NEW_WINDOW:"Open in a new window.", STR_LINK_TITLE:"Description", STR_NONE:"none", CLASS_LOCAL_FILE:"warning-localfile", CLASS_HIDDEN:"yui-hidden", init:function (F, E) {
        this._windows = {};
        if (!this._defaultToolbar) {
            this._defaultToolbar = {collapse:true, titlebar:"Text Editing Tools", draggable:false, buttonType:"advanced", buttons:[
                {group:"fontstyle", label:"Font Name and Size", buttons:[
                    {type:"select", label:"Arial", value:"fontname", disabled:true, menu:[
                        {text:"Arial", checked:true},
                        {text:"Arial Black"},
                        {text:"Comic Sans MS"},
                        {text:"Courier New"},
                        {text:"Lucida Console"},
                        {text:"Tahoma"},
                        {text:"Times New Roman"},
                        {text:"Trebuchet MS"},
                        {text:"Verdana"}
                    ]},
                    {type:"spin", label:"13", value:"fontsize", range:[9, 75], disabled:true}
                ]},
                {type:"separator"},
                {group:"textstyle", label:"Font Style", buttons:[
                    {type:"push", label:"Bold CTRL + SHIFT + B", value:"bold"},
                    {type:"push", label:"Italic CTRL + SHIFT + I", value:"italic"},
                    {type:"push", label:"Underline CTRL + SHIFT + U", value:"underline"},
                    {type:"separator"},
                    {type:"push", label:"Subscript", value:"subscript", disabled:true},
                    {type:"push", label:"Superscript", value:"superscript", disabled:true}
                ]},
                {type:"separator"},
                {group:"textstyle2", label:"&nbsp;", buttons:[
                    {type:"color", label:"Font Color", value:"forecolor", disabled:true},
                    {type:"color", label:"Background Color", value:"backcolor", disabled:true},
                    {type:"separator"},
                    {type:"push", label:"Remove Formatting", value:"removeformat", disabled:true},
                    {type:"push", label:"Show/Hide Hidden Elements", value:"hiddenelements"}
                ]},
                {type:"separator"},
                {group:"undoredo", label:"Undo/Redo", buttons:[
                    {type:"push", label:"Undo", value:"undo", disabled:true},
                    {type:"push", label:"Redo", value:"redo", disabled:true}
                ]},
                {type:"separator"},
                {group:"alignment", label:"Alignment", buttons:[
                    {type:"push", label:"Align Left CTRL + SHIFT + [", value:"justifyleft"},
                    {type:"push", label:"Align Center CTRL + SHIFT + |", value:"justifycenter"},
                    {type:"push", label:"Align Right CTRL + SHIFT + ]", value:"justifyright"},
                    {type:"push", label:"Justify", value:"justifyfull"}
                ]},
                {type:"separator"},
                {group:"parastyle", label:"Paragraph Style", buttons:[
                    {type:"select", label:"Normal", value:"heading", disabled:true, menu:[
                        {text:"Normal", value:"none", checked:true},
                        {text:"Header 1", value:"h1"},
                        {text:"Header 2", value:"h2"},
                        {text:"Header 3", value:"h3"},
                        {text:"Header 4", value:"h4"},
                        {text:"Header 5", value:"h5"},
                        {text:"Header 6", value:"h6"}
                    ]}
                ]},
                {type:"separator"},
                {group:"indentlist2", label:"Indenting and Lists", buttons:[
                    {type:"push", label:"Indent", value:"indent", disabled:true},
                    {type:"push", label:"Outdent", value:"outdent", disabled:true},
                    {type:"push", label:"Create an Unordered List", value:"insertunorderedlist"},
                    {type:"push", label:"Create an Ordered List", value:"insertorderedlist"}
                ]},
                {type:"separator"},
                {group:"insertitem", label:"Insert Item", buttons:[
                    {type:"push", label:"HTML Link CTRL + SHIFT + L", value:"createlink", disabled:true},
                    {type:"push", label:"Insert Image", value:"insertimage"}
                ]}
            ]};
        }
        if (!this._defaultImageToolbarConfig) {
            this._defaultImageToolbarConfig = {buttonType:this._defaultToolbar.buttonType, buttons:[
                {group:"textflow", label:this.STR_IMAGE_TEXTFLOW + ":", buttons:[
                    {type:"push", label:"Left", value:"left"},
                    {type:"push", label:"Inline", value:"inline"},
                    {type:"push", label:"Block", value:"block"},
                    {type:"push", label:"Right", value:"right"}
                ]},
                {type:"separator"},
                {group:"padding", label:this.STR_IMAGE_PADDING + ":", buttons:[
                    {type:"spin", label:"0", value:"padding", range:[0, 50]}
                ]},
                {type:"separator"},
                {group:"border", label:this.STR_IMAGE_BORDER + ":", buttons:[
                    {type:"select", label:this.STR_IMAGE_BORDER_SIZE, value:"bordersize", menu:[
                        {text:"none", value:"0", checked:true},
                        {text:"1px", value:"1"},
                        {text:"2px", value:"2"},
                        {text:"3px", value:"3"},
                        {text:"4px", value:"4"},
                        {text:"5px", value:"5"}
                    ]},
                    {type:"select", label:this.STR_IMAGE_BORDER_TYPE, value:"bordertype", disabled:true, menu:[
                        {text:"Solid", value:"solid", checked:true},
                        {text:"Dashed", value:"dashed"},
                        {text:"Dotted", value:"dotted"}
                    ]},
                    {type:"color", label:"Border Color", value:"bordercolor", disabled:true}
                ]}
            ]};
        }
        YAHOO.widget.Editor.superclass.init.call(this, F, E);
    }, _render:function () {
        YAHOO.widget.Editor.superclass._render.apply(this, arguments);
        var E = this;
        window.setTimeout(function () {
            E._renderPanel.call(E);
        }, 800);
    }, initAttributes:function (E) {
        YAHOO.widget.Editor.superclass.initAttributes.call(this, E);
        this.setAttributeConfig("localFileWarning", {value:E.locaFileWarning || true});
        this.setAttributeConfig("hiddencss", {value:E.hiddencss || ".yui-hidden font, .yui-hidden strong, .yui-hidden b, .yui-hidden em, .yui-hidden i, .yui-hidden u, .yui-hidden div,.yui-hidden p,.yui-hidden span,.yui-hidden img, .yui-hidden ul, .yui-hidden ol, .yui-hidden li, .yui-hidden table { border: 1px dotted #ccc; } .yui-hidden .yui-non { border: none; } .yui-hidden img { padding: 2px; }", writeOnce:true});
    }, _windows:null, _defaultImageToolbar:null, _defaultImageToolbarConfig:null, _fixNodes:function () {
        YAHOO.widget.Editor.superclass._fixNodes.call(this);
        try {
            var H = "";
            var J = this._getDoc().getElementsByTagName("img");
            for (var F = 0; F < J.length; F++) {
                if (J[F].getAttribute("href", 2)) {
                    H = J[F].getAttribute("src", 2);
                    if (this._isLocalFile(H)) {
                        C.addClass(J[F], this.CLASS_LOCAL_FILE);
                    } else {
                        C.removeClass(J[F], this.CLASS_LOCAL_FILE);
                    }
                }
            }
            var G = this._getDoc().body.getElementsByTagName("a");
            for (var E = 0; E < G.length; E++) {
                if (G[E].getAttribute("href", 2)) {
                    H = G[E].getAttribute("href", 2);
                    if (this._isLocalFile(H)) {
                        C.addClass(G[E], this.CLASS_LOCAL_FILE);
                    } else {
                        C.removeClass(G[E], this.CLASS_LOCAL_FILE);
                    }
                }
            }
        } catch (I) {
        }
    }, _disabled:["createlink", "forecolor", "backcolor", "fontname", "fontsize", "superscript", "subscript", "removeformat", "heading", "indent"], _alwaysDisabled:{"outdent":true}, _alwaysEnabled:{hiddenelements:true}, _handleKeyDown:function (G) {
        YAHOO.widget.Editor.superclass._handleKeyDown.call(this, G);
        var F = false, H = null, E = false;
        switch (G.keyCode) {
            case this._keyMap.JUSTIFY_LEFT.key:
                if (this._checkKey(this._keyMap.JUSTIFY_LEFT, G)) {
                    H = "justifyleft";
                    F = true;
                }
                break;
            case this._keyMap.JUSTIFY_CENTER.key:
                if (this._checkKey(this._keyMap.JUSTIFY_CENTER, G)) {
                    H = "justifycenter";
                    F = true;
                }
                break;
            case 221:
            case this._keyMap.JUSTIFY_RIGHT.key:
                if (this._checkKey(this._keyMap.JUSTIFY_RIGHT, G)) {
                    H = "justifyright";
                    F = true;
                }
                break;
        }
        if (F && H) {
            this.execCommand(H, null);
            A.stopEvent(G);
            this.nodeChange();
        }
    }, _renderCreateLinkWindow:function () {
        var H = '<label for="' + this.get("id") + '_createlink_url"><strong>' + this.STR_LINK_URL + ':</strong> <input type="text" name="' + this.get("id") + '_createlink_url" id="' + this.get("id") + '_createlink_url" value=""></label>';
        H += '<label for="' + this.get("id") + '_createlink_target"><strong>&nbsp;</strong><input type="checkbox" name="' + this.get("id") + '_createlink_target" id="' + this.get("id") + '_createlink_target" value="_blank" class="createlink_target"> ' + this.STR_LINK_NEW_WINDOW + "</label>";
        H += '<label for="' + this.get("id") + '_createlink_title"><strong>' + this.STR_LINK_TITLE + ':</strong> <input type="text" name="' + this.get("id") + '_createlink_title" id="' + this.get("id") + '_createlink_title" value=""></label>';
        var E = document.createElement("div");
        E.innerHTML = H;
        var G = document.createElement("div");
        G.className = "removeLink";
        var F = document.createElement("a");
        F.href = "#";
        F.innerHTML = this.STR_LINK_PROP_REMOVE;
        F.title = this.STR_LINK_PROP_REMOVE;
        A.on(F, "click", function (I) {
            A.stopEvent(I);
            this.unsubscribeAll("afterExecCommand");
            this.execCommand("unlink");
            this.closeWindow();
        }, this, true);
        G.appendChild(F);
        E.appendChild(G);
        this._windows.createlink = {};
        this._windows.createlink.body = E;
        A.on(E, "keyup", function (I) {
            A.stopPropagation(I);
        });
        this.get("panel").editor_form.appendChild(E);
        this.fireEvent("windowCreateLinkRender", {type:"windowCreateLinkRender", panel:this.get("panel"), body:E});
        return E;
    }, _handleCreateLinkClick:function () {
        var E = this._getSelectedElement();
        if (this._isElement(E, "img")) {
            this.STOP_EXEC_COMMAND = true;
            this.currentElement[0] = E;
            this.toolbar.fireEvent("insertimageClick", {type:"insertimageClick", target:this.toolbar});
            this.fireEvent("afterExecCommand", {type:"afterExecCommand", target:this});
            return false;
        }
        if (this.get("limitCommands")) {
            if (!this.toolbar.getButtonByValue("createlink")) {
                return false;
            }
        }
        this.on("afterExecCommand", function () {
            var K = new YAHOO.widget.EditorWindow("createlink", {width:"350px"});
            var I = this.currentElement[0], H = "", L = "", J = "", G = false;
            if (I) {
                K.el = I;
                if (I.getAttribute("href", 2) !== null) {
                    H = I.getAttribute("href", 2);
                    if (this._isLocalFile(H)) {
                        K.setFooter(this.STR_LOCAL_FILE_WARNING);
                        G = true;
                    } else {
                        K.setFooter(" ");
                    }
                }
                if (I.getAttribute("title") !== null) {
                    L = I.getAttribute("title");
                }
                if (I.getAttribute("target") !== null) {
                    J = I.getAttribute("target");
                }
            }
            var F = null;
            if (this._windows.createlink && this._windows.createlink.body) {
                F = this._windows.createlink.body;
            } else {
                F = this._renderCreateLinkWindow();
            }
            K.setHeader(this.STR_LINK_PROP_TITLE);
            K.setBody(F);
            A.purgeElement(this.get("id") + "_createlink_url");
            C.get(this.get("id") + "_createlink_url").value = H;
            C.get(this.get("id") + "_createlink_title").value = L;
            C.get(this.get("id") + "_createlink_target").checked = ((J) ? true : false);
            A.onAvailable(this.get("id") + "_createlink_url", function () {
                var M = this.get("id");
                window.setTimeout(function () {
                    try {
                        YAHOO.util.Dom.get(M + "_createlink_url").focus();
                    } catch (N) {
                    }
                }, 50);
                if (this._isLocalFile(H)) {
                    C.addClass(this.get("id") + "_createlink_url", "warning");
                    this.get("panel").setFooter(this.STR_LOCAL_FILE_WARNING);
                } else {
                    C.removeClass(this.get("id") + "_createlink_url", "warning");
                    this.get("panel").setFooter(" ");
                }
                A.on(this.get("id") + "_createlink_url", "blur", function () {
                    var N = C.get(this.get("id") + "_createlink_url");
                    if (this._isLocalFile(N.value)) {
                        C.addClass(N, "warning");
                        this.get("panel").setFooter(this.STR_LOCAL_FILE_WARNING);
                    } else {
                        C.removeClass(N, "warning");
                        this.get("panel").setFooter(" ");
                    }
                }, this, true);
            }, this, true);
            this.openWindow(K);
        });
    }, _handleCreateLinkWindowClose:function () {
        var G = C.get(this.get("id") + "_createlink_url"), I = C.get(this.get("id") + "_createlink_target"), K = C.get(this.get("id") + "_createlink_title"), H = arguments[0].win.el, E = H;
        if (G && G.value) {
            var J = G.value;
            if ((J.indexOf(":/" + "/") == -1) && (J.substring(0, 1) != "/") && (J.substring(0, 6).toLowerCase() != "mailto")) {
                if ((J.indexOf("@") != -1) && (J.substring(0, 6).toLowerCase() != "mailto")) {
                    J = "mailto:" + J;
                } else {
                    if (J.substring(0, 1) != "#") {
                        J = "http:/" + "/" + J;
                    }
                }
            }
            H.setAttribute("href", J);
            if (I.checked) {
                H.setAttribute("target", I.value);
            } else {
                H.setAttribute("target", "");
            }
            H.setAttribute("title", ((K.value) ? K.value : ""));
        } else {
            var F = this._getDoc().createElement("span");
            F.innerHTML = H.innerHTML;
            C.addClass(F, "yui-non");
            H.parentNode.replaceChild(F, H);
        }
        C.removeClass(G, "warning");
        C.get(this.get("id") + "_createlink_url").value = "";
        C.get(this.get("id") + "_createlink_title").value = "";
        C.get(this.get("id") + "_createlink_target").checked = false;
        this.nodeChange();
        this.currentElement = [];
    }, _renderInsertImageWindow:function () {
        var G = this.currentElement[0];
        var M = '<label for="' + this.get("id") + '_insertimage_url"><strong>' + this.STR_IMAGE_URL + ':</strong> <input type="text" id="' + this.get("id") + '_insertimage_url" value="" size="40"></label>';
        var K = document.createElement("div");
        K.innerHTML = M;
        var J = document.createElement("div");
        J.id = this.get("id") + "_img_toolbar";
        K.appendChild(J);
        var I = '<label for="' + this.get("id") + '_insertimage_title"><strong>' + this.STR_IMAGE_TITLE + ':</strong> <input type="text" id="' + this.get("id") + '_insertimage_title" value="" size="40"></label>';
        I += '<label for="' + this.get("id") + '_insertimage_link"><strong>' + this.STR_LINK_URL + ':</strong> <input type="text" name="' + this.get("id") + '_insertimage_link" id="' + this.get("id") + '_insertimage_link" value=""></label>';
        I += '<label for="' + this.get("id") + '_insertimage_target"><strong>&nbsp;</strong><input type="checkbox" name="' + this.get("id") + '_insertimage_target_" id="' + this.get("id") + '_insertimage_target" value="_blank" class="insertimage_target"> ' + this.STR_LINK_NEW_WINDOW + "</label>";
        var E = document.createElement("div");
        E.innerHTML = I;
        K.appendChild(E);
        var F = {};
        D.augmentObject(F, this._defaultImageToolbarConfig);
        var H = new YAHOO.widget.Toolbar(J, F);
        H.editor_el = G;
        this._defaultImageToolbar = H;
        var N = H.get("cont");
        var L = document.createElement("div");
        L.className = "yui-toolbar-group yui-toolbar-group-height-width height-width";
        L.innerHTML = "<h3>" + this.STR_IMAGE_SIZE + ":</h3>";
        L.innerHTML += '<span tabIndex="-1"><input type="text" size="3" value="" id="' + this.get("id") + '_insertimage_width"> x <input type="text" size="3" value="" id="' + this.get("id") + '_insertimage_height"></span>';
        N.insertBefore(L, N.firstChild);
        A.onAvailable(this.get("id") + "_insertimage_width", function () {
            A.on(this.get("id") + "_insertimage_width", "blur", function () {
                var O = parseInt(C.get(this.get("id") + "_insertimage_width").value, 10);
                if (O > 5) {
                    this._defaultImageToolbar.editor_el.style.width = O + "px";
                }
            }, this, true);
        }, this, true);
        A.onAvailable(this.get("id") + "_insertimage_height", function () {
            A.on(this.get("id") + "_insertimage_height", "blur", function () {
                var O = parseInt(C.get(this.get("id") + "_insertimage_height").value, 10);
                if (O > 5) {
                    this._defaultImageToolbar.editor_el.style.height = O + "px";
                }
            }, this, true);
        }, this, true);
        H.on("colorPickerClicked", function (T) {
            var P = "1", S = "solid", O = "black", R = this._defaultImageToolbar.editor_el;
            if (R.style.borderLeftWidth) {
                P = parseInt(R.style.borderLeftWidth, 10);
            }
            if (R.style.borderLeftStyle) {
                S = R.style.borderLeftStyle;
            }
            if (R.style.borderLeftColor) {
                O = R.style.borderLeftColor;
            }
            var Q = P + "px " + S + " #" + T.color;
            R.style.border = Q;
        }, this, true);
        H.on("buttonClick", function (V) {
            var T = V.button.value, S = this._defaultImageToolbar.editor_el, R = "";
            if (V.button.menucmd) {
                T = V.button.menucmd;
            }
            var P = "1", Q = "solid", O = "black";
            if (S.style.borderLeftWidth) {
                P = parseInt(S.style.borderLeftWidth, 10);
            }
            if (S.style.borderLeftStyle) {
                Q = S.style.borderLeftStyle;
            }
            if (S.style.borderLeftColor) {
                O = S.style.borderLeftColor;
            }
            switch (T) {
                case"bordersize":
                    if (this.browser.webkit && this._lastImage) {
                        C.removeClass(this._lastImage, "selected");
                        this._lastImage = null;
                    }
                    R = parseInt(V.button.value, 10) + "px " + Q + " " + O;
                    S.style.border = R;
                    if (parseInt(V.button.value, 10) > 0) {
                        H.enableButton("bordertype");
                        H.enableButton("bordercolor");
                    } else {
                        H.disableButton("bordertype");
                        H.disableButton("bordercolor");
                    }
                    break;
                case"bordertype":
                    if (this.browser.webkit && this._lastImage) {
                        C.removeClass(this._lastImage, "selected");
                        this._lastImage = null;
                    }
                    R = P + "px " + V.button.value + " " + O;
                    S.style.border = R;
                    break;
                case"right":
                case"left":
                    H.deselectAllButtons();
                    S.style.display = "";
                    S.align = V.button.value;
                    break;
                case"inline":
                    H.deselectAllButtons();
                    S.style.display = "";
                    S.align = "";
                    break;
                case"block":
                    H.deselectAllButtons();
                    S.style.display = "block";
                    S.align = "center";
                    break;
                case"padding":
                    var U = H.getButtonById(V.button.id);
                    S.style.margin = U.get("label") + "px";
                    break;
            }
            H.selectButton(V.button.value);
            if (T !== "padding") {
                this.moveWindow();
            }
        }, this, true);
        if (this.get("localFileWarning")) {
            A.on(this.get("id") + "_insertimage_link", "blur", function () {
                var O = C.get(this.get("id") + "_insertimage_link");
                if (this._isLocalFile(O.value)) {
                    C.addClass(O, "warning");
                    this.get("panel").setFooter(this.STR_LOCAL_FILE_WARNING);
                } else {
                    C.removeClass(O, "warning");
                    this.get("panel").setFooter(" ");
                    if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {
                        this.get("panel").setFooter(this.STR_IMAGE_COPY);
                    }
                }
            }, this, true);
        }
        A.on(this.get("id") + "_insertimage_url", "blur", function () {
            var Q = C.get(this.get("id") + "_insertimage_url"), R = this.currentElement[0];
            if (Q.value && R) {
                if (Q.value == R.getAttribute("src", 2)) {
                    return false;
                }
            }
            if (this._isLocalFile(Q.value)) {
                C.addClass(Q, "warning");
                this.get("panel").setFooter(this.STR_LOCAL_FILE_WARNING);
            } else {
                if (this.currentElement[0]) {
                    C.removeClass(Q, "warning");
                    this.get("panel").setFooter(" ");
                    if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {
                        this.get("panel").setFooter(this.STR_IMAGE_COPY);
                    }
                    if (Q && Q.value && (Q.value != this.STR_IMAGE_HERE)) {
                        this.currentElement[0].setAttribute("src", Q.value);
                        var P = this, O = new Image();
                        O.onerror = function () {
                            Q.value = P.STR_IMAGE_HERE;
                            O.setAttribute("src", P.get("blankimage"));
                            P.currentElement[0].setAttribute("src", P.get("blankimage"));
                            YAHOO.util.Dom.get(P.get("id") + "_insertimage_height").value = O.height;
                            YAHOO.util.Dom.get(P.get("id") + "_insertimage_width").value = O.width;
                        };
                        var S = this.get("id");
                        window.setTimeout(function () {
                            YAHOO.util.Dom.get(S + "_insertimage_height").value = O.height;
                            YAHOO.util.Dom.get(S + "_insertimage_width").value = O.width;
                            if (P.currentElement && P.currentElement[0]) {
                                if (!P.currentElement[0]._height) {
                                    P.currentElement[0]._height = O.height;
                                }
                                if (!P.currentElement[0]._width) {
                                    P.currentElement[0]._width = O.width;
                                }
                            }
                        }, 800);
                        if (Q.value != this.STR_IMAGE_HERE) {
                            O.src = Q.value;
                        }
                    }
                }
            }
        }, this, true);
        this._windows.insertimage = {};
        this._windows.insertimage.body = K;
        this.get("panel").editor_form.appendChild(K);
        this.fireEvent("windowInsertImageRender", {type:"windowInsertImageRender", panel:this.get("panel"), body:K, toolbar:H});
        return K;
    }, _handleInsertImageClick:function () {
        if (this.get("limitCommands")) {
            if (!this.toolbar.getButtonByValue("insertimage")) {
                return false;
            }
        }
        this.on("afterExecCommand", function () {
            var H = this.currentElement[0], O = null, L = "", Z = "", G = null, a = "", K = "", X = "", R = 75, V = 75, Q = 0, M = 0, J = 0, S = false, I = new YAHOO.widget.EditorWindow("insertimage", {width:"415px"});
            if (!H) {
                H = this._getSelectedElement();
            }
            if (H) {
                I.el = H;
                if (H.getAttribute("src")) {
                    K = H.getAttribute("src", 2);
                    if (K.indexOf(this.get("blankimage")) != -1) {
                        K = this.STR_IMAGE_HERE;
                        S = true;
                    }
                }
                if (H.getAttribute("alt", 2)) {
                    a = H.getAttribute("alt", 2);
                }
                if (H.getAttribute("title", 2)) {
                    a = H.getAttribute("title", 2);
                }
                if (H.parentNode && this._isElement(H.parentNode, "a")) {
                    L = H.parentNode.getAttribute("href", 2);
                    if (H.parentNode.getAttribute("target") !== null) {
                        Z = H.parentNode.getAttribute("target");
                    }
                }
                R = parseInt(H.height, 10);
                V = parseInt(H.width, 10);
                if (H.style.height) {
                    R = parseInt(H.style.height, 10);
                }
                if (H.style.width) {
                    V = parseInt(H.style.width, 10);
                }
                if (H.style.margin) {
                    Q = parseInt(H.style.margin, 10);
                }
                if (!S) {
                    if (!H._height) {
                        H._height = R;
                    }
                    if (!H._width) {
                        H._width = V;
                    }
                    M = H._height;
                    J = H._width;
                }
            }
            if (this._windows.insertimage && this._windows.insertimage.body) {
                O = this._windows.insertimage.body;
                this._defaultImageToolbar.resetAllButtons();
            } else {
                O = this._renderInsertImageWindow();
            }
            G = this._defaultImageToolbar;
            G.editor_el = H;
            var F = "0", U = "solid";
            if (H.style.borderLeftWidth) {
                F = parseInt(H.style.borderLeftWidth, 10);
            }
            if (H.style.borderLeftStyle) {
                U = H.style.borderLeftStyle;
            }
            var Y = G.getButtonByValue("bordersize"), W = ((parseInt(F, 10) > 0) ? "" : this.STR_NONE);
            Y.set("label", '<span class="yui-toolbar-bordersize-' + F + '">' + W + "</span>");
            this._updateMenuChecked("bordersize", F, G);
            var N = G.getButtonByValue("bordertype");
            N.set("label", '<span class="yui-toolbar-bordertype-' + U + '">asdfa</span>');
            this._updateMenuChecked("bordertype", U, G);
            if (parseInt(F, 10) > 0) {
                G.enableButton(N);
                G.enableButton(Y);
                G.enableButton("bordercolor");
            }
            if ((H.align == "right") || (H.align == "left")) {
                G.selectButton(H.align);
            } else {
                if (H.style.display == "block") {
                    G.selectButton("block");
                } else {
                    G.selectButton("inline");
                }
            }
            if (parseInt(H.style.marginLeft, 10) > 0) {
                G.getButtonByValue("padding").set("label", "" + parseInt(H.style.marginLeft, 10));
            }
            if (H.style.borderSize) {
                G.selectButton("bordersize");
                G.selectButton(parseInt(H.style.borderSize, 10));
            }
            G.getButtonByValue("padding").set("label", "" + Q);
            I.setHeader(this.STR_IMAGE_PROP_TITLE);
            I.setBody(O);
            if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {
                I.setFooter(this.STR_IMAGE_COPY);
            }
            this.openWindow(I);
            C.get(this.get("id") + "_insertimage_url").value = K;
            C.get(this.get("id") + "_insertimage_title").value = a;
            C.get(this.get("id") + "_insertimage_link").value = L;
            C.get(this.get("id") + "_insertimage_target").checked = ((Z) ? true : false);
            C.get(this.get("id") + "_insertimage_width").value = V;
            C.get(this.get("id") + "_insertimage_height").value = R;
            if (((R != M) || (V != J)) && (!S)) {
                var P = document.createElement("span");
                P.className = "info";
                P.innerHTML = this.STR_IMAGE_ORIG_SIZE + ": (" + J + " x " + M + ")";
                if (C.get(this.get("id") + "_insertimage_height").nextSibling) {
                    var E = C.get(this.get("id") + "_insertimage_height").nextSibling;
                    E.parentNode.removeChild(E);
                }
                C.get(this.get("id") + "_insertimage_height").parentNode.appendChild(P);
            }
            this.toolbar.selectButton("insertimage");
            var T = this.get("id");
            window.setTimeout(function () {
                try {
                    YAHOO.util.Dom.get(T + "_insertimage_url").focus();
                    if (S) {
                        YAHOO.util.Dom.get(T + "_insertimage_url").select();
                    }
                } catch (c) {
                }
            }, 50);
        });
    }, _handleInsertImageWindowClose:function () {
        var E = C.get(this.get("id") + "_insertimage_url"), L = C.get(this.get("id") + "_insertimage_title"), I = C.get(this.get("id") + "_insertimage_link"), J = C.get(this.get("id") + "_insertimage_target"), H = arguments[0].win.el;
        if (E && E.value && (E.value != this.STR_IMAGE_HERE)) {
            H.setAttribute("src", E.value);
            H.setAttribute("title", L.value);
            H.setAttribute("alt", L.value);
            var G = H.parentNode;
            if (I.value) {
                var K = I.value;
                if ((K.indexOf(":/" + "/") == -1) && (K.substring(0, 1) != "/") && (K.substring(0, 6).toLowerCase() != "mailto")) {
                    if ((K.indexOf("@") != -1) && (K.substring(0, 6).toLowerCase() != "mailto")) {
                        K = "mailto:" + K;
                    } else {
                        K = "http:/" + "/" + K;
                    }
                }
                if (G && this._isElement(G, "a")) {
                    G.setAttribute("href", K);
                    if (J.checked) {
                        G.setAttribute("target", J.value);
                    } else {
                        G.setAttribute("target", "");
                    }
                } else {
                    var F = this._getDoc().createElement("a");
                    F.setAttribute("href", K);
                    if (J.checked) {
                        F.setAttribute("target", J.value);
                    } else {
                        F.setAttribute("target", "");
                    }
                    H.parentNode.replaceChild(F, H);
                    F.appendChild(H);
                }
            } else {
                if (G && this._isElement(G, "a")) {
                    G.parentNode.replaceChild(H, G);
                }
            }
        } else {
            H.parentNode.removeChild(H);
        }
        C.get(this.get("id") + "_insertimage_url").value = "";
        C.get(this.get("id") + "_insertimage_title").value = "";
        C.get(this.get("id") + "_insertimage_link").value = "";
        C.get(this.get("id") + "_insertimage_target").checked = false;
        C.get(this.get("id") + "_insertimage_width").value = 0;
        C.get(this.get("id") + "_insertimage_height").value = 0;
        this._defaultImageToolbar.resetAllButtons();
        this.currentElement = [];
        this.nodeChange();
    }, EDITOR_PANEL_ID:"-panel", _renderPanel:function () {
        var H = document.createElement("div");
        C.addClass(H, "yui-editor-panel");
        H.id = this.get("id") + this.EDITOR_PANEL_ID;
        H.style.position = "absolute";
        H.style.top = "-9999px";
        H.style.left = "-9999px";
        document.body.appendChild(H);
        this.get("element_cont").insertBefore(H, this.get("element_cont").get("firstChild"));
        var E = new YAHOO.widget.Overlay(this.get("id") + this.EDITOR_PANEL_ID, {width:"300px", iframe:true, visible:false, underlay:"none", draggable:false, close:false});
        this.set("panel", E);
        E.setBody("---");
        E.setHeader(" ");
        E.setFooter(" ");
        var K = document.createElement("div");
        K.className = this.CLASS_PREFIX + "-body-cont";
        for (var L in this.browser) {
            if (this.browser[L]) {
                C.addClass(K, L);
                break;
            }
        }
        C.addClass(K, ((YAHOO.widget.Button && (this._defaultToolbar.buttonType == "advanced")) ? "good-button" : "no-button"));
        var I = document.createElement("h3");
        I.className = "yui-editor-skipheader";
        I.innerHTML = this.STR_CLOSE_WINDOW_NOTE;
        K.appendChild(I);
        var F = document.createElement("fieldset");
        E.editor_form = F;
        K.appendChild(F);
        var G = document.createElement("span");
        G.innerHTML = "X";
        G.title = this.STR_CLOSE_WINDOW;
        G.className = "close";
        A.on(G, "click", this.closeWindow, this, true);
        var M = document.createElement("span");
        M.innerHTML = "^";
        M.className = "knob";
        E.editor_knob = M;
        var N = document.createElement("h3");
        E.editor_header = N;
        N.innerHTML = "<span></span>";
        E.setHeader(" ");
        E.appendToHeader(N);
        N.appendChild(G);
        N.appendChild(M);
        E.setBody(" ");
        E.setFooter(" ");
        E.appendToBody(K);
        A.on(E.element, "click", function (O) {
            A.stopPropagation(O);
        });
        var J = function () {
            E.bringToTop();
            YAHOO.util.Dom.setStyle(this.element, "display", "block");
            this._handleWindowInputs(false);
        };
        E.showEvent.subscribe(J, this, true);
        E.hideEvent.subscribe(function () {
            this._handleWindowInputs(true);
        }, this, true);
        E.renderEvent.subscribe(function () {
            this._renderInsertImageWindow();
            this._renderCreateLinkWindow();
            this.fireEvent("windowRender", {type:"windowRender", panel:E});
            this._handleWindowInputs(true);
        }, this, true);
        if (this.DOMReady) {
            this.get("panel").render();
        } else {
            A.onDOMReady(function () {
                this.get("panel").render();
            }, this, true);
        }
        return this.get("panel");
    }, _handleWindowInputs:function (F) {
        if (!D.isBoolean(F)) {
            F = false;
        }
        var E = this.get("panel").element.getElementsByTagName("input");
        for (var G = 0; G < E.length; G++) {
            try {
                E[G].disabled = F;
            } catch (H) {
            }
        }
    }, openWindow:function (K) {
        var P = this;
        window.setTimeout(function () {
            P.toolbar.set("disabled", true);
        }, 10);
        A.on(document, "keydown", this._closeWindow, this, true);
        if (this.currentWindow) {
            this.closeWindow();
        }
        var Q = C.getXY(this.currentElement[0]), N = C.getXY(this.get("iframe").get("element")), E = this.get("panel"), H = [(Q[0] + N[0] - 20), (Q[1] + N[1] + 10)], G = (parseInt(K.attrs.width, 10) / 2), L = "center", J = null;
        this.fireEvent("beforeOpenWindow", {type:"beforeOpenWindow", win:K, panel:E});
        var F = E.editor_form;
        var I = this._windows;
        for (var O in I) {
            if (D.hasOwnProperty(I, O)) {
                if (I[O] && I[O].body) {
                    if (O == K.name) {
                        C.setStyle(I[O].body, "display", "block");
                    } else {
                        C.setStyle(I[O].body, "display", "none");
                    }
                }
            }
        }
        if (this._windows[K.name].body) {
            C.setStyle(this._windows[K.name].body, "display", "block");
            F.appendChild(this._windows[K.name].body);
        } else {
            if (D.isObject(K.body)) {
                F.appendChild(K.body);
            } else {
                var M = document.createElement("div");
                M.innerHTML = K.body;
                F.appendChild(M);
            }
        }
        E.editor_header.firstChild.innerHTML = K.header;
        if (K.footer !== null) {
            E.setFooter(K.footer);
        }
        E.cfg.setProperty("width", K.attrs.width);
        this.currentWindow = K;
        this.moveWindow(true);
        E.show();
        this.fireEvent("afterOpenWindow", {type:"afterOpenWindow", win:K, panel:E});
    }, moveWindow:function (F) {
        if (!this.currentWindow) {
            return false;
        }
        var I = this.currentWindow, J = C.getXY(this.currentElement[0]), a = C.getXY(this.get("iframe").get("element")), O = this.get("panel"), Y = [(J[0] + a[0]), (J[1] + a[1])], R = (parseInt(I.attrs.width, 10) / 2), U = "center", Q = O.cfg.getProperty("xy") || [0, 0], G = O.editor_knob, X = 0, L = 0, T = false;
        Y[0] = ((Y[0] - R) + 20);
        Y[0] = Y[0] - C.getDocumentScrollLeft(this._getDoc());
        Y[1] = Y[1] - C.getDocumentScrollTop(this._getDoc());
        if (this._isElement(this.currentElement[0], "img")) {
            if (this.currentElement[0].src.indexOf(this.get("blankimage")) != -1) {
                Y[0] = (Y[0] + (75 / 2));
                Y[1] = (Y[1] + 75);
            } else {
                var N = parseInt(this.currentElement[0].width, 10);
                var W = parseInt(this.currentElement[0].height, 10);
                Y[0] = (Y[0] + (N / 2));
                Y[1] = (Y[1] + W);
            }
            Y[1] = Y[1] + 15;
        } else {
            var K = C.getStyle(this.currentElement[0], "fontSize");
            if (K && K.indexOf && K.indexOf("px") != -1) {
                Y[1] = Y[1] + parseInt(C.getStyle(this.currentElement[0], "fontSize"), 10) + 5;
            } else {
                Y[1] = Y[1] + 20;
            }
        }
        if (Y[0] < a[0]) {
            Y[0] = a[0] + 5;
            U = "left";
        }
        if ((Y[0] + (R * 2)) > (a[0] + parseInt(this.get("iframe").get("element").clientWidth, 10))) {
            Y[0] = ((a[0] + parseInt(this.get("iframe").get("element").clientWidth, 10)) - (R * 2) - 5);
            U = "right";
        }
        try {
            X = (Y[0] - Q[0]);
            L = (Y[1] - Q[1]);
        } catch (c) {
        }
        var P = a[1] + parseInt(this.get("height"), 10);
        var H = a[0] + parseInt(this.get("width"), 10);
        if (Y[1] > P) {
            Y[1] = P;
        }
        if (Y[0] > H) {
            Y[0] = (H / 2);
        }
        X = ((X < 0) ? (X * -1) : X);
        L = ((L < 0) ? (L * -1) : L);
        if (((X > 10) || (L > 10)) || F) {
            var S = 0, V = 0;
            if (this.currentElement[0].width) {
                V = (parseInt(this.currentElement[0].width, 10) / 2);
            }
            var M = J[0] + a[0] + V;
            S = M - Y[0];
            if (S > (parseInt(I.attrs.width, 10) - 1)) {
                S = ((parseInt(I.attrs.width, 10) - 30) - 1);
            } else {
                if (S < 40) {
                    S = 1;
                }
            }
            if (isNaN(S)) {
                S = 1;
            }
            if (F) {
                if (G) {
                    G.style.left = S + "px";
                }
                O.cfg.setProperty("xy", Y);
            } else {
                if (this.get("animate")) {
                    T = new YAHOO.util.Anim(O.element, {}, 0.5, YAHOO.util.Easing.easeOut);
                    T.attributes = {top:{to:Y[1]}, left:{to:Y[0]}};
                    T.onComplete.subscribe(function () {
                        O.cfg.setProperty("xy", Y);
                    });
                    var Z = new YAHOO.util.Anim(O.iframe, T.attributes, 0.5, YAHOO.util.Easing.easeOut);
                    var E = new YAHOO.util.Anim(G, {left:{to:S}}, 0.6, YAHOO.util.Easing.easeOut);
                    T.animate();
                    Z.animate();
                    E.animate();
                } else {
                    G.style.left = S + "px";
                    O.cfg.setProperty("xy", Y);
                }
            }
        }
    }, _closeWindow:function (E) {
        if (this._checkKey(this._keyMap.CLOSE_WINDOW, E)) {
            if (this.currentWindow) {
                this.closeWindow();
            }
        }
    }, closeWindow:function (E) {
        this.fireEvent("window" + this.currentWindow.name + "Close", {type:"window" + this.currentWindow.name + "Close", win:this.currentWindow, el:this.currentElement[0]});
        this.fireEvent("closeWindow", {type:"closeWindow", win:this.currentWindow});
        this.currentWindow = null;
        this.get("panel").hide();
        this.get("panel").cfg.setProperty("xy", [-900, -900]);
        this.get("panel").syncIframe();
        this.unsubscribeAll("afterExecCommand");
        this.toolbar.set("disabled", false);
        this.toolbar.resetAllButtons();
        this.focus();
        A.removeListener(document, "keydown", this._closeWindow);
    }, cmd_undo:function (G) {
        if (this._hasUndoLevel()) {
            var F = this.getEditorHTML(), E;
            if (!this._undoLevel) {
                this._undoLevel = this._undoCache.length;
            }
            this._undoLevel = (this._undoLevel - 1);
            if (this._undoCache[this._undoLevel]) {
                E = this._getUndo(this._undoLevel);
                if (E != F) {
                    this.setEditorHTML(E);
                } else {
                    this._undoLevel = (this._undoLevel - 1);
                    E = this._getUndo(this._undoLevel);
                    if (E != F) {
                        this.setEditorHTML(E);
                    }
                }
            } else {
                this._undoLevel = 0;
                this.toolbar.disableButton("undo");
            }
        }
        return[false];
    }, cmd_redo:function (F) {
        this._undoLevel = this._undoLevel + 1;
        if (this._undoLevel >= this._undoCache.length) {
            this._undoLevel = this._undoCache.length;
        }
        if (this._undoCache[this._undoLevel]) {
            var E = this._getUndo(this._undoLevel);
            this.setEditorHTML(E);
        } else {
            this.toolbar.disableButton("redo");
        }
        return[false];
    }, cmd_heading:function (I) {
        var F = true, G = null, H = "heading", J = this._getSelection(), E = this._getSelectedElement();
        if (E) {
            J = E;
        }
        if (this.browser.ie) {
            H = "formatblock";
        }
        if (I == this.STR_NONE) {
            if ((J && J.tagName && (J.tagName.toLowerCase().substring(0, 1) == "h")) || (J && J.parentNode && J.parentNode.tagName && (J.parentNode.tagName.toLowerCase().substring(0, 1) == "h"))) {
                if (J.parentNode.tagName.toLowerCase().substring(0, 1) == "h") {
                    J = J.parentNode;
                }
                if (this._isElement(J, "html")) {
                    return[false];
                }
                G = this._swapEl(E, "span", function (K) {
                    K.className = "yui-non";
                });
                this._selectNode(G);
                this.currentElement[0] = G;
            }
            F = false;
        } else {
            if (this._isElement(E, "h1") || this._isElement(E, "h2") || this._isElement(E, "h3") || this._isElement(E, "h4") || this._isElement(E, "h5") || this._isElement(E, "h6")) {
                G = this._swapEl(E, I);
                this._selectNode(G);
                this.currentElement[0] = G;
            } else {
                this._createCurrentElement(I);
                this._selectNode(this.currentElement[0]);
            }
            F = false;
        }
        return[F, H];
    }, cmd_hiddenelements:function (E) {
        if (this._showingHiddenElements) {
            this._lastButton = null;
            this._showingHiddenElements = false;
            this.toolbar.deselectButton("hiddenelements");
            C.removeClass(this._getDoc().body, this.CLASS_HIDDEN);
        } else {
            this._showingHiddenElements = true;
            C.addClass(this._getDoc().body, this.CLASS_HIDDEN);
            this.toolbar.selectButton("hiddenelements");
        }
        return[false];
    }, cmd_removeformat:function (H) {
        var F = true;
        if (this.browser.webkit && !this._getDoc().queryCommandEnabled("removeformat")) {
            var E = this._getSelection() + "";
            this._createCurrentElement("span");
            this.currentElement[0].className = "yui-non";
            this.currentElement[0].innerHTML = E;
            for (var G = 1; G < this.currentElement.length; G++) {
                this.currentElement[G].parentNode.removeChild(this.currentElement[G]);
            }
            F = false;
        }
        return[F];
    }, cmd_script:function (K, J) {
        var G = true, E = K.toLowerCase().substring(0, 3), H = null, F = this._getSelectedElement();
        if (this.browser.webkit) {
            if (this._isElement(F, E)) {
                H = this._swapEl(this.currentElement[0], "span", function (L) {
                    L.className = "yui-non";
                });
                this._selectNode(H);
            } else {
                this._createCurrentElement(E);
                var I = this._swapEl(this.currentElement[0], E);
                this._selectNode(I);
                this.currentElement[0] = I;
            }
            G = false;
        }
        return G;
    }, cmd_superscript:function (E) {
        return[this.cmd_script("superscript", E)];
    }, cmd_subscript:function (E) {
        return[this.cmd_script("subscript", E)];
    }, cmd_indent:function (H) {
        var E = true, G = this._getSelectedElement(), I = null;
        if (this.browser.ie) {
            if (this._isElement(G, "blockquote")) {
                I = this._getDoc().createElement("blockquote");
                I.innerHTML = G.innerHTML;
                G.innerHTML = "";
                G.appendChild(I);
                this._selectNode(I);
            } else {
                I = this._getDoc().createElement("blockquote");
                var F = this._getRange().htmlText;
                I.innerHTML = F;
                this._createCurrentElement("blockquote");
                this.currentElement[0].parentNode.replaceChild(I, this.currentElement[0]);
                this.currentElement[0] = I;
                this._selectNode(this.currentElement[0]);
            }
            E = false;
        } else {
            H = "blockquote";
        }
        return[E, "formatblock", H];
    }, cmd_outdent:function (I) {
        var E = true, H = this._getSelectedElement(), J = null, F = null;
        if (this.browser.webkit || this.browser.ie) {
            H = this._getSelectedElement();
            if (this._isElement(H, "blockquote")) {
                var G = H.parentNode;
                if (this._isElement(H.parentNode, "blockquote")) {
                    G.innerHTML = H.innerHTML;
                    this._selectNode(G);
                } else {
                    F = this._getDoc().createElement("span");
                    F.innerHTML = H.innerHTML;
                    YAHOO.util.Dom.addClass(F, "yui-non");
                    G.replaceChild(F, H);
                    this._selectNode(F);
                }
            } else {
            }
            E = false;
        } else {
            I = false;
        }
        return[E, "outdent", I];
    }, cmd_justify:function (E) {
        if (this.browser.ie) {
            if (this._hasSelection()) {
                this._createCurrentElement("span");
                this._swapEl(this.currentElement[0], "div", function (F) {
                    F.style.textAlign = E;
                });
                return[false];
            }
        }
        return[true, "justify" + E, ""];
    }, cmd_justifycenter:function () {
        return[this.cmd_justify("center")];
    }, cmd_justifyleft:function () {
        return[this.cmd_justify("left")];
    }, cmd_justifyright:function () {
        return[this.cmd_justify("right")];
    }, toString:function () {
        var E = "Editor";
        if (this.get && this.get("element_cont")) {
            E = "Editor (#" + this.get("element_cont").get("id") + ")" + ((this.get("disabled") ? " Disabled" : ""));
        }
        return E;
    }});
    YAHOO.widget.EditorWindow = function (F, E) {
        this.name = F.replace(" ", "_");
        this.attrs = E;
    };
    YAHOO.widget.EditorWindow.prototype = {header:null, body:null, footer:null, setHeader:function (E) {
        this.header = E;
    }, setBody:function (E) {
        this.body = E;
    }, setFooter:function (E) {
        this.footer = E;
    }, toString:function () {
        return"Editor Window (" + this.name + ")";
    }};
})();
YAHOO.register("editor", YAHOO.widget.Editor, {version:"2.8.0r4", build:"2449"});