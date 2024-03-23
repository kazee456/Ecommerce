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
  <title>Ecommerce Website-Cart Details</title>
  <!-- bootstrap css link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file-->
  <link rel="stylesheet" href="style.css">
  <style>
    .cart_img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
  </style>

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
          <?php
          if (isset($_SESSION['username'])) {
            echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li>";
          } else {
            echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_registration.php'>Resgister<i
         class='fa fa-registered' aria-hidden='true'></i> </a>
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
        <a class='nav-link'href='./users_area/user_login.php'>Login</a>
      </li>";
      } else {
        echo " <li class='nav-item'>
        <a class='nav-link'href='./users_area/logout.php'>Logout</a>
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

  <!-- fourth-chid-tale -->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered">

          <!-- code to display dynamic data -->
          <?php
          global $con;
          $ip = getIPAddress();

          $cart_query = "select * from `cart_details` where ip_address='$ip'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo "       <thead>
          <tr>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th colspan='2'>Operations</th>
          </tr>
      </thead>
      <tbody>";
            $total_price = 0;
            while ($row = mysqli_fetch_array($result)) {
              $products_id = $row['products_id'];
              $select_products = "select * from `products` where products_id='$products_id'";
              $result_products = mysqli_query($con, $select_products);
              while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = array($row_product_price['product_price']);
                $price_table = $row_product_price['product_price'];
                $product_title = $row_product_price['product_title'];
                $product_image1 = $row_product_price['product_image1'];
                $product_values = array_sum($product_price);

                // Get the quantity for this product
                $quantity = isset($_POST['qty'][$products_id]) ? intval($_POST['qty'][$products_id]) : 1;

                // Calculate the subtotal for this product and add it to the total price
                $subtotal = $quantity * $product_values;
                $total_price += $subtotal;

          ?>
                <tr>
                  <td><?php echo $product_title ?></td>
                  <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                  <td><input type="text" name="qty[<?php echo $products_id; ?>]" class="form-input w-50"></td>
                  <td><?php echo $price_table ?>/-</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $products_id ?>"></td>
                  <td class="d-flex">
                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                    <input type="submit" value="Remove Item(s)" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                  </td>
                </tr>
          <?php
              }
            }
          } else {
            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
          }

          ?>
          </tbody>
        </table>
        <!-- update the quantity field -->
        <?php
        function update_cart_items()
        {
          global $con;

          if (isset($_POST['update_cart'])) {
            $ip = getIPAddress();
            $quantities = $_POST['qty'];

            foreach ($quantities as $products_id => $quantity) {
              // Validate quantity
              if ($quantity < 1 || $quantity > 50) {
                $message = "We can only provide quantities of goods between 1 and 50.";
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
          }
        }

        // Function to remove cart items
        function remove_cart_items()
        {
          global $con;

          if (isset($_POST['remove_cart'])) {
            $ip = getIPAddress();
            $removeitem = $_POST['removeitem'];
            foreach ($removeitem as $remove_id) {
              $delete_query = "DELETE FROM cart_details WHERE products_id=$remove_id AND ip_address='$ip'";
              $run_delete = mysqli_query($con, $delete_query);
              if (!$run_delete) {
                echo "Error removing item: " . mysqli_error($con);
                return;
              }
            }

            echo "<script>window.open('cart.php','_self')</script>";
          }
        }

        // Call update and remove cart item functions
        update_cart_items();
        remove_cart_items(); ?>


        <!-- </tbody>
        </table> -->
        <!-- subtotal -->
        <div class="d-flex mb-5">
          <?php
          global $con;
          $ip = getIPAddress();
          $cart_query = "select * from `cart_details` where ip_address='$ip'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo " <h4 class='px-4'>Subtotal: <strong>$total_price/-</strong></h4>
          <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 boarder-0 mx-3'
           name='continue_shopping'>
            <button class='bg-secondary  px-3 py-2 boarder-0'><a href='./users_area/checkout.php'class='text-light'>Check Out</a> </button>";
          } else {
            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 boarder-0 mx-3'
          name='continue_shopping'>";
          }
          if (isset($_POST['continue_shopping'])) {
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
        </div>
    </div>
  </div>
  </form>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      form.addEventListener('submit', function(event) {
        const qtyInputs = form.querySelectorAll('input[name^="qty"]');
        qtyInputs.forEach(function(qtyInput) {
          const qty = parseInt(qtyInput.value);
          if (qty < 1 || qty > 50) {
            event.preventDefault();
            alert('We can only provide quantities of goods between 1 and 50.');
            qtyInput.focus();
          }
        });
      });
    });
  </script>

  <!-- last child  -->
  <!-- include footer  -->
  <?php
  include("./includes/footer.php")
  ?>
  </div>
  <!-- bootsrap jss link -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>