<?php
 require 'config/database.php';
 require 'includes/config.php';
 require 'includes/functions.php';
 require 'includes/constants.php';


$sql="SELECT * FROM `patient_data` WHERE 1 ";
$total_Count_sql = "SELECT COUNT(`id`) FROM `patient_data`  WHERE 1 ";
$limit = 100;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

if(isset($_GET['filtertahsil']) && $_GET['filtertahsil'] != '')
{
    $filtertahsil = $_GET['filtertahsil'];

    $sql.= " AND  `tahsil` = '".$filtertahsil."'";
    $total_Count_sql .= " AND  `tahsil` = '".$filtertahsil."'";
}
if(isset($_GET['filtervibhag']) && $_GET['filtervibhag'] != '')
{
    $filtervibhag = $_GET['filtervibhag'];

    $sql.= " AND  `vibhag` = '".$filtervibhag."'";
    $total_Count_sql .= " AND  `vibhag` = '".$filtervibhag."'";
}

if(isset($_GET['filteraddedDate']) && $_GET['filteraddedDate'] != '')
{
    $filteraddedDate = $_GET['filteraddedDate'];

    $sql.= " AND  DATE(`created_at`) = '".$filteraddedDate."'";
    $total_Count_sql .= " AND  DATE(`created_at`) = '".$filteraddedDate."'";
}

if(isset($_GET['searchRegistrationNo']) && $_GET['searchRegistrationNo'] != '')
{
    $searchRegistrationNo = $_GET['searchRegistrationNo'];

    $sql.= " AND  `registration_number` = '".$searchRegistrationNo."' ";
    $total_Count_sql .= " AND  `registration_number` = '".$searchRegistrationNo."' ";
}



if(isset($_GET['filterpatientStatus']) && $_GET['filterpatientStatus'] != '')
{
    $filterpatientStatus = $_GET['filterpatientStatus'];
    $total_Count_sql .= " AND  `patientStatus` = '".$filterpatientStatus."'";
    $sql.= " AND  `patientStatus` = '".$filterpatientStatus."' ORDER BY updated_at DESC LIMIT $start_from, $limit";
    
}else{

    if($_SESSION['role'] == 'ACT')
    {
        $sql.=" ORDER BY updated_at DESC LIMIT $start_from, $limit";
        // $sql.=" AND `patientStatus` IN ('ACTTAHC', 'ACTOTH', 'DHSTHC', 'PSKSTHC') ORDER BY updated_at DESC";
    }

    if($_SESSION['role'] == 'DH')
    {
        $total_Count_sql .= " AND `patientStatus` IN ('DHTADH', 'PSKSTDH')";
        $sql.=" AND `patientStatus` IN ('DHTADH', 'PSKSTDH') ORDER BY updated_at DESC LIMIT $start_from, $limit";
        
    }

    if($_SESSION['role'] == 'PHC')
    {
        $total_Count_sql .= " AND `patientStatus` IN ('PSKTAC', 'PSKTAPSC') AND `tahsil` = '".$_SESSION['tahsil']."'";
        $sql.=" AND `patientStatus` IN ('PSKTAC', 'PSKTAPSC') AND `tahsil` = '".$_SESSION['tahsil']."' ORDER BY updated_at DESC LIMIT $start_from, $limit";
        
    }
}

$result = $con->query($sql);
// mysql_set_charset("utf8");
// $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

// pagination
$rs_result = $con->query($total_Count_sql); 
// $total_row = mysqli_fetch_all($rs_result);  
$total_records = $rs_result->num_rows;
$total_pages = ceil($total_records / $limit); 
// pagination end

$trow = '';
$export = [];
while($row = $result->fetch_assoc())
{
    $exportData = [];

    $modalbutton = '<a href="javascript:void(0);" class="showPSKImage" data-toggle="modal" data-target="#PSKPrescriptionModal" data-imagepath="'.$row['prescription'].'">PHC Prescription</a>';

    $updateButton = '';
    if($_SESSION['role'] == 'DH')
    {
        $updateButton = '<a href="javascript:void(0);" data-toggle="modal" data-target="#UpdateDetailModal" class="update-prescription" data-id="'.$row['id'].'" data-name="'.$row['name'].'"  data-weight="'.$row['weight'].'"  data-height="'.$row['height'].'">Update</a>';
    }
    
    $tr = "<tr>";
    $tr .= "<td>".$row['registration_number']."</td>";
    $tr .= "<td>".$row['name']."</td>";
    $tr .= "<td>".$row['age']."</td>";
    // $tr .= "<td>".$row['fatherHusband']."</td>";
    // $tr .= "<td>".$row['mother']."</td>";
    // $tr .= "<td>".$row['weight']."</td>";
    // $tr .= "<td>".$row['height']."</td>";
    $tr .= "<td>".$row['sex']."</td>";
    // $tr .= "<td>".$row['aadhar']."</td>";
    $tr .= "<td>".$row['mobile']."</td>";
    $tr .= "<td>".$tahsils[$row['tahsil']]."</td>";
    // $tr .= "<td>".$row['address']."</td>";
    $tr .= "<td>".$vibhags[$row['vibhag']]."</td>";
    $tr .= "<td>".$patientStatusForListing[$row['patientStatus']]."</td>";
    $tr .= "<td>".$row['created_at']."</td>";
    $tr .= "<td> <div style='display:flex; flex-direction:column; font-size:10px;'>".$modalbutton.$updateButton."</div></td>";
    $tr .= "<tr>";
    $trow .= $tr;

    $exportData["Name"] = $row['name'];
    $exportData["Age"] = $row['age'];
    $exportData["Weight"] = $row['weight'];
    $exportData["Height"] = $row['height'];
    $exportData["Sex"] = $row['sex'];
    $exportData["Mobile"] = $row['mobile'];
    $exportData["Tahsil"] = $row['tahsil'];
    $exportData["Vibhag"] = $row['vibhag'];
    $exportData["Patient Status"] = $patientStatusForListingEng[$row['patientStatus']];
    $exportData["Added Date"] = $row['created_at'];
    array_push($export, $exportData);
}

if(isset($_GET['downloadCSV']) && $_GET['downloadCSV'] != '')
{
    download_send_headers("patient_list_" . date("Y-m-d") . ".csv");
    echo array2csv($export);
    die();
    exit();
}

$pgination = '<div class="d-flex justify-content-center">
<ul class="pagination text-center">';
 if($total_pages > 0){
  for($i=1; $i<=$total_pages; $i++){
      if($i == $page){
        $pgination .= '<li class="page-link active" data="'.$i.'">'.$i.'</li> ';
      }else{
      $pgination .= '<li class="page-link" data="'.$i.'">'.$i.'</li>';
    }
  }      
 }
 $pgination .= '</ul></div>';

echo $trow .'<tr><td colspan="100%">'.$pgination.'</td><tr>';
?>