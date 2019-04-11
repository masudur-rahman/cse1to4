<?php
    session_start();
    ob_start();
    session_destroy();
    header('location: /cse1to4/HomePage/homePage.component.php');
?>