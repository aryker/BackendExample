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
	
	//display full roster
	$rosterStatement = "SELECT * FROM members";
	$rosterResult = mysqli_query($con, $rosterStatement);
	
	echo "<table>";
	echo "<tr>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Sex</th>";
	echo "<th>Grade</th>";
	echo "</tr>";
	while($row = mysqli_fetch_assoc($rosterResult)) { //get the data returned by the SQL query and put it in an array for use in PHP
		echo "<tr>";
		echo "<td>" . $row["firstname"] . "</td>";
		echo "<td>" . $row["lastname"] . "</td>";
		echo "<td>" . $row["sex"] . "</td>";
		echo "<td>" . $row["grade"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	//close the SQL connection
	mysqli_close($con);

?>