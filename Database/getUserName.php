<?php
    include '../Database/databaseConnect.php';

    function getName($name,$conn){
        $sql = "SELECT first_name,last_name FROM user_information WHERE user_name='$name'";
        //echo $sql;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ans = $row['first_name']." ".$row['last_name'];
        if(strlen($ans)>1){
            return $ans;
        }
        else {
            return $name;
        }
    }
?>