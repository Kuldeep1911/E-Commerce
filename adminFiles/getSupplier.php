<?php
include("connect.php");

if(isset($_REQUEST["id"])){
   
    $id=base64_decode($_REQUEST["id"]);
    $sql= "Select * FROM supplierList where sup_id='".$id."'";
    $query=mysqli_query($conn,$sql);
    // print_r($query);exit;
    if(mysqli_num_rows($query)== 0){
        echo "false";
    }else{
        $row=mysqli_fetch_assoc($query);
        $details="";
        $details.= "
        <div class='form-group'>
        <label>Name</label>
        <input type='hidden' value='".base64_encode($row['sup_id'])."' class='form-control' name='sup_id'/>
        <input type='text' value='".$row['supName']."' class='form-control' name='supName'>
        </div>
        <div class='form-group'>
        <label>Address</label>
        <input type='text' value='".$row['supAddress']."' class='form-control' name='supAddress'>
        </div>
        <div class='form-group'>
        <label>Phone No.</label>
        <input type='text' value='".$row['supNum']."' class='form-control' name='supNum'>
        </div>
        <div class='form-group'>
        <label>Email</label>
        <input type='text' value='".$row['supEmail']."' class='form-control' name='supEmail'>
        </div>
        ";
        echo $details;
    }
}else if($_REQUEST['brandId']){
    $id=base64_decode($_REQUEST["brandId"]);
    $sql= "Select * FROM Brand where Brand_id='".$id."'";
    $query=mysqli_query($conn,$sql);
    // print_r($query);exit;
    if(mysqli_num_rows($query)== 0){
        echo "false";
    }else{
        $row=mysqli_fetch_assoc($query);
        $details="";
        $img=$row['Brand_img'];
    $details.= "
        <div class='form-group'>
        <label>Brand Name</label>
        <input type='hidden' value='".base64_encode($row['Brand_id'])."' class='form-control' name='brand_id'/>
        <input type='text' value='".$row['Brand_name']."' class='form-control' name='brand_name'>
        </div>
        <div class='form-group'>
        <label>Brand Image</label>
        <input type='file' value='' class='form-control' name='file'>
        <img height='100px' class='img-fluid mt-2 d-block' src='../production/images/brandImg/".$img."';

        </div>
        ";
        echo $details;
}
}else{
    return "<h1>Plese give a valid output</h1>";
}

?>