<?php
    function item_tags($itemId, $conn){
        $sql = "SELECT *\n"

                . "FROM Items_Tags\n"

                . "INNER JOIN Tags\n"

                . "ON Items_Tags.tag_id=Tags.tag_id\n"

                . "WHERE Items_Tags.material_id = $itemId";

        $result = $conn->query($sql);
        $tags = array();
        if(mysqli_num_rows($result) > 0){
            while($row = $result->fetch_assoc()){
                array_push($tags, $row['tag_title']);
            }
        }
        return $tags;
    }
?>