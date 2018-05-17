<?php

?>
<div class = 'showContent'>
     <h2>Showing <?php echo $selectedBatch; ?> Batch's <?php echo $currentFolder; ?>s here....</h2>
     <div class = 'showItems'>
        <?php
            $len = count($contents);
            echo $len;

            for($iter = 0; $iter < $len; $iter++){
                echo $contents[$iter].' ';
            }
        ?>
     </div>
</div>