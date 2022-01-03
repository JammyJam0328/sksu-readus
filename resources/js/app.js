require("./bootstrap");

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";
import trap from "@alpinejs/trap";

Alpine.plugin(trap);
Alpine.plugin(intersect);
Alpine.plugin(collapse);
window.Alpine = Alpine;

Alpine.start();
Object.defineProperty(HTMLMediaElement.prototype, "playing", {
    get: function() {
        return !!(
            this.currentTime > 0 &&
            !this.paused &&
            !this.ended &&
            this.readyState > 2
        );
    },
});
!(function(t, e) {
    "use strict";
    "function" != typeof t.CustomEvent &&
        ((t.CustomEvent = function(t, n) {
                n = n || { bubbles: !1, cancelable: !1, detail: void 0 };
                var a = e.createEvent("CustomEvent");
                return a.initCustomEvent(t, n.bubbles, n.cancelable, n.detail), a;
            }),
            (t.CustomEvent.prototype = t.Event.prototype)),
        e.addEventListener(
            "touchstart",
            function(t) {
                if ("true" === t.target.getAttribute("data-swipe-ignore"))
                    return;
                (s = t.target),
                (r = Date.now()),
                (n = t.touches[0].clientX),
                (a = t.touches[0].clientY),
                (u = 0),
                (i = 0);
            }, !1
        ),
        e.addEventListener(
            "touchmove",
            function(t) {
                if (!n || !a) return;
                var e = t.touches[0].clientX,
                    r = t.touches[0].clientY;
                (u = n - e), (i = a - r);
            }, !1
        ),
        e.addEventListener(
            "touchend",
            function(t) {
                if (s !== t.target) return;
                var e = parseInt(l(s, "data-swipe-threshold", "20"), 10),
                    o = parseInt(l(s, "data-swipe-timeout", "500"), 10),
                    c = Date.now() - r,
                    d = "",
                    p = t.changedTouches || t.touches || [];
                Math.abs(u) > Math.abs(i) ?
                    Math.abs(u) > e &&
                    c < o &&
                    (d = u > 0 ? "swiped-left" : "swiped-right") :
                    Math.abs(i) > e &&
                    c < o &&
                    (d = i > 0 ? "swiped-up" : "swiped-down");
                if ("" !== d) {
                    var b = {
                        dir: d.replace(/swiped-/, ""),
                        touchType: (p[0] || {}).touchType || "direct",
                        xStart: parseInt(n, 10),
                        xEnd: parseInt((p[0] || {}).clientX || -1, 10),
                        yStart: parseInt(a, 10),
                        yEnd: parseInt((p[0] || {}).clientY || -1, 10),
                    };
                    s.dispatchEvent(
                            new CustomEvent("swiped", {
                                bubbles: !0,
                                cancelable: !0,
                                detail: b,
                            })
                        ),
                        s.dispatchEvent(
                            new CustomEvent(d, {
                                bubbles: !0,
                                cancelable: !0,
                                detail: b,
                            })
                        );
                }
                (n = null), (a = null), (r = null);
            }, !1
        );
    var n = null,
        a = null,
        u = null,
        i = null,
        r = null,
        s = null;

    function l(t, n, a) {
        for (; t && t !== e.documentElement;) {
            var u = t.getAttribute(n);
            if (u) return u;
            t = t.parentNode;
        }
        return a;
    }
})(window, document);