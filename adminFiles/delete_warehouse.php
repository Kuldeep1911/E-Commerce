<?php
include("connect.php");

$sql='DELETE FROM warehouse where warehouse_id="'.base64_decode($_POST['w_id']).'"';
$result=mysqli_query($conn,$sql);
if($result){
    echo 'DELETED';
}else{

    echo 'ERROR';
}


?>