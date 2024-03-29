/**
 * Dynamsoft JavaScript Library
 * @product Dynamsoft Barcode Reader JS Edition
 * @website http://www.dynamsoft.com
 * @preserve Copyright 2021, Dynamsoft Corporation
 * @author Dynamsoft
 * @version 8.1.2 (js 20210121)
 * @fileoverview Dynamsoft JavaScript Library for Barcode Reader
 * More info on DBR JS: https://www.dynamsoft.com/Products/barcode-recognition-javascript.aspx
 */
! function (e, t) {
    let bNode = !!(typeof global == "object" && global.process && global.process.release && global.process.release.name);
    "object" == typeof exports && "object" == typeof module ? module.exports = !bNode ? t() : t(("worker_threads"), ("https"), ("http"), ("fs"), ("os")) : "function" == typeof define && define.amd ? define(t) : "object" == typeof exports ? exports.dbr = !bNode ? t() : t(("worker_threads"), ("https"), ("http"), ("fs"), ("os")) : e.dbr = t(e.worker_threads, e.https, e.http, e.fs, e.os)
}(("object" == typeof window ? window : global), (function (e, t, n, r, i) {
    return function (e) {
        var t = {};

        function n(r) {
            if (t[r]) return t[r].exports;
            var i = t[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return e[r].call(i.exports, i, i.exports, n), i.l = !0, i.exports
        }
        return n.m = e, n.c = t, n.d = function (e, t, r) {
            n.o(e, t) || Object.defineProperty(e, t, {
                enumerable: !0,
                get: r
            })
        }, n.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        }, n.t = function (e, t) {
            if (1 & t && (e = n(e)), 8 & t) return e;
            if (4 & t && "object" == typeof e && e && e.__esModule) return e;
            var r = Object.create(null);
            if (n.r(r), Object.defineProperty(r, "default", {
                    enumerable: !0,
                    value: e
                }), 2 & t && "string" != typeof e)
                for (var i in e) n.d(r, i, function (t) {
                    return e[t]
                }.bind(null, i));
            return r
        }, n.n = function (e) {
            var t = e && e.__esModule ? function () {
                return e.default
            } : function () {
                return e
            };
            return n.d(t, "a", t), t
        }, n.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, n.p = "", n(n.s = 6)
    }([function (e, t, n) {
        e.exports = function e(t, n, r) {
            function i(s, a) {
                if (!n[s]) {
                    if (!t[s]) {
                        if (o) return o(s, !0);
                        var d = new Error("Cannot find module '" + s + "'");
                        throw d.code = "MODULE_NOT_FOUND", d
                    }
                    var l = n[s] = {
                        exports: {}
                    };
                    t[s][0].call(l.exports, (function (e) {
                        var n = t[s][1][e];
                        return i(n || e)
                    }), l, l.exports, e, t, n, r)
                }
                return n[s].exports
            }
            for (var o = !1, s = 0; s < r.length; s++) i(r[s]);
            return i
        }({
            1: [function (e, t, n) {
                (function (e) {
                    "use strict";
                    var n, r, i = e.MutationObserver || e.WebKitMutationObserver;
                    if (i) {
                        var o = 0,
                            s = new i(c),
                            a = e.document.createTextNode("");
                        s.observe(a, {
                            characterData: !0
                        }), n = function () {
                            a.data = o = ++o % 2
                        }
                    } else if (e.setImmediate || void 0 === e.MessageChannel) n = "document" in e && "onreadystatechange" in e.document.createElement("script") ? function () {
                        var t = e.document.createElement("script");
                        t.onreadystatechange = function () {
                            c(), t.onreadystatechange = null, t.parentNode.removeChild(t), t = null
                        }, e.document.documentElement.appendChild(t)
                    } : function () {
                        setTimeout(c, 0)
                    };
                    else {
                        var d = new e.MessageChannel;
                        d.port1.onmessage = c, n = function () {
                            d.port2.postMessage(0)
                        }
                    }
                    var l = [];

                    function c() {
                        var e, t;
                        r = !0;
                        for (var n = l.length; n;) {
                            for (t = l, l = [], e = -1; ++e < n;) t[e]();
                            n = l.length
                        }
                        r = !1
                    }
                    t.exports = function (e) {
                        1 !== l.push(e) || r || n()
                    }
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
            }, {}],
            2: [function (e, t, n) {
                "use strict";
                var r = e(1);

                function i() {}
                var o = {},
                    s = ["REJECTED"],
                    a = ["FULFILLED"],
                    d = ["PENDING"];

                function l(e) {
                    if ("function" != typeof e) throw new TypeError("resolver must be a function");
                    this.state = d, this.queue = [], this.outcome = void 0, e !== i && h(this, e)
                }

                function c(e, t, n) {
                    this.promise = e, "function" == typeof t && (this.onFulfilled = t, this.callFulfilled = this.otherCallFulfilled), "function" == typeof n && (this.onRejected = n, this.callRejected = this.otherCallRejected)
                }

                function u(e, t, n) {
                    r((function () {
                        var r;
                        try {
                            r = t(n)
                        } catch (t) {
                            return o.reject(e, t)
                        }
                        r === e ? o.reject(e, new TypeError("Cannot resolve promise with itself")) : o.resolve(e, r)
                    }))
                }

                function _(e) {
                    var t = e && e.then;
                    if (e && ("object" == typeof e || "function" == typeof e) && "function" == typeof t) return function () {
                        t.apply(e, arguments)
                    }
                }

                function h(e, t) {
                    var n = !1;

                    function r(t) {
                        n || (n = !0, o.reject(e, t))
                    }

                    function i(t) {
                        n || (n = !0, o.resolve(e, t))
                    }
                    var s = f((function () {
                        t(i, r)
                    }));
                    "error" === s.status && r(s.value)
                }

                function f(e, t) {
                    var n = {};
                    try {
                        n.value = e(t), n.status = "success"
                    } catch (e) {
                        n.status = "error", n.value = e
                    }
                    return n
                }
                t.exports = l, l.prototype.catch = function (e) {
                    return this.then(null, e)
                }, l.prototype.then = function (e, t) {
                    if ("function" != typeof e && this.state === a || "function" != typeof t && this.state === s) return this;
                    var n = new this.constructor(i);
                    return this.state !== d ? u(n, this.state === a ? e : t, this.outcome) : this.queue.push(new c(n, e, t)), n
                }, c.prototype.callFulfilled = function (e) {
                    o.resolve(this.promise, e)
                }, c.prototype.otherCallFulfilled = function (e) {
                    u(this.promise, this.onFulfilled, e)
                }, c.prototype.callRejected = function (e) {
                    o.reject(this.promise, e)
                }, c.prototype.otherCallRejected = function (e) {
                    u(this.promise, this.onRejected, e)
                }, o.resolve = function (e, t) {
                    var n = f(_, t);
                    if ("error" === n.status) return o.reject(e, n.value);
                    var r = n.value;
                    if (r) h(e, r);
                    else {
                        e.state = a, e.outcome = t;
                        for (var i = -1, s = e.queue.length; ++i < s;) e.queue[i].callFulfilled(t)
                    }
                    return e
                }, o.reject = function (e, t) {
                    e.state = s, e.outcome = t;
                    for (var n = -1, r = e.queue.length; ++n < r;) e.queue[n].callRejected(t);
                    return e
                }, l.resolve = function (e) {
                    return e instanceof this ? e : o.resolve(new this(i), e)
                }, l.reject = function (e) {
                    var t = new this(i);
                    return o.reject(t, e)
                }, l.all = function (e) {
                    var t = this;
                    if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
                    var n = e.length,
                        r = !1;
                    if (!n) return this.resolve([]);
                    for (var s = new Array(n), a = 0, d = -1, l = new this(i); ++d < n;) c(e[d], d);
                    return l;

                    function c(e, i) {
                        t.resolve(e).then((function (e) {
                            s[i] = e, ++a !== n || r || (r = !0, o.resolve(l, s))
                        }), (function (e) {
                            r || (r = !0, o.reject(l, e))
                        }))
                    }
                }, l.race = function (e) {
                    var t = this;
                    if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
                    var n = e.length,
                        r = !1;
                    if (!n) return this.resolve([]);
                    for (var s, a = -1, d = new this(i); ++a < n;) s = e[a], t.resolve(s).then((function (e) {
                        r || (r = !0, o.resolve(d, e))
                    }), (function (e) {
                        r || (r = !0, o.reject(d, e))
                    }));
                    return d
                }
            }, {
                1: 1
            }],
            3: [function (e, t, n) {
                (function (t) {
                    "use strict";
                    "function" != typeof t.Promise && (t.Promise = e(2))
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
            }, {
                2: 2
            }],
            4: [function (e, t, n) {
                "use strict";
                var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                        return typeof e
                    } : function (e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    i = function () {
                        try {
                            if ("undefined" != typeof indexedDB) return indexedDB;
                            if ("undefined" != typeof webkitIndexedDB) return webkitIndexedDB;
                            if ("undefined" != typeof mozIndexedDB) return mozIndexedDB;
                            if ("undefined" != typeof OIndexedDB) return OIndexedDB;
                            if ("undefined" != typeof msIndexedDB) return msIndexedDB
                        } catch (e) {
                            return
                        }
                    }();

                function o(e, t) {
                    e = e || [], t = t || {};
                    try {
                        return new Blob(e, t)
                    } catch (i) {
                        if ("TypeError" !== i.name) throw i;
                        for (var n = new("undefined" != typeof BlobBuilder ? BlobBuilder : "undefined" != typeof MSBlobBuilder ? MSBlobBuilder : "undefined" != typeof MozBlobBuilder ? MozBlobBuilder : WebKitBlobBuilder), r = 0; r < e.length; r += 1) n.append(e[r]);
                        return n.getBlob(t.type)
                    }
                }
                "undefined" == typeof Promise && e(3);
                var s = Promise;

                function a(e, t) {
                    t && e.then((function (e) {
                        t(null, e)
                    }), (function (e) {
                        t(e)
                    }))
                }

                function d(e, t, n) {
                    "function" == typeof t && e.then(t), "function" == typeof n && e.catch(n)
                }

                function l(e) {
                    return "string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e)), e
                }

                function c() {
                    if (arguments.length && "function" == typeof arguments[arguments.length - 1]) return arguments[arguments.length - 1]
                }
                var u = void 0,
                    _ = {},
                    h = Object.prototype.toString;

                function f(e) {
                    return "boolean" == typeof u ? s.resolve(u) : function (e) {
                        return new s((function (t) {
                            var n = e.transaction("local-forage-detect-blob-support", "readwrite"),
                                r = o([""]);
                            n.objectStore("local-forage-detect-blob-support").put(r, "key"), n.onabort = function (e) {
                                e.preventDefault(), e.stopPropagation(), t(!1)
                            }, n.oncomplete = function () {
                                var e = navigator.userAgent.match(/Chrome\/(\d+)/),
                                    n = navigator.userAgent.match(/Edge\//);
                                t(n || !e || parseInt(e[1], 10) >= 43)
                            }
                        })).catch((function () {
                            return !1
                        }))
                    }(e).then((function (e) {
                        return u = e
                    }))
                }

                function g(e) {
                    var t = _[e.name],
                        n = {};
                    n.promise = new s((function (e, t) {
                        n.resolve = e, n.reject = t
                    })), t.deferredOperations.push(n), t.dbReady ? t.dbReady = t.dbReady.then((function () {
                        return n.promise
                    })) : t.dbReady = n.promise
                }

                function E(e) {
                    var t = _[e.name].deferredOperations.pop();
                    if (t) return t.resolve(), t.promise
                }

                function R(e, t) {
                    var n = _[e.name].deferredOperations.pop();
                    if (n) return n.reject(t), n.promise
                }

                function I(e, t) {
                    return new s((function (n, r) {
                        if (_[e.name] = _[e.name] || {
                                forages: [],
                                db: null,
                                dbReady: null,
                                deferredOperations: []
                            }, e.db) {
                            if (!t) return n(e.db);
                            g(e), e.db.close()
                        }
                        var o = [e.name];
                        t && o.push(e.version);
                        var s = i.open.apply(i, o);
                        t && (s.onupgradeneeded = function (t) {
                            var n = s.result;
                            try {
                                n.createObjectStore(e.storeName), t.oldVersion <= 1 && n.createObjectStore("local-forage-detect-blob-support")
                            } catch (n) {
                                if ("ConstraintError" !== n.name) throw n;
                                console.warn('The database "' + e.name + '" has been upgraded from version ' + t.oldVersion + " to version " + t.newVersion + ', but the storage "' + e.storeName + '" already exists.')
                            }
                        }), s.onerror = function (e) {
                            e.preventDefault(), r(s.error)
                        }, s.onsuccess = function () {
                            n(s.result), E(e)
                        }
                    }))
                }

                function v(e) {
                    return I(e, !1)
                }

                function A(e) {
                    return I(e, !0)
                }

                function m(e, t) {
                    if (!e.db) return !0;
                    var n = !e.db.objectStoreNames.contains(e.storeName),
                        r = e.version < e.db.version,
                        i = e.version > e.db.version;
                    if (r && (e.version !== t && console.warn('The database "' + e.name + "\" can't be downgraded from version " + e.db.version + " to version " + e.version + "."), e.version = e.db.version), i || n) {
                        if (n) {
                            var o = e.db.version + 1;
                            o > e.version && (e.version = o)
                        }
                        return !0
                    }
                    return !1
                }

                function p(e) {
                    return o([function (e) {
                        for (var t = e.length, n = new ArrayBuffer(t), r = new Uint8Array(n), i = 0; i < t; i++) r[i] = e.charCodeAt(i);
                        return n
                    }(atob(e.data))], {
                        type: e.type
                    })
                }

                function y(e) {
                    return e && e.__local_forage_encoded_blob
                }

                function S(e) {
                    var t = this,
                        n = t._initReady().then((function () {
                            var e = _[t._dbInfo.name];
                            if (e && e.dbReady) return e.dbReady
                        }));
                    return d(n, e, e), n
                }

                function D(e, t, n, r) {
                    void 0 === r && (r = 1);
                    try {
                        var i = e.db.transaction(e.storeName, t);
                        n(null, i)
                    } catch (i) {
                        if (r > 0 && (!e.db || "InvalidStateError" === i.name || "NotFoundError" === i.name)) return s.resolve().then((function () {
                            if (!e.db || "NotFoundError" === i.name && !e.db.objectStoreNames.contains(e.storeName) && e.version <= e.db.version) return e.db && (e.version = e.db.version + 1), A(e)
                        })).then((function () {
                            return function (e) {
                                g(e);
                                for (var t = _[e.name], n = t.forages, r = 0; r < n.length; r++) {
                                    var i = n[r];
                                    i._dbInfo.db && (i._dbInfo.db.close(), i._dbInfo.db = null)
                                }
                                return e.db = null, v(e).then((function (t) {
                                    return e.db = t, m(e) ? A(e) : t
                                })).then((function (r) {
                                    e.db = t.db = r;
                                    for (var i = 0; i < n.length; i++) n[i]._dbInfo.db = r
                                })).catch((function (t) {
                                    throw R(e, t), t
                                }))
                            }(e).then((function () {
                                D(e, t, n, r - 1)
                            }))
                        })).catch(n);
                        n(i)
                    }
                }
                var T = {
                        _driver: "asyncStorage",
                        _initStorage: function (e) {
                            var t = this,
                                n = {
                                    db: null
                                };
                            if (e)
                                for (var r in e) n[r] = e[r];
                            var i = _[n.name];
                            i || (i = {
                                forages: [],
                                db: null,
                                dbReady: null,
                                deferredOperations: []
                            }, _[n.name] = i), i.forages.push(t), t._initReady || (t._initReady = t.ready, t.ready = S);
                            var o = [];

                            function a() {
                                return s.resolve()
                            }
                            for (var d = 0; d < i.forages.length; d++) {
                                var l = i.forages[d];
                                l !== t && o.push(l._initReady().catch(a))
                            }
                            var c = i.forages.slice(0);
                            return s.all(o).then((function () {
                                return n.db = i.db, v(n)
                            })).then((function (e) {
                                return n.db = e, m(n, t._defaultConfig.version) ? A(n) : e
                            })).then((function (e) {
                                n.db = i.db = e, t._dbInfo = n;
                                for (var r = 0; r < c.length; r++) {
                                    var o = c[r];
                                    o !== t && (o._dbInfo.db = n.db, o._dbInfo.version = n.version)
                                }
                            }))
                        },
                        _support: function () {
                            try {
                                if (!i) return !1;
                                var e = "undefined" != typeof openDatabase && /(Safari|iPhone|iPad|iPod)/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) && !/BlackBerry/.test(navigator.platform),
                                    t = "function" == typeof fetch && -1 !== fetch.toString().indexOf("[native code");
                                return (!e || t) && "undefined" != typeof indexedDB && "undefined" != typeof IDBKeyRange
                            } catch (e) {
                                return !1
                            }
                        }(),
                        iterate: function (e, t) {
                            var n = this,
                                r = new s((function (t, r) {
                                    n.ready().then((function () {
                                        D(n._dbInfo, "readonly", (function (i, o) {
                                            if (i) return r(i);
                                            try {
                                                var s = o.objectStore(n._dbInfo.storeName).openCursor(),
                                                    a = 1;
                                                s.onsuccess = function () {
                                                    var n = s.result;
                                                    if (n) {
                                                        var r = n.value;
                                                        y(r) && (r = p(r));
                                                        var i = e(r, n.key, a++);
                                                        void 0 !== i ? t(i) : n.continue()
                                                    } else t()
                                                }, s.onerror = function () {
                                                    r(s.error)
                                                }
                                            } catch (e) {
                                                r(e)
                                            }
                                        }))
                                    })).catch(r)
                                }));
                            return a(r, t), r
                        },
                        getItem: function (e, t) {
                            var n = this;
                            e = l(e);
                            var r = new s((function (t, r) {
                                n.ready().then((function () {
                                    D(n._dbInfo, "readonly", (function (i, o) {
                                        if (i) return r(i);
                                        try {
                                            var s = o.objectStore(n._dbInfo.storeName).get(e);
                                            s.onsuccess = function () {
                                                var e = s.result;
                                                void 0 === e && (e = null), y(e) && (e = p(e)), t(e)
                                            }, s.onerror = function () {
                                                r(s.error)
                                            }
                                        } catch (e) {
                                            r(e)
                                        }
                                    }))
                                })).catch(r)
                            }));
                            return a(r, t), r
                        },
                        setItem: function (e, t, n) {
                            var r = this;
                            e = l(e);
                            var i = new s((function (n, i) {
                                var o;
                                r.ready().then((function () {
                                    return o = r._dbInfo, "[object Blob]" === h.call(t) ? f(o.db).then((function (e) {
                                        return e ? t : (n = t, new s((function (e, t) {
                                            var r = new FileReader;
                                            r.onerror = t, r.onloadend = function (t) {
                                                var r = btoa(t.target.result || "");
                                                e({
                                                    __local_forage_encoded_blob: !0,
                                                    data: r,
                                                    type: n.type
                                                })
                                            }, r.readAsBinaryString(n)
                                        })));
                                        var n
                                    })) : t
                                })).then((function (t) {
                                    D(r._dbInfo, "readwrite", (function (o, s) {
                                        if (o) return i(o);
                                        try {
                                            var a = s.objectStore(r._dbInfo.storeName);
                                            null === t && (t = void 0);
                                            var d = a.put(t, e);
                                            s.oncomplete = function () {
                                                void 0 === t && (t = null), n(t)
                                            }, s.onabort = s.onerror = function () {
                                                var e = d.error ? d.error : d.transaction.error;
                                                i(e)
                                            }
                                        } catch (e) {
                                            i(e)
                                        }
                                    }))
                                })).catch(i)
                            }));
                            return a(i, n), i
                        },
                        removeItem: function (e, t) {
                            var n = this;
                            e = l(e);
                            var r = new s((function (t, r) {
                                n.ready().then((function () {
                                    D(n._dbInfo, "readwrite", (function (i, o) {
                                        if (i) return r(i);
                                        try {
                                            var s = o.objectStore(n._dbInfo.storeName).delete(e);
                                            o.oncomplete = function () {
                                                t()
                                            }, o.onerror = function () {
                                                r(s.error)
                                            }, o.onabort = function () {
                                                var e = s.error ? s.error : s.transaction.error;
                                                r(e)
                                            }
                                        } catch (e) {
                                            r(e)
                                        }
                                    }))
                                })).catch(r)
                            }));
                            return a(r, t), r
                        },
                        clear: function (e) {
                            var t = this,
                                n = new s((function (e, n) {
                                    t.ready().then((function () {
                                        D(t._dbInfo, "readwrite", (function (r, i) {
                                            if (r) return n(r);
                                            try {
                                                var o = i.objectStore(t._dbInfo.storeName).clear();
                                                i.oncomplete = function () {
                                                    e()
                                                }, i.onabort = i.onerror = function () {
                                                    var e = o.error ? o.error : o.transaction.error;
                                                    n(e)
                                                }
                                            } catch (e) {
                                                n(e)
                                            }
                                        }))
                                    })).catch(n)
                                }));
                            return a(n, e), n
                        },
                        length: function (e) {
                            var t = this,
                                n = new s((function (e, n) {
                                    t.ready().then((function () {
                                        D(t._dbInfo, "readonly", (function (r, i) {
                                            if (r) return n(r);
                                            try {
                                                var o = i.objectStore(t._dbInfo.storeName).count();
                                                o.onsuccess = function () {
                                                    e(o.result)
                                                }, o.onerror = function () {
                                                    n(o.error)
                                                }
                                            } catch (e) {
                                                n(e)
                                            }
                                        }))
                                    })).catch(n)
                                }));
                            return a(n, e), n
                        },
                        key: function (e, t) {
                            var n = this,
                                r = new s((function (t, r) {
                                    e < 0 ? t(null) : n.ready().then((function () {
                                        D(n._dbInfo, "readonly", (function (i, o) {
                                            if (i) return r(i);
                                            try {
                                                var s = o.objectStore(n._dbInfo.storeName),
                                                    a = !1,
                                                    d = s.openCursor();
                                                d.onsuccess = function () {
                                                    var n = d.result;
                                                    n ? 0 === e || a ? t(n.key) : (a = !0, n.advance(e)) : t(null)
                                                }, d.onerror = function () {
                                                    r(d.error)
                                                }
                                            } catch (e) {
                                                r(e)
                                            }
                                        }))
                                    })).catch(r)
                                }));
                            return a(r, t), r
                        },
                        keys: function (e) {
                            var t = this,
                                n = new s((function (e, n) {
                                    t.ready().then((function () {
                                        D(t._dbInfo, "readonly", (function (r, i) {
                                            if (r) return n(r);
                                            try {
                                                var o = i.objectStore(t._dbInfo.storeName).openCursor(),
                                                    s = [];
                                                o.onsuccess = function () {
                                                    var t = o.result;
                                                    t ? (s.push(t.key), t.continue()) : e(s)
                                                }, o.onerror = function () {
                                                    n(o.error)
                                                }
                                            } catch (e) {
                                                n(e)
                                            }
                                        }))
                                    })).catch(n)
                                }));
                            return a(n, e), n
                        },
                        dropInstance: function (e, t) {
                            t = c.apply(this, arguments);
                            var n = this.config();
                            (e = "function" != typeof e && e || {}).name || (e.name = e.name || n.name, e.storeName = e.storeName || n.storeName);
                            var r, o = this;
                            if (e.name) {
                                var d = e.name === n.name && o._dbInfo.db,
                                    l = d ? s.resolve(o._dbInfo.db) : v(e).then((function (t) {
                                        var n = _[e.name],
                                            r = n.forages;
                                        n.db = t;
                                        for (var i = 0; i < r.length; i++) r[i]._dbInfo.db = t;
                                        return t
                                    }));
                                r = e.storeName ? l.then((function (t) {
                                    if (t.objectStoreNames.contains(e.storeName)) {
                                        var n = t.version + 1;
                                        g(e);
                                        var r = _[e.name],
                                            o = r.forages;
                                        t.close();
                                        for (var a = 0; a < o.length; a++) {
                                            var d = o[a];
                                            d._dbInfo.db = null, d._dbInfo.version = n
                                        }
                                        return new s((function (t, r) {
                                            var o = i.open(e.name, n);
                                            o.onerror = function (e) {
                                                o.result.close(), r(e)
                                            }, o.onupgradeneeded = function () {
                                                o.result.deleteObjectStore(e.storeName)
                                            }, o.onsuccess = function () {
                                                var e = o.result;
                                                e.close(), t(e)
                                            }
                                        })).then((function (e) {
                                            r.db = e;
                                            for (var t = 0; t < o.length; t++) {
                                                var n = o[t];
                                                n._dbInfo.db = e, E(n._dbInfo)
                                            }
                                        })).catch((function (t) {
                                            throw (R(e, t) || s.resolve()).catch((function () {})), t
                                        }))
                                    }
                                })) : l.then((function (t) {
                                    g(e);
                                    var n = _[e.name],
                                        r = n.forages;
                                    t.close();
                                    for (var o = 0; o < r.length; o++) r[o]._dbInfo.db = null;
                                    return new s((function (t, n) {
                                        var r = i.deleteDatabase(e.name);
                                        r.onerror = r.onblocked = function (e) {
                                            var t = r.result;
                                            t && t.close(), n(e)
                                        }, r.onsuccess = function () {
                                            var e = r.result;
                                            e && e.close(), t(e)
                                        }
                                    })).then((function (e) {
                                        n.db = e;
                                        for (var t = 0; t < r.length; t++) E(r[t]._dbInfo)
                                    })).catch((function (t) {
                                        throw (R(e, t) || s.resolve()).catch((function () {})), t
                                    }))
                                }))
                            } else r = s.reject("Invalid arguments");
                            return a(r, t), r
                        }
                    },
                    b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
                    M = /^~~local_forage_type~([^~]+)~/,
                    C = "__lfsc__:".length,
                    O = C + "arbf".length,
                    L = Object.prototype.toString;

                function N(e) {
                    var t, n, r, i, o, s = .75 * e.length,
                        a = e.length,
                        d = 0;
                    "=" === e[e.length - 1] && (s--, "=" === e[e.length - 2] && s--);
                    var l = new ArrayBuffer(s),
                        c = new Uint8Array(l);
                    for (t = 0; t < a; t += 4) n = b.indexOf(e[t]), r = b.indexOf(e[t + 1]), i = b.indexOf(e[t + 2]), o = b.indexOf(e[t + 3]), c[d++] = n << 2 | r >> 4, c[d++] = (15 & r) << 4 | i >> 2, c[d++] = (3 & i) << 6 | 63 & o;
                    return l
                }

                function B(e) {
                    var t, n = new Uint8Array(e),
                        r = "";
                    for (t = 0; t < n.length; t += 3) r += b[n[t] >> 2], r += b[(3 & n[t]) << 4 | n[t + 1] >> 4], r += b[(15 & n[t + 1]) << 2 | n[t + 2] >> 6], r += b[63 & n[t + 2]];
                    return n.length % 3 == 2 ? r = r.substring(0, r.length - 1) + "=" : n.length % 3 == 1 && (r = r.substring(0, r.length - 2) + "=="), r
                }
                var P = {
                    serialize: function (e, t) {
                        var n = "";
                        if (e && (n = L.call(e)), e && ("[object ArrayBuffer]" === n || e.buffer && "[object ArrayBuffer]" === L.call(e.buffer))) {
                            var r, i = "__lfsc__:";
                            e instanceof ArrayBuffer ? (r = e, i += "arbf") : (r = e.buffer, "[object Int8Array]" === n ? i += "si08" : "[object Uint8Array]" === n ? i += "ui08" : "[object Uint8ClampedArray]" === n ? i += "uic8" : "[object Int16Array]" === n ? i += "si16" : "[object Uint16Array]" === n ? i += "ur16" : "[object Int32Array]" === n ? i += "si32" : "[object Uint32Array]" === n ? i += "ui32" : "[object Float32Array]" === n ? i += "fl32" : "[object Float64Array]" === n ? i += "fl64" : t(new Error("Failed to get type for BinaryArray"))), t(i + B(r))
                        } else if ("[object Blob]" === n) {
                            var o = new FileReader;
                            o.onload = function () {
                                var n = "~~local_forage_type~" + e.type + "~" + B(this.result);
                                t("__lfsc__:blob" + n)
                            }, o.readAsArrayBuffer(e)
                        } else try {
                            t(JSON.stringify(e))
                        } catch (n) {
                            console.error("Couldn't convert value into a JSON string: ", e), t(null, n)
                        }
                    },
                    deserialize: function (e) {
                        if ("__lfsc__:" !== e.substring(0, C)) return JSON.parse(e);
                        var t, n = e.substring(O),
                            r = e.substring(C, O);
                        if ("blob" === r && M.test(n)) {
                            var i = n.match(M);
                            t = i[1], n = n.substring(i[0].length)
                        }
                        var s = N(n);
                        switch (r) {
                            case "arbf":
                                return s;
                            case "blob":
                                return o([s], {
                                    type: t
                                });
                            case "si08":
                                return new Int8Array(s);
                            case "ui08":
                                return new Uint8Array(s);
                            case "uic8":
                                return new Uint8ClampedArray(s);
                            case "si16":
                                return new Int16Array(s);
                            case "ur16":
                                return new Uint16Array(s);
                            case "si32":
                                return new Int32Array(s);
                            case "ui32":
                                return new Uint32Array(s);
                            case "fl32":
                                return new Float32Array(s);
                            case "fl64":
                                return new Float64Array(s);
                            default:
                                throw new Error("Unkown type: " + r)
                        }
                    },
                    stringToBuffer: N,
                    bufferToString: B
                };

                function w(e, t, n, r) {
                    e.executeSql("CREATE TABLE IF NOT EXISTS " + t.storeName + " (id INTEGER PRIMARY KEY, key unique, value)", [], n, r)
                }

                function F(e, t, n, r, i, o) {
                    e.executeSql(n, r, i, (function (e, s) {
                        s.code === s.SYNTAX_ERR ? e.executeSql("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", [t.storeName], (function (e, a) {
                            a.rows.length ? o(e, s) : w(e, t, (function () {
                                e.executeSql(n, r, i, o)
                            }), o)
                        }), o) : o(e, s)
                    }), o)
                }

                function U(e, t, n, r) {
                    var i = this;
                    e = l(e);
                    var o = new s((function (o, s) {
                        i.ready().then((function () {
                            void 0 === t && (t = null);
                            var a = t,
                                d = i._dbInfo;
                            d.serializer.serialize(t, (function (t, l) {
                                l ? s(l) : d.db.transaction((function (n) {
                                    F(n, d, "INSERT OR REPLACE INTO " + d.storeName + " (key, value) VALUES (?, ?)", [e, t], (function () {
                                        o(a)
                                    }), (function (e, t) {
                                        s(t)
                                    }))
                                }), (function (t) {
                                    if (t.code === t.QUOTA_ERR) {
                                        if (r > 0) return void o(U.apply(i, [e, a, n, r - 1]));
                                        s(t)
                                    }
                                }))
                            }))
                        })).catch(s)
                    }));
                    return a(o, n), o
                }

                function k(e) {
                    return new s((function (t, n) {
                        e.transaction((function (r) {
                            r.executeSql("SELECT name FROM sqlite_master WHERE type='table' AND name <> '__WebKitDatabaseInfoTable__'", [], (function (n, r) {
                                for (var i = [], o = 0; o < r.rows.length; o++) i.push(r.rows.item(o).name);
                                t({
                                    db: e,
                                    storeNames: i
                                })
                            }), (function (e, t) {
                                n(t)
                            }))
                        }), (function (e) {
                            n(e)
                        }))
                    }))
                }
                var x = {
                    _driver: "webSQLStorage",
                    _initStorage: function (e) {
                        var t = this,
                            n = {
                                db: null
                            };
                        if (e)
                            for (var r in e) n[r] = "string" != typeof e[r] ? e[r].toString() : e[r];
                        var i = new s((function (e, r) {
                            try {
                                n.db = openDatabase(n.name, String(n.version), n.description, n.size)
                            } catch (e) {
                                return r(e)
                            }
                            n.db.transaction((function (i) {
                                w(i, n, (function () {
                                    t._dbInfo = n, e()
                                }), (function (e, t) {
                                    r(t)
                                }))
                            }), r)
                        }));
                        return n.serializer = P, i
                    },
                    _support: "function" == typeof openDatabase,
                    iterate: function (e, t) {
                        var n = this,
                            r = new s((function (t, r) {
                                n.ready().then((function () {
                                    var i = n._dbInfo;
                                    i.db.transaction((function (n) {
                                        F(n, i, "SELECT * FROM " + i.storeName, [], (function (n, r) {
                                            for (var o = r.rows, s = o.length, a = 0; a < s; a++) {
                                                var d = o.item(a),
                                                    l = d.value;
                                                if (l && (l = i.serializer.deserialize(l)), void 0 !== (l = e(l, d.key, a + 1))) return void t(l)
                                            }
                                            t()
                                        }), (function (e, t) {
                                            r(t)
                                        }))
                                    }))
                                })).catch(r)
                            }));
                        return a(r, t), r
                    },
                    getItem: function (e, t) {
                        var n = this;
                        e = l(e);
                        var r = new s((function (t, r) {
                            n.ready().then((function () {
                                var i = n._dbInfo;
                                i.db.transaction((function (n) {
                                    F(n, i, "SELECT * FROM " + i.storeName + " WHERE key = ? LIMIT 1", [e], (function (e, n) {
                                        var r = n.rows.length ? n.rows.item(0).value : null;
                                        r && (r = i.serializer.deserialize(r)), t(r)
                                    }), (function (e, t) {
                                        r(t)
                                    }))
                                }))
                            })).catch(r)
                        }));
                        return a(r, t), r
                    },
                    setItem: function (e, t, n) {
                        return U.apply(this, [e, t, n, 1])
                    },
                    removeItem: function (e, t) {
                        var n = this;
                        e = l(e);
                        var r = new s((function (t, r) {
                            n.ready().then((function () {
                                var i = n._dbInfo;
                                i.db.transaction((function (n) {
                                    F(n, i, "DELETE FROM " + i.storeName + " WHERE key = ?", [e], (function () {
                                        t()
                                    }), (function (e, t) {
                                        r(t)
                                    }))
                                }))
                            })).catch(r)
                        }));
                        return a(r, t), r
                    },
                    clear: function (e) {
                        var t = this,
                            n = new s((function (e, n) {
                                t.ready().then((function () {
                                    var r = t._dbInfo;
                                    r.db.transaction((function (t) {
                                        F(t, r, "DELETE FROM " + r.storeName, [], (function () {
                                            e()
                                        }), (function (e, t) {
                                            n(t)
                                        }))
                                    }))
                                })).catch(n)
                            }));
                        return a(n, e), n
                    },
                    length: function (e) {
                        var t = this,
                            n = new s((function (e, n) {
                                t.ready().then((function () {
                                    var r = t._dbInfo;
                                    r.db.transaction((function (t) {
                                        F(t, r, "SELECT COUNT(key) as c FROM " + r.storeName, [], (function (t, n) {
                                            var r = n.rows.item(0).c;
                                            e(r)
                                        }), (function (e, t) {
                                            n(t)
                                        }))
                                    }))
                                })).catch(n)
                            }));
                        return a(n, e), n
                    },
                    key: function (e, t) {
                        var n = this,
                            r = new s((function (t, r) {
                                n.ready().then((function () {
                                    var i = n._dbInfo;
                                    i.db.transaction((function (n) {
                                        F(n, i, "SELECT key FROM " + i.storeName + " WHERE id = ? LIMIT 1", [e + 1], (function (e, n) {
                                            var r = n.rows.length ? n.rows.item(0).key : null;
                                            t(r)
                                        }), (function (e, t) {
                                            r(t)
                                        }))
                                    }))
                                })).catch(r)
                            }));
                        return a(r, t), r
                    },
                    keys: function (e) {
                        var t = this,
                            n = new s((function (e, n) {
                                t.ready().then((function () {
                                    var r = t._dbInfo;
                                    r.db.transaction((function (t) {
                                        F(t, r, "SELECT key FROM " + r.storeName, [], (function (t, n) {
                                            for (var r = [], i = 0; i < n.rows.length; i++) r.push(n.rows.item(i).key);
                                            e(r)
                                        }), (function (e, t) {
                                            n(t)
                                        }))
                                    }))
                                })).catch(n)
                            }));
                        return a(n, e), n
                    },
                    dropInstance: function (e, t) {
                        t = c.apply(this, arguments);
                        var n = this.config();
                        (e = "function" != typeof e && e || {}).name || (e.name = e.name || n.name, e.storeName = e.storeName || n.storeName);
                        var r, i = this;
                        return a(r = e.name ? new s((function (t) {
                            var r;
                            r = e.name === n.name ? i._dbInfo.db : openDatabase(e.name, "", "", 0), e.storeName ? t({
                                db: r,
                                storeNames: [e.storeName]
                            }) : t(k(r))
                        })).then((function (e) {
                            return new s((function (t, n) {
                                e.db.transaction((function (r) {
                                    function i(e) {
                                        return new s((function (t, n) {
                                            r.executeSql("DROP TABLE IF EXISTS " + e, [], (function () {
                                                t()
                                            }), (function (e, t) {
                                                n(t)
                                            }))
                                        }))
                                    }
                                    for (var o = [], a = 0, d = e.storeNames.length; a < d; a++) o.push(i(e.storeNames[a]));
                                    s.all(o).then((function () {
                                        t()
                                    })).catch((function (e) {
                                        n(e)
                                    }))
                                }), (function (e) {
                                    n(e)
                                }))
                            }))
                        })) : s.reject("Invalid arguments"), t), r
                    }
                };

                function V(e, t) {
                    var n = e.name + "/";
                    return e.storeName !== t.storeName && (n += e.storeName + "/"), n
                }

                function G() {
                    return ! function () {
                        try {
                            return localStorage.setItem("_localforage_support_test", !0), localStorage.removeItem("_localforage_support_test"), !1
                        } catch (e) {
                            return !0
                        }
                    }() || localStorage.length > 0
                }
                var W = {
                        _driver: "localStorageWrapper",
                        _initStorage: function (e) {
                            var t = {};
                            if (e)
                                for (var n in e) t[n] = e[n];
                            return t.keyPrefix = V(e, this._defaultConfig), G() ? (this._dbInfo = t, t.serializer = P, s.resolve()) : s.reject()
                        },
                        _support: function () {
                            try {
                                return "undefined" != typeof localStorage && "setItem" in localStorage && !!localStorage.setItem
                            } catch (e) {
                                return !1
                            }
                        }(),
                        iterate: function (e, t) {
                            var n = this,
                                r = n.ready().then((function () {
                                    for (var t = n._dbInfo, r = t.keyPrefix, i = r.length, o = localStorage.length, s = 1, a = 0; a < o; a++) {
                                        var d = localStorage.key(a);
                                        if (0 === d.indexOf(r)) {
                                            var l = localStorage.getItem(d);
                                            if (l && (l = t.serializer.deserialize(l)), void 0 !== (l = e(l, d.substring(i), s++))) return l
                                        }
                                    }
                                }));
                            return a(r, t), r
                        },
                        getItem: function (e, t) {
                            var n = this;
                            e = l(e);
                            var r = n.ready().then((function () {
                                var t = n._dbInfo,
                                    r = localStorage.getItem(t.keyPrefix + e);
                                return r && (r = t.serializer.deserialize(r)), r
                            }));
                            return a(r, t), r
                        },
                        setItem: function (e, t, n) {
                            var r = this;
                            e = l(e);
                            var i = r.ready().then((function () {
                                void 0 === t && (t = null);
                                var n = t;
                                return new s((function (i, o) {
                                    var s = r._dbInfo;
                                    s.serializer.serialize(t, (function (t, r) {
                                        if (r) o(r);
                                        else try {
                                            localStorage.setItem(s.keyPrefix + e, t), i(n)
                                        } catch (e) {
                                            "QuotaExceededError" !== e.name && "NS_ERROR_DOM_QUOTA_REACHED" !== e.name || o(e), o(e)
                                        }
                                    }))
                                }))
                            }));
                            return a(i, n), i
                        },
                        removeItem: function (e, t) {
                            var n = this;
                            e = l(e);
                            var r = n.ready().then((function () {
                                var t = n._dbInfo;
                                localStorage.removeItem(t.keyPrefix + e)
                            }));
                            return a(r, t), r
                        },
                        clear: function (e) {
                            var t = this,
                                n = t.ready().then((function () {
                                    for (var e = t._dbInfo.keyPrefix, n = localStorage.length - 1; n >= 0; n--) {
                                        var r = localStorage.key(n);
                                        0 === r.indexOf(e) && localStorage.removeItem(r)
                                    }
                                }));
                            return a(n, e), n
                        },
                        length: function (e) {
                            var t = this.keys().then((function (e) {
                                return e.length
                            }));
                            return a(t, e), t
                        },
                        key: function (e, t) {
                            var n = this,
                                r = n.ready().then((function () {
                                    var t, r = n._dbInfo;
                                    try {
                                        t = localStorage.key(e)
                                    } catch (e) {
                                        t = null
                                    }
                                    return t && (t = t.substring(r.keyPrefix.length)), t
                                }));
                            return a(r, t), r
                        },
                        keys: function (e) {
                            var t = this,
                                n = t.ready().then((function () {
                                    for (var e = t._dbInfo, n = localStorage.length, r = [], i = 0; i < n; i++) {
                                        var o = localStorage.key(i);
                                        0 === o.indexOf(e.keyPrefix) && r.push(o.substring(e.keyPrefix.length))
                                    }
                                    return r
                                }));
                            return a(n, e), n
                        },
                        dropInstance: function (e, t) {
                            if (t = c.apply(this, arguments), !(e = "function" != typeof e && e || {}).name) {
                                var n = this.config();
                                e.name = e.name || n.name, e.storeName = e.storeName || n.storeName
                            }
                            var r, i = this;
                            return a(r = e.name ? new s((function (t) {
                                e.storeName ? t(V(e, i._defaultConfig)) : t(e.name + "/")
                            })).then((function (e) {
                                for (var t = localStorage.length - 1; t >= 0; t--) {
                                    var n = localStorage.key(t);
                                    0 === n.indexOf(e) && localStorage.removeItem(n)
                                }
                            })) : s.reject("Invalid arguments"), t), r
                        }
                    },
                    j = function (e, t) {
                        for (var n, r, i = e.length, o = 0; o < i;) {
                            if ((n = e[o]) === (r = t) || "number" == typeof n && "number" == typeof r && isNaN(n) && isNaN(r)) return !0;
                            o++
                        }
                        return !1
                    },
                    H = Array.isArray || function (e) {
                        return "[object Array]" === Object.prototype.toString.call(e)
                    },
                    K = {},
                    J = {},
                    Y = {
                        INDEXEDDB: T,
                        WEBSQL: x,
                        LOCALSTORAGE: W
                    },
                    X = [Y.INDEXEDDB._driver, Y.WEBSQL._driver, Y.LOCALSTORAGE._driver],
                    Q = ["dropInstance"],
                    z = ["clear", "getItem", "iterate", "key", "keys", "length", "removeItem", "setItem"].concat(Q),
                    Z = {
                        description: "",
                        driver: X.slice(),
                        name: "localforage",
                        size: 4980736,
                        storeName: "keyvaluepairs",
                        version: 1
                    };

                function q(e, t) {
                    e[t] = function () {
                        var n = arguments;
                        return e.ready().then((function () {
                            return e[t].apply(e, n)
                        }))
                    }
                }

                function $() {
                    for (var e = 1; e < arguments.length; e++) {
                        var t = arguments[e];
                        if (t)
                            for (var n in t) t.hasOwnProperty(n) && (H(t[n]) ? arguments[0][n] = t[n].slice() : arguments[0][n] = t[n])
                    }
                    return arguments[0]
                }
                var ee = new(function () {
                    function e(t) {
                        for (var n in function (e, t) {
                                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                            }(this, e), Y)
                            if (Y.hasOwnProperty(n)) {
                                var r = Y[n],
                                    i = r._driver;
                                this[n] = i, K[i] || this.defineDriver(r)
                            } this._defaultConfig = $({}, Z), this._config = $({}, this._defaultConfig, t), this._driverSet = null, this._initDriver = null, this._ready = !1, this._dbInfo = null, this._wrapLibraryMethodsWithReady(), this.setDriver(this._config.driver).catch((function () {}))
                    }
                    return e.prototype.config = function (e) {
                        if ("object" === (void 0 === e ? "undefined" : r(e))) {
                            if (this._ready) return new Error("Can't call config() after localforage has been used.");
                            for (var t in e) {
                                if ("storeName" === t && (e[t] = e[t].replace(/\W/g, "_")), "version" === t && "number" != typeof e[t]) return new Error("Database version must be a number.");
                                this._config[t] = e[t]
                            }
                            return !("driver" in e) || !e.driver || this.setDriver(this._config.driver)
                        }
                        return "string" == typeof e ? this._config[e] : this._config
                    }, e.prototype.defineDriver = function (e, t, n) {
                        var r = new s((function (t, n) {
                            try {
                                var r = e._driver,
                                    i = new Error("Custom driver not compliant; see https://mozilla.github.io/localForage/#definedriver");
                                if (!e._driver) return void n(i);
                                for (var o = z.concat("_initStorage"), d = 0, l = o.length; d < l; d++) {
                                    var c = o[d];
                                    if ((!j(Q, c) || e[c]) && "function" != typeof e[c]) return void n(i)
                                }! function () {
                                    for (var t = function (e) {
                                            return function () {
                                                var t = new Error("Method " + e + " is not implemented by the current driver"),
                                                    n = s.reject(t);
                                                return a(n, arguments[arguments.length - 1]), n
                                            }
                                        }, n = 0, r = Q.length; n < r; n++) {
                                        var i = Q[n];
                                        e[i] || (e[i] = t(i))
                                    }
                                }();
                                var u = function (n) {
                                    K[r] && console.info("Redefining LocalForage driver: " + r), K[r] = e, J[r] = n, t()
                                };
                                "_support" in e ? e._support && "function" == typeof e._support ? e._support().then(u, n) : u(!!e._support) : u(!0)
                            } catch (e) {
                                n(e)
                            }
                        }));
                        return d(r, t, n), r
                    }, e.prototype.driver = function () {
                        return this._driver || null
                    }, e.prototype.getDriver = function (e, t, n) {
                        var r = K[e] ? s.resolve(K[e]) : s.reject(new Error("Driver not found."));
                        return d(r, t, n), r
                    }, e.prototype.getSerializer = function (e) {
                        var t = s.resolve(P);
                        return d(t, e), t
                    }, e.prototype.ready = function (e) {
                        var t = this,
                            n = t._driverSet.then((function () {
                                return null === t._ready && (t._ready = t._initDriver()), t._ready
                            }));
                        return d(n, e, e), n
                    }, e.prototype.setDriver = function (e, t, n) {
                        var r = this;
                        H(e) || (e = [e]);
                        var i = this._getSupportedDrivers(e);

                        function o() {
                            r._config.driver = r.driver()
                        }

                        function a(e) {
                            return r._extend(e), o(), r._ready = r._initStorage(r._config), r._ready
                        }
                        var l = null !== this._driverSet ? this._driverSet.catch((function () {
                            return s.resolve()
                        })) : s.resolve();
                        return this._driverSet = l.then((function () {
                            var e = i[0];
                            return r._dbInfo = null, r._ready = null, r.getDriver(e).then((function (e) {
                                r._driver = e._driver, o(), r._wrapLibraryMethodsWithReady(), r._initDriver = function (e) {
                                    return function () {
                                        var t = 0;
                                        return function n() {
                                            for (; t < e.length;) {
                                                var i = e[t];
                                                return t++, r._dbInfo = null, r._ready = null, r.getDriver(i).then(a).catch(n)
                                            }
                                            o();
                                            var d = new Error("No available storage method found.");
                                            return r._driverSet = s.reject(d), r._driverSet
                                        }()
                                    }
                                }(i)
                            }))
                        })).catch((function () {
                            o();
                            var e = new Error("No available storage method found.");
                            return r._driverSet = s.reject(e), r._driverSet
                        })), d(this._driverSet, t, n), this._driverSet
                    }, e.prototype.supports = function (e) {
                        return !!J[e]
                    }, e.prototype._extend = function (e) {
                        $(this, e)
                    }, e.prototype._getSupportedDrivers = function (e) {
                        for (var t = [], n = 0, r = e.length; n < r; n++) {
                            var i = e[n];
                            this.supports(i) && t.push(i)
                        }
                        return t
                    }, e.prototype._wrapLibraryMethodsWithReady = function () {
                        for (var e = 0, t = z.length; e < t; e++) q(this, z[e])
                    }, e.prototype.createInstance = function (t) {
                        return new e(t)
                    }, e
                }());
                t.exports = ee
            }, {
                3: 3
            }]
        }, {}, [4])(4)
    }, function (t, n) {
        t.exports = e
    }, function (e, n) {
        e.exports = t
    }, function (e, t) {
        e.exports = n
    }, function (e, t) {
        e.exports = r
    }, function (e, t) {
        e.exports = i
    }, function (e, t, n) {
        "use strict";
        var r, i, o, s;
        n.r(t), n.d(t, "BarcodeReader", (function () {
                return c
            })), n.d(t, "BarcodeScanner", (function () {
                return h
            })), n.d(t, "EnumBarcodeColourMode", (function () {
                return f
            })), n.d(t, "EnumBarcodeComplementMode", (function () {
                return g
            })), n.d(t, "EnumBarcodeFormat", (function () {
                return s
            })), n.d(t, "EnumBarcodeFormat_2", (function () {
                return E
            })), n.d(t, "EnumBinarizationMode", (function () {
                return R
            })), n.d(t, "EnumClarityCalculationMethod", (function () {
                return I
            })), n.d(t, "EnumClarityFilterMode", (function () {
                return v
            })), n.d(t, "EnumColourClusteringMode", (function () {
                return A
            })), n.d(t, "EnumColourConversionMode", (function () {
                return m
            })), n.d(t, "EnumConflictMode", (function () {
                return p
            })), n.d(t, "EnumDeblurMode", (function () {
                return y
            })), n.d(t, "EnumDeformationResistingMode", (function () {
                return S
            })), n.d(t, "EnumDPMCodeReadingMode", (function () {
                return D
            })), n.d(t, "EnumErrorCode", (function () {
                return i
            })), n.d(t, "EnumGrayscaleTransformationMode", (function () {
                return T
            })), n.d(t, "EnumImagePixelFormat", (function () {
                return r
            })), n.d(t, "EnumImagePreprocessingMode", (function () {
                return b
            })), n.d(t, "EnumIMResultDataType", (function () {
                return o
            })), n.d(t, "EnumIntermediateResultSavingMode", (function () {
                return M
            })), n.d(t, "EnumIntermediateResultType", (function () {
                return C
            })), n.d(t, "EnumLocalizationMode", (function () {
                return O
            })), n.d(t, "EnumPDFReadingMode", (function () {
                return L
            })), n.d(t, "EnumQRCodeErrorCorrectionLevel", (function () {
                return N
            })), n.d(t, "EnumRegionPredetectionMode", (function () {
                return B
            })), n.d(t, "EnumResultCoordinateType", (function () {
                return P
            })), n.d(t, "EnumResultType", (function () {
                return w
            })), n.d(t, "EnumScaleUpMode", (function () {
                return F
            })), n.d(t, "EnumTerminatePhase", (function () {
                return U
            })), n.d(t, "EnumTextAssistedCorrectionMode", (function () {
                return k
            })), n.d(t, "EnumTextFilterMode", (function () {
                return x
            })), n.d(t, "EnumTextResultOrderMode", (function () {
                return V
            })), n.d(t, "EnumTextureDetectionMode", (function () {
                return G
            })), n.d(t, "EnumLicenseModule", (function () {
                return W
            })), n.d(t, "EnumChargeWay", (function () {
                return j
            })),
            function (e) {
                e[e.IPF_Binary = 0] = "IPF_Binary", e[e.IPF_BinaryInverted = 1] = "IPF_BinaryInverted", e[e.IPF_GrayScaled = 2] = "IPF_GrayScaled", e[e.IPF_NV21 = 3] = "IPF_NV21", e[e.IPF_RGB_565 = 4] = "IPF_RGB_565", e[e.IPF_RGB_555 = 5] = "IPF_RGB_555", e[e.IPF_RGB_888 = 6] = "IPF_RGB_888", e[e.IPF_ARGB_8888 = 7] = "IPF_ARGB_8888", e[e.IPF_RGB_161616 = 8] = "IPF_RGB_161616", e[e.IPF_ARGB_16161616 = 9] = "IPF_ARGB_16161616", e[e.IPF_ABGR_8888 = 10] = "IPF_ABGR_8888", e[e.IPF_ABGR_16161616 = 11] = "IPF_ABGR_16161616", e[e.IPF_BGR_888 = 12] = "IPF_BGR_888"
            }(r || (r = {})),
            function (e) {
                e[e.DBR_SYSTEM_EXCEPTION = 1] = "DBR_SYSTEM_EXCEPTION", e[e.DBR_SUCCESS = 0] = "DBR_SUCCESS", e[e.DBR_UNKNOWN = -1e4] = "DBR_UNKNOWN", e[e.DBR_NO_MEMORY = -10001] = "DBR_NO_MEMORY", e[e.DBR_NULL_REFERENCE = -10002] = "DBR_NULL_REFERENCE", e[e.DBR_LICENSE_INVALID = -10003] = "DBR_LICENSE_INVALID", e[e.DBR_LICENSE_EXPIRED = -10004] = "DBR_LICENSE_EXPIRED", e[e.DBR_FILE_NOT_FOUND = -10005] = "DBR_FILE_NOT_FOUND", e[e.DBR_FILETYPE_NOT_SUPPORTED = -10006] = "DBR_FILETYPE_NOT_SUPPORTED", e[e.DBR_BPP_NOT_SUPPORTED = -10007] = "DBR_BPP_NOT_SUPPORTED", e[e.DBR_INDEX_INVALID = -10008] = "DBR_INDEX_INVALID", e[e.DBR_BARCODE_FORMAT_INVALID = -10009] = "DBR_BARCODE_FORMAT_INVALID", e[e.DBR_CUSTOM_REGION_INVALID = -10010] = "DBR_CUSTOM_REGION_INVALID", e[e.DBR_MAX_BARCODE_NUMBER_INVALID = -10011] = "DBR_MAX_BARCODE_NUMBER_INVALID", e[e.DBR_IMAGE_READ_FAILED = -10012] = "DBR_IMAGE_READ_FAILED", e[e.DBR_TIFF_READ_FAILED = -10013] = "DBR_TIFF_READ_FAILED", e[e.DBR_QR_LICENSE_INVALID = -10016] = "DBR_QR_LICENSE_INVALID", e[e.DBR_1D_LICENSE_INVALID = -10017] = "DBR_1D_LICENSE_INVALID", e[e.DBR_DIB_BUFFER_INVALID = -10018] = "DBR_DIB_BUFFER_INVALID", e[e.DBR_PDF417_LICENSE_INVALID = -10019] = "DBR_PDF417_LICENSE_INVALID", e[e.DBR_DATAMATRIX_LICENSE_INVALID = -10020] = "DBR_DATAMATRIX_LICENSE_INVALID", e[e.DBR_PDF_READ_FAILED = -10021] = "DBR_PDF_READ_FAILED", e[e.DBR_PDF_DLL_MISSING = -10022] = "DBR_PDF_DLL_MISSING", e[e.DBR_PAGE_NUMBER_INVALID = -10023] = "DBR_PAGE_NUMBER_INVALID", e[e.DBR_CUSTOM_SIZE_INVALID = -10024] = "DBR_CUSTOM_SIZE_INVALID", e[e.DBR_CUSTOM_MODULESIZE_INVALID = -10025] = "DBR_CUSTOM_MODULESIZE_INVALID", e[e.DBR_RECOGNITION_TIMEOUT = -10026] = "DBR_RECOGNITION_TIMEOUT", e[e.DBR_JSON_PARSE_FAILED = -10030] = "DBR_JSON_PARSE_FAILED", e[e.DBR_JSON_TYPE_INVALID = -10031] = "DBR_JSON_TYPE_INVALID", e[e.DBR_JSON_KEY_INVALID = -10032] = "DBR_JSON_KEY_INVALID", e[e.DBR_JSON_VALUE_INVALID = -10033] = "DBR_JSON_VALUE_INVALID", e[e.DBR_JSON_NAME_KEY_MISSING = -10034] = "DBR_JSON_NAME_KEY_MISSING", e[e.DBR_JSON_NAME_VALUE_DUPLICATED = -10035] = "DBR_JSON_NAME_VALUE_DUPLICATED", e[e.DBR_TEMPLATE_NAME_INVALID = -10036] = "DBR_TEMPLATE_NAME_INVALID", e[e.DBR_JSON_NAME_REFERENCE_INVALID = -10037] = "DBR_JSON_NAME_REFERENCE_INVALID", e[e.DBR_PARAMETER_VALUE_INVALID = -10038] = "DBR_PARAMETER_VALUE_INVALID", e[e.DBR_DOMAIN_NOT_MATCHED = -10039] = "DBR_DOMAIN_NOT_MATCHED", e[e.DBR_RESERVEDINFO_NOT_MATCHED = -10040] = "DBR_RESERVEDINFO_NOT_MATCHED", e[e.DBR_AZTEC_LICENSE_INVALID = -10041] = "DBR_AZTEC_LICENSE_INVALID", e[e.DBR_LICENSE_DLL_MISSING = -10042] = "DBR_LICENSE_DLL_MISSING", e[e.DBR_LICENSEKEY_NOT_MATCHED = -10043] = "DBR_LICENSEKEY_NOT_MATCHED", e[e.DBR_REQUESTED_FAILED = -10044] = "DBR_REQUESTED_FAILED", e[e.DBR_LICENSE_INIT_FAILED = -10045] = "DBR_LICENSE_INIT_FAILED", e[e.DBR_PATCHCODE_LICENSE_INVALID = -10046] = "DBR_PATCHCODE_LICENSE_INVALID", e[e.DBR_POSTALCODE_LICENSE_INVALID = -10047] = "DBR_POSTALCODE_LICENSE_INVALID", e[e.DBR_DPM_LICENSE_INVALID = -10048] = "DBR_DPM_LICENSE_INVALID", e[e.DBR_FRAME_DECODING_THREAD_EXISTS = -10049] = "DBR_FRAME_DECODING_THREAD_EXISTS", e[e.DBR_STOP_DECODING_THREAD_FAILED = -10050] = "DBR_STOP_DECODING_THREAD_FAILED", e[e.DBR_SET_MODE_ARGUMENT_ERROR = -10051] = "DBR_SET_MODE_ARGUMENT_ERROR", e[e.DBR_LICENSE_CONTENT_INVALID = -10052] = "DBR_LICENSE_CONTENT_INVALID", e[e.DBR_LICENSE_KEY_INVALID = -10053] = "DBR_LICENSE_KEY_INVALID", e[e.DBR_LICENSE_DEVICE_RUNS_OUT = -10054] = "DBR_LICENSE_DEVICE_RUNS_OUT", e[e.DBR_GET_MODE_ARGUMENT_ERROR = -10055] = "DBR_GET_MODE_ARGUMENT_ERROR", e[e.DBR_IRT_LICENSE_INVALID = -10056] = "DBR_IRT_LICENSE_INVALID", e[e.DBR_MAXICODE_LICENSE_INVALID = -10057] = "DBR_MAXICODE_LICENSE_INVALID", e[e.DBR_GS1_DATABAR_LICENSE_INVALID = -10058] = "DBR_GS1_DATABAR_LICENSE_INVALID", e[e.DBR_GS1_COMPOSITE_LICENSE_INVALID = -10059] = "DBR_GS1_COMPOSITE_LICENSE_INVALID", e[e.DBR_DOTCODE_LICENSE_INVALID = -10061] = "DBR_DOTCODE_LICENSE_INVALID", e[e.DMERR_NO_LICENSE = -2e4] = "DMERR_NO_LICENSE", e[e.DMERR_LICENSE_SYNC_FAILED = -20003] = "DMERR_LICENSE_SYNC_FAILED", e[e.DMERR_TRIAL_LICENSE = -20010] = "DMERR_TRIAL_LICENSE", e[e.DMERR_FAILED_TO_REACH_LTS = -20200] = "DMERR_FAILED_TO_REACH_LTS"
            }(i || (i = {})),
            function (e) {
                e[e.IMRDT_IMAGE = 1] = "IMRDT_IMAGE", e[e.IMRDT_CONTOUR = 2] = "IMRDT_CONTOUR", e[e.IMRDT_LINESEGMENT = 4] = "IMRDT_LINESEGMENT", e[e.IMRDT_LOCALIZATIONRESULT = 8] = "IMRDT_LOCALIZATIONRESULT", e[e.IMRDT_REGIONOFINTEREST = 16] = "IMRDT_REGIONOFINTEREST", e[e.IMRDT_QUADRILATERAL = 32] = "IMRDT_QUADRILATERAL"
            }(o || (o = {})),
            function (e) {
                e[e.BF_ALL = -31457281] = "BF_ALL", e[e.BF_ONED = 1050623] = "BF_ONED", e[e.BF_GS1_DATABAR = 260096] = "BF_GS1_DATABAR", e[e.BF_CODE_39 = 1] = "BF_CODE_39", e[e.BF_CODE_128 = 2] = "BF_CODE_128", e[e.BF_CODE_93 = 4] = "BF_CODE_93", e[e.BF_CODABAR = 8] = "BF_CODABAR", e[e.BF_ITF = 16] = "BF_ITF", e[e.BF_EAN_13 = 32] = "BF_EAN_13", e[e.BF_EAN_8 = 64] = "BF_EAN_8", e[e.BF_UPC_A = 128] = "BF_UPC_A", e[e.BF_UPC_E = 256] = "BF_UPC_E", e[e.BF_INDUSTRIAL_25 = 512] = "BF_INDUSTRIAL_25", e[e.BF_CODE_39_EXTENDED = 1024] = "BF_CODE_39_EXTENDED", e[e.BF_GS1_DATABAR_OMNIDIRECTIONAL = 2048] = "BF_GS1_DATABAR_OMNIDIRECTIONAL", e[e.BF_GS1_DATABAR_TRUNCATED = 4096] = "BF_GS1_DATABAR_TRUNCATED", e[e.BF_GS1_DATABAR_STACKED = 8192] = "BF_GS1_DATABAR_STACKED", e[e.BF_GS1_DATABAR_STACKED_OMNIDIRECTIONAL = 16384] = "BF_GS1_DATABAR_STACKED_OMNIDIRECTIONAL", e[e.BF_GS1_DATABAR_EXPANDED = 32768] = "BF_GS1_DATABAR_EXPANDED", e[e.BF_GS1_DATABAR_EXPANDED_STACKED = 65536] = "BF_GS1_DATABAR_EXPANDED_STACKED", e[e.BF_GS1_DATABAR_LIMITED = 131072] = "BF_GS1_DATABAR_LIMITED", e[e.BF_PATCHCODE = 262144] = "BF_PATCHCODE", e[e.BF_PDF417 = 33554432] = "BF_PDF417", e[e.BF_QR_CODE = 67108864] = "BF_QR_CODE", e[e.BF_DATAMATRIX = 134217728] = "BF_DATAMATRIX", e[e.BF_AZTEC = 268435456] = "BF_AZTEC", e[e.BF_MAXICODE = 536870912] = "BF_MAXICODE", e[e.BF_MICRO_QR = 1073741824] = "BF_MICRO_QR", e[e.BF_MICRO_PDF417 = 524288] = "BF_MICRO_PDF417", e[e.BF_GS1_COMPOSITE = -2147483648] = "BF_GS1_COMPOSITE", e[e.BF_MSI_CODE = 1048576] = "BF_MSI_CODE", e[e.BF_NULL = 0] = "BF_NULL"
            }(s || (s = {}));
        var a = function (e, t, n, r) {
            return new(n || (n = Promise))((function (i, o) {
                function s(e) {
                    try {
                        d(r.next(e))
                    } catch (e) {
                        o(e)
                    }
                }

                function a(e) {
                    try {
                        d(r.throw(e))
                    } catch (e) {
                        o(e)
                    }
                }

                function d(e) {
                    var t;
                    e.done ? i(e.value) : (t = e.value, t instanceof n ? t : new n((function (e) {
                        e(t)
                    }))).then(s, a)
                }
                d((r = r.apply(e, t || [])).next())
            }))
        };
        const d = n(0),
            l = !!("object" == typeof global && global.process && global.process.release && global.process.release.name && "undefined" == typeof HTMLCanvasElement);
        class c {
            constructor() {
                this._canvasMaxWH = "iPhone" == c.browserInfo.OS || "Android" == c.browserInfo.OS ? 2048 : 4096, this._instanceID = void 0, this.bSaveOriCanvas = !1, this.oriCanvas = null, this.maxVideoCvsLength = 3, this.videoCvses = [], this.videoGlCvs = null, this.videoGl = null, this.glImgData = null, this.bFilterRegionInJs = !0, this._region = null, this._timeStartDecode = null, this._timeEnterInnerDBR = null, this._bUseWebgl = !0, this.decodeRecords = [], this.bDestroyed = !1, this._lastErrorCode = 0, this._lastErrorString = ""
            }
            static get version() {
                return this._version
            }
            static get productKeys() {
                return this._productKeys
            }
            static set productKeys(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`productKeys` is not allowed to change after loadWasm is called.");
                c._productKeys = e
            }
            static get handshakeCode() {
                return this._productKeys
            }
            static set handshakeCode(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`handshakeCode` is not allowed to change after loadWasm is called.");
                c._productKeys = e
            }
            static set sessionPassword(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`sessionPassword` is not allowed to change after loadWasm is called.");
                this._sessionPassword = e
            }
            static get sessionPassword() {
                return this._sessionPassword
            }
            static detectEnvironment() {
                return a(this, void 0, void 0, (function* () {
                    let e = {
                        wasm: "undefined" != typeof WebAssembly && ("undefined" == typeof navigator || !(/Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) && /\(.+\s11_2_([2-6]).*\)/.test(navigator.userAgent))),
                        worker: !!(l ? process.version >= "v12" : "undefined" != typeof Worker),
                        getUserMedia: !("undefined" == typeof navigator || !navigator.mediaDevices || !navigator.mediaDevices.getUserMedia),
                        camera: !1,
                        browser: this.browserInfo.browser,
                        version: this.browserInfo.version,
                        OS: this.browserInfo.OS
                    };
                    if (e.getUserMedia) try {
                        (yield navigator.mediaDevices.getUserMedia({
                            video: !0
                        })).getTracks().forEach(e => {
                            e.stop()
                        }), e.camera = !0
                    } catch (e) {}
                    return e
                }))
            }
            static get engineResourcePath() {
                return this._engineResourcePath
            }
            static set engineResourcePath(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`engineResourcePath` is not allowed to change after loadWasm is called.");
                if (null == e && (e = "./"), l) c._engineResourcePath = e;
                else {
                    let t = document.createElement("a");
                    t.href = e, c._engineResourcePath = t.href
                }
                this._engineResourcePath.endsWith("/") || (c._engineResourcePath += "/")
            }
            static get licenseServer() {
                return this._licenseServer
            }
            static set licenseServer(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`licenseServer` is not allowed to change after loadWasm is called.");
                if (null == e) c._licenseServer = [];
                else {
                    e instanceof Array || (e = [e]);
                    for (let t = 0; t < e.length; ++t) {
                        if (!l) {
                            let n = document.createElement("a");
                            n.href = e[t], e[t] = n.href
                        }
                        e[t].endsWith("/") || (e[t] += "/")
                    }
                    c._licenseServer = e
                }
            }
            static get deviceFriendlyName() {
                return this._deviceFriendlyName
            }
            static set deviceFriendlyName(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`deviceFriendlyName` is not allowed to change after loadWasm is called.");
                c._deviceFriendlyName = e || ""
            }
            static get _bUseFullFeature() {
                return this.__bUseFullFeature
            }
            static set _bUseFullFeature(e) {
                if ("unload" != this._loadWasmStatus) throw new Error("`_bUseFullFeature` is not allowed to change after loadWasm is called.");
                this.__bUseFullFeature = e
            }
            set region(e) {
                this._region = e
            }
            get region() {
                return this._region
            }
            static isLoaded() {
                return "loadSuccess" == this._loadWasmStatus
            }
            static get lastErrorCode() {
                return this._lastErrorCode
            }
            static get lastErrorString() {
                return this._lastErrorString
            }
            get lastErrorCode() {
                return this._lastErrorCode
            }
            get lastErrorString() {
                return this._lastErrorString
            }
            static loadWasm() {
                return a(this, void 0, void 0, (function* () {
                    if (l && process.version < "v12") return Promise.reject("DBRJS SDK need nodejs version >= v12.");
                    let e = 8 == this.productKeys.length || this.productKeys.length > 8 && !this.productKeys.startsWith("t") && !this.productKeys.startsWith("f") && !this.productKeys.startsWith("P") && !this.productKeys.startsWith("L");
                    return e && self.crypto && !self.crypto.subtle ? Promise.reject("Need https to use handshake code in this browser.") : (e && "Edge" == this.browserInfo.browser && this.engineResourcePath.startsWith(location.origin), yield new Promise((e, t) => a(this, void 0, void 0, (function* () {
                        switch (this._loadWasmStatus) {
                            case "unload": {
                                c._loadWasmStatus = "loading";
                                let e = new Map,
                                    t = (t, n, r) => a(this, void 0, void 0, (function* () {
                                        let i = e.get(t);
                                        return i || (i = yield d.createInstance({
                                            name: t
                                        }), e.set(t, i)), yield i[n].apply(i, r)
                                    })),
                                    r = this.engineResourcePath + this._workerName;
                                if (l || this.engineResourcePath.startsWith(location.origin) || (r = yield fetch(r).then(e => e.blob()).then(e => URL.createObjectURL(e))), l) {
                                    const e = n(1);
                                    c._dbrWorker = new e.Worker(r)
                                } else c._dbrWorker = new Worker(r);
                                this._dbrWorker.onerror = e => {
                                    c._loadWasmStatus = "loadFail";
                                    for (let t of this._loadWasmCallbackArr) t(new Error(e.message))
                                };
                                let i, o = e => atob(String.fromCharCode.apply(null, e).replaceAll("\n", "+").replaceAll(" ", "=")),
                                    s = e => self[o(e.c)][o(e.e)][o(e.f)]("raw", new Uint8Array(e.a.concat(e.b, e.d, e.k)), o(e.g), !0, [o(e.h), o(e.i)]),
                                    u = (e, t) => a(this, void 0, void 0, (function* () {
                                        let n = atob(e),
                                            r = new Uint8Array(n.length);
                                        for (let e = 0; e < n.length; ++e) r[e] = n.charCodeAt(e);
                                        let a = r.subarray(0, 12),
                                            d = r.subarray(a.length);
                                        i || (i = yield s(t));
                                        let l = yield self[o(t.c)][o(t.e)][o(t.i)]({
                                            name: o(t.g),
                                            [o(t.j)]: a,
                                            [o(t.l)]: 128
                                        }, i, d);
                                        return String.fromCharCode.apply(null, new Uint8Array(l))
                                    })),
                                    _ = (e, t) => a(this, void 0, void 0, (function* () {
                                        let n = new Uint8Array(e.length);
                                        for (let t = 0; t < e.length; ++t) n[t] = e.charCodeAt(t);
                                        let r = self.crypto.getRandomValues(new Uint8Array(12));
                                        i || (i = yield s(t));
                                        let a = yield self[o(t.c)][o(t.e)][o(t.h)]({
                                            name: o(t.g),
                                            [o(t.j)]: r,
                                            [o(t.l)]: 128
                                        }, i, n), d = new Uint8Array(a), l = new Uint8Array(r.length + d.length);
                                        return l.set(r), l.set(d, r.length), btoa(String.fromCharCode.apply(null, l))
                                    }));
                                this._dbrWorker.onmessage = e => a(this, void 0, void 0, (function* () {
                                    let n = e.data ? e.data : e;
                                    switch (n.type) {
                                        case "log":
                                            this._onLog && this._onLog(n.message);
                                            break;
                                        case "load":
                                            if (n.success) {
                                                c._loadWasmStatus = "loadSuccess", c._version = n.version + "(JS " + this._jsVersion + "." + this._jsEditVersion + ")", this._onLog && this._onLog("load dbr worker success");
                                                for (let e of this._loadWasmCallbackArr) e();
                                                this._dbrWorker.onerror = null
                                            } else {
                                                let e = new Error(n.message);
                                                e.stack = n.stack + "\n" + e.stack, c._loadWasmStatus = "loadFail";
                                                for (let t of this._loadWasmCallbackArr) t(e)
                                            }
                                            break;
                                        case "task": {
                                            let e = n.id,
                                                t = n.body;
                                            try {
                                                this._taskCallbackMap.get(e)(t), this._taskCallbackMap.delete(e)
                                            } catch (t) {
                                                throw this._taskCallbackMap.delete(e), t
                                            }
                                            break
                                        }
                                        case "taskd": {
                                            let e = yield u(n.txt, n.d);
                                            this._dbrWorker.postMessage({
                                                type: "task",
                                                id: n.taskID,
                                                body: {
                                                    success: !0,
                                                    txt: e
                                                }
                                            });
                                            break
                                        }
                                        case "taske": {
                                            let e = yield _(n.txt, n.d);
                                            this._dbrWorker.postMessage({
                                                type: "task",
                                                id: n.taskID,
                                                body: {
                                                    success: !0,
                                                    txt: e
                                                }
                                            });
                                            break
                                        }
                                        case "localforage": {
                                            let e = yield t(n.dbname, n.method, n.paras);
                                            this._dbrWorker.postMessage({
                                                type: "task",
                                                id: n.taskID,
                                                body: {
                                                    success: !0,
                                                    result: e
                                                }
                                            });
                                            break
                                        }
                                        default:
                                            this._onLog && this._onLog(e)
                                    }
                                })), l && this._dbrWorker.on("message", this._dbrWorker.onmessage), this._dbrWorker.postMessage({
                                    type: "loadWasm",
                                    bd: this._bWasmDebug,
                                    engineResourcePath: this.engineResourcePath,
                                    version: this._jsVersion,
                                    pk: this.productKeys,
                                    dm: !l && location.origin.startsWith("http") ? location.origin : "https://localhost",
                                    bUseFullFeature: this._bUseFullFeature,
                                    browserInfo: this.browserInfo,
                                    deviceFriendlyName: this.deviceFriendlyName,
                                    ls: this.licenseServer,
                                    sp: this._sessionPassword,
                                    lm: this._limitModules,
                                    cw: this._chargeWay
                                })
                            }
                            case "loading":
                                this._loadWasmCallbackArr.push(n => {
                                    n ? t(n) : e()
                                });
                                break;
                            case "loadSuccess":
                                e();
                                break;
                            case "loadFail":
                                t()
                        }
                    }))))
                }))
            }
            static createInstanceInWorker(e = !1) {
                return a(this, void 0, void 0, (function* () {
                    return yield this.loadWasm(), yield new Promise((t, n) => {
                        let r = c._nextTaskID++;
                        this._taskCallbackMap.set(r, e => {
                            if (e.success) return t(e.instanceID); {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, n(t)
                            }
                        }), this._dbrWorker.postMessage({
                            type: "createInstance",
                            id: r,
                            productKeys: "",
                            bScanner: e
                        })
                    })
                }))
            }
            static createInstance() {
                return a(this, void 0, void 0, (function* () {
                    let e = new c;
                    return e._instanceID = yield this.createInstanceInWorker(), e
                }))
            }
            decode(e) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("decode(source: any)"), c._onLog && (this._timeStartDecode = Date.now()), l) return e instanceof Buffer ? yield this._decodeFileInMemory_Uint8Array(new Uint8Array(e)): e instanceof Uint8Array ? yield this._decodeFileInMemory_Uint8Array(e): "string" == typeof e || e instanceof String ? "data:image/" == e.substring(0, 11) ? yield this._decode_Base64(e): "http" == e.substring(0, 4) ? yield this._decode_Url(e): yield this._decode_FilePath(e): yield Promise.reject(TypeError("'_decode(source, config)': Type of 'source' should be 'Buffer', 'Uint8Array', 'String(base64 with image mime)' or 'String(url)'.")); {
                        let t = {};
                        return !this.region || this.region instanceof Array || (t.region = JSON.parse(JSON.stringify(this.region))), e instanceof Blob ? yield this._decode_Blob(e, t): e instanceof ArrayBuffer ? yield this._decode_ArrayBuffer(e, t): e instanceof Uint8Array || e instanceof Uint8ClampedArray ? yield this._decode_Uint8Array(e, t): e instanceof HTMLImageElement || "undefined" != typeof ImageBitmap && e instanceof ImageBitmap ? yield this._decode_Image(e, t): e instanceof HTMLCanvasElement || "undefined" != typeof OffscreenCanvas && e instanceof OffscreenCanvas ? yield this._decode_Canvas(e, t): e instanceof HTMLVideoElement ? yield this._decode_Video(e, t): "string" == typeof e || e instanceof String ? "data:image/" == e.substring(0, 11) ? yield this._decode_Base64(e, t): yield this._decode_Url(e, t): yield Promise.reject(TypeError("'_decode(source, config)': Type of 'source' should be 'Blob', 'ArrayBuffer', 'Uint8Array', 'HTMLImageElement', 'HTMLCanvasElement', 'HTMLVideoElement', 'String(base64 with image mime)' or 'String(url)'."))
                    }
                }))
            }
            decodeBase64String(e) {
                return a(this, void 0, void 0, (function* () {
                    let t = {};
                    return !this.region || this.region instanceof Array || (t.region = JSON.parse(JSON.stringify(this.region))), this._decode_Base64(e, t)
                }))
            }
            decodeUrl(e) {
                return a(this, void 0, void 0, (function* () {
                    let t = {};
                    return !this.region || this.region instanceof Array || (t.region = JSON.parse(JSON.stringify(this.region))), this._decode_Url(e, t)
                }))
            }
            _decodeBuffer_Uint8Array(e, t, n, r, i, o) {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((s, a) => {
                        let d = c._nextTaskID++;
                        c._taskCallbackMap.set(d, e => {
                            if (e.success) {
                                let t, n = c._onLog ? Date.now() : 0;
                                this.bufferShared && !this.bufferShared.length && (this.bufferShared = e.buffer);
                                try {
                                    t = this._handleRetJsonString(e.decodeReturn)
                                } catch (e) {
                                    return a(e)
                                }
                                if (c._onLog) {
                                    let e = Date.now();
                                    c._onLog("DBR time get result: " + n), c._onLog("Handle image cost: " + (this._timeEnterInnerDBR - this._timeStartDecode)), c._onLog("DBR worker decode image cost: " + (n - this._timeEnterInnerDBR)), c._onLog("DBR worker handle results: " + (e - n)), c._onLog("Total decode image cost: " + (e - this._timeStartDecode))
                                }
                                return s(t)
                            } {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, a(t)
                            }
                        }), c._onLog && (this._timeEnterInnerDBR = Date.now()), c._onLog && c._onLog("Send buffer to worker:" + Date.now()), c._dbrWorker.postMessage({
                            type: "decodeBuffer",
                            id: d,
                            instanceID: this._instanceID,
                            body: {
                                buffer: e,
                                width: t,
                                height: n,
                                stride: r,
                                format: i,
                                config: o
                            }
                        }, [e.buffer])
                    })
                }))
            }
            _decodeBuffer_Blob(e, t, n, r, i, o) {
                return a(this, void 0, void 0, (function* () {
                    return c._onLog && c._onLog("_decodeBuffer_Blob(buffer,width,height,stride,format)"), yield new Promise((t, n) => {
                        let r = new FileReader;
                        r.readAsArrayBuffer(e), r.onload = () => {
                            t(r.result)
                        }, r.onerror = () => {
                            n(r.error)
                        }
                    }).then(e => this._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o))
                }))
            }
            decodeBuffer(e, t, n, r, i, o) {
                return a(this, void 0, void 0, (function* () {
                    let s;
                    return c._onLog && c._onLog("decodeBuffer(buffer,width,height,stride,format)"), c._onLog && (this._timeStartDecode = Date.now()), l ? e instanceof Uint8Array ? s = yield this._decodeBuffer_Uint8Array(e, t, n, r, i, o): e instanceof Buffer && (s = yield this._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o)): e instanceof Uint8Array || e instanceof Uint8ClampedArray ? s = yield this._decodeBuffer_Uint8Array(e, t, n, r, i, o): e instanceof ArrayBuffer ? s = yield this._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o): e instanceof Blob && (s = yield this._decodeBuffer_Blob(e, t, n, r, i, o)), s
                }))
            }
            _decodeFileInMemory_Uint8Array(e) {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((t, n) => {
                        let r = c._nextTaskID++;
                        c._taskCallbackMap.set(r, e => {
                            if (e.success) {
                                let r;
                                try {
                                    r = this._handleRetJsonString(e.decodeReturn)
                                } catch (e) {
                                    return n(e)
                                }
                                return t(r)
                            } {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, n(t)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "decodeFileInMemory",
                            id: r,
                            instanceID: this._instanceID,
                            body: {
                                bytes: e
                            }
                        })
                    })
                }))
            }
            getRuntimeSettings() {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) {
                                let t = JSON.parse(n.results);
                                return null != this.userDefinedRegion && (t.region = JSON.parse(JSON.stringify(this.userDefinedRegion))), e(t)
                            } {
                                let e = new Error(n.message);
                                return e.stack = n.stack + "\n" + e.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "getRuntimeSettings",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            updateRuntimeSettings(e) {
                return a(this, void 0, void 0, (function* () {
                    let t;
                    if ("string" == typeof e || "object" == typeof e && e instanceof String)
                        if ("speed" == e) {
                            let e = yield this.getRuntimeSettings();
                            yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, t.region = e.region, t.deblurLevel = 3, t.expectedBarcodesCount = 0, t.localizationModes = [2, 0, 0, 0, 0, 0, 0, 0]
                        } else if ("balance" == e) {
                        let e = yield this.getRuntimeSettings();
                        yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, t.region = e.region, t.deblurLevel = 5, t.expectedBarcodesCount = 512, t.localizationModes = [2, 16, 0, 0, 0, 0, 0, 0]
                    } else if ("coverage" == e) {
                        let e = yield this.getRuntimeSettings();
                        yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, t.region = e.region
                    } else t = JSON.parse(e);
                    else {
                        if ("object" != typeof e) throw TypeError("'UpdateRuntimeSettings(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");
                        if (t = JSON.parse(JSON.stringify(e)), t.region instanceof Array) {
                            let e = t.region;
                            [e.regionLeft, e.regionTop, e.regionLeft, e.regionBottom, e.regionMeasuredByPercentage].some(e => void 0 !== e) && (t.region = {
                                regionLeft: e.regionLeft || 0,
                                regionTop: e.regionTop || 0,
                                regionRight: e.regionRight || 0,
                                regionBottom: e.regionBottom || 0,
                                regionMeasuredByPercentage: e.regionMeasuredByPercentage || 0
                            })
                        }
                    }
                    if (!c._bUseFullFeature) {
                        if (0 != (t.barcodeFormatIds & ~(s.BF_ONED | s.BF_QR_CODE | s.BF_PDF417 | s.BF_DATAMATRIX)) || 0 != t.barcodeFormatIds_2) throw Error("Some of the specified barcode formats are not supported in the compact version. Please try the full-featured version.");
                        if (0 != t.intermediateResultTypes) throw Error("Intermediate results is not supported in the compact version. Please try the full-featured version.")
                    }
                    if (!l)
                        if (this.bFilterRegionInJs) {
                            let e = t.region;
                            if (e instanceof Array) throw Error("The `region` of type `Array` is only allowed in `BarcodeScanner`.");
                            this.userDefinedRegion = JSON.parse(JSON.stringify(e)), (e.regionLeft || e.regionTop || e.regionRight || e.regionBottom || e.regionMeasuredByPercentage) && (e.regionLeft || e.regionTop || 100 != e.regionRight || 100 != e.regionBottom || !e.regionMeasuredByPercentage) ? this.region = e : this.region = null, t.region = {
                                regionLeft: 0,
                                regionTop: 0,
                                regionRight: 0,
                                regionBottom: 0,
                                regionMeasuredByPercentage: 0
                            }
                        } else this.userDefinedRegion = null, this.region = null;
                    return yield new Promise((e, n) => {
                        let r = c._nextTaskID++;
                        c._taskCallbackMap.set(r, t => {
                            if (t.success) {
                                try {
                                    this._handleRetJsonString(t.updateReturn)
                                } catch (e) {
                                    n(e)
                                }
                                return e()
                            } {
                                let e = new Error(t.message);
                                return e.stack = t.stack + "\n" + e.stack, n(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "updateRuntimeSettings",
                            id: r,
                            instanceID: this._instanceID,
                            body: {
                                settings: JSON.stringify(t)
                            }
                        })
                    })
                }))
            }
            resetRuntimeSettings() {
                return a(this, void 0, void 0, (function* () {
                    return this.userDefinedRegion = null, this.region = null, yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) return e(); {
                                let e = new Error(n.message);
                                return e.stack = n.stack + "\n" + e.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "resetRuntimeSettings",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            outputSettingsToString() {
                return a(this, void 0, void 0, (function* () {
                    if (!c._bUseFullFeature) throw Error("outputSettingsToString() is not supported in the compact version. Please try the full-featured version.");
                    return yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) return e(n.results); {
                                let e = new Error(n.message);
                                return e.stack = n.stack + "\n" + e.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "outputSettingsToString",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            initRuntimeSettingsWithString(e) {
                return a(this, void 0, void 0, (function* () {
                    if (!c._bUseFullFeature) throw Error("initRuntimeSettingsWithString() is not supported in the compact version. Please try the full-featured version.");
                    if ("string" == typeof e || "object" == typeof e && e instanceof String) e = e;
                    else {
                        if ("object" != typeof e) throw TypeError("'initRuntimeSettingstWithString(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");
                        e = JSON.stringify(e)
                    }
                    return yield new Promise((t, n) => {
                        let r = c._nextTaskID++;
                        c._taskCallbackMap.set(r, e => {
                            if (e.success) {
                                try {
                                    this._handleRetJsonString(e.initReturn)
                                } catch (e) {
                                    n(e)
                                }
                                return t()
                            } {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, n(t)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "initRuntimeSettingsWithString",
                            id: r,
                            instanceID: this._instanceID,
                            body: {
                                settings: e
                            }
                        })
                    })
                }))
            }
            _decode_Blob(e, t) {
                return a(this, void 0, void 0, (function* () {
                    c._onLog && c._onLog("_decode_Blob(blob: Blob)");
                    let n = null,
                        r = null;
                    if ("undefined" != typeof createImageBitmap) try {
                        n = yield createImageBitmap(e)
                    } catch (e) {}
                    n || (r = yield function (e) {
                        return new Promise((t, n) => {
                            let r = URL.createObjectURL(e),
                                i = new Image;
                            i.dbrObjUrl = r, i.src = r, i.onload = () => {
                                t(i)
                            }, i.onerror = e => {
                                n(new Error("Can't convert blob to image : " + (e instanceof Event ? e.type : e)))
                            }
                        })
                    }(e));
                    let i = yield this._decode_Image(n || r, t);
                    return n && n.close(), i
                }))
            }
            _decode_ArrayBuffer(e, t) {
                return a(this, void 0, void 0, (function* () {
                    return yield this._decode_Blob(new Blob([e]), t)
                }))
            }
            _decode_Uint8Array(e, t) {
                return a(this, void 0, void 0, (function* () {
                    return yield this._decode_Blob(new Blob([e]), t)
                }))
            }
            _decode_Image(e, t) {
                return a(this, void 0, void 0, (function* () {
                    c._onLog && c._onLog("_decode_Image(image: HTMLImageElement|ImageBitmap)"), t = t || {};
                    let n, r, i = e instanceof HTMLImageElement ? e.naturalWidth : e.width,
                        o = e instanceof HTMLImageElement ? e.naturalHeight : e.height,
                        s = Math.max(i, o);
                    if (s > this._canvasMaxWH) {
                        let e = this._canvasMaxWH / s;
                        n = Math.round(i * e), r = Math.round(o * e)
                    } else n = i, r = o;
                    let a, d = 0,
                        l = 0,
                        u = i,
                        _ = o,
                        h = i,
                        f = o,
                        g = t.region;
                    if (g) {
                        let e, t, s, a;
                        g.regionMeasuredByPercentage ? (e = g.regionLeft * n / 100, t = g.regionTop * r / 100, s = g.regionRight * n / 100, a = g.regionBottom * r / 100) : (e = g.regionLeft, t = g.regionTop, s = g.regionRight, a = g.regionBottom), h = s - e, u = Math.round(h / n * i), f = a - t, _ = Math.round(f / r * o), d = Math.round(e / n * i), l = Math.round(t / r * o)
                    }
                    self.OffscreenCanvas ? a = new OffscreenCanvas(h, f) : (a = document.createElement("canvas"), a.width = h, a.height = f);
                    let E, R = a.getContext("2d");
                    0 == d && 0 == l && i == u && o == _ && i == h && o == f ? R.drawImage(e, 0, 0) : R.drawImage(e, d, l, u, _, 0, 0, h, f), e.dbrObjUrl && URL.revokeObjectURL(e.dbrObjUrl), g ? (E = JSON.parse(JSON.stringify(t)), delete E.region) : E = t;
                    let I = yield this._decode_Canvas(a, E);
                    if (g && I.length > 0)
                        for (let e of I) {
                            let t = e.localizationResult;
                            2 == t.resultCoordinateType && (t.x1 *= .01 * h, t.x2 *= .01 * h, t.x3 *= .01 * h, t.x4 *= .01 * h, t.y1 *= .01 * f, t.y2 *= .01 * f, t.y3 *= .01 * f, t.y4 *= .01 * f), t.x1 += d, t.x2 += d, t.x3 += d, t.x4 += d, t.y1 += l, t.y2 += l, t.y3 += l, t.y4 += l, 2 == t.resultCoordinateType && (t.x1 *= 100 / u, t.x2 *= 100 / u, t.x3 *= 100 / u, t.x4 *= 100 / u, t.y1 *= 100 / _, t.y2 *= 100 / _, t.y3 *= 100 / _, t.y4 *= 100 / _)
                        }
                    return I
                }))
            }
            _decode_Canvas(e, t) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("_decode_Canvas(canvas:HTMLCanvasElement)"), e.crossOrigin && "anonymous" != e.crossOrigin) throw "cors";
                    (this.bSaveOriCanvas || this.singleFrameMode) && (this.oriCanvas = e);
                    let n = (e.dbrCtx2d || e.getContext("2d")).getImageData(0, 0, e.width, e.height).data;
                    return yield this._decodeBuffer_Uint8Array(n, e.width, e.height, 4 * e.width, r.IPF_ABGR_8888, t)
                }))
            }
            _decode_Video(e, t) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("_decode_Video(video)"), !(e instanceof HTMLVideoElement)) throw TypeError("'_decode_Video(video [, config] )': Type of 'video' should be 'HTMLVideoElement'.");
                    if (e.crossOrigin && "anonymous" != e.crossOrigin) throw "cors";
                    t = t || {};
                    let n, i, o = e.videoWidth,
                        s = e.videoHeight,
                        a = Math.max(o, s);
                    if (a > this._canvasMaxWH) {
                        let e = this._canvasMaxWH / a;
                        n = Math.round(o * e), i = Math.round(s * e)
                    } else n = o, i = s;
                    let d = 0,
                        l = 0,
                        u = o,
                        _ = s,
                        h = o,
                        f = s,
                        g = t.region;
                    if (g) {
                        let e, t, r, a;
                        g.regionMeasuredByPercentage ? (e = g.regionLeft * n / 100, t = g.regionTop * i / 100, r = g.regionRight * n / 100, a = g.regionBottom * i / 100) : (e = g.regionLeft, t = g.regionTop, r = g.regionRight, a = g.regionBottom), h = r - e, u = Math.round(h / n * o), f = a - t, _ = Math.round(f / i * s), d = Math.round(e / n * o), l = Math.round(t / i * s)
                    }
                    let E = 0 == d && 0 == l && o == u && s == _ && o == h && s == f;
                    if (!this.bSaveOriCanvas && this._bUseWebgl && E) {
                        this.videoGlCvs || (this.videoGlCvs = self.OffscreenCanvas ? new OffscreenCanvas(h, f) : document.createElement("canvas"));
                        const t = this.videoGlCvs;
                        t.width == h && t.height == f || (t.height = f, t.width = h, this.videoGl && this.videoGl.viewport(0, 0, h, f));
                        const n = this.videoGl || t.getContext("webgl", {
                            alpha: !1,
                            antialias: !1
                        }) || t.getContext("experimental-webgl", {
                            alpha: !1,
                            antialias: !1
                        });
                        if (!this.videoGl) {
                            this.videoGl = n;
                            let e = n.createShader(n.VERTEX_SHADER);
                            n.shaderSource(e, "\nattribute vec4 a_position;\nattribute vec2 a_uv;\n\nvarying vec2 v_uv;\n\nvoid main() {\n    gl_Position = a_position;\n    v_uv = a_uv;\n}\n"), n.compileShader(e), n.getShaderParameter(e, n.COMPILE_STATUS) || console.error("An error occurred compiling the shaders: " + n.getShaderInfoLog(e));
                            let t = n.createShader(n.FRAGMENT_SHADER);
                            n.shaderSource(t, "\nprecision lowp float;\n\nvarying vec2 v_uv;\n\nuniform sampler2D u_texture;\n\nvoid main() {\n    vec4 sample =  texture2D(u_texture, v_uv);\n    float grey = 0.299 * sample.r + 0.587 * sample.g + 0.114 * sample.b;\n    gl_FragColor = vec4(grey, 0.0, 0.0, 1.0);\n}\n"), n.compileShader(t), n.getShaderParameter(t, n.COMPILE_STATUS) || console.error("An error occurred compiling the shaders: " + n.getShaderInfoLog(t));
                            let r = n.createProgram();
                            n.attachShader(r, e), n.attachShader(r, t), n.linkProgram(r), n.getProgramParameter(r, n.LINK_STATUS) || console.error("Unable to initialize the shader program: " + n.getProgramInfoLog(r)), n.useProgram(r), n.bindBuffer(n.ARRAY_BUFFER, n.createBuffer()), n.bufferData(n.ARRAY_BUFFER, new Float32Array([-1, 1, 0, 1, 1, 1, 1, 1, -1, -1, 0, 0, 1, -1, 1, 0]), n.STATIC_DRAW);
                            let i = n.getAttribLocation(r, "a_position");
                            n.enableVertexAttribArray(i), n.vertexAttribPointer(i, 2, n.FLOAT, !1, 16, 0);
                            let o = n.getAttribLocation(r, "a_uv");
                            n.enableVertexAttribArray(o), n.vertexAttribPointer(o, 2, n.FLOAT, !1, 16, 8), n.activeTexture(n.TEXTURE0), n.bindTexture(n.TEXTURE_2D, n.createTexture()), n.texParameteri(n.TEXTURE_2D, n.TEXTURE_WRAP_S, n.CLAMP_TO_EDGE), n.texParameteri(n.TEXTURE_2D, n.TEXTURE_WRAP_T, n.CLAMP_TO_EDGE), n.texParameteri(n.TEXTURE_2D, n.TEXTURE_MIN_FILTER, n.NEAREST), n.texParameteri(n.TEXTURE_2D, n.TEXTURE_MAG_FILTER, n.NEAREST), n.uniform1i(n.getUniformLocation(r, "u_texture"), 0)
                        }(!this.glImgData || this.glImgData.length < h * f * 4) && (this.glImgData = new Uint8Array(h * f * 4)), n.texImage2D(n.TEXTURE_2D, 0, n.RGBA, n.RGBA, n.UNSIGNED_BYTE, e);
                        let i = c._onLog ? Date.now() : 0;
                        n.drawArrays(n.TRIANGLE_STRIP, 0, 4), c._onLog && c._onLog("Grey cost: " + (Date.now() - i));
                        let o = this.glImgData;
                        n.readPixels(0, 0, n.drawingBufferWidth, n.drawingBufferHeight, n.RGBA, n.UNSIGNED_BYTE, o);
                        let s = c._onLog ? Date.now() : 0,
                            a = h * f;
                        (!this.bufferShared || this.bufferShared.length < a) && (this.bufferShared = new Uint8Array(a));
                        let d = this.bufferShared;
                        for (let e = 0; e < a; ++e) {
                            let t = 4 * e;
                            d[e] = o[t]
                        }
                        return c._onLog && c._onLog("Extract grey cost: " + (Date.now() - s)), yield this._decodeBuffer_Uint8Array(d, h, f, h, r.IPF_GrayScaled)
                    } {
                        let n = null;
                        for (let e of this.videoCvses)
                            if (e.width == h && e.height == f) {
                                n = e;
                                break
                            } n || (self.OffscreenCanvas ? n = new OffscreenCanvas(h, f) : (n = document.createElement("canvas"), n.width = h, n.height = f), n.dbrCtx2d = n.getContext("2d"), this.videoCvses.length >= this.maxVideoCvsLength && (this.videoCvses = this.videoCvses.slice(1)), this.videoCvses.push(n));
                        const r = n.dbrCtx2d;
                        let i;
                        E ? r.drawImage(e, 0, 0) : r.drawImage(e, d, l, u, _, 0, 0, h, f), g ? (i = JSON.parse(JSON.stringify(t)), delete i.region) : i = t;
                        let o = yield this._decode_Canvas(n, i);
                        if (g && o.length > 0)
                            for (let e of o) {
                                let t = e.localizationResult;
                                2 == t.resultCoordinateType && (t.x1 *= .01 * h, t.x2 *= .01 * h, t.x3 *= .01 * h, t.x4 *= .01 * h, t.y1 *= .01 * f, t.y2 *= .01 * f, t.y3 *= .01 * f, t.y4 *= .01 * f), t.x1 += d, t.x2 += d, t.x3 += d, t.x4 += d, t.y1 += l, t.y2 += l, t.y3 += l, t.y4 += l, 2 == t.resultCoordinateType && (t.x1 *= 100 / u, t.x2 *= 100 / u, t.x3 *= 100 / u, t.x4 *= 100 / u, t.y1 *= 100 / _, t.y2 *= 100 / _, t.y3 *= 100 / _, t.y4 *= 100 / _)
                            }
                        return o
                    }
                }))
            }
            _decode_Base64(e, t) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("_decode_Base64(base64Str)"), "string" != typeof e && "object" != typeof e) return Promise.reject("'_decode_Base64(base64Str, config)': Type of 'base64Str' should be 'String'.");
                    if ("data:image/" == e.substring(0, 11) && (e = e.substring(e.indexOf(",") + 1)), l) {
                        let t = Buffer.from(e, "base64");
                        return yield this._decodeFileInMemory_Uint8Array(new Uint8Array(t))
                    } {
                        let n = atob(e),
                            r = n.length,
                            i = new Uint8Array(r);
                        for (; r--;) i[r] = n.charCodeAt(r);
                        return yield this._decode_Blob(new Blob([i]), t)
                    }
                }))
            }
            _decode_Url(e, t) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("_decode_Url(url)"), "string" != typeof e && "object" != typeof e) throw TypeError("'_decode_Url(url, config)': Type of 'url' should be 'String'.");
                    if (l) {
                        let t = yield new Promise((t, r) => {
                            (e.startsWith("https") ? n(2) : n(3)).get(e, e => {
                                if (200 == e.statusCode) {
                                    let n = [];
                                    e.on("data", e => {
                                        n.push(e)
                                    }).on("end", () => {
                                        t(new Uint8Array(Buffer.concat(n)))
                                    })
                                } else r("http get fail, statusCode: " + e.statusCode)
                            })
                        });
                        return yield this._decodeFileInMemory_Uint8Array(t)
                    } {
                        let n = yield new Promise((t, n) => {
                            let r = new XMLHttpRequest;
                            r.open("GET", e, !0), r.responseType = "blob", r.send(), r.onloadend = () => a(this, void 0, void 0, (function* () {
                                t(r.response)
                            })), r.onerror = () => {
                                n(new Error("Network Error: " + r.statusText))
                            }
                        });
                        return yield this._decode_Blob(n, t)
                    }
                }))
            }
            _decode_FilePath(e, t) {
                return a(this, void 0, void 0, (function* () {
                    if (c._onLog && c._onLog("_decode_FilePath(path)"), !l) throw Error("'_decode_FilePath(path, config)': The method is only supported in node environment.");
                    if ("string" != typeof e && "object" != typeof e) throw TypeError("'_decode_FilePath(path, config)': Type of 'path' should be 'String'.");
                    const t = n(4);
                    let r = yield new Promise((n, r) => {
                        t.readFile(e, (e, t) => {
                            e ? r(e) : n(new Uint8Array(t))
                        })
                    });
                    return yield this._decodeFileInMemory_Uint8Array(r)
                }))
            }
            static BarcodeReaderException(e, t) {
                let n, r = i.DBR_UNKNOWN;
                return "number" == typeof e ? (r = e, n = new Error(t)) : n = new Error(e), n.code = r, n
            }
            _handleRetJsonString(e) {
                let t = i;
                if (e.textResults) {
                    for (let t = 0; t < e.textResults.length; t++) {
                        let n = e.textResults[t];
                        try {
                            let e = n.barcodeText,
                                t = "";
                            for (let n = 0; n < e.length; n++) t += String.fromCharCode(e[n]);
                            try {
                                n.barcodeText = decodeURIComponent(escape(t))
                            } catch (e) {
                                n.barcodeText = t
                            }
                        } catch (e) {
                            n.barcodeText = ""
                        }
                        if (null != n.exception) {
                            console.warn(n.exception);
                            let e = {};
                            n.exception.split(";").forEach(t => {
                                let n = t.indexOf(":");
                                e[t.substring(0, n)] = t.substring(n + 1)
                            }), n.exception = e
                        }
                    }
                    return e.decodeRecords && (this.decodeRecords = e.decodeRecords), this._lastErrorCode = e.exception, this._lastErrorString = e.description, e.textResults
                }
                if (e.exception == t.DBR_SUCCESS) return e.data;
                throw c.BarcodeReaderException(e.exception, e.description)
            }
            setModeArgument(e, t, n, r) {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((i, o) => {
                        let s = c._nextTaskID++;
                        c._taskCallbackMap.set(s, e => {
                            if (e.success) {
                                try {
                                    this._handleRetJsonString(e.setReturn)
                                } catch (e) {
                                    return o(e)
                                }
                                return i()
                            } {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, o(t)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "setModeArgument",
                            id: s,
                            instanceID: this._instanceID,
                            body: {
                                modeName: e,
                                index: t,
                                argumentName: n,
                                argumentValue: r
                            }
                        })
                    })
                }))
            }
            getModeArgument(e, t, n) {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((r, i) => {
                        let o = c._nextTaskID++;
                        c._taskCallbackMap.set(o, e => {
                            if (e.success) {
                                let t;
                                try {
                                    t = this._handleRetJsonString(e.getReturn)
                                } catch (e) {
                                    return i(e)
                                }
                                return r(t)
                            } {
                                let t = new Error(e.message);
                                return t.stack = e.stack + "\n" + t.stack, i(t)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "getModeArgument",
                            id: o,
                            instanceID: this._instanceID,
                            body: {
                                modeName: e,
                                index: t,
                                argumentName: n
                            }
                        })
                    })
                }))
            }
            getIntermediateResults() {
                return a(this, void 0, void 0, (function* () {
                    return yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) return e(n.results); {
                                let e = new Error(n.message);
                                return e.stack = n.stack + "\n" + e.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "getIntermediateResults",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            getIntermediateCanvas() {
                return a(this, void 0, void 0, (function* () {
                    let e = yield this.getIntermediateResults(), t = [];
                    for (let n of e)
                        if (n.dataType == o.IMRDT_IMAGE)
                            for (let e of n.results) {
                                const n = e.bytes;
                                let i;
                                switch (c._onLog && c._onLog(" " + n.length + " " + n.byteLength + " " + e.width + " " + e.height + " " + e.stride + " " + e.format), e.format) {
                                    case r.IPF_ABGR_8888:
                                        i = new Uint8ClampedArray(n);
                                        break;
                                    case r.IPF_RGB_888: {
                                        const e = n.length / 3;
                                        i = new Uint8ClampedArray(4 * e);
                                        for (let t = 0; t < e; ++t) i[4 * t] = n[3 * t + 2], i[4 * t + 1] = n[3 * t + 1], i[4 * t + 2] = n[3 * t], i[4 * t + 3] = 255;
                                        break
                                    }
                                    case r.IPF_GrayScaled: {
                                        const e = n.length;
                                        i = new Uint8ClampedArray(4 * e);
                                        for (let t = 0; t < e; t++) i[4 * t] = i[4 * t + 1] = i[4 * t + 2] = n[t], i[4 * t + 3] = 255;
                                        break
                                    }
                                    case r.IPF_Binary:
                                    case r.IPF_BinaryInverted: {
                                        e.width = 8 * e.stride, e.height = n.length / e.stride;
                                        const t = n.length;
                                        i = new Uint8ClampedArray(8 * t * 4);
                                        for (let e = 0; e < t; e++) {
                                            let t = n[e];
                                            for (let n = 0; n < 8; ++n) i[4 * (8 * e + n)] = i[4 * (8 * e + n) + 1] = i[4 * (8 * e + n) + 2] = (128 & t) / 128 * 255, i[4 * (8 * e + n) + 3] = 255, t <<= 1
                                        }
                                        break
                                    }
                                    default:
                                        console.log("unknow intermediate image", e)
                                }
                                if (!i) continue;
                                let o = new ImageData(i, e.width, e.height),
                                    s = document.createElement("canvas");
                                s.width = e.width, s.height = e.height, s.getContext("2d").putImageData(o, 0, 0), t.push(s)
                            }
                    return t
                }))
            }
            destroy() {
                return c._onLog && c._onLog("destroy()"), this.bDestroyed = !0, new Promise((e, t) => {
                    let n = c._nextTaskID++;
                    c._taskCallbackMap.set(n, n => {
                        if (n.success) return e(); {
                            let e = new Error(n.message);
                            return e.stack = n.stack + "\n" + e.stack, t(e)
                        }
                    }), c._dbrWorker.postMessage({
                        type: "destroy",
                        id: n,
                        instanceID: this._instanceID
                    })
                })
            }
        }
        c.bNode = l, c._jsVersion = "8.1.2", c._jsEditVersion = "20210121", c._version = "loading...(JS " + c._jsVersion + "." + c._jsEditVersion + ")", c._productKeys = !l && document.currentScript && (document.currentScript.getAttribute("data-productKeys") || document.currentScript.getAttribute("data-licenseKey") || document.currentScript.getAttribute("data-handshakeCode")) || "", c.browserInfo = function () {
            if (l) {
                const e = n(5);
                return {
                    browser: "node",
                    version: process.version.substring(1),
                    OS: e.platform() + e.release()
                }
            }
            var e = {
                init: function () {
                    this.browser = this.searchString(this.dataBrowser) || "unknownBrowser", this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "unknownVersion", this.OS = this.searchString(this.dataOS) || "unknownOS"
                },
                searchString: function (e) {
                    for (var t = 0; t < e.length; t++) {
                        var n = e[t].string,
                            r = e[t].prop;
                        if (this.versionSearchString = e[t].versionSearch || e[t].identity, n) {
                            if (-1 != n.indexOf(e[t].subString)) return e[t].identity
                        } else if (r) return e[t].identity
                    }
                },
                searchVersion: function (e) {
                    var t = e.indexOf(this.versionSearchString);
                    if (-1 != t) return parseFloat(e.substring(t + this.versionSearchString.length + 1))
                },
                dataBrowser: [{
                    string: navigator.userAgent,
                    subString: "Edge",
                    identity: "Edge"
                }, {
                    string: navigator.userAgent,
                    subString: "OPR",
                    identity: "OPR"
                }, {
                    string: navigator.userAgent,
                    subString: "Chrome",
                    identity: "Chrome"
                }, {
                    string: navigator.vendor,
                    subString: "Apple",
                    identity: "Safari",
                    versionSearch: "Version"
                }, {
                    string: navigator.userAgent,
                    subString: "Firefox",
                    identity: "Firefox"
                }, {
                    string: navigator.userAgent,
                    subString: "MSIE",
                    identity: "Explorer",
                    versionSearch: "MSIE"
                }],
                dataOS: [{
                    string: navigator.userAgent,
                    subString: "Android",
                    identity: "Android"
                }, {
                    string: navigator.userAgent,
                    subString: "iPhone",
                    identity: "iPhone"
                }, {
                    string: navigator.platform,
                    subString: "Win",
                    identity: "Windows"
                }, {
                    string: navigator.platform,
                    subString: "Mac",
                    identity: "Mac"
                }, {
                    string: navigator.platform,
                    subString: "Linux",
                    identity: "Linux"
                }]
            };
            return e.init(), {
                browser: e.browser,
                version: e.version,
                OS: e.OS
            }
        }(), c._workerName = "dbr-" + c._jsVersion + ".worker.js", c._bUseIndexDB = !0, c._engineResourcePath = (() => {
            if (l) return __dirname + "/";
            if (document.currentScript) {
                let e = document.currentScript.src,
                    t = e.indexOf("?");
                if (-1 != t) e = e.substring(0, t);
                else {
                    let t = e.indexOf("#"); - 1 != t && (e = e.substring(0, t))
                }
                return e.substring(0, e.lastIndexOf("/") + 1)
            }
            return "./"
        })(), c._licenseServer = [], c._deviceFriendlyName = "", c._isShowRelDecodeTimeInResults = !1, c._bWasmDebug = !1, c._bSendSmallRecordsForDebug = !1, c.__bUseFullFeature = l, c._nextTaskID = 0, c._taskCallbackMap = new Map, c._loadWasmStatus = "unload", c._loadWasmCallbackArr = [], c._lastErrorCode = 0, c._lastErrorString = "";
        var u = function (e, t, n, r) {
            return new(n || (n = Promise))((function (i, o) {
                function s(e) {
                    try {
                        d(r.next(e))
                    } catch (e) {
                        o(e)
                    }
                }

                function a(e) {
                    try {
                        d(r.throw(e))
                    } catch (e) {
                        o(e)
                    }
                }

                function d(e) {
                    var t;
                    e.done ? i(e.value) : (t = e.value, t instanceof n ? t : new n((function (e) {
                        e(t)
                    }))).then(s, a)
                }
                d((r = r.apply(e, t || [])).next())
            }))
        };
        const _ = !!("object" == typeof global && global.process && global.process.release && global.process.release.name && "undefined" == typeof HTMLCanvasElement);
        class h extends c {
            constructor() {
                super(), this.styleEls = [], this.videoSettings = {
                    video: {
                        width: {
                            ideal: 1280
                        },
                        height: {
                            ideal: 720
                        },
                        facingMode: {
                            ideal: "environment"
                        }
                    }
                }, this._singleFrameMode = !(navigator && navigator.mediaDevices && navigator.mediaDevices.getUserMedia), this._singleFrameModeIpt = (() => {
                    let e = document.createElement("input");
                    return e.setAttribute("type", "file"), e.setAttribute("accept", "image/*"), e.setAttribute("capture", ""), e.addEventListener("change", () => u(this, void 0, void 0, (function* () {
                        let t = e.files[0];
                        e.value = "";
                        let n = yield this.decode(t);
                        for (let e of n) delete e.bUnduplicated;
                        if (this._drawRegionsults(n), this.onFrameRead && this._isOpen && !this._bPauseScan && this.onFrameRead(n), this.onUnduplicatedRead && this._isOpen && !this._bPauseScan)
                            for (let e of n) this.onUnduplicatedRead(e.barcodeText, e);
                        yield this.clearMapDecodeRecord()
                    }))), e
                })(), this._clickIptSingleFrameMode = () => {
                    this._singleFrameModeIpt.click()
                }, this.intervalTime = 0, this._isOpen = !1, this._bPauseScan = !1, this._lastDeviceId = void 0, this._intervalDetectVideoPause = 1e3, this._video = null, this._cvsDrawArea = null, this._divScanArea = null, this._divScanLight = null, this._bgLoading = null, this._bgCamera = null, this._selCam = null, this._selRsl = null, this._optGotRsl = null, this._btnClose = null, this._soundOnSuccessfullRead = new Audio("data:audio/mpeg;base64,SUQzBAAAAAAAI1RTU0UAAAAPAAADTGF2ZjU4LjI5LjEwMAAAAAAAAAAAAAAA/+M4wAAAAAAAAAAAAEluZm8AAAAPAAAABQAAAkAAgICAgICAgICAgICAgICAgICAgKCgoKCgoKCgoKCgoKCgoKCgoKCgwMDAwMDAwMDAwMDAwMDAwMDAwMDg4ODg4ODg4ODg4ODg4ODg4ODg4P//////////////////////////AAAAAExhdmM1OC41NAAAAAAAAAAAAAAAACQEUQAAAAAAAAJAk0uXRQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/+MYxAANQAbGeUEQAAHZYZ3fASqD4P5TKBgocg+Bw/8+CAYBA4XB9/4EBAEP4nB9+UOf/6gfUCAIKyjgQ/Kf//wfswAAAwQA/+MYxAYOqrbdkZGQAMA7DJLCsQxNOij///////////+tv///3RWiZGBEhsf/FO/+LoCSFs1dFVS/g8f/4Mhv0nhqAieHleLy/+MYxAYOOrbMAY2gABf/////////////////usPJ66R0wI4boY9/8jQYg//g2SPx1M0N3Z0kVJLIs///Uw4aMyvHJJYmPBYG/+MYxAgPMALBucAQAoGgaBoFQVBUFQWDv6gZBUFQVBUGgaBr5YSgqCoKhIGg7+IQVBUFQVBoGga//SsFSoKnf/iVTEFNRTMu/+MYxAYAAANIAAAAADEwMFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV"), this.bPlaySoundOnSuccessfulRead = !1, this._allCameras = [], this._currentCamera = null, this._videoTrack = null, this.regionMaskFillStyle = "rgba(0,0,0,0.5)", this.regionMaskStrokeStyle = "rgb(254,142,20)", this.regionMaskLineWidth = 2, this.barcodeFillStyle = "rgba(254,180,32,0.3)", this.barcodeStrokeStyle = "rgba(254,180,32,0.9)", this.barcodeLineWidth = 1, this.beingLazyDrawRegionsults = !1, this._indexVideoRegion = -1, this._onCameraSelChange = () => {
                    this.play(this._selCam.value).then(() => {
                        this._isOpen || this.stop()
                    }).catch(e => {
                        alert("Play video failed: " + (e.message || e))
                    })
                }, this._onResolutionSelChange = () => {
                    let e, t;
                    if (this._selRsl && -1 != this._selRsl.selectedIndex) {
                        let n = this._selRsl.options[this._selRsl.selectedIndex];
                        e = n.getAttribute("data-width"), t = n.getAttribute("data-height")
                    }
                    this.play(void 0, e, t).then(() => {
                        this._isOpen || this.stop()
                    }).catch(e => {
                        alert("Play video failed: " + (e.message || e))
                    })
                }, this._onCloseBtnClick = () => {
                    this.hide()
                }
            }
            static get defaultUIElementURL() {
                return this._defaultUIElementURL ? this._defaultUIElementURL : c.engineResourcePath + "dbr.scanner.html"
            }
            static set defaultUIElementURL(e) {
                this._defaultUIElementURL = e
            }
            getUIElement() {
                return this.UIElement
            }
            setUIElement(e) {
                return u(this, void 0, void 0, (function* () {
                    if ("string" == typeof e || e instanceof String) {
                        if (!e.trim().startsWith("<")) {
                            let t = yield fetch(e);
                            if (!t.ok) throw Error("Network Error: " + t.statusText);
                            e = yield t.text()
                        }
                        if (!e.trim().startsWith("<")) throw Error("setUIElement(elementOrUrl): Can't get valid HTMLElement.");
                        let t = document.createElement("div");
                        t.innerHTML = e;
                        for (let e = 0; e < t.childElementCount; ++e) {
                            let n = t.children[e];
                            n instanceof HTMLStyleElement && (this.styleEls.push(n), document.head.append(n))
                        }(e = 1 == t.childElementCount ? t.children[0] : t).remove()
                    }
                    this.UIElement = e
                }))
            }
            get singleFrameMode() {
                return this._singleFrameMode
            }
            set singleFrameMode(e) {
                if (this._isOpen) throw new Error("`singleFrameMode` is not allowed to change when scanner is open.");
                this._singleFrameMode = e, this._singleFrameMode && (() => {
                    u(this, void 0, void 0, (function* () {
                        let e = yield this.getScanSettings();
                        e.oneDTrustFrameCount = 1, yield this.updateScanSettings(e)
                    }))
                })()
            }
            _assertOpen() {
                if (!this._isOpen) throw Error("The scanner is not open.")
            }
            get soundOnSuccessfullRead() {
                return this._soundOnSuccessfullRead
            }
            set soundOnSuccessfullRead(e) {
                e instanceof HTMLAudioElement ? this._soundOnSuccessfullRead = e : this._soundOnSuccessfullRead = new Audio(e)
            }
            set region(e) {
                this._region = e, this.singleFrameMode || (this.beingLazyDrawRegionsults = !0, setTimeout(() => {
                    this.beingLazyDrawRegionsults && this._drawRegionsults()
                }, 500))
            }
            get region() {
                return this._region
            }
            static createInstance(e) {
                return u(this, void 0, void 0, (function* () {
                    if (_) throw new Error("`BarcodeScanner` is not supported in Node.js.");
                    let t = new h;
                    t._instanceID = yield h.createInstanceInWorker(!0), ("string" == typeof e || e instanceof String) && (e = JSON.parse(e));
                    for (let n in e) t[n] = e[n];
                    return t.UIElement || (yield t.setUIElement(this.defaultUIElementURL)), t.singleFrameMode || (yield t.updateRuntimeSettings("single")), t
                }))
            }
            decode(e) {
                return super.decode(e)
            }
            decodeBase64String(e) {
                return super.decodeBase64String(e)
            }
            decodeUrl(e) {
                return super.decodeUrl(e)
            }
            decodeBuffer(e, t, n, r, i, o) {
                return super.decodeBuffer(e, t, n, r, i, o)
            }
            clearMapDecodeRecord() {
                return u(this, void 0, void 0, (function* () {
                    return yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) return e(); {
                                let e = new Error(n.message);
                                return e.stack = n.stack + "\n" + e.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "clearMapDecodeRecord",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            static isRegionSinglePreset(e) {
                return JSON.stringify(e) == JSON.stringify(this.singlePresetRegion)
            }
            static isRegionNormalPreset(e) {
                return 0 == e.regionLeft && 0 == e.regionTop && 0 == e.regionRight && 0 == e.regionBottom && 0 == e.regionMeasuredByPercentage
            }
            updateRuntimeSettings(e) {
                return u(this, void 0, void 0, (function* () {
                    let t;
                    if ("string" == typeof e || "object" == typeof e && e instanceof String)
                        if ("speed" == e) {
                            let e = yield this.getRuntimeSettings();
                            yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, h.isRegionSinglePreset(e.region) || (t.region = e.region)
                        } else if ("balance" == e) {
                        let e = yield this.getRuntimeSettings();
                        yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, h.isRegionSinglePreset(e.region) || (t.region = e.region), t.deblurLevel = 3, t.expectedBarcodesCount = 512, t.localizationModes = [2, 16, 0, 0, 0, 0, 0, 0], t.timeout = 1e5
                    } else if ("coverage" == e) {
                        let e = yield this.getRuntimeSettings();
                        yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, h.isRegionSinglePreset(e.region) || (t.region = e.region), t.deblurLevel = 5, t.expectedBarcodesCount = 512, t.scaleDownThreshold = 1e5, t.localizationModes = [2, 16, 4, 8, 0, 0, 0, 0], t.timeout = 1e5
                    } else if ("single" == e) {
                        let e = yield this.getRuntimeSettings();
                        yield this.resetRuntimeSettings(), t = yield this.getRuntimeSettings(), t.barcodeFormatIds = e.barcodeFormatIds, t.barcodeFormatIds_2 = e.barcodeFormatIds_2, h.isRegionNormalPreset(e.region) ? t.region = JSON.parse(JSON.stringify(h.singlePresetRegion)) : t.region = e.region, t.expectedBarcodesCount = 1, t.localizationModes = [16, 2, 0, 0, 0, 0, 0, 0], t.barcodeZoneMinDistanceToImageBorders = 0
                    } else t = JSON.parse(e);
                    else {
                        if ("object" != typeof e) throw TypeError("'UpdateRuntimeSettings(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");
                        if (t = JSON.parse(JSON.stringify(e)), t.region instanceof Array) {
                            let n = e.region;
                            [n.regionLeft, n.regionTop, n.regionLeft, n.regionBottom, n.regionMeasuredByPercentage].some(e => void 0 !== e) && (t.region = {
                                regionLeft: n.regionLeft || 0,
                                regionTop: n.regionTop || 0,
                                regionRight: n.regionRight || 0,
                                regionBottom: n.regionBottom || 0,
                                regionMeasuredByPercentage: n.regionMeasuredByPercentage || 0
                            })
                        }
                    }
                    if (!c._bUseFullFeature) {
                        if (0 != (t.barcodeFormatIds & ~(s.BF_ONED | s.BF_QR_CODE | s.BF_PDF417 | s.BF_DATAMATRIX)) || 0 != t.barcodeFormatIds_2) throw Error("Some of the specified barcode formats are not supported in the compact version. Please try the full-featured version.");
                        if (0 != t.intermediateResultTypes) throw Error("Intermediate results is not supported in the compact version. Please try the full-featured version.")
                    }
                    if (this.bFilterRegionInJs) {
                        let e = t.region;
                        if (this.userDefinedRegion = JSON.parse(JSON.stringify(e)), e instanceof Array)
                            if (e.length) {
                                for (let t = 0; t < e.length; ++t) {
                                    let n = e[t];
                                    n && ((n.regionLeft || n.regionTop || n.regionRight || n.regionBottom || n.regionMeasuredByPercentage) && (n.regionLeft || n.regionTop || 100 != n.regionRight || 100 != n.regionBottom || !n.regionMeasuredByPercentage) || (e[t] = null))
                                }
                                this.region = e
                            } else this.region = null;
                        else(e.regionLeft || e.regionTop || e.regionRight || e.regionBottom || e.regionMeasuredByPercentage) && (e.regionLeft || e.regionTop || 100 != e.regionRight || 100 != e.regionBottom || !e.regionMeasuredByPercentage) ? this.region = e : this.region = null;
                        t.region = {
                            regionLeft: 0,
                            regionTop: 0,
                            regionRight: 0,
                            regionBottom: 0,
                            regionMeasuredByPercentage: 0
                        }
                    } else this.userDefinedRegion = null, this.region = null;
                    yield new Promise((e, n) => {
                        let r = c._nextTaskID++;
                        c._taskCallbackMap.set(r, t => {
                            if (t.success) {
                                try {
                                    this._handleRetJsonString(t.updateReturn)
                                } catch (e) {
                                    n(e)
                                }
                                return e()
                            } {
                                let e = new Error(t.message);
                                return e.stack = t.stack + "\n" + e.stack, n(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "updateRuntimeSettings",
                            id: r,
                            instanceID: this._instanceID,
                            body: {
                                settings: JSON.stringify(t)
                            }
                        })
                    }), "single" == e && (yield this.setModeArgument("BinarizationModes", 0, "EnableFillBinaryVacancy", "0"), yield this.setModeArgument("LocalizationModes", 0, "ScanDirection", "2"), yield this.setModeArgument("BinarizationModes", 0, "BlockSizeX", "71"), yield this.setModeArgument("BinarizationModes", 0, "BlockSizeY", "71"))
                }))
            }
            _bindUI() {
                let e = [this.UIElement],
                    t = this.UIElement.children;
                for (let n of t) e.push(n);
                for (let t = 0; t < e.length; ++t)
                    for (let n of e[t].children) e.push(n);
                let n = null;
                for (let t of e) !this._video && t.classList.contains("dbrScanner-video") ? (this._video = t, this._video.setAttribute("playsinline", "true")) : !this._cvsDrawArea && t.classList.contains("dbrScanner-cvs-drawarea") ? this._cvsDrawArea = t : !this._divScanArea && t.classList.contains("dbrScanner-cvs-scanarea") ? this._divScanArea = t : !this._divScanLight && t.classList.contains("dbrScanner-scanlight") ? this._divScanLight = t : !this._bgLoading && t.classList.contains("dbrScanner-bg-loading") ? this._bgLoading = t : !this._bgCamera && t.classList.contains("dbrScanner-bg-camera") ? this._bgCamera = t : !this._selCam && t.classList.contains("dbrScanner-sel-camera") ? this._selCam = t : !this._selRsl && t.classList.contains("dbrScanner-sel-resolution") ? (this._selRsl = t, this._selRsl.options.length || (this._selRsl.innerHTML = [this._optGotRsl ? "" : '<option class="dbrScanner-opt-gotResolution" value="got"></option>', '<option data-width="3840" data-height="2160">ask 3840 x 2160</option>', '<option data-width="2560" data-height="1440">ask 2560 x 1440</option>', '<option data-width="1920" data-height="1080">ask 1920 x 1080</option>', '<option data-width="1600" data-height="1200">ask 1600 x 1200</option>', '<option data-width="1280" data-height="720">ask 1280 x 720</option>', '<option data-width="800" data-height="600">ask 800 x 600</option>', '<option data-width="640" data-height="480">ask 640 x 480</option>', '<option data-width="640" data-height="360">ask 640 x 360</option>'].join(""), this._optGotRsl = this._optGotRsl || this._selRsl.options[0])) : !this._optGotRsl && t.classList.contains("dbrScanner-opt-gotResolution") ? this._optGotRsl = t : !this._btnClose && t.classList.contains("dbrScanner-btn-close") ? this._btnClose = t : !this._video && t.classList.contains("dbrScanner-existingVideo") ? (this._video = t, this._video.setAttribute("playsinline", "true"), this.singleFrameMode = !1) : !n && t.tagName && "video" == t.tagName.toLowerCase() && (n = t);
                if (!this._video && n && (this._video = n), this.singleFrameMode ? (this._video && (this._video.addEventListener("click", this._clickIptSingleFrameMode), this._video.style.cursor = "pointer", this._video.setAttribute("title", "Take a photo")), this._cvsDrawArea && (this._cvsDrawArea.addEventListener("click", this._clickIptSingleFrameMode), this._cvsDrawArea.style.cursor = "pointer", this._cvsDrawArea.setAttribute("title", "Take a photo")), this._divScanArea && (this._divScanArea.addEventListener("click", this._clickIptSingleFrameMode), this._divScanArea.style.cursor = "pointer", this._divScanArea.setAttribute("title", "Take a photo")), this._bgCamera && (this._bgCamera.style.display = "")) : this._bgLoading && (this._bgLoading.style.display = ""), this._selCam && this._selCam.addEventListener("change", this._onCameraSelChange), this._selRsl && this._selRsl.addEventListener("change", this._onResolutionSelChange), this._btnClose && this._btnClose.addEventListener("click", this._onCloseBtnClick), !this._video) throw this._unbindUI(), Error("Can not find HTMLVideoElement with class `dbrScanner-video`.");
                this._isOpen = !0
            }
            _unbindUI() {
                this._clearRegionsults(), this.singleFrameMode ? (this._video && (this._video.removeEventListener("click", this._clickIptSingleFrameMode), this._video.style.cursor = "", this._video.removeAttribute("title")), this._cvsDrawArea && (this._cvsDrawArea.removeEventListener("click", this._clickIptSingleFrameMode), this._cvsDrawArea.style.cursor = "", this._cvsDrawArea.removeAttribute("title")), this._divScanArea && (this._divScanArea.removeEventListener("click", this._clickIptSingleFrameMode), this._divScanArea.style.cursor = "", this._divScanArea.removeAttribute("title")), this._bgCamera && (this._bgCamera.style.display = "none")) : this._bgLoading && (this._bgLoading.style.display = "none"), this._selCam && this._selCam.removeEventListener("change", this._onCameraSelChange), this._selRsl && this._selRsl.removeEventListener("change", this._onResolutionSelChange), this._btnClose && this._btnClose.removeEventListener("click", this._onCloseBtnClick), this._video = null, this._cvsDrawArea = null, this._divScanArea = null, this._divScanLight = null, this._selCam = null, this._selRsl = null, this._optGotRsl = null, this._btnClose = null, this._isOpen = !1
            }
            _renderSelCameraInfo() {
                let e, t;
                if (this._selCam && (e = this._selCam.value, this._selCam.innerHTML = ""), this._selCam) {
                    for (let n of this._allCameras) {
                        let r = document.createElement("option");
                        r.value = n.deviceId, r.innerText = n.label, this._selCam.append(r), e == n.deviceId && (t = r)
                    }
                    let n = this._selCam.childNodes;
                    if (!t && this._currentCamera && n.length)
                        for (let e of n)
                            if (this._currentCamera.label == e.innerText) {
                                t = e;
                                break
                            } t && (this._selCam.value = t.value)
                }
            }
            getAllCameras() {
                return u(this, void 0, void 0, (function* () {
                    const e = yield navigator.mediaDevices.enumerateDevices(), t = [];
                    let n = 0;
                    for (let r = 0; r < e.length; r++) {
                        let i, o = e[r];
                        "videoinput" == o.kind && (i = {}, i.deviceId = o.deviceId, i.label = !o.label || /^camera\s[0-9]+$/.test(o.label) ? "camera " + n++ : o.label, t.push(i))
                    }
                    return this._allCameras = t, Promise.resolve(t)
                }))
            }
            getCurrentCamera() {
                return u(this, void 0, void 0, (function* () {
                    let e = void 0;
                    if (this._video)
                        for (let t of this._video.srcObject.getVideoTracks()) {
                            if (e) break;
                            for (let n of this._allCameras)
                                if (t.label == n.label) {
                                    e = n, this._lastDeviceId = n.deviceId;
                                    break
                                }
                        }
                    return this._currentCamera = e, e
                }))
            }
            setCurrentCamera(e) {
                return u(this, void 0, void 0, (function* () {
                    return yield this.play(e.deviceId || e)
                }))
            }
            getResolution() {
                return this._isOpen ? [this._video.videoWidth, this._video.videoHeight] : null
            }
            setResolution(e, t) {
                return u(this, void 0, void 0, (function* () {
                    let n, r;
                    return this._isOpen ? (e instanceof Array ? (n = e[0], r = e[1]) : (n = e, r = t), yield this.play(null, n, r)) : yield Promise.reject(new Error("The camera is not open."))
                }))
            }
            getScanSettings() {
                return u(this, void 0, void 0, (function* () {
                    return yield new Promise((e, t) => {
                        let n = c._nextTaskID++;
                        c._taskCallbackMap.set(n, n => {
                            if (n.success) {
                                let t = n.results;
                                return t.intervalTime = this.intervalTime, e(t)
                            } {
                                let e = new Error(n.message);
                                return e.stack += "\n" + n.stack, t(e)
                            }
                        }), c._dbrWorker.postMessage({
                            type: "getScanSettings",
                            id: n,
                            instanceID: this._instanceID
                        })
                    })
                }))
            }
            updateScanSettings(e) {
                return u(this, void 0, void 0, (function* () {
                    return this.intervalTime = e.intervalTime, yield new Promise((t, n) => {
                        let r = c._nextTaskID++;
                        c._taskCallbackMap.set(r, e => {
                            if (e.success) return t(); {
                                let t = new Error(e.message);
                                return t.stack += "\n" + e.stack, n(t)
                            }
                        }), h._dbrWorker.postMessage({
                            type: "updateScanSettings",
                            id: r,
                            instanceID: this._instanceID,
                            body: {
                                settings: e
                            }
                        })
                    })
                }))
            }
            getVideoSettings() {
                return JSON.parse(JSON.stringify(this.videoSettings))
            }
            updateVideoSettings(e) {
                return this.videoSettings = JSON.parse(JSON.stringify(e)), this._lastDeviceId = null, this._isOpen ? this.play() : Promise.resolve()
            }
            isOpen() {
                return this._isOpen
            }
            _show() {
                this.UIElement.parentNode || (this.UIElement.style.position = "fixed", this.UIElement.style.left = "0", this.UIElement.style.top = "0", document.body.append(this.UIElement)), "none" == this.UIElement.style.display && (this.UIElement.style.display = "")
            }
            stop() {
                this._video && this._video.srcObject && (c._onLog && c._onLog("======stop video========"), this._video.srcObject.getTracks().forEach(e => {
                    e.stop()
                }), this._video.srcObject = null, this._videoTrack = null), this._video && this._video.classList.contains("dbrScanner-existingVideo") && (c._onLog && c._onLog("======stop existing video========"), this._video.pause(), this._video.currentTime = 0), this._bgLoading && (this._bgLoading.style.animationPlayState = ""), this._divScanLight && (this._divScanLight.style.display = "none")
            }
            pause() {
                this._video && this._video.pause(), this._divScanLight && (this._divScanLight.style.display = "none")
            }
            play(e, t, n) {
                return u(this, void 0, void 0, (function* () {
                    if (this._assertOpen(), this.singleFrameMode) return this._clickIptSingleFrameMode(), {
                        width: 0,
                        height: 0
                    };
                    if (this._video && this._video.classList.contains("dbrScanner-existingVideo")) return void this._video.play();
                    this._video && this._video.srcObject && (this.stop(), yield new Promise(e => setTimeout(e, 500))), c._onLog && c._onLog("======before video========"), "Android" == c.browserInfo.OS && (yield this.getAllCameras());
                    const r = this.videoSettings;
                    "boolean" == typeof r.video && (r.video = {});
                    const i = "iPhone" == c.browserInfo.OS;
                    let o, s;
                    if (i ? t >= 1280 || n >= 1280 ? r.video.width = 1280 : t >= 640 || n >= 640 ? r.video.width = 640 : (t < 640 || n < 640) && (r.video.width = 320) : (t && (r.video.width = {
                            ideal: t
                        }), n && (r.video.height = {
                            ideal: n
                        })), e) delete r.video.facingMode, r.video.deviceId = {
                        exact: e
                    }, this._lastDeviceId = e;
                    else if (r.video.deviceId);
                    else if (this._lastDeviceId) delete r.video.facingMode, r.video.deviceId = {
                        ideal: this._lastDeviceId
                    };
                    else if (r.video.facingMode) {
                        let e = r.video.facingMode;
                        if (e instanceof Array && e.length && (e = e[0]), e = e.exact || e.ideal || e, "environment" === e) {
                            for (let e of this._allCameras) {
                                let t = e.label.toLowerCase();
                                if (t && -1 != t.indexOf("facing back") && /camera[0-9]?\s0,/.test(t)) {
                                    delete r.video.facingMode, r.video.deviceId = {
                                        ideal: e.deviceId
                                    };
                                    break
                                }
                            }
                            o = !!r.video.facingMode
                        }
                    }
                    c._onLog && c._onLog("======try getUserMedia========"), c._onLog && c._onLog("ask " + JSON.stringify(r.video.width) + "x" + JSON.stringify(r.video.height));
                    try {
                        c._onLog && c._onLog(r), s = yield navigator.mediaDevices.getUserMedia(r)
                    } catch (e) {
                        c._onLog && c._onLog(e), c._onLog && c._onLog("======try getUserMedia again========"), i ? (delete r.video.width, delete r.video.height) : o ? (delete r.video.facingMode, this._allCameras.length && (r.video.deviceId = {
                            ideal: this._allCameras[this._allCameras.length - 1].deviceId
                        })) : r.video = !0, c._onLog && c._onLog(r), s = yield navigator.mediaDevices.getUserMedia(r)
                    } {
                        const e = s.getVideoTracks();
                        e.length && (this._videoTrack = e[0])
                    }
                    "Android" !== c.browserInfo.OS && (yield this.getAllCameras()), this._video.srcObject = s, c._onLog && c._onLog("======play video========");
                    try {
                        yield this._video.play()
                    } catch (e) {
                        yield new Promise(e => {
                            setTimeout(e, 1e3)
                        }), yield this._video.play()
                    }
                    c._onLog && c._onLog("======played video========"), this._bgLoading && (this._bgLoading.style.animationPlayState = "paused"), this._drawRegionsults();
                    const a = "got " + this._video.videoWidth + "x" + this._video.videoHeight;
                    this._optGotRsl && (this._optGotRsl.setAttribute("data-width", this._video.videoWidth), this._optGotRsl.setAttribute("data-height", this._video.videoHeight), this._optGotRsl.innerText = a, this._selRsl && this._optGotRsl.parentNode == this._selRsl && (this._selRsl.value = "got")), c._onLog && c._onLog(a), yield this.getCurrentCamera(), this._renderSelCameraInfo();
                    let d = {
                        width: this._video.videoWidth,
                        height: this._video.videoHeight
                    };
                    return this.onPlayed && setTimeout(() => {
                        this.onPlayed(d)
                    }, 0), d
                }))
            }
            pauseScan() {
                this._assertOpen(), this._bPauseScan = !0, this._divScanLight && (this._divScanLight.style.display = "none")
            }
            resumeScan() {
                this._assertOpen(), this._bPauseScan = !1
            }
            getCapabilities() {
                return this._assertOpen(), this._videoTrack.getCapabilities ? this._videoTrack.getCapabilities() : {}
            }
            getCameraSettings() {
                return this._assertOpen(), this._videoTrack.getSettings()
            }
            getConstraints() {
                return this._assertOpen(), this._videoTrack.getConstraints()
            }
            applyConstraints(e) {
                return u(this, void 0, void 0, (function* () {
                    if (this._assertOpen(), !this._videoTrack.applyConstraints) throw Error("Not support.");
                    return yield this._videoTrack.applyConstraints(e)
                }))
            }
            turnOnTorch() {
                return u(this, void 0, void 0, (function* () {
                    if (this._assertOpen(), this.getCapabilities().torch) return yield this._videoTrack.applyConstraints({
                        advanced: [{
                            torch: !0
                        }]
                    });
                    throw Error("Not support.")
                }))
            }
            turnOffTorch() {
                return u(this, void 0, void 0, (function* () {
                    if (this._assertOpen(), this.getCapabilities().torch) return yield this._videoTrack.applyConstraints({
                        advanced: [{
                            torch: !1
                        }]
                    });
                    throw Error("Not support.")
                }))
            }
            setColorTemperature(e) {
                return u(this, void 0, void 0, (function* () {
                    this._assertOpen();
                    let t = this.getCapabilities().colorTemperature;
                    if (!t) throw Error("Not support.");
                    return e < t.min ? e = t.min : e > t.max && (e = t.max), yield this._videoTrack.applyConstraints({
                        advanced: [{
                            colorTemperature: e
                        }]
                    })
                }))
            }
            setExposureCompensation(e) {
                return u(this, void 0, void 0, (function* () {
                    this._assertOpen();
                    let t = this.getCapabilities().exposureCompensation;
                    if (!t) throw Error("Not support.");
                    return e < t.min ? e = t.min : e > t.max && (e = t.max), yield this._videoTrack.applyConstraints({
                        advanced: [{
                            exposureCompensation: e
                        }]
                    })
                }))
            }
            setZoom(e) {
                return u(this, void 0, void 0, (function* () {
                    this._assertOpen();
                    let t = this.getCapabilities().zoom;
                    if (!t) throw Error("Not support.");
                    return e < t.min ? e = t.min : e > t.max && (e = t.max), yield this._videoTrack.applyConstraints({
                        advanced: [{
                            zoom: e
                        }]
                    })
                }))
            }
            setFrameRate(e) {
                return u(this, void 0, void 0, (function* () {
                    this._assertOpen();
                    let t = this.getCapabilities().frameRate;
                    if (!t) throw Error("Not support.");
                    return e < t.min ? e = t.min : e > t.max && (e = t.max), yield this._videoTrack.applyConstraints({
                        width: {
                            ideal: Math.max(this._video.videoWidth, this._video.videoHeight)
                        },
                        frameRate: e
                    })
                }))
            }
            _cloneDecodeResults(e) {
                if (e instanceof Array) {
                    let t = [];
                    for (let n of e) t.push(this._cloneDecodeResults(n));
                    return t
                } {
                    let t = e;
                    return JSON.parse(JSON.stringify(t, (e, t) => "oriVideoCanvas" == e || "searchRegionCanvas" == e ? void 0 : t))
                }
            }
            _loopReadVideo() {
                return u(this, void 0, void 0, (function* () {
                    if (this.bDestroyed) return;
                    if (!this._isOpen) return void(yield this.clearMapDecodeRecord());
                    if (this._video.paused || this._bPauseScan) return c._onLog && c._onLog("Video or scan is paused. Ask in 1s."), yield this.clearMapDecodeRecord(), void setTimeout(() => {
                        this._loopReadVideo()
                    }, this._intervalDetectVideoPause);
                    this._divScanLight && "none" == this._divScanLight.style.display && (this._divScanLight.style.display = ""), c._onLog && c._onLog("======= once read =======");
                    (new Date).getTime();
                    c._onLog && (this._timeStartDecode = Date.now());
                    let e = {};
                    if (this.region)
                        if (this.region instanceof Array) {
                            ++this._indexVideoRegion >= this.region.length && (this._indexVideoRegion = 0);
                            let t = this.region[this._indexVideoRegion];
                            t && (e.region = JSON.parse(JSON.stringify(t)))
                        } else e.region = JSON.parse(JSON.stringify(this.region));
                    this._decode_Video(this._video, e).then(e => {
                        if (c._onLog && c._onLog(e), this._isOpen && !this._video.paused && !this._bPauseScan) {
                            if (this.bPlaySoundOnSuccessfulRead && e.length) {
                                let t = !1;
                                if (!0 === this.bPlaySoundOnSuccessfulRead || "frame" === this.bPlaySoundOnSuccessfulRead) t = !0;
                                else if ("unduplicated" === this.bPlaySoundOnSuccessfulRead)
                                    for (let n of e)
                                        if (n.bUnduplicated) {
                                            t = !0;
                                            break
                                        } t && (this.soundOnSuccessfullRead.currentTime = 0, this.soundOnSuccessfullRead.play().catch(e => {
                                    console.warn("Autoplay not allowed. User interaction d.")
                                }))
                            }
                            if (this.onFrameRead) {
                                let t = this._cloneDecodeResults(e);
                                for (let e of t) delete e.bUnduplicated;
                                this.onFrameRead(t)
                            }
                            if (this.onUnduplicatedRead)
                                for (let t of e) t.bUnduplicated && this.onUnduplicatedRead(t.barcodeText, this._cloneDecodeResults(t));
                            this._drawRegionsults(e)
                        }
                        setTimeout(() => {
                            this._loopReadVideo()
                        }, this.intervalTime)
                    }).catch(e => {
                        if (c._onLog && c._onLog(e.message || e), setTimeout(() => {
                                this._loopReadVideo()
                            }, Math.max(this.intervalTime, 1e3)), "platform error" != e.message) throw console.error(e.message), e
                    })
                }))
            }
            _drawRegionsults(e) {
                let t, n, r;
                if (this.beingLazyDrawRegionsults = !1, this.singleFrameMode) {
                    if (!this.oriCanvas) return;
                    t = "contain", n = this.oriCanvas.width, r = this.oriCanvas.height
                } else {
                    if (!this._video) return;
                    t = this._video.style.objectFit || "contain", n = this._video.videoWidth, r = this._video.videoHeight
                }
                let i = this.region;
                if (i && (!i.regionLeft && !i.regionRight && !i.regionTop && !i.regionBottom && !i.regionMeasuredByPercentage || i instanceof Array ? i = null : i.regionMeasuredByPercentage ? i = i.regionLeft || i.regionRight || 100 !== i.regionTop || 100 !== i.regionBottom ? {
                        regionLeft: Math.round(i.regionLeft / 100 * n),
                        regionTop: Math.round(i.regionTop / 100 * r),
                        regionRight: Math.round(i.regionRight / 100 * n),
                        regionBottom: Math.round(i.regionBottom / 100 * r)
                    } : null : (i = JSON.parse(JSON.stringify(i)), delete i.regionMeasuredByPercentage)), this._cvsDrawArea) {
                    this._cvsDrawArea.style.objectFit = t;
                    let o = this._cvsDrawArea;
                    o.width = n, o.height = r;
                    let s = o.getContext("2d");
                    if (i) {
                        s.fillStyle = this.regionMaskFillStyle, s.fillRect(0, 0, o.width, o.height), s.globalCompositeOperation = "destination-out", s.fillStyle = "#000";
                        let e = Math.round(this.regionMaskLineWidth / 2);
                        s.fillRect(i.regionLeft - e, i.regionTop - e, i.regionRight - i.regionLeft + 2 * e, i.regionBottom - i.regionTop + 2 * e), s.globalCompositeOperation = "source-over", s.strokeStyle = this.regionMaskStrokeStyle, s.lineWidth = this.regionMaskLineWidth, s.rect(i.regionLeft, i.regionTop, i.regionRight - i.regionLeft, i.regionBottom - i.regionTop), s.stroke()
                    }
                    if (e) {
                        s.globalCompositeOperation = "destination-over", s.fillStyle = this.barcodeFillStyle, s.strokeStyle = this.barcodeStrokeStyle, s.lineWidth = this.barcodeLineWidth, e = e || [];
                        for (let t of e) {
                            let e = t.localizationResult;
                            s.beginPath(), s.moveTo(e.x1, e.y1), s.lineTo(e.x2, e.y2), s.lineTo(e.x3, e.y3), s.lineTo(e.x4, e.y4), s.fill(), s.beginPath(), s.moveTo(e.x1, e.y1), s.lineTo(e.x2, e.y2), s.lineTo(e.x3, e.y3), s.lineTo(e.x4, e.y4), s.closePath(), s.stroke()
                        }
                    }
                    this.singleFrameMode && (s.globalCompositeOperation = "destination-over", s.drawImage(this.oriCanvas, 0, 0))
                }
                if (this._divScanArea) {
                    let e = this._video.offsetWidth,
                        t = this._video.offsetHeight,
                        o = 1;
                    e / t < n / r ? (o = e / n, this._divScanArea.style.left = "0", this._divScanArea.style.top = Math.round((t - r * o) / 2) + "px") : (o = t / r, this._divScanArea.style.left = Math.round((e - n * o) / 2) + "px", this._divScanArea.style.top = "0");
                    let s = i ? Math.round(i.regionLeft * o) : 0,
                        a = i ? Math.round(i.regionTop * o) : 0,
                        d = i ? Math.round(i.regionRight * o - s) : Math.round(n * o),
                        l = i ? Math.round(i.regionBottom * o - a) : Math.round(r * o);
                    this._divScanArea.style.marginLeft = s + "px", this._divScanArea.style.marginTop = a + "px", this._divScanArea.style.width = d + "px", this._divScanArea.style.height = l + "px"
                }
            }
            _clearRegionsults() {
                this._cvsDrawArea && (this._cvsDrawArea.width = this._cvsDrawArea.height = 0)
            }
            open() {
                return u(this, void 0, void 0, (function* () {
                    this._bindUI();
                    let e = yield this.play();
                    return this.singleFrameMode || this._loopReadVideo(), e
                }))
            }
            close() {
                this.stop(), this._unbindUI(), this._bPauseScan = !1
            }
            show() {
                return u(this, void 0, void 0, (function* () {
                    this._bindUI(), this._show();
                    let e = yield this.play();
                    return this.singleFrameMode || this._loopReadVideo(), e
                }))
            }
            hide() {
                this.stop(), this._unbindUI(), this._bPauseScan = !1, this.UIElement.style.display = "none"
            }
            destroy() {
                const e = Object.create(null, {
                    destroy: {
                        get: () => super.destroy
                    }
                });
                return u(this, void 0, void 0, (function* () {
                    this.close();
                    for (let e of this.styleEls) e.remove();
                    this.styleEls.splice(0, this.styleEls.length), this.bDestroyed || (yield e.destroy.call(this))
                }))
            }
        }
        var f, g, E, R, I, v, A, m, p, y, S, D, T, b, M, C, O, L, N, B, P, w, F, U, k, x, V, G, W, j;
        h.singlePresetRegion = [null, {
                regionLeft: 0,
                regionTop: 30,
                regionRight: 100,
                regionBottom: 70,
                regionMeasuredByPercentage: 1
            }, {
                regionLeft: 25,
                regionTop: 25,
                regionRight: 75,
                regionBottom: 75,
                regionMeasuredByPercentage: 1
            }, {
                regionLeft: 25,
                regionTop: 25,
                regionRight: 75,
                regionBottom: 75,
                regionMeasuredByPercentage: 1
            }],
            function (e) {
                e[e.BICM_DARK_ON_LIGHT = 1] = "BICM_DARK_ON_LIGHT", e[e.BICM_LIGHT_ON_DARK = 2] = "BICM_LIGHT_ON_DARK", e[e.BICM_DARK_ON_DARK = 4] = "BICM_DARK_ON_DARK", e[e.BICM_LIGHT_ON_LIGHT = 8] = "BICM_LIGHT_ON_LIGHT", e[e.BICM_DARK_LIGHT_MIXED = 16] = "BICM_DARK_LIGHT_MIXED", e[e.BICM_DARK_ON_LIGHT_DARK_SURROUNDING = 32] = "BICM_DARK_ON_LIGHT_DARK_SURROUNDING", e[e.BICM_SKIP = 0] = "BICM_SKIP", e[e.BICM_REV = 2147483648] = "BICM_REV"
            }(f || (f = {})),
            function (e) {
                e[e.BCM_AUTO = 1] = "BCM_AUTO", e[e.BCM_GENERAL = 2] = "BCM_GENERAL", e[e.BCM_SKIP = 0] = "BCM_SKIP", e[e.BCM_REV = 2147483648] = "BCM_REV"
            }(g || (g = {})),
            function (e) {
                e[e.BF2_NULL = 0] = "BF2_NULL", e[e.BF2_POSTALCODE = 32505856] = "BF2_POSTALCODE", e[e.BF2_NONSTANDARD_BARCODE = 1] = "BF2_NONSTANDARD_BARCODE", e[e.BF2_USPSINTELLIGENTMAIL = 1048576] = "BF2_USPSINTELLIGENTMAIL", e[e.BF2_POSTNET = 2097152] = "BF2_POSTNET", e[e.BF2_PLANET = 4194304] = "BF2_PLANET", e[e.BF2_AUSTRALIANPOST = 8388608] = "BF2_AUSTRALIANPOST", e[e.BF2_RM4SCC = 16777216] = "BF2_RM4SCC", e[e.BF2_DOTCODE = 2] = "BF2_DOTCODE"
            }(E || (E = {})),
            function (e) {
                e[e.BM_AUTO = 1] = "BM_AUTO", e[e.BM_LOCAL_BLOCK = 2] = "BM_LOCAL_BLOCK", e[e.BM_SKIP = 0] = "BM_SKIP", e[e.BM_THRESHOLD = 4] = "BM_THRESHOLD", e[e.BM_REV = 2147483648] = "BM_REV"
            }(R || (R = {})),
            function (e) {
                e[e.ECCM_CONTRAST = 1] = "ECCM_CONTRAST"
            }(I || (I = {})),
            function (e) {
                e[e.CFM_GENERAL = 1] = "CFM_GENERAL"
            }(v || (v = {})),
            function (e) {
                e[e.CCM_AUTO = 1] = "CCM_AUTO", e[e.CCM_GENERAL_HSV = 2] = "CCM_GENERAL_HSV", e[e.CCM_SKIP = 0] = "CCM_SKIP", e[e.CCM_REV = 2147483648] = "CCM_REV"
            }(A || (A = {})),
            function (e) {
                e[e.CICM_GENERAL = 1] = "CICM_GENERAL", e[e.CICM_SKIP = 0] = "CICM_SKIP", e[e.CICM_REV = 2147483648] = "CICM_REV"
            }(m || (m = {})),
            function (e) {
                e[e.CM_IGNORE = 1] = "CM_IGNORE", e[e.CM_OVERWRITE = 2] = "CM_OVERWRITE"
            }(p || (p = {})),
            function (e) {
                e[e.DM_SKIP = 0] = "DM_SKIP", e[e.DM_DIRECT_BINARIZATION = 1] = "DM_DIRECT_BINARIZATION", e[e.DM_THRESHOLD_BINARIZATION = 2] = "DM_THRESHOLD_BINARIZATION", e[e.DM_GRAY_EQUALIZATION = 4] = "DM_GRAY_EQUALIZATION", e[e.DM_SMOOTHING = 8] = "DM_SMOOTHING", e[e.DM_MORPHING = 16] = "DM_MORPHING", e[e.DM_DEEP_ANALYSIS = 32] = "DM_DEEP_ANALYSIS", e[e.DM_SHARPENING = 64] = "DM_SHARPENING"
            }(y || (y = {})),
            function (e) {
                e[e.DRM_AUTO = 1] = "DRM_AUTO", e[e.DRM_GENERAL = 2] = "DRM_GENERAL", e[e.DRM_SKIP = 0] = "DRM_SKIP", e[e.DRM_REV = 2147483648] = "DRM_REV"
            }(S || (S = {})),
            function (e) {
                e[e.DPMCRM_AUTO = 1] = "DPMCRM_AUTO", e[e.DPMCRM_GENERAL = 2] = "DPMCRM_GENERAL", e[e.DPMCRM_SKIP = 0] = "DPMCRM_SKIP", e[e.DPMCRM_REV = 2147483648] = "DPMCRM_REV"
            }(D || (D = {})),
            function (e) {
                e[e.GTM_INVERTED = 1] = "GTM_INVERTED", e[e.GTM_ORIGINAL = 2] = "GTM_ORIGINAL", e[e.GTM_SKIP = 0] = "GTM_SKIP", e[e.GTM_REV = 2147483648] = "GTM_REV"
            }(T || (T = {})),
            function (e) {
                e[e.IPM_AUTO = 1] = "IPM_AUTO", e[e.IPM_GENERAL = 2] = "IPM_GENERAL", e[e.IPM_GRAY_EQUALIZE = 4] = "IPM_GRAY_EQUALIZE", e[e.IPM_GRAY_SMOOTH = 8] = "IPM_GRAY_SMOOTH", e[e.IPM_SHARPEN_SMOOTH = 16] = "IPM_SHARPEN_SMOOTH", e[e.IPM_MORPHOLOGY = 32] = "IPM_MORPHOLOGY", e[e.IPM_SKIP = 0] = "IPM_SKIP", e[e.IPM_REV = 2147483648] = "IPM_REV"
            }(b || (b = {})),
            function (e) {
                e[e.IRSM_MEMORY = 1] = "IRSM_MEMORY", e[e.IRSM_FILESYSTEM = 2] = "IRSM_FILESYSTEM", e[e.IRSM_BOTH = 4] = "IRSM_BOTH"
            }(M || (M = {})),
            function (e) {
                e[e.IRT_NO_RESULT = 0] = "IRT_NO_RESULT", e[e.IRT_ORIGINAL_IMAGE = 1] = "IRT_ORIGINAL_IMAGE", e[e.IRT_COLOUR_CLUSTERED_IMAGE = 2] = "IRT_COLOUR_CLUSTERED_IMAGE", e[e.IRT_COLOUR_CONVERTED_GRAYSCALE_IMAGE = 4] = "IRT_COLOUR_CONVERTED_GRAYSCALE_IMAGE", e[e.IRT_TRANSFORMED_GRAYSCALE_IMAGE = 8] = "IRT_TRANSFORMED_GRAYSCALE_IMAGE", e[e.IRT_PREDETECTED_REGION = 16] = "IRT_PREDETECTED_REGION", e[e.IRT_PREPROCESSED_IMAGE = 32] = "IRT_PREPROCESSED_IMAGE", e[e.IRT_BINARIZED_IMAGE = 64] = "IRT_BINARIZED_IMAGE", e[e.IRT_TEXT_ZONE = 128] = "IRT_TEXT_ZONE", e[e.IRT_CONTOUR = 256] = "IRT_CONTOUR", e[e.IRT_LINE_SEGMENT = 512] = "IRT_LINE_SEGMENT", e[e.IRT_FORM = 1024] = "IRT_FORM", e[e.IRT_SEGMENTATION_BLOCK = 2048] = "IRT_SEGMENTATION_BLOCK", e[e.IRT_TYPED_BARCODE_ZONE = 4096] = "IRT_TYPED_BARCODE_ZONE", e[e.IRT_PREDETECTED_QUADRILATERAL = 8192] = "IRT_PREDETECTED_QUADRILATERAL"
            }(C || (C = {})),
            function (e) {
                e[e.LM_SKIP = 0] = "LM_SKIP", e[e.LM_AUTO = 1] = "LM_AUTO", e[e.LM_CONNECTED_BLOCKS = 2] = "LM_CONNECTED_BLOCKS", e[e.LM_LINES = 8] = "LM_LINES", e[e.LM_STATISTICS = 4] = "LM_STATISTICS", e[e.LM_SCAN_DIRECTLY = 16] = "LM_SCAN_DIRECTLY", e[e.LM_STATISTICS_MARKS = 32] = "LM_STATISTICS_MARKS", e[e.LM_STATISTICS_POSTAL_CODE = 64] = "LM_STATISTICS_POSTAL_CODE", e[e.LM_CENTRE = 128] = "LM_CENTRE", e[e.LM_REV = 2147483648] = "LM_REV"
            }(O || (O = {})),
            function (e) {
                e[e.PDFRM_RASTER = 1] = "PDFRM_RASTER", e[e.PDFRM_AUTO = 2] = "PDFRM_AUTO", e[e.PDFRM_VECTOR = 4] = "PDFRM_VECTOR", e[e.PDFRM_REV = 2147483648] = "PDFRM_REV"
            }(L || (L = {})),
            function (e) {
                e[e.QRECL_ERROR_CORRECTION_H = 0] = "QRECL_ERROR_CORRECTION_H", e[e.QRECL_ERROR_CORRECTION_L = 1] = "QRECL_ERROR_CORRECTION_L", e[e.QRECL_ERROR_CORRECTION_M = 2] = "QRECL_ERROR_CORRECTION_M", e[e.QRECL_ERROR_CORRECTION_Q = 3] = "QRECL_ERROR_CORRECTION_Q"
            }(N || (N = {})),
            function (e) {
                e[e.RPM_AUTO = 1] = "RPM_AUTO", e[e.RPM_GENERAL = 2] = "RPM_GENERAL", e[e.RPM_GENERAL_RGB_CONTRAST = 4] = "RPM_GENERAL_RGB_CONTRAST", e[e.RPM_GENERAL_GRAY_CONTRAST = 8] = "RPM_GENERAL_GRAY_CONTRAST", e[e.RPM_GENERAL_HSV_CONTRAST = 16] = "RPM_GENERAL_HSV_CONTRAST", e[e.RPM_SKIP = 0] = "RPM_SKIP", e[e.RPM_REV = 2147483648] = "RPM_REV"
            }(B || (B = {})),
            function (e) {
                e[e.RCT_PIXEL = 1] = "RCT_PIXEL", e[e.RCT_PERCENTAGE = 2] = "RCT_PERCENTAGE"
            }(P || (P = {})),
            function (e) {
                e[e.RT_STANDARD_TEXT = 0] = "RT_STANDARD_TEXT", e[e.RT_RAW_TEXT = 1] = "RT_RAW_TEXT", e[e.RT_CANDIDATE_TEXT = 2] = "RT_CANDIDATE_TEXT", e[e.RT_PARTIAL_TEXT = 3] = "RT_PARTIAL_TEXT"
            }(w || (w = {})),
            function (e) {
                e[e.SUM_AUTO = 1] = "SUM_AUTO", e[e.SUM_LINEAR_INTERPOLATION = 2] = "SUM_LINEAR_INTERPOLATION", e[e.SUM_NEAREST_NEIGHBOUR_INTERPOLATION = 4] = "SUM_NEAREST_NEIGHBOUR_INTERPOLATION", e[e.SUM_SKIP = 0] = "SUM_SKIP", e[e.SUM_REV = 2147483648] = "SUM_REV"
            }(F || (F = {})),
            function (e) {
                e[e.TP_REGION_PREDETECTED = 1] = "TP_REGION_PREDETECTED", e[e.TP_IMAGE_PREPROCESSED = 2] = "TP_IMAGE_PREPROCESSED", e[e.TP_IMAGE_BINARIZED = 4] = "TP_IMAGE_BINARIZED", e[e.TP_BARCODE_LOCALIZED = 8] = "TP_BARCODE_LOCALIZED", e[e.TP_BARCODE_TYPE_DETERMINED = 16] = "TP_BARCODE_TYPE_DETERMINED", e[e.TP_BARCODE_RECOGNIZED = 32] = "TP_BARCODE_RECOGNIZED"
            }(U || (U = {})),
            function (e) {
                e[e.TACM_AUTO = 1] = "TACM_AUTO", e[e.TACM_VERIFYING = 2] = "TACM_VERIFYING", e[e.TACM_VERIFYING_PATCHING = 4] = "TACM_VERIFYING_PATCHING", e[e.TACM_SKIP = 0] = "TACM_SKIP", e[e.TACM_REV = 2147483648] = "TACM_REV"
            }(k || (k = {})),
            function (e) {
                e[e.TFM_AUTO = 1] = "TFM_AUTO", e[e.TFM_GENERAL_CONTOUR = 2] = "TFM_GENERAL_CONTOUR", e[e.TFM_SKIP = 0] = "TFM_SKIP", e[e.TFM_REV = 2147483648] = "TFM_REV"
            }(x || (x = {})),
            function (e) {
                e[e.TROM_CONFIDENCE = 1] = "TROM_CONFIDENCE", e[e.TROM_POSITION = 2] = "TROM_POSITION", e[e.TROM_FORMAT = 4] = "TROM_FORMAT", e[e.TROM_SKIP = 0] = "TROM_SKIP", e[e.TROM_REV = 2147483648] = "TROM_REV"
            }(V || (V = {})),
            function (e) {
                e[e.TDM_AUTO = 1] = "TDM_AUTO", e[e.TDM_GENERAL_WIDTH_CONCENTRATION = 2] = "TDM_GENERAL_WIDTH_CONCENTRATION", e[e.TDM_SKIP = 0] = "TDM_SKIP", e[e.TDM_REV = 2147483648] = "TDM_REV"
            }(G || (G = {})),
            function (e) {
                e.DM_LM_ONED = "1", e.DM_LM_QR_CODE = "2", e.DM_LM_PDF417 = "3", e.DM_LM_DATAMATRIX = "4", e.DM_LM_AZTEC = "5", e.DM_LM_MAXICODE = "6", e.DM_LM_PATCHCODE = "7", e.DM_LM_GS1_DATABAR = "8", e.DM_LM_GS1_COMPOSITE = "9", e.DM_LM_POSTALCODE = "10", e.DM_LM_DOTCODE = "11", e.DM_LM_INTERMEDIATE_RESULT = "12", e.DM_LM_DPM = "13", e.DM_LM_NONSTANDARD_BARCODE = "16"
            }(W || (W = {})),
            function (e) {
                e.DM_CW_AUTO = "", e.DM_CW_DEVICE_COUNT = "DeviceCount", e.DM_CW_SCAN_COUNT = "ScanCount", e.DM_CW_CONCURRENT_DEVICE_COUNT = "ConcurrentDeviceCount", e.DM_CW_APP_DOMIAN_COUNT = "Domain", e.DM_CW_ACTIVE_DEVICE_COUNT = "ActiveDeviceCount", e.DM_CW_INSTANCE_COUNT = "InstanceCount", e.DM_CW_CONCURRENT_INSTANCE_COUNT = "ConcurrentInstanceCount"
            }(j || (j = {}));
        const H = {
            BarcodeReader: c,
            BarcodeScanner: h,
            EnumBarcodeColourMode: f,
            EnumBarcodeComplementMode: g,
            EnumBarcodeFormat: s,
            EnumBarcodeFormat_2: E,
            EnumBinarizationMode: R,
            EnumClarityCalculationMethod: I,
            EnumClarityFilterMode: v,
            EnumColourClusteringMode: A,
            EnumColourConversionMode: m,
            EnumConflictMode: p,
            EnumDeblurMode: y,
            EnumDeformationResistingMode: S,
            EnumDPMCodeReadingMode: D,
            EnumErrorCode: i,
            EnumGrayscaleTransformationMode: T,
            EnumImagePixelFormat: r,
            EnumImagePreprocessingMode: b,
            EnumIMResultDataType: o,
            EnumIntermediateResultSavingMode: M,
            EnumIntermediateResultType: C,
            EnumLocalizationMode: O,
            EnumPDFReadingMode: L,
            EnumQRCodeErrorCorrectionLevel: N,
            EnumRegionPredetectionMode: B,
            EnumResultCoordinateType: P,
            EnumResultType: w,
            EnumScaleUpMode: F,
            EnumTerminatePhase: U,
            EnumTextAssistedCorrectionMode: k,
            EnumTextFilterMode: x,
            EnumTextResultOrderMode: V,
            EnumTextureDetectionMode: G,
            EnumLicenseModule: W,
            EnumChargeWay: j
        };
        t.default = H
    }])
}));
const DBR = {}; {
    let _dbr;
    if (typeof dbr == "object") {
        _dbr = dbr;
    } else if (typeof exports == "object" && exports.dbr) {
        _dbr = exports.dbr;
    } else if (typeof module == "object" && module.exports && module.exports.dbr) {
        _dbr = module.exports.dbr;
    }
    for (let key in _dbr) {
        DBR[key] = _dbr[key];
    }
}
export default DBR;
export const BarcodeReader = DBR.BarcodeReader;
export const BarcodeScanner = DBR.BarcodeScanner;
export const EnumBarcodeColourMode = DBR.EnumBarcodeColourMode;
export const EnumBarcodeComplementMode = DBR.EnumBarcodeComplementMode;
export const EnumBarcodeFormat = DBR.EnumBarcodeFormat;
export const EnumBarcodeFormat_2 = DBR.EnumBarcodeFormat_2;
export const EnumBinarizationMode = DBR.EnumBinarizationMode;
export const EnumClarityCalculationMethod = DBR.EnumClarityCalculationMethod;
export const EnumClarityFilterMode = DBR.EnumClarityFilterMode;
export const EnumColourClusteringMode = DBR.EnumColourClusteringMode;
export const EnumColourConversionMode = DBR.EnumColourConversionMode;
export const EnumConflictMode = DBR.EnumConflictMode;
export const EnumDeblurMode = DBR.EnumDeblurMode;
export const EnumDeformationResistingMode = DBR.EnumDeformationResistingMode;
export const EnumDPMCodeReadingMode = DBR.EnumDPMCodeReadingMode;
export const EnumErrorCode = DBR.EnumErrorCode;
export const EnumGrayscaleTransformationMode = DBR.EnumGrayscaleTransformationMode;
export const EnumImagePixelFormat = DBR.EnumImagePixelFormat;
export const EnumImagePreprocessingMode = DBR.EnumImagePreprocessingMode;
export const EnumIMResultDataType = DBR.EnumIMResultDataType;
export const EnumIntermediateResultSavingMode = DBR.EnumIntermediateResultSavingMode;
export const EnumIntermediateResultType = DBR.EnumIntermediateResultType;
export const EnumLocalizationMode = DBR.EnumLocalizationMode;
export const EnumPDFReadingMode = DBR.EnumPDFReadingMode;
export const EnumQRCodeErrorCorrectionLevel = DBR.EnumQRCodeErrorCorrectionLevel;
export const EnumRegionPredetectionMode = DBR.EnumRegionPredetectionMode;
export const EnumResultCoordinateType = DBR.EnumResultCoordinateType;
export const EnumResultType = DBR.EnumResultType;
export const EnumScaleUpMode = DBR.EnumScaleUpMode;
export const EnumTerminatePhase = DBR.EnumTerminatePhase;
export const EnumTextAssistedCorrectionMode = DBR.EnumTextAssistedCorrectionMode;
export const EnumTextFilterMode = DBR.EnumTextFilterMode;
export const EnumTextResultOrderMode = DBR.EnumTextResultOrderMode;
export const EnumTextureDetectionMode = DBR.EnumTextureDetectionMode;
export const EnumLicenseModule = DBR.EnumLicenseModule;
export const EnumChargeWay = DBR.EnumChargeWay;
