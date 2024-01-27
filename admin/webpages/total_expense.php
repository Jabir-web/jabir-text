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
                <?php
                include("../logics/conn.php");

                $queryservcie = "SELECT * FROM expenses ORDER BY expense_id DESC";

                $run = mysqli_query($connection, $queryservcie);
                $total=mysqli_num_rows($run); 
                ?>
                <!-- work  -->
                <div class="container">
                    <div class="totalusers p-5">
                         <!-- *************************Staff Deleted ************************** -->
                    <?php
                    if (isset($_GET['alert'])) {
                        # code...
                   
                      if ($_GET['alert'] == "expense_updated") {
                        # code...
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> You Expense Has Been Updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      } else if ($_GET['alert'] == "expense_notupdated") {
                        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> Your Expense Has Not Been Updated.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');

                      }else if($_GET['alert'] == "expdeleted"){
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> Your Service Has Been Deleted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      }else if($_GET['alert'] == "expnotdeleted"){
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> Your Service Has Been Deleted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      }
                    }
                      ?>
                    <!-- *************************Staff Deleted ************************** -->
                        <div class="row">
                            <div class="col-md-9">
                            <h2>Total Expenses</h2>
                        <p class="mb-4">We Have <span class="text-primary fw-bold fs-4"><?php echo $total ?></span> Servcies</p>
                            </div>
                            <div class="col-md-3">
                                <a href="create_expense.php" class="btn btn-primary">Create Expense</a>
                            </div>
                        </div>
                     
                        <!-- table  -->
                        <div class="totaluerstable">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Id#
                                                        </th>
                                                        <th>
                                                            Expense Name
                                                        </th>
                                                        <th class="text-center">
                                                            Amount
                                                        </th>
                                                        <th>
                                                            Date
                                                        </th>
                                                      
                                                        <th>
                                                            Edit
                                                        </th>
                                                        <th>
                                                            Delete
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    if (mysqli_num_rows($run) > 0) {
                                                        # lop for users
                                                        while ($row = mysqli_fetch_assoc($run)) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                <?php echo $row['expense_id'] ?>
                                                                </td>
                                                                <td class="text-capitalize ">
                                                                    <?php echo $row['expense_name'] ?>
                                                                </td>
                                                                <td class="text-center text-danger fw-bold">
                                                                    <?php echo $row['expense_amount'] ?>
                                                                </td>
                                                                <td>
                                                                <?php 
                                                                    $date=$row['expense_date'] ;
                                                                    
                                                                    echo date("d-M-Y",strtotime($date));
                                                                    ?>
                                                                </td>
                                                              
                                                                <td>
                                                                    <a class="btn btn-success" href="update_expense.php?expid=<?php echo $row['expense_id'] ?>">Edit</a>
                                                                </td>
                                                                <td>
     <!-- MODAL  -->                                            
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-danger" data-id="<?php $row['expense_id'] ?>" onclick="setEventId(<?php echo $row['expense_id'] ?>)"
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        Delete
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="exampleModalLabel">ALERT</h1>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                Do you want to delete Expense <span id="event_id"></span> ?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <a type="button" 
                                                                                    id="abc"
                                                                                        href=""
                                                                                        class="btn btn-primary">Yes</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- MODAL  -->
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }

                                                    } else {
                                                        echo ("<tr> Data Not Found</tr>");
                                                    }

                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table  -->
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
<script>
    function setEventId(event_id){
    document.querySelector("#event_id").innerHTML = event_id;
  

    document.getElementById("abc").href=`../logics/delete.php?option=expense&sid=${event_id}`; 
}
</script>
</body>

</html>