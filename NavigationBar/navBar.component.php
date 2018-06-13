<div id = 'myHeader'></div>
<nav id = 'customNav'>
    <ul class = 'mainNav'>
        <li class="mainOption"><a class="firstLevel" href="#"><i class="fa fa-home fa-fw"></i> HOME</a></li>
        <li class="mainOption hasSubs"><a class="firstLevel" href="#"><i class="fa fa-bookmark fa-fw"></i> STUDY MATERIALS</a>
            <ul class="dropDown">
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 1</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=1&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=1&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 2</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=2&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=2&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 3</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=3&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=3&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 4</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=4&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="../BrowsingPage/browsingPage.component.php?level=4&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="mainOption"><a class="firstLevel" href="ProjectMaterials/projectMaterials.component.php"><i class="fa fa-graduation-cap fa-fw"></i> PROJECT MATERIALS</a></li>
        <li class="searchContainer" id = 'searchContainer'>
            <form action="action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li class="mainOption" id = 'signIn' style="/*float: right;*/"><a class="firstLevel" href="#"><i class="fa fa-sign-in fa-fw"></i> SIGN IN</a></li>
        <li class="mainOption" id = 'signUp' style="/*float: right;*/"><a class="firstLevel" href="#"><i class="fa fa-edit fa-fw"></i> SIGN UP</a></li>
        <li class="mainOptionIcon">
            <a href="javascript:void(0);" class="icon" onclick="showFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </li>
    </ul>
</nav>

<!--FOR STICKY NAVBAR-->

<script type="text/javascript">

    //funciton to get element styles
    function getStyle(id, name)
    {
        return id.currentStyle ? id.currentStyle[name] : window.getComputedStyle ? window.getComputedStyle(id, null).getPropertyValue(name) : null;
    }


    function showFunction() {                                         //for responsiveness
        var x = document.getElementsByClassName("mainOption");
        var i;
        for(i = 0; i<x.length; i++ ) {
            var dis = getStyle(x[i], 'display');
            //alert(dis);
            if(dis === 'none'){
                x[i].style.display = 'block';
            }
            else if(dis === 'block'){
                x[i].style.display = '';
            }
        }

        x = document.getElementById('searchContainer');
        var dis = getStyle(x, 'display');

        if(dis === 'none') {
            x.style.display = 'block';
        }
        else if(dis === 'block') {
            x.style.display = '';
        }
    }



    var $navbar   = $("#customNav"),
        $window    = $(window),
        offset     = $navbar.offset(),
        topPadding = 0;
    var lastScrollTop = 0;
    $window.scroll(function() {
        var st = $(this).scrollTop();
        if ($window.scrollTop() - offset.top >= 1) {
            $navbar.css("position","absolute");
            if(st>lastScrollTop){                   //Down Scroll
                $navbar.stop().animate({
                    marginTop: $window.scrollTop()+6
                });
            }else {                                 //Up scroll
                $navbar.stop().animate({
                    marginTop: $window.scrollTop()+6
                },0);
            }
        } else {
            $navbar.css("position","relative");
            $navbar.stop().animate({
                marginTop: 0
            });
        }
        lastScrollTop = st;
    });
</script>