<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="event.css">
   <title>Search Event</title>
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
           <a href="userEvent.php#talk">Search</a>
         </li>
         <li>
           <span class="material-symbols-outlined"><i class='bx bxs-flag-alt'></i></span>
           <a href="userEvent.php#competition">Event List</a>
         </li>
         <ol class="small-ttl">
           <li>
               <a href="userEvent.php#competition"><i class='bx bx-chevron-right' ></i> Talk</a>
             </li>
             <li>
               <a href="userEvent.php#competition"><i class='bx bx-chevron-right' ></i> Workshop</a>
             </li>
             <li>
               <a href="userEvent.php#competition"><i class='bx bx-chevron-right' ></i> Competition</a>
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
           <a href="#">History</a>
         </li>
         <li class="logout-link">
           <span class="material-symbols-outlined"><i class='bx bxs-exit' ></i></span>
           <a href="logout.php">Logout</a>
         </li>
       </ul>
   </aside>


   <div class="container" style="padding: 30px 120px;">
       <div class="col">
           <div class="row">
               <h1>Search Event</h1>
           </div>
           <div class="row">
               <div class="search">
                   <span><i class='bx bx-search' ></i></span>
                   <input class="input-search" type="text" id="live_search" autocomplete="off" placeholder="Search...">
               </div>
           </div>
           <div id="searchresult"></div>
       </div>
   </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
$(document).ready(function(){
    $("#live_search").keyup(function(){

        var input = $(this).val();

        if(input != ""){
            $.ajax({
                url: "liveSearch.php",
                method: "POST",
                data: { input: input },
                success: function(data){ 
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "block");
                }
            });
        } else {
            $("#searchresult").css("display", "none");
        }
    });
});
</script>
    

</body>
</html>