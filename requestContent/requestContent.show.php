<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('requestContent.fetchDBinfo.php'); ?>
	<?php
		session_start(); ob_start();
		$_SESSION['username']='masudur_rahman';
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		if(isset($_GET['requestNo'])) $requestNo=$_GET['requestNo'];
		else{
			$_SESSION['msg']="<script type='text/javascript'>$.notify('Invalid Post number...','info')</script>";
			header('Location: requestContent.php');
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
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<link rel="stylesheet" type="text/css" href="requestContent.show.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="requestContent.show.js"></script>
</head>
<body>
	<?php include('../NavigationBar/navBar.component.php'); ?>
	<?php
		echo $msg;

		// database update:
		if(isset($_POST['submitComment'])){
			$conn=db_connect();
			$commentText=$conn->real_escape_string($_POST['commentText']);
			$sql="INSERT INTO comment(discussion_id, what, commenter, comment) VALUES($requestNo, 'request', '$username', '$commentText') ";

			if($conn->query($sql)) $_SESSION['msg']="<script type='text/javascript'>$.notify('Your Comment has been acknowledged...','success')</script>";
			else $_SESSION['msg']="<script type='text/javascript'>$.notify('Oops..! An Error occured...','info')</script>";

			unset($_POST);
			header('Location: requestContent.show.php?requestNo='.$requestNo); exit();
		}

		if(isset($_POST['submitReply'])){
			$conn=db_connect();
			$replyText=$conn->real_escape_string($_POST['replyText']);
			$commentID=$_POST['commentID'];
			$sql="INSERT INTO comment_reply(comment_id, replier, reply) VALUES($commentID, '$username', '$replyText') ";

			if($conn->query($sql)) $_SESSION['msg']="<script type='text/javascript'>$.notify('Your Reply has been acknowledged...','success')</script>";
			else $_SESSION['msg']="<script type='text/javascript'>$.notify('Oops..! An Error occured...','info')</script>";

			unset($_POST);
			header('Location: requestContent.show.php?requestNo='.$requestNo); exit();
		}
	?>
	<div class="requestContent" id="everything">
		<div class="requestContentInner">
		<div class="showParticularRequest">
			<?php $requestInfo=fetchRequestInfo($requestNo); ?>
			<?php if($requestInfo=="nothing"){
				$_SESSION['msg']="<script type='text/javascript'>$.notify('Invalid Post number...','info')</script>";
				header('Location: requestContent.php'); exit();
			}  ?>
			<?php $commentInfo=fetchComments($requestNo); ?>
			<div class="discussionTitle">
				<?php echo $requestInfo['title']; ?>
				<hr>
			</div>
			<div class="discusionDescription">
				<?php echo $requestInfo['description']; ?>
			</div>
			<div class="filesToProvide">
				<form id="postRequest" method="post" action="../uploadingContent/uploadingContent.component.php">
					<input type="hidden" name="level" value="<?php echo($requestInfo['level']) ?>">
					<input type="hidden" name="term" value="<?php echo($requestInfo['term']) ?>">
					<input type="hidden" name="courseNo" value="<?php echo($requestInfo['courseNo']) ?>">
					<input type="hidden" name="requestID" value="<?php echo($requestInfo['request_id']) ?>">

					<input type="button" name="" value="Provide the requested Files" onclick="document.getElementById('postRequest').submit();">
				</form>
			</div>
			<!-- <details>Nothing here...</details> -->
			<hr>
			<div class="discussionInfo w3-row">
				<section class="whosProfile w3-col" style="width: 11%;">
					<img src="../icons/masudur_rahman.jpg" alt="Profile Photo">
				</section>
				<section class="whosControlInfo w3-col" style="width: 88.00%;">
					<div class="controlUp">
						<label>by <a class="userName" href="<?php echo 'user/'.$requestInfo['who']; ?>"><?php echo $requestInfo['who']; ?></a></label>
						<a class="divider"></a>
						<label style="font-size: 90%; color: gray;"><?php showTime($requestInfo['time']); ?></label>
						<a class="divider"></a>
						<label><?php echo $commentInfo->num_rows; ?> Comments</label>
					</div>
					<div class="controlDown">

						<label title="Level & Term" id="levelTerm"><?php echo $requestInfo['term']; ?></label>
						<label id="levelTerm"><?php echo $requestInfo['level']; ?></label>
						<a class="divider"></a>
						<label id="courseNmbr" title="Course Number"><?php echo $requestInfo['courseNo']; ?></label>
						<a class="divider"></a>
						<label style="font-style: italic; color: blue;"><?php echo $requestInfo['done']; ?></label>
					</div>
				</section>
			</div>
		</div>
		<div class="showComments">
			Comments will be here...
			<?php
			while($row=$commentInfo->fetch_assoc()){ ?>
				<div class="commentSection w3-row">
					<section class="profileCmnt w3-col">
						<center>
						<div class="profilePhotoCmnt">
							<img src="../icons/masudur_rahman.jpg" alt="Profile Photo">
						</div>
						</center>
					</section>
					<section class="commentDivider w3-col"></section>
					<?php $identifier="post".$requestNo."comment".$row['comment_id']; ?>
					<section class="commentDiv w3-col">
						<div class="nameTime">
							<a class="userName" href="<?php echo 'user/'.$row['commenter']; ?>"><?php echo $row['commenter']; ?></a>
							<a class="divider"></a>
							<a style="font-size: 90%; color: gray;"><?php showTime($row['time']); ?></a>
						</div>
						<div class="commentReply">
							<?php echo $row['comment']; ?>
						</div>
						<hr class="line">
						<div class="cmntOptions">
							<label id="flag" title="Flag this comment.." onclick="addFlag(flagClick=!flagClick, '<?php echo "#".$identifier; ?>')">Flag</label>
							<a class="divider"></a>
							<label id="reply" onclick="showEditor(rplyClick=!rplyClick, '<?php echo "#".$identifier; ?>')">Reply</label>

						</div>
					</section>
				</div>
				<div class="replySection editor w3-row" id="<?php echo $identifier; ?>" style="display: none;">
					<section class="profileRply w3-col">
						<center>
						<div class="profilePhotoRply">
							<img id="replier" src="../icons/masudur_rahman.jpg" alt="Profile Photo">
						</div>
						</center>
					</section>
					<section class="replyDiv w3-col">
					    <form method="post" action="<?php echo 'requestContent.show.php?requestNo='.$requestNo;?>">
					    	<input type="hidden" name="commentID" value="<?php echo $row['comment_id']; ?>">
					        <textarea name="replyText" style="height: 100px; width: 465px;" id="textArea" class="<?php echo 'text'.$identifier; ?> replySection editor"></textarea>
					        <input type="submit" name="submitReply" value="Reply" >
					    </form>
					</section>
				</div>
				<?php

				$replyInfo=fetchReplies($row['comment_id']);

				while($row1=$replyInfo->fetch_assoc()){ ?>
				<div class="replySection w3-row">
					<section class="profileRply w3-col">
						<center>
						<div class="profilePhotoRply">
							<img id="replier" src="../icons/masudur_rahman.jpg" alt="Profile Photo">
						</div>
						</center>
					</section>
					<section class="replyDivider w3-col"></section>
					<section class="replyDiv w3-col">
						<div class="nameTime">
							<a class="userName" href="#" style="font-size: 170%;"><?php echo $row1['replier']; ?></a>
							<a class="divider"></a>
							<a style="font-size: 90%; color: gray;"><?php showTime($row1['time']); ?></a>
						</div>
						<div class="commentReply">
							<?php echo $row1['reply']; ?>
						</div>
						<hr class="line">
						<div class="replyOptions">
							<label id="flag" title="Flag this comment.." onclick="addFlag(flagClick=!flagClick, '<?php echo "#".$identifier; ?>')">Flag</label>
						</div>
					</section>
				</div>
				<?php } ?>
			<?php } ?>
			<div class="commentSection editor w3-row" id="editor">
				<h3>Add Comment to this post...</h3>
				<section class="profileCmnt w3-col">
					<center>
					<div class="profilePhotoCmnt">
						<img src="../icons/masudur_rahman.jpg" alt="Profile Photo">
					</div>
					</center>
				</section>
				<section class="commentDiv w3-col">
					<form method="post" action="<?php echo 'requestContent.show.php?requestNo='.$requestNo;?>">
						<div id="innerText">
					        <textarea name="commentText" style="height: 100px; width: 465px;" id="textArea" class="replySection editor"></textarea>
					        <input type="submit" id="submitComment" name="submitComment" value="Comment">
					    </div>
				    </form>
			    </section>
			</div>
		</div>
		</div>
	</div>
	<?php include('../discussionBoard/placeForAdd.php'); ?>
</body>
