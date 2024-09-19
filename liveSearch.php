<?php
include("config.php");

if (isset($_POST['input'])) {
    $input = mysqli_real_escape_string($con, $_POST['input']); // Sanitize input
    $query = "SELECT * FROM events WHERE eventTitle LIKE ? OR eventType LIKE ? OR eventCountry LIKE ? OR eventCity LIKE ? OR eventDesc LIKE ? LIMIT 3";
    
    $stmt = mysqli_prepare($con, $query);
    $likeInput = "$input%"; // Prepare wildcard search
    mysqli_stmt_bind_param($stmt, 'sssss', $likeInput, $likeInput, $likeInput, $likeInput, $likeInput);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
   <link rel="stylesheet" href="event.css">

            <div class="item-container">
                <div class="img-container">
                    <img src="search.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>

                    <div class="event-info">
                        <p class="title text-center"><?php echo($row['eventTitle']); ?></p>
                        <div class="separator"></div>
                        <p class="info"><?php echo ($row['eventCountry']) . ', ' . ($row['eventCity']); ?></p>
                        <p class="price">RM <?php echo ($row['eventPrice']); ?></p>

                        <div class="additional-info">
                            <p class="info"><b><?php echo ($row['ogName']); ?></b></p>
                            <p class="info"><i class='bx bxs-map'></i><?php echo ($row['eventVenue']); ?></p>
                            <p class="info"><i class='bx bxs-calendar-alt'></i><?php echo ($row['eventDate']); ?></p>
                            <p class="info"><i class='bx bxs-time'></i><?php echo ($row['eventTime']); ?></p>
                        </div>
                    </div>
                    <button class="action btn-lg">View</button>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No data found";
    }
    
    mysqli_stmt_close($stmt); // Close statement
}
mysqli_close($con); // Close connection
?>