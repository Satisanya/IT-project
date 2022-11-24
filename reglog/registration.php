<?php
require 'config.php';

if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}

if (isset($_POST["submit"])) {
  $fullname = $_POST["fullname"];
  $passport = $_POST["passport"];
  $role = $_POST["role"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE passport = '$passport'");

  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Такие паспортные данные уже зарегистрированы'); </script>";
  }
  else{
    if ($password == $confirmpassword) {

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO tb_user (fullname, password, role, passport) VALUES('$fullname', '$hashed_password', '$role', '$passport')";

      echo "<pre>Debug: $query</pre>\m";
      $result = mysqli_query($conn, $query);

      if ( false === $result ) {
        printf("error: %s\n", mysqli_error($conn));
      }
      else {
        echo
      "<script> alert('Регистрация завершена'); </script>";
      }
    }
    else {
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
      <input type="text" name="fullname" id = "fullname" required value=""> <br>
      <label for="passport">Паспорт : </label>
      <input type="text" name="passport" id = "passport" required value=""> <br>
      <label for="role">Роль : </label>
      <input type="role" name="role" id = "role" required value=""> <br>
      <label for="password">Пароль : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Подтвердите пароль : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Зарегистрироваться</button>
    </form>
    <br>
    <a href="login.php">Перейти к логину</a>
  </body>
</html>
