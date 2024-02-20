<?php
include("connect.php");

if(isset($_POST["submit"])){
        $name=$_POST['brand_name'];
        $file_name=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $file=move_uploaded_file($tmp_name,'../production/images/brandImg/'.basename($_FILES['file']['name']));

    if(!empty($file_name)){
         $sql='UPDATE brand set Brand_name="'.$name.'",Brand_img="'.$file_name.'" where Brand_id="'.base64_decode($_POST['brand_id']).'"';
        //  print_r($sql.'name,img');
   }
    else{
        $sql='UPDATE brand set Brand_name="'.$name.'" where Brand_id="'.base64_decode($_POST['brand_id']).'"';
        //  print_r($sql.'name');
    }
    $result=mysqli_query($conn,$sql);
    if($result){
        echo 'updated';
    }
    else{
        echo 'error'.mysqli_error( $conn );
    }
   

}else{
    echo 'something went wrong!';
}
?>