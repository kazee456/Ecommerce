<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome <?php echo $_SESSION['username'] ?></title>
  <!-- bootstrap css link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file-->
  <link rel="stylesheet" href="../style.css">

  <style>
    body {
      overflow-x: hidden;
    }

    .profile_img {
      width: 90%;
      margin: auto;
      display: block;
      /* height:100%; */
      object-fit: contain;
    }

    .edit_img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <img src="../images/online shopping.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home<i class="fa fa-home" aria-hidden="true"></i> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Products<i class="fa fa-product-hunt" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">My account<aria-hidden="true"></i> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact <i class="fa fa-phone" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cart.php">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
          </li>
        </ul>
        <form action="../search_product.php" method="get" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

          <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
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


      <?php
      if (!isset($_SESSION['username'])) {
        echo "  <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      } else {
        echo " <li class='nav-item'>
        <a class='nav-link'href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>";
      }
      if (!isset($_SESSION['username'])) {
        echo " <li class='nav-item'>
        <a class='nav-link'href='user_login.php'>Login</a>
      </li>";
      } else {
        echo " <li class='nav-item'>
        <a class='nav-link'href='logout.php'>Logout</a>
      </li>";
      }

      ?>
    </ul>
  </nav>

  <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">Hidded Store</h3>
    <p class="text-center">Communication is at the heart of e-comerce and community</p>
  </div>

  <!-- fourth child -->
  <div class="row">
    <div class="col-md-2">
      <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#">
            <h4>Your Profile</h4>
          </a>
        </li>
        <?php
        $username = $_SESSION['username'];
        $user_image = "select * from `user_table` where username='$username'";
        $result_image = mysqli_query($con, $user_image);
        $row_image = mysqli_fetch_array($result_image);
        $user_image = $row_image['user_image'];
        echo " <li class='nav-item'>
        <img src='./user_images/$user_image' alt=''class='profile_img my-4'>
      </li>";
        ?>

        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Pending Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php
      get_user_order_details();
      if (isset($_GET['edit_account'])) {
        include('edit_account.php');
      }
      if (isset($_GET['my_orders'])) {
        include('user_orders.php');
      }
      if (isset($_GET['delete_account'])) {
        include('delete_account.php');
      }

      ?>
    </div>
  </div>

  <!-- last child  -->
  <!-- include footer  -->
  <?php
  include("../includes/footer.php")
  ?>
  </div>
  <!-- bootsrap jss link -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>