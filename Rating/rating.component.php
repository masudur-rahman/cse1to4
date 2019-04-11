<?php
    function rating($num) {
        $rt="";
        for ($iter = 1; $iter<=5 ; $iter++){
            if($iter <= $num){
                $rt.="<span class='fa fa-star checked stars' id = 'star{$iter}'></span>";
            }
            else $rt.="<span class='fa fa-star stars' id = 'star{$iter}'></span>";
        }
        return $rt;
    }

    function ratingItem($item, $num) {
        $rt="";
        for ($iter = 1; $iter<=5 ; $iter++){
            if($iter <= $num){
                $rt.="<span class='fa fa-star checked stars' id = '{$item}star{$iter}'></span>";
            }
            else $rt.="<span class='fa fa-star stars' id = '{$item}star{$iter}'></span>";
        }
        return $rt;
    }
?>