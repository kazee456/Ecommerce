<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_orders = "SELECT * FROM `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        echo "<tr>
            <th>Sl.no</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total orders</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5 w-50 m-auto'>No orders yet</h2>";
        } else {
            $number = 1; // start the serial number from 1
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];

                echo "
        <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>";

            echo "<td>
                <a href='index.php?delete_orders= $order_id' type='button' class='text-light'
                data-bs-toggle='modal' data-bs-target='#exampleModal-$order_id'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>";

        // Modal
        echo "<div class='modal fade' id='exampleModal-$order_id' tabindex='-1' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                    </div>
                    <div class='modal-body'>
                        <h5>Are you sure you want to delete this order?</h5>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                            <a href='index.php?list_orders' class='text-light text-decoration-none'>NO</a>
                        </button>
                        <button type='button' class='btn btn-primary'>
                            <a href='index.php?delete_orders=$order_id'class='text-light text-decoration-none'>YES</a>
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