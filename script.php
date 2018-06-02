<?php
    include("Database/databaseConnect.php");
    $riter = 1;
    for($iter = 1; $iter<=49; $iter++){
        $r = rand(1,3);
        for($i = 1; $i<= $r ;$i++){
            $t = rand(1,10);
            $sql = "INSERT INTO Items_Tags
            VALUES ($riter, $iter, $t)";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $riter++;
        }
    }

    $conn->close();
?>