/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("event-custom-base", function (E) {
    E.Env.evt = {handles:{}, plugins:{}};
    (function () {
        var F = 0, G = 1;
        E.Do = {objs:{}, before:function (I, K, L, M) {
            var J = I, H;
            if (M) {
                H = [I, M].concat(E.Array(arguments, 4, true));
                J = E.rbind.apply(E, H);
            }
            return this._inject(F, J, K, L);
        }, after:function (I, K, L, M) {
            var J = I, H;
            if (M) {
                H = [I, M].concat(E.Array(arguments, 4, true));
                J = E.rbind.apply(E, H);
            }
            return this._inject(G, J, K, L);
        }, _inject:function (H, J, K, M) {
            var N = E.stamp(K), L, I;
            if (!this.objs[N]) {
                this.objs[N] = {};
            }
            L = this.objs[N];
            if (!L[M]) {
                L[M] = new E.Do.Method(K, M);
                K[M] = function () {
                    return L[M].exec.apply(L[M], arguments);
                };
            }
            I = N + E.stamp(J) + M;
            L[M].register(I, J, H);
            return new E.EventHandle(L[M], I);
        }, detach:function (H) {
            if (H.detach) {
                H.detach();
            }
        }, _unload:function (I, H) {
        }};
        E.Do.Method = function (H, I) {
            this.obj = H;
            this.methodName = I;
            this.method = H[I];
            this.before = {};
            this.after = {};
        };
        E.Do.Method.prototype.register = function (I, J, H) {
            if (H) {
                this.after[I] = J;
            } else {
                this.before[I] = J;
            }
        };
        E.Do.Method.prototype._delete = function (H) {
            delete this.before[H];
            delete this.after[H];
        };
        E.Do.Method.prototype.exec = function () {
            var J = E.Array(arguments, 0, true), K, I, N, L = this.before, H = this.after, M = false;
            for (K in L) {
                if (L.hasOwnProperty(K)) {
                    I = L[K].apply(this.obj, J);
                    if (I) {
                        switch (I.constructor) {
                            case E.Do.Halt:
                                return I.retVal;
                            case E.Do.AlterArgs:
                                J = I.newArgs;
                                break;
                            case E.Do.Prevent:
                                M = true;
                                break;
                            default:
                        }
                    }
                }
            }
            if (!M) {
                I = this.method.apply(this.obj, J);
            }
            for (K in H) {
                if (H.hasOwnProperty(K)) {
                    N = H[K].apply(this.obj, J);
                    if (N && N.constructor == E.Do.Halt) {
                        return N.retVal;
                    } else {
                        if (N && N.constructor == E.Do.AlterReturn) {
                            I = N.newRetVal;
                        }
                    }
                }
            }
            return I;
        };
        E.Do.AlterArgs = function (I, H) {
            this.msg = I;
            this.newArgs = H;
        };
        E.Do.AlterReturn = function (I, H) {
            this.msg = I;
            this.newRetVal = H;
        };
        E.Do.Halt = function (I, H) {
            this.msg = I;
            this.retVal = H;
        };
        E.Do.Prevent = function (H) {
            this.msg = H;
        };
        E.Do.Error = E.Do.Halt;
    })();
    var D = "after", B = ["broadcast", "bubbles", "context", "contextFn", "currentTarget", "defaultFn", "details", "emitFacade", "fireOnce", "host", "preventable", "preventedFn", "queuable", "silent", "stoppedFn", "target", "type"], C = 9, A = "yui:log";
    E.EventHandle = function (F, G) {
        this.evt = F;
        this.sub = G;
    };
    E.EventHandle.prototype = {detach:function () {
        var F = this.evt, G;
        if (F) {
            if (E.Lang.isArray(F)) {
                for (G = 0; G < F.length; G++) {
                    F[G].detach();
                }
            } else {
                F._delete(this.sub);
            }
        }
    }};
    E.CustomEvent = function (F, G) {
        G = G || {};
        this.id = E.stamp(this);
        this.type = F;
        this.context = E;
        this.logSystem = (F == A);
        this.silent = this.logSystem;
        this.subscribers = {};
        this.afters = {};
        this.preventable = true;
        this.bubbles = true;
        this.signature = C;
        this.applyConfig(G, true);
    };
    E.CustomEvent.prototype = {applyConfig:function (G, F) {
        if (G) {
            E.mix(this, G, F, B);
        }
    }, _on:function (J, H, G, F) {
        if (!J) {
            this.log("Invalid callback for CE: " + this.type);
        }
        var I = new E.Subscriber(J, H, G, F);
        if (this.fireOnce && this.fired) {
            E.later(0, this, E.bind(this._notify, this, I, this.firedWith));
        }
        if (F == D) {
            this.afters[I.id] = I;
            this.hasAfters = true;
        } else {
            this.subscribers[I.id] = I;
            this.hasSubscribers = true;
        }
        return new E.EventHandle(this, I);
    }, subscribe:function (H, G) {
        var F = (arguments.length > 2) ? E.Array(arguments, 2, true) : null;
        return this._on(H, G, F, true);
    }, on:function (H, G) {
        var F = (arguments.length > 2) ? E.Array(arguments, 2, true) : null;
        return this._on(H, G, F, true);
    }, after:function (H, G) {
        var F = (arguments.length > 2) ? E.Array(arguments, 2, true) : null;
        return this._on(H, G, F, D);
    }, detach:function (J, H) {
        if (J && J.detach) {
            return J.detach();
        }
        var K = 0, G = this.subscribers, F, I;
        for (F in G) {
            if (G.hasOwnProperty(F)) {
                I = G[F];
                if (I && (!J || J === I.fn)) {
                    this._delete(I);
                    K++;
                }
            }
        }
        return K;
    }, unsubscribe:function () {
        return this.detach.apply(this, arguments);
    }, _notify:function (I, H, F) {
        this.log(this.type + "->" + "sub: " + I.id);
        var G;
        G = I.notify(H, this);
        if (false === G || this.stopped > 1) {
            this.log(this.type + " cancelled by subscriber");
            return false;
        }
        return true;
    }, log:function (G, F) {
        if (!this.silent) {
        }
    }, fire:function () {
        if (this.fireOnce && this.fired) {
            this.log("fireOnce event: " + this.type + " already fired");
            return true;
        } else {
            var F = E.Array(arguments, 0, true);
            this.fired = true;
            this.firedWith = F;
            if (this.emitFacade) {
                return this.fireComplex(F);
            } else {
                return this.fireSimple(F);
            }
        }
    }, fireSimple:function (F) {
        if (this.hasSubscribers || this.hasAfters) {
            this._procSubs(E.merge(this.subscribers, this.afters), F);
        }
        this._broadcast(F);
        return this.stopped ? false : true;
    }, fireComplex:function (F) {
        F[0] = F[0] || {};
        return this.fireSimple(F);
    }, _procSubs:function (I, G, F) {
        var J, H;
        for (H in I) {
            if (I.hasOwnProperty(H)) {
                J = I[H];
                if (J && J.fn) {
                    if (false === this._notify(J, G, F)) {
                        this.stopped = 2;
                    }
                    if (this.stopped == 2) {
                        return false;
                    }
                }
            }
        }
        return true;
    }, _broadcast:function (G) {
        if (!this.stopped && this.broadcast) {
            var F = E.Array(G);
            F.unshift(this.type);
            if (this.host !== E) {
                E.fire.apply(E, F);
            }
            if (this.broadcast == 2) {
                E.Global.fire.apply(E.Global, F);
            }
        }
    }, unsubscribeAll:function () {
        return this.detachAll.apply(this, arguments);
    }, detachAll:function () {
        return this.detach();
    }, _delete:function (F) {
        if (F) {
            delete F.fn;
            delete F.context;
            delete this.subscribers[F.id];
            delete this.afters[F.id];
        }
    }};
    E.Subscriber = function (H, G, F) {
        this.fn = H;
        this.context = G;
        this.id = E.stamp(this);
        this.args = F;
        this.events = null;
    };
    E.Subscriber.prototype = {_notify:function (J, H, I) {
        var F = this.args, G;
        switch (I.signature) {
            case 0:
                G = this.fn.call(J, I.type, H, J);
                break;
            case 1:
                G = this.fn.call(J, H[0] || null, J);
                break;
            default:
                if (F || H) {
                    H = H || [];
                    F = (F) ? H.concat(F) : H;
                    G = this.fn.apply(J, F);
                } else {
                    G = this.fn.call(J);
                }
        }
        return G;
    }, notify:function (G, I) {
        var J = this.context, F = true;
        if (!J) {
            J = (I.contextFn) ? I.contextFn() : I.context;
        }
        if (E.config.throwFail) {
            F = this._notify(J, G, I);
        } else {
            try {
                F = this._notify(J, G, I);
            } catch (H) {
                E.error(this + " failed: " + H.message, H);
            }
        }
        return F;
    }, contains:function (G, F) {
        if (F) {
            return((this.fn == G) && this.context == F);
        } else {
            return(this.fn == G);
        }
    }};
    (function () {
        var F = E.Lang, H = ":", I = "|", J = "~AFTER~", K = E.cached(function (L, N) {
            if (!N || !F.isString(L) || L.indexOf(H) > -1) {
                return L;
            }
            return N + H + L;
        }), G = E.cached(function (O, Q) {
            var N = O, P, R, L;
            if (!F.isString(N)) {
                return N;
            }
            L = N.indexOf(J);
            if (L > -1) {
                R = true;
                N = N.substr(J.length);
            }
            L = N.indexOf(I);
            if (L > -1) {
                P = N.substr(0, (L));
                N = N.substr(L + 1);
                if (N == "*") {
                    N = null;
                }
            }
            return[P, (Q) ? K(N, Q) : N, R, N];
        }), M = function (L) {
            var N = (F.isObject(L)) ? L : {};
            this._yuievt = this._yuievt || {id:E.guid(), events:{}, targets:{}, config:N, chain:("chain"in N) ? N.chain : E.config.chain, defaults:{context:N.context || this, host:this, emitFacade:N.emitFacade, fireOnce:N.fireOnce, queuable:N.queuable, broadcast:N.broadcast, bubbles:("bubbles"in N) ? N.bubbles : true}};
        };
        M.prototype = {on:function (Q, U, O, V) {
            var Z = G(Q, this._yuievt.config.prefix), a, b, N, g, X, W, d, R = E.Env.evt.handles, P, L, S, e = E.Node, Y, T;
            if (F.isObject(Q)) {
                if (F.isFunction(Q)) {
                    return E.Do.before.apply(E.Do, arguments);
                }
                a = U;
                b = O;
                N = E.Array(arguments, 0, true);
                g = {};
                P = Q._after;
                delete Q._after;
                E.each(Q, function (f, c) {
                    if (f) {
                        a = f.fn || ((E.Lang.isFunction(f)) ? f : a);
                        b = f.context || b;
                    }
                    N[0] = (P) ? J + c : c;
                    N[1] = a;
                    N[2] = b;
                    g[c] = this.on.apply(this, N);
                }, this);
                return(this._yuievt.chain) ? this : new E.EventHandle(g);
            }
            W = Z[0];
            P = Z[2];
            S = Z[3];
            if (e && (this instanceof e) && (S in e.DOM_EVENTS)) {
                N = E.Array(arguments, 0, true);
                N.splice(2, 0, e.getDOMNode(this));
                return E.on.apply(E, N);
            }
            Q = Z[1];
            if (this instanceof YUI) {
                L = E.Env.evt.plugins[Q];
                N = E.Array(arguments, 0, true);
                N[0] = S;
                if (e) {
                    Y = N[2];
                    if (Y instanceof E.NodeList) {
                        Y = E.NodeList.getDOMNodes(Y);
                    } else {
                        if (Y instanceof e) {
                            Y = e.getDOMNode(Y);
                        }
                    }
                    T = (S in e.DOM_EVENTS);
                    if (T) {
                        N[2] = Y;
                    }
                }
                if (L) {
                    d = L.on.apply(E, N);
                } else {
                    if ((!Q) || T) {
                        d = E.Event._attach(N);
                    }
                }
            }
            if (!d) {
                X = this._yuievt.events[Q] || this.publish(Q);
                d = X._on(U, O, (arguments.length > 3) ? E.Array(arguments, 3, true) : null, (P) ? "after" : true);
            }
            if (W) {
                R[W] = R[W] || {};
                R[W][Q] = R[W][Q] || [];
                R[W][Q].push(d);
            }
            return(this._yuievt.chain) ? this : d;
        }, subscribe:function () {
            return this.on.apply(this, arguments);
        }, detach:function (P, U, O) {
            var T = this._yuievt.events, Z, d, c = E.Node, Y = (this instanceof c);
            if (!P && (this !== E)) {
                for (Z in T) {
                    if (T.hasOwnProperty(Z)) {
                        d = T[Z].detach(U, O);
                    }
                }
                if (Y) {
                    E.Event.purgeElement(c.getDOMNode(this));
                }
                return d;
            }
            var X = G(P, this._yuievt.config.prefix), V = F.isArray(X) ? X[0] : null, R = (X) ? X[3] : null, b, L, Q = E.Env.evt.handles, S, N, W, a = function (g, f) {
                var e = g[f];
                if (e) {
                    while (e.length) {
                        b = e.pop();
                        b.detach();
                    }
                }
            };
            if (V) {
                S = Q[V];
                P = X[1];
                if (S) {
                    if (P) {
                        a(S, P);
                    } else {
                        for (Z in S) {
                            if (S.hasOwnProperty(Z)) {
                                a(S, Z);
                            }
                        }
                    }
                    return(this._yuievt.chain) ? this : true;
                }
            } else {
                if (F.isObject(P) && P.detach) {
                    d = P.detach();
                    return(this._yuievt.chain) ? this : d;
                } else {
                    if (Y && ((!R) || (R in c.DOM_EVENTS))) {
                        N = E.Array(arguments, 0, true);
                        N[2] = c.getDOMNode(this);
                        return E.detach.apply(E, N);
                    }
                }
            }
            L = E.Env.evt.plugins[R];
            if (this instanceof YUI) {
                N = E.Array(arguments, 0, true);
                if (L && L.detach) {
                    return L.detach.apply(E, N);
                } else {
                    if (!P || (!L && c && (P in c.DOM_EVENTS))) {
                        N[0] = P;
                        return E.Event.detach.apply(E.Event, N);
                    }
                }
            }
            W = T[P];
            if (W) {
                d = W.detach(U, O);
            }
            return(this._yuievt.chain) ? this : d;
        }, unsubscribe:function () {
            return this.detach.apply(this, arguments);
        }, detachAll:function (L) {
            return this.detach(L);
        }, unsubscribeAll:function () {
            return this.detachAll.apply(this, arguments);
        }, publish:function (O, P) {
            var N, R, L, Q = this._yuievt.config.prefix;
            O = (Q) ? K(O, Q) : O;
            if (F.isObject(O)) {
                L = {};
                E.each(O, function (T, S) {
                    L[S] = this.publish(S, T || P);
                }, this);
                return L;
            }
            N = this._yuievt.events;
            R = N[O];
            if (R) {
                if (P) {
                    R.applyConfig(P, true);
                }
            } else {
                R = new E.CustomEvent(O, (P) ? E.mix(P, this._yuievt.defaults) : this._yuievt.defaults);
                N[O] = R;
            }
            return N[O];
        }, addTarget:function (L) {
            this._yuievt.targets[E.stamp(L)] = L;
            this._yuievt.hasTargets = true;
        }, removeTarget:function (L) {
            delete this._yuievt.targets[E.stamp(L)];
        }, fire:function (P) {
            var S = F.isString(P), O = (S) ? P : (P && P.type), R, L, N, Q = this._yuievt.config.prefix;
            O = (Q) ? K(O, Q) : O;
            R = this.getEvent(O, true);
            if (!R) {
                if (this._yuievt.hasTargets) {
                    L = (S) ? arguments : E.Array(arguments, 0, true).unshift(O);
                    return this.bubble(null, L, this);
                }
                N = true;
            } else {
                L = E.Array(arguments, (S) ? 1 : 0, true);
                N = R.fire.apply(R, L);
                R.target = null;
            }
            return(this._yuievt.chain) ? this : N;
        }, getEvent:function (N, L) {
            var P, O;
            if (!L) {
                P = this._yuievt.config.prefix;
                N = (P) ? K(N, P) : N;
            }
            O = this._yuievt.events;
            return(O && N in O) ? O[N] : null;
        }, after:function (O, N) {
            var L = E.Array(arguments, 0, true);
            switch (F.type(O)) {
                case"function":
                    return E.Do.after.apply(E.Do, arguments);
                case"object":
                    L[0]._after = true;
                    break;
                default:
                    L[0] = J + O;
            }
            return this.on.apply(this, L);
        }, before:function () {
            return this.on.apply(this, arguments);
        }};
        E.EventTarget = M;
        E.mix(E, M.prototype, false, false, {bubbles:false});
        M.call(E);
        YUI.Env.globalEvents = YUI.Env.globalEvents || new M();
        E.Global = YUI.Env.globalEvents;
    })();
}, "3.0.0", {requires:["oop"]});
YUI.add("event-custom-complex", function (A) {
    (function () {
        var C, D, B = A.CustomEvent.prototype;
        A.EventFacade = function (F, E) {
            F = F || {};
            this.details = F.details;
            this.type = F.type;
            this.target = F.target;
            this.currentTarget = E;
            this.relatedTarget = F.relatedTarget;
            this.stopPropagation = function () {
                F.stopPropagation();
            };
            this.stopImmediatePropagation = function () {
                F.stopImmediatePropagation();
            };
            this.preventDefault = function () {
                F.preventDefault();
            };
            this.halt = function (G) {
                F.halt(G);
            };
        };
        B.fireComplex = function (H) {
            var L = A.Env._eventstack, F, J, E, K, G, I;
            if (L) {
                if (this.queuable && this.type != L.next.type) {
                    this.log("queue " + this.type);
                    L.queue.push([this, H]);
                    return true;
                }
            } else {
                A.Env._eventstack = {id:this.id, next:this, silent:this.silent, stopped:0, prevented:0, queue:[]};
                L = A.Env._eventstack;
            }
            this.stopped = 0;
            this.prevented = 0;
            this.target = this.target || this.host;
            I = new A.EventTarget({fireOnce:true, context:this.host});
            this.events = I;
            if (this.preventedFn) {
                I.on("prevented", this.preventedFn);
            }
            if (this.stoppedFn) {
                I.on("stopped", this.stoppedFn);
            }
            this.currentTarget = this.host || this.currentTarget;
            this.details = H.slice();
            this.log("Firing " + this.type);
            this._facade = null;
            F = this._getFacade(H);
            if (A.Lang.isObject(H[0])) {
                H[0] = F;
            } else {
                H.unshift(F);
            }
            if (this.hasSubscribers) {
                this._procSubs(A.merge(this.subscribers), H, F);
            }
            if (this.bubbles && this.host && this.host.bubble && !this.stopped) {
                L.stopped = 0;
                L.prevented = 0;
                G = this.host.bubble(this);
                this.stopped = Math.max(this.stopped, L.stopped);
                this.prevented = Math.max(this.prevented, L.prevented);
            }
            if (this.defaultFn && !this.prevented) {
                this.defaultFn.apply(this.host || this, H);
            }
            this._broadcast(H);
            if (this.hasAfters && !this.prevented && this.stopped < 2) {
                this._procSubs(A.merge(this.afters), H, F);
            }
            if (L.id === this.id) {
                E = L.queue;
                while (E.length) {
                    J = E.pop();
                    K = J[0];
                    L.stopped = 0;
                    L.prevented = 0;
                    L.next = K;
                    K.fire.apply(K, J[1]);
                }
                A.Env._eventstack = null;
            }
            return this.stopped ? false : true;
        };
        B._getFacade = function () {
            var E = this._facade, H, G, F = this.details;
            if (!E) {
                E = new A.EventFacade(this, this.currentTarget);
            }
            H = F && F[0];
            if (A.Lang.isObject(H, true)) {
                G = {};
                A.mix(G, E, true, D);
                A.mix(E, H, true);
                A.mix(E, G, true, D);
            }
            E.details = this.details;
            E.target = this.target;
            E.currentTarget = this.currentTarget;
            E.stopped = 0;
            E.prevented = 0;
            this._facade = E;
            return this._facade;
        };
        B.stopPropagation = function () {
            this.stopped = 1;
            A.Env._eventstack.stopped = 1;
            this.events.fire("stopped", this);
        };
        B.stopImmediatePropagation = function () {
            this.stopped = 2;
            A.Env._eventstack.stopped = 2;
            this.events.fire("stopped", this);
        };
        B.preventDefault = function () {
            if (this.preventable) {
                this.prevented = 1;
                A.Env._eventstack.prevented = 1;
                this.events.fire("prevented", this);
            }
        };
        B.halt = function (E) {
            if (E) {
                this.stopImmediatePropagation();
            } else {
                this.stopPropagation();
            }
            this.preventDefault();
        };
        A.EventTarget.prototype.bubble = function (M, K, I) {
            var G = this._yuievt.targets, J = true, N, L, E, F, H;
            if (!M || ((!M.stopped) && G)) {
                for (F in G) {
                    if (G.hasOwnProperty(F)) {
                        N = G[F];
                        L = M && M.type;
                        E = N.getEvent(L, true);
                        if (!E) {
                            if (N._yuievt.hasTargets) {
                                N.bubble.call(N, M, K, I);
                            }
                        } else {
                            E.target = I || (M && M.target) || this;
                            E.currentTarget = N;
                            H = E.broadcast;
                            E.broadcast = false;
                            J = J && E.fire.apply(E, K || M.details);
                            E.broadcast = H;
                            if (E.stopped) {
                                break;
                            }
                        }
                    }
                }
            }
            return J;
        };
        C = new A.EventFacade();
        D = A.Object.keys(C);
    })();
}, "3.0.0", {requires:["event-custom-base"]});
YUI.add("event-custom", function (A) {
}, "3.0.0", {use:["event-custom-base", "event-custom-complex"]});