<?php
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Cart Details</title>
   <!-- bootstrap css link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
   integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- css file-->
   <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <img src="./images/online shopping.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
      </button>
 
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
         <a class="nav-link" href="index.php">Home<i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products<i class="fa fa-product-hunt" aria-hidden="true"></i></a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Register<i class="fa fa-registered" aria-hidden="true"></i> </a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Contact <i class="fa fa-phone" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart<i class="fa fa-shopping-cart"
          aria-hidden="true"></i><sup><?php cart_item(); ?></sup> </a>
         </li> 
          </ul>
      </div>
  </div>
</nav>
<!-- calling cart function -->
<?php
cart(); 

?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

       <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Hidded Store</h3>
    <p class="text-center">Communication is at the heart of e-comerce and community</p>
</div>

<!-- fourth-chid-tale -->
<div class="container">
    <div class="row">
        <table class="table table-boardered">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Apple</td>
                    <td><img src="./images/pexels-vincent-rivaud-2543270.jpg" alt=""></td>
                    <td><input type="text"></td>
                    <td>900</td>
                    <td><input type="checkbox"></td>
                    <td>
                        <p>Update</p>
                        <p>Remove</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- last child  -->
<!-- include footer  -->
<?php
include("./includes/footer.php")
?>
    </div>
<!-- bootsrap jss link -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>