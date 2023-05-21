<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="../K-Store/index.js">
    </script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Montserrat&display=swap" rel="stylesheet">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

        <script
        link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"

            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.ico">
    
    <title>Home</title>
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
        <li class="nav-item"><a class="nav-link fs-5" href="All_products.php?id=<?php echo md5(0) ?>">Products</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="About.html">About Us</a></li>
        <li class="nav-item"><a class="nav-link fs-5" id="login" href="Login-Signup.php">Login</a></li>
        <li class="dropdown-center nav-item">
          <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
          </a>
          <ul class="dropdown-menu">
              <a class="nav-link fs-5" href="ManageProducts.php">Products</a>
              <a class="nav-link fs-5" href="ManageUsers.php">Users</a>
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
<div class="first-container">
<img id="banner" src="Images/7.png" alt="">

  <div class="left">
    <h1 class="first_container_heading" >something </h1>

  </div>
  
</div>

<div class="second_container ">
  
<div class="row">
<?php
$cosrx='cosrx';
$somebymi='somebymi';
$farmstay='farmstay';
$ekel='ekel';
?>
  <div class="col-sm-6 col-lg-3 reveal reveal_one">
    <div class="card">
      <div class="">
      <a href="Products.php?id=<?php echo md5($cosrx)?>"><img class="card_image" src="Images/IMG_1838.JPG" alt=""></a>
      </div>
      <div class="card-footer">
      <a href="Products.php?id=<?php echo md5($cosrx)?>"><img class="card_company" src="Images/cosrx-logo.png" alt=""></a>
        <p class="card_paragraph">Lorem ipsum</p>
      </div>
    </div>
  </div>
  
  <div class="col-sm-6 col-lg-3 reveal reveal_two">
    <div class="card">
      <div class="">
      <a href="Products.php?id=<?php echo md5($farmstay)?>"><img class="card_image" src="Images/IMG_1837.JPG"  alt=""> </a>
      </div>
      <div class="card-footer">
      <a href="Products.php?id=<?php echo md5($farmstay)?>"><img class="card_company" src="Images/farmstay-logo.png" alt=""></a>
        <p class="card_paragraph">Lorem ipsum</p>
      </div>
      
    </div>
  </div>
 
  <div class="col-sm-6 col-lg-3 reveal reveal_three">
    <div class="card">
      <div class="">
      <a href="Products.php?id=<?php echo md5($ekel)?>"><img class="card_image" src="Images/IMG_1838.JPG"  alt=""></a>
      </div>
      <div class="card-footer">
      <a href="Products.php?id=<?php echo md5($ekel)?>"><img class="card_company" src="Images/ekel-logo.png" alt=""> </a>
        <p class="card_paragraph">Lorem ipsum</p>
      </div>
      
    </div>
  </div>
 

  <div class="col-sm-6 col-lg-3 reveal reveal_four">
    <div class="card">
      <div class="">
      <a href="Products.php?id=<?php echo md5($somebymi)?>"><img class="card_image" src="Images/IMG_1837.JPG"  alt=""></a>
      </div>
      <div class="card-footer">
      <a href="Products.php?id=<?php echo md5($somebymi)?>"><img class="card_company" src="Images/somebymi-logo.png" alt=""></a>
        <p class="card_paragraph">Lorem ipsum</p>
      </div>

    </div>
    
  </div>
</div>

</div>

<div class="third_container row">
  <h2>BRANDS</h2>
<div class="row gy-5">


<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-header">
            <img class="brands" src="Images/cosrx-logo.png" alt="">
        </div> 
        </div>
    </div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img  class="brands" src="Images/ekel-logo.png" alt="">
        </div> 
        </div>
    </div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>
   
<div class=" col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/somebymi-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class=" col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class=" col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>

<div class="col-lg-3 col-md-6">
<div class="card">
        <div class="card-header">
            <img class="brands" src="Images/farmstay-logo.png" alt="">
        </div> 
        </div>
</div>


</div>
</div>
<hr>
<div class="fourth_container">
  <h2>RECOMMENDED CATEGORIES</h2>
  <div class="recommendations">

   
  <a href="Products.php?id=<?php echo md5('face mask') ?>"><div class="rec_cat">
    <img src="Images/l.png" alt="">
    <span>Lorem Ipsum</span>
  </div></a>

  <div class="rec_cat">
  <img src="Images/l.png" alt="">
  <span>Lorem Ipsum</span>
  </div>

  <div class="rec_cat">
  <img src="Images/l.png" alt="">
  <span>Lorem Ipsum</span>
  </div>

  <div class="rec_cat">
  <img src="Images/l.png" alt="">
  <span>Lorem Ipsum</span>
  </div>

  <div class="rec_cat">
  <img src="Images/l.png" alt="">
  <span>Lorem Ipsum</span>
  </div>

  <div class="rec_cat">
  <img src="Images/l.png" alt="">
  <span>Lorem Ipsum</span>
  </div>

  </div>
</div>


<!-- Footer -->
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
              <tr>
                
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
<!-- Footer -->
</body>
</html>
