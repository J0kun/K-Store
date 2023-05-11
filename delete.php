<?php
	require_once 'DB.php';
	if(ISSET($_POST['delete'])){
		$image_name = $_FILES['photodelete']['name'];
		$image_temp = $_FILES['photodelete']['tmp_name'];
		$user_id = $_POST['user_id'];


				mysqli_query($connect, "DELETE FROM `products` WHERE ID='$user_id'") or die(mysqli_error());
				echo"<script>if(!alert('Product has been Deleted'))
    document.location = 'ManageProducts.php';
              </script>";
		
	}

	if(ISSET($_POST['deleteuser'])){
		$user_id = $_POST['user_id'];


			
				mysqli_query($connect, "DELETE FROM `users` WHERE ID='$user_id'") or die(mysqli_error());
				echo"<script>if(!alert('User has been Deleted'))
    document.location = 'ManageUsers.php';
              </script>";
		
	}

	if(ISSET($_POST['updateuser'])){
		$user_id = $_POST['user_id'];
		$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$jobplace = $_POST['jobplace'];
    	$experience = $_POST['experience'];
    	$degree = $_POST['degree'];
    	$email = $_POST['email'];
    	$type = $_POST['type'];


			
				mysqli_query($connect, "UPDATE `users` SET FIRSTNAME='$firstname', LASTNAME='$lastname',JOBPLACE='$jobplace',EXPERIENCE='$experience',DEGREE='$degree',EMAIL='$email',TYPE='$type' WHERE ID=$user_id") or die(mysqli_error());
				echo"<script>if(!alert('User has been updated'))
    document.location = 'ManageUsers.php';
              </script>";
		
	}

	
?>