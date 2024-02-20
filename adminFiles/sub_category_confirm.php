<?php
include 'connect.php';
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $parent_name = $_POST['parent_id'];
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $sql = "INSERT INTO category (name,image,parent_id) VALUES ('".$name."','".$file_name."','".$parent_name."')";
    $query = mysqli_query($conn,$sql);
    if($query){
        $file = move_uploaded_file($tmp_name,'../product_image/'.basename($_FILES['file']['name']));
        $_SESSION['success']="category added";
        header('location:../production/sub_category.php');   
    }
    else{
        $_SESSION['error'] = "Failed tp ADD category";
        header('location:../production/sub_category.php');
    }
}
else{
    echo 'plese fill name';
}
?>