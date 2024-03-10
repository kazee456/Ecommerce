<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootsrap css link  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
   integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
    width:100px;
     object-fit: contain;
        }
     .footer{
        position: fixed;
        bottom: 0;  
     }
     body{
        overflow-x: hidden;
     }
     .product_img{
        width: 100px;
        object-fit: contain;
     }

    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src=" ../images/online shopping.png" alt=""class="logo" >
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="nabar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    <!-- second child  -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/pexels-darina-belonogova-8764291.jpg" alt=""class="admin_image"></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-3 "><a href="./insert_product.php" class="nav-link text-light
                 bg-info my-1">Insert Products</a></button><button><a href="index.php?view_products"
                  class="nav-link text-light bg-info my-1">View Products</a>
                 </button><button><a href="index.php?insert_category" 
                 class="nav-link text-light bg-info my-1">Insert Categories</a>
                 </button><button><a href="index.php?view_categories" 
                 class="nav-link text-light bg-info my-1">View Categories </a>
                  </button><button><a href="index.php?insert_brand" 
                 class="nav-link text-light bg-info my-1">Insert Brands</a>
                 </button><button><a href="index.php?view_brands" 
                 class="nav-link text-light bg-info my-1 ">View Brands</a>
                 </button><button><a href="index.php?list_orders" 
                 class="nav-link text-light bg-info my-1">All Orders</a>
                 </button><button><a href="index.php?list_payments" 
                 class="nav-link text-light bg-info my-1">All payments</a>
                  </button><button><a href="" 
                 class="nav-link text-light bg-info my-1">List Users</a>
                 </button><button><a href="" 
                 class="nav-link text-light bg-info my-1">Logout</a></button> 
            </div>
        </div>
    </div>
    <!-- fourth child -->
    <div class="container my-3 ">
        <?php 
         if(isset($_GET['insert_category'])){
            include('insert_categories.php'); 
         }
         if(isset($_GET['insert_brand'])){
            include('insert_brands.php'); 
         }
         if(isset($_GET['view_products'])){
            include('view_products.php'); 
         }
          if(isset($_GET['edit_products'])){
            include('edit_products.php'); 
         }
          if(isset($_GET['delete_products'])){
            include('delete_products.php'); 
         }
         if(isset($_GET['view_categories'])){
            include('view_categories.php'); 
         }
         if(isset($_GET['view_brands'])){
            include('view_brands.php'); 
         }
         if(isset($_GET['edit_categories'])){
            include('edit_categories.php'); 
         }
         if(isset($_GET['edit_brands'])){
            include('edit_brands.php'); 
         }
         if(isset($_GET['delete_categories'])){
            include('delete_categories.php'); 
         }
         if(isset($_GET['delete_brands'])){
            include('delete_brands.php'); 
         } if(isset($_GET['delete_brands'])){
            include('delete_brands.php'); 
         } 
         if(isset($_GET['list_orders'])){
            include('list_orders.php'); 
         }
         if(isset($_GET['delete_orders'])){
            include('delete_orders.php'); 
         }

         if(isset($_GET['list_payments'])){
            include('list_payments.php'); 
         }
         if(isset($_GET['delete_payments'])){
            include('delete_payments.php'); 
         }
         
         ?>
    </div>
    <!-- last child  -->
    <!-- <div class="bg-info text-center footer">
    <p>All rights reserved ©- Designed by Kazee</p>
    </div> -->
    <?php
include("../includes/footer.php")
?>
    </div>
 <!-- bootsrap jss link  -->   
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha384-Wd2a2tL8LC2vL9eLwGrU7mLsKk5g+eY0Ig2oF+8lq6/8g+J6Kp5oOg0SvF+5J1jp" 
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
crossorigin="anonymous"></script>
</body>
</html>