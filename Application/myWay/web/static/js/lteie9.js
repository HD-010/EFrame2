/*app/system/include/static2/vendor/media-match/media.match.min.js*/
/* MediaMatch v.2.0.2 - Testing css media queries in Javascript. Authors & copyright (c) 2013: WebLinc, David Knight. */

window.matchMedia || (window.matchMedia = function(c) {
	var a = c.document,
		w = a.documentElement,
		l = [],
		t = 0,
		x = "",
		h = {},
		G = /\s*(only|not)?\s*(screen|print|[a-z\-]+)\s*(and)?\s*/i,
		H = /^\s*\(\s*(-[a-z]+-)?(min-|max-)?([a-z\-]+)\s*(:?\s*([0-9]+(\.[0-9]+)?|portrait|landscape)(px|em|dppx|dpcm|rem|%|in|cm|mm|ex|pt|pc|\/([0-9]+(\.[0-9]+)?))?)?\s*\)\s*$/,
		y = 0,
		A = function(b) {
			var z = -1 !== b.indexOf(",") && b.split(",") || [b],
				e = z.length - 1,
				j = e,
				g = null,
				d = null,
				c = "",
				a = 0,
				l = !1,
				m = "",
				f = "",
				g = null,
				d = 0,
				f = null,
				k = "",
				p = "",
				q = "",
				n = "",
				r = "",
				k = !1;
			if("" ===
				b) return !0;
			do {
				g = z[j - e];
				l = !1;
				if(d = g.match(G)) c = d[0], a = d.index;
				if(!d || -1 === g.substring(0, a).indexOf("(") && (a || !d[3] && c !== d.input)) k = !1;
				else {
					f = g;
					l = "not" === d[1];
					a || (m = d[2], f = g.substring(c.length));
					k = m === x || "all" === m || "" === m;
					g = -1 !== f.indexOf(" and ") && f.split(" and ") || [f];
					d = g.length - 1;
					if(k && 0 <= d && "" !== f) {
						do {
							f = g[d].match(H);
							if(!f || !h[f[3]]) {
								k = !1;
								break
							}
							k = f[2];
							n = p = f[5];
							q = f[7];
							r = h[f[3]];
							q && (n = "px" === q ? Number(p) : "em" === q || "rem" === q ? 16 * p : f[8] ? (p / f[8]).toFixed(2) : "dppx" === q ? 96 * p : "dpcm" === q ? 0.3937 * p : Number(p));
							k = "min-" === k && n ? r >= n : "max-" === k && n ? r <= n : n ? r === n : !!r;
							if(!k) break
						} while (d--)
					}
					if(k) break
				}
			} while (e--);
			return l ? !k : k
		},
		B = function() {
			var b = c.innerWidth || w.clientWidth,
				a = c.innerHeight || w.clientHeight,
				e = c.screen.width,
				j = c.screen.height,
				g = c.screen.colorDepth,
				d = c.devicePixelRatio;
			h.width = b;
			h.height = a;
			h["aspect-ratio"] = (b / a).toFixed(2);
			h["device-width"] = e;
			h["device-height"] = j;
			h["device-aspect-ratio"] = (e / j).toFixed(2);
			h.color = g;
			h["color-index"] = Math.pow(2, g);
			h.orientation = a >= b ? "portrait" : "landscape";
			h.resolution =
				d && 96 * d || c.screen.deviceXDPI || 96;
			h["device-pixel-ratio"] = d || 1
		},
		C = function() {
			clearTimeout(y);
			y = setTimeout(function() {
				var b = null,
					a = t - 1,
					e = a,
					j = !1;
				if(0 <= a) {
					B();
					do
						if(b = l[e - a])
							if((j = A(b.mql.media)) && !b.mql.matches || !j && b.mql.matches)
								if(b.mql.matches = j, b.listeners)
									for(var j = 0, g = b.listeners.length; j < g; j++) b.listeners[j] && b.listeners[j].call(c, b.mql); while (a--)
				}
			}, 10)
		},
		D = a.getElementsByTagName("head")[0],
		a = a.createElement("style"),
		E = null,
		u = "screen print speech projection handheld tv braille embossed tty".split(" "),
		m = 0,
		I = u.length,
		s = "#mediamatchjs { position: relative; z-index: 0; }",
		v = "",
		F = c.addEventListener || (v = "on") && c.attachEvent;
	a.type = "text/css";
	a.id = "mediamatchjs";
	D.appendChild(a);
	for(E = c.getComputedStyle && c.getComputedStyle(a) || a.currentStyle; m < I; m++) s += "@media " + u[m] + " { #mediamatchjs { position: relative; z-index: " + m + " } }";
	a.styleSheet ? a.styleSheet.cssText = s : a.textContent = s;
	x = u[1 * E.zIndex || 0];
	D.removeChild(a);
	B();
	F(v + "resize", C);
	F(v + "orientationchange", C);
	return function(a) {
		var c = t,
			e = {
				matches: !1,
				media: a,
				addListener: function(a) {
					l[c].listeners || (l[c].listeners = []);
					a && l[c].listeners.push(a)
				},
				removeListener: function(a) {
					var b = l[c],
						d = 0,
						e = 0;
					if(b)
						for(e = b.listeners.length; d < e; d++) b.listeners[d] === a && b.listeners.splice(d, 1)
				}
			};
		if("" === a) return e.matches = !0, e;
		e.matches = A(a);
		t = l.push({
			mql: e,
			listeners: null
		});
		return e
	}
}(window));
/*app/system/include/static2/vendor/respond/respond.min.js*/
/*! Respond.js v1.4.2: min/max-width media query polyfill
 * Copyright 2014 Scott Jehl
 * Licensed under MIT
 * http://j.mp/respondjs */

