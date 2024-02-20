<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{

    $name = $_POST['name'];
    $category = $_POST['category_id'];
    $sub_category = $_POST['sub_cate_id'];
    $brand = $_POST['brand'];
    $MRP = $_POST['MRP'];
    $discount_price = $_POST['discount_price'];
    $product_discount = $_POST['product_discount'];
    $selling_price = $_POST['selling_price'];
    $manu_date = $_POST['manufacture_date'];
    $stock = $_POST['stock'];
    $SAQ = $_POST['stock_alert_quantity'];
    $expire_date = $_POST['expire_date'];
    $warehouse = $_POST['warehouse_id'];
    $file = $_FILES['image']['name']; 
    $tmp_name=$_FILES['image']['tmp_name'];
    $product_code = $_POST['product_code'];
    // Build the SQL query
    $query = "INSERT INTO products (name, category_id, sub_cate_id, brand, MRP, discount_price, product_discount, selling_price, manufacture_date, stock, stock_alert_quantity, expire_date, warehouse_id, image, product_code) VALUES ('$name', '$category', '$sub_category', '$brand', '$MRP', '$discount_price', '$product_discount', '$selling_price', '$manu_date', '$stock', '$SAQ', '$expire_date', '$warehouse', '$file', '$product_code')";
    // print_r($sql);

        // Execute the query
        if (mysqli_query($conn, $query)) {
            $file = move_uploaded_file($tmp_name,'./product_image/'.basename($_FILES['file']['name']));
            $_SESSION['success']="category added";
            header('location:../production/addProduct.php'); 
            
        } 
        else {
            $_SESSION['error'] = "Failed tp ADD category";
            header('location:../production/addProduct.php');
        }
}

?>