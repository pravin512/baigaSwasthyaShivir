<?php
require 'includes/constants.php';
require 'includes/config.php';
require 'includes/functions.php';

$site_url = config('site_url');

$content = nav_menu();
$content .= '
<style>
    body{
        background-color:teal !important;
        
        // background:url("kidImage.JPEG") !important;
        // background-repeat: no-repeat  !important;
        // background-size:cover !important;
        // background-position: center center;

    }
    .img-block{
    background:url("'.$site_url.'/template/assets/images/bhoramdeo.png");
    background-repeat:no-repeat;
    background-size:contain;
    background-position: center center;
    }
</style>
<div class="container">
    <div class="mt-5 col-11 d-flex justify-content-center no-gutters shadow-lg" style="margin:0 auto;">
        <div class="col-5 col-xs-12 bg-white p-5">
            <h3 class="pb-3">Login</h3>
            <div class="form-style">
                <form  name="f1" action="'.$site_url.'/authentication.php" onsubmit = "return validation()"  novalidate method = "POST">
                    <div class="form-group pb-3">    
                        <select class="form-select" id="role" name="userrole" required>
                            <option value="">Select Role</option>
                            <option value="PHC">Primary Health Camp</option>
                            <option value="DH">District Hospital</option>
                            <option value="ACT">AC Tribal</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group pb-3">    
                        <input type="text" placeholder="username" class="form-control formVal" value="" id ="user" name = "user">  
                    </div>
                    <div class="form-group pb-3">   
                        <input type="password" placeholder="password" class="form-control" value="" id ="pass" name = "pass">
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7 d-none d-md-block" style="position:relative;">
            <img src="'.$site_url.'/template/assets/images/kidImage.JPG" style="width:100%; height:100%; position:absolute; top:0; left:0; z-index:1">
            
        </div>
    </div>
</div>
        <script src="'.$site_url.'/template/jquery-3.6.3.min.js"></script>
        <script src="'.$site_url.'/template/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="'.$site_url.'/template/login.js"></script>
    </body>
</html>';
echo $content;
?>