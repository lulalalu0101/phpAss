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
   <title>Home</title>
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
       <div class="content">
         <h2>Welcome back, <br> <?php echo $res_username ?></h2>
         <p>
Photography societies, often referred to as camera clubs, serve as vibrant communities where individuals passionate about photography can come together to share their interests, learn from each other, and enhance their skills. These organizations provide a supportive environment that fosters creativity through collaboration and camaraderie. Members benefit from various educational resources, including workshops, guest lectures, and hands-on learning experiences that cater to all skill levels, from beginners to seasoned professionals. Additionally, photography societies facilitate networking opportunities that can lead to collaborations, business ventures, or simply friendships among like-minded individuals. By participating in competitions and exhibitions, members gain exposure and constructive feedback on their work, which can be invaluable for personal growth. Overall, joining a photography society not only enriches one's photographic journey but also helps cultivate a sense of belonging within the larger community of photography enthusiasts.         
         </p>
         <div class="col">
         </div>
       </div>
     </section>
</body>
</html>