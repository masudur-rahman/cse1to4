<?php
    function getMaterial ($collumns, $condition, $conn) {
        $sql = "SELECT ".$collumns." FROM Materials WHERE ".$condition;
        //echo $sql;
        $result = $conn->query($sql);
        return $result;
    }
?>