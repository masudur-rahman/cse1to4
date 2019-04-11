<?php
    $resultProjects = json_decode(stripslashes($_POST['data']), true);
    $teacherId = $_POST['teacherId'];
    $topicId = $_POST['topicId'];
    $teacherName = $_POST['teacherName'];
    $topicTitle = $_POST['topicTitle'];
    $page = $_POST['pageNo'];


    //SEPARATE THE PARTICUALR TOPIC AND TEACHERS DATA
    $ans = array();
    if($teacherId == 0 and $topicId == 0) $ans = $resultProjects;
    else if($teacherId == 0) {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['topic_id'] == $topicId) array_push($ans, $resultProjects[$iter]);
        }
    }
    else if($topicId == 0) {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['supervisor_id'] == $teacherId) array_push($ans, $resultProjects[$iter]);
        }
    }
    else {
        for($iter = 0; $iter<count($resultProjects); $iter++) {
            if($resultProjects[$iter]['topic_id'] == $topicId and $resultProjects[$iter]['supervisor_id'] == $teacherId) array_push($ans, $resultProjects[$iter]);
        }
    }


    //RETURN THIS DATA
    $start = ($page-1)*12;
    $end = $start+11;
    $anshtml = "<div id = 'heading'>Showing Project/Thesis works related to <b>{$topicTitle}</b> under <b>{$teacherName}</b></div>";
    for($iter = $start; $iter< min(count($ans),$end+1); $iter++) {
        $anshtml.="
        <div class = 'project' id = 'project{$ans[$iter]['material_id']}' href = ''>
        <a href = '/cse1to4/discussionBoard/discussionBoard.component.php?postNo={$ans[$iter]['discuss']}'>
        <div class = 'projectIcon'>
            <div class = 'iconP'>
            </div>
            <div class = 'projectTitle' title='{$ans[$iter]['title']}'>
                {$ans[$iter]['title']}
            </div>
        </div>
        <div class = 'projectDescription'>
            <div class = 'projectRating'>";

        for($r = 1; $r<=5; $r++) {
            if($r<=$ans[$iter]['rating']){
                $anshtml.="<span class='fa fa-star checked'></span>";
            }
            else {
                $anshtml.="<span class='fa fa-star'></span>";
            }
        }

        //convert date
        $haha = strtotime( $ans[$iter]['date_time'] ); ///keno jani important
        $dateTime = date('d-M-Y', $haha);

        $anshtml.="</div>
                <div class='date'>{$dateTime}</div>
                <div class = 'uploader' title = '{$ans[$iter]['user_id']}'><a href='#'><b>{$ans[$iter]['user_id']}</b></a></div>
            </div>
        </a>
        </div>";
    }

    if(count($ans)==0){
        $anshtml.="<div class = 'oops'>There are no Project/Thesis Materials of such category</div>";
    }
    //FOR DELAY
    for($iter = 0;$iter<=40000000;$iter++){
        $iter++;
        $iter--;
    }

    echo $anshtml;

?>