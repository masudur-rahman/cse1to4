<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project Materials</title>

    <!-- INITIAL-->
    <link rel="stylesheet" type="text/css" href="projectMaterials.component.css">
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src = "../Styles/js/tether.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- NAVBAR CSS -->
    <link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">

    <!-- SIDENAV -->
    <link rel="stylesheet" type="text/css" href="SideNav/sideNav.component.css">

    <!-- TOPNAV -->
    <link rel="stylesheet" type="text/css" href="TopNav/topNav.component.css">

    <!--SHOW PROJECTS -->
    <link rel="stylesheet" type="text/css" href="ShowProjects/showProjects.component.css">

    <!-- for Pagination -->
    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src = "../Styles/js/tether.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/bootstrap.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/jquery.twbsPagination.js" type="text/javascript"></script>

    <!-- for project materials -->
    <link rel="stylesheet" type="text/css" href="ShowProjects/Projects/project.component.css">

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
    <?php include("../NavigationBar/navBar.component.php"); ?>
    <?php include("TopNav/topNav.component.php"); //FOR FILTERING BY TAGS ?>
    <?php include("SideNav/sideNav.component.php"); //FOR SHOWING TECHERS NAME ?>
    <?php include("ShowProjects/showProjects.component.php"); //FOR SHOWING PROJECTS ?>
</body>

</html>
