<?php
    $json_a = json_decode(stripslashes($_POST['data']));
    if(empty($json_a)){
        echo 1;
    }
    else{
        $totalContent = count($json_a);
        $contentPerPage = 10 ;
        $totalPage = ceil(((float)$totalContent)/((float)$contentPerPage));
        $totalPage = (int)$totalPage;
        echo $totalPage;
    }
?>