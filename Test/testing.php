<?php
    $json = json_decode(stripslashes($_POST['data']));
    echo json_encode($json);
?>