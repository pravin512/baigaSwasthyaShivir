<?php
require 'config/database.php';


$sql="SELECT * FROM `patient_data` WHERE 1 ";

if(isset($_GET['filtertahsil']) && $_GET['filtertahsil'] != '')
{
    $filtertahsil = $_GET['filtertahsil'];

    $sql.= " AND  `tahsil` = '".$filtertahsil."'";
}
if(isset($_GET['filtervibhag']) && $_GET['filtervibhag'] != '')
{
    $filtervibhag = $_GET['filtervibhag'];

    $sql.= " AND  `vibhag` = '".$filtervibhag."'";
}
if(isset($_GET['filterpatientStatus']) && $_GET['filterpatientStatus'] != '')
{
    $filterpatientStatus = $_GET['filterpatientStatus'];
    $sql.= " AND  `patientStatus` = '".$filterpatientStatus."'";
}

if(isset($_GET['filteraddedDate']) && $_GET['filteraddedDate'] != '')
{
    $filteraddedDate = $_GET['filteraddedDate'];

    $sql.= " AND  DATE(`created_at`) = '".$filteraddedDate."'";
}

$sql.=" AND `patientStatus` != 'Treated at camp' AND `patientStatus` != 'Treated at PSK' ORDER BY updated_at DESC";
        
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
$patentStatusArray = ["Treated at camp"=>"शिविर में ही इलाज हो गया", "Sent to DH"=>"जिला अस्पताल भेजा गया", "TreatedAtDH"=>"जिला अस्पताल में ही इलाज हो गया", "other"=>"ट्रांसफर अन्य", "none"=>'N/A'];
$vibhag = ['child'=>'बाल रोग', 'gynecology'=>'स्त्री रोग', 'orthopedic'=>'हड्डी रोग', 'eye'=>'नेत्र रोग', 'medicine'=>'मेडिसिन', 'neurology'=>'न्यूरोलॉजी', 'ENT'=>'ENT', 'generalSurgery'=>'generalSurgery', 'other'=>'other'];
$trow = ``;
$tahsil = ['kawardha'=>'कवर्धा', 'bodla'=>'बोडला', 'pandariya'=>'पंडरिया', 'saLohara'=>'स. लोहारा'];
foreach($row as $value)
{
    if($value['patientStatus'] == "Treated at camp")
    {
        $treatedATCamp = '<option value="Treated at camp" selected>शिविर में ही इलाज हो गया .</option>';
    }else{
        $treatedATCamp = '<option value="Treated at camp">शिविर में ही इलाज हो गया .</option>';
    }

    if($value['patientStatus'] == "Sent to DH")
    {
        $sentToDH = '<option value="Sent to DH" selected>जिला अस्पताल भेजा गया.</option>';
    }else{
        $sentToDH = '<option value="Sent to DH">जिला अस्पताल भेजा गया.</option>';
    }

    if($value['patientStatus'] == "TreatedAtDH")
    {
        $treatedATDH = '<option value="TreatedAtDH" selected>जिला अस्पताल में ही इलाज हो गया.</option>';
    }else{
        $treatedATDH = '<option value="TreatedAtDH">जिला अस्पताल में ही इलाज हो गया.</option>';
    }

    if($value['patientStatus'] == "other")
    {
        $other = '<option value="other" selected>अन्य.</option>';
    }else{
        $other = '<option value="other">ट्रांसफर अन्य.</option>';
    }


    
    $patientStatusSelect = '<select class="patientStatus" id="filterpatientStatus" name="patientStatus" required style="font-size:10px;">
                                <option value="">मरीज की स्थिति</option>
                                '.$treatedATCamp.$sentToDH.$treatedATDH.$other.'
                            </select>';

    $modalbutton = '<a href="javascript:void(0);" class="showPSKImage" data-toggle="modal" data-target="#PSKPrescriptionModal" data-imagepath="'.$value['prescription'].'">PSC Prescription</a>

    <a href="javascript:void(0);" data-toggle="modal" data-target="#UpdateDetailModal" class="update-prescription" data-id="'.$value['id'].'" data-name="'.$value['name'].'"  data-weight="'.$value['weight'].'"  data-height="'.$value['height'].'">Update</a>';

    $tr = "<tr>";
    $tr .= "<td>".$value['name']."</td>";
    $tr .= "<td>".$value['age']."</td>";
    // $tr .= "<td>".$value['fatherHusband']."</td>";
    // $tr .= "<td>".$value['mother']."</td>";
    $tr .= "<td>".$value['weight']."</td>";
    $tr .= "<td>".$value['height']."</td>";
    $tr .= "<td>".$value['sex']."</td>";
    // $tr .= "<td>".$value['aadhar']."</td>";
    $tr .= "<td>".$value['mobile']."</td>";
    $tr .= "<td>".$tahsil[$value['tahsil']]."</td>";
    // $tr .= "<td>".$value['address']."</td>";
    $tr .= "<td>".$vibhag[$value['vibhag']]."</td>";
    $tr .= "<td>".$patentStatusArray[$value['patientStatus']]."</td>";
    $tr .= "<td>".$value['created_at']."</td>";
    $tr .= "<td> <div style='display:flex; flex-direction:column; font-size:10px;'>".$modalbutton."</div></td>";
    $tr .= "<tr>";
    $trow .= $tr;
}
echo $trow;
?>