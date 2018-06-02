<script>
$(function () {
    var jsonString = JSON.stringify(<?php echo $result_data; ?>); //get the data base result
    $.ajax({
        type : 'POST',                                               //Get the no
        url  : 'Pagination/getNoOfPages.php',                       // of pages
        data : {
            data: jsonString    //pass the data to php page to do the calculation
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
                         $('#showItems').html("<div class='sk-folding-cube'><div class='sk-cube1 sk-cube'></div><div class='sk-cube2 sk-cube'></div><div class='sk-cube4 sk-cube'></div><div class='sk-cube3 sk-cube'></div></div><p>Please Wait...</p>");

                        // GET THE DATA TO BE DISPLAYED
                        $.ajax({
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
                        });

                        //$('#page-content').text('Page ' + page);
                    }
                });
                console.info(obj.data());
            }
        });
});
</script>
<div class="container text-xs-center">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm" id="pagination"></ul>
    </nav>
</div>