<?php
if(!isset($_SESSION))
{
    session_start();
}
/**
 * Displays site name.
 */
function site_name()
{
    echo config('name');
}

/**
 * Displays site url provided in config.
 */
function site_url()
{
    echo config('site_url');
}

/**
 * Displays site version.
 */
function site_version()
{
    echo config('version');
}



/**
 * Website navigation.
 */
function nav_menu($sep = ' | ')
{
    $site_url = 'http://3.109.136.34/baigaSwasthyaShivir';
    $bgColor = '#fff';
    if(isset($_SESSION["role"]))
    {
        if($_SESSION['role'] == 'PHC'){
            $bgColor = '#8ebfbc';
        }
        if($_SESSION['role'] == 'DH'){
            $bgColor = '#d2d48a';
        }
        if($_SESSION['role'] == 'ACT'){
            $bgColor = '#deb168';
        }
        if($_SESSION['role'] == 'Admin'){
            $bgColor = '#bfa67e';
        }
    }

    $header = '';

    $header = '<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.108.0">
        <title>बैगा स्वास्थ्य परीक्षण शिविर</title>
        <link rel="icon" type="image/x-icon" href="'.$site_url.'/template/assets/images/cg-govt.png">

        <link href="'.$site_url.'/template/assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
        body{
            background-color:'.$bgColor.';
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
        <!-- Custom styles for this template -->
        <link href="'.$site_url.'/template/dashboard.css" rel="stylesheet">
    </head>
    <body>
        
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-3 me-0 px-3 fs-6" href="#"><img src="'.$site_url.'/template/assets/images/cg-govt.png" class="mx-2" height="30" width="30">बैगा स्वास्थ्य परीक्षण शिविर</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>';
        if(isset($_SESSION["role"])){

        if($_SESSION["role"] == 'Admin')
        {
            $header.= '<div class="navbar-nav flex-row px-3">
            <div class="nav-item ">
                <a class="nav-link" href="admin.php" aria-current="page">
                    Home
                </a>
            </div>
            <div class="nav-item mx-3">
                <a class="nav-link" aria-current="page">
                    |
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" aria-current="page">
                    LoggedIn As: '.$_SESSION["role"].'
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
        </div>';
        }
        else{

        $header.= '<div class="navbar-nav flex-row px-3">

            <div class="nav-item ">
                <a class="nav-link" href="home.php" aria-current="page">
                    Add Patient
                </a>
            </div>
            <div class="nav-item mx-3">
                <a class="nav-link" aria-current="page">
                    |
                </a>
            </div>
            <div class="nav-item ">
                <a class="nav-link" href="patient_listing.php" aria-current="page">
                    Patient List
                </a>
            </div>
            <div class="nav-item mx-3">
                <a class="nav-link" aria-current="page">
                    |
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" aria-current="page">
                    LoggedIn As: '.$_SESSION["role"].'
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
        </div>';
        }
    } 
    $header .= '</header>';
    
    echo trim($header, $sep);
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function page_content()
{
    if(!isset($_SESSION['username']))
    {
        $page = 'login';
    }else{
        $page = $_GET['page'];
    }
    // $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';

    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/404.phtml';
    }

    echo file_get_contents($path);
}

/**
 * Starts everything and displays the template.
 */
function init()
{
    
    config('template_path') . '/template.php';
    
}

function logout()
{
    unset($_SESSION);
    session_unset();
    session_destroy();
    $_SESSION = [];
    $_GET['page'] = 'login';
    init();
}

function dd($data){
    echo "<pre>";
    print_r($data);
}

function redirect($url) {
    header('Location: '.$url);
    die();
}

function uploadPrescriptionFile()
{
    
        $msg = ['status'=>false, 'msg'=>'', 'path'=>''];
        $target_dir = "uploads/";
        $target_file = $target_dir . time().basename($_FILES["prescription"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["prescription"]["tmp_name"]);
            if($check !== false) {

                $msg['msg'] =  "File is an image - " . $check["mime"] . ".";

                $uploadOk = 1;
            } else {

                $msg['msg'] =  "File is not an image";

                $uploadOk = 0;

            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            $msg['msg'] =  "Sorry, file already exists.";
        
        }

        // Check file size
        // if ($_FILES["prescription"]["size"] > 500000) {
        //     $msg['msg'] =  "Sorry, your file is too large. max upload size is 500KB";
        // 
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf" ) {
            $uploadOk = 0;
            $msg['msg'] =  "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
            
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg['msg'] =  "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["prescription"]["tmp_name"], $target_file)) {

            $msg['status'] = true;
            $msg['msg'] = "Success.";
            $msg['path'] = $target_file;
            
        } else {
            $msg['msg'] =  "Sorry, there was an error uploading your file.";
            }
        }

    return $msg;
}

function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    ob_end_clean();

    header("Cache-Control: public"); 
    header("Content-Type: application/octet-stream");
    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename={$filename}");


    // force download  
    // header("Content-Type: application/force-download");
    // header("Content-Type: application/download");

    // header("Cache-Control: public"); 
    // header("Content-Type: application/octet-stream");

    // header('Content-Encoding: UTF-8');
    // header('Content-type: text/csv; charset=UTF-8');
    // header("Content-Disposition: attachment; filename={$filename}");
    // echo "\xEF\xBB\xBF"; // UTF-8 BOM

}

function fetch_db_data($sql){
    if(! $con ) {
        die('Could not connect: ' . mysql_error());
     }
     
     mysql_select_db('health');
     $retval = mysql_query( $sql, $con );
     
     if(! $retval ) {
        die('Could not get data: ' . mysql_error());
     }

     return $retval;
}   