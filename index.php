<?php
require 'functions.php';

session_start();

// session header to login
if (!isset($_SESSION["login"])) {
   header("Location: login.php");
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Home</title>
</head>

<body>

   <div class="container">

      <div id="logout">
         <a href="logout.php">log out</a>
      </div>

   </div>

</body>

</html>