<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
    header("Location: index.php");
} else {
    $doctor_id = $_SESSION["doctor_id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_doctor WHERE doctor_id = $doctor_id");
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
        <a href="doctor_appointments.php">Посмотреть записи</a>
    </div>
    <a href="logout.php">Выйти из аккаунта</a>
</body>

</html>