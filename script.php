<?php
    include("Database/databaseConnect.php");
    $riter = 801;
    for($iter = 1; $iter<=400; $iter++){
        $rate = rand(1,5);
        $sql = "INSERT INTO Project_Rating
        VALUES ($riter, $iter, 'sharif', $rate)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $riter++;
    }

    $conn->close();
?>