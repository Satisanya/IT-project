<?php
require 'config.php';
if (!($_SESSION["login"] == true)) {
  header("Location: index.php");
} else {
  $sysadmin_id = $_SESSION["sysadmin_id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_sysadmin WHERE sysadmin_id = $sysadmin_id");
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
    <a href="branch_registration.php">Добавить филиал</a>
  </div>
  <div>
    <a href="service_registration.php">Добавить услугу</a>
  </div>
  <div>
    <a href="admin_registration.php">Добавить админа</a>
  </div>
  <a href="logout.php">Выйти из аккаунта</a>
</body>

</html>