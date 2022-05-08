/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/show-hide-text.js":
/*!****************************************!*\
  !*** ./resources/js/show-hide-text.js ***!
  \****************************************/
/***/ (() => {

var showText = document.querySelector('.show-all-text');
var discriptionText = document.querySelector('.discription-text');
var previousHeight = discriptionText.clientHeight;
if (discriptionText.scrollHeight > 160) discriptionText.classList.add('big-description');
if (discriptionText.scrollHeight <= 160) showText.remove();

showText.onclick = function () {
  discriptionText.style.height = "".concat(discriptionText.scrollHeight, "px");
  discriptionText.classList.toggle('gradient');
  showText.innerHTML = 'Свернуть';

  if (!discriptionText.classList.contains('gradient')) {
    showText.innerHTML = 'Развернуть';
    discriptionText.style.height = "".concat(previousHeight, "px");
  }

  ;
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./resources/js/post.js ***!
  \******************************/
__webpack_require__(/*! ./show-hide-text */ "./resources/js/show-hide-text.js"); // require('./video')
})();

/******/ })()
;