/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 153);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 1:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var disposed = false
var cssModules = {}
module.hot && module.hot.accept(["!!vue-style-loader!css-loader?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index?{\"vue\":true,\"id\":\"data-v-d30b0db8\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector?type=styles&index=0!./UserBigImagesAllDiplay.vue"], function () {
  var oldLocals = cssModules["$style"]
  if (!oldLocals) return
  var newLocals = __webpack_require__(7)
  if (JSON.stringify(newLocals) === JSON.stringify(oldLocals)) return
  cssModules["$style"] = newLocals
  __webpack_require__(4).rerender("data-v-d30b0db8")
})
function injectStyle (ssrContext) {
  if (disposed) return
  cssModules["$style"] = __webpack_require__(7)
Object.defineProperty(this, "$style", { get: function () { return cssModules["$style"] }})
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(12)
/* template */
var __vue_template__ = __webpack_require__(13)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/UserBigImagesAllDiplay.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-d30b0db8", Component.options)
  } else {
    if (module.hot.data.cssModules && Object.keys(module.hot.data.cssModules) !== Object.keys(cssModules)) {
      delete Component.options._Ctor
    }
    hotAPI.reload("data-v-d30b0db8", Component.options)
  }
  module.hot.dispose(function (data) {
    data.cssModules = cssModules
    disposed = true
  })
})()}

module.exports = Component.exports

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(3)(module)))

/***/ }),

/***/ 11:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, "\n._2eFSOsauUB6fjnOGZwKTHx_0 {\n\tdisplay: inline-block;\n\tpadding-top: 2%;\n\theight: auto;\n\tmargin: auto;\n\tposition: absolute;\n\ttop: 0; left: 0; bottom: 0; right: 0;\n\tz-index:20;\n\t-webkit-transition: all .5s;\n\ttransition: all .5s;\n}\n._2cWSwOEY3Tln2Af9vMW2qu_0,._18sgMkkICsW86WENlwGA8A_0{\n\tposition: fixed;\n\ttext-align: center;\n\ttop:0px;\n\tleft:0px;\n\twidth: 100%;\n\theight: 100%;\n\tz-index:19;\n\t-webkit-transition: all .5s;\n\ttransition: all .5s;\n}\n._2cWSwOEY3Tln2Af9vMW2qu_0 img{\n\tdisplay: block;\n\t-webkit-transition: all .5s;\n\ttransition: all .5s;\n}\n._18sgMkkICsW86WENlwGA8A_0{\n\topacity: 0.9;\n\tbackground-color: #000;\n\t-webkit-transition: all .5s;\n\ttransition: all .5s;\n}\n._25DEnduV9w6WclKHWosgk3_0{\n\tfont-size: 20px;\n\tdisplay: block;\n\tposition: relative;\n\ttop:0px;\n    width: 100%;\n    height: 30px;\n    text-align: right;\n}\n._1cRHOR8TillJsYeWm_-z7P_0{\n\twidth: 100%;\n}\n", ""]);

// exports
exports.locals = {
	"AbsoluteCenter": "_2eFSOsauUB6fjnOGZwKTHx_0",
	"AbsoluteCenterDiv": "_2cWSwOEY3Tln2Af9vMW2qu_0",
	"AllDisplay": "_18sgMkkICsW86WENlwGA8A_0",
	"CloseButton": "_25DEnduV9w6WclKHWosgk3_0",
	"images": "_1cRHOR8TillJsYeWm_-z7P_0"
};

/***/ }),

/***/ 12:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({

    props: {
        url: Array,
        imageurl: String
    }

});

