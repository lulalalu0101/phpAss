<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="event.css">
    <title>Event Details</title>
</head>
<body>

<?php
include("config.php");
// Check if the form is submitted
if (isset($_POST['view_event'])) {
    $id = $_POST['view_id'];

    // Use prepared statement to prevent SQL injection
    if ($stmt = mysqli_prepare($con, "SELECT * FROM events WHERE eventCode = ?")) {
        mysqli_stmt_bind_param($stmt, 's', $id); // Assuming eventCode is a string
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if any rows were returned
        if ($row = mysqli_fetch_assoc($result)) {
            ?>
            <section class="event-section">
                <div class="detail-box">
                    <h1 style="text-align: left; margin-bottom: 30px;"><?php echo htmlspecialchars($row['eventTitle']); ?></h1>
                    <div class="detail-info"></div>
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th id="header">Venue</th>
                                <td><?php echo htmlspecialchars($row['eventVenue']) . ', ' . htmlspecialchars($row['eventCountry']) . ', ' . htmlspecialchars($row['eventCity']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Date</th>
                                <td><?php echo htmlspecialchars($row['eventDate']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Time</th>
                                <td><?php echo htmlspecialchars($row['eventTime']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Organizer</th>
                                <td><?php echo htmlspecialchars($row['ogName']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Ticket Price</th>
                                <td>RM <?php echo htmlspecialchars($row['eventPrice']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Contact</th>
                                <td><?php echo htmlspecialchars($row['ogContact']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Email</th>
                                <td><?php echo htmlspecialchars($row['ogEmail']); ?></td>
                            </tr>
                            <tr>
                                <th id="header">Current Seat Availability</th>
                                <td><?php echo htmlspecialchars($row['eventLimit']); ?></td>
                            </tr>
                        </table>

                        <!-- Event Description -->
                        <div class="detail-info">
                            <p style="margin: 20px 0px; line-height: 30px; word-spacing: 2px;"><?php echo htmlspecialchars($row['eventDesc']); ?></p>
                        </div>

                        <!-- Action Buttons -->
                        <form action="insertHistory.php" method="post">
                        <input type="hidden" name="join_id" value="<?php echo $row['eventCode'];?>">
                        <button type="submit" class="btn btn-primary" name="join_event">Join Now</button>
                        <a class="btn btn-secondary" href="userEvent.php" role="button" style="padding: 7px 20px;">Go Back</a>
                        </form>
      
                        
                    </div> <!-- End of row -->
                </div> <!-- End of detail box -->
            </section> <!-- End of event section -->
            <?php
        } else {
            echo "<p>No event found with that code.</p>";
        }

        mysqli_stmt_close($stmt); // Close statement
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
}
?>
</body>
</html>
