<?php
require 'config.php';

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

echo "<script> let showWrongPassword = false </script>";

if (isset($_POST["submit"])){
  $passport = $_POST["passport"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE passport = '$passport'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0){
    if (password_verify($password, $row['password'])) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else {
      echo
      "<script> showWrongPassword = true </script>";
    }
  }
  else{
    echo
    "<script> alert('Пользователь не зарегистрирован'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Вход в аккаунт</title>
  </head>
  <body>
    <h2>Вход в аккаунт</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="passport">Паспорт : </label>
      <input type="text" name="passport" id = "passport" required value=""> <br>
      <label for="password">Пароль : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Войти в аккаунт</button>
    </form>
    <br>
    <div id="wrongPasswordMsg" style="display: none;">НЕВЕРНЫЙ ПАРОЛЬ!</div>
    <br>
    <a href="registration.php">Перейти к регистрации</a>
  </body>
</html>

<script> 
if (showWrongPassword == true) document.getElementById('wrongPasswordMsg').style.display = 'block';
</script>