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
                      <?php
                


                      include "../logics/conn.php";
                      if (isset($_GET['seid'])) {
                        # code...
                        $seid=$_GET['seid'];
                        
                        $sql="SELECT * FROM staff WHERE staff_id='{$seid}'";
                        $result=mysqli_query($connection,$sql);
                        if(mysqli_num_rows($result)>0) {
                            while($row=mysqli_fetch_assoc($result)){
                    ?>



                  
                      <div class="row">
                        <div class="col-md-10">
                        <h3>Update Staff</h3>
                      <p class="mb-3">Let's Get Started</p>
                        </div>
                        <div class="col-md-2">
                            <a href="total_service.php" class="btn btn-block btn-primary text-light btn-lg">Total Staff</a>
                        </div>
                      </div>
                    
                      <form action="../logics/update.php" method="post" id="staffform" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $row['staff_id'] ?>" name="usid" id="">
                        <input type="hidden" name="oldimage" value="<?php echo $row['staff_img'] ?>" id="">
                        <img src="../upload/staff/<?php echo $row['staff_img'] ?>" class="rounded w-25 h-25"  alt="">
                        <h6 class="my-3">Old Image</h6>
                        <div>
                          
                          <div id="img-preview"></div>
                          <input type="file" id="choose-file" name="ustaffile"  />
                          <label for="choose-file">Update Image</label>
                        </div>
                        
                      
                        <div class="form-group">
                          <input type="text" name="ustaff_name" class="form-control form-control-lg"
                             placeholder="Enter Staff FullName" value="<?php echo $row['staff_name'] ?>">

                        </div>
                        
                        <div class="form-group">
                         <div class="row">
                            <div class="col-md-6">
                            <input type="text" name="ustaff_pnumber" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Staff Phone Number" value="<?php echo $row['staff_pnumber'] ?>">
                            </div>
                            <div class="col-md-6">
                            <input type="text" name="ustaff_nic" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Staff CNIC Number" value="<?php echo $row['staff_cnic'] ?>">
                            </div>
                         </div>
                        </div>

                        <div class="form-group">
                         <div class="row">
                            <div class="col-md-6">
                            <input type="text" name="ustaff_salary" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Salary" value="<?php echo $row['staff_salary'] ?>">
                            </div>
                            <div class="col-md-6">
                            <input type="text" name="ustaff_religion" class="form-control form-control-lg"
                            id="exampleInputEmail1" placeholder="Enter Religion" value="<?php echo $row['staff_religion'] ?>">
                            </div>
                         </div>
                        </div>

                        <div class="form-group">
                         <div class="row">
                            <div class="col-md-6">
                            <input type="number" name="ustaff_age" class="form-control form-control-lg"
                             placeholder="Enter Staff Age" value="<?php echo $row['staff_age'] ?>">
                            </div>
                            <div class="col-md-6">
                            <select name="ustaff_timing" id="" class="form-control form-control-lg">
                                <option value=" " ><?php echo $row['staff_timing'] ?></option>
                                <option >3 to 6 PM</option>
                                <option >6 to 9 PM</option>
                                <option >3 to 9 PM</option>
                            </select>
                            </div>
                         </div>
                        </div>


                        <textarea  id="exampleFormControlTextarea1" placeholder="Address" name="ustaff_address" class="border rounded p-3" rows="4" style="width:100%;"><?php echo $row['staff_address'] ?></textarea>
                   
 

                     
                        <div class="mt-3">
                          <button class="btn btn-block btn-primary text-light btn-lg font-weight-medium auth-form-btn"
                            type="submit" id="staffbtn" name="ustaffaddbtn">Update Staff</button>
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