<!DOCTYPE html>
<html>
<head>
    <title>Testing</title>

    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>

</head>

<?php
    $ar = array('haa','huha','hih');
    $json_code = json_encode($ar);
?>
<script type="text/javascript">
    $( function() {
        $('#show').html('<p>haha</p>');
        var jsonString = JSON.stringify(<?php echo $json_code; ?>);
        $.ajax({
            type: 'POST',
            url: 'testing.php',
            data: {
                data: jsonString
            },
            dataType: 'json',
            success : function(datareturn)
            {
                alert(datareturn);
                jsonString = JSON.stringify(datareturn);
                $('#show').html(datareturn);
                    $.ajax({
                    type: 'POST',
                    url: 'testinggg.php',
                    data: {
                        data: jsonString
                    },
                    success : function(datab)
                    {
                        alert(datab);
                        $('#show').html(datab);

                    }
                });
            }
        });
    } );
</script>
<body>
<div id = 'show'>
</div>
</body>
</html>