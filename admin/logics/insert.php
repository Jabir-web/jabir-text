<?php

include "conn.php";

session_start();
$useradminid=$_SESSION['id'];
echo($useradminid);

if (isset($_POST['serviceaddbtn'])) {
    $sname=$_POST['service_name'];
    $sfee=$_POST['service_fee'];

    $sql="INSERT INTO `services` (`service_id`, `service_name`, `service_fee`, `service_date`) VALUES (NULL, '{$sname}', '{$sfee}', current_timestamp());";
    
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/create_service.php?alert=servadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/create_service.php?alert=servnotadded");
        // echo("Your User Has Not Been Added");
    }
    


}else if(isset($_POST['expaddbtn'])){
    $ename=$_POST['exp_name'];
    $eamount=$_POST['exp_amount'];

    $query="INSERT INTO `expenses` (`expense_id`, `expense_name`, `expense_amount`, `expense_date`,`exp_user`) VALUES (NULL, '{$ename}', '{$eamount}', current_timestamp(),'{$useradminid}');";
    if (mysqli_query($connection,$query)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/create_expense.php?alert=expadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/create_expense.php?alert=expnotadded");
        // echo("Your User Has Not Been Added");
    }
    

}else if(isset($_POST['packagebtn'])){
    $packagename=$_POST['pack_name'];
    $packagefee=$_POST['pack_fee'];
    $packagedetail=$_POST['pack_detail'];

    $sql="INSERT INTO `package` (`package_id`, `package_name`, `package_fee`, `package_detail`, `package_date`) VALUES (NULL, '{$packagename}', '{$packagefee}', '{$packagedetail}', current_timestamp());";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/create_package.php?alert=packadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/create_package.php?alert=packnotadded");
        // echo("Your User Has Not Been Added");
    }
    
}elseif(isset($_POST['staffaddbtn'])){
    $stafimg=$_FILES['staffile']['name'];
    $staftmpimg=$_FILES['staffile']['tmp_name'];
    $sname=$_POST['staff_name'];
    $spnumber=$_POST['staff_pnumber'];
    $snic=$_POST['staff_nic'];
    $salary=$_POST['staff_salary'];
    $religion=$_POST['staff_religion'];
    $age=$_POST['staff_age'];
    $timing=$_POST['staff_timing'];
    $address=$_POST['staff_address'];
    $dir="../upload/staff/".$stafimg;

    $sql="INSERT INTO `staff` (`staff_id`, `staff_img`, `staff_name`, `staff_pnumber`, `staff_cnic`, `staff_salary`, `staff_religion`, `staff_age`, `staff_timing`, `staff_address`, `staff_date`) VALUES (NULL, '{$stafimg}', '{$sname}', '{$spnumber}', '{$snic}', '{$salary}', '{$religion}', '{$age}', '{$timing}', '{$address}', current_timestamp());";
    if (mysqli_query($connection,$sql)) {
        move_uploaded_file($staftmpimg,$dir);
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/create_staff.php?alert=staffadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/create_staff.php?alert=staffnotadded");
        // echo("Your User Has Not Been Added");
    }

}elseif(isset($_POST['billaddbtn'])){
    $month=$_POST['month'];
    $customername=$_POST['cus_name'];
    $customernumber=$_POST['cus_phone'];
    $staff=$_POST['staffname'];
    $servname=$_POST['servicename'];
    $packname=$_POST['packagename'];
    $discount=$_POST['discount'];
    $totalbill=$_POST['totalbill'];

    $des = $servname;

   

    $sql="INSERT INTO `billing` (`bill_id`, `bill_cname`, `bill_cnumber`, `bill_staff`,`bill_month`, `bill_description`, `bill_amount`, `bill_discount`, `bill_date`,`bill_user`) VALUES (NULL, '{$customername}', '{$customernumber}', '{$staff}','{$month}', '{$des}', '{$totalbill}', '{$discount}', current_timestamp(),'{$useradminid}');";
    if (mysqli_query($connection,$sql)) {
        # code...
        header("Location: http://localhost/Elixir/admin/webpages/create_bill.php?alert=billadded");
        
    }else{
        header("Location: http://localhost/Elixir/admin/webpages/create_bill.php?alert=billnotadded");
        // echo("Your User Has Not Been Added");
    }

}




?>