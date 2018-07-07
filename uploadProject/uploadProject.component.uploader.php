<?php
	session_start();
	function db_connect(){
		return mysqli_connect('localhost', 'root', '', 'cse1to4');
	}
	$uploader = $_SESSION['username'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$field=$_POST['field'];
	$supervisorName=$_POST['supervisorName'];
	$topic_id; $supervisor_id;
	$conn=db_connect();
	$archive=new ZipArchive();
	$link=$title;
	for ($i=0; $i < strlen($link); $i++) {
		if($link[$i]==' ') $link[$i]='_';
	}
	$archiveName="../uploadingContent/uploads/".$link.".zip";
	if($archive->open($archiveName, ZipArchive::CREATE) !== TRUE) {
        echo "Sorry...! Some error occured... :( ";
        return;
    }
	foreach($_FILES as $index => $file){
		$fileName     = $file['name'];
		$fileTempName = $file['tmp_name'];
		$archive->addFromString($fileName, file_get_contents($fileTempName));
	}

	$conn=db_connect();
	$sql="SELECT topic_id from Project_Topics where topic_title='$field'";
	$rslt=$conn->query($sql);
	if($rslt->num_rows==0){
		echo "Select Project Field from suggested list.";
		return;
	}
	$row=$rslt->fetch_assoc();
	$topic_id=$row['topic_id'];

	$conn=db_connect();
	$sql="SELECT superviser_id from Supervisers where name='$supervisorName'";
	$rslt=$conn->query($sql);
	if($rslt->num_rows==0){
		echo "Select SupervisorName from suggested list.";
		return;
	}
	$row=$rslt->fetch_assoc();
	$supervisor_id=$row['superviser_id'];

	$conn=db_connect();
	$sql="INSERT INTO discussion(who, title, description, tag1, tag2) VALUES('$uploader', '$title', '$description', 'Project / Thesis', '$field')";
	$conn->query($sql);
	$last_discuss = $conn->insert_id;

	$conn=db_connect();
	$sql="INSERT INTO Project_Materials(discussion_id, user_id, title, description, file_link, date_time) VALUES($last_discuss, '$uploader', '$title', '$description', '$archiveName', NOW())";
	$conn->query($sql);

	$last_id = $conn->insert_id;

	$conn=db_connect();
	$sql="INSERT INTO Project_by_Topic(material_id, topic_id) VALUES($last_id, $topic_id)";
	$conn->query($sql);

	$conn=db_connect();
	$sql="INSERT INTO Project_Supervisor(material_id, supervisor_id) VALUES($last_id, $supervisor_id)";
	$conn->query($sql);

	echo "Upload Completed...";
?>