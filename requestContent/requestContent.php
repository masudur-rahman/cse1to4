<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		if(!isset($_SESSION['username'])) {
			$_SESSION['info']="<script type='text/javascript'>$.notify('Please Login first..','info')</script>";
			header('location: /cse1to4/cse1to4_login.php');
			exit();
		}
		$username=$_SESSION['username'];
		$msg="";
		if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			$_SESSION['msg']="";
		}
	?>
	<title>Requested Contents</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="requestContent.css">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
    <?php require_once('requestContent.fetchDBinfo.php'); ?>
</head>

</script>
<body>
	<?php echo $msg; ?>
	<?php require('../NavigationBar/navBar.component.php'); ?>
	<div class="requestContentOuter">
		<div class="requestContentInner">
			<div class="requestContent">
				<?php $requestContent=fetchAllRequests(); ?>
				<?php while($singleRequest=$requestContent->fetch_assoc()){?>
					<?php $commentInfo=fetchComments($singleRequest['request_id']); ?>
					<div class="singleRequest" onclick="location.href='<?php echo "requestContent.show.php?requestNo=".$singleRequest["request_id"]; ?>'">
						<!-- <a href="hello.com" style="display: block; height: 100%; width: 100px;"> </a> -->
						<div class="requestTitle">
							<?php echo $singleRequest['title']; ?>
						</div>
						<hr class="line">
						<div class="requestInfo">
							<label>by <a href="#" class="userName"><?php echo $singleRequest['who']; ?></a></label>
							<a class="divider"></a>
							<label style="font-size: 90%; color: gray;"><?php showTime($singleRequest['time']); ?></label>
							<a class="divider"></a>
							<label style="font-style: italic; color: blue;"><?php echo $singleRequest['done']; ?></label>
							<label style="float: right;" title="Level & Term" id="levelTerm"><?php echo $singleRequest['term']; ?></label>
							<label style="float: right;" id="levelTerm"><?php echo $singleRequest['level']; ?></label>
							<a class="divider" style="float: right;"></a>
							<label style="float: right;" id="courseNmbr" title="Course Number"><?php echo $singleRequest['courseNo']; ?></label>
						</div>
						<br>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php include('../discussionBoard/placeForAdd.php'); ?>
</body>
