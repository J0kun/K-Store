<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/50fcaa8399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="images/logo.ico">

  <title>Login</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="Images/logo.jpeg" alt="logo" width="100" height="100">
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
      <li class="nav-item"><a class="nav-link fs-5" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="Products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="Contact-Us.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="Contact-Us.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link fs-5" id="login" href="Login-Signup.php">Login</a></li>
        <li class="dropdown-center nav-item">
          <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
          </a>
          <ul class="dropdown-menu">
              <a class="nav-link fs-5" href="ManageProducts.php">News</a>
              <a class="nav-link fs-5" href="admin/ManageUsers.php">Users</a>
          </ul>
      </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



  <?php
  include 'DB.php';
  $table = 'users';
  $regex = "/(?:[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*|\"(?:[\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x21\\x23-\\x5b\\x5d-\\x7f]|\\\\[\\x01-\\x09\\x0b\\x0c\\x0e-\\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x21-\\x5a\\x53-\\x7f]|\\\\[\\x01-\\x09\\x0b\\x0c\\x0e-\\x7f])+)\\])/";


  if(isset($_POST['signup']))
  {
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
    if(strlen($_POST['firstname']) == 0 && strlen($_POST['lastname']) == 0 && strlen($_POST['email']) == 0 && strlen($_POST['password']) == 0 && strlen($_POST['ConfirmPassword']) == 0)
    {
      echo "<script>
      alert('fields are Empty please fill in the blanks');
          </script>";
    }
    else if(strlen($_POST['firstname']) == 0 || strlen($_POST['lastname']) == 0 || strlen($_POST['email']) == 0 || strlen($_POST['password']) == 0 || strlen($_POST['ConfirmPassword']) == 0){
      echo "<script>
      alert('one or more fields are Empty please fill in the blanks');
      </script>";
    }

    else if(!preg_match($regex, $_POST['email'])) {
      echo "<script>
      alert('Email is not valid');
      </script>";
        }
        else if( strlen($_POST['password'])<8){
          echo "<script>
            alert('password must be 8 or more characters');
               </script>";
        }
    else if($_POST['password']!=$_POST['ConfirmPassword'])
    {
      echo "<script>
        alert('password and Confirm Password did not Match');
           </script>";
    }
    else{
      
      $query="select * from users where EMAIL='".$email."'";
      $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)!=0)
        {
          echo"<script>if(!alert('User Already Exists')) document.location = 'index.php';
            </script>";
          exit();

        }
    
        else{
          
mysqli_query($connect, "INSERT INTO `users` VALUES('', '$firstname', '$lastname', '$email' , '$password', '0')") or die(mysqli_error());
echo "<script>
alert('User has been added Succesfully');
alert('Please Wait for the Admin to Approve your Request')
window.location.href='index.php';
</script>";
        
        
        }
    }
    
    
   
    


  
  }
  

  if (isset($_POST['login'])) {


    if (strlen($_POST['email']) == 0 && strlen($_POST['password']) == 0) {
      echo "<script>
    alert('Email and password are Empty please fill the blanks');
    </script>";
    } else if (strlen($_POST['email']) == 0) {
      echo "<script>
alert('Email is Empty please fill the blanks');
</script>";
    } else if (strlen($_POST['password']) == 0) {
      echo "<script>
alert(' password is Empty please fill the blanks');
</script>";
    } else {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $result = mysqli_query($connect, "select * from users where EMAIL='$email' and PASSWORD ='$password'");
      $row = mysqli_fetch_array($result);

      if (mysqli_num_rows($result) == 0) {
        echo "<script>
      alert('Email or Password are not correct please check and try again');
      </script>";
      } else if (mysqli_num_rows($result) == 1) {
        $type = $row['TYPE'];
        if ($type == 1 || $type == 2) {

          header('location: index.php');
          $_SESSION['firstname'] = $row['FIRSTNAME'];
          $_SESSION['type'] = $row['TYPE'];
          $_SESSION['lastname'] = $row['LASTNAME'];
          $_SESSION['email'] = $row['EMAIL'];
        } else {

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

    <div class="big_container" id="logincontainer">
      <div class="form-container sign-up-container">

        <form action="Login-Signup.php" class="signup_form" method="post">
          <h1 class="signup-h1">Create Account</h1>

          <input type="text" class="login-input" name="firstname" placeholder="FirstName" value="<?php if (isset($_POST['firstname'])) {
                                                                                                    echo $_POST['firstname'];
                                                                                                  } ?>">
          <input type="text" class="login-input" name="lastname" placeholder="LastName" value="<?php if (isset($_POST['lastname'])) {
                                                                                                  echo $_POST['lastname'];
                                                                                                } ?>">
          <input type="email" class="login-input" id="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                      } ?>">
          <input type="password" class="login-input" name="password" placeholder="Password">
          <input type="password" class="login-input" name="ConfirmPassword" placeholder="Confirm Password">

          <button type="submit" id="submit-signup" name="signup" class="btn btn-primary">Sign Up</button>


        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="Login-Signup.php" method="post" class="signin_form">
          <h1 class="login-h1">Sign In</h1>
          
              
          <input type="email" class="login-input" name="email" placeholder="Email">
          <input type="password" class="login-input" name="password" placeholder="Password">
          <button type="submit" name="login" class="btn btn-primary">Login</button>

          <a href="admin/ForgetPassword.php">Forgot Your Password</a>
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

    <footer class="text-center text-lg-start bg-light text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->

        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Products
              </h6>
              <p>
                <a href="#!" class="text-reset">Angular</a>
              </p>
              <p>
                <a href="#!" class="text-reset">React</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vue</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Laravel</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->

              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> Makah Mall, Sana'a, Yemen</p>
              <p class="email"><a class="text-decoration-none" href="mailto:koreanstore2022@gmail.com">koreanstore2022@gmail.com</a></p>
              <a class="phone text-decoration-none" href="tel:00967779977171">00967779977171</a>
            </div>
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">opening hours</h5>
              <table class="table" style="color: #4f4f4f; border-color: #666;">
                <tbody>



                  <td>Mon - Fri:</td>
                  <td>8am - 9pm</td>
                  </tr>
                  <tr>
                    <td>Sat - Sun:</td>
                    <td>8am - 1am</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
        <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="copyright">

        <em>YagoTech &copy;<?php echo date("Y") ?> All Rights Reserved</em>
      </div>
      <!-- Copyright -->
    </footer>
  </body>

  </html>













  </footer>
</body>

</html>