<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    // echo $delete_id;
    //delete query 

    $delete_product="Delete from `products` where products_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product);
    if($result_product){
           echo"<script>alert('products Deleted successfully')</script>";
            echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>