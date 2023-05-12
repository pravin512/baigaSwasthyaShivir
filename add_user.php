<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';
  
if(isset($_POST['name']) && isset($_POST['username'])  && isset($_POST['password'])  && isset($_POST['confirmPassword'])  && isset($_POST['userrole'])  && isset($_POST['tahsil']))
{

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $userrole = $_POST['userrole'];
    $tahsil = $_POST['tahsil'];
    if($_POST['password'] == $_POST['confirmPassword'])
    {
        try{

            $checkUser = "SELECT COUNT(id) AS userdata FROM `users` where `username` = '".$username."'";
            
            $check=mysqli_query($con,$checkUser);
            $Checkrow=mysqli_fetch_all($check,MYSQLI_ASSOC);
            if($Checkrow[0]['userdata'] == 0)
            {
                $sql="INSERT INTO `users`(`name`, `username`, `password`, `role`, `tahsil`) VALUES ('".$name."','".$username."','".$password."','".$userrole."','".$tahsil."')";
                
                $result=mysqli_query($con,$sql);
                if ( $result === false )
                {
                    echo "Something went wrong!";
                }else{
                    echo "Success";
                }
            }else{
                echo "Duplicate username!";
            }
        }catch(Exception $e) {

            echo 'Message: ' .$e->getMessage();
          }
    }else{
        echo 'Password not matching!';
    }
}else{
    echo 'All fields are required!';
}



// $_GET['page'] = 'home';
// init();

?>