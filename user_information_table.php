
<?php
	$conn=mysqli_connect("localhost","root","","cse1to4");

	 /*$ss="DROP TABLE user_information";
	 $conn->query($ss);*/
	 
	$sql="CREATE TABLE user_information(
		user_name varchar(30) PRIMARY KEY, 
		first_name varchar(20),
		last_name varchar(20),
		department varchar(30),
		student_id Int(7),
		batch int(2),
		email varchar(40) not null,
		phone_number varchar(15),
		address varchar(50),
		organization varchar(20),
		profile_pcture text,
		birth_date date,
		password text not null,
		encryptedpassword text ,
		reg_date TIMESTAMP
	)";

	if($conn->query($sql)) echo "sucess ";
	else echo $conn->error;
?>