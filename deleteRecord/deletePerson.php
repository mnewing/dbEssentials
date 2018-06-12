<!DOCTYPE >

<html>
<head>
    <title>Delete</title>
</head>

<body >
<h1>notes</h1>
<p>create an SQL query to delete where the ID is pickedup from the argumemnt passed in with the URL</p>
<p>there is no confirmation before deletion in case the user miss-clicked which is not best practice</p>

<h1>Delete</h1>


<?php
	//create the query using the ID passed with the URL
	$query = "DELETE FROM person WHERE id='$_REQUEST[ref]'";
	require_once '../../../../_connectionInfo.php';  //load the connection info
	if(mysqli_query($con, $query))  
	{
		//check that we delete a single row, if so we consider that success
		if (mysqli_affected_rows($con) == 1) {
		   echo '<p>The record has been removed from the database</p>';
		}
	} else {
	  echo '<p>An unexpected error occured and we are unable to continue.</p>';
	  echo("Error description: " . mysqli_error($con)); //debug only - remove this in release version
    }
	mysqli_close($con);
?>

</body>
</html>
