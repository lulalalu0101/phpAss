<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="admin.css">
   <link rel="stylesheet" href="style.css">
   <title>Add New Event</title>
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
          <a href="adminHome.php">Home</a>
        </li>
        <hr>
        <h4>Dashboard</h4>
        <li>
          <span class="material-symbols-outlined"><i class='bx bxs-flag-alt'></i></span>
          <a href="adminEvent.php">Event</a>
        </li>
        <ol class="small-ttl">
          <li>
              <a href="adminEvent.php"><i class='bx bx-chevron-right' ></i> Event List</a>
            </li>
            <li>
              <a href="eventForm.php"><i class='bx bx-chevron-right' ></i> New Event</a>
            </li>
        </ol>
        <li>
          <span class="material-symbols-outlined"><i class='bx bxs-user-detail'></i></span>
          <a href="adminUser.php">User</a>
        </li>
        <ol class="small-ttl">
          <li>
              <a href="adminUser.php"><i class='bx bx-chevron-right' ></i> User List</a>
            </li>
            <li>
              <a href="newUser.php"><i class='bx bx-chevron-right' ></i> New User</a>
            </li>
        </ol>
        <hr>
        <h4>Account</h4>
        <li>
          <span class="material-symbols-outlined"><i class='bx bxs-user' ></i></span>
          <a href="adminProfile.php">Profile</a>
        </li>
        <li class="logout-link">
          <span class="material-symbols-outlined"><i class='bx bxs-exit' ></i></span>
          <a href="logout.php">Logout</a>
        </li>
      </ul>
  </aside>

   <!-- Form -->
   <div class="container" style="padding: 20px 38px;">
       <div class="col">
           <div class="row">
               <header>New Event</header>
           </div>
           <div class="row">
               <form action="insertEvent.php" class="form" method="post">
                   <div class="row">
                       <h3>Event Details</h3>
                       <div class="col">
                           <div class="input-box">
                               <label for="title">Title</label>
                               <input type="text" name="eventTitle" id="eventTitle" placeholder="Event Title" autocomplete="off" required/>
                           </div>
                           <div class="input-box">
                               <label for="description">Description</label>
                               <textarea name="eventDesc" id="eventDesc" placeholder="Enter event details" style="height: 312px;" autocomplete="off" required></textarea>
                           </div>
                       </div>
                       <div class="col">
                           <div class="input-box">
                               <div class="col">
                                   <label for="eventVenue">Venue</label>
                                   <input type="text" name="eventVenue" id="eventVenue" placeholder="TAR UMT Block K" autocomplete="off" required />
                               </div>
                               <div class="row">
                                   <div class="col">
                                       <select onchange="getCities(this.value)" class="select-box" name="eventCountry" id="countries" autocomplete="off" required>
                                           <option value disabled selected>Select country</option>
                                           <option value="Johor">Johor</option>
                                           <option value="Kedah">Kedah</option>
                                           <option value="Kelantan">Kelantan</option>
                                           <option value="Melaka">Melaka</option>
                                           <option value="Negeri Sembilan">Negeri Sembilan</option>
                                           <option value="Pahang">Pahang</option>
                                           <option value="Perak">Perak</option>
                                           <option value="Perlis">Perlis</option>
                                           <option value="Pulau Pinang">Pulau Pinang</option>
                                           <option value="Sabah">Sabah</option>
                                           <option value="Sarawak">Sarawak</option>
                                           <option value="Selangor">Selangor</option>
                                           <option value="Terengganu">Terengganu</option>
                                           <option value="Wilayah Persekutuan">Wilayah Persekutuan</option>
                                       </select>
                                   </div>
                                   <div class="col">
                                       <select onchange="getCity(this.value)" class="select-box" name="eventCity" id="cities" autocomplete="off" required>
                                           <option value disabled selected>Select city</option>
                                       </select>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                                   <div class="input-box">
                                       <label for="eventDate">Date</label>
                                       <input type="date" name="eventDate" id="date" autocomplete="off" required/>
                                   </div>
                               <div class="row">
                                   <div class="input-box">
                                       <label for="time">Start Time</label>
                                       <div class="row">
                                           <div class="col">
                                               <input type="number" name="hour" id="hour" placeholder="Hour" min="1" max="23" autocomplete="off" required>
                                           </div>
                                           <div class="col">
                                               <input type="number" name="minute" id="minute" placeholder="Mins" min="0" max="59" autocomplete="off" required>
                                           </div>
                                           <div class="col">
                                               <select class="select-box" name="amORpm" id="amORpm" autocomplete="off" required>
                                                   <option value disabled selected>AM/PM</option>
                                                   <option value="AM">AM</option>
                                                   <option value="AM">PM</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col">
                                   <div class="input-box">
                                       <label for="eventType">Event Type</label>
                                       <select class="select-box" name="eventType" id="eventType" autocomplete="off" required>
                                           <option value disabled selected>Select Event Type</option>
                                           <option value="Talk">Talk</option>
                                           <option value="Workshop">Workshop</option>
                                           <option value="Exhibit">Exhibit</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="col">
                                   <div class="input-box">
                                       <label for="limit">Ticket Limit</label>
                                       <input type="number" name="limit" id="limit" placeholder="1" min="1" autocomplete="off" required></input>
                                   </div>
                               </div>
                               <div class="col">
                                   <div class="input-box">
                                       <label for="price">Ticket Price</label>
                                       <input type="number" name="price" id="price" placeholder="0.00" min="0" autocomplete="off" required></input>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row" style="margin-top: 50px;">
                       <h3>Organizer Details</h3>
                       <div class="input-box">
                           <label for="ogName">Name</label>
                           <input type="text" name="ogName" id="ogName" placeholder="Organizer Name" autocomplete="off" required/>
                       </div>
                       <div class="col">
                           <div class="input-box">
                               <label for="ogContact">Contact</label>
                               <input type="tel" name="ogContact" id="ogContact" placeholder="000-000 00000" pattern="[0-9]{3}-[0-9]{8}" autocomplete="off" required/>
                           </div>
                       </div>
                       <div class="col">
                           <div class="input-box">
                               <label for="ogMail">Email</label>
                               <input type="email" name="ogMail" id="ogContact" placeholder="example@gmail.com" autocomplete="off" required/>
                           </div>
                       </div>
                   </div>
                   <input type="submit" class="btn" name="submit" value="Submit" required>
               </form>
           </div>
       </div>
   </div>
   <script src="eventForm.js"></script>
</body>
</html>



