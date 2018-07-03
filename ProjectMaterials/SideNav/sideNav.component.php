<?php
    include('../Database/databaseConnect.php');
    include('../Database/getTeacherNames.php');

    $teacherNames = getTeacherNames($conn);
?>
<div id="sideNav">
    <ul id="nameContainer">
        <li class="teacherNames activeName" id='teacher0'>All</li>
        <?php
        for($iter = 0; $iter<count($teacherNames); $iter++){
            echo "<li class='teacherNames' id = 'teacher{$teacherNames[$iter]['superviser_id']}'>{$teacherNames[$iter]['name']}</li>";
        }
        ?>
</div>

<script type="text/javascript">
    var teacherName = 'All'+' Teachers';
    var topicTitle = 'All'+' Topics';
    var teacherID = 0;
    var topicID = 0;

    $(function() {
        //Crate default Pagination
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

        //FOR SELECTED NAME DO THE FOLLOWING
        $('.teacherNames').click(function() {

            $(this).siblings('li').removeClass('activeName');       //ADD SELECTED CLASS TO CLICKED li
            $(this).addClass('activeName');

            //Get teacher name
            teacherName = $(this).text();
            topicTitle = 'All'+' Topics';
            teacherID = $(this).attr('id').substr(7);
            topicID = 0;

            $('#topic0').siblings('li').removeClass('activeTopic');  //ADD SELECTED CLASS TO ALLTOPICS
            $('#topic0').addClass('activeTopic');

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