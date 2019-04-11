<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		$conn=db_connect();

		$info = "";if(!isset($_SESSION['username'])) {
			$_SESSION['info']="<script type='text/javascript'>$.notify('Please Login first..','info')</script>";
			header('location: /cse1to4/cse1to4_login.php');
			exit();
		}
		$username=$_SESSION['username'];
		if(isset($_SESSION['info'])){
			$info=$_SESSION['info'];
			$_SESSION['info'] = "";

		}
	?>
	<title>Upload Content Materials...</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<link rel="stylesheet" type="text/css" href="uploadingContent.generalPost.css">
	<link rel="stylesheet" type="text/css" href="../css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="uploadingContent.generalPost.js"></script>
</head>

<body>
	<?php
		include('../NavigationBar/navBar.component.php');
		echo $info;
	?>
	<div class="uploadingComponent">
		<div class="uploadingComponentInner">
			<div class="uploadDivision w3-row">
				<form action="javascript:void(0);" id="uploader">
				<div class="w3-col">
					<div class="leftPart w3-col">
						<legend class="namNai">Title :</legend>
						<input type="text" name="title" id="title" minlength="1" placeholder="Title of the Material" required="">
						<br>
						<label class="legend namNai">Description :</label>
						<textarea style="height: 106px; width: 625px;" id="description" name="description"></textarea>
				    </div>
				    <div class="rightPart w3-col">
						<label class="courseNo" style="margin-right: 72px;">Tags:</label>
						<input pattern="[a-zA-Z,-.]+" type="text" id="tags" name="tags" class="tags" placeholder="i.e.: machine-learning,cnn">
						<i class="fa fa-question-circle" title="Separate tags using (,) & Use (-) to separate words in a single tag." style="font-size: 20px"></i>
						<!-- <input type="submit" name="addTag" id="addTag" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1"/>
						<div id="showTags" style="margin-left: 170px;">

						</div> -->
				    </div>
				</div>
			    <center>
				    <input type="submit" name="submit" id="upload" value="Submit">
				</center>
				</form>
			</div>
		</div>
	</div>
	<?php include('../discussionBoard/placeForAdd.php'); ?>
	<br><br>
</body>
