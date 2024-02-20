<?php
include("connect.php");
$sql='DELETE FROM BRAND WHERE Brand_id="'.base64_decode($_POST['brand_id']).'"';
$result=mysqli_query($conn,$sql);
if($result){
    echo "Brand Deleted Successfully";
}
else{
    echo "Something went wrong";
}

?>