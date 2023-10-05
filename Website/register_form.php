<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

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
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>