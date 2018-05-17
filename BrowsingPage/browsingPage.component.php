<!DOCTYPE html>
<?php
	ob_start();
	session_start();

	$level = 1; $term = 1;
	$showBatchItem;

	//for Pagination
	$startBatch = 22;
	$endBatch = 1;
	$totalBatchNo = $startBatch-$endBatch+1;
	$batchNoPerPage = 6;

	$totalPageNo = ($totalBatchNo+($batchNoPerPage-1))/$batchNoPerPage;
	$totalPageNo = floor($totalPageNo);
    $pageNoPerPage = 6;

    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }
    else $currentPage = 1;


    $calcDivPage = ($currentPage+($pageNoPerPage-1))/$pageNoPerPage;
    $calcDivPage = floor($calcDivPage);
    $startPageNo = ($calcDivPage-1)*$pageNoPerPage+1;
    $endPageNo = min($totalPageNo, $startPageNo+$pageNoPerPage-1);

    $currentStartBatch = $startBatch-($currentPage-1)*$batchNoPerPage;
    $currentEndBatch = max($endBatch, $currentStartBatch-$batchNoPerPage+1);


	include('courses.service.php');
?>

<html>


<head>
	<title>Browsingt Page</title>
	<link rel="stylesheet" type="text/css" href="browsingPage.component.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../Styles/css/lib/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- for batchShow -->
	<link rel="stylesheet" type="text/css" href="ShowBatch/showBatch.component.css"	>

	<!-- for loader animation -->
	<link rel="stylesheet" type="text/css" href="../Loader/loader.component.css">
	<script type="text/javascript" src="../Styles/css/ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script type="text/javascript" src="../Loader/loader.component.js"></script>

	<!-- for BatchSearch -->
	<link rel="stylesheet" type="text/css" href="BatchSearch/batchSearch.component.css">
	<!--<script type="text/javascript" src="BatchSearch/batchSearch.component.js"></script>-->

	<!-- for Pagination -->
	<link rel="stylesheet" type="text/css" href="Pagination/pagination.component.css">
</head>


<body>
	<!--<div class="se-pre-con"></div>--> 								<!--For loader animation -->

	<?php include('BatchSearch/batchSearch.component.php'); ?>

	<div class = 'batchShow'>
		<?php
			for($batchIter = $currentStartBatch; $batchIter >= $currentEndBatch; $batchIter--){
				$showBatchItem = $batchIter;
				include('ShowBatch/showBatch.component.php');
			}
		?>
	</div>
    <div class="pagination">
	    <?php include('Pagination/pagination.component.php'); ?>
    <div>
</body>


</html>