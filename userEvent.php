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


   <section class="hero-section">
       <section class="small-section" id="talk">
           <h2>Photography Talk</h2>
           <div class="container">
           
           <?php 
           include("config.php");
           $result = mysqli_query($con, "SELECT * FROM `events`") or die("Select Error");

           //declare array to store the data of database 
           $row = mysqli_fetch_assoc($result);
           if ($result->num_rows > 0) {
               // fetch all data from db into array  
               $row = $result->fetch_all(MYSQLI_ASSOC);
           }
           if (!empty($row)) {
                    foreach ($row as $rows) {
                        if ($rows['eventType'] == "Talk") {
        ?> 
           
               <div class="item-container">
                   <div class="img-container">
                       <img src="event.jpg" alt="Event image">
                   </div>
      
                   <div class="body-container">
                       <div class="overlay"></div>
      
                       <div class="event-info">
                           <p class="title text-center"><?php echo $rows['eventTitle']; ?></p>
                           <div class="separator"></div>
                           <p class="info"><?php echo $rows['eventCountry']; ?>, <?php echo $rows['eventCity']; ?></p>
                           <p class="price">RM <?php echo $rows['eventPrice']; ?></p>
      
                           <div class="additional-info">
                               <p class="info">
                                   <b><?php echo $rows['ogName']; ?></b>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-map' ></i>
                                   <?php echo $rows['eventVenue']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-calendar-alt' ></i>
                                   <?php echo $rows['eventDate']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-time' ></i>
                                   <?php echo $rows['eventTime']; ?>
                               </p>
                           </div>
                       </div>
                       <form action="viewEvent.php" method="post">
                        <input type="hidden" name="view_id" value="<?php echo $rows['eventCode'];?>">
                        <button type="submit" class="action btn-lg" name="view_event">View</button>
                        </form>
                   </div>
               </div>
               
           <?php }
                       }}
                       ?>
           </div>
       </section>


       <section class="small-section" id="workshop">
           <h2>Photography Workshop</h2>
           <div class="container">
               <?php
               
               if (!empty($row)) {
                    foreach ($row as $rows) {
                        if ($rows['eventType'] == "Workshop") {
        ?> <div class="item-container">
                   <div class="img-container">
                       <img src="event2.jpg" alt="Event image">
                   </div>
      
                   <div class="body-container">
                       <div class="overlay"></div>
      
                       <div class="event-info">
                           <p class="title text-center"><?php echo $rows['eventTitle']; ?></p>
                           <div class="separator"></div>
                           <p class="info"><?php echo $rows['eventCountry']; ?>, <?php echo $rows['eventCity']; ?></p>
                           <p class="price">RM <?php echo $rows['eventPrice']; ?></p>
      
                           <div class="additional-info">
                               <p class="info">
                                   <b><?php echo $rows['ogName']; ?></b>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-map' ></i>
                                   <?php echo $rows['eventVenue']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-calendar-alt' ></i>
                                   <?php echo $rows['eventDate']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-time' ></i>
                                   <?php echo $rows['eventTime']; ?>
                               </p>
                           </div>
                       </div>
                       <form action="viewEvent.php" method="post">
                        <input type="hidden" name="view_id" value="<?php echo $rows['eventCode'];?>">
                        <button type="submit" class="action btn-lg" name="view_event">View</button>
                        </form>
                   </div>
               </div>
               
           <?php }
                       }}
                       ?>
              
           </div>
       </section>


       <section class="small-section" id="exhibit">
           <h2>Photography Exhibit</h2>
           <div class="container">
              <?php
               
               if (!empty($row)) {
                    foreach ($row as $rows) {
                        if ($rows['eventType'] == "Exhibit") {
        ?> <div class="item-container">
                   <div class="img-container">
                       <img src="event3.jpg" alt="Event image">
                   </div>
      
                   <div class="body-container">
                       <div class="overlay"></div>
      
                       <div class="event-info">
                           <p class="title text-center"><?php echo $rows['eventTitle']; ?></p>
                           <div class="separator"></div>
                           <p class="info"><?php echo $rows['eventCountry']; ?>, <?php echo $rows['eventCity']; ?></p>
                           <p class="price">RM <?php echo $rows['eventPrice']; ?></p>
      
                           <div class="additional-info">
                               <p class="info">
                                   <b><?php echo $rows['ogName']; ?></b>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-map' ></i>
                                   <?php echo $rows['eventVenue']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-calendar-alt' ></i>
                                   <?php echo $rows['eventDate']; ?>
                               </p>
                               <p class="info">
                                   <i class='bx bxs-time' ></i>
                                   <?php echo $rows['eventTime']; ?>
                               </p>
                           </div>
                       </div>
                       <form action="viewEvent.php" method="post">
                        <input type="hidden" name="view_id" value="<?php echo $rows['eventCode'];?>">
                        <button type="submit" class="action btn-lg" name="view_event">View</button>
                        </form>
                   </div>
               </div>
               
           <?php }
                       }}
                       ?>
               
           </div>
       </section>
   </section>
</body>
</html>

