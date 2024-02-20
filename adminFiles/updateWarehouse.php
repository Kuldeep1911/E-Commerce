<?php
session_start();
include("connect.php");


if(isset($_POST["warehouse__id"])){

    
    $sql='UPDATE warehouse set warehouse_name="'.$_POST['warehouse_Name'].'",warehouse_address="'.$_POST['warehouse_Address'].'",warehouse_ph="'.$_POST['warehouse_Num'].'",warehouse_email="'.$_POST['warehouse_Email'].'" where warehouse_id="'.base64_decode($_POST['warehouse__id']).'"';
    
    $query=mysqli_query($conn,$sql);
    // print_r($sql);exit;
    if($query){
        // print_r(mysqli_error($conn));
        $_SESSION['success']='Warehouse Updated Successfully';
        header('location:../production/Manage_Warehouse.php');
    }
    else{
        // print_r(mysqli_error($conn));
        $_SESSION['error']='Failed to Update'.mysqli_error($conn);
        header('location:../production/Manage_Warehouse.php');
    }

}

?>