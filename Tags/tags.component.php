<?php
    function tags($tag) {
        $rt="";
        for ($iter = 0; $iter<count($tag) ; $iter++){
            $rt.= "<a href = '' class = 'tgs' title='".$tag[$iter]."'>".$tag[$iter]."</a>";
        }
        return $rt;
    }
?>