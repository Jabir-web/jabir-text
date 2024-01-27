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

            <div class="main-panel p-5">
                <h2 class="fw-bold">My Profile</h2>
                <hr>

                <div class="info">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../upload/users/<?php echo $_SESSION['image']?>" class="w-100 rounded" alt="">
                        </div>
                        <div class="col-md-9">
                            <h1 class="fw-bold text-primary"><?php echo $_SESSION['name']?></h1>
                            <h5>Your Email : <?php echo $_SESSION['admin']?></h5>
                            <h5>Phone Number : <?php echo $_SESSION['admin']?></h5>
                            <a href="" class="btn btn-danger my-3">Change Your Password</a>
                        </div>
                    </div>
                </div>

                <div class="salecards p-3">
                <div class="row bg-light p-3 rounded">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <?php
                          include("../logics/conn.php");
                          if ($_SESSION['admin'] == "admin@gmail.com") {

                            $usersql = "SELECT * FROM users";
                            $userresult = mysqli_query($connection, $usersql);
                            $userno = mysqli_num_rows($userresult);


                            echo ' <div>
                             <p class="statistics-title">Softwares Users</p> 
                             <h3 class="rate-percentage">' . $userno . '</h3>
                             </div>';
                          } else {
                            $billsql = "SELECT * FROM billing WHERE bill_user = '{$_SESSION["id"]}'";
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
                          if ($_SESSION['admin'] == "admin@gmail.com") {

                            $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_user=16";
                            $billresult = mysqli_query($connection, $billsql);
                            $ans = mysqli_fetch_assoc($billresult);
                            $sales=$ans['SUM(bill_amount)'];
                           
                          }else{
                            $billsql = "SELECT SUM(bill_amount) FROM billing WHERE bill_user='{$_SESSION["id"]}'";
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
                          if ($_SESSION['admin'] == "admin@gmail.com") {

                            $expsql = "SELECT SUM(expense_amount) FROM expenses WHERE exp_user=16";
                            $expresult = mysqli_query($connection, $expsql);
                            $eans = mysqli_fetch_assoc($expresult);
                            $esales=$eans['SUM(expense_amount)'];
                           
                          }else{
                            $expsql = "SELECT SUM(expense_amount) FROM expenses WHERE exp_user='{$_SESSION["id"]}'";
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

                </div>

                            

                                  
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