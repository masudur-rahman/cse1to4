<?php
    include("databaseConnect.php");
    $item = $_POST['itemId'];
    $user = $_POST['userId'];
    $rate = $_POST['rating'];

    $sqltmp = "SELECT * FROM `Rating` WHERE material_id = $item AND user_id = '$user'";
    $result = $conn->query($sqltmp);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $ratingId = $row['rating_id'];
        $sql = "DELETE FROM Rating WHERE rating_id= $ratingId";
        $result1 = $conn->query($sql);
    }
    $sql = "INSERT INTO Rating
    VALUES ('',$item, '$user', $rate)";
    $conn->query($sql);
?>