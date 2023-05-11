<?php
	require_once 'DB.php';
	if(ISSET($_POST['saveProduct'])){
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$ProductName = $_POST['name'];
		$company=$_POST['company'];
		$details=$_POST['details'];
		$quantity=$_POST['quantity'];
		$cost=$_POST['cost'];
		$price_retail=$_POST['retail'];
		$price_wholesale=$_POST['wholesale'];
		$units=$_POST['units'];
		$type=$_POST['type'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($connect, "INSERT INTO `products` VALUES('', '$ProductName', '$path', '$company', '$details','$quantity','$cost','$price_retail','$price_wholesale','$units','$type')") or die(mysqli_error());
				echo"<script>if(!alert('Product has been Added'))
    				document.location = 'ManageProducts.php';
              		</script>";
			}	
		}else{
			echo "<script>alert('Error')</script>";
		}
	}

	if(ISSET($_POST['saveuser'])){
		$query="select * from users where EMAIL='".$_POST['email']."'";
		$result=mysqli_query($connect,$query);
		  if(mysqli_num_rows($result)!=0)
		  {
			echo"<script>if(!alert('User Already Exists'));
			  </script>";
			exit();

		  }
		  else{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$type=$_POST['type'];
			mysqli_query($connect, "INSERT INTO `users` VALUES('', '$firstname', '$lastname', '$email' , '$password', '$type')") or die(mysqli_error());
			echo"<script>if(!alert('User has been Added'))
					document.location = 'ManageUsers.php';
					   </script>";
		  }
		
	}


?>