<!DOCTYPE html>
<?php

include('../Rating/rating.component.php');
include('../Tags/tags.component.php');
include('../Database/databaseConnect.php');
include('../Database/getRating.component.php');
include("../Database/getProjectTopics.php");
include('../Database/getProjects.services.php');

function returnItem($ttl, $usr, $rate, $urlink, $frmt, $dt){  // RETURNS DATA TO GETDATA FILE

    $ratediv = rating($rate);                           //  TO GET THE RATING DIV WORKING FOR EACH ITEM

    return "<div class = 'item'>
        <div class = 'ico ".$frmt."'></div>
        <div class = 'title' title='".$ttl."'>".$ttl."</div>
        <div class = 'upUser'>
            <div class = 'upBy'><b>Uploaded By:</b></div>
            <a href = '' class = 'userId' title='".$usr."'><strong>".$usr."</strong></a>
        </div>
        <div class = 'rating' id = 'rating'>".$ratediv."

        </div>
        <div class = 'itemButtons'>
            <a href = '".$urlink."' class = 'fa fa-download' id = 'button1' title='Download'>
            </a>
        </div>
    </div>";
}

function showProjects ($mtId, $dlink, $ttl, $dt, $usr) {
	$anshtml="<div class = 'project' id = '{$mtId}' href = ''>
        <a href = '{$dlink}'>
        <div class = 'projectIcon'>
            <div class = 'iconP'>
            </div>
            <div class = 'projectTitle' title='{$ttl}'>
                {$ttl}
            </div>
        </div>
        <div class = 'projectDescription'>";

        //convert date
        $haha = strtotime( $dt ); ///keno jani important
        $dateTime = date('d-M-Y', $haha);

        $anshtml.="
                <div class='date'>{$dateTime}</div>
                <div class = 'uploader' title = '{$usr}'><a href='#'><b>{$usr}</b></a></div>
            </div>
        </a>
        </div>";
        return $anshtml;
}

?>
<html lang="en">
<head>
	<?php require_once('discussionBoard.fetchDBinfo.php'); ?>
	<?php
		session_start(); ob_start();
		function db_connect(){
			return mysqli_connect('localhost', 'root', '', 'cse1to4');
		}
		if(isset($_GET['postNo'])) $postNo=$_GET['postNo'];
		else{
			$_SESSION['msg']="<script type='text/javascript'>$.notify('Invalid Post number...','info')</script>";
			header('Location: discussionBoard.php');
			exit();
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
	<title>Discussion Board</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<link rel="stylesheet" type="text/css" href="discussionBoard.component.css">

	<!-- for showing items -->
	<link rel="stylesheet" type="text/css" href="../BrowsingContent/ShowItem/showItem.component.css">
	<link rel="stylesheet" type="text/css" href="../ProjectMaterials/ShowProjects/Projects/project.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/nicEdit-latest.js"></script>
	<script type="text/javascript" src="discussionBoard.component.js"></script>
</head>

	<?php include('../NavigationBar/navBar.component.php');?>
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
			<?php
				$relevantProjectInf="nothing";
				if($discussInfo['tag1']=='Project / Thesis'){
					$relevantProjectInf=relevantProjectThesisInfo($postNo);
				}
			?>
			<?php $ContentInfo=relevantContentMaterialInfo($postNo); ?>
			<?php $relevantContentInfo=relevantItems($postNo); ?>
			<?php $relevantProjectInfo=relevantProjectItems($postNo); ?>
			<?php $commentInfo=fetchComments($postNo); ?>
			<div class="discussionTitle">
				<?php echo $discussInfo['title']; ?>
				<hr class='line'>
			</div>
			<div class="discusionDescription">
				<?php echo $discussInfo['description']; ?>
			</div>
			<div class="filesToShow">
				<?php
					while($relevantProjectInf=="nothing" and $row = $relevantContentInfo->fetch_assoc()) {
						echo returnItem($row['title'], $row['user_id'], item_rating($row['material_id'],$conn), $row['url'], $row['format'], $row['date_and_time']);
					}
					while($relevantProjectInf!="nothing" and $row = $relevantProjectInfo->fetch_assoc()) {
						echo showProjects($row['material_id'], $row['file_link'], $row['title'], $row['date_time'], $row['user_id']);
					}
				?>
			</div>
			<!-- <details>Nothing here...</details> -->
			<hr>
			<div class="discussionInfo w3-row">
				<section class="whosProfile w3-col" style="width: 11%;">
					<img src="../icons/user.png" alt="Profile Photo">
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
						<?php if($ContentInfo!="nothing"){?>
							<a class="divider" style="float: right;"></a>
							<label style="float: right;" title="Level & Term" id="levelTerm"><?php echo $ContentInfo['term']; ?></label>
							<label style="float: right;" id="levelTerm"><?php echo $ContentInfo['level']; ?></label>
							<a class="divider" style="float: right;"></a>
							<label id="courseNmbr" title="Course Number"><?php echo $ContentInfo['courseNo']; ?></label>
						<?php } ?>
					</div>
				</section>
			</div>
		</div>
		<div class="showComments">
			<h2>Comments</h2>
			<?php
			while($row=$commentInfo->fetch_assoc()){ ?>
				<div class="commentSection w3-row">
					<section class="profileCmnt w3-col">
						<center>
						<div class="profilePhotoCmnt">
							<img src="../icons/user.png" alt="Profile Photo">
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
							<img id="replier" src="../icons/user.png" alt="Profile Photo">
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
							<img id="replier" src="../icons/user.png" alt="Profile Photo">
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
				<section class="profileCmnt w3-col">
					<center>
					<div class="profilePhotoCmnt">
						<img src="../icons/user.png" alt="Profile Photo">
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

	<?php include('../discussionBoard/placeForAdd.php'); ?>
</body>
