<html>
<head>
    <link rel="stylesheet" type="text/css" href="cse1to4_signup.css">
    <link rel="stylesheet" type="text/css" href="css/lib/w3.css">
    <link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="NavigationBar/navBar.component.css">

</head>
<body style="background-image: url(images/bc3.jpg)">

<?php
  $info="";
    if(isset($_SESSION['info'])){
        $info=$_SESSION['info'];
        $_SESSION['info']='';
    }
    echo $info;
    include('NavigationBar/navBar.component.php'); ?>

<div id="screen" >

  <div id="windowforsignup" style="background-image: url(images/sha1.jpg)">

    <h2 style="text-align: left; margin-left: 12%">Create A New Account</h2>

    <!-- <div id="gmailsignup" style="width: 40%">
      <p>pera1</p>
    </div>

    <div id="separator" style="">
    </div> -->

      <div id="traditionalsignup" style="width: 80%">
            <form action="action_user_information_table.php"
             method="POST" target="">
             <!--  <label for="username">User Name</label> -->

            <div style="margin-top: 10px">
              <label id="icon"><i class="fa fa-user"></i> User Name</label>
              <input type="text" id="username" pattern="[a-zA-Z0-9_\.]+" minlength="5" maxlength="20" name="username" placeholder=" Enter User Name"  required>
            </div>

            <div>
              <label id="icon"><i class="fa fa-envelope"></i> Email</label>
              <input type="email" id="email" maxlength="40" name="email" placeholder="Enter Your Email" required>
            </div>

             <div>
              <label id="icon"><i class="fa fa-lock"></i> Password </label>

              <input type="password" id="password" maxlength="20" name="password" minlenght="5" placeholder="Enter Password" required>
            </div>

             <div>
              <label id="icon"><i class="fa fa-lock"></i> Confirm Password</label>
              <input type="password" id="confirmpassword" maxlength="20" minlength="5" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
              <button class="button button1" type="submit" name="submit">Join!</button>
            </form>
      </div>
    </div>
</div>

</body>
</html>
