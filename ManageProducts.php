<?php session_start(); 
if(!isset($_SESSION['email'])){
  header("location:../Login-Signup.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="CSS/styles.css">
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
            <link rel="icon" type="image/x-icon" href="../images/logo.ico">

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
        <li class="nav-item"><a class="nav-link fs-5" href="About.php">Products</a></li>
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
include_once('DB.php');
$table = 'users';
    
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
        $total_records_per_page = 20;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";


    $result_count = mysqli_query(
    $connect,
    "SELECT COUNT(*) As total_records FROM `users`"
    );
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1



    $result = mysqli_query(
        $connect,
        "SELECT * FROM `users` LIMIT $offset, $total_records_per_page"
        );
        ?>










<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination justify-content-center">
<?php if($page_no > 1){
echo "<li><a class='page-link' href='?page_no=1'>First Page</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a class="page-link" <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>
    

<?php
if ($total_no_of_pages <= 10){  	 
	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
	if ($counter == $page_no) {
	echo "<li class='active'><a class='page-link'>$counter</a></li>";	
	        }else{
        echo "<li><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
        }
}
elseif ($total_no_of_pages > 10){
    if($page_no <= 4) {			
        for ($counter = 1; $counter < 8; $counter++){		 
           if ($counter == $page_no) {
              echo "<li class='active'><a>$counter</a></li>";	
               }else{
                  echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                       }
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
       }
    }
    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for (
             $counter = $page_no - $adjacents;
             $counter <= $page_no + $adjacents;
             $counter++
             ) {		
             if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
            }else{
                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                  
               }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
        else {
            echo "<li><a href='?page_no=1'>1</a></li>";
            echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";
            for (
                 $counter = $total_no_of_pages - 6;
                 $counter <= $total_no_of_pages;
                 $counter++
                 ) {
                 if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";	
                }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                 }
            }   

?>

<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a class="page-link" <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>


<?php if($page_no < $total_no_of_pages){
echo "<li><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>



<div class="table-responsive-sm">
<button type="button" class="btn btn-primary addnews" data-bs-toggle="modal" data-bs-target="#form_modal" data-bs-whatever="@mdo">Add Product</button>

<table class='ManageNews' id='mytable'>
<thead>
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Company</th>
        <th>Details</th>
        <th>Quantity</th>
        <th>Cost</th>
        <th>Price_Retail</th>
        <th>Price_WholeSale</th>
        <th>Units per Dozen</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php
        $i=1;
					require 'DB.php';
					$query = mysqli_query($connect, "SELECT * FROM `products`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
<tr>
				
				
          <td><?php echo $i++ ?></td>
          <td><?php echo $fetch['ID']?></td>
					<td><?php echo $fetch['NAME']?></td>
					<td><img src="<?php echo $fetch['IMAGE']?>" height="80" width="100"/></td>
          <td class="pp"><?php echo substr($fetch['COMPANY'],0,1000) ?></td>	
          <td><?php echo $fetch['DETAILS']?></td>
          <td ><?php echo $fetch['QUANTITY']?></td>	
          <td><?php echo $fetch['COST']?></td>	
          <td><?php echo $fetch['PRICE_RETAIL']?></td>	
          <td><?php echo $fetch['PRICE_WHOLESALE']?></td>	
          <td><?php echo $fetch['UNITS_PER_DOZEN']?></td>		
          <td><button type="button" class="btn btn-warning actionnews" data-bs-toggle="modal" data-bs-target="#edit<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Update</button>
          <button type="button" class="btn btn-danger actionnews" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Delete</button></td>

          <div class="modal fade" id="delete<?php echo $fetch['ID']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="updatenews" enctype="multipart/form-data" action="delete.php">
				<div class="modal-header">
					<h3 class="modal-title">Delete Products</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
          <div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control managenewsadd" name="name" required="required"/>
						</div>

						<div class="form-group">
							<label>Photo</label>
							<input type="file"  class="form-control managenewsadd" name="photo" required="required"/>
						</div>
						
						<select class="form-select" name="company" aria-label="Default select example">
      <option selected>Company</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      </select>
            <div class="form-group">
							<label>Details</label>
              <textarea class="form-control managenewsupdate" rows="10" col="30"  name="details" required="required"></textarea>						
            </div>

            <div class="form-group">
							<label>Quantity</label>
              <input type="number" name="quantity" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Cost</label>
              <input type="number" name="cost" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Price Retail</label>
              <input type="number" name="retail" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Price WholeSale</label>
              <input type="number" name="wholesale" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Units Per Dozen</label>
              <input type="number" name="units" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-save"></span> Delete</button>
      </div>
			</form>
		</div>
	</div>
</div>	


<div class="modal fade" id="edit<?php echo $fetch['ID']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="updatenews" enctype="multipart/form-data" action="edit.php">
				<div class="modal-header">
					<h3 class="modal-title">Edit Products</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
						<div class="form-group">
							<h3>Current Photo</h3>
							<img src="<?php echo $fetch['IMAGE']?>" id="updatelogo" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $fetch['IMAGE']?>"/>
							<label>New Photo</label>
							<input type="file" class="form-control managenewsupdate" name="photoupdate" value="<?php echo $fetch['IMAGE']?>"/>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control managenewsadd" name="name" required="required"/>
						</div>

						<div class="form-group">
							<label>Photo</label>
							<input type="file"  class="form-control managenewsadd" name="photo" required="required"/>
						</div>
						
						<select class="form-select" name="company" aria-label="Default select example">
      <option selected>Company</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      </select>
            <div class="form-group">
							<label>Details</label>
              <textarea class="form-control managenewsupdate" rows="10" col="30"  name="details" required="required"></textarea>						
            </div>

            <div class="form-group">
							<label>Quantity</label>
              <input type="number" name="quantity" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Cost</label>
              <input type="number" name="cost" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Price Retail</label>
              <input type="number" name="retail" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Price WholeSale</label>
              <input type="number" name="wholesale" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Units Per Dozen</label>
              <input type="number" name="units" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
      </div>
			</form>
		</div>
	</div>
</div>	


          </tr>
          <?php
					}
				?>
			</tbody> 
        </table>
        <div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="addnews" action="save.php" enctype="multipart/form-data">
				<div class="modal-header">
					<h3 class="modal-title">Add Product</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-8 addnews">
          <div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control managenewsadd" name="name" required="required"/>
						</div>

						<div class="form-group">
							<label>Photo</label>
							<input type="file"  class="form-control managenewsadd" name="photo" required="required"/>
						</div>
						
						<select class="form-select" name="company" aria-label="Default select example">
      <option selected>Company</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      </select>
            <div class="form-group">
							<label>Details</label>
              <textarea class="form-control managenewsupdate" rows="10" col="30"  name="details" required="required"></textarea>						
            </div>

            <div class="form-group">
							<label>Quantity</label>
              <input type="number" name="quantity" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Cost</label>
              <input type="number" name="cost" class="form-control managenewsadd">
            </div>

            <div class="form-group">
							<label>Price Retail</label>
              <input type="number" name="retail" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Price WholeSale</label>
              <input type="number" name="wholesale" class="form-control managenewsadd">
            </div>
            <div class="form-group">
							<label>Units Per Dozen</label>
              <input type="number" name="units" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" name="saveProduct"><span class="glyphicon glyphicon-save"></span> Add</button>
      </div>
			</form>
		</div>
	</div>
</div>
	



        </div>




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

</body>	
</html>