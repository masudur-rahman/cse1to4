<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}

		$info = "";
		$_SESSION['username'] = 'masudur_rahman';
		if(isset($_SESSION['info'])){
			$info=$_SESSION['info'];
			$_SESSION['info'] = "";

		}
	?>
	<title>Request for Content Materials...</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<link rel="stylesheet" type="text/css" href="requestContent.component.css">
	<link rel="stylesheet" type="text/css" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="requestContent.component.js"></script>
</head>

<body>
	<?php
		include('../NavigationBar/navBar.component.php');
		echo $info;
	?>
	<div class="requestContent">
		<div class="requestContentInner">
			<div class="uploadDivision w3-row">
				<form action="javascript:void(0);" id="uploader">
				<div class="w3-col">
					<div class="leftPart w3-col">
						<legend class="namNai">Title :</legend>
						<input type="text" name="title" id="title" minlength="1" placeholder="Title of the Material" required="">
						<br>
						<label class="legend namNai">Description :</label>
						<textarea style="height: 106px; width: 625px;" cols="87" id="description" name="description"></textarea>
				    </div>
				    <div class="rightPart w3-col">
				    	<label class="level-term">Level :</label>
						<select id="level">
							<option value="Level-1">Level-1</option>
							<option value="Level-2">Level-2</option>
							<option value="Level-3">Level-3</option>
							<option value="Level-4">Level-4</option>
						</select>
						<br>
						<label class="level-term">Term &nbsp;:</label>
						<select id="term">
							<option value="Term-I">Term-I</option>
							<option value="Term-II">Term-II</option>
						</select>
						<br><br>
						<legend class="courseNo">Course No: </legend>
						<input id="courseNo" title="" pattern="[a-zA-Z]+-[0-9]{3}" minlength="4" type="text" class="courseField" name="courseNo" placeholder="i.e.: CSE-101" required="">
						<br>
				    </div>
				</div>
			    <center>
				    <input type="submit" name="submit" id="upload" value="Request">
				</center>
				<div id="divFiles" style="margin-top: 10px; display: none;">
					
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="placeForAdd">
		<legend>Goto <a href="../discussionBoard/discussionBoard.php">Discussion Board</a></legend>
		<legend>Goto <a href="requestContent.php">Requested Contents</a></legend>
		<legend>Wanna contribute ? Click <a href="../uploadingContent/uploadingContent.component.php">Here</a></legend>
		<legend>Wanna say something ? Click <a href="../uploadingContent/uploadingContent.generalPost.php">Here</a></legend>
		<legend><a href="../requestContent.component.php">Request</a> for Contents</legend>
	</div>
	<br><br>
</body>

