<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";

?>
<style>
  .error {
    color: #F00;
    /* background-color: #FFF; */
    background-color: none !important;
  }
  .btn-primary{
    background: linear-gradient(90deg, rgba(107,0,170,1) 0%, rgba(159,0,170,1) 100%) !important;
  }
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
                     
                  

                      <!-- ALERT -->
                      <div class="row">
                        <div class="col-md-10">
                        <h3>Update Service</h3>
                      <p class="mb-3">Let's Get Started</p>
                        </div>
                        <div class="col-md-2">
                            <a href="total_service.php" class="btn btn-block btn-primary text-light btn-lg">Total Services</a>
                        </div>
                      </div>
                    <?php
                    
                    include "../logics/conn.php";
                    if (isset($_GET['servid'])) {
                        # code...
                        
                        $sql="SELECT * FROM services WHERE service_id= '{$_GET['servid']}'";
                        $result=mysqli_query($connection,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while($row=mysqli_fetch_assoc($result)){
                    
                    
                    ?>
                      <form action="../logics/update.php" method="post" id="serviceform" autocomplete="off">
                        <input type="hidden" name="servupdateid" value="<?php echo $row['service_id']?>">
                        <div class="form-group">
                          <input type="text" name="service_name" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Service Name" value="<?php echo $row['service_name']?>">

                        </div>
                        <div class="form-group">
                          <input type="text" name="service_fee" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Service Fee"  value="<?php echo $row['service_fee']?>">
                        </div>
                     
                        <div class="mt-3">
                          <button class="btn btn-block btn-primary text-light btn-lg font-weight-medium auth-form-btn"
                            type="submit" id="servicebtn" name="serviceupdatebtn">Update</button>
                        </div>



                      </form>

                      <?php
                              }
                            }
                            
                        }
                      
                      ?>
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