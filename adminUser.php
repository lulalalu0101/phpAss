<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="admin.css">
   <link rel="stylesheet" href="style.css">
   <title>Event List</title>
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
  <?php
    include("config.php");
    
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE userType='user'") or die("Select Error"); 
    
    //declare array to store the data of database 
    $row =  mysqli_fetch_assoc($result);  
  
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $row = $result->fetch_all(MYSQLI_ASSOC);   
    }
    ?>
   <div class="container">
       <div class="col">
           <div class="row">
               <h2>User List</h2>
               <table class="tbl">
                   <thead>
                       <th>No.</th>
                       <th>Username</th>
                       <th>E-mail</th>
                       <th>Gender</th>
                       <th>Password</th>
                       <th colspan="2">Action</th>
                   </thead>
                   <tbody>
                       <?php 
                           if (!empty($row)) {
                               $count = 1;
                           foreach ($row as $rows) {
                               ?> 
                       <tr>
                           <td class="no"><?php echo $count++; ?></td>
                           <td class="username"><?php echo $rows['username']; ?></td>
                           <td class="e-mail"><?php echo $rows['email']; ?></td>
                           <td class="gender"><?php echo $rows['gender']; ?></td>
                           <td class="password"><?php echo $rows['password']; ?></td>
                           <td>
                               <form action="userAction.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $rows['id']; ?>">
                                    <button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
                               </form>
                           </td>
                       </tr>
                       <?php }
                       }
                       ?>
                   </tbody>
               </table>
           </div>


           <div class="row">
               <div class="btn-container">
                   <a href="newUser.php">Add new User</a>
               </div>
           </div>
       </div>
   </div>
</body>
</html>



