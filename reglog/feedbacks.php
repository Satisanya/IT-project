<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
  header("Location: index.php");
} else {
  $user_id = $_SESSION["user_id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = $user_id");
  $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["submit"])) {
  $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_feedback")->fetch_array();
  $feedback_id = intval($last_id[0]) + 1;
  $text = $_POST["text"];
  $query = "INSERT INTO tb_feedback (feedback_id, user_id, text) VALUES('$feedback_id', '$user_id', '$text')";
  $result = mysqli_query($conn, $query);
  sleep(3);
  echo "<script> alert('Ваш отзыв отправлен!') </script>";
  header("Location: user_lk.php");
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Оставить отзыв</title>
</head>

<body>
  <h2>Оставить отзыв</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="email">Введите текст отзыва: </label>
    <input type="text" name="text" id="text" required value=""> <br>
    <button type="submit" name="submit">Отправить отзыв</button>
  </form>
  <a href="user_lk.php">Назад к личному кабинету</a>
</body>

</html>