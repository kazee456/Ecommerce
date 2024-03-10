<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered mt-5">
    <thead bg-info>
        <tr>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products= "Select * from `products`";
        $result=mysqli_query($con,$get_products);
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['products_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
            ?>
             <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_image1;?>'class='product_img'/></td>
            <td><?php echo $product_price?> /-</td>
            <td><?php
                $get_count="Select * from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
             ?></td>
            <td><?php echo $status ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id ?>'class='text-light'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_products=<?php echo $product_id ?>'type='button'
            class='text-light' data-bs-toggle='modal' 
        data-bs-target='#exampleModal-<?php echo $product_id; ?>'>
            <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?php echo $product_id; ?>" tabindex="-1" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this product?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <a href="index.php?view_products" class="text-light text-decoration-none">NO</a>
                    </button>
                    <button type="button" class="btn btn-primary">
                        <a href="index.php?delete_products=<?php echo $product_id; ?>" class="text-light text-decoration-none">YES</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <?php
        }
        ?>
       
    </tbody>
</table>
