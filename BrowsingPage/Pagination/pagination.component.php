<script type="text/javascript">

$(function () {
     $('#pagination').twbsPagination({
        totalPages: <?php echo $totalPageNo; ?>,
        visiblePages: 6,
        cssStyle: '',
        first: '&laquo;&lsaquo;',
        prev: '&laquo;',
        next: '&raquo;',
        last: '&rsaquo;&raquo;',
        onPageClick: function (event, page) {
            $.ajax({
            type : 'POST',
            url  : 'getBatchData.php',
            data : {
                pageNo : page,
                totPage: <?php echo $totalPageNo; ?> ,
                startBatch: <?php echo $startBatch; ?>,
                endBatch: <?php echo $endBatch; ?>
            },
            success : function(data)
                {
                      $(".batchShow").html(data);
                }
            });
        }
    });
});

</script>

<div class="container text-xs-center">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm" id="pagination"></ul>
    </nav>
</div>