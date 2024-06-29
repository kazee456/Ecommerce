<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

header('Content-Type: application/json');

try {
    if (!isset($_SESSION['order_id'])) {
        throw new Exception('Order ID is missing from the session');
    }

    $order_id = $_SESSION['order_id'];

    // Prevent SQL injection
    $order_id = mysqli_real_escape_string($con, $order_id);

    // Fetch order details
    $get_orders = "SELECT * FROM `user_orders` WHERE order_id = '$order_id'";
    $result = mysqli_query($con, $get_orders);

    if (!$result) {
        throw new Exception('Error fetching order: ' . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        // Update order status to 'completed'
        $query = "UPDATE `user_orders` SET `order_status` = 'completed' WHERE `invoice_number` = '$order_id'";
        $update_result = mysqli_query($con, $query);

        if (!$update_result) {
            throw new Exception('Error updating order status: ' . mysqli_error($con));
        }

        $response = [
            'status' => 'COMPLETED',
            'id' => $order_id,
        ];
    } else {
        throw new Exception('Order not found');
    }

    echo json_encode($response);
} catch (Exception $e) {
    http_response_code(500);
    $response = [
        'status' => 'ERROR',
        'message' => $e->getMessage(),
    ];
    echo json_encode($response);
}
