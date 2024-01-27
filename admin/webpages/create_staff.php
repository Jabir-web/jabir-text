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

  .btn-primary {
    background: linear-gradient(90deg, rgba(107, 0, 170, 1) 0%, rgba(159, 0, 170, 1) 100%) !important;
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
                      <?php
                      if (isset($_GET['alert']) == "staffadded") {
                        # code...
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> You Staff Has Been Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      } else if (isset($_GET['alert']) == "staffnotadded") {
                        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> You Staff Has Not Been Added
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
                          <h3>Add Staff</h3>
                          <p class="mb-3">Let's Get Started</p>
                        </div>
                        <div class="col-md-2">
                          <a href="total_staff.php" class="btn btn-block btn-primary text-light btn-lg">Total
                            Staff</a>
                        </div>
                      </div>

                      <form action="../logics/insert.php" method="post" id="staffform" autocomplete="off"  enctype="multipart/form-data">
                        <div>
                          <div id="img-preview"></div>
                          <input type="file" id="choose-file" name="staffile" />
                          <label for="choose-file">Choose Image</label>
                        </div>
                        <div class="form-group">
                          <input type="text" name="staff_name" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Staff FullName">

                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="staff_pnumber" class="form-control form-control-lg"
                                id="exampleInputEmail1" placeholder="Enter Staff Phone Number">
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="staff_nic" class="form-control form-control-lg"
                                id="exampleInputEmail1" placeholder="Enter Staff CNIC Number">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="staff_salary" class="form-control form-control-lg"
                                id="exampleInputEmail1" placeholder="Enter Salary">
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="staff_religion" class="form-control form-control-lg"
                                id="exampleInputEmail1" placeholder="Enter Religion">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="number" name="staff_age" class="form-control form-control-lg"
                                placeholder="Enter Staff Age">
                            </div>
                            <div class="col-md-6">
                              <select name="staff_timing" id="" class="form-control form-control-lg">
                                <option value=" ">Select Staff Timing</option>
                                <option>3 to 6 PM</option>
                                <option>6 to 9 PM</option>
                                <option>3 to 9 PM</option>
                              </select>
                            </div>
                          </div>
                        </div>


                        <textarea id="exampleFormControlTextarea1" placeholder="Address" name="staff_address"
                          class="border rounded p-3" rows="4" style="width:100%;"></textarea>




                        <div class="mt-3">
                          <button class="btn btn-block btn-primary text-light btn-lg font-weight-medium auth-form-btn"
                            type="submit" id="staffbtn" name="staffaddbtn">Add Staff</button>
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