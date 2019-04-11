<?php
    session_start();
    ob_start();
    $info="";
    if(isset($_SESSION['info'])) {
        $info = $_SESSION['info'];
        $_SESSION['info'] = "";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSE1to4</title>

    <!-- INITIAL -->
    <link rel="stylesheet" type="text/css" href="homePage.component.css">
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src = "../js/notify.js" type="text/javascript"></script>
    <script src = "../Styles/js/tether.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- for showing tooltips -->
    <link rel="stylesheet" href="../Styles/css/jquery-ui.css">
    <script src="../Styles/js/jquery-ui.js"></script>
    <script>
        $( function() {
            $( document ).tooltip();
        } );
    </script>

    <!-- NAVBAR CSS -->
    <link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">

    <!-- Auto Slides -->
    <link rel="stylesheet" type="text/css" href="AutoSlides/autoSlides.component.css">

    <!--MOST DOWNLOADED MATERIALS -->
    <link rel="stylesheet" type="text/css" href="mostDownloadedMaterials/mostDownloadedMaterials.component.css">
</head>
<body>
    <?php include("../NavigationBar/navBar.component.php"); ?>
    <?php echo $info; ?>
    <?php include("AutoSlides/autoSlides.component.php"); ?>
    <?php include("mostDownloadedMaterials/mostDownloadedMaterials.component.php"); ?>
    <?php include("../footer.php"); ?>
</body>
</html>