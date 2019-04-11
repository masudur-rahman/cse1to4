<body>
    <script type="text/javascript" src="../cse1to4test/js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../cse1to4test/js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../cse1to4test/js/nicEdit-latest.js"></script>
    <script type="text/javascript">
        /*$(document).ready(function(){
            $("#editor").hide();
        });*/
        //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        bkLib.onDomLoaded(function() {          
            new nicEditor({maxHeight : 200}).panelInstance('textArea');
        });
    </script>
</body>
<div id="editor" style="width: 50vw;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <textarea style="height: 100px;" cols="50" id="textArea">
            
        </textarea>
        <input type="submit" name="submit" value="Reply">
    </form>
</div>