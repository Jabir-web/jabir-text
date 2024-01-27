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
                                            include "../logics/conn.php";
                                            if (isset($_GET['alert']) == "billadded") {
                                                # code...
                                                echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> You Expense Has Been Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                                            } else if (isset($_GET['alert']) == "billnotadded") {
                                                echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> You Expense Has Not Been Added
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
                                                    <h3>Generate Bill</h3>
                                                    <p class="mb-3">Let's Get Started</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="total_bill.php"
                                                        class="btn btn-block btn-primary text-light btn-lg">All
                                                        Bills</a>
                                                </div>
                                            </div>

                                            <form action="../logics/insert.php" method="post" id="billform"
                                                autocomplete="off">

                                                <h5 class="mb-2 text-primary">- - Customer Info - -</h5>
                                                <div class="form-group">
                                                    <input type="text" name="cus_name"
                                                        class="form-control form-control-lg" id="exampleInputEmail1"
                                                        placeholder="Enter Customer Name">

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <input type="text" name="cus_phone"
                                                        class="form-control form-control-lg" id="exampleInputEmail1"
                                                        placeholder="Enter Customer Number">
                                                        </div>
                                                        <div class="col-md-6">
                                                        <select  class="form-control form-control-lg  form-select" name="month"  required>
                                                                <option value="0" selected>Select Month</option>
                                                                <option>January</option>
                                                                <option>February</option>
                                                                <option>March</option>
                                                                <option>April</option>
                                                                <option>May</option>
                                                                <option>Jun</option>
                                                                <option>July</option>
                                                                <option>August</option>
                                                                <option>September</option>
                                                                <option>October</option>
                                                                <option>November</option>
                                                                <option>December</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                                <h5 class="mb-2 text-primary">- - Staff Info - -</h5>
                                                <div class="form-group">

                                                    <select id="inputState"
                                                        class="form-control form-control-lg form-select" name="staffname">
                                                        <option value="" selected>Select Staff.....</option>
                                                        <?php
                                                            
                                                            $query="SELECT * FROM staff";
                                                            $data=mysqli_query($connection,$query);
                                                            if (mysqli_num_rows($data)>0) {
                                                                # code...
                                                                while($row=mysqli_fetch_assoc($data)){
                                                                    ?>
                                                                   <option  ><?php echo $row['staff_name']?></option>
                                                                    <?php
                                                                }
                                                            }else{
                                                                echo `  <option value="" disabled>Data Not Available</option>`;
                                                            }
                                                            
                                                            ?>
                                                    </select>
                                                </div>

                                                <!-- service  -->
                                                <h5 class="mb-2 text-primary">- - Service Info - -</h5>
                                                <div class="form-group" id="box">

                                                    <div class="row">
                                                        <div class="col-11">
                                                            <select id="servicebar" class="form-control  form-select"  name="servicename">
                                                                <option value="0" selected>Select Service.....</option>
                                                            <?php
                                                            
                                                            $query="SELECT * FROM services";
                                                            $data=mysqli_query($connection,$query);
                                                            if (mysqli_num_rows($data)>0) {
                                                                # code...
                                                                while($row=mysqli_fetch_assoc($data)){
                                                                    ?>
                                                                   <option><?php echo $row['service_name']?> ---------- Rs: <?php echo $row['service_fee']?></option>
                                                                    <?php
                                                                }
                                                            }else{
                                                                echo `  <option value="" disabled>Data Not Available</option>`;
                                                            }
                                                            
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="btn btn-success  text-center" id="adding"><i
                                                                    class="menu-icon mdi mdi-plus text-center"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- service  -->

                                                <!-- packages  -->
                                                <h5 class=" text-primary">- - Package Info - -</h5>
                                                <div class="form-group" id="boxtwo">

                                                    <div class="row">
                                                        <div class="col-11">
                                                            <select id="packagebar" class="form-control  form-select" name="packagename"  required>
                                                                <option value="0" selected>Select Package.....</option>
                                                                <?php
                                                            
                                                            $query="SELECT * FROM package";
                                                            $data=mysqli_query($connection,$query);
                                                            if (mysqli_num_rows($data)>0) {
                                                                # code...
                                                                while($row=mysqli_fetch_assoc($data)){
                                                                    ?>
                                                                   <option  ><?php echo $row['package_name']?> ---------- Rs: <?php echo $row['package_fee']?></option>
                                                                    <?php
                                                                }
                                                            }else{
                                                                echo `  <option value="" disabled>Data Not Available</option>`;
                                                            }
                                                            
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="btn btn-success  text-center" id="addingtwo"><i
                                                                    class="menu-icon mdi mdi-plus text-center"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- packages  -->

                                                <h5 class="mb-2 text-primary">- - Enter Discount - -</h5>
                                                <div class="col-md-3 mb-3">
                                                    
                                                    <input type="number"  class="form-control" name="discount">
                                                </div>
                                                <h5 class="mb-2 text-primary">- - Total Bill Amount - -</h5>
                                                <div class="col-md-3">

                                                    <input type="number" id="wo"  class="form-control" name="totalbill" >
                                                </div>

                                                <div class="mt-3">
                                                    <button
                                                        class="btn btn-block btn-primary text-light btn-lg font-weight-medium auth-form-btn"
                                                        type="submit" id="billbtn" name="billaddbtn">Generate</button>
                                                </div>



                                            </form>
                                        </div>
                                    </div>
                                    <!-- work  -->

                                    <!-- partial:partials/_footer.html -->
                                    <footer class="footer">
                                        <div class="d-sm-flex justify-content-center ">
                                            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
                                            <span class="mt-1 mt-sm-0 text-center">Copyright Elixir© 2023. All rights
                                                reserved.</span>
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