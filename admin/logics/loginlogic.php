<?php

session_start();
include "conn.php";

$useremail=$_POST['useremail'];
$password=md5($_POST['userpassword']);




$query="SELECT * FROM users WHERE user_email='{$useremail}' AND user_password='{$password}'";
$run=mysqli_query($connection,$query);

if (mysqli_num_rows($run)>0) {
    
    $row=mysqli_fetch_assoc($run);

        
   
    
    
    $_SESSION["id"]=$row['user_id'];
    $_SESSION["name"]=$row['user_name'];
    $_SESSION["admin"]=$row['user_email'];
    $_SESSION['image']=$row['user_pic'];
    
   
    # code...
    header("Location: http://localhost/Elixir/admin/webpages/dashboard.php");
}else{
    header("Location: http://localhost/Elixir/admin/index.php?alert=usandpassnotset");
    
}






?>