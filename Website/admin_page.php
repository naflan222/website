<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/stylee.css">
<style>

.navbar {
         background-color: #333;
         color: white;
      }

      .navbar ul {
         list-style: none;
         padding: 0;
         margin: 0;
         display: table;
         width: 100%;
      }

      .navbar li {
         display: table-cell;
         text-align: center;
         vertical-align: middle;
         padding: 15px 0;
      }

      .navbar a {
         color: white;
         text-decoration: none;
      }

      .navbar a:hover {
         background-color: crimson;
         border-radius: 5px;
      }
	  </style>
</head>
<body>
     <!-- Navigation Bar -->
<div class="navbar">
   <ul>
      <li><a href="index.html">Home<span></span></a></li>
      <li><a href="about.html">About<span></span></a></li>
      <li><a href="booking.html">Book Event<span></span></a></li>
      <li><a href="services.html">Services<span></span></a></li>
      <li><a href="#">Gallery<span></span></a></li>
      <li><a href="blog.html">Blog<span></span></a></li>
      <li><a href="contact.html">Contact<span></span></a></li>
      <li><a href="login_form.php">Login<span></span></a></li>
   </ul>
</div> 
   
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="#" class="btn">Add Images</a>
      <a href="#" class="btn">Booked events</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>