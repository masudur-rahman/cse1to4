<?php
	ob_start();
	session_start();
	if ( isset($_SESSION['username'])!="" ) {
		session_unset(); session_destroy();;
		session_start();
		$_SESSION['info']="<script type='text/javascript'>$.notify('Logout Successful..','success')</script>";
		header("Location: home.php");
	}
?>