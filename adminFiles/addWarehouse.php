<?php
include("connect.php");

// print_r($_POST);
if((!empty($_POST["Warehouse_name"])) && (!empty($_POST["Warehouse_Address"]))&&(!empty($_POST["Warehouse_Email"]))&&(!empty($_POST["Warehouse_ph"]))){
    // print_r($_POST);
    $sql='INSERT INTO warehouse (warehouse_name,warehouse_address,warehouse_email,warehouse_ph) VALUES("'.$_POST["Warehouse_name"].'","'.$_POST["Warehouse_Address"].'","'.$_POST["Warehouse_Email"].'","'.$_POST["Warehouse_ph"].'")';
    // print_r($sql);
    $result=mysqli_query($conn,$sql);
    if($result){
        print_r('Successfully submitted');
    }
    else{
        print_r('something went wrong!').mysqli_error( $conn );
    }
}
else{
    print_r('Please Fill all details');
}
?>