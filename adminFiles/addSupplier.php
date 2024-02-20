<?php
include 'connect.php';
session_start();
if(isset($_POST["submit"])){
    
    if((empty($_POST["supName"]))||(empty($_POST["supAddress"]))||(empty($_POST["supEmail"]))||(empty($_POST["supNum"]))){
     
        $_SESSION['error']='Please Fill information';
        header('location:../production/add_New_Supplier.php');
}
else{
    $sql='INSERT INTO supplierList (supName,supAddress,supNum,supEmail) VALUES ("'.$_POST['supName'].'","'.$_POST['supAddress'].'","'.$_POST['supNum'].'","'.$_POST['supEmail'].'")';
    $query=mysqli_query($conn,$sql);
    if($query){
        $_SESSION['msg'] = "Supplier Added Successfully..!";
        header('location:../production/add_New_supplier');
    }
    else{
        $_SESSION['error'] = "Something Went..!";
        header('location:../production/add_New_supplier');
    }
}
}

?>