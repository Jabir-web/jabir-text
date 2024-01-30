<?php

session_start();
include "conn.php";

if(isset($_POST['superadmin'])){
    $useremail=$_POST['useremail'];
    $password=md5($_POST['userpassword']);
    $query="SELECT * FROM admin WHERE admin_user='{$useremail}' AND admin_pass='{$password}'";
    $run=mysqli_query($connection,$query);
    if (mysqli_num_rows($run)>0) {
        $row=mysqli_fetch_assoc($run);
        $_SESSION["adminid"]=$row['admin_id'];
        $_SESSION["name"]=$row['admin_name'];
        $_SESSION["adminname"]=$row['admin_user'];
        $_SESSION['image']=$row['admin_pic'];
        header("Location: http://localhost/Elixir/admin/webpages/dashboard.php");
    }else{
        header("Location: http://localhost/Elixir/admin/superadmin/index.php?alert=usandpassnotset");
    }
}elseif(isset($_POST['admin'])){
    $useremail=$_POST['useremail'];
    $password=md5($_POST['userpassword']);
    $query="SELECT * FROM users WHERE user_email='{$useremail}' AND user_password='{$password}'";
    $run=mysqli_query($connection,$query);
    if (mysqli_num_rows($run)>0) {
        $row=mysqli_fetch_assoc($run);
        $_SESSION["id"]=$row['user_id'];
        $_SESSION["name"]=$row['user_name'];
        $_SESSION["adminid"]=$row['user_admin'];
        $_SESSION["useradmin"]=$row['user_email'];
        $_SESSION['image']=$row['user_pic'];
        header("Location: http://localhost/Elixir/admin/webpages/dashboard.php");
    }else{
        header("Location: http://localhost/Elixir/admin/index.php?alert=usandpassnotset");
    }
}
?>