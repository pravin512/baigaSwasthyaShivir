<?php
 require 'config/database.php';
 require 'includes/config.php';
 require 'includes/functions.php';
 require 'includes/constants.php';


 $sql="";

if(isset($_GET['registrationNo']) && $_GET['registrationNo'] != '')
{
    $registrationNo = $_GET['registrationNo'];

    $sql="SELECT `registration_number` FROM `patient_data` WHERE `registration_number` = ".$registrationNo;

    $result=mysqli_query($con,$sql);
    mysql_set_charset("utf8");
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    if(!empty($row))
    {
        echo 'exists';
    }else{
        echo false;
    }
}



?>