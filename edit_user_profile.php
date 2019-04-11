<html>
<head>
    <link rel="stylesheet" type="text/css" href="edit_user_profile.css">
    <link rel="stylesheet" type="text/css" href="css/lib/w3.css">
    <link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
</head>
<body>


<div id="screen">

  <div>
    <fieldset id="feild1" style="background-color: redd">
      <legend style="font-weight: bold; font-size: 16px">       Persoanl Information </legend>
      <form action="_" method="POST" target="_blank">
        <div id="personal_information">
            <input type="text" class="emppty" id="first_name" pattern="[a-zA-Z]+" maxlength="20" name="first_name" placeholder="Enter Fist Name">

            <input type="text" id="last_name" pattern="[a-zA-Z]+" maxlength="20" name="last_name" placeholder="Enter Last Name">

            <input type="text" maxlength="7" minlength="7" pattern="[0-9]+" id="student_id" name="student_id"  placeholder="Student Id">

            <input type="text" minlength="2" maxlength="2" pattern="[0-9]+" id="batch" name="batch"  placeholder="Enter Your Batch">

            <input type="date" id="birth_date" name="birth_date"  placeholder="Enter Birth Date">

            <input type="submit" name="submit" value="Save Changes">


        </div>
      </form> 
    </fieldset>
  </div>

      