! function(a) {
	"use strict";
	a.matchMedia = a.matchMedia || function(a) {
		var b, c = a.documentElement,
			d = c.firstElementChild || c.firstChild,
			e = a.createElement("body"),
			f = a.createElement("div");
		return f.id = "mq-test-1", f.style.cssText = "position:absolute;top:-100em", e.style.background = "none", e.appendChild(f),
			function(a) {
				return f.innerHTML = '&shy;<style media="' + a + '"> #mq-test-1 { width: 42px; }</style>', c.insertBefore(e, d), b = 42 === f.offsetWidth, c.removeChild(e), {
					matches: b,
					media: a
				}
			}
	}(a.document)
}(this),
function(a) {
	"use strict";

	function b() {
		v(!0)
	}
	var c = {};
	a.respond = c, c.update = function() {};
	var d = [],
		e = function() {
			var b = !1;
			try {
				b = new a.XMLHttpRequest
			} catch(c) {
				b = new a.ActiveXObject("Microsoft.XMLHTTP")
			}
			return function() {
				return b
			}
		}(),
		f = function(a, b) {
			var c = e();
			c && (c.open("GET", a, !0), c.onreadystatechange = function() {
				4 !== c.readyState || 200 !== c.status && 304 !== c.status || b(c.responseText)
			}, 4 !== c.readyState && c.send(null))
		},
		g = function(a) {
			return a.replace(c.regex.minmaxwh, "").match(c.regex.other)
		};
	if(c.ajax = f, c.queue = d, c.unsupportedmq = g, c.regex = {
			media: /@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi,
			keyframes: /@(?:\-(?:o|moz|webkit)\-)?keyframes[^\{]+\{(?:[^\{\}]*\{[^\}\{]*\})+[^\}]*\}/gi,
			comments: /\/\*[^*]*\*+([^/][^*]*\*+)*\//gi,
			urls: /(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,
			findStyles: /@media *([^\{]+)\{([\S\s]+?)$/,
			only: /(only\s+)?([a-zA-Z]+)\s?/,
			minw: /\(\s*min\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/,
			maxw: /\(\s*max\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/,
			minmaxwh: /\(\s*m(in|ax)\-(height|width)\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/gi,
			other: /\([^\)]*\)/g
		}, c.mediaQueriesSupported = a.matchMedia && null !== a.matchMedia("only all") && a.matchMedia("only all").matches, !c.mediaQueriesSupported) {
		var h, i, j, k = a.document,
			l = k.documentElement,
			m = [],
			n = [],
			o = [],
			p = {},
			q = 30,
			r = k.getElementsByTagName("head")[0] || l,
			s = k.getElementsByTagName("base")[0],
			t = r.getElementsByTagName("link"),
			u = function() {
				var a, b = k.createElement("div"),
					c = k.body,
					d = l.style.fontSize,
					e = c && c.style.fontSize,
					f = !1;
				return b.style.cssText = "position:absolute;font-size:1em;width:1em", c || (c = f = k.createElement("body"), c.style.background = "none"), l.style.fontSize = "100%", c.style.fontSize = "100%", c.appendChild(b), f && l.insertBefore(c, l.firstChild), a = b.offsetWidth, f ? l.removeChild(c) : c.removeChild(b), l.style.fontSize = d, e && (c.style.fontSize = e), a = j = parseFloat(a)
			},
			v = function(b) {
				var c = "clientWidth",
					d = l[c],
					e = "CSS1Compat" === k.compatMode && d || k.body[c] || d,
					f = {},
					g = t[t.length - 1],
					p = (new Date).getTime();
				if(b && h && q > p - h) return a.clearTimeout(i), i = a.setTimeout(v, q), void 0;
				h = p;
				for(var s in m)
					if(m.hasOwnProperty(s)) {
						var w = m[s],
							x = w.minw,
							y = w.maxw,
							z = null === x,
							A = null === y,
							B = "em";
						x && (x = parseFloat(x) * (x.indexOf(B) > -1 ? j || u() : 1)), y && (y = parseFloat(y) * (y.indexOf(B) > -1 ? j || u() : 1)), w.hasquery && (z && A || !(z || e >= x) || !(A || y >= e)) || (f[w.media] || (f[w.media] = []), f[w.media].push(n[w.rules]))
					}
				for(var C in o) o.hasOwnProperty(C) && o[C] && o[C].parentNode === r && r.removeChild(o[C]);
				o.length = 0;
				for(var D in f)
					if(f.hasOwnProperty(D)) {
						var E = k.createElement("style"),
							F = f[D].join("\n");
						E.type = "text/css", E.media = D, r.insertBefore(E, g.nextSibling), E.styleSheet ? E.styleSheet.cssText = F : E.appendChild(k.createTextNode(F)), o.push(E)
					}
			},
			w = function(a, b, d) {
				var e = a.replace(c.regex.comments, "").replace(c.regex.keyframes, "").match(c.regex.media),
					f = e && e.length || 0;
				b = b.substring(0, b.lastIndexOf("/"));
				var h = function(a) {
						return a.replace(c.regex.urls, "$1" + b + "$2$3")
					},
					i = !f && d;
				b.length && (b += "/"), i && (f = 1);
				for(var j = 0; f > j; j++) {
					var k, l, o, p;
					i ? (k = d, n.push(h(a))) : (k = e[j].match(c.regex.findStyles) && RegExp.$1, n.push(RegExp.$2 && h(RegExp.$2))), o = k.split(","), p = o.length;
					for(var q = 0; p > q; q++) l = o[q], g(l) || m.push({
						media: l.split("(")[0].match(c.regex.only) && RegExp.$2 || "all",
						rules: n.length - 1,
						hasquery: l.indexOf("(") > -1,
						minw: l.match(c.regex.minw) && parseFloat(RegExp.$1) + (RegExp.$2 || ""),
						maxw: l.match(c.regex.maxw) && parseFloat(RegExp.$1) + (RegExp.$2 || "")
					})
				}
				v()
			},
			x = function() {
				if(d.length) {
					var b = d.shift();
					f(b.href, function(c) {
						w(c, b.href, b.media), p[b.href] = !0, a.setTimeout(function() {
							x()
						}, 0)
					})
				}
			},
			y = function() {
				for(var b = 0; b < t.length; b++) {
					var c = t[b],
						e = c.href,
						f = c.media,
						g = c.rel && "stylesheet" === c.rel.toLowerCase();
					e && g && !p[e] && (c.styleSheet && c.styleSheet.rawCssText ? (w(c.styleSheet.rawCssText, e, f), p[e] = !0) : (!/^([a-zA-Z:]*\/\/)/.test(e) && !s || e.replace(RegExp.$1, "").split("/")[0] === a.location.host) && ("//" === e.substring(0, 2) && (e = a.location.protocol + e), d.push({
						href: e,
						media: f
					})))
				}
				x()
			};
		y(), c.update = y, c.getEmValue = u, a.addEventListener ? a.addEventListener("resize", b, !1) : a.attachEvent && a.attachEvent("onresize", b)
	}
}(this);
/*app/system/include/static/js/classList.min.js*/
/*! @source http://purl.eligrey.com/github/classList.js/blob/master/classList.js */
if("document" in self) {
	if(!("classList" in document.createElement("_"))) {
		(function(j) {
			"use strict";
			if(!("Element" in j)) {
				return
			}
			var a = "classList",
				f = "prototype",
				m = j.Element[f],
				b = Object,
				k = String[f].trim || function() {
					return this.replace(/^\s+|\s+$/g, "")
				},
				c = Array[f].indexOf || function(q) {
					var p = 0,
						o = this.length;
					for(; p < o; p++) {
						if(p in this && this[p] === q) {
							return p
						}
					}
					return -1
				},
				n = function(o, p) {
					this.name = o;
					this.code = DOMException[o];
					this.message = p
				},
				g = function(p, o) {
					if(o === "") {
						throw new n("SYNTAX_ERR", "An invalid or illegal string was specified")
					}
					if(/\s/.test(o)) {
						throw new n("INVALID_CHARACTER_ERR", "String contains an invalid character")
					}
					return c.call(p, o)
				},
				d = function(s) {
					var r = k.call(s.getAttribute("class") || ""),
						q = r ? r.split(/\s+/) : [],
						p = 0,
						o = q.length;
					for(; p < o; p++) {
						this.push(q[p])
					}
					this._updateClassName = function() {
						s.setAttribute("class", this.toString())
					}
				},
				e = d[f] = [],
				i = function() {
					return new d(this)
				};
			n[f] = Error[f];
			e.item = function(o) {
				return this[o] || null
			};
			e.contains = function(o) {
				o += "";
				return g(this, o) !== -1
			};
			e.add = function() {
				var s = arguments,
					r = 0,
					p = s.length,
					q, o = false;
				do {
					q = s[r] + "";
					if(g(this, q) === -1) {
						this.push(q);
						o = true
					}
				} while (++r < p);
				if(o) {
					this._updateClassName()
				}
			};
			e.remove = function() {
				var t = arguments,
					s = 0,
					p = t.length,
					r, o = false,
					q;
				do {
					r = t[s] + "";
					q = g(this, r);
					while(q !== -1) {
						this.splice(q, 1);
						o = true;
						q = g(this, r)
					}
				} while (++s < p);
				if(o) {
					this._updateClassName()
				}
			};
			e.toggle = function(p, q) {
				p += "";
				var o = this.contains(p),
					r = o ? q !== true && "remove" : q !== false && "add";
				if(r) {
					this[r](p)
				}
				if(q === true || q === false) {
					return q
				} else {
					return !o
				}
			};
			e.toString = function() {
				return this.join(" ")
			};
			if(b.defineProperty) {
				var l = {
					get: i,
					enumerable: true,
					configurable: true
				};
				try {
					b.defineProperty(m, a, l)
				} catch(h) {
					if(h.number === -2146823252) {
						l.enumerable = false;
						b.defineProperty(m, a, l)
					}
				}
			} else {
				if(b[f].__defineGetter__) {
					m.__defineGetter__(a, i)
				}
			}
		}(self))
	} else {
		(function() {
			var b = document.createElement("_");
			b.classList.add("c1", "c2");
			if(!b.classList.contains("c2")) {
				var c = function(e) {
					var d = DOMTokenList.prototype[e];
					DOMTokenList.prototype[e] = function(h) {
						var g, f = arguments.length;
						for(g = 0; g < f; g++) {
							h = arguments[g];
							d.call(this, h)
						}
					}
				};
				c("add");
				c("remove")
			}
			b.classList.toggle("c3", false);
			if(b.classList.contains("c3")) {
				var a = DOMTokenList.prototype.toggle;
				DOMTokenList.prototype.toggle = function(d, e) {
					if(1 in arguments && !this.contains(d) === !e) {
						return e
					} else {
						return a.call(this, d)
					}
				}
			}
			b = null
		}())
	}
};