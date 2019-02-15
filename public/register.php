<?php include "../resources/templates/header.html";?>
<?php
require "../config/config.php";
require "../src/common.php";
if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
      die();
  }
}
if (isset($_POST['submit'])) {
  try {
      $connection = new PDO($dsn, $db_username, $db_password, $pdo_options);
      $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $new_user = array(
          "name" => $_POST['name'],
          "email" => $_POST['email'],
          "password" => $hashed_password,
      );
      $sql = sprintf(
          "INSERT INTO %s (%s) values (%s)",
          "users",
          implode(", ", array_keys($new_user)),
          ":" . implode(", :", array_keys($new_user))
      );
      $statement = $connection->prepare($sql);
      $statement->execute($new_user);
  } catch (PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php if (isset($_POST['submit']) && $statement) {?>
	<div class="container">
	<blockquote><?php echo escape($_POST['name']); ?> successfully added.</blockquote>
	</div>
<?php }?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body">
      <h3 class="text-center">Account Registration</h3>
      <form action="register.php" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
          <label for="password2">Confirm Password</label>
          <input type="password" class="form-control" name="password2" required>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      </form>
    </div>
  </div>
</div>

<?php include "../resources/templates/footer.html";?>