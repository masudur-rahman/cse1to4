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
		if(isset($_GET['search'])){
			$value=$_GET['search'];
		}
		else $value="";

include('../Database/databaseConnect.php');
include('../Database/getRating.component.php');
include('../Rating/rating.component.php');
include('../Tags/tags.component.php');

function returnItem($ttl,$discuss, $usr, $rate, $tag, $urlink, $frmt, $dt){  // RETURNS DATA TO GETDATA FILE

    $ratediv = rating($rate);                           //  TO GET THE RATING DIV WORKING FOR EACH ITEM
    $tagdiv = tags($tag);                           //  TO GET THE TAG DIV WORKING FOR EACH ITEM

    return "<div class = 'item'>
        <div class = 'ico ".$frmt."'></div>
        <div class = 'title' title='".$ttl."'>".$ttl."</div>
        <div class = 'upUser'>
            <div class = 'upBy'><b>Uploaded By:</b></div>
            <a href = '' class = 'userId' title='".$usr."'><strong>".$usr."</strong></a>
        </div>
        <div class = 'rating' id = 'rating'>".$ratediv."

        </div>
        <div class = 'tags'>
            <div class = 'tagdiv'><b>Tags:</b></div>
            ".$tagdiv."
        </div>
        <div class = 'itemButtons'>
            <a href = '".$urlink."' class = 'fa fa-download' id = 'button1' title='Download'>
            </a>

            <a href='/cse1to4/discussionBoard/discussionBoard.component.php?postNo={$discuss}' class = 'fa fa-comments' id = 'button2' title='Discuss'>
            </a>


            <a href='#' class = 'fa fa-flag' id = 'button3' title='Flag'>
            </a>
        </div>
    </div>";
}
	?>
	<title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="../Styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../BrowsingContent/ShowItem/showItem.component.css">
	<link rel="stylesheet" type="text/css" href="../ProjectMaterials/ShowProjects/Projects/project.component.css">
	<link rel="icon" href="../icons/CUET_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="showSearchResult.css">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<link rel="stylesheet" type="text/css" href="../">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
</head>

</script>
<body>
	<?php echo $msg; ?>
	<?php
		$conn=db_connect();
		$sql="ALTER TABLE Materials ADD FULLTEXT (user_id, title, tag1, tag2, tag3);";
		$conn->query($sql);
		function fetchContentsMaterials($value){
			$conn=db_connect();
			$sql="SELECT *, MATCH (user_id, title, tag1, tag2, tag3) AGAINST ('$value') as score FROM Materials WHERE MATCH (user_id, title, tag1, tag2, tag3) AGAINST ('$value')>0 ORDER BY score DESC;";
			return $conn->query($sql);
		}
		function fetchProjectMaterials(){

		}
	?>
	<?php require('../NavigationBar/navBar.component.php'); ?>
	<div class="showSearchResult">
		<div id = 'searchHeading'>Showing Matched Items</div>
		<?php
			$searchResults=fetchContentsMaterials($value);
			while($singleResult=$searchResults->fetch_assoc()){
				echo returnItem($singleResult['title'],$singleResult['discussion_id'], $singleResult['user_id'],item_rating($singleResult['material_id'],$conn), array($singleResult['tag1'],$singleResult['tag2'],$singleResult['tag3']), $singleResult['url'], $singleResult['format'], $singleResult['date_and_time']);
			}
		?>
	</div>
</body>
