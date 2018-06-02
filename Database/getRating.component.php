<?php
    function item_rating($itemId, $conn){
        $sqltmp = "SELECT * FROM `Rating` WHERE material_id = $itemId";
        $result = $conn->query($sqltmp);
        if(mysqli_num_rows($result) > 0){
            $sql2 = "SELECT AVG(rating) avg FROM `Rating` WHERE material_id = $itemId";
            $result = $conn->query($sql2);
            // "result row = ".mysqli_num_rows($result)."<br>";
            $row = $result->fetch_assoc();
            return ((int)ceil($row['avg']));
        }
        else {
            return '0';
        }
    }
?>