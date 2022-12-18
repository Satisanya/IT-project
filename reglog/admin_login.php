<?php
require 'config.php';
echo "<script> let showWrongPassword = false </script>";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $row['password'])) {
            $_SESSION["login"] = true;
            $_SESSION["flag"] = "is_admin";
            $_SESSION["admin_id"] = $row["admin_id"];
            header("Location: admin_lk.php");
        } else {
            echo
                "<script> showWrongPassword = true </script>";
        }
    } else {
        echo
            "<script> alert('Администратор с такими данными не зарегистрирован'); </script>";
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
        <label for="email">Электронная почта : </label>
        <input type="text" name="email" id="email" required value=""> <br>
        <label for="password">Пароль : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <button type="submit" name="submit">Войти в аккаунт</button>
    </form>
    <br>
    <div id="wrongPasswordMsg" style="display: none;">НЕВЕРНЫЙ ПАРОЛЬ!</div>
    <br>
    <a href="index.php">Перейти к главной странице</a>
</body>

</html>

<script>
    if (showWrongPassword == true) document.getElementById('wrongPasswordMsg').style.display = 'block';
</script>