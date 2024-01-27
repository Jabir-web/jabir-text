<?php

include "conn.php";

if (isset($_POST["ustaffaddbtn"])) {
    
    $sid=$_POST['usid'];
    $stafimg=$_FILES['ustaffile']['name'];
    $oldimg=$_POST['oldimage'];
    $staftmpimg=$_FILES['ustaffile']['tmp_name'];
    $sname=$_POST['ustaff_name'];
    $spnumber=$_POST['ustaff_pnumber'];
    $snic=$_POST['ustaff_nic'];
    $salary=$_POST['ustaff_salary'];
    $religion=$_POST['ustaff_religion'];
    $age=$_POST['ustaff_age'];
    $timing=$_POST['ustaff_timing'];
    $address=$_POST['ustaff_address'];
    $dir="../upload/staff/".$stafimg;

    if (empty($stafimg)) {
        // for not update 
        $sql="UPDATE `staff` SET `staff_img` = '{$oldimg}', `staff_name` = '{$sname}', `staff_pnumber` = '{$spnumber}', `staff_cnic` = '{$snic}', `staff_salary` = '{$salary}', `staff_religion` = '{$religion}', `staff_age` = '{$age}', `staff_timing` = '{$timing}', `staff_address` = '{$address}' WHERE `staff`.`staff_id` = '{$sid}';";
    }else{
        
        $sql="UPDATE `staff` SET `staff_img` = '{$stafimg}', `staff_name` = '{$sname}', `staff_pnumber` = '{$spnumber}', `staff_cnic` = '{$snic}', `staff_salary` = '{$salary}', `staff_religion` = '{$religion}', `staff_age` = '{$age}', `staff_timing` = '{$timing}', `staff_address` = '{$address}' WHERE `staff`.`staff_id` = '{$sid}';";
        move_uploaded_file($staftmpimg,$dir);
        unlink("../upload/staff/".$oldimg);
    }
    

    if (mysqli_query($connection,$sql)) {
        header("Location: http://localhost/Elixir/admin/webpages/total_staff.php?alert=staff_updated");
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_staff.php?alert=staff_notupdated");
    }

}elseif(isset($_POST["serviceupdatebtn"])) {

    $servid=$_POST['servupdateid'];
    $servname=$_POST['service_name'];
    $servfee=$_POST['service_fee'];


    $sql="UPDATE `services` SET `service_name` = '{$servname}', `service_fee` = '{$servfee}' WHERE `services`.`service_id` = '{$servid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_service.php?alert=service_updated");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_service.php?alert=service_notupdated");
        // echo("Your User Has Not Been Added");
    }

}elseif(isset($_POST["updatepackagebtn"])) {

    $packid=$_POST['packageid'];
    $packname=$_POST['pack_name'];
    $packagefee=$_POST['pack_fee'];
    $packagedetail=$_POST['pack_detail'];


    $sql="UPDATE `package` SET `package_name` = '{$packname}', `package_fee` = '{$packagefee}', `package_detail` = '{$packagedetail}' WHERE `package`.`package_id` = '{$packid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_package.php?alert=package_updated");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_package.php?alert=package_notupdated");
        // echo("Your User Has Not Been Added");
    }

}elseif(isset($_POST["expupdatebtn"])) {

    $expid=$_POST['exp_id'];
    $expname=$_POST['exp_name'];
    $expamount=$_POST['exp_amount'];

    $sql="UPDATE `expenses` SET `expense_name` = '{$expname}', `expense_amount` = '{$expamount}' WHERE `expenses`.`expense_id` = '{$expid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_expense.php?alert=expense_updated");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_expense.php?alert=expense_notupdated");
        // echo("Your User Has Not Been Added");
    }

}elseif(isset($_POST["upuser"])) {
    echo"wow";
    // for old 
    $oldimg=$_POST['oldimage'];

    $userid=$_POST['usid'];
    $fullname=$_POST['user_fname'];
    $userimg=$_FILES['userfile']['name'];
    $usertmpimg=$_FILES['userfile']['tmp_name'];
    $usernumber=$_POST['user_number'];
    $useremail=$_POST['user_email'];
    $password=md5($_POST['user_password']);
    
    $dir="../upload/users/".$userimg;
    
    if (empty($userimg)) {
        $query="UPDATE `users` SET `user_pic` = '{$oldimg}', `user_name` = '{$fullname}', `user_number` = '{$usernumber}', `user_email` = '{$useremail}', `user_password` = '{$password}' WHERE `users`.`user_id` = '{$userid}'";
    }else{
        $query="UPDATE `users` SET `user_pic` = '{$userimg}', `user_name` = '{$fullname}', `user_number` = '{$usernumber}', `user_email` = '{$useremail}', `user_password` = '{$password}' WHERE `users`.`user_id` = '{$userid}'";
        move_uploaded_file($usertmpimg,$dir);
        unlink("../upload/users/".$oldimg);
    }


    if (mysqli_query($connection,$query)) {
       
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usnotadded");
        // echo("Your User Has Not Been Added");
       
    }
    
    

}

?>