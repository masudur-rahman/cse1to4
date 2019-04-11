<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		session_start(); ob_start();
		$_SESSION['username']='masudur_rahman';
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
	?>
	<title>Search Results</title>
	<link rel="icon" href="../icons/CUET_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="showSearchResult.css">
	<link rel="stylesheet" href="../css/lib/w3.css">
	<link rel="stylesheet" href="../css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../NavigationBar/navBar.component.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../js/notify.js"></script>
</head>

</script>
<body>
	<?php echo $msg; ?>
	<?php
		$conn=db_connect();
		$sql="ALTER TABLE content_materials ADD FULLTEXT (uploader, title, description, tag1, tag2, tag3);";
		$conn->query($sql);
		function fetchContentsMaterials($value){
			$conn=db_connect();
			$sql="SELECT content_id, title, MATCH (uploader, title, description, tag1, tag2, tag3) AGAINST ('$value') as score FROM content_materials WHERE MATCH (uploader, title, description, tag1, tag2, tag3) AGAINST ('$value')>0 ORDER BY score DESC;";
			return $conn->query($sql);
		}
		function fetchProjectMaterials(){

		}
	?>
	<?php require('../NavigationBar/navBar.component.php'); ?>
	<div class="showSearchResult">
		<legend>Content Materials:</legend>
		<?php
			$searchResults=fetchContentsMaterials($value);
			while($singleResult=$searchResults->fetch_assoc()){
				echo $singleResult['content_id']." ".$singleResult['title']." ".$singleResult['score']."<br>";
			}
		?>
	</div>
</body>
