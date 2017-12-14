<?php

	//collect the information in the form
	$firstName = $_POST["firstname"];
	$lastName = $_POST["lastname"];
	$sex = $_POST["sex"];
	$grade = $_POST["grade"];
	
	//connect to the SQL database
	$con = mysqli_connect("integrity", "techhound", "team868!", "techhound");
	if(mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//insert new student information into database	
	$statement = "INSERT INTO members (firstname, lastname, sex, grade) VALUES (\"" . $firstname . "\", \"" . $lastname . "\", " . substr($sex, 1) . ", " . $grade . ")";
	
	mysqli_query($con, $statement);
	
	//close the SQL connection
	mysqli_close($con);

?>