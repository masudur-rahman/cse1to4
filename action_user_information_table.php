
<head>
	<title>CSE1TO4</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="notify.min.js"></script>
</head>


	<?php
		session_start();
		ob_start();
	  	$conn=mysqli_connect("localhost","root", "", "cse1to4");

	  	$username=$email=$password=$confirmpassword="";

	  	if($_SERVER["REQUEST_METHOD"]=="POST"){
	  		$username=$_POST["username"];
	  		$email=$_POST["email"];
	  		$password=$_POST["password"];
	  		$confirmpassword=$_POST["confirmpassword"];
	  		//echo $username;
	  		$sql="SELECT * FROM user_information WHERE user_name='$username' ";
	  		$result=mysqli_query($conn, $sql);
	  		$cnt=mysqli_num_rows($result);
			$sql="SELECT * FROM user_information WHERE email='$email' ";
	  		$result=mysqli_query($conn, $sql);
	  		$cnt1=mysqli_num_rows($result);

	  		//echo $cnt." cnt2 ".$cnt1.strlen($password);
	  		if($cnt>0){
	  			$_SESSION['info'] = "<script type='text/javascript'>$.notify('This Username is Already Taken..','warn')</script>";
	  			include('cse1to4_signup.php');
	  		}
	  		else if($cnt1>0){
	  			$_SESSION['info'] = "<script type='text/javascript'>$.notify('This Email is Already Taken..','warn')</script>";
	  			include('cse1to4_signup.php');
	  		}
	  		else if($cnt>0 or $cnt1>0 or strlen($password)<5 or $password!=$confirmpassword){
	  			$_SESSION['info'] = "<script type='text/javascript'>$.notify('Password not Matched..','warn')</script>";
	  			include('cse1to4_signup.php');
	  		}
	  		else{
	  			$conn=mysqli_connect('localhost', 'root', '', "cse1to4");
	            if(!$conn->connect_error){
	              $sql = "INSERT INTO user_information(user_name, email, password, encryptedpassword)
	              VALUES ('$username','$email','$password', AES_ENCRYPT('$password','$username'))";
	              mysqli_query($conn, $sql);
	              $_SESSION['info'] = "<script type='text/javascript'>$.notify('Registration Sucessfull..','success')</script>";
	              header('Location: /cse1to4/cse1to4_login.php');
	            }
	  		}
	  	}
	  ?>
