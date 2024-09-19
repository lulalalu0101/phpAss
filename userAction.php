<?php
include("config.php");

if(isset($_POST['delete_btn'])) {
   $id = $_POST['delete_id'];
   $delete_query = "DELETE FROM users WHERE id='$id'";
   $delete_query_run = mysqli_query($con, $delete_query);
}

if ($delete_query_run) {
    echo "<div class='message'><p>User Deleted</p>";
    echo "<a class='btn' href='adminUser.php'>Go Back</a></div>";
}

?>
<link rel="stylesheet" href="style.css">