<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';

  $name = $_POST['name'];
  $age = $_POST['age'];
  $father_husbandName =isset($_POST['father_husbandName'])?$_POST['father_husbandName']:NULL;
  $mother = isset($_POST['mother'])?$_POST['mother']:NULL;
  $weight = isset($_POST['weight']); 
  $height = isset($_POST['height']);
  $sex = isset($_POST['sex']);
  $aadhar = isset($_POST['aadhar']);
  $mobile = isset($_POST['mobile']);
  $tahsil = isset($_POST['tahsil']);
  $hitgrahAddress = isset($_POST['hitgrahAddress']);
  $vibhag = isset($_POST['vibhag']);
  $anyaRog = isset($_POST['anyaRog']);
  $patientStatus = isset($_POST['patientStatus']);
  // $otherDetials = $_POST['otherDetials'];
  $user_id = $_SESSION['userid'];

  $prescription = uploadPrescriptionFile();
  
  if($prescription['status'] == 1)
  {
    echo "<pre>";
    print_r($prescription);
    exit();
  }
  $path = implode(',', $prescription['path']);

$sql="INSERT INTO `patient_data`(`name`, `age`, `fatherHusband`, `mother`, `weight`, `height`, `sex`, `aadhar`, `mobile`, `tahsil`, `address`, `vibhag`, `otherdisease`, `patientStatus`, `created_at`, `updated_at`, `prescription`, `added_by`) VALUES ('".$name."','".$age."','".$father_husbandName."','".$mother."',".$weight.",".$height.",'".$sex."','".$aadhar."','".$mobile."','".$tahsil."','".$hitgrahAddress."','".$vibhag."','".$anyaRog."','".$patientStatus."', NOW(), NOW(),'".$path."',".$user_id.")";

if(mysqli_query($con,$sql)){
    echo 'Success';
}else{
  echo 'Upload Error';
}

// $_GET['page'] = 'home';
// init();

?>