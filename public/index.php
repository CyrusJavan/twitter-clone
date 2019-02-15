<?php require_once "../src/common.php"; ?>
<?php include "../resources/templates/header.php";?>
<?php
  if(isset($_SESSION['login_user'])){
    ?>
    <p><?php
    echo 'You are logged in as '.$_SESSION['login_user'];
    ?>
    </p>
    <?php
  }
?>
<div class="container center">
<h1>Welcome to the Twitter Clone</h1>
<div class="container">
  <ul>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
</ul>
</div>
</div>

<?php include "../resources/templates/footer.html";?>