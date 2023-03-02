<?php
 require 'config/database.php';
 require 'includes/config.php';
 require 'includes/functions.php';
 require 'includes/constants.php';

 if(!isset($_SESSION['username']))
{
    header('Location: login.php');
    die();
}

if($_SESSION['role'] == 'Admin')
{
    

$sql = "SELECT COUNT(id) FROM users";
$result=mysqli_query($con,$sql);
mysql_set_charset("utf8");
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
$content = nav_menu();
$content .= '
<style>
body{
    background-color:#fff;
}
.bg-info{
    background-color: #17a2b8 !important;
}
    
</style>
<div class="container">
    <div class="col-12 d-flex justify-content-start">
        <a href="users.php">
            <div class="card text-white bg-info m-3 d-flex justify-content-start no-gutters shadow-lg text-center" style="max-width: 18rem;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">'.$row[0]['COUNT(id)'].'</p>
                </div>
            </div>
        </a>
    </div>
</div>
        <script src="../template/jquery-3.6.3.min.js"></script>
        <script src="../template/assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>';
echo $content;

}else{
    echo '<div class="container">Permission denied</div>';
}
 ?>