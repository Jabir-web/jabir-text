<!DOCTYPE html>
<html lang="en">

<?php

include "head.php";

?>

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
                <div class="container p-5">
                    <!-- search box  -->
                    <div class="main-search-box ">
                        <div class="searchs-box">
                            <h4 class="mb-3">Search Here</h4>
                            <!-- search form  -->
                            <form action="search.php" method="GET">
                                <div class="form-group mb-3">
                                    <input type="text" name="search_name" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Search Here">

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <select id="inputState" class="form-control form-control-lg form-select" name="search_option" required>
                                            <option value="" selected>Select Option</option>
                                            <?php
                                            if ($_SESSION['admin'] == 'admin@gmail.com') {
                                                # code...
                                                echo '<option>Users</option>';
                                            }
                                            ?>
                                            <option>Staff</option>
                                            <option>Service</option>
                                            <option>Package</option>
                                            <option>Bills</option>
                                            <option>Expense</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" onfocus="(this.type='date')" name="search_date"
                                            class="form-control form-control-lg" placeholder="Search By Date">
                                    </div>

                                </div>

                                <button type="submit" name="searchbtn" class="btn btn-primary ">Search</button>

                            </form>
                            <!-- search form  -->
                        </div>
                    </div>
                </div>
                <!-- search box  -->

                <!-- search result  -->
                <div class="main-search-result">
                    <div class="search-result py-2 px-5">
                    <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                        <?php
                                                
                                                include "../logics/conn.php";
                                                if (isset($_GET["searchbtn"])) {
                                                    $sname=$_GET['search_name'];
                                                    $soption=$_GET['search_option'];
                                                    $sedate=$_GET['search_date'];
                                                    $fse=date("Y-m-d",strtotime($sedate));
                                                    
                                                    if ($soption=="Staff") {
                                                        # For staff Search
                                                        if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM staff WHERE staff_name LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM staff WHERE DATE(staff_date) = '{$fse}'";
                                                        }
                                                    }elseif ($soption=="Service") {
                                                        # code...
                                                       # For staff Search
                                                       if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM services WHERE `service_name` LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM services WHERE DATE(service_date) = '{$fse}'";
                                                        }
                                                    }elseif ($soption=="Package") {
                                                      # For staff Search
                                                      if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM package WHERE package_name LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM package WHERE DATE(package_date) = '{$fse}'";
                                                        }
                                                      
                                                    }elseif ($soption=="Bills") {
                                                      # For staff Search
                                                      if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM billing WHERE bill_cname LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM billing WHERE DATE(bill_date) = '{$fse}'";
                                                        }
                                                    }elseif ($soption=="Expense") {
                                                      # For staff Search
                                                      if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM expenses WHERE expense_name LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM expenses WHERE DATE(expense_date) = '{$fse}'";
                                                        }
                                                    }elseif($soption=="Users"){
                                                       # For staff Search
                                                       if (empty($sedate)) {
                                                        $searchsql="SELECT * FROM users WHERE user_name LIKE '%".$sname."%'";
                                                        }else{

                                                            $searchsql="SELECT * FROM users WHERE DATE(user_date) = '{$fse}'";
                                                        }

                                                    }
                                                    $rundata=mysqli_query($connection,$searchsql);

                                               
                                                    
                                                ?>
                                            <table class="table table-striped">
                                                <h5>Search Result: <span class="text-primary"><?php 
                                                if (empty($sedate)) {
                                                    echo $sname;
                                                }else{
                                                    echo date("d-M-Y",strtotime($sedate));

                                                }
                                                    ?>
                                                </span></h5>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Id#
                                                        </th>
                                                        <th>
                                                            Name
                                                        </th>
                                                        <th>
                                                            <?php
                                                            if ($soption=="Users") {
                                                                        echo("Email");
                                                                        # code...
                                                                    }else{

                                                                        echo("Amount");
                                                                    }
                                                                    ?>
                                                        </th>
                                                        <th>
                                                            Date
                                                        </th>
                                                      
                                                        <th>
                                                            View
                                                        </th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                         if (mysqli_num_rows($rundata)>0) {
                                                            while ($result=mysqli_fetch_array($rundata)) {
                                                 ?>
                                               
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?php
                                                                    
                                                                    if ($soption=="Staff") {
                                                                        # code...
                                                                        echo $result['staff_id'];
                                                                    }elseif ($soption=="Service") {
                                                                        # code...
                                                                        echo $result['service_id'];
                                                                    }elseif ($soption=="Package") {
                                                                        echo $result['package_id'];
                                                                        # code...
                                                                    }elseif ($soption=="Bills") {
                                                                        echo $result['bill_id'];
                                                                        # code...
                                                                    }elseif ($soption=="Expense") {
                                                                        echo $result['expense_id'];
                                                                        # code...
                                                                    }elseif ($soption=="Users") {
                                                                        echo $result['user_id'];
                                                                        # code...
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="text-capitalize">
                                                                <?php
                                                                    
                                                                    if ($soption=="Staff") {
                                                                        # code...
                                                                        echo $result['staff_name'];
                                                                    }elseif ($soption=="Service") {
                                                                        # code...
                                                                        echo $result['service_name'];
                                                                    }elseif ($soption=="Package") {
                                                                        echo $result['package_name'];
                                                                        # code...
                                                                    }elseif ($soption=="Bills") {
                                                                        echo $result['bill_cname'];
                                                                        # code...
                                                                    }elseif ($soption=="Expense") {
                                                                        echo $result['expense_name'];
                                                                        # code...
                                                                    }elseif ($soption=="Users") {
                                                                        echo $result['user_name'];
                                                                        # code...
                                                                    }
                                                                    ?>
                                                              
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    
                                                                    if ($soption=="Staff") {
                                                                        # code...
                                                                        echo $result['staff_salary'];
                                                                    }elseif ($soption=="Service") {
                                                                        # code...
                                                                        echo $result['service_fee'];
                                                                    }elseif ($soption=="Package") {
                                                                        echo $result['package_fee'];
                                                                        # code...
                                                                    }elseif ($soption=="Bills") {
                                                                        echo $result['bill_amount']-$result['bill_discount'];
                                                                        # code...
                                                                    }elseif ($soption=="Expense") {
                                                                        echo $result['expense_amount'];
                                                                        # code...
                                                                    }elseif ($soption=="Users") {
                                                                        echo $result['user_email'];
                                                                        # code...
                                                                    }
                                                                    ?>
                                                           
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    
                                                                    if ($soption=="Staff") {
                                                                        # code...
                                                                        $date=$result['staff_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                    }elseif ($soption=="Service") {
                                                                        # code...
                                                                        $date=$result['service_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                    }elseif ($soption=="Package") {
                                                                        $date=$result['package_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                        # code...
                                                                    }elseif ($soption=="Bills") {
                                                                        $date=$result['bill_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                        # code...
                                                                    }elseif ($soption=="Expense") {
                                                                        $date=$result['expense_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                        # code...
                                                                    }elseif ($soption=="Users") {
                                                                        $date=$result['user_date'];
                                                                        echo date("d-M-Y",strtotime($date));
                                                                        # code...
                                                                    }
                                                                    ?>
                                                                </td>
                                                              
                                                                <td>
                                                                    <a class="btn btn-primary" href="update_service.php?servid=<?php echo $row['service_id'] ?>">View</a>
                                                                </td>
                                                           
                                                            </tr>
                                                         
                                                <?php
                                                            }
                                                        }
                                                ?>     
                                                            </tbody>
                                          
                                            </table>
                                            <?php
                                            }else{
                                                echo '<h5 class="fw-bold text-center">
                                                Kindly Search Above - Data Not Found
                                                </h5>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- search result  -->

            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php

    include "script.php";

    ?>
    <script>
        function setEventId(event_id) {
            document.querySelector("#event_id").innerHTML = event_id;


            document.getElementById("abc").href = `../logics/delete.php?option=expense&sid=${event_id}`;
        }
    </script>
</body>

</html>