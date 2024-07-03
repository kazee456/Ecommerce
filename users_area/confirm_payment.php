<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connect.php');
session_start();

// Include TCPDF
require_once('../TCPDF-main/tcpdf.php');

// Initialize variables
$order_id = $invoice_number = $amount_due = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_payment'])) {
    // Validate and sanitize inputs
    $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : '';
    $invoice_number = isset($_POST['invoice_number']) ? mysqli_real_escape_string($con, $_POST['invoice_number']) : '';
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : '';
    $payment_mode = isset($_POST['payment_mode']) ? mysqli_real_escape_string($con, $_POST['payment_mode']) : '';

    // Insert payment details into `user_payments` table
    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param('isss', $order_id, $invoice_number, $amount, $payment_mode);
    $result = $stmt->execute();

    if (!$result) {
        die('Error inserting payment details: ' . $con->error);
    }

    // Update order status to 'Complete'
    $update_orders = "UPDATE `user_orders` SET order_status = 'Complete' WHERE order_id = ?";
    $stmt = $con->prepare($update_orders);
    $stmt->bind_param('i', $order_id);
    $result_orders = $stmt->execute();

    if (!$result_orders) {
        die('Error updating order status: ' . $con->error);
    }

    // Fetch payment details for the receipt
    $receipt_query = "SELECT * FROM `user_payments` WHERE order_id = ? AND invoice_number = ?";
    $stmt = $con->prepare($receipt_query);
    $stmt->bind_param('is', $order_id, $invoice_number);
    $stmt->execute();
    $receipt_result = $stmt->get_result();

    if (!$receipt_result) {
        die('Error fetching payment details: ' . $con->error);
    }

    $receipt_data = $receipt_result->fetch_assoc();

    // Generate PDF Receipt with TCPDF
    try {
        // Ensure no previous output
        ob_clean();

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Payment Receipt', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Mega Shop', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Invoice Number: ' . $receipt_data['invoice_number'], 0, 1);
        $pdf->Cell(0, 10, 'Amount Paid: $' . number_format($receipt_data['amount'], 2), 0, 1);
        $pdf->Cell(0, 10, 'Payment Mode: ' . $receipt_data['payment_mode'], 0, 1);
        $pdf->Cell(0, 10, 'Date: ' . date('Y-m-d H:i:s'), 0, 1);
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->Cell(0, 10, 'Thank you for your payment!', 0, 1, 'C');

        // Output PDF and trigger download
        $pdf_file_name = 'Receipt_' . $invoice_number . '.pdf';
        $pdf->Output($pdf_file_name, 'D');

        // Set a flag for redirection after PDF download
        $_SESSION['paymentCompleted'] = true;

        // Add a redirect URL to the session to use on the next page
        $_SESSION['redirect_url'] = 'profile.php?my_orders';

        // JavaScript to redirect after the PDF download
        echo "<script>
            // Disable the form and the button after submission
            document.querySelector('form').style.display = 'none';
            document.querySelector('#confirm_payment').disabled = true;
            document.querySelector('#confirm_payment').value = 'Payment Confirmed';
            // Redirect after a short delay to ensure PDF download starts
            setTimeout(function() {
                window.location.href = '" . $_SESSION['redirect_url'] . "';
            }, 500); // Adjust time as needed
        </script>";
        exit();
    } catch (Exception $e) {
        die('Error generating PDF: ' . $e->getMessage());
    }
}

// Fetch order details if provided via GET parameter
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
    // Fetch the order details
    $select_data = "SELECT * FROM `user_orders` WHERE order_id = ?";
    $stmt = $con->prepare($select_data);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die('Error fetching order details: ' . $con->error);
    }

    $row_fetch = $result->fetch_assoc();
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_id); ?>">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo htmlspecialchars($invoice_number); ?>" readonly>
            </div>
            <div class="form-outline py-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo htmlspecialchars($amount_due); ?>" readonly>
            </div>
            <div class="form-outline py-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto py-2" required>
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Family Bank">Family Bank</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay offline">Pay offline</option>
                </select>
            </div>
            <div class="form-outline py-3 text-center w-50 m-auto">
                <input type="submit" id="confirm_payment" class="bg-info py-2 px-2 border-0 text-white" value="Confirm Payment" name="confirm_payment">
            </div>
        </form>
        <!-- Back to My Orders Button -->
        <div class="text-center">
            <a href="profile.php?my_orders" class="btn btn-secondary">Back to My Orders</a>
        </div>
    </div>
</body>

</html>