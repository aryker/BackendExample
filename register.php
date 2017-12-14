<?php

	//collect the information in the form
	$firstName = $_POST["firstname"];
	$lastName = $_POST["lastname"];
	$sex = $_POST["sex"];
	$grade = $_POST["grade"];
	
	//connect to the SQL database
	$con = mysqli_connect("localhost", "techhound", "team868!", "techhound");
	
	//insert new student information into database	
	$statement = "INSERT INTO members (firstname, lastname, sex, grade) VALUES (\"" . $firstname . "\", \"" . $lastname . "\", " . substr($sex, 1) . ", " . $grade . ")";
	
	mysqli_query($con, $statement);
	
	//close the SQL connection
	mysqli_close($con);

?>