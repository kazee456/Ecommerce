<?php
if (isset($_GET['receipt'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from `user_orders` where user_id='$user_session_userid'";
    echo '$userid';
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
</head>

<body>
    <h3 class="text-success mb-4">Receipt</h3>
</body>

</html>