<?php
    $page = $_POST['pageNo'];

    include('../ShowItem/showItem.component.php');

    //FETCH CONTENTS FROM JSON DATA
    $json_a = json_decode(stripslashes($_POST['data']),true);

    $rt = "";
    if(empty($json_a)){
        $rt.="<h3>Ooopsss, it seems that you are studying too much...</h3>";
    }
    else{
        $start = ($page-1)*10;
        $end = $start+9;
        for($iter = $start; $iter< min(count($json_a),$end+1); $iter++){
            $rt.= returnItem($json_a[$iter]['title'],$json_a[$iter]['discuss'], $json_a[$iter]['user_id'], $json_a[$iter]['rating'], $json_a[$iter]['tags'], $json_a[$iter]['url'], $json_a[$iter]['format'], $json_a[$iter]['dateTime']);
        }
    }

    for($iter = 1; $iter<=100000000; $iter++){

    }
    echo $rt;
?>