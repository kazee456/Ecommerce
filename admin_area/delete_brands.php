<?php
if(isset($_GET['delete_brands'])){
    $delete_id=$_GET['delete_brands'];
    // echo $delete_id;
    //delete query 

    $delete_brand="Delete from `brands` where brand_id=$delete_id";
    $result_brand=mysqli_query($con,$delete_brand);
    if($result_brand){
           echo"<script>alert('brand Deleted successfully')</script>";
            echo"<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>