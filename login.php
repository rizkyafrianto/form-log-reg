<?php
require 'functions.php';

session_start();

// login session header to index
if (isset($_SESSION["login"])) {
   header("Location: index.php");
   exit;
}

// set login logic
if (isset($_POST["login"])) {

   $username = $_POST["username"];
   $password = $_POST["password"];

   $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

   // cek username
   if (mysqli_num_rows($result) === 1) {

      // cek password 
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {

         // set session
         $_SESSION["login"] = true;

         header("Location: index.php");
         exit;
      }
   }

   $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

   <div class="container">
      <div>
         <div>
            <div class="error-massage">
               <!-- membuat pesan error -->
               <?php if (isset($error)) : ?>
                  <P> username / password salah
                  <p>
                  <?php endif; ?>
            </div>
            <h2>
               welcome
            </h2>
         </div>
         <form class="login-form" action="" method="post">
            <!-- input username -->
            <input type="text" name="username" id="username" placeholder="Username">
            <!-- input password -->
            <input type="password" name="password" id="password" placeholder="Password">
            <!-- input checkbox -->
            <div class="remember-me">
               <label id="remember-me" for="remember">Remember?</label>
               <input type="checkbox" name="remember" id="remember" style="cursor: pointer;">
            </div>
            <!-- button submit -->
            <button class="submit-button" type="submit" name="login">sign in</button>
            <!-- link to resitration form -->
            <a class="help-text" href="registrasi.php">Sign up?</a>
         </form>
      </div>
   </div>

</body>

</html>