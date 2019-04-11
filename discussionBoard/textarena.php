<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
<?php
$editorShow=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editorShow=false;
    echo $_POST["editor"];
}
?>
    <?php if($editorShow)?> <script type="text/javascript" src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script><?php ;?>
</head>



<body>
    <div style="visibility: <?php if($editorShow) echo "visible"; else echo "hidden";?>">
        <form name="ckeditor" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <textarea cols="80" id="editor" name="editor" rows="10" >
            </textarea>

            <script>
                CKEDITOR.replace('editor', {
                    height: 260,
                    width: 580,
                } );
            </script>
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>
</body>

</html>