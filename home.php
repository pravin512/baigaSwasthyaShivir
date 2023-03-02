<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';
require 'includes/constants.php';

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

$content = nav_menu();
$content .= '
<link href="../template/checkout.css" rel="stylesheet">
<div class="container-fluid">
  <div class="row">
  <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="row g-5 justify-content-center pt-1">
      <div class="col-md-12 col-lg-12" style="box-shadow: 0 4px 25px -4px #9da5ab; ">
        <h4 class="mb-3 text-center">विशेष रूप से कमजोर जनजाति समूह बैगा का स्वास्थ्य परीक्षण शिविर</h4>
        <hr class="my-4">
        <form enctype=multipart/form-data class="needs-validation addfrm" id="addfrm" action="add.php" novalidate method = "POST">
          <div class="row g-3">
            <div class="col-4">
              <label for="registrationNo" class="form-label">पंजीयन क्रमांक *</label>
              <input type="text" class="form-control formVal" id="registrationNo" name="registrationNo" placeholder="" value="" required tab="1" autofocus>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="name" class="form-label">नाम *</label>
              <input type="text" class="form-control formVal" id="name" name="name" placeholder="" value="" required tab="1" autofocus>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="age" class="form-label">उम्र *</label>
              <input type="text" class="form-control formVal" id="age" name="age" placeholder="" value="" required tab="1">
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="father_husbandName" class="form-label">पिता/पति का नाम</label>
                <input type="text" class="form-control formVal" id="father_husbandName" name="father_husbandName" placeholder="">
                <div class="invalid-feedback">
                  required.
                </div>
            </div>

            <div class="col-4">
              <label for="mother" class="form-label">माता का नाम</label>
              <input type="text" class="form-control formVal" id="mother" name="mother" placeholder="">
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="weight" class="form-label">वजन ( किलो )</label>
              <input type="text" class="form-control formVal" id="weight" name="weight" placeholder="">
              <div class="invalid-feedback">
              required.
              </div>
            </div>

            <div class="col-4">
              <label for="height" class="form-label">ऊंचाई ( फीट )</label>
              <input type="text" class="form-control formVal" id="height" name="height" placeholder="">
            </div>

            <div class="col-4">
              <label for="sex" class="form-label">लिंग</label>
              <select class="form-select formVal" id="sex" name="sex">
                <option value="">Choose...</option>
                <option value="male">Male</option>
                <option value="male">Female</option>
                <option value="other">Other</option>
              </select>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="aadhar" class="form-label">आधार कार्ड नंबर </label>
              <input type="text" class="form-control formVal"  id="aadhar" name="aadhar" placeholder="">
            </div>

            <div class="col-4">
              <label for="mobile" class="form-label">मोबाइल नंबर</label>
              <input type="text" class="form-control formVal" id="mobile" name="mobile" placeholder="">
            </div>

            <div class="col-4">
              <label for="tahsil" class="form-label">तहसील *</label>
              <select class="form-select formVal" id="tahsil" name="tahsil" required>
                <option value="">Choose...</option>
                '.$tahsilsOptions.'
              </select>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="hitgrahAddress" class="form-label">हितग्राही का पूरा पता</label>
              <input type="text" class="form-control formVal" id="hitgrahAddress" name="hitgrahAddress" placeholder="">
            </div>

            <div class="col-4">
              <label for="vibhag" class="form-label">विभाग का नाम *</label>
              <select class="form-select formVal" id="vibhag" name="vibhag" required>
                <option value="">Choose...</option>
                '.$vibhagOptions.'
              </select>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="anyaRog" class="form-label">अन्य रोग का विवरण दे </label>
              <input type="text" class="form-control formVal" id="anyaRog" name="anyaRog" placeholder="">
            </div>

            <div class="col-4">
              <label for="patientStatus" class="form-label">मरीज की स्थिति *</label>
              <select class="form-select formVal" id="patientStatus" name="patientStatus" required>
                <option value="">Choose...</option>
                '.$patientStatusOptions.'
              </select>
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4 d-none" id="patientStatusOtherDiv">
              <label for="patientStatusOther" class="form-label">(मरीज की स्थिति) अन्य *</label>
              <input type="text" class="form-control formVal" id="patientStatusOther" name="patientStatusOther" placeholder="">
              <div class="invalid-feedback">
                required.
              </div>
            </div>

            <div class="col-4">
              <label for="otherDetials" class="form-label">Prescription * (Format : jpg/jpeg/png/pdf)</label>
              <input type="file" class="form-control formVal" accept="application/pdf,image/*"  name="prescription" id="prescription" required>
            </div>

          </div>

          <div class="d-flex justify-content-center mb-5">
            <button class="btn btn-light btn-sm mt-5" onclick="location.reload();" style="margin-right:10px;">Cancel</button>
            <button class="btn btn-primary btn-sm mt-5" type="submit" >Submit</button>
        </div>
        </form>
      </div>
    </div>
      <div class="col-md-6 col-lg-7" id="printDiv" style="box-shadow: 0 4px 25px -4px #9da5ab; display:none; ">
          <h4 class="mb-3 text-center">विशेष रूप से कमजोर जनजाति समूह बैगा का स्वास्थ्य परीक्षण शिविर</h4>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">पंजीयन क्रमांक  :</th>
                <td><span id="printRegistrationNo"></span></td>
              </tr>
              <tr>
                <th scope="row">नाम  :</th>
                <td><span id="printName"></span></td>
              </tr>
              
              <tr>
                <th scope="row">उम्र :</th>
                <td><span id="printAge"></span></td>
              </tr>
              <tr>
                <th scope="row">पिता/पति का नाम :</th>
                <td colspan="2"><span id="printfather_husbandName"></span></td>
              </tr>

              <tr>
                <th scope="row">माता का नाम :</th>
                <td colspan="2"><span id="printmother"></span></td>
              </tr>

              <tr>
                <th scope="row">वजन :</th>
                <td colspan="2"><span id="printweight"></span></td>
              </tr>

              <tr>
                <th scope="row">ऊंचाई :</th>
                <td colspan="2"><span id="printheight"></span></td>
              </tr>

              <tr>
                <th scope="row">लिंग :</th>
                <td colspan="2"><span id="printSex"></span></td>
              </tr>

              <tr>
                <th scope="row">आधार कार्ड नंबर  :</th>
                <td colspan="2"><span id="printAadhar"></span></td>
              </tr>

              <tr>
                <th scope="row">मोबाइल नंबर :</th>
                <td colspan="2"><span id="printMobile"></span></td>
              </tr>

              <tr>
                <th scope="row">तहसील :</th>
                <td colspan="2"><span id="printTahsil"></span></td>
              </tr>

              <tr>
                <th scope="row">हितग्राही का पूरा पता :</th>
                <td colspan="2"><span id="printhitgrahiAddress"></span></td>
              </tr>

              <tr>
                <th scope="row">विभाग का नाम :</th>
                <td colspan="2"><span id="printvibhag"></span></td>
              </tr>
              <tr>
                <th scope="row">अन्य रोग का विवरण :</th>
                <td colspan="2"><span id="printanyaRog"></span></td>
              </tr>
              <tr>
                <th scope="row">मरीज की स्थिति :</th>
                <td colspan="2"><span id="printpatientStatus"></span></td>
              </tr>
              <tr>
                <th scope="row">अन्य (मरीज की स्थिति)  :</th>
                <td colspan="2"><span id="printPatientStatusOther"></span></td>
              </tr>
            </tbody>
          </table>
      </div>
    </main>
  </div>
</div>
     
      <script src="../template/jquery-3.6.3.min.js"></script>
      <script src="../template/assets/dist/js/bootstrap.bundle.min.js"></script>

      </script>
      <script src="../template/checkout.js" ></script>

  </body>
</html>
';
echo $content;
?>