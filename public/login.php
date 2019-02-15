<?php include "../resources/templates/header.html";?>
<?php
   require "../config/config.php";
   require "../src/common.php";
   
   if(isset($_POST['submit'])) {
      // username and password sent from form 
      
      $connection = new PDO($dsn, $db_username, $db_password, $pdo_options);
      
      $sql = "SELECT name, password FROM users WHERE email = ?";
      $stmt = $connection->prepare($sql);
      if ($stmt->execute(array($_POST['email']))) {
        while ($row = $stmt->fetch()) {
          print_r($row);
        }
      }
   }
?>


<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body">
      <h3 class="text-center">Account Login</h3>
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>

<?php include "../resources/templates/footer.html";?>