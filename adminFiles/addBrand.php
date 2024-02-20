<?php
session_start();
include('connect.php');


    if(isset($_POST['submit'])&&(empty($_FILES['file']['name']))){
        print_r('Please Fill All details');
    }
    else if(empty($_FILES['file']['name'])){
        print_r('Please upload Brand Image');
    }
     else if(empty(isset($_POST['brand_name']))){
        print_r('Please Fill Brand Name');
     }
     else{
        $file_name=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        
        $sql='INSERT INTO BRAND (BRAND_NAME,BRAND_IMG) VALUES("'.$_POST['brand_name'].'","'.$file_name.'")';
        $result=mysqli_query($conn,$sql);
        if($result){
            $file=move_uploaded_file($tmp_name,'../production/images/brandImg/'.basename($_FILES['file']['name']));
            
        }
        else{
            echo "error".mysqli_error($conn);
        }

     }

?>