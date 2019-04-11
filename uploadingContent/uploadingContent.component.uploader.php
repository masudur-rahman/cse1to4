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
	$batch = $_POST['batch'];
	$contentType = $_POST['contentType'];
	$discussion_id = $_POST['discussion_id'];

	$conn=db_connect();
	$sql="SELECT MAX(content_id) AS last_id FROM content_materials";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$lastId = $row['last_id']+1;

	function findTagId($tag, $con){
		$sql="SELECT tag_id from Tags where tag_title='$tag'";
		$rslt=$con->query($sql);
		if($rslt->num_rows==0) return -1;
		$row=$rslt->fetch_assoc();
		return $row['tag_id'];
	}

	$tag_id1; $tag_id2; $tag_id3;

	if(strlen($tag1)>0){
		$conn=db_connect();
		$tag_id1=findTagId($tag1, $conn);
		if($tag_id1==-1){
			$sql="INSERT INTO Tags(tag_title) VALUES('$tag1')";
			$conn->query($sql);
			$tag_id1=$conn->insert_id;
		}
	}
	if(strlen($tag2)>0){
		$conn=db_connect();
		$tag_id2=findTagId($tag2, $conn);
		if($tag_id2==-1){
			$sql="INSERT INTO Tags(tag_title) VALUES('$tag2')";
			$conn->query($sql);
			$tag_id2=$conn->insert_id;
		}
	}
	if(strlen($tag3)>0){
		$conn=db_connect();
		$tag_id3=findTagId($tag3, $conn);
		if($tag_id3==-1){
			$sql="INSERT INTO Tags(tag_title) VALUES('$tag3')";
			$conn->query($sql);
			$tag_id3=$conn->insert_id;
		}
	}

	foreach($_FILES as $index => $file){
		$fileName     = $file['name'];
		$fileTempName = $file['tmp_name'];
		$fileBasename = substr($fileName, 0, strripos($fileName, '.'));
		$fileExt = substr($fileName, strripos($fileName, '.'));
		$fileExtension="";
		$link=$fileBasename;
		for ($i=1; $i < strlen($fileExt); $i++) {
			$fileExtension.=$fileExt[$i];
		}
		//echo $fileExt;
		//echo $fileExtension; return;
		for ($i=0; $i < strlen($link); $i++) {
			if($link[$i]==' ') $link[$i]='_';
		}
		$newFileName = "uploads/".$link."(".$lastId.")".$fileExt;
		if(!empty($file['error'][$index])){
			echo "An Error Occured...";
		}
		if(!empty($fileTempName) && is_uploaded_file($fileTempName)){
			move_uploaded_file($fileTempName, $newFileName);
			$conn = db_connect();
			$sql="INSERT INTO content_materials(discussion_id, uploader, title, description, file, level, term, courseNo, tag1, tag2, tag3) VALUES($discussion_id, '$uploader', '$title', '$description', '$newFileName', '$level', '$term', '$courseNo', '$tag1', '$tag2', '$tag3')";
			$rslt=$conn->query($sql);
			$lastMtId=$conn->insert_id;
			$conn = db_connect();
			$sql="INSERT INTO Materials(material_id, discussion_id, user_id, title, url, date_and_time, type, format, tag1, tag2, tag3) VALUES($lastMtId, $discussion_id, '$uploader', '$title', '$newFileName', NOW(), 'lecture_slide', '$fileExtension', '$tag1', '$tag2', '$tag3')";
			$rslt1=$conn->query($sql);

			$conn=db_connect();
			$sql="INSERT INTO Course_Materials(batch_id, course_id, material_id) VALUES($batch, '$courseNo', $lastMtId)";
			$conn->query($sql);
			if(strlen($tag1)>0){
				$conn=db_connect();
				$sql="INSERT into Items_Tags(material_id, tag_id) VALUES($lastMtId, $tag_id1)";
				$conn->query($sql);
				echo $conn->error;
			}
			if(strlen($tag2)>0){
				$conn=db_connect();
				$sql="INSERT into Items_Tags(material_id, tag_id) VALUES($lastMtId, $tag_id2)";
				$conn->query($sql);
			}
			if(strlen($tag3)>0){
				$conn=db_connect();
				$sql="INSERT into Items_Tags(material_id, tag_id) VALUES($lastMtId, $tag_id3)";
				$conn->query($sql);
			}
			if($rslt1 and $rslt) echo "File uploaded successfully...";
			else echo "Oooppss...! Some Error occured...";
		}
		else echo "Oooppss...! Some Error occured...";
	}
?>