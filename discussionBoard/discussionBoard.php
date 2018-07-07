<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		if(!isset($_SESSION['username'])) {
			$_SESSION['info']="<script type='text/javascript'>$.notify('Please Login first..','info')</script>";
			header('location: /cse1to4/cse1to4_login.php');
			exit();
		}
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}

		$username=$_SESSION['username'];
		$msg="";
		if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			$_SESSION['msg']="";
		}
	?>
	<title>Discussion Board</title>
	<link rel="icon" href="../icons/CUET_logo.png">
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="discussionBoard.css">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
    <?php require_once('discussionBoard.fetchDBinfo.php'); ?>
</head>

</script>
<body>
	<?php echo $msg; ?>
	<?php require('../NavigationBar/navBar.component.php'); ?>
	<div class="discussionBoardOuter">
		<div class="discussionBoardInner">
			<div class="discussionBoard">
				<?php $discussionBoard=fetchAllDiscussion(); ?>
				<?php while($singleDiscuss=$discussionBoard->fetch_assoc()){?>
					<?php $commentInfo=fetchComments($singleDiscuss['discussion_id']); ?>
					<div class="singleDiscussion" onclick="location.href='<?php echo "discussionBoard.component.php?postNo=".$singleDiscuss["discussion_id"]; ?>'">
						<!-- <a href="hello.com" style="display: block; height: 100%; width: 100px;"> </a> -->
						<div class="discussionTitle">
							<?php echo $singleDiscuss['title']; ?>
						</div>
						<hr class="line">
						<div class="discussionInfo">
							<label>by <a href="../user/<?php echo $singleDiscuss['who']; ?>" class="userName"><?php echo $singleDiscuss['who']; ?></a></label>
							<a class="divider"></a>
							<label style="font-size: 90%; color: white;"><?php showTime($singleDiscuss['time']); ?></label>
							<a class="divider"></a>
							<label><?php echo $commentInfo->num_rows; ?> Comments</label>
							<?php if($singleDiscuss['tag3']){?>
								<label class="tags" style="float: right;" title="Tags"><?php echo $singleDiscuss['tag3']; ?></label>
								<a class="divider" style="float: right;"></a>
							<?php }?>
							<?php if($singleDiscuss['tag2']){?>
								<label class="tags" style="float: right;" title="Tags" title="Tags"><?php echo $singleDiscuss['tag2']; ?></label>
								<a class="divider" style="float: right;"></a>
							<?php }?>
							<?php if($singleDiscuss['tag1']){?>
								<label class="tags" style="float: right;" title="Tags" title="Tags"><?php echo $singleDiscuss['tag1']; ?></label>
							<?php }?>
							<?php if($singleDiscuss['tag1']==null){ ?>
								<label class="tags" style="float: right;" title="Tags">No Tag provided</label>
							<?php }?>
						</div>
						<br>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php include('../discussionBoard/placeForAdd.php'); ?>
</body>
