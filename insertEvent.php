<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$con = new mysqli($servername, 
    $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " 
        . $con->connect_error);
}

    $eventTitle = $_REQUEST['eventTitle'];
    $eventDesc = $_REQUEST['eventDesc'];
    $eventVenue = $_REQUEST['eventVenue'];
    $eventCountry = $_REQUEST['eventCountry'];
    $eventCity = $_REQUEST['eventCity'];
    $eventDate = $_REQUEST['eventDate'];
    $hour = $_REQUEST['hour'];
    $minute = $_REQUEST['minute'];
    $amORpm = $_REQUEST['amORpm'];
    $eventType = $_REQUEST['eventType'];
    $limit = $_REQUEST['limit'];
    $price = $_REQUEST['price'];
    $ogName = $_REQUEST['ogName'];
    $ogContact = $_REQUEST['ogContact'];
    $ogMail = $_REQUEST['ogMail'];
        
    $eventTime = $hour.":".$minute." ".$amORpm;
        
    $sql = "INSERT INTO `events` VALUES ('','$eventTitle','$eventDesc','$eventVenue','$eventCountry','$eventCity','$eventDate','$eventTime','$eventType','$limit','$price','$ogName','$ogContact','$ogMail')";
        
    $r = mysqli_query($con, $sql);
    if($r){
        echo "
                <div class='message'>
                      <p>New Event Add successfully!</p>
                  </div> <br>";
            echo "<a href='adminEvent.php'><button class='btn'>Go Back</button>";
    }
    
    mysqli_close($con);
    ?>

<link rel="stylesheet" href="style.css">
