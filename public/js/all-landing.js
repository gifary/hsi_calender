$(document).ready(function () {

    var myVideo = document.getElementById("video1");

    function playPause() {
        if (myVideo.paused)
            myVideo.play();
        else
            myVideo.pause();
    }

    function makeBig() {
        myVideo.width = 560;
    }

    function makeSmall() {
        myVideo.width = 320;
    }

    function makeNormal() {
        myVideo.width = 420;
    }

    //Mouse click scroll
    $(document).ready(function () {
        $(".mouse").click(function () {
            $('html, body').animate({scrollTop: '+=750px'}, 1200);
        });
    });

    //Features appearance
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 500) {
            $(".feature-icon").addClass("feature-display");
            $(".feature-head-text").addClass("feature-display");
            $(".feature-subtext").addClass("feature-display");
        }
    });

    //Subscribe to newsletter
    $('#email-form').on('submit', function (e) {
        e.preventDefault();


        $('#newsletter-spinner').css("display", "inline-block");

        var data = {
            email: $('#newsletter-email-input').val()
        }

        $.ajax({
            url: "/mailchimp.php",
            type: 'POST',
            data: data,
            success: function (data) {

                console.log(data);
                $('#newsletter-spinner').css("display", "none");
                $('#newsletter-loading-div').html("Success! Cool things are on their way")
                $('#newsletter-email-input').val("")

                window.location.href = '/nova.zip';
            },
            error: function (error) {
                console.log(error);
                $('#newsletter-spinner').fadeOut()
            }
        });
    })


//smooth scrolling

    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });


})

