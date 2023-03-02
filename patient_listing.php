<?php

        require 'config/database.php';
        require 'includes/config.php';
        require 'includes/functions.php';
        require 'includes/constants.php';

        $limit = 100;  
        $total_pages = 0;
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
        $start_from = ($page-1) * $limit;  

        $patientStatusOptions = '';
        foreach($patientStatus[$_SESSION["role"]] as $k => $val) {
          $patientStatusOptions .= '<option value="'.$k.'">'.$val.'.</option>';
        }

        $vibhagOptions = '';
        foreach($vibhags as $k => $val) {
          $vibhagOptions .= '<option value="'.$k.'">'.$val.'.</option>';
        }

        $tahsilsOptions = '';
        foreach($tahsils as $k => $val) {
          $tahsilsOptions .= '<option value="'.$k.'">'.$val.'.</option>';
        }

        if(!isset($_SESSION['username']))
        {
          header('Location: login.php');
          die();
        }

        $total_Count_sql = "SELECT COUNT(`id`) FROM `patient_data`";

        if($_SESSION['role'] == 'DH')
        {
          $sql="SELECT * FROM `patient_data` WHERE `patientStatus` IN ('DHTADH', 'PSKSTDH') ORDER BY updated_at DESC LIMIT $start_from, $limit";
          
          $total_Count_sql = "SELECT COUNT(`id`) FROM `patient_data` WHERE `patientStatus` IN ('DHTADH', 'PSKSTDH')";
        }
        if($_SESSION['role'] == 'ACT')
        {
          $sql="SELECT * FROM `patient_data` WHERE 1 ORDER BY updated_at DESC LIMIT $start_from, $limit";
          
          // $sql="SELECT * FROM `patient_data` WHERE `patientStatus` IN ('ACTTAHC', 'ACTOTH', 'DHSTHC', 'PSKSTHC') ORDER BY updated_at DESC";
        }
        if($_SESSION['role'] == 'PHC')
        {
          $sql="SELECT * FROM `patient_data` WHERE `patientStatus` IN ('PSKTAC', 'PSKTAPSC') AND `tahsil` = '".$_SESSION['tahsil']."' ORDER BY updated_at DESC LIMIT $start_from, $limit";
          $total_Count_sql = "SELECT COUNT(`id`) FROM `patient_data` WHERE `patientStatus` IN ('PSKTAC', 'PSKTAPSC') AND `tahsil` = '".$_SESSION['tahsil']."'";
        }

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

        $rs_result = mysqli_query($con, $total_Count_sql);  
        $total_row = mysqli_fetch_all($rs_result);  
        
        $total_records = $total_row[0][0];  

        $total_pages = ceil($total_records / $limit); 


        $trow = ``;

        foreach($row as $value)
        {

            $modalbutton = '';
            if($value['prescription'] != '')
            {
              $modalbutton .= '<a href="javascript:void(0);" class="showPSKImage" data-toggle="modal" data-target="#PSKPrescriptionModal" data-imagepath="'.$value['prescription'].'">PHC Prescription</a>';
            }

            $updateButton = '';
            if($_SESSION['role'] == 'DH')
            {
              $updateButton = '<a href="javascript:void(0);" data-toggle="modal" data-target="#UpdateDetailModal" class="update-prescription" data-id="'.$value['id'].'" data-name="'.$value['name'].'"  data-weight="'.$value['weight'].'"  data-height="'.$value['height'].'">Update</a>';
            }
            $viewDHPrescription = '';

            if($value['DH_prescription'] != '')
            {
              $viewDHPrescription .= '<a href="javascript:void(0);" class="showDHImage" data-toggle="modal" data-target="#PSKPrescriptionModal" data-imagepath="'.$value['DH_prescription'].'">DH Prescription</a>';
            }

            $tr = "<tr>";
            $tr .= "<td>".$value['registration_number']."</td>";
            $tr .= "<td>".$value['name']."</td>";
            $tr .= "<td>".$value['age']."</td>";
            // $tr .= "<td>".$value['fatherHusband']."</td>";
            // $tr .= "<td>".$value['mother']."</td>";
            // $tr .= "<td>".$value['weight']."</td>";
            // $tr .= "<td>".$value['height']."</td>";
            $tr .= "<td>".$value['sex']."</td>";
            // $tr .= "<td>".$value['aadhar']."</td>";
            $tr .= "<td>".$value['mobile']."</td>";
            $tr .= "<td>".$tahsils[$value['tahsil']]."</td>";
            // $tr .= "<td>".$value['address']."</td>";
            $tr .= "<td>".$vibhags[$value['vibhag']]."</td>";
            
            $tr .= "<td>".$patientStatusForListing[$value['patientStatus']]."</td>";
            $tr .= "<td>".$value['created_at']."</td>";
            $tr .= "<td> <div style='display:flex; flex-direction:column; font-size:10px;'>".$modalbutton.$updateButton.$viewDHPrescription."</div></td>";
            $tr .= "<tr>";
            $trow .= $tr;
        }


