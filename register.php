<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="title" style="text-align: center;">
        <h1>Photography Society</h1>
    </div>

    <div class="container">
        <div class="box form-box">
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
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{
            mysqli_query($con,"INSERT INTO users(username,email,gender,password) VALUES('$username','$email','$gender','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";      
         }
         }else{ ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="gender">Gender</label>
                    <select class="select-container" name="gender" id="gender" autocomplete="off" required>
                        <option value disabled selected>Select your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>