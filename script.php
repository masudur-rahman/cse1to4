<?php
    include("Database/databaseConnect.php");
    $riter = 801;
    for($iter = 85; $iter<=110; $iter++){
        $sql = "INSERT INTO Project_Download
        VALUES ($iter, 'skab', NOW())";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $riter++;
    }

    $conn->close();
?>