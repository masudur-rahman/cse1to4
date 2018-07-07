<html>
<head>
    <link rel="stylesheet" type="text/css" href="edit_profile_options.css">
    <link rel="stylesheet" type="text/css" href="personal_information.css">
    <link rel="stylesheet" type="text/css" href="css/lib/w3.css">
    <link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script>

      function show_change_profile_picture()
      {
        document.getElementById("contact_information_division").style.display="none";
        document.getElementById("change_password_division").style.display="none";
        document.getElementById("personal_information_division").style.display="none";
        document.getElementById("change_profile_picture_division").style.display="block";

      }

      function show_personal_information()
      {
         document.getElementById("change_profile_picture_division").style.display="none";
        document.getElementById("contact_information_division").style.display="none";
        document.getElementById("change_password_division").style.display="none";
        document.getElementById("personal_information_division").style.display="block";
      }

      function show_contact_information()
      {
         document.getElementById("change_profile_picture_division").style.display="none";
        document.getElementById("personal_information_division").style.display="none";
        document.getElementById("change_password_division").style.display="none";
        document.getElementById("contact_information_division").style.display="block";
      }

      function show_change_password()
      {
         document.getElementById("change_profile_picture_division").style.display="none";
        document.getElementById("personal_information_division").style.display="none";
        document.getElementById("contact_information_division").style.display="none";
        document.getElementById("change_password_division").style.display="block";

      }
    </script>



</head>

<body>

<div id="screen1" style="">

  <div id="profile_picture" style="background-repeat:no-repeat;background-size:cover;background-image: url(images/8608.jpg); padding-top: 60px;">

      <div id="show_profile_picture" style="">
        <img id="image1" src="images/m1.jpg">
      </div>

  </div>
<div style="display: block;background: #0099cc; font-size: 20px;padding: 1%;text-align: center;color: white;cursor: pointer;" onclick='location.href="/cse1to4/HomePage/homePage.component.php"'>RETURN TO HOME</div>
  <div id="showcontents" style="float: left">

      <button type="submit" id="change_profile_picture" onclick="show_change_profile_picture()"><i class="fa fa-image">
      </i> Change Profile Picture</button>

      <button type="submit" id="personal_information" onclick="show_personal_information()"><i class="fa fa-user-circle">
      </i> Personal Information </button>

      <button type="submit" id="contact_information" onclick="show_contact_information()"><i class=" fa fa-address-card">
      </i> Contact Information </button>

      <button type="submit" id="change_password" onclick="show_change_password()"><i class="fa fa-unlock">
      </i> Change Pasword</button>

      <button type="submit" id="contribution"><i class="fa fa-database">
      </i> Contribution </button>
</div>

<div id="column22">
  <?php include("personal_information.php"); ?>
</div>

</div>

</body>
</html>
