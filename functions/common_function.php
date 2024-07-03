<?php

//include connect files
include('./includes/connect.php');

//getting products
function getproducts()
{
  global $con;
  //condition to check isset or not 
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "select * from `products`order by rand() limit 0,3";
      $result_query = mysqli_query($con, $select_query);
      // $row=mysqli_fetch_assoc($result_query);
      // echo $row ['product_title'];
      while ($row = mysqli_fetch_assoc($result_query)) {
        $products_id = $row['products_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5> 
               <p class='card-text'>$product_description</p>
               <p class='card-text'>price: $$product_price /-</p>
                  <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?products_id=$products_id' class='btn btn-secondary'>View More</a>
               </div>
              </div> 
            </div> ";
      }
    }
  }
}
//getting all products
function get_all_products()
{
  global $con;
  //condition to check isset or not 
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "select * from `products`order by rand()";
      $result_query = mysqli_query($con, $select_query);
      // $row=mysqli_fetch_assoc($result_query);
      // echo $row ['product_title'];
      while ($row = mysqli_fetch_assoc($result_query)) {
        $products_id = $row['products_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        // $product_keywords=$row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5> 
               <p class='card-text'>$product_description</p>
                <p class='card-text'>price: $$product_price /-</p>
                 <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?products_id=$products_id' class='btn btn-secondary'>View More</a>
               </div>
              </div>
            </div> ";
      }
    }
  }
}
//getting unique categories
function get_unique_categories()
{
  global $con;
  //condition to check isset or not 
  if (isset($_GET['category'])) {
    $category_title = $_GET['category'];
    $select_query = "select * from `products` where category_title='$category_title'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center'>  No stock for this category</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row ['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $products_id = $row['products_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords=$row['product_keywords'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_title = $row['category_title'];
      $brand_title = $row['brand_title'];
      echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5> 
               <p class='card-text'>$product_description</p>
                <p class='card-text'>price: $$product_price /-</p>
                <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?products_id=$products_id' class='btn btn-secondary'>View More</a>
               </div>
              </div>
            </div> ";
    }
  }
}
//getting unique brands
function get_unique_brands()
{
  global $con;
  //condition to check isset or not 
  if (isset($_GET['brand'])) {
    $brand_title = $_GET['brand'];
    $select_query = "select * from `products` where brand_title='$brand_title'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center'>  No stock for this brand</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row ['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $products_id = $row['products_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords=$row['product_keywords'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_title = $row['category_title'];
      $brand_title = $row['brand_title'];
      echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5> 
               <p class='card-text'>$product_description</p>
                <p class='card-text'>price: $$product_price /-</p>
                  <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?products_id=$products_id' class='btn btn-secondary'>View More</a>
               </div>
              </div>
            </div> ";
    }
  }
}


//display brands in sidenavbar 
function getbrands()
{
  global $con;
  $select_brands = "select * from `brands`";
  $result_brands = mysqli_query($con, $select_brands);
  // $row_data=mysqli_fetch_assoc($result_brands);
  // echo $row_data['brand_title']
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "<li class='nav-item'>
              <a href='index.php?brand=$brand_title'class='nav-link text-light'>$brand_title</a>
            </li>";
  }
}

//displaying categories in sidenav

function getcategories()
{
  global $con;
  $select_catgories = "select *from `categories`";
  $result_categories = mysqli_query($con, $select_catgories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
              <a href='index.php?category=$category_title' class='nav-link text-light'>$category_title</a>
            </li>";
  }
}

//searching products function
function search_products()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center'>  No Products found</h2>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
      $products_id = $row['products_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      // $product_keywords=$row['product_keywords'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_title = $row['category_title'];
      $brand_title = $row['brand_title'];
      echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5> 
               <p class='card-text'>$product_description</p>
                <p class='card-text'>price: $$product_price /-</p>
                 <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?products_id=$products_id' class='btn btn-secondary'>View More</a>
               </div>
              </div>
            </div> ";
    }
  }
}

