<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';

$prescription = uploadPrescriptionFile();
  if($prescription['status'] == false)
  {
    echo $prescription['msg'];
    exit();
  }
  $path = $prescription['path'];

$sql="UPDATE `patient_data` SET `DH_prescription`='".$path."',`DH_description`='".$_POST['patientDescrptionDH']."', `patientStatus`='".$_POST['patientStatusDH']."' WHERE `id` = ".$_POST['id'];

if(mysqli_query($con,$sql)){
    echo 'success';
}

?>