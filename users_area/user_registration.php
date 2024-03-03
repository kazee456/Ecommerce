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
