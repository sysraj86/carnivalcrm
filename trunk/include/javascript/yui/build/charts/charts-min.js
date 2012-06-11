/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 2.8.0r4
 */
YAHOO.widget.Chart = function (I, F, A, J) {
    this._type = I;
    this._dataSource = A;
    var B = {align:"", allowNetworking:"", allowScriptAccess:"", base:"", bgcolor:"", menu:"", name:"", quality:"", salign:"", scale:"", tabindex:"", wmode:""};
    var D = {fixedAttributes:{allowScriptAccess:"always"}, flashVars:{allowedDomain:document.location.hostname}, backgroundColor:"#ffffff", host:this, version:9.045};
    for (var E in J) {
        if (B.hasOwnProperty(E)) {
            D.fixedAttributes[E] = J[E];
        } else {
            D[E] = J[E];
        }
    }
    this._id = D.id = D.id || YAHOO.util.Dom.generateId(null, "yuigen");
    if (D.version && D.version != null && D.version != undefined && D.version != "undefined") {
        var H = (/\w*.\w*/.exec(((D.version).toString()).replace(/.0./g, "."))).toString();
        var C = H.split(".");
        H = C[0] + ".";
        switch ((C[1].toString()).length) {
            case 1:
                H += "00";
                break;
            case 2:
                H += "0";
                break;
        }
        H += C[1];
        D.version = parseFloat(H);
    }
    this._swfURL = YAHOO.widget.Chart.SWFURL;
    this._containerID = F;
    this._attributes = D;
    this._swfEmbed = new YAHOO.widget.SWF(F, YAHOO.widget.Chart.SWFURL, D);
    this._swf = this._swfEmbed.swf;
    this._swfEmbed.subscribe("swfReady", this._eventHandler, this, true);
    try {
        this.createEvent("contentReady");
    } catch (G) {
    }
    this.createEvent("itemMouseOverEvent");
    this.createEvent("itemMouseOutEvent");
    this.createEvent("itemClickEvent");
    this.createEvent("itemDoubleClickEvent");
    this.createEvent("itemDragStartEvent");
    this.createEvent("itemDragEvent");
    this.createEvent("itemDragEndEvent");
};
YAHOO.extend(YAHOO.widget.Chart, YAHOO.util.AttributeProvider, {_type:null, _pollingID:null, _pollingInterval:null, _dataTipFunction:null, _legendLabelFunction:null, _seriesFunctions:null, toString:function () {
    return"Chart " + this._id;
}, setStyle:function (A, B) {
    B = YAHOO.lang.JSON.stringify(B);
    this._swf.setStyle(A, B);
}, setStyles:function (A) {
    A = YAHOO.lang.JSON.stringify(A);
    this._swf.setStyles(A);
}, setSeriesStyles:function (B) {
    for (var A = 0; A < B.length; A++) {
        B[A] = YAHOO.lang.JSON.stringify(B[A]);
    }
    this._swf.setSeriesStyles(B);
}, destroy:function () {
    if (this._dataSource !== null) {
        if (this._pollingID !== null) {
            this._dataSource.clearInterval(this._pollingID);
            this._pollingID = null;
        }
    }
    if (this._dataTipFunction) {
        YAHOO.widget.Chart.removeProxyFunction(this._dataTipFunction);
    }
    if (this._legendLabelFunction) {
        YAHOO.widget.Chart.removeProxyFunction(this._legendLabelFunction);
    }
    if (this._swf) {
        var B = YAHOO.util.Dom.get(this._containerID);
        B.removeChild(this._swf);
    }
    var A = this._id;
    for (var C in this) {
        if (YAHOO.lang.hasOwnProperty(this, C)) {
            this[C] = null;
        }
    }
}, _initAttributes:function (A) {
    this.setAttributeConfig("altText", {method:this._setAltText, getter:this._getAltText});
    this.setAttributeConfig("swfURL", {getter:this._getSWFURL});
    this.setAttributeConfig("request", {method:this._setRequest, getter:this._getRequest});
    this.setAttributeConfig("dataSource", {method:this._setDataSource, getter:this._getDataSource});
    this.setAttributeConfig("series", {method:this._setSeriesDefs, getter:this._getSeriesDefs});
    this.setAttributeConfig("categoryNames", {validator:YAHOO.lang.isArray, method:this._setCategoryNames, getter:this._getCategoryNames});
    this.setAttributeConfig("dataTipFunction", {method:this._setDataTipFunction, getter:this._getDataTipFunction});
    this.setAttributeConfig("legendLabelFunction", {method:this._setLegendLabelFunction, getter:this._legendLabelFunction});
    this.setAttributeConfig("polling", {method:this._setPolling, getter:this._getPolling});
}, _eventHandler:function (A) {
    if (A.type == "swfReady") {
        this._swf = this._swfEmbed._swf;
        this._loadHandler();
        this.fireEvent("contentReady");
    }
}, _loadHandler:function () {
    if (!this._swf || !this._swf.setType) {
        return;
    }
    this._swf.setType(this._type);
    if (this._attributes.style) {
        var A = this._attributes.style;
        this.setStyles(A);
    }
    this._initialized = false;
    this._initAttributes(this._attributes);
    this.setAttributes(this._attributes, true);
    this._initialized = true;
    if (this._dataSource) {
        this.set("dataSource", this._dataSource);
    }
}, refreshData:function () {
    if (!this._initialized) {
        return;
    }
    if (this._dataSource !== null) {
        if (this._pollingID !== null) {
            this._dataSource.clearInterval(this._pollingID);
            this._pollingID = null;
        }
        if (this._pollingInterval > 0) {
            this._pollingID = this._dataSource.setInterval(this._pollingInterval, this._request, this._loadDataHandler, this);
        }
        this._dataSource.sendRequest(this._request, this._loadDataHandler, this);
    }
}, _loadDataHandler:function (D, C, K) {
    if (this._swf) {
        if (K) {
        } else {
            var H;
            if (this._seriesFunctions) {
                var I = this._seriesFunctions.length;
                for (H = 0; H < I; H++) {
                    YAHOO.widget.Chart.removeProxyFunction(this._seriesFunctions[H]);
                }
                this._seriesFunctions = null;
            }
            this._seriesFunctions = [];
            var F = [];
            var E = 0;
            var L = null;
            if (this._seriesDefs !== null) {
                E = this._seriesDefs.length;
                for (H = 0; H < E; H++) {
                    L = this._seriesDefs[H];
                    var B = {};
                    for (var A in L) {
                        if (YAHOO.lang.hasOwnProperty(L, A)) {
                            if (A == "style") {
                                if (L.style !== null) {
                                    B.style = YAHOO.lang.JSON.stringify(L.style);
                                }
                            } else {
                                if (A == "labelFunction") {
                                    if (L.labelFunction !== null) {
                                        B.labelFunction = YAHOO.widget.Chart.getFunctionReference(L.labelFunction);
                                        this._seriesFunctions.push(B.labelFunction);
                                    }
                                } else {
                                    if (A == "dataTipFunction") {
                                        if (L.dataTipFunction !== null) {
                                            B.dataTipFunction = YAHOO.widget.Chart.getFunctionReference(L.dataTipFunction);
                                            this._seriesFunctions.push(B.dataTipFunction);
                                        }
                                    } else {
                                        if (A == "legendLabelFunction") {
                                            if (L.legendLabelFunction !== null) {
                                                B.legendLabelFunction = YAHOO.widget.Chart.getFunctionReference(L.legendLabelFunction);
                                                this._seriesFunctions.push(B.legendLabelFunction);
                                            }
                                        } else {
                                            B[A] = L[A];
                                        }
                                    }
                                }
                            }
                        }
                    }
                    F.push(B);
                }
            }
            if (E > 0) {
                for (H = 0; H < E; H++) {
                    L = F[H];
                    if (!L.type) {
                        L.type = this._type;
                    }
                    L.dataProvider = C.results;
                }
            } else {
                var G = {type:this._type, dataProvider:C.results};
                F.push(G);
            }
            try {
                if (this._swf.setDataProvider) {
                    this._swf.setDataProvider(F);
                }
            } catch (J) {
                this._swf.setDataProvider(F);
            }
        }
    }
}, _request:"", _getRequest:function () {
    return this._request;
}, _setRequest:function (A) {
    this._request = A;
    this.refreshData();
}, _dataSource:null, _getDataSource:function () {
    return this._dataSource;
}, _setDataSource:function (A) {
    this._dataSource = A;
    this.refreshData();
}, _seriesDefs:null, _getSeriesDefs:function () {
    return this._seriesDefs;
}, _setSeriesDefs:function (A) {
    this._seriesDefs = A;
    this.refreshData();
}, _getCategoryNames:function () {
    return this._swf.getCategoryNames();
}, _setCategoryNames:function (A) {
    this._swf.setCategoryNames(A);
}, _setDataTipFunction:function (A) {
    if (this._dataTipFunction) {
        YAHOO.widget.Chart.removeProxyFunction(this._dataTipFunction);
    }
    if (A) {
        this._dataTipFunction = A = YAHOO.widget.Chart.getFunctionReference(A);
    }
    this._swf.setDataTipFunction(A);
}, _setLegendLabelFunction:function (A) {
    if (this._legendLabelFunction) {
        YAHOO.widget.Chart.removeProxyFunction(this._legendLabelFunction);
    }
    if (A) {
        this._legendLabelFunction = A = YAHOO.widget.Chart.getFunctionReference(A);
    }
    this._swf.setLegendLabelFunction(A);
}, _getPolling:function () {
    return this._pollingInterval;
}, _setPolling:function (A) {
    this._pollingInterval = A;
    this.refreshData();
}, _swfEmbed:null, _swfURL:null, _containerID:null, _swf:null, _id:null, _initialized:false, _attributes:null, set:function (A, B) {
    this._attributes[A] = B;
    YAHOO.widget.Chart.superclass.set.call(this, A, B);
}, _getSWFURL:function () {
    return this._swfURL;
}, _getAltText:function () {
    return this._swf.getAltText();
}, _setAltText:function (A) {
    this._swf.setAltText(A);
}});
YAHOO.widget.Chart.proxyFunctionCount = 0;
YAHOO.widget.Chart.createProxyFunction = function (C, B) {
    var B = B || null;
    var A = YAHOO.widget.Chart.proxyFunctionCount;
    YAHOO.widget.Chart["proxyFunction" + A] = function () {
        return C.apply(B, arguments);
    };
    YAHOO.widget.Chart.proxyFunctionCount++;
    return"YAHOO.widget.Chart.proxyFunction" + A.toString();
};
YAHOO.widget.Chart.getFunctionReference = function (B) {
    if (typeof B == "function") {
        B = YAHOO.widget.Chart.createProxyFunction(B);
    } else {
        if (B.func && typeof B.func == "function") {
            var A = [B.func];
            if (B.scope && typeof B.scope == "object") {
                A.push(B.scope);
            }
            B = YAHOO.widget.Chart.createProxyFunction.apply(this, A);
        }
    }
    return B;
};
YAHOO.widget.Chart.removeProxyFunction = function (A) {
    if (!A || A.indexOf("YAHOO.widget.Chart.proxyFunction") < 0) {
        return;
    }
    A = A.substr(26);
    YAHOO.widget.Chart[A] = null;
};
YAHOO.widget.Chart.SWFURL = "assets/charts.swf";
YAHOO.widget.PieChart = function (A, C, B) {
    YAHOO.widget.PieChart.superclass.constructor.call(this, "pie", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.PieChart, YAHOO.widget.Chart, {_initAttributes:function (A) {
    YAHOO.widget.PieChart.superclass._initAttributes.call(this, A);
    this.setAttributeConfig("dataField", {validator:YAHOO.lang.isString, method:this._setDataField, getter:this._getDataField});
    this.setAttributeConfig("categoryField", {validator:YAHOO.lang.isString, method:this._setCategoryField, getter:this._getCategoryField});
}, _getDataField:function () {
    return this._swf.getDataField();
}, _setDataField:function (A) {
    this._swf.setDataField(A);
}, _getCategoryField:function () {
    return this._swf.getCategoryField();
}, _setCategoryField:function (A) {
    this._swf.setCategoryField(A);
}});
YAHOO.widget.CartesianChart = function (C, A, D, B) {
    YAHOO.widget.CartesianChart.superclass.constructor.call(this, C, A, D, B);
};
YAHOO.lang.extend(YAHOO.widget.CartesianChart, YAHOO.widget.Chart, {_xAxisLabelFunctions:[], _yAxisLabelFunctions:[], destroy:function () {
    this._removeAxisFunctions(this._xAxisLabelFunctions);
    this._removeAxisFunctions(this._yAxisLabelFunctions);
    YAHOO.widget.CartesianChart.superclass.destroy.call(this);
}, _initAttributes:function (A) {
    YAHOO.widget.CartesianChart.superclass._initAttributes.call(this, A);
    this.setAttributeConfig("xField", {validator:YAHOO.lang.isString, method:this._setXField, getter:this._getXField});
    this.setAttributeConfig("yField", {validator:YAHOO.lang.isString, method:this._setYField, getter:this._getYField});
    this.setAttributeConfig("xAxis", {method:this._setXAxis});
    this.setAttributeConfig("xAxes", {method:this._setXAxes});
    this.setAttributeConfig("yAxis", {method:this._setYAxis});
    this.setAttributeConfig("yAxes", {method:this._setYAxes});
    this.setAttributeConfig("constrainViewport", {method:this._setConstrainViewport});
}, _getXField:function () {
    return this._swf.getHorizontalField();
}, _setXField:function (A) {
    this._swf.setHorizontalField(A);
}, _getYField:function () {
    return this._swf.getVerticalField();
}, _setYField:function (A) {
    this._swf.setVerticalField(A);
}, _getClonedAxis:function (A) {
    var B = {};
    for (var C in A) {
        if (C == "labelFunction") {
            if (A.labelFunction && A.labelFunction !== null) {
                B.labelFunction = YAHOO.widget.Chart.getFunctionReference(A.labelFunction);
            }
        } else {
            B[C] = A[C];
        }
    }
    return B;
}, _removeAxisFunctions:function (C) {
    if (C && C.length > 0) {
        var A = C.length;
        for (var B = 0; B < A; B++) {
            if (C[B] !== null) {
                YAHOO.widget.Chart.removeProxyFunction(C[B]);
            }
        }
        C = [];
    }
}, _setXAxis:function (A) {
    if (A.position != "bottom" && A.position != "top") {
        A.position = "bottom";
    }
    this._removeAxisFunctions(this._xAxisLabelFunctions);
    A = this._getClonedAxis(A);
    this._xAxisLabelFunctions.push(A.labelFunction);
    this._swf.setHorizontalAxis(A);
}, _setXAxes:function (C) {
    this._removeAxisFunctions(this._xAxisLabelFunctions);
    var A = C.length;
    for (var B = 0; B < A; B++) {
        if (C[B].position == "left") {
            C[B].position = "bottom";
        }
        C[B] = this._getClonedAxis(C[B]);
        if (C[B].labelFunction) {
            this._xAxisLabelFunctions.push(C[B].labelFunction);
        }
        this._swf.setHorizontalAxis(C[B]);
    }
}, _setYAxis:function (A) {
    this._removeAxisFunctions(this._yAxisLabelFunctions);
    A = this._getClonedAxis(A);
    this._yAxisLabelFunctions.push(A.labelFunction);
    this._swf.setVerticalAxis(A);
}, _setYAxes:function (C) {
    this._removeAxisFunctions(this._yAxisLabelFunctions);
    var A = C.length;
    for (var B = 0; B < A; B++) {
        C[B] = this._getClonedAxis(C[B]);
        if (C[B].labelFunction) {
            this._yAxisLabelFunctions.push(C[B].labelFunction);
        }
        this._swf.setVerticalAxis(C[B]);
    }
}, _setConstrainViewport:function (A) {
    this._swf.setConstrainViewport(A);
}, setSeriesStylesByIndex:function (A, B) {
    B = YAHOO.lang.JSON.stringify(B);
    if (this._swf && this._swf.setSeriesStylesByIndex) {
        this._swf.setSeriesStylesByIndex(A, B);
    }
}});
YAHOO.widget.LineChart = function (A, C, B) {
    YAHOO.widget.LineChart.superclass.constructor.call(this, "line", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.LineChart, YAHOO.widget.CartesianChart);
YAHOO.widget.ColumnChart = function (A, C, B) {
    YAHOO.widget.ColumnChart.superclass.constructor.call(this, "column", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.ColumnChart, YAHOO.widget.CartesianChart);
YAHOO.widget.BarChart = function (A, C, B) {
    YAHOO.widget.BarChart.superclass.constructor.call(this, "bar", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.BarChart, YAHOO.widget.CartesianChart);
YAHOO.widget.StackedColumnChart = function (A, C, B) {
    YAHOO.widget.StackedColumnChart.superclass.constructor.call(this, "stackcolumn", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.StackedColumnChart, YAHOO.widget.CartesianChart);
YAHOO.widget.StackedBarChart = function (A, C, B) {
    YAHOO.widget.StackedBarChart.superclass.constructor.call(this, "stackbar", A, C, B);
};
YAHOO.lang.extend(YAHOO.widget.StackedBarChart, YAHOO.widget.CartesianChart);
YAHOO.widget.Axis = function () {
};
YAHOO.widget.Axis.prototype = {type:null, reverse:false, labelFunction:null, labelSpacing:2, title:null};
YAHOO.widget.NumericAxis = function () {
    YAHOO.widget.NumericAxis.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.NumericAxis, YAHOO.widget.Axis, {type:"numeric", minimum:NaN, maximum:NaN, majorUnit:NaN, minorUnit:NaN, snapToUnits:true, stackingEnabled:false, alwaysShowZero:true, scale:"linear", roundMajorUnit:true, calculateByLabelSize:true, position:"left", adjustMaximumByMajorUnit:true, adjustMinimumByMajorUnit:true});
YAHOO.widget.TimeAxis = function () {
    YAHOO.widget.TimeAxis.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.TimeAxis, YAHOO.widget.Axis, {type:"time", minimum:null, maximum:null, majorUnit:NaN, majorTimeUnit:null, minorUnit:NaN, minorTimeUnit:null, snapToUnits:true, stackingEnabled:false, calculateByLabelSize:true});
YAHOO.widget.CategoryAxis = function () {
    YAHOO.widget.CategoryAxis.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.CategoryAxis, YAHOO.widget.Axis, {type:"category", categoryNames:null, calculateCategoryCount:false});
YAHOO.widget.Series = function () {
};
YAHOO.widget.Series.prototype = {type:null, displayName:null};
YAHOO.widget.CartesianSeries = function () {
    YAHOO.widget.CartesianSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.CartesianSeries, YAHOO.widget.Series, {xField:null, yField:null, axis:"primary", showInLegend:true});
YAHOO.widget.ColumnSeries = function () {
    YAHOO.widget.ColumnSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.ColumnSeries, YAHOO.widget.CartesianSeries, {type:"column"});
YAHOO.widget.LineSeries = function () {
    YAHOO.widget.LineSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.LineSeries, YAHOO.widget.CartesianSeries, {type:"line"});
YAHOO.widget.BarSeries = function () {
    YAHOO.widget.BarSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.BarSeries, YAHOO.widget.CartesianSeries, {type:"bar"});
YAHOO.widget.PieSeries = function () {
    YAHOO.widget.PieSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.PieSeries, YAHOO.widget.Series, {type:"pie", dataField:null, categoryField:null, labelFunction:null});
YAHOO.widget.StackedBarSeries = function () {
    YAHOO.widget.StackedBarSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.StackedBarSeries, YAHOO.widget.CartesianSeries, {type:"stackbar"});
YAHOO.widget.StackedColumnSeries = function () {
    YAHOO.widget.StackedColumnSeries.superclass.constructor.call(this);
};
YAHOO.lang.extend(YAHOO.widget.StackedColumnSeries, YAHOO.widget.CartesianSeries, {type:"stackcolumn"});
YAHOO.register("charts", YAHOO.widget.Chart, {version:"2.8.0r4", build:"2449"});