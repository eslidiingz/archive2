"use strict";

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

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
!function (e, t) {
  var bNode = !!((typeof global === "undefined" ? "undefined" : _typeof(global)) == "object" && global.process && global.process.release && global.process.release.name);
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) ? module.exports = !bNode ? t() : t(require("worker_threads"), require("https"), require("http"), require("fs"), require("os")) : "function" == typeof define && define.amd ? define(t) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? exports.dbr = !bNode ? t() : t(require("worker_threads"), require("https"), require("http"), require("fs"), require("os")) : e.dbr = t(e.worker_threads, e.https, e.http, e.fs, e.os);
}("object" == (typeof window === "undefined" ? "undefined" : _typeof(window)) ? window : global, function (e, t, n, r, i) {
  return function (e) {
    var t = {};

    function n(r) {
      if (t[r]) return t[r].exports;
      var i = t[r] = {
        i: r,
        l: !1,
        exports: {}
      };
      return e[r].call(i.exports, i, i.exports, n), i.l = !0, i.exports;
    }

    return n.m = e, n.c = t, n.d = function (e, t, r) {
      n.o(e, t) || Object.defineProperty(e, t, {
        enumerable: !0,
        get: r
      });
    }, n.r = function (e) {
      "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
        value: "Module"
      }), Object.defineProperty(e, "__esModule", {
        value: !0
      });
    }, n.t = function (e, t) {
      if (1 & t && (e = n(e)), 8 & t) return e;
      if (4 & t && "object" == _typeof(e) && e && e.__esModule) return e;
      var r = Object.create(null);
      if (n.r(r), Object.defineProperty(r, "default", {
        enumerable: !0,
        value: e
      }), 2 & t && "string" != typeof e) for (var i in e) {
        n.d(r, i, function (t) {
          return e[t];
        }.bind(null, i));
      }
      return r;
    }, n.n = function (e) {
      var t = e && e.__esModule ? function () {
        return e["default"];
      } : function () {
        return e;
      };
      return n.d(t, "a", t), t;
    }, n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }, n.p = "", n(n.s = 6);
  }([function (e, t, n) {
    e.exports = function e(t, n, r) {
      function i(s, a) {
        if (!n[s]) {
          if (!t[s]) {
            if (o) return o(s, !0);
            var d = new Error("Cannot find module '" + s + "'");
            throw d.code = "MODULE_NOT_FOUND", d;
          }

          var l = n[s] = {
            exports: {}
          };
          t[s][0].call(l.exports, function (e) {
            var n = t[s][1][e];
            return i(n || e);
          }, l, l.exports, e, t, n, r);
        }

        return n[s].exports;
      }

      for (var o = !1, s = 0; s < r.length; s++) {
        i(r[s]);
      }

      return i;
    }({
      1: [function (e, t, n) {
        (function (e) {
          "use strict";

          var n,
              r,
              i = e.MutationObserver || e.WebKitMutationObserver;

          if (i) {
            var o = 0,
                s = new i(c),
                a = e.document.createTextNode("");
            s.observe(a, {
              characterData: !0
            }), n = function n() {
              a.data = o = ++o % 2;
            };
          } else if (e.setImmediate || void 0 === e.MessageChannel) n = "document" in e && "onreadystatechange" in e.document.createElement("script") ? function () {
            var t = e.document.createElement("script");
            t.onreadystatechange = function () {
              c(), t.onreadystatechange = null, t.parentNode.removeChild(t), t = null;
            }, e.document.documentElement.appendChild(t);
          } : function () {
            setTimeout(c, 0);
          };else {
            var d = new e.MessageChannel();
            d.port1.onmessage = c, n = function n() {
              d.port2.postMessage(0);
            };
          }

          var l = [];

          function c() {
            var e, t;
            r = !0;

            for (var n = l.length; n;) {
              for (t = l, l = [], e = -1; ++e < n;) {
                t[e]();
              }

              n = l.length;
            }

            r = !1;
          }

          t.exports = function (e) {
            1 !== l.push(e) || r || n();
          };
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {});
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
          this.state = d, this.queue = [], this.outcome = void 0, e !== i && h(this, e);
        }

        function c(e, t, n) {
          this.promise = e, "function" == typeof t && (this.onFulfilled = t, this.callFulfilled = this.otherCallFulfilled), "function" == typeof n && (this.onRejected = n, this.callRejected = this.otherCallRejected);
        }

        function u(e, t, n) {
          r(function () {
            var r;

            try {
              r = t(n);
            } catch (t) {
              return o.reject(e, t);
            }

            r === e ? o.reject(e, new TypeError("Cannot resolve promise with itself")) : o.resolve(e, r);
          });
        }

        function _(e) {
          var t = e && e.then;
          if (e && ("object" == _typeof(e) || "function" == typeof e) && "function" == typeof t) return function () {
            t.apply(e, arguments);
          };
        }

        function h(e, t) {
          var n = !1;

          function r(t) {
            n || (n = !0, o.reject(e, t));
          }

          function i(t) {
            n || (n = !0, o.resolve(e, t));
          }

          var s = f(function () {
            t(i, r);
          });
          "error" === s.status && r(s.value);
        }

        function f(e, t) {
          var n = {};

          try {
            n.value = e(t), n.status = "success";
          } catch (e) {
            n.status = "error", n.value = e;
          }

          return n;
        }

        t.exports = l, l.prototype["catch"] = function (e) {
          return this.then(null, e);
        }, l.prototype.then = function (e, t) {
          if ("function" != typeof e && this.state === a || "function" != typeof t && this.state === s) return this;
          var n = new this.constructor(i);
          return this.state !== d ? u(n, this.state === a ? e : t, this.outcome) : this.queue.push(new c(n, e, t)), n;
        }, c.prototype.callFulfilled = function (e) {
          o.resolve(this.promise, e);
        }, c.prototype.otherCallFulfilled = function (e) {
          u(this.promise, this.onFulfilled, e);
        }, c.prototype.callRejected = function (e) {
          o.reject(this.promise, e);
        }, c.prototype.otherCallRejected = function (e) {
          u(this.promise, this.onRejected, e);
        }, o.resolve = function (e, t) {
          var n = f(_, t);
          if ("error" === n.status) return o.reject(e, n.value);
          var r = n.value;
          if (r) h(e, r);else {
            e.state = a, e.outcome = t;

            for (var i = -1, s = e.queue.length; ++i < s;) {
              e.queue[i].callFulfilled(t);
            }
          }
          return e;
        }, o.reject = function (e, t) {
          e.state = s, e.outcome = t;

          for (var n = -1, r = e.queue.length; ++n < r;) {
            e.queue[n].callRejected(t);
          }

          return e;
        }, l.resolve = function (e) {
          return e instanceof this ? e : o.resolve(new this(i), e);
        }, l.reject = function (e) {
          var t = new this(i);
          return o.reject(t, e);
        }, l.all = function (e) {
          var t = this;
          if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
          var n = e.length,
              r = !1;
          if (!n) return this.resolve([]);

          for (var s = new Array(n), a = 0, d = -1, l = new this(i); ++d < n;) {
            c(e[d], d);
          }

          return l;

          function c(e, i) {
            t.resolve(e).then(function (e) {
              s[i] = e, ++a !== n || r || (r = !0, o.resolve(l, s));
            }, function (e) {
              r || (r = !0, o.reject(l, e));
            });
          }
        }, l.race = function (e) {
          var t = this;
          if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
          var n = e.length,
              r = !1;
          if (!n) return this.resolve([]);

          for (var s, a = -1, d = new this(i); ++a < n;) {
            s = e[a], t.resolve(s).then(function (e) {
              r || (r = !0, o.resolve(d, e));
            }, function (e) {
              r || (r = !0, o.reject(d, e));
            });
          }

          return d;
        };
      }, {
        1: 1
      }],
      3: [function (e, t, n) {
        (function (t) {
          "use strict";

          "function" != typeof t.Promise && (t.Promise = e(2));
        }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {});
      }, {
        2: 2
      }],
      4: [function (e, t, n) {
        "use strict";

        var r = "function" == typeof Symbol && "symbol" == _typeof(Symbol.iterator) ? function (e) {
          return _typeof(e);
        } : function (e) {
          return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof(e);
        },
            i = function () {
          try {
            if ("undefined" != typeof indexedDB) return indexedDB;
            if ("undefined" != typeof webkitIndexedDB) return webkitIndexedDB;
            if ("undefined" != typeof mozIndexedDB) return mozIndexedDB;
            if ("undefined" != typeof OIndexedDB) return OIndexedDB;
            if ("undefined" != typeof msIndexedDB) return msIndexedDB;
          } catch (e) {
            return;
          }
        }();

        function o(e, t) {
          e = e || [], t = t || {};

          try {
            return new Blob(e, t);
          } catch (i) {
            if ("TypeError" !== i.name) throw i;

            for (var n = new ("undefined" != typeof BlobBuilder ? BlobBuilder : "undefined" != typeof MSBlobBuilder ? MSBlobBuilder : "undefined" != typeof MozBlobBuilder ? MozBlobBuilder : WebKitBlobBuilder)(), r = 0; r < e.length; r += 1) {
              n.append(e[r]);
            }

            return n.getBlob(t.type);
          }
        }

        "undefined" == typeof Promise && e(3);
        var s = Promise;

        function a(e, t) {
          t && e.then(function (e) {
            t(null, e);
          }, function (e) {
            t(e);
          });
        }

        function d(e, t, n) {
          "function" == typeof t && e.then(t), "function" == typeof n && e["catch"](n);
        }

        function l(e) {
          return "string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e)), e;
        }

        function c() {
          if (arguments.length && "function" == typeof arguments[arguments.length - 1]) return arguments[arguments.length - 1];
        }

        var u = void 0,
            _ = {},
            h = Object.prototype.toString;

        function f(e) {
          return "boolean" == typeof u ? s.resolve(u) : function (e) {
            return new s(function (t) {
              var n = e.transaction("local-forage-detect-blob-support", "readwrite"),
                  r = o([""]);
              n.objectStore("local-forage-detect-blob-support").put(r, "key"), n.onabort = function (e) {
                e.preventDefault(), e.stopPropagation(), t(!1);
              }, n.oncomplete = function () {
                var e = navigator.userAgent.match(/Chrome\/(\d+)/),
                    n = navigator.userAgent.match(/Edge\//);
                t(n || !e || parseInt(e[1], 10) >= 43);
              };
            })["catch"](function () {
              return !1;
            });
          }(e).then(function (e) {
            return u = e;
          });
        }

        function g(e) {
          var t = _[e.name],
              n = {};
          n.promise = new s(function (e, t) {
            n.resolve = e, n.reject = t;
          }), t.deferredOperations.push(n), t.dbReady ? t.dbReady = t.dbReady.then(function () {
            return n.promise;
          }) : t.dbReady = n.promise;
        }

        function E(e) {
          var t = _[e.name].deferredOperations.pop();

          if (t) return t.resolve(), t.promise;
        }

        function R(e, t) {
          var n = _[e.name].deferredOperations.pop();

          if (n) return n.reject(t), n.promise;
        }

        function I(e, t) {
          return new s(function (n, r) {
            if (_[e.name] = _[e.name] || {
              forages: [],
              db: null,
              dbReady: null,
              deferredOperations: []
            }, e.db) {
              if (!t) return n(e.db);
              g(e), e.db.close();
            }

            var o = [e.name];
            t && o.push(e.version);
            var s = i.open.apply(i, o);
            t && (s.onupgradeneeded = function (t) {
              var n = s.result;

              try {
                n.createObjectStore(e.storeName), t.oldVersion <= 1 && n.createObjectStore("local-forage-detect-blob-support");
              } catch (n) {
                if ("ConstraintError" !== n.name) throw n;
                console.warn('The database "' + e.name + '" has been upgraded from version ' + t.oldVersion + " to version " + t.newVersion + ', but the storage "' + e.storeName + '" already exists.');
              }
            }), s.onerror = function (e) {
              e.preventDefault(), r(s.error);
            }, s.onsuccess = function () {
              n(s.result), E(e);
            };
          });
        }

        function v(e) {
          return I(e, !1);
        }

        function A(e) {
          return I(e, !0);
        }

        function m(e, t) {
          if (!e.db) return !0;
          var n = !e.db.objectStoreNames.contains(e.storeName),
              r = e.version < e.db.version,
              i = e.version > e.db.version;

          if (r && (e.version !== t && console.warn('The database "' + e.name + "\" can't be downgraded from version " + e.db.version + " to version " + e.version + "."), e.version = e.db.version), i || n) {
            if (n) {
              var o = e.db.version + 1;
              o > e.version && (e.version = o);
            }

            return !0;
          }

          return !1;
        }

        function p(e) {
          return o([function (e) {
            for (var t = e.length, n = new ArrayBuffer(t), r = new Uint8Array(n), i = 0; i < t; i++) {
              r[i] = e.charCodeAt(i);
            }

            return n;
          }(atob(e.data))], {
            type: e.type
          });
        }

        function y(e) {
          return e && e.__local_forage_encoded_blob;
        }

        function S(e) {
          var t = this,
              n = t._initReady().then(function () {
            var e = _[t._dbInfo.name];
            if (e && e.dbReady) return e.dbReady;
          });

          return d(n, e, e), n;
        }

        function D(e, t, n, r) {
          void 0 === r && (r = 1);

          try {
            var i = e.db.transaction(e.storeName, t);
            n(null, i);
          } catch (i) {
            if (r > 0 && (!e.db || "InvalidStateError" === i.name || "NotFoundError" === i.name)) return s.resolve().then(function () {
              if (!e.db || "NotFoundError" === i.name && !e.db.objectStoreNames.contains(e.storeName) && e.version <= e.db.version) return e.db && (e.version = e.db.version + 1), A(e);
            }).then(function () {
              return function (e) {
                g(e);

                for (var t = _[e.name], n = t.forages, r = 0; r < n.length; r++) {
                  var i = n[r];
                  i._dbInfo.db && (i._dbInfo.db.close(), i._dbInfo.db = null);
                }

                return e.db = null, v(e).then(function (t) {
                  return e.db = t, m(e) ? A(e) : t;
                }).then(function (r) {
                  e.db = t.db = r;

                  for (var i = 0; i < n.length; i++) {
                    n[i]._dbInfo.db = r;
                  }
                })["catch"](function (t) {
                  throw R(e, t), t;
                });
              }(e).then(function () {
                D(e, t, n, r - 1);
              });
            })["catch"](n);
            n(i);
          }
        }

        var T = {
          _driver: "asyncStorage",
          _initStorage: function _initStorage(e) {
            var t = this,
                n = {
              db: null
            };
            if (e) for (var r in e) {
              n[r] = e[r];
            }
            var i = _[n.name];
            i || (i = {
              forages: [],
              db: null,
              dbReady: null,
              deferredOperations: []
            }, _[n.name] = i), i.forages.push(t), t._initReady || (t._initReady = t.ready, t.ready = S);
            var o = [];

            function a() {
              return s.resolve();
            }

            for (var d = 0; d < i.forages.length; d++) {
              var l = i.forages[d];
              l !== t && o.push(l._initReady()["catch"](a));
            }

            var c = i.forages.slice(0);
            return s.all(o).then(function () {
              return n.db = i.db, v(n);
            }).then(function (e) {
              return n.db = e, m(n, t._defaultConfig.version) ? A(n) : e;
            }).then(function (e) {
              n.db = i.db = e, t._dbInfo = n;

              for (var r = 0; r < c.length; r++) {
                var o = c[r];
                o !== t && (o._dbInfo.db = n.db, o._dbInfo.version = n.version);
              }
            });
          },
          _support: function () {
            try {
              if (!i) return !1;
              var e = "undefined" != typeof openDatabase && /(Safari|iPhone|iPad|iPod)/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) && !/BlackBerry/.test(navigator.platform),
                  t = "function" == typeof fetch && -1 !== fetch.toString().indexOf("[native code");
              return (!e || t) && "undefined" != typeof indexedDB && "undefined" != typeof IDBKeyRange;
            } catch (e) {
              return !1;
            }
          }(),
          iterate: function iterate(e, t) {
            var n = this,
                r = new s(function (t, r) {
              n.ready().then(function () {
                D(n._dbInfo, "readonly", function (i, o) {
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
                        void 0 !== i ? t(i) : n["continue"]();
                      } else t();
                    }, s.onerror = function () {
                      r(s.error);
                    };
                  } catch (e) {
                    r(e);
                  }
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          getItem: function getItem(e, t) {
            var n = this;
            e = l(e);
            var r = new s(function (t, r) {
              n.ready().then(function () {
                D(n._dbInfo, "readonly", function (i, o) {
                  if (i) return r(i);

                  try {
                    var s = o.objectStore(n._dbInfo.storeName).get(e);
                    s.onsuccess = function () {
                      var e = s.result;
                      void 0 === e && (e = null), y(e) && (e = p(e)), t(e);
                    }, s.onerror = function () {
                      r(s.error);
                    };
                  } catch (e) {
                    r(e);
                  }
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          setItem: function setItem(e, t, n) {
            var r = this;
            e = l(e);
            var i = new s(function (n, i) {
              var o;
              r.ready().then(function () {
                return o = r._dbInfo, "[object Blob]" === h.call(t) ? f(o.db).then(function (e) {
                  return e ? t : (n = t, new s(function (e, t) {
                    var r = new FileReader();
                    r.onerror = t, r.onloadend = function (t) {
                      var r = btoa(t.target.result || "");
                      e({
                        __local_forage_encoded_blob: !0,
                        data: r,
                        type: n.type
                      });
                    }, r.readAsBinaryString(n);
                  }));
                  var n;
                }) : t;
              }).then(function (t) {
                D(r._dbInfo, "readwrite", function (o, s) {
                  if (o) return i(o);

                  try {
                    var a = s.objectStore(r._dbInfo.storeName);
                    null === t && (t = void 0);
                    var d = a.put(t, e);
                    s.oncomplete = function () {
                      void 0 === t && (t = null), n(t);
                    }, s.onabort = s.onerror = function () {
                      var e = d.error ? d.error : d.transaction.error;
                      i(e);
                    };
                  } catch (e) {
                    i(e);
                  }
                });
              })["catch"](i);
            });
            return a(i, n), i;
          },
          removeItem: function removeItem(e, t) {
            var n = this;
            e = l(e);
            var r = new s(function (t, r) {
              n.ready().then(function () {
                D(n._dbInfo, "readwrite", function (i, o) {
                  if (i) return r(i);

                  try {
                    var s = o.objectStore(n._dbInfo.storeName)["delete"](e);
                    o.oncomplete = function () {
                      t();
                    }, o.onerror = function () {
                      r(s.error);
                    }, o.onabort = function () {
                      var e = s.error ? s.error : s.transaction.error;
                      r(e);
                    };
                  } catch (e) {
                    r(e);
                  }
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          clear: function clear(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                D(t._dbInfo, "readwrite", function (r, i) {
                  if (r) return n(r);

                  try {
                    var o = i.objectStore(t._dbInfo.storeName).clear();
                    i.oncomplete = function () {
                      e();
                    }, i.onabort = i.onerror = function () {
                      var e = o.error ? o.error : o.transaction.error;
                      n(e);
                    };
                  } catch (e) {
                    n(e);
                  }
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          length: function length(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                D(t._dbInfo, "readonly", function (r, i) {
                  if (r) return n(r);

                  try {
                    var o = i.objectStore(t._dbInfo.storeName).count();
                    o.onsuccess = function () {
                      e(o.result);
                    }, o.onerror = function () {
                      n(o.error);
                    };
                  } catch (e) {
                    n(e);
                  }
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          key: function key(e, t) {
            var n = this,
                r = new s(function (t, r) {
              e < 0 ? t(null) : n.ready().then(function () {
                D(n._dbInfo, "readonly", function (i, o) {
                  if (i) return r(i);

                  try {
                    var s = o.objectStore(n._dbInfo.storeName),
                        a = !1,
                        d = s.openCursor();
                    d.onsuccess = function () {
                      var n = d.result;
                      n ? 0 === e || a ? t(n.key) : (a = !0, n.advance(e)) : t(null);
                    }, d.onerror = function () {
                      r(d.error);
                    };
                  } catch (e) {
                    r(e);
                  }
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          keys: function keys(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                D(t._dbInfo, "readonly", function (r, i) {
                  if (r) return n(r);

                  try {
                    var o = i.objectStore(t._dbInfo.storeName).openCursor(),
                        s = [];
                    o.onsuccess = function () {
                      var t = o.result;
                      t ? (s.push(t.key), t["continue"]()) : e(s);
                    }, o.onerror = function () {
                      n(o.error);
                    };
                  } catch (e) {
                    n(e);
                  }
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          dropInstance: function dropInstance(e, t) {
            t = c.apply(this, arguments);
            var n = this.config();
            (e = "function" != typeof e && e || {}).name || (e.name = e.name || n.name, e.storeName = e.storeName || n.storeName);
            var r,
                o = this;

            if (e.name) {
              var d = e.name === n.name && o._dbInfo.db,
                  l = d ? s.resolve(o._dbInfo.db) : v(e).then(function (t) {
                var n = _[e.name],
                    r = n.forages;
                n.db = t;

                for (var i = 0; i < r.length; i++) {
                  r[i]._dbInfo.db = t;
                }

                return t;
              });
              r = e.storeName ? l.then(function (t) {
                if (t.objectStoreNames.contains(e.storeName)) {
                  var n = t.version + 1;
                  g(e);
                  var r = _[e.name],
                      o = r.forages;
                  t.close();

                  for (var a = 0; a < o.length; a++) {
                    var d = o[a];
                    d._dbInfo.db = null, d._dbInfo.version = n;
                  }

                  return new s(function (t, r) {
                    var o = i.open(e.name, n);
                    o.onerror = function (e) {
                      o.result.close(), r(e);
                    }, o.onupgradeneeded = function () {
                      o.result.deleteObjectStore(e.storeName);
                    }, o.onsuccess = function () {
                      var e = o.result;
                      e.close(), t(e);
                    };
                  }).then(function (e) {
                    r.db = e;

                    for (var t = 0; t < o.length; t++) {
                      var n = o[t];
                      n._dbInfo.db = e, E(n._dbInfo);
                    }
                  })["catch"](function (t) {
                    throw (R(e, t) || s.resolve())["catch"](function () {}), t;
                  });
                }
              }) : l.then(function (t) {
                g(e);
                var n = _[e.name],
                    r = n.forages;
                t.close();

                for (var o = 0; o < r.length; o++) {
                  r[o]._dbInfo.db = null;
                }

                return new s(function (t, n) {
                  var r = i.deleteDatabase(e.name);
                  r.onerror = r.onblocked = function (e) {
                    var t = r.result;
                    t && t.close(), n(e);
                  }, r.onsuccess = function () {
                    var e = r.result;
                    e && e.close(), t(e);
                  };
                }).then(function (e) {
                  n.db = e;

                  for (var t = 0; t < r.length; t++) {
                    E(r[t]._dbInfo);
                  }
                })["catch"](function (t) {
                  throw (R(e, t) || s.resolve())["catch"](function () {}), t;
                });
              });
            } else r = s.reject("Invalid arguments");

            return a(r, t), r;
          }
        },
            b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
            M = /^~~local_forage_type~([^~]+)~/,
            C = "__lfsc__:".length,
            O = C + "arbf".length,
            L = Object.prototype.toString;

        function N(e) {
          var t,
              n,
              r,
              i,
              o,
              s = .75 * e.length,
              a = e.length,
              d = 0;
          "=" === e[e.length - 1] && (s--, "=" === e[e.length - 2] && s--);
          var l = new ArrayBuffer(s),
              c = new Uint8Array(l);

          for (t = 0; t < a; t += 4) {
            n = b.indexOf(e[t]), r = b.indexOf(e[t + 1]), i = b.indexOf(e[t + 2]), o = b.indexOf(e[t + 3]), c[d++] = n << 2 | r >> 4, c[d++] = (15 & r) << 4 | i >> 2, c[d++] = (3 & i) << 6 | 63 & o;
          }

          return l;
        }

        function B(e) {
          var t,
              n = new Uint8Array(e),
              r = "";

          for (t = 0; t < n.length; t += 3) {
            r += b[n[t] >> 2], r += b[(3 & n[t]) << 4 | n[t + 1] >> 4], r += b[(15 & n[t + 1]) << 2 | n[t + 2] >> 6], r += b[63 & n[t + 2]];
          }

          return n.length % 3 == 2 ? r = r.substring(0, r.length - 1) + "=" : n.length % 3 == 1 && (r = r.substring(0, r.length - 2) + "=="), r;
        }

        var P = {
          serialize: function serialize(e, t) {
            var n = "";

            if (e && (n = L.call(e)), e && ("[object ArrayBuffer]" === n || e.buffer && "[object ArrayBuffer]" === L.call(e.buffer))) {
              var r,
                  i = "__lfsc__:";
              e instanceof ArrayBuffer ? (r = e, i += "arbf") : (r = e.buffer, "[object Int8Array]" === n ? i += "si08" : "[object Uint8Array]" === n ? i += "ui08" : "[object Uint8ClampedArray]" === n ? i += "uic8" : "[object Int16Array]" === n ? i += "si16" : "[object Uint16Array]" === n ? i += "ur16" : "[object Int32Array]" === n ? i += "si32" : "[object Uint32Array]" === n ? i += "ui32" : "[object Float32Array]" === n ? i += "fl32" : "[object Float64Array]" === n ? i += "fl64" : t(new Error("Failed to get type for BinaryArray"))), t(i + B(r));
            } else if ("[object Blob]" === n) {
              var o = new FileReader();
              o.onload = function () {
                var n = "~~local_forage_type~" + e.type + "~" + B(this.result);
                t("__lfsc__:blob" + n);
              }, o.readAsArrayBuffer(e);
            } else try {
              t(JSON.stringify(e));
            } catch (n) {
              console.error("Couldn't convert value into a JSON string: ", e), t(null, n);
            }
          },
          deserialize: function deserialize(e) {
            if ("__lfsc__:" !== e.substring(0, C)) return JSON.parse(e);
            var t,
                n = e.substring(O),
                r = e.substring(C, O);

            if ("blob" === r && M.test(n)) {
              var i = n.match(M);
              t = i[1], n = n.substring(i[0].length);
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
                throw new Error("Unkown type: " + r);
            }
          },
          stringToBuffer: N,
          bufferToString: B
        };

        function w(e, t, n, r) {
          e.executeSql("CREATE TABLE IF NOT EXISTS " + t.storeName + " (id INTEGER PRIMARY KEY, key unique, value)", [], n, r);
        }

        function F(e, t, n, r, i, o) {
          e.executeSql(n, r, i, function (e, s) {
            s.code === s.SYNTAX_ERR ? e.executeSql("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", [t.storeName], function (e, a) {
              a.rows.length ? o(e, s) : w(e, t, function () {
                e.executeSql(n, r, i, o);
              }, o);
            }, o) : o(e, s);
          }, o);
        }

        function U(e, t, n, r) {
          var i = this;
          e = l(e);
          var o = new s(function (o, s) {
            i.ready().then(function () {
              void 0 === t && (t = null);
              var a = t,
                  d = i._dbInfo;
              d.serializer.serialize(t, function (t, l) {
                l ? s(l) : d.db.transaction(function (n) {
                  F(n, d, "INSERT OR REPLACE INTO " + d.storeName + " (key, value) VALUES (?, ?)", [e, t], function () {
                    o(a);
                  }, function (e, t) {
                    s(t);
                  });
                }, function (t) {
                  if (t.code === t.QUOTA_ERR) {
                    if (r > 0) return void o(U.apply(i, [e, a, n, r - 1]));
                    s(t);
                  }
                });
              });
            })["catch"](s);
          });
          return a(o, n), o;
        }

        function k(e) {
          return new s(function (t, n) {
            e.transaction(function (r) {
              r.executeSql("SELECT name FROM sqlite_master WHERE type='table' AND name <> '__WebKitDatabaseInfoTable__'", [], function (n, r) {
                for (var i = [], o = 0; o < r.rows.length; o++) {
                  i.push(r.rows.item(o).name);
                }

                t({
                  db: e,
                  storeNames: i
                });
              }, function (e, t) {
                n(t);
              });
            }, function (e) {
              n(e);
            });
          });
        }

        var x = {
          _driver: "webSQLStorage",
          _initStorage: function _initStorage(e) {
            var t = this,
                n = {
              db: null
            };
            if (e) for (var r in e) {
              n[r] = "string" != typeof e[r] ? e[r].toString() : e[r];
            }
            var i = new s(function (e, r) {
              try {
                n.db = openDatabase(n.name, String(n.version), n.description, n.size);
              } catch (e) {
                return r(e);
              }

              n.db.transaction(function (i) {
                w(i, n, function () {
                  t._dbInfo = n, e();
                }, function (e, t) {
                  r(t);
                });
              }, r);
            });
            return n.serializer = P, i;
          },
          _support: "function" == typeof openDatabase,
          iterate: function iterate(e, t) {
            var n = this,
                r = new s(function (t, r) {
              n.ready().then(function () {
                var i = n._dbInfo;
                i.db.transaction(function (n) {
                  F(n, i, "SELECT * FROM " + i.storeName, [], function (n, r) {
                    for (var o = r.rows, s = o.length, a = 0; a < s; a++) {
                      var d = o.item(a),
                          l = d.value;
                      if (l && (l = i.serializer.deserialize(l)), void 0 !== (l = e(l, d.key, a + 1))) return void t(l);
                    }

                    t();
                  }, function (e, t) {
                    r(t);
                  });
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          getItem: function getItem(e, t) {
            var n = this;
            e = l(e);
            var r = new s(function (t, r) {
              n.ready().then(function () {
                var i = n._dbInfo;
                i.db.transaction(function (n) {
                  F(n, i, "SELECT * FROM " + i.storeName + " WHERE key = ? LIMIT 1", [e], function (e, n) {
                    var r = n.rows.length ? n.rows.item(0).value : null;
                    r && (r = i.serializer.deserialize(r)), t(r);
                  }, function (e, t) {
                    r(t);
                  });
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          setItem: function setItem(e, t, n) {
            return U.apply(this, [e, t, n, 1]);
          },
          removeItem: function removeItem(e, t) {
            var n = this;
            e = l(e);
            var r = new s(function (t, r) {
              n.ready().then(function () {
                var i = n._dbInfo;
                i.db.transaction(function (n) {
                  F(n, i, "DELETE FROM " + i.storeName + " WHERE key = ?", [e], function () {
                    t();
                  }, function (e, t) {
                    r(t);
                  });
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          clear: function clear(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                var r = t._dbInfo;
                r.db.transaction(function (t) {
                  F(t, r, "DELETE FROM " + r.storeName, [], function () {
                    e();
                  }, function (e, t) {
                    n(t);
                  });
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          length: function length(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                var r = t._dbInfo;
                r.db.transaction(function (t) {
                  F(t, r, "SELECT COUNT(key) as c FROM " + r.storeName, [], function (t, n) {
                    var r = n.rows.item(0).c;
                    e(r);
                  }, function (e, t) {
                    n(t);
                  });
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          key: function key(e, t) {
            var n = this,
                r = new s(function (t, r) {
              n.ready().then(function () {
                var i = n._dbInfo;
                i.db.transaction(function (n) {
                  F(n, i, "SELECT key FROM " + i.storeName + " WHERE id = ? LIMIT 1", [e + 1], function (e, n) {
                    var r = n.rows.length ? n.rows.item(0).key : null;
                    t(r);
                  }, function (e, t) {
                    r(t);
                  });
                });
              })["catch"](r);
            });
            return a(r, t), r;
          },
          keys: function keys(e) {
            var t = this,
                n = new s(function (e, n) {
              t.ready().then(function () {
                var r = t._dbInfo;
                r.db.transaction(function (t) {
                  F(t, r, "SELECT key FROM " + r.storeName, [], function (t, n) {
                    for (var r = [], i = 0; i < n.rows.length; i++) {
                      r.push(n.rows.item(i).key);
                    }

                    e(r);
                  }, function (e, t) {
                    n(t);
                  });
                });
              })["catch"](n);
            });
            return a(n, e), n;
          },
          dropInstance: function dropInstance(e, t) {
            t = c.apply(this, arguments);
            var n = this.config();
            (e = "function" != typeof e && e || {}).name || (e.name = e.name || n.name, e.storeName = e.storeName || n.storeName);
            var r,
                i = this;
            return a(r = e.name ? new s(function (t) {
              var r;
              r = e.name === n.name ? i._dbInfo.db : openDatabase(e.name, "", "", 0), e.storeName ? t({
                db: r,
                storeNames: [e.storeName]
              }) : t(k(r));
            }).then(function (e) {
              return new s(function (t, n) {
                e.db.transaction(function (r) {
                  function i(e) {
                    return new s(function (t, n) {
                      r.executeSql("DROP TABLE IF EXISTS " + e, [], function () {
                        t();
                      }, function (e, t) {
                        n(t);
                      });
                    });
                  }

                  for (var o = [], a = 0, d = e.storeNames.length; a < d; a++) {
                    o.push(i(e.storeNames[a]));
                  }

                  s.all(o).then(function () {
                    t();
                  })["catch"](function (e) {
                    n(e);
                  });
                }, function (e) {
                  n(e);
                });
              });
            }) : s.reject("Invalid arguments"), t), r;
          }
        };

        function V(e, t) {
          var n = e.name + "/";
          return e.storeName !== t.storeName && (n += e.storeName + "/"), n;
        }

        function G() {
          return !function () {
            try {
              return localStorage.setItem("_localforage_support_test", !0), localStorage.removeItem("_localforage_support_test"), !1;
            } catch (e) {
              return !0;
            }
          }() || localStorage.length > 0;
        }

        var W = {
          _driver: "localStorageWrapper",
          _initStorage: function _initStorage(e) {
            var t = {};
            if (e) for (var n in e) {
              t[n] = e[n];
            }
            return t.keyPrefix = V(e, this._defaultConfig), G() ? (this._dbInfo = t, t.serializer = P, s.resolve()) : s.reject();
          },
          _support: function () {
            try {
              return "undefined" != typeof localStorage && "setItem" in localStorage && !!localStorage.setItem;
            } catch (e) {
              return !1;
            }
          }(),
          iterate: function iterate(e, t) {
            var n = this,
                r = n.ready().then(function () {
              for (var t = n._dbInfo, r = t.keyPrefix, i = r.length, o = localStorage.length, s = 1, a = 0; a < o; a++) {
                var d = localStorage.key(a);

                if (0 === d.indexOf(r)) {
                  var l = localStorage.getItem(d);
                  if (l && (l = t.serializer.deserialize(l)), void 0 !== (l = e(l, d.substring(i), s++))) return l;
                }
              }
            });
            return a(r, t), r;
          },
          getItem: function getItem(e, t) {
            var n = this;
            e = l(e);
            var r = n.ready().then(function () {
              var t = n._dbInfo,
                  r = localStorage.getItem(t.keyPrefix + e);
              return r && (r = t.serializer.deserialize(r)), r;
            });
            return a(r, t), r;
          },
          setItem: function setItem(e, t, n) {
            var r = this;
            e = l(e);
            var i = r.ready().then(function () {
              void 0 === t && (t = null);
              var n = t;
              return new s(function (i, o) {
                var s = r._dbInfo;
                s.serializer.serialize(t, function (t, r) {
                  if (r) o(r);else try {
                    localStorage.setItem(s.keyPrefix + e, t), i(n);
                  } catch (e) {
                    "QuotaExceededError" !== e.name && "NS_ERROR_DOM_QUOTA_REACHED" !== e.name || o(e), o(e);
                  }
                });
              });
            });
            return a(i, n), i;
          },
          removeItem: function removeItem(e, t) {
            var n = this;
            e = l(e);
            var r = n.ready().then(function () {
              var t = n._dbInfo;
              localStorage.removeItem(t.keyPrefix + e);
            });
            return a(r, t), r;
          },
          clear: function clear(e) {
            var t = this,
                n = t.ready().then(function () {
              for (var e = t._dbInfo.keyPrefix, n = localStorage.length - 1; n >= 0; n--) {
                var r = localStorage.key(n);
                0 === r.indexOf(e) && localStorage.removeItem(r);
              }
            });
            return a(n, e), n;
          },
          length: function length(e) {
            var t = this.keys().then(function (e) {
              return e.length;
            });
            return a(t, e), t;
          },
          key: function key(e, t) {
            var n = this,
                r = n.ready().then(function () {
              var t,
                  r = n._dbInfo;

              try {
                t = localStorage.key(e);
              } catch (e) {
                t = null;
              }

              return t && (t = t.substring(r.keyPrefix.length)), t;
            });
            return a(r, t), r;
          },
          keys: function keys(e) {
            var t = this,
                n = t.ready().then(function () {
              for (var e = t._dbInfo, n = localStorage.length, r = [], i = 0; i < n; i++) {
                var o = localStorage.key(i);
                0 === o.indexOf(e.keyPrefix) && r.push(o.substring(e.keyPrefix.length));
              }

              return r;
            });
            return a(n, e), n;
          },
          dropInstance: function dropInstance(e, t) {
            if (t = c.apply(this, arguments), !(e = "function" != typeof e && e || {}).name) {
              var n = this.config();
              e.name = e.name || n.name, e.storeName = e.storeName || n.storeName;
            }

            var r,
                i = this;
            return a(r = e.name ? new s(function (t) {
              e.storeName ? t(V(e, i._defaultConfig)) : t(e.name + "/");
            }).then(function (e) {
              for (var t = localStorage.length - 1; t >= 0; t--) {
                var n = localStorage.key(t);
                0 === n.indexOf(e) && localStorage.removeItem(n);
              }
            }) : s.reject("Invalid arguments"), t), r;
          }
        },
            j = function j(e, t) {
          for (var n, r, i = e.length, o = 0; o < i;) {
            if ((n = e[o]) === (r = t) || "number" == typeof n && "number" == typeof r && isNaN(n) && isNaN(r)) return !0;
            o++;
          }

          return !1;
        },
            H = Array.isArray || function (e) {
          return "[object Array]" === Object.prototype.toString.call(e);
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
            return e.ready().then(function () {
              return e[t].apply(e, n);
            });
          };
        }

        function $() {
          for (var e = 1; e < arguments.length; e++) {
            var t = arguments[e];
            if (t) for (var n in t) {
              t.hasOwnProperty(n) && (H(t[n]) ? arguments[0][n] = t[n].slice() : arguments[0][n] = t[n]);
            }
          }

          return arguments[0];
        }

        var ee = new (function () {
          function e(t) {
            for (var n in function (e, t) {
              if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
            }(this, e), Y) {
              if (Y.hasOwnProperty(n)) {
                var r = Y[n],
                    i = r._driver;
                this[n] = i, K[i] || this.defineDriver(r);
              }
            }

            this._defaultConfig = $({}, Z), this._config = $({}, this._defaultConfig, t), this._driverSet = null, this._initDriver = null, this._ready = !1, this._dbInfo = null, this._wrapLibraryMethodsWithReady(), this.setDriver(this._config.driver)["catch"](function () {});
          }

          return e.prototype.config = function (e) {
            if ("object" === (void 0 === e ? "undefined" : r(e))) {
              if (this._ready) return new Error("Can't call config() after localforage has been used.");

              for (var t in e) {
                if ("storeName" === t && (e[t] = e[t].replace(/\W/g, "_")), "version" === t && "number" != typeof e[t]) return new Error("Database version must be a number.");
                this._config[t] = e[t];
              }

              return !("driver" in e) || !e.driver || this.setDriver(this._config.driver);
            }

            return "string" == typeof e ? this._config[e] : this._config;
          }, e.prototype.defineDriver = function (e, t, n) {
            var r = new s(function (t, n) {
              try {
                var r = e._driver,
                    i = new Error("Custom driver not compliant; see https://mozilla.github.io/localForage/#definedriver");
                if (!e._driver) return void n(i);

                for (var o = z.concat("_initStorage"), d = 0, l = o.length; d < l; d++) {
                  var c = o[d];
                  if ((!j(Q, c) || e[c]) && "function" != typeof e[c]) return void n(i);
                }

                !function () {
                  for (var t = function t(e) {
                    return function () {
                      var t = new Error("Method " + e + " is not implemented by the current driver"),
                          n = s.reject(t);
                      return a(n, arguments[arguments.length - 1]), n;
                    };
                  }, n = 0, r = Q.length; n < r; n++) {
                    var i = Q[n];
                    e[i] || (e[i] = t(i));
                  }
                }();

                var u = function u(n) {
                  K[r] && console.info("Redefining LocalForage driver: " + r), K[r] = e, J[r] = n, t();
                };

                "_support" in e ? e._support && "function" == typeof e._support ? e._support().then(u, n) : u(!!e._support) : u(!0);
              } catch (e) {
                n(e);
              }
            });
            return d(r, t, n), r;
          }, e.prototype.driver = function () {
            return this._driver || null;
          }, e.prototype.getDriver = function (e, t, n) {
            var r = K[e] ? s.resolve(K[e]) : s.reject(new Error("Driver not found."));
            return d(r, t, n), r;
          }, e.prototype.getSerializer = function (e) {
            var t = s.resolve(P);
            return d(t, e), t;
          }, e.prototype.ready = function (e) {
            var t = this,
                n = t._driverSet.then(function () {
              return null === t._ready && (t._ready = t._initDriver()), t._ready;
            });

            return d(n, e, e), n;
          }, e.prototype.setDriver = function (e, t, n) {
            var r = this;
            H(e) || (e = [e]);

            var i = this._getSupportedDrivers(e);

            function o() {
              r._config.driver = r.driver();
            }

            function a(e) {
              return r._extend(e), o(), r._ready = r._initStorage(r._config), r._ready;
            }

            var l = null !== this._driverSet ? this._driverSet["catch"](function () {
              return s.resolve();
            }) : s.resolve();
            return this._driverSet = l.then(function () {
              var e = i[0];
              return r._dbInfo = null, r._ready = null, r.getDriver(e).then(function (e) {
                r._driver = e._driver, o(), r._wrapLibraryMethodsWithReady(), r._initDriver = function (e) {
                  return function () {
                    var t = 0;
                    return function n() {
                      for (; t < e.length;) {
                        var i = e[t];
                        return t++, r._dbInfo = null, r._ready = null, r.getDriver(i).then(a)["catch"](n);
                      }

                      o();
                      var d = new Error("No available storage method found.");
                      return r._driverSet = s.reject(d), r._driverSet;
                    }();
                  };
                }(i);
              });
            })["catch"](function () {
              o();
              var e = new Error("No available storage method found.");
              return r._driverSet = s.reject(e), r._driverSet;
            }), d(this._driverSet, t, n), this._driverSet;
          }, e.prototype.supports = function (e) {
            return !!J[e];
          }, e.prototype._extend = function (e) {
            $(this, e);
          }, e.prototype._getSupportedDrivers = function (e) {
            for (var t = [], n = 0, r = e.length; n < r; n++) {
              var i = e[n];
              this.supports(i) && t.push(i);
            }

            return t;
          }, e.prototype._wrapLibraryMethodsWithReady = function () {
            for (var e = 0, t = z.length; e < t; e++) {
              q(this, z[e]);
            }
          }, e.prototype.createInstance = function (t) {
            return new e(t);
          }, e;
        }())();
        t.exports = ee;
      }, {
        3: 3
      }]
    }, {}, [4])(4);
  }, function (t, n) {
    t.exports = e;
  }, function (e, n) {
    e.exports = t;
  }, function (e, t) {
    e.exports = n;
  }, function (e, t) {
    e.exports = r;
  }, function (e, t) {
    e.exports = i;
  }, function (e, t, n) {
    "use strict";

    var r, i, o, s;
    n.r(t), n.d(t, "BarcodeReader", function () {
      return c;
    }), n.d(t, "BarcodeScanner", function () {
      return h;
    }), n.d(t, "EnumBarcodeColourMode", function () {
      return f;
    }), n.d(t, "EnumBarcodeComplementMode", function () {
      return g;
    }), n.d(t, "EnumBarcodeFormat", function () {
      return s;
    }), n.d(t, "EnumBarcodeFormat_2", function () {
      return E;
    }), n.d(t, "EnumBinarizationMode", function () {
      return R;
    }), n.d(t, "EnumClarityCalculationMethod", function () {
      return I;
    }), n.d(t, "EnumClarityFilterMode", function () {
      return v;
    }), n.d(t, "EnumColourClusteringMode", function () {
      return A;
    }), n.d(t, "EnumColourConversionMode", function () {
      return m;
    }), n.d(t, "EnumConflictMode", function () {
      return p;
    }), n.d(t, "EnumDeblurMode", function () {
      return y;
    }), n.d(t, "EnumDeformationResistingMode", function () {
      return S;
    }), n.d(t, "EnumDPMCodeReadingMode", function () {
      return D;
    }), n.d(t, "EnumErrorCode", function () {
      return i;
    }), n.d(t, "EnumGrayscaleTransformationMode", function () {
      return T;
    }), n.d(t, "EnumImagePixelFormat", function () {
      return r;
    }), n.d(t, "EnumImagePreprocessingMode", function () {
      return b;
    }), n.d(t, "EnumIMResultDataType", function () {
      return o;
    }), n.d(t, "EnumIntermediateResultSavingMode", function () {
      return M;
    }), n.d(t, "EnumIntermediateResultType", function () {
      return C;
    }), n.d(t, "EnumLocalizationMode", function () {
      return O;
    }), n.d(t, "EnumPDFReadingMode", function () {
      return L;
    }), n.d(t, "EnumQRCodeErrorCorrectionLevel", function () {
      return N;
    }), n.d(t, "EnumRegionPredetectionMode", function () {
      return B;
    }), n.d(t, "EnumResultCoordinateType", function () {
      return P;
    }), n.d(t, "EnumResultType", function () {
      return w;
    }), n.d(t, "EnumScaleUpMode", function () {
      return F;
    }), n.d(t, "EnumTerminatePhase", function () {
      return U;
    }), n.d(t, "EnumTextAssistedCorrectionMode", function () {
      return k;
    }), n.d(t, "EnumTextFilterMode", function () {
      return x;
    }), n.d(t, "EnumTextResultOrderMode", function () {
      return V;
    }), n.d(t, "EnumTextureDetectionMode", function () {
      return G;
    }), n.d(t, "EnumLicenseModule", function () {
      return W;
    }), n.d(t, "EnumChargeWay", function () {
      return j;
    }), function (e) {
      e[e.IPF_Binary = 0] = "IPF_Binary", e[e.IPF_BinaryInverted = 1] = "IPF_BinaryInverted", e[e.IPF_GrayScaled = 2] = "IPF_GrayScaled", e[e.IPF_NV21 = 3] = "IPF_NV21", e[e.IPF_RGB_565 = 4] = "IPF_RGB_565", e[e.IPF_RGB_555 = 5] = "IPF_RGB_555", e[e.IPF_RGB_888 = 6] = "IPF_RGB_888", e[e.IPF_ARGB_8888 = 7] = "IPF_ARGB_8888", e[e.IPF_RGB_161616 = 8] = "IPF_RGB_161616", e[e.IPF_ARGB_16161616 = 9] = "IPF_ARGB_16161616", e[e.IPF_ABGR_8888 = 10] = "IPF_ABGR_8888", e[e.IPF_ABGR_16161616 = 11] = "IPF_ABGR_16161616", e[e.IPF_BGR_888 = 12] = "IPF_BGR_888";
    }(r || (r = {})), function (e) {
      e[e.DBR_SYSTEM_EXCEPTION = 1] = "DBR_SYSTEM_EXCEPTION", e[e.DBR_SUCCESS = 0] = "DBR_SUCCESS", e[e.DBR_UNKNOWN = -1e4] = "DBR_UNKNOWN", e[e.DBR_NO_MEMORY = -10001] = "DBR_NO_MEMORY", e[e.DBR_NULL_REFERENCE = -10002] = "DBR_NULL_REFERENCE", e[e.DBR_LICENSE_INVALID = -10003] = "DBR_LICENSE_INVALID", e[e.DBR_LICENSE_EXPIRED = -10004] = "DBR_LICENSE_EXPIRED", e[e.DBR_FILE_NOT_FOUND = -10005] = "DBR_FILE_NOT_FOUND", e[e.DBR_FILETYPE_NOT_SUPPORTED = -10006] = "DBR_FILETYPE_NOT_SUPPORTED", e[e.DBR_BPP_NOT_SUPPORTED = -10007] = "DBR_BPP_NOT_SUPPORTED", e[e.DBR_INDEX_INVALID = -10008] = "DBR_INDEX_INVALID", e[e.DBR_BARCODE_FORMAT_INVALID = -10009] = "DBR_BARCODE_FORMAT_INVALID", e[e.DBR_CUSTOM_REGION_INVALID = -10010] = "DBR_CUSTOM_REGION_INVALID", e[e.DBR_MAX_BARCODE_NUMBER_INVALID = -10011] = "DBR_MAX_BARCODE_NUMBER_INVALID", e[e.DBR_IMAGE_READ_FAILED = -10012] = "DBR_IMAGE_READ_FAILED", e[e.DBR_TIFF_READ_FAILED = -10013] = "DBR_TIFF_READ_FAILED", e[e.DBR_QR_LICENSE_INVALID = -10016] = "DBR_QR_LICENSE_INVALID", e[e.DBR_1D_LICENSE_INVALID = -10017] = "DBR_1D_LICENSE_INVALID", e[e.DBR_DIB_BUFFER_INVALID = -10018] = "DBR_DIB_BUFFER_INVALID", e[e.DBR_PDF417_LICENSE_INVALID = -10019] = "DBR_PDF417_LICENSE_INVALID", e[e.DBR_DATAMATRIX_LICENSE_INVALID = -10020] = "DBR_DATAMATRIX_LICENSE_INVALID", e[e.DBR_PDF_READ_FAILED = -10021] = "DBR_PDF_READ_FAILED", e[e.DBR_PDF_DLL_MISSING = -10022] = "DBR_PDF_DLL_MISSING", e[e.DBR_PAGE_NUMBER_INVALID = -10023] = "DBR_PAGE_NUMBER_INVALID", e[e.DBR_CUSTOM_SIZE_INVALID = -10024] = "DBR_CUSTOM_SIZE_INVALID", e[e.DBR_CUSTOM_MODULESIZE_INVALID = -10025] = "DBR_CUSTOM_MODULESIZE_INVALID", e[e.DBR_RECOGNITION_TIMEOUT = -10026] = "DBR_RECOGNITION_TIMEOUT", e[e.DBR_JSON_PARSE_FAILED = -10030] = "DBR_JSON_PARSE_FAILED", e[e.DBR_JSON_TYPE_INVALID = -10031] = "DBR_JSON_TYPE_INVALID", e[e.DBR_JSON_KEY_INVALID = -10032] = "DBR_JSON_KEY_INVALID", e[e.DBR_JSON_VALUE_INVALID = -10033] = "DBR_JSON_VALUE_INVALID", e[e.DBR_JSON_NAME_KEY_MISSING = -10034] = "DBR_JSON_NAME_KEY_MISSING", e[e.DBR_JSON_NAME_VALUE_DUPLICATED = -10035] = "DBR_JSON_NAME_VALUE_DUPLICATED", e[e.DBR_TEMPLATE_NAME_INVALID = -10036] = "DBR_TEMPLATE_NAME_INVALID", e[e.DBR_JSON_NAME_REFERENCE_INVALID = -10037] = "DBR_JSON_NAME_REFERENCE_INVALID", e[e.DBR_PARAMETER_VALUE_INVALID = -10038] = "DBR_PARAMETER_VALUE_INVALID", e[e.DBR_DOMAIN_NOT_MATCHED = -10039] = "DBR_DOMAIN_NOT_MATCHED", e[e.DBR_RESERVEDINFO_NOT_MATCHED = -10040] = "DBR_RESERVEDINFO_NOT_MATCHED", e[e.DBR_AZTEC_LICENSE_INVALID = -10041] = "DBR_AZTEC_LICENSE_INVALID", e[e.DBR_LICENSE_DLL_MISSING = -10042] = "DBR_LICENSE_DLL_MISSING", e[e.DBR_LICENSEKEY_NOT_MATCHED = -10043] = "DBR_LICENSEKEY_NOT_MATCHED", e[e.DBR_REQUESTED_FAILED = -10044] = "DBR_REQUESTED_FAILED", e[e.DBR_LICENSE_INIT_FAILED = -10045] = "DBR_LICENSE_INIT_FAILED", e[e.DBR_PATCHCODE_LICENSE_INVALID = -10046] = "DBR_PATCHCODE_LICENSE_INVALID", e[e.DBR_POSTALCODE_LICENSE_INVALID = -10047] = "DBR_POSTALCODE_LICENSE_INVALID", e[e.DBR_DPM_LICENSE_INVALID = -10048] = "DBR_DPM_LICENSE_INVALID", e[e.DBR_FRAME_DECODING_THREAD_EXISTS = -10049] = "DBR_FRAME_DECODING_THREAD_EXISTS", e[e.DBR_STOP_DECODING_THREAD_FAILED = -10050] = "DBR_STOP_DECODING_THREAD_FAILED", e[e.DBR_SET_MODE_ARGUMENT_ERROR = -10051] = "DBR_SET_MODE_ARGUMENT_ERROR", e[e.DBR_LICENSE_CONTENT_INVALID = -10052] = "DBR_LICENSE_CONTENT_INVALID", e[e.DBR_LICENSE_KEY_INVALID = -10053] = "DBR_LICENSE_KEY_INVALID", e[e.DBR_LICENSE_DEVICE_RUNS_OUT = -10054] = "DBR_LICENSE_DEVICE_RUNS_OUT", e[e.DBR_GET_MODE_ARGUMENT_ERROR = -10055] = "DBR_GET_MODE_ARGUMENT_ERROR", e[e.DBR_IRT_LICENSE_INVALID = -10056] = "DBR_IRT_LICENSE_INVALID", e[e.DBR_MAXICODE_LICENSE_INVALID = -10057] = "DBR_MAXICODE_LICENSE_INVALID", e[e.DBR_GS1_DATABAR_LICENSE_INVALID = -10058] = "DBR_GS1_DATABAR_LICENSE_INVALID", e[e.DBR_GS1_COMPOSITE_LICENSE_INVALID = -10059] = "DBR_GS1_COMPOSITE_LICENSE_INVALID", e[e.DBR_DOTCODE_LICENSE_INVALID = -10061] = "DBR_DOTCODE_LICENSE_INVALID", e[e.DMERR_NO_LICENSE = -2e4] = "DMERR_NO_LICENSE", e[e.DMERR_LICENSE_SYNC_FAILED = -20003] = "DMERR_LICENSE_SYNC_FAILED", e[e.DMERR_TRIAL_LICENSE = -20010] = "DMERR_TRIAL_LICENSE", e[e.DMERR_FAILED_TO_REACH_LTS = -20200] = "DMERR_FAILED_TO_REACH_LTS";
    }(i || (i = {})), function (e) {
      e[e.IMRDT_IMAGE = 1] = "IMRDT_IMAGE", e[e.IMRDT_CONTOUR = 2] = "IMRDT_CONTOUR", e[e.IMRDT_LINESEGMENT = 4] = "IMRDT_LINESEGMENT", e[e.IMRDT_LOCALIZATIONRESULT = 8] = "IMRDT_LOCALIZATIONRESULT", e[e.IMRDT_REGIONOFINTEREST = 16] = "IMRDT_REGIONOFINTEREST", e[e.IMRDT_QUADRILATERAL = 32] = "IMRDT_QUADRILATERAL";
    }(o || (o = {})), function (e) {
      e[e.BF_ALL = -31457281] = "BF_ALL", e[e.BF_ONED = 1050623] = "BF_ONED", e[e.BF_GS1_DATABAR = 260096] = "BF_GS1_DATABAR", e[e.BF_CODE_39 = 1] = "BF_CODE_39", e[e.BF_CODE_128 = 2] = "BF_CODE_128", e[e.BF_CODE_93 = 4] = "BF_CODE_93", e[e.BF_CODABAR = 8] = "BF_CODABAR", e[e.BF_ITF = 16] = "BF_ITF", e[e.BF_EAN_13 = 32] = "BF_EAN_13", e[e.BF_EAN_8 = 64] = "BF_EAN_8", e[e.BF_UPC_A = 128] = "BF_UPC_A", e[e.BF_UPC_E = 256] = "BF_UPC_E", e[e.BF_INDUSTRIAL_25 = 512] = "BF_INDUSTRIAL_25", e[e.BF_CODE_39_EXTENDED = 1024] = "BF_CODE_39_EXTENDED", e[e.BF_GS1_DATABAR_OMNIDIRECTIONAL = 2048] = "BF_GS1_DATABAR_OMNIDIRECTIONAL", e[e.BF_GS1_DATABAR_TRUNCATED = 4096] = "BF_GS1_DATABAR_TRUNCATED", e[e.BF_GS1_DATABAR_STACKED = 8192] = "BF_GS1_DATABAR_STACKED", e[e.BF_GS1_DATABAR_STACKED_OMNIDIRECTIONAL = 16384] = "BF_GS1_DATABAR_STACKED_OMNIDIRECTIONAL", e[e.BF_GS1_DATABAR_EXPANDED = 32768] = "BF_GS1_DATABAR_EXPANDED", e[e.BF_GS1_DATABAR_EXPANDED_STACKED = 65536] = "BF_GS1_DATABAR_EXPANDED_STACKED", e[e.BF_GS1_DATABAR_LIMITED = 131072] = "BF_GS1_DATABAR_LIMITED", e[e.BF_PATCHCODE = 262144] = "BF_PATCHCODE", e[e.BF_PDF417 = 33554432] = "BF_PDF417", e[e.BF_QR_CODE = 67108864] = "BF_QR_CODE", e[e.BF_DATAMATRIX = 134217728] = "BF_DATAMATRIX", e[e.BF_AZTEC = 268435456] = "BF_AZTEC", e[e.BF_MAXICODE = 536870912] = "BF_MAXICODE", e[e.BF_MICRO_QR = 1073741824] = "BF_MICRO_QR", e[e.BF_MICRO_PDF417 = 524288] = "BF_MICRO_PDF417", e[e.BF_GS1_COMPOSITE = -2147483648] = "BF_GS1_COMPOSITE", e[e.BF_MSI_CODE = 1048576] = "BF_MSI_CODE", e[e.BF_NULL = 0] = "BF_NULL";
    }(s || (s = {}));

    var a = function a(e, t, n, r) {
      return new (n || (n = Promise))(function (i, o) {
        function s(e) {
          try {
            d(r.next(e));
          } catch (e) {
            o(e);
          }
        }

        function a(e) {
          try {
            d(r["throw"](e));
          } catch (e) {
            o(e);
          }
        }

        function d(e) {
          var t;
          e.done ? i(e.value) : (t = e.value, t instanceof n ? t : new n(function (e) {
            e(t);
          })).then(s, a);
        }

        d((r = r.apply(e, t || [])).next());
      });
    };

    var d = n(0),
        l = !!("object" == (typeof global === "undefined" ? "undefined" : _typeof(global)) && global.process && global.process.release && global.process.release.name && "undefined" == typeof HTMLCanvasElement);

    var c =
    /*#__PURE__*/
    function () {
      function c() {
        _classCallCheck(this, c);

        this._canvasMaxWH = "iPhone" == c.browserInfo.OS || "Android" == c.browserInfo.OS ? 2048 : 4096, this._instanceID = void 0, this.bSaveOriCanvas = !1, this.oriCanvas = null, this.maxVideoCvsLength = 3, this.videoCvses = [], this.videoGlCvs = null, this.videoGl = null, this.glImgData = null, this.bFilterRegionInJs = !0, this._region = null, this._timeStartDecode = null, this._timeEnterInnerDBR = null, this._bUseWebgl = !0, this.decodeRecords = [], this.bDestroyed = !1, this._lastErrorCode = 0, this._lastErrorString = "";
      }

      _createClass(c, [{
        key: "decode",
        value: function decode(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee() {
            var _t;

            return regeneratorRuntime.wrap(function _callee$(_context) {
              while (1) {
                switch (_context.prev = _context.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("decode(source: any)"), c._onLog && (this._timeStartDecode = Date.now()), l)) {
                      _context.next = 39;
                      break;
                    }

                    if (!(e instanceof Buffer)) {
                      _context.next = 7;
                      break;
                    }

                    _context.next = 4;
                    return this._decodeFileInMemory_Uint8Array(new Uint8Array(e));

                  case 4:
                    _context.t0 = _context.sent;
                    _context.next = 38;
                    break;

                  case 7:
                    if (!(e instanceof Uint8Array)) {
                      _context.next = 13;
                      break;
                    }

                    _context.next = 10;
                    return this._decodeFileInMemory_Uint8Array(e);

                  case 10:
                    _context.t1 = _context.sent;
                    _context.next = 37;
                    break;

                  case 13:
                    if (!("string" == typeof e || e instanceof String)) {
                      _context.next = 33;
                      break;
                    }

                    if (!("data:image/" == e.substring(0, 11))) {
                      _context.next = 20;
                      break;
                    }

                    _context.next = 17;
                    return this._decode_Base64(e);

                  case 17:
                    _context.t3 = _context.sent;
                    _context.next = 30;
                    break;

                  case 20:
                    if (!("http" == e.substring(0, 4))) {
                      _context.next = 26;
                      break;
                    }

                    _context.next = 23;
                    return this._decode_Url(e);

                  case 23:
                    _context.t4 = _context.sent;
                    _context.next = 29;
                    break;

                  case 26:
                    _context.next = 28;
                    return this._decode_FilePath(e);

                  case 28:
                    _context.t4 = _context.sent;

                  case 29:
                    _context.t3 = _context.t4;

                  case 30:
                    _context.t2 = _context.t3;
                    _context.next = 36;
                    break;

                  case 33:
                    _context.next = 35;
                    return Promise.reject(TypeError("'_decode(source, config)': Type of 'source' should be 'Buffer', 'Uint8Array', 'String(base64 with image mime)' or 'String(url)'."));

                  case 35:
                    _context.t2 = _context.sent;

                  case 36:
                    _context.t1 = _context.t2;

                  case 37:
                    _context.t0 = _context.t1;

                  case 38:
                    return _context.abrupt("return", _context.t0);

                  case 39:
                    _t = {};
                    !this.region || this.region instanceof Array || (_t.region = JSON.parse(JSON.stringify(this.region)));

                    if (!(e instanceof Blob)) {
                      _context.next = 47;
                      break;
                    }

                    _context.next = 44;
                    return this._decode_Blob(e, _t);

                  case 44:
                    _context.t5 = _context.sent;
                    _context.next = 99;
                    break;

                  case 47:
                    if (!(e instanceof ArrayBuffer)) {
                      _context.next = 53;
                      break;
                    }

                    _context.next = 50;
                    return this._decode_ArrayBuffer(e, _t);

                  case 50:
                    _context.t6 = _context.sent;
                    _context.next = 98;
                    break;

                  case 53:
                    if (!(e instanceof Uint8Array || e instanceof Uint8ClampedArray)) {
                      _context.next = 59;
                      break;
                    }

                    _context.next = 56;
                    return this._decode_Uint8Array(e, _t);

                  case 56:
                    _context.t7 = _context.sent;
                    _context.next = 97;
                    break;

                  case 59:
                    if (!(e instanceof HTMLImageElement || "undefined" != typeof ImageBitmap && e instanceof ImageBitmap)) {
                      _context.next = 65;
                      break;
                    }

                    _context.next = 62;
                    return this._decode_Image(e, _t);

                  case 62:
                    _context.t8 = _context.sent;
                    _context.next = 96;
                    break;

                  case 65:
                    if (!(e instanceof HTMLCanvasElement || "undefined" != typeof OffscreenCanvas && e instanceof OffscreenCanvas)) {
                      _context.next = 71;
                      break;
                    }

                    _context.next = 68;
                    return this._decode_Canvas(e, _t);

                  case 68:
                    _context.t9 = _context.sent;
                    _context.next = 95;
                    break;

                  case 71:
                    if (!(e instanceof HTMLVideoElement)) {
                      _context.next = 77;
                      break;
                    }

                    _context.next = 74;
                    return this._decode_Video(e, _t);

                  case 74:
                    _context.t10 = _context.sent;
                    _context.next = 94;
                    break;

                  case 77:
                    if (!("string" == typeof e || e instanceof String)) {
                      _context.next = 90;
                      break;
                    }

                    if (!("data:image/" == e.substring(0, 11))) {
                      _context.next = 84;
                      break;
                    }

                    _context.next = 81;
                    return this._decode_Base64(e, _t);

                  case 81:
                    _context.t12 = _context.sent;
                    _context.next = 87;
                    break;

                  case 84:
                    _context.next = 86;
                    return this._decode_Url(e, _t);

                  case 86:
                    _context.t12 = _context.sent;

                  case 87:
                    _context.t11 = _context.t12;
                    _context.next = 93;
                    break;

                  case 90:
                    _context.next = 92;
                    return Promise.reject(TypeError("'_decode(source, config)': Type of 'source' should be 'Blob', 'ArrayBuffer', 'Uint8Array', 'HTMLImageElement', 'HTMLCanvasElement', 'HTMLVideoElement', 'String(base64 with image mime)' or 'String(url)'."));

                  case 92:
                    _context.t11 = _context.sent;

                  case 93:
                    _context.t10 = _context.t11;

                  case 94:
                    _context.t9 = _context.t10;

                  case 95:
                    _context.t8 = _context.t9;

                  case 96:
                    _context.t7 = _context.t8;

                  case 97:
                    _context.t6 = _context.t7;

                  case 98:
                    _context.t5 = _context.t6;

                  case 99:
                    return _context.abrupt("return", _context.t5);

                  case 100:
                  case "end":
                    return _context.stop();
                }
              }
            }, _callee, this);
          }));
        }
      }, {
        key: "decodeBase64String",
        value: function decodeBase64String(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee2() {
            var t;
            return regeneratorRuntime.wrap(function _callee2$(_context2) {
              while (1) {
                switch (_context2.prev = _context2.next) {
                  case 0:
                    t = {};
                    return _context2.abrupt("return", (!this.region || this.region instanceof Array || (t.region = JSON.parse(JSON.stringify(this.region))), this._decode_Base64(e, t)));

                  case 2:
                  case "end":
                    return _context2.stop();
                }
              }
            }, _callee2, this);
          }));
        }
      }, {
        key: "decodeUrl",
        value: function decodeUrl(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee3() {
            var t;
            return regeneratorRuntime.wrap(function _callee3$(_context3) {
              while (1) {
                switch (_context3.prev = _context3.next) {
                  case 0:
                    t = {};
                    return _context3.abrupt("return", (!this.region || this.region instanceof Array || (t.region = JSON.parse(JSON.stringify(this.region))), this._decode_Url(e, t)));

                  case 2:
                  case "end":
                    return _context3.stop();
                }
              }
            }, _callee3, this);
          }));
        }
      }, {
        key: "_decodeBuffer_Uint8Array",
        value: function _decodeBuffer_Uint8Array(e, t, n, r, i, o) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee4() {
            var _this = this;

            return regeneratorRuntime.wrap(function _callee4$(_context4) {
              while (1) {
                switch (_context4.prev = _context4.next) {
                  case 0:
                    _context4.next = 2;
                    return new Promise(function (s, a) {
                      var d = c._nextTaskID++;
                      c._taskCallbackMap.set(d, function (e) {
                        if (e.success) {
                          var _t2,
                              _n = c._onLog ? Date.now() : 0;

                          _this.bufferShared && !_this.bufferShared.length && (_this.bufferShared = e.buffer);

                          try {
                            _t2 = _this._handleRetJsonString(e.decodeReturn);
                          } catch (e) {
                            return a(e);
                          }

                          if (c._onLog) {
                            var _e = Date.now();

                            c._onLog("DBR time get result: " + _n), c._onLog("Handle image cost: " + (_this._timeEnterInnerDBR - _this._timeStartDecode)), c._onLog("DBR worker decode image cost: " + (_n - _this._timeEnterInnerDBR)), c._onLog("DBR worker handle results: " + (_e - _n)), c._onLog("Total decode image cost: " + (_e - _this._timeStartDecode));
                          }

                          return s(_t2);
                        }

                        {
                          var _t3 = new Error(e.message);

                          return _t3.stack = e.stack + "\n" + _t3.stack, a(_t3);
                        }
                      }), c._onLog && (_this._timeEnterInnerDBR = Date.now()), c._onLog && c._onLog("Send buffer to worker:" + Date.now()), c._dbrWorker.postMessage({
                        type: "decodeBuffer",
                        id: d,
                        instanceID: _this._instanceID,
                        body: {
                          buffer: e,
                          width: t,
                          height: n,
                          stride: r,
                          format: i,
                          config: o
                        }
                      }, [e.buffer]);
                    });

                  case 2:
                    return _context4.abrupt("return", _context4.sent);

                  case 3:
                  case "end":
                    return _context4.stop();
                }
              }
            }, _callee4);
          }));
        }
      }, {
        key: "_decodeBuffer_Blob",
        value: function _decodeBuffer_Blob(e, t, n, r, i, o) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee5() {
            var _this2 = this;

            return regeneratorRuntime.wrap(function _callee5$(_context5) {
              while (1) {
                switch (_context5.prev = _context5.next) {
                  case 0:
                    c._onLog && c._onLog("_decodeBuffer_Blob(buffer,width,height,stride,format)");
                    _context5.next = 3;
                    return new Promise(function (t, n) {
                      var r = new FileReader();
                      r.readAsArrayBuffer(e), r.onload = function () {
                        t(r.result);
                      }, r.onerror = function () {
                        n(r.error);
                      };
                    }).then(function (e) {
                      return _this2._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o);
                    });

                  case 3:
                    return _context5.abrupt("return", _context5.sent);

                  case 4:
                  case "end":
                    return _context5.stop();
                }
              }
            }, _callee5);
          }));
        }
      }, {
        key: "decodeBuffer",
        value: function decodeBuffer(e, t, n, r, i, o) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee6() {
            var s;
            return regeneratorRuntime.wrap(function _callee6$(_context6) {
              while (1) {
                switch (_context6.prev = _context6.next) {
                  case 0:
                    c._onLog && c._onLog("decodeBuffer(buffer,width,height,stride,format)");
                    c._onLog && (this._timeStartDecode = Date.now());

                    if (!l) {
                      _context6.next = 16;
                      break;
                    }

                    if (!(e instanceof Uint8Array)) {
                      _context6.next = 9;
                      break;
                    }

                    _context6.next = 6;
                    return this._decodeBuffer_Uint8Array(e, t, n, r, i, o);

                  case 6:
                    s = _context6.sent;
                    _context6.next = 14;
                    break;

                  case 9:
                    _context6.t0 = e instanceof Buffer;

                    if (!_context6.t0) {
                      _context6.next = 14;
                      break;
                    }

                    _context6.next = 13;
                    return this._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o);

                  case 13:
                    s = _context6.sent;

                  case 14:
                    _context6.next = 33;
                    break;

                  case 16:
                    if (!(e instanceof Uint8Array || e instanceof Uint8ClampedArray)) {
                      _context6.next = 22;
                      break;
                    }

                    _context6.next = 19;
                    return this._decodeBuffer_Uint8Array(e, t, n, r, i, o);

                  case 19:
                    s = _context6.sent;
                    _context6.next = 33;
                    break;

                  case 22:
                    if (!(e instanceof ArrayBuffer)) {
                      _context6.next = 28;
                      break;
                    }

                    _context6.next = 25;
                    return this._decodeBuffer_Uint8Array(new Uint8Array(e), t, n, r, i, o);

                  case 25:
                    s = _context6.sent;
                    _context6.next = 33;
                    break;

                  case 28:
                    _context6.t1 = e instanceof Blob;

                    if (!_context6.t1) {
                      _context6.next = 33;
                      break;
                    }

                    _context6.next = 32;
                    return this._decodeBuffer_Blob(e, t, n, r, i, o);

                  case 32:
                    s = _context6.sent;

                  case 33:
                    return _context6.abrupt("return", s);

                  case 34:
                  case "end":
                    return _context6.stop();
                }
              }
            }, _callee6, this);
          }));
        }
      }, {
        key: "_decodeFileInMemory_Uint8Array",
        value: function _decodeFileInMemory_Uint8Array(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee7() {
            var _this3 = this;

            return regeneratorRuntime.wrap(function _callee7$(_context7) {
              while (1) {
                switch (_context7.prev = _context7.next) {
                  case 0:
                    _context7.next = 2;
                    return new Promise(function (t, n) {
                      var r = c._nextTaskID++;
                      c._taskCallbackMap.set(r, function (e) {
                        if (e.success) {
                          var _r;

                          try {
                            _r = _this3._handleRetJsonString(e.decodeReturn);
                          } catch (e) {
                            return n(e);
                          }

                          return t(_r);
                        }

                        {
                          var _t4 = new Error(e.message);

                          return _t4.stack = e.stack + "\n" + _t4.stack, n(_t4);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "decodeFileInMemory",
                        id: r,
                        instanceID: _this3._instanceID,
                        body: {
                          bytes: e
                        }
                      });
                    });

                  case 2:
                    return _context7.abrupt("return", _context7.sent);

                  case 3:
                  case "end":
                    return _context7.stop();
                }
              }
            }, _callee7);
          }));
        }
      }, {
        key: "getRuntimeSettings",
        value: function getRuntimeSettings() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee8() {
            var _this4 = this;

            return regeneratorRuntime.wrap(function _callee8$(_context8) {
              while (1) {
                switch (_context8.prev = _context8.next) {
                  case 0:
                    _context8.next = 2;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) {
                          var _t5 = JSON.parse(n.results);

                          return null != _this4.userDefinedRegion && (_t5.region = JSON.parse(JSON.stringify(_this4.userDefinedRegion))), e(_t5);
                        }

                        {
                          var _e2 = new Error(n.message);

                          return _e2.stack = n.stack + "\n" + _e2.stack, t(_e2);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "getRuntimeSettings",
                        id: n,
                        instanceID: _this4._instanceID
                      });
                    });

                  case 2:
                    return _context8.abrupt("return", _context8.sent);

                  case 3:
                  case "end":
                    return _context8.stop();
                }
              }
            }, _callee8);
          }));
        }
      }, {
        key: "updateRuntimeSettings",
        value: function updateRuntimeSettings(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee9() {
            var _this5 = this;

            var t, _e3, _e4, _e5, _e6, _e7;

            return regeneratorRuntime.wrap(function _callee9$(_context9) {
              while (1) {
                switch (_context9.prev = _context9.next) {
                  case 0:
                    if (!("string" == typeof e || "object" == _typeof(e) && e instanceof String)) {
                      _context9.next = 52;
                      break;
                    }

                    if (!("speed" == e)) {
                      _context9.next = 18;
                      break;
                    }

                    _context9.next = 4;
                    return this.getRuntimeSettings();

                  case 4:
                    _e3 = _context9.sent;
                    _context9.next = 7;
                    return this.resetRuntimeSettings();

                  case 7:
                    _context9.next = 9;
                    return this.getRuntimeSettings();

                  case 9:
                    t = _context9.sent;
                    t.barcodeFormatIds = _e3.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e3.barcodeFormatIds_2;
                    t.region = _e3.region;
                    t.deblurLevel = 3;
                    t.expectedBarcodesCount = 0;
                    t.localizationModes = [2, 0, 0, 0, 0, 0, 0, 0];
                    _context9.next = 50;
                    break;

                  case 18:
                    if (!("balance" == e)) {
                      _context9.next = 35;
                      break;
                    }

                    _context9.next = 21;
                    return this.getRuntimeSettings();

                  case 21:
                    _e4 = _context9.sent;
                    _context9.next = 24;
                    return this.resetRuntimeSettings();

                  case 24:
                    _context9.next = 26;
                    return this.getRuntimeSettings();

                  case 26:
                    t = _context9.sent;
                    t.barcodeFormatIds = _e4.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e4.barcodeFormatIds_2;
                    t.region = _e4.region;
                    t.deblurLevel = 5;
                    t.expectedBarcodesCount = 512;
                    t.localizationModes = [2, 16, 0, 0, 0, 0, 0, 0];
                    _context9.next = 50;
                    break;

                  case 35:
                    if (!("coverage" == e)) {
                      _context9.next = 49;
                      break;
                    }

                    _context9.next = 38;
                    return this.getRuntimeSettings();

                  case 38:
                    _e5 = _context9.sent;
                    _context9.next = 41;
                    return this.resetRuntimeSettings();

                  case 41:
                    _context9.next = 43;
                    return this.getRuntimeSettings();

                  case 43:
                    t = _context9.sent;
                    t.barcodeFormatIds = _e5.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e5.barcodeFormatIds_2;
                    t.region = _e5.region;
                    _context9.next = 50;
                    break;

                  case 49:
                    t = JSON.parse(e);

                  case 50:
                    _context9.next = 55;
                    break;

                  case 52:
                    if (!("object" != _typeof(e))) {
                      _context9.next = 54;
                      break;
                    }

                    throw TypeError("'UpdateRuntimeSettings(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");

                  case 54:
                    if (t = JSON.parse(JSON.stringify(e)), t.region instanceof Array) {
                      _e6 = t.region;
                      [_e6.regionLeft, _e6.regionTop, _e6.regionLeft, _e6.regionBottom, _e6.regionMeasuredByPercentage].some(function (e) {
                        return void 0 !== e;
                      }) && (t.region = {
                        regionLeft: _e6.regionLeft || 0,
                        regionTop: _e6.regionTop || 0,
                        regionRight: _e6.regionRight || 0,
                        regionBottom: _e6.regionBottom || 0,
                        regionMeasuredByPercentage: _e6.regionMeasuredByPercentage || 0
                      });
                    }

                  case 55:
                    if (c._bUseFullFeature) {
                      _context9.next = 60;
                      break;
                    }

                    if (!(0 != (t.barcodeFormatIds & ~(s.BF_ONED | s.BF_QR_CODE | s.BF_PDF417 | s.BF_DATAMATRIX)) || 0 != t.barcodeFormatIds_2)) {
                      _context9.next = 58;
                      break;
                    }

                    throw Error("Some of the specified barcode formats are not supported in the compact version. Please try the full-featured version.");

                  case 58:
                    if (!(0 != t.intermediateResultTypes)) {
                      _context9.next = 60;
                      break;
                    }

                    throw Error("Intermediate results is not supported in the compact version. Please try the full-featured version.");

                  case 60:
                    if (l) {
                      _context9.next = 69;
                      break;
                    }

                    if (!this.bFilterRegionInJs) {
                      _context9.next = 68;
                      break;
                    }

                    _e7 = t.region;

                    if (!(_e7 instanceof Array)) {
                      _context9.next = 65;
                      break;
                    }

                    throw Error("The `region` of type `Array` is only allowed in `BarcodeScanner`.");

                  case 65:
                    this.userDefinedRegion = JSON.parse(JSON.stringify(_e7)), (_e7.regionLeft || _e7.regionTop || _e7.regionRight || _e7.regionBottom || _e7.regionMeasuredByPercentage) && (_e7.regionLeft || _e7.regionTop || 100 != _e7.regionRight || 100 != _e7.regionBottom || !_e7.regionMeasuredByPercentage) ? this.region = _e7 : this.region = null, t.region = {
                      regionLeft: 0,
                      regionTop: 0,
                      regionRight: 0,
                      regionBottom: 0,
                      regionMeasuredByPercentage: 0
                    };
                    _context9.next = 69;
                    break;

                  case 68:
                    this.userDefinedRegion = null, this.region = null;

                  case 69:
                    _context9.next = 71;
                    return new Promise(function (e, n) {
                      var r = c._nextTaskID++;
                      c._taskCallbackMap.set(r, function (t) {
                        if (t.success) {
                          try {
                            _this5._handleRetJsonString(t.updateReturn);
                          } catch (e) {
                            n(e);
                          }

                          return e();
                        }

                        {
                          var _e8 = new Error(t.message);

                          return _e8.stack = t.stack + "\n" + _e8.stack, n(_e8);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "updateRuntimeSettings",
                        id: r,
                        instanceID: _this5._instanceID,
                        body: {
                          settings: JSON.stringify(t)
                        }
                      });
                    });

                  case 71:
                    return _context9.abrupt("return", _context9.sent);

                  case 72:
                  case "end":
                    return _context9.stop();
                }
              }
            }, _callee9, this);
          }));
        }
      }, {
        key: "resetRuntimeSettings",
        value: function resetRuntimeSettings() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee10() {
            var _this6 = this;

            return regeneratorRuntime.wrap(function _callee10$(_context10) {
              while (1) {
                switch (_context10.prev = _context10.next) {
                  case 0:
                    this.userDefinedRegion = null;
                    this.region = null;
                    _context10.next = 4;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) return e();
                        {
                          var _e9 = new Error(n.message);

                          return _e9.stack = n.stack + "\n" + _e9.stack, t(_e9);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "resetRuntimeSettings",
                        id: n,
                        instanceID: _this6._instanceID
                      });
                    });

                  case 4:
                    return _context10.abrupt("return", _context10.sent);

                  case 5:
                  case "end":
                    return _context10.stop();
                }
              }
            }, _callee10, this);
          }));
        }
      }, {
        key: "outputSettingsToString",
        value: function outputSettingsToString() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee11() {
            var _this7 = this;

            return regeneratorRuntime.wrap(function _callee11$(_context11) {
              while (1) {
                switch (_context11.prev = _context11.next) {
                  case 0:
                    if (c._bUseFullFeature) {
                      _context11.next = 2;
                      break;
                    }

                    throw Error("outputSettingsToString() is not supported in the compact version. Please try the full-featured version.");

                  case 2:
                    _context11.next = 4;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) return e(n.results);
                        {
                          var _e10 = new Error(n.message);

                          return _e10.stack = n.stack + "\n" + _e10.stack, t(_e10);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "outputSettingsToString",
                        id: n,
                        instanceID: _this7._instanceID
                      });
                    });

                  case 4:
                    return _context11.abrupt("return", _context11.sent);

                  case 5:
                  case "end":
                    return _context11.stop();
                }
              }
            }, _callee11);
          }));
        }
      }, {
        key: "initRuntimeSettingsWithString",
        value: function initRuntimeSettingsWithString(e) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee12() {
            var _this8 = this;

            return regeneratorRuntime.wrap(function _callee12$(_context12) {
              while (1) {
                switch (_context12.prev = _context12.next) {
                  case 0:
                    if (c._bUseFullFeature) {
                      _context12.next = 2;
                      break;
                    }

                    throw Error("initRuntimeSettingsWithString() is not supported in the compact version. Please try the full-featured version.");

                  case 2:
                    if (!("string" == typeof e || "object" == _typeof(e) && e instanceof String)) {
                      _context12.next = 6;
                      break;
                    }

                    e = e;
                    _context12.next = 9;
                    break;

                  case 6:
                    if (!("object" != _typeof(e))) {
                      _context12.next = 8;
                      break;
                    }

                    throw TypeError("'initRuntimeSettingstWithString(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");

                  case 8:
                    e = JSON.stringify(e);

                  case 9:
                    _context12.next = 11;
                    return new Promise(function (t, n) {
                      var r = c._nextTaskID++;
                      c._taskCallbackMap.set(r, function (e) {
                        if (e.success) {
                          try {
                            _this8._handleRetJsonString(e.initReturn);
                          } catch (e) {
                            n(e);
                          }

                          return t();
                        }

                        {
                          var _t6 = new Error(e.message);

                          return _t6.stack = e.stack + "\n" + _t6.stack, n(_t6);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "initRuntimeSettingsWithString",
                        id: r,
                        instanceID: _this8._instanceID,
                        body: {
                          settings: e
                        }
                      });
                    });

                  case 11:
                    return _context12.abrupt("return", _context12.sent);

                  case 12:
                  case "end":
                    return _context12.stop();
                }
              }
            }, _callee12);
          }));
        }
      }, {
        key: "_decode_Blob",
        value: function _decode_Blob(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee13() {
            var n, r, i;
            return regeneratorRuntime.wrap(function _callee13$(_context13) {
              while (1) {
                switch (_context13.prev = _context13.next) {
                  case 0:
                    c._onLog && c._onLog("_decode_Blob(blob: Blob)");
                    n = null, r = null;

                    if (!("undefined" != typeof createImageBitmap)) {
                      _context13.next = 11;
                      break;
                    }

                    _context13.prev = 3;
                    _context13.next = 6;
                    return createImageBitmap(e);

                  case 6:
                    n = _context13.sent;
                    _context13.next = 11;
                    break;

                  case 9:
                    _context13.prev = 9;
                    _context13.t0 = _context13["catch"](3);

                  case 11:
                    _context13.t1 = n;

                    if (_context13.t1) {
                      _context13.next = 16;
                      break;
                    }

                    _context13.next = 15;
                    return function (e) {
                      return new Promise(function (t, n) {
                        var r = URL.createObjectURL(e),
                            i = new Image();
                        i.dbrObjUrl = r, i.src = r, i.onload = function () {
                          t(i);
                        }, i.onerror = function (e) {
                          n(new Error("Can't convert blob to image : " + (e instanceof Event ? e.type : e)));
                        };
                      });
                    }(e);

                  case 15:
                    r = _context13.sent;

                  case 16:
                    _context13.next = 18;
                    return this._decode_Image(n || r, t);

                  case 18:
                    i = _context13.sent;
                    return _context13.abrupt("return", (n && n.close(), i));

                  case 20:
                  case "end":
                    return _context13.stop();
                }
              }
            }, _callee13, this, [[3, 9]]);
          }));
        }
      }, {
        key: "_decode_ArrayBuffer",
        value: function _decode_ArrayBuffer(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee14() {
            return regeneratorRuntime.wrap(function _callee14$(_context14) {
              while (1) {
                switch (_context14.prev = _context14.next) {
                  case 0:
                    _context14.next = 2;
                    return this._decode_Blob(new Blob([e]), t);

                  case 2:
                    return _context14.abrupt("return", _context14.sent);

                  case 3:
                  case "end":
                    return _context14.stop();
                }
              }
            }, _callee14, this);
          }));
        }
      }, {
        key: "_decode_Uint8Array",
        value: function _decode_Uint8Array(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee15() {
            return regeneratorRuntime.wrap(function _callee15$(_context15) {
              while (1) {
                switch (_context15.prev = _context15.next) {
                  case 0:
                    _context15.next = 2;
                    return this._decode_Blob(new Blob([e]), t);

                  case 2:
                    return _context15.abrupt("return", _context15.sent);

                  case 3:
                  case "end":
                    return _context15.stop();
                }
              }
            }, _callee15, this);
          }));
        }
      }, {
        key: "_decode_Image",
        value: function _decode_Image(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee16() {
            var n, r, i, o, s, _e11, a, d, l, u, _, h, f, g, _e12, _t7, _s, _a, E, R, I, _iteratorNormalCompletion, _didIteratorError, _iteratorError, _iterator, _step, _e13, _t8;

            return regeneratorRuntime.wrap(function _callee16$(_context16) {
              while (1) {
                switch (_context16.prev = _context16.next) {
                  case 0:
                    c._onLog && c._onLog("_decode_Image(image: HTMLImageElement|ImageBitmap)"), t = t || {};
                    i = e instanceof HTMLImageElement ? e.naturalWidth : e.width, o = e instanceof HTMLImageElement ? e.naturalHeight : e.height, s = Math.max(i, o);

                    if (s > this._canvasMaxWH) {
                      _e11 = this._canvasMaxWH / s;
                      n = Math.round(i * _e11), r = Math.round(o * _e11);
                    } else n = i, r = o;

                    d = 0, l = 0, u = i, _ = o, h = i, f = o, g = t.region;

                    if (g) {
                      g.regionMeasuredByPercentage ? (_e12 = g.regionLeft * n / 100, _t7 = g.regionTop * r / 100, _s = g.regionRight * n / 100, _a = g.regionBottom * r / 100) : (_e12 = g.regionLeft, _t7 = g.regionTop, _s = g.regionRight, _a = g.regionBottom), h = _s - _e12, u = Math.round(h / n * i), f = _a - _t7, _ = Math.round(f / r * o), d = Math.round(_e12 / n * i), l = Math.round(_t7 / r * o);
                    }

                    self.OffscreenCanvas ? a = new OffscreenCanvas(h, f) : (a = document.createElement("canvas"), a.width = h, a.height = f);
                    R = a.getContext("2d");
                    0 == d && 0 == l && i == u && o == _ && i == h && o == f ? R.drawImage(e, 0, 0) : R.drawImage(e, d, l, u, _, 0, 0, h, f), e.dbrObjUrl && URL.revokeObjectURL(e.dbrObjUrl), g ? (E = JSON.parse(JSON.stringify(t)), delete E.region) : E = t;
                    _context16.next = 10;
                    return this._decode_Canvas(a, E);

                  case 10:
                    I = _context16.sent;

                    if (!(g && I.length > 0)) {
                      _context16.next = 31;
                      break;
                    }

                    _iteratorNormalCompletion = true;
                    _didIteratorError = false;
                    _iteratorError = undefined;
                    _context16.prev = 15;

                    for (_iterator = I[Symbol.iterator](); !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                      _e13 = _step.value;
                      _t8 = _e13.localizationResult;
                      2 == _t8.resultCoordinateType && (_t8.x1 *= .01 * h, _t8.x2 *= .01 * h, _t8.x3 *= .01 * h, _t8.x4 *= .01 * h, _t8.y1 *= .01 * f, _t8.y2 *= .01 * f, _t8.y3 *= .01 * f, _t8.y4 *= .01 * f), _t8.x1 += d, _t8.x2 += d, _t8.x3 += d, _t8.x4 += d, _t8.y1 += l, _t8.y2 += l, _t8.y3 += l, _t8.y4 += l, 2 == _t8.resultCoordinateType && (_t8.x1 *= 100 / u, _t8.x2 *= 100 / u, _t8.x3 *= 100 / u, _t8.x4 *= 100 / u, _t8.y1 *= 100 / _, _t8.y2 *= 100 / _, _t8.y3 *= 100 / _, _t8.y4 *= 100 / _);
                    }

                    _context16.next = 23;
                    break;

                  case 19:
                    _context16.prev = 19;
                    _context16.t0 = _context16["catch"](15);
                    _didIteratorError = true;
                    _iteratorError = _context16.t0;

                  case 23:
                    _context16.prev = 23;
                    _context16.prev = 24;

                    if (!_iteratorNormalCompletion && _iterator["return"] != null) {
                      _iterator["return"]();
                    }

                  case 26:
                    _context16.prev = 26;

                    if (!_didIteratorError) {
                      _context16.next = 29;
                      break;
                    }

                    throw _iteratorError;

                  case 29:
                    return _context16.finish(26);

                  case 30:
                    return _context16.finish(23);

                  case 31:
                    return _context16.abrupt("return", I);

                  case 32:
                  case "end":
                    return _context16.stop();
                }
              }
            }, _callee16, this, [[15, 19, 23, 31], [24,, 26, 30]]);
          }));
        }
      }, {
        key: "_decode_Canvas",
        value: function _decode_Canvas(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee17() {
            var n;
            return regeneratorRuntime.wrap(function _callee17$(_context17) {
              while (1) {
                switch (_context17.prev = _context17.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("_decode_Canvas(canvas:HTMLCanvasElement)"), e.crossOrigin && "anonymous" != e.crossOrigin)) {
                      _context17.next = 2;
                      break;
                    }

                    throw "cors";

                  case 2:
                    (this.bSaveOriCanvas || this.singleFrameMode) && (this.oriCanvas = e);
                    n = (e.dbrCtx2d || e.getContext("2d")).getImageData(0, 0, e.width, e.height).data;
                    _context17.next = 6;
                    return this._decodeBuffer_Uint8Array(n, e.width, e.height, 4 * e.width, r.IPF_ABGR_8888, t);

                  case 6:
                    return _context17.abrupt("return", _context17.sent);

                  case 7:
                  case "end":
                    return _context17.stop();
                }
              }
            }, _callee17, this);
          }));
        }
      }, {
        key: "_decode_Video",
        value: function _decode_Video(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee18() {
            var n, i, o, s, a, _e14, d, l, u, _, h, f, g, _e15, _t9, _r2, _a2, E, _t10, _n2, _e16, _t11, _r3, _i2, _o2, _i, _o, _s2, _a3, _d, _e17, _t12, _n3, _iteratorNormalCompletion2, _didIteratorError2, _iteratorError2, _iterator2, _step2, _e19, _r4, _i3, _o3, _iteratorNormalCompletion3, _didIteratorError3, _iteratorError3, _iterator3, _step3, _e18, _t13;

            return regeneratorRuntime.wrap(function _callee18$(_context18) {
              while (1) {
                switch (_context18.prev = _context18.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("_decode_Video(video)"), !(e instanceof HTMLVideoElement))) {
                      _context18.next = 2;
                      break;
                    }

                    throw TypeError("'_decode_Video(video [, config] )': Type of 'video' should be 'HTMLVideoElement'.");

                  case 2:
                    if (!(e.crossOrigin && "anonymous" != e.crossOrigin)) {
                      _context18.next = 4;
                      break;
                    }

                    throw "cors";

                  case 4:
                    t = t || {};
                    o = e.videoWidth, s = e.videoHeight, a = Math.max(o, s);

                    if (a > this._canvasMaxWH) {
                      _e14 = this._canvasMaxWH / a;
                      n = Math.round(o * _e14), i = Math.round(s * _e14);
                    } else n = o, i = s;

                    d = 0, l = 0, u = o, _ = s, h = o, f = s, g = t.region;

                    if (g) {
                      g.regionMeasuredByPercentage ? (_e15 = g.regionLeft * n / 100, _t9 = g.regionTop * i / 100, _r2 = g.regionRight * n / 100, _a2 = g.regionBottom * i / 100) : (_e15 = g.regionLeft, _t9 = g.regionTop, _r2 = g.regionRight, _a2 = g.regionBottom), h = _r2 - _e15, u = Math.round(h / n * o), f = _a2 - _t9, _ = Math.round(f / i * s), d = Math.round(_e15 / n * o), l = Math.round(_t9 / i * s);
                    }

                    E = 0 == d && 0 == l && o == u && s == _ && o == h && s == f;

                    if (!(!this.bSaveOriCanvas && this._bUseWebgl && E)) {
                      _context18.next = 29;
                      break;
                    }

                    this.videoGlCvs || (this.videoGlCvs = self.OffscreenCanvas ? new OffscreenCanvas(h, f) : document.createElement("canvas"));
                    _t10 = this.videoGlCvs;
                    _t10.width == h && _t10.height == f || (_t10.height = f, _t10.width = h, this.videoGl && this.videoGl.viewport(0, 0, h, f));
                    _n2 = this.videoGl || _t10.getContext("webgl", {
                      alpha: !1,
                      antialias: !1
                    }) || _t10.getContext("experimental-webgl", {
                      alpha: !1,
                      antialias: !1
                    });

                    if (!this.videoGl) {
                      this.videoGl = _n2;
                      _e16 = _n2.createShader(_n2.VERTEX_SHADER);
                      _n2.shaderSource(_e16, "\nattribute vec4 a_position;\nattribute vec2 a_uv;\n\nvarying vec2 v_uv;\n\nvoid main() {\n    gl_Position = a_position;\n    v_uv = a_uv;\n}\n"), _n2.compileShader(_e16), _n2.getShaderParameter(_e16, _n2.COMPILE_STATUS) || console.error("An error occurred compiling the shaders: " + _n2.getShaderInfoLog(_e16));
                      _t11 = _n2.createShader(_n2.FRAGMENT_SHADER);
                      _n2.shaderSource(_t11, "\nprecision lowp float;\n\nvarying vec2 v_uv;\n\nuniform sampler2D u_texture;\n\nvoid main() {\n    vec4 sample =  texture2D(u_texture, v_uv);\n    float grey = 0.299 * sample.r + 0.587 * sample.g + 0.114 * sample.b;\n    gl_FragColor = vec4(grey, 0.0, 0.0, 1.0);\n}\n"), _n2.compileShader(_t11), _n2.getShaderParameter(_t11, _n2.COMPILE_STATUS) || console.error("An error occurred compiling the shaders: " + _n2.getShaderInfoLog(_t11));
                      _r3 = _n2.createProgram();
                      _n2.attachShader(_r3, _e16), _n2.attachShader(_r3, _t11), _n2.linkProgram(_r3), _n2.getProgramParameter(_r3, _n2.LINK_STATUS) || console.error("Unable to initialize the shader program: " + _n2.getProgramInfoLog(_r3)), _n2.useProgram(_r3), _n2.bindBuffer(_n2.ARRAY_BUFFER, _n2.createBuffer()), _n2.bufferData(_n2.ARRAY_BUFFER, new Float32Array([-1, 1, 0, 1, 1, 1, 1, 1, -1, -1, 0, 0, 1, -1, 1, 0]), _n2.STATIC_DRAW);
                      _i2 = _n2.getAttribLocation(_r3, "a_position");
                      _n2.enableVertexAttribArray(_i2), _n2.vertexAttribPointer(_i2, 2, _n2.FLOAT, !1, 16, 0);
                      _o2 = _n2.getAttribLocation(_r3, "a_uv");
                      _n2.enableVertexAttribArray(_o2), _n2.vertexAttribPointer(_o2, 2, _n2.FLOAT, !1, 16, 8), _n2.activeTexture(_n2.TEXTURE0), _n2.bindTexture(_n2.TEXTURE_2D, _n2.createTexture()), _n2.texParameteri(_n2.TEXTURE_2D, _n2.TEXTURE_WRAP_S, _n2.CLAMP_TO_EDGE), _n2.texParameteri(_n2.TEXTURE_2D, _n2.TEXTURE_WRAP_T, _n2.CLAMP_TO_EDGE), _n2.texParameteri(_n2.TEXTURE_2D, _n2.TEXTURE_MIN_FILTER, _n2.NEAREST), _n2.texParameteri(_n2.TEXTURE_2D, _n2.TEXTURE_MAG_FILTER, _n2.NEAREST), _n2.uniform1i(_n2.getUniformLocation(_r3, "u_texture"), 0);
                    }

                    (!this.glImgData || this.glImgData.length < h * f * 4) && (this.glImgData = new Uint8Array(h * f * 4)), _n2.texImage2D(_n2.TEXTURE_2D, 0, _n2.RGBA, _n2.RGBA, _n2.UNSIGNED_BYTE, e);
                    _i = c._onLog ? Date.now() : 0;
                    _n2.drawArrays(_n2.TRIANGLE_STRIP, 0, 4), c._onLog && c._onLog("Grey cost: " + (Date.now() - _i));
                    _o = this.glImgData;

                    _n2.readPixels(0, 0, _n2.drawingBufferWidth, _n2.drawingBufferHeight, _n2.RGBA, _n2.UNSIGNED_BYTE, _o);

                    _s2 = c._onLog ? Date.now() : 0, _a3 = h * f;
                    (!this.bufferShared || this.bufferShared.length < _a3) && (this.bufferShared = new Uint8Array(_a3));
                    _d = this.bufferShared;

                    for (_e17 = 0; _e17 < _a3; ++_e17) {
                      _t12 = 4 * _e17;
                      _d[_e17] = _o[_t12];
                    }

                    c._onLog && c._onLog("Extract grey cost: " + (Date.now() - _s2));
                    _context18.next = 28;
                    return this._decodeBuffer_Uint8Array(_d, h, f, h, r.IPF_GrayScaled);

                  case 28:
                    return _context18.abrupt("return", _context18.sent);

                  case 29:
                    _n3 = null;
                    _iteratorNormalCompletion2 = true;
                    _didIteratorError2 = false;
                    _iteratorError2 = undefined;
                    _context18.prev = 33;
                    _iterator2 = this.videoCvses[Symbol.iterator]();

                  case 35:
                    if (_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done) {
                      _context18.next = 43;
                      break;
                    }

                    _e19 = _step2.value;

                    if (!(_e19.width == h && _e19.height == f)) {
                      _context18.next = 40;
                      break;
                    }

                    _n3 = _e19;
                    return _context18.abrupt("break", 43);

                  case 40:
                    _iteratorNormalCompletion2 = true;
                    _context18.next = 35;
                    break;

                  case 43:
                    _context18.next = 49;
                    break;

                  case 45:
                    _context18.prev = 45;
                    _context18.t0 = _context18["catch"](33);
                    _didIteratorError2 = true;
                    _iteratorError2 = _context18.t0;

                  case 49:
                    _context18.prev = 49;
                    _context18.prev = 50;

                    if (!_iteratorNormalCompletion2 && _iterator2["return"] != null) {
                      _iterator2["return"]();
                    }

                  case 52:
                    _context18.prev = 52;

                    if (!_didIteratorError2) {
                      _context18.next = 55;
                      break;
                    }

                    throw _iteratorError2;

                  case 55:
                    return _context18.finish(52);

                  case 56:
                    return _context18.finish(49);

                  case 57:
                    _n3 || (self.OffscreenCanvas ? _n3 = new OffscreenCanvas(h, f) : (_n3 = document.createElement("canvas"), _n3.width = h, _n3.height = f), _n3.dbrCtx2d = _n3.getContext("2d"), this.videoCvses.length >= this.maxVideoCvsLength && (this.videoCvses = this.videoCvses.slice(1)), this.videoCvses.push(_n3));
                    _r4 = _n3.dbrCtx2d;
                    E ? _r4.drawImage(e, 0, 0) : _r4.drawImage(e, d, l, u, _, 0, 0, h, f), g ? (_i3 = JSON.parse(JSON.stringify(t)), delete _i3.region) : _i3 = t;
                    _context18.next = 62;
                    return this._decode_Canvas(_n3, _i3);

                  case 62:
                    _o3 = _context18.sent;

                    if (!(g && _o3.length > 0)) {
                      _context18.next = 83;
                      break;
                    }

                    _iteratorNormalCompletion3 = true;
                    _didIteratorError3 = false;
                    _iteratorError3 = undefined;
                    _context18.prev = 67;

                    for (_iterator3 = _o3[Symbol.iterator](); !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
                      _e18 = _step3.value;
                      _t13 = _e18.localizationResult;
                      2 == _t13.resultCoordinateType && (_t13.x1 *= .01 * h, _t13.x2 *= .01 * h, _t13.x3 *= .01 * h, _t13.x4 *= .01 * h, _t13.y1 *= .01 * f, _t13.y2 *= .01 * f, _t13.y3 *= .01 * f, _t13.y4 *= .01 * f), _t13.x1 += d, _t13.x2 += d, _t13.x3 += d, _t13.x4 += d, _t13.y1 += l, _t13.y2 += l, _t13.y3 += l, _t13.y4 += l, 2 == _t13.resultCoordinateType && (_t13.x1 *= 100 / u, _t13.x2 *= 100 / u, _t13.x3 *= 100 / u, _t13.x4 *= 100 / u, _t13.y1 *= 100 / _, _t13.y2 *= 100 / _, _t13.y3 *= 100 / _, _t13.y4 *= 100 / _);
                    }

                    _context18.next = 75;
                    break;

                  case 71:
                    _context18.prev = 71;
                    _context18.t1 = _context18["catch"](67);
                    _didIteratorError3 = true;
                    _iteratorError3 = _context18.t1;

                  case 75:
                    _context18.prev = 75;
                    _context18.prev = 76;

                    if (!_iteratorNormalCompletion3 && _iterator3["return"] != null) {
                      _iterator3["return"]();
                    }

                  case 78:
                    _context18.prev = 78;

                    if (!_didIteratorError3) {
                      _context18.next = 81;
                      break;
                    }

                    throw _iteratorError3;

                  case 81:
                    return _context18.finish(78);

                  case 82:
                    return _context18.finish(75);

                  case 83:
                    return _context18.abrupt("return", _o3);

                  case 84:
                  case "end":
                    return _context18.stop();
                }
              }
            }, _callee18, this, [[33, 45, 49, 57], [50,, 52, 56], [67, 71, 75, 83], [76,, 78, 82]]);
          }));
        }
      }, {
        key: "_decode_Base64",
        value: function _decode_Base64(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee19() {
            var _t14, _n4, _r5, _i4;

            return regeneratorRuntime.wrap(function _callee19$(_context19) {
              while (1) {
                switch (_context19.prev = _context19.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("_decode_Base64(base64Str)"), "string" != typeof e && "object" != _typeof(e))) {
                      _context19.next = 2;
                      break;
                    }

                    return _context19.abrupt("return", Promise.reject("'_decode_Base64(base64Str, config)': Type of 'base64Str' should be 'String'."));

                  case 2:
                    if (!("data:image/" == e.substring(0, 11) && (e = e.substring(e.indexOf(",") + 1)), l)) {
                      _context19.next = 7;
                      break;
                    }

                    _t14 = Buffer.from(e, "base64");
                    _context19.next = 6;
                    return this._decodeFileInMemory_Uint8Array(new Uint8Array(_t14));

                  case 6:
                    return _context19.abrupt("return", _context19.sent);

                  case 7:
                    _n4 = atob(e), _r5 = _n4.length, _i4 = new Uint8Array(_r5);

                    for (; _r5--;) {
                      _i4[_r5] = _n4.charCodeAt(_r5);
                    }

                    _context19.next = 11;
                    return this._decode_Blob(new Blob([_i4]), t);

                  case 11:
                    return _context19.abrupt("return", _context19.sent);

                  case 12:
                  case "end":
                    return _context19.stop();
                }
              }
            }, _callee19, this);
          }));
        }
      }, {
        key: "_decode_Url",
        value: function _decode_Url(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee21() {
            var _this9 = this;

            var _t15, _n6;

            return regeneratorRuntime.wrap(function _callee21$(_context21) {
              while (1) {
                switch (_context21.prev = _context21.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("_decode_Url(url)"), "string" != typeof e && "object" != _typeof(e))) {
                      _context21.next = 2;
                      break;
                    }

                    throw TypeError("'_decode_Url(url, config)': Type of 'url' should be 'String'.");

                  case 2:
                    if (!l) {
                      _context21.next = 9;
                      break;
                    }

                    _context21.next = 5;
                    return new Promise(function (t, r) {
                      (e.startsWith("https") ? n(2) : n(3)).get(e, function (e) {
                        if (200 == e.statusCode) {
                          var _n5 = [];
                          e.on("data", function (e) {
                            _n5.push(e);
                          }).on("end", function () {
                            t(new Uint8Array(Buffer.concat(_n5)));
                          });
                        } else r("http get fail, statusCode: " + e.statusCode);
                      });
                    });

                  case 5:
                    _t15 = _context21.sent;
                    _context21.next = 8;
                    return this._decodeFileInMemory_Uint8Array(_t15);

                  case 8:
                    return _context21.abrupt("return", _context21.sent);

                  case 9:
                    _context21.next = 11;
                    return new Promise(function (t, n) {
                      var r = new XMLHttpRequest();
                      r.open("GET", e, !0), r.responseType = "blob", r.send(), r.onloadend = function () {
                        return a(_this9, void 0, void 0,
                        /*#__PURE__*/
                        regeneratorRuntime.mark(function _callee20() {
                          return regeneratorRuntime.wrap(function _callee20$(_context20) {
                            while (1) {
                              switch (_context20.prev = _context20.next) {
                                case 0:
                                  t(r.response);

                                case 1:
                                case "end":
                                  return _context20.stop();
                              }
                            }
                          }, _callee20);
                        }));
                      }, r.onerror = function () {
                        n(new Error("Network Error: " + r.statusText));
                      };
                    });

                  case 11:
                    _n6 = _context21.sent;
                    _context21.next = 14;
                    return this._decode_Blob(_n6, t);

                  case 14:
                    return _context21.abrupt("return", _context21.sent);

                  case 15:
                  case "end":
                    return _context21.stop();
                }
              }
            }, _callee21, this);
          }));
        }
      }, {
        key: "_decode_FilePath",
        value: function _decode_FilePath(e, t) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee22() {
            var t, r;
            return regeneratorRuntime.wrap(function _callee22$(_context22) {
              while (1) {
                switch (_context22.prev = _context22.next) {
                  case 0:
                    if (!(c._onLog && c._onLog("_decode_FilePath(path)"), !l)) {
                      _context22.next = 2;
                      break;
                    }

                    throw Error("'_decode_FilePath(path, config)': The method is only supported in node environment.");

                  case 2:
                    if (!("string" != typeof e && "object" != _typeof(e))) {
                      _context22.next = 4;
                      break;
                    }

                    throw TypeError("'_decode_FilePath(path, config)': Type of 'path' should be 'String'.");

                  case 4:
                    t = n(4);
                    _context22.next = 7;
                    return new Promise(function (n, r) {
                      t.readFile(e, function (e, t) {
                        e ? r(e) : n(new Uint8Array(t));
                      });
                    });

                  case 7:
                    r = _context22.sent;
                    _context22.next = 10;
                    return this._decodeFileInMemory_Uint8Array(r);

                  case 10:
                    return _context22.abrupt("return", _context22.sent);

                  case 11:
                  case "end":
                    return _context22.stop();
                }
              }
            }, _callee22, this);
          }));
        }
      }, {
        key: "_handleRetJsonString",
        value: function _handleRetJsonString(e) {
          var t = i;

          if (e.textResults) {
            for (var _t16 = 0; _t16 < e.textResults.length; _t16++) {
              var _n7 = e.textResults[_t16];

              try {
                var _e20 = _n7.barcodeText,
                    _t17 = "";

                for (var _n8 = 0; _n8 < _e20.length; _n8++) {
                  _t17 += String.fromCharCode(_e20[_n8]);
                }

                try {
                  _n7.barcodeText = decodeURIComponent(escape(_t17));
                } catch (e) {
                  _n7.barcodeText = _t17;
                }
              } catch (e) {
                _n7.barcodeText = "";
              }

              if (null != _n7.exception) {
                (function () {
                  console.warn(_n7.exception);
                  var e = {};
                  _n7.exception.split(";").forEach(function (t) {
                    var n = t.indexOf(":");
                    e[t.substring(0, n)] = t.substring(n + 1);
                  }), _n7.exception = e;
                })();
              }
            }

            return e.decodeRecords && (this.decodeRecords = e.decodeRecords), this._lastErrorCode = e.exception, this._lastErrorString = e.description, e.textResults;
          }

          if (e.exception == t.DBR_SUCCESS) return e.data;
          throw c.BarcodeReaderException(e.exception, e.description);
        }
      }, {
        key: "setModeArgument",
        value: function setModeArgument(e, t, n, r) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee23() {
            var _this10 = this;

            return regeneratorRuntime.wrap(function _callee23$(_context23) {
              while (1) {
                switch (_context23.prev = _context23.next) {
                  case 0:
                    _context23.next = 2;
                    return new Promise(function (i, o) {
                      var s = c._nextTaskID++;
                      c._taskCallbackMap.set(s, function (e) {
                        if (e.success) {
                          try {
                            _this10._handleRetJsonString(e.setReturn);
                          } catch (e) {
                            return o(e);
                          }

                          return i();
                        }

                        {
                          var _t18 = new Error(e.message);

                          return _t18.stack = e.stack + "\n" + _t18.stack, o(_t18);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "setModeArgument",
                        id: s,
                        instanceID: _this10._instanceID,
                        body: {
                          modeName: e,
                          index: t,
                          argumentName: n,
                          argumentValue: r
                        }
                      });
                    });

                  case 2:
                    return _context23.abrupt("return", _context23.sent);

                  case 3:
                  case "end":
                    return _context23.stop();
                }
              }
            }, _callee23);
          }));
        }
      }, {
        key: "getModeArgument",
        value: function getModeArgument(e, t, n) {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee24() {
            var _this11 = this;

            return regeneratorRuntime.wrap(function _callee24$(_context24) {
              while (1) {
                switch (_context24.prev = _context24.next) {
                  case 0:
                    _context24.next = 2;
                    return new Promise(function (r, i) {
                      var o = c._nextTaskID++;
                      c._taskCallbackMap.set(o, function (e) {
                        if (e.success) {
                          var _t19;

                          try {
                            _t19 = _this11._handleRetJsonString(e.getReturn);
                          } catch (e) {
                            return i(e);
                          }

                          return r(_t19);
                        }

                        {
                          var _t20 = new Error(e.message);

                          return _t20.stack = e.stack + "\n" + _t20.stack, i(_t20);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "getModeArgument",
                        id: o,
                        instanceID: _this11._instanceID,
                        body: {
                          modeName: e,
                          index: t,
                          argumentName: n
                        }
                      });
                    });

                  case 2:
                    return _context24.abrupt("return", _context24.sent);

                  case 3:
                  case "end":
                    return _context24.stop();
                }
              }
            }, _callee24);
          }));
        }
      }, {
        key: "getIntermediateResults",
        value: function getIntermediateResults() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee25() {
            var _this12 = this;

            return regeneratorRuntime.wrap(function _callee25$(_context25) {
              while (1) {
                switch (_context25.prev = _context25.next) {
                  case 0:
                    _context25.next = 2;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) return e(n.results);
                        {
                          var _e21 = new Error(n.message);

                          return _e21.stack = n.stack + "\n" + _e21.stack, t(_e21);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "getIntermediateResults",
                        id: n,
                        instanceID: _this12._instanceID
                      });
                    });

                  case 2:
                    return _context25.abrupt("return", _context25.sent);

                  case 3:
                  case "end":
                    return _context25.stop();
                }
              }
            }, _callee25);
          }));
        }
      }, {
        key: "getIntermediateCanvas",
        value: function getIntermediateCanvas() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee26() {
            var e, t, _iteratorNormalCompletion4, _didIteratorError4, _iteratorError4, _iterator4, _step4, _n9, _iteratorNormalCompletion5, _didIteratorError5, _iteratorError5, _iterator5, _step5, _e22, _n10, _i5, _e23, _t21, _e24, _t22, _t23, _e25, _t24, _n11, _o4, _s3;

            return regeneratorRuntime.wrap(function _callee26$(_context26) {
              while (1) {
                switch (_context26.prev = _context26.next) {
                  case 0:
                    _context26.next = 2;
                    return this.getIntermediateResults();

                  case 2:
                    e = _context26.sent;
                    t = [];
                    _iteratorNormalCompletion4 = true;
                    _didIteratorError4 = false;
                    _iteratorError4 = undefined;
                    _context26.prev = 7;
                    _iterator4 = e[Symbol.iterator]();

                  case 9:
                    if (_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done) {
                      _context26.next = 64;
                      break;
                    }

                    _n9 = _step4.value;

                    if (!(_n9.dataType == o.IMRDT_IMAGE)) {
                      _context26.next = 61;
                      break;
                    }

                    _iteratorNormalCompletion5 = true;
                    _didIteratorError5 = false;
                    _iteratorError5 = undefined;
                    _context26.prev = 15;
                    _iterator5 = _n9.results[Symbol.iterator]();

                  case 17:
                    if (_iteratorNormalCompletion5 = (_step5 = _iterator5.next()).done) {
                      _context26.next = 47;
                      break;
                    }

                    _e22 = _step5.value;
                    _n10 = _e22.bytes;
                    _i5 = void 0;
                    _context26.t0 = (c._onLog && c._onLog(" " + _n10.length + " " + _n10.byteLength + " " + _e22.width + " " + _e22.height + " " + _e22.stride + " " + _e22.format), _e22.format);
                    _context26.next = _context26.t0 === r.IPF_ABGR_8888 ? 24 : _context26.t0 === r.IPF_RGB_888 ? 26 : _context26.t0 === r.IPF_GrayScaled ? 30 : _context26.t0 === r.IPF_Binary ? 34 : _context26.t0 === r.IPF_BinaryInverted ? 34 : 39;
                    break;

                  case 24:
                    _i5 = new Uint8ClampedArray(_n10);
                    return _context26.abrupt("break", 40);

                  case 26:
                    _e23 = _n10.length / 3;
                    _i5 = new Uint8ClampedArray(4 * _e23);

                    for (_t21 = 0; _t21 < _e23; ++_t21) {
                      _i5[4 * _t21] = _n10[3 * _t21 + 2], _i5[4 * _t21 + 1] = _n10[3 * _t21 + 1], _i5[4 * _t21 + 2] = _n10[3 * _t21], _i5[4 * _t21 + 3] = 255;
                    }

                    return _context26.abrupt("break", 40);

                  case 30:
                    _e24 = _n10.length;
                    _i5 = new Uint8ClampedArray(4 * _e24);

                    for (_t22 = 0; _t22 < _e24; _t22++) {
                      _i5[4 * _t22] = _i5[4 * _t22 + 1] = _i5[4 * _t22 + 2] = _n10[_t22], _i5[4 * _t22 + 3] = 255;
                    }

                    return _context26.abrupt("break", 40);

                  case 34:
                    _e22.width = 8 * _e22.stride, _e22.height = _n10.length / _e22.stride;
                    _t23 = _n10.length;
                    _i5 = new Uint8ClampedArray(8 * _t23 * 4);

                    for (_e25 = 0; _e25 < _t23; _e25++) {
                      _t24 = _n10[_e25];

                      for (_n11 = 0; _n11 < 8; ++_n11) {
                        _i5[4 * (8 * _e25 + _n11)] = _i5[4 * (8 * _e25 + _n11) + 1] = _i5[4 * (8 * _e25 + _n11) + 2] = (128 & _t24) / 128 * 255, _i5[4 * (8 * _e25 + _n11) + 3] = 255, _t24 <<= 1;
                      }
                    }

                    return _context26.abrupt("break", 40);

                  case 39:
                    console.log("unknow intermediate image", _e22);

                  case 40:
                    if (_i5) {
                      _context26.next = 42;
                      break;
                    }

                    return _context26.abrupt("continue", 44);

                  case 42:
                    _o4 = new ImageData(_i5, _e22.width, _e22.height), _s3 = document.createElement("canvas");
                    _s3.width = _e22.width, _s3.height = _e22.height, _s3.getContext("2d").putImageData(_o4, 0, 0), t.push(_s3);

                  case 44:
                    _iteratorNormalCompletion5 = true;
                    _context26.next = 17;
                    break;

                  case 47:
                    _context26.next = 53;
                    break;

                  case 49:
                    _context26.prev = 49;
                    _context26.t1 = _context26["catch"](15);
                    _didIteratorError5 = true;
                    _iteratorError5 = _context26.t1;

                  case 53:
                    _context26.prev = 53;
                    _context26.prev = 54;

                    if (!_iteratorNormalCompletion5 && _iterator5["return"] != null) {
                      _iterator5["return"]();
                    }

                  case 56:
                    _context26.prev = 56;

                    if (!_didIteratorError5) {
                      _context26.next = 59;
                      break;
                    }

                    throw _iteratorError5;

                  case 59:
                    return _context26.finish(56);

                  case 60:
                    return _context26.finish(53);

                  case 61:
                    _iteratorNormalCompletion4 = true;
                    _context26.next = 9;
                    break;

                  case 64:
                    _context26.next = 70;
                    break;

                  case 66:
                    _context26.prev = 66;
                    _context26.t2 = _context26["catch"](7);
                    _didIteratorError4 = true;
                    _iteratorError4 = _context26.t2;

                  case 70:
                    _context26.prev = 70;
                    _context26.prev = 71;

                    if (!_iteratorNormalCompletion4 && _iterator4["return"] != null) {
                      _iterator4["return"]();
                    }

                  case 73:
                    _context26.prev = 73;

                    if (!_didIteratorError4) {
                      _context26.next = 76;
                      break;
                    }

                    throw _iteratorError4;

                  case 76:
                    return _context26.finish(73);

                  case 77:
                    return _context26.finish(70);

                  case 78:
                    return _context26.abrupt("return", t);

                  case 79:
                  case "end":
                    return _context26.stop();
                }
              }
            }, _callee26, this, [[7, 66, 70, 78], [15, 49, 53, 61], [54,, 56, 60], [71,, 73, 77]]);
          }));
        }
      }, {
        key: "destroy",
        value: function destroy() {
          var _this13 = this;

          return c._onLog && c._onLog("destroy()"), this.bDestroyed = !0, new Promise(function (e, t) {
            var n = c._nextTaskID++;
            c._taskCallbackMap.set(n, function (n) {
              if (n.success) return e();
              {
                var _e26 = new Error(n.message);

                return _e26.stack = n.stack + "\n" + _e26.stack, t(_e26);
              }
            }), c._dbrWorker.postMessage({
              type: "destroy",
              id: n,
              instanceID: _this13._instanceID
            });
          });
        }
      }, {
        key: "region",
        set: function set(e) {
          this._region = e;
        },
        get: function get() {
          return this._region;
        }
      }, {
        key: "lastErrorCode",
        get: function get() {
          return this._lastErrorCode;
        }
      }, {
        key: "lastErrorString",
        get: function get() {
          return this._lastErrorString;
        }
      }], [{
        key: "detectEnvironment",
        value: function detectEnvironment() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee27() {
            var e;
            return regeneratorRuntime.wrap(function _callee27$(_context27) {
              while (1) {
                switch (_context27.prev = _context27.next) {
                  case 0:
                    e = {
                      wasm: "undefined" != typeof WebAssembly && ("undefined" == typeof navigator || !(/Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) && /\(.+\s11_2_([2-6]).*\)/.test(navigator.userAgent))),
                      worker: !!(l ? process.version >= "v12" : "undefined" != typeof Worker),
                      getUserMedia: !("undefined" == typeof navigator || !navigator.mediaDevices || !navigator.mediaDevices.getUserMedia),
                      camera: !1,
                      browser: this.browserInfo.browser,
                      version: this.browserInfo.version,
                      OS: this.browserInfo.OS
                    };

                    if (!e.getUserMedia) {
                      _context27.next = 12;
                      break;
                    }

                    _context27.prev = 2;
                    _context27.next = 5;
                    return navigator.mediaDevices.getUserMedia({
                      video: !0
                    });

                  case 5:
                    _context27.t0 = function (e) {
                      e.stop();
                    };

                    _context27.sent.getTracks().forEach(_context27.t0);

                    e.camera = !0;
                    _context27.next = 12;
                    break;

                  case 10:
                    _context27.prev = 10;
                    _context27.t1 = _context27["catch"](2);

                  case 12:
                    return _context27.abrupt("return", e);

                  case 13:
                  case "end":
                    return _context27.stop();
                }
              }
            }, _callee27, this, [[2, 10]]);
          }));
        }
      }, {
        key: "isLoaded",
        value: function isLoaded() {
          return "loadSuccess" == this._loadWasmStatus;
        }
      }, {
        key: "loadWasm",
        value: function loadWasm() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee33() {
            var _this14 = this;

            var e;
            return regeneratorRuntime.wrap(function _callee33$(_context33) {
              while (1) {
                switch (_context33.prev = _context33.next) {
                  case 0:
                    if (!(l && process.version < "v12")) {
                      _context33.next = 2;
                      break;
                    }

                    return _context33.abrupt("return", Promise.reject("DBRJS SDK need nodejs version >= v12."));

                  case 2:
                    e = 8 == this.productKeys.length || this.productKeys.length > 8 && !this.productKeys.startsWith("t") && !this.productKeys.startsWith("f") && !this.productKeys.startsWith("P") && !this.productKeys.startsWith("L");

                    if (!(e && self.crypto && !self.crypto.subtle)) {
                      _context33.next = 7;
                      break;
                    }

                    _context33.t0 = Promise.reject("Need https to use handshake code in this browser.");
                    _context33.next = 11;
                    break;

                  case 7:
                    e && "Edge" == this.browserInfo.browser && this.engineResourcePath.startsWith(location.origin);
                    _context33.next = 10;
                    return new Promise(function (e, t) {
                      return a(_this14, void 0, void 0,
                      /*#__PURE__*/
                      regeneratorRuntime.mark(function _callee32() {
                        var _this15 = this;

                        var _e27, _t25, _r6, _e28, _i6, _o5, _s4, _u, _2;

                        return regeneratorRuntime.wrap(function _callee32$(_context32) {
                          while (1) {
                            switch (_context32.prev = _context32.next) {
                              case 0:
                                _context32.t0 = this._loadWasmStatus;
                                _context32.next = _context32.t0 === "unload" ? 3 : _context32.t0 === "loading" ? 19 : _context32.t0 === "loadSuccess" ? 21 : _context32.t0 === "loadFail" ? 23 : 24;
                                break;

                              case 3:
                                c._loadWasmStatus = "loading";
                                _e27 = new Map(), _t25 = function _t25(t, n, r) {
                                  return a(_this15, void 0, void 0,
                                  /*#__PURE__*/
                                  regeneratorRuntime.mark(function _callee28() {
                                    var i;
                                    return regeneratorRuntime.wrap(function _callee28$(_context28) {
                                      while (1) {
                                        switch (_context28.prev = _context28.next) {
                                          case 0:
                                            i = _e27.get(t);
                                            _context28.t0 = i;

                                            if (_context28.t0) {
                                              _context28.next = 7;
                                              break;
                                            }

                                            _context28.next = 5;
                                            return d.createInstance({
                                              name: t
                                            });

                                          case 5:
                                            i = _context28.sent;

                                            _e27.set(t, i);

                                          case 7:
                                            _context28.next = 9;
                                            return i[n].apply(i, r);

                                          case 9:
                                            return _context28.abrupt("return", _context28.sent);

                                          case 10:
                                          case "end":
                                            return _context28.stop();
                                        }
                                      }
                                    }, _callee28);
                                  }));
                                }, _r6 = this.engineResourcePath + this._workerName;
                                _context32.t1 = l || this.engineResourcePath.startsWith(location.origin);

                                if (_context32.t1) {
                                  _context32.next = 10;
                                  break;
                                }

                                _context32.next = 9;
                                return fetch(_r6).then(function (e) {
                                  return e.blob();
                                }).then(function (e) {
                                  return URL.createObjectURL(e);
                                });

                              case 9:
                                _r6 = _context32.sent;

                              case 10:
                                if (!l) {
                                  _context32.next = 15;
                                  break;
                                }

                                _e28 = n(1);
                                c._dbrWorker = new _e28.Worker(_r6);
                                _context32.next = 16;
                                break;

                              case 15:
                                c._dbrWorker = new Worker(_r6);

                              case 16:
                                this._dbrWorker.onerror = function (e) {
                                  c._loadWasmStatus = "loadFail";
                                  var _iteratorNormalCompletion6 = true;
                                  var _didIteratorError6 = false;
                                  var _iteratorError6 = undefined;

                                  try {
                                    for (var _iterator6 = _this15._loadWasmCallbackArr[Symbol.iterator](), _step6; !(_iteratorNormalCompletion6 = (_step6 = _iterator6.next()).done); _iteratorNormalCompletion6 = true) {
                                      var _t26 = _step6.value;

                                      _t26(new Error(e.message));
                                    }
                                  } catch (err) {
                                    _didIteratorError6 = true;
                                    _iteratorError6 = err;
                                  } finally {
                                    try {
                                      if (!_iteratorNormalCompletion6 && _iterator6["return"] != null) {
                                        _iterator6["return"]();
                                      }
                                    } finally {
                                      if (_didIteratorError6) {
                                        throw _iteratorError6;
                                      }
                                    }
                                  }
                                };

                                _o5 = function _o5(e) {
                                  return atob(String.fromCharCode.apply(null, e).replaceAll("\n", "+").replaceAll(" ", "="));
                                }, _s4 = function _s4(e) {
                                  return self[_o5(e.c)][_o5(e.e)][_o5(e.f)]("raw", new Uint8Array(e.a.concat(e.b, e.d, e.k)), _o5(e.g), !0, [_o5(e.h), _o5(e.i)]);
                                }, _u = function _u(e, t) {
                                  return a(_this15, void 0, void 0,
                                  /*#__PURE__*/
                                  regeneratorRuntime.mark(function _callee29() {
                                    var _self$_o5$_o5$_o;

                                    var n, r, _e29, a, d, l;

                                    return regeneratorRuntime.wrap(function _callee29$(_context29) {
                                      while (1) {
                                        switch (_context29.prev = _context29.next) {
                                          case 0:
                                            n = atob(e), r = new Uint8Array(n.length);

                                            for (_e29 = 0; _e29 < n.length; ++_e29) {
                                              r[_e29] = n.charCodeAt(_e29);
                                            }

                                            a = r.subarray(0, 12), d = r.subarray(a.length);
                                            _context29.t0 = _i6;

                                            if (_context29.t0) {
                                              _context29.next = 8;
                                              break;
                                            }

                                            _context29.next = 7;
                                            return _s4(t);

                                          case 7:
                                            _i6 = _context29.sent;

                                          case 8:
                                            _context29.next = 10;
                                            return self[_o5(t.c)][_o5(t.e)][_o5(t.i)]((_self$_o5$_o5$_o = {
                                              name: _o5(t.g)
                                            }, _defineProperty(_self$_o5$_o5$_o, _o5(t.j), a), _defineProperty(_self$_o5$_o5$_o, _o5(t.l), 128), _self$_o5$_o5$_o), _i6, d);

                                          case 10:
                                            l = _context29.sent;
                                            return _context29.abrupt("return", String.fromCharCode.apply(null, new Uint8Array(l)));

                                          case 12:
                                          case "end":
                                            return _context29.stop();
                                        }
                                      }
                                    }, _callee29);
                                  }));
                                }, _2 = function _2(e, t) {
                                  return a(_this15, void 0, void 0,
                                  /*#__PURE__*/
                                  regeneratorRuntime.mark(function _callee30() {
                                    var _self$_o5$_o5$_o2;

                                    var n, _t27, r, a, d, l;

                                    return regeneratorRuntime.wrap(function _callee30$(_context30) {
                                      while (1) {
                                        switch (_context30.prev = _context30.next) {
                                          case 0:
                                            n = new Uint8Array(e.length);

                                            for (_t27 = 0; _t27 < e.length; ++_t27) {
                                              n[_t27] = e.charCodeAt(_t27);
                                            }

                                            r = self.crypto.getRandomValues(new Uint8Array(12));
                                            _context30.t0 = _i6;

                                            if (_context30.t0) {
                                              _context30.next = 8;
                                              break;
                                            }

                                            _context30.next = 7;
                                            return _s4(t);

                                          case 7:
                                            _i6 = _context30.sent;

                                          case 8:
                                            _context30.next = 10;
                                            return self[_o5(t.c)][_o5(t.e)][_o5(t.h)]((_self$_o5$_o5$_o2 = {
                                              name: _o5(t.g)
                                            }, _defineProperty(_self$_o5$_o5$_o2, _o5(t.j), r), _defineProperty(_self$_o5$_o5$_o2, _o5(t.l), 128), _self$_o5$_o5$_o2), _i6, n);

                                          case 10:
                                            a = _context30.sent;
                                            d = new Uint8Array(a);
                                            l = new Uint8Array(r.length + d.length);
                                            return _context30.abrupt("return", (l.set(r), l.set(d, r.length), btoa(String.fromCharCode.apply(null, l))));

                                          case 14:
                                          case "end":
                                            return _context30.stop();
                                        }
                                      }
                                    }, _callee30);
                                  }));
                                };
                                this._dbrWorker.onmessage = function (e) {
                                  return a(_this15, void 0, void 0,
                                  /*#__PURE__*/
                                  regeneratorRuntime.mark(function _callee31() {
                                    var n, _iteratorNormalCompletion7, _didIteratorError7, _iteratorError7, _iterator7, _step7, _e30, _e31, _iteratorNormalCompletion8, _didIteratorError8, _iteratorError8, _iterator8, _step8, _t28, _e32, _t29, _e33, _e34, _e35;

                                    return regeneratorRuntime.wrap(function _callee31$(_context31) {
                                      while (1) {
                                        switch (_context31.prev = _context31.next) {
                                          case 0:
                                            n = e.data ? e.data : e;
                                            _context31.t0 = n.type;
                                            _context31.next = _context31.t0 === "log" ? 4 : _context31.t0 === "load" ? 6 : _context31.t0 === "task" ? 52 : _context31.t0 === "taskd" ? 61 : _context31.t0 === "taske" ? 66 : _context31.t0 === "localforage" ? 71 : 76;
                                            break;

                                          case 4:
                                            this._onLog && this._onLog(n.message);
                                            return _context31.abrupt("break", 77);

                                          case 6:
                                            if (!n.success) {
                                              _context31.next = 30;
                                              break;
                                            }

                                            c._loadWasmStatus = "loadSuccess", c._version = n.version + "(JS " + this._jsVersion + "." + this._jsEditVersion + ")", this._onLog && this._onLog("load dbr worker success");
                                            _iteratorNormalCompletion7 = true;
                                            _didIteratorError7 = false;
                                            _iteratorError7 = undefined;
                                            _context31.prev = 11;

                                            for (_iterator7 = this._loadWasmCallbackArr[Symbol.iterator](); !(_iteratorNormalCompletion7 = (_step7 = _iterator7.next()).done); _iteratorNormalCompletion7 = true) {
                                              _e30 = _step7.value;

                                              _e30();
                                            }

                                            _context31.next = 19;
                                            break;

                                          case 15:
                                            _context31.prev = 15;
                                            _context31.t1 = _context31["catch"](11);
                                            _didIteratorError7 = true;
                                            _iteratorError7 = _context31.t1;

                                          case 19:
                                            _context31.prev = 19;
                                            _context31.prev = 20;

                                            if (!_iteratorNormalCompletion7 && _iterator7["return"] != null) {
                                              _iterator7["return"]();
                                            }

                                          case 22:
                                            _context31.prev = 22;

                                            if (!_didIteratorError7) {
                                              _context31.next = 25;
                                              break;
                                            }

                                            throw _iteratorError7;

                                          case 25:
                                            return _context31.finish(22);

                                          case 26:
                                            return _context31.finish(19);

                                          case 27:
                                            this._dbrWorker.onerror = null;
                                            _context31.next = 51;
                                            break;

                                          case 30:
                                            _e31 = new Error(n.message);
                                            _e31.stack = n.stack + "\n" + _e31.stack, c._loadWasmStatus = "loadFail";
                                            _iteratorNormalCompletion8 = true;
                                            _didIteratorError8 = false;
                                            _iteratorError8 = undefined;
                                            _context31.prev = 35;

                                            for (_iterator8 = this._loadWasmCallbackArr[Symbol.iterator](); !(_iteratorNormalCompletion8 = (_step8 = _iterator8.next()).done); _iteratorNormalCompletion8 = true) {
                                              _t28 = _step8.value;

                                              _t28(_e31);
                                            }

                                            _context31.next = 43;
                                            break;

                                          case 39:
                                            _context31.prev = 39;
                                            _context31.t2 = _context31["catch"](35);
                                            _didIteratorError8 = true;
                                            _iteratorError8 = _context31.t2;

                                          case 43:
                                            _context31.prev = 43;
                                            _context31.prev = 44;

                                            if (!_iteratorNormalCompletion8 && _iterator8["return"] != null) {
                                              _iterator8["return"]();
                                            }

                                          case 46:
                                            _context31.prev = 46;

                                            if (!_didIteratorError8) {
                                              _context31.next = 49;
                                              break;
                                            }

                                            throw _iteratorError8;

                                          case 49:
                                            return _context31.finish(46);

                                          case 50:
                                            return _context31.finish(43);

                                          case 51:
                                            return _context31.abrupt("break", 77);

                                          case 52:
                                            _e32 = n.id, _t29 = n.body;
                                            _context31.prev = 53;
                                            this._taskCallbackMap.get(_e32)(_t29), this._taskCallbackMap["delete"](_e32);
                                            _context31.next = 60;
                                            break;

                                          case 57:
                                            _context31.prev = 57;
                                            _context31.t3 = _context31["catch"](53);
                                            throw this._taskCallbackMap["delete"](_e32), _context31.t3;

                                          case 60:
                                            return _context31.abrupt("break", 77);

                                          case 61:
                                            _context31.next = 63;
                                            return _u(n.txt, n.d);

                                          case 63:
                                            _e33 = _context31.sent;

                                            this._dbrWorker.postMessage({
                                              type: "task",
                                              id: n.taskID,
                                              body: {
                                                success: !0,
                                                txt: _e33
                                              }
                                            });

                                            return _context31.abrupt("break", 77);

                                          case 66:
                                            _context31.next = 68;
                                            return _2(n.txt, n.d);

                                          case 68:
                                            _e34 = _context31.sent;

                                            this._dbrWorker.postMessage({
                                              type: "task",
                                              id: n.taskID,
                                              body: {
                                                success: !0,
                                                txt: _e34
                                              }
                                            });

                                            return _context31.abrupt("break", 77);

                                          case 71:
                                            _context31.next = 73;
                                            return _t25(n.dbname, n.method, n.paras);

                                          case 73:
                                            _e35 = _context31.sent;

                                            this._dbrWorker.postMessage({
                                              type: "task",
                                              id: n.taskID,
                                              body: {
                                                success: !0,
                                                result: _e35
                                              }
                                            });

                                            return _context31.abrupt("break", 77);

                                          case 76:
                                            this._onLog && this._onLog(e);

                                          case 77:
                                          case "end":
                                            return _context31.stop();
                                        }
                                      }
                                    }, _callee31, this, [[11, 15, 19, 27], [20,, 22, 26], [35, 39, 43, 51], [44,, 46, 50], [53, 57]]);
                                  }));
                                }, l && this._dbrWorker.on("message", this._dbrWorker.onmessage), this._dbrWorker.postMessage({
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
                                });

                              case 19:
                                this._loadWasmCallbackArr.push(function (n) {
                                  n ? t(n) : e();
                                });

                                return _context32.abrupt("break", 24);

                              case 21:
                                e();
                                return _context32.abrupt("break", 24);

                              case 23:
                                t();

                              case 24:
                              case "end":
                                return _context32.stop();
                            }
                          }
                        }, _callee32, this);
                      }));
                    });

                  case 10:
                    _context33.t0 = _context33.sent;

                  case 11:
                    return _context33.abrupt("return", _context33.t0);

                  case 12:
                  case "end":
                    return _context33.stop();
                }
              }
            }, _callee33, this);
          }));
        }
      }, {
        key: "createInstanceInWorker",
        value: function createInstanceInWorker() {
          var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : !1;
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee34() {
            var _this16 = this;

            return regeneratorRuntime.wrap(function _callee34$(_context34) {
              while (1) {
                switch (_context34.prev = _context34.next) {
                  case 0:
                    _context34.next = 2;
                    return this.loadWasm();

                  case 2:
                    _context34.next = 4;
                    return new Promise(function (t, n) {
                      var r = c._nextTaskID++;
                      _this16._taskCallbackMap.set(r, function (e) {
                        if (e.success) return t(e.instanceID);
                        {
                          var _t30 = new Error(e.message);

                          return _t30.stack = e.stack + "\n" + _t30.stack, n(_t30);
                        }
                      }), _this16._dbrWorker.postMessage({
                        type: "createInstance",
                        id: r,
                        productKeys: "",
                        bScanner: e
                      });
                    });

                  case 4:
                    return _context34.abrupt("return", _context34.sent);

                  case 5:
                  case "end":
                    return _context34.stop();
                }
              }
            }, _callee34, this);
          }));
        }
      }, {
        key: "createInstance",
        value: function createInstance() {
          return a(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee35() {
            var e;
            return regeneratorRuntime.wrap(function _callee35$(_context35) {
              while (1) {
                switch (_context35.prev = _context35.next) {
                  case 0:
                    e = new c();
                    _context35.next = 3;
                    return this.createInstanceInWorker();

                  case 3:
                    e._instanceID = _context35.sent;
                    return _context35.abrupt("return", e);

                  case 5:
                  case "end":
                    return _context35.stop();
                }
              }
            }, _callee35, this);
          }));
        }
      }, {
        key: "BarcodeReaderException",
        value: function BarcodeReaderException(e, t) {
          var n,
              r = i.DBR_UNKNOWN;
          return "number" == typeof e ? (r = e, n = new Error(t)) : n = new Error(e), n.code = r, n;
        }
      }, {
        key: "version",
        get: function get() {
          return this._version;
        }
      }, {
        key: "productKeys",
        get: function get() {
          return this._productKeys;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`productKeys` is not allowed to change after loadWasm is called.");
          c._productKeys = e;
        }
      }, {
        key: "handshakeCode",
        get: function get() {
          return this._productKeys;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`handshakeCode` is not allowed to change after loadWasm is called.");
          c._productKeys = e;
        }
      }, {
        key: "sessionPassword",
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`sessionPassword` is not allowed to change after loadWasm is called.");
          this._sessionPassword = e;
        },
        get: function get() {
          return this._sessionPassword;
        }
      }, {
        key: "engineResourcePath",
        get: function get() {
          return this._engineResourcePath;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`engineResourcePath` is not allowed to change after loadWasm is called.");
          if (null == e && (e = "./"), l) c._engineResourcePath = e;else {
            var _t31 = document.createElement("a");

            _t31.href = e, c._engineResourcePath = _t31.href;
          }
          this._engineResourcePath.endsWith("/") || (c._engineResourcePath += "/");
        }
      }, {
        key: "licenseServer",
        get: function get() {
          return this._licenseServer;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`licenseServer` is not allowed to change after loadWasm is called.");
          if (null == e) c._licenseServer = [];else {
            e instanceof Array || (e = [e]);

            for (var _t32 = 0; _t32 < e.length; ++_t32) {
              if (!l) {
                var _n12 = document.createElement("a");

                _n12.href = e[_t32], e[_t32] = _n12.href;
              }

              e[_t32].endsWith("/") || (e[_t32] += "/");
            }

            c._licenseServer = e;
          }
        }
      }, {
        key: "deviceFriendlyName",
        get: function get() {
          return this._deviceFriendlyName;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`deviceFriendlyName` is not allowed to change after loadWasm is called.");
          c._deviceFriendlyName = e || "";
        }
      }, {
        key: "_bUseFullFeature",
        get: function get() {
          return this.__bUseFullFeature;
        },
        set: function set(e) {
          if ("unload" != this._loadWasmStatus) throw new Error("`_bUseFullFeature` is not allowed to change after loadWasm is called.");
          this.__bUseFullFeature = e;
        }
      }, {
        key: "lastErrorCode",
        get: function get() {
          return this._lastErrorCode;
        }
      }, {
        key: "lastErrorString",
        get: function get() {
          return this._lastErrorString;
        }
      }]);

      return c;
    }();

    c.bNode = l, c._jsVersion = "8.1.2", c._jsEditVersion = "20210121", c._version = "loading...(JS " + c._jsVersion + "." + c._jsEditVersion + ")", c._productKeys = !l && document.currentScript && (document.currentScript.getAttribute("data-productKeys") || document.currentScript.getAttribute("data-licenseKey") || document.currentScript.getAttribute("data-handshakeCode")) || "", c.browserInfo = function () {
      if (l) {
        var _e36 = n(5);

        return {
          browser: "node",
          version: process.version.substring(1),
          OS: _e36.platform() + _e36.release()
        };
      }

      var e = {
        init: function init() {
          this.browser = this.searchString(this.dataBrowser) || "unknownBrowser", this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "unknownVersion", this.OS = this.searchString(this.dataOS) || "unknownOS";
        },
        searchString: function searchString(e) {
          for (var t = 0; t < e.length; t++) {
            var n = e[t].string,
                r = e[t].prop;

            if (this.versionSearchString = e[t].versionSearch || e[t].identity, n) {
              if (-1 != n.indexOf(e[t].subString)) return e[t].identity;
            } else if (r) return e[t].identity;
          }
        },
        searchVersion: function searchVersion(e) {
          var t = e.indexOf(this.versionSearchString);
          if (-1 != t) return parseFloat(e.substring(t + this.versionSearchString.length + 1));
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
      };
    }(), c._workerName = "dbr-" + c._jsVersion + ".worker.js", c._bUseIndexDB = !0, c._engineResourcePath = function () {
      if (l) return __dirname + "/";

      if (document.currentScript) {
        var _e37 = document.currentScript.src,
            _t33 = _e37.indexOf("?");

        if (-1 != _t33) _e37 = _e37.substring(0, _t33);else {
          var _t34 = _e37.indexOf("#");

          -1 != _t34 && (_e37 = _e37.substring(0, _t34));
        }
        return _e37.substring(0, _e37.lastIndexOf("/") + 1);
      }

      return "./";
    }(), c._licenseServer = [], c._deviceFriendlyName = "", c._isShowRelDecodeTimeInResults = !1, c._bWasmDebug = !1, c._bSendSmallRecordsForDebug = !1, c.__bUseFullFeature = l, c._nextTaskID = 0, c._taskCallbackMap = new Map(), c._loadWasmStatus = "unload", c._loadWasmCallbackArr = [], c._lastErrorCode = 0, c._lastErrorString = "";

    var u = function u(e, t, n, r) {
      return new (n || (n = Promise))(function (i, o) {
        function s(e) {
          try {
            d(r.next(e));
          } catch (e) {
            o(e);
          }
        }

        function a(e) {
          try {
            d(r["throw"](e));
          } catch (e) {
            o(e);
          }
        }

        function d(e) {
          var t;
          e.done ? i(e.value) : (t = e.value, t instanceof n ? t : new n(function (e) {
            e(t);
          })).then(s, a);
        }

        d((r = r.apply(e, t || [])).next());
      });
    };

    var _ = !!("object" == (typeof global === "undefined" ? "undefined" : _typeof(global)) && global.process && global.process.release && global.process.release.name && "undefined" == typeof HTMLCanvasElement);

    var h =
    /*#__PURE__*/
    function (_c) {
      _inherits(h, _c);

      function h() {
        var _this17;

        _classCallCheck(this, h);

        _this17 = _possibleConstructorReturn(this, _getPrototypeOf(h).call(this)), _this17.styleEls = [], _this17.videoSettings = {
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
        }, _this17._singleFrameMode = !(navigator && navigator.mediaDevices && navigator.mediaDevices.getUserMedia), _this17._singleFrameModeIpt = function () {
          var e = document.createElement("input");
          return e.setAttribute("type", "file"), e.setAttribute("accept", "image/*"), e.setAttribute("capture", ""), e.addEventListener("change", function () {
            return u(_assertThisInitialized(_this17), void 0, void 0,
            /*#__PURE__*/
            regeneratorRuntime.mark(function _callee36() {
              var t, n, _iteratorNormalCompletion9, _didIteratorError9, _iteratorError9, _iterator9, _step9, _e39, _iteratorNormalCompletion10, _didIteratorError10, _iteratorError10, _iterator10, _step10, _e38;

              return regeneratorRuntime.wrap(function _callee36$(_context36) {
                while (1) {
                  switch (_context36.prev = _context36.next) {
                    case 0:
                      t = e.files[0];
                      e.value = "";
                      _context36.next = 4;
                      return this.decode(t);

                    case 4:
                      n = _context36.sent;
                      _iteratorNormalCompletion9 = true;
                      _didIteratorError9 = false;
                      _iteratorError9 = undefined;
                      _context36.prev = 8;

                      for (_iterator9 = n[Symbol.iterator](); !(_iteratorNormalCompletion9 = (_step9 = _iterator9.next()).done); _iteratorNormalCompletion9 = true) {
                        _e39 = _step9.value;
                        delete _e39.bUnduplicated;
                      }

                      _context36.next = 16;
                      break;

                    case 12:
                      _context36.prev = 12;
                      _context36.t0 = _context36["catch"](8);
                      _didIteratorError9 = true;
                      _iteratorError9 = _context36.t0;

                    case 16:
                      _context36.prev = 16;
                      _context36.prev = 17;

                      if (!_iteratorNormalCompletion9 && _iterator9["return"] != null) {
                        _iterator9["return"]();
                      }

                    case 19:
                      _context36.prev = 19;

                      if (!_didIteratorError9) {
                        _context36.next = 22;
                        break;
                      }

                      throw _iteratorError9;

                    case 22:
                      return _context36.finish(19);

                    case 23:
                      return _context36.finish(16);

                    case 24:
                      if (!(this._drawRegionsults(n), this.onFrameRead && this._isOpen && !this._bPauseScan && this.onFrameRead(n), this.onUnduplicatedRead && this._isOpen && !this._bPauseScan)) {
                        _context36.next = 44;
                        break;
                      }

                      _iteratorNormalCompletion10 = true;
                      _didIteratorError10 = false;
                      _iteratorError10 = undefined;
                      _context36.prev = 28;

                      for (_iterator10 = n[Symbol.iterator](); !(_iteratorNormalCompletion10 = (_step10 = _iterator10.next()).done); _iteratorNormalCompletion10 = true) {
                        _e38 = _step10.value;
                        this.onUnduplicatedRead(_e38.barcodeText, _e38);
                      }

                      _context36.next = 36;
                      break;

                    case 32:
                      _context36.prev = 32;
                      _context36.t1 = _context36["catch"](28);
                      _didIteratorError10 = true;
                      _iteratorError10 = _context36.t1;

                    case 36:
                      _context36.prev = 36;
                      _context36.prev = 37;

                      if (!_iteratorNormalCompletion10 && _iterator10["return"] != null) {
                        _iterator10["return"]();
                      }

                    case 39:
                      _context36.prev = 39;

                      if (!_didIteratorError10) {
                        _context36.next = 42;
                        break;
                      }

                      throw _iteratorError10;

                    case 42:
                      return _context36.finish(39);

                    case 43:
                      return _context36.finish(36);

                    case 44:
                      _context36.next = 46;
                      return this.clearMapDecodeRecord();

                    case 46:
                    case "end":
                      return _context36.stop();
                  }
                }
              }, _callee36, this, [[8, 12, 16, 24], [17,, 19, 23], [28, 32, 36, 44], [37,, 39, 43]]);
            }));
          }), e;
        }(), _this17._clickIptSingleFrameMode = function () {
          _this17._singleFrameModeIpt.click();
        }, _this17.intervalTime = 0, _this17._isOpen = !1, _this17._bPauseScan = !1, _this17._lastDeviceId = void 0, _this17._intervalDetectVideoPause = 1e3, _this17._video = null, _this17._cvsDrawArea = null, _this17._divScanArea = null, _this17._divScanLight = null, _this17._bgLoading = null, _this17._bgCamera = null, _this17._selCam = null, _this17._selRsl = null, _this17._optGotRsl = null, _this17._btnClose = null, _this17._soundOnSuccessfullRead = new Audio("data:audio/mpeg;base64,SUQzBAAAAAAAI1RTU0UAAAAPAAADTGF2ZjU4LjI5LjEwMAAAAAAAAAAAAAAA/+M4wAAAAAAAAAAAAEluZm8AAAAPAAAABQAAAkAAgICAgICAgICAgICAgICAgICAgKCgoKCgoKCgoKCgoKCgoKCgoKCgwMDAwMDAwMDAwMDAwMDAwMDAwMDg4ODg4ODg4ODg4ODg4ODg4ODg4P//////////////////////////AAAAAExhdmM1OC41NAAAAAAAAAAAAAAAACQEUQAAAAAAAAJAk0uXRQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/+MYxAANQAbGeUEQAAHZYZ3fASqD4P5TKBgocg+Bw/8+CAYBA4XB9/4EBAEP4nB9+UOf/6gfUCAIKyjgQ/Kf//wfswAAAwQA/+MYxAYOqrbdkZGQAMA7DJLCsQxNOij///////////+tv///3RWiZGBEhsf/FO/+LoCSFs1dFVS/g8f/4Mhv0nhqAieHleLy/+MYxAYOOrbMAY2gABf/////////////////usPJ66R0wI4boY9/8jQYg//g2SPx1M0N3Z0kVJLIs///Uw4aMyvHJJYmPBYG/+MYxAgPMALBucAQAoGgaBoFQVBUFQWDv6gZBUFQVBUGgaBr5YSgqCoKhIGg7+IQVBUFQVBoGga//SsFSoKnf/iVTEFNRTMu/+MYxAYAAANIAAAAADEwMFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV"), _this17.bPlaySoundOnSuccessfulRead = !1, _this17._allCameras = [], _this17._currentCamera = null, _this17._videoTrack = null, _this17.regionMaskFillStyle = "rgba(0,0,0,0.5)", _this17.regionMaskStrokeStyle = "rgb(254,142,20)", _this17.regionMaskLineWidth = 2, _this17.barcodeFillStyle = "rgba(254,180,32,0.3)", _this17.barcodeStrokeStyle = "rgba(254,180,32,0.9)", _this17.barcodeLineWidth = 1, _this17.beingLazyDrawRegionsults = !1, _this17._indexVideoRegion = -1, _this17._onCameraSelChange = function () {
          _this17.play(_this17._selCam.value).then(function () {
            _this17._isOpen || _this17.stop();
          })["catch"](function (e) {
            alert("Play video failed: " + (e.message || e));
          });
        }, _this17._onResolutionSelChange = function () {
          var e, t;

          if (_this17._selRsl && -1 != _this17._selRsl.selectedIndex) {
            var _n13 = _this17._selRsl.options[_this17._selRsl.selectedIndex];
            e = _n13.getAttribute("data-width"), t = _n13.getAttribute("data-height");
          }

          _this17.play(void 0, e, t).then(function () {
            _this17._isOpen || _this17.stop();
          })["catch"](function (e) {
            alert("Play video failed: " + (e.message || e));
          });
        }, _this17._onCloseBtnClick = function () {
          _this17.hide();
        };
        return _this17;
      }

      _createClass(h, [{
        key: "getUIElement",
        value: function getUIElement() {
          return this.UIElement;
        }
      }, {
        key: "setUIElement",
        value: function setUIElement(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee37() {
            var _t36, _t35, _e40, _n14;

            return regeneratorRuntime.wrap(function _callee37$(_context37) {
              while (1) {
                switch (_context37.prev = _context37.next) {
                  case 0:
                    if (!("string" == typeof e || e instanceof String)) {
                      _context37.next = 16;
                      break;
                    }

                    if (e.trim().startsWith("<")) {
                      _context37.next = 10;
                      break;
                    }

                    _context37.next = 4;
                    return fetch(e);

                  case 4:
                    _t36 = _context37.sent;

                    if (_t36.ok) {
                      _context37.next = 7;
                      break;
                    }

                    throw Error("Network Error: " + _t36.statusText);

                  case 7:
                    _context37.next = 9;
                    return _t36.text();

                  case 9:
                    e = _context37.sent;

                  case 10:
                    if (e.trim().startsWith("<")) {
                      _context37.next = 12;
                      break;
                    }

                    throw Error("setUIElement(elementOrUrl): Can't get valid HTMLElement.");

                  case 12:
                    _t35 = document.createElement("div");
                    _t35.innerHTML = e;

                    for (_e40 = 0; _e40 < _t35.childElementCount; ++_e40) {
                      _n14 = _t35.children[_e40];
                      _n14 instanceof HTMLStyleElement && (this.styleEls.push(_n14), document.head.append(_n14));
                    }

                    (e = 1 == _t35.childElementCount ? _t35.children[0] : _t35).remove();

                  case 16:
                    this.UIElement = e;

                  case 17:
                  case "end":
                    return _context37.stop();
                }
              }
            }, _callee37, this);
          }));
        }
      }, {
        key: "_assertOpen",
        value: function _assertOpen() {
          if (!this._isOpen) throw Error("The scanner is not open.");
        }
      }, {
        key: "decode",
        value: function decode(e) {
          return _get(_getPrototypeOf(h.prototype), "decode", this).call(this, e);
        }
      }, {
        key: "decodeBase64String",
        value: function decodeBase64String(e) {
          return _get(_getPrototypeOf(h.prototype), "decodeBase64String", this).call(this, e);
        }
      }, {
        key: "decodeUrl",
        value: function decodeUrl(e) {
          return _get(_getPrototypeOf(h.prototype), "decodeUrl", this).call(this, e);
        }
      }, {
        key: "decodeBuffer",
        value: function decodeBuffer(e, t, n, r, i, o) {
          return _get(_getPrototypeOf(h.prototype), "decodeBuffer", this).call(this, e, t, n, r, i, o);
        }
      }, {
        key: "clearMapDecodeRecord",
        value: function clearMapDecodeRecord() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee38() {
            var _this18 = this;

            return regeneratorRuntime.wrap(function _callee38$(_context38) {
              while (1) {
                switch (_context38.prev = _context38.next) {
                  case 0:
                    _context38.next = 2;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) return e();
                        {
                          var _e41 = new Error(n.message);

                          return _e41.stack = n.stack + "\n" + _e41.stack, t(_e41);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "clearMapDecodeRecord",
                        id: n,
                        instanceID: _this18._instanceID
                      });
                    });

                  case 2:
                    return _context38.abrupt("return", _context38.sent);

                  case 3:
                  case "end":
                    return _context38.stop();
                }
              }
            }, _callee38);
          }));
        }
      }, {
        key: "updateRuntimeSettings",
        value: function updateRuntimeSettings(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee39() {
            var _this19 = this;

            var t, _e42, _e43, _e44, _e45, _n15, _e46, _t37, _n16;

            return regeneratorRuntime.wrap(function _callee39$(_context39) {
              while (1) {
                switch (_context39.prev = _context39.next) {
                  case 0:
                    if (!("string" == typeof e || "object" == _typeof(e) && e instanceof String)) {
                      _context39.next = 72;
                      break;
                    }

                    if (!("speed" == e)) {
                      _context39.next = 15;
                      break;
                    }

                    _context39.next = 4;
                    return this.getRuntimeSettings();

                  case 4:
                    _e42 = _context39.sent;
                    _context39.next = 7;
                    return this.resetRuntimeSettings();

                  case 7:
                    _context39.next = 9;
                    return this.getRuntimeSettings();

                  case 9:
                    t = _context39.sent;
                    t.barcodeFormatIds = _e42.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e42.barcodeFormatIds_2;
                    h.isRegionSinglePreset(_e42.region) || (t.region = _e42.region);
                    _context39.next = 70;
                    break;

                  case 15:
                    if (!("balance" == e)) {
                      _context39.next = 33;
                      break;
                    }

                    _context39.next = 18;
                    return this.getRuntimeSettings();

                  case 18:
                    _e43 = _context39.sent;
                    _context39.next = 21;
                    return this.resetRuntimeSettings();

                  case 21:
                    _context39.next = 23;
                    return this.getRuntimeSettings();

                  case 23:
                    t = _context39.sent;
                    t.barcodeFormatIds = _e43.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e43.barcodeFormatIds_2;
                    h.isRegionSinglePreset(_e43.region) || (t.region = _e43.region);
                    t.deblurLevel = 3;
                    t.expectedBarcodesCount = 512;
                    t.localizationModes = [2, 16, 0, 0, 0, 0, 0, 0];
                    t.timeout = 1e5;
                    _context39.next = 70;
                    break;

                  case 33:
                    if (!("coverage" == e)) {
                      _context39.next = 52;
                      break;
                    }

                    _context39.next = 36;
                    return this.getRuntimeSettings();

                  case 36:
                    _e44 = _context39.sent;
                    _context39.next = 39;
                    return this.resetRuntimeSettings();

                  case 39:
                    _context39.next = 41;
                    return this.getRuntimeSettings();

                  case 41:
                    t = _context39.sent;
                    t.barcodeFormatIds = _e44.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e44.barcodeFormatIds_2;
                    h.isRegionSinglePreset(_e44.region) || (t.region = _e44.region);
                    t.deblurLevel = 5;
                    t.expectedBarcodesCount = 512;
                    t.scaleDownThreshold = 1e5;
                    t.localizationModes = [2, 16, 4, 8, 0, 0, 0, 0];
                    t.timeout = 1e5;
                    _context39.next = 70;
                    break;

                  case 52:
                    if (!("single" == e)) {
                      _context39.next = 69;
                      break;
                    }

                    _context39.next = 55;
                    return this.getRuntimeSettings();

                  case 55:
                    _e45 = _context39.sent;
                    _context39.next = 58;
                    return this.resetRuntimeSettings();

                  case 58:
                    _context39.next = 60;
                    return this.getRuntimeSettings();

                  case 60:
                    t = _context39.sent;
                    t.barcodeFormatIds = _e45.barcodeFormatIds;
                    t.barcodeFormatIds_2 = _e45.barcodeFormatIds_2;
                    h.isRegionNormalPreset(_e45.region) ? t.region = JSON.parse(JSON.stringify(h.singlePresetRegion)) : t.region = _e45.region;
                    t.expectedBarcodesCount = 1;
                    t.localizationModes = [16, 2, 0, 0, 0, 0, 0, 0];
                    t.barcodeZoneMinDistanceToImageBorders = 0;
                    _context39.next = 70;
                    break;

                  case 69:
                    t = JSON.parse(e);

                  case 70:
                    _context39.next = 75;
                    break;

                  case 72:
                    if (!("object" != _typeof(e))) {
                      _context39.next = 74;
                      break;
                    }

                    throw TypeError("'UpdateRuntimeSettings(settings)': Type of 'settings' should be 'String' or 'PlainObject'.");

                  case 74:
                    if (t = JSON.parse(JSON.stringify(e)), t.region instanceof Array) {
                      _n15 = e.region;
                      [_n15.regionLeft, _n15.regionTop, _n15.regionLeft, _n15.regionBottom, _n15.regionMeasuredByPercentage].some(function (e) {
                        return void 0 !== e;
                      }) && (t.region = {
                        regionLeft: _n15.regionLeft || 0,
                        regionTop: _n15.regionTop || 0,
                        regionRight: _n15.regionRight || 0,
                        regionBottom: _n15.regionBottom || 0,
                        regionMeasuredByPercentage: _n15.regionMeasuredByPercentage || 0
                      });
                    }

                  case 75:
                    if (c._bUseFullFeature) {
                      _context39.next = 80;
                      break;
                    }

                    if (!(0 != (t.barcodeFormatIds & ~(s.BF_ONED | s.BF_QR_CODE | s.BF_PDF417 | s.BF_DATAMATRIX)) || 0 != t.barcodeFormatIds_2)) {
                      _context39.next = 78;
                      break;
                    }

                    throw Error("Some of the specified barcode formats are not supported in the compact version. Please try the full-featured version.");

                  case 78:
                    if (!(0 != t.intermediateResultTypes)) {
                      _context39.next = 80;
                      break;
                    }

                    throw Error("Intermediate results is not supported in the compact version. Please try the full-featured version.");

                  case 80:
                    if (this.bFilterRegionInJs) {
                      _e46 = t.region;
                      if (this.userDefinedRegion = JSON.parse(JSON.stringify(_e46)), _e46 instanceof Array) {
                        if (_e46.length) {
                          for (_t37 = 0; _t37 < _e46.length; ++_t37) {
                            _n16 = _e46[_t37];
                            _n16 && ((_n16.regionLeft || _n16.regionTop || _n16.regionRight || _n16.regionBottom || _n16.regionMeasuredByPercentage) && (_n16.regionLeft || _n16.regionTop || 100 != _n16.regionRight || 100 != _n16.regionBottom || !_n16.regionMeasuredByPercentage) || (_e46[_t37] = null));
                          }

                          this.region = _e46;
                        } else this.region = null;
                      } else (_e46.regionLeft || _e46.regionTop || _e46.regionRight || _e46.regionBottom || _e46.regionMeasuredByPercentage) && (_e46.regionLeft || _e46.regionTop || 100 != _e46.regionRight || 100 != _e46.regionBottom || !_e46.regionMeasuredByPercentage) ? this.region = _e46 : this.region = null;
                      t.region = {
                        regionLeft: 0,
                        regionTop: 0,
                        regionRight: 0,
                        regionBottom: 0,
                        regionMeasuredByPercentage: 0
                      };
                    } else this.userDefinedRegion = null, this.region = null;

                    _context39.next = 83;
                    return new Promise(function (e, n) {
                      var r = c._nextTaskID++;
                      c._taskCallbackMap.set(r, function (t) {
                        if (t.success) {
                          try {
                            _this19._handleRetJsonString(t.updateReturn);
                          } catch (e) {
                            n(e);
                          }

                          return e();
                        }

                        {
                          var _e47 = new Error(t.message);

                          return _e47.stack = t.stack + "\n" + _e47.stack, n(_e47);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "updateRuntimeSettings",
                        id: r,
                        instanceID: _this19._instanceID,
                        body: {
                          settings: JSON.stringify(t)
                        }
                      });
                    });

                  case 83:
                    _context39.t0 = "single" == e;

                    if (!_context39.t0) {
                      _context39.next = 93;
                      break;
                    }

                    _context39.next = 87;
                    return this.setModeArgument("BinarizationModes", 0, "EnableFillBinaryVacancy", "0");

                  case 87:
                    _context39.next = 89;
                    return this.setModeArgument("LocalizationModes", 0, "ScanDirection", "2");

                  case 89:
                    _context39.next = 91;
                    return this.setModeArgument("BinarizationModes", 0, "BlockSizeX", "71");

                  case 91:
                    _context39.next = 93;
                    return this.setModeArgument("BinarizationModes", 0, "BlockSizeY", "71");

                  case 93:
                  case "end":
                    return _context39.stop();
                }
              }
            }, _callee39, this);
          }));
        }
      }, {
        key: "_bindUI",
        value: function _bindUI() {
          var e = [this.UIElement],
              t = this.UIElement.children;
          var _iteratorNormalCompletion11 = true;
          var _didIteratorError11 = false;
          var _iteratorError11 = undefined;

          try {
            for (var _iterator11 = t[Symbol.iterator](), _step11; !(_iteratorNormalCompletion11 = (_step11 = _iterator11.next()).done); _iteratorNormalCompletion11 = true) {
              var _n18 = _step11.value;
              e.push(_n18);
            }
          } catch (err) {
            _didIteratorError11 = true;
            _iteratorError11 = err;
          } finally {
            try {
              if (!_iteratorNormalCompletion11 && _iterator11["return"] != null) {
                _iterator11["return"]();
              }
            } finally {
              if (_didIteratorError11) {
                throw _iteratorError11;
              }
            }
          }

          for (var _t38 = 0; _t38 < e.length; ++_t38) {
            var _iteratorNormalCompletion12 = true;
            var _didIteratorError12 = false;
            var _iteratorError12 = undefined;

            try {
              for (var _iterator12 = e[_t38].children[Symbol.iterator](), _step12; !(_iteratorNormalCompletion12 = (_step12 = _iterator12.next()).done); _iteratorNormalCompletion12 = true) {
                var _n17 = _step12.value;
                e.push(_n17);
              }
            } catch (err) {
              _didIteratorError12 = true;
              _iteratorError12 = err;
            } finally {
              try {
                if (!_iteratorNormalCompletion12 && _iterator12["return"] != null) {
                  _iterator12["return"]();
                }
              } finally {
                if (_didIteratorError12) {
                  throw _iteratorError12;
                }
              }
            }
          }

          var n = null;

          for (var _i7 = 0, _e48 = e; _i7 < _e48.length; _i7++) {
            var _t39 = _e48[_i7];
            !this._video && _t39.classList.contains("dbrScanner-video") ? (this._video = _t39, this._video.setAttribute("playsinline", "true")) : !this._cvsDrawArea && _t39.classList.contains("dbrScanner-cvs-drawarea") ? this._cvsDrawArea = _t39 : !this._divScanArea && _t39.classList.contains("dbrScanner-cvs-scanarea") ? this._divScanArea = _t39 : !this._divScanLight && _t39.classList.contains("dbrScanner-scanlight") ? this._divScanLight = _t39 : !this._bgLoading && _t39.classList.contains("dbrScanner-bg-loading") ? this._bgLoading = _t39 : !this._bgCamera && _t39.classList.contains("dbrScanner-bg-camera") ? this._bgCamera = _t39 : !this._selCam && _t39.classList.contains("dbrScanner-sel-camera") ? this._selCam = _t39 : !this._selRsl && _t39.classList.contains("dbrScanner-sel-resolution") ? (this._selRsl = _t39, this._selRsl.options.length || (this._selRsl.innerHTML = [this._optGotRsl ? "" : '<option class="dbrScanner-opt-gotResolution" value="got"></option>', '<option data-width="3840" data-height="2160">ask 3840 x 2160</option>', '<option data-width="2560" data-height="1440">ask 2560 x 1440</option>', '<option data-width="1920" data-height="1080">ask 1920 x 1080</option>', '<option data-width="1600" data-height="1200">ask 1600 x 1200</option>', '<option data-width="1280" data-height="720">ask 1280 x 720</option>', '<option data-width="800" data-height="600">ask 800 x 600</option>', '<option data-width="640" data-height="480">ask 640 x 480</option>', '<option data-width="640" data-height="360">ask 640 x 360</option>'].join(""), this._optGotRsl = this._optGotRsl || this._selRsl.options[0])) : !this._optGotRsl && _t39.classList.contains("dbrScanner-opt-gotResolution") ? this._optGotRsl = _t39 : !this._btnClose && _t39.classList.contains("dbrScanner-btn-close") ? this._btnClose = _t39 : !this._video && _t39.classList.contains("dbrScanner-existingVideo") ? (this._video = _t39, this._video.setAttribute("playsinline", "true"), this.singleFrameMode = !1) : !n && _t39.tagName && "video" == _t39.tagName.toLowerCase() && (n = _t39);
          }

          if (!this._video && n && (this._video = n), this.singleFrameMode ? (this._video && (this._video.addEventListener("click", this._clickIptSingleFrameMode), this._video.style.cursor = "pointer", this._video.setAttribute("title", "Take a photo")), this._cvsDrawArea && (this._cvsDrawArea.addEventListener("click", this._clickIptSingleFrameMode), this._cvsDrawArea.style.cursor = "pointer", this._cvsDrawArea.setAttribute("title", "Take a photo")), this._divScanArea && (this._divScanArea.addEventListener("click", this._clickIptSingleFrameMode), this._divScanArea.style.cursor = "pointer", this._divScanArea.setAttribute("title", "Take a photo")), this._bgCamera && (this._bgCamera.style.display = "")) : this._bgLoading && (this._bgLoading.style.display = ""), this._selCam && this._selCam.addEventListener("change", this._onCameraSelChange), this._selRsl && this._selRsl.addEventListener("change", this._onResolutionSelChange), this._btnClose && this._btnClose.addEventListener("click", this._onCloseBtnClick), !this._video) throw this._unbindUI(), Error("Can not find HTMLVideoElement with class `dbrScanner-video`.");
          this._isOpen = !0;
        }
      }, {
        key: "_unbindUI",
        value: function _unbindUI() {
          this._clearRegionsults(), this.singleFrameMode ? (this._video && (this._video.removeEventListener("click", this._clickIptSingleFrameMode), this._video.style.cursor = "", this._video.removeAttribute("title")), this._cvsDrawArea && (this._cvsDrawArea.removeEventListener("click", this._clickIptSingleFrameMode), this._cvsDrawArea.style.cursor = "", this._cvsDrawArea.removeAttribute("title")), this._divScanArea && (this._divScanArea.removeEventListener("click", this._clickIptSingleFrameMode), this._divScanArea.style.cursor = "", this._divScanArea.removeAttribute("title")), this._bgCamera && (this._bgCamera.style.display = "none")) : this._bgLoading && (this._bgLoading.style.display = "none"), this._selCam && this._selCam.removeEventListener("change", this._onCameraSelChange), this._selRsl && this._selRsl.removeEventListener("change", this._onResolutionSelChange), this._btnClose && this._btnClose.removeEventListener("click", this._onCloseBtnClick), this._video = null, this._cvsDrawArea = null, this._divScanArea = null, this._divScanLight = null, this._selCam = null, this._selRsl = null, this._optGotRsl = null, this._btnClose = null, this._isOpen = !1;
        }
      }, {
        key: "_renderSelCameraInfo",
        value: function _renderSelCameraInfo() {
          var e, t;

          if (this._selCam && (e = this._selCam.value, this._selCam.innerHTML = ""), this._selCam) {
            var _iteratorNormalCompletion13 = true;
            var _didIteratorError13 = false;
            var _iteratorError13 = undefined;

            try {
              for (var _iterator13 = this._allCameras[Symbol.iterator](), _step13; !(_iteratorNormalCompletion13 = (_step13 = _iterator13.next()).done); _iteratorNormalCompletion13 = true) {
                var _n20 = _step13.value;

                var _r7 = document.createElement("option");

                _r7.value = _n20.deviceId, _r7.innerText = _n20.label, this._selCam.append(_r7), e == _n20.deviceId && (t = _r7);
              }
            } catch (err) {
              _didIteratorError13 = true;
              _iteratorError13 = err;
            } finally {
              try {
                if (!_iteratorNormalCompletion13 && _iterator13["return"] != null) {
                  _iterator13["return"]();
                }
              } finally {
                if (_didIteratorError13) {
                  throw _iteratorError13;
                }
              }
            }

            var _n19 = this._selCam.childNodes;

            if (!t && this._currentCamera && _n19.length) {
              var _iteratorNormalCompletion14 = true;
              var _didIteratorError14 = false;
              var _iteratorError14 = undefined;

              try {
                for (var _iterator14 = _n19[Symbol.iterator](), _step14; !(_iteratorNormalCompletion14 = (_step14 = _iterator14.next()).done); _iteratorNormalCompletion14 = true) {
                  var _e49 = _step14.value;

                  if (this._currentCamera.label == _e49.innerText) {
                    t = _e49;
                    break;
                  }
                }
              } catch (err) {
                _didIteratorError14 = true;
                _iteratorError14 = err;
              } finally {
                try {
                  if (!_iteratorNormalCompletion14 && _iterator14["return"] != null) {
                    _iterator14["return"]();
                  }
                } finally {
                  if (_didIteratorError14) {
                    throw _iteratorError14;
                  }
                }
              }
            }

            t && (this._selCam.value = t.value);
          }
        }
      }, {
        key: "getAllCameras",
        value: function getAllCameras() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee40() {
            var e, t, n, _r8, _i8, _o6;

            return regeneratorRuntime.wrap(function _callee40$(_context40) {
              while (1) {
                switch (_context40.prev = _context40.next) {
                  case 0:
                    _context40.next = 2;
                    return navigator.mediaDevices.enumerateDevices();

                  case 2:
                    e = _context40.sent;
                    t = [];
                    n = 0;

                    for (_r8 = 0; _r8 < e.length; _r8++) {
                      _i8 = void 0, _o6 = e[_r8];
                      "videoinput" == _o6.kind && (_i8 = {}, _i8.deviceId = _o6.deviceId, _i8.label = !_o6.label || /^camera\s[0-9]+$/.test(_o6.label) ? "camera " + n++ : _o6.label, t.push(_i8));
                    }

                    return _context40.abrupt("return", (this._allCameras = t, Promise.resolve(t)));

                  case 7:
                  case "end":
                    return _context40.stop();
                }
              }
            }, _callee40, this);
          }));
        }
      }, {
        key: "getCurrentCamera",
        value: function getCurrentCamera() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee41() {
            var e, _iteratorNormalCompletion15, _didIteratorError15, _iteratorError15, _iterator15, _step15, t, _iteratorNormalCompletion16, _didIteratorError16, _iteratorError16, _iterator16, _step16, _n21;

            return regeneratorRuntime.wrap(function _callee41$(_context41) {
              while (1) {
                switch (_context41.prev = _context41.next) {
                  case 0:
                    e = void 0;

                    if (!this._video) {
                      _context41.next = 55;
                      break;
                    }

                    _iteratorNormalCompletion15 = true;
                    _didIteratorError15 = false;
                    _iteratorError15 = undefined;
                    _context41.prev = 5;
                    _iterator15 = this._video.srcObject.getVideoTracks()[Symbol.iterator]();

                  case 7:
                    if (_iteratorNormalCompletion15 = (_step15 = _iterator15.next()).done) {
                      _context41.next = 41;
                      break;
                    }

                    t = _step15.value;

                    if (!e) {
                      _context41.next = 11;
                      break;
                    }

                    return _context41.abrupt("break", 41);

                  case 11:
                    _iteratorNormalCompletion16 = true;
                    _didIteratorError16 = false;
                    _iteratorError16 = undefined;
                    _context41.prev = 14;
                    _iterator16 = this._allCameras[Symbol.iterator]();

                  case 16:
                    if (_iteratorNormalCompletion16 = (_step16 = _iterator16.next()).done) {
                      _context41.next = 24;
                      break;
                    }

                    _n21 = _step16.value;

                    if (!(t.label == _n21.label)) {
                      _context41.next = 21;
                      break;
                    }

                    e = _n21, this._lastDeviceId = _n21.deviceId;
                    return _context41.abrupt("break", 24);

                  case 21:
                    _iteratorNormalCompletion16 = true;
                    _context41.next = 16;
                    break;

                  case 24:
                    _context41.next = 30;
                    break;

                  case 26:
                    _context41.prev = 26;
                    _context41.t0 = _context41["catch"](14);
                    _didIteratorError16 = true;
                    _iteratorError16 = _context41.t0;

                  case 30:
                    _context41.prev = 30;
                    _context41.prev = 31;

                    if (!_iteratorNormalCompletion16 && _iterator16["return"] != null) {
                      _iterator16["return"]();
                    }

                  case 33:
                    _context41.prev = 33;

                    if (!_didIteratorError16) {
                      _context41.next = 36;
                      break;
                    }

                    throw _iteratorError16;

                  case 36:
                    return _context41.finish(33);

                  case 37:
                    return _context41.finish(30);

                  case 38:
                    _iteratorNormalCompletion15 = true;
                    _context41.next = 7;
                    break;

                  case 41:
                    _context41.next = 47;
                    break;

                  case 43:
                    _context41.prev = 43;
                    _context41.t1 = _context41["catch"](5);
                    _didIteratorError15 = true;
                    _iteratorError15 = _context41.t1;

                  case 47:
                    _context41.prev = 47;
                    _context41.prev = 48;

                    if (!_iteratorNormalCompletion15 && _iterator15["return"] != null) {
                      _iterator15["return"]();
                    }

                  case 50:
                    _context41.prev = 50;

                    if (!_didIteratorError15) {
                      _context41.next = 53;
                      break;
                    }

                    throw _iteratorError15;

                  case 53:
                    return _context41.finish(50);

                  case 54:
                    return _context41.finish(47);

                  case 55:
                    return _context41.abrupt("return", (this._currentCamera = e, e));

                  case 56:
                  case "end":
                    return _context41.stop();
                }
              }
            }, _callee41, this, [[5, 43, 47, 55], [14, 26, 30, 38], [31,, 33, 37], [48,, 50, 54]]);
          }));
        }
      }, {
        key: "setCurrentCamera",
        value: function setCurrentCamera(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee42() {
            return regeneratorRuntime.wrap(function _callee42$(_context42) {
              while (1) {
                switch (_context42.prev = _context42.next) {
                  case 0:
                    _context42.next = 2;
                    return this.play(e.deviceId || e);

                  case 2:
                    return _context42.abrupt("return", _context42.sent);

                  case 3:
                  case "end":
                    return _context42.stop();
                }
              }
            }, _callee42, this);
          }));
        }
      }, {
        key: "getResolution",
        value: function getResolution() {
          return this._isOpen ? [this._video.videoWidth, this._video.videoHeight] : null;
        }
      }, {
        key: "setResolution",
        value: function setResolution(e, t) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee43() {
            var n, r;
            return regeneratorRuntime.wrap(function _callee43$(_context43) {
              while (1) {
                switch (_context43.prev = _context43.next) {
                  case 0:
                    if (!this._isOpen) {
                      _context43.next = 7;
                      break;
                    }

                    e instanceof Array ? (n = e[0], r = e[1]) : (n = e, r = t);
                    _context43.next = 4;
                    return this.play(null, n, r);

                  case 4:
                    _context43.t0 = _context43.sent;
                    _context43.next = 10;
                    break;

                  case 7:
                    _context43.next = 9;
                    return Promise.reject(new Error("The camera is not open."));

                  case 9:
                    _context43.t0 = _context43.sent;

                  case 10:
                    return _context43.abrupt("return", _context43.t0);

                  case 11:
                  case "end":
                    return _context43.stop();
                }
              }
            }, _callee43, this);
          }));
        }
      }, {
        key: "getScanSettings",
        value: function getScanSettings() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee44() {
            var _this20 = this;

            return regeneratorRuntime.wrap(function _callee44$(_context44) {
              while (1) {
                switch (_context44.prev = _context44.next) {
                  case 0:
                    _context44.next = 2;
                    return new Promise(function (e, t) {
                      var n = c._nextTaskID++;
                      c._taskCallbackMap.set(n, function (n) {
                        if (n.success) {
                          var _t40 = n.results;
                          return _t40.intervalTime = _this20.intervalTime, e(_t40);
                        }

                        {
                          var _e50 = new Error(n.message);

                          return _e50.stack += "\n" + n.stack, t(_e50);
                        }
                      }), c._dbrWorker.postMessage({
                        type: "getScanSettings",
                        id: n,
                        instanceID: _this20._instanceID
                      });
                    });

                  case 2:
                    return _context44.abrupt("return", _context44.sent);

                  case 3:
                  case "end":
                    return _context44.stop();
                }
              }
            }, _callee44);
          }));
        }
      }, {
        key: "updateScanSettings",
        value: function updateScanSettings(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee45() {
            var _this21 = this;

            return regeneratorRuntime.wrap(function _callee45$(_context45) {
              while (1) {
                switch (_context45.prev = _context45.next) {
                  case 0:
                    this.intervalTime = e.intervalTime;
                    _context45.next = 3;
                    return new Promise(function (t, n) {
                      var r = c._nextTaskID++;
                      c._taskCallbackMap.set(r, function (e) {
                        if (e.success) return t();
                        {
                          var _t41 = new Error(e.message);

                          return _t41.stack += "\n" + e.stack, n(_t41);
                        }
                      }), h._dbrWorker.postMessage({
                        type: "updateScanSettings",
                        id: r,
                        instanceID: _this21._instanceID,
                        body: {
                          settings: e
                        }
                      });
                    });

                  case 3:
                    return _context45.abrupt("return", _context45.sent);

                  case 4:
                  case "end":
                    return _context45.stop();
                }
              }
            }, _callee45, this);
          }));
        }
      }, {
        key: "getVideoSettings",
        value: function getVideoSettings() {
          return JSON.parse(JSON.stringify(this.videoSettings));
        }
      }, {
        key: "updateVideoSettings",
        value: function updateVideoSettings(e) {
          return this.videoSettings = JSON.parse(JSON.stringify(e)), this._lastDeviceId = null, this._isOpen ? this.play() : Promise.resolve();
        }
      }, {
        key: "isOpen",
        value: function isOpen() {
          return this._isOpen;
        }
      }, {
        key: "_show",
        value: function _show() {
          this.UIElement.parentNode || (this.UIElement.style.position = "fixed", this.UIElement.style.left = "0", this.UIElement.style.top = "0", document.body.append(this.UIElement)), "none" == this.UIElement.style.display && (this.UIElement.style.display = "");
        }
      }, {
        key: "stop",
        value: function stop() {
          this._video && this._video.srcObject && (c._onLog && c._onLog("======stop video========"), this._video.srcObject.getTracks().forEach(function (e) {
            e.stop();
          }), this._video.srcObject = null, this._videoTrack = null), this._video && this._video.classList.contains("dbrScanner-existingVideo") && (c._onLog && c._onLog("======stop existing video========"), this._video.pause(), this._video.currentTime = 0), this._bgLoading && (this._bgLoading.style.animationPlayState = ""), this._divScanLight && (this._divScanLight.style.display = "none");
        }
      }, {
        key: "pause",
        value: function pause() {
          this._video && this._video.pause(), this._divScanLight && (this._divScanLight.style.display = "none");
        }
      }, {
        key: "play",
        value: function play(e, t, n) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee46() {
            var _this22 = this;

            var r, i, o, s, _e51, _iteratorNormalCompletion17, _didIteratorError17, _iteratorError17, _iterator17, _step17, _e52, _t42, _e53, a, d;

            return regeneratorRuntime.wrap(function _callee46$(_context46) {
              while (1) {
                switch (_context46.prev = _context46.next) {
                  case 0:
                    if (!(this._assertOpen(), this.singleFrameMode)) {
                      _context46.next = 2;
                      break;
                    }

                    return _context46.abrupt("return", (this._clickIptSingleFrameMode(), {
                      width: 0,
                      height: 0
                    }));

                  case 2:
                    if (!(this._video && this._video.classList.contains("dbrScanner-existingVideo"))) {
                      _context46.next = 4;
                      break;
                    }

                    return _context46.abrupt("return", void this._video.play());

                  case 4:
                    _context46.t0 = this._video && this._video.srcObject;

                    if (!_context46.t0) {
                      _context46.next = 9;
                      break;
                    }

                    this.stop();
                    _context46.next = 9;
                    return new Promise(function (e) {
                      return setTimeout(e, 500);
                    });

                  case 9:
                    c._onLog && c._onLog("======before video========");
                    _context46.t1 = "Android" == c.browserInfo.OS;

                    if (!_context46.t1) {
                      _context46.next = 14;
                      break;
                    }

                    _context46.next = 14;
                    return this.getAllCameras();

                  case 14:
                    r = this.videoSettings;
                    "boolean" == typeof r.video && (r.video = {});
                    i = "iPhone" == c.browserInfo.OS;

                    if (!(i ? t >= 1280 || n >= 1280 ? r.video.width = 1280 : t >= 640 || n >= 640 ? r.video.width = 640 : (t < 640 || n < 640) && (r.video.width = 320) : (t && (r.video.width = {
                      ideal: t
                    }), n && (r.video.height = {
                      ideal: n
                    })), e)) {
                      _context46.next = 21;
                      break;
                    }

                    delete r.video.facingMode, r.video.deviceId = {
                      exact: e
                    }, this._lastDeviceId = e;
                    _context46.next = 61;
                    break;

                  case 21:
                    if (!r.video.deviceId) {
                      _context46.next = 25;
                      break;
                    }

                    ;
                    _context46.next = 61;
                    break;

                  case 25:
                    if (!this._lastDeviceId) {
                      _context46.next = 29;
                      break;
                    }

                    delete r.video.facingMode, r.video.deviceId = {
                      ideal: this._lastDeviceId
                    };
                    _context46.next = 61;
                    break;

                  case 29:
                    if (!r.video.facingMode) {
                      _context46.next = 61;
                      break;
                    }

                    _e51 = r.video.facingMode;

                    if (!(_e51 instanceof Array && _e51.length && (_e51 = _e51[0]), _e51 = _e51.exact || _e51.ideal || _e51, "environment" === _e51)) {
                      _context46.next = 61;
                      break;
                    }

                    _iteratorNormalCompletion17 = true;
                    _didIteratorError17 = false;
                    _iteratorError17 = undefined;
                    _context46.prev = 35;
                    _iterator17 = this._allCameras[Symbol.iterator]();

                  case 37:
                    if (_iteratorNormalCompletion17 = (_step17 = _iterator17.next()).done) {
                      _context46.next = 46;
                      break;
                    }

                    _e52 = _step17.value;
                    _t42 = _e52.label.toLowerCase();

                    if (!(_t42 && -1 != _t42.indexOf("facing back") && /camera[0-9]?\s0,/.test(_t42))) {
                      _context46.next = 43;
                      break;
                    }

                    delete r.video.facingMode, r.video.deviceId = {
                      ideal: _e52.deviceId
                    };
                    return _context46.abrupt("break", 46);

                  case 43:
                    _iteratorNormalCompletion17 = true;
                    _context46.next = 37;
                    break;

                  case 46:
                    _context46.next = 52;
                    break;

                  case 48:
                    _context46.prev = 48;
                    _context46.t2 = _context46["catch"](35);
                    _didIteratorError17 = true;
                    _iteratorError17 = _context46.t2;

                  case 52:
                    _context46.prev = 52;
                    _context46.prev = 53;

                    if (!_iteratorNormalCompletion17 && _iterator17["return"] != null) {
                      _iterator17["return"]();
                    }

                  case 55:
                    _context46.prev = 55;

                    if (!_didIteratorError17) {
                      _context46.next = 58;
                      break;
                    }

                    throw _iteratorError17;

                  case 58:
                    return _context46.finish(55);

                  case 59:
                    return _context46.finish(52);

                  case 60:
                    o = !!r.video.facingMode;

                  case 61:
                    c._onLog && c._onLog("======try getUserMedia========"), c._onLog && c._onLog("ask " + JSON.stringify(r.video.width) + "x" + JSON.stringify(r.video.height));
                    _context46.prev = 62;
                    c._onLog && c._onLog(r);
                    _context46.next = 66;
                    return navigator.mediaDevices.getUserMedia(r);

                  case 66:
                    s = _context46.sent;
                    _context46.next = 78;
                    break;

                  case 69:
                    _context46.prev = 69;
                    _context46.t3 = _context46["catch"](62);
                    c._onLog && c._onLog(_context46.t3);
                    c._onLog && c._onLog("======try getUserMedia again========");
                    i ? (delete r.video.width, delete r.video.height) : o ? (delete r.video.facingMode, this._allCameras.length && (r.video.deviceId = {
                      ideal: this._allCameras[this._allCameras.length - 1].deviceId
                    })) : r.video = !0;
                    c._onLog && c._onLog(r);
                    _context46.next = 77;
                    return navigator.mediaDevices.getUserMedia(r);

                  case 77:
                    s = _context46.sent;

                  case 78:
                    _e53 = s.getVideoTracks();
                    _e53.length && (this._videoTrack = _e53[0]);
                    _context46.t4 = "Android" !== c.browserInfo.OS;

                    if (!_context46.t4) {
                      _context46.next = 84;
                      break;
                    }

                    _context46.next = 84;
                    return this.getAllCameras();

                  case 84:
                    this._video.srcObject = s;
                    c._onLog && c._onLog("======play video========");
                    _context46.prev = 86;
                    _context46.next = 89;
                    return this._video.play();

                  case 89:
                    _context46.next = 97;
                    break;

                  case 91:
                    _context46.prev = 91;
                    _context46.t5 = _context46["catch"](86);
                    _context46.next = 95;
                    return new Promise(function (e) {
                      setTimeout(e, 1e3);
                    });

                  case 95:
                    _context46.next = 97;
                    return this._video.play();

                  case 97:
                    c._onLog && c._onLog("======played video========"), this._bgLoading && (this._bgLoading.style.animationPlayState = "paused"), this._drawRegionsults();
                    a = "got " + this._video.videoWidth + "x" + this._video.videoHeight;
                    this._optGotRsl && (this._optGotRsl.setAttribute("data-width", this._video.videoWidth), this._optGotRsl.setAttribute("data-height", this._video.videoHeight), this._optGotRsl.innerText = a, this._selRsl && this._optGotRsl.parentNode == this._selRsl && (this._selRsl.value = "got"));
                    c._onLog && c._onLog(a);
                    _context46.next = 103;
                    return this.getCurrentCamera();

                  case 103:
                    this._renderSelCameraInfo();

                    d = {
                      width: this._video.videoWidth,
                      height: this._video.videoHeight
                    };
                    return _context46.abrupt("return", (this.onPlayed && setTimeout(function () {
                      _this22.onPlayed(d);
                    }, 0), d));

                  case 106:
                  case "end":
                    return _context46.stop();
                }
              }
            }, _callee46, this, [[35, 48, 52, 60], [53,, 55, 59], [62, 69], [86, 91]]);
          }));
        }
      }, {
        key: "pauseScan",
        value: function pauseScan() {
          this._assertOpen(), this._bPauseScan = !0, this._divScanLight && (this._divScanLight.style.display = "none");
        }
      }, {
        key: "resumeScan",
        value: function resumeScan() {
          this._assertOpen(), this._bPauseScan = !1;
        }
      }, {
        key: "getCapabilities",
        value: function getCapabilities() {
          return this._assertOpen(), this._videoTrack.getCapabilities ? this._videoTrack.getCapabilities() : {};
        }
      }, {
        key: "getCameraSettings",
        value: function getCameraSettings() {
          return this._assertOpen(), this._videoTrack.getSettings();
        }
      }, {
        key: "getConstraints",
        value: function getConstraints() {
          return this._assertOpen(), this._videoTrack.getConstraints();
        }
      }, {
        key: "applyConstraints",
        value: function applyConstraints(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee47() {
            return regeneratorRuntime.wrap(function _callee47$(_context47) {
              while (1) {
                switch (_context47.prev = _context47.next) {
                  case 0:
                    if (!(this._assertOpen(), !this._videoTrack.applyConstraints)) {
                      _context47.next = 2;
                      break;
                    }

                    throw Error("Not support.");

                  case 2:
                    _context47.next = 4;
                    return this._videoTrack.applyConstraints(e);

                  case 4:
                    return _context47.abrupt("return", _context47.sent);

                  case 5:
                  case "end":
                    return _context47.stop();
                }
              }
            }, _callee47, this);
          }));
        }
      }, {
        key: "turnOnTorch",
        value: function turnOnTorch() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee48() {
            return regeneratorRuntime.wrap(function _callee48$(_context48) {
              while (1) {
                switch (_context48.prev = _context48.next) {
                  case 0:
                    if (!(this._assertOpen(), this.getCapabilities().torch)) {
                      _context48.next = 4;
                      break;
                    }

                    _context48.next = 3;
                    return this._videoTrack.applyConstraints({
                      advanced: [{
                        torch: !0
                      }]
                    });

                  case 3:
                    return _context48.abrupt("return", _context48.sent);

                  case 4:
                    throw Error("Not support.");

                  case 5:
                  case "end":
                    return _context48.stop();
                }
              }
            }, _callee48, this);
          }));
        }
      }, {
        key: "turnOffTorch",
        value: function turnOffTorch() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee49() {
            return regeneratorRuntime.wrap(function _callee49$(_context49) {
              while (1) {
                switch (_context49.prev = _context49.next) {
                  case 0:
                    if (!(this._assertOpen(), this.getCapabilities().torch)) {
                      _context49.next = 4;
                      break;
                    }

                    _context49.next = 3;
                    return this._videoTrack.applyConstraints({
                      advanced: [{
                        torch: !1
                      }]
                    });

                  case 3:
                    return _context49.abrupt("return", _context49.sent);

                  case 4:
                    throw Error("Not support.");

                  case 5:
                  case "end":
                    return _context49.stop();
                }
              }
            }, _callee49, this);
          }));
        }
      }, {
        key: "setColorTemperature",
        value: function setColorTemperature(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee50() {
            var t;
            return regeneratorRuntime.wrap(function _callee50$(_context50) {
              while (1) {
                switch (_context50.prev = _context50.next) {
                  case 0:
                    this._assertOpen();

                    t = this.getCapabilities().colorTemperature;

                    if (t) {
                      _context50.next = 4;
                      break;
                    }

                    throw Error("Not support.");

                  case 4:
                    e < t.min ? e = t.min : e > t.max && (e = t.max);
                    _context50.next = 7;
                    return this._videoTrack.applyConstraints({
                      advanced: [{
                        colorTemperature: e
                      }]
                    });

                  case 7:
                    return _context50.abrupt("return", _context50.sent);

                  case 8:
                  case "end":
                    return _context50.stop();
                }
              }
            }, _callee50, this);
          }));
        }
      }, {
        key: "setExposureCompensation",
        value: function setExposureCompensation(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee51() {
            var t;
            return regeneratorRuntime.wrap(function _callee51$(_context51) {
              while (1) {
                switch (_context51.prev = _context51.next) {
                  case 0:
                    this._assertOpen();

                    t = this.getCapabilities().exposureCompensation;

                    if (t) {
                      _context51.next = 4;
                      break;
                    }

                    throw Error("Not support.");

                  case 4:
                    e < t.min ? e = t.min : e > t.max && (e = t.max);
                    _context51.next = 7;
                    return this._videoTrack.applyConstraints({
                      advanced: [{
                        exposureCompensation: e
                      }]
                    });

                  case 7:
                    return _context51.abrupt("return", _context51.sent);

                  case 8:
                  case "end":
                    return _context51.stop();
                }
              }
            }, _callee51, this);
          }));
        }
      }, {
        key: "setZoom",
        value: function setZoom(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee52() {
            var t;
            return regeneratorRuntime.wrap(function _callee52$(_context52) {
              while (1) {
                switch (_context52.prev = _context52.next) {
                  case 0:
                    this._assertOpen();

                    t = this.getCapabilities().zoom;

                    if (t) {
                      _context52.next = 4;
                      break;
                    }

                    throw Error("Not support.");

                  case 4:
                    e < t.min ? e = t.min : e > t.max && (e = t.max);
                    _context52.next = 7;
                    return this._videoTrack.applyConstraints({
                      advanced: [{
                        zoom: e
                      }]
                    });

                  case 7:
                    return _context52.abrupt("return", _context52.sent);

                  case 8:
                  case "end":
                    return _context52.stop();
                }
              }
            }, _callee52, this);
          }));
        }
      }, {
        key: "setFrameRate",
        value: function setFrameRate(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee53() {
            var t;
            return regeneratorRuntime.wrap(function _callee53$(_context53) {
              while (1) {
                switch (_context53.prev = _context53.next) {
                  case 0:
                    this._assertOpen();

                    t = this.getCapabilities().frameRate;

                    if (t) {
                      _context53.next = 4;
                      break;
                    }

                    throw Error("Not support.");

                  case 4:
                    e < t.min ? e = t.min : e > t.max && (e = t.max);
                    _context53.next = 7;
                    return this._videoTrack.applyConstraints({
                      width: {
                        ideal: Math.max(this._video.videoWidth, this._video.videoHeight)
                      },
                      frameRate: e
                    });

                  case 7:
                    return _context53.abrupt("return", _context53.sent);

                  case 8:
                  case "end":
                    return _context53.stop();
                }
              }
            }, _callee53, this);
          }));
        }
      }, {
        key: "_cloneDecodeResults",
        value: function _cloneDecodeResults(e) {
          if (e instanceof Array) {
            var t = [];
            var _iteratorNormalCompletion18 = true;
            var _didIteratorError18 = false;
            var _iteratorError18 = undefined;

            try {
              for (var _iterator18 = e[Symbol.iterator](), _step18; !(_iteratorNormalCompletion18 = (_step18 = _iterator18.next()).done); _iteratorNormalCompletion18 = true) {
                var _n22 = _step18.value;
                t.push(this._cloneDecodeResults(_n22));
              }
            } catch (err) {
              _didIteratorError18 = true;
              _iteratorError18 = err;
            } finally {
              try {
                if (!_iteratorNormalCompletion18 && _iterator18["return"] != null) {
                  _iterator18["return"]();
                }
              } finally {
                if (_didIteratorError18) {
                  throw _iteratorError18;
                }
              }
            }

            return t;
          }

          {
            var _t43 = e;
            return JSON.parse(JSON.stringify(_t43, function (e, t) {
              return "oriVideoCanvas" == e || "searchRegionCanvas" == e ? void 0 : t;
            }));
          }
        }
      }, {
        key: "_loopReadVideo",
        value: function _loopReadVideo() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee54() {
            var _this23 = this;

            var e, t;
            return regeneratorRuntime.wrap(function _callee54$(_context54) {
              while (1) {
                switch (_context54.prev = _context54.next) {
                  case 0:
                    if (!this.bDestroyed) {
                      _context54.next = 2;
                      break;
                    }

                    return _context54.abrupt("return");

                  case 2:
                    if (this._isOpen) {
                      _context54.next = 6;
                      break;
                    }

                    _context54.next = 5;
                    return this.clearMapDecodeRecord();

                  case 5:
                    return _context54.abrupt("return", void _context54.sent);

                  case 6:
                    if (!(this._video.paused || this._bPauseScan)) {
                      _context54.next = 11;
                      break;
                    }

                    c._onLog && c._onLog("Video or scan is paused. Ask in 1s.");
                    _context54.next = 10;
                    return this.clearMapDecodeRecord();

                  case 10:
                    return _context54.abrupt("return", void setTimeout(function () {
                      _this23._loopReadVideo();
                    }, this._intervalDetectVideoPause));

                  case 11:
                    this._divScanLight && "none" == this._divScanLight.style.display && (this._divScanLight.style.display = ""), c._onLog && c._onLog("======= once read =======");
                    new Date().getTime();
                    c._onLog && (this._timeStartDecode = Date.now());
                    e = {};
                    if (this.region) if (this.region instanceof Array) {
                      ++this._indexVideoRegion >= this.region.length && (this._indexVideoRegion = 0);
                      t = this.region[this._indexVideoRegion];
                      t && (e.region = JSON.parse(JSON.stringify(t)));
                    } else e.region = JSON.parse(JSON.stringify(this.region));

                    this._decode_Video(this._video, e).then(function (e) {
                      if (c._onLog && c._onLog(e), _this23._isOpen && !_this23._video.paused && !_this23._bPauseScan) {
                        if (_this23.bPlaySoundOnSuccessfulRead && e.length) {
                          var _t44 = !1;

                          if (!0 === _this23.bPlaySoundOnSuccessfulRead || "frame" === _this23.bPlaySoundOnSuccessfulRead) _t44 = !0;else if ("unduplicated" === _this23.bPlaySoundOnSuccessfulRead) {
                            var _iteratorNormalCompletion19 = true;
                            var _didIteratorError19 = false;
                            var _iteratorError19 = undefined;

                            try {
                              for (var _iterator19 = e[Symbol.iterator](), _step19; !(_iteratorNormalCompletion19 = (_step19 = _iterator19.next()).done); _iteratorNormalCompletion19 = true) {
                                var _n23 = _step19.value;

                                if (_n23.bUnduplicated) {
                                  _t44 = !0;
                                  break;
                                }
                              }
                            } catch (err) {
                              _didIteratorError19 = true;
                              _iteratorError19 = err;
                            } finally {
                              try {
                                if (!_iteratorNormalCompletion19 && _iterator19["return"] != null) {
                                  _iterator19["return"]();
                                }
                              } finally {
                                if (_didIteratorError19) {
                                  throw _iteratorError19;
                                }
                              }
                            }
                          }
                          _t44 && (_this23.soundOnSuccessfullRead.currentTime = 0, _this23.soundOnSuccessfullRead.play()["catch"](function (e) {
                            console.warn("Autoplay not allowed. User interaction required.");
                          }));
                        }

                        if (_this23.onFrameRead) {
                          var _t45 = _this23._cloneDecodeResults(e);

                          var _iteratorNormalCompletion20 = true;
                          var _didIteratorError20 = false;
                          var _iteratorError20 = undefined;

                          try {
                            for (var _iterator20 = _t45[Symbol.iterator](), _step20; !(_iteratorNormalCompletion20 = (_step20 = _iterator20.next()).done); _iteratorNormalCompletion20 = true) {
                              var _e54 = _step20.value;
                              delete _e54.bUnduplicated;
                            }
                          } catch (err) {
                            _didIteratorError20 = true;
                            _iteratorError20 = err;
                          } finally {
                            try {
                              if (!_iteratorNormalCompletion20 && _iterator20["return"] != null) {
                                _iterator20["return"]();
                              }
                            } finally {
                              if (_didIteratorError20) {
                                throw _iteratorError20;
                              }
                            }
                          }

                          _this23.onFrameRead(_t45);
                        }

                        if (_this23.onUnduplicatedRead) {
                          var _iteratorNormalCompletion21 = true;
                          var _didIteratorError21 = false;
                          var _iteratorError21 = undefined;

                          try {
                            for (var _iterator21 = e[Symbol.iterator](), _step21; !(_iteratorNormalCompletion21 = (_step21 = _iterator21.next()).done); _iteratorNormalCompletion21 = true) {
                              var _t46 = _step21.value;
                              _t46.bUnduplicated && _this23.onUnduplicatedRead(_t46.barcodeText, _this23._cloneDecodeResults(_t46));
                            }
                          } catch (err) {
                            _didIteratorError21 = true;
                            _iteratorError21 = err;
                          } finally {
                            try {
                              if (!_iteratorNormalCompletion21 && _iterator21["return"] != null) {
                                _iterator21["return"]();
                              }
                            } finally {
                              if (_didIteratorError21) {
                                throw _iteratorError21;
                              }
                            }
                          }
                        }

                        _this23._drawRegionsults(e);
                      }

                      setTimeout(function () {
                        _this23._loopReadVideo();
                      }, _this23.intervalTime);
                    })["catch"](function (e) {
                      if (c._onLog && c._onLog(e.message || e), setTimeout(function () {
                        _this23._loopReadVideo();
                      }, Math.max(_this23.intervalTime, 1e3)), "platform error" != e.message) throw console.error(e.message), e;
                    });

                  case 17:
                  case "end":
                    return _context54.stop();
                }
              }
            }, _callee54, this);
          }));
        }
      }, {
        key: "_drawRegionsults",
        value: function _drawRegionsults(e) {
          var t, n, r;

          if (this.beingLazyDrawRegionsults = !1, this.singleFrameMode) {
            if (!this.oriCanvas) return;
            t = "contain", n = this.oriCanvas.width, r = this.oriCanvas.height;
          } else {
            if (!this._video) return;
            t = this._video.style.objectFit || "contain", n = this._video.videoWidth, r = this._video.videoHeight;
          }

          var i = this.region;

          if (i && (!i.regionLeft && !i.regionRight && !i.regionTop && !i.regionBottom && !i.regionMeasuredByPercentage || i instanceof Array ? i = null : i.regionMeasuredByPercentage ? i = i.regionLeft || i.regionRight || 100 !== i.regionTop || 100 !== i.regionBottom ? {
            regionLeft: Math.round(i.regionLeft / 100 * n),
            regionTop: Math.round(i.regionTop / 100 * r),
            regionRight: Math.round(i.regionRight / 100 * n),
            regionBottom: Math.round(i.regionBottom / 100 * r)
          } : null : (i = JSON.parse(JSON.stringify(i)), delete i.regionMeasuredByPercentage)), this._cvsDrawArea) {
            this._cvsDrawArea.style.objectFit = t;
            var o = this._cvsDrawArea;
            o.width = n, o.height = r;

            var _s5 = o.getContext("2d");

            if (i) {
              _s5.fillStyle = this.regionMaskFillStyle, _s5.fillRect(0, 0, o.width, o.height), _s5.globalCompositeOperation = "destination-out", _s5.fillStyle = "#000";

              var _e55 = Math.round(this.regionMaskLineWidth / 2);

              _s5.fillRect(i.regionLeft - _e55, i.regionTop - _e55, i.regionRight - i.regionLeft + 2 * _e55, i.regionBottom - i.regionTop + 2 * _e55), _s5.globalCompositeOperation = "source-over", _s5.strokeStyle = this.regionMaskStrokeStyle, _s5.lineWidth = this.regionMaskLineWidth, _s5.rect(i.regionLeft, i.regionTop, i.regionRight - i.regionLeft, i.regionBottom - i.regionTop), _s5.stroke();
            }

            if (e) {
              _s5.globalCompositeOperation = "destination-over", _s5.fillStyle = this.barcodeFillStyle, _s5.strokeStyle = this.barcodeStrokeStyle, _s5.lineWidth = this.barcodeLineWidth, e = e || [];
              var _iteratorNormalCompletion22 = true;
              var _didIteratorError22 = false;
              var _iteratorError22 = undefined;

              try {
                for (var _iterator22 = e[Symbol.iterator](), _step22; !(_iteratorNormalCompletion22 = (_step22 = _iterator22.next()).done); _iteratorNormalCompletion22 = true) {
                  var _t47 = _step22.value;
                  var _e56 = _t47.localizationResult;
                  _s5.beginPath(), _s5.moveTo(_e56.x1, _e56.y1), _s5.lineTo(_e56.x2, _e56.y2), _s5.lineTo(_e56.x3, _e56.y3), _s5.lineTo(_e56.x4, _e56.y4), _s5.fill(), _s5.beginPath(), _s5.moveTo(_e56.x1, _e56.y1), _s5.lineTo(_e56.x2, _e56.y2), _s5.lineTo(_e56.x3, _e56.y3), _s5.lineTo(_e56.x4, _e56.y4), _s5.closePath(), _s5.stroke();
                }
              } catch (err) {
                _didIteratorError22 = true;
                _iteratorError22 = err;
              } finally {
                try {
                  if (!_iteratorNormalCompletion22 && _iterator22["return"] != null) {
                    _iterator22["return"]();
                  }
                } finally {
                  if (_didIteratorError22) {
                    throw _iteratorError22;
                  }
                }
              }
            }

            this.singleFrameMode && (_s5.globalCompositeOperation = "destination-over", _s5.drawImage(this.oriCanvas, 0, 0));
          }

          if (this._divScanArea) {
            var _e57 = this._video.offsetWidth,
                _t48 = this._video.offsetHeight,
                _o7 = 1;
            _e57 / _t48 < n / r ? (_o7 = _e57 / n, this._divScanArea.style.left = "0", this._divScanArea.style.top = Math.round((_t48 - r * _o7) / 2) + "px") : (_o7 = _t48 / r, this._divScanArea.style.left = Math.round((_e57 - n * _o7) / 2) + "px", this._divScanArea.style.top = "0");

            var _s6 = i ? Math.round(i.regionLeft * _o7) : 0,
                _a4 = i ? Math.round(i.regionTop * _o7) : 0,
                _d2 = i ? Math.round(i.regionRight * _o7 - _s6) : Math.round(n * _o7),
                _l = i ? Math.round(i.regionBottom * _o7 - _a4) : Math.round(r * _o7);

            this._divScanArea.style.marginLeft = _s6 + "px", this._divScanArea.style.marginTop = _a4 + "px", this._divScanArea.style.width = _d2 + "px", this._divScanArea.style.height = _l + "px";
          }
        }
      }, {
        key: "_clearRegionsults",
        value: function _clearRegionsults() {
          this._cvsDrawArea && (this._cvsDrawArea.width = this._cvsDrawArea.height = 0);
        }
      }, {
        key: "open",
        value: function open() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee55() {
            var e;
            return regeneratorRuntime.wrap(function _callee55$(_context55) {
              while (1) {
                switch (_context55.prev = _context55.next) {
                  case 0:
                    this._bindUI();

                    _context55.next = 3;
                    return this.play();

                  case 3:
                    e = _context55.sent;
                    return _context55.abrupt("return", (this.singleFrameMode || this._loopReadVideo(), e));

                  case 5:
                  case "end":
                    return _context55.stop();
                }
              }
            }, _callee55, this);
          }));
        }
      }, {
        key: "close",
        value: function close() {
          this.stop(), this._unbindUI(), this._bPauseScan = !1;
        }
      }, {
        key: "show",
        value: function show() {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee56() {
            var e;
            return regeneratorRuntime.wrap(function _callee56$(_context56) {
              while (1) {
                switch (_context56.prev = _context56.next) {
                  case 0:
                    this._bindUI(), this._show();
                    _context56.next = 3;
                    return this.play();

                  case 3:
                    e = _context56.sent;
                    return _context56.abrupt("return", (this.singleFrameMode || this._loopReadVideo(), e));

                  case 5:
                  case "end":
                    return _context56.stop();
                }
              }
            }, _callee56, this);
          }));
        }
      }, {
        key: "hide",
        value: function hide() {
          this.stop(), this._unbindUI(), this._bPauseScan = !1, this.UIElement.style.display = "none";
        }
      }, {
        key: "destroy",
        value: function destroy() {
          var _this24 = this;

          var e = Object.create(null, {
            destroy: {
              get: function get() {
                return _get(_getPrototypeOf(h.prototype), "destroy", _this24);
              }
            }
          });
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee57() {
            var _iteratorNormalCompletion23, _didIteratorError23, _iteratorError23, _iterator23, _step23, _e58;

            return regeneratorRuntime.wrap(function _callee57$(_context57) {
              while (1) {
                switch (_context57.prev = _context57.next) {
                  case 0:
                    this.close();
                    _iteratorNormalCompletion23 = true;
                    _didIteratorError23 = false;
                    _iteratorError23 = undefined;
                    _context57.prev = 4;

                    for (_iterator23 = this.styleEls[Symbol.iterator](); !(_iteratorNormalCompletion23 = (_step23 = _iterator23.next()).done); _iteratorNormalCompletion23 = true) {
                      _e58 = _step23.value;

                      _e58.remove();
                    }

                    _context57.next = 12;
                    break;

                  case 8:
                    _context57.prev = 8;
                    _context57.t0 = _context57["catch"](4);
                    _didIteratorError23 = true;
                    _iteratorError23 = _context57.t0;

                  case 12:
                    _context57.prev = 12;
                    _context57.prev = 13;

                    if (!_iteratorNormalCompletion23 && _iterator23["return"] != null) {
                      _iterator23["return"]();
                    }

                  case 15:
                    _context57.prev = 15;

                    if (!_didIteratorError23) {
                      _context57.next = 18;
                      break;
                    }

                    throw _iteratorError23;

                  case 18:
                    return _context57.finish(15);

                  case 19:
                    return _context57.finish(12);

                  case 20:
                    this.styleEls.splice(0, this.styleEls.length);
                    _context57.t1 = this.bDestroyed;

                    if (_context57.t1) {
                      _context57.next = 25;
                      break;
                    }

                    _context57.next = 25;
                    return e.destroy.call(this);

                  case 25:
                  case "end":
                    return _context57.stop();
                }
              }
            }, _callee57, this, [[4, 8, 12, 20], [13,, 15, 19]]);
          }));
        }
      }, {
        key: "singleFrameMode",
        get: function get() {
          return this._singleFrameMode;
        },
        set: function set(e) {
          var _this25 = this;

          if (this._isOpen) throw new Error("`singleFrameMode` is not allowed to change when scanner is open.");
          this._singleFrameMode = e, this._singleFrameMode && function () {
            u(_this25, void 0, void 0,
            /*#__PURE__*/
            regeneratorRuntime.mark(function _callee58() {
              var e;
              return regeneratorRuntime.wrap(function _callee58$(_context58) {
                while (1) {
                  switch (_context58.prev = _context58.next) {
                    case 0:
                      _context58.next = 2;
                      return this.getScanSettings();

                    case 2:
                      e = _context58.sent;
                      e.oneDTrustFrameCount = 1;
                      _context58.next = 6;
                      return this.updateScanSettings(e);

                    case 6:
                    case "end":
                      return _context58.stop();
                  }
                }
              }, _callee58, this);
            }));
          }();
        }
      }, {
        key: "soundOnSuccessfullRead",
        get: function get() {
          return this._soundOnSuccessfullRead;
        },
        set: function set(e) {
          e instanceof HTMLAudioElement ? this._soundOnSuccessfullRead = e : this._soundOnSuccessfullRead = new Audio(e);
        }
      }, {
        key: "region",
        set: function set(e) {
          var _this26 = this;

          this._region = e, this.singleFrameMode || (this.beingLazyDrawRegionsults = !0, setTimeout(function () {
            _this26.beingLazyDrawRegionsults && _this26._drawRegionsults();
          }, 500));
        },
        get: function get() {
          return this._region;
        }
      }], [{
        key: "createInstance",
        value: function createInstance(e) {
          return u(this, void 0, void 0,
          /*#__PURE__*/
          regeneratorRuntime.mark(function _callee59() {
            var t, _n24;

            return regeneratorRuntime.wrap(function _callee59$(_context59) {
              while (1) {
                switch (_context59.prev = _context59.next) {
                  case 0:
                    if (!_) {
                      _context59.next = 2;
                      break;
                    }

                    throw new Error("`BarcodeScanner` is not supported in Node.js.");

                  case 2:
                    t = new h();
                    _context59.next = 5;
                    return h.createInstanceInWorker(!0);

                  case 5:
                    t._instanceID = _context59.sent;
                    ("string" == typeof e || e instanceof String) && (e = JSON.parse(e));

                    for (_n24 in e) {
                      t[_n24] = e[_n24];
                    }

                    _context59.t0 = t.UIElement;

                    if (_context59.t0) {
                      _context59.next = 12;
                      break;
                    }

                    _context59.next = 12;
                    return t.setUIElement(this.defaultUIElementURL);

                  case 12:
                    _context59.t1 = t.singleFrameMode;

                    if (_context59.t1) {
                      _context59.next = 16;
                      break;
                    }

                    _context59.next = 16;
                    return t.updateRuntimeSettings("single");

                  case 16:
                    return _context59.abrupt("return", t);

                  case 17:
                  case "end":
                    return _context59.stop();
                }
              }
            }, _callee59, this);
          }));
        }
      }, {
        key: "isRegionSinglePreset",
        value: function isRegionSinglePreset(e) {
          return JSON.stringify(e) == JSON.stringify(this.singlePresetRegion);
        }
      }, {
        key: "isRegionNormalPreset",
        value: function isRegionNormalPreset(e) {
          return 0 == e.regionLeft && 0 == e.regionTop && 0 == e.regionRight && 0 == e.regionBottom && 0 == e.regionMeasuredByPercentage;
        }
      }, {
        key: "defaultUIElementURL",
        get: function get() {
          return this._defaultUIElementURL ? this._defaultUIElementURL : c.engineResourcePath + "dbr.scanner.html";
        },
        set: function set(e) {
          this._defaultUIElementURL = e;
        }
      }]);

      return h;
    }(c);

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
    }], function (e) {
      e[e.BICM_DARK_ON_LIGHT = 1] = "BICM_DARK_ON_LIGHT", e[e.BICM_LIGHT_ON_DARK = 2] = "BICM_LIGHT_ON_DARK", e[e.BICM_DARK_ON_DARK = 4] = "BICM_DARK_ON_DARK", e[e.BICM_LIGHT_ON_LIGHT = 8] = "BICM_LIGHT_ON_LIGHT", e[e.BICM_DARK_LIGHT_MIXED = 16] = "BICM_DARK_LIGHT_MIXED", e[e.BICM_DARK_ON_LIGHT_DARK_SURROUNDING = 32] = "BICM_DARK_ON_LIGHT_DARK_SURROUNDING", e[e.BICM_SKIP = 0] = "BICM_SKIP", e[e.BICM_REV = 2147483648] = "BICM_REV";
    }(f || (f = {})), function (e) {
      e[e.BCM_AUTO = 1] = "BCM_AUTO", e[e.BCM_GENERAL = 2] = "BCM_GENERAL", e[e.BCM_SKIP = 0] = "BCM_SKIP", e[e.BCM_REV = 2147483648] = "BCM_REV";
    }(g || (g = {})), function (e) {
      e[e.BF2_NULL = 0] = "BF2_NULL", e[e.BF2_POSTALCODE = 32505856] = "BF2_POSTALCODE", e[e.BF2_NONSTANDARD_BARCODE = 1] = "BF2_NONSTANDARD_BARCODE", e[e.BF2_USPSINTELLIGENTMAIL = 1048576] = "BF2_USPSINTELLIGENTMAIL", e[e.BF2_POSTNET = 2097152] = "BF2_POSTNET", e[e.BF2_PLANET = 4194304] = "BF2_PLANET", e[e.BF2_AUSTRALIANPOST = 8388608] = "BF2_AUSTRALIANPOST", e[e.BF2_RM4SCC = 16777216] = "BF2_RM4SCC", e[e.BF2_DOTCODE = 2] = "BF2_DOTCODE";
    }(E || (E = {})), function (e) {
      e[e.BM_AUTO = 1] = "BM_AUTO", e[e.BM_LOCAL_BLOCK = 2] = "BM_LOCAL_BLOCK", e[e.BM_SKIP = 0] = "BM_SKIP", e[e.BM_THRESHOLD = 4] = "BM_THRESHOLD", e[e.BM_REV = 2147483648] = "BM_REV";
    }(R || (R = {})), function (e) {
      e[e.ECCM_CONTRAST = 1] = "ECCM_CONTRAST";
    }(I || (I = {})), function (e) {
      e[e.CFM_GENERAL = 1] = "CFM_GENERAL";
    }(v || (v = {})), function (e) {
      e[e.CCM_AUTO = 1] = "CCM_AUTO", e[e.CCM_GENERAL_HSV = 2] = "CCM_GENERAL_HSV", e[e.CCM_SKIP = 0] = "CCM_SKIP", e[e.CCM_REV = 2147483648] = "CCM_REV";
    }(A || (A = {})), function (e) {
      e[e.CICM_GENERAL = 1] = "CICM_GENERAL", e[e.CICM_SKIP = 0] = "CICM_SKIP", e[e.CICM_REV = 2147483648] = "CICM_REV";
    }(m || (m = {})), function (e) {
      e[e.CM_IGNORE = 1] = "CM_IGNORE", e[e.CM_OVERWRITE = 2] = "CM_OVERWRITE";
    }(p || (p = {})), function (e) {
      e[e.DM_SKIP = 0] = "DM_SKIP", e[e.DM_DIRECT_BINARIZATION = 1] = "DM_DIRECT_BINARIZATION", e[e.DM_THRESHOLD_BINARIZATION = 2] = "DM_THRESHOLD_BINARIZATION", e[e.DM_GRAY_EQUALIZATION = 4] = "DM_GRAY_EQUALIZATION", e[e.DM_SMOOTHING = 8] = "DM_SMOOTHING", e[e.DM_MORPHING = 16] = "DM_MORPHING", e[e.DM_DEEP_ANALYSIS = 32] = "DM_DEEP_ANALYSIS", e[e.DM_SHARPENING = 64] = "DM_SHARPENING";
    }(y || (y = {})), function (e) {
      e[e.DRM_AUTO = 1] = "DRM_AUTO", e[e.DRM_GENERAL = 2] = "DRM_GENERAL", e[e.DRM_SKIP = 0] = "DRM_SKIP", e[e.DRM_REV = 2147483648] = "DRM_REV";
    }(S || (S = {})), function (e) {
      e[e.DPMCRM_AUTO = 1] = "DPMCRM_AUTO", e[e.DPMCRM_GENERAL = 2] = "DPMCRM_GENERAL", e[e.DPMCRM_SKIP = 0] = "DPMCRM_SKIP", e[e.DPMCRM_REV = 2147483648] = "DPMCRM_REV";
    }(D || (D = {})), function (e) {
      e[e.GTM_INVERTED = 1] = "GTM_INVERTED", e[e.GTM_ORIGINAL = 2] = "GTM_ORIGINAL", e[e.GTM_SKIP = 0] = "GTM_SKIP", e[e.GTM_REV = 2147483648] = "GTM_REV";
    }(T || (T = {})), function (e) {
      e[e.IPM_AUTO = 1] = "IPM_AUTO", e[e.IPM_GENERAL = 2] = "IPM_GENERAL", e[e.IPM_GRAY_EQUALIZE = 4] = "IPM_GRAY_EQUALIZE", e[e.IPM_GRAY_SMOOTH = 8] = "IPM_GRAY_SMOOTH", e[e.IPM_SHARPEN_SMOOTH = 16] = "IPM_SHARPEN_SMOOTH", e[e.IPM_MORPHOLOGY = 32] = "IPM_MORPHOLOGY", e[e.IPM_SKIP = 0] = "IPM_SKIP", e[e.IPM_REV = 2147483648] = "IPM_REV";
    }(b || (b = {})), function (e) {
      e[e.IRSM_MEMORY = 1] = "IRSM_MEMORY", e[e.IRSM_FILESYSTEM = 2] = "IRSM_FILESYSTEM", e[e.IRSM_BOTH = 4] = "IRSM_BOTH";
    }(M || (M = {})), function (e) {
      e[e.IRT_NO_RESULT = 0] = "IRT_NO_RESULT", e[e.IRT_ORIGINAL_IMAGE = 1] = "IRT_ORIGINAL_IMAGE", e[e.IRT_COLOUR_CLUSTERED_IMAGE = 2] = "IRT_COLOUR_CLUSTERED_IMAGE", e[e.IRT_COLOUR_CONVERTED_GRAYSCALE_IMAGE = 4] = "IRT_COLOUR_CONVERTED_GRAYSCALE_IMAGE", e[e.IRT_TRANSFORMED_GRAYSCALE_IMAGE = 8] = "IRT_TRANSFORMED_GRAYSCALE_IMAGE", e[e.IRT_PREDETECTED_REGION = 16] = "IRT_PREDETECTED_REGION", e[e.IRT_PREPROCESSED_IMAGE = 32] = "IRT_PREPROCESSED_IMAGE", e[e.IRT_BINARIZED_IMAGE = 64] = "IRT_BINARIZED_IMAGE", e[e.IRT_TEXT_ZONE = 128] = "IRT_TEXT_ZONE", e[e.IRT_CONTOUR = 256] = "IRT_CONTOUR", e[e.IRT_LINE_SEGMENT = 512] = "IRT_LINE_SEGMENT", e[e.IRT_FORM = 1024] = "IRT_FORM", e[e.IRT_SEGMENTATION_BLOCK = 2048] = "IRT_SEGMENTATION_BLOCK", e[e.IRT_TYPED_BARCODE_ZONE = 4096] = "IRT_TYPED_BARCODE_ZONE", e[e.IRT_PREDETECTED_QUADRILATERAL = 8192] = "IRT_PREDETECTED_QUADRILATERAL";
    }(C || (C = {})), function (e) {
      e[e.LM_SKIP = 0] = "LM_SKIP", e[e.LM_AUTO = 1] = "LM_AUTO", e[e.LM_CONNECTED_BLOCKS = 2] = "LM_CONNECTED_BLOCKS", e[e.LM_LINES = 8] = "LM_LINES", e[e.LM_STATISTICS = 4] = "LM_STATISTICS", e[e.LM_SCAN_DIRECTLY = 16] = "LM_SCAN_DIRECTLY", e[e.LM_STATISTICS_MARKS = 32] = "LM_STATISTICS_MARKS", e[e.LM_STATISTICS_POSTAL_CODE = 64] = "LM_STATISTICS_POSTAL_CODE", e[e.LM_CENTRE = 128] = "LM_CENTRE", e[e.LM_REV = 2147483648] = "LM_REV";
    }(O || (O = {})), function (e) {
      e[e.PDFRM_RASTER = 1] = "PDFRM_RASTER", e[e.PDFRM_AUTO = 2] = "PDFRM_AUTO", e[e.PDFRM_VECTOR = 4] = "PDFRM_VECTOR", e[e.PDFRM_REV = 2147483648] = "PDFRM_REV";
    }(L || (L = {})), function (e) {
      e[e.QRECL_ERROR_CORRECTION_H = 0] = "QRECL_ERROR_CORRECTION_H", e[e.QRECL_ERROR_CORRECTION_L = 1] = "QRECL_ERROR_CORRECTION_L", e[e.QRECL_ERROR_CORRECTION_M = 2] = "QRECL_ERROR_CORRECTION_M", e[e.QRECL_ERROR_CORRECTION_Q = 3] = "QRECL_ERROR_CORRECTION_Q";
    }(N || (N = {})), function (e) {
      e[e.RPM_AUTO = 1] = "RPM_AUTO", e[e.RPM_GENERAL = 2] = "RPM_GENERAL", e[e.RPM_GENERAL_RGB_CONTRAST = 4] = "RPM_GENERAL_RGB_CONTRAST", e[e.RPM_GENERAL_GRAY_CONTRAST = 8] = "RPM_GENERAL_GRAY_CONTRAST", e[e.RPM_GENERAL_HSV_CONTRAST = 16] = "RPM_GENERAL_HSV_CONTRAST", e[e.RPM_SKIP = 0] = "RPM_SKIP", e[e.RPM_REV = 2147483648] = "RPM_REV";
    }(B || (B = {})), function (e) {
      e[e.RCT_PIXEL = 1] = "RCT_PIXEL", e[e.RCT_PERCENTAGE = 2] = "RCT_PERCENTAGE";
    }(P || (P = {})), function (e) {
      e[e.RT_STANDARD_TEXT = 0] = "RT_STANDARD_TEXT", e[e.RT_RAW_TEXT = 1] = "RT_RAW_TEXT", e[e.RT_CANDIDATE_TEXT = 2] = "RT_CANDIDATE_TEXT", e[e.RT_PARTIAL_TEXT = 3] = "RT_PARTIAL_TEXT";
    }(w || (w = {})), function (e) {
      e[e.SUM_AUTO = 1] = "SUM_AUTO", e[e.SUM_LINEAR_INTERPOLATION = 2] = "SUM_LINEAR_INTERPOLATION", e[e.SUM_NEAREST_NEIGHBOUR_INTERPOLATION = 4] = "SUM_NEAREST_NEIGHBOUR_INTERPOLATION", e[e.SUM_SKIP = 0] = "SUM_SKIP", e[e.SUM_REV = 2147483648] = "SUM_REV";
    }(F || (F = {})), function (e) {
      e[e.TP_REGION_PREDETECTED = 1] = "TP_REGION_PREDETECTED", e[e.TP_IMAGE_PREPROCESSED = 2] = "TP_IMAGE_PREPROCESSED", e[e.TP_IMAGE_BINARIZED = 4] = "TP_IMAGE_BINARIZED", e[e.TP_BARCODE_LOCALIZED = 8] = "TP_BARCODE_LOCALIZED", e[e.TP_BARCODE_TYPE_DETERMINED = 16] = "TP_BARCODE_TYPE_DETERMINED", e[e.TP_BARCODE_RECOGNIZED = 32] = "TP_BARCODE_RECOGNIZED";
    }(U || (U = {})), function (e) {
      e[e.TACM_AUTO = 1] = "TACM_AUTO", e[e.TACM_VERIFYING = 2] = "TACM_VERIFYING", e[e.TACM_VERIFYING_PATCHING = 4] = "TACM_VERIFYING_PATCHING", e[e.TACM_SKIP = 0] = "TACM_SKIP", e[e.TACM_REV = 2147483648] = "TACM_REV";
    }(k || (k = {})), function (e) {
      e[e.TFM_AUTO = 1] = "TFM_AUTO", e[e.TFM_GENERAL_CONTOUR = 2] = "TFM_GENERAL_CONTOUR", e[e.TFM_SKIP = 0] = "TFM_SKIP", e[e.TFM_REV = 2147483648] = "TFM_REV";
    }(x || (x = {})), function (e) {
      e[e.TROM_CONFIDENCE = 1] = "TROM_CONFIDENCE", e[e.TROM_POSITION = 2] = "TROM_POSITION", e[e.TROM_FORMAT = 4] = "TROM_FORMAT", e[e.TROM_SKIP = 0] = "TROM_SKIP", e[e.TROM_REV = 2147483648] = "TROM_REV";
    }(V || (V = {})), function (e) {
      e[e.TDM_AUTO = 1] = "TDM_AUTO", e[e.TDM_GENERAL_WIDTH_CONCENTRATION = 2] = "TDM_GENERAL_WIDTH_CONCENTRATION", e[e.TDM_SKIP = 0] = "TDM_SKIP", e[e.TDM_REV = 2147483648] = "TDM_REV";
    }(G || (G = {})), function (e) {
      e.DM_LM_ONED = "1", e.DM_LM_QR_CODE = "2", e.DM_LM_PDF417 = "3", e.DM_LM_DATAMATRIX = "4", e.DM_LM_AZTEC = "5", e.DM_LM_MAXICODE = "6", e.DM_LM_PATCHCODE = "7", e.DM_LM_GS1_DATABAR = "8", e.DM_LM_GS1_COMPOSITE = "9", e.DM_LM_POSTALCODE = "10", e.DM_LM_DOTCODE = "11", e.DM_LM_INTERMEDIATE_RESULT = "12", e.DM_LM_DPM = "13", e.DM_LM_NONSTANDARD_BARCODE = "16";
    }(W || (W = {})), function (e) {
      e.DM_CW_AUTO = "", e.DM_CW_DEVICE_COUNT = "DeviceCount", e.DM_CW_SCAN_COUNT = "ScanCount", e.DM_CW_CONCURRENT_DEVICE_COUNT = "ConcurrentDeviceCount", e.DM_CW_APP_DOMIAN_COUNT = "Domain", e.DM_CW_ACTIVE_DEVICE_COUNT = "ActiveDeviceCount", e.DM_CW_INSTANCE_COUNT = "InstanceCount", e.DM_CW_CONCURRENT_INSTANCE_COUNT = "ConcurrentInstanceCount";
    }(j || (j = {}));
    var H = {
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
    t["default"] = H;
  }]);
});

if (typeof dbr != "undefined") {
  if (typeof Dynamsoft == "undefined") {
    Dynamsoft = {};
  }

  if (typeof Dynamsoft.DBR == "undefined") {
    Dynamsoft.DBR = {};
  }

  for (var key in dbr) {
    Dynamsoft.DBR[key] = dbr[key];
  }
}