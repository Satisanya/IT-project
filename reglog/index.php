<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Index</title>
</head>

<body>
  <h1>Добро пожаловать,
    <?php echo $row["fullname"]; ?>
  </h1>
  <a href="logout.php">Выйти из аккаунта</a>
</body>

</html>