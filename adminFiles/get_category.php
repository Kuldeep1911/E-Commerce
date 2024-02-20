<?php
include 'connect.php';
if(isset($_REQUEST['id']))
{
    $id = base64_decode($_REQUEST['id']);
    $sql = "SELECT * FROM category where id='".$id."'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)==0)
    {
        echo false;
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $details = '';
        $details = '
        <div class="form-group">
        <label for="">Name</label>
        <input type="hidden" value="'.base64_encode($row['id']).'" class="form-control" name="id"/>
        <input type="text" value="'.$row['name'].'" class="form-control" name="name"/>
        </div>
        <div class="form-group">
        <label for="">image</label>
        <input type="file" value="" class="form-control" name="file"/>
        </div>
        <img height="100px" width="100px"class="img-fuild mt-2 d-block" src = "../product_image/'.$row['image'].'"/>
        <button type="submit" class="btn btn-success mt-2 form-control">Update Data</button>
        ';
        echo $details;
       
    }
   
} 
else if(isset($_REQUEST['for_category'])){
    $option = '';
    $sql = "select * from category where parent_id=0";
    $query = mysqli_query($conn,$sql);
    if($query){
        $option = "<option value = ''>Plese Select </option>";
        while($row = mysqli_fetch_assoc($query)){
            $option .= "<option value='".$row['id']."'>".$row['name']."</option>";
        }
    }
    else{
        $option = "<option> No Category Found</option>";
    }
    echo $option;
}
else if(isset($_REQUEST['sub_id'])){
    $id=base64_decode($_REQUEST['sub_id']);
    $p_id=0;
    $sql='select * FROM Category Where ID="'.$id.'"';
    $Cat_sql='select * FROM Category where parent_id="'.$p_id.'"';
    $catQuery=mysqli_query($conn,$Cat_sql);
    $query=mysqli_query($conn,$sql);
    $option = "<option value=''>Please Select</option>";
        while($row = mysqli_fetch_assoc($catQuery)){
            $option .= "<option value='".$row['id']."'>".$row['name']."</option>";
            $parent_id=$row['id'];
        }

    if(mysqli_num_rows($query)==0){
        echo "false";
    }else{
        $row=mysqli_fetch_assoc($query);
        $img=$row['image'];
        $details="";
        $details="
        <div class='form-group'>
            <label for=''>Choose Category</label>
            <select name='parent_id' id='cate_select_sub_cat' class='form-control'>'".$option."'

            </select>
        </div>
        <div class='form-group'>
            <label>Name</label>
            <input type='hidden' value='".$row['id']."' class='form-control' name='cat_id'/>
            <input type='text' value='".$row['name']."' class='form-control' name='name'>
        </div>
        <div class='form-group'>
            <label>Image</label>
            <input type='file' value='' class='form-control' name='file'>
        </div>
        <img height='100px' width='100px' class='img-fluid mt-2 d-block' src='../product_image/".$img."'/>
        <button type='submit' class='btn btn-success mt-2 form-control'>Update Data</button>
        ";
        echo $details;
    }
}else if($_REQUEST['warehouse_id']){
    $id=base64_decode($_REQUEST["warehouse_id"]);
    $sql= "Select * FROM warehouse where warehouse_id='".$id."'";
    $query=mysqli_query($conn,$sql);
    // print_r($query);exit;
    if(mysqli_num_rows($query)== 0){
        echo "false";
    }else{
        $row=mysqli_fetch_assoc($query);
        $details="";
       
        $details.= "
        <div class='form-group'>
        <label>Name</label>
        <input type='hidden' value='".base64_encode($row['warehouse_id'])."' class='form-control' name='warehouse__id'/>
        <input type='text' value='".$row['warehouse_name']."' class='form-control' name='warehouse_Name'>
        </div>
        <div class='form-group'>
        <label>Address</label>
        <input type='text' value='".$row['warehouse_address']."' class='form-control' name='warehouse_Address'>
        </div>
        <div class='form-group'>
        <label>Phone No.</label>
        <input type='text' value='".$row['warehouse_ph']."' class='form-control' name='warehouse_Num'>
        </div>
        <div class='form-group'>
        <label>Email</label>
        <input type='text' value='".$row['warehouse_email']."' class='form-control' name='warehouse_Email'>
        </div>
        ";
        echo $details;
}
}

else{
    return "<h1>Plese give a valid output</h1>";
}

?>