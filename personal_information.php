<html>

<?php
      session_start();
      ob_start();
      $user=$_SESSION['username'];
      $conn=mysqli_connect("localhost", "root", "", "cse1to4");
      $sql="SELECT * FROM user_information where user_name='$user'";
      $rslt=mysqli_query($conn,$sql);
      $row= mysqli_fetch_assoc($rslt);
?>


<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="js/notify.js"></script>
  <script type="text/javascript" src="notify.min.js"></script>
  <link rel="stylesheet" type="text/css" href="personal_information.css">
  <link rel="stylesheet" type="text/css" href="css/lib/w3.css">
  <link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">


</head>
<?php

  if(isset($_POST['update_profile_picture'])){
      $filename = $_FILES["profile_pic"]["name"];
      $file_basename = substr($filename, 0, strripos($filename, '.'));
      $file_ext = substr($filename, strripos($filename, '.'));

      $filesize = $_FILES["profile_pic"]["size"];
      $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF');

      if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
        $newfilename = md5(123) . $file_ext;
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "uploads/" . $newfilename);
        rename('uploads/'.$newfilename, 'uploads/'.$user.$file_ext);
        $newfilename='uploads/'.$user.$file_ext;
        echo "<script type='text/javascript'>$.notify('Upload Successful..','success')</script>";
        $sql = "UPDATE user_information SET profile_pcture='$newfilename' WHERE Username='$user'";
        mysqli_query($conn,$sql);

      }
      elseif ($filesize > 20000000000){
       echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
      }
      else if(!empty($file_basename)){
       echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png and gif files are allowed..','warn')</script>";
         unlink($_FILES["profile_pic"]["tmp_name"]);
      }

  }

  if(isset($_POST['update_personal_information'])){
    $f_name=$_POST['first_name'];
    $l_name=$_POST['last_name'];
    $st_id=$_POST['student_id'];
    $bth=$_POST['batch'];
    $b_date=$_POST['birth_date'];

    $sql="UPDATE user_information SET first_name='$f_name', last_name='$l_name', student_id='$st_id', batch='$bth', birth_date='$b_date' WHERE user_name='$user'";

    mysqli_query($conn,$sql);
      echo "<script type='text/javascript'>$.notify('Personal Information Updated..','sucess')</script>";

  }

  if(isset($_POST['update_contact_information'])){

    $conn=mysqli_connect("localhost", "root", "", "cse1to4");
    $pnum=$_POST["phone_number"];
    $address=$_POST["address"];

    if(strlen($pnum)>0 or strlen($address)>0){
      if(strlen($pnum)>0){
        $sql="UPDATE user_information SET phone_number='$pnum' WHERE user_name='$user'";
        mysqli_query($conn,$sql);
      }
      if(strlen($address)>0){
        $sql="UPDATE user_information SET address='$address' WHERE user_name='$user'";
        mysqli_query($conn,$sql);
      }
      echo "<script type='text/javascript'>$.notify('Contact Information Updated..','sucess')</script>";
    }
    else{
      echo "<script type='text/javascript'>$.notify('Modify Contact Information','warn')</script>";
    }
  }

  if(isset($_POST['update_password'])){
    $old_pass=$_POST['old_password'];
    $new_pass=$_POST['new_password'];
    $con_new_pass=$_POST['confirm_new_password'];


    if($old_pass==$row['password']){
      if($new_pass!=$con_new_pass){
       echo "<script type='text/javascript'>$.notify('Password did not match..','warn')</script>";
      }
      else if(strlen($new_pass)>=0 and strlen($new_pass)< 6){
       echo "<script type='text/javascript'>$.notify('Password Length should be greater than 5..','warn')</script>";
      }
      else if($new_pass==$con_new_pass){
         $sql="UPDATE user_information SET password='$con_new_pass' WHERE user_name='$user'";
         mysqli_query($conn,$sql);
        echo "<script type='text/javascript'>$.notify('Password Changed Sucessfully..','sucess')</script>";
      }
    }
    else{
      echo "<script type='text/javascript'>$.notify('Password is incorrect..','warn')</script>";
    }

  }

?>


<body>

