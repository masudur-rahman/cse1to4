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
                $showBatchItem = $chosenBatch;
                include('ShowBatch/showBatch.component.php');
            }
        ?>
    </div>
</div>