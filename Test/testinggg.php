<?php
    $json = json_decode(stripslashes($_POST['data']),true);
    echo $json[2];
?>