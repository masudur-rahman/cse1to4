<link rel="stylesheet" type="text/css" href="rateDiv.component.css">
<link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
    include ('../Database/databaseConnect.php');
    include ('../Database/getRating.component.php');
    include ('../Rating/rating.component.php');
    function showRating($itemId, $userId, $conn) {
        $previosRating = item_rating_user($itemId, $userId, $conn);
        return $previosRating;
    }
?>

<div id = 'rating1'>
    <?php
        $rate = showRating(5,'sharif', $conn);
        echo ratingItem(5,$rate);
    ?>
</div>

<script type="text/javascript">
    $(function() {
        $('.stars').mouseover(function() {
            var id =$(this).attr('id')[$(this).attr('id').length-1];
            var iid = $(this).attr('id').substring(0,$(this).attr('id').length-5);
            $(this).siblings('.stars').removeClass('checked');

            for(i = 1 ; i<=5; i++) {
                if(i<=id){
                    $('#'+iid+'star'+i).addClass('checked');
                }
            }
        });
        $('.stars').mouseleave(function() {
            $(this).siblings('.stars').removeClass('checked');
            $(this).removeClass('checked');
           var id = <?php echo showRating(5,'sharif', $conn); ?> ;
           var iid = $(this).attr('id').substring(0,$(this).attr('id').length-5);
           //alert(id);
           for( i = 1; i<=id ; i++) {
                if(i<=id){
                    $('#'+iid+'star'+i).addClass('checked');
                }
           }
        });

        $('.stars').click(function() {
            var newRating = $(this).attr('id')[$(this).attr('id').length-1];
            var iid = $(this).attr('id').substring(0,$(this).attr('id').length-5);
            $.ajax({
            type : 'POST',
            url  : '../Database/insertRating.component.php',
            data : {
                rating: newRating,
                userId: 'sharif',
                itemId: iid
            },
            success : function(data)
                {
                    $('#rating1').html('<b>Successfully Rated..</b>');
                }
            });
        });
    });
</script>