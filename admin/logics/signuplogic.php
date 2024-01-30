<?php

session_start();
include("conn.php");

if (isset($_POST['admin'])) {
    # create sub admin 
$fullname=$_POST['user_fname'];
$userimg=$_FILES['userfile']['name'];
$usertmpimg=$_FILES['userfile']['tmp_name'];
$usernumber=$_POST['user_number'];
$useremail=$_POST['user_email'];
$password=md5($_POST['user_password']);
$dir="../upload/users/".$userimg;
$query="INSERT INTO `users` (`user_id`, `user_pic`, `user_name`, `user_number`, `user_email`, `user_password`, `user_date`,`user_admin`) VALUES (NULL, '{$userimg}', '{$fullname}', '{$usernumber}', '{$useremail}', '{$password}', current_timestamp(),'{$_SESSION["adminid"]}');";
    if (mysqli_query($connection,$query)) {
        move_uploaded_file($usertmpimg,$dir);
        header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usadded");
    }else{header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usnotadded");}
}elseif(isset($_POST['adminbtn'])){
    # create admin
    $adminimg=$_FILES['adminfile']['name'];
    $admintmpimg=$_FILES['adminfile']['tmp_name'];
    $adminfullname=$_POST['admin_fname'];
    $adminbusinessname=$_POST['admin_bname'];
    $adminnumber=$_POST['admin_number'];
    $adminaddress=$_POST['admin_address'];
    $adminusername=$_POST['admin_username'];
    $adminpass=md5($_POST['admin_password']);
    $dir="../upload/admins/".$adminimg;
    $query="INSERT INTO `admin` (`admin_id`,`admin_pic`,`admin_name`, `admin_businame`, `admin_pnumber`, `admin_address`, `admin_user`, `admin_pass`, `admin_date`) VALUES (NULL,'{$adminimg}','{$adminfullname}', '{$adminbusinessname}', '{$adminnumber}', '{$adminaddress}', '{$adminusername}', '{$adminpass}', current_timestamp());";
    if (mysqli_query($connection,$query)) {
        move_uploaded_file($admintmpimg,$dir);
        header("Location: http://localhost/Elixir/admin/webpages/totaladmin.php?alert=usadded");
    }else{header("Location: http://localhost/Elixir/admin/webpages/totaladmin.php?alert=usnotadded");}
}
?>