<!DOCTYPE>

<html>
<head>
    <title>Table View</title>
    <meta name="description" content="Displays data stored in the database">
</head>

<body >

<h1>Notes</h1>
<p>Connects to the database and fetch all records from a table and display them using a HTML table.</p>

<p>includes a link to edit a record that calls the edit page and passes the ID of the record to delete. the link is a standard aanchor tag and the id is passed as an argument.</p>
<p>Editing is a three step process<br />
<ol>
<li>allow the user to pick which record to edit - view.php</li>
<li>load the form prefilled with the current data in the DB - editPersonForm.php</li>
<li>update the record with the data from the form - editPerson.php</li>
</ol>
 </p>


<h1>View</h1>

<?php
	$query = "select * from person";
	require_once '../../../../_connectionInfo.php';  //load the connection info
	
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
				<th></th>
			  </tr>
			';

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo "<tr>";
				echo "  <td>".$row['id']."</td>";
				echo "  <td>".$row['fname']."</td>";
				echo "  <td>".$row['surname']."</td>";
				echo "  <td>".$row['age']."</td>";
				echo "  <td><a href='editPersonForm.php?ref=".$row['id']."'>Edit</a></td>";
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
