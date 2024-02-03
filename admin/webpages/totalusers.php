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

                $queryusers = "SELECT * FROM users WHERE user_admin = '{$adminid}' ORDER BY user_id DESC";

                $run = mysqli_query($connection, $queryusers);
                $totalusers=mysqli_num_rows($run);
                ?>
                <!-- work  -->
                <div class="container">
                    <div class="totalusers p-5">
                        <div class="row">
                            <div class="col-md-10">
                            <h2>Total Users</h2>
                        <p class="mb-4">We Have <span class="text-primary fw-bold fs-4"><?php echo $totalusers ?></span> Users</p>
                            </div>
                            <div class="col-md-2">
                                <a href="signup.php" class="btn btn-primary">Create User</a>
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
                                                            User
                                                        </th>
                                                        <th>
                                                            Full name
                                                        </th>
                                                        <th>
                                                            Phone No
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Registration
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
                                                                <?php
                                                                    if (empty($row["user_pic"])) {
                                                                        
                                                                        echo '<img src="../upload/staff/nouser.png" alt="Empty Image"/>';
                                                                    }else{
                                                                        echo '<img src="../upload/users/'.$row["user_pic"].' " alt="Image"/>';
                                                                        
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="text-capitalize">
                                                                    <?php echo $row['user_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_number'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_email'] ?>
                                                                </td>
                                                                <td>
                                                                <?php 
                                                                    $date=$row['user_date'] ;
                                                                    
                                                                    echo date("d-M-Y",strtotime($date));
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-success " href="update_users.php?userid=<?php echo $row['user_id'] ?>">Edit</a>
                                                                </td>
                                                                <td>

<!-- MODAL  -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-id="<?php $row['user_id'] ?>" onclick="setEventId(<?php echo $row['user_id'] ?>)"
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
                    delete staff?</h1>
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Do you want to delete Staff <span id="event_id"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <a type="button" id="abc"
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
  

    document.getElementById("abc").href=`../logics/delete.php?option=user&sid=${event_id}`; 
}
</script>
</body>

</html>