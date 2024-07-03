<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5" onsubmit="return confirmDelete()">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>

    <script>
        function confirmDelete() {
            if (document.querySelector('input[name="delete"]:hover')) {
                return confirm("Are you sure you want to delete your account?");
            }
            return true;
        }
    </script>

    <?php
    $username_session = $_SESSION['username'];
    if (isset($_POST['delete'])) {
        $delete_query = "DELETE FROM `user_table` WHERE username='$username_session'";
        $result = mysqli_query($con, $delete_query);
        if ($result) {
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if (isset($_POST['dont_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";
    }
    ?>
</body>