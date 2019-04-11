<html lang="en">
<?php
	ob_start();
	session_start();
	if (isset($_SESSION['username'])!="" ) {

 	}
 	if(!isset($_SESSION['link'])){
 	}
    $info="";
    if(isset($_SESSION['info'])){
        $info=$_SESSION['info'];
        $_SESSION['info']='';
    }
?>
<head>
	<title>CSE1TO4</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/bootstrap.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/notify.js"></script>
	<script type="text/javascript" src="notify.min.js"></script>
	<link rel="stylesheet" type="text/css" href="NavigationBar/navBar.component.css">
	<link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<?php
	echo $info;

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$conn=mysqli_connect('localhost', 'root', '', "cse1to4");
		$userid=$_POST["user"]; $pass=$_POST["pass"];

		$sql="SELECT user_name, password FROM user_information where user_name='$userid' and password='$pass'";
			//$rslt=mysqli_query($conn, $sql);
			$rslt = $conn->query($sql);
			if ($rslt->num_rows > 0) {
				//session_start();
				$_SESSION['username']=$userid; //$_SESSION["idtype"]=$idd;
				//echo "<script type='text/javascript'>$.notify('Login Successful..','success')</script>";
				$_SESSION['info']="<script type='text/javascript'>$.notify('Login Successful..','success')</script>";
				echo "<script type='text/javascript'>$.notify('Login Sucessfull..','success')</script>";
				//header("Location: home.php");
				header('Location: /cse1to4/HomePage/homePage.component.php');

			}
			else{
				echo "<script type='text/javascript'>$.notify('Incorrect Usename or Password !','warn')</script>";
			}
		}

	?>

	<?php include('NavigationBar/navBar.component.php'); ?>
	<div class="w3-row w3-teal">
		<div class="w3-col w3-container w3-teal" style="width:100%; background-image: url(images/back6.jpg)">
		<center>
			<div class="w3-container">
	            <img src="images/avatar4.png" alt="Avatar" class="w3-circle" style="width: 15%; margin-top: 30px; margin-bottom: 10px;">
	            <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">


	                <div class="form-group" style="text-align: right;">
	                    <label class="control-label col-sm-5" for="user">User Name:</label>
	                    <div class="col-sm-3">
	                        <input type="text" class="form-control" id="user" name="user" placeholder="Enter User Name" required>
	                    </div>
	                </div><br>

	                <div class="form-group" style="text-align: right;">
	                	<label class="control-label col-sm-5" for="pass">Password:</label>
	                	<div class="col-sm-3">
	                		<input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
	                	</div>
	                </div><br><br>

	                <center>

				    <label><input type="checkbox" checked="checked"> Remember me<br></label><br>
				    <button class="button" type="submit" id="login"><b><span>Enter</span></b></button><br>
					<p>Don't have an ID ? <a href="cse1to4_signup.php" id="up" style="color: khaki"> Sign Up</a> Here. </p>
				    </center>
		        </form>
			</div><br>
		</center>


		</div>
	</div>
</body>
</html>