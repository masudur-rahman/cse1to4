<html>
<head>
    <meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="notify.min.js"></script>
</head>

<?php
	if(isset($_POST['update_contact_information'])){
		$conn=mysqli_connect("localhost", "root", "", "cse1to4");
		$pnum=$_POST["phone_number"];
		$address=$_POST["address"];

		if(strlen($pnum)>0 or strlen($address)>0){
			if(strlen($pnum)>0){
				$sql="UPDATE user_information SET phone_number='$pnum' WHERE user_name='$usr'";
				mysqli_query($conn,$sql);
			}
			if(strlen($address)>0){
				$sql="UPDATE user_information SET address='$address' WHERE user_name='$usr'";
				mysqli_query($conn,$sql);
			}
			echo "<script type='text/javascript'>$.notify('Contact Information Updated..','sucess')</script>";
		}
		else{
			echo "<script type='text/javascript'>$.notify('Modify Contact Information','warn')</script>";
		}
	}


	include('edit_profile_options.php');
?>

</html>