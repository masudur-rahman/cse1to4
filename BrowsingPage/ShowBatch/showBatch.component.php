<ul class = "itemShow">
    <div class = 'itemHeading'>
        <i class="material-icons">library_books</i>
        <h3>Batch <?php echo sprintf("%02d", $showBatchItem); ?></h3>
    </div>

    <?php
        $iterm = $term;
        /*if($batchIter > 11) {
            $iterm = $term -1;
        }*/
        $len = count($courseBefore[$level-1][$iterm]);
        for($iter = 0; $iter < $len; $iter++){
    ?>
            <li class = 'items'>
                <a <?php echo"href='../BrowsingContent/browsingContent.component.php?batchSelect=".$showBatchItem."'"?>><?php echo $courseBefore[$level-1][$iterm][$iter]; ?></a>
            </li>
    <?php
        }
    ?>
</ul>