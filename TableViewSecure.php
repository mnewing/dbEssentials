<!DOCTYPE>

<html>
<head>
    <title>Table View</title>
    <meta name="description" content="Displays data stored in the database">
</head>

<body >

<h1>View</h1>
<p>Connects to the database and fetch all records from a table and display them using a HTML table.</p>

<p>Database connection info is stored in a seperate file outside of the webserver root for security purposes. The connection info is accessed by including the file into this file. In addition to security this means if this changes it only has to change in a single location</p>

<p>To use this you will need to create a file with the database connection info in as follows:</p>
<pre>
<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "test";
$con = mysqli_connect($server, $user, $password, $database);
?>
</pre>


<?php
	$query = "select * from person";
	require_once '../../../_connectionInfo.php';  //load the connection info
	
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
