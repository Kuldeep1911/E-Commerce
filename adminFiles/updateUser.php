<?php
session_start();
include("connect.php");

if(isset($_POST["id"])){

    
    $sql='UPDATE user set user_name="'.$_POST['name'].'",password="'.$_POST['password'].'",isAdmin="'.$_POST['Role'].'",Status="'.$_POST['Status_user'].'" where user_id="'.base64_decode($_POST['id']).'"';
    
    $query=mysqli_query($conn,$sql);

    if($query){
        // print_r(mysqli_error($conn));
        $_SESSION['success']='User Updated Successfully';
        header('location:../production/add_user.php');
    }
    else{
        // print_r(mysqli_error($conn));
        $_SESSION['error']='Failed to Update'.mysqli_error($conn);
        header('location:../production/add_user.php');
    }

}else{
    print_r('something went wrong');
}

?>