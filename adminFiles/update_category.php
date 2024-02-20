<?php
include 'connect.php';
session_start();
if($_POST['id'])
{
    $sql= '';
    if(!empty($_FILES['file']['name']))
    {
        
        $file_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $file = move_uploaded_file($tmp_name,'../product_image/'.basename($_FILES['file']['name']));
        $sql = 'UPDATE category set name="'.$_POST['name'].'",image = "'.$file_name.'" where id = "'.base64_decode($_POST['id']).'"';
       
    }else{
        $sql = 'UPDATE category set name="'.$_POST['name'].'" where id = "'.base64_decode($_POST['id']).'"';
    }
    $query = mysqli_query($conn,$sql);
    if($query){
        $_SESSION['success'] = 'category updated successfully';
        header('location:../production/manage_category.php');
    }
    else{
        $_SESSION['error'] = 'failed to update';
        header('location:../production/manage_category.php');
    }
}




?>