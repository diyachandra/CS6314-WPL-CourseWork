<?php
$name = $email = "";
if (!isset($_COOKIE["name"]) || !isset($_COOKIE["email"])) {
    header("Location: login.html");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php echo "Welcome " . $_COOKIE["name"]; ?>

    <form action="logout.php" method="post">
      <input type="submit" value="Logout">
    </form>
  </body>
</html>
