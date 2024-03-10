<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info text-center">
    <tr>
        <th>Sl.no</th>
        <th>brand Tiltle</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light  text-center">
    <?php
    $select_brand = "SELECT * FROM `brands`";
    $result = mysqli_query($con, $select_brand);
    $number = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        $number++;
    ?>
    <tr>
        <td><?php echo $number; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' class='text-light'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>' type='button' 
        class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal-<?php echo $brand_id; ?>'>
            <i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?php echo $brand_id; ?>" tabindex="-1" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this brand?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <a href="index.php?view_brands" class="text-light text-decoration-none">NO</a>
                    </button>
                    <button type="button" class="btn btn-primary">
                        <a href="index.php?delete_brands=<?php echo $brand_id; ?>" class="text-light text-decoration-none">YES</a>
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