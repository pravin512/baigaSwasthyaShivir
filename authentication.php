<?php
require 'includes/config.php';
require 'includes/functions.php';

    // if(isset($_SESSION['username']))
    // {
    //     $_GET['page'] = 'home';
    //     init();
    // }
    // session_start();
    require 'config/database.php';
    
    $username=$_POST['user'];
    $password=md5($_POST['pass']);
    $role=$_POST['userrole'];
    
        //topreventfrommysqliinjection
        $username=stripcslashes($username);
        $password=stripcslashes($password);
        $username=mysqli_real_escape_string($con,$username);
        $password=mysqli_real_escape_string($con,$password);
    
        $sql="select * from users where username='$username' and password='$password' and role='$role' and status = 1";
        
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        
        if($count==1){
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['tahsil'] = $row['tahsil'];
            if($row['role'] == 'PHC')
            {
                redirect('home.php');
            }
            if($row['role'] == 'DH')
            {
                redirect('patient_listing.php');
            }
            if($row['role'] == 'ACT')
            {
                redirect('patient_listing.php');
            }
            if($row['role'] == 'Admin')
            {
                redirect('admin.php');
            }

        }
        else{
            echo "<script>alert('Invalid username/password.'); window.location.href = 'login.php'</script>";
            $_SERVER['message'] = 'Invalid username/password';
            // redirect('login.php');
            // $_GET['page'] = 'login';
            // init();
        }
?>