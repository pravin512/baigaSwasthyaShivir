var filtertahsil = '';
var filtervibhag = '';
var filterpatientStatus = '';
var filteraddedDate = '';
var downloadCSV = '';
var searchRegistrationNo = '';
var page=1;


function send_get_request()
{
  var loaderDiv = `<div id="preloader" style="position:absolute; width:100%; height:100%; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
  jQuery("body").prepend(loaderDiv);
    var filterURL = 'patient_filter.php?filtertahsil='+filtertahsil+'&filtervibhag='+filtervibhag+'&filterpatientStatus='+filterpatientStatus+'&filteraddedDate='+filteraddedDate+'&downloadCSV='+downloadCSV+'&searchRegistrationNo='+searchRegistrationNo+'&page='+page;
    if(downloadCSV == 1)
    {
      window.open(filterURL);
      jQuery("#preloader").remove();
      return false;
    }else{
      $.ajax({url: filterURL, success: function(result){
          $("#tablebody").html(result);
          jQuery("#preloader").remove();
      }});
    }
}

function get_request_data()
{
    filtertahsil = document.getElementById('filtertahsil').value
    filtervibhag = document.getElementById('filtervibhag').value
    filterpatientStatus = document.getElementById('filterpatientStatus').value
    filteraddedDate = document.getElementById('addedDate').value
    searchRegistrationNo = document.getElementById('searchRegistrationNo').value

    send_get_request();
}

$('#filtertahsil').on('change', function(){
    get_request_data();
})

$('#filtervibhag').on('change', function(){
    get_request_data();
})

$('#filterpatientStatus').on('change', function(){
    get_request_data();
})

$('#addedDate').on('change', function(){
    get_request_data();
})

$('#downloadCSV').on('click', function(){
  downloadCSV = 1;
  var downloadURL = 'patient_filter.php?downloadCSV='+downloadCSV;
  window.open(downloadURL);
  return false;
})

$('#searchButton').on('click', function(){
  get_request_data();
})

$('#clearButton').on('click', function(){
  document.getElementById('searchRegistrationNo').value = '';
  get_request_data();
})

$('#clearAllFilter').on('click', function(){
  document.getElementById('filtertahsil').value = "";
  document.getElementById('filtervibhag').value = "";
  document.getElementById('filterpatientStatus').value = "";
  document.getElementById('addedDate').value = "";
  document.getElementById('searchRegistrationNo').value = '';
  get_request_data();
})

$("table").on('click', '.page-link', function(){
  page = $(this).attr('data');

  $(".page-link").each(function(i) {
    $(this).removeClass("active");
  });

  $(this).addClass("active");
  get_request_data();
})


$('#updatefrm').submit(function (event) {
    event.preventDefault();
    if ($('#updatefrm')[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
      update_data();
    }
    $('#updatefrm').addClass('was-validated');
  });

function update_data()
{
    var statusDH = $('#UpdateDHpatientStatus').val();
    var descripton = $('#updateDescriptionDH').val();
    var id = $('#patientID').val();
    var prescription = document.getElementById('prescription');
    var formData = new FormData(); 

    formData.append('patientStatusDH', statusDH);
    formData.append('patientDescrptionDH', descripton);
    formData.append('id', id);
    formData.append('prescription', prescription.files[0]);

    $.ajax({
      method:"POST",
      url:"updateAtDH.php",    
      data: formData,  
      cache: false,
      contentType: false,
      processData: false,   
      success: function(data){         
        alert(data);
        $('#UpdateDetailModal').modal('hide');
      },
      error: function(xhr, status, error) {
        alert("Error : "+xhr.responseText);
      }  
    });
  }

function delete_patients()
{
  var checkboxes = document.getElementsByClassName(".patient_id");
  var patientids = [];
  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
          patientids.push();
      }
  }

  var formData = new FormData(); 

  formData.append('patients_ids', patientids);

  $.ajax({
    method:"POST",
    url:"deletePatients.php",    
    data: formData,  
    cache: false,
    contentType: false,
    processData: false,   
    success: function(res){         
      alert(res);
    },
    error: function(xhr, status, error) {
      alert("Error : "+xhr.responseText);
    }  
  });
}

$("#deletePatient").on('click', ()=>{
  delete_patients();
});
