<?php
include 'connect.php';
session_start();
if($_POST['cat_id'])
{
    $sql= '';
    if(!empty($_FILES['file']['name']))
    {
        $file_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $parent_name = $_POST['parent_id'];
        $file = move_uploaded_file($tmp_name,'../images/'.basename($_FILES['file']['name']));
        $sql = 'UPDATE category set name="'.$_POST['name'].'",image = "'.$file_name.'" , "'.$parent_name.'" where id = "'.base64_decode($_POST['cat_id']).'"';
       
    }else{
        $sql = 'UPDATE category set name="'.$_POST['name'].'" where id = "'.base64_decode($_POST['cat_id']).'"';
    }
    $query = mysqli_query($conn,$sql);
    if($query){
        $_SESSION['success'] = 'category updated successfully';
        header('location:../production/sub_category.php');
    }
    else{
        $_SESSION['error'] = 'failed to update';
        header('location:../production/sub_category.php');
    }
}




?>