<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('discussionBoard.fetchDBinfo.php'); ?>
	<?php
		session_start(); ob_start();
		$_SESSION['username']='masudur_rahman';
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		if(isset($_GET['postNo'])) $postNo=$_GET['postNo'];
		else{
			$_SESSION['msg']="<script type='text/javascript'>$.notify('Invalid Post number...','info')</script>";
			header('Location: discussionBoard.php');
			exit();
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<link rel="stylesheet" type="text/css" href="discussionBoard.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="discussionBoard.component.js"></script>
</head>

	<?php include('../NavigationBar/navBar.component.php'); ?>
	<?php
		echo $msg;

		// database update:
		if(isset($_POST['submitComment'])){
			$conn=db_connect();
			$commentText=$conn->real_escape_string($_POST['commentText']);
			$sql="INSERT INTO comment(discussion_id, commenter, comment) VALUES($postNo, '$username', '$commentText') ";
			
			if($conn->query($sql)) $_SESSION['msg']="<script type='text/javascript'>$.notify('Your Comment has been acknowledged...','success')</script>";
			else $_SESSION['msg']="<script type='text/javascript'>$.notify('Oops..! An Error occured...','info')</script>";

			unset($_POST);
			header('Location: discussionBoard.component.php?postNo='.$postNo); exit();
		}

		if(isset($_POST['submitReply'])){
			$conn=db_connect();
			$replyText=$conn->real_escape_string($_POST['replyText']);
			$commentID=$_POST['commentID'];
			$sql="INSERT INTO comment_reply(comment_id, replier, reply) VALUES($commentID, '$username', '$replyText') ";

			if($conn->query($sql)) $_SESSION['msg']="<script type='text/javascript'>$.notify('Your Reply has been acknowledged...','success')</script>";
			else $_SESSION['msg']="<script type='text/javascript'>$.notify('Oops..! An Error occured...','info')</script>";
			
			unset($_POST);
			header('Location: discussionBoard.component.php?postNo='.$postNo); exit();
		}
	?>
	<div class="discussionBoard" id="everything">
		<div class="discussionBoardInner">
		<div class="showParticularDiscussion">
			<?php $discussInfo=fetchDiscussInfo($postNo); ?>
			<?php if($discussInfo=="nothing"){
				$_SESSION['msg']="<script type='text/javascript'>$.notify('Invalid Post number...','info')</script>";
				header('Location: discussionBoard.php'); exit();
			}  ?>
			<?php $relevantContentInfo=relevantContentMaterialInfo($postNo); ?>
			<?php $commentInfo=fetchComments($postNo); ?>
			<div class="discussionTitle">
				<?php echo $discussInfo['title']; ?>
				<hr>
			</div>
			<div class="discusionDescription">
				<?php echo $discussInfo['description']; ?>
			</div>
			<div class="filesToShow" style="border: 1px solid black">
				Files will be shown here...
			</div>
			<!-- <details>Nothing here...</details> -->
			<hr>
			<div class="discussionInfo w3-row">
				<section class="whosProfile w3-col" style="width: 11%;">
					<img src="../icons/masudur_rahman.jpg" alt="Profile Photo">
				</section>
				<section class="whosControlInfo w3-col" style="width: 88.00%;">
					<div class="controlUp">
						<label>by <a class="userName" href="<?php echo 'user/'.$discussInfo['who']; ?>"><?php echo $discussInfo['who']; ?></a></label>
						<a class="divider"></a>
						<label style="font-size: 90%; color: gray;"><?php showTime($discussInfo['time']); ?></label>
						<a class="divider"></a>
						<label><?php echo $commentInfo->num_rows; ?> Comments</label>
					</div>
					<div class="controlDown">
						<label id="flag" title="Flag this comment.." onclick="addFlag(flagClick=!flagClick, '<?php echo "#".$postNo; ?>')">Flag</label>
						<a class="divider"></a>
						<label id="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
						<?php //showCourse($relevantContentInfo); ?>
						<?php if($discussInfo['tag3']){?>
							<label id="tags" title="Tags"><?php echo $discussInfo['tag3']; ?></label>
							<a class="divider" style="float: right;"></a>
						<?php }?>
						<?php if($discussInfo['tag2']){?>
							<label id="tags" title="Tags"><?php echo $discussInfo['tag2']; ?></label>
							<a class="divider" style="float: right;"></a>
						<?php }?>
						<?php if($discussInfo['tag1']){?>
							<label id="tags" title="Tags"><?php echo $discussInfo['tag1']; ?></label>
						<?php }
						else{ ?>
							<label id="tags" style="float: right;" title="Tags">No Tag provided</label>
						<?php } ?>
						<?php if($relevantContentInfo!="nothing"){?>
							<a class="divider" style="float: right;"></a>
							<label style="float: right;" title="Level & Term" id="levelTerm"><?php echo $relevantContentInfo['term']; ?></label>
							<label style="float: right;" id="levelTerm"><?php echo $relevantContentInfo['level']; ?></label>
							<a class="divider" style="float: right;"></a>
							<label id="courseNmbr" title="Course Number"><?php echo $relevantContentInfo['courseNo']; ?></label>
						<?php } ?>
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
					<?php $identifier="post".$postNo."comment".$row['comment_id']; ?>
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
					    <form method="post" action="<?php echo 'discussionBoard.component.php?postNo='.$postNo;?>">
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
					<form method="post" action="<?php echo 'discussionBoard.component.php?postNo='.$postNo;?>">
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
	<div class="placeForAdd">
		<legend>Goto <a href="discussionBoard.php">Discussion Board</a></legend>
		<legend>Goto <a href="../requestContent/requestContent.php">Requested Contents</a></legend>
		<legend>Wanna contribute ? Click <a href="../uploadingContent/uploadingContent.component.php">Here</a></legend>
		<legend>Wanna say something ? Click <a href="../uploadingContent/uploadingContent.generalPost.php">Here</a></legend>
		<legend><a href="../requestContent/requestContent.component.php">Request</a> for Contents</legend>
	</div>
</body>
