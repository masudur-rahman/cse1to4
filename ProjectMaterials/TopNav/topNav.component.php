<?php

    include("../Database/databaseConnect.php");
    include("../Database/getProjectTopics.php");
    include('../Database/getProjects.services.php');
    include('../Database/getRating.component.php');

    $resultProjects = getProjects('', $conn); //get the iterms


    /*for($iter = 0 ; $iter<count($resultProjects); $iter++){
        echo $resultProjects[$iter]['rating']." ".$resultProjects[$iter]['supervisor_id']." ".$resultProjects[$iter]['title']."<br>";
    }*/
    $topics = getProjectTopics($conn);  //get topics
?>

<div id = 'topNav'>
    <div id = 'descriptions'>
        <div id = 'hudai'>
            <div id = 'mainHudai'></div>
            <div id = 'filterTeacher'>
                <div>T</div>
                <div>E</div>
                <div>A</div>
                <div>C</div>
                <div>H</div>
                <div>E</div>
                <div>R</div>
                <div>S</div>
            </div>
        </div>
        <div id = 'filterTags'>
            <div>T</div>
            <div>O</div>
            <div>P</div>
            <div>I</div>
            <div>C</div>
            <div>S</div>
        </div>
    </div>
    <div id = 'topics'>
        <ul id = 'topicTitleContainer'>
            <li class= 'topicTitle activeTopic' id = 'topic0'>All</li>
            <?php
                for($iter = 0; $iter<count($topics); $iter++) {
                    echo "<li class='topicTitle' id = 'topic{$topics[$iter]['topic_id']}'>{$topics[$iter]['topic_title']}</li>";
                }
            ?>
        </ul>
    </div>
</div>

<script type="text/javascript">

    $(function() {
        //WHEN TOPIC TITLE IS CLICKED
        $('.topicTitle').click(function() {
            $(this).siblings('li').removeClass('activeTopic');
            $(this).addClass('activeTopic');

            topicTitle = $(this).text();
            topicID = $(this).attr('id').substr(5);

            //DESTROY PREVIOUS PAGINATION
            if($('.pagination').data("twbs-pagination")){
                $('.pagination').twbsPagination('destroy');
            }
            var jsonString = JSON.stringify(<?php echo json_encode($resultProjects); ?>); //get the data base result
            $.ajax({
                type : 'POST',                                               //Get the no
                url  : 'getNoOfPages.php',                       // of pages
                data : {
                    data: jsonString,    //pass the data to php page to do the calculation
                    teacherId: teacherID,
                    topicId: topicID
                },
                success : function(data)
                {
                    var obj = $('#pagination').twbsPagination({          //Create Pagination
                        totalPages: data,
                        visiblePages: 7,
                        cssStyle: '',
                        first: '&laquo;&lsaquo;',
                        prev: '&laquo;',
                        next: '&raquo;',
                        last: '&rsaquo;&raquo;',
                        onInit: function () {
                            // fire first page loading
                        },
                        onPageClick: function (event, page) {
                             $('#showProjects').html("<div class='sk-folding-cube'><div class='sk-cube1 sk-cube'></div><div class='sk-cube2 sk-cube'></div><div class='sk-cube4 sk-cube'></div><div class='sk-cube3 sk-cube'></div></div><p>Please Wait...</p>");

                            // GET THE DATA TO BE DISPLAYED
                            $.ajax({
                            type : 'POST',
                            url  : 'ShowProjects/Projects/project.component.php',
                            data : {
                                pageNo : page,
                                data: jsonString,    //pass the data to php page to do the calculation
                                teacherId: teacherID,
                                topicId: topicID,
                                teacherName: teacherName,
                                topicTitle: topicTitle
                            },
                            success : function(data)
                                {
                                      $("#showProjects").html(data);
                                }
                            });
                        }
                    });
                    console.info(obj.data());
                }
            });
        });
    });
</script>