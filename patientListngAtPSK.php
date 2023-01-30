<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';

if(!isset($_SESSION['username']))
{
  header('Location: login.php');
  die();
}

$sql="SELECT * FROM `patient_data` WHERE`patientStatus` = 'Treated at camp' OR `patientStatus` = 'Treated at PSK' AND `tahsil`= '".$_SESSION['tahsil']."' ORDER BY updated_at DESC";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);

$patentStatusArray = ["Treated at camp"=>"शिविर में ही इलाज हो गया", "Treated at PSK"=>"प्राथमिक स्वास्थ्य केंद्र में ही इलाज हो गया", "Sent to DH"=>"जिला अस्पताल भेजा गया", "TreatedAtDH"=>"जिला अस्पताल में ही इलाज हो गया", "other"=>"ट्रांसफर अन्य", "none"=>'N/A'];

$vibhag = ['child'=>'बाल रोग', 'gynecology'=>'स्त्री रोग', 'orthopedic'=>'हड्डी रोग', 'eye'=>'नेत्र रोग', 'medicine'=>'मेडिसिन', 'neurology'=>'न्यूरोलॉजी', 'ENT'=>'ENT', 'generalSurgery'=>'generalSurgery', 'other'=>'other'];

$tahsil = ['kawardha'=>'कवर्धा', 'bodla'=>'बोडला', 'pandariya'=>'पंडरिया', 'saLohara'=>'स. लोहारा'];
$trow = ``;
foreach($row as $value)
{

    $modalbutton = '';
    if($value['prescription'] != '')
    {
        $modalbutton .= '<a href="javascript:void(0);" class="showPSKImage" data-toggle="modal" data-target="#PSKPrescriptionModal" data-imagepath="'.$value['prescription'].'">PSC Prescription</a>';
    }

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

$content = '<!doctype html>
    <html lang="en">
    
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.108.0">
        <title>बैगा स्वास्थ्य परीक्षण शिविर</title>
        <link rel="icon" type="image/x-icon" href="../template/assets/images/cg-govt.png">
    
    <link href="../template/assets/css/bootstrap.min.css" rel="stylesheet">
    
        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
    
          .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
          }
    
          .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
          }
    
          .bi {
            vertical-align: -.125em;
            fill: currentColor;
          }
    
          .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
          }
    
          .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
          }
        
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
    
          .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
          }
    
          .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
          }
    
          .bi {
            vertical-align: -.125em;
            fill: currentColor;
          }
    
          .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
          }
    
          .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
          }
    </style>
        <link href="../template/checkout.css" rel="stylesheet">
    
        
        <!-- Custom styles for this template -->
        <link href="../template/dashboard.css" rel="stylesheet">
      </head>
      <body>
        
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-3 me-0 px-3 fs-6" href="#"><img src="../template/assets/images/cg-govt.png" class="mx-2" height="30" width="30"> बैगा स्वास्थ्य परीक्षण शिविर</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
      
      <div class="navbar-nav flex-row px-3">

        <div class="nav-item mx-3">
            <a class="nav-link" href="home.php" aria-current="page">
                Add Patient
            </a>
        </div>
        <div class="nav-item">
            <a class="nav-link" aria-current="page">
                LoggedIn As: PSK
            </a>
        </div>
        <div class="nav-item mx-3">
            <a class="nav-link" aria-current="page">
                |
            </a>
        </div>
        <div class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">
              Logout
          </a>
        </div>
      </div>
    </header>
        
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                
                <th scope="col">Weight</th>
                <th scope="col">Height</th>
                <th scope="col">Gender</th>
                
                <th scope="col">Mobile</th>
                <th scope="col">तहसील</th>
              
                <th scope="col">विभाग</th>
                
                <th scope="col">मरीज की स्थिति</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                '.$trow.'
            </tbody>
            </table>
        </div>
        </main>
      </div>
        <!-- Modal -->
          <div class="modal fade" id="PSKPrescriptionModal" tabindex="-1" role="dialog" aria-labelledby="PSKPrescriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                  <img src="" id="pskPrescription" style="height:700px; width:750px;">
                </div>
              </div>
            </div>
          </div>
          
    </div>
          <script src="../template/jquery-3.6.3.min.js"></script>
          <script src="../template/assets/js/bootstrap.min.js"></script>
          
          <script src="../template/dashboard.js"></script>
          <script>
            $(".showPSKImage").on("click", function (event) {
             
                $("#pskPrescription").attr("src", $(this).attr("data-imagepath"));
              
              
            })
          </script>
  </body>
</html>
';
    echo $content;
?>