<?php

include("conn.php");

$fullname=$_POST['user_fname'];
$userimg=$_FILES['userfile']['name'];
$usertmpimg=$_FILES['userfile']['tmp_name'];
$usernumber=$_POST['user_number'];
$useremail=$_POST['user_email'];
$password=md5($_POST['user_password']);

$dir="../upload/users/".$userimg;


$query="INSERT INTO `users` (`user_id`, `user_pic`, `user_name`, `user_number`, `user_email`, `user_password`, `user_date`) VALUES (NULL, '{$userimg}', '{$fullname}', '{$usernumber}', '{$useremail}', '{$password}', current_timestamp());";

if (mysqli_query($connection,$query)) {
    move_uploaded_file($usertmpimg,$dir);
    # code...
    header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usadded");
    
}else{
    header("Location: http://localhost/Elixir/admin/webpages/signup.php?alert=usnotadded");
    // echo("Your User Has Not Been Added");
}



?>