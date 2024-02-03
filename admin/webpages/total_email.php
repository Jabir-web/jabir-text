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
                $useradminid=$_SESSION['adminid'];
                $queryservcie = "SELECT * FROM emails WHERE email_user = '{$useradminid}'";

                $run = mysqli_query($connection, $queryservcie);
                $total = mysqli_num_rows($run);
                ?>
                <!-- work  -->
           
                <div class="container">
                    <div class="totalusers p-5">
                        <div class="row">
                        <?php
                      if (isset($_GET['alert']) == "staff_updated") {
                        # code...
                        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> You Staff Has Been Updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>');
                      } else if (isset($_GET['alert']) == "staff_notupdated") {
                        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Holy guacamole!</strong> Your Staff Has Not Been Updated.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');

                      } else {
                        echo ("");
                      }
                      ?>
                            <div class="col-md-9">
                                <h2>Total Emails</h2>
                                <p class="mb-4">You Have <span class="text-primary fw-bold fs-4">
                                        <?php echo $total ?>
                                    </span> Emails</p>
                            </div>
                            <div class="col-md-3">
                                <a href="createmail.php" class="btn btn-primary">Create Email</a>
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
                                                            Recptionist
                                                        </th>
                                                        <th>
                                                            Msg
                                                        </th>
                                                      
                                                        <th>
                                                            Date
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
                                                                    <?php echo $row['email_id'] ?>
                                                                </td>
                                                                <td class="text-capitalize ">
                                                                    <?php echo $row['email_rec'] ?>
                                                                </td>
                                                                <td class="py-1">
                                                                    <?php echo $row['email_msg'] ?>
                                                                </td>
                                                                <td>
                                                                <?php 
                                                                    $date=$row['email_date'] ;
                                                                    
                                                                    echo date("d-M-Y",strtotime($date));
                                                                    ?>
                                                                </td>

                                                              
                                                                <td>

                                                                    <!-- MODAL  -->
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-danger"
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
                                                                                        id="exampleModalLabel">Do you want to
                                                                                        delete email</h1>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    ...
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <a type="button"
                                                                                        href="../logics/delete.php?option=staff&sid=<?php echo $row['email_id'] ?>"
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
</body>

</html>