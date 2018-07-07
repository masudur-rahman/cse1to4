<?php

    $conn = mysqli_connect('localhost', 'root', '', 'cse1to4');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error."<br>");
    }
    function getName($name,$conn){
        $sql = "SELECT first_name,last_name FROM user_information WHERE user_name='$name'";
        //echo $sql;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ans = $row['first_name']." ".$row['last_name'];
        if(strlen($ans)>1){
            return $ans;
        }
        else {
            return $name;
        }
    }
?>
<div id = 'myHeader'></div>
<nav id = 'customNav'>
    <ul class = 'mainNav'>
        <li class="mainOption"><a class="firstLevel" href="/cse1to4/HomePage/homePage.component.php"><i class="fa fa-home fa-fw"></i> HOME</a></li>
        <li class="mainOption hasSubs"><a class="firstLevel" href="#"><i class="fa fa-bookmark fa-fw"></i> STUDY MATERIALS</a>
            <ul class="dropDown">
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 1</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=1&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=1&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 2</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=2&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=2&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 3</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=3&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=3&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
                <li class="subs hasSubs"><a class="secondLevel" href="#"><i class="fa fa-angle-right fa-fw"></i> LEVEL 4</a>
                    <ul class="subDropDown">
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=4&term=1"><i class="fa fa-angle-double-right fa-fw"></i> TERM I</a>
                        </li>
                        <li class="subSubs"><a class="thirdLevel" href="/cse1to4/BrowsingPage/browsingPage.component.php?level=4&term=2"><i class="fa fa-angle-double-right fa-fw"></i> TERM II</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="mainOption"><a class="firstLevel" href="/cse1to4/ProjectMaterials/projectMaterials.component.php"><i class="fa fa-graduation-cap fa-fw"></i> PROJECT MATERIALS</a></li>
        <li class="searchContainer" id = 'searchContainer'>
            <form action="/cse1to4/searchResult/showSearchResult.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <?php

        ?>
        <?php
            if(isset($_SESSION['username'])) {
        ?>
        <li class="mainOption">
            <a href="/cse1to4/discussionBoard/discussionBoard.php" class="firstLevel" title="Discussion Board">
                <i class="fa fa-comments"></i>
            </a>
        </li>
        <li class="mainOption hasSubs">
            <a href="javascript:void(0);" class="firstLevel" onclick="showUserDiv()" title="<?php //echo $_SESSION['username']; ?>">
                <i class="fa fa-user"></i>
                <ul class="dropDown" id = 'profile'>
                    <li style="max-width: 100%; max-height: 50%;border-bottom:0px solid blue;">
                        <img src="/cse1to4/icons/user.png" style="width: 50px; height: 50px;">
                        <div style="width: 100%;padding: 5px; font-size: 20px;color:#0099cc;"><?php echo getName($_SESSION['username'],$conn); ?></div>
                    </li>
                    <li style="max-width: 100%;max-height:50%;border-top:0px solid blue;">
                        <div style="width: 100%;padding: 5px; font-size: 20px;color:white;background: #199dbfff" onclick="location.href='/cse1to4/edit_profile_options.php'">EDIT PROFILE</div>

                        <div style="width: 100%;padding: 5px; font-size: 20px;color:white;background: #36cc5dff" onclick="location.href='/cse1to4/uploadingContent/uploadingContent.component.php'">CONTRIBUTE</div>

                        <div style="width: 100%;padding: 5px; font-size: 20px;color:white;background: red" onclick = "location.href='/cse1to4/logout.php'">LOG OUT</div>
                    </li>
                </ul>
            </a>
        </li>
        <?php
            }
            else {
        ?>
        <li class="mainOption" id = 'signIn' style="/*float: right;*/"><a class="firstLevel" href="/cse1to4/cse1to4_login.php"><i class="fa fa-sign-in fa-fw"></i> SIGN IN</a></li>
        <li class="mainOption" id = 'signUp' style="/*float: right;*/"><a class="firstLevel" href="/cse1to4/cse1to4_signup.php"><i class="fa fa-edit fa-fw"></i> SIGN UP</a></li>
        <?php
            }
        ?>
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