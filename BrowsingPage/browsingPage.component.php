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
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="browsingPage.component.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- for Navbar -->
    <link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">

	<!-- for batchShow -->
	<link rel="stylesheet" type="text/css" href="ShowBatch/showBatch.component.css"	>

	<!-- for BatchSearch -->
	<link rel="stylesheet" type="text/css" href="BatchSearch/batchSearch.component.css">
	<!--<script type="text/javascript" src="BatchSearch/batchSearch.component.js"></script>-->

	<!-- for Pagination -->
    <script src = "../Styles/js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src = "../Styles/js/tether.min.js" type="text/javascript"></script>
    <script src = "../Styles/js/bootstrap.min.js" type="text/javascript"></script>
    <!--<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="Pagination/pagination.component.css">
    <script src = "../Styles/js/jquery.twbsPagination.js" type="text/javascript"></script>
</head>


<body>
	<!--<div class="se-pre-con"></div>--> 								<!--For loader animation -->
    <?php include("../NavigationBar/navBar.component.php"); ?>

	<?php include('BatchSearch/batchSearch.component.php'); ?>

	<div class = 'batchShow'>
	</div>
    <?php include("Pagination/pagination.component.php"); ?>
</body>


</html>