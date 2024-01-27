<?php

include "conn.php";

if ($_GET['option']=="staff") {
    $sid=$_GET['sid'];

    $sql="DELETE FROM `staff` WHERE staff_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_staff.php?alert=staffdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_staff.php?alert=staffnotdeleted");
        // echo("Your User Has Not Been Added");
    }
}elseif($_GET['option']=="service"){
    $sid=$_GET['sid'];

    $sql="DELETE FROM `services` WHERE service_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_service.php?alert=servdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_service.php?alert=servnotdeleted");
        // echo("Your User Has Not Been Added");
    }

}elseif($_GET['option']=="expense"){
    $sid=$_GET['sid'];

    $sql="DELETE FROM `expenses` WHERE expense_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_expense.php?alert=expdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_expense.php?alert=expnotdeleted");
        // echo("Your User Has Not Been Added");
    }

}elseif($_GET['option']=="bill"){
    $sid=$_GET['sid'];

    $sql="DELETE FROM `billing` WHERE bill_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_bill.php?alert=billdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_bill.php?alert=billnotdeleted");
        // echo("Your User Has Not Been Added");
    }

}elseif($_GET['option']=="package"){
    $sid=$_GET['sid'];

    $sql="DELETE FROM `package` WHERE package_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/total_package.php?alert=packdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/total_package.php?alert=packnotdeleted");
        // echo("Your User Has Not Been Added");
    }

}elseif($_GET['option']=="user"){
    $sid=$_GET['sid'];

    $sql="DELETE FROM `users` WHERE user_id='{$sid}'";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/totalusers.php?alert=packdeleted");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/totalusers.php?alert=packnotdeleted");
        // echo("Your User Has Not Been Added");
    }

}


?>