<div id="screen">


  <div id="change_profile_picture_division" style="display: none;">
      <fieldset id="feild1" style="background-color: white; margin: 10px 10px 10px 10px;">
      <legend style="font-weight: bold; font-size: 16px; margin-left: 20px"><font color="red">Change Profile Picture</font></legend>

      <form action="update_user_information.php" method="POST" target="" enctype="multipart/form-data">
        <div id="">

        <div id="profile_picture_1" style="">
           <img id="image2" src="images/m2.jpg">
        </div>

        <div id="profile_picture_selection">
          <label>Select Profile Picture:</label>
          <input type="file" name="profile_pic" id="profile_pic">
        </div>
        <center>
        <input style="margin: 3vh 0vw 0vh -2vw" type="submit" name="update_profile_picture" value="Update">
        </div>
      </form>
    </fieldset>
  </div>


  <div id="personal_information_division" style="display: block;">
      <fieldset id="feild1" style="background-color: white; margin: 10px 10px 10px 10px;">
      <legend style="font-weight: bold; font-size: 16px; margin-left: 20px"><font color="red">Personal Information</font></legend>

      <form action="update_user_information.php" method="POST" target="">
        <div id="">

             <legend id="ll" style="margin-top: 10px;"><i class="fa fa-user">
            </i> First Name</legend>
            <input type="text" id="first_name" pattern="[a-z A-Z.]+" maxlength="20" name="first_name" placeholder="Enter Fist Name" value=<?php echo $row['first_name']?> >

             <legend id="ll"><i class="fa fa-user">
            </i> Last Name</legend>

            <input type="text" id="last_name" pattern="[a-z A-Z.]+" maxlength="20" name="last_name" placeholder="Enter Last Name"  value=<?php echo $row['last_name']?>>

             <legend id="ll" style=""><i class="fa fa-envelope">
            </i> Student ID</legend>
            <input type="text" maxlength="7" minlength="7" pattern="[0-9]+" id="student_id" name="student_id"  placeholder="Student ID"  value=<?php echo $row['student_id']?>>

             <legend id="ll" style=""><i class="fa fa-envelope">
    </i> Batch</legend>
            <input type="text" minlength="2" maxlength="2" pattern="[0-9]+" id="batch" name="batch"  placeholder="Enter Your Batch"  value=<?php echo $row['batch']?>>
             <legend id="ll" style=""><i class="fa fa-envelope">
    </i> Bith Date</legend>
            <input type="date" id="birth_date" name="birth_date"  placeholder="Enter Birth Date"  value=<?php echo $row['birth_date']?>>

            <input type="submit" name="update_personal_information" value="Save Changes">


        </div>
      </form>
    </fieldset>
  </div>



  <div id="contact_information_division" style="display: none;">
      <fieldset id="feild1" style="background-color: white; margin: 10px 10px 10px 10px;">
      <legend style="font-weight: bold; font-size: 16px;  margin-left: 20px"> <font color="red">Contact Information </font></legend>

      <form action="update_user_information.php" method="POST">
        <div id="">

            <legend id="ll" style="margin-top: 10px;"><i class="fa fa-envelope">
    </i> Email</legend>
            <input type="email" id="email" name="email"  disabled="" value= <?php echo $row['email']?> >

            <legend id="ll""><i class="fa fa-phone">
    </i> Phone Number</legend>
            <input type="text" id="phone_number" pattern="[0-9\+\-]+"  maxlength="15" name="phone_number" paleceholder="Enter Phone Number" value=<?php echo $row['phone_number']?> >

            <legend id="ll" "><i class="fa fa-address-card">
    </i> Update Address</legend>
            <input type="text" id="address" name="address" placeholder="Update Address" value=<?php echo $row['address']?> >

            <input type="submit" name="update_contact_information" value="Save Changes">
        </div>
      </form>
    </fieldset>
  </div>

  <div id="change_password_division" style="display: none;">
      <fieldset id="feild1" style="background-color: white; margin: 10px 10px 10px 10px;">
      <legend style="font-weight: bold; font-size: 16px;  margin-left: 20px"> <font color="red">Change Password </font></legend>

      <form action="update_user_information.php" method="POST" target="">
        <div id="">

            <legend id="ll" style="margin-top: 10px;"><i class="fa fa-unlock">
    </i> Old Password</legend>
            <input type="password" id="old_password" name="old_password" placeholder="Enter Old Password">

               <legend id="ll" style=""><i class="fa fa-lock">
    </i> New Password</legend>
            <input type="password" id="new_password" name="new_password" placeholder="Enter New Password">

        <legend id="ll" style=""><i class="fa fa-key">
    </i> Confirm Password</legend>
            <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm Password">
            <input type="submit" name="update_password" value="Change">
        </div>
      </form>
    </fieldset>
  </div>

</div>

</body>
</html>