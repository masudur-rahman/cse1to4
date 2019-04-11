<?php
    function getProjects ($condition, $conn) {
        $sql = "SELECT * FROM Project_Materials INNER JOIN Project_Supervisor ON Project_Materials.material_id = Project_Supervisor.material_id INNER JOIN Project_by_Topic ON Project_Materials.material_id = Project_by_Topic.material_id ".$condition;
        //echo $sql;
        $result = $conn->query($sql);

        $ans = array();
        if($result->num_rows >0) {
            while($row = $result->fetch_assoc()) {
                $resultarray = array(
                    'material_id' => $row['material_id'],
                    'discuss' => $row['discussion_id'],
                    'url' => $row['file_link'],
                    'user_id' => $row['user_id'],
                    'title' => $row['title'],
                    'date_time' => $row['date_time'],
                    'supervisor_id' => $row['supervisor_id'],
                    'topic_id' => $row['topic_id'],
                    'rating' => projectRating($row['material_id'], $conn)
                );

                array_push($ans, $resultarray);
            }
        }
        return $ans;
    }
?>