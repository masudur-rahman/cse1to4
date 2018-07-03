<?php
	session_start();
	function db_connect(){
		return mysqli_connect('localhost', 'root', '', 'cse1to4');
	}
	$uploader = $_SESSION['username'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];
	$courseNo = $_POST['courseNo'];
	$level = $_POST['level'];
	$term = $_POST['term'];
	$discussion_id = $_POST['discussion_id'];

	$conn=db_connect();
	$sql="SELECT MAX(content_id) AS last_id FROM content_materials";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$lastId = $row['last_id']+1;

	foreach($_FILES as $index => $file){
		$fileName     = $file['name'];
		$fileTempName = $file['tmp_name'];
		$fileBasename = substr($fileName, 0, strripos($fileName, '.'));
		$fileExt = substr($fileName, strripos($fileName, '.'));
		$newFileName = "uploads/".$fileBasename."(".$lastId.")".$fileExt;
		if(!empty($file['error'][$index])){
			echo "An Error Occured...";
		}
		if(!empty($fileTempName) && is_uploaded_file($fileTempName)){
			move_uploaded_file($fileTempName, $newFileName);
			$conn = db_connect();
			$sql="INSERT INTO content_materials(discussion_id, uploader, title, description, file, level, term, courseNo, tag1, tag2, tag3) VALUES($discussion_id, '$uploader', '$title', '$description', '$newFileName', '$level', '$term', '$courseNo', '$tag1', '$tag2', '$tag3')";
			if($conn->query($sql)) echo "File uploaded successfully...";
			else echo "Oooppss...! Some Error occured...";
		}
		else echo "Oooppss...! Some Error occured...";
	}
?>