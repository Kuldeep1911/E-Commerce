<?php
static $count = 0;
include 'connect.php';
$sql = "SELECT * from category where parent_id = 0";
$query = mysqli_query($conn,$sql);

if($query)
{   
    
    $row = '';
    while($data = mysqli_fetch_assoc($query))
    {
        $row .= "<option value=".$data['id'].">".$data['name']."</option>";
    }
    $count++;
    $header = "<tr>
    <td>$count</td> 
    
    <td><select id='category_row_".$count."' onchange='FetchSubCat(this,".$count.")' class='form-control' ><option>Select Category</option>".$row."</select></td>
    
    <td><select id='sub_cat_".$count."'  class='form-control' onchange='fetchBrand(this,".$count.")' value''><option>Please choose</option></select></td>
    
    <td><select id='brand_".$count."'  class='form-control' onchange='fetchproduct(this,".$count.")'><option>Please choose</option></select></td>
    
    <td><select id='product_".$count."'  class='form-control' ><option>Please choose</option></select></td>
    
    
    
    <td><input type='number' name=' id=' class='form-control' ></td>
    <td><input type='number' name=' id=' class='form-control' ></td>
    <td><input type='number' name=' id=' class='form-control' ></td>
    </tr>";
   
    echo $header;
    
}else{
    echo "<tr><td>No data found</td></tr>";
}
