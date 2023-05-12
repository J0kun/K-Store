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
        <li class="nav-item"><a class="nav-link fs-5" href="All_products.php?id=<?php echo md5(0) ?>">Products</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="About.html">About Us</a></li>
        <li class="nav-item"><a class="nav-link fs-5" id="login" href="Login-Signup.php">Login</a></li>
        <li class="dropdown-center nav-item">
          <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
          </a>
          <ul class="dropdown-menu">
              <a class="nav-link fs-5" href="ManageProducts.php">News</a>
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
<button type="button" class="btn btn-primary adduser" data-bs-toggle="modal" data-bs-target="#form_modal" data-bs-whatever="@mdo">Add User</button>

<table class='ManageTable' id='mytable'>
<thead>
    <tr>
    <th>No</th>
        <th>ID.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>

				<?php
					require 'DB.php';
          $i=1;
          
					$query = mysqli_query($connect, "SELECT * FROM `users`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr>
          <?php
          $id=$fetch['ID'];
          $querytype="select TYPE from `users` where ID=$id";
          $resulttype=mysqli_query($connect,$querytype);
          $row=mysqli_fetch_array($resulttype);
          ?>
          <td><?php echo $i++ ?></td>
					<td><?php echo $fetch['ID']?></td>
					<td><?php echo $fetch['FIRSTNAME']?></td>
          <td><?php echo $fetch['LASTNAME']?></td>
          <td><?php echo $fetch['EMAIL']?></td>
          <td><?php echo $fetch['TYPE']?></td>
          <td><button type="button" class="btn btn-warning action" data-bs-toggle="modal" data-bs-target="#edit<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Update</button>
          <button type="button" class="btn btn-danger action" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Delete</button></td>
        


          <div class="modal fade" id="delete<?php echo $fetch['ID']?>" aria-hidden="true">
          <div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="updatenews" enctype="multipart/form-data" action="delete.php">
				<div class="modal-header">
					<h3 class="modal-title">Delete User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
						<div class="form-group">
							<label>First Name</label>
							<input type="hidden" value="<?php echo $fetch['ID']?>" name="user_id"/>
							<input type="text" class="form-control managenewsupdate" name="firstname" value="<?php echo $fetch['FIRSTNAME']?>" />
						</div>
            <div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control managenewsupdate" name="lastname" value="<?php echo $fetch['LASTNAME']?>" />
						</div>
          
            <div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control managenewsupdate" name="email" value="<?php echo $fetch['EMAIL']?>" />
						</div>
            <div class="form-group type">
							<label>Type</label>
              <input type="radio" name="type" value="1" <?php $type=$row['TYPE']; echo ($type== '1') ? "checked" : "" ; ?>>
              <label>admin</label>
              <input type="radio" name="type" value="2" <?php $type=$row['TYPE']; echo ($type== '2') ? "checked" : "" ; ?>>
              <label>user</label>
						</div>

						
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" name="deleteuser"><span class="glyphicon glyphicon-save"></span> Delete</button>
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
					<h3 class="modal-title">Edit User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
						<div class="form-group">
							<label>First Name</label>
							<input type="hidden" value="<?php echo $fetch['ID']?>" name="user_id"/>
							<input type="text" class="form-control managenewsupdate" name="firstname" value="<?php echo $fetch['FIRSTNAME']?>" />
						</div>
            <div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control managenewsupdate" name="lastname" value="<?php echo $fetch['LASTNAME']?>" />
						</div>
            <div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control managenewsupdate" name="email" value="<?php echo $fetch['EMAIL']?>" />
						</div>
            <div class="form-group type">
							<label>Type</label>
              <input type="radio" name="type" value="1" <?php $type=$row['TYPE']; echo ($type== '1') ? "checked" : "" ; ?>>
              <label>admin</label>
              <input type="radio" name="type" value="2" <?php $type=$row['TYPE']; echo ($type== '2') ? "checked" : "" ; ?>>
              <label>user</label>
						</div>

						
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="updateuser"><span class="glyphicon glyphicon-save"></span> Update</button>
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
					<h3 class="modal-title">Add User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-8 addnews">
						<div class="form-group">
							<label>First Name</label>
							<input type="text"  class="form-control managenewsadd" name="firstname" required="required"/>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control managenewsadd" name="lastname" required="required"/>
						</div>
            <div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control managenewsadd" name="email" required="required"/>
            </div>
            <div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control managenewsadd" name="password" required="required"/>
            </div>
            <div class="form-group">
							<label>Confirm Password</label>
							<input type="password" class="form-control managenewsadd" name="confirmpassword" required="required"/>
            </div>
            <div class="form-group type">
							<label>Type</label>
              <input type="radio" name="type" value="1" required>
              <label>admin</label>
              <input type="radio" name="type" value="2">
              <label>user</label>
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" name="saveuser"><span class="glyphicon glyphicon-save"></span> Add</button>
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