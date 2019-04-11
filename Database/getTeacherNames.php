<?php
    function getTeacherNames($conn){
        $sql = "SELECT * FROM Supervisers";
        $result = $conn->query($sql);
        $teacherNames = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $eachrow = array();
                $eachrow['superviser_id'] = $row['superviser_id'];
                $eachrow['name'] = $row['name'];
                array_push($teacherNames, $eachrow);
            }
        }

        return $teacherNames;
    }
?>