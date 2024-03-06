<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
   <!-- bootstrap css link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }


    </style>
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
   integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action=""method="post">
                <!-- name field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" 
                    placeholder="Enter your username" autocomplete="off" required="required"
                    name="user_username">
                </div>
                 <!-- password field -->
                   <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" 
                    placeholder="Enter your Password" autocomplete="off" required="required"
                    name="user_password">
                </div>
            
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-1 px-2" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="user_registration.php"> Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Assuming $con is the database connection object
    $select_query = "SELECT * FROM `user_table` WHERE username=?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
     $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'" ;
     $select_cart=mysqli_query($con,$select_query_cart);
     $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username']=$user_username;
        // Verify password using password_verify()
        if (password_verify($user_password, $row_data['user_password'])) {
             // echo "<script>alert('Login Successful')</script>";
            if ($row_count==1 and $row_count_cart==0){
                 $_SESSION['username']=$user_username;
                 echo "<script>alert('Login Successful')</script>";
                 echo"<script>window.open('profile.php','_self')</script>";
            }else{
                 $_SESSION['username']=$user_username;
                 echo "<script>alert('Login Successful')</script>";
                 echo"<script>window.open('payment.php','_self')</script>";
            }
           
        } else {
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username')</script>";
    }
}
?>