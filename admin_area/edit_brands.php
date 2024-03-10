<?php
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];
    // echo $edit_brand;
    $get_brands="Select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    // echo $brand_title;
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['brand_title'];
    $update_query= "update `brands` set brand_title='$cat_title' where brand_id=$edit_brand";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
         echo"<script>alert('brand updated successfully')</script>";
         echo"<script>window.open('./index.php?view_brands','_self')</script>";
    }
    
}

?>
<div class="container mt-3">
    <h2 class="text-center">Edit brands</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline w-50 m-auto">
            <label for="brand_title" class="form-label">brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control mb-4 "
            require=required value="<?php echo $brand_title; ?>">
        </div> 
        <input type="submit" value="Update brand" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>