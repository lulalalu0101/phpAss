<?php
include("config.php");

// Check if the delete button was pressed
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM events WHERE eventCode = ?";
    
    if ($stmt = mysqli_prepare($con, $delete_query)) {
        mysqli_stmt_bind_param($stmt, 's', $id); // Assuming eventCode is a string
        $delete_query_run = mysqli_stmt_execute($stmt);
        
        if ($delete_query_run) {
            echo "<div class='message'><p>Event Deleted</p>";
            echo "<a class='btn' href='adminEvent.php'>Go Back</a></div>";
        } else {
            echo "Error deleting event: " . mysqli_error($con);
        }
        
        mysqli_stmt_close($stmt); // Close statement
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
}

mysqli_close($con); // Close database connection
?>
<link rel="stylesheet" href="style.css">