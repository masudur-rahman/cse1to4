if (window.addEventListener) {              
  window.addEventListener("resize", browserResize);
} else if (window.attachEvent) {                 
  window.attachEvent("onresize", browserResize);
}
var xbeforeResize = window.innerWidth;
var ybeforeResize = window.innerWidth;
var zbeforeResize = window.innerWidth;
function skyscraperResize() {
if (window.innerWidth < 975 + 17) {
  document.getElementById("div-gpt-ad-1422003450156-5").style.minHeight="0";
  }
}
function browserResize() {
  var afterResize = window.innerWidth;
  if ((xbeforeResize < (1450 + 14) && afterResize >= (1450 + 14)) || (xbeforeResize >= (1450 + 14) && afterResize < (1450 + 14)) ||
    (xbeforeResize < (700 + 14) && afterResize >= (700 + 14)) || (xbeforeResize >= (700 + 14) && afterResize < (700 + 14)) ||
    (xbeforeResize < (480 + 17) && afterResize >= (480 + 17)) ||(xbeforeResize >= (480 + 17) && afterResize < (480 + 17))) {
    xbeforeResize = afterResize;
    googletag.cmd.push(function() {
      googletag.pubads().refresh([gptAdSlots[0]]);
    });
  }
  if ((ybeforeResize < (1675 + 14) && afterResize >= (1675 + 14)) || (ybeforeResize >= (1675 + 14) && afterResize < (1675 + 14)) ||
  	(ybeforeResize < (1100 + 14) && afterResize >= (1100 + 14)) || (ybeforeResize >= (1100 + 14) && afterResize < (1100 + 14)) ||
    (ybeforeResize < (975 + 17) && afterResize >= (975 + 17)) || (ybeforeResize >= (975 + 17) && afterResize < (975 + 17))) {
    ybeforeResize = afterResize;
      skyscraperResize()
    googletag.cmd.push(function() {
      googletag.pubads().refresh([gptAdSlots[1]]);
    });
  }
  if ((zbeforeResize < (1200 + 14) && afterResize >= (1200 + 14)) || (zbeforeResize >= (1200 + 14) && afterResize < (1200 + 14))) {
    zbeforeResize = afterResize;
    googletag.cmd.push(function() {
      googletag.pubads().refresh([gptAdSlots[2], gptAdSlots[3]]);
    });
  }
}
skyscraperResize();
function open_menu() {
  var x, m;
  m = (document.getElementById("leftmenu") || document.getElementById("sidemenu"));
  if (m.style.display == "block") {
    close_menu();
  } else {
    w3_close_all_nav();  
    m.style.display = "block";
    if (document.getElementsByClassName) {
      x = document.getElementsByClassName("chapter")
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
      }
      x = document.getElementsByClassName("nav")
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
      }
      x = document.getElementsByClassName("sharethis")
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
      }
    }
    fix_sidemenu();
  }
}
function close_menu() {
  var m;
  m = (document.getElementById("leftmenu") || document.getElementById("sidemenu"));
  m.style.display = "none";  
  if (document.getElementsByClassName) {
    x = document.getElementsByClassName("chapter")
    for (i = 0; i < x.length; i++) {
      x[i].style.visibility = "visible";
    }
    x = document.getElementsByClassName("nav")
    for (i = 0; i < x.length; i++) {
      x[i].style.visibility = "visible";
    }
    x = document.getElementsByClassName("sharethis")
    for (i = 0; i < x.length; i++) {
      x[i].style.visibility = "visible";
    }            
  }
}
if (window.addEventListener) {
  window.addEventListener("scroll", function () {fix_sidemenu(); });
  window.addEventListener("resize", function () {fix_sidemenu(); });  
  window.addEventListener("touchmove", function () {fix_sidemenu(); });  
  window.addEventListener("load", function () {fix_sidemenu(); });
} else if (window.attachEvent) {
  window.attachEvent("onscroll", function () {fix_sidemenu(); });
  window.attachEvent("onresize", function () {fix_sidemenu(); });  
  window.attachEvent("ontouchmove", function () {fix_sidemenu(); });
  window.attachEvent("onload", function () {fix_sidemenu(); });
}
function fix_sidemenu() {
  var w, top;
  w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  top = scrolltop()    
  if (w < 993 && w > 600) {
    if (top == 0) {
      document.getElementById("leftmenu").style.paddingTop = "147px";      
    }
    if (top > 0 && top < 100) {
      document.getElementById("leftmenu").style.paddingTop = (147 - top) + "px";      
    }
    if (top > 100) {
      document.getElementById("leftmenu").style.paddingTop = document.getElementById("topnav").offsetHeight + "px";
      document.getElementById("belowtopnav").style.paddingTop = "44px";    
      document.getElementById("topnav").style.position = "fixed";    
      document.getElementById("topnav").style.top = "0";        
    } else {
      document.getElementById("belowtopnav").style.paddingTop = "0";
      document.getElementById("topnav").style.position = "relative";
    }
    document.getElementById("leftmenuinner").style.paddingTop = "0"; //SCROLLNYTT
  } else {
    if (top == 0) {
      if (w < 600) {
        document.getElementById("leftmenu").style.paddingTop = "109px";
      } else {
        document.getElementById("leftmenu").style.paddingTop = "0";
      }
    }
    if (top > 0 && top < 63) {
      document.getElementById("leftmenu").style.paddingTop = (109 - top) + "px";      
    }
    if (top > 63) {
      document.getElementById("leftmenu").style.paddingTop = "44px";      
      if (w > 992) {document.getElementById("leftmenuinner").style.paddingTop = "44px";} //SCROLLNYTT
      document.getElementById("belowtopnav").style.paddingTop = "44px";    
      document.getElementById("topnav").style.position = "fixed";    
      document.getElementById("topnav").style.top = "0";        
    } else {
      if (w > 992) { document.getElementById("leftmenuinner").style.paddingTop = (112 - top) + "px";} //SCROLLNYTT
      document.getElementById("belowtopnav").style.paddingTop = "0";
      document.getElementById("topnav").style.position = "relative";
    }
  }
}
function scrolltop() {
  var top = 0;
  if (typeof(window.pageYOffset) == "number") {
    top = window.pageYOffset;
  } else if (document.body && document.body.scrollTop) {
    top = document.body.scrollTop;
  } else if (document.documentElement && document.documentElement.scrollTop) {
    top = document.documentElement.scrollTop;
  }
  return top;
}
function w3_open_nav(x) {
  var contentNode;
  if (document.getElementById("nav_" + x).style.display == "block") {
    w3_close_nav(x);
  } else {
    w3_close_all_nav();
    if (document.getElementById("nav_" + x).innerHTML == "") {
      contentNode = document.body.removeChild(document.getElementById("nav_" + x + "_content"));
      document.getElementById("nav_" + x).appendChild(contentNode);
      document.getElementById("nav_" + x + "_content").style.display = "block";
    }
    document.getElementById("nav_" + x).style.display = "block";    
    if (document.getElementById("topnavbtn_" + x)) {    
      document.getElementById("topnavbtn_" + x).getElementsByTagName("i")[0].style.display = "none";
      document.getElementById("topnavbtn_" + x).getElementsByTagName("i")[1].style.display = "inline";        
    }
    if (x == "search") {
      if (document.getElementById("gsc-i-id1")) {document.getElementById("gsc-i-id1").focus(); }
    }  
  }
}
function w3_close_nav(x) {
  document.getElementById("nav_" + x).style.display = "none";
  if (document.getElementById("topnavbtn_" + x)) {
    document.getElementById("topnavbtn_" + x).getElementsByTagName("i")[0].style.display = "inline";
    document.getElementById("topnavbtn_" + x).getElementsByTagName("i")[1].style.display = "none";        
  }
}
function w3_close_all_nav() {
  w3_close_nav("tutorials");
  w3_close_nav("references");
  w3_close_nav("examples");
  w3_close_nav("translate");
  w3_close_nav("search");
  close_menu();
}
(function () {
  var x, i, a, b, m;
  m = (document.getElementById("leftmenu") || document.getElementById("sidemenu"));
  x = m.getElementsByTagName("A");
  i;
  for (i = 0; i < x.length; i++) {
    if(document.location.href.indexOf(x[i].href) >= 0) {
      x[i].className = "active";
     }
  }
  x = document.getElementById("topnav").getElementsByTagName("A");
  for (i = 0; i < x.length; i++) {
    a = document.location.pathname;
    b = x[i].pathname;
    if (a.substr(0, a.indexOf("../index.html",1)) ==  b.substr(0, b.indexOf("../index.html",1))) {
      x[i].className = "active";
     }
  }
  if (window.addEventListener) { 
    document.getElementById("main").addEventListener("click", w3_close_all_nav, true);
    m.addEventListener("click", w3_close_all_nav, true);
    document.getElementById("right").addEventListener("click", w3_close_all_nav, true);
  } else if (window.attachEvent) {         
    document.getElementById("main").attachEvent("onclick", w3_close_all_nav);
    m.attachEvent("onclick", w3_close_all_nav);
    document.getElementById("right").attachEvent("onclick", w3_close_all_nav);
  }
  if ('ontouchstart' in window || 'onmsgesturechange' in window) {
    document.getElementById("leftmenuinnerinner").style.overflowY = "scroll";
  }
})();
(function() {
  var cx = '012971019331610648934:m2tou3_miwy';
  var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
  gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
      '//www.google.com/cse/cse.js?cx=' + cx;
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();
function searchfield_focus(obj) {
  obj.style.color = "";
  obj.style.fontStyle = "";
  if (obj.value == "Search w3schools.com") {obj.value = "";}
}
var addr = document.location.href;
function displayError() {
  document.getElementById("err_url").value = addr;
  document.getElementById("err_form").style.display = "block";
  document.getElementById("err_email").focus();
  hideSent();
}
function hideError() {
  document.getElementById("err_form").style.display = "none";
}
function hideSent() {
  document.getElementById("err_sent").style.display = "none";
}
function sendErr() {
  var xmlhttp;
  var err_url = document.getElementById("err_url").value;
  var err_email = document.getElementById("err_email").value;
  var err_desc = document.getElementById("err_desc").value;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("POST.html", "../err_sup.html", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("err_url=" + err_url + "&err_email=" + err_email + "&err_desc=" + escape(err_desc));
  document.getElementById("err_desc").value = "";
  hideError();
  document.getElementById("err_sent").style.display = "block";
}
function clickFBLike() {
  document.getElementById("fblikeframe").style.display = 'block';
  document.getElementById("popupDIV").innerHTML = "<iframe src='/fblike.asp?r=" + Math.random() + "' frameborder='no' style='height:200px;width:300px;'></iframe><br><button onclick='hideFBLike()'>Close</button>";
}
function hideFBLike() {
  document.getElementById("fblikeframe").style.display = 'none';
}
function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: 'en',
		autoDisplay: false,    
		gaTrack: true,
		gaId: 'UA-3855518-1',
		layout: google.translate.TranslateElement.InlineLayout.SIMPLE
	}, 'google_translate_element');
}
function printPage() {
  var content = document.getElementById("main").innerHTML;
  var css = "", i, j, c = document.getElementById("main").cloneNode(true);
  for (i = 0; i < c.childNodes.length; i++) {
    if (c.childNodes[i].nodeType == 1 && c.childNodes[i].getAttribute("id") == "mainLeaderboard") {
      c.removeChild(c.childNodes[i]);
      content = c.innerHTML;
      break;
    }
  }
  var head = document.getElementsByTagName("head")[0].innerHTML;
  var myWindow=window.open('','','');
  myWindow.document.write("<html><head>"+head+"<style>body{padding:15px;}@media print {.printbtn {display:none;}}</style></head><body><button class='printbtn' onclick='window.print()'>Print Page</button><br><br>"+content+"<p><a href='/about/about_copyright.asp'>Copyright 1999-2015</a> by Refsnes Data. All Rights Reserved.</p></body></html>");
}
function openGoogleTranslate() {
  var d = "text/javascript",
    e = "text/css",
    f = "stylesheet",
    g = "script",
    h = "link",
    k = "head",
    l = "complete",
    m = "UTF-8",
    n = ".";
  document.getElementById("google_translate_element").innerHTML = "";

  function p(b) {
    var a = document.getElementsByTagName(k)[0];
    a || (a = document.body.parentNode.appendChild(document.createElement(k)));
    a.appendChild(b)
  }

  function _loadJs(b) {
    var a = document.createElement(g);
    a.type = d;
    a.charset = m;
    a.src = b;
    p(a)
  }

  function _loadCss(b) {
    var a = document.createElement(h);
    a.type = e;
    a.rel = f;
    a.charset = m;
    a.href = b;
    p(a)
  }

  function _isNS(b) {
    b = b.split(n);
    for (var a = window, c = 0; c < b.length; ++c)
      if (!(a = a[b[c]])) return !1;
    return !0
  }

  function _setupNS(b) {
    b = b.split(n);
    for (var a = window, c = 0; c < b.length; ++c) a.hasOwnProperty ? a.hasOwnProperty(b[c]) ? a = a[b[c]] : a = a[b[c]] = {} : a = a[b[c]] || (a[b[c]] = {});
    return a
  }
  window.addEventListener && "undefined" == typeof document.readyState && window.addEventListener("DOMContentLoaded", function() {
    document.readyState = l
  }, !1);
  if (_isNS('google.translate.Element')) {
    return
  }(function() {
    var c = _setupNS('google.translate._const');
    c._cl = 'no';
    c._cuc = 'googleTranslateElementInit';
    c._cac = '';
    c._cam = '';
    var h = 'translate.googleapis.com';
    var s = (true ? 'https' : window.location.protocol == 'https:' ? 'https' : 'http') + '://';
    var b = s + h;
    c._pah = h;
    c._pas = s;
    c._pbi = b + '/translate_static/img/te_bk.gif';
    c._pci = b + '/translate_static/img/te_ctrl3.gif';
    c._pli = b + '/translate_static/img/loading.gif';
    c._plla = h + '/translate_a/l';
    c._pmi = b + '/translate_static/img/mini_google.png';
    c._ps = b + '/translate_static/css/translateelement.css';
    c._puh = 'translate.google.com';
    _loadCss(c._ps);
    _loadJs(b + '/translate_static/js/element/main_no.js');
  })();
}
/* w3codecolor ver 1.0 by w3schools.com */
(
function w3CodeColor() {
var x, i, j, k, l, modes = ["html", "js", "css"];
if (!document.getElementsByClassName) {return;}
k = modes.length;
for (j = 0; j < k; j++) {
  x = document.getElementsByClassName(modes[j] + "High");
  l = x.length;
  for (i = 0; i < l; i++) {
    x[i].innerHTML = w3CodeColorize(x[i].innerHTML, modes[j]);
  }
}
function w3CodeColorize(x, lang) {
  var tagcolor = "mediumblue";
  var tagnamecolor = "brown";
  var attributecolor = "red";
  var attributevaluecolor = "mediumblue";
  var commentcolor = "green";
  var cssselectorcolor = "brown";
  var csspropertycolor = "red";
  var csspropertyvaluecolor = "mediumblue";
  var cssdelimitercolor = "black";
  var jscolor = "black";
  var jskeywordcolor = "mediumblue";
  var jsstringcolor = "brown";
  var phpcolor = "black";
  var phpkeywordcolor = "mediumblue";
  var phpglobalcolor = "goldenrod";
  var phpstringcolor = "brown";
  var angularstatementcolor = "red";
  if (!lang) {lang = "html"; }
  if (lang == "html") {return htmlMode(x);}
  if (lang == "css") {return cssMode(x);}
  if (lang == "js") {return jsMode(x);}
  if (lang == "php") {return phpMode(x);}
  return x;
  function htmlMode(txt) {
    var rest = txt, done = "", startpos, endpos, note;
    while (rest.indexOf("&lt;") > -1) {
      note = "";
      startpos = rest.indexOf("&lt;");
      if (rest.substr(startpos, 7) == "&lt;!--") {
        endpos = rest.indexOf("--&gt;", startpos);
        if (endpos == -1) {endpos = rest.length;}
        done += rest.substring(0, startpos);
        done += commentMode(rest.substring(startpos, endpos + 6));
        rest = rest.substr(endpos + 6);
      } else if (rest.substr(startpos, 8) == "&lt;?php") {
        endpos = rest.indexOf("?&gt;", startpos);
        if (endpos == -1) {endpos = rest.length;}
        done += rest.substring(0, startpos);
        done += phpMode(rest.substring(startpos, endpos + 5));
        rest = rest.substr(endpos + 5);
      } else {
        if (rest.substr(startpos, 9).toUpperCase() == "&LT;STYLE") {note = "css";}
        if (rest.substr(startpos, 10).toUpperCase() == "&LT;SCRIPT") {note = "javascript";}        
        endpos = rest.indexOf("&gt;", startpos);
        if (endpos == -1) {endpos = rest.length;}
        done += rest.substring(0, startpos);
        done += tagMode(rest.substring(startpos, endpos + 4));
        rest = rest.substr(endpos + 4);
      }
      if (note == "css") {
        endpos = rest.indexOf("&lt;/style&gt;");
        if (endpos > -1) {
          done += cssMode(rest.substring(0, endpos));
          rest = rest.substr(endpos);
        }
      }
      if (note == "javascript") {
        endpos = rest.indexOf("&lt;/script&gt;");
        if (endpos > -1) {
          done += jsMode(rest.substring(0, endpos));
          rest = rest.substr(endpos);
        }
      }
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("{{") > -1) {
      startpos = rest.indexOf("{{");
      endpos = rest.indexOf("}}", startpos);
      if (endpos == -1) {
        done += rest.substring(0, startpos + 2);
        rest = rest.substr(startpos + 2);
      } else {
        done += rest.substring(0, startpos);    
        done += angularMode(rest.substring(startpos, endpos + 2));
        rest = rest.substr(endpos + 2);
      }
    }
    return done + rest;
  }
  function tagMode(txt) {
    var rest = txt, done = "", startpos, endpos, result;
    while (rest.search(/(\s|<br>)/) > -1) {    
      startpos = rest.search(/(\s|<br>)/);
      endpos = rest.indexOf("&gt;");
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);
      done += attributeMode(rest.substring(startpos, endpos));
      rest = rest.substr(endpos);
    }
    result = done + rest;
    result = "<span style=color:" + tagcolor + ">&lt;</span>" + result.substring(4);
    if (result.substr(result.length - 4, 4) == "&gt;") {
      result = result.substring(0, result.length - 4) + "<span style=color:" + tagcolor + ">&gt;</span>";
    }
    return "<span style=color:" + tagnamecolor + ">" + result + "</span>";
  }
  function attributeMode(txt) {
    var rest = txt, done = "", startpos, endpos, result, singlefnuttpos, doublefnuttpos, spacepos;
    while (rest.indexOf("=") > -1) {
      startpos = rest.indexOf("=");
      singlefnuttpos = rest.indexOf("'", startpos);
      doublefnuttpos = rest.indexOf('"', startpos);
      spacepos = rest.indexOf(" ", startpos + 2);
      if (spacepos > -1 && (spacepos < singlefnuttpos || singlefnuttpos == -1) && (spacepos < doublefnuttpos || doublefnuttpos == -1)) {
        endpos = rest.indexOf(" ", startpos);      
      } else if (doublefnuttpos > -1 && (doublefnuttpos < singlefnuttpos || singlefnuttpos == -1) && (doublefnuttpos < spacepos || spacepos == -1)) {
        endpos = rest.indexOf('"', rest.indexOf('"', startpos) + 1);
      } else if (singlefnuttpos > -1 && (singlefnuttpos < doublefnuttpos || doublefnuttpos == -1) && (singlefnuttpos < spacepos || spacepos == -1)) {
        endpos = rest.indexOf("'", rest.indexOf("'", startpos) + 1);
      }
      if (!endpos || endpos == -1 || endpos < startpos) {endpos = rest.length;}
      done += rest.substring(0, startpos);
      done += attributeValueMode(rest.substring(startpos, endpos + 1));
      rest = rest.substr(endpos + 1);
    }
    result = done + rest;
    return "<span style=color:" + attributecolor + ">" + result + "</span>";
  }
  function attributeValueMode(txt) {
    return "<span style=color:" + attributevaluecolor + ">" + txt + "</span>";
  }
  function angularMode(txt) {
    return "<span style=color:" + angularstatementcolor + ">" + txt + "</span>";
  }
  function commentMode(txt) {
    var result = txt, patt;
    patt = new RegExp("<span style=color:" + jsstringcolor + ">", "g");
    result = result.replace(patt, "<span style=color:" + commentcolor + ">");
    patt = new RegExp("<span style=color:" + jskeywordcolor + ">", "g");
    result = result.replace(patt, "<span style=color:" + commentcolor + ">");
    patt = new RegExp("<span style=color:" + phpstringcolor + ">", "g");
    result = result.replace(patt, "<span style=color:" + commentcolor + ">");
    patt = new RegExp("<span style=color:" + phpkeywordcolor + ">", "g");
    result = result.replace(patt, "<span style=color:" + commentcolor + ">");
    return "<span style=color:" + commentcolor + ">" + result + "</span>";
  }
  function cssMode(txt) {
    var rest = txt, done = "", startpos, endpos;
    while (rest.indexOf("{") > -1) {
      startpos = rest.indexOf("{");
      endpos = rest.indexOf("}", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);
      done += cssPropertyMode(rest.substring(startpos, endpos + 1));
      rest = rest.substr(endpos + 1);
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("/*") > -1) {
      startpos = rest.indexOf("/*");
      endpos = rest.indexOf("*/", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);    
      done += commentMode(rest.substring(startpos, endpos + 2));
      rest = rest.substr(endpos + 2);
    }
    return "<span style=color:" + cssselectorcolor + ">" + done + rest + "</span>";
  }
  function cssPropertyMode(txt) {
    var rest = txt, done = "", startpos, endpos, result;
    while (rest.indexOf(":") > -1) {
      startpos = rest.indexOf(":");
      endpos = rest.indexOf(";", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);
      done += cssPropertyValueMode(rest.substring(startpos, endpos + 1));
      rest = rest.substr(endpos + 1);
    }
    result = done + rest;
    result = "<span style=color:" + cssdelimitercolor + ">{</span>" + result.substring(1);
    if (result.substr(result.length - 1, 1) == "}") {
      result = result.substring(0, result.length - 1) + "<span style=color:" + cssdelimitercolor + ">}</span>";
    }
    return "<span style=color:" + csspropertycolor + ">" + result + "</span>";
  }
  function cssPropertyValueMode(txt) {
    var result = txt;
    result = "<span style=color:" + cssdelimitercolor + ">:</span>" + result.substring(1);
    if (result.substr(result.length - 1, 1) == ";") {
      result = result.substring(0, result.length - 1) + "<span style=color:" + cssdelimitercolor + ">;</span>";
    } else if (result.substr(result.length - 1, 1) == "}") {
      result = result.substring(0, result.length - 1) + "<span style=color:" + cssdelimitercolor + ">}</span>";
    }
    return "<span style=color:" + csspropertyvaluecolor + ">" + result + "</span>";
  }
  function jsMode(txt) {
    var rest = jsKeywords(txt), done = "", singlefnuttpos, doublefnuttpos, startpos, endpos, result, i, jsArr = [];
    while (rest.indexOf('"') > -1 || rest.indexOf("'") > -1) {
      singlefnuttpos = rest.indexOf("'");
      doublefnuttpos = rest.indexOf('"');
      if (singlefnuttpos > -1 && (singlefnuttpos < doublefnuttpos || doublefnuttpos == -1)) {
        startpos = singlefnuttpos;
        endpos = rest.indexOf("'", startpos + 1);
      } else {
        startpos = doublefnuttpos;
        endpos = rest.indexOf('"', startpos + 1);
      }
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);
      done += jsStringMode(rest.substring(startpos, endpos + 1));
      rest = rest.substr(endpos + 1);
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("/*") > -1) {
      startpos = rest.indexOf("/*");
      endpos = rest.indexOf("*/", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);    
      done += commentMode(rest.substring(startpos, endpos + 2));
      rest = rest.substr(endpos + 2);
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("//") > -1) {
      startpos = rest.indexOf("//");
      endpos = rest.indexOf("<br>", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);    
      done += commentMode(rest.substring(startpos, endpos + 4));
      rest = rest.substr(endpos + 4);
    }
    result = done + rest;
    return "<span style=color:" + jscolor + ">" + result + "</span>";
  }
  function jsKeywords(txt) {
    var i, rest, result = txt, done = "", words, patt;
    words = ["abstract","arguments","boolean","break","byte","case","catch","char","class","const","continue","debugger","default","delete",
    "do","double","else","enum","eval","export","extends","false","final","finally","float","for","function","goto","if","implements","import",
    "in","instanceof","int","interface","let","long","native","new","null","package","private","protected","public","return","short","static",
    "super","switch","synchronized","this","throw","throws","transient","true","try","typeof","var","void","volatile","while","with","yield"];
    for (i = 0; i < words.length; i++) {
      rest = result;
      done = "";
      while (rest.indexOf(words[i]) > -1) {
        startpos = rest.indexOf(words[i]);
        endpos = startpos + words[i].length;
        patt = /\W/g;
        if (rest.substr(endpos,1).match(patt) && rest.substr(startpos - 1,1).match(patt)) {
          done += rest.substring(0, startpos);
          done += jsKeywordMode(rest.substring(startpos, endpos));
          rest = rest.substr(endpos);
        } else {
          done += rest.substring(0, endpos);
          rest = rest.substr(endpos);
        }
      }
      result = done + rest;
    }
    return result;
  }
  function jsStringMode(txt) {
    var result = txt, patt;
    patt = new RegExp("<span style=color:" + jskeywordcolor + ">", "g");
    result = result.replace(patt, "<span style=color:" + jsstringcolor + ">");
    return "<span style=color:" + jsstringcolor + ">" + result + "</span>";
  }
  function jsKeywordMode(txt) {
    return "<span style=color:" + jskeywordcolor + ">" + txt + "</span>";
  }
  function phpMode(txt) {
    var rest = txt, done = "", singlefnuttpos, doublefnuttpos, startpos, endpos, result, i, jsArr = [];
    if (rest.indexOf('"') == -1 && rest.indexOf("'") == -1) {rest = phpKeywords(rest);}
    while (rest.indexOf('"') > -1 || rest.indexOf("'") > -1) {
      singlefnuttpos = rest.indexOf("'");
      doublefnuttpos = rest.indexOf('"');
      if (singlefnuttpos > -1 && (singlefnuttpos < doublefnuttpos || doublefnuttpos == -1)) {
        startpos = singlefnuttpos;
        endpos = rest.indexOf("'", startpos + 1);
      } else {
        startpos = doublefnuttpos;
        endpos = rest.indexOf('"', startpos + 1);
      }
      if (endpos == -1) {endpos = rest.length;}
      done += phpKeywords(rest.substring(0, startpos));
      done += phpStringMode(rest.substring(startpos, endpos + 1));
      rest = rest.substr(endpos + 1);
      if (rest.indexOf('"') == -1 && rest.indexOf("'") == -1) {rest = phpKeywords(rest);}
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("/*") > -1) {
      startpos = rest.indexOf("/*");
      endpos = rest.indexOf("*/", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);    
      done += commentMode(rest.substring(startpos, endpos + 2));
      rest = rest.substr(endpos + 2);
    }
    rest = done + rest;
    done = "";
    while (rest.indexOf("//") > -1) {
      startpos = rest.indexOf("//");
      endpos = rest.indexOf("<br>", startpos);
      if (endpos == -1) {endpos = rest.length;}
      done += rest.substring(0, startpos);    
      done += commentMode(rest.substring(startpos, endpos + 4));
      rest = rest.substr(endpos + 4);
    }
    result = done + rest;
    result = "<span style=color:" + tagcolor + ">&lt;" + result.substr(4, 4) + "</span>" + result.substring(8);
    if (result.substr(result.length - 5, 5) == "?&gt;") {
      result = result.substring(0, result.length - 5) + "<span style=color:" + tagcolor + ">?&gt;</span>";
    }
    return "<span style=color:" + phpcolor + ">" + result + "</span>";
  }
  function phpKeywords(txt) {
    var i, rest, result = txt, done = "", words, patt;
    words = ["$GLOBALS","$_SERVER","$_REQUEST","$_POST","$_GET","$_FILES","$_ENV","$_COOKIE","$_SESSION",
    "__halt_compiler","abstract","and","array","as","break","callable","case","catch","class","clone","const","continue","declare","default",
    "die","do","echo","else","elseif","empty","enddeclare","endfor","endforeach","endif","endswitch","endwhile","eval","exit","extends","final","for",
    "foreach","function","global","goto","if","implements","include","include_once","instanceof","insteadof","interface","isset","list","namespace","new",
    "or","print","private","protected","public","require","require_once","return","static","switch","throw","trait","try","unset","use","var","while","xor"];
    for (i = 0; i < words.length; i++) {
      rest = result;
      done = "";
      while (rest.indexOf(words[i]) > -1) {
        startpos = rest.indexOf(words[i]);
        endpos = startpos + words[i].length;
        patt = /\W/g;
        if (rest.substr(endpos,1).match(patt) && rest.substr(startpos - 1,1).match(patt)) {
          done += rest.substring(0, startpos);
          done += phpKeywordMode(rest.substring(startpos, endpos));
          rest = rest.substr(endpos);
        } else {
          done += rest.substring(0, endpos);
          rest = rest.substr(endpos);
        }
      }
      result = done + rest;
    }
    return result;
  }
  function phpStringMode(txt) {
    return "<span style=color:" + phpstringcolor + ">" + txt + "</span>";
  }
  function phpKeywordMode(txt) {
    var glb = ["$GLOBALS","$_SERVER","$_REQUEST","$_POST","$_GET","$_FILES","$_ENV","$_COOKIE","$_SESSION"];
    if (glb.indexOf(txt) > -1) {
      return "<span style=color:" + phpglobalcolor + ">" + txt + "</span>";
    } else {
      return "<span style=color:" + phpkeywordcolor + ">" + txt + "</span>";
    }
  }
}
}
)();