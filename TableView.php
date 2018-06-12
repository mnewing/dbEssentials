<!DOCTYPE>

<html>
<head>
    <title>Table View</title>
    <meta name="description" content="displays the clients stored in the database">
</head>

<body >

<h1>Manage</h1>

<?php
	$query = "select * from person";
	$con = mysqli_connect("localhost", "root", "", "test");
	if($result = mysqli_query($con, $query))  
	{
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
	  echo '<p>An unexpected error occured and we are unable to continue.</p>';
	  echo("Error description: " . mysqli_error($con)); //debug only - remove this in release version
    }
	mysqli_close($con);
?>

</body>
</html>
