<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $last_id = mysqli_query($conn, "SELECT count(*) FROM tb_service")->fetch_array();
    $service_id = intval($last_id[0]) + 1;
    $name = $_POST["name"];
    $price = $_POST["price"];
    $query = "INSERT INTO tb_service (service_id, name, price) VALUES('$service_id', '$name', '$price')";
    $result = mysqli_query($conn, $query);
    if (false === $result) {
        printf("error: %s\n", mysqli_error($conn));
    } else {
        echo "<script> alert('Услуга добавлена!') </script>";
        header("Location: sysadmin_lk.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Добавление услуги</title>
</head>

<body>
    <h2>Добавление услуги</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Название : </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="price">Цена : </label>
        <input type="text" name="price" id="price" required value=""> <br>
        <button type="submit" name="submit">Добавить</button>
    </form>
    <br>
    <div>
        <a href="sysadmin_lk.php">Перейти к личному кабинету</a>
    </div>
</body>

</html>