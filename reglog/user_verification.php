<?php
require 'config.php';

#var_dump($sent_ver_code, $query);
if (isset($_POST['check'])) {
    $recieved_ver_code = $_POST["recieved_ver_code"];
    $sent_ver_code = $_SESSION['sent_ver_code'];
    $query = $_SESSION['query'];
    if ($sent_ver_code == $recieved_ver_code) {
        $result = mysqli_query($conn, $query);
        if (false === $result) {
            printf("error: %s\n", mysqli_error($conn));
        } else {
            echo "<script> alert('Регистрация завершена!') </script>";
            header("Location: user_login.php");
        }
    } else {
        echo "<script> alert('Вы ввели неверный код, попробуйте пройти регистрацию заново!!') </script>";
        header("Location: user_registration.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Подтверждение почты</title>
  </head>
  <body>
    <h2>Введите код подтверждения, отправленный на указанную почту:</h2>
    <form class="" action="" method="post" autocomplete="off">
      <input type="recieved_ver_code" name="recieved_ver_code" id = "recieved_ver_code" required value=""> <br>
      <button type="check" name="check">Выполнить проверку</button>
    </form>
    <br>
  </body>
</html>