/***/ }),

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { class: _vm.$style.AbsoluteCenterDiv }, [
    _c("div", { class: _vm.$style.AllDisplay }),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "col-lg-7 col-md-6 col-sm-11 col-xs-11",
        class: _vm.$style.AbsoluteCenter
      },
      [
        _c("span", {
          staticClass: "glyphicon glyphicon-remove",
          class: _vm.$style.CloseButton,
          on: {
            click: function($event) {
              _vm.$emit("closeimage")
            }
          }
        }),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "carousel slide",
            attrs: { id: "myCarousel", "data-ride": "carousel" }
          },
          [
            _c(
              "ol",
              { staticClass: "carousel-indicators" },
              _vm._l(_vm.url, function(img, index) {
                return _c("li", {
                  class: { active: index == 0 },
                  attrs: {
                    "data-target": "#myCarousel",
                    "data-slide-to": index
                  }
                })
              })
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "carousel-inner" },
              _vm._l(_vm.url, function(img, index) {
                return _c(
                  "div",
                  {
                    key: index,
                    staticClass: "item ",
                    class: { active: img.img == _vm.imageurl }
                  },
                  [
                    _c("img", {
                      class: _vm.$style.images,
                      attrs: { src: "/img/uploads/" + img.img, alt: img.name }
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "carousel-caption" }, [
                      _c("h3", [_vm._v(_vm._s(img.name))]),
                      _vm._v(" "),
                      _c("p", [_vm._v(_vm._s(img.description))])
                    ])
                  ]
                )
              })
            ),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _vm._m(1)
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "left carousel-control",
        attrs: { href: "#myCarousel", "data-slide": "prev" }
      },
      [
        _c("span", { staticClass: "glyphicon glyphicon-chevron-left" }),
        _vm._v(" "),
        _c("span", { staticClass: "sr-only" }, [_vm._v("Previous")])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "right carousel-control",
        attrs: { href: "#myCarousel", "data-slide": "next" }
      },
      [
        _c("span", { staticClass: "glyphicon glyphicon-chevron-right" }),
        _vm._v(" "),
        _c("span", { staticClass: "sr-only" }, [_vm._v("Next")])
      ]
    )
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-d30b0db8", module.exports)
  }
}

/***/ }),

/***/ 153:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(154);


/***/ }),

/***/ 154:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_UserImages_vue__ = __webpack_require__(155);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_UserImages_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_UserImages_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_UserBigImagesAllDiplay_vue__ = __webpack_require__(10);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_UserBigImagesAllDiplay_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__components_UserBigImagesAllDiplay_vue__);



var NavBarContent = new Vue({
    mounted: function mounted() {
        var _this = this;

        setTimeout(function () {
            _this.start = true;
        }, 1000);
    },

    el: '#dashbord',
    data: {
        showimagebig: false,
        view_1_image_text: false,
        view_2_image_text: false,
        images: [],
        url: "",
        start: false,
        lang: []
    },
    components: {
        'user-images': __WEBPACK_IMPORTED_MODULE_0__components_UserImages_vue___default.a,
        'user-big-images-all-diplay': __WEBPACK_IMPORTED_MODULE_1__components_UserBigImagesAllDiplay_vue___default.a
    },
    methods: {
        $_BigShowcallbac: function $_BigShowcallbac(url) {
            this.url = url;
            this.showimagebig = true;
        },
        $_CloseImage: function $_CloseImage() {
            this.showimagebig = false;
        },
        $_AnimatText: function $_AnimatText(event) {
            var scroll = window.scrollY;
            var heightsize = scroll / document.documentElement.scrollHeight * 100;
            if (37 < heightsize) {
                this.view_1_image_text = true;
            } else {
                this.view_1_image_text = false;
            }

            if (60 < heightsize) {
                this.view_2_image_text = true;
            } else {
                this.view_2_image_text = false;
            }
            //console.log((scroll/document.documentElement.scrollHeight)*100)
        }

    },
    created: function created() {
        window.addEventListener('scroll', this.$_AnimatText);
        this.lang = Window.lang;
        this.images = Window.imagesUrl;
    },
    destroyed: function destroyed() {
        window.removeEventListener('scroll', this.$_AnimatText);
    },
    beforeUpdate: function beforeUpdate() {}

});

/***/ }),

/***/ 155:
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var disposed = false
var cssModules = {}
module.hot && module.hot.accept(["!!vue-style-loader!css-loader?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index?{\"vue\":true,\"id\":\"data-v-999acbcc\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector?type=styles&index=0!./UserImages.vue"], function () {
  var oldLocals = cssModules["$style"]
  if (!oldLocals) return
  var newLocals = __webpack_require__(46)
  if (JSON.stringify(newLocals) === JSON.stringify(oldLocals)) return
  cssModules["$style"] = newLocals
  __webpack_require__(4).rerender("data-v-999acbcc")
})
function injectStyle (ssrContext) {
  if (disposed) return
  cssModules["$style"] = __webpack_require__(46)
Object.defineProperty(this, "$style", { get: function () { return cssModules["$style"] }})
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(157)
/* template */
var __vue_template__ = __webpack_require__(158)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/UserImages.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-999acbcc", Component.options)
  } else {
    if (module.hot.data.cssModules && Object.keys(module.hot.data.cssModules) !== Object.keys(cssModules)) {
      delete Component.options._Ctor
    }
    hotAPI.reload("data-v-999acbcc", Component.options)
  }
  module.hot.dispose(function (data) {
    data.cssModules = cssModules
    disposed = true
  })
})()}

