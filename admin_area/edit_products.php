<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where products_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_title=$row['category_title'];
    $brand_title=$row['brand_title'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];


    //fetching category title
   $select_category = "Select * from `categories` where category_title='$category_title'";
   $result_category = mysqli_query($con, $select_category);
   $row_cat = mysqli_fetch_assoc($result_category);
   $cat_title = $row_cat['category_title']; //fetched from categories table
//    echo $cat_title;

    //fetching category title
   $select_brand = "Select * from `brands` where brand_title='$brand_title'";
   $result_brand = mysqli_query($con,$select_brand);
   $row_brand = mysqli_fetch_assoc($result_brand);
   $bran_title = $row_brand['brand_title']; //fetched from brands table
//    echo $bran_title;
}

?>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action=""method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title?>"
            class="form-control mb-4"required="required">
        </div>
         <div class="form-outline w-50 m-auto">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc"value="<?php echo $product_description?>"
             class="form-control mb-4" required="required">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $product_keywords?>"
            class="form-control mb-4"required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select w-100 mb-4 py-2">
                <option value="<?php echo $cat_title ?>"><?php echo $cat_title ?></option>
                <?php
                 $select_category_all= "Select * from `categories`";
                 $result_category_all= mysqli_query($con, $select_category_all);
                 while ($row_cat_all= mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_cat_all['category_title'];
                    $category_id=$row_cat_all['category_id'];
                    echo"<option value='$category_id'>$category_title</option>";

                 }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select w-100 mb-4 py-2">
                <option value="<?php echo $bran_title ?>"><?php echo $bran_title ?></option>
                <?php
                 $select_brand_all= "Select * from `brands`";
                 $result_brand_all= mysqli_query($con, $select_brand_all);
                 while ($row_cat_all= mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_cat_all['brand_title'];
                    $brand_id=$row_cat_all['brand_id'];
                    echo"<option value='$brand_id'>$brand_title</option>";

                 }
                ?>
            </select>
        </div>
         <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex  mb-4">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-80 m-auto"
             required="required">
             <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex  mb-4">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
             required="required">
             <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
            </div>  
        </div>
          <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex mb-4">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
             required="required">
             <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">
            </div>  
        </div>
          <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price?>"
            class="form-control mb-4" required="required">
        </div>  
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editting products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price']; 

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking for empty field or not
    if($product_title==''or $product_desc==''or $product_keywords=='' or $product_category=='' or 
    $product_brand=='' or $product_image1==''  or $product_image2==''  or $product_image3==''
     or $product_price==''){
        echo"<script>alert('please fill all the fields')</script>";
     }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //query to update products
        $update_product="update `products` set product_title='$product_title',
        product_description='$product_desc',product_keywords='$product_keywords',
        category_title= '$product_category',brand_title='$product_brand',product_image1='$product_image1',
        product_image2='$product_image2', product_image3='$product_image3',product_price='$product_price',
        date=NOW() where products_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo"<script>alert('products updated successfully')</script>";
            echo"<script>window.open('./insert_product.php','_self')</script>";
        }else{
            echo"<script>alert('products Are not updates successfully')</script>";
        }
     }
    }
?>