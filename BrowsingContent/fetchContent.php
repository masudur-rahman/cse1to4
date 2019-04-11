<?php
    include("../Database/databaseConnect.php");
    include("../Database/getMaterial.services.php");
    include("../Database/getRating.component.php");
    include("../Database/getTags.services.php");

    //SELECT WHICH TYPE OF CONTENT TO BE FETCHED FROM DATABASE
    if($currentFolder == 'Book') $type = 'book';
    else if($currentFolder == 'LectureSlide') $type = 'lecture_slide';
    else if($currentFolder == 'Note') $type = 'note';
    else if($currentFolder == 'QuestionPaper') $type = 'question';
    else $type = 'other';

    //FETCH THE CONTENTS FROM DATABASE
    $result_material = getMaterial("*", "Course_Materials.batch_id = {$selectedBatch} AND Course_Materials.course_id = '{$selectedCourse}' AND Materials.type = '{$type}'", $conn);
    $jsondata = array();

    //SEPARATE THE FETCHED DATA INTO MULTIPLE ARRAYS
    if($result_material->num_rows > 0){
        while($row = $result_material->fetch_assoc()) {

            $jsondatalittle = array(
                'material_id' => $row['material_id'],
                'user_id' => $row['user_id'],
                'title' => $row['title'],
                'url' => $row['url'],
                'rating' => item_rating($row['material_id'], $conn),
                'tags' =>   item_tags($row['material_id'], $conn),
                'format' => $row['format'],
                'dateTime' => $row['date_and_time'],
                'discuss' => $row['discussion_id']
            );

            array_push($jsondata, $jsondatalittle);
        }
    }

    //ENCODE INTO JSON DATA
    $result_data = json_encode($jsondata);


    //FOR GETTING THE RATINGS
?>