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