<?php

    include('databaseConnect.php');

    $sql = "SELECT * FROM Supervisers";

    $result = $conn->query($sql);

    $json_array = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($json_array, $row['name']);
        }
    }

    $json_data = json_encode($json_array);
    echo $json_data;
?>