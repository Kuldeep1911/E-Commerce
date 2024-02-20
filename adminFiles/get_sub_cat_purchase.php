<?php

include 'connect.php';
$id  = $_POST['id'];
$sql = "SELECT * from category where parent_id =".$id."";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{   
    $count = 0;
    $row = '<option value="">Select Sub Category</option>';
    while($data = mysqli_fetch_assoc($query))
    {
        $row .= "<option value=".$data['id'].">".$data['name']."</option>";
    }
    
    echo $row;
    
}else{
    echo "<option>No data found</option>";
}







?>