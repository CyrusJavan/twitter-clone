<?php
require_once "../src/common.php";
$logged_in = FALSE;
if(isset($_SESSION['login_user'])){
  $logged_in = TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Twitter Clone</title>
  <link rel="stylesheet" href="../resources/css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<header>
  <nav>
    <div class="nav-wrapper light-blue">
      <a href="index.php" class="brand-logo center">Twitter Clone</a>
      <div class="container">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
          <?php 
          if($logged_in){
            echo '<li><a href="logout.php">Logout</a></li>';
           } 
           else {
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }?>
        </ul>
      </div>
    </div>
  </nav>
</header>
<main>
<body class="light-blue lighten-3 ">
  