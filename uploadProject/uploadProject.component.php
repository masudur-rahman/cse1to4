<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		$conn=db_connect();

		$info = "";
		if(!isset($_SESSION['username'])) {
			$_SESSION['info']="<script type='text/javascript'>$.notify('Please Login first..','info')</script>";
			header('location: /cse1to4/cse1to4_login.php');
			exit();
		}
		if(isset($_SESSION['info'])){
			$info=$_SESSION['info'];
			$_SESSION['info'] = "";

		}
	?>
	<title>Upload Project Materials...</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<link rel="stylesheet" type="text/css" href="uploadProject.component.css">
	<link rel="stylesheet" type="text/css" href="../css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="uploadProject.component.js"></script>

	<!-- for showing tooltips -->
    <link rel="stylesheet" href="../Styles/css/jquery-ui.css">
    <script src="../Styles/js/jquery-ui.js"></script>
    <script>
        $( function() {
            $( document ).tooltip();
        } );
    </script>
</head>

<body>
	<?php
		include('../NavigationBar/navBar.component.php');
		echo $info;
		//echo $_SESSION['description'];
	?>
	<div class="uploadingComponent">
		<div class="uploadingComponentInner">
			<div class="uploadDivision w3-row">
				<form action="javascript:void(0);" id="uploader">
				<div class="w3-col">
						<legend class="namNai">Project / Thesis Title :</legend>
						<input type="text" name="title" id="title" minlength="1" placeholder="Title of the Material" required="">
						<div class="ui-widget">
							<legend class="namNai">Supervisor Name :</legend>
							<input type="text" name="supervisor" id="supervisor" minlength="1" placeholder="Supervisor Name" required>
							<legend class="namNai">Field :</legend>
							<input type="text" name="field" id="field" minlength="1" placeholder="Field of the Project / Thesis" required="">
						</div>
						<br><br>
						<div class="reportLeft">
							<legend class="namNai">Proposal Presentation :</legend>
				        	<input type="file" name="proposalPresentation" id="proposalPresentation" placeholder="Upload Contents" value="Browse Files"accept=".pptx, .ppt" required>

				        	<legend class="namNai">Final Presentation :</legend>
				        	<input type="file" name="finalPresentation" id="finalPresentation" placeholder="Upload Contents" value="Browse Files" accept=".pptx, .ppt" required="">
						</div>
				        <div class="reportRight">
				        	<legend class="namNai">Proposal Report :</legend>
				        	<input type="file" name="proposalReport" id="proposalReport" placeholder="Upload Contents" value="Browse Files" accept=".pdf" required="">
				        	<legend class="namNai">Final Report :</legend>
				        	<input type="file" name="finalReport" id="finalReport" placeholder="Upload Contents" value="Browse Files" accept=".pdf" required="">
				        </div>
				        <div style="margin-top: 200px;">
							<label class="legend namNai">Description :</label>
							<textarea style="height: 106px; width: 625px;" cols="87" id="description" name="description"></textarea>
				    	</div>
				</div>
			    <div style="width: 57%; float: left;">
			    	<!-- <input type="submit" name="submit" id="submit" disabled="true"> -->
				    <input type="submit" name="submit" id="upload" value="Upload" style="float: right;">
				</div>
				<div style="width: 35%; padding: 20px; float: left;">
					<label id="upStatus" style="font-size: 110%; margin-left: 100px;"></label>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php include('../discussionBoard/placeForAdd.php'); ?>
	<br><br>

</body>
