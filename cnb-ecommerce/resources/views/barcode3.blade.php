< !doctype html >
    <
    html lang = "en" >

    <
    head >
    <
    title > Barcode Reader JavaScript Demo | Dynamsoft < /title> <
    meta name = "description"
content = "This barcode reader web SDK demo enables decoding barcodes from within a browser; no installation required on the client side." >
    <
    meta charset = "utf-8" / >
    <
    link rel = "shortcut icon"
href = "./img/faviconJs.ico" / >
    <
    meta name = "viewport"
content = "width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" >
    <
    meta name = "theme-color"
content = "#000000" / >
    <
    link rel = "manifest"
href = "./manifest.json" / >
    <
    meta name = "mobile-web-app-capable"
content = "yes" >
    <
    link rel = "apple-touch-icon"
href = "img/faviconJs.ico" >
    <
    meta name = "apple-mobile-web-app-title"
content = "demo for ios" >
    <
    meta name = "apple-mobile-web-app-capable"
content = "yes" >
    <
    meta name = "apple-mobile-web-app-status-bar-style"
content = "default" >
    <
    style >
    body,
    html {
        width: 100 % ;
        height: 100 %
    }

    <
    /style> <
    link href = "./static/css/3.9205e24f.chunk.css"
rel = "stylesheet" >
    <
    link href = "./static/css/main.bad5d397.chunk.css"
rel = "stylesheet" >
    <
    /head>

    <
    body > < noscript > You need to enable JavaScript to run this app. < /noscript> <
    div id = "root" > < /div> <
    script src = "jquery-3.2.1.min.js" > < /script> <
    script src = "kUtil.js" > < /script> <
    script src = "https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode/dist/dbr.js"
data - productkeys = "234810-dbr_js_demo" > < /script> <
    script >
    function getQueryStringArgs() {
        var e = window.location.search.length > 0 ? window.location.search.substring(1) : "",
            n = {},
            o = e.length ? e.split("&") : [],
            r = null,
            t = null,
            i = null,
            l = 0,
            s = o.length;
        for (l = 0; l < s; l++) r = o[l].split("="), t = decodeURIComponent(r[0]), i = decodeURIComponent(r[1]), t.length && (n[t] = i);
        return n
    }
