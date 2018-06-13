<?php
    //GETS THE MATERAILS FROM DATA BASE
    //JOINS THE COURSE MATERIALS AND MATERIALS TABLES TO GET THE CONTENTS FOR A PARTICULAR BATCH AND COURSE
    // ALSE TAKES THE CONDITIONS FOR THE SQL QUERY

    function getMaterial ($collumns, $condition, $conn) {
        $sql = "SELECT ".$collumns." FROM Course_Materials INNER JOIN Materials ON Course_Materials.material_id = Materials.material_id WHERE ".$condition;
        //echo $sql;
        $result = $conn->query($sql);
        return $result;
    }
?>