module.exports = Component.exports

/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(3)(module)))

/***/ }),

/***/ 156:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, "\n._1IrRj6rxLkbelX0KcnHhPn_0 {\n    text-align: center;\n    margin-left: auto;\n    margin-right: auto;\n}\n\n\n/* Image zoom on hover + Overlay colour */\n._1e43zNHZXaD-YybHEUjl14_0 {\n    height: 450px;\n    overflow: hidden;\n    position: relative;\n    float: left;\n    display: inline-block;\n    cursor: pointer;\n}\n._3a32x6HYad7N-mDq5yftZQ_0 {\n    height: 100%;\n    width: 100%;\n    background-size: cover;\n    background-repeat: no-repeat;\n    -webkit-transition: all .5s;\n    transition: all .5s;\n}\n._1e43zNHZXaD-YybHEUjl14_0:hover ._3a32x6HYad7N-mDq5yftZQ_0, ._1e43zNHZXaD-YybHEUjl14_0:focus ._3a32x6HYad7N-mDq5yftZQ_0 {\n    -webkit-transform: scale(1.2);\n    transform: scale(1.2);\n}\n@-webkit-keyframes _1Bbfa27pogJRLFOvOelcnH_0 {\nfrom {bottom: -40px;opacity: 0;\n}\nto {bottom: 40px;opacity: 1;\n}\n}\n@keyframes _1Bbfa27pogJRLFOvOelcnH_0 {\nfrom {bottom: -40px;opacity: 0;\n}\nto {bottom: 40px;opacity: 1;\n}\n}\n._1e43zNHZXaD-YybHEUjl14_0:hover ._3a32x6HYad7N-mDq5yftZQ_0:before, ._1e43zNHZXaD-YybHEUjl14_0:focus ._3a32x6HYad7N-mDq5yftZQ_0:before {\n    display: block;\n}\n._1e43zNHZXaD-YybHEUjl14_0:hover ._2doB_21p1iNrz5nvndW9Ho_0, ._1e43zNHZXaD-YybHEUjl14_0:focus ._2doB_21p1iNrz5nvndW9Ho_0 {\n    display: block;\n\t-webkit-animation-name: _1Bbfa27pogJRLFOvOelcnH_0;\n\t        animation-name: _1Bbfa27pogJRLFOvOelcnH_0;\n    -webkit-animation-duration: .5s;\n            animation-duration: .5s;\n    bottom: 40px;\n    opacity: 1;\n}\n@-webkit-keyframes _3sTRXwLS-3j5MTdivkNu4l_0 {\nfrom {opacity: 0;\n}\nto {opacity: 1;\n}\n}\n@keyframes _3sTRXwLS-3j5MTdivkNu4l_0 {\nfrom {opacity: 0;\n}\nto {opacity: 1;\n}\n}\n._3a32x6HYad7N-mDq5yftZQ_0:before {\n    content: \"\";\n    display: none;\n    height: 100%;\n    width: 100%;\n    position: absolute;\n    top: 0;\n    left: 0;\n    background-color: #bf834f;\n   -webkit-animation-name: _3sTRXwLS-3j5MTdivkNu4l_0;\n           animation-name: _3sTRXwLS-3j5MTdivkNu4l_0;\n    -webkit-animation-duration: .5s;\n            animation-duration: .5s;\n}\n\n /*Media Queries */\n/*@media screen and (max-width: 960px) {\n    \n}*/\n._2CT8fIYKNmFnORdIo8db6l_0{\n    width:100%;\n}\n._2doB_21p1iNrz5nvndW9Ho_0{\n\tdisplay: none;\n    position: absolute;\n    bottom: -30px;\n    color:#fff;\n}\n._2doB_21p1iNrz5nvndW9Ho_0 span{\n\tfont-family: 'Tunga-Bold'!important;\n    text-transform: uppercase;\n}\n._2doB_21p1iNrz5nvndW9Ho_0 h2{\n\tfont-family: 'TrajanPro3';\n    font-weight: 400;\n    line-height: 1.2;\n    margin:0px;\n}\n\n", ""]);

