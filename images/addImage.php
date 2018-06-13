<!DOCTYPE html>  
 <html>  
	<head>  
	</head>  

	<body>  
		<h3 align="center">Adding Image</h3>  

		<?php
		//check we got here from the form before trying to do anything
		 if(isset($_POST["insert"]))  
		 {  
			//ensure that we only add image files to our database.
			$allowed_types = array ( 'image/gif', 'image/jpeg', 'image/png' );
			$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
			$detected_type = finfo_file( $fileInfo, $_FILES['image']['tmp_name'] );
			if ( !in_array($detected_type, $allowed_types) ) {
				die ( 'Please upload an image using the <a href=addImageForm.php >form</a>.' );
			}
			finfo_close( $fileInfo );
			
			//we have a valid image file  so add the image 
			$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
			$query = "INSERT INTO test(image) VALUES ('$file')";

			require_once '../../../../_connectionInfo.php';  //load the connection info
			if(mysqli_query($con, $query))  
			{  
				echo '<p>Image Inserted into Database. Go back to the <a href=addImageForm.php >form</a> to see.</p>';  
			}
		 }  else {
			 echo "<p>please use the <a href=addImageForm.php >form</a> to select the image you wish to add.";
		 }
		 ?>  

		</table>  
      </body>  
 </html>