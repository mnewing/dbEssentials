<?php
	require_once('./_protect.php');
	
	//do this once you have checked that you are logged in_array
	if(isset($_POST['logout']))
	{
		unset($_SESSION['loggedin']);
	}

?>

<!DOCTYPE html>

<html>
<head>
</head>

<body >
<h1>Logout</h1>
 <form method="post" action="" id="logout_form">
  <input type="submit" name="logout" value="Logout">
 </form>


</body>
</html>
