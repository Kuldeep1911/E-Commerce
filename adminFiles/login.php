<?php
    session_start();
    include("connect.php");

    if(isset($_POST['submit'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = 'SELECT * FROM user where user_name="'.$username.'"';
            // print_r($sql);
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0){
                $_SESSION['error']='Email Not Found';
                header('location:../production/');
            }
            else{
                $data=mysqli_fetch_assoc($result);  
                if($password==$data['password']){
                    if($data['isAdmin']==1){
                        $_SESSION['user']=$data;
                        header('location:../production/home');
                    }else{
                        $_SESSION['user']=$data;
                        header('location:../production/adv_shopping_cart/');
                    }
                    
                }
                else{
                    $_SESSION['error']='Invalid Password';
                    header('location:../production/');
                }
            }
         }
    }
?>