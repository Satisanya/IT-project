<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_admin")->fetch_array();
    $admin_id = intval($last_id[0]) + 1;
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_admin WHERE email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Админ с такой электронной почтой уже зарегистрирован!')</script>";
    } else {
        if ($password == $confirmpassword) {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO tb_admin (admin_id, fullname, password, email) VALUES('$admin_id', '$fullname', '$hashed_password', '$email')";

            $result = mysqli_query($conn, $query);
            if (false === $result) {
                printf("error: %s\n", mysqli_error($conn));
            } else {
                echo "<script> alert('Регистрация админа завершена!') </script>";
                header("Location: sysadmin_lk.php");
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
    <title>Регистрация админа</title>
</head>

<body>
    <h2>Регистрация админа</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="fullname">Полное имя : </label>
        <input type="text" name="fullname" id="fullname" required value=""> <br>
        <label for="email">Электронная почта : </label>
        <input type="text" name="email" id="email" required value=""> <br>
        <label for="password">Пароль : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <label for="confirmpassword">Подтвердите пароль : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
        <button type="submit" name="submit">Зарегистрировать</button>
    </form>
    <br>
    <div>
        <a href="sysadmin_lk.php">Перейти к личному кабинету</a>
    </div>
</body>

</html>