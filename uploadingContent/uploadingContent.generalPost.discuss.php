<?php
	session_start();
	function db_connect(){
		return mysqli_connect('localhost', 'root', '', 'cse1to4');
	}
	$who = $_SESSION['username'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$tag1 = $_POST['tag1'];
	$tag2 = $_POST['tag2'];
	$tag3 = $_POST['tag3'];

	$conn=db_connect();

	$sql="INSERT INTO discussion(who, title, description, tag1, tag2, tag3) VALUES('$who', '$title', '$description', '$tag1', '$tag2', '$tag3')";
	$conn->query($sql);
?>