"serviceWorker" in navigator ? window.addEventListener("load", (function () {
        navigator.serviceWorker.register("service-worker.js").then((function (e) {
            console.log("ServiceWorker registration successful with scope: ", e.scope)
        }), (function (e) {
            console.log("ServiceWorker registration failed: ", e)
        })).catch((function (e) {
            console.log(e)
        }))
    })) : console.log("service worker is not supported"), Dynamsoft.DBR.BarcodeReader._bUseFullFeature = !!getQueryStringArgs().full, Dynamsoft.DBR.BarcodeScanner.defaultUIElementURL = "dbr.scanner.html" <
    /script> <
    script type = "text/javascript" >
    ! function (e, t, a, n, r, c, i) {
        e.GoogleAnalyticsObject = r, e.ga = e.ga || function () {
            (e.ga.q = e.ga.q || []).push(arguments)
        }, e.ga.l = 1 * new Date, c = t.createElement(a), i = t.getElementsByTagName(a)[0], c.async = 1, c.src = "//www.google-analytics.com/analytics.js", i.parentNode.insertBefore(c, i)
    }(window, document, "script", 0, "ga"), ga("create", "UA-19660825-1", "auto"), ga("require", "displayfeatures"), ga("require", "ec"), ga("send", "pageview"),
    function () {
        var e = !1;

        function t() {
            !1 === e && (e = !0, Munchkin.init("465-JJI-384"))
        }
        var a = document.createElement("script");
        a.type = "text/javascript", a.async = !0, a.src = "//munchkin.marketo.net/munchkin.js", a.onreadystatechange = function () {
            "complete" != this.readyState && "loaded" != this.readyState || t()
        }, a.onload = t, document.getElementsByTagName("head")[0].appendChild(a)
    }(),
    function (e, t, a, n, r, c) {
        e.rtp = e.rtp || function () {
            (e.rtp.q = e.rtp.q || []).push(arguments)
        }, e.rtp.a = r, e.rtp.e = void 0;
        var i = t.createElement("script");
        i.async = !0, i.type = "text/javascript", i.src = "//sjrtp-cdn.marketo.com/rtp-api/v1/rtp.js?aid=" + r;
        var s = t.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(i, s)
    }(window, document, 0, 0, "dynamsoftinc"), rtp("send", "view"), rtp("get", "campaign", !0) <
    /script> <
    script >
    ! function (e) {
        function r(r) {
            for (var n, i, a = r[0], c = r[1], l = r[2], s = 0, p = []; s < a.length; s++) i = a[s], Object.prototype.hasOwnProperty.call(o, i) && o[i] && p.push(o[i][0]), o[i] = 0;
            for (n in c) Object.prototype.hasOwnProperty.call(c, n) && (e[n] = c[n]);
            for (f && f(r); p.length;) p.shift()();
            return u.push.apply(u, l || []), t()
        }

        function t() {
            for (var e, r = 0; r < u.length; r++) {
                for (var t = u[r], n = !0, a = 1; a < t.length; a++) {
                    var c = t[a];
                    0 !== o[c] && (n = !1)
                }
                n && (u.splice(r--, 1), e = i(i.s = t[0]))
            }
            return e
        }
        var n = {},
            o = {
                2: 0
            },
            u = [];

        function i(r) {
            if (n[r]) return n[r].exports;
            var t = n[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(t.exports, t, t.exports, i), t.l = !0, t.exports
        }
        i.e = function (e) {
            var r = [],
                t = o[e];
            if (0 !== t)
                if (t) r.push(t[2]);
                else {
                    var n = new Promise((function (r, n) {
                        t = o[e] = [r, n]
                    }));
                    r.push(t[2] = n);
                    var u, a = document.createElement("script");
                    a.charset = "utf-8", a.timeout = 120, i.nc && a.setAttribute("nonce", i.nc), a.src = function (e) {
                        return i.p + "static/js/" + ({
                            0: "antd-icons"
                        } [e] || e) + "." + {
                            0: "0adfd6e7"
                        } [e] + ".chunk.js"
                    }(e);
                    var c = new Error;
                    u = function (r) {
                        a.onerror = a.onload = null, clearTimeout(l);
                        var t = o[e];
                        if (0 !== t) {
                            if (t) {
                                var n = r && ("load" === r.type ? "missing" : r.type),
                                    u = r && r.target && r.target.src;
                                c.message = "Loading chunk " + e + " failed.\n(" + n + ": " + u + ")", c.name = "ChunkLoadError", c.type = n, c.request = u, t[1](c)
                            }
                            o[e] = void 0
                        }
                    };
                    var l = setTimeout((function () {
                        u({
                            type: "timeout",
                            target: a
                        })
                    }), 12e4);
                    a.onerror = a.onload = u, document.head.appendChild(a)
                } return Promise.all(r)
        }, i.m = e, i.c = n, i.d = function (e, r, t) {
            i.o(e, r) || Object.defineProperty(e, r, {
                enumerable: !0,
                get: t
            })
        }, i.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        }, i.t = function (e, r) {
            if (1 & r && (e = i(e)), 8 & r) return e;
            if (4 & r && "object" == typeof e && e && e.__esModule) return e;
            var t = Object.create(null);
            if (i.r(t), Object.defineProperty(t, "default", {
                    enumerable: !0,
                    value: e
                }), 2 & r && "string" != typeof e)
                for (var n in e) i.d(t, n, function (r) {
                    return e[r]
                }.bind(null, n));
            return t
        }, i.n = function (e) {
            var r = e && e.__esModule ? function () {
                return e.default
            } : function () {
                return e
            };
            return i.d(r, "a", r), r
        }, i.o = function (e, r) {
            return Object.prototype.hasOwnProperty.call(e, r)
        }, i.p = "./", i.oe = function (e) {
            throw console.error(e), e
        };
        var a = this["webpackJsonpmobile-online-demo"] = this["webpackJsonpmobile-online-demo"] || [],
            c = a.push.bind(a);
        a.push = r, a = a.slice();
        for (var l = 0; l < a.length; l++) r(a[l]);
        var f = c;
        t()
    }([]) <
    /script> <
    script src = "./static/js/3.340ef9a8.chunk.js" > < /script> <
    script src = "./static/js/main.e756bd5a.chunk.js" > < /script> <
    /body>

    <
    /html>
