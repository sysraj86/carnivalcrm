/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("io-upload-iframe", function (B) {
    var I = B.config.win;

    function D(P, O) {
        var Q = [], L = O.split("="), N, M;
        for (N = 0, M = L.length - 1; N < M; N++) {
            Q[N] = document.createElement("input");
            Q[N].type = "hidden";
            Q[N].name = L[N].substring(L[N].lastIndexOf("&") + 1);
            Q[N].value = (N + 1 === M) ? L[N + 1] : L[N + 1].substring(0, (L[N + 1].lastIndexOf("&")));
            P.appendChild(Q[N]);
        }
        return Q;
    }

    function F(N, O) {
        var M, L;
        for (M = 0, L = O.length; M < L; M++) {
            N.removeChild(O[M]);
        }
    }

    function E(N, O, M) {
        var L = (document.documentMode && document.documentMode === 8) ? true : false;
        N.setAttribute("action", M);
        N.setAttribute("method", "POST");
        N.setAttribute("target", "ioupload" + O);
        N.setAttribute(B.UA.ie && !L ? "encoding" : "enctype", "multipart/form-data");
    }

    function K(M, L) {
        var N;
        for (N in L) {
            if (L.hasOwnProperty(L, N)) {
                if (L[N]) {
                    M.setAttribute(N, M[N]);
                } else {
                    M.removeAttribute(N);
                }
            }
        }
    }

    function J(M, N) {
        var L = B.Node.create('<iframe id="ioupload' + M.id + '" name="ioupload' + M.id + '" />');
        L._node.style.position = "absolute";
        L._node.style.top = "-1000px";
        L._node.style.left = "-1000px";
        B.one("body").appendChild(L);
        B.on("load", function () {
            A(M, N);
        }, "#ioupload" + M.id);
    }

    function A(P, Q) {
        var O = B.one("#ioupload" + P.id).get("contentWindow.document"), L = O.one("body"), M = (O._node.nodeType === 9), N;
        if (Q.timeout) {
            H(P.id);
        }
        if (L) {
            N = L.query("pre:first-child");
            P.c.responseText = N ? N.get("innerHTML") : L.get("innerHTML");
        } else {
            if (M) {
                P.c.responseXML = O._node;
            }
        }
        B.io.complete(P, Q);
        B.io.end(P, Q);
        I.setTimeout(function () {
            G(P.id);
        }, 0);
    }

    function C(L, M) {
        B.io._timeout[L.id] = I.setTimeout(function () {
            var N = {id:L.id, status:"timeout"};
            B.io.complete(N, M);
            B.io.end(N, M);
        }, M.timeout);
    }

    function H(L) {
        I.clearTimeout(B.io._timeout[L]);
        delete B.io._timeout[L];
    }

    function G(L) {
        B.Event.purgeElement("#ioupload" + L, false);
        B.one("body").removeChild(B.one("#ioupload" + L));
    }

    B.mix(B.io, {_upload:function (P, N, Q) {
        var O = (typeof Q.form.id === "string") ? B.config.doc.getElementById(Q.form.id) : Q.form.id, M, L = {action:O.getAttribute("action"), target:O.getAttribute("target")};
        J(P, Q);
        E(O, P.id, N);
        if (Q.data) {
            M = D(O, Q.data);
        }
        if (Q.timeout) {
            C(P, Q);
        }
        O.submit();
        B.io.start(P.id, Q);
        if (Q.data) {
            F(O, M);
        }
        K(O, L);
        return{id:P.id, abort:function () {
            var R = {id:P.id, status:"abort"};
            if (B.one("#ioupload" + P.id)) {
                G(P.id);
                B.io.complete(R, Q);
                B.io.end(R, Q);
            } else {
                return false;
            }
        }, isInProgress:function () {
            return B.one("#ioupload" + P.id) ? true : false;
        }};
    }});
}, "3.0.0", {requires:["io-base", "node-base", "event-base"]});