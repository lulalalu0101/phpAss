<?php
session_start();

include("config.php");
// Check if the form is submitted
if (isset($_POST['join_event'])) {
    $id = $_POST['join_id']; // Get the event ID from the form
    $userid = $_SESSION['id']; // Get the user ID from the session

    // Check if user ID is set
    if (isset($userid)) {
        // Use prepared statement to prevent SQL injection
        if ($stmt = mysqli_prepare($con, "INSERT INTO history (userId, eventId) VALUES (?, ?)")) {
            mysqli_stmt_bind_param($stmt, 'ii', $userid, $id); // Assuming both are integers
            $executeResult = mysqli_stmt_execute($stmt);

            // Check if the execution was successful
            if ($executeResult) {
                echo "<div class='message'>
                      <p>Join successfully!</p>
                  </div> <br>";
            echo "<a href='userEvent.php'><button class='btn'>Go Back</button>";
                
            } else {
                echo "Error joining event: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt); // Close statement
        } else {
            echo "Error preparing statement: " . mysqli_error($con);
        }
    } else {
        echo "User is not logged in.";
    }
}
?>

<link rel="stylesheet" href="style.css">



