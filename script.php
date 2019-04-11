<?php
    include("Database/databaseConnect.php");
    /*$riter = 801;
    for($iter = 151; $iter<=200; $iter++){
        $sql = "UPDATE Project_Materials set discussion_id = 27 where material_id = $iter";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $riter++;
    }

    $conn->close();*/

    for ($iter=1; $iter < 51; $iter++) {
        include("Database/databaseConnect.php");
        $sql="SELECT * FROM Materials inner join Items_Tags on Materials.material_id=Items_Tags.material_id inner join Tags on Items_Tags.tag_id=Tags.tag_id where Materials.material_id=$iter";
        $rslt=$conn->query($sql);
        $rowCnt=$rslt->num_rows;
        $tag1="Not Provided"; $tag2="Not Provided"; $tag3="Not Provided";
        if($rowCnt>0){
            $row=$rslt->fetch_assoc();
            $tag1 = $row['tag_title'];
        }
        if($rowCnt>1){
            $row=$rslt->fetch_assoc();
            $tag2 = $row['tag_title'];
        }
        if($rowCnt>2){
            $row=$rslt->fetch_assoc();
            $tag3 = $row['tag_title'];
        }
        echo $tag1." ".$tag2." ".$tag3."<br>";
        include("Database/databaseConnect.php");
        $sql="UPDATE Materials set tag1='$tag1', tag2='$tag2', tag3='$tag3' where material_id=$iter";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>