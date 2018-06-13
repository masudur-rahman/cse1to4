<?php
    $courseBefore = array(
        array(
            array("CSE-141", "ME-143", "Math-141", "Phy-141", "Hum=141"),
            array("CSE-143", "EE-181", "Math-143", "Chem-141", "Hum-143")
        )
    );

    function showBatches ($showBatchItem, $term, $courseBefore, $level) {
        $showBatchItem = sprintf("%02d", $showBatchItem);
        $ans = "";
        for($iter = 0; $iter < count($courseBefore[$level-1][$term]); $iter++) {
            $ans.="<li class = 'items'>
                <a href='../BrowsingContent/browsingContent.component.php?batchSelect={$showBatchItem}&courseSelect={$courseBefore[$level-1][$term][$iter]}'>{$courseBefore[$level-1][$term][$iter]}</a>
            </li>";
        }

        $rt="
        <ul class = 'itemShow'>
            <div class = 'itemHeading'>
                <i class='fa fa-book'></i>
                <h3>Batch {$showBatchItem}</h3>
            </div>".$ans."

        </ul>
        ";
        return $rt;
    }

    $currentPage = $_POST['pageNo'];
    $totalPageNo = $_POST['totPage'];
    $startBatch = $_POST['startBatch'];
    $endBatch = $_POST['endBatch'];

    $rt = "";

    $pageNoPerPage = 6;
    $batchNoPerPage = 6;
    $calcDivPage = ($currentPage+($pageNoPerPage-1))/$pageNoPerPage;
    $calcDivPage = floor($calcDivPage);
    $startPageNo = ($calcDivPage-1)*$pageNoPerPage+1;
    $endPageNo = min($totalPageNo, $startPageNo+$pageNoPerPage-1);

    $currentStartBatch = $startBatch-($currentPage-1)*$batchNoPerPage;
    $currentEndBatch = max($endBatch, $currentStartBatch-$batchNoPerPage+1);

    for($batchIter = $currentStartBatch; $batchIter >= $currentEndBatch; $batchIter--){
        $rt.=showBatches($batchIter, 1, $courseBefore, 1);
    }
    echo $rt;
?>