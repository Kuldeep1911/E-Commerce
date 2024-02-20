<?php
include("connect.php");
if(isset($_REQUEST['user_id']))
{
    $id = base64_decode($_REQUEST['user_id']);
    $sql = "SELECT * FROM user where user_id='".$id."'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)==0)
    {
        echo false;
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $details = '';
        $details = '
        <div class="form-group">
        <label for="">Name</label>
            <input type="hidden" value="'.base64_encode($row['user_id']).'" class="form-control" name="id"/>
            <input type="text" value="'.$row['user_name'].'" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Role : </label>
            <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="admin" value="1" name="Role" class="custom-control-input">
            <label class="custom-control-label" for="admin">Admin</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="user" value="0" name="Role" class="custom-control-input">
            <label class="custom-control-label" for="user">User</label>
        </div>
    </div>    
       
    
    <div class="form-group">
        <label for="">Status : </label>
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Active" value="Active" name="Status_user" class="custom-control-input">
        <label class="custom-control-label" for="Active">Active</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Deactivate"value="Deactivate" name="Status_user" class="custom-control-input">
        <label class="custom-control-label" for="Deactivate">Deactivate</label>
        </div>
    </div> 
        <button type="submit" class="btn btn-success mt-2 form-control">Update Data</button>
        ';
        echo $details;
       
    }
}
// else if(isset($_REQUEST['cus_id'])){
//     $id = base64_decode($_REQUEST['cus_id']);
//     $sql = "SELECT * FROM customer where cus_id='".$id."'";
//     $query = mysqli_query($conn,$sql);
//     if(mysqli_num_rows($query)==0)
//     {
//         echo false;
//     } else
//     {
//         $row = mysqli_fetch_assoc($query);
//         $details = '';
//         $details = '
//         <div class="form-group">
//         <label for="">Name</label>
//             <input type="hidden" value="'.base64_encode($row['Cus_id']).'" class="form-control" name="id"/>
//             <input type="text" value="'.$row['cusName'].'" class="form-control" name="name"/>
//         </div>
//         <div class="form-group">
//             <label for="">Phone No</label>
//             <input type="text" name="password" class="form-control" value="'.$row['cusPh'].'">
//         </div>
//         <div class="form-group">
//         <label for="">Address</label>
//         <input type="text" name="password" class="form-control" value="'.$row['cusAdd'].'">
//     </div>
        
//     </div>    
       
    
    
//         <button type="submit" class="btn btn-success mt-2 form-control">Update Data</button>
//         ';
//         echo $details;
       
//     }
// }
else{
    echo 'something went wrong';
}
?>