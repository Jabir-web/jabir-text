<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";

?>
<style>

</style>

<body>

  <div class="container-scroller">


    <!-- navbar  -->
    <?php include("navbar.php") ?>
    <!-- navbar  -->
    <div class="container-fluid page-body-wrapper">
      <!-- sidebar  -->

      <?php include("sidebar.php") ?>
      <!-- sidebar  -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">

                <div class="tab-content tab-content-basic">

                  <!-- work  -->
                  <div class="conatiner">
                    <div class="signup-form px-5">
                      <?php
                      if (isset($_GET['alert']) == "usadded") {
                        # code...
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> You User Has Been Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      } else if (isset($_GET['alert']) == "usnotadded") {
                        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> You User Has Not Been Added
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');

                      } else {
                        echo ("");
                      }
                      ?>
                      <!-- ALERT -->

                      <!-- ALERT -->
                      <div class="row">
                        <div class="col-md-10">
                          <h3>SignUp New User </h3>
                          <p class="mb-3">Let's Get Started</p>
                        </div>
                        <div class="col-md-2">
                          <a href="totalusers.php" class="btn btn-block btn-primary text-light btn-lg">Total Users</a>
                        </div>
                      </div>

                      <form action="../logics/signuplogic.php" method="post" id="signupform " enctype="multipart/form-data">
                       
                       

                        <div>
                          <div id="img-preview"></div>
                          <input type="file" id="choose-file" name="userfile"  />
                          <label for="choose-file">Choose Image</label>
                        </div>

                        <div class="form-group">
                          <input type="text" name="user_fname" class="form-control form-control-lg"
                            placeholder="Enter Fullname">

                        </div>
                        <div class="form-group">
                          <input type="text" name="user_number" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                          <input type="email" name="user_email" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <input type="password" name="user_password" class="form-control form-control-lg"
                            id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                          <input type="password" name="userconfirm_password" class="form-control form-control-lg"
                            id="exampleInputPassword1" placeholder="Enter Confirm Password">
                        </div>
                        <div class="mt-3">
                          <button class="btn btn-block btn-primary text-light btn-lg font-weight-medium auth-form-btn"
                            type="submit" id="signupbtn">SIGNUP</button>
                        </div>



                      </form>
                    </div>
                  </div>
                  <!-- work  -->

                  <!-- partial:partials/_footer.html -->
                  <footer class="footer">
                    <div class="d-sm-flex justify-content-center ">
                      <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
                      <span class="mt-1 mt-sm-0 text-center">Copyright Elixir© 2023. All rights reserved.</span>
                    </div>
                  </footer>
                  <!-- partial -->
                </div>
                <!-- main-panel ends -->
              </div>
              <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->

            <?php

            include "script.php";
            
            
            ?>

      
</body>

</html>