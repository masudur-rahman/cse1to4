<?php
    $fetch_json_for_form = $result_data;  // FOR SELECT FORMAT
    $json_a_for_form = json_decode($fetch_json_for_form, true);

    $json_a_formats = array();
    for($iter = 0; $iter<count($json_a_for_form); $iter++){
        array_push($json_a_formats, $json_a_for_form[$iter]['format']);
    }

    $json_a_formats = array_unique($json_a_formats);        //SELECT UNIQUE FORMATS


?>
<div id = 'formField'>
    <form action="filterData.php" method="POST">
        <div class = 'ui-widget' id = 'filterTag'>
            <legend class = 'ttl'>Filter by Tags:</legend>
            <input type="text" name="tag1" placeholder="Enter tag1" class = 'tg' id = 'tg1'>
            <input type="text" name="tag2" placeholder="Enter tag2" class = 'tg' id = 'tg2'>
            <input type="text" name="tag3" placeholder="Enter tag3" id class = 'tg' = 'tg3'>
        </div>
        <div id = 'filterFormat'>
            <legend class = 'ttl'>Filter by file format:</legend>
            <select name = 'selectFormat' class="slct" id='select1'>
                <option value = 'all'>all</option>
            <?php
                for($iter = 0; $iter<count($json_a_formats); $iter++){
                    echo "<option value = '{$json_a_formats[$iter]}'>{$json_a_formats[$iter]}</option>";
                }
            ?>
            </select>
        </div>
        <div id = 'orderByRating'>
            <legend class = 'ttl'>Order by Rating:</legend>
            <select name="rating_order" class="slct" id='select2'>
              <option value="any">NOT SELECTED</option>
              <option value="descending">DESCENDING</option>
              <option value="ascending">ASCENDING</option>
            </select>
        </div>

        <div id = 'orderByDate'>
            <legend class = 'ttl'>Order by Date:</legend>
            <select name="date_order" class="slct" id='select3'>
              <option value="any">NOT SELECTED</option>
              <option value="descending">DESCENDING</option>
              <option value="ascending">ASCENDING</option>
            </select>
        </div>

        <div id = 'submit-button'>
            <button type="submit" class="button"><span>Submit </span></button>
        </div>

    </form>
</div>



<script type="text/javascript">

    $.ajax({                                                         //TO GET TAGs SUGGETION
        type : 'GET',
        url  : '../Database/getAvailableTags.services.php',
        data : '',
        dataType: 'json',
        success : function(data)
            {
                 //alert(data);
                  $( function() {
                    var availableTags = data;
                    //alert(availableTags);
                    $( ".tg" ).autocomplete({
                      source: availableTags
                    });
                } );
            }
    });

    $('form').submit(function(event) {

        var jsonString = JSON.stringify(<?php echo $result_data; ?>);
        $.ajax({
            type        : 'POST',
            url         : 'Filter/filterData.php',
            data        : $(this).serialize()+ '&data=' + jsonString, //PASS PREVIOUS DATA
            dataType : 'json',                    //very very IMPORTANT !!!!!!!!!!!!!!!!
            success : function(data)                //RETURN PROCESSED DATA
            {
                //alert(data);
                if($('.pagination').data("twbs-pagination")){
                    $('.pagination').twbsPagination('destroy');
                }
                var tot; //get the data base result
                var jsonAnotherString = JSON.stringify(data);   //again stringify the

                $.ajax({
                type : 'POST',
                url  : 'Pagination/getNoOfPages.php',
                data : {
                    data: jsonAnotherString    //pass the data to php page to do the calculation
                },
                success : function(data)
                    {
                           tot = data;
                           //alert(tot);

                           $('.pagination').twbsPagination({
                            totalPages: tot,
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
                                    data: jsonAnotherString     //PASS PROCESSED DATA
                                },
                                success : function(data)
                                    {
                                          $("#showItems").html(data);
                                    }
                                });

                                //$('#page-content').text('Page ' + page);
                            }
                        });
                    }
                });
            }
        })

        event.preventDefault();
    });
</script>