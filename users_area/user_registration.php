<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
   <!-- bootstrap css link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
   integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action=""method="post" enctype="multipart/form-data">
                <!-- name field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" 
                    placeholder="Enter your username" autocomplete="off" required="required"
                    name="user_username">
                </div>
                <!-- Email field -->
                   <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" 
                    placeholder="Enter your Email" autocomplete="off" required="required"
                    name="user_email">
                </div>
                  <!-- Image field -->
                   <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">Email</label>
                    <input type="file" id="user_image" class="form-control" 
                  required="required" name="user_image">
                </div>
                 <!-- password field -->
                   <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" 
                    placeholder="Enter your Password" autocomplete="off" required="required"
                    name="user_password">
                </div>
                 <!-- Confirm password field -->
                   <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" 
                    placeholder="Confirm your Password" autocomplete="off" required="required"
                    name="conf_user_password">
                </div>
                   <!-- Address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" 
                    placeholder="Enter your address" autocomplete="off" required="required"
                    name="user_address">
                </div>
                    <!-- Contact field -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" 
                    placeholder="Enter your mobile number" autocomplete="off" required="required"
                    name="user_contact">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-1 px-2" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="user_login.php"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<!-- php code  -->
<?php
if(isset($_POST['user_register'])){
 $user_username=$_POST['user_username'];  
 $user_email=$_POST['user_email'];  
 $user_password=trim($_POST['user_password']);
 $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
 $conf_user_password=$_POST['conf_user_password'];
 $user_address=$_POST['user_address']; 
 $user_contact=$_POST['user_contact'];
 $user_image=$_FILES['user_image']['name'];
 $user_image_tmp=$_FILES['user_image']['tmp_name'];
 $user_ip= getIPAddress();


// Check if the username exists
$select_username_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
$result_username = mysqli_query($con, $select_username_query);
$rows_count_username = mysqli_num_rows($result_username);

// Check if the email exists
$select_email_query = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
$result_email = mysqli_query($con, $select_email_query);
$rows_count_email = mysqli_num_rows($result_email);

if ($rows_count_username > 0) {
    // Username already exists
    echo "<script>alert('Username already exists.');</script>";
} elseif ($rows_count_email > 0) {
    // Email already exists
    echo "<script>alert('Email already exists.');</script>";  
}  
elseif($user_password!=$conf_user_password){
    //check if passwords match 
 echo "<script>alert('Passwords do not match');</script>";
    }
else {
    // Insert query
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip,
    user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image',
    '$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
        echo "<script>alert('Data inserted successfully.')</script>";
    } else {
        die(mysqli_error($con));
    }
}
//selecting cart items
$select_cart_items="select * from `cart_details` where ip_address= '$user_ip' ";
$result_cart = mysqli_query($con, $select_cart_items);
$rows_count = mysqli_num_rows($result_cart);
  if($rows_count>0){
    $_SESSION['username']=$user_username;
     echo "<script>alert('You have items in your Cart.')</script>";
     echo "<script>window.open('checkout.php','_self')</script>";
  }else{
    echo "<script>window.open('../index.php','_self')</script>";
  }
}


?>