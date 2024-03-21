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
    <title>Ecommerce Website</title>
    <!-- bootstrap css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file-->
    <link rel="stylesheet" href="style.css">

    <style>
        .jumbotron {
            background-color: #f8f9fa;
            padding: 2rem;
        }

        body {
            overflow-x: hidden;
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
                        <a class="nav-link" href="cart.php">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form action="search_product.php" method="get" class="form-inline my-2 my-lg-0">
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
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4 text-center">Get in Touch</h1>
            <p class="lead text-center">We'd love to hear from you! Whether you have a question, comment, or suggestion, please feel free to get in touch with us using any of the methods below.</p>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="post" id="contactForm">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="sendMessageBtn">Send Message</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Contact Information</h2>
                <ul class="list-group">
                    <li class="list-group-item">Email: <a href="mailto:collinskazee456@gmail.com">collinskazee456@gmail.com</a></li>
                    <li class="list-group-item">Phone: <a href="tel:+254799410480">+254 799 410 480</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Social Media</h2>
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/yourdomain" class="btn btn-outline-primary">Facebook</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.twitter.com/yourdomain" class="btn btn-outline-primary">Twitter</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/yourdomain" class="btn btn-outline-primary">Instagram</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/company/yourdomain" class="btn btn-outline-primary">LinkedIn</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Feedback</h2>
                <p class="text-center">We value your feedback. Please use the form above to share your thoughts with us.</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Navigation</h2>
                <p class="text-center">Use the navigation menu at the top of the page to explore our website.</p>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        // Simulate sending email (since we can't actually send emails in this environment)
        // You may replace this with actual AJAX request to send email
        setTimeout(function() {
            alert("Email sent successfully!. Thank you for reaching out");
            // Optionally, reset form fields
            document.getElementById("contactForm").reset();
        }, 1000); // Simulate sending email for 1 second
    });
</script>
<?php
include("./includes/footer.php")
?>

</html>