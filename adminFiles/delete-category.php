<?php
include("connect.php");
$sql='Delete from category where id="'.base64_decode($_POST['c_id']).'"';
$result=mysqli_query($conn,$sql);
if($result){
    echo "Deleted Successfully";
}
else{
    echo "something went wrong";
}

?>