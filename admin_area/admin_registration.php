<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!-- bootsrap css link  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
   integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
   crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
    body{
        overflow: hidden;
    }
   </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content">
            <div class="col-lg-6 col-xl-6">
                <img src="../images/pexels-jane-doan-1128678.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name" placeholder="Enter your Username"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Enter your password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_admin_password" class="form-label">Confirm your password</label>
                    <input type="password" id="conf_admin_password" name="conf_admin_password"
                     placeholder="Confirm your password"required="required" class="form-control">
                </div>
                <div>
                      <input type="submit" class="bg-info py-2 px-3 border-0" value="Register" 
                      name="admin_registration"><p class="small mt-2 pt-1"><strong>
                      Do you already have an account?</strong> <a href="admin_login.php" 
                      class="text-danger">Login</a></p>
                </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code  -->
<?php
if(isset($_POST['admin_registration'])){
 $admin_name=$_POST['admin_name'];  
 $admin_email=$_POST['admin_email'];  
 $admin_password=trim($_POST['admin_password']);
 $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
 $conf_admin_password=$_POST['conf_admin_password'];

// Check if the username exists
$select_username_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
$result_username = mysqli_query($con, $select_username_query);
$rows_count_username = mysqli_num_rows($result_username);

// Check if the email exists
$select_email_query = "SELECT * FROM `admin_table` WHERE admin_email='$admin_email'";
$result_email = mysqli_query($con, $select_email_query);
$rows_count_email = mysqli_num_rows($result_email);

if ($rows_count_username > 0) {
    // Username already exists
    echo "<script>alert('Username already exists.');</script>";
} elseif ($rows_count_email > 0) {
    // Email already exists
    echo "<script>alert('Email already exists.');</script>";  
}  
elseif($admin_password!=$conf_admin_password){
    //check if passwords match 
 echo "<script>alert('Passwords do not match');</script>";
    }
else {
    // Insert query
    $insert_query = "INSERT INTO `admin_table` (admin_name,admin_email,admin_password) 
    VALUES ('$admin_name','$admin_email','$hash_password')";
    $sql_execute = mysqli_query($con,$insert_query);
    if ($sql_execute) {
        echo "<script>alert('Data inserted successfully.')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    } else {
        die(mysqli_error($con));
    }
}
}
?>