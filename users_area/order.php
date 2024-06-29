<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    echo $user_id;
}

// Getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$count_products = 0;
$invoice_number = mt_rand();
$status = 'pending';

// Fetch cart details
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);

// Loop through each cart item
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $products_id = $row_price['products_id'];
    $quantity = $row_price['quantity'];

    // Fetch product price
    $select_products = "SELECT * FROM `products` WHERE products_id='$products_id'";
    $run_price = mysqli_query($con, $select_products);
    $row_product_price = mysqli_fetch_array($run_price);

    // Calculate total price for each product based on its quantity
    $product_price = $row_product_price['product_price'];
    $total_price += $product_price * $quantity;
    $count_products += $quantity;
}

// Inserting the order
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
                  VALUES ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// Inserting pending orders
$result_cart_price = mysqli_query($con, $cart_query_price); // Re-run the cart query to fetch details again
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $products_id = $row_price['products_id'];
    $quantity = $row_price['quantity'];

    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) 
                              VALUES ($user_id, $invoice_number, $products_id, $quantity, '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);
}

// Delete items from cart
$empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);
