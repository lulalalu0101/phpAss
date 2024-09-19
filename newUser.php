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

    <?php 
         include("config.php");
         if(isset($_REQUEST['submit'])){
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $gender = $_REQUEST['gender'];
            $password = $_REQUEST['password'];

         //verifying the unique email
         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                      <br>
                      <a href='javascript:self.history.back()'><button class='btn'>Go Back</button>
                  </div>";
         }
         else{
            mysqli_query($con,"INSERT INTO users(username,email,gender,password) VALUES('$username','$email','$gender','$password')") or die("Erroe Occured");
            echo "<div class='message'>
             <p>Add new user successfully!</p>
                  </div>";
            echo "<br><a href='adminUser.php'><button class='btn'>Go back</button>";      
         }
         }else{ ?>
  <!-- Form -->
  <div class="container" style="padding: 20px 38px;">
   <div class="row">
       <header>New User</header>
       <form action="" class="form" method="post">
           <div class="row">
               <h3>User Details</h3>
               <div class="input-box">
                   <label for="username">Username</label>
                   <input type="text" name="username" id="username" autocomplete="off" required>
               </div>
               <div class="input-box">
                   <label for="email">Email</label>
                   <input type="text" name="email" id="email" autocomplete="off" required>
               </div>
               <div class="input-box">
                   <label for="gender">Gender</label>
                   <select class="select-box" name="gender" id="gender" autocomplete="off" required>
                       <option value disabled selected>Select your Gender</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                     </select>
               </div>
               <div class="input-box">
                   <label for="password">Password</label>
                   <input type="password" name="password" id="password" autocomplete="off" required>
               </div>
               <div class="row" style="margin-left: 3px;">
                   <div class="col">
                       <input type="submit" class="btn btn-primary" name="submit" value="Submit" style="width: 100%" required>
                   </div>
                   <div class="col">
                       <a class="btn btn-secondary" style="width: 100%; padding-top: 6px;" href="adminUser.php">Go Back</a>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
    <?php } ?>

</body>
</html>




