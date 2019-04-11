<!DOCTYPE html>
<?php
    ob_start();
    session_start();

    //TO SELECT WHICH TYPE OF CONTENT WILL BE SHOWN
    if(isset($_GET['folder'])){
        $currentFolder = $_GET['folder'];
        if($currentFolder != 'Book' and $currentFolder != 'LectureSlide' and $currentFolder != 'Note' and $currentFolder != 'QuestionPaper' and $currentFolder != 'SomethingElse') {

            $currentFolder = 'Book';
            $_GET['folder'] = 'Book';

        }
    }
    else $currentFolder = 'Book';

    // TO SELECT THE BATCH FOR WHICH CONTENTS WILL BE SHOWN
    if(isset($_GET['batchSelect'])){
        $_SESSION['batchSelect'] = $_GET['batchSelect'];
    }

    if(isset($_SESSION['batchSelect'])){
        $selectedBatch = $_SESSION['batchSelect'];
    }
    else $selectedBatch = 13;

    // TO SELECT THE COURSE FOR WHICH CONTENTS WILL BE SHOWN
    if(isset($_GET['courseSelect'])){
        $_SESSION['courseSelect'] = $_GET['courseSelect'];
    }

    if(isset($_SESSION['courseSelect'])){
        $selectedCourse = $_SESSION['courseSelect'];
    }
    else $selectedCourse = 'CSE-141';

    //echo $selectedBatch." ".$selectedCourse;

    include("fetchContent.php");
?>

<html>


<head>
    <title>Browsingt Content</title>
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="browsingContent.component.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- comment line -->

    <!-- for Navigation Bar -->
    <link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">

    <!-- for ShowContent component -->
    <link rel="stylesheet" type="text/css" href="ShowContent/showContent.component.css">

    <!-- for Pagination -->
    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src = "../Styles/js/tether.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/bootstrap.min.js" type="text/javascript"></script>
    <!--<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="Pagination/pagination.component.css">
    <script src = "../Styles/js/jquery.twbsPagination.js" type="text/javascript"></script>

    <!-- for Filter Contents -->
    <link rel="stylesheet" type="text/css" href="Filter/filter.component.css">

    <!-- for Item component -->
    <link rel="stylesheet" type="text/css" href="ShowItem/showItem.component.css">

    <!-- for loading animation -->
    <link rel="stylesheet" type="text/css" href="../Loader/loader.component.css">

    <!-- for showing tooltips -->
    <link rel="stylesheet" href="../Styles/css/jquery-ui.css">
    <script src="../Styles/js/jquery-ui.js"></script>
    <script>
        $( function() {
            $( document ).tooltip();
        } );
    </script>
</head>


<body>
    <?php include('../NavigationBar/navBar.component.php'); ?>
    <div class = 'options'>
        <ul id = 'listOptions'>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'Book'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon1'></i><br>
                            <h6 class = 'opTitle'>Books</h6>
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=Book" class = 'inactiveButton'>
                            <i class = 'icon' id = 'icon1'></i><br>
                            <h6 class = 'opTitle'>Books</h6>
                        </a>
                <?php
                    } ?>

            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'LectureSlide'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon2'></i><br>

                            <h6 class = 'opTitle'>Lecture Slides</h6>
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=LectureSlide" class = 'inactiveButton'>
                            <i class = 'icon' id = 'icon2'></i><br>

                            <h6 class = 'opTitle'>Lecture Slides</h6>
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'Note'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon3'></i><br>

                            <h6 class = 'opTitle'>Notes</h6>
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=Note" class = 'inactiveButton'>
                            <i class = 'icon' id = 'icon3'></i><br>

                            <h6 class = 'opTitle'>Notes</h6>
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'QuestionPaper'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon4'></i><br>
                            <h6 class = 'opTitle'>Question Papers</h6>
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=QuestionPaper" class = 'inactiveButton'>
                            <i class = 'icon' id = 'icon4'></i><br>

                            <h6 class = 'opTitle'>Question Papers</h6>
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'SomethingElse'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon5'></i><br>

                            <h6 class = 'opTitle'>Something Else</h6>
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=SomethingElse" class = 'inactiveButton'>
                            <i class = 'icon' id = 'icon5'></i><br>

                            <h6 class = 'opTitle'>Something Else</h6>
                        </a>
                <?php
                    } ?>
            </li>


        </ul>
    </div>

    <?php include("Filter/filter.component.php"); ?>

    <?php include('ShowContent/showContent.component.php'); ?>

</body>


</html>