//view details function
function view_details()
{
  global $con;
  //condition to check isset or not 
  if (isset($_GET['products_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $products_id = $_GET['products_id'];
        $select_query = "select * from `products` where products_id='$products_id'";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $products_id = $row['products_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_price = $row['product_price'];
          $category_title = $row['category_title'];
          $brand_title = $row['brand_title'];
          echo "
            <div class='col-md-4 mb-2'>
              <div class='card' >
                <img  class='card-img-top'src='./admin_area/product_images/$product_image1'
                 alt='$product_title'>
               <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5> 
                  <p class='card-text'>$product_description</p>
                   <p class='card-text'>price: $$product_price /-</p>
                 <a href='index.php?add_to_cart=$products_id'class='btn btn-info'>Add to cart</a>
                 <a href='index.php'class='btn btn-secondary'>Go Home</a>
               </div>
              </div> 
            </div>
            
            <div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related products</h4>
                        </div>
                        <div class='col-md-6'>
                         <img  class='card-img-top'src='./admin_area/product_images/$product_image2'
                          alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                           <img  class='card-img-top'src='./admin_area/product_images/$product_image3'
                           alt='$product_title'>
                        </div>
                </div>
                </div>";
        }
      }
    }
  }
}
//get ip address function
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

//cart functions
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $get_products_id = $_GET['add_to_cart'];

    // Fetch product details including price from the products table
    $product_query = "SELECT * FROM `products` WHERE products_id = $get_products_id";
    $product_result = mysqli_query($con, $product_query);

    if ($product_result && mysqli_num_rows($product_result) > 0) {
      $product_row = mysqli_fetch_assoc($product_result);
      $product_price = $product_row['product_price'];

      // Check if the item is already in the cart
      $check_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND products_id = $get_products_id";
      $check_result = mysqli_query($con, $check_query);

      if ($check_result && mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Item is already present in the cart')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
      } else {
        // Insert item into the cart with the product price
        $insert_query = "INSERT INTO `cart_details` (products_id, ip_address, quantity, product_price) 
                                 VALUES ($get_products_id, '$ip', 1, $product_price)";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
          echo "<script>alert('Item is added to cart')</script>";
          echo "<script>window.open('index.php', '_self')</script>";
        } else {
          echo "Error inserting item into cart: " . mysqli_error($con);
        }
      }
    } else {
      echo "Product not found!";
    }
  }
}


//function to get cart item numbers
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $con;
    $ip = getIPAddress();
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo  $count_cart_items;
}

//total price functions
function total_cart_price()
{
  global $con;
  $ip = getIPAddress();
  $total_price = 0;
  $cart_query = "select * from `cart_details` where ip_address='$ip'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $products_id = $row['products_id'];
    $select_products = "select * from `products` where products_id='$products_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
}

//get user order details
function get_user_order_details()
{
  global $con;
  $username = $_SESSION['username'];
  $get_details = "select * from `user_table` where username='$username'";
  $result_query = mysqli_query($con, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "select * from `user_orders` where user_id=$user_id AND
              order_status='pending'";
          $result_orders_query = mysqli_query($con, $get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if ($row_count > 0) {
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count
                </span>pending orders</h3>
                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>
                Order details</a></p>";
          } else {
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have Zero pending orders</h3>
                <p class='text-center'><a href='../index.php' class='text-dark'>
                Explore products</a></p>";
          }
        }
      }
    }
  }
}
function calculateSubtotal($con, $ip)
{
  // Initialize total price
  $total_price = 0;

  // Retrieve cart items and their corresponding product prices
  $cart_query = "SELECT cd.quantity, p.product_price 
                   FROM cart_details cd
                   INNER JOIN products p ON cd.products_id = p.products_id
                   WHERE cd.ip_address = '$ip'";
  $result = mysqli_query($con, $cart_query);

  if ($result) {
    // Calculate subtotal for each item and add to total price
    while ($row = mysqli_fetch_assoc($result)) {
      $quantity = $row['quantity'];
      $product_price = $row['product_price'];
      $subtotal = $quantity * $product_price;
      $total_price += $subtotal;
    }
  }

  return $total_price;
}
