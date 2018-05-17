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

    // FOR GETTING CONTENTS
    include 'contents.services.php';
?>

<html>


<head>
    <title>Browsingt Content</title>
    <link rel="stylesheet" type="text/css" href="browsingContent.component.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/css/lib/w3.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- comment line -->

    <!-- for ShowContent component -->
    <link rel="stylesheet" type="text/css" href="ShowContent/showContent.component.css">

</head>


<body>
    <div class = 'options'>
        <ul id = 'listOptions'>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'Book'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon1'></i><br>
                            Books
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=Book" class = 'btn'>
                            <i class = 'icon' id = 'icon1'></i><br>
                            Books
                        </a>
                <?php
                    } ?>

            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'LectureSlide'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon2'></i><br>
                            Lecture Slides
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=LectureSlide" class = 'btn'>
                            <i class = 'icon' id = 'icon2'></i><br>
                            Lecture Slides
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'Note'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon3'></i><br>
                            Notes
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=Note" class = 'btn'>
                            <i class = 'icon' id = 'icon3'></i><br>
                            Notes
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'QuestionPaper'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon4'></i><br>
                            Question Papers
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=QuestionPaper" class = 'btn'>
                            <i class = 'icon' id = 'icon4'></i><br>
                            Question Papers
                        </a>
                <?php
                    } ?>
            </li>


            <li class = 'option'>
                <?php
                    if($currentFolder == 'SomethingElse'){ ?>
                        <a class = 'activeButton'>
                            <i class = 'activeIcon' id = 'icon5'></i><br>
                            Something Else
                        </a>
                <?php
                    }
                    else { ?>
                        <a href = "browsingContent.component.php?folder=SomethingElse" class = 'btn'>
                            <i class = 'icon' id = 'icon5'></i><br>
                            Something Else
                        </a>
                <?php
                    } ?>
            </li>


        </ul>
    </div>

    <?php include('ShowContent/showContent.component.php'); ?>

</body>


</html>