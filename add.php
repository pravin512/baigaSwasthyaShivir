<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';

  $registrationNo = $_POST['registrationNo'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $father_husbandName =isset($_POST['father_husbandName'])?$_POST['father_husbandName']:NULL;
  $mother = isset($_POST['mother'])?$_POST['mother']:NULL;
  $weight = isset($_POST['weight'])?$_POST['weight']:0; 
  $height = isset($_POST['height'])?$_POST['height']:0;
  $sex = isset($_POST['sex'])?$_POST['sex']:NULL;
  $aadhar = isset($_POST['aadhar'])?$_POST['aadhar']:NULL;
  $mobile = isset($_POST['mobile'])?$_POST['mobile']:NULL;
  $tahsil = isset($_POST['tahsil'])?$_POST['tahsil']:NULL;
  $hitgrahAddress = isset($_POST['hitgrahAddress'])?$_POST['hitgrahAddress']:NULL;
  $vibhag = isset($_POST['vibhag'])?$_POST['vibhag']:NULL;
  $anyaRog = isset($_POST['anyaRog'])?$_POST['anyaRog']:NULL;
  $patientStatus = isset($_POST['patientStatus'])?$_POST['patientStatus']:NULL;
  $patientStatusOther = isset($_POST['patientStatusOther'])?$_POST['patientStatusOther']:NULL;
  // $otherDetials = $_POST['otherDetials'];
  $user_id = $_SESSION['userid'];

  // $prescription = uploadPrescriptionFile();
  // if($prescription['status'] == false)
  // {
  //   echo $prescription['msg'];
  //   exit(0);
  // }
  // $path = $prescription['path'];
  $path = "/test";

$sql="INSERT INTO `patient_data`(`name`, `age`, `fatherHusband`, `mother`, `weight`, `height`, `sex`, `aadhar`, `mobile`, `tahsil`, `address`, `vibhag`, `otherdisease`, `patientStatus`, `created_at`, `updated_at`, `prescription`, `added_by`, `registration_number`, `patient_status_when_other`) VALUES ('".$name."','".$age."','".$father_husbandName."','".$mother."','".$weight."','".$height."','".$sex."','".$aadhar."','".$mobile."','".$tahsil."','".$hitgrahAddress."','".$vibhag."','".$anyaRog."','".$patientStatus."', NOW(), NOW(),'".$path."',".$user_id.", '".$registrationNo."','".$patientStatusOther."')";
echo $sql;
dd($con->query($sql))
if($con->query($sql)){
    echo 'Success';
}else{
  echo 'Upload Error';
}

// $_GET['page'] = 'home';
// init();

?>