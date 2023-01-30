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
    $nav_menu = '';
    $nav_items = config('nav_menu');
    foreach ($nav_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['REQUEST_URI']);
        $class = $query_string == $uri ? ' active' : '';
        $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;
        
        // Add nav item to list. See the dot in front of equal sign (.=)
        if(isset($_SESSION['username']))
        {
            if($name != 'Login')
            {
                if($name == 'Signout')
                {
                    $nav_menu .= '<div class="nav-item" style="bottom:0px">
                                        <a href="logout.php" title="' . $name . '" class="nav-link ' . $class . '"  aria-current="page" >
                                        ' . $name . '
                                        </a>
                                    </div>';
                }else
                {
                    $nav_menu .= '<div class="nav-item">
                    <a href="' . $url . '" title="' . $name . '" class="nav-link ' . $class . '"  aria-current="page" >
                      ' . $name . '
                    </a>
                  </div>';
                }

            }
            
        }else{
            if($name == 'Login')
            {
                // $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;

            }
        }
    }

    echo trim($nav_menu, $sep);
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
    $total = count($_FILES['prescription']['name']);
    $allmsg = [];
    $err = false;
    $PresPath = [];
    for( $i=0 ; $i < $total ; $i++ )
    {
        $msg = ['status'=>false, 'msg'=>'', 'path'=>''];
        $target_dir = "uploads/";
        $target_file = $target_dir . time().basename($_FILES["prescription"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["prescription"]["tmp_name"][$i]);
            if($check !== false) {
                $msg['status'] = false;
                $msg['msg'] = "File is an image - " . $check["mime"] . ".";
                array_push($allmsg, $msg);
            $uploadOk = 1;
            } else {
                $msg['status'] = false;
                $msg['msg'] = "File is not an image";
                array_push($allmsg, $msg);
                $uploadOk = 0;
                $err = True;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            $err = True;
            $msg['status'] = false;
            $msg['msg'] = "Sorry, file already exists.";
            array_push($allmsg, $msg);
        
        }

        // Check file size
        // if ($_FILES["prescription"]["size"] > 500000) {
        //     $msg['msg'] = "Sorry, your file is too large. max upload size is 500KB";
        //     array_push($allmsg, $msg);
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf" ) {
            $uploadOk = 0;
            $err = True;
            $msg['status'] = false;
            $msg['msg'] = "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
            array_push($allmsg, $msg);
            
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $err = True;
            $msg['status'] = false;
            $msg['msg'] = "Sorry, your file was not uploaded.";
            array_push($allmsg, $msg);
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["prescription"]["tmp_name"][$i], $target_file)) {

            $msg['status'] = true;
            $msg['msg'] = "Success.";
            $msg['path'] = $target_file;
            array_push($PresPath, $target_file);
            array_push($allmsg, $msg);
        } else {
            $msg['status'] = false;
            $msg['msg'] = "Sorry, there was an error uploading your file.";
            array_push($allmsg, $msg);
            }
        }
    }

    $resp = ['status'=>$err, 'data'=>$allmsg, 'path'=>$PresPath];

    return $resp;
}