<?php
  session_start();
  
  include("config.php");
  if(!isset($_SESSION['valid'])){
   header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="home.css">
   <link rel="stylesheet" href="style.css">
   <title>Admin Home</title>
</head>
<body>
     <?php
          
           $id = $_SESSION['id'];
           $query = mysqli_query($con,"SELECT*FROM users WHERE id=$id");

           while($result = mysqli_fetch_assoc($query)){
               $res_username = $result['username'];
               $res_email = $result['email'];
               $res_gender = $result['gender'];
               $res_id = $result['id'];
           }
    ?>
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

   <section class="hero-section">
       <div class="content">
         <h2>Welcome back, <br> <?php echo $res_username?></h2>
         <p>
             Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Nisi fugit laborum vitae blanditiis <br> debitis voluptas pariatur incidunt amet corporis fugiat ipsam quidem quasi, <br> nostrum voluptatum, corrupti, tempore quaerat? Error, nobis.</p>
         </p>
       </div>
     </section>
</body>
</html>



