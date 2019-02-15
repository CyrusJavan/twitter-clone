<?php
require_once "../config/config.php";
require_once "../src/common.php";
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
if (isset($_GET['id'])) {
    $connection = new PDO($dsn, $db_username, $db_password, $pdo_options);

    $sql = "
    SELECT users.name, tweets.content, tweets.date, tweets.user_id
     FROM tweets
     LEFT JOIN users ON tweets.user_id = users.id
     WHERE users.id = ?
     ORDER BY tweets.date DESC
     ";
    $stmt = $connection->prepare($sql);
    if ($stmt->execute(array($_GET['id']))) {
        $tweets = $stmt->fetchAll();
    }
    if (isset($tweets) && count($tweets) > 0) {
        $has_tweets = true;
    }
} else {
    header("Location: index.php");
}
?>
<?php include "../resources/templates/header.php";?>
<?php if (isset($has_tweets)) {?>

<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card card-body light-blue">
      <span class="card-title"><?php echo $tweets[0]['name']; ?>'s Feed</span>
<?php foreach ($tweets as $tweet) {?>
            <div class="card-panel mb-0 mt-0">
              <span class="card-title"><a href="user.php?id=<?php echo $tweet['user_id']; ?>"><?php echo $tweet['name']; ?></a></span>
              <span class="text"><?php echo $tweet['date']; ?></span>
              <p><?php echo $tweet['content']; ?></p>
            </div>
<?php }?>
    </div>
  </div>
</div>
<?php } else {?>
  <div class="row center">
  <div class="col-md-10 mx-auto">
  <h3> This user has no tweets yet.</h3>
</div>
</div>

<?php }?>

<?php include "../resources/templates/footer.html";?>