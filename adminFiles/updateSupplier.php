<?php
session_start();
include("connect.php");


if(isset($_POST["sup_id"])){

    
    $sql='UPDATE supplierList set supName="'.$_POST['supName'].'",supAddress="'.$_POST['supAddress'].'",supNum="'.$_POST['supNum'].'",supEmail="'.$_POST['supEmail'].'" where sup_id="'.base64_decode($_POST['sup_id']).'"';
    
    $query=mysqli_query($conn,$sql);
    // print_r($sql);exit;
    if($query){
        // print_r(mysqli_error($conn));
        $_SESSION['success']='Supplier Updated Successfully';
        header('location:../production/Manage_Supplier.php');
    }
    else{
        // print_r(mysqli_error($conn));
        $_SESSION['error']='Failed to Update'.mysqli_error($conn);
        header('location:../production/Manage_Supplier.php');
    }

}

?>