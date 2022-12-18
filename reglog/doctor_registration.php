<?php
require 'config.php';

$admin_id = $_SESSION["admin_id"];
$admin_branch_id = $admin_id;
$branch_id = mysqli_query($conn, "SELECT branch_id FROM tb_admin WHERE admin_id = '$admin_branch_id'")->fetch_array()['branch_id'];
#var_dump($branch_id);


if (isset($_POST["submit"])) {
    $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_doctor")->fetch_array();
    $doctor_id = intval($last_id[0]) + 1;
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_admin WHERE email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Доктор с такой электронной почтой уже зарегистрирован!')</script>";
    } else {
        if ($password == $confirmpassword) {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO tb_doctor (doctor_id, fullname, password, email, branch_id) VALUES('$doctor_id', '$fullname', '$hashed_password', '$email', '$branch_id')";

            $result = mysqli_query($conn, $query);
            if (false === $result) {
                printf("error: %s\n", mysqli_error($conn));
            } else {
                echo "<script> alert('Регистрация доктора завершена!') </script>";
                header("Location: admin_lk.php");
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
    <title>Регистрация доктора</title>
</head>

<body>
    <h2>Регистрация доктора</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="fullname">Полное имя : </label>
        <input type="text" name="fullname" id="fullname" required value=""> <br>
        <label for="email">Электронная почта : </label>
        <input type="text" name="email" id="email" required value=""> <br>
        <label for="password">Пароль : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <label for="confirmpassword">Подтвердите пароль : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
        <label for="branch">Филиал : </label>
        <select name="branch_id" id="branch_id">
            <?php
            printf('<option value="%s">%s</option>', $branch_id, $branch_id);
            ?>
        </select>
        <div>
        <button type="submit" name="submit">Зарегистрировать</button>
        </div>
    </form>
    <br>
    <div>
        <a href="sysadmin_lk.php">Перейти к личному кабинету</a>
    </div>
</body>

</html>