<?php
 require 'config/database.php';
 require 'includes/config.php';
 require 'includes/functions.php';
 require 'includes/constants.php';


$sql="DELETE * FROM `patient_data` WHERE `id` IN (".$_POST['patients_ids'].")";

$result = $con->query($sql);

?>