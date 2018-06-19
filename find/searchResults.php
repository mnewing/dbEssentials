<!DOCTYPE>

<html>
<head>
    <title>Search Results</title>
    <meta name="description" content="Displays data stored in the database">
</head>

<body >

<h1>Notes</h1>
<p>Connects to the database and fetch all records that match the users search criteria and display them using a HTML table.</p>

<h1>Search Results</h1>

<?php
	
	if (!empty($_POST['fname']) and !empty($_POST['surname'])){
		$query = 'select * from person where fname like "%'.$_POST['fname'].'%" OR surname like "%'.$_POST['surname'].'%" ';
	} elseif (!empty($_POST['fname'])) {
		$query = 'select * from person where fname like "%'.$_POST['fname'].'%" ';
	} elseif  (!empty($_POST['surname'])) {
		$query = 'select * from person where surname like "%'.$_POST['surname'].'%" ';
	} else {
		$query = 'select * from person';
	}
	echo $query."<br />";

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
				echo "  <td><a href='deletePerson.php?ref=".$row['id']."'>Delete</a></td>";
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
