<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		$conn=db_connect();
		$sql="SELECT MAX(discussion_id) AS discussion_id FROM discussion";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$discussion_id=$row['discussion_id']+1;

		$info = "";
		$_SESSION['username'] = 'masudur_rahman';
		if(isset($_SESSION['info'])){
			$info=$_SESSION['info'];
			$_SESSION['info'] = "";

		}
	?>
	<title>Upload Content Materials...</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<link rel="stylesheet" type="text/css" href="uploadingContent.component.css">
	<link rel="stylesheet" type="text/css" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="uploadingContent.component.js"></script>
	<script>
		var discussion_id=<?php echo $discussion_id; ?>;
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
					<div class="leftPart w3-col">
						<legend class="namNai">Title :</legend>
						<input type="text" name="title" id="title" minlength="1" placeholder="Title of the Material" required="">
						<br>
						<label class="legend namNai">Description :</label>
						<textarea style="height: 106px; width: 625px;" cols="87" id="description" name="description"></textarea>
				        <legend class="namNai">Content Materials :</legend>
				        <input type="file" name="contents" id="contents" multiple="10" name="contents" placeholder="Upload Contents" value="Browse Files" required="" title="">
				    </div>
				    <div class="rightPart w3-col">
				    	<?php $requestID='nothing'; if(isset($_POST['requestID'])) $requestID=$_POST['requestID']; ?>
				    	<input type="hidden" id="requestID" value="<?php echo $requestID; ?>">
				    	<label class="level-term">Level :</label>
				    	<?php if(isset($_POST['level'])){ ?>
				    		<select id="level" disabled>
				    			<option selected="" value="<?php echo $_POST['level']; ?>">
				    				<?php echo $_POST['level']; ?>
				    			</option>
				    		</select>
				    	<?php }
				    	else{ ?>
							<select id="level">
								<option value="Level-1">Level-1</option>
								<option value="Level-2">Level-2</option>
								<option value="Level-3">Level-3</option>
								<option value="Level-4">Level-4</option>
							</select>
						<?php } ?>
						<br>
						<label class="level-term">Term &nbsp;:</label>
						<?php if(isset($_POST['term'])){ ?>
							<select id="term" disabled>
								<option selected="" value="<?php echo $_POST['term']; ?>">
									<?php echo $_POST['term']; ?>
								</option>
							</select>
						<?php }
						else{ ?>
							<select id="term">
								<option value="Term-I">Term-I</option>
								<option value="Term-II">Term-II</option>
							</select>
						<?php } ?>
						<br><br>
						<legend class="courseNo">Course No: </legend>
						<input id="courseNo" title="" pattern="[a-zA-Z]+-[0-9]{3}" minlength="4" type="text" class="courseField" name="courseNo" placeholder="i.e.: CSE-434" value="<?php if(isset($_POST['courseNo'])) echo $_POST['courseNo']; ?>" required="">
						<br>
						<legend class="courseNo" style="margin-right: 72px;">Tags:</legend>
						<input pattern="[a-zA-Z,-.]+" type="text" id="tags" name="tags" class="tags" placeholder="i.e.: machine-learning,cnn">
						<i class="fa fa-question-circle" title="Separate tags using (,) & Use (-) to separate words in a single tag." style="font-size: 20px"></i>
						<!-- <input type="submit" name="addTag" id="addTag" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1"/>
						<div id="showTags" style="margin-left: 170px;">
							
						</div> -->
				    </div>
				</div>
			    <center>
			    	<!-- <input type="submit" name="submit" id="submit" disabled="true"> -->
				    <input type="submit" name="submit" id="upload" value="Upload">
				</center>
				<div id="divFiles" style="margin-top: 10px; display: none;">
					
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="placeForAdd">
		<legend>Goto <a href="../discussionBoard/discussionBoard.php">Discussion Board</a></legend>
		<legend>Goto <a href="../requestContent/requestContent.php">Requested Contents</a></legend>
		<legend>Wanna contribute ? Click <a href="../uploadingContent/uploadingContent.component.php">Here</a></legend>
		<legend>Wanna say something ? Click <a href="uploadingContent.generalPost.php">Here</a></legend>
		<legend><a href="../requestContent/requestContent.component.php">Request</a> for Contents</legend>
	</div>
	<br><br>
</body>
