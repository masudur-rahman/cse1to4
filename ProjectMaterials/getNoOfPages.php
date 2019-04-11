<?php
    $resultProjects = json_decode(stripslashes($_POST['data']), true);
    $teacherId = $_POST['teacherId'];
    $topicId = $_POST['topicId'];

    $cnt = 0;
    if($teacherId == 0 and $topicId == 0) $cnt = count($resultProjects);
    else if($teacherId == 0) {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['topic_id'] == $topicId) $cnt++;
        }
    }
    else if($topicId == 0) {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['supervisor_id'] == $teacherId) $cnt++;
        }
    }
    else {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['topic_id'] == $topicId and $resultProjects[$iter]['supervisor_id'] == $teacherId) $cnt++;
        }
    }

    if($cnt == 0) echo 1;
    else {
        $totalContent = $cnt;
        $contentPerPage = 12 ;
        $totalPage = ceil(((float)$totalContent)/((float)$contentPerPage));
        $totalPage = (int)$totalPage;
        echo $totalPage;
    }
?>