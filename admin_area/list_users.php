<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments = "SELECT * FROM `user_table`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

     

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
        } else {
               echo "<tr>
            <th>Sl.no</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
            $number = 1; // start the serial number from 1
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id  = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];

                echo "
        <tr> <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/$user_image' alt= '$username' class='product_img'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>";

            echo "<td>
                <a href='index.php?delete_users=$user_id' type='button' class='text-light'
                data-bs-toggle='modal' data-bs-target='#exampleModal-$user_id'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>";

        // Modal
        echo "<div class='modal fade' id='exampleModal-$user_id' tabindex='-1' 
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
                            <a href='index.php?list_users' class='text-light text-decoration-none'>NO</a>
                        </button>
                        <button type='button' class='btn btn-primary'>
                            <a href='index.php?delete_users=$user_id'class='text-light text-decoration-none'>YES</a>
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