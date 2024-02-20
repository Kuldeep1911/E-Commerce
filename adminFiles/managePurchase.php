<?php
include 'connect.php';
$id=$_POST['pur_id'];
if(isset($_POST['submit']))
{
// print_r(count($_POST['slno']));exit;

//SQL QUERY TO INSERT DATA INTO PURCHASE TABLE
$sqlPurchaseTable='INSERT INTO purchasetable  (purchase_id, supplier_id, warehouse_id, purchase_date, total_amount, amount_paid, amount_due, status) VALUES ("'.$id.'", '.$_POST['sup_id'].', '.$_POST['warehouse_id'].', '.$_POST['date'].', '.$_POST['sub_total'].', '.$_POST['paid_amt'].', '.$_POST['due_amt'].', '.$_POST['pur_status'].')';
$resultPurchaseTable=(mysqli_query($conn,$sqlPurchaseTable));


//SQL QUERY TO INSERT DATA INTO PURCHASE ITEM TABLE
for($i=1;$i<=count($_POST['slno']);$i++){
    $pro_id=$_POST["product_$i"];
    $product='SELECT * FROM products where product_id="'.$pro_id.'"';
    $execute_pro=mysqli_query($conn,$product);
    $stock=mysqli_fetch_assoc($execute_pro);
    $previous_quantity=$stock['stock'];
   

    $sqlItems='INSERT INTO purchase_items (category_id, sup_cate_id, brand_id, product, quantity, cost, pro_total, purchase_id) VALUES ('.$_POST["category_$i"].','.$_POST["subCategory_$i"].','.$_POST["brand_$i"].','.$_POST["product_$i"].','.$_POST["quantity_$i"].','.$_POST["cost_$i"].','.$_POST["total_product_cost_$i"].',"'.$id.'");';
   
    $resultPurchaseItemsTable=(mysqli_query($conn,$sqlItems));

    $new_stock=$previous_quantity+$_POST["quantity_$i"];

    $update_quantity='UPDATE products SET stock = "'.$new_stock.'" WHERE product_id="'.$pro_id.'"';
    $update_quantity_result=mysqli_query($conn,$update_quantity);

}

if($resultPurchaseTable){
    print_r('purchase inserted');
}
if($resultPurchaseItemsTable){
    print_r('Purchase Items inserted');
}
else{
   echo 'error'.mysqli_error($conn);
}
  
}
else{
    echo 'plese fill name';
}
?>