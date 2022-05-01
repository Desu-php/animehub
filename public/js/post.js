/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/comment.js":
/*!*********************************!*\
  !*** ./resources/js/comment.js ***!
  \*********************************/
/***/ (() => {

var otvet = document.querySelectorAll("div.answer-comment"); // var config1 = {
//   height:'200',
//   startupOutlineBlocks:true,
//   scayt_autoStartup:true,
//   toolbar:[
//
//     { name: 'insert', items : [ 'Smiley' ] }
//   ]
// }
// CKEDITOR.replace('textComment',config1);

var config2 = {
  height: '200',
  startupOutlineBlocks: true,
  startupFocus: false,
  scayt_autoStartup: true,
  toolbar: [{
    name: 'insert',
    items: ['HKemoji']
  }]
};
CKEDITOR.replace('textComment', config2);
$("#sendComment").click(function (e) {
  var mymessage = CKEDITOR.instances['textComment'].getData();

  if (mymessage.length < 10) {
    alert("сообщение похоже на спам");
    return;
  }

  $('.form .disable').css('display', 'flex');
  CKEDITOR.instances['textComment'].setData('');
  CKEDITOR.instances['textComment'].setReadOnly(true);
  var id_post = document.location.pathname.split('/');
  id_post = id_post[id_post.length - 1].split('-')[0];
  var new_comment = "<div class=\"video-comment-item\" style=\"display:none\"></div>";
  $(".video-comments").prepend(new_comment);
  $.ajax({
    type: "post",
    url: "/ajax/add/comment",
    data: {
      "comment": {
        "body": mymessage,
        "id_post": id_post
      },
      "token": $("#token").text()
    },
    dataType: "text",
    success: function success(response) {
      res = JSON.parse(response);

      if (res.status == 403) {
        showMessage("Ошибка", 'Авторизуйтесь пожалуйста', "error-message");
        alert('Авторизуйтесь пожалуйста');
        $('.form .disable').css('display', 'none');
        return false;
      }

      if (res.back_fon != "") {
        var commentToPut = "\n        <div class=\"video-comment-user-avatar\">\n          <img src=\"".concat(viewAvatar(res.img), "\">\n        </div>\n        <div class=\"video-comment-right vip\" style='background-image:").concat(res.back_fon, "'>\n        <div class=\"comment-arrow\"></div>\n        <div class=\"top-video-comment-item\">\n          <div class=\"video-comment-user-name\" style=\"font-family:").concat(res.font, "; ").concat(res.login_color, "\">\n            ").concat(res.login, " <span style=\"color:").concat(res.color, "\">").concat(res.status, "</span>\n          </div>\n          <div class=\"video-comment-date\">\n            ").concat(res.date, "\n          </div>\n        </div>\n        <div class=\"video-comment-text\">\n          ").concat(res.body, "\n          <div class=\"answer-comment\"><i class=\"fa fa-reply\"></i></div>\n        </div>\n        ").concat(res.vip_status, "\n      </div>\n      ");
      } else {
        var commentToPut = "\n          <div class=\"video-comment-user-avatar\">\n            <img src=\"".concat(viewAvatar(res.img), "\">\n          </div>\n          <div class=\"video-comment-right\">\n          <div class=\"comment-arrow\"></div>\n          <div class=\"top-video-comment-item\">\n            <div class=\"video-comment-user-name\" style=\"font-family:").concat(res.font, "; ").concat(res.login_color, "\">\n              ").concat(res.login, " <span style=\"color:").concat(res.color, "\">").concat(res.status, "</span>\n            </div>\n            <div class=\"video-comment-date\">\n              ").concat(res.date, "\n            </div>\n          </div>\n          <div class=\"video-comment-text\">\n            ").concat(res.body, "\n          </div>\n        </div>\n        ");
      }

      $('.form .disable').css('display', 'none');
      $('.video-comment-item:nth-child(1)').html(commentToPut);
      $('.video-comment-item:nth-child(1)').slideDown('slow');
      CKEDITOR.instances['textComment'].setReadOnly(false); // $(".video-comments").prepend(commentToPut)
    }
  });
});
$("#sendComment2").click(function (e) {
  var mymessage = $("#textarea").val();
  var regex = "/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}";

  if (mymessage.length < 10) {
    alert("сообщение похоже на спам");
    return;
  }

  $('.form .disable').css('display', 'flex');
  var id_post = document.location.pathname.split('/');
  id_post = id_post[id_post.length - 1].split('-')[0];
  var new_comment = "<div class=\"video-comment-item\" style=\"display:none\"></div>";
  $(".video-comments").prepend(new_comment);
  $.ajax({
    type: "post",
    url: "/ajax/add/comment",
    data: {
      "comment": {
        "body": mymessage,
        "id_post": id_post
      },
      "token": $("#token").text()
    },
    dataType: "text",
    success: function success(response) {
      res = JSON.parse(response);

      if (res.status == 403) {
        showMessage("Ошибка", 'Авторизуйтесь пожалуйста', "error-message");
        alert('Авторизуйтесь пожалуйста');
        $('.form .disable').css('display', 'none');
        return false;
      }

      if (res.back_fon != "") {
        var commentToPut = "\n        <div class=\"video-comment-user-avatar\">\n          <img src=\"".concat(res.img, "\">\n        </div>\n        <div class=\"video-comment-right vip\" style='background-image:").concat(res.back_fon, "'>\n        <div class=\"comment-arrow\"></div>\n        <div class=\"top-video-comment-item\">\n          <div class=\"video-comment-user-name\" style=\"font-family:").concat(res.font, "; ").concat(res.login_color, "\">\n            ").concat(res.login, " <span style=\"color:").concat(res.color, "\">").concat(res.status, "</span>\n          </div>\n          <div class=\"video-comment-date\">\n            ").concat(res.date, "\n          </div>\n        </div>\n        <div class=\"video-comment-text\">\n          ").concat(res.body, "\n          <div class=\"answer-comment\"><i class=\"fa fa-reply\"></i></div>\n        </div>\n        ").concat(res.vip_status, "\n      </div>\n      ");
      } else {
        var commentToPut = "\n          <div class=\"video-comment-user-avatar\">\n            <img src=\"".concat(res.img, "\">\n          </div>\n          <div class=\"video-comment-right\">\n          <div class=\"comment-arrow\"></div>\n          <div class=\"top-video-comment-item\">\n            <div class=\"video-comment-user-name\" style=\"font-family:").concat(res.font, "; ").concat(res.login_color, "\">\n              ").concat(res.login, " <span style=\"color:").concat(res.color, "\">").concat(res.status, "</span>\n            </div>\n            <div class=\"video-comment-date\">\n              ").concat(res.date, "\n            </div>\n          </div>\n          <div class=\"video-comment-text\">\n            ").concat(res.body, "\n          </div>\n        </div>\n        ");
      }

      $('.form .disable').css('display', 'none');
      $('.video-comment-item:nth-child(1)').html(commentToPut);
      $('.video-comment-item:nth-child(1)').slideDown('slow');
      CKEDITOR.instances['textComment'].setReadOnly(false); // $(".video-comments").prepend(commentToPut)
    }
  });
});
otvet.forEach(function (elem, index) {
  elem.onclick = function () {
    var nickname = otvet[index].parentNode.parentNode;
    nickname = nickname.querySelector(".video-comment-user-name a").textContent; // $(this).closest('.video-comment-right').find('.video-comment-user-name').text();

    CKEDITOR.instances['textComment'].setData("<strong>" + nickname + "</strong>,");
    $(document).ready(function () {
      var destination = $("#cke_textComment").offset().top;
      $('html').animate({
        scrollTop: destination
      }, 500);
    });
  };
});

/***/ }),

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