// exports
exports.locals = {
	"wrapper": "_1IrRj6rxLkbelX0KcnHhPn_0",
	"parent": "_1e43zNHZXaD-YybHEUjl14_0",
	"child": "_3a32x6HYad7N-mDq5yftZQ_0",
	"textdiv": "_2doB_21p1iNrz5nvndW9Ho_0",
	"textanimation": "_1Bbfa27pogJRLFOvOelcnH_0",
	"childanimat": "_3sTRXwLS-3j5MTdivkNu4l_0",
	"childimg": "_2CT8fIYKNmFnORdIo8db6l_0"
};

/***/ }),

/***/ 157:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    mounted: function mounted() {},

    props: {
        images: Array
    },
    methods: {}

});

/***/ }),

/***/ 158:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "wrapper row" },
    _vm._l(_vm.images, function(url, index) {
      return _c(
        "div",
        {
          key: index,
          staticClass: "col-lg-3 col-md-3 col-sm-6 col-xs-12",
          class: _vm.$style.parent
        },
        [
          _c("div", { class: _vm.$style.child }, [
            _c("img", {
              staticClass: "img-thumbnail",
              class: _vm.$style.childimg,
              attrs: { src: "/img/uploads/" + url.img }
            })
          ]),
          _vm._v(" "),
          _c("div", { class: _vm.$style.textdiv }, [
            _c("h2", { class: _vm.$style.textimages }, [
              _vm._v(_vm._s(url.name))
            ]),
            _vm._v(" "),
            _c("span", { class: _vm.$style.textimages }, [
              _vm._v(_vm._s(url.description))
            ])
          ])
        ]
      )
    })
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-999acbcc", module.exports)
  }
}

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(5)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),

