<?php
if(isset($_GET['delete_payments'])){
    $delete_id=$_GET['delete_payments'];
    // echo $delete_id;
    //delete query 

    $delete_payments="Delete from `user_payments` where payment_id=$delete_id";
    $result_payments=mysqli_query($con,$delete_payments);
    if($result_payments){
           echo"<script>alert('payment Deleted successfully')</script>";
            echo"<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>