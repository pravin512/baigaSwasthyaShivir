<?php
 require 'config/database.php';
 require 'includes/config.php';
 require 'includes/functions.php';
 require 'includes/constants.php';

 $site_url = config('site_url');

$sql = "SELECT * FROM users";
// mysqli_query($con, "set names utf8");
$fetch = mysqli_query($con, $sql);

$trow = ``;
$i = 1;
while ($row = mysqli_fetch_array($fetch, MYSQLI_NUM))
{
    // $changedStatus = $row[6]==1?0:1;
    $tr = "<tr>";
    $tr .= "<td  class='text-white'>".$i."</td>";
    $tr .= "<td  class='text-white'>".$row[1]."</td>";
    $tr .= "<td class='text-white'>".$row[2]."</td>";
    // $tr .= "<td class='text-white'>".$row[3]."</td>";
    $tr .= "<td class='text-white'>".$row[4]."</td>";
    $tr .= "<td class='text-white'>".$row[5]."</td>";
    $tr .= "<td class='text-white'>".$CommonStatus[1]."</td>";
    $tr .= "<td class='text-white'><button type='button' class='btn btn-sm btn-light editUser' data-id='".$row[0]."' data-name='".$row[1]."' data-username='".$row[2]."' data-role='".$row[4]."' data-tahsil='".$row[5]."' data-status='".$row[6]."' data-toggle='modal' data-target='#updateUserModal'>
    &#x270E;
    </button> <button type='button' class='btn btn-sm btn-light changePassword' data-name='".$row[1]."'  data-id='".$row[0]."' data-toggle='modal' data-target='#changePasswordfrmModel'>
    Change Password
    </button></td>";
    $tr .= "<tr>";
    $trow .= $tr;
    $i++;
}
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
<div class="container-fluid py-2">
    <div class="col-12 d-flex justify-content-start bg-info d-flex justify-content-start no-gutters shadow-lg card ">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title text-white">Users</h5>
            <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#addUserModal">
            Add User
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Tahsil</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="UpdateDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form enctype=multipart/form-data class="needs-validation addfrm" id="addUserfrm" action="add_user.php" novalidate method = "POST">
                        <div class="modal-body">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" value="" name="name" id="name" required>
                        </div>    
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" value="" name="username" id="username" required>
                        </div>     
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" value="" name="password" id="password" required>
                        </div>  
                        <div class="col-12">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" value="" name="confirmPassword" id="confirmPassword" required>
                        </div>   
                        <div class="col-12">
                            <label for="userRole" class="form-label">User Role</label>
                            <select class="form-select" id="userRole" name="userrole" required>
                                <option value="">Select Role</option>
                                <option value="PHC">Primary Health Camp</option>
                                <option value="DH">District Hospital</option>
                                <option value="ACT">AC Tribal</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>  
                        <div class="col-12">
                            <label for="tahsil" class="form-label">Tahsil</label>
                            <select class="form-select" id="tahsil" name="tahsil" required>
                                <option value="">Select Tahsil</option>
                                <option value="kawardha">Kawardha</option>
                                <option value="bodla">Bodla</option>
                                <option value="pandariya">pandariya</option>
                                <option value="saLohara">Lohara</option>
                                <option value="rengakhar">Rengakhar</option>
                                <option value="kunda">Kunda</option>
                                <option value="pipariya">Pipariya</option>
                            </select>
                        </div>       
                        </div>
                        <div class="modal-footer">
                        <button type="submit" id="addUserButton" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="UpdateUserDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form enctype=multipart/form-data class="needs-validation addfrm" id="updateUserfrm" action="add_user.php" novalidate method = "POST">
                        <div class="modal-body">
                        <div class="col-12">
                            <input type="hidden" value="" name="userID" id="userID">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" value="" name="updateName" id="updateName" required>
                        </div>    
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" value="" name="updateusername" id="updateusername" required>
                        </div>      
                        <div class="col-12">
                            <label for="userRole" class="form-label">User Role</label>
                            <select class="form-select" id="updateuserRole" name="updateuserrole" required>
                                <option value="">Select Role</option>
                                <option value="PHC">Primary Health Camp</option>
                                <option value="DH">District Hospital</option>
                                <option value="ACT">AC Tribal</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>  
                        <div class="col-12">
                            <label for="tahsil" class="form-label">Tahsil</label>
                            <select class="form-select" id="updatetahsil" name="updatetahsil" required>
                                <option value="">Select Tahsil</option>
                                <option value="kawardha">Kawardha</option>
                                <option value="bodla">Bodla</option>
                                <option value="pandariya">pandariya</option>
                                <option value="saLohara">Lohara</option>
                                <option value="rengakhar">Rengakhar</option>
                                <option value="kunda">Kunda</option>
                                <option value="pipariya">Pipariya</option>
                            </select>
                        </div>    
                        <div class="col-12">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="updatestatus" name="updatestatus" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>       
                        </div>
                        <div class="modal-footer">
                        <button type="submit" id="updateUserButton" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="changePasswordfrmModel" tabindex="-1" role="dialog" aria-labelledby="changePasswordfrmModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password for <span id="usernameText"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form enctype=multipart/form-data class="needs-validation" id="changePasswordfrm" action="update_user.php" novalidate method = "POST">
                        <div class="modal-body">
                        <div class="col-12">
                            <input type="hidden" value="" name="changepassuserID" id="changepassuserID">
                        </div>    
                        <div class="col-12">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" value="" name="newPassword" id="newPassword" required>
                        </div>      
                        <div class="col-12">
                            <label for="ConfirmnewPassword" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" value="" name="ConfirmnewPassword" id="ConfirmnewPassword" required>
                        </div>       
                        </div>
                        <div class="modal-footer">
                        <button type="submit" id="changePasswordButton" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </body>
</html>';
echo $content;
 ?>