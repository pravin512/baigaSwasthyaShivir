// // Example starter JavaScript for disabling form submissions if there are invalid fields
// (function () {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   var forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//       form.addEventListener('submit', function (event) {
//         if (!form.checkValidity()) {
//           event.preventDefault()
//           event.stopPropagation()
//         }
        
//         // add_data();

//         form.classList.add('was-validated')
//       }, false)
//     })
// })()

$('#addfrm').submit(function (event) {
  event.preventDefault();
  if ($('#addfrm')[0].checkValidity() === false) {
      event.stopPropagation();
  } else {
    add_data();
  }
  $('#addfrm').addClass('was-validated');
});


function add_data()
{
  var loaderDiv = `<div id="preloader" style="position:fixed; width:100%; height:100%; bottom:0; left:0; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
  jQuery("body").prepend(loaderDiv);
    var elements = document.getElementsByClassName("formVal")[0];
    
    var formData = new FormData($('#addfrm')[0]); 
    // for(var i=0; i<elements.length; i++)
    // {
    //     if(elements[i].name == 'prescription[]')
    //     {            
    //       formData.append(elements[i].name, elements[i].files);
    //     }else{
    //       formData.append(elements[i].name, elements[i].value);
    //     }
        
    // }

    document.getElementById('printName').innerText = document.getElementById('name').value;
    document.getElementById('printAge').innerText = document.getElementById('age').value;
    document.getElementById('printfather_husbandName').innerText = document.getElementById('father_husbandName').value;
    document.getElementById('printmother').innerText = document.getElementById('mother').value;
    document.getElementById('printweight').innerText = document.getElementById('weight').value;
    document.getElementById('printheight').innerText = document.getElementById('height').value;
    document.getElementById('printSex').innerText = document.getElementById('sex').value;
    document.getElementById('printAadhar').innerText = document.getElementById('aadhar').value;
    document.getElementById('printMobile').innerText = document.getElementById('mobile').value;
    document.getElementById('printTahsil').innerText = document.getElementById('tahsil').value;
    document.getElementById('printhitgrahiAddress').innerText = document.getElementById('hitgrahAddress').value;
    document.getElementById('printvibhag').innerText = document.getElementById('vibhag').value;
    document.getElementById('printanyaRog').innerText = document.getElementById('anyaRog').value;
    document.getElementById('printpatientStatus').innerText = document.getElementById('patientStatus').value;
    // console.log(formData);
    $.ajax({
      method:"POST",
      url:"add.php",    
      data: formData,  
      cache: false,
      contentType: false,
      processData: false,   
      success: function(data){      
                  // console.log(data);
        if(data = 'Success')
        {
          print_form();
        }else{
          const element = document.getElementById("preloader");
          element.remove();
          alert(data);
        }
        
        // window.location = window.location.href;
      },
      error: function(xhr, status, error) {
        alert("Error : "+xhr.responseText);
      }  
    });
}

function print_form()
{
  var divContents = $("#printDiv").html();
  var printWindow = window.open('', '', 'height=400,width=800');
  printWindow.document.write('<html><head>');
  printWindow.document.write('</head><body >');
  printWindow.document.write(divContents);
  printWindow.document.write('</body></html>');
  printWindow.document.close();
  printWindow.print();
  alert('success');
  clearvalue();
}

function clearvalue()
{
  // var elements = document.getElementsByClassName("formVal");
    
  //   var formData = new FormData(); 
  //   for(var i=0; i<elements.length; i++)
  //   {
  //       elements[i].value = "";
  //       // if(elements[i].name == 'prescription')
  //       // {          
  //       //   formData.append(elements[i].name, elements[i].files[0]);
  //       // }else{
  //       //   formData.append(elements[i].name, elements[i].value);
  //       // }
        
  //   }
    // jQuery("#preloader").remove(); 
    window.location = window.location.href;
    
}