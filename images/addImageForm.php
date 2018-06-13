 <!DOCTYPE html>  
 <html>  
	<head>  
	</head>  

	<body>  
		<h1>Insert and Display Images</h1> 
		
		<p>select the image you wish to store in the database</p>
		<form method="post" enctype="multipart/form-data" action="addImage.php">  
			 <input type="file" name="image" id="image" /> 
			 <br />  
			 <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
		</form>  
		<br />  
		<br />

		<h2>Images</h2>
		<p>Current set of images in the database</p>

		<?php  
		$query = "SELECT * FROM test ORDER BY id DESC";
		require_once '../../../../_connectionInfo.php';  //load the connection info		
		$result = mysqli_query($con, $query);

		while($row = mysqli_fetch_array($result))  
		{  
			 echo '  
					<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" />  <br />
			 ';  
		}  
		?>  
      </body>  
 </html>