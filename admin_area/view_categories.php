<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info text-center">
    <tr>
        <th>Sl.no</th>
        <th>Category Tiltle</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class="bg-secondary text-light  text-center">
    <?php
    $select_cat="Select * from `categories`";
    $result=mysqli_query($con,$select_cat);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];
        $number++;
 
    ?>
    <tr>
        <td><?php echo $number; ?></td>
        <td><?php echo $category_title; ?></td>
        <td><a href='index.php?edit_categories=<?php echo $category_id; ?>' class='text-light'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_categories=<?php echo $category_id; ?>' type='button' class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal-<?php echo $category_id; ?>'>
            <i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?php echo $category_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this category?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <a href="index.php?view_categories" class="text-light text-decoration-none">NO</a>
                    </button>
                    <button type="button" class="btn btn-primary">
                        <a href="index.php?delete_categories=<?php echo $category_id; ?>" class="text-light text-decoration-none">YES</a>
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