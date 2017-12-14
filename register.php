<?php

	//collect the information in the form
	$firstName = $_POST["firstname"];
	$lastName = $_POST["lastname"];
	$sex = $_POST["sex"];
	$grade = $_POST["grade"];
	
	//connect to the SQL database
	$con = mysqli_connect("integrity", "techhound", "team868!", "techhound"); //This is BAD PRACTICE! Don't do this on a real website! Read the credentials from a file instead!
	if(mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//insert new student information into database	
	$statement = "INSERT INTO members (firstname, lastname, sex, grade) VALUES (\"" . $firstName . "\", \"" . $lastName . "\", \"" . substr($sex, 0, 1) . "\", " . $grade . ")";
	
	mysqli_query($con, $statement);
	
	echo "Congratulations! You have been registered successfully.";
	
	//close the SQL connection
	mysqli_close($con);

?>