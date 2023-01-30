var filtertahsil = '';
var filtervibhag = '';
var filterpatientStatus = '';
var filteraddedDate = '';


function send_get_request()
{
  var loaderDiv = `<div id="preloader" style="position:absolute; width:100%; height:100%; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
  jQuery("body").prepend(loaderDiv);
    var filterURL = 'patient_filter.php?filtertahsil='+filtertahsil+'&filtervibhag='+filtervibhag+'&filterpatientStatus='+filterpatientStatus+'&filteraddedDate='+filteraddedDate;
    $.ajax({url: filterURL, success: function(result){
        $("#tablebody").html(result);
        jQuery("#preloader").remove();
    }});
}

function get_request_data()
{
    filtertahsil = document.getElementById('filtertahsil').value
    filtervibhag = document.getElementById('filtervibhag').value
    filterpatientStatus = document.getElementById('filterpatientStatus').value
    filteraddedDate = document.getElementById('addedDate').value

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
