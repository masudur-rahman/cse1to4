<?php
    function rating($num) {
        $rt="";
        for ($iter = 1; $iter<=5 ; $iter++){
            if($iter <= $num){
                $rt.="<span class='fa fa-star checked'></span>";
            }
            else $rt.="<span class='fa fa-star'></span>";
        }
        return $rt;
    }
?>