<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .payment_img {
        width: 100%;
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }
</style>

<body>
    <!-- PHP Code to Access User ID -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip= '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div class="container">
        <u>
            <h5 class="text-center text-info my-4">Payment Options</h5>
        </u>
        <div class="row d-flex justify-content-center align-items-center my-5">


            <div class="col text-center">
                <a href="order.php?user_id=<?php echo $user_id ?>" class="btn btn-secondary">
                    Pay Offline
                </a>
            </div>
        </div>
        <div id="result-message"></div>
    </div>

    <!-- Font Awesome for PayPal Icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-d2t4y3D8tWtkZn+Vh9yI/wR2bFhN3eV5zD+erq4vn80w5mEj0p1h+RmCvRxF5xl4iBrgyH4I7eGHux9CzmI69A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap JS and Popper.js for Bootstrap Components -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.15.0/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TI3Oshtj+3cb8G7W5K2MxZ7n3g5K3wwOsqZfKcJ2TVyZhn+4p3c5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-mQ93Y9/z7rdI+7G8Xc/tKtPUE9hBzU7fCw7tA5s5v4D6A2OXs0wN9l5t8BZUzm6p" crossorigin="anonymous"></script>
</body>

</html>