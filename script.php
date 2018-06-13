<?php
    include("Database/databaseConnect.php");
    $riter = 45;
    for($iter = 1; $iter<=4; $iter++){
        $sql = "INSERT INTO Course_Materials
        VALUES (13, 'EE-181', $riter)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $riter++;
    }

    $conn->close();
?>