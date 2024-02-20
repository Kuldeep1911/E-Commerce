<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $sql = "INSERT INTO category (name,image,parent_id) VALUES ('".$name."','".$file_name."',0)";
    $query = mysqli_query($conn,$sql);
    if($query){
         
        $file = move_uploaded_file($tmp_name,'../product_image/'.basename($_FILES['file']['name']));
        $_SESSION['success']="category added";
        header('location:../production/add_category.php');   
    }
    else{
        $_SESSION['error'] = "Failed tp ADD category";
        header('location:../production/add_category.php');
    }
}
else{
    echo 'plese fill name';
}
?>