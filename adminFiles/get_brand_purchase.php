<?php
include 'connect.php';

$sqlBrand='SELECT * FROM brand';
$resultBrand=mysqli_query($conn,$sqlBrand);
if($resultBrand){
    $optionBrand="<option value=''>Select Brand</option>";
    while($rowBrand=mysqli_fetch_assoc($resultBrand)){
        $optionBrand.="<option value'".$rowBrand['Brand_id']."'>".$rowBrand['Brand_name']."</option>";
    }
    echo $optionBrand;
}else{
    echo 'No Data Found';
}


?>