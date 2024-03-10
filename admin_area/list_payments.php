<h3 class="text-center text-success">Payments Page</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments = "SELECT * FROM `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

     

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Payments Received</h2>";
        } else {
               echo "<tr>
            <th>Sl.no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
            $number = 1; // start the serial number from 1
            while ($row_data = mysqli_fetch_assoc($result)) {
                $payment_id  = $row_data['payment_id'];
                $order_id = $row_data['order_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];

                echo "
        <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>";

            echo "<td>
                <a href='index.php?delete_payments= $payment_id' type='button' class='text-light'
                data-bs-toggle='modal' data-bs-target='#exampleModal-$payment_id'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>";

        // Modal
        echo "<div class='modal fade' id='exampleModal-$payment_id' tabindex='-1' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                    </div>
                    <div class='modal-body'>
                        <h5>Are you sure you want to delete this payment?</h5>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                            <a href='index.php?list_payments' class='text-light text-decoration-none'>NO</a>
                        </button>
                        <button type='button' class='btn btn-primary'>
                            <a href='index.php?delete_payments=$payment_id'class='text-light text-decoration-none'>YES</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>";

                $number++;
            }
        }

        echo "</tbody>
</table>";
?>