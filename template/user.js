$('#addUserfrm').submit(function (event) {
    event.preventDefault();
    if ($('#addUserfrm')[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        add_user();
    }
    $('#addUserfrm').addClass('was-validated');
  });

  function add_user()
  {
    var loaderDiv = `<div id="preloader" style="position:fixed; width:100%; height:100%; bottom:0; left:0; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
    jQuery("body").prepend(loaderDiv);
    var formData = new FormData($('#addUserfrm')[0]); 

    $.ajax({
        method:"POST",
        url:"add_user.php",    
        data: formData,  
        cache: false,
        contentType: false,
        processData: false,   
        success: function(data){      
                    // console.log(data);
          
            const element = document.getElementById("preloader");
            element.remove();
            
            alert(data);
            // window.location = window.location.href;
        },
        error: function(xhr, status, error) {
          alert("Error : "+xhr.responseText);
        }  
      });
  }

$("table").on('click', '.editUser', function(){
    document.getElementById('userID').value = $(this).attr('data-id');
    document.getElementById('updateName').value = $(this).attr('data-name');
    document.getElementById('updateusername').value = $(this).attr('data-username');
    $("#updateuserRole").val($(this).attr('data-role')).change();
    $("#updatetahsil").val($(this).attr('data-tahsil')).change();
    $("#updatestatus").val($(this).attr('data-status')).change();
})

$('table').on('click', '.changePassword', function(){
    document.getElementById('usernameText').innerText = $(this).attr('data-name');
    document.getElementById('changepassuserID').value = $(this).attr('data-id');
})


$('#updateUserfrm').submit(function (event) {
    event.preventDefault();
    if ($('#updateUserfrm')[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        update_user();
    }
    $('#updateUserfrm').addClass('was-validated');
  });

  function update_user()
  {
    var loaderDiv = `<div id="preloader" style="position:fixed; width:100%; height:100%; bottom:0; left:0; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
    jQuery("body").prepend(loaderDiv);
    var formData = new FormData($('#updateUserfrm')[0]); 

    $.ajax({
        method:"POST",
        url:"update_user.php?event_id=1",    
        data: formData,  
        cache: false,
        contentType: false,
        processData: false,   
        success: function(data){      
                    // console.log(data);
          
            const element = document.getElementById("preloader");
            element.remove();
            alert(data);
          window.location = window.location.href;
        },
        error: function(xhr, status, error) {
          alert("Error : "+xhr.responseText);
        }  
      });
  }


$('#changePasswordfrm').submit(function (event) {
event.preventDefault();
if ($('#changePasswordfrm')[0].checkValidity() === false) {
    event.stopPropagation();
} else {
    change_password();
}
$('#changePasswordfrm').addClass('was-validated');
});

function change_password()
{
    var loaderDiv = `<div id="preloader" style="position:fixed; width:100%; height:100%; bottom:0; left:0; text-align:center; color:#fff; background:#000; opacity:0.6; z-index:9999;"><p style="margin-top:200px;">Loading...<p></div>`
    jQuery("body").prepend(loaderDiv);
    var formData = new FormData($('#changePasswordfrm')[0]); 
    formData.append('event_id', 2); // change password
    $.ajax({
        method:"POST",
        url:"update_user.php",    
        data: formData,  
        cache: false,
        contentType: false,
        processData: false,   
        success: function(data){      
            const element = document.getElementById("preloader");
            element.remove();
            alert(data);
        //   window.location = window.location.href;
        },
        error: function(xhr, status, error) {
          alert("Error : "+xhr.responseText);
        }  
      });
  }