<!DOCTYPE html>

<html>
<head>
    <title>Add</title>
    <meta name="description" content="add the person to the database">
</head>

<body >
<h1>Usage notes</h1>
<p>This page is loaded when the submit button is pressed and receives the data from the form</p>

<p>An insert query is created using the data from the form which is run to insert create a new rom. I have not supplied the ID because this is setup in the database to generated automically using autoincrement</p>

<h1>Add</h1>

<?php
	//check that we have come here from the form, if not redirect the user to the form
	if (isset($_POST['submit'])) {
		print_r($_POST); //for debug purpose - remove once working

		//build the SQL command
		$sql = "INSERT INTO person (fname, surname, age) VALUES ('$_POST[fname]', '$_POST[surname]', '$_POST[age]')";
		echo "DEBUG sql command is: ".$sql."<br />";

		//connect to the database
		require_once '../../../_connectionInfo.php';
		
		//run the SQL query we created to insert the record
		if(mysqli_query($con, $sql))  
		{
		  echo '<p>Thank for, the data has been added to the database</p>';
		} else {
		  echo '<p>An unexpected error occured and we are unable to continue.</p>';
		  echo("Error description: " . mysqli_error($con)); //debug - remove this in release version
		}
		mysqli_close($con);
	} else {
		echo "<p>Please complete the <a href='addPersonForm.html'>form</a>.";
	}
?>
</body>
</html>
