<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}

if (isset($_POST["submit"])) {
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $role = $_POST["role"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");

  if (mysqli_num_rows($duplicate) > 0) {
    echo
      "<script> alert('Пользователь с такой электронной почтой уже зарегистрирован!')</script>";
  } else {
    if ($password == $confirmpassword) {

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO tb_user (fullname, password, role, email) VALUES('$fullname', '$hashed_password', '$role', '$email')";
      $mail = new PHPMailer;
      $mail->CharSet = 'UTF-8';

      // Настройки SMTP
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPDebug = 0;

      $mail->Host = 'ssl://smtp.mail.ru';
      $mail->Port = 465;
      $mail->Username = 'bot.pochtalon@mail.ru';
      $mail->Password = 'tHhxTwFjuwMvyqX8TjVx';

      // От кого
      $mail->setFrom('bot.pochtalon@mail.ru', 'Бот Почтальон');

      // Кому
      $mail->addAddress($email);

      // Тема письма
      $subject = "Код подтверждения регистрации";
      $mail->Subject = $subject;

      // Тело письма
      $sent_ver_code = rand(999999, 111111);
      $body = "<p>Ваш код подтверждения $sent_ver_code</p>";
      $mail->msgHTML($body);

      if ($mail->send()) {
        $_SESSION['query'] = $query;
        $_SESSION['sent_ver_code'] = $sent_ver_code;
        header("Location: verification.php");
      }
    } else {
      echo
        "<script> alert('Пароли не совпадают'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
</head>

<body>
  <h2>Регистрация</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="fullname">Полное имя : </label>
    <input type="text" name="fullname" id="fullname" required value=""> <br>
    <label for="email">Электронная почта : </label>
    <input type="text" name="email" id="email" required value=""> <br>
    <label for="role">Роль : </label>
    <input type="role" name="role" id="role" required value=""> <br>
    <label for="password">Пароль : </label>
    <input type="password" name="password" id="password" required value=""> <br>
    <label for="confirmpassword">Подтвердите пароль : </label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
    <button type="submit" name="submit">Зарегистрироваться</button>
  </form>
  <br>
  <a href="login.php">Перейти к логину</a>
</body>

</html>