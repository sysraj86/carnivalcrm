(function () {
    var d = tinymce.explode("id,name,width,height,style,align,class,hspace,vspace,bgcolor,type"), h = tinymce.makeMap(d.join(",")), b = tinymce.html.Node, f, a, g = tinymce.util.JSON, e;
    f = [
        ["Flash", "d27cdb6e-ae6d-11cf-96b8-444553540000", "application/x-shockwave-flash", "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"],
        ["ShockWave", "166b1bca-3f9c-11cf-8075-444553540000", "application/x-director", "http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=8,5,1,0"],
        ["WindowsMedia", "6bf52a52-394a-11d3-b153-00c04f79faa6,22d6f312-b0f6-11d0-94ab-0080c74c7e95,05589fa1-c356-11ce-bf01-00aa0055595a", "application/x-mplayer2", "http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701"],
        ["QuickTime", "02bf25d5-8c17-4b23-bc80-d3488abddc6b", "video/quicktime", "http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0"],
        ["RealMedia", "cfcdaa03-8be4-11cf-b84b-0020afbbccfa", "audio/x-pn-realaudio-plugin", "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"],
        ["Java", "8ad9c840-044e-11d1-b3e9-00805f499d93", "application/x-java-applet", "http://java.sun.com/products/plugin/autodl/jinstall-1_5_0-windows-i586.cab#Version=1,5,0,0"],
        ["Silverlight", "dfeaf541-f3e1-4c24-acac-99c30715084a", "application/x-silverlight-2"],
        ["Iframe"],
        ["Video"],
        ["Audio"]
    ];
    function c(m) {
        var l, j, k;
        if (m && !m.splice) {
            j = [];
            for (k = 0; true; k++) {
                if (m[k]) {
                    j[k] = m[k]
                } else {
                    break
                }
            }
            return j
        }
        return m
    }

    tinymce.create("tinymce.plugins.MediaPlugin", {init:function (n, j) {
        var r = this, l = {}, m, p, q, k;

        function o(i) {
            return i && i.nodeName === "IMG" && n.dom.hasClass(i, "mceItemMedia")
        }

        r.editor = n;
        r.url = j;
        a = "";
        for (m = 0; m < f.length; m++) {
            k = f[m][0];
            q = {name:k, clsids:tinymce.explode(f[m][1] || ""), mimes:tinymce.explode(f[m][2] || ""), codebase:f[m][3]};
            for (p = 0; p < q.clsids.length; p++) {
                l["clsid:" + q.clsids[p]] = q
            }
            for (p = 0; p < q.mimes.length; p++) {
                l[q.mimes[p]] = q
            }
            l["mceItem" + k] = q;
            l[k.toLowerCase()] = q;
            a += (a ? "|" : "") + k
        }
        tinymce.each(n.getParam("media_types", "video=mp4,m4v,ogv,webm;silverlight=xap;flash=swf,flv;shockwave=dcr;quicktime=mov,qt,mpg,mpeg;shockwave=dcr;windowsmedia=avi,wmv,wm,asf,asx,wmx,wvx;realmedia=rm,ra,ram;java=jar;audio=mp3,ogg").split(";"), function (v) {
            var s, u, t;
            v = v.split(/=/);
            u = tinymce.explode(v[1].toLowerCase());
            for (s = 0; s < u.length; s++) {
                t = l[v[0].toLowerCase()];
                if (t) {
                    l[u[s]] = t
                }
            }
        });
        a = new RegExp("write(" + a + ")\\(([^)]+)\\)");
        r.lookup = l;
        n.onPreInit.add(function () {
            n.schema.addValidElements("object[id|style|width|height|classid|codebase|*],param[name|value],embed[id|style|width|height|type|src|*],video[*],audio[*],source[*]");
            n.parser.addNodeFilter("object,embed,video,audio,script,iframe", function (s) {
                var t = s.length;
                while (t--) {
                    r.objectToImg(s[t])
                }
            });
            n.serializer.addNodeFilter("img", function (s, u, t) {
                var v = s.length, w;
                while (v--) {
                    w = s[v];
                    if ((w.attr("class") || "").indexOf("mceItemMedia") !== -1) {
                        r.imgToObject(w, t)
                    }
                }
            })
        });
        n.onInit.add(function () {
            if (n.theme && n.theme.onResolveName) {
                n.theme.onResolveName.add(function (i, s) {
                    if (s.name === "img" && n.dom.hasClass(s.node, "mceItemMedia")) {
                        s.name = "media"
                    }
                })
            }
            if (n && n.plugins.contextmenu) {
                n.plugins.contextmenu.onContextMenu.add(function (s, t, i) {
                    if (i.nodeName === "IMG" && i.className.indexOf("mceItemMedia") !== -1) {
                        t.add({title:"media.edit", icon:"media", cmd:"mceMedia"})
                    }
                })
            }
        });
        n.addCommand("mceMedia", function () {
            var s, i;
            i = n.selection.getNode();
            if (o(i)) {
                s = n.dom.getAttrib(i, "data-mce-json");
                if (s) {
                    s = g.parse(s);
                    tinymce.each(d, function (t) {
                        var u = n.dom.getAttrib(i, t);
                        if (u) {
                            s[t] = u
                        }
                    });
                    s.type = r.getType(i.className).name.toLowerCase()
                }
            }
            if (!s) {
                s = {type:"flash", video:{sources:[]}, params:{}}
            }
            n.windowManager.open({file:j + "/media.htm", width:430 + parseInt(n.getLang("media.delta_width", 0)), height:500 + parseInt(n.getLang("media.delta_height", 0)), inline:1}, {plugin_url:j, data:s})
        });
        n.addButton("media", {title:"media.desc", cmd:"mceMedia"});
        n.onNodeChange.add(function (s, i, t) {
            i.setActive("media", o(t))
        })
    }, convertUrl:function (k, n) {
        var j = this, m = j.editor, l = m.settings, o = l.url_converter, i = l.url_converter_scope || j;
        if (!k) {
            return k
        }
        if (n) {
            return m.documentBaseURI.toAbsolute(k)
        }
        return o.call(i, k, "src", "object")
    }, getInfo:function () {
        return{longname:"Media", author:"Moxiecode Systems AB", authorurl:"http://tinymce.moxiecode.com", infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/media", version:tinymce.majorVersion + "." + tinymce.minorVersion}
    }, dataToImg:function (m, k) {
        var r = this, o = r.editor, p = o.documentBaseURI, j, q, n, l;
        m.params.src = r.convertUrl(m.params.src, k);
        q = m.video.attrs;
        if (q) {
            q.src = r.convertUrl(q.src, k)
        }
        if (q) {
            q.poster = r.convertUrl(q.poster, k)
        }
        j = c(m.video.sources);
        if (j) {
            for (l = 0; l < j.length; l++) {
                j[l].src = r.convertUrl(j[l].src, k)
            }
        }
        n = r.editor.dom.create("img", {id:m.id, style:m.style, align:m.align, src:r.editor.theme.url + "/img/trans.gif", "class":"mceItemMedia mceItem" + r.getType(m.type).name, "data-mce-json":g.serialize(m, "'")});
        n.width = m.width || (m.type == "audio" ? "300" : "320");
        n.height = m.height || (m.type == "audio" ? "32" : "240");
        return n
    }, dataToHtml:function (i, j) {
        return this.editor.serializer.serialize(this.dataToImg(i, j), {forced_root_block:"", force_absolute:j})
    }, htmlToData:function (k) {
        var j, i, l;
        l = {type:"flash", video:{sources:[]}, params:{}};
        j = this.editor.parser.parse(k);
        i = j.getAll("img")[0];
        if (i) {
            l = g.parse(i.attr("data-mce-json"));
            l.type = this.getType(i.attr("class")).name.toLowerCase();
            tinymce.each(d, function (m) {
                var n = i.attr(m);
                if (n) {
                    l[m] = n
                }
            })
        }
        return l
    }, getType:function (m) {
        var k, j, l;
        j = tinymce.explode(m, " ");
        for (k = 0; k < j.length; k++) {
            l = this.lookup[j[k]];
            if (l) {
                return l
            }
        }
    }, imgToObject:function (x, n) {
        var t = this, o = t.editor, A, F, j, s, G, w, E, u, k, C, r, p, y, B, m, v, l, z, D;

        function q(i, H) {
            var L, K, M, J, I;
            I = o.getParam("flash_video_player_url", t.convertUrl(t.url + "/moxieplayer.swf"));
            if (I) {
                L = o.documentBaseURI;
                E.params.src = I;
                if (o.getParam("flash_video_player_absvideourl", true)) {
                    i = L.toAbsolute(i || "", true);
                    H = L.toAbsolute(H || "", true)
                }
                M = "";
                K = o.getParam("flash_video_player_flashvars", {url:"$url", poster:"$poster"});
                tinymce.each(K, function (O, N) {
                    O = O.replace(/\$url/, i || "");
                    O = O.replace(/\$poster/, H || "");
                    if (O.length > 0) {
                        M += (M ? "&" : "") + N + "=" + escape(O)
                    }
                });
                if (M.length) {
                    E.params.flashvars = M
                }
                J = o.getParam("flash_video_player_params", {allowfullscreen:true, allowscriptaccess:true});
                tinymce.each(J, function (O, N) {
                    E.params[N] = "" + O
                })
            }
        }

        E = x.attr("data-mce-json");
        if (!E) {
            return
        }
        E = g.parse(E);
        p = this.getType(x.attr("class"));
        z = x.attr("data-mce-style");
        if (!z) {
            z = x.attr("style");
            if (z) {
                z = o.dom.serializeStyle(o.dom.parseStyle(z, "img"))
            }
        }
        if (p.name === "Iframe") {
            v = new b("iframe", 1);
            tinymce.each(d, function (i) {
                var H = x.attr(i);
                if (i == "class" && H) {
                    H = H.replace(/mceItem.+ ?/g, "")
                }
                if (H && H.length > 0) {
                    v.attr(i, H)
                }
            });
            for (G in E.params) {
                v.attr(G, E.params[G])
            }
            v.attr({style:z, src:E.params.src});
            x.replace(v);
            return
        }
        if (this.editor.settings.media_use_script) {
            v = new b("script", 1).attr("type", "text/javascript");
            w = new b("#text", 3);
            w.value = "write" + p.name + "(" + g.serialize(tinymce.extend(E.params, {width:x.attr("width"), height:x.attr("height")})) + ");";
            v.append(w);
            x.replace(v);
            return
        }
        if (p.name === "Video" && E.video.sources[0]) {
            A = new b("video", 1).attr(tinymce.extend({id:x.attr("id"), width:x.attr("width"), height:x.attr("height"), style:z}, E.video.attrs));
            if (E.video.attrs) {
                l = E.video.attrs.poster
            }
            k = E.video.sources = c(E.video.sources);
            for (y = 0; y < k.length; y++) {
                if (/\.mp4$/.test(k[y].src)) {
                    m = k[y].src
                }
            }
            if (!k[0].type) {
                A.attr("src", k[0].src);
                k.splice(0, 1)
            }
            for (y = 0; y < k.length; y++) {
                u = new b("source", 1).attr(k[y]);
                u.shortEnded = true;
                A.append(u)
            }
            if (m) {
                q(m, l);
                p = t.getType("flash")
            } else {
                E.params.src = ""
            }
        }
        if (p.name === "Audio" && E.video.sources[0]) {
            D = new b("audio", 1).attr(tinymce.extend({id:x.attr("id"), width:x.attr("width"), height:x.attr("height"), style:z}, E.video.attrs));
            if (E.video.attrs) {
                l = E.video.attrs.poster
            }
            k = E.video.sources = c(E.video.sources);
            if (!k[0].type) {
                D.attr("src", k[0].src);
                k.splice(0, 1)
            }
            for (y = 0; y < k.length; y++) {
                u = new b("source", 1).attr(k[y]);
                u.shortEnded = true;
                D.append(u)
            }
            E.params.src = ""
        }
        if (E.params.src) {
            if (/\.flv$/i.test(E.params.src)) {
                q(E.params.src, "")
            }
            if (n && n.force_absolute) {
                E.params.src = o.documentBaseURI.toAbsolute(E.params.src)
            }
            F = new b("object", 1).attr({id:x.attr("id"), width:x.attr("width"), height:x.attr("height"), style:z});
            tinymce.each(d, function (i) {
                if (E[i] && i != "type") {
                    F.attr(i, E[i])
                }
            });
            for (G in E.params) {
                r = new b("param", 1);
                r.shortEnded = true;
                w = E.params[G];
                if (G === "src" && p.name === "WindowsMedia") {
                    G = "url"
                }
                r.attr({name:G, value:w});
                F.append(r)
            }
            if (this.editor.getParam("media_strict", true)) {
                F.attr({data:E.params.src, type:p.mimes[0]})
            } else {
                F.attr({classid:"clsid:" + p.clsids[0], codebase:p.codebase});
                j = new b("embed", 1);
                j.shortEnded = true;
                j.attr({id:x.attr("id"), width:x.attr("width"), height:x.attr("height"), style:z, type:p.mimes[0]});
                for (G in E.params) {
                    j.attr(G, E.params[G])
                }
                tinymce.each(d, function (i) {
                    if (E[i] && i != "type") {
                        j.attr(i, E[i])
                    }
                });
                F.append(j)
            }
            if (E.object_html) {
                w = new b("#text", 3);
                w.raw = true;
                w.value = E.object_html;
                F.append(w)
            }
            if (A) {
                A.append(F)
            }
        }
        if (A) {
            if (E.video_html) {
                w = new b("#text", 3);
                w.raw = true;
                w.value = E.video_html;
                A.append(w)
            }
        }
        if (D) {
            if (E.video_html) {
                w = new b("#text", 3);
                w.raw = true;
                w.value = E.video_html;
                D.append(w)
            }
        }
        if (A || D || F) {
            x.replace(A || D || F)
        } else {
            x.remove()
        }
    }, objectToImg:function (y) {
        var F, j, A, p, G, H, u, w, t, B, z, q, o, D, x, k, E, n, C = this.lookup, l, v, s = this.editor.settings.url_converter, m = this.editor.settings.url_converter_scope;

        function r(i) {
            return new tinymce.html.Serializer({inner:true, validate:false}).serialize(i)
        }

        if (!y.parent) {
            return
        }
        if (y.name === "script") {
            if (y.firstChild) {
                l = a.exec(y.firstChild.value)
            }
            if (!l) {
                return
            }
            n = l[1];
            E = {video:{}, params:g.parse(l[2])};
            w = E.params.width;
            t = E.params.height
        }
        E = E || {video:{}, params:{}};
        G = new b("img", 1);
        G.attr({src:this.editor.theme.url + "/img/trans.gif"});
        H = y.name;
        if (H === "video" || H == "audio") {
            A = y;
            F = y.getAll("object")[0];
            j = y.getAll("embed")[0];
            w = A.attr("width");
            t = A.attr("height");
            u = A.attr("id");
            E.video = {attrs:{}, sources:[]};
            v = E.video.attrs;
            for (H in A.attributes.map) {
                v[H] = A.attributes.map[H]
            }
            x = y.attr("src");
            if (x) {
                E.video.sources.push({src:s.call(m, x, "src", y.name)})
            }
            k = A.getAll("source");
            for (z = 0; z < k.length; z++) {
                x = k[z].remove();
                E.video.sources.push({src:s.call(m, x.attr("src"), "src", "source"), type:x.attr("type"), media:x.attr("media")})
            }
            if (v.poster) {
                v.poster = s.call(m, v.poster, "poster", y.name)
            }
        }
        if (y.name === "object") {
            F = y;
            j = y.getAll("embed")[0]
        }
        if (y.name === "embed") {
            j = y
        }
        if (y.name === "iframe") {
            p = y;
            n = "Iframe"
        }
        if (F) {
            w = w || F.attr("width");
            t = t || F.attr("height");
            B = B || F.attr("style");
            u = u || F.attr("id");
            D = F.getAll("param");
            for (z = 0; z < D.length; z++) {
                o = D[z];
                H = o.remove().attr("name");
                if (!h[H]) {
                    E.params[H] = o.attr("value")
                }
            }
            E.params.src = E.params.src || F.attr("data")
        }
        if (j) {
            w = w || j.attr("width");
            t = t || j.attr("height");
            B = B || j.attr("style");
            u = u || j.attr("id");
            for (H in j.attributes.map) {
                if (!h[H] && !E.params[H]) {
                    E.params[H] = j.attributes.map[H]
                }
            }
        }
        if (p) {
            w = p.attr("width");
            t = p.attr("height");
            B = B || p.attr("style");
            u = p.attr("id");
            tinymce.each(d, function (i) {
                G.attr(i, p.attr(i))
            });
            for (H in p.attributes.map) {
                if (!h[H] && !E.params[H]) {
                    E.params[H] = p.attributes.map[H]
                }
            }
        }
        if (E.params.movie) {
            E.params.src = E.params.src || E.params.movie;
            delete E.params.movie
        }
        if (E.params.src) {
            E.params.src = s.call(m, E.params.src, "src", "object")
        }
        if (A) {
            if (y.name === "video") {
                n = C.video.name
            } else {
                if (y.name === "audio") {
                    n = C.audio.name
                }
            }
        }
        if (F && !n) {
            n = (C[(F.attr("clsid") || "").toLowerCase()] || C[(F.attr("type") || "").toLowerCase()] || {}).name
        }
        if (j && !n) {
            n = (C[(j.attr("type") || "").toLowerCase()] || {}).name
        }
        y.replace(G);
        if (j) {
            j.remove()
        }
        if (F) {
            q = r(F.remove());
            if (q) {
                E.object_html = q
            }
        }
        if (A) {
            q = r(A.remove());
            if (q) {
                E.video_html = q
            }
        }
        G.attr({id:u, "class":"mceItemMedia mceItem" + (n || "Flash"), style:B, width:w || (y.name == "audio" ? "300" : "320"), height:t || (y.name == "audio" ? "32" : "240"), "data-mce-json":g.serialize(E, "'")})
    }});
    tinymce.PluginManager.add("media", tinymce.plugins.MediaPlugin)
})();