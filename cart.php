<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website - Cart Details</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS file -->
  <link rel="stylesheet" href="style.css">
  <style>
    .cart_img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }

    .form-control {
      padding: 0.375rem 0.75rem;
      /* Ensure the input text is visible */
    }

    .form-group {
      margin-bottom: 1rem;
      /* Ensure sufficient spacing */
    }

    .form-control:invalid {
      border-color: #dc3545;
      /* Red border for invalid inputs */
    }

    .form-control:valid {
      border-color: #28a745;
      /* Green border for valid inputs */
    }

    .btn {
      margin: 0.5rem;
      /* Margin for better button spacing */
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid p-0">
    <!-- First child -->
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
          <?php
          if (isset($_SESSION['username'])) {
            echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li>";
          } else {
            echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_registration.php'>Register<i class='fa fa-registered' aria-hidden='true'></i></a>
      </li>";
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact <i class="fa fa-phone" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
  </div>
  </nav>
  <!-- Calling cart function -->
  <?php cart(); ?>

  <!-- Second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>";
      }
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
      }
      ?>
    </ul>
  </nav>

  <!-- Third child -->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
  </div>

  <!-- Fourth child - Cart Table -->
  <div class="container">
    <div class="row">
      <form action="" method="post" id="cart-form">
        <table class="table table-bordered">
          <?php
          global $con;
          $ip = getIPAddress();
          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo "
            <thead>
              <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Price per Unit</th>
                  <th>Total Price</th>
                  <th>Remove</th>
              </tr>
            </thead>
            <tbody>";

            $total_price = 0; // Initialize total price variable

            while ($row = mysqli_fetch_array($result)) {
              $products_id = $row['products_id'];
              $select_products = "SELECT * FROM `products` WHERE products_id='$products_id'";
              $result_products = mysqli_query($con, $select_products);
              while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = $row_product_price['product_price'];
                $price_table = $row_product_price['product_price'];
                $product_title = $row_product_price['product_title'];
                $product_image1 = $row_product_price['product_image1'];

                // Get the quantity for this product
                $quantity = isset($_POST['qty'][$products_id]) ? intval($_POST['qty'][$products_id]) : $row['quantity'];
                // Calculate the subtotal for this product
                $subtotal = $quantity * $product_price;
                $total_price += $subtotal; // Add to total price
          ?>
                <tr>
                  <td><?php echo $product_title ?></td>
                  <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                  <td><input type="text" name="qty[<?php echo $products_id; ?>]" class="form-control w-50" value="<?php echo $quantity; ?>" min="1" max="5"></td>
                  <td>$<?php echo $price_table ?>/-</td>
                  <td>$<?php echo $subtotal ?>/-</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $products_id ?>"></td>
                </tr>
          <?php
              }
            }

            echo "</tbody></table>";

            echo "<h4 class='px-4'>Subtotal: <strong>$total_price/-</strong></h4>";
          } else {
            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
          }
          ?>

          <!-- Actions -->
          <div class="d-flex mb-5">
            <?php if ($result_count > 0) { ?>
              <input type="submit" value="Update Cart" class="btn btn-info" name="update_cart">
              <input type="submit" value="Remove Selected" class="btn btn-danger" name="remove_cart">
              <a href="index.php" class="btn btn-info mx-2">Continue Shopping</a>
              <a href="./users_area/checkout.php" class="btn btn-secondary">Check Out</a>
            <?php } else { ?>
              <a href="index.php" class="btn btn-info">Continue Shopping</a>
            <?php } ?>
          </div>
      </form>
    </div>
  </div>

  <?php
  // Functions to update and remove cart items
  function update_cart_items()
  {
    global $con;

    if (isset($_POST['update_cart'])) {
      $ip = getIPAddress();
      $quantities = $_POST['qty'];

      foreach ($quantities as $products_id => $quantity) {
        if (empty($quantity)) {
          continue;
        }
        // Validate quantity
        if ($quantity < 1 || $quantity > 5) {
          $message = "We can only provide quantities of goods between 1 and 5.";
          echo "<script>alert('$message');</script>";
          return;
        }

        // Update cart
        $update_cart_query = "UPDATE cart_details SET quantity=$quantity WHERE ip_address='$ip' AND products_id=$products_id";
        $result = mysqli_query($con, $update_cart_query);
        if (!$result) {
          echo "Error updating quantity: " . mysqli_error($con);
          return;
        }
      }

      echo "<script>alert('Cart updated successfully.');</script>";
      echo "<script>window.location.href = 'cart.php';</script>";
    }
  }

  function remove_cart_items()
  {
    global $con;

    if (isset($_POST['remove_cart'])) {
      $ip = getIPAddress();
      if (isset($_POST['removeitem'])) {
        $removeitem = $_POST['removeitem'];
        foreach ($removeitem as $remove_id) {
          $delete_query = "DELETE FROM cart_details WHERE products_id=$remove_id AND ip_address='$ip'";
          $run_delete = mysqli_query($con, $delete_query);
          if (!$run_delete) {
            echo "Error removing item: " . mysqli_error($con);
            return;
          }
        }

        echo "<script>alert('Selected items removed successfully.');</script>";
        echo "<script>window.location.href = 'cart.php';</script>";
      } else {
        echo "<script>alert('No items selected for removal.');</script>";
      }
    }
  }

  // Call update and remove cart item functions
  update_cart_items();
  remove_cart_items();
  ?>

  <!-- JavaScript Validation -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('cart-form');
      form.addEventListener('submit', function(event) {
        const qtyInputs = form.querySelectorAll('input[name^="qty"]');
        let valid = true;
        qtyInputs.forEach(function(qtyInput) {
          const qty = parseInt(qtyInput.value);
          if (qty < 1 || qty > 5) {
            valid = false;
          }
        });

        if (!valid) {
          event.preventDefault();
          alert('We can only provide quantities of goods between 1 and 5.');
        }
      });
    });
  </script>

  <!-- Footer -->
  <?php include("./includes/footer.php") ?>
  </div>
  <!-- Bootstrap JS links -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>