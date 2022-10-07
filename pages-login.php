<?php
include "./shared/head.php";
include "./general/config.php";

$error = "";
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $select ="SELECT * FROM `admin` where email = '$email' and password= $password";
  $s= mysqli_query($conn, $select);
   $numRows= mysqli_num_rows($s);
   $row = mysqli_fetch_assoc($s);
  if($numRows > 0){
    echo "<script>
    window.location.replace('/testinstant/dashboard.php');
    </script>";   
     $_SESSION['admin'] = $email; 
     $_SESSION['name'] = $row['name']; 
     $_SESSION['adminId'] = $row['id']; 

  }else{
    $error = "please enter correct data";
  }
}
 



if(!isset($_SESSION['admin'])){
  //  echo"<script>
  // window.location.replace('/testinstant/');
  // </script>";
 
}

?>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a class="logoimg" href="/testinstant/index.php" class="logo d-flex align-items-center w-auto">
                  <img src="/testinstant/assets/img/instant_logo2.jpg" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST">

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" required class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                      <div class="text-danger">  <?=  $error  ?> </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" required class="form-control" id="yourPassword" required>
                      <div class="text-danger">  <?=  $error  ?> </div>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

           
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
              
                Designed by <a href="/testinstant/index.php">Instant Team 2</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  
  <?php 
  include "./shared/script.php";
  ?>
