 <?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
   
$name =$_POST['name'];

$slug= $_POST['slug'];

$small_description = $_POST['small_description'];

$description =$_POST['description'];

$original_price = $_POST["original_price"];

$selling_price = $_POST['selling_price'];

$qty = $_POST['qty'];

$meta_title = $_POST['meta_title']; 

$meta_description= $_POST['meta_description'];

$meta_keywords= $_POST['meta_keywords'];

$status = isset($_POST['status']) ? '1': '0'; 

$trending = isset($_POST['trending']) ? '1': '0';

$image = $_FILES['image']['name'];
$path = "../product_image";
// $image_ext = pathinfo($image, PATHINFO_EXTENSION);
// $filename = time()...$image_ext;
$product_query= "INSERT INTO products (category_id,name, slug, small_description, description, original price, selling price, qty,meta_title,meta_description,meta_keywords, status, trending, image) VALUES ('$category_id', '$name', '$slug', '$small_description', '$description', '$original_price', '$selling_price', '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename')";


$product_query_run = mysqli_query($conn, $product_query);
if($product_query_run){
    // move_uploaded_file($_FILES['image']['tmp_name'],$path.'../product_image'.basename($_FILES['file']['name']));
    // redirect("form.php","product added successfully");
}
}
else{
    echo 'plese fill name';
} 
?> 