<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Login</title>
</head>
<body>
   <div class="title" style="text-align: center;">
       <h1>Welcome to <br>Photography Society</h1>
   </div>
  
   <div class="container">
       <div class="box form-box">
           <?php    
             include("config.php");
             if(isset($_REQUEST['submit'])){
               $email = mysqli_real_escape_string($con,$_REQUEST['email']);
               $password = mysqli_real_escape_string($con,$_REQUEST['password']);

               $result = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['email'];
                   $_SESSION['username'] = $row['username'];
                   $_SESSION['gender'] = $row['gender'];
                   $_SESSION['id'] = $row['id'];
                   $_SESSION['userType'] = $row['userType'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Email or Password</p>
                      </div> <br>";
                  echo "<a href='index.php'><button class='btn'>Go Back</button>";      
               }
               if(isset($_SESSION['valid'])){
                   if ($row["userType"]=="user") {
                       header("Location: userHome.php");
                   } elseif($row["userType"]=="admin") {
                       header("Location: adminHome.php");
                   }
               }
             }else{    
           ?>
           <header>
               <h1>Login</h1>
           </header>
           <form action="" method="post">
               <div class="field input">
                   <label for="username">Email</label>
                   <input type="text" name="email" id="email" autocomplete="off" required>
               </div>

               <div class="field input">
                   <label for="password">Password</label>
                   <input type="password" name="password" id="password" autocomplete="off" required>
               </div>

               <div class="field">
                   <input type="submit" class="btn" name="submit" value="Login" required>
               </div>
               <div class="links">
                   Don't have account? <a href="register.php">Sign Up Now</a>
               </div>
           </form>
       </div>
   </div>
        <?php } ?>
    </body>
</html>
