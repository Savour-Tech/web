var _0x49ce = [
	"jQuery", 
	"use strict", 
	"hostname", 
	"location", 
	"demo.tempload.com", 
	"Why are you stealing? Help me do better things by buying!", 
	"https://themeforest.net/user/tempload/portfolio", 
	"sr", 
	"length", 
	".menu-trigger", 
    "click", 
    "active", "toggleClass", "slideToggle", ".header-area .nav", 
    "on", 
    "", "replace", "pathname", "hash", "[name=", "slice", "]", "width", 
    "removeClass", 
    "slideUp", "top", "offset", "animate", "html,body", 
    "a[href*=\#]:not([href=\#])",
    ".count-item", "counterUp", ".count-item strong", ".blog-post-thumb", 
    "imgfix", 
    ".blog-post-thumb .img", ".page-gallery", ".page-gallery-wrapper", "image", "ease-in-out", "magnificPopup", "load", "0", "#download", "assets/images/photos/parallax.jpg", "1", 
    "46:parallax", 
    "#subscribe", "assets/images/photos/parallax-subscribe.jpg", "fadeOut", "visibility", "hidden", "css", ".loader-wrapper", 
    "scroll", 
    "resize", 
    ".submenu ul", "ul", "find", ".submenu", 
	"scrollTop", 
	"header-sticky", 
	"addClass", 
	".header-area"];
(function(_0xa1aax1) {
    "use strict";
    

    //alert(_0x49ce[46]);

    _0xa1aax7();
    _0xa1aax6();
    window["sr"] = new scrollReveal();
    if (_0xa1aax1(".menu-trigger")["length"]) {
        _0xa1aax1(".menu-trigger")["on"]("click", function() {
            _0xa1aax1(this)[_0x49ce[12]](_0x49ce[11]);
            _0xa1aax1(_0x49ce[14])[_0x49ce[13]](200)
        })
    };
    _0xa1aax1("a[href^='#']:not([href='#'])")["on"]("click", function() {
        if (location[_0x49ce[18]][_0x49ce[17]](/^\//, _0x49ce[16]) == this[_0x49ce[18]][_0x49ce[17]](/^\//, _0x49ce[16]) && location[_0x49ce[2]] == this[_0x49ce[2]]) {
            var _0xa1aax4 = _0xa1aax1(this[_0x49ce[19]]);
            _0xa1aax4 = _0xa1aax4["length"] ? _0xa1aax4 : _0xa1aax1(_0x49ce[20] + this[_0x49ce[19]][_0x49ce[21]](1) + _0x49ce[22]);
            if (_0xa1aax4["length"]) {
                var _0xa1aax5 = _0xa1aax1(window)[_0x49ce[23]]();
                if (_0xa1aax5 < 991) {
                    _0xa1aax1(".menu-trigger")["removeClass"](_0x49ce[11]);
                    _0xa1aax1(_0x49ce[14])[_0x49ce[25]](200)
                };
                _0xa1aax1(_0x49ce[29])[_0x49ce[28]]({
                    scrollTop: (_0xa1aax4[_0x49ce[27]]()[_0x49ce[26]]) - 30
                }, 700);
                return false
            }
        }
    });
    if (_0xa1aax1(_0x49ce[31])["length"]) {
        _0xa1aax1(_0x49ce[33])[_0x49ce[32]]({
            delay: 10,
            time: 1000
        })
    };
    if (_0xa1aax1(_0x49ce[34])["length"]) {
        //_0xa1aax1(_0x49ce[36])["imgfix"]()
    };
    if (_0xa1aax1(_0x49ce[37])["length"] && _0xa1aax1(_0x49ce[38])["length"]) {
        // _0xa1aax1(_0x49ce[37])["imgfix"]({
        //     scale: 1.1
        // });
        _0xa1aax1(_0x49ce[37])[_0x49ce[41]]({
            type: _0x49ce[39],
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: _0x49ce[40]
            }
        })
    };
    _0xa1aax1(window)["on"](_0x49ce[42], function() {
        _0xa1aax1(".loader-wrapper")[_0x49ce[28]]({
            "opacity": _0x49ce[43]
        }, 600, function() {
            setTimeout(function() {
                _0xa1aax1(".loader-wrapper")[_0x49ce[53]](_0x49ce[51], _0x49ce[52])[_0x49ce[50]]()
            }, 300)
        })
    });
    _0xa1aax1(window)["on"]("scroll", function() {
        _0xa1aax7()
    });
    _0xa1aax1(window)["on"]("resize", function() {
        _0xa1aax6()
    });

    function _0xa1aax6() {
        var _0xa1aax5 = _0xa1aax1(window)[_0x49ce[23]]();
        _0xa1aax1(_0x49ce[60])["on"]("click", function() {
            if (_0xa1aax5 < 992) {
                _0xa1aax1(_0x49ce[57])["removeClass"](_0x49ce[11]);
                _0xa1aax1(this)[_0x49ce[59]](_0x49ce[58])[_0x49ce[12]](_0x49ce[11])
            }
        })
    }

    function _0xa1aax7() {
        var _0xa1aax5 = _0xa1aax1(window)[_0x49ce[23]]();
        if (_0xa1aax5 > 991) {
            var _0xa1aax8 = _0xa1aax1(window)["scrollTop"]();
            if (_0xa1aax8 >= 30) {
                _0xa1aax1(".header-area")["addClass"]("header-sticky")
            } else {
                _0xa1aax1(".header-area")["removeClass"]("header-sticky")
            }
        }
    }
})(window["jQuery"])