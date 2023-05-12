<?php
require 'config/database.php';
require 'includes/config.php';
require 'includes/functions.php';

define("UPDATE_USER", 1);
define("UPDATE_PASSWORD", 2);
define("UPDATE_STATUS", 3);

if($_POST['event_id'] = UPDATE_USER && isset($_POST['updateName']) && isset($_POST['updateusername']) && isset($_POST['updateuserrole']) && isset($_POST['updatetahsil']) && isset($_POST['userID']) && isset($_POST['updatestatus']))
{
    try{

        $checkUser = "SELECT COUNT(id) AS userdata FROM `users` where `username` = '".$_POST['updateusername']."' AND `id` != ".$_POST['userID'];
            
        $check=mysqli_query($con,$checkUser);
        $Checkrow=mysqli_fetch_all($check,MYSQLI_ASSOC);
        if($Checkrow[0]['userdata'] == 0)
        {
            $sql="UPDATE `users` SET `name`='".$_POST['updateName']."',`username`='".$_POST['updateusername']."', `role`='".$_POST['updateuserrole']."', `tahsil`='".$_POST['updatetahsil']."', `status`='".$_POST['updatestatus']."' WHERE `id` = ".$_POST['userID'];
            if(mysqli_query($con,$sql)){
                echo 'success';
            }
        }else{
            echo 'Duplicate username';
        }
    }
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
}else if($_POST['event_id'] = UPDATE_PASSWORD && isset($_POST['newPassword']) && isset($_POST['changepassuserID']) && isset($_POST['ConfirmnewPassword']))
{
    if($_POST['newPassword'] == $_POST['ConfirmnewPassword'])
    {
        try{
            $sql="UPDATE `users` SET `password`='".md5($_POST['newPassword'])."' WHERE `id` = ".$_POST['changepassuserID'];
            if(mysqli_query($con,$sql)){
                echo 'success';
            }
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }else{
        echo "Password Not matched.";
    }
}



?>