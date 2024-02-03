<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
include "../logics/conn.php";
?>

<body>
  <div class="container-scroller">


    <!-- navbar  -->
    <?php include("navbar.php") ?>
    <!-- navbar  -->
    <div class="container-fluid page-body-wrapper pt-2">
      <!-- sidebar  -->

      <?php include("sidebar.php") ?>
      <!-- sidebar  -->
      <?php
      if ($_SESSION['adminid']) {
        $adminid=$_SESSION['adminid'];
      }
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                        aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <?php
                    if (isset($_SESSION['admin'])){
                      echo ' <li class="nav-item">
                      <a class="nav-link"  href="totalusers.php" >Users</a>
                    </li>';
                    } else {
                      echo ' <li class="nav-item">
                      <a class="nav-link"  href="total_staff.php">Staff</a>
                    </li>';

                    }
                    ?>

                    <?php
                    if (isset($_SESSION['admin'])){
                      echo ' <li class="nav-item">
                      <a class="nav-link"  href="https://www.whatsapp.com/" >Whatsapp</a>
                    </li>';
                    }else{
                    echo '<li class="nav-item">
                      <a class="nav-link"  href="create_bill.php">Generate Bill</a>
                    </li>';
                    }?>
                    <?php
                    if (isset($_SESSION['admin'])){
                      echo ' <li class="nav-item">
                      <a class="nav-link"  href="https://www.whatsapp.com/" >Sales</a>
                    </li>';
                    } else {
                      echo ' <li class="nav-item">
                      <a class="nav-link"  href="create_bill.php">Profit/Loss</a>
                    </li>';

                    }
                    ?>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <?php
                          if ($_SESSION['adminid']) {
                            $usersql = "SELECT * FROM users WHERE user_admin='{$adminid}'";
                            $userresult = mysqli_query($connection, $usersql);
                            $userno = mysqli_num_rows($userresult);
                            echo ' <div>
                             <p class="statistics-title">Softwares Users</p> 
                             <h3 class="rate-percentage">' . $userno . '</h3>
                             </div>';
                          } else {
                            $billsql = "SELECT * FROM billing WHERE bill_admin = '{$adminid}'";
                            $billresult = mysqli_query($connection, $billsql);
                            $billno = mysqli_num_rows($billresult);
                            echo ' <div>
                              <p class="statistics-title">Total bills</p> 
                              <h3 class="rate-percentage">' . $billno . '</h3>
                              </div>';
                          }
                          ?>
                          <!-- sales  -->
                          <?php
                          if ($_SESSION['adminid']) {
                            $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_admin='{$adminid}'";
                            $billresult = mysqli_query($connection, $billsql);
                            $ans = mysqli_fetch_assoc($billresult);
                            $sales=$ans['SUM(bill_amount)'];
                          }else{
                            $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_admin='{$adminid}'";
                            $billresult = mysqli_query($connection, $billsql);
                            $ans = mysqli_fetch_assoc($billresult);
                            $sales=$ans['SUM(bill_amount)'];
                      
                          }


                          
                          if($sales>100000){
                            $val=$sales/100000;
                            echo ' <div>
                            <p class="statistics-title">Sales</p> 
                            <h3 class="rate-percentage">' . round($val,2) .'Lakh </h3>
                            </div>';
                            
                          }else{
                            $val=$sales;
                            echo ' <div>
                            <p class="statistics-title">Expense</p> 
                            <h3 class="rate-percentage">' . round($val,2) .'</h3>
                            </div>';
                          }


                          ?>
                          <!-- sales  -->


                           <!-- Expense -->
                           <?php
                          if ($_SESSION['adminid']) {
                            $expsql = "SELECT SUM(expense_amount) FROM expenses WHERE exp_admin='{$adminid}'";
                            $expresult = mysqli_query($connection, $expsql);
                            $eans = mysqli_fetch_assoc($expresult);
                            $esales=$eans['SUM(expense_amount)'];
                          }else{
                            $expsql = "SELECT SUM(expense_amount) FROM expenses WHERE exp_admin='{$adminid}'";
                            $expresult = mysqli_query($connection, $expsql);
                            $eans = mysqli_fetch_assoc($expresult);
                            $esales=$eans['SUM(expense_amount)'];           
                          }

                          if($esales>100000){
                            $eval=$esales/100000;
                            echo ' <div>
                            <p class="statistics-title">Expense</p> 
                            <h3 class="rate-percentage">' . round($eval,2) .'Lakh </h3>
                            </div>';
                          }else{
                            $eval=$esales;
                            echo ' <div>
                            <p class="statistics-title">Expense</p> 
                            <h3 class="rate-percentage">' . round($eval,2) .'</h3>
                            </div>';
                          }
                          ?>
                          <!-- Expense -->
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Profit/Loss</p>
                            <h3 class="rate-percentage">
                              <?php
                              $pl=$ans['SUM(bill_amount)'] - $eans['SUM(expense_amount)'];
                              if($pl>100000){
                                $pro=$pl/10000;
                                echo round($pro,2)." K";
                                
                              }else{
                                echo $pl;

                              }

                              ?>
                            </h3>

                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Year</p>
                            <h3 class="rate-percentage">2024</h3>

                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- work  -->
                    <div class="graphs">
                      <!-- graph  -->
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">2024 Sales</h4>
                                    <p class="card-subtitle card-subtitle-dash">Elevate insights with captivating graphs, revealing parlour trends beautifully</p>
                                  </div>
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0 disabled"
                                        type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"> This Year</button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                    <h2 class="me-2 fw-bold">PKR <span class="text-primary"> <!-- sales  -->
                                        <?php
                                        if(isset($_SESSION['adminid'])){
                                          $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_admin='{$adminid}'";
                                          $billresult = mysqli_query($connection, $billsql);
                                          $ans = mysqli_fetch_assoc($billresult);
                                          $sales=$ans['SUM(bill_amount)'];
                                        }else{
                                          $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_admin='{$_SESSION["id"]}'";
                                          $billresult = mysqli_query($connection, $billsql);
                                          $ans = mysqli_fetch_assoc($billresult);
                                          $sales=$ans['SUM(bill_amount)'];
                                        }
                                          echo $sales;
                                        ?>
                                        <!-- sales  -->
                                      </span> /=</h2>
                                  </div>
                                  <div class="me-3">
                                    <div id="marketing-overview-legend"></div>
                                  </div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                      <!-- graph  -->
                    </div>
                    <!-- work  -->
                  </div>
                </div>
              </div>
            </div>
          </div>



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



    <!-- End custom js for this page-->
</body>

</html>