<?php
	session_start();
	function db_connect(){
		return mysqli_connect('localhost', 'root', '', 'cse1to4');
	}
	$who = $_SESSION['username'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$level = $_POST['level'];
	$term = $_POST['term'];
	$courseNo = $_POST['courseNo'];

	$conn=db_connect();

	$sql="INSERT INTO requests(who, title, description, level, term, courseNo) VALUES('$who', '$title', '$description', '$level', '$term', '$courseNo')";
	$conn->query($sql);
?>