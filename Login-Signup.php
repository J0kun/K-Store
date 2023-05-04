<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link
            href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap"
            rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
            <link rel="icon" type="image/x-icon" href="images/logo.ico">

        <title>Login</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand"><img class="logo" src="images/logo.png" height="80px" width="80px" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      
    <ul class="navbar-nav mx-auto">
    
        <li class="nav-item"><a class="nav-link fs-5" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="About.php">About</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="Contact-Us.php">Contact Us</a></li>


          <li class="nav-item"><a class="nav-link fs-5" id="login" href="Login-Signup.php">Login</a></li>
          <?php

        if(!empty($_SESSION['firstname'])){
            if($_SESSION['type']==1){
                ?>
                <li class="dropdown-center nav-item">
                <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                  Manage
                </a>
                <ul class="dropdown-menu">
                    <a class="nav-link fs-5" href="admin/ManageNews.php">News</a>
                    <a class="nav-link fs-5" href="admin/ManageUsers.php">Users</a>
                </ul>
            </li>
            <?php
            }
            ?>
           

       <?php
        }
         ?>

   
       
    </ul>

   
    <div class="account">
    <h1 class="username fs-6 text-end "><?php
        if(!empty($_SESSION['firstname']))
        {

            $FN= $_SESSION['firstname']; $LN=$_SESSION['lastname']; echo  ucwords($FN)." ". ucwords($LN);         

        }
        else{
         
        }
         
         ?></h1>
<?php
         if(!empty($_SESSION['firstname']))
         {
            ?>
            <a class="logout" onclick="myFunction()">Log out</a>
            <script>
  function myFunction() {
    var logout = confirm("Are you sure you want to LOG OUT ?");
  
  if(logout){
       location.href = "admin/Logout.php";
  }
  }
  </script>
  <?php
         }
         else{
          
         }
         
?>
    </div>
  
  </div>
</nav>

    
    
    <?php
    include 'DB.php';
      $table='users';
      $regex = "/(?:[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*|\"(?:[\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x21\\x23-\\x5b\\x5d-\\x7f]|\\\\[\\x01-\\x09\\x0b\\x0c\\x0e-\\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x21-\\x5a\\x53-\\x7f]|\\\\[\\x01-\\x09\\x0b\\x0c\\x0e-\\x7f])+)\\])/";
 

     
      
if(isset($_POST['login']))
{


  if(strlen($_POST['email']) == 0 && strlen($_POST['password']) == 0)
  {
    echo "<script>
    alert('Email and password are Empty please fill the blanks');
    </script>";
  }

  else if(strlen($_POST['email']) == 0)
  {
    echo "<script>
alert('Email is Empty please fill the blanks');
</script>";
  }
  else if(strlen($_POST['password']) == 0){
    echo "<script>
alert(' password is Empty please fill the blanks');
</script>";
  }
  

  else{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $result=mysqli_query($connect,"select * from users where EMAIL='$email' and PASSWORD ='$password'");
    $row=mysqli_fetch_array($result);

    if(mysqli_num_rows($result)==0)
    {
      echo "<script>
      alert('Email or Password are not correct please check and try again');
      </script>";
    }
     

    else if(mysqli_num_rows($result)==1)
{
      $type=$row['TYPE'];
     if($type==1||$type==2)
     {
     
      header('location: index.php');
      $_SESSION['firstname']=$row['FIRSTNAME'];
      $_SESSION['type']=$row['TYPE'];
     $_SESSION['lastname']=$row['LASTNAME'];
     $_SESSION['email']=$row['EMAIL'];
     }
     else
     {
     
        echo "<script>
alert('Your Request has not been approved pleace contact your admin')
window.location.href='Login-Signup.php';
</script>";
     }

    }
   
   
  }
    


}
?>
     
     <!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="logincontainer">
<div class="form-container sign-up-container">

<form action="Login-Signup.php" id="form" method="post">
	<h1 class="signup-h1">Create Account</h1>
	
	<input type="text" class="login-input" name="firstname" placeholder="FirstName" value="<?php if(isset($_POST['firstname']))
  {
    echo $_POST['firstname'];
  } ?>">
  <input type="text" class="login-input" name="lastname" placeholder="LastName" value="<?php if(isset($_POST['lastname']))
  {
    echo $_POST['lastname'];
  } ?>">
  <input type="text" class="login-input" name="jobplace" placeholder="Job Place" value="<?php if(isset($_POST['jobplace']))
  {
    echo $_POST['jobplace'];
  } ?>">
  <input type="number" class="login-input" name="experience" placeholder="Years of Experience" value="<?php if(isset($_POST['experience']))
  {
    echo $_POST['experience'];
  } ?>">
  <input type="text" class="login-input" name="degree" placeholder="Highest Educational Degree" value="<?php if(isset($_POST['degree']))
  {
    echo $_POST['degree'];
  } ?>">
	<input type="email" class="login-input" id="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email']))
  {
    echo $_POST['email'];
  } ?>">
	<input type="password" class="login-input" name="password" placeholder="Password">
  <input type="password" class="login-input" name="ConfirmPassword" placeholder="Confirm Password">

  <button type="submit" id="submit-signup" name="signup" class="btn btn-primary">Sign Up</button>


</form>
</div>
<div class="form-container sign-in-container">
	<form action="Login-Signup.php" method="post">
		<h1 class="login-h1">Sign In</h1>
	<input type="email" class="login-input" name="email" placeholder="Email">
	<input type="password" class="login-input" name="password" placeholder="Password">
	<a href="admin/ForgetPassword.php">Forgot Your Password</a>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1 id="welcome-back">Welcome</h1>
			<p>To stay connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1 id="hello">Welcome Back!</h1>
			<p>Enter your details and start the journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('logincontainer');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>









   

    <footer>


      <div class="footer_container">
      <div class="row">
      <div class="col-4 " id="links">
       
        <div class="contact-div">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <h2 class="location fs-5">Zubairi.St, Sana'a, Yemen</h2>
        </div>
        <div class="contact-div" >
      
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg>
       
          <a class="phone text-decoration-none" href="tel:00967772379364">00967772379364</a>
      </div>
      
       <div class="contact-div" > 
         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
          </svg>
          <p class="email"><a class="text-decoration-none" href="mailto:yemenipsychiatric@gmail.com">yemenipsychiatric@gmail.com</a></p>
       
        </div>
      </div>
      
      
      
      <div class="col-4">
        <h1 class="fs-4 text-start">OVERVIEW</h1>
        <div class="footer_links">
         
          <ul>
            
             <li ><a class="list-group-item text-start" href="index.php">Home</a> </li>
             <li ><a class="list-group-item text-start" href="About.php">About</a> </li>
             <li ><a class="list-group-item text-start" href="News.php">News</a> </li>
                <li><a class="list-group-item text-start" href="Contact-Us.php">Contact Us</a> </li>
                
             </ul>
        </div>
        
      </div>
      
      
        <div class="col-4">
        <h1 class="fs-4 text-start">MY ACCOUNT</h1>
        <ul>
          <li><a class="list-group-item text-start">My Account</a></li>
          <li><a href="Login-Signup.php" class="list-group-item text-start">Login/Register</a></li>
        </ul>
      </div>

      
      
      </div>
      
      
      </div>  
      
      <div class="copyright">
      
      <em>YagoTech &copy;<?php echo date("Y") ?> All Rights Reserved</em> 
      </div> 
      
      </footer>
</body>
</html>