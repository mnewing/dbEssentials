<!DOCTYPE >

<html>
<head>
    <title>Change</title>
</head>

<body >

<h1>Change</h1>

<?php
	//only do anything if we arrived here from the form and we have an ID
	if (isset($_POST['submit']) and isset($_POST['id']) and !empty($_POST['id']) ) {
		print_r($_POST);  //for debug only - remove once testing complete

		//create the query
		//keys into the _POST array are the names in the fields
		//database fields are used to match the table name and the column names
		$query = "UPDATE person
					SET fname='$_POST[fname]', age=$_POST[age], surname='$_POST[surname]'
					WHERE id='$_POST[id]'";
		require_once '../../../../_connectionInfo.php';
		mysqli_query($con, $query);
		
		//after running the query check that a single row was effected
		if (mysqli_affected_rows($con) == 1) {
			echo '<p>Thank for, your data has been updated</p>';
		} else {
			echo '<p>An unexpected error occured and we are unable to continue.</p>';
			//debug only - remove this in release version
			echo("Error description: " . mysqli_error($con));
			echo "query was: ". $query ."<br />";
		}
		mysqli_close($con);
	}
?>

</body>
</html>
