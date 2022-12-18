<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
    header("Location: index.php");
} else {
    $admin_id = $_SESSION["admin_id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = $admin_id");
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
        <a href="schedule_edit.php">Изменить расписание филиала</a>
    </div>
    <div>
        <a href="doctor_registration.php">Добавить врача</a>
    </div>
    <a href="logout.php">Выйти из аккаунта</a>
</body>

</html>