/***/ 3:
/***/ (function(module, exports) {

module.exports = function(module) {
	if(!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if(!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ }),

/***/ 4:
/***/ (function(module, exports) {

var Vue // late bind
var version
var map = (window.__VUE_HOT_MAP__ = Object.create(null))
var installed = false
var isBrowserify = false
var initHookName = 'beforeCreate'

exports.install = function (vue, browserify) {
  if (installed) { return }
  installed = true

  Vue = vue.__esModule ? vue.default : vue
  version = Vue.version.split('.').map(Number)
  isBrowserify = browserify

  // compat with < 2.0.0-alpha.7
  if (Vue.config._lifecycleHooks.indexOf('init') > -1) {
    initHookName = 'init'
  }

  exports.compatible = version[0] >= 2
  if (!exports.compatible) {
    console.warn(
      '[HMR] You are using a version of vue-hot-reload-api that is ' +
        'only compatible with Vue.js core ^2.0.0.'
    )
    return
  }
}

/**
 * Create a record for a hot module, which keeps track of its constructor
 * and instances
 *
 * @param {String} id
 * @param {Object} options
 */

exports.createRecord = function (id, options) {
  if(map[id]) { return }
  
  var Ctor = null
  if (typeof options === 'function') {
    Ctor = options
    options = Ctor.options
  }
  makeOptionsHot(id, options)
  map[id] = {
    Ctor: Ctor,
    options: options,
    instances: []
  }
}

/**
 * Check if module is recorded
 *
 * @param {String} id
 */

exports.isRecorded = function (id) {
  return typeof map[id] !== 'undefined'
}

/**
 * Make a Component options object hot.
 *
 * @param {String} id
 * @param {Object} options
 */

function makeOptionsHot(id, options) {
  if (options.functional) {
    var render = options.render
    options.render = function (h, ctx) {
      var instances = map[id].instances
      if (ctx && instances.indexOf(ctx.parent) < 0) {
        instances.push(ctx.parent)
      }
      return render(h, ctx)
    }
  } else {
    injectHook(options, initHookName, function() {
      var record = map[id]
      if (!record.Ctor) {
        record.Ctor = this.constructor
      }
      record.instances.push(this)
    })
    injectHook(options, 'beforeDestroy', function() {
      var instances = map[id].instances
      instances.splice(instances.indexOf(this), 1)
    })
  }
}

/**
 * Inject a hook to a hot reloadable component so that
 * we can keep track of it.
 *
 * @param {Object} options
 * @param {String} name
 * @param {Function} hook
 */

function injectHook(options, name, hook) {
  var existing = options[name]
  options[name] = existing
    ? Array.isArray(existing) ? existing.concat(hook) : [existing, hook]
    : [hook]
}

function tryWrap(fn) {
  return function (id, arg) {
    try {
      fn(id, arg)
    } catch (e) {
      console.error(e)
      console.warn(
        'Something went wrong during Vue component hot-reload. Full reload required.'
      )
    }
  }
}

function updateOptions (oldOptions, newOptions) {
  for (var key in oldOptions) {
    if (!(key in newOptions)) {
      delete oldOptions[key]
    }
  }
  for (var key$1 in newOptions) {
    oldOptions[key$1] = newOptions[key$1]
  }
}

exports.rerender = tryWrap(function (id, options) {
  var record = map[id]
  if (!options) {
    record.instances.slice().forEach(function (instance) {
      instance.$forceUpdate()
    })
    return
  }
  if (typeof options === 'function') {
    options = options.options
  }
  if (record.Ctor) {
    record.Ctor.options.render = options.render
    record.Ctor.options.staticRenderFns = options.staticRenderFns
    record.instances.slice().forEach(function (instance) {
      instance.$options.render = options.render
      instance.$options.staticRenderFns = options.staticRenderFns
      // reset static trees
      // pre 2.5, all static trees are cahced together on the instance
      if (instance._staticTrees) {
        instance._staticTrees = []
      }
      // 2.5.0
      if (Array.isArray(record.Ctor.options.cached)) {
        record.Ctor.options.cached = []
      }
      // 2.5.3
      if (Array.isArray(instance.$options.cached)) {
        instance.$options.cached = []
      }
      // post 2.5.4: v-once trees are cached on instance._staticTrees.
      // Pure static trees are cached on the staticRenderFns array
      // (both already reset above)
      instance.$forceUpdate()
    })
  } else {
    // functional or no instance created yet
    record.options.render = options.render
    record.options.staticRenderFns = options.staticRenderFns

    // handle functional component re-render
    if (record.options.functional) {
      // rerender with full options
      if (Object.keys(options).length > 2) {
        updateOptions(record.options, options)
      } else {
        // template-only rerender.
        // need to inject the style injection code for CSS modules
        // to work properly.
        var injectStyles = record.options._injectStyles
        if (injectStyles) {
          var render = options.render
          record.options.render = function (h, ctx) {
            injectStyles.call(ctx)
            return render(h, ctx)
          }
        }
      }
      record.options._Ctor = null
      // 2.5.3
      if (Array.isArray(record.options.cached)) {
        record.options.cached = []
      }
      record.instances.slice().forEach(function (instance) {
        instance.$forceUpdate()
      })
    }
  }
})

exports.reload = tryWrap(function (id, options) {
  var record = map[id]
  if (options) {
    if (typeof options === 'function') {
      options = options.options
    }
    makeOptionsHot(id, options)
    if (record.Ctor) {
      if (version[1] < 2) {
        // preserve pre 2.2 behavior for global mixin handling
        record.Ctor.extendOptions = options
      }
      var newCtor = record.Ctor.super.extend(options)
      record.Ctor.options = newCtor.options
      record.Ctor.cid = newCtor.cid
      record.Ctor.prototype = newCtor.prototype
      if (newCtor.release) {
        // temporary global mixin strategy used in < 2.0.0-alpha.6
        newCtor.release()
      }
    } else {
      updateOptions(record.options, options)
    }
  }
  record.instances.slice().forEach(function (instance) {
    if (instance.$vnode && instance.$vnode.context) {
      instance.$vnode.context.$forceUpdate()
    } else {
      console.warn(
        'Root or manually mounted instance modified. Full reload required.'
      )
    }
  })
})


/***/ }),

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(156);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(2)("36b7ec39", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-999acbcc\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./UserImages.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-999acbcc\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./UserImages.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 5:
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(11);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(2)("59070971", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d30b0db8\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./UserBigImagesAllDiplay.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js?{\"localIdentName\":\"[hash:base64]_0\",\"importLoaders\":true,\"modules\":true}!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-d30b0db8\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./UserBigImagesAllDiplay.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ })

/******/ });