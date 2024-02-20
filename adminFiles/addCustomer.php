<?php
include("connect.php");
// print_r($_POST);
if((empty($_POST['cusName']))&&(empty($_POST['cusPh']))&&(empty($_POST['cusAdd'])))
{
  print_r('Please Fill all details ');
}
else{
    $sql = "INSERT INTO customer (cusName,cusPh,cusAdd)VALUES('".$_POST['cusName']."','".$_POST['cusPh']."','".$_POST['cusAdd']."')" ;
    $result = mysqli_query($conn,$sql);
   if($result){
       echo "Customer Added";
   }else{
       echo "error".mysqli_error($conn);
   }
}


?>