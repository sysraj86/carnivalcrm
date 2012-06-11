/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("anim-easing", function (A) {
    A.Easing = {easeNone:function (C, B, E, D) {
        return E * C / D + B;
    }, easeIn:function (C, B, E, D) {
        return E * (C /= D) * C + B;
    }, easeOut:function (C, B, E, D) {
        return-E * (C /= D) * (C - 2) + B;
    }, easeBoth:function (C, B, E, D) {
        if ((C /= D / 2) < 1) {
            return E / 2 * C * C + B;
        }
        return-E / 2 * ((--C) * (C - 2) - 1) + B;
    }, easeInStrong:function (C, B, E, D) {
        return E * (C /= D) * C * C * C + B;
    }, easeOutStrong:function (C, B, E, D) {
        return-E * ((C = C / D - 1) * C * C * C - 1) + B;
    }, easeBothStrong:function (C, B, E, D) {
        if ((C /= D / 2) < 1) {
            return E / 2 * C * C * C * C + B;
        }
        return-E / 2 * ((C -= 2) * C * C * C - 2) + B;
    }, elasticIn:function (D, B, H, G, C, F) {
        var E;
        if (D === 0) {
            return B;
        }
        if ((D /= G) === 1) {
            return B + H;
        }
        if (!F) {
            F = G * 0.3;
        }
        if (!C || C < Math.abs(H)) {
            C = H;
            E = F / 4;
        } else {
            E = F / (2 * Math.PI) * Math.asin(H / C);
        }
        return-(C * Math.pow(2, 10 * (D -= 1)) * Math.sin((D * G - E) * (2 * Math.PI) / F)) + B;
    }, elasticOut:function (D, B, H, G, C, F) {
        var E;
        if (D === 0) {
            return B;
        }
        if ((D /= G) === 1) {
            return B + H;
        }
        if (!F) {
            F = G * 0.3;
        }
        if (!C || C < Math.abs(H)) {
            C = H;
            E = F / 4;
        } else {
            E = F / (2 * Math.PI) * Math.asin(H / C);
        }
        return C * Math.pow(2, -10 * D) * Math.sin((D * G - E) * (2 * Math.PI) / F) + H + B;
    }, elasticBoth:function (D, B, H, G, C, F) {
        var E;
        if (D === 0) {
            return B;
        }
        if ((D /= G / 2) === 2) {
            return B + H;
        }
        if (!F) {
            F = G * (0.3 * 1.5);
        }
        if (!C || C < Math.abs(H)) {
            C = H;
            E = F / 4;
        } else {
            E = F / (2 * Math.PI) * Math.asin(H / C);
        }
        if (D < 1) {
            return-0.5 * (C * Math.pow(2, 10 * (D -= 1)) * Math.sin((D * G - E) * (2 * Math.PI) / F)) + B;
        }
        return C * Math.pow(2, -10 * (D -= 1)) * Math.sin((D * G - E) * (2 * Math.PI) / F) * 0.5 + H + B;
    }, backIn:function (C, B, F, E, D) {
        if (D === undefined) {
            D = 1.70158;
        }
        if (C === E) {
            C -= 0.001;
        }
        return F * (C /= E) * C * ((D + 1) * C - D) + B;
    }, backOut:function (C, B, F, E, D) {
        if (typeof D === "undefined") {
            D = 1.70158;
        }
        return F * ((C = C / E - 1) * C * ((D + 1) * C + D) + 1) + B;
    }, backBoth:function (C, B, F, E, D) {
        if (typeof D === "undefined") {
            D = 1.70158;
        }
        if ((C /= E / 2) < 1) {
            return F / 2 * (C * C * (((D *= (1.525)) + 1) * C - D)) + B;
        }
        return F / 2 * ((C -= 2) * C * (((D *= (1.525)) + 1) * C + D) + 2) + B;
    }, bounceIn:function (C, B, E, D) {
        return E - A.Easing.bounceOut(D - C, 0, E, D) + B;
    }, bounceOut:function (C, B, E, D) {
        if ((C /= D) < (1 / 2.75)) {
            return E * (7.5625 * C * C) + B;
        } else {
            if (C < (2 / 2.75)) {
                return E * (7.5625 * (C -= (1.5 / 2.75)) * C + 0.75) + B;
            } else {
                if (C < (2.5 / 2.75)) {
                    return E * (7.5625 * (C -= (2.25 / 2.75)) * C + 0.9375) + B;
                }
            }
        }
        return E * (7.5625 * (C -= (2.625 / 2.75)) * C + 0.984375) + B;
    }, bounceBoth:function (C, B, E, D) {
        if (C < D / 2) {
            return A.Easing.bounceIn(C * 2, 0, E, D) * 0.5 + B;
        }
        return A.Easing.bounceOut(C * 2 - D, 0, E, D) * 0.5 + E * 0.5 + B;
    }};
}, "3.0.0", {requires:["anim-base"]});