/***/ }),

/***/ "./resources/js/video.js":
/*!*******************************!*\
  !*** ./resources/js/video.js ***!
  \*******************************/
/***/ (() => {

var seriesList = document.querySelector('.series-list');
var id_post = document.location.pathname.split('/');
id_post = id_post[id_post.length - 1].split('-')[0];
var seriesItem = document.querySelectorAll('.series-item');
var seriesBlock = document.querySelector('.series-block');
var toLeftSeries = document.querySelector('.to-left-series');
var toRightSeries = document.querySelector('.to-right-series');
var topVideoBlock = document.querySelector('.top-video-block');
var searchSeries = document.querySelector('.search-series');
var searchInput = document.getElementById('search-input');
var videoLink = document.querySelector('.video');
var favorite = document.querySelector('.favorites');
var searchSeriesInput = document.querySelector('.search-series-input');
var favoriteText = document.querySelector('.favorite-text');
var showAllSeries = document.querySelector('.show-all-series-post');
var closeSeriesPost = document.querySelector('.fa-reply-all');
var openSearch = true;
var seriesListWidth = 0;
var previousSeries = 0;
var presentSeries = 0;
var title = document.title;
var sumSize = 0;
var videos = document.querySelectorAll(".video-comment-text video");
videos.forEach(function (element) {
  element.remove();
});
videoLink.addEventListener('ended', function () {
  videoLink.setAttribute("autoplay", "true");
  var oldSeries = $('.series-item-active');
  oldSeries.removeClass('series-item-active');

  if (oldSeries.attr("src") === seriesItem[seriesItem.length - 1].getAttribute("src")) {
    return;
  }

  var next = oldSeries.next();

  if (next) {
    while (next.attr('id-ser') === oldSeries.attr('id-ser')) {
      next = next.next();
    }

    next.addClass('series-item-active');
    var indexSeries = next.index();
    localStorage.setItem(id_post, JSON.stringify({
      'index': indexSeries,
      'video': 0
    }));
    videoLink.src = next.attr('src');
  }
});

if (localStorage.getItem(id_post) !== null) {
  var memory = JSON.parse(localStorage.getItem(id_post));
  console.log(memory);

  if (memory.index !== -1) {
    $(".series-item:eq(".concat(memory.index, ")")).addClass('series-item-active');
    videoLink.setAttribute("autoplay", "false");
    videoLink.src = seriesItem[memory.index].getAttribute('src');
    videoLink.currentTime = memory.video;
    videoLink.pause();
  } else {
    localStorage.setItem(id_post, JSON.stringify({
      'index': 0,
      'video': 0
    }));
  }
} else {
  localStorage.setItem(id_post, JSON.stringify({
    'index': 0,
    'video': 0
  }));
  videoLink.removeAttribute("autoplay");
  videoLink.src = seriesItem[0].getAttribute('src');
  seriesItem[0].classList.add('series-item-active');
}

videoLink.addEventListener('timeupdate', function () {
  var memory = JSON.parse(localStorage.getItem(id_post));
  localStorage.setItem(id_post, JSON.stringify({
    index: memory.index,
    video: videoLink.currentTime
  }));
});
favorite.classList.contains('choose') ? favoriteText.innerHTML = 'Удалить из избранного' : favoriteText.innerHTML = 'Добавить в избранное';

favorite.onclick = function () {
  if (!favorite.classList.contains('choose')) {
    $.ajax({
      type: "post",
      url: "/ajax/favorites/add",
      data: {
        "id_post": id_post,
        "token": $("#token").text()
      },
      dataType: "text",
      success: function success(response) {
        response = JSON.parse(response);

        switch (response.status) {
          case "401":
            showMessage("Ошибка", "авторизуйтесь прежде чем добавлять в закладки", error);
            break;

          case "200":
            favorite.classList.toggle('choose');
            favorite.classList.contains('choose') ? favoriteText.innerHTML = 'Удалить из избранного' : favoriteText.innerHTML = 'Добавить в избранное';
            break;

          default:
            showMessage("Ошибка", "что то пошло не так", error);
            break;
        }
      }
    });
  } else {
    $.ajax({
      type: "post",
      url: "/ajax/favorites/delete",
      data: {
        "id_post": id_post,
        "token": $("#token").text()
      },
      dataType: "text",
      success: function success(response) {
        response = JSON.parse(response);

        switch (response.status) {
          case "401":
            showMessage("Ошибка", "авторизуйтесь прежде чем добавлять в закладки", error);
            break;

          case "200":
            favorite.classList.toggle('choose');
            favorite.classList.contains('choose') ? favoriteText.innerHTML = 'Удалить из избранного' : favoriteText.innerHTML = 'Добавить в избранное';
            break;

          default:
            showMessage("Ошибка", "что то пошло не так", error);
            break;
        }
      }
    });
  }
};

toRightSeries.addEventListener('click', function () {
  return scrollingSeries(-(seriesItem[0].offsetWidth + 10));
});
toLeftSeries.addEventListener('click', function () {
  return scrollingSeries(seriesItem[0].offsetWidth + 10);
});
searchSeries.addEventListener('click', showHideSearch);
var seriesData = [];
seriesItem.forEach(function (elem, index) {
  seriesData.push({
    seriaNum: elem.getAttribute("id-ser"),
    seriaHtml: elem.outerHTML
  });
});

function addEvent() {
  seriesItem = document.querySelectorAll('.series-item');
  seriesItem.forEach(function (elem, index) {
    seriesListWidth += elem.offsetWidth + 10;

    elem.onclick = function () {
      //   let datafromLocalstorage = localStorage.getItem(id_post)
      // 	if (datafromLocalstorage){
      // 		let info=JSON.parse(datafromLocalstorage)
      // 		seriesItem[info.index].classList.remove('series-item-active');
      // 	}
      var oldSeries = $('.series-item-active');
      oldSeries.removeClass('series-item-active');
      videoLink.setAttribute("autoplay", "true");
      previousSeries = presentSeries;
      presentSeries = index;
      localStorage.setItem(id_post, JSON.stringify({
        'index': index,
        'video': 0
      }));
      seriesItem[previousSeries].classList.remove('series-item-active');
      seriesItem[presentSeries].classList.add('series-item-active');
      document.title = "".concat(title, " ").concat($(".film-discription-header").text(), " | ").concat(elem.textContent);
      videoLink.src = elem.getAttribute('src');
      closeSeriesListPost();
    };
  });

  if (document.body.clientWidth > 767) {
    seriesList.style.width = "".concat(seriesListWidth + 10, "px");
  }

  ;
}

;
addEvent();
var maxTrans = -(seriesListWidth + 10) + seriesBlock.offsetWidth;
var mousePressing, mouseUnPressing, posInt, positions, sumPos;
var datafromLocalstorage = localStorage.getItem(id_post);

if (document.body.clientWidth > 770) {
  if (datafromLocalstorage) {
    var info = JSON.parse(datafromLocalstorage);
    var scrollTo = seriesItem[info.index].getBoundingClientRect().x - toLeftSeries.getBoundingClientRect().right;
    scrollingSeries(-scrollTo);
  }
}

toRightSeries.onmousedown = toRightSeries.ontouchstart = function () {
  mouseUnPressing = setTimeout(function () {
    setPosition();
    mousePressing = setInterval(function () {
      return scrollingSeries(-sumPos);
    }, 100);
  }, 50);
};

toLeftSeries.onmousedown = toLeftSeries.ontouchstart = function () {
  mouseUnPressing = setTimeout(function () {
    setPosition();
    mousePressing = setInterval(function () {
      return scrollingSeries(sumPos);
    }, 100);
  }, 50);
};

function setPosition() {
  positions = 0;
  sumPos = 0;
  setTimeout(function () {
    return seriesList.style.transition = '.2s';
  }, 1500);
  posInt = setInterval(function () {
    positions++;
    sumPos += positions;
  }, 100);
}

;

toRightSeries.onmouseup = toLeftSeries.onmouseup = toRightSeries.ontouchend = toLeftSeries.ontouchend = function () {
  seriesList.style.transition = '.5s';
  clearTimeout(mouseUnPressing);
  clearInterval(mousePressing);
  clearInterval(posInt);
};

function scrollingSeries(size) {
  sumSize += size;
  if (sumSize <= maxTrans) sumSize = maxTrans;
  if (sumSize > 0) sumSize = 0;
  seriesList.style.transform = "translateX(".concat(sumSize, "px)");
}

;

function showHideSearch() {
  !openSearch ? hideSearch() : showSearch();
}

;

function showSearch() {
  topVideoBlock.classList.add('show-search-series');
  setTimeout(function () {
    topVideoBlock.classList.add('show-opacity-search-series');
    openSearch = false;
  }, 0);
}

;

function hideSearch() {
  // searchInput.value = '';
  searchInputBlur();
  topVideoBlock.classList.remove('show-opacity-search-series');
  setTimeout(function () {
    topVideoBlock.classList.remove('show-search-series');
    openSearch = true;
  }, 500);
}

;

searchInput.oninput = function () {
  return search(searchInput.value);
};

function search(val) {
  var seriesItems = $('.series-item');
  seriesItems.show();

  if (val.length) {
    seriesItems.each(function () {
      if (parseInt($(this).attr('id-ser')) < parseInt(val)) {
        $(this).hide();
      }
    });
  }

  sumSize = 0;
  scrollingSeries(0);
  addEvent();
}

;

function changeSeriaList(elems) {
  var list = "";
  elems.forEach(function (elem, index) {
    list += elem.seriaHtml;
  });
  seriesList.innerHTML = list;
}

; // function searchSeriesItem() {
//   let i = 0;
//   for (i; i < seriesItem.length; i++) {
//     if (seriesItem[i].getAttribute('id-ser') >= +searchInput.value) break;
//   };
//
//   if (i >= seriesItem.length) showMessage('Ошибка!', 'Серия не найдена', error);
//
//   let sumScroll = seriesItem[i].getBoundingClientRect().x - toLeftSeries.getBoundingClientRect().right;
//   scrollingSeries(-sumScroll);
// };

searchInput.onfocus = function () {
  return searchSeriesInput.classList.add('search-series-focus');
};

searchInput.onblur = searchInputBlur;

function searchInputBlur() {
  if (searchInput.value == '') {
    searchSeriesInput.classList.remove('search-series-focus');
  }
}

;
var postSearch = document.querySelector('.post-search');
var placeholderPost = document.querySelector('.placeholder-post');
var seriesMainList = document.querySelector('.series-main-list');

postSearch.oninput = function () {
  return search(postSearch.value);
};

postSearch.onfocus = function () {
  return placeholderPost.classList.add('focus');
};

postSearch.onblur = function () {
  if (postSearch.value !== '') return;
  placeholderPost.classList.remove('focus');
};

showAllSeries.onclick = function () {
  seriesMainList.classList.add('show');
  document.body.style.overflow = 'hidden';
};

closeSeriesPost.onclick = closeSeriesListPost;

function closeSeriesListPost() {
  seriesMainList.classList.remove('show'); // postSearch.value = '';

  document.body.style.overflow = 'auto';
}

;
$("#like").click(function () {
  raiting(1, id_post);
});
$("#dislike").click(function () {
  raiting(0, id_post);
});

function raiting(type, id) {
  $.ajax({
    type: "post",
    url: "/ajax/voted/rating",
    data: {
      "type": type,
      "id_post": id,
      "token": $("#token").text()
    },
    dataType: "text",
    success: function success(response) {
      response = JSON.parse(response);

      switch (response.status) {
        case "1":
          if (type == 1) {
            $("#like span").html(parseInt($("#like span").text()) + 1);
          } else {
            $("#dislike span").html(parseInt($("#dislike span").text()) - 1);
          }

          break;

        case "0":
          showMessage("Ошибка", "Вы уже голосовали", error);
          break;

        case "403":
          showMessage("Ошибка", "Авторизуйтесь", error);
          break;

        default:
          showMessage("Ошибка", "что то пошло не так", error);
          break;
      }
    }
  });
}

;

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
__webpack_require__(/*! ./comment */ "./resources/js/comment.js");

__webpack_require__(/*! ./show-hide-text */ "./resources/js/show-hide-text.js");

__webpack_require__(/*! ./video */ "./resources/js/video.js");
})();

/******/ })()
;