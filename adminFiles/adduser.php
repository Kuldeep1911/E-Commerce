<?php
include("connect.php");
// print_r($_POST);
if((empty($_POST['userName']))&&(empty($_POST['password']))&&(empty($_POST['Role']))&&(empty($_POST['Status'])))
{
  print_r('fill all');
}
else{
    $sql = "INSERT INTO user (user_name,password,isAdmin,Status)VALUES('".$_POST['userName']."','".$_POST['password']."','".$_POST['Role']."','".$_POST['Status']."')" ;
    $result = mysqli_query($conn,$sql);
   if($result){
       echo "Updated";
   }else{
       echo "error";
   }
}


?>