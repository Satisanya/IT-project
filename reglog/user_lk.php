<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
  header("Location: index.php");
} else {
  $user_id = $_SESSION["user_id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = $user_id");
  $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Личный кабинет</title>
</head>

<body>
  <h1>Добро пожаловать,
    <?php echo $row["fullname"]; ?>
  </h1>
  <div>
  <a href="appointment_registration_step1.php">Записаться на прием</a>
  </div>
  <div>
  <a href="feedbacks.php">Оставить отзыв</a>
  </div>
  <a href="logout.php">Выйти из аккаунта</a>
</body>

</html>