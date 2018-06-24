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
    var teacherName = 'All'+'Teachers';
    var topicTitle = 'All';
    var teacherID = 0;
    var topicID = 0;

    $(function() {
        //Crate default Pagination
        var obj = $('#pagination').twbsPagination({          //Create Pagination
            totalPages: 1,
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

                $('#showProjects').text('Showing page '+page+' of ' + topicTitle + '(' + topicID + ')' + ' Projects under ' + teacherName + '('+ teacherID + ')');
            }
        });
        console.info(obj.data());



        //FOR SELECTED NAME DO THE FOLLOWING
        $('.teacherNames').click(function() {
            $(this).siblings('li').removeClass('activeName');       //ADD SELECTED CLASS TO CLICKED li
            $(this).addClass('activeName');

            //Get teacher name
            teacherName = $(this).text();
            topicTitle = 'All';
            teacherID = $(this).attr('id').substr(7);

            $('#allTopics').siblings('li').removeClass('activeTopic');  //ADD SELECTED CLASS TO ALLTOPICS
            $('#allTopics').addClass('activeTopic');

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
                         $('#showProjects').html("<div class='sk-folding-cube'><div class='sk-cube1 sk-cube'></div><div class='sk-cube2 sk-cube'></div><div class='sk-cube4 sk-cube'></div><div class='sk-cube3 sk-cube'></div></div><p>Please Wait...</p>");

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