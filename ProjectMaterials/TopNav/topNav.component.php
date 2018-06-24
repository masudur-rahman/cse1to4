<?php
    include("../Database/databaseConnect.php");
    include("../Database/getProjectTopics.php");

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

    //FOR SELECTED TOPIC DO THE FOLLOWING

    $(function() {
        $('.topicTitle').click(function() {
            $(this).siblings('li').removeClass('activeTopic');
            $(this).addClass('activeTopic');

            topicTitle = $(this).text();
            topicID = $(this).attr('id').substr(5);

            //DESTROY PREVIOUS PAGINATION
            if($('.pagination').data("twbs-pagination")){
                $('.pagination').twbsPagination('destroy');
            }
            var obj = $('#pagination').twbsPagination({          //Create Pagination
                    totalPages: 3,
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
                         $('#showItems').html("<div class='sk-folding-cube'><div class='sk-cube1 sk-cube'></div><div class='sk-cube2 sk-cube'></div><div class='sk-cube4 sk-cube'></div><div class='sk-cube3 sk-cube'></div></div><p>Please Wait...</p>");

                        // GET THE DATA TO BE DISPLAYED
                        /*$.ajax({
                        type : 'POST',
                        url  : 'Pagination/getdata.php',
                        data : {
                            pageNo : page,
                            data: jsonString
                        },
                        success : function(data)
                            {
                                  $("#showItems").html(data);
                            }
                        });*/

                        $('#showProjects').text('Showing page '+page+' of ' + topicTitle + '(' + topicID + ')' + ' Projects under ' + teacherName + '('+ teacherID + ')');
                    }
                });
                console.info(obj.data());
        });
    });
</script>