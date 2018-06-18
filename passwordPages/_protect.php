<?php 
$Password = 'demo'; // Set your password here
session_start();

//check to see if the user has already logged in
//and if not logged in so check and see if the user just tried to login
if (isset($_SESSION['loggedin']) and $_SESSION['loggedin']=="yes") {
	//allow the page to load as we have logged in on a past page
} elseif (isset($_POST['submit_pwd'])) { 
   $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : ''; 
      
   if ($pwd != $Password) { 
      showForm("Wrong password entered please try again"); 
      exit();      
   } else {
	   $_SESSION['loggedin']="yes";
   }
} else { 
   showForm(); 
   exit(); 
}

//this creates a page with a login form
function showForm($msg="Please Login"){ 
?> 
<html> 
<body> 
  <p><?php echo $msg; ?></p>
  <form action="" method="post" name="pwd"> 
    Password: 
	<input name="pwd" type="password"/><br/> 
          <input type="submit" name="submit_pwd" value="Login"/> 
   </form> 
</body>
</html>       
<?php    
} 
?>