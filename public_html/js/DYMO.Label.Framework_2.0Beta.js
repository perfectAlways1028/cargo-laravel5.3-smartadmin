/*Copyright (c), 2011 Sanford, L.P. All Rights Reserved.*/
(function() {
    var m, aa = aa || {}, n = this;
    function ba(a) {
        a = a.split(".");
        for (var b = n, d; d = a.shift();)
            if (null != b[d])
                b = b[d];
            else 
                return null;
        return b
    }
    n.Ma=!0;
    function ca() {}
    function fa(a) {
        var b = typeof a;
        if ("object" == b)
            if (a) {
                if (a instanceof Array)
                    return "array";
                    if (a instanceof Object)
                        return b;
                        var d = Object.prototype.toString.call(a);
                        if ("[object Window]" == d)
                            return "object";
                            if ("[object Array]" == d || "number" == typeof a.length && "undefined" != typeof a.splice && "undefined" != typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("splice"))
                                return "array";
                                if ("[object Function]" == d || "undefined" != typeof a.call && "undefined" != typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("call"))
                                    return "function"
            } else 
                return "null";
                else if ("function" == b && "undefined" == typeof a.call)
    return "object";
return b
}
function p(a) {
    return "array" == fa(a)
}
function ga(a) {
    var b = fa(a);
    return "array" == b || "object" == b && "number" == typeof a.length
}
function r(a) {
    return "string" == typeof a
}
function ha(a) {
    return "number" == typeof a
}
function t(a) {
    return "function" == fa(a)
}
function ia(a) {
    var b = typeof a;
    return "object" == b && null != a || "function" == b
}
var ja = "closure_uid_" + (1E9 * Math.random()>>>0), ma = 0;
function na(a, b, d) {
    return a.call.apply(a.bind, arguments)
}
function oa(a, b, d) {
    if (!a)
        throw Error();
    if (2 < arguments.length) {
        var e = Array.prototype.slice.call(arguments, 2);
        return function() {
            var d = Array.prototype.slice.call(arguments);
            Array.prototype.unshift.apply(d, e);
            return a.apply(b, d)
        }
    }
    return function() {
        return a.apply(b, arguments)
    }
}
function w(a, b, d) {
    w = Function.prototype.bind&&-1 != Function.prototype.bind.toString().indexOf("native code") ? na : oa;
    return w.apply(null, arguments)
}
function pa(a, b) {
    var d = Array.prototype.slice.call(arguments, 1);
    return function() {
        var b = d.slice();
        b.push.apply(b, arguments);
        return a.apply(this, b)
    }
}
var qa = Date.now || function() {
    return + new Date
};
function x(a, b) {
    var d = a.split("."), e = n;
    d[0]in e ||!e.execScript || e.execScript("var " + d[0]);
    for (var f; d.length && (f = d.shift());)
        d.length || void 0 === b ? e[f] ? e = e[f] : e = e[f] = {} : e[f] = b
}
function z(a, b) {
    function d() {}
    d.prototype = b.prototype;
    a.X = b.prototype;
    a.prototype = new d;
    a.prototype.constructor = a;
    a.Na = function(a, d, g) {
        for (var h = Array(arguments.length - 2), k = 2; k < arguments.length; k++)
            h[k - 2] = arguments[k];
        return b.prototype[d].apply(a, h)
    }
};
function A(a) {
    if (Error.captureStackTrace)
        Error.captureStackTrace(this, A);
    else {
        var b = Error().stack;
        b && (this.stack = b)
    }
    a && (this.message = String(a))
}
z(A, Error);
A.prototype.name = "CustomError";
var ra;
function sa(a, b) {
    for (var d = a.split("%s"), e = "", f = Array.prototype.slice.call(arguments, 1); f.length && 1 < d.length;)
        e += d.shift() + f.shift();
    return e + d.join("%s")
}
var ta = String.prototype.trim ? function(a) {
    return a.trim()
}
: function(a) {
    return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g, "")
};
function ua(a) {
    if (!va.test(a))
        return a;
    - 1 != a.indexOf("&") && (a = a.replace(wa, "&amp;"));
    - 1 != a.indexOf("<") && (a = a.replace(xa, "&lt;"));
    - 1 != a.indexOf(">") && (a = a.replace(ya, "&gt;"));
    - 1 != a.indexOf('"') && (a = a.replace(za, "&quot;"));
    - 1 != a.indexOf("'") && (a = a.replace(Aa, "&#39;"));
    - 1 != a.indexOf("\x00") && (a = a.replace(Ca, "&#0;"));
    return a
}
var wa = /&/g, xa = /</g, ya = />/g, za = /"/g, Aa = /'/g, Ca = /\x00/g, va = /[\x00&<>"']/;
function C(a, b) {
    return - 1 != a.indexOf(b)
}
function Da(a) {
    return Array.prototype.join.call(arguments, "")
}
function Ea(a, b) {
    return a < b?-1 : a > b ? 1 : 0
};
function Fa(a, b) {
    b.unshift(a);
    A.call(this, sa.apply(null, b));
    b.shift()
}
z(Fa, A);
Fa.prototype.name = "AssertionError";
function Ga(a, b) {
    throw new Fa("Failure" + (a ? ": " + a : ""), Array.prototype.slice.call(arguments, 1));
};
var D = Array.prototype, Ha = D.indexOf ? function(a, b, d) {
    return D.indexOf.call(a, b, d)
}
: function(a, b, d) {
    d = null == d ? 0 : 0 > d ? Math.max(0, a.length + d) : d;
    if (r(a))
        return r(b) && 1 == b.length ? a.indexOf(b, d) : - 1;
    for (; d < a.length; d++)
        if (d in a && a[d] === b)
            return d;
    return - 1
}, Ia = D.forEach ? function(a, b, d) {
    D.forEach.call(a, b, d)
}
: function(a, b, d) {
    for (var e = a.length, f = r(a) ? a.split("") : a, g = 0; g < e; g++)
        g in f && b.call(d, f[g], g, a)
}, Ja = D.reduce ? function(a, b, d, e) {
    e && (b = w(b, e));
    return D.reduce.call(a, b, d)
}
: function(a, b, d, e) {
    var f = d;
    Ia(a, function(d,
    h) {
        f = b.call(e, f, d, h, a)
    });
    return f
}, Ka = D.some ? function(a, b, d) {
    return D.some.call(a, b, d)
}
: function(a, b, d) {
    for (var e = a.length, f = r(a) ? a.split("") : a, g = 0; g < e; g++)
        if (g in f && b.call(d, f[g], g, a))
            return !0;
    return !1
};
function La(a) {
    var b;
    a: {
        b = Na;
        for (var d = a.length, e = r(a) ? a.split("") : a, f = 0; f < d; f++)
            if (f in e && b.call(void 0, e[f], f, a)) {
                b = f;
                break a
            }
        b =- 1
    }
    return 0 > b ? null : r(a) ? a.charAt(b) : a[b]
}
function Oa(a, b) {
    var d = Ha(a, b), e;
    (e = 0 <= d) && D.splice.call(a, d, 1);
    return e
}
function Pa(a) {
    return D.concat.apply(D, arguments)
}
function Qa(a) {
    var b = a.length;
    if (0 < b) {
        for (var d = Array(b), e = 0; e < b; e++)
            d[e] = a[e];
        return d
    }
    return []
};
var F;
a: {
    var Ra = n.navigator;
    if (Ra) {
        var Ta = Ra.userAgent;
        if (Ta) {
            F = Ta;
            break a
        }
    }
    F = ""
};
function Ua(a, b) {
    for (var d in a)
        b.call(void 0, a[d], d, a)
}
function Va(a) {
    var b = [], d = 0, e;
    for (e in a)
        b[d++] = a[e];
    return b
}
function Wa(a) {
    var b = [], d = 0, e;
    for (e in a)
        b[d++] = e;
    return b
}
var Xa = "constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");
function Ya(a, b) {
    for (var d, e, f = 1; f < arguments.length; f++) {
        e = arguments[f];
        for (d in e)
            a[d] = e[d];
        for (var g = 0; g < Xa.length; g++)
            d = Xa[g], Object.prototype.hasOwnProperty.call(e, d) && (a[d] = e[d])
    }
}
function Za(a) {
    var b = arguments.length;
    if (1 == b && p(arguments[0]))
        return Za.apply(null, arguments[0]);
    for (var d = {}, e = 0; e < b; e++)
        d[arguments[e]]=!0;
    return d
};
function $a() {
    return C(F, "Edge") || C(F, "Trident") || C(F, "MSIE")
};
function G() {
    return C(F, "Edge")
};
var ab = C(F, "Opera") || C(F, "OPR"), H = $a(), bb = C(F, "Gecko")&&!(C(F.toLowerCase(), "webkit")&&!G())&&!(C(F, "Trident") || C(F, "MSIE"))&&!G(), cb = C(F.toLowerCase(), "webkit")&&!G();
function db() {
    var a = F;
    if (bb)
        return /rv\:([^\);]+)(\)|;)/.exec(a);
    if (H && G())
        return /Edge\/([\d\.]+)/.exec(a);
    if (H)
        return /\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);
    if (cb)
        return /WebKit\/(\S+)/.exec(a)
}
function eb() {
    var a = n.document;
    return a ? a.documentMode : void 0
}
var fb = function() {
    if (ab && n.opera) {
        var a = n.opera.version;
        return t(a) ? a() : a
    }
    var a = "", b = db();
    b && (a = b ? b[1] : "");
    return H&&!G() && (b = eb(), b > parseFloat(a)) ? String(b) : a
}(), gb = {};
function J(a) {
    var b;
    if (!(b = gb[a])) {
        b = 0;
        for (var d = ta(String(fb)).split("."), e = ta(String(a)).split("."), f = Math.max(d.length, e.length), g = 0; 0 == b && g < f; g++) {
            var h = d[g] || "", k = e[g] || "", l = RegExp("(\\d*)(\\D*)", "g"), q = RegExp("(\\d*)(\\D*)", "g");
            do {
                var v = l.exec(h) || ["", "", ""], y = q.exec(k) || ["", "", ""];
                if (0 == v[0].length && 0 == y[0].length)
                    break;
                b = Ea(0 == v[1].length ? 0 : parseInt(v[1], 10), 0 == y[1].length ? 0 : parseInt(y[1], 10)) || Ea(0 == v[2].length, 0 == y[2].length) || Ea(v[2], y[2])
            }
            while (0 == b)
            }
        b = gb[a] = 0 <= b
    }
    return b
}
var hb = n.document, ib = eb(), jb=!hb ||!H ||!ib && G() ? void 0 : ib || ("CSS1Compat" == hb.compatMode ? parseInt(fb, 10) : 5);
var kb=!H || H && (G() || 9 <= jb);
!bb&&!H || H && H && (G() || 9 <= jb) || bb && J("1.9.1");
H && J("9");
var lb = Za("area base br col command embed hr img input keygen link meta param source track wbr".split(" "));
function nb() {
    this.c = "";
    this.f = ob
}
nb.prototype.R=!0;
nb.prototype.N = function() {
    return this.c
};
nb.prototype.toString = function() {
    return "Const{" + this.c + "}"
};
function pb(a) {
    if (a instanceof nb && a.constructor === nb && a.f === ob)
        return a.c;
    Ga("expected object of type Const, got '" + a + "'");
    return "type_error:Const"
}
var ob = {};
function qb(a) {
    var b = new nb;
    b.c = a;
    return b
};
function rb() {
    this.c = "";
    this.f = sb
}
rb.prototype.R=!0;
var sb = {};
rb.prototype.N = function() {
    return this.c
};
rb.prototype.toString = function() {
    return "SafeStyle{" + this.c + "}"
};
function tb(a) {
    var b = new rb;
    b.c = a;
    return b
}
var ub = tb(""), vb = /^[-,."'%_!# a-zA-Z0-9]+$/;
function wb() {
    this.c = "";
    this.f = xb
}
m = wb.prototype;
m.R=!0;
m.N = function() {
    return this.c
};
m.ja=!0;
m.U = function() {
    return 1
};
m.toString = function() {
    return "SafeUrl{" + this.c + "}"
};
function yb(a) {
    if (a instanceof wb && a.constructor === wb && a.f === xb)
        return a.c;
    Ga("expected object of type SafeUrl, got '" + a + "'");
    return "type_error:SafeUrl"
}
var zb = /^(?:(?:https?|mailto|ftp):|[^&:/?#]*(?:[/?#]|$))/i;
function Ab(a) {
    try {
        var b = encodeURI(a)
    } catch (d) {
        return "about:invalid#zClosurez"
    }
    return b.replace(Bb, function(a) {
        return Cb[a]
    })
}
var Bb = /[()']|%5B|%5D|%25/g, Cb = {
    "'": "%27",
    "(": "%28",
    ")": "%29",
    "%5B": "[",
    "%5D": "]",
    "%25": "%"
}, xb = {};
function Db(a) {
    var b = new wb;
    b.c = a;
    return b
};
function Eb() {
    this.c = Fb
}
m = Eb.prototype;
m.R=!0;
m.N = function() {
    return ""
};
m.ja=!0;
m.U = function() {
    return 1
};
m.toString = function() {
    return "TrustedResourceUrl{}"
};
var Fb = {};
function Gb() {
    this.c = "";
    this.h = Hb;
    this.f = null
}
m = Gb.prototype;
m.ja=!0;
m.U = function() {
    return this.f
};
m.R=!0;
m.N = function() {
    return this.c
};
m.toString = function() {
    return "SafeHtml{" + this.c + "}"
};
function Ib(a) {
    if (a instanceof Gb && a.constructor === Gb && a.h === Hb)
        return a.c;
    Ga("expected object of type SafeHtml, got '" + a + "'");
    return "type_error:SafeHtml"
}
function Jb(a) {
    if (a instanceof Gb)
        return a;
    var b = null;
    a.ja && (b = a.U());
    a = ua(a.R ? a.N() : String(a));
    return Kb(a, b)
}
function Lb(a) {
    if (a instanceof Gb)
        return a;
    a = Jb(a);
    var b;
    b = Ib(a).replace(/  /g, " &#160;").replace(/(\r\n|\r|\n)/g, "<br>");
    return Kb(b, a.U())
}
var Mb = /^[a-zA-Z0-9-]+$/, Nb = {
    action: !0,
    cite: !0,
    data: !0,
    formaction: !0,
    href: !0,
    manifest: !0,
    poster: !0,
    src: !0
}, Ob = {
    EMBED: !0,
    IFRAME: !0,
    LINK: !0,
    OBJECT: !0,
    SCRIPT: !0,
    STYLE: !0,
    TEMPLATE: !0
};
function Pb(a) {
    function b(a) {
        p(a) ? Ia(a, b) : (a = Jb(a), e += Ib(a), a = a.U(), 0 == d ? d = a : 0 != a && d != a && (d = null))
    }
    var d = 0, e = "";
    Ia(arguments, b);
    return Kb(e, d)
}
var Hb = {};
function Kb(a, b) {
    var d = new Gb;
    d.c = a;
    d.f = b;
    return d
}
Kb("<!DOCTYPE html>", 0);
Kb("", 0);
function Qb(a) {
    return a ? new Rb(9 == a.nodeType ? a : a.ownerDocument || a.document) : ra || (ra = new Rb)
}
function Tb(a, b) {
    Ua(b, function(b, e) {
        "style" == e ? a.style.cssText = b : "class" == e ? a.className = b : "for" == e ? a.htmlFor = b : e in Ub ? a.setAttribute(Ub[e], b) : 0 == e.lastIndexOf("aria-", 0) || 0 == e.lastIndexOf("data-", 0) ? a.setAttribute(e, b) : a[e] = b
    })
}
var Ub = {
    cellpadding: "cellPadding",
    cellspacing: "cellSpacing",
    colspan: "colSpan",
    frameborder: "frameBorder",
    height: "height",
    maxlength: "maxLength",
    role: "role",
    rowspan: "rowSpan",
    type: "type",
    usemap: "useMap",
    valign: "vAlign",
    width: "width"
};
function Vb(a, b, d) {
    return Wb(document, arguments)
}
function Wb(a, b) {
    var d = b[0], e = b[1];
    if (!kb && e && (e.name || e.type)) {
        d = ["<", d];
        e.name && d.push(' name="', ua(e.name), '"');
        if (e.type) {
            d.push(' type="', ua(e.type), '"');
            var f = {};
            Ya(f, e);
            delete f.type;
            e = f
        }
        d.push(">");
        d = d.join("")
    }
    d = a.createElement(d);
    e && (r(e) ? d.className = e : p(e) ? d.className = e.join(" ") : Tb(d, e));
    2 < b.length && Xb(a, d, b);
    return d
}
function Xb(a, b, d) {
    function e(d) {
        d && b.appendChild(r(d) ? a.createTextNode(d) : d)
    }
    for (var f = 2; f < d.length; f++) {
        var g = d[f];
        !ga(g) || ia(g) && 0 < g.nodeType ? e(g) : Ia(Yb(g) ? Qa(g) : g, e)
    }
}
function Zb(a) {
    for (var b; b = a.firstChild;)
        a.removeChild(b)
}
function $b(a) {
    return a.contentDocument || a.contentWindow.document
}
function ac(a, b) {
    var d = [];
    bc(a, b, d, !1);
    return d
}
function bc(a, b, d, e) {
    if (null != a)
        for (a = a.firstChild; a;) {
            if (b(a) && (d.push(a), e) || bc(a, b, d, e))
                return !0;
                a = a.nextSibling
        }
    return !1
}
var cc = {
    SCRIPT: 1,
    STYLE: 1,
    HEAD: 1,
    IFRAME: 1,
    OBJECT: 1
}, dc = {
    IMG: " ",
    BR: "\n"
};
function ec(a) {
    var b = [];
    fc(a, b, !1);
    return b.join("")
}
function fc(a, b, d) {
    if (!(a.nodeName in cc))
        if (3 == a.nodeType)
            d ? b.push(String(a.nodeValue).replace(/(\r\n|\r|\n)/g, "")) : b.push(a.nodeValue);
        else if (a.nodeName in dc)
            b.push(dc[a.nodeName]);
        else 
            for (a = a.firstChild; a;)
                fc(a, b, d), a = a.nextSibling
}
function Yb(a) {
    if (a && "number" == typeof a.length) {
        if (ia(a))
            return "function" == typeof a.item || "string" == typeof a.item;
        if (t(a))
            return "function" == typeof a.item
    }
    return !1
}
function Rb(a) {
    this.c = a || n.document || document
}
m = Rb.prototype;
m.qa = function(a, b, d) {
    return Wb(this.c, arguments)
};
m.createElement = function(a) {
    return this.c.createElement(a)
};
m.createTextNode = function(a) {
    return this.c.createTextNode(String(a))
};
m.appendChild = function(a, b) {
    a.appendChild(b)
};
m.contains = function(a, b) {
    if (a.contains && 1 == b.nodeType)
        return a == b || a.contains(b);
    if ("undefined" != typeof a.compareDocumentPosition)
        return a == b || Boolean(a.compareDocumentPosition(b) & 16);
    for (; b && a != b;)
        b = b.parentNode;
    return b == a
};
function gc(a) {
    a.prototype.then = a.prototype.then;
    a.prototype.$goog_Thenable=!0
}
function hc(a) {
    if (!a)
        return !1;
    try {
        return !!a.$goog_Thenable
    } catch (b) {
        return !1
    }
};
function ic(a, b) {
    this.h = a;
    this.i = b;
    this.f = 0;
    this.c = null
}
function jc(a) {
    var b;
    0 < a.f ? (a.f--, b = a.c, a.c = b.next, b.next = null) : b = a.h();
    return b
}
function kc(a, b) {
    a.i(b);
    100 > a.f && (a.f++, b.next = a.c, a.c = b)
};
var mc = new ic(function() {
    return new lc
}, function(a) {
    a.reset()
});
function nc() {
    var a = oc, b = null;
    a.c && (b = a.c, a.c = a.c.next, a.c || (a.f = null), b.next = null);
    return b
}
function lc() {
    this.next = this.f = this.c = null
}
lc.prototype.reset = function() {
    this.next = this.f = this.c = null
};
function pc(a) {
    n.setTimeout(function() {
        throw a;
    }, 0)
}
var qc;
function rc() {
    var a = n.MessageChannel;
    "undefined" === typeof a && "undefined" !== typeof window && window.postMessage && window.addEventListener&&!C(F, "Presto") && (a = function() {
        var a = document.createElement("IFRAME");
        a.style.display = "none";
        a.src = "";
        document.documentElement.appendChild(a);
        var b = a.contentWindow, a = b.document;
        a.open();
        a.write("");
        a.close();
        var d = "callImmediate" + Math.random(), e = "file:" == b.location.protocol ? "*": b.location.protocol + "//" + b.location.host, a = w(function(a) {
            if (("*" == e || a.origin == e) && a.data ==
            d)
                this.port1.onmessage()
        }, this);
        b.addEventListener("message", a, !1);
        this.port1 = {};
        this.port2 = {
            postMessage: function() {
                b.postMessage(d, e)
            }
        }
    });
    if ("undefined" !== typeof a&&!$a()) {
        var b = new a, d = {}, e = d;
        b.port1.onmessage = function() {
            if (void 0 !== d.next) {
                d = d.next;
                var a = d.pa;
                d.pa = null;
                a()
            }
        };
        return function(a) {
            e.next = {
                pa: a
            };
            e = e.next;
            b.port2.postMessage(0)
        }
    }
    return "undefined" !== typeof document && "onreadystatechange"in document.createElement("SCRIPT") ? function(a) {
        var b = document.createElement("SCRIPT");
        b.onreadystatechange =
        function() {
            b.onreadystatechange = null;
            b.parentNode.removeChild(b);
            b = null;
            a();
            a = null
        };
        document.documentElement.appendChild(b)
    } : function(a) {
        n.setTimeout(a, 0)
    }
};
function sc(a, b) {
    tc || uc();
    vc || (tc(), vc=!0);
    var d = oc, e = jc(mc);
    e.c = a;
    e.f = b;
    e.next = null;
    d.f ? d.f.next = e : d.c = e;
    d.f = e
}
var tc;
function uc() {
    if (n.Promise && n.Promise.resolve) {
        var a = n.Promise.resolve();
        tc = function() {
            a.then(wc)
        }
    } else 
        tc = function() {
            var a = wc;
            !t(n.setImmediate) || n.Window && n.Window.prototype && n.Window.prototype.setImmediate == n.setImmediate ? (qc || (qc = rc()), qc(a)) : n.setImmediate(a)
        }
}
var vc=!1, oc = new function() {
    this.f = this.c = null
};
function wc() {
    for (var a = null; a = nc();) {
        try {
            a.c.call(a.f)
        } catch (b) {
            pc(b)
        }
        kc(mc, a)
    }
    vc=!1
};
function K(a, b) {
    this.c = xc;
    this.s = void 0;
    this.i = this.f = this.h = null;
    this.l = this.m=!1;
    if (a == yc)
        zc(this, Ac, b);
    else 
        try {
            var d = this;
            a.call(b, function(a) {
                zc(d, Ac, a)
            }, function(a) {
                if (!(a instanceof Bc))
                    try {
                        if (a instanceof Error)
                            throw a;
                            throw Error("Promise rejected.");
                        } catch (b) {}
                        zc(d, L, a)
                    })
    } catch (e) {
        zc(this, L, e)
    }
}
var xc = 0, Ac = 2, L = 3;
function Cc() {
    this.next = this.h = this.f = this.i = this.c = null;
    this.l=!1
}
Cc.prototype.reset = function() {
    this.h = this.f = this.i = this.c = null;
    this.l=!1
};
var Dc = new ic(function() {
    return new Cc
}, function(a) {
    a.reset()
});
function Ec(a, b, d) {
    var e = jc(Dc);
    e.i = a;
    e.f = b;
    e.h = d;
    return e
}
function yc() {}
function Fc(a) {
    return new K(function(b, d) {
        var e = a.length, f = [];
        if (e)
            for (var g = function(a, d) {
                e--;
                f[a] = d;
                0 == e && b(f)
            }, h = function(a) {
                d(a)
            }, k = 0, l; l = a[k]; k++)
                Gc(l, pa(g, k), h);
        else 
            b(f)
    })
}
K.prototype.then = function(a, b, d) {
    return Hc(this, t(a) ? a : null, t(b) ? b : null, d)
};
gc(K);
function Gc(a, b, d, e) {
    a instanceof K ? Ic(a, Ec(b || ca, d || null, e)) : a.then(b, d, e)
}
function Jc(a, b) {
    Hc(a, null, b, void 0)
}
K.prototype.cancel = function(a) {
    this.c == xc && sc(function() {
        var b = new Bc(a);
        Kc(this, b)
    }, this)
};
function Kc(a, b) {
    if (a.c == xc)
        if (a.h) {
            var d = a.h;
            if (d.f) {
                for (var e = 0, f = null, g = null, h = d.f; h && (h.l || (e++, h.c == a && (f = h), !(f && 1 < e))); h = h.next)
                    f || (g = h);
                    f && (d.c == xc && 1 == e ? Kc(d, b) : (g ? (e = g, e.next == d.i && (d.i = e), e.next = e.next.next) : Lc(d), Mc(d, f, L, b)))
                }
                a.h = null
        } else 
            zc(a, L, b)
    }
function Ic(a, b) {
    a.f || a.c != Ac && a.c != L || Nc(a);
    a.i ? a.i.next = b : a.f = b;
    a.i = b
}
function Hc(a, b, d, e) {
    var f = Ec(null, null, null);
    f.c = new K(function(a, h) {
        f.i = b ? function(d) {
            try {
                var f = b.call(e, d);
                a(f)
            } catch (q) {
                h(q)
            }
        } : a;
        f.f = d ? function(b) {
            try {
                var f = d.call(e, b);
                void 0 === f && b instanceof Bc ? h(b) : a(f)
            } catch (q) {
                h(q)
            }
        } : h
    });
    f.c.h = a;
    Ic(a, f);
    return f.c
}
K.prototype.u = function(a) {
    this.c = xc;
    zc(this, Ac, a)
};
K.prototype.B = function(a) {
    this.c = xc;
    zc(this, L, a)
};
function zc(a, b, d) {
    if (a.c == xc) {
        if (a == d)
            b = L, d = new TypeError("Promise cannot resolve to itself");
        else {
            if (hc(d)) {
                a.c = 1;
                Gc(d, a.u, a.B, a);
                return 
            }
            if (ia(d))
                try {
                    var e = d.then;
                    if (t(e)) {
                        Oc(a, d, e);
                        return 
                    }
            } catch (f) {
                b = L, d = f
            }
        }
        a.s = d;
        a.c = b;
        a.h = null;
        Nc(a);
        b != L || d instanceof Bc || Pc(a, d)
    }
}
function Oc(a, b, d) {
    function e(b) {
        g || (g=!0, a.B(b))
    }
    function f(b) {
        g || (g=!0, a.u(b))
    }
    a.c = 1;
    var g=!1;
    try {
        d.call(b, f, e)
    } catch (h) {
        e(h)
    }
}
function Nc(a) {
    a.m || (a.m=!0, sc(a.D, a))
}
function Lc(a) {
    var b = null;
    a.f && (b = a.f, a.f = b.next, b.next = null);
    a.f || (a.i = null);
    return b
}
K.prototype.D = function() {
    for (var a = null; a = Lc(this);)
        Mc(this, a, this.c, this.s);
    this.m=!1
};
function Mc(a, b, d, e) {
    if (d == L && b.f&&!b.l)
        for (; a && a.l; a = a.h)
            a.l=!1;
    if (b.c)
        b.c.h = null, Qc(b, d, e);
    else 
        try {
            b.l ? b.i.call(b.h) : Qc(b, d, e)
    } catch (f) {
        Rc.call(null, f)
    }
    kc(Dc, b)
}
function Qc(a, b, d) {
    b == Ac ? a.i.call(a.h, d) : a.f && a.f.call(a.h, d)
}
function Pc(a, b) {
    a.l=!0;
    sc(function() {
        a.l && Rc.call(null, b)
    })
}
var Rc = pc;
function Bc(a) {
    A.call(this, a)
}
z(Bc, A);
Bc.prototype.name = "cancel";
function Sc() {
    0 != Tc && (Uc[this[ja] || (this[ja]=++ma)] = this);
    this.s = this.s;
    this.H = this.H
}
var Tc = 0, Uc = {};
Sc.prototype.s=!1;
Sc.prototype.m = function() {
    if (!this.s && (this.s=!0, this.G(), 0 != Tc)) {
        var a = this[ja] || (this[ja]=++ma);
        delete Uc[a]
    }
};
Sc.prototype.G = function() {
    if (this.H)
        for (; this.H.length;)
            this.H.shift()()
};
var Vc=!H || H && (G() || 9 <= jb), Wc = H&&!J("9");
!cb || J("528");
bb && J("1.9b") || H && J("8") || ab && J("9.5") || cb && J("528");
bb&&!J("8") || H && J("9");
function Xc(a, b) {
    this.type = a;
    this.c = this.target = b;
    this.va=!0
}
Xc.prototype.f = function() {
    this.va=!1
};
function Yc(a) {
    Yc[" "](a);
    return a
}
Yc[" "] = ca;
function Zc(a, b) {
    try {
        return Yc(a[b]), !0
    } catch (d) {}
    return !1
};
function $c(a, b) {
    Xc.call(this, a ? a.type : "");
    this.h = this.state = this.c = this.target = null;
    if (a) {
        this.type = a.type;
        this.target = a.target || a.srcElement;
        this.c = b;
        var d = a.relatedTarget;
        d && bb && Zc(d, "nodeName");
        this.state = a.state;
        this.h = a;
        a.defaultPrevented && this.f()
    }
}
z($c, Xc);
$c.prototype.f = function() {
    $c.X.f.call(this);
    var a = this.h;
    if (a.preventDefault)
        a.preventDefault();
    else if (a.returnValue=!1, Wc)
        try {
            if (a.ctrlKey || 112 <= a.keyCode && 123 >= a.keyCode)
                a.keyCode =- 1
    } catch (b) {}
};
var ad = "closure_listenable_" + (1E6 * Math.random() | 0), bd = 0;
function cd(a, b, d, e, f) {
    this.listener = a;
    this.c = null;
    this.src = b;
    this.type = d;
    this.$=!!e;
    this.aa = f;
    ++bd;
    this.V = this.Z=!1
}
function dd(a) {
    a.V=!0;
    a.listener = null;
    a.c = null;
    a.src = null;
    a.aa = null
};
function ed(a) {
    this.src = a;
    this.c = {};
    this.f = 0
}
function fd(a, b, d, e, f, g) {
    var h = b.toString();
    b = a.c[h];
    b || (b = a.c[h] = [], a.f++);
    var k = gd(b, d, f, g);
    - 1 < k ? (a = b[k], e || (a.Z=!1)) : (a = new cd(d, a.src, h, !!f, g), a.Z = e, b.push(a));
    return a
}
function hd(a, b) {
    var d = b.type;
    if (!(d in a.c))
        return !1;
    var e = Oa(a.c[d], b);
    e && (dd(b), 0 == a.c[d].length && (delete a.c[d], a.f--));
    return e
}
function id(a) {
    var b = 0, d;
    for (d in a.c) {
        for (var e = a.c[d], f = 0; f < e.length; f++)
            ++b, dd(e[f]);
        delete a.c[d];
        a.f--
    }
}
function gd(a, b, d, e) {
    for (var f = 0; f < a.length; ++f) {
        var g = a[f];
        if (!g.V && g.listener == b && g.$==!!d && g.aa == e)
            return f
    }
    return - 1
};
var jd = "closure_lm_" + (1E6 * Math.random() | 0), kd = {}, ld = 0;
function md(a, b, d, e, f) {
    if (p(b))
        for (var g = 0; g < b.length; g++)
            md(a, b[g], d, e, f);
    else if (d = nd(d), a && a[ad])
        fd(a.C, String(b), d, !1, e, f);
    else {
        if (!b)
            throw Error("Invalid event type");
        var g=!!e, h = od(a);
        h || (a[jd] = h = new ed(a));
        d = fd(h, b, d, !1, e, f);
        if (!d.c) {
            e = pd();
            d.c = e;
            e.src = a;
            e.listener = d;
            if (a.addEventListener)
                a.addEventListener(b.toString(), e, g);
            else if (a.attachEvent)
                a.attachEvent(qd(b.toString()), e);
            else 
                throw Error("addEventListener and attachEvent are unavailable.");
            ld++
        }
    }
}
function pd() {
    var a = rd, b = Vc ? function(d) {
        return a.call(b.src, b.listener, d)
    }
    : function(d) {
        d = a.call(b.src, b.listener, d);
        if (!d)
            return d
    };
    return b
}
function sd(a, b, d, e, f) {
    if (p(b))
        for (var g = 0; g < b.length; g++)
            sd(a, b[g], d, e, f);
    else (d = nd(d), a && a[ad]) 
        ? (a = a.C, b = String(b).toString(), b in a.c && (g = a.c[b], d = gd(g, d, e, f), - 1 < d && (dd(g[d]), D.splice.call(g, d, 1), 0 == g.length && (delete a.c[b], a.f--)))) : a && (a = od(a)) && (b = a.c[b.toString()], a =- 1, b && (a = gd(b, d, !!e, f)), (d =- 1 < a ? b[a] : null) && td(d))
}
function td(a) {
    if (ha(a) ||!a || a.V)
        return !1;
    var b = a.src;
    if (b && b[ad])
        return hd(b.C, a);
    var d = a.type, e = a.c;
    b.removeEventListener ? b.removeEventListener(d, e, a.$) : b.detachEvent && b.detachEvent(qd(d), e);
    ld--;
    (d = od(b)) ? (hd(d, a), 0 == d.f && (d.src = null, b[jd] = null)) : dd(a);
    return !0
}
function qd(a) {
    return a in kd ? kd[a] : kd[a] = "on" + a
}
function ud(a, b, d, e) {
    var f=!0;
    if (a = od(a))
        if (b = a.c[b.toString()])
            for (b = b.concat(), a = 0; a < b.length; a++) {
                var g = b[a];
                g && g.$ == d&&!g.V && (g = vd(g, e), f = f&&!1 !== g)
            }
    return f
}
function vd(a, b) {
    var d = a.listener, e = a.aa || a.src;
    a.Z && td(a);
    return d.call(e, b)
}
function rd(a, b) {
    if (a.V)
        return !0;
    if (!Vc) {
        var d = b || ba("window.event"), e = new $c(d, this), f=!0;
        if (!(0 > d.keyCode || void 0 != d.returnValue)) {
            a:
            {
                var g=!1;
                if (0 == d.keyCode)
                    try {
                        d.keyCode =- 1;
                        break a
                } catch (h) {
                    g=!0
                }
                if (g || void 0 == d.returnValue)
                    d.returnValue=!0
            }
            d = [];
            for (g = e.c; g; g = g.parentNode)
                d.push(g);
            for (var g = a.type, k = d.length - 1; 0 <= k; k--) {
                e.c = d[k];
                var l = ud(d[k], g, !0, e), f = f && l
            }
            for (k = 0; k < d.length; k++)
                e.c = d[k], l = ud(d[k], g, !1, e), f = f && l
        }
        return f
    }
    return vd(a, new $c(b, this))
}
function od(a) {
    a = a[jd];
    return a instanceof ed ? a : null
}
var wd = "__closure_events_fn_" + (1E9 * Math.random()>>>0);
function nd(a) {
    if (t(a))
        return a;
    a[wd] || (a[wd] = function(b) {
        return a.handleEvent(b)
    });
    return a[wd]
};
function M() {
    Sc.call(this);
    this.C = new ed(this);
    this.Ba = this;
    this.ga = null
}
z(M, Sc);
M.prototype[ad]=!0;
M.prototype.addEventListener = function(a, b, d, e) {
    md(this, a, b, d, e)
};
M.prototype.removeEventListener = function(a, b, d, e) {
    sd(this, a, b, d, e)
};
function N(a, b) {
    var d, e = a.ga;
    if (e)
        for (d = []; e; e = e.ga)
            d.push(e);
    var e = a.Ba, f = b, g = f.type || f;
    if (r(f))
        f = new Xc(f, e);
    else if (f instanceof Xc)
        f.target = f.target || e;
    else {
        var h = f, f = new Xc(g, e);
        Ya(f, h)
    }
    var h=!0, k;
    if (d)
        for (var l = d.length - 1; 0 <= l; l--)
            k = f.c = d[l], h = xd(k, g, !0, f) && h;
    k = f.c = e;
    h = xd(k, g, !0, f) && h;
    h = xd(k, g, !1, f) && h;
    if (d)
        for (l = 0; l < d.length; l++)
            k = f.c = d[l], h = xd(k, g, !1, f) && h
}
M.prototype.G = function() {
    M.X.G.call(this);
    this.C && id(this.C);
    this.ga = null
};
function xd(a, b, d, e) {
    b = a.C.c[String(b)];
    if (!b)
        return !0;
    b = b.concat();
    for (var f=!0, g = 0; g < b.length; ++g) {
        var h = b[g];
        if (h&&!h.V && h.$ == d) {
            var k = h.listener, l = h.aa || h.src;
            h.Z && hd(a.C, h);
            f=!1 !== k.call(l, e) && f
        }
    }
    return f && 0 != e.va
};
function yd(a, b, d) {
    if (t(a))
        d && (a = w(a, d));
    else if (a && "function" == typeof a.handleEvent)
        a = w(a.handleEvent, a);
    else 
        throw Error("Invalid listener argument");
    return 2147483647 < b?-1 : n.setTimeout(a, b || 0)
};
function zd(a) {
    var b = [];
    Ad(new Bd, a, b);
    return b.join("")
}
function Bd() {}
function Ad(a, b, d) {
    if (null == b)
        d.push("null");
    else {
        if ("object" == typeof b) {
            if (p(b)) {
                var e = b;
                b = e.length;
                d.push("[");
                for (var f = "", g = 0; g < b; g++)
                    d.push(f), Ad(a, e[g], d), f = ",";
                d.push("]");
                return 
            }
            if (b instanceof String || b instanceof Number || b instanceof Boolean)
                b = b.valueOf();
            else {
                d.push("{");
                f = "";
                for (e in b)
                    Object.prototype.hasOwnProperty.call(b, e) && (g = b[e], "function" != typeof g && (d.push(f), Cd(e, d), d.push(":"), Ad(a, g, d), f = ","));
                d.push("}");
                return 
            }
        }
        switch (typeof b) {
        case "string":
            Cd(b, d);
            break;
        case "number":
            d.push(isFinite(b) &&
            !isNaN(b) ? b : "null");
            break;
        case "boolean":
            d.push(b);
            break;
        case "function":
            break;
        default:
            throw Error("Unknown type: " + typeof b);
        }
    }
}
var Dd = {
    '"': '\\"',
    "\\": "\\\\",
    "/": "\\/",
    "\b": "\\b",
    "\f": "\\f",
    "\n": "\\n",
    "\r": "\\r",
    "\t": "\\t",
    "\x0B": "\\u000b"
}, Ed = /\uffff/.test("\uffff") ? /[\\\"\x00-\x1f\x7f-\uffff]/g: /[\\\"\x00-\x1f\x7f-\xff]/g;
function Cd(a, b) {
    b.push('"', a.replace(Ed, function(a) {
        var b = Dd[a];
        b || (b = "\\u" + (a.charCodeAt(0) | 65536).toString(16).substr(1), Dd[a] = b);
        return b
    }), '"')
};
function Fd(a) {
    if ("function" == typeof a.K)
        return a.K();
    if (r(a))
        return a.split("");
    if (ga(a)) {
        for (var b = [], d = a.length, e = 0; e < d; e++)
            b.push(a[e]);
        return b
    }
    return Va(a)
}
function Gd(a, b) {
    if ("function" == typeof a.forEach)
        a.forEach(b, void 0);
    else if (ga(a) || r(a))
        Ia(a, b, void 0);
    else {
        var d;
        if ("function" == typeof a.J)
            d = a.J();
        else if ("function" != typeof a.K)
            if (ga(a) || r(a)) {
                d = [];
                for (var e = a.length, f = 0; f < e; f++)
                    d.push(f)
            } else 
                d = Wa(a);
        else 
            d = void 0;
        for (var e = Fd(a), f = e.length, g = 0; g < f; g++)
            b.call(void 0, e[g], d && d[g], a)
    }
};
function Hd(a, b) {
    this.f = {};
    this.c = [];
    this.i = this.h = 0;
    var d = arguments.length;
    if (1 < d) {
        if (d%2)
            throw Error("Uneven number of arguments");
        for (var e = 0; e < d; e += 2)
            Id(this, arguments[e], arguments[e + 1])
    } else if (a) {
        a instanceof Hd ? (d = a.J(), e = a.K()) : (d = Wa(a), e = Va(a));
        for (var f = 0; f < d.length; f++)
            Id(this, d[f], e[f])
    }
}
m = Hd.prototype;
m.K = function() {
    Jd(this);
    for (var a = [], b = 0; b < this.c.length; b++)
        a.push(this.f[this.c[b]]);
    return a
};
m.J = function() {
    Jd(this);
    return this.c.concat()
};
m.clear = function() {
    this.f = {};
    this.i = this.h = this.c.length = 0
};
function Jd(a) {
    if (a.h != a.c.length) {
        for (var b = 0, d = 0; b < a.c.length;) {
            var e = a.c[b];
            Kd(a.f, e) && (a.c[d++] = e);
            b++
        }
        a.c.length = d
    }
    if (a.h != a.c.length) {
        for (var f = {}, d = b = 0; b < a.c.length;)
            e = a.c[b], Kd(f, e) || (a.c[d++] = e, f[e] = 1), b++;
        a.c.length = d
    }
}
function Ld(a, b) {
    return Kd(a.f, b) ? a.f[b] : void 0
}
function Id(a, b, d) {
    Kd(a.f, b) || (a.h++, a.c.push(b), a.i++);
    a.f[b] = d
}
m.forEach = function(a, b) {
    for (var d = this.J(), e = 0; e < d.length; e++) {
        var f = d[e];
        a.call(b, Ld(this, f), f, this)
    }
};
m.clone = function() {
    return new Hd(this)
};
function Kd(a, b) {
    return Object.prototype.hasOwnProperty.call(a, b)
};
function Md(a) {
    var b;
    b || (b = Nd(a || arguments.callee.caller, []));
    return b
}
function Nd(a, b) {
    var d = [];
    if (0 <= Ha(b, a))
        d.push("[...circular reference...]");
    else if (a && 50 > b.length) {
        d.push(Od(a) + "(");
        for (var e = a.arguments, f = 0; e && f < e.length; f++) {
            0 < f && d.push(", ");
            var g;
            g = e[f];
            switch (typeof g) {
            case "object":
                g = g ? "object" : "null";
                break;
            case "string":
                break;
            case "number":
                g = String(g);
                break;
            case "boolean":
                g = g ? "true" : "false";
                break;
            case "function":
                g = (g = Od(g)) ? g : "[fn]";
                break;
            default:
                g = typeof g
            }
            40 < g.length && (g = g.substr(0, 40) + "...");
            d.push(g)
        }
        b.push(a);
        d.push(")\n");
        try {
            d.push(Nd(a.caller,
            b))
        } catch (h) {
            d.push("[exception trying to get caller]\n")
        }
    } else 
        a ? d.push("[...long stack...]") : d.push("[end]");
    return d.join("")
}
function Od(a) {
    if (Pd[a])
        return Pd[a];
    a = String(a);
    if (!Pd[a]) {
        var b = /function ([^\(]+)/.exec(a);
        Pd[a] = b ? b[1] : "[Anonymous]"
    }
    return Pd[a]
}
var Pd = {};
function Qd(a, b, d, e, f) {
    this.reset(a, b, d, e, f)
}
Qd.prototype.c = null;
var Rd = 0;
Qd.prototype.reset = function(a, b, d, e, f) {
    "number" == typeof f || Rd++;
    e || qa();
    this.f = b;
    delete this.c
};
function Sd(a) {
    this.i = a;
    this.h = this.c = this.f = null
}
function Td(a, b) {
    this.name = a;
    this.value = b
}
Td.prototype.toString = function() {
    return this.name
};
var Ud = new Td("SEVERE", 1E3), Vd = new Td("WARNING", 900), Wd = new Td("INFO", 800), Xd = new Td("CONFIG", 700), Yd = new Td("FINE", 500), Zd = new Td("FINER", 400);
function $d(a) {
    if (a.c)
        return a.c;
    if (a.f)
        return $d(a.f);
    Ga("Root logger has no level set.");
    return null
}
Sd.prototype.log = function(a, b, d) {
    if (a.value >= $d(this).value)
        for (t(b) 
            && (b = b()), a = new Qd(a, String(b), this.i), d && (a.c = d), d = "log:" + a.f, n.console && (n.console.timeStamp ? n.console.timeStamp(d) : n.console.markTimeline && n.console.markTimeline(d)), n.msWriteProfilerMark && n.msWriteProfilerMark(d), d = this;
    d;
    )d = d.f
};
var ae = {}, be = null;
function ce(a) {
    be || (be = new Sd(""), ae[""] = be, be.c = Xd);
    var b;
    if (!(b = ae[a])) {
        b = new Sd(a);
        var d = a.lastIndexOf("."), e = a.substr(d + 1), d = ce(a.substr(0, d));
        d.h || (d.h = {});
        d.h[e] = b;
        b.f = d;
        ae[a] = b
    }
    return b
};
function de(a, b) {
    a && a.log(Wd, b, void 0)
}
function P(a, b) {
    a && a.log(Yd, b, void 0)
};
function ee() {}
ee.prototype.c = null;
function fe(a) {
    var b;
    (b = a.c) || (b = {}, ge(a) && (b[0]=!0, b[1]=!0), b = a.c = b);
    return b
};
var he;
function ie() {}
z(ie, ee);
function je(a) {
    return (a = ge(a)) ? new ActiveXObject(a) : new XMLHttpRequest
}
function ge(a) {
    if (!a.f && "undefined" == typeof XMLHttpRequest && "undefined" != typeof ActiveXObject) {
        for (var b = ["MSXML2.XMLHTTP.6.0", "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"], d = 0; d < b.length; d++) {
            var e = b[d];
            try {
                return new ActiveXObject(e), a.f = e
            } catch (f) {}
        }
        throw Error("Could not create ActiveXObject. ActiveX might be disabled, or MSXML might not be installed");
    }
    return a.f
}
he = new ie;
var ke = /^(?:([^:/?#.]+):)?(?:\/\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\?([^#]*))?(?:#(.*))?$/;
function le(a) {
    if (me) {
        me=!1;
        var b = n.location;
        if (b) {
            var d = b.href;
            if (d && (d = (d = le(d)[3] || null) ? decodeURI(d) : d) && d != b.hostname)
                throw me=!0, Error();
        }
    }
    return a.match(ke)
}
var me = cb;
function ne(a, b) {
    for (var d = a.split("&"), e = 0; e < d.length; e++) {
        var f = d[e].indexOf("="), g = null, h = null;
        0 <= f ? (g = d[e].substring(0, f), h = d[e].substring(f + 1)) : g = d[e];
        b(g, h ? decodeURIComponent(h.replace(/\+/g, " ")) : "")
    }
}
function oe(a) {
    var b = "getPrinters";
    if (0 <= a.indexOf("#") || 0 <= a.indexOf("?"))
        throw Error("goog.uri.utils: Fragment or query identifiers are not supported: [" + a + "]");
    var d = a.length - 1;
    0 <= d && a.indexOf("/", d) == d && (a = a.substr(0, a.length - 1));
    0 == b.lastIndexOf("/", 0) && (b = b.substr(1));
    return Da(a, "/", b)
};
function pe(a) {
    M.call(this);
    this.Ca = new Hd;
    this.Y = a || null;
    this.h=!1;
    this.T = this.c = null;
    this.u = this.na = this.B = "";
    this.i = this.fa = this.D = this.ea=!1;
    this.l = 0;
    this.F = null;
    this.oa = qe;
    this.I = this.Da=!1
}
z(pe, M);
var qe = "";
pe.prototype.f = ce("goog.net.XhrIo");
var re = /^https?$/i, se = ["POST", "PUT"], te = [];
function ue(a, b) {
    var d = new pe;
    te.push(d);
    b && fd(d.C, "complete", b, !1, void 0, void 0);
    fd(d.C, "ready", d.Ia, !0, void 0, void 0);
    d.l = Math.max(0, 1500);
    d.send(a, "GET", void 0, void 0)
}
m = pe.prototype;
m.Ia = function() {
    this.m();
    Oa(te, this)
};
m.send = function(a, b, d, e) {
    if (this.c)
        throw Error("[goog.net.XhrIo] Object is active with another request=" + this.B + "; newUri=" + a);
    b = b ? b.toUpperCase() : "GET";
    this.B = a;
    this.u = "";
    this.na = b;
    this.ea=!1;
    this.h=!0;
    this.c = this.Y ? je(this.Y) : je(he);
    this.T = this.Y ? fe(this.Y) : fe(he);
    this.c.onreadystatechange = w(this.ua, this);
    try {
        P(this.f, ve(this, "Opening Xhr")), this.fa=!0, this.c.open(b, String(a), !0), this.fa=!1
    } catch (f) {
        P(this.f, ve(this, "Error opening Xhr: " + f.message));
        we(this, f);
        return 
    }
    a = d || "";
    var g = this.Ca.clone();
    e && Gd(e, function(a, b) {
        Id(g, b, a)
    });
    e = La(g.J());
    d = n.FormData && a instanceof n.FormData;
    !(0 <= Ha(se, b)) || e || d || Id(g, "Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    g.forEach(function(a, b) {
        this.c.setRequestHeader(b, a)
    }, this);
    this.oa && (this.c.responseType = this.oa);
    "withCredentials"in this.c && (this.c.withCredentials = this.Da);
    try {
        xe(this), 0 < this.l && (this.I = ye(this.c), P(this.f, ve(this, "Will abort after " + this.l + "ms if incomplete, xhr2 " + this.I)), this.I ? (this.c.timeout = this.l, this.c.ontimeout =
        w(this.S, this)) : this.F = yd(this.S, this.l, this)), P(this.f, ve(this, "Sending request")), this.D=!0, this.c.send(a), this.D=!1
    } catch (h) {
        P(this.f, ve(this, "Send error: " + h.message)), we(this, h)
    }
};
function ye(a) {
    return H && J(9) && ha(a.timeout) && void 0 !== a.ontimeout
}
function Na(a) {
    return "content-type" == a.toLowerCase()
}
m.S = function() {
    "undefined" != typeof aa && this.c && (this.u = "Timed out after " + this.l + "ms, aborting", P(this.f, ve(this, this.u)), N(this, "timeout"), this.c && this.h && (P(this.f, ve(this, "Aborting")), this.h=!1, this.i=!0, this.c.abort(), this.i=!1, N(this, "complete"), N(this, "abort"), ze(this)))
};
function we(a, b) {
    a.h=!1;
    a.c && (a.i=!0, a.c.abort(), a.i=!1);
    a.u = b;
    Ae(a);
    ze(a)
}
function Ae(a) {
    a.ea || (a.ea=!0, N(a, "complete"), N(a, "error"))
}
m.G = function() {
    this.c && (this.h && (this.h=!1, this.i=!0, this.c.abort(), this.i=!1), ze(this, !0));
    pe.X.G.call(this)
};
m.ua = function() {
    this.s || (this.fa || this.D || this.i ? Be(this) : this.La())
};
m.La = function() {
    Be(this)
};
function Be(a) {
    if (a.h && "undefined" != typeof aa)
        if (a.T[1] && 4 == Ce(a) && 2 == De(a))
            P(a.f, ve(a, "Local request error detected and ignored"));
        else if (a.D && 4 == Ce(a))
            yd(a.ua, 0, a);
        else if (N(a, "readystatechange"), 4 == Ce(a)) {
            P(a.f, ve(a, "Request complete"));
            a.h=!1;
            try {
                if (a.ba())
                    N(a, "complete"), N(a, "success");
                else {
                    var b;
                    try {
                        b = 2 < Ce(a) ? a.c.statusText : ""
                    } catch (d) {
                        P(a.f, "Can not get status: " + d.message), b = ""
                    }
                    a.u = b + " [" + De(a) + "]";
                    Ae(a)
                }
            } finally {
                ze(a)
            }
    }
}
function ze(a, b) {
    if (a.c) {
        xe(a);
        var d = a.c, e = a.T[0] ? ca: null;
        a.c = null;
        a.T = null;
        b || N(a, "ready");
        try {
            d.onreadystatechange = e
        } catch (f) {
            (d = a.f) && d.log(Ud, "Problem encountered resetting onreadystatechange: " + f.message, void 0)
        }
    }
}
function xe(a) {
    a.c && a.I && (a.c.ontimeout = null);
    ha(a.F) && (n.clearTimeout(a.F), a.F = null)
}
m.ba = function() {
    var a = De(this), b;
    a: switch (a) {
    case 200:
    case 201:
    case 202:
    case 204:
    case 206:
    case 304:
    case 1223:
        b=!0;
        break a;
    default:
        b=!1
    }
    if (!b) {
        if (a = 0 === a)
            a = le(String(this.B))[1] || null, !a && self.location && (a = self.location.protocol, a = a.substr(0, a.length - 1)), a=!re.test(a ? a.toLowerCase() : "");
        b = a
    }
    return b
};
function Ce(a) {
    return a.c ? a.c.readyState : 0
}
function De(a) {
    try {
        return 2 < Ce(a) ? a.c.status : - 1
    } catch (b) {
        return - 1
    }
}
function ve(a, b) {
    return b + " [" + a.na + " " + a.B + " " + De(a) + "]"
};
function Q(a, b) {
    this.f = this.s = this.i = "";
    this.u = null;
    this.l = this.h = "";
    this.m=!1;
    var d;
    a instanceof Q ? (this.m = void 0 !== b ? b : a.m, Ee(this, a.i), this.s = a.s, this.f = a.f, Fe(this, a.u), this.h = a.h, Ge(this, a.c.clone()), this.l = a.l) : a && (d = le(String(a))) ? (this.m=!!b, Ee(this, d[1] || "", !0), this.s = He(d[2] || ""), this.f = He(d[3] || "", !0), Fe(this, d[4]), this.h = He(d[5] || "", !0), Ge(this, d[6] || "", !0), this.l = He(d[7] || "")) : (this.m=!!b, this.c = new Ie(null, 0, this.m))
}
Q.prototype.toString = function() {
    var a = [], b = this.i;
    b && a.push(Je(b, Ke, !0), ":");
    if (b = this.f) {
        a.push("//");
        var d = this.s;
        d && a.push(Je(d, Ke, !0), "@");
        a.push(encodeURIComponent(String(b)).replace(/%25([0-9a-fA-F]{2})/g, "%$1"));
        b = this.u;
        null != b && a.push(":", String(b))
    }
    if (b = this.h)
        this.f && "/" != b.charAt(0) && a.push("/"), a.push(Je(b, "/" == b.charAt(0) ? Le : Me, !0));
    (b = this.c.toString()) && a.push("?", b);
    (b = this.l) && a.push("#", Je(b, Ne));
    return a.join("")
};
Q.prototype.clone = function() {
    return new Q(this)
};
function Ee(a, b, d) {
    a.i = d ? He(b, !0) : b;
    a.i && (a.i = a.i.replace(/:$/, ""))
}
function Fe(a, b) {
    if (b) {
        b = Number(b);
        if (isNaN(b) || 0 > b)
            throw Error("Bad port number " + b);
        a.u = b
    } else 
        a.u = null
}
function Ge(a, b, d) {
    b instanceof Ie ? (a.c = b, Oe(a.c, a.m)) : (d || (b = Je(b, Pe)), a.c = new Ie(b, 0, a.m))
}
function Qe(a) {
    return a instanceof Q ? a.clone() : new Q(a, void 0)
}
function Re(a, b) {
    a instanceof Q || (a = Qe(a));
    b instanceof Q || (b = Qe(b));
    var d = a, e = b, f = d.clone(), g=!!e.i;
    g ? Ee(f, e.i) : g=!!e.s;
    g ? f.s = e.s : g=!!e.f;
    g ? f.f = e.f : g = null != e.u;
    var h = e.h;
    if (g)
        Fe(f, e.u);
    else if (g=!!e.h)
        if ("/" != h.charAt(0) && (d.f&&!d.h ? h = "/" + h : (d = f.h.lastIndexOf("/"), - 1 != d && (h = f.h.substr(0, d + 1) + h))), d = h, ".." == d || "." == d)
            h = "";
        else if (C(d, "./") || C(d, "/.")) {
            for (var h = 0 == d.lastIndexOf("/", 0), d = d.split("/"), k = [], l = 0; l < d.length;) {
                var q = d[l++];
                "." == q ? h && l == d.length && k.push("") : ".." == q ? ((1 < k.length || 1 == k.length &&
                "" != k[0]) && k.pop(), h && l == d.length && k.push("")) : (k.push(q), h=!0)
            }
            h = k.join("/")
        } else 
            h = d;
    g ? f.h = h : g = "" !== e.c.toString();
    g ? Ge(f, He(e.c.toString())) : g=!!e.l;
    g && (f.l = e.l);
    return f
}
function He(a, b) {
    return a ? b ? decodeURI(a.replace(/%25/g, "%2525")) : decodeURIComponent(a) : ""
}
function Je(a, b, d) {
    return r(a) ? (a = encodeURI(a).replace(b, Se), d && (a = a.replace(/%25([0-9a-fA-F]{2})/g, "%$1")), a) : null
}
function Se(a) {
    a = a.charCodeAt(0);
    return "%" + (a>>4 & 15).toString(16) + (a & 15).toString(16)
}
var Ke = /[#\/\?@]/g, Me = /[\#\?:]/g, Le = /[\#\?]/g, Pe = /[\#\?@]/g, Ne = /#/g;
function Ie(a, b, d) {
    this.h = this.c = null;
    this.f = a || null;
    this.i=!!d
}
function Ze(a) {
    a.c || (a.c = new Hd, a.h = 0, a.f && ne(a.f, function(b, d) {
        var e = decodeURIComponent(b.replace(/\+/g, " "));
        Ze(a);
        a.f = null;
        var e = $e(a, e), f = Ld(a.c, e);
        f || Id(a.c, e, f = []);
        f.push(d);
        a.h++
    }))
}
function af(a, b) {
    Ze(a);
    b = $e(a, b);
    if (Kd(a.c.f, b)) {
        a.f = null;
        a.h -= Ld(a.c, b).length;
        var d = a.c;
        Kd(d.f, b) && (delete d.f[b], d.h--, d.i++, d.c.length > 2 * d.h && Jd(d))
    }
}
m = Ie.prototype;
m.clear = function() {
    this.c = this.f = null;
    this.h = 0
};
function bf(a, b) {
    Ze(a);
    b = $e(a, b);
    return Kd(a.c.f, b)
}
m.J = function() {
    Ze(this);
    for (var a = this.c.K(), b = this.c.J(), d = [], e = 0; e < b.length; e++)
        for (var f = a[e], g = 0; g < f.length; g++)
            d.push(b[e]);
    return d
};
m.K = function(a) {
    Ze(this);
    var b = [];
    if (r(a))
        bf(this, a) && (b = Pa(b, Ld(this.c, $e(this, a))));
    else {
        a = this.c.K();
        for (var d = 0; d < a.length; d++)
            b = Pa(b, a[d])
    }
    return b
};
function cf(a, b, d) {
    af(a, b);
    0 < d.length && (a.f = null, Id(a.c, $e(a, b), Qa(d)), a.h += d.length)
}
m.toString = function() {
    if (this.f)
        return this.f;
    if (!this.c)
        return "";
    for (var a = [], b = this.c.J(), d = 0; d < b.length; d++)
        for (var e = b[d], f = encodeURIComponent(String(e)), e = this.K(e), g = 0; g < e.length; g++) {
            var h = f;
            "" !== e[g] && (h += "=" + encodeURIComponent(String(e[g])));
            a.push(h)
        }
    return this.f = a.join("&")
};
m.clone = function() {
    var a = new Ie;
    a.f = this.f;
    this.c && (a.c = this.c.clone(), a.h = this.h);
    return a
};
function $e(a, b) {
    var d = String(b);
    a.i && (d = d.toLowerCase());
    return d
}
function Oe(a, b) {
    b&&!a.i && (Ze(a), a.f = null, a.c.forEach(function(a, b) {
        var f = b.toLowerCase();
        b != f && (af(this, b), cf(this, f, a))
    }, a));
    a.i = b
};
String.c = function(a) {
    return '"' === a[0] && '"' === a[a.length - 1] ? a.slice(1, a.length - 1) : a
};
function df() {
    ef("testCookie", "test", 1);
    return "test" == ff("testCookie")
}
function ef(a, b, d) {
    var e = new Date;
    e.setTime(e.getTime() + 864E5 * d);
    document.cookie = a + "=" + b + "; " + ("expires=" + e.toUTCString())
}
function ff(a) {
    a = a + "=";
    for (var b = document.cookie.split(";"), d = 0; d < b.length; d++) {
        for (var e = b[d]; " " == e.charAt(0);)
            e = e.substring(1);
        if (0 == e.indexOf(a))
            return e.substring(a.length, e.length)
    }
    return ""
}
function gf(a) {
    window.localStorage ? a ? window.localStorage.ServicePort = a : delete window.localStorage.ServicePort : df() ? a ? ef("ServicePort", a, 100) : ef("ServicePort", "", 100) : window.c = a
}
function hf() {
    return window.localStorage ? window.localStorage.ServicePort : df() ? ff("ServicePort") : window.c
}
function jf(a, b, d, e) {
    var f = function() {
        if ("undefined" !== typeof XMLHttpRequest)
            return new XMLHttpRequest;
        for (var a = "MSXML2.XmlHttp.6.0 MSXML2.XmlHttp.5.0 MSXML2.XmlHttp.4.0 MSXML2.XmlHttp.3.0 MSXML2.XmlHttp.2.0 Microsoft.XmlHttp".split(" "), b, d = 0; d < a.length; d++)
            try {
                b = new ActiveXObject(a[d]);
                break
        } catch (e) {}
        return b
    }(), g = [], h = null, k;
    for (k in b)
        g.push(encodeURIComponent(k) + "=" + encodeURIComponent(b[k]));
    "POST" == d ? h = g.length ? g.join("&") : "" : a += g.length ? "?" + g.join("&") : "";
    f.open(d || "GET", a, !1);
    "POST" == d &&
    f.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    f.onreadystatechange = function() {
        4 == f.readyState && e && e(f.responseText)
    };
    f.send(h);
    if (200 != f.status)
        throw Error("Failed to execute webservice command: " + f.status + ": " + f.statusText);
    return f.responseText
}
function kf(a) {
    try {
        return "true" === jf("http://localhost:" + a + "/DYMO/DLS/Printing/StatusConnected", {}, "GET", function() {})
    } catch (b) {
        return !1
    }
}
function lf(a, b) {
    for (var d = [], e = 41951; 41960 >= e; ++e)
        d.push(mf(e));
    Jc(Fc(d).then(function() {
        b()
    }), function(d) {
        ha(d) ? (gf(d), a()) : b()
    })
}
function mf(a) {
    var b = "http://localhost:" + a + "/DYMO/DLS/Printing/StatusConnected";
    return new K(function(d, e) {
        ue(b, function(b) {
            b.target.ba() ? e(a) : d(a)
        })
    })
}
function nf(a, b, d) {
    var e = hf();
    a = jf("http://localhost:" + e + "/DYMO/DLS/Printing/" + b, d, a, function() {});
    try {
        return window.JSON.parse(a)
    } catch (f) {
        return a
    }
}
function of() {
    this.getPrinters = function() {
        return nf("GET", "GetPrinters", {})
    };
    this.openLabelFile = function(a) {
        return nf("GET", "OpenLabelFile", {
            fileName: a
        })
    };
    this.printLabel = function(a, b, d, e) {
        return nf("POST", "PrintLabel", {
            printerName: a,
            printParamsXml: b,
            labelXml: d,
            labelSetXml: e
        })
    };
    this.printLabel2 = function(a, b, d, e) {
        return nf("POST", "PrintLabel2", {
            printerName: a,
            printParamsXml: b,
            labelXml: d,
            labelSetXml: e
        })
    };
    this.renderLabel = function(a, b, d) {
        return nf("POST", "RenderLabel", {
            labelXml: a,
            renderParamsXml: b,
            printerName: d
        })
    };
    this.loadImageAsPngBase64 = function(a) {
        return nf("GET", "LoadImageAsPngBase64", {
            imageUri: a
        })
    }
};
var pf = {};
x("dymo.label.framework.FlowDirection", pf);
pf.LeftToRight = "LeftToRight";
pf.RightToLeft = "RightToLeft";
var qf = {};
x("dymo.label.framework.LabelWriterPrintQuality", qf);
qf.Auto = "Auto";
qf.Text = "Text";
qf.BarcodeAndGraphics = "BarcodeAndGraphics";
var rf = {};
x("dymo.label.framework.TwinTurboRoll", rf);
rf.Auto = "Auto";
rf.Left = "Left";
rf.Right = "Right";
var sf = {};
x("dymo.label.framework.TapeAlignment", sf);
sf.Center = "Center";
sf.Left = "Left";
sf.Right = "Right";
var tf = {};
x("dymo.label.framework.TapeCutMode", tf);
tf.AutoCut = "AutoCut";
tf.ChainMarks = "ChainMarks";
var uf = {};
x("dymo.label.framework.AddressBarcodePosition", uf);
uf.AboveAddress = "AboveAddress";
uf.BelowAddress = "BelowAddress";
uf.Suppress = "Suppress";
var R = {};
x("dymo.label.framework.PrintJobStatus", R);
R.W = 0;
R.Unknown = R.W;
R.Ha = 1;
R.Printing = R.Ha;
R.ya = 2;
R.Finished = R.ya;
R.Error = 3;
R.Error = R.Error;
R.Fa = 4;
R.PaperOut = R.Fa;
R.za = 5;
R.InQueue = R.za;
R.ha =- 1;
R.ProcessingError = R.ha;
R.Ga =- 2;
R.PrinterBusy = R.Ga;
R.Aa =- 3;
R.InvalidJobId = R.Aa;
R.Ea =- 4;
R.NotSpooled = R.Ea;
function S(a) {
    if ("undefined" != typeof DOMParser)
        return (new DOMParser).parseFromString(a, "application/xml");
    if ("undefined" != typeof ActiveXObject) {
        var b = new ActiveXObject("MSXML2.DOMDocument");
        if (b) {
            b.resolveExternals=!1;
            b.validateOnParse=!1;
            try {
                b.setProperty("ProhibitDTD", !0), b.setProperty("MaxXMLSize", 2048), b.setProperty("MaxElementDepth", 256)
            } catch (d) {}
        }
        b.loadXML(a);
        return b
    }
    throw Error("Your browser does not support loading xml documents");
}
function vf(a) {
    if ("undefined" != typeof XMLSerializer)
        return (new XMLSerializer).serializeToString(a);
    if (a = a.xml)
        return a;
    throw Error("Your browser does not support serializing XML documents");
};
function T(a, b, d, e) {
    b = a.ownerDocument.createElement(b);
    d && b.appendChild(a.ownerDocument.createTextNode(d));
    if (e)
        for (var f in e)
            b.setAttribute(f, e[f]);
    a.appendChild(b)
}
function wf(a) {
    return a ? ec(a) : ""
}
function U(a, b) {
    var d = a.getElementsByTagName(b);
    if (0 < d.length)
        return d[0]
}
function xf(a, b) {
    for (; a.firstChild;)
        a.removeChild(a.firstChild);
    a.appendChild(a.ownerDocument.createTextNode(b))
};
function yf() {
    this.c = []
}
x("dymo.label.framework.LabelSetBuilder", yf);
yf.prototype.h = function() {
    return this.c
};
yf.prototype.getRecords = yf.prototype.h;
yf.prototype.f = function() {
    var a = new V;
    this.c.push(a);
    return a
};
yf.prototype.addRecord = yf.prototype.f;
function zf(a) {
    for (var b = S("<LabelSet/>"), d = b.documentElement, e = 0; e < a.length; e++) {
        var f = a[e], g = b.createElement("LabelRecord"), h;
        for (h in f) {
            var k = f[h];
            if ("function" != typeof k) {
                var k = k.toString(), l = b.createElement("ObjectData");
                l.setAttribute("Name", h);
                0 == k.indexOf("<TextMarkup>") ? (k = S(k), l.appendChild(k.documentElement.cloneNode(!0))) : l.appendChild(b.createTextNode(k));
                g.appendChild(l)
            }
        }
        d.appendChild(g)
    }
    return vf(b)
}
yf.toXml = zf;
yf.prototype.toString = function() {
    return zf(this.c)
};
function V() {}
V.prototype.h = function(a, b) {
    b = b.toString();
    0 != b.indexOf("<TextMarkup>") && (b = "<TextMarkup>" + b + "</TextMarkup>");
    this[a] = b;
    return this
};
V.prototype.setTextMarkup = V.prototype.h;
V.prototype.f = function(a, b) {
    this[a] = b;
    return this
};
V.prototype.setText = V.prototype.f;
V.prototype.c = function(a, b) {
    this[a] = b;
    return this
};
V.prototype.setBase64Image = V.prototype.c;
function W(a) {
    this.f = S(a)
}
W.prototype.c = function() {
    return vf(this.f)
};
W.prototype.getLabelXml = W.prototype.c;
W.prototype.H = function(a, b) {
    return Af(this.c(), a, b)
};
W.prototype.render = W.prototype.H;
W.prototype.h = function(a, b, d) {
    Bf(a, b, this.c(), d)
};
W.prototype.print = W.prototype.h;
W.prototype.B = function(a, b, d) {
    return Cf(a, b, this.c(), d)
};
W.prototype.print2 = W.prototype.B;
W.prototype.D = function(a, b, d, e, f) {
    return Df(a, b, this.c(), d, e, f)
};
W.prototype.printAndPollStatus = W.prototype.D;
var Ef = "AddressObject TextObject BarcodeObject ShapeObject CounterObject ImageObject CircularTextObject DateTimeObject".split(" ");
function Ff(a, b) {
    var d = b || Ef;
    return ac(a.f.documentElement, function(a) {
        return 1 == a.nodeType && 0 <= Ha(d, a.tagName)
    })
}
W.prototype.s = function() {
    for (var a = Ff(this), b = [], d = 0; d < a.length; d++)
        b.push(wf(U(a[d], "Name")));
    return b
};
W.prototype.getObjectNames = W.prototype.s;
W.prototype.l = function() {
    return Ff(this, ["AddressObject"]).length
};
W.prototype.getAddressObjectCount = W.prototype.l;
function Gf(a, b) {
    return Ff(a, ["AddressObject"])[b]
}
W.prototype.i = function(a) {
    return wf(U(Gf(this, a), "BarcodePosition"))
};
W.prototype.getAddressBarcodePosition = W.prototype.i;
W.prototype.F = function(a, b) {
    if ("AboveAddress" != b && "BelowAddress" != b && "Suppress" != b)
        throw Error("verifyAddressBarcodePosition(): barcode position '" + b + "' is invalid value");
    xf(U(Gf(this, a), "BarcodePosition"), b);
    return this
};
W.prototype.setAddressBarcodePosition = W.prototype.F;
W.prototype.m = function(a) {
    return Hf(Gf(this, a))
};
W.prototype.getAddressText = W.prototype.m;
W.prototype.I = function(a, b) {
    return If(this, Gf(this, a), b)
};
W.prototype.setAddressText = W.prototype.I;
function Jf(a, b) {
    for (var d = Ff(a), e = 0; e < d.length; e++) {
        var f = d[e];
        if (wf(U(f, "Name")) == b)
            return f
    }
    throw Error("getObjectByNameElement(): no object with name '" + b + "' was found");
}
function Hf(a) {
    return Ja(U(a, "StyledText").getElementsByTagName("String"), function(a, d) {
        return a + wf(d)
    }, "")
}
W.prototype.u = function(a) {
    a = Jf(this, a);
    switch (a.tagName) {
    case "AddressObject":
    case "TextObject":
        return Hf(a);
    case "BarcodeObject":
        return wf(U(a, "Text"));
    case "ImageObject":
        if (a = U(a, "Image"))
            return wf(a);
        break;
    case "CircularTextObject":
        return wf(U(a, "Text"))
    }
    return ""
};
W.prototype.getObjectText = W.prototype.u;
function If(a, b, d) {
    var e = U(b, "StyledText"), f = [], g;
    g = e.getElementsByTagName("Element");
    for (var h=!0, k = 0; k < g.length; k++) {
        var l = g[k], q = wf(U(l, "String"));
        if (q && q.length) {
            var q = q.split("\n"), v = q.length;
            if (1 != v || h) {
                var y = 0;
                h || (y = 1);
                for (h = U(l, "Attributes"); y < v - 1; y++)
                    f.push(h);
                0 < q[v - 1].length ? (f.push(h), h=!1) : h=!0
            }
        }
    }
    g = U(b, "LineFonts");
    b = [];
    g && (b = g.getElementsByTagName("Font"));
    var B;
    0 == b.length && (B = S('<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />').documentElement);
    for (g = S('<ForeColor Alpha="255" Red="0" Green="0" Blue="0" />').documentElement; e.firstChild;)
        e.removeChild(e.firstChild);
    d = d.split("\n");
    for (k = 0; k < d.length; k++)
        y = d[k].replace("\r", ""), k < d.length - 1 && (y += "\n"), h = B, 0 < b.length ? h = k < b.length ? b[k] : b[b.length - 1] : 0 < f.length && (h = k < f.length ? U(f[k], "Font") : U(f[f.length - 1], "Font")), l = g, k < f.length && (l = U(f[k], "ForeColor")), q = e.ownerDocument.createElement("Element"), v = e.ownerDocument.createElement("String"), xf(v, y), y = e.ownerDocument.createElement("Attributes"),
        y.appendChild(h.cloneNode(!0)), y.appendChild(l.cloneNode(!0)), q.appendChild(v), q.appendChild(y), e.appendChild(q);
    return a
}
W.prototype.T = function(a, b) {
    var d = Jf(this, a);
    switch (d.tagName) {
    case "AddressObject":
        If(this, d, b);
        break;
    case "TextObject":
        If(this, d, b);
        break;
    case "BarcodeObject":
        xf(U(d, "Text"), b);
        break;
    case "ImageObject":
        var e = U(d, "Image");
        if (e)
            xf(e, b);
        else {
            var f = U(d, "ImageLocation");
            if (!f)
                throw Error("setObjectText(): <ImageLocation> is expected but not found: " + vf(e));
            e = f.ownerDocument.createElement("Image");
            xf(e, b);
            d.replaceChild(e, f)
        }
        break;
    case "CircularTextObject":
        xf(U(d, "Text"), b);
        break;
    case "DateTimeObject":
        xf(U(d,
        "PreText"), b);
        break;
    case "CounterObject":
        xf(U(d, "PreText"), b)
    }
    return this
};
W.prototype.setObjectText = W.prototype.T;
W.prototype.toString = function() {
    return this.c()
}; /*
 Portions of this code are from MochiKit, received by
 The Closure Authors under the MIT license. All other code is Copyright
 2005-2009 The Closure Authors. All Rights Reserved.
*/
function Kf(a, b) {
    this.l = [];
    this.F = a;
    this.H = b || null;
    this.i = this.c=!1;
    this.h = void 0;
    this.B = this.I = this.s=!1;
    this.m = 0;
    this.f = null;
    this.u = 0
}
Kf.prototype.cancel = function(a) {
    if (this.c)
        this.h instanceof Kf && this.h.cancel();
    else {
        if (this.f) {
            var b = this.f;
            delete this.f;
            a ? b.cancel(a) : (b.u--, 0 >= b.u && b.cancel())
        }
        this.F ? this.F.call(this.H, this) : this.B=!0;
        this.c || (a = new Lf, Mf(this), Nf(this, !1, a))
    }
};
Kf.prototype.D = function(a, b) {
    this.s=!1;
    Nf(this, a, b)
};
function Nf(a, b, d) {
    a.c=!0;
    a.h = d;
    a.i=!b;
    Of(a)
}
function Mf(a) {
    if (a.c) {
        if (!a.B)
            throw new Pf;
        a.B=!1
    }
}
function Qf(a, b, d, e) {
    a.l.push([b, d, e]);
    a.c && Of(a)
}
Kf.prototype.then = function(a, b, d) {
    var e, f, g = new K(function(a, b) {
        e = a;
        f = b
    });
    Qf(this, e, function(a) {
        a instanceof Lf ? g.cancel() : f(a)
    });
    return g.then(a, b, d)
};
gc(Kf);
function Rf(a) {
    return Ka(a.l, function(a) {
        return t(a[1])
    })
}
function Of(a) {
    if (a.m && a.c && Rf(a)) {
        var b = a.m, d = Sf[b];
        d && (n.clearTimeout(d.A), delete Sf[b]);
        a.m = 0
    }
    a.f && (a.f.u--, delete a.f);
    for (var b = a.h, e = d=!1; a.l.length&&!a.s;) {
        var f = a.l.shift(), g = f[0], h = f[1], f = f[2];
        if (g = a.i ? h : g)
            try {
                var k = g.call(f || a.H, b);
                void 0 !== k && (a.i = a.i && (k == b || k instanceof Error), a.h = b = k);
                if (hc(b) || "function" === typeof n.Promise && b instanceof n.Promise)
                    e=!0, a.s=!0
        } catch (l) {
            b = l, a.i=!0, Rf(a) || (d=!0)
        }
    }
    a.h = b;
    e && (k = w(a.D, a, !0), e = w(a.D, a, !1), b instanceof Kf ? (Qf(b, k, e), b.I=!0) : b.then(k, e));
    d && (b =
    new Tf(b), Sf[b.A] = b, a.m = b.A)
}
function Pf() {
    A.call(this)
}
z(Pf, A);
Pf.prototype.message = "Deferred has already fired";
Pf.prototype.name = "AlreadyCalledError";
function Lf() {
    A.call(this)
}
z(Lf, A);
Lf.prototype.message = "Deferred was canceled";
Lf.prototype.name = "CanceledError";
function Tf(a) {
    this.A = n.setTimeout(w(this.f, this), 0);
    this.c = a
}
Tf.prototype.f = function() {
    delete Sf[this.A];
    throw this.c;
};
var Sf = {};
function Uf(a, b) {
    var d = b || {}, e = d.document || document, f = document.createElement("SCRIPT"), g = {
        wa: f,
        S: void 0
    }, h = new Kf(Vf, g), k = null, l = null != d.timeout ? d.timeout: 5E3;
    0 < l && (k = window.setTimeout(function() {
        Wf(f, !0);
        var b = new Xf(Yf, "Timeout reached for loading script " + a);
        Mf(h);
        Nf(h, !1, b)
    }, l), g.S = k);
    f.onload = f.onreadystatechange = function() {
        f.readyState && "loaded" != f.readyState && "complete" != f.readyState || (Wf(f, d.Ja ||!1, k), Mf(h), Nf(h, !0, null))
    };
    f.onerror = function() {
        Wf(f, !0, k);
        var b = new Xf(Zf, "Error while loading script " +
        a);
        Mf(h);
        Nf(h, !1, b)
    };
    Tb(f, {
        type: "text/javascript",
        charset: "UTF-8",
        src: a
    });
    $f(e).appendChild(f);
    return h
}
function $f(a) {
    var b = a.getElementsByTagName("HEAD");
    return b && 0 != b.length ? b[0] : a.documentElement
}
function Vf() {
    if (this && this.wa) {
        var a = this.wa;
        a && "SCRIPT" == a.tagName && Wf(a, !0, this.S)
    }
}
function Wf(a, b, d) {
    null != d && n.clearTimeout(d);
    a.onload = ca;
    a.onerror = ca;
    a.onreadystatechange = ca;
    b && window.setTimeout(function() {
        a && a.parentNode && a.parentNode.removeChild(a)
    }, 0)
}
var Zf = 0, Yf = 1;
function Xf(a, b) {
    var d = "Jsloader error (code #" + a + ")";
    b && (d += ": " + b);
    A.call(this, d)
}
z(Xf, A);
function ag(a, b) {
    this.f = new Q(a);
    this.c = b ? b : "callback";
    this.S = 5E3
}
var bg = 0;
ag.prototype.send = function(a, b, d, e) {
    a = a || null;
    e = e || "_" + (bg++).toString(36) + qa().toString(36);
    n._callbacks_ || (n._callbacks_ = {});
    var f = this.f.clone();
    if (a)
        for (var g in a)
            if (!a.hasOwnProperty || a.hasOwnProperty(g)) {
                var h = f, k = g, l = a[g];
                p(l) || (l = [String(l)]);
                cf(h.c, k, l)
            }
    b && (n._callbacks_[e] = cg(e, b), b = this.c, g = "_callbacks_." + e, p(g) || (g = [String(g)]), cf(f.c, b, g));
    b = Uf(f.toString(), {
        timeout: this.S,
        Ja: !0
    });
    Qf(b, null, dg(e, a, d), void 0);
    return {
        A: e,
        ra: b
    }
};
ag.prototype.cancel = function(a) {
    a && (a.ra && a.ra.cancel(), a.A && eg(a.A, !1))
};
function dg(a, b, d) {
    return function() {
        eg(a, !1);
        d && d(b)
    }
}
function cg(a, b) {
    return function(d) {
        eg(a, !0);
        b.apply(void 0, arguments)
    }
}
function eg(a, b) {
    n._callbacks_[a] && (b ? delete n._callbacks_[a] : n._callbacks_[a] = ca)
};
function fg() {
    M.call(this);
    this.f = "closure_frame" + gg++;
    this.h = [];
    hg[this.f] = this
}
var ig;
z(fg, M);
var hg = {}, gg = 0;
function jg(a, b) {
    var d = new fg;
    md(d, "ready", d.m, !1, d);
    d.send(a, "POST", !0, b)
}
function kg(a, b) {
    var d = Qb(a);
    Gd(b, function(b, f) {
        var g = d.qa("INPUT", {
            type: "hidden",
            name: f,
            value: b
        });
        a.appendChild(g)
    })
}
m = fg.prototype;
m.w = ce("goog.net.IframeIo");
m.o = null;
m.v = null;
m.P = null;
m.Ka = 0;
m.L=!1;
m.da=!1;
m.ia = null;
m.la = null;
m.O = null;
m.send = function(a, b, d, e) {
    if (this.L)
        throw Error("[goog.net.IframeIo] Unable to send, already active.");
    this.ia = a = new Q(a);
    b = b ? b.toUpperCase() : "GET";
    if (d) {
        d = Math.floor(2147483648 * Math.random()).toString(36) + Math.abs(Math.floor(2147483648 * Math.random())^qa()).toString(36);
        var f = a.c, g = "zx";
        Ze(f);
        f.f = null;
        g = $e(f, g);
        bf(f, g) && (f.h -= Ld(f.c, g).length);
        Id(f.c, g, [d]);
        f.h++
    }
    de(this.w, "Sending iframe request: " + a + " [" + b + "]");
    ig || (ig = Vb("FORM"), ig.acceptCharset = "utf-8", d = ig.style, d.position = "absolute", d.visibility =
    "hidden", d.top = d.left = "-10px", d.width = d.height = "10px", d.overflow = "hidden", document.body.appendChild(ig));
    this.o = ig;
    "GET" == b && kg(this.o, a.c);
    e && kg(this.o, e);
    this.o.action = a.toString();
    this.o.method = b;
    this.L=!0;
    P(this.w, "Creating iframe");
    this.P = this.f + "_" + (this.Ka++).toString(36);
    e = {
        name: this.P,
        id: this.P
    };
    H && 7 > fb && (e.src = 'javascript:""');
    this.v = Qb(this.o).qa("IFRAME", e);
    e = this.v.style;
    e.visibility = "hidden";
    e.width = e.height = "10px";
    e.display = "none";
    cb ? e.marginTop = e.marginLeft = "-10px" : (e.position = "absolute",
    e.top = e.left = "-10px");
    if (H&&!J("11")) {
        this.o.target = this.P || "";
        Qb(this.o).c.body.appendChild(this.v);
        md(this.v, "readystatechange", this.ma, !1, this);
        try {
            this.c=!1, this.o.submit()
        } catch (h) {
            sd(this.v, "readystatechange", this.ma, !1, this), lg(this)
        }
    } else {
        P(this.w, "Setting up iframes and cloning form");
        Qb(this.o).c.body.appendChild(this.v);
        e = this.P + "_inner";
        a = $b(this.v);
        document.baseURI ? (b = ua(e), qb("Short HTML snippet, input escaped, safe URL, for performance"), b = '<head><base href="' + ua(document.baseURI) +
        '"></head><body><iframe id="' + b + '" name="' + b + '"></iframe>', b = Kb(b, null)) : (b = ua(e), qb("Short HTML snippet, input escaped, for performance"), b = Kb('<body><iframe id="' + b + '" name="' + b + '"></iframe>', null));
        ab ? a.documentElement.innerHTML = Ib(b) : a.write(Ib(b));
        md(a.getElementById(e), "load", this.ca, !1, this);
        f = this.o.getElementsByTagName("TEXTAREA");
        b = 0;
        for (d = f.length; b < d; b++)
            if (g = f[b].value, ec(f[b]) != g) {
                var k = f[b], l = g;
                if ("textContent"in k)
                    k.textContent = l;
                else if (3 == k.nodeType)
                    k.data = l;
                else if (k.firstChild &&
                3 == k.firstChild.nodeType) {
                    for (; k.lastChild != k.firstChild;)
                        k.removeChild(k.lastChild);
                        k.firstChild.data = l
                } else 
                    Zb(k), k.appendChild((9 == k.nodeType ? k : k.ownerDocument || k.document).createTextNode(String(l)));
                    f[b].value = g
            }
        f = a.importNode(this.o, !0);
        f.target = e;
        f.action = this.o.action;
        a.body.appendChild(f);
        g = this.o.getElementsByTagName("SELECT");
        k = f.getElementsByTagName("SELECT");
        b = 0;
        for (d = g.length; b < d; b++)
            for (var l = g[b].getElementsByTagName("OPTION"), q = k[b].getElementsByTagName("OPTION"), v = 0, y = l.length; v <
            y; v++)
                q[v].selected = l[v].selected;
        g = this.o.getElementsByTagName("INPUT");
        k = f.getElementsByTagName("INPUT");
        b = 0;
        for (d = g.length; b < d; b++)
            if ("file" == g[b].type && g[b].value != k[b].value) {
                P(this.w, "File input value not cloned properly.  Will submit using original form.");
                this.o.target = e;
                f = this.o;
                break
            }
        P(this.w, "Submitting form");
        try {
            this.c=!1, f.submit(), a.close(), bb && yd(this.xa, 250, this)
        } catch (B) {
            b = this.w;
            var mb;
            try {
                var Ba;
                var I = ba("window.location.href");
                if (r(B))
                    Ba = {
                        message: B,
                        name: "Unknown error",
                        lineNumber: "Not available",
                        fileName: I,
                        stack: "Not available"
                    };
                else {
                    var X, u;
                    d=!1;
                    try {
                        X = B.lineNumber || B.Pa || "Not available"
                    } catch (Wg) {
                        X = "Not available", d=!0
                    }
                    try {
                        u = B.fileName || B.filename || B.sourceURL || n.$googDebugFname || I
                    } catch (Xg) {
                        u = "Not available", d=!0
                    }
                    Ba=!d && B.lineNumber && B.fileName && B.stack && B.message && B.name ? B : {
                        message: B.message || "Not available",
                        name: B.name || "UnknownError",
                        lineNumber: X,
                        fileName: u,
                        stack: B.stack || "Not available"
                    }
                }
                var da;
                var E = Ba.fileName;
                null != E || (E = "");
                if (/^https?:\/\//i.test(E)) {
                    var ka;
                    I = E;
                    I instanceof wb ?
                    ka = I : (I = I.R ? I.N() : String(I), I = zb.test(I) ? Ab(I) : "about:invalid#zClosurez", ka = Db(I));
                    qb("view-source scheme plus HTTP/HTTPS URL");
                    var ea = "view-source:" + yb(ka);
                    da = Db(ea)
                } else {
                    var la = qb("sanitizedviewsrc");
                    da = Db(pb(la))
                }
                var Pg = Lb("Message: " + Ba.message + "\nUrl: "), Te;
                da = {
                    href: da,
                    target: "_new"
                };
                var Sa = Ba.fileName;
                if (!Mb.test("a"))
                    throw Error("Invalid tag name <a>.");
                if ("A"in Ob)
                    throw Error("Tag name <a> is not allowed for SafeHtml.");
                ka = null;
                ea = "<a";
                if (da)
                    for (var Sb in da) {
                        if (!Mb.test(Sb))
                            throw Error('Invalid attribute name "' +
                            Sb + '".');
                            var Ue = da[Sb];
                            if (null != Ue) {
                                var I = ea, Ve;
                                X = Sb;
                                u = Ue;
                                if (u instanceof nb)
                                    u = pb(u);
                                else if ("style" == X.toLowerCase()) {
                                    E = u;
                                    if (!ia(E))
                                        throw Error('The "style" attribute requires goog.html.SafeStyle or map of style properties, ' + typeof E + " given: " + E);
                                        if (!(E instanceof rb)) {
                                            la = E;
                                            d = "";
                                            f = void 0;
                                            for (f in la) {
                                                if (!/^[-_a-zA-Z0-9]+$/.test(f))
                                                    throw Error("Name allows only [-_a-zA-Z0-9], got: " + f);
                                                    var O = la[f];
                                                    if (null != O) {
                                                        if (O instanceof nb)
                                                            O = pb(O);
                                                        else if (vb.test(O)) {
                                                            k = g=!0;
                                                            for (l = 0; l < O.length; l++) {
                                                                var We = O.charAt(l);
                                                                "'" == We && k ? g=!g : '"' == We && g && (k=!k)
                                                            }
                                                            g && k || (Ga("String value requires balanced quotes, got: " + O), O = "zClosurez")
                                                        } else 
                                                            Ga("String value allows only [-,.\"'%_!# a-zA-Z0-9], got: " + O), O = "zClosurez";
                                                            d += f + ":" + O + ";"
                                                    }
                                                }
                                                E = d ? tb(d) : ub
                                            }
                                            la = void 0;
                                            E instanceof rb && E.constructor === rb && E.f === sb ? la = E.c : (Ga("expected object of type SafeStyle, got '" + E + "'"), la = "type_error:SafeStyle");
                                            u = la
                                    } else {
                                        if (/^on/i.test(X))
                                            throw Error('Attribute "' + X + '" requires goog.string.Const value, "' + u + '" given.');
                                            if (X.toLowerCase()in Nb)
                                                if (u instanceof
                                                Eb)
                                                    u instanceof Eb && u.constructor === Eb && u.c === Fb ? u = "" : (Ga("expected object of type TrustedResourceUrl, got '" + u + "'"), u = "type_error:TrustedResourceUrl");
                                                else if (u instanceof wb)
                                                    u = yb(u);
                                                else 
                                                    throw Error('Attribute "' + X + '" on tag "a" requires goog.html.SafeUrl or goog.string.Const value, "' + u + '" given.');
                                    }
                                    u.R && (u = u.N());
                                    Ve = X + '="' + ua(String(u)) + '"';
                                    ea = I + (" " + Ve)
                                }
                            }
                null != Sa ? p(Sa) || (Sa = [Sa]) : Sa = [];
                if (!0 === lb.a)
                    ea += ">";
                else {
                    var Xe = Pb(Sa), ea = ea + (">" + Ib(Xe) + "</a>");
                    ka = Xe.U()
                }
                var Ye = da && da.dir;
                Ye && (/^(ltr|rtl|auto)$/i.test(Ye) ?
                ka = 0 : ka = null);
                Te = Kb(ea, ka);
                mb = Pb(Pg, Te, Lb("\nLine: " + Ba.lineNumber + "\n\nBrowser stack:\n" + Ba.stack + "-> [end]\n\nJS stack traversal:\n" + Md(void 0) + "-> "))
            } catch (Qg) {
                mb = Lb("Exception trying to expose exception! You win, we lose. " + Qg)
            }
            mb = Ib(mb);
            b && b.log(Ud, "Error when submitting form: " + mb, void 0);
            sd(a.getElementById(e), "load", this.ca, !1, this);
            a.close();
            lg(this)
        }
    }
    mg(this)
};
m.G = function() {
    P(this.w, "Disposing iframeIo instance");
    if (this.L && (P(this.w, "Aborting active request"), this.L)) {
        de(this.w, "Request aborted");
        var a = ng(this);
        if (a)
            if (a && a[ad])
                a.C && id(a.C);
            else if (a = od(a)) {
                var b = 0, d;
                for (d in a.c)
                    for (var e = a.c[d].concat(), f = 0; f < e.length; ++f)
                        td(e[f])&&++b
            }
        this.da = this.L=!1;
        N(this, "abort");
        og(this)
    }
    fg.X.G.call(this);
    this.v && pg(this);
    mg(this);
    this.o = null;
    delete this.i;
    this.ia = this.la = this.o = null;
    delete hg[this.f]
};
m.ba = function() {
    return this.da
};
m.ma = function() {
    if ("complete" == this.v.readyState) {
        sd(this.v, "readystatechange", this.ma, !1, this);
        var a;
        try {
            if (a = $b(this.v), H && "about:blank" == a.location&&!navigator.onLine) {
                lg(this);
                return 
            }
        } catch (b) {
            lg(this);
            return 
        }
        qg(this, a)
    }
};
m.ca = function() {
    if (!ab || "about:blank" != (this.v ? $b(ng(this)) : null).location) {
        sd(ng(this), "load", this.ca, !1, this);
        try {
            qg(this, this.v ? $b(ng(this)) : null)
        } catch (a) {
            lg(this)
        }
    }
};
function qg(a, b) {
    P(a.w, "Iframe loaded");
    a.L=!1;
    var d;
    try {
        var e = b.body;
        a.la = e.textContent || e.innerText
    } catch (f) {
        d = 1
    }
    d || "function" != typeof a.i || (e = a.i(b)) && (d = 4);
    (e = a.w) && e.log(Zd, "Last content: " + a.la, void 0);
    (e = a.w) && e.log(Zd, "Last uri: " + a.ia, void 0);
    d ? (P(a.w, "Load event occurred but failed"), lg(a)) : (P(a.w, "Load succeeded"), a.da=!0, N(a, "complete"), N(a, "success"), og(a))
}
function lg(a) {
    a.c || (a.da=!1, a.L=!1, N(a, "complete"), N(a, "error"), og(a), a.c=!0)
}
function og(a) {
    de(a.w, "Ready for new requests");
    pg(a);
    mg(a);
    a.o = null;
    N(a, "ready")
}
function pg(a) {
    var b = a.v;
    b && (b.onreadystatechange = null, b.onload = null, b.onerror = null, a.h.push(b));
    a.O && (n.clearTimeout(a.O), a.O = null);
    bb || ab ? a.O = yd(a.sa, 2E3, a) : a.sa();
    a.v = null;
    a.P = null
}
m.sa = function() {
    this.O && (n.clearTimeout(this.O), this.O = null);
    for (; 0 != this.h.length;) {
        var a = this.h.pop();
        de(this.w, "Disposing iframe");
        a && a.parentNode && a.parentNode.removeChild(a)
    }
};
function mg(a) {
    a.o && a.o == ig && Zb(a.o)
}
function ng(a) {
    return a.v ? H&&!J("11") ? a.v : $b(a.v).getElementById(a.P + "_inner") : null
}
m.xa = function() {
    if (this.L) {
        var a = this.v ? $b(ng(this)): null;
        a&&!Zc(a, "documentUri") ? (sd(ng(this), "load", this.ca, !1, this), navigator.onLine ? (a = this.w) && a.log(Vd, "Silent Firefox error detected", void 0) : (a = this.w) && a.log(Vd, "Firefox is offline so report offline error instead of silent error", void 0), lg(this)) : yd(this.xa, 250, this)
    }
};
function rg(a, b, d) {
    Sc.call(this);
    this.c = a;
    this.l = b || 0;
    this.f = d;
    this.h = w(this.i, this)
}
z(rg, Sc);
rg.prototype.A = 0;
rg.prototype.G = function() {
    rg.X.G.call(this);
    sg(this);
    delete this.c;
    delete this.f
};
function tg(a, b) {
    sg(a);
    a.A = yd(a.h, void 0 !== b ? b : a.l)
}
function sg(a) {
    0 != a.A && n.clearTimeout(a.A);
    a.A = 0
}
rg.prototype.i = function() {
    this.A = 0;
    this.c && this.c.call(this.f)
};
var ug = function() {
    function a(a) {
        var b = f;
        return b[a[0]] + b[a[1]] + b[a[2]] + b[a[3]] + "-" + b[a[4]] + b[a[5]] + "-" + b[a[6]] + b[a[7]] + "-" + b[a[8]] + b[a[9]] + "-" + b[a[10]] + b[a[11]] + b[a[12]] + b[a[13]] + b[a[14]] + b[a[15]]
    }
    function b(b, f, g) {
        var h = "binary" != b ? e: f ? f: new d(16);
        f = f && g || 0;
        g = 4294967296 * Math.random();
        h[f++] = g & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = g>>>8 & 255;
        g = 4294967296 * Math.random();
        h[f++] = g & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = (g>>>=8) & 15 | 64;
        h[f++] = g>>>8 & 255;
        g = 4294967296 * Math.random();
        h[f++] = g & 63 | 128;
        h[f++] =
        (g>>>=8) & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = g>>>8 & 255;
        g = 4294967296 * Math.random();
        h[f++] = g & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = (g>>>=8) & 255;
        h[f++] = g>>>8 & 255;
        return void 0 === b ? a(h) : h
    }
    for (var d = Array, e = new d(16), f = [], g = {}, h = 0; 256 > h; h++)
        f[h] = (h + 256).toString(16).substr(1).toUpperCase(), g[f[h]] = h;
    b.f = function(a) {
        var b = new d(16), e = 0;
        a.toUpperCase().replace(/[0-9A-F][0-9A-F]/g, function(a) {
            b[e++] = g[a]
        });
        return b
    };
    b.h = a;
    b.c = d;
    return b
}();
function vg(a, b, d, e) {
    this.printerName = a;
    this.jobId = b;
    this.status = d;
    this.statusMessage = e
}
function wg(a) {
    var b = {};
    a = a.split(" ");
    1 <= a.length && (b.status = parseInt(a[0], 10));
    b.statusMessage = a.slice(1).join(" ");
    return b
}
function xg(a) {
    for (var b = 0; b < navigator.plugins.length; ++b)
        for (var d = navigator.plugins[b], e = 0; e < d.length; ++e)
            if (d[e].type == a)
                return !0;
    return !1
}
function yg() {
    if (!document.getElementById("_DymoLabelFrameworkJslSafariPlugin")) {
        var a = document.createElement("embed");
        a.type = "application/x-dymolabel";
        a.id = "_DymoLabelFrameworkJslSafariPlugin";
        a.width = 1;
        a.height = 1;
        a.hidden=!0;
        document.body.appendChild(a)
    }
    return window._DymoLabelFrameworkJslSafariPlugin
}
function zg(a) {
    if (!document.getElementById("_DymoLabelFrameworkJslPlugin")) {
        var b = document.createElement("embed");
        b.type = "application/x-dymolabel";
        b.id = "_DymoLabelFrameworkJslPlugin";
        a ? (b.width = 1, b.height = 1, b.hidden=!0) : (b.width = 0, b.height = 0, b.hidden=!1);
        document.body.appendChild(b)
    }
    return document.getElementById("_DymoLabelFrameworkJslPlugin")
}
function Ag() {
    var a = zg(!0);
    a.getPrinters || (document.body.removeChild(a), a = zg(!1));
    return a
}
function Bg(a) {
    if (!document.getElementById("_DymoLabelFrameworkJslPlugin")) {
        var b = document.createElement("embed");
        b.type = "application/x-npapi-dymolabel";
        b.id = "_DymoLabelFrameworkJslPlugin";
        a ? (b.width = 1, b.height = 1, b.hidden=!0) : (b.width = 0, b.height = 0, b.hidden=!1);
        document.body.appendChild(b);
        b.getPrinters || (b.width = 1, b.height = 1, b.hidden=!1)
    }
    return document.getElementById("_DymoLabelFrameworkJslPlugin")
}
function Cg() {
    var a = Bg(!0);
    a.getPrinters || (document.body.removeChild(a), a = Bg(!1));
    return a
}
function Dg() {
    var a = new ActiveXObject("DYMOLabelFrameworkIEPlugin.Plugin");
    if ("object" != typeof a)
        throw Error("createFramework(): unable to create DYMO.Label.Framework object. Check DYMO Label Framework is installed");
    return a
}
function Eg(a) {
    if ("" != a.errorDetails)
        throw Error(a.M);
    if (a.isWebServicePresent) {
        var b = new of;
        if (b)
            a = {
                getPrinters: function() {
                    return b.getPrinters()
                },
                openLabelFile: function(a) {
                    return b.openLabelFile(a)
                },
                printLabel: function(a, d, e, f) {
                    b.printLabel(a, d, e, f)
                },
                printLabel2: function(a, d, e, f) {
                    b.printLabel2(a, d, e, f)
                },
                renderLabel: function(a, d, e) {
                    return b.renderLabel(a, d, e)
                },
                loadImageAsPngBase64: function(a) {
                    return b.loadImageAsPngBase64(a)
                },
                getJobStatus: function(a, d) {
                    var e;
                    t(b.getJobStatus) ? e = wg(b.getJobStatus(a,
                    parseInt(d, 10))) : e = {
                        status: R.W,
                        statusMessage: "not implemented"
                    };
                    return new vg(a, d, e.status, e.statusMessage)
                }
            };
        else 
            throw Error("Cannot establish connection to the web service. Is DYMO Label Framework installed?");
    } else if ("ActiveXObject"in window) {
        a = {};
        var d = Dg();
        a.getPrinters = function() {
            return d.GetPrinters()
        };
        a.openLabelFile = function(a) {
            return d.OpenLabelFile(a)
        };
        a.printLabel = function(a, b, e, f) {
            d.PrintLabel(a, b, e, f)
        };
        a.renderLabel = function(a, b, e) {
            return d.RenderLabel(a, b, e)
        };
        a.loadImageAsPngBase64 =
        function(a) {
            return d.LoadImageAsPngBase64(a)
        };
        a.printLabel2 = function(a, b, e, f) {
            if (t(d.PrintLabel2))
                return d.PrintLabel2(a, b, e, f).toString();
            d.PrintLabel(a, b, e, f)
        };
        a.getJobStatus = function(a, b) {
            var e;
            t(d.GetJobStatus) ? e = wg(d.GetJobStatus(a, parseInt(b, 10))) : e = {
                status: R.W,
                statusMessage: "not implemented"
            };
            return new vg(a, b, e.status, e.statusMessage)
        }
    } else if ( - 1 != navigator.platform.indexOf("Win")) {
        var e = Ag();
        if (e)
            a = {
                getPrinters: function() {
                    return e.getPrinters()
                },
                openLabelFile: function(a) {
                    return e.openLabelFile(a)
                },
                printLabel: function(a, b, d, f) {
                    e.printLabel(a, b, d, f)
                },
                renderLabel: function(a, b, d) {
                    return e.renderLabel(a, b, d)
                },
                loadImageAsPngBase64: function(a) {
                    return e.loadImageAsPngBase64(a)
                },
                printLabel2: function(a, b, d, f) {
                    if (t(e.printLabel2))
                        return e.printLabel2(a, b, d, f).toString();
                        e.printLabel(a, b, d, f)
                    },
                    getJobStatus: function(a, b) {
                        var d;
                        t(e.getJobStatus) ? d = wg(e.getJobStatus(a, parseInt(b, 10))) : d = {
                            status: R.W,
                            statusMessage: "not implemented"
                        };
                        return new vg(a, b, d.status, d.statusMessage)
                    }
                };
            else 
                throw Error("DYMO Label Framework is not installed");
    } else {
        var f;
        xg("application/x-dymolabel") ? f = yg() : f = Cg();
        if (f)
            a = {
                getPrinters: function() {
                    return f.getPrinters()
                },
                openLabelFile: function(a) {
                    var b = f.openLabelFile(a);
                    if (!b)
                        throw Error("Unable to open label file '" + a + "'");
                        return b
                    },
                    printLabel: function(a, b, d, e) {
                        f.printLabel(d, a, b, e)
                    },
                    renderLabel: function(a, b, d) {
                        return f.renderLabel(a, b, d)
                    },
                    loadImageAsPngBase64: function(a) {
                        var b = f.loadImageAsPngBase64(a);
                        if (!b)
                            throw Error("Unable to load image from uri '" + a + "'");
                            return b
                        },
                        printLabel2: function(a, b, d, e) {
                            if (t(f.printLabel2))
                                return f.printLabel2(d,
                                a, b, e).toString();
                                f.printLabel(d, a, b, e)
                            },
                            getJobStatus: function(a, b) {
                                var d;
                                t(f.getJobStatus) ? d = wg(f.getJobStatus(a, parseInt(b, 10))) : d = {
                                    status: R.W,
                                    statusMessage: "not implemented"
                                };
                                return new vg(a, b, d.status, d.statusMessage)
                            }
                        };
                    else 
                        throw Error("DYMO Label Framework is not installed");
    }
    return a
}
var Fg = 0;
function Gg(a) {
    function b() {
        throw d;
    }
    var d = a || Error("DYMO Label Framework Plugin or WebService are not installed");
    return {
        getPrinters: b,
        openLabelFile: b,
        printLabel: b,
        printLabel2: b,
        renderLabel: b,
        loadImageAsPngBase64: b,
        getJobStatus: b
    }
}
var Y = function() {
    function a(e, f) {
        if (d)
            throw Error("DYMO Label Framework service discovery is in progress.");
        return b ? (e && e(), b) : this && this.constructor == a ? (d=!0, Y.c = function() {
            b = null
        }, Hg(function(a) {
            try {
                Fg = b = Eg(a)
            } catch (h) {
                if (!f)
                    throw h;
                b = Gg(h)
            } finally {
                d=!1
            }
            e && e()
        }, f), b) : new a(e, f)
    }
    var b, d=!1;
    return a
}();
x("dymo.label.framework.init", function(a) {
    Y(a, !0)
});
function Ig(a, b, d, e, f) {
    this.printerType = a;
    this.name = b;
    this.modelName = d;
    this.isConnected = e;
    this.isLocal = f;
    this.f = this.c = ""
}
function Jg(a, b, d, e, f) {
    Ig.call(this, "LabelWriterPrinter", a, b, d, e);
    this.isTwinTurbo = f
}
z(Jg, Ig);
function Kg(a, b, d, e, f) {
    Ig.call(this, "TapePrinter", a, b, d, e);
    this.isAutoCutSupported = f
}
z(Kg, Ig);
function Lg(a, b, d, e, f) {
    Ig.call(this, "DZPrinter", a, b, d, e);
    this.isAutoCutSupported = f
}
z(Lg, Ig);
function Z(a, b) {
    this.c = a;
    this.f = b
}
Z.prototype.i = function() {
    return this.c.name
};
Z.prototype.getPrinterName = Z.prototype.i;
Z.prototype.l = function() {
    return this.f
};
Z.prototype.getJobId = Z.prototype.l;
Z.prototype.h = function(a) {
    if ("" != this.c.c)
        Mg(this, a);
    else {
        var b;
        try {
            b = Y().getJobStatus(this.c.name, this.f)
        } catch (d) {
            b = new vg(this.i(), this.f, R.ha, d.message || d)
        }
        a(b)
    }
};
Z.prototype.getStatus = Z.prototype.h;
function Mg(a, b) {
    var d = a.i(), e = a.f, f = a.c.c;
    (new ag(Re(f, "getPrintJobStatus"), "callback")).send({
        jobId: e,
        printerName: a.c.f
    }, function(a) {
        b(new vg(d, e, a.status, a.statusMessage))
    }, function() {
        b(new vg(d, e, R.ha, 'Error processing getPrintJobStatus(): Unable to contact "' + f + '"'))
    })
};
x("dymo.label.framework.VERSION", "2.0.0");
function Hg(a, b) {
    function d() {
        f.Oa=!1;
        var b = window.navigator.platform;
        if ( - 1 != b.indexOf("Win"))
            if ("ActiveXObject"in window) {
                f.ta=!0;
                try {
                    "object" != typeof new ActiveXObject("DYMOLabelFrameworkIEPlugin.Plugin") ? f.M = "Unable to create DYMO.Label.Framework ActiveX object. Check that DYMO.Label.Framework is installed" : f.ka=!0
                } catch (d) {
                    f.M = "Unable to create DYMO.Label.Framework ActiveX object. Check that DYMO.Label.Framework is installed. Exception details: " + d
                }
            } else 
                f.ta=!0, xg("application/x-dymolabel") ?
                f.ka=!0 : f.M = "DYMO Label Framework Plugin is not installed";
        else 
            - 1 != b.indexOf("Mac") ? (f.ta=!0, xg("application/x-dymolabel") ? (b = yg(), "2.0" <= b.GetAPIVersion() ? f.ka=!0 : f.M = "DYMO Label Safari Plugin is installed but outdated. Install the latest version.") : xg("application/x-npapi-dymolabel") ? (b = Cg()) && b.getPrinters ? f.ka=!0 : f.M = 'DYMO NSAPI plugin is loaded but no callable functions found. If running Safari, then run it in 64-bit mode (MacOS X >= 10.7) or set "Open using Rosetta" option' : f.M = "DYMO Label Plugin is not installed.") :
            f.M = "The operating system is not supported.";
        a && a(f)
    }
    function e() {
        f.isBrowserSupported=!0;
        f.isFrameworkInstalled=!0;
        f.isWebServicePresent=!0;
        a && a(f)
    }
    var f = {
        isBrowserSupported: !1,
        isFrameworkInstalled: !1,
        isWebServicePresent: !1,
        errorDetails: ""
    };
    if (Fg)
        return e(), f;
    var g = hf();
    b ? g ? ue("http://localhost:" + g + "/DYMO/DLS/Printing/StatusConnected", function(a) {
        a.target.ba() ? e() : (gf(null), lf(e, d))
    }) : lf(e, d) : (g = g || 41951, kf(g) ? (gf(g), e(), Fg || Y.c && Y.c()) : (gf(null), d()));
    return f
}
x("dymo.label.framework.checkEnvironment", Hg);
var Ng = {};
function Og(a, b, d) {
    this.c = a;
    this.f = b;
    this.h = d
}
Og.prototype.getPrinters = function() {
    var a = Rg(this.h), b = new Q(this.c), d = this.f;
    "" == d && (d = b.f);
    for (b = 0; b < a.length; ++b) {
        var e = a[b], f = e.name;
        e.name = f + " @ " + d;
        e.c = this.c;
        e.location = d;
        e.f = f;
        e.printerUri = e.c;
        e.location = e.location;
        e.localName = e.f
    }
    return a
};
x("dymo.label.framework.addPrinterUri", function(a, b, d, e) {
    var f = b || "";
    r(f) || (f = f.toString());
    b = null;
    e && (b = function() {
        e(a)
    });
    var g = oe(a);
    (new ag(g, "callback")).send(null, function(b) {
        Ng[a] = new Og(a, f, b);
        d && d(a)
    }, b)
});
x("dymo.label.framework.removePrinterUri", function(a) {
    delete Ng[a]
});
x("dymo.label.framework.removeAllPrinterUri", function() {
    Ng = {}
});
function Rg(a) {
    function b(a, b) {
        return wf(U(a, b))
    }
    var d = S(a);
    a = [];
    for (var e = U(d, "Printers"), d = e.getElementsByTagName("LabelWriterPrinter"), f = 0; f < d.length; f++) {
        var g = b(d[f], "Name"), h = b(d[f], "ModelName"), k = "True" == b(d[f], "IsConnected"), l = "True" == b(d[f], "IsLocal"), q = "True" == b(d[f], "IsTwinTurbo"), g = new Jg(g, h, k, l, q);
        a[f] = g;
        a[g.name] = g
    }
    q = e.getElementsByTagName("TapePrinter");
    for (f = 0; f < q.length; f++) {
        var g = b(q[f], "Name"), h = b(q[f], "ModelName"), k = "True" == b(q[f], "IsConnected"), l = "True" == b(q[f], "IsLocal"), v =
        "True" == b(q[f], "IsAutoCutSupported"), g = new Kg(g, h, k, l, v);
        a[f + d.length] = g;
        a[g.name] = g
    }
    e = e.getElementsByTagName("DZPrinter");
    for (f = 0; f < e.length; f++)
        g = b(e[f], "Name"), h = b(e[f], "ModelName"), k = "True" == b(e[f], "IsConnected"), l = "True" == b(e[f], "IsLocal"), v = "True" == b(e[f], "IsAutoCutSupported"), g = new Lg(g, h, k, l, v), a[f + d.length] = g, a[g.name] = g;
    return a
}
function Sg() {
    var a = [];
    try {
        var b = Y().getPrinters(), a = Rg(b)
    } catch (d) {}
    for (var e in Ng)
        for (var b = Ng[e].getPrinters(), f = 0; f < b.length; ++f) {
            var g = b[f];
            a.push(g);
            a[g.name] = g
        }
    return a
}
x("dymo.label.framework.getPrinters", Sg);
function Tg(a) {
    for (var b = [], d = Sg(), e = 0; e < d.length; e++) {
        var f = d[e];
        f.printerType && f.printerType == a && b.push(f)
    }
    return b
}
x("dymo.label.framework.getLabelWriterPrinters", function() {
    return Tg("LabelWriterPrinter")
});
x("dymo.label.framework.getTapePrinters", function() {
    return Tg("TapePrinter")
});
x("dymo.label.framework.getDZPrinters", function() {
    return Tg("DZPrinter")
});
x("dymo.label.framework.openLabelFile", function(a) {
    return new W(Y().openLabelFile(a))
});
x("dymo.label.framework.openLabelXml", function(a) {
    var b = new Sd("dymo.label.framework");
    b.c = Wd;
    b.log(Wd, a, void 0);
    return new W(a)
});
function Bf(a, b, d, e) {
    b = b || "";
    e = e || "";
    "string" != typeof e && (e = e.toString());
    if ("undefined" == typeof d)
        throw Error("printLabel(): labelXml parameter should be specified");
    "string" != typeof d && (d = d.toString());
    var f = Sg()[a];
    if (null != f)
        "" != f.c ? Ug(f, b, d, e) : Y().printLabel(f.name, b, d, e);
    else 
        throw Error("printLabel(): unknown printer '" + a + "'");
}
x("dymo.label.framework.printLabel", Bf);
function Cf(a, b, d, e) {
    b = b || "";
    e = e || "";
    "string" != typeof e && (e = e.toString());
    if ("undefined" == typeof d)
        throw Error("printLabel2(): labelXml parameter should be specified");
    "string" != typeof d && (d = d.toString());
    var f = Sg()[a];
    if (null != f)
        return "" != f.c ? Ug(f, b, d, e) : new Z(f, Y().printLabel2(a, b, d, e));
    throw Error("printLabel(): unknown printer '" + a + "'");
}
x("dymo.label.framework.printLabel2", Cf);
function Ug(a, b, d, e) {
    function f(a, b) {
        var d = 4E3 * a, e = "";
        d >= k.length ? a =- 1 : e = k.substr(d, 4E3);
        (new ag(h, "c")).send({
            j: g,
            cid: a,
            pl: e
        }, function(d) {
            var e = d.status, h = new Sd("dymo.label.framework");
            h.c = Wd;
            0 == e?-1 != a ? f(++a, 0) : h.log(Wd, "Finished sending job payload for " + g, void 0) : - 5 == e ? 10 > b ? f(++d.lastAckChunkId, ++b) : h.log(Vd, 'Unable to send print job data for "' + g + '": STATUS_INVALID_CHUNK_ID: Max retry count reached', void 0) : 10 > b ? f(a, ++b) : h.log(Vd, 'Unable to send print job data for "' + g + '": Max retry count reached',
            void 0)
        }, function() {
            var d = new Sd("dymo.label.framework");
            d.c = Wd;
            10 > b ? f(a, ++b) : d.log(Vd, 'Unable to send print job data for "' + g + '": error: Max retry count reached', void 0)
        })
    }
    var g = ug();
    b = {
        printerName: a.f,
        labelXml: d,
        printParamsXml: b,
        labelSetXml: e
    };
    var h = Re(a.c, "pl"), k = zd(b);
    f(0, 0);
    return new Z(a, g)
}
function Df(a, b, d, e, f, g) {
    function h(a) {
        if (f(k, a)) {
            var b = new rg(function() {
                k.h(h);
                b.m()
            }, g);
            tg(b)
        }
    }
    var k = Cf(a, b, d, e);
    k.h(h);
    return k
}
x("dymo.label.framework.printLabelAndPollStatus", Df);
function Af(a, b, d) {
    if ("undefined" == typeof a)
        throw Error("renderLabel(): labelXml parameter should be specified");
    "string" != typeof a && (a = a.toString());
    b = b || "";
    d = d || "";
    return Y().renderLabel(a, b, d)
}
x("dymo.label.framework.renderLabel", Af);
function Vg(a, b, d, e) {
    var f = {};
    f.requestId = a;
    f.imageData = e;
    f.statusId = b;
    f.statusMessage = d;
    return f
}
x("dymo.label.framework.renderLabelAsync", function(a, b, d, e) {
    if ("undefined" == typeof a)
        throw Error("renderLabelAsync(): labelXml parameter should be specified");
    if (!b)
        throw Error("renderLabelAsync(): callback parameter should be specified");
    "string" != typeof a && (a = a.toString());
    d = d || "";
    e = e || "";
    var f = Sg()[e];
    if (null == e || null != f && "" == f.c) {
        var g;
        try {
            var h = Y().renderLabel(a, d, e);
            g = Vg("", "Ready", "", h)
        } catch (k) {
            g = Vg("", "Error", k.message || k, "")
        }
        b(g)
    } else {
        if (null == f)
            throw Error("printLabel(): unknown printer '" +
            e + "'");
        var l = ug();
        jg(Re(f.c, "renderLabel"), {
            requestId: l,
            printerName: f.f,
            labelXml: a,
            renderParamsXml: d
        });
        var q, v = (new Date).getTime();
        q = new rg(function() {
            3E4 < (new Date).getTime() - v ? (q.m(), q = null, b(Vg(l, "Timeout", "", ""))) : (new ag(Re(f.c, "getRenderLabelStatus"), "callback")).send({
                requestId: l
            }, function(a) {
                var d = a.statusId;
                "NotStarted" == d || "Processing" == d ? (sg(q), tg(q, 1E3)) : (q.m(), q = null, b(a))
            }, function() {
                tg(q, 1E3)
            })
        }, 500);
        tg(q)
    }
});
x("dymo.label.framework.loadImageAsPngBase64", function(a) {
    return Y().loadImageAsPngBase64(a)
});
x("dymo.label.framework.createLabelWriterPrintParamsXml", function(a) {
    if (!a)
        return "";
    var b = S("<LabelWriterPrintParams/>"), d = b.documentElement;
    a.copies && T(d, "Copies", a.copies.toString());
    a.jobTitle && T(d, "JobTitle", a.jobTitle);
    a.flowDirection && T(d, "FlowDirection", a.flowDirection);
    a.printQuality && T(d, "PrintQuality", a.printQuality);
    a.twinTurboRoll && T(d, "TwinTurboRoll", a.twinTurboRoll);
    return vf(b)
});
x("dymo.label.framework.createTapePrintParamsXml", function(a) {
    if (!a)
        return "";
    var b = S("<TapePrintParams/>"), d = b.documentElement;
    a.copies && T(d, "Copies", a.copies.toString());
    a.jobTitle && T(d, "JobTitle", a.jobTitle);
    a.flowDirection && T(d, "FlowDirection", a.flowDirection);
    a.alignment && T(d, "Alignment", a.alignment);
    a.cutMode && T(d, "CutMode", a.cutMode);
    return vf(b)
});
x("dymo.label.framework.createDZPrintParamsXml", function(a) {
    if (!a)
        return "";
    var b = S("<DZPrintParams/>"), d = b.documentElement;
    a.copies && T(d, "Copies", a.copies.toString());
    a.jobTitle && T(d, "JobTitle", a.jobTitle);
    a.flowDirection && T(d, "FlowDirection", a.flowDirection);
    a.alignment && T(d, "Alignment", a.alignment);
    a.cutMode && T(d, "CutMode", a.cutMode);
    return vf(b)
});
x("dymo.label.framework.createLabelRenderParamsXml", function(a) {
    function b(a, b) {
        T(e, a, void 0, {
            Alpha : b.a || b.alpha || 255, Red : b.r || b.red || 0, Green : b.g || b.green || 0, Blue : b.b || b.blue || 0
        })
    }
    if (!a)
        return "";
    var d = S("<LabelRenderParams/>"), e = d.documentElement;
    a.labelColor && b("LabelColor", a.labelColor);
    a.shadowColor && b("ShadowColor", a.shadowColor);
    "undefined" != typeof a.shadowDepth && T(e, "ShadowDepth", a.shadowDepth.toString());
    a.flowDirection && T(e, "FlowDirection", a.flowDirection);
    "undefined" != typeof a.pngUseDisplayResolution &&
    T(e, "PngUseDisplayResolution", a.pngUseDisplayResolution ? "True" : "False");
    return vf(d)
});
})();