$content = nav_menu();

$pgination = '<div class="d-flex justify-content-center">
<ul class="pagination text-center" id="pagination">';
 if($total_pages > 0){
  for($i=1; $i<=$total_pages; $i++){
      if($i == 1){
        $pgination .= '<li class="page-link active" data="'.$i.'">'.$i.'</li> ';
      }else{
      $pgination .= '<li class="page-link" data="'.$i.'">'.$i.'</li>';
    }
  }      
 }
 $pgination .= '</ul></div>';
            
$content .='
        
    <div class="container-fluid">
      <div class="row">
      
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex align-items-center justify-content-between bg-white w-100 px-2 py-2">
          <div><input type="text" placeholder="पंजीयन क्र." value="" id="searchRegistrationNo" name="searchRegistrationNo"> <button type="button" id="searchButton">Search</button> <button type="button" id="clearButton">Clear</button>  <a href="javascript:void(0);" class="px-2" id="clearAllFilter"><u>Remove all filter</u></a> </div>
          <div><img id="downloadCSV" src="../template/assets/images/xls.png" height="20" width="20" style=" cursor:pointer" title="download"></div>
        </div>
        <div class="table-responsive bg-white">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">पंजीयन क्र.</th>
                <th scope="col">नाम</th>
                <th scope="col">उम्र</th>
                <th scope="col">लिंग</th>
                
                <th scope="col">मोबाइल</th>
                <th scope="col"> 
                  <select class="formVal" id="filtertahsil" name="tahsil" required>
                    <option value="">तहसील</option>
                    '.$tahsilsOptions.'
                  </select>  
                </th>
              
                <th scope="col"><select class="formVal" id="filtervibhag" name="vibhag" required>
                <option value="">विभाग</option>
                '.$vibhagOptions.'
              </select></th>
                <th scope="col">
                  <select class="formVal" id="filterpatientStatus" name="patientStatus" required>
                    <option value="">मरीज की स्थिति</option>
                    '.$patientStatusOptions.'
                  </select>
                </th> 
                <th scope="col"><input type="date" id="addedDate" name="addedDate"></th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                '.$trow.'
                <tr><td colspan="100%">'.$pgination.'</td></tr>
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
                  <object id="objectViewer" data="" height="600" width="100%">
                      <iframe id="objectframe" src="" frameborder="0" height="100%" width="100%"></iframe>
                  </object>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Modal -->
          <div class="modal fade" id="UpdateDetailModal" tabindex="-1" role="dialog" aria-labelledby="UpdateDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form enctype=multipart/form-data class="needs-validation addfrm" id="updatefrm" action="updateAtDH.php" novalidate method = "POST">
                <div class="modal-body">
                
                  <div class="col-12">
                  
                    <input type="hidden" value="" name="patientID" id="patientID">
                    <label for="name" class="form-label">Select : </label>
                    <select class="form-control formVal" id="UpdateDHpatientStatus" name="UpdateDHpatientStatus" required>
                      <option value="">मरीज की स्थिति</option>
                      '.$patientStatusOptions.'
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="name" class="form-label">Description :</label>
                    <textarea class="form-control" id="updateDescriptionDH" name="updateDescriptionDH"></textarea>
                  </div>

                  <div class="col-12">
                    <label for="otherDetials" class="form-label">Prescription * (Format : jpg/jpeg/png/pdf)</label>
                    <input type="file" class="form-control formVal" accept="application/pdf,image/*"  name="prescription" id="prescription" required>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" id="updatePatientDataAtDH" class="btn btn-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          
    </div>
          <script src="../template/jquery-3.6.3.min.js"></script>
          <script src="../template/assets/js/bootstrap.min.js"></script>
          
          <script src="../template/patient_filter.js" ></script>
          <script>
            $(".showPSKImage").on("click", function (event) {
                let framePath = $(this).attr("data-imagepath");
                $("#objectViewer").attr("data",  "../"+framePath);
                $("#objectframe").attr("src",  "https://docs.google.com/viewer?url=../"+framePath+"&embedded=true");
              
              
            })

            $(".update-prescription").on("click", function (event) {
             
              $("#patientID").val($(this).attr("data-id"));
            
          })

          $(".showDHImage").on("click", function (event) {
             
            let framePath = $(this).attr("data-imagepath");
            $("#objectViewer").attr("data",  "../"+framePath);
            $("#objectframe").attr("src",  "https://docs.google.com/viewer?url=../"+framePath+"&embedded=true");
          
          
        })
          </script>
  </body>
</html>
';
    echo $content;
?>