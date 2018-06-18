<?php

//Start new or resume existing session  http://php.net/manual/en/function.session-start.php
session_start();

if(isset($_POST['login']) && $_POST['password'])
{
	$password=$_POST['password'];
	if($password=="demo")
	{
		$_SESSION['loggedin']="yes";
	}
	else
	{
		$error="<p>Incorrect Password entered, please try again</p>";
	}
}

if(isset($_POST['logout']))
{
	unset($_SESSION['loggedin']);
}
?>

<html>
<head>

</head>
<body>
  <h1>Testing Password Page</h1>
  <p>Single page with two forms, which one is shown depends on whether you have logged in or not</p>
  <p>A session is used (cookie) to record the fact that you are logged in.</p>
  <p>The code to handle both forms is at the top of this page</p>
  
<?php

if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']=="yes")
{
 ?>
 <h2>Password accepted</h2>
 <form method="post" action="" id="logout_form">
  <input type="submit" name="logout" value="Logout">
 </form>
 <?php
}
else
{
 ?>
 <form method="post" action="" id="login_form">
  <h2>Enter Password</h2>
  <input type="password" name="password" placeholder="*******">
  <input type="submit" name="login" value="Login">
  <p>"Password : demo"</p>
 </form>
 <?php
	if (isset($error)){
		echo $error;
	}
}
?>

</body>
</html>