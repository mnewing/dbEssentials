<!DOCTYPE>

<html>
<head>
    <title>Table View</title>
    <meta name="description" content="displays the clients stored in the database">
</head>

<body >

<h1>View</h1>
<p>The most basic of code allowing you to connect to the database and fetch all records from a table and display them using a HTML table.</p>

<p>To use this you will need to change the database settings if you are not running against a local database and make sure that database details match you table.</p>

<?php
	//create the SQL query
	$query = "select * from person";
	//make a connecto the database
	$con = mysqli_connect("localhost", "root", "", "test");
	//run the query and if is well display the data
	if($result = mysqli_query($con, $query))  
	{
		//check and see how may rows where returned
		switch (mysqli_num_rows($result)) {
		  case 0:
			echo "<h>Sorry we cannot find any clients.</p>";
			break;
	  default:
			echo '<table>
			  <tr>
				<th>id</th>
				<th>first name</th>
				<th>Surname</th>
				<th>Age</th>
			  </tr>
			';

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			  echo "<tr>";
			  echo "  <td>".$row['id']."</td>";
			  echo "  <td>".$row['fname']."</td>";
			  echo "  <td>".$row['surname']."</td>";
			  echo "  <td>".$row['age']."</td>";
			  echo "</tr>";
			}
			echo '</table>';
		} //end switch statment
    } else {
		//an error occured fetch data so report back to the user 
		echo '<p>An unexpected error occured and we are unable to continue.</p>';
		echo("Error description: " . mysqli_error($con)); //debug only - remove this in release version
    }
	//tidy up
	mysqli_close($con);
?>

</body>
</html>
