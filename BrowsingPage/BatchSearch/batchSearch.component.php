<?php
        function showBatches ($showBatchItem, $term, $courseBefore, $level) {
        $showBatchItem = sprintf("%02d", $showBatchItem);
        $ans = "";
        for($iter = 0; $iter < count($courseBefore[$level-1][$term]); $iter++) {
            $ans.="<li class = 'items'>
                <a href='../BrowsingContent/browsingContent.component.php?batchSelect={$showBatchItem}'>{$courseBefore[$level-1][$term][$iter]}</a>
            </li>";
        }

        $rt="
        <ul class = 'itemShow'>
            <div class = 'itemHeading'>
                <i class='material-icons'>library_books</i>
                <h3>Batch {$showBatchItem}</h3>
            </div>".$ans."

        </ul>
        ";
        return $rt;
    }
?>
<div class = 'batchSearch'>
    <p style="color: red">Can not find desired batch?</p>
    <p style="color: #00209F">You can select your desired batch from here ..</p>

   <form action="" method="post">
      <select name="batchChoise">
        <option>Select Batch</option>
        <?php
            for($batchIter = $startBatch; $batchIter >= $endBatch ; $batchIter--){
                echo "<option value=".$batchIter.">".$batchIter." Batch</option>";
            }
        ?>
      </select>
      <br><br>
      <input type="submit" value="Submit" name="submit_btn">
    </form>

    <?php
        $chosenBatch =0;

        if (isset($_POST['submit_btn'])) {
            $chosenBatch = $_POST['batchChoise'];
        }
    ?>
    <br>
    <div id = 'showChoise'>
        <?php
            if($chosenBatch == 0){
            }
            else{
                echo showBatches($chosenBatch, 1, $courseBefore, 1);
            }
        ?>
    </div>
</div>