<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="event.css">
   <title>Events</title>
</head>
<body>
    
   <aside class="sidebar">
       <div class="logo">
           <h3>TAR UMT</h3>
       </div>
       <ul class="links">
         <h4>Main Menu</h4>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-home' ></i></span>
           <a href="userHome.php">Home</a>
         </li>
         <hr>
         <h4>Event</h4>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-search' ></i></span>
           <a href="userSearch.php">Search</a>
         </li>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-flag-alt'></i></span>
           <a href="userEvent.php">Event List</a>
         </li>
         <ol class="small-ttl">
           <li>
               <a href="userEvent.php#talk"><i class='bx bx-chevron-right' ></i> Talk</a>
             </li>
             <li>
               <a href="userEvent.php#workshop"><i class='bx bx-chevron-right' ></i> Workshop</a>
             </li>
             <li>
               <a href="userEvent.php#exhibit"><i class='bx bx-chevron-right' ></i> Exhibit</a>
             </li>
         </ol>
         <hr>
         <h4>Account</h4>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-user' ></i></span>
           <a href="userProfile.html">Profile</a>
         </li>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-notepad' ></i></span>
           <a href="userHistory.php">History</a>
         </li>
         <li class="logout-link">
           <span class="material-symbols-outlined"><i class='bx bxs-exit' ></i></span>
           <a href="logout.php">Logout</a>
         </li>
       </ul>
   </aside>
    
    <div class='container'>

<?php
session_start();
include("config.php"); // Include database configuration

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo "You must be logged in to view your booking history.";
    exit; // Exit if not logged in
}

$userId = $_SESSION['id'];

// Prepare the SQL query to fetch booking history
$query = "SELECT history.eventId, events.eventTitle, events.eventDate, events.eventTime, events.eventVenue 
          FROM history 
          JOIN events ON history.eventId = events.eventCode
          WHERE history.userId = $userId";

$result = mysqli_query($con, $query);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    echo "<div class='row'>";
    echo "<h2>Your Booking History</h2></div>";
    echo "<table class='table'>";
    echo "<thead>
            <tr>
                <th>Event Code</th>
                <th>Event Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
            </tr>
          </thead>
          <tbody>";
    
    // Fetch and display each booking
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['eventId']) . "</td>
                <td>" . htmlspecialchars($row['eventTitle']) . "</td>
                <td>" . htmlspecialchars($row['eventDate']) . "</td>
                <td>" . htmlspecialchars($row['eventTime']) . "</td>
                <td>" . htmlspecialchars($row['eventVenue']) . "</td>
              </tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "<p>You have no bookings.</p>";
}

mysqli_close($con); // Close database connection
?>

        </div>
        