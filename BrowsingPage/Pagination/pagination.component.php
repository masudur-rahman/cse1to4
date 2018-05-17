<?php
    //previous button
    if($currentPage==1){
        echo "<a class = 'disable' href=''>&laquo;</a>";
    }
    else{
        $prevPage = $currentPage-1;
        echo "<a href='browsingPage.component.php?page=".$prevPage."'>&laquo;</a>";
    }



    for($iter = $startPageNo; $iter<= $endPageNo; $iter++){
        if($iter == $currentPage){
            echo "<a class = 'active' class = 'disable' href=''>".$iter."</a>";
        }
        else echo "<a href='browsingPage.component.php?page=".$iter."'>".$iter."</a>";
    }


    //next button
    if($currentPage==$totalPageNo){
        echo "<a class = 'disable' href=''>&raquo;</a>";
    }
    else{
        $nextPage = $currentPage+1;
        echo "<a href='browsingPage.component.php?page=".$nextPage."'>&raquo;</a>";
    }
?>