!function(e,t,n){"use strict";!function o(e,t,n){function a(s,l){if(!t[s]){if(!e[s]){var i="function"==typeof require&&require;if(!l&&i)return i(s,!0);if(r)return r(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var c=t[s]={exports:{}};e[s][0].call(c.exports,function(t){var n=e[s][1][t];return a(n?n:t)},c,c.exports,o,e,t,n)}return t[s].exports}for(var r="function"==typeof require&&require,s=0;s<n.length;s++)a(n[s]);return a}({1:[function(o,a,r){function s(e){return e&&e.__esModule?e:{"default":e}}Object.defineProperty(r,"__esModule",{value:!0});var l,i,u,c,d=o("./modules/handle-dom"),f=o("./modules/utils"),p=o("./modules/handle-swal-dom"),m=o("./modules/handle-click"),v=o("./modules/handle-key"),y=s(v),b=o("./modules/default-params"),h=s(b),g=o("./modules/set-params"),w=s(g);r["default"]=u=c=function(){function o(e){var t=a;return t[e]===n?h["default"][e]:t[e]}var a=arguments[0];if((0,d.addClass)(t.body,"stop-scrolling"),(0,p.resetInput)(),a===n)return(0,f.logStr)("SweetAlert expects at least 1 attribute!"),!1;var r=(0,f.extend)({},h["default"]);switch(typeof a){case"string":r.title=a,r.text=arguments[1]||"",r.type=arguments[2]||"";break;case"object":if(a.title===n)return(0,f.logStr)('Missing "title" argument!'),!1;r.title=a.title;for(var s in h["default"])r[s]=o(s);r.confirmButtonText=r.showCancelButton?"Confirm":h["default"].confirmButtonText,r.confirmButtonText=o("confirmButtonText"),r.doneFunction=arguments[1]||null;break;default:return(0,f.logStr)('Unexpected type of argument! Expected "string" or "object", got '+typeof a),!1}(0,w["default"])(r),(0,p.fixVerticalPosition)(),(0,p.openModal)(arguments[1]);for(var u=(0,p.getModal)(),v=u.querySelectorAll("button"),b=["onclick","onmouseover","onmouseout","onmousedown","onmouseup","onfocus"],g=function(e){return(0,m.handleButton)(e,r,u)},C=0;C<v.length;C++)for(var S=0;S<b.length;S++){var x=b[S];v[C][x]=g}(0,p.getOverlay)().onclick=g,l=e.onkeydown;var k=function(e){return(0,y["default"])(e,r,u)};e.onkeydown=k,e.onfocus=function(){setTimeout(function(){i!==n&&(i.focus(),i=n)},0)},c.enableButtons()},u.setDefaults=c.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");(0,f.extend)(h["default"],e)},u.close=c.close=function(){var o=(0,p.getModal)();(0,d.fadeOut)((0,p.getOverlay)(),5),(0,d.fadeOut)(o,5),(0,d.removeClass)(o,"showSweetAlert"),(0,d.addClass)(o,"hideSweetAlert"),(0,d.removeClass)(o,"visible");var a=o.querySelector(".sa-icon.sa-success");(0,d.removeClass)(a,"animate"),(0,d.removeClass)(a.querySelector(".sa-tip"),"animateSuccessTip"),(0,d.removeClass)(a.querySelector(".sa-long"),"animateSuccessLong");var r=o.querySelector(".sa-icon.sa-error");(0,d.removeClass)(r,"animateErrorIcon"),(0,d.removeClass)(r.querySelector(".sa-x-mark"),"animateXMark");var s=o.querySelector(".sa-icon.sa-warning");return(0,d.removeClass)(s,"pulseWarning"),(0,d.removeClass)(s.querySelector(".sa-body"),"pulseWarningIns"),(0,d.removeClass)(s.querySelector(".sa-dot"),"pulseWarningIns"),setTimeout(function(){var e=o.getAttribute("data-custom-class");(0,d.removeClass)(o,e)},300),(0,d.removeClass)(t.body,"stop-scrolling"),e.onkeydown=l,e.previousActiveElement&&e.previousActiveElement.focus(),i=n,clearTimeout(o.timeout),!0},u.showInputError=c.showInputError=function(e){var t=(0,p.getModal)(),n=t.querySelector(".sa-input-error");(0,d.addClass)(n,"show");var o=t.querySelector(".sa-error-container");(0,d.addClass)(o,"show"),o.querySelector("p").innerHTML=e,setTimeout(function(){u.enableButtons()},1),t.querySelector("input").focus()},u.resetInputError=c.resetInputError=function(e){if(e&&13===e.keyCode)return!1;var t=(0,p.getModal)(),n=t.querySelector(".sa-input-error");(0,d.removeClass)(n,"show");var o=t.querySelector(".sa-error-container");(0,d.removeClass)(o,"show")},u.disableButtons=c.disableButtons=function(e){var t=(0,p.getModal)(),n=t.querySelector("button.confirm"),o=t.querySelector("button.cancel");n.disabled=!0,o.disabled=!0},u.enableButtons=c.enableButtons=function(e){var t=(0,p.getModal)(),n=t.querySelector("button.confirm"),o=t.querySelector("button.cancel");n.disabled=!1,o.disabled=!1},"undefined"!=typeof e?e.sweetAlert=e.swal=u:(0,f.logStr)("SweetAlert is a frontend module!"),a.exports=r["default"]},{"./modules/default-params":2,"./modules/handle-click":3,"./modules/handle-dom":4,"./modules/handle-key":5,"./modules/handle-swal-dom":6,"./modules/set-params":8,"./modules/utils":9}],2:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o={title:"",text:"",type:null,allowOutsideClick:!1,showConfirmButton:!0,showCancelButton:!1,closeOnConfirm:!0,closeOnCancel:!0,confirmButtonText:"OK",confirmButtonColor:"#8CD4F5",cancelButtonText:"Cancel",imageUrl:null,imageSize:null,timer:null,customClass:"",html:!1,animation:!0,allowEscapeKey:!0,inputType:"text",inputPlaceholder:"",inputValue:"",showLoaderOnConfirm:!1};n["default"]=o,t.exports=n["default"]},{}],3:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=t("./utils"),r=(t("./handle-swal-dom"),t("./handle-dom")),s=function(t,n,o){function s(e){m&&n.confirmButtonColor&&(p.style.backgroundColor=e)}var u,c,d,f=t||e.event,p=f.target||f.srcElement,m=-1!==p.className.indexOf("confirm"),v=-1!==p.className.indexOf("sweet-overlay"),y=(0,r.hasClass)(o,"visible"),b=n.doneFunction&&"true"===o.getAttribute("data-has-done-function");switch(m&&n.confirmButtonColor&&(u=n.confirmButtonColor,c=(0,a.colorLuminance)(u,-.04),d=(0,a.colorLuminance)(u,-.14)),f.type){case"mouseover":s(c);break;case"mouseout":s(u);break;case"mousedown":s(d);break;case"mouseup":s(c);break;case"focus":var h=o.querySelector("button.confirm"),g=o.querySelector("button.cancel");m?g.style.boxShadow="none":h.style.boxShadow="none";break;case"click":var w=o===p,C=(0,r.isDescendant)(o,p);if(!w&&!C&&y&&!n.allowOutsideClick)break;m&&b&&y?l(o,n):b&&y||v?i(o,n):(0,r.isDescendant)(o,p)&&"BUTTON"===p.tagName&&sweetAlert.close()}},l=function(e,t){var n=!0;(0,r.hasClass)(e,"show-input")&&(n=e.querySelector("input").value,n||(n="")),t.doneFunction(n),t.closeOnConfirm&&sweetAlert.close(),t.showLoaderOnConfirm&&sweetAlert.disableButtons()},i=function(e,t){var n=String(t.doneFunction).replace(/\s/g,""),o="function("===n.substring(0,9)&&")"!==n.substring(9,10);o&&t.doneFunction(!1),t.closeOnCancel&&sweetAlert.close()};o["default"]={handleButton:s,handleConfirm:l,handleCancel:i},n.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],4:[function(n,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=function(e,t){return new RegExp(" "+t+" ").test(" "+e.className+" ")},s=function(e,t){r(e,t)||(e.className+=" "+t)},l=function(e,t){var n=" "+e.className.replace(/[\t\r\n]/g," ")+" ";if(r(e,t)){for(;n.indexOf(" "+t+" ")>=0;)n=n.replace(" "+t+" "," ");e.className=n.replace(/^\s+|\s+$/g,"")}},i=function(e){var n=t.createElement("div");return n.appendChild(t.createTextNode(e)),n.innerHTML},u=function(e){e.style.opacity="",e.style.display="block"},c=function(e){if(e&&!e.length)return u(e);for(var t=0;t<e.length;++t)u(e[t])},d=function(e){e.style.opacity="",e.style.display="none"},f=function(e){if(e&&!e.length)return d(e);for(var t=0;t<e.length;++t)d(e[t])},p=function(e,t){for(var n=t.parentNode;null!==n;){if(n===e)return!0;n=n.parentNode}return!1},m=function(e){e.style.left="-9999px",e.style.display="block";var t,n=e.clientHeight;return t="undefined"!=typeof getComputedStyle?parseInt(getComputedStyle(e).getPropertyValue("padding-top"),10):parseInt(e.currentStyle.padding),e.style.left="",e.style.display="none","-"+parseInt((n+t)/2)+"px"},v=function(e,t){if(+e.style.opacity<1){t=t||16,e.style.opacity=0,e.style.display="block";var n=+new Date,o=function a(){e.style.opacity=+e.style.opacity+(new Date-n)/100,n=+new Date,+e.style.opacity<1&&setTimeout(a,t)};o()}e.style.display="block"},y=function(e,t){t=t||16,e.style.opacity=1;var n=+new Date,o=function a(){e.style.opacity=+e.style.opacity-(new Date-n)/100,n=+new Date,+e.style.opacity>0?setTimeout(a,t):e.style.display="none"};o()},b=function(n){if("function"==typeof MouseEvent){var o=new MouseEvent("click",{view:e,bubbles:!1,cancelable:!0});n.dispatchEvent(o)}else if(t.createEvent){var a=t.createEvent("MouseEvents");a.initEvent("click",!1,!1),n.dispatchEvent(a)}else t.createEventObject?n.fireEvent("onclick"):"function"==typeof n.onclick&&n.onclick()},h=function(t){"function"==typeof t.stopPropagation?(t.stopPropagation(),t.preventDefault()):e.event&&e.event.hasOwnProperty("cancelBubble")&&(e.event.cancelBubble=!0)};a.hasClass=r,a.addClass=s,a.removeClass=l,a.escapeHtml=i,a._show=u,a.show=c,a._hide=d,a.hide=f,a.isDescendant=p,a.getTopMargin=m,a.fadeIn=v,a.fadeOut=y,a.fireClick=b,a.stopEventPropagation=h},{}],5:[function(t,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=t("./handle-dom"),s=t("./handle-swal-dom"),l=function(t,o,a){var l=t||e.event,i=l.keyCode||l.which,u=a.querySelector("button.confirm"),c=a.querySelector("button.cancel"),d=a.querySelectorAll("button[tabindex]");if(-1!==[9,13,32,27].indexOf(i)){for(var f=l.target||l.srcElement,p=-1,m=0;m<d.length;m++)if(f===d[m]){p=m;break}9===i?(f=-1===p?u:p===d.length-1?d[0]:d[p+1],(0,r.stopEventPropagation)(l),f.focus(),o.confirmButtonColor&&(0,s.setFocusStyle)(f,o.confirmButtonColor)):13===i?("INPUT"===f.tagName&&(f=u,u.focus()),f=-1===p?u:n):27===i&&o.allowEscapeKey===!0?(f=c,(0,r.fireClick)(f,l)):f=n}};a["default"]=l,o.exports=a["default"]},{"./handle-dom":4,"./handle-swal-dom":6}],6:[function(n,o,a){function r(e){return e&&e.__esModule?e:{"default":e}}Object.defineProperty(a,"__esModule",{value:!0});var s=n("./utils"),l=n("./handle-dom"),i=n("./default-params"),u=r(i),c=n("./injected-html"),d=r(c),f=".sweet-alert",p=".sweet-overlay",m=function(){var e=t.createElement("div");for(e.innerHTML=d["default"];e.firstChild;)t.body.appendChild(e.firstChild)},v=function x(){var e=t.querySelector(f);return e||(m(),e=x()),e},y=function(){var e=v();return e?e.querySelector("input"):void 0},b=function(){return t.querySelector(p)},h=function(e,t){var n=(0,s.hexToRgb)(t);e.style.boxShadow="0 0 2px rgba("+n+", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"},g=function(n){var o=v();(0,l.fadeIn)(b(),10),(0,l.show)(o),(0,l.addClass)(o,"showSweetAlert"),(0,l.removeClass)(o,"hideSweetAlert"),e.previousActiveElement=t.activeElement;var a=o.querySelector("button.confirm");a.focus(),setTimeout(function(){(0,l.addClass)(o,"visible")},500);var r=o.getAttribute("data-timer");if("null"!==r&&""!==r){var s=n;o.timeout=setTimeout(function(){var e=(s||null)&&"true"===o.getAttribute("data-has-done-function");e?s(null):sweetAlert.close()},r)}},w=function(){var e=v(),t=y();(0,l.removeClass)(e,"show-input"),t.value=u["default"].inputValue,t.setAttribute("type",u["default"].inputType),t.setAttribute("placeholder",u["default"].inputPlaceholder),C()},C=function(e){if(e&&13===e.keyCode)return!1;var t=v(),n=t.querySelector(".sa-input-error");(0,l.removeClass)(n,"show");var o=t.querySelector(".sa-error-container");(0,l.removeClass)(o,"show")},S=function(){var e=v();e.style.marginTop=(0,l.getTopMargin)(v())};a.sweetAlertInitialize=m,a.getModal=v,a.getOverlay=b,a.getInput=y,a.setFocusStyle=h,a.openModal=g,a.resetInput=w,a.resetInputError=C,a.fixVerticalPosition=S},{"./default-params":2,"./handle-dom":4,"./injected-html":7,"./utils":9}],7:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o='<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <div class="sa-confirm-button-container">\n        <button class="confirm" tabIndex="1">OK</button><div class="la-ball-fall">\n          <div></div>\n          <div></div>\n          <div></div>\n        </div>\n      </div>\n    </div></div>';n["default"]=o,t.exports=n["default"]},{}],8:[function(e,t,o){Object.defineProperty(o,"__esModule",{value:!0});var a=e("./utils"),r=e("./handle-swal-dom"),s=e("./handle-dom"),l=["error","warning","info","success","input","prompt"],i=function(e){var t=(0,r.getModal)(),o=t.querySelector("h2"),i=t.querySelector("p"),u=t.querySelector("button.cancel"),c=t.querySelector("button.confirm");if(o.innerHTML=e.html?e.title:(0,s.escapeHtml)(e.title).split("\n").join("<br>"),i.innerHTML=e.html?e.text:(0,s.escapeHtml)(e.text||"").split("\n").join("<br>"),e.text&&(0,s.show)(i),e.customClass)(0,s.addClass)(t,e.customClass),t.setAttribute("data-custom-class",e.customClass);else{var d=t.getAttribute("data-custom-class");(0,s.removeClass)(t,d),t.setAttribute("data-custom-class","")}if((0,s.hide)(t.querySelectorAll(".sa-icon")),e.type&&!(0,a.isIE8)()){var f=function(){for(var o=!1,a=0;a<l.length;a++)if(e.type===l[a]){o=!0;break}if(!o)return logStr("Unknown alert type: "+e.type),{v:!1};var i=["success","error","warning","info"],u=n;-1!==i.indexOf(e.type)&&(u=t.querySelector(".sa-icon.sa-"+e.type),(0,s.show)(u));var c=(0,r.getInput)();switch(e.type){case"success":(0,s.addClass)(u,"animate"),(0,s.addClass)(u.querySelector(".sa-tip"),"animateSuccessTip"),(0,s.addClass)(u.querySelector(".sa-long"),"animateSuccessLong");break;case"error":(0,s.addClass)(u,"animateErrorIcon"),(0,s.addClass)(u.querySelector(".sa-x-mark"),"animateXMark");break;case"warning":(0,s.addClass)(u,"pulseWarning"),(0,s.addClass)(u.querySelector(".sa-body"),"pulseWarningIns"),(0,s.addClass)(u.querySelector(".sa-dot"),"pulseWarningIns");break;case"input":case"prompt":c.setAttribute("type",e.inputType),c.value=e.inputValue,c.setAttribute("placeholder",e.inputPlaceholder),(0,s.addClass)(t,"show-input"),setTimeout(function(){c.focus(),c.addEventListener("keyup",swal.resetInputError)},400)}}();if("object"==typeof f)return f.v}if(e.imageUrl){var p=t.querySelector(".sa-icon.sa-custom");p.style.backgroundImage="url("+e.imageUrl+")",(0,s.show)(p);var m=80,v=80;if(e.imageSize){var y=e.imageSize.toString().split("x"),b=y[0],h=y[1];b&&h?(m=b,v=h):logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got "+e.imageSize)}p.setAttribute("style",p.getAttribute("style")+"width:"+m+"px; height:"+v+"px")}t.setAttribute("data-has-cancel-button",e.showCancelButton),e.showCancelButton?u.style.display="inline-block":(0,s.hide)(u),t.setAttribute("data-has-confirm-button",e.showConfirmButton),e.showConfirmButton?c.style.display="inline-block":(0,s.hide)(c),e.cancelButtonText&&(u.innerHTML=(0,s.escapeHtml)(e.cancelButtonText)),e.confirmButtonText&&(c.innerHTML=(0,s.escapeHtml)(e.confirmButtonText)),e.confirmButtonColor&&(c.style.backgroundColor=e.confirmButtonColor,c.style.borderLeftColor=e.confirmLoadingButtonColor,c.style.borderRightColor=e.confirmLoadingButtonColor,(0,r.setFocusStyle)(c,e.confirmButtonColor)),t.setAttribute("data-allow-outside-click",e.allowOutsideClick);var g=!!e.doneFunction;t.setAttribute("data-has-done-function",g),e.animation?"string"==typeof e.animation?t.setAttribute("data-animation",e.animation):t.setAttribute("data-animation","pop"):t.setAttribute("data-animation","none"),t.setAttribute("data-timer",e.timer)};o["default"]=i,t.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],9:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},r=function(e){var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?parseInt(t[1],16)+", "+parseInt(t[2],16)+", "+parseInt(t[3],16):null},s=function(){return e.attachEvent&&!e.addEventListener},l=function(t){"undefined"!=typeof e&&e.console&&e.console.log("SweetAlert: "+t)},i=function(e,t){e=String(e).replace(/[^0-9a-f]/gi,""),e.length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;var n,o,a="#";for(o=0;3>o;o++)n=parseInt(e.substr(2*o,2),16),n=Math.round(Math.min(Math.max(0,n+n*t),255)).toString(16),a+=("00"+n).substr(n.length);return a};o.extend=a,o.hexToRgb=r,o.isIE8=s,o.logStr=l,o.colorLuminance=i},{}]},{},[1]),"function"==typeof define&&define.amd?define(function(){return sweetAlert}):"undefined"!=typeof module&&module.exports&&(module.exports=sweetAlert)}(window,document);
/*
* Price Format jQuery Plugin
* Created By Eduardo Cuducos
* Currently maintained by Flavio Silveira flavio [at] gmail [dot] com
*/

(function (factory) {
  if (typeof define === "function" && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== 'undefined') {
    module.exports = factory(require('jquery'));
  } else {
    factory(jQuery);
  }
} (function($) {
  'use strict';

  /****************
   * Main Function *
   *****************/
  $.fn.priceFormat = function(options) {

    var options = $.extend(true, {}, $.fn.priceFormat.defaults, options);

    // detect if ctrl or metaKey(Mac) is pressed
    window.ctrl_down = false
    var metaKey = false

    $(window).bind('keyup keydown', function (e) {
        window.ctrl_down = e.ctrlKey;
        return true;
    });

    $(this).bind('keyup keydown', function (e) {
        metaKey = e.metaKey;
        return true;
    });

    return this.each(function() {
      // pre defined options
      var obj = $(this);
      var value = '';
      var is_number = /[0-9]/;

      // Check if is an input
      if (obj.is('input'))
        value = obj.val();
      else
        value = obj.html();

      // load the pluggings settings
      var prefix = options.prefix;
      var suffix = options.suffix;
      var centsSeparator = options.centsSeparator;
      var thousandsSeparator = options.thousandsSeparator;
      var limit = options.limit;
      var centsLimit = options.centsLimit;
      var clearPrefix = options.clearPrefix;
      var clearSuffix = options.clearSuffix;
      var allowNegative = options.allowNegative;
      var insertPlusSign = options.insertPlusSign;
      var clearOnEmpty = options.clearOnEmpty;
      var leadingZero = options.leadingZero;

      // If insertPlusSign is on, it automatic turns on allowNegative, to work with Signs
      if (insertPlusSign) allowNegative = true;

      function set(nvalue) {
        if (obj.is('input'))
          obj.val(nvalue);
        else
          obj.html(nvalue);

        obj.trigger('pricechange');
      }

      function get() {
        if (obj.is('input'))
          value = obj.val();
        else
          value = obj.html();

        return value;
      }

      // skip everything that isn't a number
      // and also skip the left zeroes
      function to_numbers(str) {
        var formatted = '';
        for (var i = 0; i < (str.length); i++) {
          var char_ = str.charAt(i);
          if (formatted.length == 0 && char_ == 0) char_ = false;

          if (char_ && char_.match(is_number)) {
            if (limit) {
              if (formatted.length < limit) formatted = formatted + char_;
            } else {
              formatted = formatted + char_;
            }
          }
        }

        return formatted;
      }

      // format to fill with zeros to complete cents chars
      function fill_with_zeroes(str) {
        while (str.length < (centsLimit + 1)) str = '0' + str;
        return str;
      }

      // format as price
      function price_format(str, ignore) {
        if (!ignore && (str === '' || str == price_format('0', true)) && clearOnEmpty)
          return '';

        // formatting settings
        var formatted = fill_with_zeroes(to_numbers(str));
        var thousandsFormatted = '';
        var thousandsCount = 0;

        // Checking CentsLimit
        if (centsLimit == 0) {
          centsSeparator = "";
          centsVal = "";
        }

        // split integer from cents
        var centsVal = formatted.substr(formatted.length - centsLimit, centsLimit);
        var integerVal = formatted.substr(0, formatted.length - centsLimit);

        // apply cents pontuation
        // This stops from adding a leading Zero '0.00' -> '.00'
        if (leadingZero) {
          formatted = integerVal + centsSeparator + centsVal;
        } else {
          if (integerVal !== "0") {
            formatted = integerVal + centsSeparator + centsVal;
          }
          else {
            formatted = centsSeparator + centsVal;
          }
        }

        // apply thousands pontuation
        if (thousandsSeparator || $.trim(thousandsSeparator) != "") {
          for (var j = integerVal.length; j > 0; j--) {
            var char_ = integerVal.substr(j - 1, 1);
            thousandsCount++;
            if (thousandsCount % 3 == 0) char_ = thousandsSeparator + char_;
            thousandsFormatted = char_ + thousandsFormatted;
          }

          //
          if (thousandsFormatted.substr(0, 1) == thousandsSeparator) thousandsFormatted = thousandsFormatted.substring(1, thousandsFormatted.length);
          formatted = (centsLimit == 0) ? thousandsFormatted : thousandsFormatted + centsSeparator + centsVal;
        }

        // if the string contains a dash, it is negative - add it to the begining (except for zero)
        if (allowNegative && (integerVal != 0 || centsVal != 0)) {
          if (str.indexOf('-') != -1 && str.indexOf('+') < str.indexOf('-')) {
            formatted = '-' + formatted;
          } else {
            if (!insertPlusSign)
              formatted = '' + formatted;
            else
              formatted = '+' + formatted;
          }
        }

        // apply the prefix
        if (prefix) formatted = prefix + formatted;

        // apply the suffix
        if (suffix) formatted = formatted + suffix;

        return formatted;
      }

      // filter what user type (only numbers and functional keys)
      function key_check(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        var typed = String.fromCharCode(code);
        var functional = false;
        var str = value;
        var newValue = price_format(str + typed);

        // allow key numbers, 0 to 9
        if ((code >= 48 && code <= 57) || (code >= 96 && code <= 105)) functional = true;
        if (code == 192) functional = true;

        // check Backspace, Tab, Enter, Delete, and left/right arrows
        if (code == 8) functional = true;
        if (code == 9) functional = true;
        if (code == 13) functional = true;
        if (code == 46) functional = true;
        if (code == 37) functional = true;
        if (code == 39) functional = true;
        // Minus Sign, Plus Sign
        if (allowNegative && (code == 189 || code == 109 || code == 173)) functional = true;
        if (insertPlusSign && (code == 187 || code == 107 || code == 61)) functional = true;
        //Allow Home, End, Shift, Caps Lock, Esc
        if (code >= 16 && code <= 20) functional = true;
        if (code == 27) functional = true;
        if (code >= 33 && code <= 40) functional = true;
        if (code >= 44 && code <= 46) functional = true;

        // allow Ctrl shortcuts (copy, paste etc.)
        if (window.ctrl_down || metaKey){
          if (code == 86) functional = true; // v: paste
          if (code == 67) functional = true; // c: copy
          if (code == 88) functional = true; // x: cut
          if (code == 82) functional = true; // r: reload
          if (code == 84) functional = true; // t: new tab
          if (code == 76) functional = true; // l: URL bar
          if (code == 87) functional = true; // w: close window/tab
          if (code == 81) functional = true; // q: quit
          if (code == 78) functional = true; // n: new window/tab
          if (code == 65) functional = true; // a: select all
        }

        if (!functional) {
          e.preventDefault();
          e.stopPropagation();
          if (str != newValue) set(newValue);
        }

      }

      // Formatted price as a value
      function price_it() {
        var str = get();
        var price = price_format(str);
        if (str != price) set(price);
        var format = price_format('0', true);
        if (price == format && str != '0' && clearOnEmpty) set('');
      }

      // Add prefix on focus
      function add_prefix() {
        obj.val(prefix + get());
      }

      function add_suffix() {
        obj.val(get() + suffix);
      }

      // Clear prefix on blur if is set to true
      function clear_prefix() {
        if ($.trim(prefix) != '' && clearPrefix) {
          var array = get().split(prefix);
          set(array[1]);
        }
      }

      // Clear suffix on blur if is set to true
      function clear_suffix() {
        if ($.trim(suffix) != '' && clearSuffix) {
          var array = get().split(suffix);
          set(array[0]);
        }
      }

      // bind the actions
      obj.bind('keydown.price_format', key_check);
      obj.bind('keyup.price_format', price_it);
      obj.bind('focusout.price_format', price_it);

      // Clear Prefix and Add Prefix
      if (clearPrefix) {
        obj.bind('focusout.price_format', function() {
          clear_prefix();
        });

        obj.bind('focusin.price_format', function() {
          add_prefix();
        });
      }

      // Clear Suffix and Add Suffix
      if (clearSuffix) {
        obj.bind('focusout.price_format', function() {
          clear_suffix();
        });

        obj.bind('focusin.price_format', function() {
          add_suffix();
        });
      }

      // If value has content
      if (get().length > 0) {
        price_it();
        clear_prefix();
        clear_suffix();
      }

    });

  };

  /**********************
   * Remove price format *
   ***********************/
  $.fn.unpriceFormat = function() {
    return $(this).unbind(".price_format");
  };

  /******************
   * Unmask Function *
   *******************/
  $.fn.unmask = function() {

    var field;
    var result = "";

    if ($(this).is('input'))
      field = $(this).val() || [];
    else
      field = $(this).html();

    for (var f = 0; f < field.length; f++) {
      if (!isNaN(field[f]) || field[f] == "-") result += field[f];
    }

    return result;
  };

  /******************
   * Price to Float *
   ******************/
  $.fn.priceToFloat = function() {

    if ($(this).is('input'))
      field = $(this).val() || [];
    else
      field = $(this).html();

    return parseFloat(field.replace(/[^0-9\-\.]/g, ''));
  };

  /************
   * Defaults *
   ************/
  $.fn.priceFormat.defaults = {
    prefix: 'US$ ',
    suffix: '',
    centsSeparator: '.',
    thousandsSeparator: ',',
    limit: false,
    centsLimit: 2,
    clearPrefix: false,
    clearSufix: false,
    allowNegative: false,
    insertPlusSign: false,
    clearOnEmpty: false,
    leadingZero: true
  };
}));
