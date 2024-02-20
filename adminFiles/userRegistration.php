<?php
session_start();
include("connect.php");
// print_r($_POST);
if(isset($_POST["submit"])){
   if(($_POST["username"]=='' || $_POST["email"]==''|| $_POST["password"]=='')){
    $_SESSION['error'] = "Fill all details..!";
    header('location:../production/#signup');
}else{
    
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql='INSERT INTO user (user_name,email,password) VALUES ("'.$name.'","'.$email.'","'.$password.'")';
    $query=(mysqli_query($conn,$sql)) or die(mysqli_error($conn));
    if($query){
        $_SESSION['msg'] = "Account Created Successfully..!";
        header('location:../production/');
    }
    else{
        $_SESSION['error'] = "Something went wrong..!";
        header('location:../production/#signup');
    }
}

}
?>
