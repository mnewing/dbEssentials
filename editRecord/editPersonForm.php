<!DOCTYPE >

<html>
<head>
    <title>Change</title>
</head>

<body >

<h1>Change</h1>

<?php
	if (isset($_REQUEST['ref'])) {
		print_r($_REQUEST);  //for debug only - remove once testing complete

		//search query to find the user to edit, identified by their ID
		$query = "SELECT * FROM person WHERE id='$_REQUEST[ref]'";
		require_once '../../../../_connectionInfo.php';

		//run the query which should return a single row as we used ID which has to be unique
		if($result = mysqli_query($con, $query))  
		{
			print_r($result);  //DEBUG remove once all is working

			//get the first row which should be the only row as we used ID which has to be unique
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			//pass the data fetched from the database to the function which creates the form
			//the array keys are the column names from the database
			showForm($row['fname'],$row['surname'],$row['age'],$row['id']);
		} else {
			echo '<p>An unexpected error occured and we are unable to continue.</p>';
			echo("Error description: " . mysqli_error($con)); //debug only - remove this in release version
		}
		mysqli_close($con);
	}

	//the function expects 4 pieces of data that it will use to prefill the value in the input fields
	//the ID cannot be changed but it needs to be passed on to the update code so it has to be in the form
	//this is done as a hidden field could also be done as a readonly field
	function showForm($fname,$surname,$age,$id) {
?>
	<p>Update the required pieces of data and press submit.</p>
	<p>Required fields are marked with the * symbol.</p>

	<form method="post" action="editPerson.php">
		<input type="hidden" name="id" value="<?php echo $id?>">
		<table>
			<tr>
				<th><label for="fname">First name*:</label></th>
				<td><input type="text" name="fname" value="<?php echo $fname?>" required/></td>
			</tr>
			<tr>
				<th><label for="surname">Surname*:</label></th>
				<td><input type="text" name="surname" value="<?php echo $surname?>" required/></td>
			</tr>
			<tr>
				<th><label for="age">Age:</label></th>
				<td><input type="number" name="age" min="18" max="120" value="<?php echo $age?>" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
	} //end function showForm
?>

</body>
</html>
