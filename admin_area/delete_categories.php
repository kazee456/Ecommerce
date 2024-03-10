<?php
if(isset($_GET['delete_categories'])){
    $delete_id=$_GET['delete_categories'];
    // echo $delete_id;
    //delete query 

    $delete_category="Delete from `categories` where category_id=$delete_id";
    $result_category=mysqli_query($con,$delete_category);
    if($result_category){
           echo"<script>alert('category Deleted successfully')</script>";
            echo"<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>