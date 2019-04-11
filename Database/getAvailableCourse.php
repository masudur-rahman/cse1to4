<?php
    include('databaseConnect.php');

    $sql = "SELECT * FROM Courses";

    $result = $conn->query($sql);

    $json_array = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($json_array, $row['course_id']);
        }
    }

    $json_data = json_encode($json_array);
    echo $json_data;

?>